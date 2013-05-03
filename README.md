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

## Installation

Clone and symlink the `web` folder to the html root

Make the necessary directories readable by the apache user

    chmod g+w -R app/cache && chgrp -R [APACHE USER HERE] app/cache
    chmod g+w -R app/logs && chgrp -R [APACHE USER HERE] app/logs

To visit the dev site, to go http://localhost/[FOLDERNAMEHERE]/app_dev.php/
That URL is not completed yet, but the backend can be accessed by
.../app_dev.php/admin/artwork