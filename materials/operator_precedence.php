<?php
include_once("../helperConstants/helperConstants.php");


$textToDisplay = <<<'TEXT'
list of precedence and associativity in PHP: https://www.php.net/manual/en/language.operators.precedence.php

example what is precedence:
$x = 3 + 5 * 5; - * comes first, then +
$x = (3 + 5) * 5; - forcing precedence with ()

associativity example: might be left, right and N/A
$x = $y = 5; as we we have both = then associativity comes and decide how we do execution,
in this case from right to left (can be checked in the link) 
e.g. $y = 5 is grouped first and then $x = $y; 

$x = 5 / 2 * 10 - this case precedence is the same for / and * , associativity here is from left to right (can be checked in the link)
e.g. 5/2 grouped first and then what ever the value of the first group * 10 and then = as it's has lowest precedence

$r = $x < $y > $z - this case precedence is the same, but associativity "non-associative" 
e.g. they can't be used next to each other
but $r = $x < $y == $z as > and == have different precedence

HINT - use parenthesis as much as possible, it also adds readability

TEXT;

echo nl2br($textToDisplay);