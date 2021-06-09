rd /q /s phpdoc
php phpdoc.phar -d class -t phpdoc --visibility public --sourcecode
rd /q /s output
pause

rd /q /s jsdoc
call jsdoc js -d jsdoc -p -t templates/docdash -a all
pause
