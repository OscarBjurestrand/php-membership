# What is php-membership?
[Releases](https://github.com/OscarBjurestrand/php-membership/releases) | [Functionallity](#functionallity) | [Installation](#installation) | [Requirements](#requirements)| [Security](#security) | [License](#license)  

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
- Use different types of memberships (type 1, type 2, administrator).  
  Php-membership will be able to use three different types of users, type 1, type 2, and administrator.  
  Type 1 users will only have basic privileges.  
  Type 2 users will have more privileges than type 1 but less than an administrator.  
  Administrators are able to delete any user from the database and change other user types.  
  
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

# Security
  
# License
