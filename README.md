# High Line Park Map Guide

----

Welcome to your interactive guide to the high line park attractions.
See below for dependencies and install instructions

## Dependencies
----
* PHP > 5.3.2 (configured for MySQL and with intl extension)
* Apache
* MySQL
* Java (for asset processing)
* [Composer](http://getcomposer.org/download/)

## Installation

* Clone and symlink the `web` folder to the html root

* Copy `app/config/parameters.yml.dist` to `app/config/parameters.yml`

* In the project folder, install dependencies using composer:

    composer.phar update

* Clear the cache

    php app/console cache:clear --env=prod

* Dump assets

    php app/console assetic:dump --env=prod

    php app/console assets:install --symlink --env=prod

* Run the following commands to create the database and fill it with data fixtures

    php app/console doctrine:database:create --env=prod

    php app/console doctrine:fixtures:load --env=prod

* Make the necessary directories readable by the apache user

    chmod g+w -R app/cache && chgrp -R [APACHE USER HERE] app/cache

    chmod g+w -R app/logs && chgrp -R [APACHE USER HERE] app/logs