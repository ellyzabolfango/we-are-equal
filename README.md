# we-are-equal

## 🛠️ Tech Stack

- **PHP 7+**
- **MySQL/MariaDB**
- **HTML5/CSS3/Bootstrap**
- **phpMyAdmin** (optional for DB import)
- **Apache** (via XAMPP, WAMP, etc.)

---

## ⚙️ Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/we-are-equal-website.git
cd we-are-equal-website


## 🛠️ Database Setup (with we-are-equal-db.sql)

This project uses MySQL to store stories, user accounts, and contact form messages.

---

### 🧱 Tables Included

- `users` – Stores registered users and admin accounts
- `stories` – User-submitted stories (with approval status)
- `contacts` – Messages from the contact form

---

### 📥 Step-by-Step Instructions

#### 1. Create the Database

Open your terminal or phpMyAdmin and run:

```sql
CREATE DATABASE we_are_equal_db;

#### 2. Import the Schema

Select the we_are_equal_db database

Click on the Import tab


🧪 Default Admin Credentials
If you add a default admin user manually, you can do it like this:

INSERT INTO users (username, password, role) VALUES (
  'admin',
  '$2y$10$qBq3U7XG1LBobOcQ1TIbhOfkXijhWxbJZ9BS2ZL83qNR44MiLK0De',
  'admin'
);

This password hash corresponds to admin123.

Copyright ELLYZA JANE MANZANERO B.
ilovyouu mwuaaaaaah


Upload and run the file: setup.sql
