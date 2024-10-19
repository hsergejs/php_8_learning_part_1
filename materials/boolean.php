<?php
include_once("../helperConstants/helperConstants.php");

echo <<<EOD
int --> 0 and -0 => false </br>
float --> 0.00 and -0.00 => false </br>
empty string "" => false </br>
string with 0 "0" => false </br>
empty array [] => false </br>
null => false </br>
everything else (most) will be true </br>
thus \$is_complete = "false" will return true, as it's not empty string </br>
\$is_complete = 5; </br>
if(\$is_complete){ </br>
    echo "complete"; </br>
} </br>
else{ </br>
    echo "not"; </br>
} </br>
will show complete </br>
EOD;

echo DOUBLE_SPACE;

echo <<<EOD
\$is_complete = false </br> 
and echo \$is_complete; </br>
will show nothing, as it's casting it to string </br>
basically \$is_complete = (string) false; automatically </br>
but \$is_complete = true will show 1 </br>
EOD;

echo DOUBLE_SPACE;

echo <<<EOD
we can check wether value is boolean by using is_bool(\$is_complete); </br>
which will return true or false;
EOD;