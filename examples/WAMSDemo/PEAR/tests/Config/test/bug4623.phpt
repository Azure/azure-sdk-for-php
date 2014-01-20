--TEST--
regression test for bug #3590
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'bug4623.conf';

$root =& $config->parseConfig($datasrc, "Apache");
if (PEAR::isError($root)) {
    die('Error while reading configuration: ' . $root->getMessage() . "\r\n");
}

$exp = $root->toString('Apache');

if ($phpt->assertNoErrors('problem!')) {
   $phpt->assertEquals($root->toString('Apache'), $exp, 'uh oh');
}

echo 'tests done'; 
?>
--EXPECT--
tests done
