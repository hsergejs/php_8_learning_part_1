<?php
include_once("../helperConstants/helperConstants.php");

echo <<<EOD
Strings are sequence of chars and in PHP represented as Array[] of chars and start with 0 index;</br>
thus we can access specific char as \$x = "asdf"; </br>
echo \$x[2] = d; </br>
we also can use negative numbers to access chars; e.g. echo \$x[-1] = "f"; </br>
if we will modify char at over the string length it will just add empty spaces e.g. \$x[5] = "f"; echo will show asdf f; </br> 
EOD;

echo DOUBLE_SPACE;

echo "in php 8 we can use Heredoc (similar to \" \") and Nowdoc (similar to \' \')";
echo SPACE; 

echo "syntax to Heredoc \$x = <<< YOURIDENTIFIER  </br> content </br> YOURIDENTIFIER;  </br> 
as I was already using with EOD - but didn't know that it was it";

echo DOUBLE_SPACE;

echo <<<'TEXT'
to display variable as a value we use " " (Heredoc) and as $x=5 or as is use ' ' (Nowdoc)
TEXT;

echo DOUBLE_SPACE;

$textToDisplay = <<<MYTEXT
here i will try to get all my text
and
I can use echo nl2br(); to display new line chars from code to browser
so we will see full text with br tags integrated.
MYTEXT;

echo nl2br($textToDisplay);

echo DOUBLE_SPACE;

$textToDisplay = <<<NEWTEXT
syntax for Nowdoc \$x = <<<'YOURIDENTIFIER'
content
YOURIDENTIFIER;
NEWTEXT;
echo nl2br($textToDisplay);

echo DOUBLE_SPACE;

$textToDisplay = <<<TEXT
it's very handy and readable to display dynamically generated html, but remember any space in code, will be added as string chars
to variable. e.g. tab or space it might not be visible in browser, but it can be checked with var_dump();
as example in code: 
<div>
    <p>Some text</p>
</div>
tab before p tag will be added to the string length!!!
TEXT;

echo nl2br($textToDisplay);