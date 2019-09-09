# Restaurant list for baguio
a microCMS example

![PHP](https://img.shields.io/badge/PHP-5.5-blue)
![MariaDB](https://img.shields.io/badge/MariaDB-10-yellowgreen)
![BootStrap](https://img.shields.io/badge/BootStrap-5-blueviolet)
![FontAwesome](https://img.shields.io/badge/FontAwesome-4.7-blue)



## LIST of DB Tables
### restaurants table
- name
- location
- type of food - array
- price range
- picture
### Users table
- email
- password

## 
## Roadmap (Phase 2)
- maps
- likes counter
- rating
- menu

##
## CRUD functions for DB
### CREATE
- create users (register)
- create restaurants (add restaurant)
### READ
- read user (display user list)
  - search users
  - user login
- read restaurant table (display restaurants)
  - search restaurants
### UPDATE
- update user (update profile)
  - change password
- update restaurant (update restaurant)
### DELETE
- delete restaurant

##
## Progress
1. Create initial files
1.1. style.css = link after bootstrap css link in head
1.2. db.php = mysqli connection script
1.3. functions.php = should contain all functions
1.4. index.php = main file
2. Create database and tables
3. Create Login page and functions
4. Display list of restaurants in index.php
4.1. Search Form
5. Create add restaurant page (add.php)
6. .....