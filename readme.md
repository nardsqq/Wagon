## Marine and Industrial Sales and Services Management System

### Cloning the Repository
1. Under the repository name, click **Clone or Download**.
2. In the Clone with HTTPs section, click the *copy icon* to copy the clone URL for the repository.
3. Open Git Bash.
4. Change the current working directory to the location where you want the cloned directory to be made.
5. Type `git clone`, and then paste the URL you copied in Step 2.
6. Press Enter. Your local clone will be created.

### Installing Dependencies
1. Run the following commands on Git CMD or Windows Powershell (Run within the project's folder):
    - `composer install` - To install required composer dependencies
    - `npm install` - To install the default Laravel packages
    - `npm run dev` - To run all Laravel Mix tasks
2. Access XAMPP or other cross-platform web servers (WAMP, MAMP, EasyPHP etc).
3. Start your local server's Apache and MySQL service.

### Getting Started

#### Database

1. Run `php -r "file_exists('.env') || copy('.env.example', '.env')";` on the command shell to copy the existing `.env.example` file within the project folder. Fill in the fresh `.env` copy with your own configurations.
2. Create a new database with `phpMyAdmin`. Use `dbmissms` for your database name.
3. Migrate your tables using the `php artisan migrate --seed` artisan command.
4. This will forward engineer the schema and it will make the database accessible through `localhost/phpMyAdmin`.

#### Usage

1. After *migrating*, execute a separate command shell within the project folder.
2. Generate a new APP_KEY via `php artisan key:generate` artisan command.
3. Run `php artisan serve` on the command shell.
4. Open any modern browsers (Chrome, Firefox, Edge etc) and access the application by typing `http://localhost:8000` on your address bar.

#### Note to Contributors

1. Always pull the latest commit from the remote repository to avoid problems.
2. Check for `[NPM]` and `[COMP]` tags. If a commit has one or both of these tags, execute `npm run dev` and/or `composer install` commands on the shell to install and/or compile assets.
3. **BUG REPORTS** and **CONTRIBUTIONS** are always welcome.
4. To submit a bug report, please go to issue [[#2]](https://github.com/nardsqq/Wagon/issues/2) and read the instructions.
