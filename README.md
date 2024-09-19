# My PHP Project with Doctrine, Dotenv, and Klein

This project is a simple PHP application that uses Doctrine ORM for database interactions, Dotenv for environment variable management, and Klein for routing. The application follows clean architecture principles and uses dependency injection for better maintainability and testability.

## Prerequisites

- PHP 7.4 or higher
- Composer
- MySQL or compatible database

## Installation

1. Clone the repository:

    ```bash
    git clone https://github.com/your-username/your-repo.git
    cd your-repo
    ```

2. Install dependencies:

    ```bash
    composer install
    ```

3. Create a `.env` file in the root of your project directory and configure your environment variables:

    ```ini
    DB_DRIVER=pdo_mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=mydb
    DB_USERNAME=root
    DB_PASSWORD=
    ```

4. Create the database schema:

    ```bash
    vendor/bin/doctrine orm:schema-tool:create
    ```

## Usage

1. Start a local PHP server:

    ```bash
    php -S localhost:8000 -t public
    ```

2. Access the application in your browser:

    - Create a new product: `POST /product/create` with parameters `name`, `price`, and `description`
    - Get a product by ID: `GET /product/{id}`
    - Get all products: `GET /`

## Project Structure

- `src/Domain/Entity/`: Contains Doctrine entities.
- `src/Infrastructure/Repository/`: Contains repository classes for database interactions.
- `src/Application/Service/`: Contains service classes for business logic.
- `src/Controller/`: Contains controller classes for handling HTTP requests.
- `config/`: Contains configuration files, including routing and dependency injection.
- `public/`: Contains the entry point of the application.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.