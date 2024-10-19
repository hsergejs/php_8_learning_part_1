<?php
include_once("../helperConstants/helperConstants.php");

echo <<<EOD
float precision: due to binary representation of the float numbers loose some point of precision, so we need to be careful </br>
with ceil() - round up and floor() - round down functions </br>
e.g. \$x = floor((0.1+0.7)*10); - will return 7 (not 8) </br>
floor() rounds down and result of \$x = before floor() will be 7.9999...1118 and after function it will be 7 </br>
we can use another function ceil() - which will round up value and return 8 as the result </br>
but in the \$x = ceil((0.1+0.2)*10); - will return 4 </br>
because before ceil() value will be 3.0000...4 </br>
EOD;

echo DOUBLE_SPACE;

echo "thus don't trust round up till last digit and DON'T compare floats directly for equality!";

echo DOUBLE_SPACE;

echo "directly e.g. \$x=0.23 and \$y=1-0.77 and compare as if(\$x == \$y) - use strict comparison (e.g. ===)/or functions if available";

echo DOUBLE_SPACE;

echo <<<EOD
NAN - not a number might get sometimes </br>
INF - infinity if we go out of bounds of float - e.g. PHP_FLOAT_MAX * 2 
EOD;

echo DOUBLE_SPACE;

echo "never compare variable directly to NAN or INF </br>
instead use functions: is_nan() and </br>
is_infinite() / is_finite()";