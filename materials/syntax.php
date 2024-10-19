<?php
include_once('../helperConstants/helperConstants.php');

echo "Testing output in browser";
echo DOUBLE_SPACE;

//print return 1
$var = print "Print return the value";
echo SPACE;
echo "print value {$var}";
echo SPACE;
echo "echo is faster than print";
echo DOUBLE_SPACE;

echo <<<EOD
' ' vs " "
</br>
in ' ' we can't add variable, but we can use concatination . e.g. 'some text' . \$var_example
</br>
in " " we can add variables, for better readability use {} e.g. "some text {\$var_example}" 

EOD;
echo DOUBLE_SPACE;

echo "variables are asigned by default by value!";
echo SPACE;
$x = 1;
$y = $x;

$x = 3;

echo "x = " . "1";
echo SPACE;
echo "y = " . "x";
echo SPACE;
echo "x = 3";
echo SPACE;
echo "after reassignment of x value of y is the same = $y";
echo SPACE;

$x_ref = 1;
$y_ref = &$x_ref;
$x_ref = 3;
echo <<<EOD
but we can use '&' symbol to use by reference
</br>
x = 1;
</br>
y = &x;
</br>
x = 3;
</br>
thus y value will change after x is changed = $y_ref
</br>
thus every time x is changed y will also change!!!
EOD;

echo DOUBLE_SPACE;

echo "when embedding php in html we can use following syntax: <p> <?= 'some text in php' ?> </p>";
echo SPACE;
echo "this will be qual to {echo 'some text in php'} ";
echo SPACE;
echo "but if required some calculations we use regular php tags";
