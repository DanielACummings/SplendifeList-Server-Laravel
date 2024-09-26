# Grocery List Manager Laravel API
## Common Commands
- Build & serve
    - `php artisan serve`
- Update DB after model updates in code
    - `php artisan migrate`

## Setup
- `composer install`
- `composer create-project --prefer-dist laravel/laravel [project-name]`
- `php artisan key:generate` (1-time creation of app key)
- Create DB tables based on models code
    - `php artisan migrate`
- Make sure .env file variables match MySQL setup


## Dependencies
- PHP
    - `sudo apt install php php-mysql php-xml`
- Composer
    - TODO
- Laravel
    - TODO

## MySQL
### Setup
- Installing with APT: see [MySQL documentation](https://dev.mysql.com/doc/mysql-apt-repo-quick-guide/en/)
    - Use "ubuntu lunar" option for APT setup. Most recommendations onlin said to use "ubuntu jammy", but that resulted in a dependency on a package that couldn't be downloaded
- Create user with username and password of "laravel" in MySQL terminal
    - `sudo mysql -u root`
    - `CREATE USER 'laravel'@'localhost' IDENTIFIED BY 'laravel';`
    - `GRANT ALL PRIVILEGES ON laravel.* TO 'laravel'@'localhost';`
    - `FLUSH PRIVILEGES;`
- Start MySQL server
    - `sudo service mysql start`
- Check if server is running
    - `sudo service mysql status`
- Software versions at time of API creation
    - Linux: Linux Mint 22 Cinnamon with kernel v6.8.0-41-generic
    - MySQL: "Ver 8.0.39-0ubuntu0.24.04.2 for Linux on x86_64 ((Ubuntu))"

### Debugging
- MySQL
    - Check port that server is running on in MySQL terminal
        - `SHOW VARIABLES LIKE 'port';`


#### Errors
- "SQLSTATE[HY000] [1044] Access denied for user '[user being denied access]'@'localhost' to database '[database user is denied access to]'..."
    - Likely fix is to locally use root user to grant permissions to the user being denied access using the following command
          - `GRANT ALL PRIVILEGES ON [db name].* TO '[username]'@'localhost';`
          - Note: Only do this for local development & QA testing
- "SQLSTATE[HY000] [2002] Connection refused (Connection: mysql, SQL..."
    - If the connection string username and password are correct, check in MySQL if the user's authentication is set to the default of the auth_socket plugin
    - If it is, change it to mysql_native_password
    - Using auth_socket requires that the username in the connection string matches that of the user running the program
