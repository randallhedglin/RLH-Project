rd /q /s .phpdoc
php phpdoc.phar -d . -t .phpdoc --visibility public,protected,private --sourcecode --parseprivate
rd /q /s output
pause

rd /q /s jsdoc
call jsdoc . -d .jsdoc -p -t templates/docdash -a all -r --private
pause
