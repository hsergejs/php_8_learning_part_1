<?php
include_once("../helperConstants/helperConstants.php");


$textToDisplay = <<<'TEXT'

$paymentStatus = 'paid';

we can have multiple statements in switch

switch($paymentStatus){
    case 'paid':
        echo 'Paid';
        
            we can have function statement
            next statement
            etc.
        
            break; - if removed, will continue until next break;

    case 'declined':
        echo 'Declined';
        break;

    //not required, might be excluded
    default:
        echo "Unknown";
}


we might have cases where we have requirement on multiple cases same block of code to be executed, here we just remove break;

switch($paymentStatus){
    case 'paid':
        echo 'Paid';
        break;

    case 'rejected': 
    case 'declined':
        echo 'Declined';
        break;

    default:
        echo "Unknown";
}

!!!switch statement do LOOSE comparison (e.g. == )
if we have switch in loop, break will breakout only from switch, but break 2; will break from both;

difference between ifelse and switch - conditional statement switch(x()) executed only once and you don't need variable assignment, 
but in if(x() == 0) ... elseif(x() == 1) every comparison is run
to avoid it we can define $paymentStatus = functionReturnStatus() and then compare each time only variable;

switch(x()){
    case 0:
        echo '0';
        break;

    case 1:
        echo '1';
        break;

    default:
        echo "Unknown";
}



match() - was introduced in PHP 8, so not working in previous versions
1. Key => value
single conditional expression => return expression, as match use expression we can have 
e.g. function calls, comparisons, conditional expressions etc.
and 1 per line on the right - more practice
2. match is an expression and evaluates to a value, as a result it can be assigned to a variable
in case bellow it will print 1, as print return 1, but if we remove it. string value will be saved in to variable
3. default is obligate, as if no value match, it will give an error
4. match do strict comparison (e.g. ===) and it will print default value

$result = match($paymentStatus){ 
    1 => print 'Paid', - because print can be used as expression
    2 =>  print 'Declined',
    0 => print 'Pending payment', 
    default => 'Default obligate' 
}

to use fall through strategy like in switch, just add expression with comma 
match($paymentStatus){ 
    1 => 'Paid',
    2,3 => 'Declined',
    0 => 'Pending payment',
    default => 'Default obligate'
}


TEXT;

echo nl2br($textToDisplay);