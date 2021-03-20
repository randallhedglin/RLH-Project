call vendor\bin\phpdoc -d class -t phpdoc --template old-ocean
::call vendor\bin\phpdoc -d class -t phpdoc --template zend
pause

call jsdoc js -d jsdoc -p -t templates/docdash
::call jsdoc js -d jsdoc -p
pause
