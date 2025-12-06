# Setup Guide - Art Gallery Database Management

Complete installation and configuration guide for all platforms.

## 📋 Table of Contents
- [Option 1: macOS Setup (Homebrew) - Recommended](#option-1-macos-setup-homebrew---recommended)
- [Option 2: macOS Setup (MAMP)](#option-2-macos-setup-mamp)
- [Option 3: Windows Setup (WAMP)](#option-3-windows-setup-wamp)
- [Option 4: Linux Setup (XAMPP)](#option-4-linux-setup-xampp)
- [Configuration](#configuration)
- [Verification](#verification)
- [Troubleshooting](#troubleshooting)

---

## Option 1: macOS Setup (Homebrew) - Recommended

### Prerequisites

Homebrew package manager (install if needed):
```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
```

### Step-by-Step Installation

#### 1. Install PHP
```bash
brew install php
```

**Expected output:**
- PHP 8.5+ will be installed
- Installation takes ~2-3 minutes

**Verify installation:**
```bash
php --version
# Should show: PHP 8.5.0 (cli) or higher
```

#### 2. Install MySQL
```bash
brew install mysql
```

**Expected output:**
- MySQL 9.5+ will be installed
- Installation takes ~3-5 minutes

**Start MySQL service:**
```bash
brew services start mysql
```

**Verify MySQL is running:**
```bash
mysql --version
# Should show: mysql Ver 9.5.0 or higher
```

#### 3. Clone the Repository
```bash
cd ~/Projects  # or your preferred directory
git clone https://github.com/iaashu98/art-gallery-database-management.git
cd art-gallery-database-management
```

#### 4. Create Database
```bash
# Create the database
mysql -u root -e "CREATE DATABASE IF NOT EXISTS art_gallery;"

# Import the SQL file
mysql -u root art_gallery < Files/art_gallery.sql

# Verify tables were created
mysql -u root art_gallery -e "SHOW TABLES;"
```

**Expected output:**
```
+-----------------------+
| Tables_in_art_gallery |
+-----------------------+
| artist                |
| artwork               |
| contacts              |
| customer              |
| exhibition            |
| gallery               |
+-----------------------+
```

#### 5. Configure Database Connection

Edit `config.php`:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');  // Leave empty unless you set a password
define('DB_NAME', 'art_gallery');
```

#### 6. Start the Application
```bash
php -S localhost:8000
```

**Expected output:**
```
PHP 8.5.0 Development Server (http://localhost:8000) started
```

#### 7. Access the Application

Open your browser and navigate to:
```
http://localhost:8000/FrontEnd.html
```

✅ **Setup complete!** You should see the Art Gallery homepage.

---

## Option 2: macOS Setup (MAMP)

### Prerequisites

Download and install MAMP from [https://www.mamp.info/en/downloads/](https://www.mamp.info/en/downloads/)

### Installation Steps

#### 1. Install MAMP
1. Download MAMP (free version)
2. Install to `/Applications/MAMP`
3. Open MAMP application
4. Click "Start Servers"
5. Wait for Apache and MySQL indicators to turn green

#### 2. Configure MAMP
1. Click "Preferences"
2. Go to "Web Server" tab
3. Note the "Document Root" (usually `/Applications/MAMP/htdocs`)

#### 3. Copy Project to MAMP Directory
```bash
cp -r ~/Downloads/art-gallery-database-management /Applications/MAMP/htdocs/
```

#### 4. Create Database
1. Open phpMyAdmin: `http://localhost:8888/phpMyAdmin`
2. Default credentials:
   - Username: `root`
   - Password: `root`
3. Click "New" to create database
4. Database name: `art_gallery`
5. Click "Create"
6. Select `art_gallery` database
7. Click "Import" tab
8. Choose file: `Files/art_gallery.sql`
9. Click "Go"

#### 5. Configure Database Connection

Edit `config.php`:
```php
define('DB_HOST', 'localhost:8889');  // Note the port!
define('DB_USER', 'root');
define('DB_PASS', 'root');  // MAMP default password
define('DB_NAME', 'art_gallery');
```

#### 6. Access the Application

Open browser:
```
http://localhost:8888/art-gallery-database-management/FrontEnd.html
```

---

## Option 3: Windows Setup (WAMP)

### Prerequisites

Download WAMP from [https://www.wampserver.com/en/](https://www.wampserver.com/en/)

### Installation Steps

#### 1. Install WAMP Server
1. Download WAMPServer 3.2.6 (or 3.0.6/3.1.x)
2. Run installer
3. Install to `C:\wamp64`
4. Start WAMP from system tray
5. Wait for icon to turn green

#### 2. Clone Repository
```bash
# Using Git Bash or Command Prompt
cd C:\wamp64\www
git clone https://github.com/iaashu98/art-gallery-database-management.git
```

Or download ZIP and extract to `C:\wamp64\www\art-gallery-database-management`

#### 3. Create Database
1. Open phpMyAdmin: `http://localhost/phpmyadmin`
2. Click "New" in left sidebar
3. Database name: `art_gallery`
4. Collation: `utf8mb4_general_ci`
5. Click "Create"
6. Select `art_gallery` database
7. Click "Import" tab
8. Choose file: `C:\wamp64\www\art-gallery-database-management\Files\art_gallery.sql`
9. Click "Go"

#### 4. Configure Database Connection

Edit `config.php`:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');  // Empty for WAMP default
define('DB_NAME', 'art_gallery');
```

#### 5. Access the Application

Open browser:
```
http://localhost/art-gallery-database-management/FrontEnd.html
```

---

## Option 4: Linux Setup (XAMPP)

### Prerequisites

Download XAMPP from [https://www.apachefriends.org/](https://www.apachefriends.org/)

### Installation Steps

#### 1. Install XAMPP
```bash
# Make installer executable
chmod +x xampp-linux-*-installer.run

# Run installer
sudo ./xampp-linux-*-installer.run

# Start XAMPP
sudo /opt/lampp/lampp start
```

#### 2. Clone Repository
```bash
cd /opt/lampp/htdocs
sudo git clone https://github.com/iaashu98/art-gallery-database-management.git
```

#### 3. Create Database
1. Open phpMyAdmin: `http://localhost/phpmyadmin`
2. Create database `art_gallery`
3. Import `Files/art_gallery.sql`

#### 4. Configure Database Connection
```bash
sudo nano /opt/lampp/htdocs/art-gallery-database-management/config.php
```

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'art_gallery');
```

#### 5. Set Permissions
```bash
sudo chmod -R 755 /opt/lampp/htdocs/art-gallery-database-management
```

#### 6. Access the Application
```
http://localhost/art-gallery-database-management/FrontEnd.html
```

---

## Configuration

### Database Configuration File

The `config.php` file contains all database settings:

```php
<?php
// Database Configuration
define('DB_HOST', 'localhost');      // Database host
define('DB_USER', 'root');           // Database username
define('DB_PASS', '');               // Database password
define('DB_NAME', 'art_gallery');    // Database name

// Error Reporting (set to false in production)
define('DISPLAY_ERRORS', true);
?>
```

### Platform-Specific Settings

| Platform | Host | User | Password | Port |
|----------|------|------|----------|------|
| Homebrew (macOS) | localhost | root | (empty or custom) | 3306 |
| MAMP (macOS) | localhost:8889 | root | root | 8889 |
| WAMP (Windows) | localhost | root | (empty) | 3306 |
| XAMPP (Linux) | localhost | root | (empty) | 3306 |

---

## Verification

After setup, verify everything works:

### 1. Check Homepage
Navigate to `FrontEnd.html`
- ✅ Page loads without errors
- ✅ All menu items visible (GALLERY, EXHIBITION, ARTWORK, CUSTOMER, ARTIST, CONTACTS)
- ✅ Styling loads correctly

### 2. Test Display Function
Click "GALLERY" → Display
- ✅ Table shows gallery data
- ✅ Data includes: Gallery ID, Name, Location
- ✅ Sample galleries appear (METROPOLITAN MUSEUM, etc.)

### 3. Test Search Function
Go to Gallery → Search
- ✅ Enter "MM123" and click SEARCH
- ✅ Results show METROPOLITAN MUSEUM
- ✅ Try SQL injection: `' OR '1'='1`
- ✅ Should show "Search Unsuccessful" (not all records)

### 4. Test Delete Function
Go to Gallery → Delete
- ✅ Enter a gallery ID (e.g., "MM126")
- ✅ Click DELETE
- ✅ Success message appears
- ✅ Record actually removed from database

### 5. Test Insert Function
Go to Gallery → Insert
- ✅ Fill in form (ID, Name, Location)
- ✅ Click submit
- ✅ Success message appears
- ✅ New record appears in display

---

## Troubleshooting

### Common Issues

#### ❌ "Connection failed" Error

**Cause**: Cannot connect to database

**Solutions**:
1. Verify MySQL is running:
   ```bash
   # macOS (Homebrew)
   brew services list | grep mysql
   
   # Check if running
   mysql -u root -e "SELECT 1;"
   ```

2. Check credentials in `config.php`
3. Verify database exists:
   ```bash
   mysql -u root -e "SHOW DATABASES LIKE 'art_gallery';"
   ```

#### ❌ "Table doesn't exist" Error

**Cause**: SQL file not imported

**Solution**:
```bash
# Re-import SQL file
mysql -u root art_gallery < Files/art_gallery.sql

# Verify tables
mysql -u root art_gallery -e "SHOW TABLES;"
```

#### ❌ "php: command not found" (macOS)

**Cause**: PHP not installed or not in PATH

**Solution**:
```bash
# Install PHP
brew install php

# Add to PATH (if needed)
echo 'export PATH="/opt/homebrew/bin:$PATH"' >> ~/.zshrc
source ~/.zshrc
```

#### ❌ "Access denied for user 'root'"

**Cause**: Incorrect password

**Solution**:
```bash
# Reset MySQL password
mysql -u root

# In MySQL prompt:
ALTER USER 'root'@'localhost' IDENTIFIED BY 'newpassword';
FLUSH PRIVILEGES;
exit;
```

Update `config.php` with new password.

#### ❌ Port 8000 Already in Use

**Cause**: Another process using port 8000

**Solution**:
```bash
# Find process
lsof -i :8000

# Kill process or use different port
php -S localhost:8001
```

#### ❌ WAMP Icon Orange/Red

**Cause**: Port 80 in use

**Solutions**:
1. Close Skype or other apps using port 80
2. Check what's using port 80:
   ```bash
   netstat -ano | findstr :80
   ```
3. Change Apache port in `httpd.conf`

#### ❌ Page Shows PHP Code Instead of Executing

**Cause**: Accessing via file:// instead of http://

**Solution**:
- ✅ Correct: `http://localhost:8000/FrontEnd.html`
- ❌ Wrong: `file:///path/to/FrontEnd.html`

#### ❌ Stored Procedures Not Found

**Cause**: Procedures not created during import

**Solution**:
Run in phpMyAdmin or MySQL:
```sql
-- Create GetAge procedure
DELIMITER $$
CREATE PROCEDURE GetAge()
BEGIN 
    SELECT *, YEAR(CURRENT_DATE())-YEAR(DOB) as age FROM CUSTOMER;
END$$
DELIMITER ;

-- Create display procedure
DELIMITER $$
CREATE PROCEDURE display()
BEGIN
    SELECT Cu.custid, gid, artid, fname, lname, dob, address, Co.PHONE 
    FROM CUSTOMER Cu 
    JOIN contacts Co ON Cu.custid=Co.CUSTID;
END$$
DELIMITER ;
```

---

## Quick Reference

### Start/Stop Services

**macOS (Homebrew)**:
```bash
# Start MySQL
brew services start mysql

# Stop MySQL
brew services stop mysql

# Start PHP server
php -S localhost:8000
```

**MAMP**:
- Open MAMP app → Click "Start Servers"

**WAMP**:
- Click WAMP icon in system tray → Start All Services

**XAMPP**:
```bash
sudo /opt/lampp/lampp start
sudo /opt/lampp/lampp stop
```

### Access URLs

| Platform | URL |
|----------|-----|
| Homebrew | http://localhost:8000/FrontEnd.html |
| MAMP | http://localhost:8888/art-gallery-database-management/FrontEnd.html |
| WAMP | http://localhost/art-gallery-database-management/FrontEnd.html |
| XAMPP | http://localhost/art-gallery-database-management/FrontEnd.html |

### phpMyAdmin URLs

| Platform | URL | Credentials |
|----------|-----|-------------|
| Homebrew | Install separately | root / (empty) |
| MAMP | http://localhost:8888/phpMyAdmin | root / root |
| WAMP | http://localhost/phpmyadmin | root / (empty) |
| XAMPP | http://localhost/phpmyadmin | root / (empty) |

---

## Need Help?

If you encounter issues not covered here:

1. **Check Error Logs**:
   - Browser console (F12)
   - PHP error logs
   - MySQL error logs

2. **Enable Debug Mode**:
   In `config.php`:
   ```php
   define('DISPLAY_ERRORS', true);
   ```

3. **Contact**:
   - Email: iaashu98@gmail.com
   - GitHub Issues: [Create an issue](https://github.com/iaashu98/art-gallery-database-management/issues)

---

## Next Steps

After successful setup:

1. ✅ Test all CRUD operations
2. ✅ Explore the database schema
3. ✅ Try the search functionality
4. ✅ Test stored procedures
5. ✅ Customize the application for your needs

**Enjoy managing your art gallery! 🎨**
