LOGIN/SIGNUP SYSTEM - SETUP GUIDE

1. Copy this folder into: C:/xampp/htdocs/

2. Start Apache and MySQL from XAMPP.

3. Open browser and go to:
   http://localhost/phpmyadmin/

4. Create a database: user_auth

5. Run this SQL in user_auth:
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) UNIQUE,
    email VARCHAR(100),
    password VARCHAR(255)
);

6. Then, open this URL to use the system:
   http://localhost/auth_system/signup.php

Enjoy!
