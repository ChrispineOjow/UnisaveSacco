# UniSave Sacco Web Application

UniSave Sacco is a web-based platform designed to empower university students with accessible and affordable financial solutions. The application allows users to sign up, log in, and access various SACCO (Savings and Credit Cooperative Organization) services.

---

## Features

- **User Registration:** New members can sign up and create an account.
- **Member Login:** Registered users can log in to access their dashboard.
- **Member Dashboard:** Members can view and manage their SACCO-related activities.
- **Admin Panel:** Admins can log in and manage the SACCO system.
- **Responsive Design:** Built with Tailwind CSS and Bootstrap for modern, responsive layouts.
- **Font Awesome Integration:** Uses both CDN and local webfonts for icons.

---

## Project Structure

```
UnisaveSacco/
│
├── CSS/                  # Global CSS styles (Bootstrap, dashboards, login)
├── JS/                   # JavaScript libraries (jQuery, Bootstrap)
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
├── signUpPage/           # Signup page, styles, and JS
├── webfonts/             # Local Font Awesome webfonts
└── favicon.ico           # Site favicon (if present)
```

---

## Setup Instructions

1. **Requirements**
   - PHP 7.x or newer
   - MySQL/MariaDB
   - Apache (XAMPP recommended for local development)
   - Composer (optional, for dependency management)

2. **Installation**
   - Clone or copy the project into your XAMPP `htdocs` directory.
   - Import the database (`unisavesacco`) and required stored procedures (`checkCredentials`, `saveCredentials`).
   - Update database credentials in `php/db.php` if needed.

3. **Running the Application**
   - Start Apache and MySQL from XAMPP.
   - Visit `http://localhost/UnisaveSacco/signUpPage/Signuppage.html` to access the signup page.
   - Use the navigation to access other pages (login, dashboard, etc.).

---

## Fonts and Icons

- **Google Fonts:** Integrated via CDN in HTML `<head>`.
- **Font Awesome:** 
  - CDN: Used for quick development.
  - Local: Webfonts are stored in `/webfonts` and can be referenced in CSS if offline usage is needed.

---

## Customization

- **Styling:** Modify CSS files in `/CSS` or `/signUpPage/signupstyle.css`.
- **PHP Logic:** Update backend logic in `/php/Controllers` and `/php/Models`.
- **Database:** Ensure stored procedures and tables match the application's requirements.

---

## Credits

- [Tailwind CSS](https://tailwindcss.com/)
- [Bootstrap](https://getbootstrap.com/)
- [Font Awesome](https://fontawesome.com/)
- [Google Fonts](https://fonts.google.com/)

---

## License

This project is for educational purposes. Please contact the author for production or commercial