# Art Gallery Database Management

A PHP-based web application for managing an art gallery database system. This project provides a complete solution for managing galleries, exhibitions, artworks, artists, customers, and their relationships.

[![PHP](https://img.shields.io/badge/PHP-8.5+-777BB4?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-9.5+-4479A1?style=flat&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

## 🎨 Features

### Data Management
- **Artists**: Store artist information including name, birthplace, and art style (pop art, fauvism, etc.)
- **Artworks**: Manage artwork details including title, artist, year, type (painting/lithograph/sculpture/photograph), and price
- **Customers**: Track customer information with name, address, phone, and preferences
- **Galleries**: Maintain gallery records with location and details
- **Exhibitions**: Schedule and manage exhibitions with start/end dates
- **Contacts**: Store customer contact information

### Functionality
- **CRUD Operations**: Create, Read, Update, and Delete records for all entities
- **Search**: Advanced search functionality across all tables
- **Relationships**: Manage foreign key relationships between entities
- **Stored Procedures**: Database procedures for complex queries (e.g., customer age calculation)

## 🔒 Security Features

This project has been updated with comprehensive security improvements:

- ✅ **SQL Injection Protection**: All queries use prepared statements with parameter binding
- ✅ **XSS Protection**: All outputs sanitized using `htmlspecialchars()`
- ✅ **Centralized Configuration**: Database credentials managed through `config.php`
- ✅ **Input Validation**: All user inputs validated and sanitized
- ✅ **Error Handling**: Proper error handling throughout the application
- ✅ **Bug Fixes**: Critical bugs fixed (delete operations now work correctly)

## 🚀 Quick Start

### Prerequisites
- PHP 7.4+ (PHP 8.5+ recommended)
- MySQL 5.7+ (MySQL 9.5+ recommended)
- Web server (Apache/Nginx) or PHP built-in server

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/iaashu98/art-gallery-database-management.git
   cd art-gallery-database-management
   ```

2. **Set up the database**
   ```bash
   mysql -u root -p
   CREATE DATABASE art_gallery;
   exit;
   mysql -u root -p art_gallery < Files/art_gallery.sql
   ```

3. **Configure database connection**
   
   Edit `config.php` with your database credentials:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', 'your_password');
   define('DB_NAME', 'art_gallery');
   ```

4. **Run the application**
   ```bash
   php -S localhost:8000
   ```
   
   Open your browser and navigate to: `http://localhost:8000/FrontEnd.html`

📖 **For detailed installation instructions for Windows, macOS, and Linux, see [SETUP.md](SETUP.md)**

## 📁 Project Structure

```
art-gallery-database-management/
├── config.php              # Database configuration
├── connection.php          # Database connection handler
├── FrontEnd.html          # Main homepage
├── Files/
│   └── art_gallery.sql    # Database schema and sample data
├── *insert.php            # Insert operations (6 files)
├── *display.php           # Display operations (6 files)
├── *search.php            # Search operations (6 files)
├── *delete.php            # Delete operations (6 files)
├── *stored.php            # Stored procedures (2 files)
├── Images/                # UI images
└── Screenshots/           # Application screenshots
```

## 🖼️ Screenshots

<details>
<summary>Click to view screenshots</summary>

### Frontend
![Frontend](https://github.com/iaashu98/art-gallery-database-management/blob/53cdcae12c66ab84f89866c06f9ee0bd23027cf2/Screenshots/SharedScreenshot.jpg?raw=true)

### Gallery Management
![Gallery](https://github.com/iaashu98/art-gallery-database-management/blob/53cdcae12c66ab84f89866c06f9ee0bd23027cf2/Screenshots/SharedScreenshot1.jpg?raw=true)

### Exhibition Management
![Exhibition](https://github.com/iaashu98/art-gallery-database-management/blob/53cdcae12c66ab84f89866c06f9ee0bd23027cf2/Screenshots/SharedScreenshot2.jpg?raw=true)

### Customer Management
![Customer](https://github.com/iaashu98/art-gallery-database-management/blob/53cdcae12c66ab84f89866c06f9ee0bd23027cf2/Screenshots/SharedScreenshot3.jpg?raw=true)

### Artist Management
![Artist](https://github.com/iaashu98/art-gallery-database-management/blob/53cdcae12c66ab84f89866c06f9ee0bd23027cf2/Screenshots/SharedScreenshot4.jpg?raw=true)

### Contacts Management
![Contacts](https://github.com/iaashu98/art-gallery-database-management/blob/53cdcae12c66ab84f89866c06f9ee0bd23027cf2/Screenshots/SharedScreenshot5.jpg?raw=true)

</details>

## 🗄️ Database Schema

The database consists of 6 main tables:

- **gallery**: Gallery information (ID, name, location)
- **exhibition**: Exhibition details (ID, gallery, dates)
- **artist**: Artist information (ID, name, birthplace, style)
- **artwork**: Artwork details (ID, title, artist, type, price)
- **customer**: Customer records (ID, name, DOB, address)
- **contacts**: Customer contact information (customer ID, phone)

**Relationships:**
- Artists are associated with galleries and exhibitions
- Artworks are linked to artists, galleries, and exhibitions
- Customers have preferences for artists and galleries
- Foreign key constraints maintain data integrity

## 🛠️ Technologies Used

- **Backend**: PHP 8.5
- **Database**: MySQL 9.5
- **Frontend**: HTML5, CSS3, JavaScript
- **Architecture**: MVC-inspired structure with separation of concerns

## 📝 Usage

### Managing Galleries
1. Navigate to the Gallery section
2. Click "Insert" to add a new gallery
3. Use "Display" to view all galleries
4. Use "Search" to find specific galleries
5. Use "Delete" to remove galleries

### Managing Artworks
1. Go to the Artwork section
2. Fill in artwork details (title, artist, year, type, price)
3. Link to exhibitions and galleries
4. Search and filter artworks

### Managing Customers
1. Access the Customer section
2. Add customer information
3. Link customers to their preferred galleries and artists
4. Manage contact information

*Similar workflows apply to Artists, Exhibitions, and Contacts*

## 🤝 Contributing

Contributions are welcome! This project was created as a learning exercise, and there's always room for improvement.

**Areas for contribution:**
- UI/UX improvements
- Additional features (user authentication, reporting, etc.)
- Code optimization
- Documentation improvements
- Bug fixes

To contribute:
1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📧 Contact

**Ashutosh Ranjan**
- GitHub: [@iaashu98](https://github.com/iaashu98)
- Email: iaashu98@gmail.com

## 📄 License

This project is open source and available under the [MIT License](LICENSE).

## 🙏 Acknowledgments

This was my first web development project, created while learning PHP and MySQL. While the architecture may not be perfect, it demonstrates core concepts of database management and web application development.

## ⚠️ Note

This project was developed as a learning exercise. For production use, consider:
- Adding user authentication and authorization
- Implementing CSRF protection
- Adding comprehensive logging
- Setting up automated backups
- Implementing rate limiting
- Adding comprehensive unit tests

---

**Happy Coding! 🎨**
