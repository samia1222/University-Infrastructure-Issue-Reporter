# University Infrastructure Issue Reporter

A web-based application for reporting and managing campus infrastructure issues. This system allows students and staff to report problems (broken windows, leaking faucets, etc.) and enables administrators to track and manage these issues efficiently.

## Features

- **User Authentication**: Secure login and signup system with role-based access (Admin/User)
- **Issue Reporting**: Users can submit infrastructure issues with descriptions, locations, and optional photos
- **Dashboard**: Users can view their submitted issues and their current status
- **Admin Panel**: Administrators can view all reported issues, mark them as resolved, or delete them
- **Responsive Design**: Built with Bootstrap for a mobile-friendly experience

## Technologies Used

- **Frontend**: HTML5, CSS3, Bootstrap 5
- **Backend**: PHP
- **Database**: MySQL
- **Authentication**: Session-based with password hashing

## Project Structure

```
├── index.html              # Home page
├── login.html              # Login page
├── signup.html             # User registration page
├── dashboard.html          # User dashboard
├── admin.html              # Admin panel interface
├── report.html             # Issue reporting form
├── process_login.php       # Login authentication handler
├── process_signup.php      # User registration handler
├── process_report.php      # Issue submission handler (to be implemented)
├── dashboard.php           # Dashboard backend logic
├── admin_panel.php         # Admin panel backend logic
├── logout.php              # Session logout handler
├── db_connection.php       # Database connection configuration
└── Notes.txt              # Development notes
```

## Installation

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx) or XAMPP/WAMP/MAMP

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/YOUR-USERNAME/university-issue-reporter.git
   cd university-issue-reporter
   ```

2. **Database Setup**
   - Create a new MySQL database named `AIU_issue_reporter`
   - Create the users table:
   ```sql
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL,
       email VARCHAR(255) UNIQUE NOT NULL,
       password VARCHAR(255) NOT NULL,
       id_number VARCHAR(50) NOT NULL,
       role ENUM('user', 'admin') DEFAULT 'user',
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );
   ```
   
   - Create the issues table (if not exists):
   ```sql
   CREATE TABLE issues (
       id INT AUTO_INCREMENT PRIMARY KEY,
       user_id INT NOT NULL,
       description TEXT NOT NULL,
       location VARCHAR(255) NOT NULL,
       photo VARCHAR(255),
       status ENUM('pending', 'resolved') DEFAULT 'pending',
       date_submitted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       FOREIGN KEY (user_id) REFERENCES users(id)
   );
   ```

3. **Configure Database Connection**
   - Open `db_connection.php`
   - Update the database credentials:
   ```php
   $servername = "localhost";
   $username = "your_mysql_username";
   $password = "your_mysql_password";
   $dbname = "AIU_issue_reporter";
   ```

4. **Deploy to Web Server**
   - Copy all files to your web server's root directory (e.g., `htdocs` for XAMPP)
   - Access the application via `http://localhost/your-project-folder`

## Usage

### For Users
1. **Sign Up**: Create an account by providing your name, email, ID number, and password
2. **Login**: Access your account using your email and password
3. **Report Issues**: Submit infrastructure problems with descriptions and optional photos
4. **View Dashboard**: Track the status of your submitted issues

### For Administrators
1. **Login**: Use admin credentials to access the admin panel
2. **View All Issues**: See all reported issues from all users
3. **Manage Issues**: Mark issues as resolved or delete them
4. **Monitor Status**: Keep track of pending and resolved issues

## Security Features

- Password hashing using PHP's `password_hash()` function
- Session-based authentication
- Role-based access control
- Prepared statements to prevent SQL injection

## To-Do / Future Enhancements

Based on `Notes.txt`:
- [ ] Add navigation link back to admin panel from report page
- [ ] Add "Home" option in navbar for admins
- [ ] Include success/error messages after operations
- [ ] Implement `process_report.php` for handling issue submissions
- [ ] Add image upload functionality
- [ ] Email notifications for issue updates
- [ ] Issue priority levels
- [ ] Search and filter functionality

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is open source and available under the [MIT License](LICENSE).

## Contact

For questions or support, please open an issue on GitHub.

---

**Note**: Remember to never commit sensitive information like database passwords to your repository. Use environment variables or a separate config file that's excluded in `.gitignore`.
