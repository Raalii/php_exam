
# PHP Exam


 ## Presentation

PHP Exam are an interact forum website !

## Getting Started
### Install dependencies

You have, in  the root project :
 - launch the terminal and type :
	 -  `composer require altorouter/altorouter`
	 -  ` composer require symfony/var-dumper --dev`   *(only for developpers)* 
 - After, you can access in the website with a web server 

### Configure web server 
**WARNING** : you must have *phpmyadmin* and *php* in your web server !

After, you have to configure the web server.
In your configuration file (usually *` httpd.conf `*), you will add the following lines in the web php directory : 
```bash
<Directory "YOUR_PHP_DIRECTORY_PATH">
	Options Indexes FollowSymLinks
	Require all granted
	AllowOverride All
	# --- lines added --- #
	RewriteEngine on 
	RewriteCond %{REQUEST_FILENAME}  !-f # if the url was not found 
	RewriteRule .  /php_exam/index.php  [L] # call the index.php file
</Directory>
```


### Configure phpmyadmin

The last thing to do is to configure your database. In the `data` folder, you will have to import the `initDB.sql` and execute them. After, you can test the code en enjoy them ! :)

## The DataBase

You have only one account. The Admin account with the password "admin" and username "admin".
You can check this in phpmyadmin !