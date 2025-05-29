# Getting Started with Studio App (Laravel Project)

This is a quick guide to help you understand and work with our Laravel project. This project is a modern web application built with Laravel (backend) and React with TypeScript (frontend).

## 🏗️ Project Overview

Studio App is a service management platform built with
- Backend Laravel 12 (PHP 8.2+)
- Frontend React 18 + TypeScript + Inertia.js
- Database SQLite (development)
- Styling Tailwind CSS + shadcnui components
- Build Tool Vite

## 📁 Project Structure

```
studio-app
├── app                    # Laravel backend code
│   ├── HttpControllers   # Handle web requests
│   ├── Models            # Database models (User, Service)
│   └── Providers         # Service providers
├── resourcesjs          # React frontend code
│   ├── components        # Reusable UI components
│   ├── pages            # Page components
│   ├── layouts          # Layout components
│   └── types            # TypeScript definitions
├── routes               # URL routing
├── database             # Database migrations & seeders
└── public              # Static assets
```

## 🚀 Quick Start

### 1. Prerequisites
- XAMPP installed and running (Apache + MySQL)
- Node.js (v18+) and npm
- Composer (PHP package manager)

### 2. Starting the Development Server

```bash
# Start Laravel backend
php artisan serve

# In a new terminal, start React frontend
npm run dev
```

The app will be available at `httplocalhost8000`

## 🔧 Common Commands

### Laravel (Backend)
```bash
# Run database migrations
php artisan migrate

# Seed database with sample data
php artisan dbseed

# Clear caches
php artisan cacheclear
php artisan configclear

# Create new migration
php artisan makemigration create_example_table

# Create new controller
php artisan makecontroller ExampleController

# Create new model
php artisan makemodel Example
```

### Frontend (ReactTypeScript)
```bash
# Install dependencies
npm install

# Run development server
npm run dev

# Build for production
npm run build

# Type checking
npm run types

# Lint code
npm run lint
```

## 📊 Database

We use SQLite for development (file `databasedatabase.sqlite`)

### Current Models
- User Manages user accounts and authentication
- Service Manages our service offerings

### View Database
You can view the database using any SQLite browser or run
```bash
php artisan tinker
# Then Userall() or Serviceall()
```

## 🎨 Frontend Architecture

### Key Technologies
- Inertia.js Connects Laravel and React seamlessly
- React Router Not used - Inertia handles routing
- Tailwind CSS Utility-first CSS framework
- shadcnui Pre-built component library

### Important Folders
- `resourcesjspages` Each file = a webpage
- `resourcesjscomponents` Reusable UI pieces
- `resourcesjslayouts` Page layouts (header, sidebar, etc.)

### Adding a New Page
1. Create file in `resourcesjspagesexample.tsx`
2. Add route in `routesweb.php`
3. Create controller method that returns `Inertiarender('example')`

## 🛠️ Development Workflow

### Making Changes

1. Backend Changes (PHPLaravel)
   - Edit files in `app` folder
   - Laravel auto-reloads, just refresh browser

2. Frontend Changes (ReactTypeScript)
   - Edit files in `resourcesjs`
   - Vite hot-reloads automatically

3. Database Changes
   ```bash
   # Create migration
   php artisan makemigration add_column_to_users
   
   # Run migration
   php artisan migrate
   ```

## 📝 Key Files to Know

 File  Purpose 
---------------
 `routesweb.php`  Defines all website URLs 
 `appHttpControllers`  Handle page requests 
 `appModelsUser.php`  User database model 
 `appModelsService.php`  Service database model 
 `resourcesjsapp.tsx`  Main React app entry point 
 `resourcesjspages`  All website pages 
 `databasemigrations`  Database structure changes 

## 🔐 Authentication

The app uses Laravel's built-in authentication
- Login `login`
- Register `register`
- Dashboard `dashboard` (protected)
- Settings `settings` (protected)

## 🎯 Common Tasks

### Adding a New Service
1. Use `php artisan tinker`
2. Run `AppModelsServicecreate(['name' = 'New Service', 'description' = '...'])`

### Creating a New Page
1. Add route in `routesweb.php`
2. Create controller method
3. Create React component in `resourcesjspages`

### Styling Components
- Use Tailwind CSS classes `className=bg-blue-500 text-white p-4`
- Or use shadcnui components `Button variant=primaryClick meButton`

## 🆘 Troubleshooting

### Common Issues

1. Page not loading Check if both `php artisan serve` and `npm run dev` are running
2. Database errors Run `php artisan migrate`
3. React errors Check browser console and terminal running `npm run dev`
4. Permission errors Make sure `storage` and `bootstrapcache` are writable

### Getting Help
- Laravel docs httpslaravel.comdocs
- React docs httpsreact.dev
- Inertia.js docs httpsinertiajs.com

## 📞 Need Help

When you need help
1. Check the browser console for JavaScript errors
2. Check the terminal running `npm run dev` for build errors
3. Check Laravel logs in `storagelogslaravel.log`
4. Ask me! I'm here to help 😊

---

## 🎉 You're Ready!

Start by exploring the dashboard at `dashboard` after logging in. The codebase is well-organized and follows Laravel and React best practices.

Happy coding! 🚀
