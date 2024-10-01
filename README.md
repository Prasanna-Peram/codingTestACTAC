# CRUD Book Collection Application

## Overview
This is a simple web application for managing a collection of books, allowing users to perform CRUD (Create, Read, Update, Delete) operations.

## Technologies Used
- **Backend**: CodeIgniter 3.1.13 (PHP)
- **Frontend**: Vue 2 (JavaScript), Bootstrap
- **Database**: MySQL

## Features
- List all books
- Add a new book
- Edit existing book details
- Delete a book


## Installation and Instructions to test the application.
1. Clone the repository:
   ```bash
   git clone https://github.com/Prasanna-Peram/online-book-store.git
2. Create a database with name fullstack_db in your local or where ever you want to test this application. Use below query.
   create database fullstack_db;
3. Import the database schema file located in: online-book-store-master/fullstack_db.sql into the local database you created in step 2.
4. Navigate to frontend folder (_cd online-book-store-master/frontend_) from your terminal.
5. run command "npm run serve"
   

**Scope for Future enhancements**
1. Add meta data columns to the database schema. Table: **books**
2. New columns to be added to the table: **created_by, updated_by, created_time, last_modified_time, active**.
3. **active** column make sures the book gets soft deleted not hard delete. Also, can have some audit tables on what exactly changed on a book.
   
