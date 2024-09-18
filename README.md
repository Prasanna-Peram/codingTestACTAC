# CRUD Book Collection Application

## Overview
This is a simple web application for managing a collection of books, allowing users to perform CRUD (Create, Read, Update, Delete) operations.

## Technologies Used
- **Backend**: CodeIgniter 3.1.13 (PHP)
- **Frontend**: Vue 2 (JavaScript)
- **Database**: MySQL

## Features
- List all books
- Add a new book
- Edit existing book details
- Delete a book


## Installation and Instructions to test the application.
1. Clone the repository:
   ```bash
   git clone https://github.com/Prasanna-Peram/codingTestACTAC.git
2. Create a database with name fullstack_db in your local or where ever you want to test this application. Use below query.
   create database fullstack_db;
3. Import the database schema file located in: codingTestACTAC-master/fullstack_db.sql into the local database you created in step 2.
   

**Challenges**:

Handling CORS issues for backend and frontend as they are on different ports.
Ensuring data validation on both client and server sides.
Managing state in Vue when creating and updating books.
Ensuring responsive design for different screen sizes
