<?php
include_once("../helperConstants/helperConstants.php");


$textToDisplay = <<<'TEXT'

https://www.php.net/manual/en/function.set-error-handler.php - error handling PHP doc 
https://www.php.net/manual/en/errorfunc.constants.php - error constants


we can change error reporting level by calling
error_reporting(0); - no errors will be displayed
error_reporting(E_ALL); - all errors will be displayed
error_reporting(E_ALL && ~E_WARNING); - display all errors except warnings


trigger_error('Example error!', E_USER_ERROR); - we can manually trigger errors this way and specifying msg and error lvl
trigger_error('Example error!', E_USER_WARNING);

we can only trigger manually using trigger_error() E_USER_ lvl errors and warnings


to show or not errors and warnings in PHP is setup in ini.php at the line of display_errors
even warnings and errors not displayed they are logged and located in PHP php_error_log file

we can manually log errors by using error_log(); function with msg


to handle errors in PHP we can create custom error handler and tell PHP how to handle errors at run time;
so we can take some actions if error occurs, e.g. some clean up, display msg etc.

so we create a function called errorHandler(); with at least 2 params

?string $file, - ? at the type show that this argument is optional
?string $line - ? at the type show that this argument is optional

function errorHandler(
    int $type, - error type in int
    string $msg, - error msg
    ?string $file, - file name where error occurs
    ?string $line - line in file where error occurs
        ){
    
        here we can do operation if error occurs, but in production NEVER show file,line to the user
        also always escape msg

        we can return true - to continue script execution, or something else
        we can return true - to return to standard PHP error handling
        or exit - this will stop script execution and this is used in fatal or important errors
}

after declaring errorHandler function we register it in set_error_handler(); function

set_error_handler('error handler function name', E_All); - second param is a error level used for custom handler 

this will overwrite error_reporting(E_ALL & ~E_WARNING); - set_error_handler will overwrite to E_ALL

we can't custom handle some of the error types, like parse and compile errors

there might be cases when we declare error handling before line of the actual error and as a result it will not be handled
so use set_error_handler as low as possible

we can restore previous error handler by using error_restore_handler()


TEXT;

echo nl2br($textToDisplay);