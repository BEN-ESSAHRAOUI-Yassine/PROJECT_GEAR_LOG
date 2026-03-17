Project Specification: GearLog (IT Asset Tracker)<br>
Launch Date: Wednesday, March 11, 2026 (Afternoon)<br>
Deadline: Wednesday, March 18, 2026 (Morning)<br>
Objective: Develop a web application to track company hardware inventory, assignments, and repair status.<br>

---------------------------------------------------------------------------------------------------------------
# GearLog structure Diagram
![GearLog Diagram](assets/imgs/PROJECT_STRUCTURE.jpg)
---------------------------------------------------------------------------------------------------------------
# GearLog Use Case Diagram
![GearLog Use Case Diagram](assets/imgs/Diagram_Use_Case.png)
---------------------------------------------------------------------------------------------------------------
# GearLog Activity Diagram
![GearLog Activity Diagram](assets/imgs/Activity_Diagram.png)
---------------------------------------------------------------------------------------------------------------
# GearLog Class Diagram
![GearLog Class Diagram](assets/imgs/Diagram_Class.png)
---------------------------------------------------------------------------------------------------------------
# GearLog Sequence Diagram
![GearLog Sequence Diagram](assets/imgs/Diagram_sequence.png)
---------------------------------------------------------------------------------------------------------------
# Step 0: Understand the Project
  ## Goal:

Understand the project requirements and identify the main features before starting development.

  ## Topics to learn:

* [X]  Project requirement analysis

* [X]  UI planning

* [X]  Feature breakdown

  ## Learning Resources:

