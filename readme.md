<p align="center"><img src="https://img.shields.io/badge/phase-capstone-blue.svg"> <img src="https://img.shields.io/badge/estimated--progress-35%25-red.svg"></img> <a href=""><img src="https://img.shields.io/badge/issues-0-brightgreen.svg"></img></a> </img> <img src="https://img.shields.io/badge/maintenance-80%25-green.svg"></img> <img src="https://img.shields.io/badge/transactions-0%25-red.svg"></img> <img src="https://img.shields.io/badge/reports-0%25-red.svg"></img></p>

## Marine Sales and Services Management System

### Maintenance
1. **Sales Management Sub-System**
    1. Product
        - Product Category
        - Product Maintenance
    2. Inventory
        - Inventory Status
        - Inventory Management
2. **Personnel and Services Management Sub-System**
    1. Personnel
        - Department List Maintenance
        - Personnel Position Management
        - Personnel Information Maintenance
    2. Services
        - Service Category Maintenance
        - Service Management

### Transaction (Not Final)
1. **Client and Ship**
    - Clients
2. **Processes**
    - Inquiries
    - Quotations
    - Sales Orders
    - Job Orders
    - Sales Invoice
3. **Logistics**
    - Create Vehicle Request
    - New OB and Itinerary Form
    - Create Gate Pass

### Reports (Not Final)
   - Sales Report
   - Status Report
   - Service Ticket

### Cloning the Repository
1. Under the repository name, click **Clone or Download**.
2. In the Clone with HTTPs section, click the *copy icon* to copy the clone URL for the repository.
3. Open Git Bash.
4. Change the current working directory to the location where you want the cloned directory to be made.
5. Type `git clone`, and then paste the URL you copied in Step 2.
6. Press Enter. Your local clone will be created.

### Database

#### Via Forward Engineering (.mwb)

For the meantime, we'll be using the .mwb file attached within the project folder for our database. If you have MySQL Workbench, just open the .mwb file with it.

1. Open *dbSAD.mwb* with Workbench.
2. Access your local MySQL server with XAMPP or other cross-platform web server (WAMP, MAMP, EasyPHP etc).
3. After starting your local server's MySQL service, go back to MySQL Workbench.
4. Hit Ctrl + G (Shortcut for *Forward Engineer*) or via *Database* > *Forward Engineer* on your toolbar/ribbon.
5. This will forward engineer the schema and it will make the database accessible through phpMyAdmin.

### Getting Started

1. After *forward engineering*, open the terminal on your computer.
2. Run `php -r "file_exists('.env') || copy('.env.example', '.env')";`
3. Generate a new APP_KEY via `php artisan key:generate` artisan command.
4. Start your local server with the `php artisan serve` artisan command.
5. Open any modern browsers (Chrome, Firefox, Edge etc) and access the application by typing `http://localhost:8080/admin/dashboard` on your address bar.

## Contributors

| [<img src="https://avatars1.githubusercontent.com/u/21337635?v=3" width="100px;"/><br /><sub>Nards Paragas</sub>](https://github.com/nardsqq)<br />[💻](https://github.com/nardsqq/Wagon/commits?author=nardsqq "Code") [🎨](#design-nardsqq "Design") [🐛](https://github.com/nardsqq/Wagon/commits?author=nardsqq "Bug reports") [💬](#question-nardsqq "Answering Questions") | [<img src="https://avatars0.githubusercontent.com/u/27922595?v=3" width="100px;"/><br /><sub>Tyron delos Reyes</sub>](https://github.com/tyrondelosreyes1231)<br />[📖](https://github.com/nardsqq/Wagon/commits?author=tyrondelosreyes1231 "Documentation") [💬](#question-tyrondelosreyes1231 "Answering Questions") [🐛](https://github.com/nardsqq/Wagon/commits?author=tyrondelosreyes1231 "Bug reports") | [<img src="https://scontent.fmnl3-1.fna.fbcdn.net/v/t1.0-9/12963893_1337384862944273_4644683256201767445_n.jpg?oh=e890a03312b6148b3c38ae4b2ec317f3&oe=59CC0A92" width="100px;"/><br /><sub>Xandra Subiera</sub>](https://github.com/Xandra03)<br />[💻](https://github.com/nardsqq/Wagon/commits?author=Xandra03 "Code") [🎨](#design-Xandra03 "Design") [📖](https://github.com/nardsqq/Wagon/commits?author=Xandra03 "Documentation")  [🐛](https://github.com/nardsqq/Wagon/commits?author=Xandra03 "Bug reports") | [<img src="https://scontent.fmnl3-1.fna.fbcdn.net/v/t1.0-9/13892371_1112048165505142_8867362947989032359_n.jpg?oh=75eaab617784701da7a70912891baff3&oe=5A118D57" width="100px;"/><br /><sub>Alvin Caparas</sub>](https://github.com/alvincaparas005)<br />[📖](https://github.com/nardsqq/Wagon/commits?author=alvincaparas005 "Documentation") [🐛](https://github.com/nardsqq/Wagon/commits?author=alvincaparas005 "Bug reports") | [<img src="https://scontent.fmnl3-1.fna.fbcdn.net/v/t1.0-9/15726514_1643689258990158_5520965767133423382_n.jpg?oh=a408f3a1875cb129acabe3b3e4e4c2d4&oe=5A07D6E2" width="100px;"/><br /><sub>Junelle Lim</sub>](https://github.com/junellelim)<br />[📖](https://github.com/nardsqq/Wagon/commits?author=junellelim "Documentation") [🐛](https://github.com/nardsqq/Wagon/commits?author=junellelim "Bug reports") | [<img src="https://avatars0.githubusercontent.com/u/20976789?v=3&s=460" width="100px;"/><br /><sub>Amiel Golosinda</sub>](https://github.com/vxzry)<br /> [🐛](https://github.com/nardsqq/Wagon/commits?author=vxzry "Bug reports") | [<img src="https://avatars3.githubusercontent.com/u/20827792?v=3&s=460" width="100px;"/><br /><sub>W. Moscoso</sub>](https://github.com/wandseu)<br /> [🐛](https://github.com/nardsqq/Wagon/commits?author=wandseu "Bug reports")
| :---: | :---: | :---: | :---: | :---: | :---: | :---: |
