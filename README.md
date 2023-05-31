# Task Management System

This is a task management system built with Laravel 10 and PHP 8, allowing users to create, update, and manage their tasks.

## Installation Steps

1. Clone the project repository

2. Install the necessary prerequisites:
- Ensure that PHP is installed on your system.
- Install Composer, a dependency management tool for PHP.
- Set up a web server (e.g., Apache or Nginx) with the required PHP extensions.

3. Environment Configuration:
- Duplicate the `.env.example` file and rename it as `.env`.
- Open the `.env` file and configure the necessary environment variables, such as database connection details and application-specific settings.
- Generate a new application key by running the following command:
  ```
  php artisan key:generate
  ```

4. Dependency Installation:
- Install the project dependencies by running the following command:
  ```
  composer install
  npm install
  ```

5. Database Setup:
- Create a new database for the project if it doesn't exist.
- Update the `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` values in the `.env` file to match your database configuration.
- Run the necessary migrations to set up the database schema:
  ```
  php artisan migrate
  ```

6. Serve the Application:
- Start the development server by running the following command:
  ```
  php artisan serve
  npm run dev
  ```
- Access the application in your browser using the specified URL.

## Conclusion

You have successfully set up and run the Task Management System locally. Now you can manage your tasks efficiently and stay organized. Enjoy!

