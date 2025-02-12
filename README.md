# Location App - PHP Developer Assessment

This project is a Laravel-based application designed to manage locations, display them on a map, and calculate routes between them. The application follows a layered architecture, uses Docker for containerization, and includes features like rate limiting, validation, and ORM usage.

## Table of Contents

1. Installation

2. Docker Setup

3. Environment Configuration

4. API Documentation

5. Testing

6. Deployment

7. Features

8. Technologies Used

## Docker Setup

To run the Location App using Docker, follow these steps:

1. Ensure Docker is installed:
   Make sure Docker and Docker Compose are installed on your machine.

2. Build and run the Docker containers:

```bash
docker-compose up --build
```

3. Run the migrations:

```bash
docker-compose exec location-app
 php artisan migrate --seed
```

4. Access the application:

-   The app will be available at `http://localhost:8000`.
-   PHPMyAdmin will be available at `http://localhost:8080`.

## Installation

To get started with the Location App, follow these steps:

1. Clone the repository:

```bash
git clone https://github.com/your-repo/location-app.git
cd location-app
```

2. Install Composer dependencies:

```bash
composer install
```

3. Set up the .env file:

```bash
cp .env.example .env
```

4. Generate

```bash
php artisan key:generate
```

## Environment Configuration

The .env file contains the necessary environment variables for the application. Below are the key configurations:

### Database Configuration

```bash
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=location-app
DB_USERNAME=root
DB_PASSWORD=fatih1234
```

### Api Configuration

```bash
API_KEY=your_generated_api_key_here
API_RATE_LIMIT=60
API_RATE_DECAY=1
```

### API Rate Limiting

The application uses Laravel's built-in rate limiting feature to prevent abuse. The rate limit is set to 60 requests per minute. If the limit is exceeded, the application will return a 429 status code.

## API Documentation

The API endpoints are documented in Postman. You can access the collection here:
Postman Collection Link - https://dark-station-425448.postman.co/workspace/LocationAppCase~fb1c6b2a-0b03-4bc4-aa7a-53799353500e/collection/20110215-e2b7aca6-4d6b-4bbe-acc9-4a26b1e05d70?action=share&creator=20110215

### Key Endpoints:

1. List Locations

##### GET `/api/locations`

-   Returns a paginated list of locations.

2. Create Location

##### POST `/api/locations`

-   Adds a new location with name, latitude, longitude, and marker color.

3. Get Location Details

#### GET `/api/locations/{id}`

-   Returns details of a specific location.

4. Update Location

#### PUT `/api/locations/{id}`

-   Updates an existing location.

5. Delete Location

#### DELETE `/api/locations/{id}`

-   Deletes a location.

6. Calculate Route

#### POST `/api/route`

-   Calculates the optimal route between two points using the A\* algorithm.

## Testing

To run the tests, use the following command:

```bash
./vendor/bin/pest
```

## Features

The Location App includes the following features:

1. Location Management:

-   Add, edit, delete, and list locations.
-   Each location includes a name, latitude, longitude, and marker color.

2. Route Calculation:

-   Calculate the optimal route between two points using the A\* algorithm.
-   Display the route on a map.

3. Rate Limiting:

-   API requests are rate-limited to prevent abuse.

4. Validation:

-   Input validation for all API endpoints.

5. Layered Architecture:

-   The application follows a layered architecture with controllers, services, and repositories.
