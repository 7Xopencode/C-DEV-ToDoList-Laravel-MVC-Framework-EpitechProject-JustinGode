# FreeAds Website

## Description

This is a freeads website built with Laravel 11. The project includes user authentication, profile management, an admin dashboard for managing users, categories, conditions, and locations. Users can view, create, edit, and delete their ads. The admin has the authority to manage all the aspects of the application through a dedicated dashboard.

## Features

### User Features
- User authentication (register, login, logout)
- User profile management (view, edit, delete)
- Ad management (create, view, edit, delete)
- Upload and update avatar
- View other users' profiles

### Admin Features
- Admin authentication (login, logout)
- Manage users (view, create, edit, delete)
- Manage categories (view, create, edit, delete)
- Manage conditions (view, create, edit, delete)
- Manage locations (view, create, edit, delete)
- Dashboard for overseeing all users and ads

## Technologies Used

- Laravel 11
- Tailwind CSS
- MySQL
- PHP
- Composer

## Installation

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL
- Node.js & npm

### Steps

1. Clone the repository:
   ```bash
   git clone
   https://github.com/EpitechCodingAcademyPromo2024/C-DEV-120-COT-1-2-freeads-justin.gode.git
   ```

2. Navigate to the project directory:
   ```bash
   cd freeads
   ```

3. Install dependencies:
   ```bash
   composer install
   npm install
   ```

4. Copy the `.env.example` file to `.env` and configure your database and other environment variables:
   ```bash
   cp .env.example .env
   ```

5. Generate the application key:
   ```bash
   php artisan key:generate
   ```

6. Run the migrations:
   ```bash
   php artisan migrate
   ```

7. Seed the database (optional):
   ```bash
   php artisan db:seed
   ```

8. Build the front-end assets:
   ```bash
   npm run dev
   ```

9. Serve the application:
   ```bash
   php artisan serve
   ```

10. Visit the application in your browser:
    ```
    http://localhost:8000
    ```

## Usage

### User Authentication
- Register a new account or log in with an existing one.
- Access your profile to view and edit your information.
- Create new ads and manage existing ones.

### Admin Dashboard
- Log in with admin credentials.
- Access the admin dashboard to manage users, categories, conditions, and locations.

## Routes

### User Routes
- `/register` - User registration
- `/login` - User login
- `/profile` - View and edit user profile
- `/ads` - View and manage ads

### Admin Routes
- `/admin/login` - Admin login
- `/admin/dashboard` - Admin dashboard
- `/admin/users` - Manage users
- `/admin/categories` - Manage categories
- `/admin/conditions` - Manage conditions
- `/admin/locations` - Manage locations

## Directory Structure

- `app/Http/Controllers` - Application controllers
- `app/Models` - Eloquent models
- `resources/views` - Blade templates
- `routes` - Application routes
- `database/migrations` - Database migrations
- `database/seeders` - Database seeders

## Contributing

### Steps

1. Fork the repository
2. Create a new branch (`git checkout -b feature/your-feature`)
3. Commit your changes (`git commit -m 'Add some feature'`)
4. Push to the branch (`git push origin feature/your-feature`)
5. Open a pull request


## Contact

If you have any questions, feel free to contact the project maintainer at edem.kpomachi@epitech.eu
