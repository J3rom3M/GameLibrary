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

To populate database with *"The IGDB API"* data follow this steps :

1. Complete .env file with your api key
2. Run the exemple command for the video game Star Wars Outlaws =>> `php bin/console app:import-games "star-wars-outlaws"
`
3. That's all !!

#### ***Populate command options:***
`-t / --truncate` : Truncate database before populate (index restart to 1)

`--page=int` : Select number of result page. 1 page = 20 results, ***exemple : if you want 60 movies in your database you should add --page=3 option to the command*** **(Default is 1)** 

# Enjoy ! And Keep Coding !! :nerd_face: 
