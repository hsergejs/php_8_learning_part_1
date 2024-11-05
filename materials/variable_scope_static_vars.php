<?php
include_once("../helperConstants/helperConstants.php");


$textToDisplay = <<<'TEXT'

we global and local scopes

$x = 5; - have a global scope including include and required statements

but it have no scope in functions

function foo(){
    echo $x; - will throw an error, as in functions it's a local scope
}

foo();

so we can define $x in function or pass as parameter or defined it in a global scope

function foo(){
    global $x; - is a reference to original $x

    $x = 10;
    echo $x; - will work
}

foo();
echo $x; - will show 10 not 5

PHP store global variable in a associative array $GLOBALS, where key => name and value => var value
and we can access and change them in function:
not recommended to use !!!

function foo(){
    $GLOBALS['x'] = 10;
    echo $GLOBALS['x'];
}


static variables is a regular variable with a local scope, but it's NOT destroyed out of the scope boundary and save value
but regular variable is destroyed

we use static keyword and it's helpful with caching

function getValue(){
    static $value = null;

    if($value === null){
        $value = expensiveFunction();
    }

    return $value;
}

function expensiveFunction(){
    sleep(2);
    return 10;
}

echo getValue(); 
echo getValue();
echo getValue();

in total it will sleep only 2 seconds, as $value is defined and retained on the first function call
there will be more material on static keyword in future;


TEXT;

echo nl2br($textToDisplay);