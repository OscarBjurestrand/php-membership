# What is php-membership?
A website with member areas? Easy.  
A website with _secure_ member areas? Not so easy...  
  
My goal with php-membership is to provide a complete and secure base for your website to be built upon when using member areas. I also want to let users know if this system is up-to-date with the latest version of PHP and is secure against SQL-injections. Therefore, I will mention if this system is secure or not in the [version history](https://github.com/OscarBjurestrand/php-membership/blob/master/project-info/CHANGELOG.md).  
And if not, I will try my best to update it.  
  
You can [review the code](https://github.com/OscarBjurestrand/php-membership/wiki/Review-the-code) if you are new to PHP but still want to use php-membership. 
    
This system is not very pretty on the outside and has only the required styling in order to show you all the different functions.  
I created it this way so you can start building on it right away without deleting a bunch of styling.
  
  
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
1.. Import `/php-membership/code/sql/users.sql` to your database.
2. Open `localhost/php-membership/code/php/index.php` in your browser.
3. Enter any user credentials and press submit.
4. See your created user in the `users` table.