* [X]  [Project Documentation](https://docs.google.com/document/d/1me2bY8Id5YQKZjPOpJWLE_PHmpLzw03KlPiJZ1Vmy4w)

  ## Tasks checklist:

* [X]  Read the full project specification.

* [X]  Identify the main features:

    *   Asset inventory tracking

    *   Category system

    *   Dashboard displaying devices

    *   Search functionality

    *   Inventory value calculation

* [X]  Sketch the UI layout on paper. for example :

```text
+---------------------------------------+
| GearLog Dashboard                     |
| Total Inventory Value: $5400          |
| Search: [________________]            |
+---------------------------------------+
| Serial | Device | Category | Status   |
|---------------------------------------|
| SN123  | Dell   | Laptop   | Repair   |
+---------------------------------------+
```
  ## Expected results:

Clear understanding of the application features and a rough interface design before development begins.

# Step 1: SQL Fundamentals
  ## Goal:

Learn the SQL basics required to create and query the project database.

  ## Topics to learn:
```text
 CREATE DATABASE

 CREATE TABLE

 INSERT INTO

 SELECT

 WHERE

 INNER JOIN

 SUM()

 LIKE operator
```
  ## Learning Resources:

* [X]  https://www.w3schools.com/sql/

* [X]  https://sqlbolt.com/

* [X]  https://www.mysqltutorial.org/

  ## Tasks checklist:

* [X]  Practice SQL commands

* [X]  Create simple tables

* [X]  Insert test data

* [X]  Run SELECT queries

  ## Expected results:

Ability to create and query a relational database using SQL.

# Step 2: PHP + MySQL Connection (PDO)
  ## Goal:

Connect PHP to a MySQL database using PDO.

  ## Topics to learn:

* [X]  PDO database connection

* [X]  try/catch error handling

* [X]  executing SQL queries in PHP

  ## Learning Resources:

* [X]  https://phpdelusions.net/pdo

* [X]  https://www.php.net/manual/en/book.pdo.php

* [X]  https://www.w3schools.com/php/php_mysql_connect.asp

  ## Tasks checklist:

* [X]  Create a basic PDO connection script

* [X]  Test connection to MySQL database

* [X]  Handle connection errors with try/catch

  ## Expected results:

A working PHP script that successfully connects to MySQL.

# Step 3: Prepared Statements (Security)
  ## Goal:

Learn how to protect database queries against SQL injection.

  ## Topics to learn:

* [X]  Prepared statements

* [X]  SQL injection prevention

  ## Learning Resources:

* [X]  https://phpdelusions.net/pdo/prepared

* [X]  https://www.php.net/manual/en/pdo.prepared-statements.php

  ## Tasks checklist:

* [X]  Write prepared SQL queries

* [X]  Bind parameters to SQL statements

* [X]  Test secure query execution

  ## Expected results:

Secure SQL queries that prevent injection attacks.

# Step 4: Web Security Basics
  ## Goal:

Understand common web vulnerabilities and how to prevent them.

  ## Topics to learn:

* [X]  Cross-Site Scripting (XSS)

* [X]  htmlspecialchars()

  ## Learning Resources:

* [X]  https://owasp.org/www-community/attacks/xss/

* [X]  https://www.php.net/manual/en/function.htmlspecialchars.php

  ## Tasks checklist:

* [X]  Study XSS attack examples

* [X]  Use htmlspecialchars() when displaying user input

  ## Expected results:

User data displayed safely without exposing the application to XSS attacks.

# Step 5: HTML Forms and Tables
  ## Goal:

Learn how to collect and display data using HTML forms and tables.

  ## Topics to learn:
```text
 form

 input

 select

 table

 form submission (GET / POST)
```
  ## Learning Resources:

* [X]  https://developer.mozilla.org/en-US/docs/Learn/Forms

* [X]  https://www.w3schools.com/html/html_forms.asp

  ## Tasks checklist:

* [X]  Create a basic HTML form

* [X]  Submit form data using POST

* [X]  Display data in an HTML table

  ## Expected results:

Ability to create forms and display structured data in tables.

# Step 6: CSS Layout Basics
  ## Goal:

Style the application interface and improve layout structure.

  ## Topics to learn:

* [ ]  Flexbox layout

* [X]  Basic table styling

* [X]  Conditional styling

  ## Learning Resources:

* [ ]  https://css-tricks.com/snippets/css/a-guide-to-flexbox/

* [ ]  https://developer.mozilla.org/en-US/docs/Web/CSS/flex

  ## Tasks checklist:

* [ ]  Create a simple layout using Flexbox

* [X]  Style HTML tables

* [X]  Apply conditional styles for statuses

  ## Expected results:

A clean and readable user interface.

# Step 7: Project Setup
  ## Goal:

Prepare the local development environment.

  ## Topics to learn:

* [X]  Local server setup

* [X]  XAMPP usage

* [X]  Apache and MySQL services

  ## Learning Resources:

* [X]  [XAMPP Documentation](https://www.apachefriends.org/docs/)

  ## Tasks checklist:

* [X]  Install XAMPP

* [X]  Start Apache and MySQL

* [X]  Create project folder
```text
htdocs/PROJECT_GEAR_LOG
```
* [X]  Test project in browser
```text
http://localhost/PROJECT_GEAR_LOG
```
  ## Expected results:

A working local development environment.

# Step 8: Database Design
  ## Goal:

Design the relational database structure for the application.

  ## Topics to learn:

* [X]  Relational databases

* [X]  Foreign keys

* [X]  Database normalization

  ## Learning Resources:

* [X]  [MySQL documentation](https://www.w3schools.com/sql/)

  ## Tasks checklist:

* [X]  Create database gearlog

* [X]  Create categories table

* [X]  Create assets table

* [X]  Add foreign key relationship

* [X]  Insert sample data

  ## Expected results:

A properly structured database ready for the application.

# Step 9: Database Connection
  ## Goal:

Create a reusable database connection file.

  ## Topics to learn:

* [X]  PHP file inclusion

* [X]  PDO database connection

  ## Learning Resources:

* [X]  [PHP documentation](https://www.w3schools.com/php/)

  ## Tasks checklist:

* [X]  Create db.php

* [X]  Implement PDO connection

* [X]  Use try/catch for error handling

  ## Expected results:

All project pages can access the database through a shared connection file.

# Step 10: Add Asset Form
  ## Goal:

Create a form that allows users to add new assets.

  ## Topics to learn:

* [X]  HTML forms

* [X]  POST requests

  ## Learning Resources:

* [X]  [HTML documentation](https://www.w3schools.com/html/)

  ## Tasks checklist:

* [X]  Create add_asset.php

* [X]  Form fields:

    *   Serial number

    *   Device name

    *   Price

    *   Category

    *   Status

  ## Expected results:

Users can submit new asset information through the web interface.

# Step 11: Insert Assets into Database
  ## Goal:

Store submitted asset data in the database.

  ## Topics to learn:

* [X]  CRUD operations

* [X]  Prepared statements

  ## Learning Resources:

* [X]  [PDO documentation](https://www.php.net/manual/en/pdo.installation.php)

  ## Tasks checklist:

* [X]  Receive form data using $_POST

* [X]  Use prepared statements

* [X]  Insert asset into database

* [X]  Redirect back to dashboard

  ## Expected results:

Assets submitted from the form are saved in the database.

# Step 12: Build the Dashboard
  ## Goal:

Display stored assets in a dashboard interface.

  ## Topics to learn:

* [X]  PHP loops

* [X]  Dynamic HTML generation

  ## Learning Resources:

* [X]  [PHP documentation](https://www.w3schools.com/php/)

  ## Tasks checklist:

* [X]  Create index.php

* [X]  Fetch assets from database

* [X]  Display assets in an HTML table

  ## Expected results:

Users can view all assets from the database in the dashboard.

# Step 13: Implement Relational JOIN
  ## Goal:

Display category names instead of category IDs.

  ## Topics to learn:

* [X]  Relational database queries

* [X]  JOIN operations

  ## Learning Resources:

* [X]  [SQL JOIN documentation](https://www.w3schools.com/sql/sql_join.asp)

  ## Tasks checklist:

* [X]  Write SQL INNER JOIN query

* [X]  Replace category ID with category name

* [X]  Display category names in dashboard

  ## Expected results:

Dashboard shows readable category names instead of IDs.

# Step 14: Inventory Value Calculation
  ## Goal:

Calculate the total value of all assets.

  ## Topics to learn:

* [X]  SQL aggregate functions

  ## Learning Resources:

* [X]  [SQL documentation](https://www.w3schools.com/sql/)

  ## Tasks checklist:

* [X]  Use SQL SUM(price)

* [X]  Display total inventory value on dashboard

  ## Expected results:

Dashboard shows the total inventory value.

# Step 15: Search Functionality
  ## Goal:

Allow users to search assets in the system.

  ## Topics to learn:

* [X]  Dynamic SQL queries

* [X]  Filtering results

  ## Learning Resources:

* [X]  [SQL documentation](https://www.w3schools.com/sql/)

  ## Tasks checklist:

* [X]  Add search bar

* [X]  Capture search input

* [X]  Use SQL LIKE query

* [X]  Filter assets by name or serial number

  ## Expected results:

Users can search for specific assets.

# Step 16: Conditional Styling
  ## Goal:

Improve UI readability using color-coded statuses.

  ## Topics to learn:

* [X]  CSS classes

* [X]  Conditional styling

  ## Learning Resources:

* [X]  [CSS documentation](https://www.w3schools.com/CSS/)

  ## Tasks checklist:

* [X]  Apply colors based on asset status:
```text
        Not available → red

        Under Repair → orange

        Deployed → blue

        Available → green
```
  ## Expected results:

Asset status is visually distinguishable.

# Step 17: Security Implementation

  ## Goal:

Ensure the application follows secure coding practices.

  ## Topics to learn:

* [X]  Security Measures :some basic OWASP security practices:

    *   SQL Injection prevention using PDO prepared statements
    *   Cross-Site Scripting (XSS) prevention using htmlspecialchars()

  ## Learning Resources:

* [X]  [PDO Prepared statements](https://www.php.net/manual/en/pdo.prepared-statements.php)

* [X]  [htmlspecialchars](https://www.php.net/manual/en/function.htmlspecialchars.php)

  ## Tasks checklist:

* [X]  Use prepared statements everywhere

* [X]  Sanitize outputs using htmlspecialchars()

* [X]  Avoid direct SQL variable injection

  ## Expected results:

The application is protected from common web vulnerabilities.

# Step 18: Project Organization

  ## Goal:

Organize project files into a clear structure.

  ## Topics to learn:

* [X]  [Project structuring ](https://academy.recforge.com/#/course/php-language-mastery-480/level-9-building-a-complete-web-application/setting-up-the-project-structure)

* [X]  [Project structuring for beginners ](https://www.youtube.com/watch?v=CpUov3TSQ9Y)

  ## Tasks checklist:

```text
PROJECT_GEAR_LOG/
├── db.php
├── index.php
├── add_asset.php
├── delete_asset.php
│
├── assets/
│   └── css/
│       └── style.css
│
└── database/
    └── schema.sql
```

  ## Expected results:

Clean and maintainable project structure.

# Step 19: Optional Bonus Features
  ## Goal:

Enhance the project with advanced features.

  ## Topics to learn:

* [ ]  PHP OOP

* [ ]  Bootstrap UI

* [X]  Authentication systems

  ## Learning Resources:

* [ ]  https://www.php.net/manual/en/language.oop5.basic.php

* [ ]  https://getbootstrap.com/docs/5.3/getting-started/introduction/

* [X]  https://www.php.net/manual/en/function.password-hash.php

* [X]  https://www.php.net/manual/en/function.password-verify.php

  ## Tasks checklist:

* [ ]  Implement OOP architecture

* [ ]  Create classes: Database, Asset, Category

* [ ]  Add Bootstrap UI

* [X]  Implement authentication system

  ## Expected results:

A more professional and scalable application.

-------------------------------------------------------------------

# Final Submission Checklist

* [X]  Database created

* [X]  PDO connection works

* [X]  Assets can be added

* [X]  Dashboard displays assets

* [X]  Category names shown via JOIN

* [X]  Inventory value calculated

* [X]  Search feature works

* [X]  Status colors applied

* [X]  Prepared statements used

* [X]  Outputs sanitized with htmlspecialchars()