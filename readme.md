<p align="center"><img src="https://img.shields.io/badge/phase-capstone-blue.svg"> <img src="https://img.shields.io/badge/estimated--progress-35%25-red.svg"></img> </img> <img src="https://img.shields.io/badge/maintenance-80%25-green.svg"></img> <img src="https://img.shields.io/badge/transactions-10%25-red.svg"></img> <img src="https://img.shields.io/badge/reports-0%25-red.svg"></img></p>

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

### Database

#### Via Forward Engineering (.mwb)

For the meantime, we'll be using the .mwb file attached within the project folder for our database. If you have MySQL Workbench, just open the .mwb file with it.

1. Open *dbSAD.mwb* with Workbench.
2. Hit Ctrl + G (Shortcut for *Forward Engineer*) or via *Database* > *Forward Engineer* on your toolbar/ribbon.
3. This will forward engineer the schema and it will make the database accessible through `localhost/phpMyAdmin`.

### Configurations

For development purposes, we need to configure our Apache environment.

1. Proceed to `C:\Windows\System32\drivers\etc` and open `hosts` with a text editor then add this line at the bottom: `127.0.0.1  localhost wagon.dev`
2. Afterwards, go to `C:\xampp\apache\conf\extra` and configure `httpd-vhosts.conf` with a text editor. 
3. Add the following at the bottom of `httpd-vhosts.conf` file

        <VirtualHost *:80>
            DocumentRoot "D:/xampp/htdocs/"
            ServerAdmin admin@localhost
            ServerName localhost

            <Directory "D:/xampp/htdocs/">
               Options Indexes FollowSymLinks
               AllowOverride all
               Require local
            </Directory>
        </VirtualHost>

        <VirtualHost *:80>
            DocumentRoot "C:/xampp/htdocs/WagonMS/public"
            ServerAdmin admin@localhost
            ServerName wagon.dev
            ServerAlias www.wagon.dev

            <Directory "C:/xampp/htdocs/WagonMS/public">
               AllowOverride All
               Options Indexes FollowSymLinks
               Require local
            </Directory>
        </VirtualHost>


### Getting Started

1. After *forward engineering*, open the terminal in your project's folder.
2. Run `php -r "file_exists('.env') || copy('.env.example', '.env')";`
3. Generate a new APP_KEY via `php artisan key:generate` artisan command.
4. Open any modern browsers (Chrome, Firefox, Edge etc) and access the application by typing `http://wagon.dev/admin` on your address bar.

## Contributors

| [<img src="https://avatars0.githubusercontent.com/u/21337635?v=4&s=460" width="100px;"/><br /><sub>Nards Paragas</sub>](https://github.com/nardsqq)<br />[💻](https://github.com/nardsqq/Wagon/commits?author=nardsqq "Code") [🎨](#design-nardsqq "Design") [🐛](https://github.com/nardsqq/Wagon/commits?author=nardsqq "Bug reports") [💬](#question-nardsqq "Answering Questions") | [<img src="https://avatars0.githubusercontent.com/u/27922595?v=3" width="100px;"/><br /><sub>Tyron delos Reyes</sub>](https://github.com/tyrondelosreyes1231)<br />[📖](https://github.com/nardsqq/Wagon/commits?author=tyrondelosreyes1231 "Documentation") [💬](#question-tyrondelosreyes1231 "Answering Questions") [🐛](https://github.com/nardsqq/Wagon/commits?author=tyrondelosreyes1231 "Bug reports") | [<img src="https://avatars3.githubusercontent.com/u/21981591?v=3&s=460" width="100px;"/><br /><sub>Xandra Subiera</sub>](https://github.com/Xandra03)<br />[💻](https://github.com/nardsqq/Wagon/commits?author=Xandra03 "Code") [🎨](#design-Xandra03 "Design") [📖](https://github.com/nardsqq/Wagon/commits?author=Xandra03 "Documentation")  [🐛](https://github.com/nardsqq/Wagon/commits?author=Xandra03 "Bug reports") | [<img src="https://scontent.fmnl3-1.fna.fbcdn.net/v/t1.0-9/13892371_1112048165505142_8867362947989032359_n.jpg?oh=75eaab617784701da7a70912891baff3&oe=5A118D57" width="100px;"/><br /><sub>Alvin Caparas</sub>](https://github.com/alvincaparas005)<br />[📖](https://github.com/nardsqq/Wagon/commits?author=alvincaparas005 "Documentation") [🐛](https://github.com/nardsqq/Wagon/commits?author=alvincaparas005 "Bug reports") | [<img src="https://scontent.fmnl3-1.fna.fbcdn.net/v/t1.0-9/15726514_1643689258990158_5520965767133423382_n.jpg?oh=a408f3a1875cb129acabe3b3e4e4c2d4&oe=5A07D6E2" width="100px;"/><br /><sub>Junelle Lim</sub>](https://github.com/junellelim)<br />[📖](https://github.com/nardsqq/Wagon/commits?author=junellelim "Documentation") [🐛](https://github.com/nardsqq/Wagon/commits?author=junellelim "Bug reports") | [<img src="https://avatars0.githubusercontent.com/u/20976789?v=4&s=400" width="100px;"/><br /><sub>Amiel Golosinda</sub>](https://github.com/vxzry)<br /> [💻](https://github.com/nardsqq/Wagon/commits?author=vxzry "Code") [🐛](https://github.com/nardsqq/Wagon/commits?author=vxzry "Bug reports") [💬](#question-vxzry "Answering Questions") | [<img src="https://avatars1.githubusercontent.com/u/20827792?v=4&s=460" width="100px;"/><br /><sub>W. Moscoso</sub>](https://github.com/wandseu)<br /> [🐛](https://github.com/nardsqq/Wagon/commits?author=wandseu "Bug reports")
| :---: | :---: | :---: | :---: | :---: | :---: | :---: |
