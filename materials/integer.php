<?php
include_once("../helperConstants/helperConstants.php");

echo <<<EOD
if we go over max integer value it will change it's type to float </br>
\$x = PHP_INT_MAX + 1; </br>

type casting in integers:</br>
\$x = (int) "81xxxc" - var_dump() will convert it to 81, but "test" will return 0 as there's no numeric value in string</br>
</br> same for the float </br>
we can also use \$x = (integer) "5"; </br>
\$x = (int) "8.56" or (float number) 8.95 - will return 8 (round down always) </br>
\$x = (int) NULL - will return 0 </br>
we can check integer type with the help of the function is_int() </br>
EOD;

