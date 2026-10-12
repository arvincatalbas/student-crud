# Student CRUD

A Laravel-based student management application for creating, viewing, updating, and deleting student records.

## Overview

This project is a simple CRUD app built with Laravel 12 and SQLite, designed to manage student information such as:

- Name
- Email
- Course

It includes a dashboard with summary cards for total students, total courses, and the latest student entry.

## Tech Stack

- PHP 8.2+
- Laravel 12
- SQLite database
- Blade templates
- Vite for frontend assets
- Tailwind CSS
- Composer and npm package management

## Features

- Add new students
- View all students in a paginated list
- Update existing student information
- Delete student records
- Dashboard summary statistics
- Validation for student data

## Project Structure

```text
student-crud/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   └── StudentController.php
│   │   └── Requests/
│   ├── Models/
│   │   └── Student.php
│   └── Providers/
├── database/
│   ├── migrations/
│   ├── factories/
│   ├── seeders/
│   └── database.sqlite
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       └── students/
├── routes/
│   └── web.php
├── storage/
├── .env.example
├── composer.json
├── package.json
├── phpunit.xml
├── vite.config.js
└── README.md
```

## Architecture

This application follows the standard Laravel MVC architecture:

- `routes/web.php` defines the HTTP routes for the student CRUD pages.
- `app/Http/Controllers/StudentController.php` handles incoming requests and orchestrates the application logic.
- `app/Models/Student.php` represents the student entity and interacts with the SQLite database through Eloquent.
- `database/migrations/` contains the schema definitions for the `students` table.
- `resources/views/students/` contains the Blade templates used to render the create, edit, and index pages.
- `resources/js/` and `resources/css/` hold frontend assets bundled by Vite.

Typical request flow:

```text
Browser
  -> Route
  -> Controller
  -> Model (Eloquent)
  -> SQLite database
  -> Blade view
  -> Response to browser
```

This keeps the app organized, testable, and easy to extend.

## Requirements

Before running the project, make sure you have the following installed:

- PHP 8.2 or newer
- Composer
- Node.js and npm
- SQLite support enabled in PHP

## Installation

1. Clone the project and go to the project folder:

```bash
cd student-crud
```

2. Install PHP dependencies:

```bash
composer install
```

3. Install frontend dependencies:

```bash
npm install
```

4. Copy the environment file:

```bash
cp .env.example .env
```

On Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

5. Generate the application key:

```bash
php artisan key:generate
```

6. Run database migrations:

```bash
php artisan migrate
```

If the SQLite database file does not exist, it will be created automatically by Laravel.

## Running the App

Start the app in development mode:

```bash
composer run dev
```

This starts the Laravel server and Vite development server together.

You can also run them separately:

```bash
php artisan serve
```

and in another terminal:

```bash
npm run dev
```

Then open:

```text
http://localhost:8000
```

## Available Scripts

```bash
composer test
composer run dev
php artisan migrate
php artisan serve
npm run build
npm run dev
```

## Database

The project uses SQLite by default as configured in the environment file. The database file is stored at:

```text
database/database.sqlite
```

## Notes

This app follows the standard Laravel structure and uses resource routes for the student CRUD operations defined in `routes/web.php`.

## License

This project is licensed under the MIT license.
