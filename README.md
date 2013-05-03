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

* Run the following commands to create the database and fill it with data fixtures

    php app/console doctrine:database:create
    php app/console doctrine:fixtures:load

* Make the necessary directories readable by the apache user

    chmod g+w -R app/cache && chgrp -R [APACHE USER HERE] app/cache
    chmod g+w -R app/logs && chgrp -R [APACHE USER HERE] app/logs

To visit the dev site, go to http://localhost/[FOLDERNAMEHERE]/app_dev.php/
That URL is not implemented yet, but the backend can be accessed by
.../app_dev.php/admin/artwork
