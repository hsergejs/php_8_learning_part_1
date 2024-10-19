<?php
include_once("../helperConstants/helperConstants.php");

$textToDisplay = <<<'TEXT'
all array functions list: https://www.php.net/manual/en/ref.array.php

we can define array as: $var_name = ["type 1", 2, null];

or older way $var_name = array("type 1", 2, null);
access elements either to change or read value, starting from index = 0 e.g. echo $var_name[1]; will show 2, 
but we can't access it using negative numbers like in strings; 

we can check if element exists at specific index using isset($var_name[0]) function, which return true or false;
also we can use array_key_exists('keyValue', $array); and it will return true or false;
the difference is that isset(); will tell if key exists and it's NOT null

in_array() - Checks if a value exists in an array

we can print array as var_dump($var_name);
then we can use print_r($var_name);
and finally fancy way using 'pre' and '/pre' tags

<pre>
print_r($var_name);
</pre>

we can check in code!

to get array length we use count($var_name) function;

adding a new value to the end of the array syntax: $var_name[] = "Johny";
same way we can add elements by using array_push('$var_name', 'Johny', 10, 'etc.'); - this function mutates original array (e.g. modify it)

associative array == we define our own keys: 
$var_name[
'name' => 'Johny',
'type' => 'type 1',
'version' => 1
 ];
as keys we can have only string or integers
access is the same as in indexed array
adding a value to associative array syntax: $var_name['balance'] = 10;

we can access/modify array value with the help of the variable: $key_index = 'type';
echo $var_name[$key_index];


multidimensional arrays: 
$var_name[
'name' => [
    'firstName' => 'Johny',
    'lastName' => 'Depp'
],
'type' => 'type 1',
'version' => 1
 ];
 
and we can go even deeper with more arrays and different data types;
to access element in multidimensional array we use following syntax: echo $var_name['name']['lastName'];
and if we have more dimensions: $var_name['name']['lastName'][0]['state']... etc.


by default php defines numeric keys

if we specify same key, the last value will overwrite first one; e.g. $array = [0 => 'foo', 1 => 'bar', '1' => 'Jonhy'];
and if we echo it will be [0] => foo [1] => Jonhy; even 1 and '1' indexes, as PHP will try to cast keys when possible,
in our example from string to int;
!!! cool example $array = [true => 'a', 1 => 'b', '1' => 'c', 1.8 => 'd'];
and result will be [1] => d; because true = 1, 1 = 1, '1' = 1, 1.8 = 1 --> all casted to int when possible

null as key will cast to empty string; e.g. $array = [null => 'Depp']; will echo [] => Depp
and we can access it as usual; echo $array[''] or echo $array[null]; will show Depp;

if no key is provided php will assign it automatically, a numeric one;
if there's keys like 0, 1, 'type', 'version' when adding a new value without a key 
it will just increase the last numeric one key value by 1 and add it 
e.g. $array = ['a', 'b', 50 => 'c', 'd']; it will echo [0] = a, [1] = b, [50] = c, [51] = d
so be careful when assigning numeric values to keys only to some of them !!!

removing value from array:
using array_pop(); will remove last element from the array and returns value
using array_shift(); will remove fist element from the array and returns value; in mean time indexes will be reindexed
e.g. element with key 1 will become with index 0 and if we will have other numbers, the will go from 0 till end of array by 1
e.g. using array_shift() on ['a', 'b', 50 => 'c', 'd']; it become [0] = b, [1] = c, [2] = d
only numeric key values will be reindexed and leaving string as is; 
e.g. using array_shift() on ['a', 'b', 50 => 'c', 'foo' => 'd']; it become [0] = b, [1] = c, [foo] = d
using unset(); if we don't specify index (e.g. unset($array)) it will destroy whole array
if with index (e.g. $array[50] at ['a', 'b', 50 => 'c', 'd'])
will only remove this element at this index position and not reindex whole array: 0 => 'a', 1 =>'b', 51 => 'd']
with unset() we can specify multiple elements to be removed; e.g. unset($array[50], $array[1]);

example to be aware of:
$array = [1, 2, 3];
unset($array[0], $array[1], $array[2]); as a result we will have an empty array, but index will be saved as 2
and if we add new element $array[] = 'a'; index will be 3 !!! echo [3] = 'a';

casting: 
$x = 5;
var_dump((array) $x); it will cast 5 to array and set 5 with index 0; in browser will show [0] => 5;
for string $x = 'foo'; echo [0] => 'foo';
for $x = null; will be created an empty array []


TEXT;

echo nl2br($textToDisplay);

echo DOUBLE_SPACE;

echo "fancy array print out test: </br>";
$array = [1,2,4];
$arrayMix = ['order_number' => '12345', 'index' => '1', 333 => 333];
$multiArray = ['a','b','c', 'array' => [
    'inside array' => [
        1,2,3,4
    ],
'next item' => 'next item']
]; 

echo "<pre>";
    print_r($array);
echo "</pre>";

echo "<pre>";
    print_r($arrayMix);
echo "</pre>";

echo "<pre>";
    print_r($multiArray);
echo "</pre>";

echo DOUBLE_SPACE;
echo "testing if value of 3 exists in [1,2,3,4,5] using in_array() function: ";
$array = [1,2,3,4,5];
echo var_dump(in_array(3, $array));