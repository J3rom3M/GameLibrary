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
