# 📚 Library Management System

A comprehensive library management application built with Laravel, featuring efficient management of books, categories, users, and loans, all with robust role-based access control.

---

## 🚀 Overview

This Library Management System provides a powerful platform for libraries, with distinct access levels for administrators, librarians, and members. Key features include book cataloging, category organization, user management, and loan tracking—all through a modern, responsive web interface.

---

## ✨ Features

- **User Management:** Registration and login with role-based access (Admin, Librarian, Member)
- **Book Management:** Add, edit, delete, and view books, organized by categories
- **Category Management:** Easily group and manage books by category
- **Loan Management:** Track book loans, returns, and due dates for members
- **Dashboard:** Visual statistics and quick access to important features

---

## 🛡️ User Roles

| Role      | Permissions                                                                 |
|-----------|-----------------------------------------------------------------------------|
| **Admin**     | Full access to all features, including user management                      |
| **Librarian** | Manage books, categories, and loans                                        |
| **Member**    | Browse books                                    |

---

## ⚙️ Installation

### **Prerequisites**
- PHP 8.2 or higher
- Composer
- MySQL
- XAMPP

### **Setup Instructions**

1. **Clone the Repository**
    ```bash
    git clone https://github.com/yourusername/library-management-system.git
    cd library-management-system
    ```

2. **Install Dependencies**
    ```bash
    composer install
    npm install && npm run dev # If using Laravel Mix/Vite for assets
    ```

3. **Set Up Environment Variables**
    - Copy `.env.example` to `.env`:
        ```bash
        cp .env.example .env
        ```
    - Edit `.env` and set your database credentials.

4. **Configure Session Driver (Optional)**
    - By default, Laravel uses `SESSION_DRIVER=file` for session storage.
    - Make sure your `.env` file contains:
        ```
        SESSION_DRIVER=file
        ```
    - **Ensure** the `storage/framework/sessions` directory exists and is **writable** by your web server:
        ```bash
        chmod -R 775 storage/framework/sessions
        ```
    - Using `file` driver is suitable for local development and small to medium applications. For production or multi-server setups, consider using `redis`, `database`, or `memcached` for better performance and scalability.
    - More info: [Laravel Session Docs](https://laravel.com/docs/12.x/session)

5. **Run Migrations and Seeders**
    ```bash
    php artisan migrate --seed
    ```

6. **Start the Development Server**
    ```bash
    php artisan serve
    ```

---

## 🌱 Database Seeding

The application comes with seeders to populate initial data:

- **UserSeeder:** Creates admin, librarian, and member accounts
- **CategorySeeder:** Creates book categories

### **Default User Accounts**

| Role       | Email                | Password |
|------------|----------------------|----------|
| Admin      | admin@example.com    | admin123 |
| Librarian  | librarian@example.com| librarian123 |
| Member     | member@example.com   | member123 |

---

## 💡 Usage

1. **Login** with appropriate credentials.
2. **Navigate** through the menu based on your role.
    - Members can browse books
    - Librarians can manage books, categories, and loans
    - Admins can additionally manage users

---

## 🗂️ File Structure Highlights

- **Controllers/** — Application controllers
- **Models/** — Data models (`Book`, `Category`, `User`, `Loan`)
- **resources/views/** — Blade template files
- **database/seeders/** — Database seeders

---

## 🛠️ Technologies Used

- **Laravel 12.x** — PHP Framework
- **MySQL** — Relational Database Management System
- **Bootstrap 5** — Frontend framework
- **DataTables** — Dynamic table handling
- **jQuery** — JavaScript library
- **AJAX** — For asynchronous data operations without reloading the page

---

## 📄 License

This library management system is open-sourced software licensed under the [MIT license](LICENSE).

---