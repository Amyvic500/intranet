# Intranet Application

A Laravel-based intranet system designed for internal company communication and management. This application facilitates user interactions, departmental organization, messaging, and tracking of visits within a corporate environment.

## Features

- **User Management**: Handle user accounts, authentication, and profiles.
- **Departments**: Organize users into departments for better structure.
- **Companies**: Manage multiple companies or subsidiaries.
- **Messaging**: Enable internal messaging between users.
- **Locations**: Track and manage physical locations.
- **Links**: Share and manage useful internal links.
- **Visit Logs**: Log and monitor user visits for analytics.

Built with Laravel, this app leverages expressive syntax for routing, ORM, migrations, and more.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-repo/intranet.git
   cd intranet
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Copy the environment file and configure:
   ```bash
   cp .env.example .env
   # Edit .env with your database credentials (e.g., DB_DATABASE=intranet, DB_USERNAME=intranet_user, DB_PASSWORD=secret@2026!)
   ```

4. Generate application key:
   ```bash
   php artisan key:generate
   ```

5. Run migrations:
   ```bash
   php artisan migrate
   ```

6. Seed the database (if applicable):
   ```bash
   php artisan db:seed
   ```

7. Start the development server:
   ```bash
   php artisan serve
   ```

## Usage

- Access the app at `http://localhost:8000`.
- Register/login as a user.
- Navigate through departments, send messages, and view logs.

## Contributing

Contributions are welcome! Please follow Laravel's contribution guidelines.

## License

This project is licensed under the MIT License.