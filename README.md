# Library Management System

A library management application built with Laravel 12 that allows administrators to manage books, publishers, members, and borrowing records through a role-based system.

The project was developed as part of my software development portfolio and focuses on implementing real-world business rules, authorization, API development, testing, and localization.

## Features

### Role-Based Access Control

The application supports three user roles:

* **Admin** – full access to all resources and management features
* **User** – can create, edit, and manage books they have added
* **Member** – read-only access to the catalogue and book details

### Library Management

* Manage books and publishers
* Borrow and return books
* Track borrowing records
* Prevent invalid borrowing operations through business rules
* Ownership-based permissions for book management

### API

* RESTful API endpoints
* API authentication
* Rate limiting
* Resource-based JSON responses

### Technical Highlights

* Laravel 12
* PHPUnit unit and feature testing
* English and Dutch localization
* Eloquent relationships
* Policies and middleware authorization
* Service container bindings
* Events and listeners
* Third-party API integration
* PHPStan static analysis

## Database Structure

Core entities:

* Users
* Members
* Books
* Publishers
* Borrowings

## Project Status

This project is currently under active development.

The core functionality is implemented and tested. Future work includes UI improvements, additional features, and further API enhancements.

## Screenshots

Screenshots will be added soon.
