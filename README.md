# Project Setup
## Step 1: Create a Project Folder

- mkdir web_application
- cd web_application/
- 
## Step 2: Create the docker-compose.yml file

Create a simple LAMP stack (Linux + Apache + MySQL + PHP) to run 
my web application using **Docker**.

Note : Docker version 
```
docker -v
```
Docker version 27.3.1, build ce12230

## Step 3: Create public/index.php
This will help test if PHP is working.
```php
<?php
phpinfo()
```

## Step 4: Start Docker Environment

```
docker-compose up -d
```

### Then go to:

- http://localhost:8080 → PHP web app

- http://localhost:8081 → phpMyAdmin

### Login with:

- User: root
- Password: root