TODOS.List
============================

Todo Basic Project powered by [Yii 2](http://www.yiiframework.com/).


DEMO
----

The demo is no longer available.


DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources



REQUIREMENTS
------------

The minimum requirement by this project is that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install from an Archive File

Download and extract the [archive file](https://github.com/lmribeiro/todoslist/archive/master.zip) to a directory named `todoslist` that is directly under the Web root.
Than run this commands:

```bash
$ cd todoslist
$ php composer.phar install
```

### Install via SSH

You can clone this project using the following command under the Web root:

```bash
$ git clone git@github.com:lmribeiro/todoslist.git
$ cd todoslist
$ php composer.phar install
```


CONFIGURATION
-------------

### Database

First you must create the database manually, then ddit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=todoslist,
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

Then run migrations to create tables:

```bash
$ php yii migrate/
```

### Cookie Validation

Set cookie validation key in `config/web.php` file to some random secret string:

```php
'request' => [
    // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
    'cookieValidationKey' => '<secret random string goes here>',
],
```

### Email

Config email at `config/web.php`.

```php
'mailer' => [
    'class' => 'yii\swiftmailer\Mailer',
    'useFileTransport' => false,
    'transport' => [
        'class' => 'Swift_SmtpTransport',
        'host' => 'localhost',
        'username' => '',
        'password' => '',
        'port' => '1025',
        'encryption' => 'tls',
    ],
    'messageConfig' => [
        'from' => ['noreply@todolist.com' => 'TODOS.List'],
        'charset' => 'UTF-8',
    ]
],
```

You can then access the application through the following URL:

~~~
http://localhost/todoslist/web/
~~~

### Notes

You must set special permission to this folders:
- "runtime": "0777",
- "web/assets": "0777",


LICENSE
-------------
MIT. See [License](https://github.com/lmribeiro/todoslist/blob/master/LICENSE)
