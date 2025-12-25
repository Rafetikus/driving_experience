🚗 Supervised Driving Experience – Back-End Web Application
📌 Project Overview

This project is a back-end web application developed using PHP and MySQL to manage supervised driving experiences. It allows users to record, view, edit, and delete driving sessions along with detailed driving conditions. The project follows the requirements of the 2025 Homework Project and extends a previous front-end and database project.

🎯 Features

Add a driving experience (date, time, distance)

Select driving conditions:

Weather condition

Road material

Traffic condition

Road type

Experience level

View all experiences in a summary table

Edit and delete existing experiences

Display total distance traveled

Visual statistics using charts

Mobile-friendly form interface

Hosted on a remote server (Alwaysdata)

🛠️ Technologies Used

HTML5 (semantic structure)

CSS3 (Flexbox & responsive design)

PHP (mysqli, prepared statements)

MySQL / MariaDB

Chart.js (statistics & graphs)

Apache (XAMPP / Alwaysdata hosting)

🗂️ Project Structure
hw_project/
│
├── config/
│   └── db.php
│
├── index.php        # Add driving experience
├── save.php         # Insert & update logic
├── summary.php      # Summary table + statistics
├── edit.php         # Edit experience
├── delete.php       # Delete experience
├── style.css        # Global styling
├── driving_db.sql   # Database structure
└── README.md

🗄️ Database

The database is named rauf_driving and uses normalized tables to store driving experiences and related conditions.
The SQL structure is provided in driving_db.sql.

🌐 Hosting

The application is deployed on Alwaysdata with:

Remote MySQL database

Public access via URL

No authentication required for testing

🚀 How to Run Locally

Install XAMPP / LAMP

Import driving_db.sql into MySQL

Configure database access in config/db.php

Place the project inside htdocs

Open http://localhost/hw_project/index.php

👨‍🎓 Author

Jabarov Rauf
Université Française d’Azerbaïdjan (UFAZ)
2025
