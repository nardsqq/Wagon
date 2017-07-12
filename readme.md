<p align="center"><img src="https://img.shields.io/badge/phase-capstone-blue.svg"> <img src="https://img.shields.io/badge/estimated--progress-35%25-red.svg"></img> <a href=""><img src="https://img.shields.io/badge/issues-0-brightgreen.svg"></img></a> </img> <img src="https://img.shields.io/badge/maintenance-80%25-green.svg"></img> <img src="https://img.shields.io/badge/transactions-0%25-red.svg"></img> <img src="https://img.shields.io/badge/reports-0%25-red.svg"></img></p>
[![All Contributors](https://img.shields.io/badge/all_contributors-1-orange.svg?style=flat-square)](#contributors)

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
    - Add New Client
    - Add New Ship
2. **Processes**
    - New Inquiry
    - Create Quotation
    - New Purchase Order
    - New Job Order
    - Set Delivery Schedule
    - Set Job Deployment Schedule
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
2. Generate a new APP_KEY via `php artisan key:generate` artisan command.
3. Start your local server with the `php artisan serve` artisan command.
4. Open any modern browsers (Chrome, Firefox, Edge etc) and access the application by typing `http://localhost:8080/admin/dashboard` on your address bar.

## Contributors

Thanks goes to these wonderful people ([emoji key](https://github.com/kentcdodds/all-contributors#emoji-key)):

<!-- ALL-CONTRIBUTORS-LIST:START - Do not remove or modify this section -->
| [<img src="https://avatars2.githubusercontent.com/u/3869412?v=3" width="100px;"/><br /><sub>Jeroen Engels</sub>](https://github.com/jfmengels)<br />[📖](https://github.com/nardsqq/Wagon/commits?author=jfmengels "Documentation") |
| :---: |
<!-- ALL-CONTRIBUTORS-LIST:END -->

This project follows the [all-contributors](https://github.com/kentcdodds/all-contributors) specification. Contributions of any kind welcome!