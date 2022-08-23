HOW TO RUN THE PROGRAM?

1. Open terminal.
2. Then, type cp .env.example .env in the terminal.
3. Go to phpmyadmin, add a new database.
4. After create the database , go to env file and change the DB_DATABASE name according    to the database that created just now.
5. In the terminal, type php artisan migrate
6. In the teriminal, type php artisan key:generate
7. Start the server with typing php artisan serv

* In order to log in admin account, make sure insert the new data from database(phpMyAdmin). Select table "admins", click "insert". Key in the usersname of admin, and the password as well. The password type should be "SHA1". Lastly, create go to insert the data.  
