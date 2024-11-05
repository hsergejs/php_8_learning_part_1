<?php
include_once("../helperConstants/helperConstants.php");
include_once("../helperFunctions/display.php");

$textToDisplay = <<<'TEXT'

list of builtin array functions: https://www.php.net/manual/en/ref.array.php

$arr = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];

array_chunk(); - split array on specified chunks, return arrays in array
prettyArrayPrint(array_chunk($arr, 2)); - will split array by index and two elements in each, 
keys are not preserved, but if we set 3rd argument in function will allow to do so


array_combine(); - will combine 2 arrays, 1st keys and 2nd as values and return array; if amount of elements don't match, throw error 


$arr = [1,2,3,4,5,6,7,8,9,10,11,12];
array_filter(); - returned array will contain VALUES according to callback (anonymous/arrow function), if not value discarded
array_filter($arr, fn($val) => $num % 2 === 0); - get only even numbers
by default value is passed to a callback, but we can change it as 3rd param
array_filter($arr, fn($key) => $key % 2 === 0, ARRAY_FILTER_KEY);  - this will not preserve keys, just discard
array_filter($arr, fn($val, $key) => $val % 2 === 0, ARRAY_FILTER_BOTH); - this will not preserve keys, just discard

so we can use array_values($arr); - will return values and reindex array

if we don't specify callback array_filter($arr); - this will discard all false values


$arr = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
array_keys() - will filter KEYS and return array

$keys = array_keys($arr); - will return array with numeric keys (0-4) and values as keys from init array (a,b,c,d,e)
$keys = array_keys($arr, 3) - will return c, as value 3 is at key c 
by default function do loose comparison, but we can specify strict comparison as 3rd param
$keys = array_keys($arr, 3, true);


array_map(); - apply callback to each element of the array
$arr = [1,2,3,4,5,6,7,8,9,10,11,12];
prettyPrintArray(array_map(fn($num) => $num*3, $arr));

using multiple arrays and array_map():
$arr = ['a' => 1, 'b' => 2, 'c' => 3];
$arr1 = ['d' => 4, 'e' => 5, 'f' => 6];

array_map(fn($num1,$num2) => $num1 * $num2, $arr, $arr1); - this will multiply each array values by another array value
resulting array will be reindexed
if 1 array is passed indexes will be preserved, more arrays resulting array will be reindexed
e.g. [0 => 4, 1 => 10, 2 => 18]
if length of arrays differ, then missing elements in our case will be multiplied by 0 
for example we don't have c => 3, then [0 => 4, 1 => 10, 2 => 0], if we do addition [0 => 4, 1 => 10, 2 => 6]

if we pass NULL as a callback 
array_map(null, $arr, $arr1); - it will just build a new array



array_merge(); - will merge multiple arrays
if keys are numeric, then arrays will be just appended and reindexed, but we will have string keys, they will preserve
and if string keys are same in arrays, later values will be overwritten;


array_reduce(); - will reduce array to a single value using a callback function we pass
as example we have an $array = [
['price' => 9.99, 'qty' => 3, 'descr' => 'item 1'],
['price' => 2.49, 'qty' => 6, 'descr' => 'item 2']
];

$total = array_reduce(
    $array,
    fn($sum, $item) => $sum + $item['qty'] * $item['price']
       get sum, of item => previous result sum + current calculations
       initially sum will be 0, but we can add 3rd param to change it
);


array_search() - we can search array my value, which will return first key of the matching value, key sensitive
$arr = ['a', 'b', 'c', 'd', 'e', 'b', 'f'];
$key = array_search('b', $arr); - will return 1, even we have two 'b' values


in_array('a', $arr); - to check if a value in a array, return true or false


array_diff(); - find the difference between arrays, will return values that has first array and are not in the rest of the arrays
array_diff($arr1,$arr2,$arr3); - return array of VALUES are in 1 array and not in others !!! check only VALUES

array_diff_key($arr1,$arr2,$arr3); - return array of KEYS are in 1 array and not in others !!! check only KEYS

array_diff_assoc($arr1,$arr2,$arr3); - will show values from first array based on KEY => VALUE PAIRS, 
so even if values same, keys are different, or other side, it will be added to resulting array


sorting arrays

asort(); - by default will sort by value, keys are preserved

ksort(); - will sort by keys

usort(); - we specify sorting algo by using a callback function
usort($arr, fn($a,$b) => $a <=> $b); - will remove string keys and use numeric ones and reindex


array destructure to a separate values

we can use list[] - it set each value to according variable $a = 1, $b = 2 etc.
$arr = [1,2,3,4];
list($a,$b,$c,$d) = $arr; - we can skip value, but leaving index space (e.g. list($a,$b, ,$d))
or we can use [] 
[$a,$b,$c,$d] = $arr; - we can skip as well, same way

and then use that variables 
echo $a.' '.$b.' '. etc

we can destruct array in array as well
$arr = [1,2,[3,4]];
[$a,$b,[$c,$d]] = $arr;

we can specify keys
$arr = [1,2,3,4];
[1 => $a, 0 => $b, 3 => $c, 2 => $d] = $arr; - same approach for string keys 


TEXT;

echo nl2br($textToDisplay);