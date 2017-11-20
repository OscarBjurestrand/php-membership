# What is php-membership?
[Releases](https://github.com/OscarBjurestrand/php-membership/releases) | [Functionallity](#functionallity) | [Installation](#installation) | [Requirements](#requirements) | [Security](#security) | [License](https://github.com/OscarBjurestrand/php-membership/blob/master/LICENSE)  

A website with member areas? Easy.  
A website with _secure_ member areas? Not so easy...  
  
Php-membership is an open-source project that provides a simple, secure, and scalable membership system for your website.
This system is 100% secure and it validates all data that is sent from the client.    
It is easy to deploy even with no previous knowledge about membership systems.
  
# Functionallity
Php-membership 1.0 is able to:
- Create users.  
  You are able to register users with an username and password from the client.   
- Log-in with users.  
  You are able to log-in with an existing user.  
- Log-out with users.  
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
  
**How to install php-membership on your server:**
1. Import `/php-membership/code/sql/users.sql` to your database.
2. Upload php-membership to your server.
2. Open `YOUR HOST HERE/php-membership/code/php/index.php` in your browser. 
  
# Requirements
The minimal requirements for using the latest version of php-membership are:
- PHP 5.3.7.
  
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
Before making a query, php-membership tells your DBMS to expect the data to be sent with the utf8mb4 character set.  
- `stripslashes()`  
Un-quotes a quoted string before using it. 
- `mysqli_real_escape_string()`  
Removes any special characters in a string before using it.  
- `empty()`  
Php-membership checks if the fields somehow ended up being sent empty after the client-side validation.  
- `ctype_alnum()`  
Php-membership checks if the data only contains letters and numbers.  
- `mysqli_prepare()`  
Php-membership is using [prepared statements](http://php.net/manual/en/mysqli.quickstart.prepared-statements.php) which sends a prepared query template to you DBMS before executing the query.
  
### Secure password storage
Php-membership is using the [password_hash](http://php.net/manual/en/function.password-hash.php) function to store passwords in the database.  
  
Passwords are automatically hashed with `password_hash($post_password, PASSWORD_DEFAULT)` when an user is successfully submitted.  
An user will look something like this in the database:  
`| 1 | JamesBond16 | $2y$10$ZClCKTG4SGFna9fXUTYkvOrM6AcKZtevdL8n2kzOBZtb4xXV6zhy6 |`  
  
**This prevents an attacker from retrieving passwords even if they are able to view the database table.**  
Php-membership uses `password_verify()` when comparing a password sent from login.php with the password hash stored in the database.  
  
### Resources
- [The pattern attribute.](https://www.w3schools.com/tags/att_input_pattern.asp)
- [The required attribute.](https://www.w3schools.com/tags/att_input_required.asp)
- [What is SQL-injection?](https://stackoverflow.com/questions/601300/what-is-sql-injection)
- [Bobby Tables: A guide to preventing SQL injection.](http://bobby-tables.com/)
- [How attackers can get around mysqli_real_escape_string().](https://stackoverflow.com/questions/5741187/sql-injection-that-gets-around-mysql-real-escape-string)
- [PHP: Prepared statements](http://php.net/manual/en/mysqli.quickstart.prepared-statements.php)
- [PHP: pasword_hash()](http://php.net/manual/en/function.password-hash.php)
