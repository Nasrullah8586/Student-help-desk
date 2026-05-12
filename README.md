# 📚 Student Help Desk - Book Bank System

A complete web-based **Book Bank Management System** for university students to donate, request, and manage books easily. Built with **PHP**, **MySQL**, **HTML**, and **CSS**.

> 🔗 **Live Demo:** Localhost only (XAMPP required)

---

## 📖 Table of Contents
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Database Structure](#database-structure)
- [Installation Guide](#installation-guide)
- [Usage](#usage)
- [File Structure](#file-structure)
- [Future Improvements](#future-improvements)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)

---

## ✨ Features

### Core Features
- 👥 **User Management** – Add, view, and delete student/teacher users
- 📕 **Book Management** – Add, edit, delete books with donor info
- 📋 **Book Request System** – Students can request available books
- ✅ **Approve/Return Requests** – Admin can approve or mark books as returned
- 🔍 **Search Functionality** – Search books by title or author
- 📊 **Dashboard** – View all books and their status (available/borrowed)

### Technical Features
- Responsive design (mobile + desktop)
- Real-time search filtering
- Secure MySQL queries
- Clean and modern UI with CSS gradients

---

## 🛠 Technologies Used

| Technology | Purpose |
|------------|---------|
| PHP | Backend logic & server-side processing |
| MySQL | Database management |
| HTML5 | Page structure |
| CSS3 | Styling & responsive design |
| XAMPP | Local development environment |
| VS Code | Code editor |

---

## 📊 Database Structure

### Table 1: `users`

| Column | Type | Description |
|--------|------|-------------|
| user_id | INT (PK) | Auto increment ID |
| student_id | VARCHAR(20) | Unique student ID |
| full_name | VARCHAR(100) | Full name |
| email | VARCHAR(100) | Email address |
| phone | VARCHAR(15) | Contact number |
| department | VARCHAR(50) | Department name |
| session | VARCHAR(20) | Academic session |
| created_at | TIMESTAMP | Account creation time |

### Table 2: `books`

| Column | Type | Description |
|--------|------|-------------|
| book_id | INT (PK) | Auto increment ID |
| donor_id | INT (FK) | References users(user_id) |
| book_title | VARCHAR(200) | Title of the book |
| author | VARCHAR(100) | Author name |
| edition | VARCHAR(20) | Book edition |
| course_code | VARCHAR(20) | Course code |
| book_condition | ENUM | new/good/average/old |
| status | ENUM | available/borrowed/donated |
| created_at | TIMESTAMP | When book was added |

### Table 3: `book_requests`

| Column | Type | Description |
|--------|------|-------------|
| request_id | INT (PK) | Auto increment ID |
| book_id | INT (FK) | References books(book_id) |
| requester_id | INT (FK) | References users(user_id) |
| request_date | TIMESTAMP | Request time |
| return_date | DATE | Expected return date |
| status | ENUM | pending/approved/returned/cancelled |

### Entity Relationship (ER) Diagram
users (1) ──────< (many) books
users (1) ──────< (many) book_requests
books (1) ──────< (many) book_requests


---

## 💻 Installation Guide

### Prerequisites
- XAMPP (PHP 7.4+ & MySQL)
- Web browser
- Git (optional)

### Step-by-Step Setup

1. **Clone or Download**
   ```bash
 
   git clone https://github.com/YOUR_USERNAME/student-help-desk.git
   Or download ZIP and extract.



2.Move to htdocs

C:\xampp\htdocs\student_help_desk



3.Start XAMPP

Start Apache

Start MySQL



4.Create Database

Open phpMyAdmin: http://localhost/phpmyadmin

Create database: student_help_desk

Import the SQL file provided



5.Run the Project

http://localhost/student_help_desk/index.php



🚀 Usage
Navigation Menu

Home – View all available books

Add Book – Register a new book with donor

Requests – See all book requests and approve/return

Users – Manage student/teacher users



Common Operations

Action	Steps

Add a new user	Users → Fill form → Add User

Add a new book	Add Book → Fill details → Add Book

Request a book	Click Request on any available book

Approve a request	Requests → Click Approve

Return a book	Requests → Click Return

Search books	Use search box on homepage

Delete a user/book	Click Delete button (with confirmation)


📁 File Structure

student_help_desk/
│

├── index.php              # Homepage (show books)

├── add_book.php           # Add new book

├── edit_book.php          # Edit book details

├── delete_book.php        # Delete a book

├── request_book.php       # Request a book

├── requests.php           # View/manage requests

├── users.php              # User list (add/delete)

├── config.php             # Database connection

├── style.css              # Styling

├── .gitignore             # Git ignore file

├── LICENSE                # MIT License

└── README.md              # This file

📸 Screenshots
<img width="1115" height="235" alt="image" src="https://github.com/user-attachments/assets/6d843afe-00e9-4506-a20f-343cc99715e2" />


Homepage
<img width="1487" height="988" alt="image" src="https://github.com/user-attachments/assets/0e2191be-7927-412e-909e-7729eccca745" />

Add Book
<img width="1554" height="902" alt="image" src="https://github.com/user-attachments/assets/fba7ff27-1ad8-4689-9651-2d16d3636da5" />

Requests
<img width="1595" height="1013" alt="image" src="https://github.com/user-attachments/assets/5d6f9ae9-886b-4e0c-8a4f-df2ef5f3979b" />

Users
<img width="1484" height="1015" alt="image" src="https://github.com/user-attachments/assets/a2b9e126-17a5-43d4-9cce-d0c1518368f9" />

🔧 Future Improvements
User login system (student/admin)

Email notification for request approval

Book return reminder

PDF report generation

Dark mode toggle

Pagination for large datasets

Book cover image upload

🤝 Contributing
Contributions are welcome! Please follow these steps:

1.Fork the repository


2.Create a feature branch

git checkout -b feature/AmazingFeature


3.Commit your changes

git commit -m 'Add some AmazingFeature'

4.Push to the branch

git push origin feature/AmazingFeature


5.Open a Pull Request

Coding Standards
Use meaningful variable names

Comment complex logic

Test before submitting


📞 Contact
NASRULLAH KHAN FERDAUS

GitHub: Nasrullah8586

LinkedIn: www.linkedin.com/in/nasrullah-khan-ferdaus-21422740a

Email:nasrullah129261@gmail.com













