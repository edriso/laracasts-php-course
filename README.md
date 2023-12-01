# PHP Course - Laracasts

Welcome to my repository for the "PHP for Beginners" course on Laracasts. Here, you'll find my code and progress as I work through the various sections of the course.

**[Course Link](https://laracasts.com/series/php-for-beginners-2023-edition)**

## Overview

The course is organized into distinct sections, and each section might has its own dedicated branch. This structure allows for easy navigation and exploration of specific topics.

### Prerequisites

Before you begin, ensure you have the following software installed on your system:

- [PHP](https://www.php.net/) (Hypertext Preprocessor)
- [MySQL](https://www.mysql.com/) (or any other compatible relational database)
- [Composer](https://getcomposer.org/) (Dependency Manager for PHP)

Make sure to have these prerequisites installed to run the project successfully. If any of these components is missing, follow the provided links to download and install them.

## Getting Started

To get started, follow these steps:

1. Clone the repository:

   ```bash
   git clone https://github.com/edriso/laracasts-php-course.git
   ```

2. Navigate to the project directory:

   ```bash
   cd laracasts-php-course
   ```

3. Install dependencies:

   ```bash
   composer install
   ```

4. Run the start script with no timeout:

   ```bash
   composer run-script start --timeout=0
   ```

5. Update the database configuration:

   Open the `config.php` file in the `config` directory and modify the database connection details according to your setup:

   ```php
      'database' => [
         'host' => 'your_database_host',
         'port' => 'your_database_port',
         'dbname' => 'your_database_name',
         'user' => 'your_database_user',
         'password' => 'your_database_password',
         'charset' => 'utf8mb4'
      ],
   ```

   Replace `'your_database_host'`, `'your_database_port'`, `'your_database_name'`, `'your_database_user'`, and `'your_database_password'` with the actual details of your database server.

```
Note: Make sure you have PHP, MySQL, and Composer installed.
```

Feel free to explore the code, follow along with the course, and switch branches to delve into different sections of the PHP learning journey.

Happy coding!
