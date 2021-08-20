rd /q /s .phpdoc
php phpdoc.phar -d . -t .phpdoc --visibility public --sourcecode
rd /q /s output
pause

rd /q /s jsdoc
call jsdoc . -d .jsdoc -p -t templates/docdash -a all -r
pause
