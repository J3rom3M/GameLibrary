# GameLibrary
#### 🎮 Video Game Library 🎮

### I. Get started
To start develop:
* Fork the projects
* Run `composer install`
* Complete .env file with your database credentials
* `symfony console doctrine:database:create`
* `symfony console doctrine:migrations:migrate`
* Here we go !!

### I.  DataBase fixtures

Populate database with *"The IGDB API"* data follow this steps :

1. Complete .env file with your api key
2. Run the exemple command for the video game Star Wars Outlaws =>> `php bin/console app:import-games "star-wars-outlaws"



######



Some files have been created and/or updated to configure your new packages.
Please review, edit and commit them: these files are yours.

 symfony/framework-bundle  instructions:

  * Run your application:
    1. Go to the project directory
    2. Create your code repository with the git init command
    3. Download the Symfony CLI at https://symfony.com/download to install a development web server

  * Read the documentation at https://symfony.com/doc

 doctrine/doctrine-bundle  instructions:

  * Modify your DATABASE_URL config in .env

  * Configure the driver (postgresql) and
    server_version (16) in config/packages/doctrine.yaml

 symfony/messenger  instructions:

  * You're ready to use the Messenger component. You can define your own message buses
    or start using the default one right now by injecting the message_bus service
    or type-hinting Symfony\Component\Messenger\MessageBusInterface in your code.

  * To send messages to a transport and handle them asynchronously:

    1. Update the MESSENGER_TRANSPORT_DSN env var in .env if needed
       and framework.messenger.transports.async in config/packages/messenger.yaml;
    2. (if using Doctrine) Generate a Doctrine migration bin/console doctrine:migration:diff
       and execute it bin/console doctrine:migration:migrate
    3. Route your message classes to the async transport in config/packages/messenger.yaml.

  * Read the documentation at https://symfony.com/doc/current/messenger.html

 symfony/mailer  instructions:

  * You're ready to send emails.

  * If you want to send emails via a supported email provider, install
    the corresponding bridge.
    For instance, composer require mailgun-mailer for Mailgun.

  * If you want to send emails asynchronously:

    1. Install the messenger component by running composer require messenger;
    2. Add 'Symfony\Component\Mailer\Messenger\SendEmailMessage': amqp to the
       config/packages/messenger.yaml file under framework.messenger.routing
       and replace amqp with your transport name of choice.

  * Read the documentation at https://symfony.com/doc/master/mailer.html

 symfony/phpunit-bridge  instructions:

  * Write test cases in the tests/ folder
  * Use MakerBundle's make:test command as a shortcut!
  * Run the tests with php bin/phpunit

 symfony/webpack-encore-bundle  instructions:

  * Install NPM and run npm install

  * Compile your assets for development: npm run dev

  * Compile your assets for development and watch for any modifications: npm run watch

  * Or start the development server: npm run dev-server

  * Compile your assets for production: npm run build

No security vulnerability advisories found.