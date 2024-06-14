<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }
    public function json()
    {
        try {
            $contacts = Contact::with('group')->get();
            return DataTables::of($contacts)
                ->addIndexColumn()
                ->addColumn('show', function ($row) {
                    $show = '<a class="btn btn-primary" href="' . route('contacts.show', $row->id) . '">View</a>';
                    return $show;
                })
                ->addColumn('edit', function ($row) {
                    $edit = '<a class="btn btn-warning" href="' . route('contacts.edit', $row->id) . '">Edit</a>';
                    return $edit;
                })
                ->addColumn('delete', function ($row) {
                    $delete = '<form action="' . route('contacts.destroy', $row->id) . '" method="POST" style="display:inline;">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>';
                    return $delete;
                })
                ->rawColumns(['edit', 'show', 'delete'])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function create()
    {
        $groups = Group::all();
        return view('contacts.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'phone' => 'required',
            'group_id' => 'required|exists:groups,id'
        ]);
        try {
            Contact::create($request->all());
            return redirect()->route('contacts.index')->with('success', 'Contact added successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function edit(Contact $contact)
    {
        $groups = Group::all();
        return view('contacts.edit', compact('contact', 'groups'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'required',
            'group_id' => 'required|exists:groups,id'
        ]);
        try {
            $contact->update($request->all());
            return redirect()->route('contacts.index')->with('success', 'Contact Updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
            return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }


    }

}
