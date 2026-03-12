Project Specification: GearLog (IT Asset Tracker)
Launch Date: Wednesday, March 11, 2026 (Afternoon)
Deadline: Wednesday, March 18, 2026 (Morning)
Objective: Develop a web application to track company hardware inventory, assignments, and repair status.

---------------------------------------------------------------------------------------------------------------

# Phase 0 — Understand the Project

## Goal
Understand the requirements and expected features before starting development.

### Checklist

- [ ] Read the full project specification.
- [ ] Identify the main features:
  - Asset inventory tracking
  - Category system
  - Dashboard displaying devices
  - Search functionality
  - Inventory value calculation
- [ ] Sketch the UI layout on paper.<br>
```text
+---------------------------------------+
| GearLog Dashboard                     |
| Total Inventory Value: $5400          |
| Search: [________________]            |
+---------------------------------------+
| Serial | Device | Category | Status   |
|---------------------------------------|
| SN123 | Dell | Laptop | Repair        |
+---------------------------------------+
```
---

# Phase 1 — Auto-formation (Learning the Basics)

Before coding, review the following topics.

---

## 1. SQL Fundamentals

### Topics to learn

- CREATE DATABASE
- CREATE TABLE
- INSERT INTO
- SELECT
- WHERE
- INNER JOIN
- SUM()
- LIKE operator

### Learning Resources

- https://www.w3schools.com/sql/
- https://sqlbolt.com/
- https://www.mysqltutorial.org/

### Practice

1. [ ] sql command

2. [ ] PHP + MySQL Connection (PDO)
    Topics to learn

    PDO connection

    try/catch error handling

    executing queries

- [ ] Learning Resources

    - [ ] https://phpdelusions.net/pdo

    - [ ] https://www.php.net/manual/en/book.pdo.php

    - [ ] https://www.w3schools.com/php/php_mysql_connect.asp

Goal

Be able to connect PHP to MySQL using PDO.

3. [ ] Prepared Statements (Security)
- [ ] Topics to learn

    Prepared statements

    SQL injection prevention

- [ ] Learning Resources

    - [ ] https://phpdelusions.net/pdo/prepared

    - [ ] https://www.php.net/manual/en/pdo.prepared-statements.php


4. [ ] Web Security Basics
- [ ] Topics to learn

    - [ ] Cross Site Scripting (XSS)

    - [ ] htmlspecialchars()

- [ ] Learning Resources

    - [ ] https://owasp.org/www-community/attacks/xss/

    - [ ] https://www.php.net/manual/en/function.htmlspecialchars.php

5. [ ] HTML Forms and Tables
- [ ] Topics to learn

    - [ ] form

    - [ ] input

    - [ ] select

    - [ ] table

    - [ ] form submission (GET / POST)

- [ ] Learning Resources

    - [ ] https://developer.mozilla.org/en-US/docs/Learn/Forms

    - [ ] https://www.w3schools.com/html/html_forms.asp

6. [ ] CSS Layout Basics
- [ ] Topics to learn

    - [ ] Flexbox layout

    - [ ] basic table styling

    - [ ] conditional styling

- [ ] Learning Resources

    - [ ] https://css-tricks.com/snippets/css/a-guide-to-flexbox/

    - [ ] https://developer.mozilla.org/en-US/docs/Web/CSS/flex

---

# Phase 2 — Project Setup

Checklist

* [X] Install XAMPP 

* [X] Start Apache and MySQL

* [X] Create project folder

htdocs\PHP-autoformation\PROJECT_GEAR_LOG

* [ ] Test project in browser

http://localhost/PHP-autoformation/PROJECT_GEAR_LOG

---

# Phase 3 — Database Design
Checklist

* [ ] Create database gearlog

* [ ] Create categories table

* [ ] Create assets table

* [ ] Add foreign key relationship

* [ ] Insert sample data

* [ ] Concepts practiced

* [ ] relational databases

* [ ] foreign keys

* [ ] database normalization

---

# Phase 4 — Database Connection
Tasks

* [ ] Create db.php

* [ ] Implement PDO connection

* [ ] Use try/catch for error handling

Goal

All project pages will include this file for database access.

---

# Phase 5 — Add Asset Form
Tasks

* [ ] Create add_asset.php

* [ ] Create HTML form for asset input

* [ ] Fields:

    -   serial number

    -   device name

    -   price

    -   category

    -   status

    -   Concepts practiced

    -   HTML forms

    -   POST requests

---

# Phase 6 — Insert Assets into Database

Tasks

* [ ] Receive form data with $_POST

* [ ] Use prepared statements

* [ ] Insert asset into database

* [ ] Redirect back to dashboard

    -   Concepts practiced

    -   CRUD operations

    -   prepared statements

---

# Phase 7 — Build the Dashboard
Tasks

* [ ] Create index.php

* [ ] Fetch assets from database

* [ ] Display them in an HTML table

    -   Concepts practiced

    -   loops in PHP

    -   dynamic HTML generation

---

# Phase 8 — Implement Relational JOIN
Tasks

* [ ] Write SQL INNER JOIN

* [ ] Replace category ID with category name

* [ ] Display category names in dashboard

    -   concepts practiced

    -   relational database queries

    -   JOIN operations

---

# Phase 9 — Inventory Value Calculation
Tasks

* [ ] Use SQL SUM(price)

* [ ] Display total inventory value

    -   Concepts practiced

    -   SQL aggregate functions

---

# Phase 10 — Search Functionality
Tasks

* [ ]  Add search bar

* [ ]  Capture search input

* [ ] Use SQL LIKE query

* [ ] Filter assets by name or serial number

 * Concepts practiced

    -   dynamic SQL queries

    -   filtering results

---

# Phase 11 — Conditional Styling
Tasks

* [ ]  Add CSS classes for statuses

* [ ]  Apply colors based on asset status

Example:

Not available → red

Under Repair → Orange

Deployed → green

Available → blue

---

# Phase 12 — Security Implementation
Tasks

* [ ]  Use prepared statements everywhere

* [ ]  Sanitize outputs with htmlspecialchars()

* [ ]  Avoid direct SQL variable injection

---

# Phase 13 — Project Organization

## Folder Structure

```text
PROJECT_GEAR_LOG/
├── db.php
├── index.php
├── add_asset.php
│
├── css/
│   └── style.css
│
└── database/
    └── schema.sql
```

# Phase 14 — Optional Bonus Features
 * [ ] OOP Architecture

    -   Learn PHP classes.

    -   Resources:

        - [ ] https://www.php.net/manual/en/language.oop5.basic.php
        - [ ] https://www.php.net/manual/en/language.oop5.php

    -   Example classes:

        - [ ] Database

        - [ ] Asset

        - [ ] Category

 * [ ] Bootstrap UI

    -   Learn Bootstrap basics.

    -   Resource:

        - [ ] https://getbootstrap.com/docs/5.3/getting-started/introduction/

Goal:

Make the interface responsive and professional.

 * [ ] Authentication System
    -   Topics

    -   sessions

    -   password hashing

    -   login forms

    -   Resources

        - [ ] https://www.php.net/manual/en/function.password-hash.php

        - [ ] https://www.php.net/manual/en/function.password-verify.php

---

# Final Submission Checklist

* [ ] Database created

* [ ] PDO connection works

* [ ] Assets can be added

* [ ] Dashboard displays assets

* [ ] Category names shown via JOIN

* [ ] Inventory value calculated

* [ ] Search feature works

* [ ] Status colors applied

* [ ] Prepared statements used

* [ ] Outputs sanitized with htmlspecialchars()