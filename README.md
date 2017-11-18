| [HOME](#what-is-php-membership) | 
# What is php-membership?
A website with member areas? Easy.  
A website with _secure_ member areas? Not so easy...  
  
Php-membership is an open-source project that provides a simple, secure, and scalable membership system for your website.
This system is 100% safe from SQL-injections and it validates all data that is sent from the client.    
It is easy to deploy even with no previous knowledge about membership systems.
  
  
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
2. Open `YOUR HOST HERE/php-membership/code/php/index.php` in your browser.
3. Enter any user credentials and press submit.
4. See your created user in the `users` table.
