<?php
include_once("../helperConstants/helperConstants.php");


$textToDisplay = <<<'TEXT'

while loop:
$count = 0;
while($count <= 15){
    echo $count;
    $count++;
}

infinite loop with break; used if we need to wait until something  
while(true){
    while($count >= 30){
        break 2; - will exit both loops
        break; - will exit second level loop only 
    }
    
    $count++;
}

break have optional argument, e.g. break 2, which by default is break 1
this will allow to break out from both loops if we have multiple nested loops (case 2 - we have 2 loops)

use case of continue;
while(true){
    if($count % 2 === 0){
        continue; - this will skip one loop iteration, in this case loop will became infinite, as we increase counter in loop iteration
                    as 0 % 2 = 0
                    so continue; will just skip everything bellow it
        continue 2; - also like break have option to skip nested loops iterations 

    }
    
    $count++;
}


similar to if statement we have short hand for html output

$count = 0;
while($count <= 15):
    echo $count;
    $count++;
endwhile;



we have do while - loop guarantee at least one iteration
do{
    $count++;
} while($count <= 10);


for loops
for($i=0; $i<15; i++){
    echo $i;
}

alternative syntax: 
for($i=0; $i<15; i++):
    echo $i;
endfor;


it can have empty expression
for(; ; ){ - is the same as while(true) 
    echo $i;
}

it can have multiple expressions in any part separated by ,
for($i=0; $i<15; print $i,  i++){ - print and then increment

}

to count chars in string we can use strlen() function 

more efficient way, as we call count() every time during loop iteration
$array = ['a','b','c','d','e','f','g','h','i'];
for($i=0; i < count($array); i++){
 some logic
}

better way avoiding performance issues, with big data chunks
or $length = count($array);
for($i=0, $length = count($array); i < $length; i++){
 some logic
}


foreach loop - used to iterate over arrays and/or objects
$array = ['a','b','c','d','e','f','g','h','i'];

foreach ($array as $letter){
    echo $letter;
}

we can access keys of the array using $var_name => $var_name
foreach ($array as $key => $letter){
    echo $key . ' : '.$letter. '</br>';
}

quick note after loop $letter ($var_name) will be not destroyed and value will be last element of the array!!!
so not to use same var_name later in the code

by default $letter assigned by value, but we can assign it by reference with the help of &
foreach ($array as $key => &$letter){
    $letter = 'O'; - this will change all elements of the array to 'O'
}

note on the loop variable after loop, especially when using reference, changing $letter later in the code
will change value of the last element of the $array
solution to this, we might call unset($letter);

if we will do it by value - original array will not change!!!

foreach and associative arrays and inner arrays:
$user = [
    'name' => 'Jonny',
    'email' => 'email',
    'skills' => ['php','java','css']
];

case 1:
foreach($user as $key => $value){
    echo $key . ': '. jason_encode($value) . '</br>'; - as we have inner array, it will give error, so we might use json_encode($value);
}

case 2: 
or use implode, but we need to check if value is array, as we need to use it only for array
foreach($user as $key => $value){
    if(is_array($value)){
        $value = implode(',',$value);
    }

    echo $key . ': '. $value . '</br>';
}

case 3:
or we can have nested loop and iterate over $value


in html alternative syntax:
foreach($user as $key => $value):
    echo $key . ': '. $value . '</br>';
endforeach;

TEXT;

echo nl2br($textToDisplay);