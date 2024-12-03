# Art Gallery Database Management

This project is a simple PHP-based application for managing an art gallery database. Follow these steps to set up and run the project on a Windows machine.

## Prerequisites

Ensure you have the following installed on your system:

### 1. **WAMP Server**
   - **Version**: WAMPServer 3.2.6 (downgrade to 3.0.6 or 3.1.x if this version throws error for php code)
   - **Components**:
     - **PHP**: Version 7.4
     - **MySQL**: Version 5.7
     - **Apache**: Version 2.4
   - Download from [WAMPServer Official Website](https://www.wampserver.com/en/).

### 2. **Web Browser**
   - Any modern web browser (e.g., Google Chrome, Mozilla Firefox, Microsoft Edge).

### 3. **Text Editor (Optional)**
   - Recommended: Visual Studio Code or Notepad++ for editing code if needed.

### 4. **Git** (Optional)
   - For cloning the repository.
   - Download from [Git Official Website](https://git-scm.com/).

## Installation and Setup

### Step 1: Install WAMPServer or XAMPP(for Mac or Linux)
1. Download and install WAMPServer from the official website.
2. During installation, ensure the correct PHP, MySQL, and Apache versions are selected.
3. After installation, start the WAMPServer from the system tray.

### Step 2: Clone the Repository
- Clone the project from GitHub:
  ```bash
  git clone https://github.com/iaashu98/art-gallery-database-management.git
  ```
- Alternatively, download the repository as a ZIP file and extract it to a folder.

### Step 3: Set Up the Project Directory
1. Copy the extracted/cloned project folder to the `www` directory of WAMPServer:
   ```
   C:\wamp64\www\art-gallery-database-management
   ```
2. Ensure the folder structure matches:
   ```
   C:\wamp64\www\art-gallery-database-management\
       |-- index.php
       |-- connection.php
       |-- other_files...
   ```

### Step 4: Configure the Database
1. Open phpMyAdmin by navigating to:
   ```
   http://localhost/phpmyadmin
   ```
2. Create a new database named `art_gallery`.
3. Import the database schema:
   - Go to the `Import` tab.
   - Select the SQL file provided in the repository (`art_gallery.sql`).
   - Click `Go` to execute the import.

### Step 5: Update Database Configuration
1. Open the `connection.php` file in the project directory.
2. Ensure the database credentials match your local setup:
   ```php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "art_gallery";
   ```

### Step 6: Run the Project
1. Open your web browser.
2. Navigate to:
   ```
   http://localhost/art-gallery-database-management
   ```
3. Click on ```FrontEnd.html```, it is the starting point of project.
3. Use the application to manage the art gallery database.

## Troubleshooting

- **WAMPServer icon stays orange or red**: Ensure no other services (e.g., Skype, IIS) are using port 80 or 443.
- **Error: Connection failed**:
  - Check the database credentials in `connection.php`.
  - Ensure the `art_gallery` database exists and contains the required tables.
- **PHP Errors**:
  - Enable error reporting in the `php.ini` file:
    ```ini
    display_errors = On
    ```
  - Restart WAMPServer after making changes.

## Author
**Ashutosh Ranjan**  
GitHub: [iaashu98](https://github.com/iaashu98)


## What is this Project About?
This project is about Art Gallery Database management system. This is basically consist of management of Users and Gallery database. This project manages orders, shows customer's , artist's, artwork's details.
I've also included the SQL file so that all you've to do is import this in database module.

 <b>FEATURES</b>\
 *Store data on artist*\
    >Name<br>
    >Birthplace\
    >Style of art - pop art, fauvinism etc.\
 *Store data on art work*\
    >Title\
    >Artist\
    >Year it was made\
    >Type - painting/lithograph/sculpture/photograph\
    >Prices\
 *Store data on customers*\
    >Name\
    >Address\
    >Phone\
    >Preferences of artists\
    >Preferences of gallery\
 *Support for related queries*\
 
 Some Screenshots:
 ![Frontend](https://github.com/iaashu98/art-gallery-database-management/blob/53cdcae12c66ab84f89866c06f9ee0bd23027cf2/Screenshots/SharedScreenshot.jpg?raw=true)
 ![Gallery](https://github.com/iaashu98/art-gallery-database-management/blob/53cdcae12c66ab84f89866c06f9ee0bd23027cf2/Screenshots/SharedScreenshot1.jpg?raw=true)
 ![Exibition](https://github.com/iaashu98/art-gallery-database-management/blob/53cdcae12c66ab84f89866c06f9ee0bd23027cf2/Screenshots/SharedScreenshot2.jpg?raw=true)
 ![Customer](https://github.com/iaashu98/art-gallery-database-management/blob/53cdcae12c66ab84f89866c06f9ee0bd23027cf2/Screenshots/SharedScreenshot3.jpg?raw=true)
 ![Artist](https://github.com/iaashu98/art-gallery-database-management/blob/53cdcae12c66ab84f89866c06f9ee0bd23027cf2/Screenshots/SharedScreenshot4.jpg?raw=true)
 ![Contacts](https://github.com/iaashu98/art-gallery-database-management/blob/53cdcae12c66ab84f89866c06f9ee0bd23027cf2/Screenshots/SharedScreenshot5.jpg?raw=true)

 
Please note that, this was my first ever project and thus you may find not so well designed architecture. I developed this project when I was learning web developement. Although, I tried to include as much things as possible, but still you may find that some data are not relevant. I would suggest you to delete all the data and come up with fresh entries. It is working project and it has foreign key constraints as well. If anyone wants to contribute to this project, please ping on my mail, I would love to collab. 
If you still have any query regarding this project then just mail me at iaashu98@gmail.com. I'm available there.
