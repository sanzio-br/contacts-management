<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Contact;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
{
    $groups = Group::all();
    return view('groups.index', compact('groups'));
}

public function create()
{
    return view('groups.create');
}

public function store(Request $request)
{
    $request->validate(['name' => 'required']);
    Group::create($request->all());
    return redirect()->route('groups.index');
}

public function show(Group $group)
{
    return view('groups.show', compact('group'));
}

public function edit(Group $group)
{
    return view('groups.edit', compact('group'));
}

public function update(Request $request, Group $group)
{
    $request->validate(['name' => 'required']);
    $group->update($request->all());
    return redirect()->route('groups.index');
}

public function destroy(Group $group)
{
    $group->delete();
    return redirect()->route('groups.index');
}

}
