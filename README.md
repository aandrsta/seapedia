# SEAPEDIA — Marketplace Multi-Peran (Level 1)

Welcome to **SEAPEDIA**, a specialized multi-role e-commerce marketplace connecting Buyers, Sellers, Drivers, and Admins. This project is built using Laravel 10, Tailwind CSS, and Alpine.js.

At this level (Level 1), the application provides a public marketplace interface, authentication, dynamic active role management, XSS-prevented application reviews, and reusable UI components.

---

## 🏗️ Architecture Overview

SEAPEDIA utilizes a **monolith architecture** with double-entry authentication to satisfy both web and API requirements:
1. **Web Interface (Session-Auth):** Uses Laravel Blade templates with Tailwind CSS and Alpine.js. The session state is maintained via cookies.
2. **API Backend (Token-Auth):** Protects routes under `/api/*` using **Laravel Sanctum** token-based authentication.

### Multi-Role & Active Role Selection
Unlike traditional single-role catalogs, a user in SEAPEDIA (non-admin) can own multiple roles at the same time (e.g., being a **Buyer** and a **Seller**). 
- **Session verification:** Upon logging in, if a user has multiple roles, they must choose an active role via the `/select-role` page.
- **Middleware protection:** The `EnsureRoleSelected` middleware redirects the user to the selection page if they attempt to access dashboards without choosing an active role. The `CheckActiveRole` middleware restricts dashboard routes to the chosen active role only.
- **API implementation:** For API routes, the active role context is passed through the `X-Active-Role` HTTP request header.

---

## 🛠️ Getting Started & Setup

Follow these steps to run SEAPEDIA locally:

### 1. Prerequisite
Ensure you have PHP 8.1+ and MySQL/MariaDB installed (recommended to use **Laragon** on Windows).

### 2. Install Dependencies
Clone the repository, enter the directory, and install PHP and JavaScript packages:
```bash
composer install
npm install
```

### 3. Environment Configuration
Copy the sample environment file and configure your database settings:
```bash
cp .env.example .env
```
Inside your `.env` file, set your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seapedia
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Application Key Generation
```bash
php artisan key:generate
```

### 5. Run Migrations & Seeders
Execute the migrations to generate tables and seed the database with demo accounts, initial products, and reviews:
```bash
php artisan migrate:fresh --seed
```

### 6. Build Assets
Run Vite in development mode to compile Tailwind CSS and Alpine.js assets:
```bash
npm run dev
```

### 7. Run Server
Start the local development server:
```bash
php artisan serve
```
The application will be accessible at `http://127.0.0.1:8000` (or `http://seapedia.test/` if configured in Laragon).

---

## 👥 Seeded Demo Accounts

You can log in to the web app or API with the following credentials (password is `password` for all accounts):

| Username | Roles | Purpose |
| :--- | :--- | :--- |
| `admin` | Admin | Accesses marketplace monitoring and configurations. |
| `buyer` | Buyer | Explores catalog, manages wallet, and checkouts. |
| `seller` | Seller | Manages store profile and product catalog listing. |
| `driver` | Driver | Accepts jobs, processes deliveries, and tracks earnings. |
| `multi` | Buyer, Seller, Driver | Tests multi-role selection flow and switching dashboards. |

---

## 📋 API Endpoints Documentation

All API requests expect the header `Accept: application/json`. Authenticated routes require `Authorization: Bearer <your_access_token>`.

### 1. User Registration
- **Endpoint:** `POST /api/register`
- **Request Body:**
  ```json
  {
    "name": "John Doe",
    "username": "johndoe",
    "email": "john@example.com",
    "password": "password123",
    "roles": ["buyer", "seller"]
  }
  ```
- **Response (201 Created):**
  ```json
  {
    "message": "Registrasi berhasil.",
    "access_token": "1|laravel_sanctum_token_string...",
    "token_type": "Bearer",
    "user": {
      "id": 5,
      "name": "John Doe",
      "username": "johndoe",
      "email": "john@example.com",
      "roles": ["buyer", "seller"]
    }
  }
  ```

### 2. User Login
- **Endpoint:** `POST /api/login`
- **Request Body:**
  ```json
  {
    "login": "johndoe",
    "password": "password123"
  }
  ```
- **Response (200 OK):**
  ```json
  {
    "message": "Login berhasil.",
    "access_token": "2|laravel_sanctum_token_string...",
    "token_type": "Bearer",
    "user": {
      "id": 5,
      "name": "John Doe",
      "username": "johndoe",
      "email": "john@example.com",
      "roles": ["buyer", "seller"]
    }
  }
  ```

### 3. Get User Profile
Retrieves user profile and checks the active role context.
- **Endpoint:** `GET /api/profile`
- **Headers:**
  - `Authorization: Bearer <token>`
  - `X-Active-Role: buyer` (the role context you are testing)
- **Response (200 OK):**
  ```json
  {
    "id": 5,
    "name": "John Doe",
    "username": "johndoe",
    "email": "john@example.com",
    "roles": ["buyer", "seller"],
    "active_role": "buyer"
  }
  ```

### 4. User Logout
Revokes the current access token.
- **Endpoint:** `POST /api/logout`
- **Headers:**
  - `Authorization: Bearer <token>`
- **Response (200 OK):**
  ```json
  {
    "message": "Logout berhasil."
  }
  ```

---

## 🧪 Testing

Automated tests are located in `tests/Feature/Level1Test.php`. You can execute them by running:
```bash
php artisan test
```
The test suite validates:
- Public catalog routing and details.
- User registration, login, and active role middleware routing constraints.
- Review submission and XSS tag sanitization prevention.
- API profile details and token generation.
