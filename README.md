# Membership
This membership system is written in PHP 7.  
  
The only thing you will need to configure are the credentials in `connect.php`.  
It is now configured to connect with `localhost` using the default credentials.  
  
Change these default credentials to fit your own:
```
$host = 'localhost'; //database host
$user = 'root'; //database username
$pass = NULL; //database password
$dbname = 'users'; //database name
```  
  
Passwords are automatically hashed with `password_hash('password', PASSWORD_DEFAULT)`.  
An user will be inserted into the database with an ID, username, and a hashed password.   
  
An user will look something like this in the database:  
`| 148 | JamesBond16 | $2y$10$ZClCKTG4SGFna9fXUTYkvOrM6AcKZtevdL8n2kzOBZtb4xXV6zhy6 |`  
  
**How to set up this project with localhost:**
1. Copy the php-membership folder to `../xampp/htdocs`.
2. Start Apache and MySQL.
3. Import `/php-membership/code/sql/users.sql` to your database.
4. Open `localhost/php-membership/code/php/index.php` in your browser.
5. Enter any user credentials and press submit.
6. See your created user in the `users` table.
---
**Update - Version 1**
- SQL file was added and is configured to add table `users` with schema: `| ID | Username | Password |`.   
The file will also add `ID` as the primary key with `AUTO_INCREMENT`.  
- Forms require both username and password before submitting.  
- Added client-side validation for the username field.
