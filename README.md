
# CIT 3102: Systems Integration and Architecture (Midterms - Activity 2)

## 1. Project Information

- **Project Title:** Perfume Collection API
- **Name:** Elica Laureen S. Cruz
- **Section:** IT3E
- **Chosen Resource:** Perfume Collection

This project is a REST API built with Laravel that allows users to register, log in, and manage perfume records. It supports creating, retrieving, updating, deleting, and filtering perfumes. Laravel Sanctum is used to protect routes that require authentication.

## 2. Setup Instructions

### Requirements
- PHP
- Composer
- Laravel installer
- SQLite
- Bruno or Postman for testing

### Steps to Run the Project

1. Clone the repository:

   ```bash
   git clone https://github.com/elzurcx/cit3102-m5-perfume.git
   ```

2. Navigate to the project directory:

   ```bash
   cd cit3102-m5-perfume
   ```

3. Install the project dependencies:

   ```bash
   composer install
   ```

4. Create the environment file:

   ```bash
   cp .env.example .env
   ```

   On Windows Command Prompt, you can use:

   ```cmd
   copy .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Configure SQLite in `.env` and ensure the database file exists at `database/database.sqlite`.

   Set the database connection to SQLite:

   ```env
   DB_CONNECTION=sqlite
   ```

7. Run the database migrations:

   ```bash
   php artisan migrate
   ```

8. Start the Laravel development server:

   ```bash
   php artisan serve
   ```

9. Send requests using Bruno at:

   `http://127.0.0.1:8000`

## 3. API Routes

| # | Request | Expected Status | Description |
|---|---|---|---|
| 1 | `POST /api/register` | `201` | Register user |
| 2 | `POST /api/login` | `200` | Log in user |
| 3 | `GET /api/perfumes` | `401` | Unauthorized check |
| 4 | `GET /api/perfumes` | `200` | Fetch perfumes (Authenticated) |
| 5 | `POST /api/perfumes` | `201` | Create perfume |
| 6 | `POST /api/perfumes` | `422` | Validation error |
| 7 | `GET /api/perfumes/1` | `200` | Fetch single perfume |
| 8 | `GET /api/perfumes/99999` | `404` | Non-existent perfume |
| 9 | `PUT /api/perfumes/1` | `200` | Update perfume |
| 10 | `DELETE /api/perfumes/1` | `204` | Delete perfume |

## 4. Screenshots of API Testing

### Request 1 — Register a User
Expected status: `201 Created`

![Request 1](screenshots/Request%201.png)

### Request 2 — Login
Expected status: `200 OK`

![Request 2](screenshots/Request%202.png)

### Request 3 — Get Perfumes Without a Token
Expected status: `401 Unauthorized`

![Request 3](screenshots/Request%203.png)

### Request 4 — Get Perfumes With a Token
Expected status: `200 OK`

![Request 4](screenshots/Request%204.png)

### Request 5 — Create a Perfume
Expected status: `201 Created`

![Request 5](screenshots/Request%205.png)

### Request 6 — Missing Required Field
Expected status: `422 Unprocessable Content`

![Request 6](screenshots/Request%206.png)

### Request 7 — Get One Perfume
Expected status: `200 OK`

![Request 7](screenshots/Request%207.png)

### Request 8 — Get a Nonexistent Perfume
Expected status: `404 Not Found`

![Request 8](screenshots/Request%208.png)

### Request 9 — Update a Perfume
Expected status: `200 OK`

![Request 9](screenshots/Request%209.png)

### Request 10 — Delete a Perfume
Expected status: `204 No Content`

![Request 10](screenshots/Request%2010.png)

## 5. Why Does DELETE Return 204 Instead of 200?

A `204 No Content` status means that the request was successful, but there is no response body to return. When a perfume is deleted, the API does not need to send the deleted record back to the client. A `200 OK` response is also used for successful requests, usually when the server returns information or a message. Using `204` makes it clear that the deletion succeeded and there is no additional content in the response.
