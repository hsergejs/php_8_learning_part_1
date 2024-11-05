<?php
include_once("../helperConstants/helperConstants.php");


$textToDisplay = <<<'TEXT'

function sum(int|float ...$nums) : int|float{
    return array_sum($nums);
}

echo sum(1,2,3,4);

variable functions:

it will work as well in the following case, as PHP will look a function name
if function name don't have same name as in variable, we get an error, but we can check it:
with the help of the if(is_callable($x)) - and run it inside    

$x = 'sum';

echo $x(1,2,3,4);

variable functions don't work with some language constructs like: isset(), empty(), print(), echo , include etc. 
but we can create wrapper functions


anonymous functions/lambda functions/function without a name:
to call it we can assign it to a variable

$sum = function (int|float ...$nums) : int|float{
    return array_sum($nums);
}; - must finish with ;

echo $sum(1,2,3,4);

we can pass anonymous functions as args to a functions and return them from the functions 

in anonymous functions we can access variables in parent scope using use keyword
this type of anonymous function called as closure

$x = 5;
$sum = function (int|float ...$nums) use ($x) : int|float{
    echo $x; - will work
    $x = 10; - this will change only in local scope, but im parent scope $x still be 5
    but we can use '&' at 'use (&$x)' - this will set $x to reference value and it will change $x in parent scope to 10
    return array_sum($nums);
};


callable type (is a callable function that we pass) and call back functions - is functions which expects a function as an argument
there's a lot of built in functions in PHP
there's a few ways that we can pass a function

example 1 directly applying functions to args:

$array = [1,2,3,4];
$array2 = array_map(function($element){
    return $element * 2;
}, $array);

example 2 assign anonymous function to variable and pass it:

$array = [1,2,3,4];
$x = function($element){
    return $element * 2;
};
$array2 = array_map($x, $array);


example 3 assign a function name and pass it as a string
$array = [1,2,3,4];
function foo($element){
    return $element * 2;
};
$array2 = array_map('foo', $array);



for our example function example passing as string

$sum = function (callable $callback, int|float ...$nums) : int|float{

    return $callback(array_sum($nums));
};

echo $sum('foo',1,2,3,4); - pass function as string

function foo($element){
    return $element * 2;
};


for our example passing as anonymous function

$sum = function (callable $callback, int|float ...$nums) : int|float{

    return $callback(array_sum($nums));
};

echo $sum(function ($element){
    return $element * 2;
},1,2,3,4); - pass function as anonymous function


arrow functions - is a cleaner syntax of the anonymous functions, with just a few differences
very useful as an inline callback function, e.g. passing it as an argument to a builtin PHP functions

$array = [1,2,3,4];

regular usage:

$array2 = array_map(function(){
    return $number * $number;
}, $array);

with arrow function usage:
$array2 = array_map(fn($number) => $number * $number, $array);


differences
we can access variables from the parent scope, but it passed by value, thus can't change parent scope variable value:
$y = 5;
$array2 = array_map(fn($number) => $number * $number * $y, $array);

arrow functions have only 1 expression and it return the value of that expression 
e.g. you can have multiple line expressions array_map(fn($number) => $number * $number * $y; $number + $number, $array); - is not allowed



TEXT;

echo nl2br($textToDisplay);