# 📚 Laravel Library App

A simple library management application built with Laravel.

## 🚀 Features

- Books CRUD (Create, Read, Update, Delete)
- Publishers CRUD
- Book ↔ Publisher relationship
- Pagination for listings
- Form validation
- Basic authorization (users can edit their own books)

## 🛠 Tech Stack

- PHP
- Laravel
- MySQL
- Blade (Laravel templating)

## 📌 Project Status

This project is actively being developed.
Upcoming improvements:

- Improve authorization (policies)
- UI/UX improvements
- Additional features

## ⚙️ Installation

```bash
git clone https://github.com/jomar90/library.git
cd library
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
