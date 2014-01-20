--TEST--
Test for bug #13791: quote strings in constants container to get valid PHP code
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$config->getRoot()->createDirective('WITH_QUOTES', 'double: " single:\' end');
echo $config->getRoot()->toString('phpconstants');
?>
--EXPECT--
define('WITH_QUOTES', 'double: " single:\' end');