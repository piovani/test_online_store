# Procedures to start the project

## 1 - To configure the .env file

- criar um arquivo com o nome .env

- copy the contents of the .env.example file

- to send the email, I used the mailtrap just set up with your own email account

- if you use docker to start the project, simply run the following command:

``` 
    docker-compose up -d 
```

- but if you do not use it, you must configure the bank with the bank of your preference in the .env file

## 2 - Commands to Start the Project

- composer install

- php artisan migrate

- php artisan db:seed

## 3 - Product import test

- 