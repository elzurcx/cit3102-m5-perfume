# CIT 3102: Systems Integration and Architecture
## Midterms – Activity 2: Build Your Own API

## 1. Project Information

- **Project Title:** Perfume Collection API
- **Name:** Elica Laureen S. Cruz
- **Section:** IT3E
- **Chosen Resource:** Perfume Collection

### Project Description

The Perfume Collection API is a REST API built using Laravel. It allows users to register, log in, and manage perfume records. Each perfume contains five fields: name, brand, scent, price, and volume. Users can create, view, update, delete, and filter perfume records by brand and scent. Laravel Sanctum is used to authenticate users through bearer tokens and protect the API routes that require authorization.

## 2. Setup Instructions

### Requirements

- PHP
- Composer
- Git
- Laravel dependencies
- SQLite
- Bruno or Postman for API testing

### Steps to Run the Project

**Step 1: Clone the repository**

```bash
git clone https://github.com/elzurcx/cit3102-m5-perfume.git
```

**Step 2: Open the project folder**

```bash
cd cit3102-m5-perfume
```

**Step 3: Install the dependencies**

```bash
composer install
```

**Step 4: Create the environment file**

For Windows Command Prompt:

```cmd
copy .env.example .env
```

For macOS or Linux:

```bash
cp .env.example .env
```

**Step 5: Generate the application key**

```bash
php artisan key:generate
```

**Step 6: Configure the SQLite database**

Open the `.env` file and make sure the database connection is set to SQLite:

```env
DB_CONNECTION=sqlite
```

Make sure the database file exists at `database/database.sqlite`. If it does not exist, create an empty file with that name inside the `database` folder.

**Step 7: Run the database migrations**

```bash
php artisan migrate
```

This creates the database tables required by the application. If the project includes additional setup or seed commands, follow the project's existing configuration.

**Step 8: Start the Laravel server**

```bash
php artisan serve
```

The API will normally be available at:

`http://127.0.0.1:8000`

**Step 9: Test the API using Bruno**

Open the requests in Bruno and send them to the API URL. Register a user first, then log in to obtain a bearer token.

For protected requests, open the **Auth** tab, select **Bearer Token**, and enter the token returned by the login request.

## 3. API Routes

| # | Method | Path | Description | Token Required? |
|---|---|---|---|---|
| 1 | POST | `/api/register` | Register a new user | No |
| 2 | POST | `/api/login` | Log in and receive an authentication token | No |
| 3 | POST | `/api/logout` | Log out and revoke the current token | Yes |
| 4 | GET | `/api/me` | Retrieve the authenticated user's information | Yes |
| 5 | GET | `/api/perfumes` | Retrieve all perfumes or filter by brand and scent | Yes |
| 6 | POST | `/api/perfumes` | Create a new perfume record | Yes |
| 7 | GET | `/api/perfumes/{perfume}` | Retrieve a specific perfume by ID | Yes |
| 8 | PUT | `/api/perfumes/{perfume}` | Update an existing perfume | Yes |
| 9 | DELETE | `/api/perfumes/{perfume}` | Delete a perfume record | Yes |

### Filtering Examples

The API supports filtering perfume records using query parameters.

Retrieve all perfumes:

```http
GET /api/perfumes
```

Filter perfumes by brand:

```http
GET /api/perfumes?brand=Zara
```

Filter perfumes by scent:

```http
GET /api/perfumes?scent=Vanilla
```

Filter perfumes by both brand and scent:

```http
GET /api/perfumes?brand=Zara&scent=Vanilla
```

These requests must include a valid bearer token because the perfume routes are protected by Sanctum.

## 4. Screenshots of API Testing

The following screenshots demonstrate the ten requests required by the activity. Each screenshot should show the request details and the response status code in Bruno.

### Request 1 — Register a User

Expected status: `201 Created`

![Request 1](screenshots/Request%201.png)

### Request 2 — Log In a User

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

### Request 6 — Create a Perfume With a Required Field Missing

Expected status: `422 Unprocessable Content`

![Request 6](screenshots/Request%206.png)

### Request 7 — Get a Single Perfume

Expected status: `200 OK`

![Request 7](screenshots/Request%207.png)

### Request 8 — Get a Non-Existent Perfume

Expected status: `404 Not Found`

![Request 8](screenshots/Request%208.png)

### Request 9 — Update a Perfume

Expected status: `200 OK`

![Request 9](screenshots/Request%209.png)

### Request 10 — Delete a Perfume

Expected status: `204 No Content`

![Request 10](screenshots/Request%2010.png)

## 5. Why Does DELETE Return 204 and Not 200?

DELETE returns `204 No Content` because the perfume has been successfully deleted and the API does not need to send anything else in the response. A `200 OK` response can include a message or other data to show that the request was successful. In our API, using `204` means the deletion worked and there is no response body to display. Both status codes indicate success, but `204` is suitable when the server has nothing more to return.
