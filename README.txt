HOW TO RUN TRADERS?

1. Open terminal 
2. Then, type cp .env.example .env in the terminal.
3. Go to phpmyadmin, add a new database.
4. After create the database , go to env file and change the DB_DATABASE name according       to the database that created just now.
5. In terminal, type npm install(if got other information,just ignore), then type npm run      dev
6. Type composer update --no-scripts 
7. In the terminal, type php artisan migrate
8. In the teriminal, type php artisan key:generate
9. Start the server with typing php artisan serv

* In order to log in admin account, make sure insert the new data from database(phpMyAdmin). Select table "admins", click "insert". Key in the usersname of admin, and the password as well. The password type should be "SHA1". Lastly, create go to insert the data.  
