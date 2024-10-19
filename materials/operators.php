<?php
include_once("../helperConstants/helperConstants.php");


$textToDisplay = <<<'TEXT'

----------------------------------------- p1 of the videos --------------------------------------

arithmetic operators - interesting ** ;
$x = 10;
$y = 2;
var_dump($x ** $y); will show 100 ; basically it's 10 to power of 2;


we can cast string numeric value using + or - to integer;  
$x = '10';
$y = 2;
var_dump(+$x); will show NOT string(10), but int(10);
$x = -'10'; we can also do this at the declaration stage;


$x = 10;
$y = 2;
if we use / and BOTH values are integers and evenly divisible result will be integer, otherwise result always will be float !!!

$x = 10;
$y = 0;
var_dump($x/$y); prior PHP 8 will give warning and return INF, after fatal error with nothing returned;
but if we need this INF we can use fdiv($x/$y); and it will return only INF

modulus operator
$x = 10.5;
$y = 2.9;
var_dump($x % $y); is alway casting to int and return integer;
to perform mod operations on floats we can use fmod($x % $y); and it will return float
$x = 10;
$y = -3;
var_dump($x % $y); will return positive number 1 and int, as it's taking sign from the first operator in our case it's $x
if $x = -10;
$y = 3;
then result will be -1 and int

we assign multiple values at the same time: $x = $y = 10; and var_dump($x, $y); will show int 10 on both;
we also ca use more complex assignments $x = ($y = 10) + 5 but not recommended !!! result will be x = 15 and y = 10

we can use short hands like:
$x = 5;
$x = $x * 3; same as $x *= 3; 
we can use others $x += 3; $x %= 3; $x **= 3; etc.
but if we will not define $x it will return error

by default values assigned by value, not by reference - it means it copy original value to new a one !!!


$x = 'Hello';
$x = $x . ' World'; is the same as $x .= 'World';

comparisons !!!
if($x == $y) / if($x != $y) -- loose comparisons, loose equality and loose inequality, where it does automatic type conversion
if($x === $y) / if($x !== $y) -- strict comparison or Identical/ not Identical, where we have data type checking and comparison

if($x <> $y) is  the same if($x != $y)

if($x <=> $y) -- named spaceship; combine less than and greater than signs; 
e.g. if $x == $ y - return 0; if $x < $y - return -1; if $x > $y - return 1;


!!!
before PHP 8 if we compare string to a number, string was converter to a number and then compare
e.g. var_dump(0 == 'hello'); -> 'hello' was converter to a number in this case 0 and than compared and return TRUE
but in PHP 8 if string is not numeric the other side will be converted to string and then compare
e.g. var_dump(0 == 'hello'); 0 - will be converted to string '0' and strings will compare resulting FALSE;
but if var_dump(0 == '0'); string will be converted to numeric value and then compare;
so use as much as possible strict types and strict comparisons
!!!
interesting case:
$x = 'Hello World';
$y = strpos($x, 'H');
if($y == false) - will show true, as H is with index 0 and then (0 == false) and 0 converted to false and false == false is true, but
if($y === false) - will return false;


ternary operator ?:
$if($y === false){
    return true;
}
else{
    return false;
}    
is the same as $result = $y === false ?: return true : return false;
we can stack ternary operators but OBLIGATE to use parenthesis !!!!


null equality operator ?? - used for working with nulls
$x = null;
$y = $x ?? 'hello'; 
if $x is null use defined 'hello' for the $y, if not use $x value
e.g. in this example $y = 'hello'; but if
$x = false;
$y = $x ?? 'hello';
in this case $y = false;

very useful working with undefined vars and array values, to define default value var is null

--------------------------------- part 2 of the videos start here --------------------------------------

error control operator - @
it will just suppress the warning of the expression! if added to the expression
not recommended to use

incrementing and decrementing operators -> -- and ++
post increment x++  it will FIRST return a value and THEN increment 
pre increment --x  it will FIRST decrement value and THEN return
affect only numbers and strings, other types not affected
except NULL, $x = null;
echo $x++ or ++$x = will increment it will show 1, but decrement has no affect
and strings, $x = 'abc'; decreasing will have no affect, but
$x++ will increase LAST character ASCI number


logical operators: no questions to && and ||
logical operators work with nearly all data types, as PHP will do type conversion
negation operator ! 
$x = 0 and $y = false; 
vat_dump(!$x || $y); --> will show true, as init value x - is false, negation will make it true

here precedence is highly important here - what calculated first !!! will be covered in future
thus AND operator XOR operator not really the same as && || operators in terms of precedence

short circuiting in PHP - what is valuated and what is excluded, as not needed!
e.g. $x = true; $y = false;
var_dump($x || $y) - $y is never evaluated, as for || only one operator required to be true to return true and $x come as first,
but if var_dump($y || $x) then $x will be as first value is false
this might bring issue with calling functions:
$x = true;
function hello(){
    echo 'Hello world!!!';
    
    return false;
}
and var_dump($x || hello()); - we might think, that it will print Hello world, but it's not as hello() will never run,
but var_dump($x && hello()); - will print and run as both needed for true
but in case where $x = false; 
($x && hello()); - hello() will never run; as $x = false, so no need to check second part, as whole expression evaluates to false

in case var_dump($x && hello() || true); - hello() will not run again, as && has higher precedence and associativity than ||,
so $x && hello() grouped and executed first and same $x - false, then hello() no need to check and then we check false || true, 
the second group and return true, as || need at least one true and first is false


array operators: 
$x = ['a','b','c'];
$y = ['d','e','f'];

$z = $x + $y - will result compute union of 2 arrays 
union - take y values and append values to x if they don't exists at the same index or the same key;
in our case $x will not change, as indexes are the same and not override values at the same keys
but if we change $y = ['d','e','f','g','h']; this will append g and h to the x array

$x == $y - will check KEY => VALUE pairs and if same return true (must be both the same), and not false;
if one of the elements is numeric string and other int it still return true/false, also ORDER of elements don't matter
as we do loose comparison
$x === $y - strict comparison will check KEY => VALUE pairs, their data types and their ORDER
same for the inequality operators != and !== and <> (same as !=)

TEXT;

echo nl2br($textToDisplay);