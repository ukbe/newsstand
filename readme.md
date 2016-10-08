# Newsstand Application

Newsstand is a web application that allows users publish news articles. Registeration is public upon email verification.

This application is developed using **Laravel 5.3.15**

## Installation

Development environment can be build with built in Laravel's **Homestead**.

```
git clone https://github.com/ukbe/newsstand
cd newsstand
git checkout master
composer install
vagrant up
php artisan key:generate
php artisan migrate
php artisan db:seed
```

Application should be available at 
<http://localhost:8000>

## Functionality

Users register with their name and email address. User receives an email address verification message after posting the registration form. User should click the activation link in the message. When clicked user will see a verification page with password fields. At this point user should type and confirm his/her password. After submitting the verification form user is informed that his/her account is activated. User is required to login using with email address and password.

Registered users can post news articles.

Anonymous users can visit homepage which includes latest 10 news articles. By clicking on a new article's image users can view news article in detailed view. In the detailed view user can export the article as pdf by clicking the Export PDF button.
