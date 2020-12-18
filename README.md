# php-2009-wild-series

To run the project, first make a `.env.local` file with the configuration of your database, then:

    composer install
    yarn install
    yarn encore dev

Create the database if needed with:

    symfony console doctrine:database:create
    symfony console doctrine:migrations:migrate

Seed the database if needed with:

    symfony console doctrine:fixtures:load

Run the server:

    symfony server:start
