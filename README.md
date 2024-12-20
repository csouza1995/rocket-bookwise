# Bookwise

Following the instructions from Rocketseat's PHP training I created this system of BookWise

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Alpine.js](https://img.shields.io/badge/alpinejs-white.svg?style=for-the-badge&logo=alpinedotjs&logoColor=%238BC0D0)\
[![wakatime](https://wakatime.com/badge/user/435e55fb-0356-4dac-9f26-0e167b1feaf4/project/fe728e98-dcbe-4a94-9aa6-bea509e01cfc.svg)](https://wakatime.com/badge/user/435e55fb-0356-4dac-9f26-0e167b1feaf4/project/fe728e98-dcbe-4a94-9aa6-bea509e01cfc)

## Details

This project is about a book library.\
Each book has her own, title, description, rating and another informations!\
\
Inside the system the user can register yourself and login!\
When authenticated, write a review to a book, access 'my books' panel and register a new book!\
\
All are maded to works with safety, a good layout and with good feedbacks to user when all works fine or not

## Turn On

```php
php -S localhost:8888 -d auto_prepend_file=server.php -t public/
```

## Up Database and Seed

```prompt
php commands/migrate.php --fresh && php commands/seeder.php
```

Migration command parameters:
| Parameter     | Example       | Description
|---------------|---------------|-------------------------------------------
| step          | --step=1      | Run stepped and controlled migration or rollback
| rollback      | --rollback    | Run using rollback mode, to undo from last to first migrations applied
| fresh         | --fresh       | Clear DB before run any process

Seeder commands:
| Parameter     | Example       | Description
|---------------|---------------|-------------------------------------------
| name          | --name=book   | Run seed only of named seed. Don't put full name (book.seeder.php), only content of name before '.seeder.php'
---

Thanks [Ileriayo Adebiyi](https://github.com/Ileriayo) for repository of [Markdown Badges](https://github.com/Ileriayo/markdown-badges)\
Thanks [Rocketseat](https://app.rocketseat.com.br) and instructor [Rafael Lunardelli](https://github.com/pinguimdolaravel) for training
