# What is php-membership?
[Releases](https://github.com/OscarBjurestrand/php-membership/releases) | [Functionallity](#functionallity) | [Installation](#installation) | [Requirements](#requirements) | [Security](#security) | [License](https://github.com/OscarBjurestrand/php-membership/blob/master/LICENSE)  

A website with member areas? Easy.  
A website with _secure_ member areas? Not so easy...  
  
Php-membership is an open-source project that provides a simple, secure, and scalable membership system for your website.
This system is 100% secure and it validates all data that is sent from the client.    
It is easy to deploy even with no previous knowledge about membership systems.
  
[Click this link to see php-membership working on a real website.](https://github.com/OscarBjurestrand/php-membership/edit/master/README.md)
  
# Functionallity
Php-membership is able to:
- Create users.  
  You are able to register users with an username and password from the client.  
- Delete users.  
  You are able to delete your own user from the client within a members-only area.  
- Log-in with user.  
  You are able to log-in with an existing user.  
- Log-out with user.  
  You are able to log-out from an user within a members-only area.  
- Use members-only areas.  
  You are only able to visit members-only webpages if you are logged in as an existing user.  
- Check if an user is logged in.  
  Php-membership checks if you are logged in with an existing user before letting you visit a members-only webpage.  
  
# Installation  
  
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
`| 1 | JamesBond16 | $2y$10$ZClCKTG4SGFna9fXUTYkvOrM6AcKZtevdL8n2kzOBZtb4xXV6zhy6 |`  
  
**How to set up this project with your server:**
1. Import `/php-membership/code/sql/users.sql` to your database.
2. Upload php-membership to your server.
2. Open `YOUR HOST HERE/php-membership/code/php/index.php` in your browser. 
  
# Requirements
The minimal requirements for using the latest version of php-membership are:
- PHP 5.0.0
  
# Security
### Client-side validation
Validation of client-submitted data is only added because of better user experience.  
The user may not have a web browser that support the use of `required` and `pattern` for HTML forms.  
You should never trust data from a client because an user can use other clients than a web browser to submit data.  
The only client-side validation are the input fields in register.php and login.php.  
  
The user cannot submit the data unless they follow this set of rules:  
- `pattern="[a-zA-Z0-9-]+"`  
Username must only contain letters and numbers.  
- `required`  
Username and Password cannot be empty.  
  
### Server-side validation
You need to make sure that all data sent from the client is safe before reaching the database.  
Php-membership uses different methods of protecting your database from malicious data.  
- `SET NAMES utf8mb4`  
Before making a query, php-membership tells your RDBMS to expect the data to be sent with the utf8mb4 character set.  
-`stripslashes()`  
Php-membership un-quotes a quoted string before using it. 
