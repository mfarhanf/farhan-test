# Claim Submission

## Prerequisites

- PHP 8 or more.
- Node v18.9.0 or more.
- MySQL.
- Docker Desktop. Download [here](https://www.docker.com/products/docker-desktop/).

## Installation

How to run this project

1. Clone the repo

    ```zsh
    git clone https://github.com/mfarhanf/farhan-test.git
    ```

2. Move to the project directory

    ```zsh
    cd farhan-test
    ```

3. Run composer install

    ```zsh
    composer install
    ```

4. Create .env file from .env.example. Update everything you need.

5. Create an alias for sail

    ```zsh
    alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
    ```

6. Run the server using sail

    ```zsh
    sail up -d
    ```

7. Create database schema.

8. Generate app key

    ```zsh
    sail artisan key:generate
    ```

9. Run the migration file

    ```zsh
    sail artisan migrate
    ```

10. Run the seeder file

    ```zsh
    sail artisan db:seed
    ```

11. Install node module

    ```zsh
    npm install
    ```

12. Run npm

    ```zsh
    npm run dev
    ```

13. Access `http://localhost/` on your browser.

## Test

1. Run npm build

    ```zsh
    npm run build
    ```

2. Run the test

    ```zsh
    sail artisan test
    ```
