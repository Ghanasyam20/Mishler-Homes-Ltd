# Mishler Homes Ltd

A comprehensive real estate website built with PHP, MySQL, HTML, CSS, and JavaScript. This platform allows users to browse property listings, register accounts, save favorites, and contact agents. Admins can manage properties, users, and enquiries.

## Features

- **User Authentication**: Secure login and registration for users and admins
- **Property Listings**: Browse, search, and filter properties
- **Property Management**: Users can post and manage their properties
- **Saved Properties**: Save favorite listings
- **Contact Forms**: Contact agents or submit enquiries
- **Admin Dashboard**: Manage users, properties, and enquiries
- **Responsive Design**: Mobile-friendly interface
- **Video Backgrounds**: Engaging home page with video content

## Technologies Used

- **Backend**: PHP 8.3+
- **Database**: MySQL 8.0+
- **Frontend**: HTML5, CSS3, JavaScript
- **Libraries**:
  - Swiper.js for image sliders
  - Font Awesome for icons
- **Styling**: Custom CSS with responsive design

## Prerequisites

- PHP 8.3 or higher
- MySQL 8.0 or higher
- Web server (Apache/Nginx) or PHP built-in server for development

## Installation

1. **Clone or Download the Project**
   ```
   git clone <repository-url>
   cd Mishler-Homes-Ltd
   ```

2. **Install PHP and MySQL**
   - On Windows: Use winget or download from official sites
   - On Linux/Mac: Use package managers

3. **Set Up the Database**
   - Create a MySQL database named `mishler_homes`
   - Create the following tables (or import schema if provided):
     - `users` (id, name, email, password, status, etc.)
     - `admins` (id, name, email, password, status, etc.)
     - `properties` (id, user_id, title, description, price, location, images, etc.)
     - `saved` (id, user_id, property_id)
     - `enquiries` (id, user_id, property_id, message, etc.)
     - `contacts` (id, name, email, message, etc.)

4. **Configure Database Connection**
   - Edit `components/connect.php` with your database credentials:
     ```php
     $db_name = 'mysql:host=localhost;dbname=mishler_homes';
     $user_name = 'your_username';
     $user_pass = 'your_password';
     ```

5. **Start the Server**
   - For development: `php -S localhost:8000`
   - For production: Deploy to a web server with PHP support

6. **Access the Application**
   - Open http://localhost:8000 in your browser
   - Register a new account or login

## Usage

1. **Home Page**: View featured properties and navigate
2. **Registration**: Create a user or admin account
3. **Login**: Access your dashboard
4. **Browse Listings**: Search and view properties
5. **Post Property**: Add your property for sale/rent
6. **Contact**: Reach out to agents

## Project Structure

```
Mishler-Homes-Ltd/
├── components/
│   └── connect.php          # Database connection
├── css/                     # Stylesheets
├── Vdos/                    # Video files
├── index.php                # Loading page
├── home1.php                # Home page
├── login.php                # Login page
├── register.php             # Registration page
├── listings.php             # Property listings
├── search.php               # Search results
├── view_property.php        # Property details
├── dashboard.php            # User dashboard
├── adminq.php               # Admin dashboard
├── post_property.php        # Add property
├── my_listings.php          # User's listings
├── saved.php                # Saved properties
├── contact.php              # Contact form
├── about.php                # About page
└── README.md                # This file
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Contact

For questions or support, please contact the development team.