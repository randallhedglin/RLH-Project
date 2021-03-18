::call vendor\bin\phpdoc -d classes -t phpdoc --template old-ocean
call vendor\bin\phpdoc -d classes -t phpdoc --template zend
pause

call jsdoc js -d jsdoc -p -t templates/docdash
pause
