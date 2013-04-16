# SimpleCMS

A simple, easy to use CMS based on the [Laravel 3 Framework](http://laravel.com).

## Feature Overview
- Blog system (with Categories)
- Page System

## Unfinished Features
- User system (with different roles/permissions)
- Settings (for things like Site Title which currently exists as a placeholder in the front-end template)

## Development
This project has been superseded by the newer version built on [Laravel Four](http://four.laravel.com). I may continue to make bug fixes. It remains online purely for my reference, and probably ignores many 'best practices'.

If sombody would like to develop this further please feel free.

## Installation
- Copy the contents to your web server
- Configure your [Apache VirtualHost](http://laravel.com/docs/install#server-configuration) to send all HTTP requests to /public
- Generate an [application key](http://laravel.com/docs/install#basic-configuration). The easiest way to do this is via the Command Line: [php artisan key:generate](http://laravel.com/docs/artisan/commands#application-configuration)
- Set up your database connection (application/config/database.php)
- Run the [Database Migrations](http://laravel.com/docs/database/migrations), again the best way is to use the Command Line: php artisan migrate:install && php artisan migrate. This will insert some dummy data.
- You can now begin using your website. You can control your website by visting www.domain.com/control, default login details are 'email@example.com' and 'password'!

## Acknowledgements
- [Laravel](http://laravel.com): The "PHP Framework For Web Artisans" created by [Taylor Otwell](https://twitter.com/taylorotwell).
- [Twitter Bootstrap](http://twitter.github.com/bootstrap/): The powerful front-end framework written by [Mark Otto](https://twitter.com/mdo) and [Jacob Thornton](https://twitter.com/fat).

## Notes

simpleCMS will not function correctly when using Cookies as the Session Driver due to limitations in the amount of data Cookies can work with. For more information see [here](http://goo.gl/qO5qT) and [here](http://goo.gl/cxqFB).

## License

simpleCMS is open-sourced software licensed under the [MIT License](http://en.wikipedia.org/wiki/MIT_License). You are free to use this however you want (including comercial use). That said, I would love to hear how people are using it, so feel free to [drop me an email](mailto:tom@beingtomgreen.com) and tell me how you are using it and what you think!