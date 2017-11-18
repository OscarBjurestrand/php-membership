# Versions of php-membership
All versions of php-membership can be viewed here.  
**Current version is not secure.**
  
**Versions**
- [Version 1.0](#10)
## 1.0
_18-11-2017_  
This is the initial code published to my repository. You are able to create users with a hashed password and successfully add it to the database.  
  
You are also able to "login" (try the user with the password stored in the database).
And if the password matches the one in the database it will display a simple "You successfully logged in!" in the browser. 
 It will also show a link to register a new user.

There is an SQL-file included that creates a ready 'users' table if imported to your database.  

Client-side validation is added for user experience.  
It will tell the user that Username must only contain uppercase letters, lowercase letter, and numbers.  
Both input fields are also `required`.  
  
However, this version is missing protection against SQL-injection and can therefore be attacked from the client-side.  
Creating two or more users with the same username is possible.   
There is also no members area to see if an user is logged in or not.  
  
***

- Updates
  - SQL file was added and is configured to add table `users` with schema: `| ID | Username | Password |`.   
  The file will also add `ID` as the primary key with `AUTO_INCREMENT`.  
  - Forms require both username and password before submitting.  
  - Added client-side validation for the username field.  
    
- Known bugs
  - Able to create the same user twice with the same password.

- **TODO**
  - Prevent SQL-injections.
  - Server-side validation.
  - Bug-fix.
  - Members area with `$_SESSION`.
