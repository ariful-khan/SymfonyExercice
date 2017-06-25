SymfonyExercice
===============

Project setup steps.

Run this two command to setup database and load data.

1. bin/console doctrine:migrations:migrate
2. bin/console doctrine:fixtures:load

now you can access all there url

1. /
2. /book/{nameOfTheBook}
3. /genre/{genre}
