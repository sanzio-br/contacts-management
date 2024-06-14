# **Contacts Management Application**

This application allows users to manage contacts and group them
efficiently. Users can perform CRUD operations on contacts, organize
them into groups, and view detailed information about each contact and
group.

## **Features**

-   **Contacts Management:**

    -   Create, Read, Update, and Delete contacts.

    -   Assign contacts to groups.

-   **Groups Management:**

    -   Create, Read, Update, and Delete groups.

    -   View contacts belonging to each group.

## **Technologies Used**

-   **Laravel:** Backend framework used for building the application.

-   **MySQL:** Database management system used for storing contacts and
    > groups.

-   **Bootstrap:** Frontend framework for styling and user interface
    > components.

## **Setup Instructions**

To run this project locally, follow these steps:

**Clone the repository:  
**bash  
git clone https://github.com/yourusername/contacts-management.git

cd contacts-management

1.  

**Install dependencies:  
**bash  
composer install

npm install # Optional, if using npm for frontend assets

2.  

3.  **Setup your environment file:**

    -   Rename .env.example to .env.

    -   Configure your database connection in .env.

**Run migrations and seeders:  
**bash  
php artisan migrate

php artisan db:seed # Optional, if you have seeders

4.  

**Start the Laravel development server:  
**bash  
php artisan serve

5.  

6.  **Access the application:  
    > **Open your web browser and visit http://127.0.0.1:8000 to use the
    > application.

## **Usage**

-   **Managing Contacts:**

    -   Navigate to the Contacts section to add, edit, delete, or view
        > contacts.

    -   Contacts can be assigned to groups or left ungrouped.

-   **Managing Groups:**

    -   Navigate to the Groups section to create, edit, delete, or view
        > groups.

    -   View contacts belonging to each group and manage them
        > accordingly.

## **Contributing**

Contributions are welcome! If you find any issues or have suggestions
for improvements, please create an issue or submit a pull request.

## **License**

This project is licensed under the MIT License. See the LICENSE file for
details.