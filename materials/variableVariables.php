<?php
include_once("../helperConstants/helperConstants.php");

echo "Variable of variables: ";
echo SPACE;
echo <<<EOD
\$foo = 'bar';

</br>

\$\$foo = 'baz';

</br>

is the same \$bar = 'baz';

</br>
basically taking value of the foo as the name 'bar' for the next variable, so bar = baz now
EOD;
echo SPACE;
echo "proper usage echo \$foo,{\$\$foo} or echo \$foo,\${\$foo}";