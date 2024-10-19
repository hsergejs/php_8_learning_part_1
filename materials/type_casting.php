<?php
include_once("../helperConstants/helperConstants.php");

echo "PHP is dynamically typed language. Thus, type might change after it's declaration!";
echo DOUBLE_SPACE;
echo "Dynamic type checking happens at RUN TIME, static type checking happens during COMPILE TIME";
echo DOUBLE_SPACE;
echo "we can check var type with the help of the gettype(); using for example \$var = 5 --> ";
echo SPACE;
$var = 5; 
echo "echo gettype of \$var = " .gettype($var);
echo SPACE;
echo "or we can use var_dump()";
echo SPACE;
echo "echo var_dump() of \$var = " .var_dump($var). " for some reason displayed at the front";
echo DOUBLE_SPACE;
echo <<<EOD
type casting in functions:</br>
example: function sum(\$x,\$y){ </br>
    return \$x + \$y; </br>
} </br>

</br>

we can provide strict type </br>
function sum(int \$x, int \$y){ </br>
    return \$x + \$y; </br>
} </br>

</br>
but PHP will still try to convert types, for example if string is passed, e.g. sum(2, '3'); </br>
to avoid this we can DECLARE strict type in PHP (only for this particular .php file, </br>
e.g. we need to define this in every file where we need it) </br>
using declare(strict_types=1); </br>
but there is one case where if we restrict float and pass integers it will still work, even strict type is on </br>
function sum(float \$x, float \$y){ </br>
    return \$x + \$y; </br>
} </br>
and pass sum(2, 5);
</br></br>

also PHP guarantee type only till type declaration, in our case till int \$x </br>
so in example bellow we can change \$x type further in code </br>
function sum(int \$x, int \$y){ </br>
    \$x = 5.5; </br>
    return \$x + \$y; </br>
} </br>
 and if we var_dump(\$x) it will be float(5.5); </br>
EOD;

echo DOUBLE_SPACE;

echo <<<EOD
we can type cast in the following way: </br>
\$x = "5"; (string) </br>
\$x = (int) "5";
EOD;