# UniSave Sacco Web Application 🚀

UniSave Sacco is a web-based platform designed to empower university students with accessible and affordable financial solutions. The application allows users to sign up, log in, and access various SACCO (Savings and Credit Cooperative Organization) services.

---

## Features ✨

- **User Registration:** 📝 New members can sign up and create an account. Passwords are securely hashed before storage.
- **Member Login:** 🔑 Registered users can log in using their email (and optionally phone number, if the column exists) and password. Login is handled via AJAX and PHP, with session management.
- **Member Dashboard:** 📊 Members can view and manage their SACCO-related activities after logging in.
- **Admin Panel:** 🛠️ Admins can log in and manage the SACCO system.
- **Responsive Design:** 📱 Built with Tailwind CSS and Bootstrap for modern, responsive layouts.
- **Font Awesome Integration:** ⭐ Uses both CDN and local webfonts for icons.
- **AJAX Forms:** ⚡ All authentication (signup/login) is handled asynchronously using JavaScript (no page reloads).
- **Error Handling:** ❗ User-friendly error messages are displayed for invalid input or server errors.

---

## Project Structure 🗂️

```
UnisaveSacco/
│
├── CSS/                  # Global CSS styles (Bootstrap, dashboards, login)
├── JS/                   # JavaScript files (plain JS for all forms, no jQuery required)
│   ├── adminLogin.js
│   ├── MemberLogin.js
│   └── SignUp.js
├── adminpage/            # Admin dashboard and login pages
│   ├── admin/
│   └── adminLogin/
├── mainpage/             # Main user-facing pages
│   ├── AboutUs_page/
│   ├── Homepage/
│   └── MembershipLogin/
├── php/                  # PHP backend (database, controllers, models)
│   ├── Controllers/
│   └── Models/
│       ├── admincredentials.php
│       ├── adminCredentialssaving.php
│       ├── MemberCredentials.php
│       └── MemberLogin.php
├── signUpPage/           # Signup page, styles, and JS
│   ├── Signuppage.html
│   ├── SignUp.js
│   └── signupstyle.css
├── webfonts/             # Local Font Awesome webfonts
└── favicon.ico           # Site favicon (if present)
```

---

## Setup Instructions 🛠️

1. **Requirements**  
   - PHP 7.x or newer 🐘
   - MySQL/MariaDB 🗄️
   - Apache (XAMPP recommended for local development) 🌐
   - Composer (optional, for dependency management)

2. **Installation**  
   - Clone or copy the project into your XAMPP `htdocs` directory.
   - Import the database (`unisavesacco`) and ensure all required tables (`members`, `admin`, etc.) exist with correct columns (e.g., `Email`, `Password`, and optionally `PhoneNumber`).
   - Update database credentials in `php/Models/db.php` if needed.

3. **Running the Application**  
   - Start Apache and MySQL from XAMPP.
   - Visit `http://localhost/UnisaveSacco/signUpPage/Signuppage.html` to access the signup page.
   - Use the navigation to access other pages (login, dashboard, etc.).

---

## Usage Notes 💡

- **Signup:** Users register via the signup page. Data is sent via AJAX to `php/Models/MemberCredentials.php`, which hashes the password and saves the user.
- **Login:** Members log in via the login page. Credentials are sent via AJAX to `php/Models/MemberLogin.php`, which verifies the password and starts a session.
- **Admin:** Admin login and dashboard are handled similarly, with separate PHP and JS files.
- **Error Handling:** All forms display error/success messages dynamically without reloading the page.
- **No jQuery:** All JavaScript is written in plain (vanilla) JS for better performance and simplicity.

---

## Fonts and Icons 🎨

- **Google Fonts:** Integrated via CDN in HTML `<head>`.
- **Font Awesome:**  
  - CDN: Used for quick development.  
  - Local: Webfonts are stored in `/webfonts` and can be referenced in CSS if offline usage is needed.

---

## Customization 🖌️

- **Styling:** Modify CSS files in `/CSS` or `/signUpPage/signupstyle.css`.
- **PHP Logic:** Update backend logic in `/php/Controllers` and `/php/Models`.
- **Database:** Ensure tables and columns match the application's requirements. Add columns like `PhoneNumber` if you want to support phone-based login.

---

## Troubleshooting 🐞

- **Blank or non-working forms:** Ensure your HTML forms have the correct input IDs and names as expected by the JS and PHP.
- **Database errors:** Check that your tables and columns match the queries in the PHP files.
- **No error messages:** Make sure your JS files are loaded correctly and there are no JavaScript errors in the browser console.
- **Session issues:** Only call `session_start()` once per PHP request, and only in files that need it.

---

## Credits 🙏

- [Tailwind CSS](https://tailwindcss.com/)
- [Bootstrap](https://getbootstrap.com/)
- [Font Awesome](https://fontawesome.com/)
- [Google Fonts](https://fonts.google.com/)

---

## License 📄

This project is for educational purposes. Please contact the author for production or commercial use.