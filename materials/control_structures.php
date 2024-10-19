<?php
include_once("../helperConstants/helperConstants.php");


$textToDisplay = <<<'TEXT'
we can use both elseif() and else if() approaches
but for the shorthand when embedding in html we must use elseif() version

shorthand for embedding if() and elseif() in to html, check in code


<html>
<body>

<?php $score = 95; ?>
    <h1>  Header 1  <\h1>
<?php elseif($score >= 90): ?>
    <strong>   A   <\strong>
<?php elseif($score >= 80): ?>
    <strong>   B   <\strong>
<?php else: ?>
    <strong>   F   <\strong>
<?php endif; ?>

</body>
</html>


TEXT;

echo nl2br($textToDisplay);