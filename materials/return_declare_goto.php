<?php
include_once("../helperConstants/helperConstants.php");


$textToDisplay = <<<'TEXT'

return;
if we use return; in global scope, it will just terminate this script, 
but in function it will stop function only, nothing will run after return and return a value, if one required 

if no expression specified, as it's optional - then null value will be returned (e.g. return; - will return NULL)


declare();
we have few declares 

1. declare - ticks - in PHP every expression called and events called ticks, but not all expression call them, rarely used
e.g. 
$x = 5; - tick
$y = 10; - tick
$z = $x*$y; - tick
we can have custom function to execute on each tick 

function onTick(){
    echo '</br>';
}

now we register tick function
register_tick_function('onTick');

and now declare
declare(ticks = 1); 1 means on each tick run function, it can be for example 3, so on every 3 tick run onTick()

2. encoding declare(); - we can declare encoding for each script, rarely used

3. declare strict types
so like was mentioned earlier when used include required to declare strict type in each PHP file
because declaration will work only for file where it's declared


GOTO statements - The goto statement is used to jump to another section of a program. 
It is sometimes referred to as an unconditional jump statement. 
The goto statement can be used to jump from anywhere to anywhere within a function.

like a label in code, where you can jump to for execution

// Function to check even or not 
    function checkEvenOrNot($num) { 
        if ($num % 2 == 0) 
          
            // Jump to even 
            goto even; 
        else
            // Jump to odd 
            goto odd; 
  
    even: 
        echo $num . " is even"; 
          
        // Return if even 
        return; 
    odd: 
        echo $num . " is odd"; 
    } 
  
    $num = 26; 
    checkEvenOrNot($num); 




TEXT;

echo nl2br($textToDisplay);