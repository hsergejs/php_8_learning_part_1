<?php
include_once("../helperConstants/helperConstants.php");


$textToDisplay = <<<'TEXT'
1. we can have NULL as a constant
e.g. $x = NULL; and echo it will display nothing, as it will be casted to string
but var_dump($x); will show NULL
we can check if value is null using is_null($x);
or use === e.g. var_dump($x === NULL)

2. variable can be NULL if it's not defined

3. is unset the variable; e.g. $x = 123; unset($x) (destroy variable in memory);
TEXT;

echo nl2br($textToDisplay);