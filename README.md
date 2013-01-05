# SimpleCMS

A simple, easy to use CMS based on the [Laravel Framework](http://laravel.com).

## Current Feature Overview
- Blog system (with Categories)
- Page System
- An easy to use Content Managment System
- Basic SEO features built in

## Upcoming Features
- Switch to Laravel 4
- Install Script
- User system (with different roles/permissions)
- Built in Backup System (with the option to use something like Amazon S3 for 'off-server' backups)
- Further SEO Tools
- Built in Google Analytics
- Photo/Video Gallery
- Comments on blog posts
- Menu Managment
- Easy Settings Managment
- Memcache, or some form of cache
- Better administrative tools; logging errors, server errors (404) etc

## Installation
- Copy the contents to your web server
- Configure your [Apache VirtualHost](http://laravel.com/docs/install#server-configuration) to send all HTTP requests to /public
- Generate an [application key](http://laravel.com/docs/install#basic-configuration). The easiest way to do this is via the Command Line: [php artisan key:generate](http://laravel.com/docs/artisan/commands#application-configuration)
- Set up your database connection (application/config/database.php)
- Run the Database Migrations, again the best way is to use the Command Line: php artisan migrate:install && php artisan migrate. This will insert some dummy data.
- You can now begin using your website. You can control your website by visting www.domain.com/control, default login details are 'email@example.com' and 'password'!

## Acknowledgements
- [Laravel](http://laravel.com): The "PHP Framework For Web Artisans" created by [Taylor Otwell](https://twitter.com/taylorotwell).
- [Twitter Bootstrap](http://twitter.github.com/bootstrap/): The powerful front-end framework written by [Mark Otto](https://twitter.com/mdo) and [Jacob Thornton](https://twitter.com/fat).
- [HTML5 Boilerplate](http://html5boilerplate.com/): A professional front-end template maintained by [Nicolas Gallagher](http://nicolasgallagher.com/), [Hans Christian Reinl](http://drublic.de/), [Mathias Bynens](http://mathiasbynens.be/), [Paul Irish](http://paulirish.com/), [Cãtãlin Mariş](https://twitter.com/alrra), and [Divya Manian](http://nimbupani.com/).

## Notes

simpleCMS will not function correctly when using Cookies as the Session Driver due to limitations in the amount of data Cookies can work with. For more information see [here](http://goo.gl/qO5qT) and [here](http://goo.gl/cxqFB).

## License

simpleCMS is open-sourced software licensed under the [MIT License](http://en.wikipedia.org/wiki/MIT_License). You are free to use this however you want (including comercial use). However that said I would love to hear how people are using it, so feel free to [drop me an email](mailto:tom@beingtomgreen.com) and tell me how you are using it and what you think!