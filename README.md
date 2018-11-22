# task
NFQ task - RSS feed webpage, with a few scripts
-

1. Composer update;
2. Rename htaccess file into .htaccess;


Reate PHP command line script that will fill DB tables with the data from XML RSS feed (e.g. http://www.nfq.lt/rss )
-
cd /task/src/Classes;
php -f Sortinfo.php URL
example:
php -f Sortinfo.php https://www.nfq.lt/rss

Script should be able to assign a category.
-
cd /task/src/Classes;
php -f Sortinfo.php URL category
exmaple:
php -f Sortinfo.php https://www.nfq.lt/internet-explorer-9-pristatyme-dalyvavo-nfq Naujienos
