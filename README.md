
# Perfume Collection API

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
   git clone [YOUR_REPOSITORY_URL]
   ```

2. Navigate to the project directory:

   ```bash
   cd perfume-api
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

| Method | Path | Description | Token Required? |
|---|---|---|---|
| POST | `/api/register` | Register a new user and return a token | No |
| POST | `/api/login` | Authenticate a user and return a token | No |
| POST | `/api/logout` | Log out by revoking the current token | Yes |
| GET | `/api/me` | Retrieve the authenticated user's information | Yes |
| GET | `/api/perfumes` | Retrieve all perfumes or filter by brand and scent | Yes |
| POST | `/api/perfumes` | Create a new perfume | Yes |
| GET | `/api/perfumes/{perfume}` | Retrieve one perfume by ID | Yes |
| PUT | `/api/perfumes/{perfume}` | Update an existing perfume | Yes |
| DELETE | `/api/perfumes/{perfume}` | Delete a perfume | Yes |


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
