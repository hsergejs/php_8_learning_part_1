<?php
include_once("../helperConstants/helperConstants.php");


echo "to define a contstant we use define('name','value') function";
echo DOUBLE_SPACE;
echo "we can also define constants with the help of the const keyword";
echo SPACE;
echo <<<EOD
definition with the help of the const keyword: </br>
const EXAMPLE_CONST = "example constant"; - in code in a separate file;
EOD;
echo DOUBLE_SPACE;
echo "we can check if constant is defined, using defined() - 1 (TRUE) is set and nothing (FALSE) (in the browser) is not set";
echo SPACE;
echo "result of defined('SPACE') = ". defined('SPACE');
echo DOUBLE_SPACE;
echo "the difference is that define() is that constants defined at the RUN TIME, but with const defined during COMPILE TIME";
echo DOUBLE_SPACE;
echo <<<EOD
it means that we can define constants in control structures:

</br>

if(true){
</br>

    define('STATUS_PAID', true);
</br>

    }

</br></br>

but we CAN'T define it with CONST keyword

</br></br>

another difference: </br>

\$paid = 'PAID';

</br>

define('STATUS_' . \$paid, \$paid);

</br> 

or

</br>

define('STATUS_' . \$paid, 4);

</br>

and we can echo STATUS_PAID;
EOD;