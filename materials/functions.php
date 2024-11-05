<?php
include_once("../helperConstants/helperConstants.php");


$textToDisplay = <<<'TEXT'

----------------------------------------- part 1 -----------------------------------

by default functions return NULL, when return is not specified
function foo(){

}

var_dump(foo()); - will return NULL

by default functions are loaded on the runtime and can be called at any place, but we have exceptions:
1. if we define function conditionally - condition must happen and pass, before we call that function;

var_dump(foo());

if(true){
    function foo(){
        echo 'Function run';
    }
}

in this case there will be an fatal error and script will stop

but in case bellow will run:

if(true){
    function foo(){
        echo 'Function run';
    }
}

var_dump(foo());


2. when declaring functions with in functions - in PHP we can have that case and functions have global scope, internal functions can be
called from outside of the scope of the parent function, but paren must run first

function foo(){

    echo 'Foo';

    function bar(){
        echo 'Bar';
    }
}

so running functions:
foo(); - will print Foo; as bar() wasn't called yet, only declared
bar(); - will print FooBar;

but if we comment out
//foo();
bar(); - will raise error;


both cases not recommended to use !!!


we can declare returning type of the function, as by default PHP will try to figure it out automatically, to
strict it we need to declare(strict_type=1);
function foo() : int {
    return 1;
}

function foo() : void {
    echo 'Text';
}

this will expect either null or int as a return type
function foo() : ?int {
    return null; - will work
    return 1; - will work as well
}

from PHP 8 we can have multiple expected types using char |
function foo() : int | float | array {
    return 1; - will work
    return 0.86; - will work as well
    return [1,2]; - will work;
}

if we expect multiple types we can use mixed keyword, also from PHP 8
function foo() : mixed {
    return 1; - will work
    return 0.86; - will work as well
    return [1,2]; - will work;
}


----------------------------------------- part 2 -----------------------------------

we can strict type params + mixed type as well (strict type check is declared and set to 1)

function foo(int | float $x, int | float $y){
    return $x*$y;
}


we can pass default values via parameters. NOTE: optional params must be last in the list of params !!!

function foo(int | float $x, int $y = 10){
    return $x*$y;
}

and run it as foo(5);


we can use by reference approach in params as well, using &

function foo(int | float &$x, int $y = 10){
    return $x*$y;
}


variadic functions (accept variable (multiple) number of arguments)
use splat operator (not official name, but commonly used) - ... - is an array of size 0 to n
splat operator must be last in parameter list !!! so before can be some params as well

function sum(...$numbers) : int | float{
    $sum = 0;
    foreach($numbers as $number){
        $sum += $number;
    }

    return $sum;

    
    or we can use built in functions:
    
    return array_sum($numbers);

}


we can type hint splat operator as well

function sum(int $x, float y, int|float ...$numbers) : int|float{
    return array_sum($numbers);
}

we can use array as well, but in array we cant define types (as it might contain different types inside)
splat operator can be used to unpack array in array


from PHP 8 we can pass named arguments, so you can specify order of arguments

function foo(int $x, int $y) : int {
    return $x / $y;
}

$a = 6;
$b = 3;

echo foo(y: $b, x: $a); - naming will allow to set required order for params passed

named argument === function parameter, so if parameter name is change it's required to change named parameter as well !!!
named arguments help in with reducing required params passing (with default values)
e.g. setcookie('foo', 'bar', 0, '', '', false, true); - and we need to set only 1,2 and last param
thus we use named args to get to required only and skip others
setcookie(name: 'foo', value: 'bar', httponly: true);

we can combine named and required params
echo foo($a, y: $b);


when unpacking associative array keys are used as argument names and values as parameters

function foo(int $x, int $y) : int {
    return $x / $y;
}

$arr = ['y' => 3, 'x' => '6'];
echo foo(...$arr);

in non associative array index will be used as positional argument
$arr = [3, 'x' => '6'];
echo foo(...$arr); - as a result will throw error, as x already defined

TEXT;

echo nl2br($textToDisplay);