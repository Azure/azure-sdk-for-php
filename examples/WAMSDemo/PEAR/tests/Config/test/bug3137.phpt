--TEST--
regression test for bug #3137
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$array = array("foo", "bar", "too");   // the source of the config to write.

$root =& $config->parseConfig($array, "phparray");
if (PEAR::isError($root)) {
    die('Error while reading configuration: ' . $root->getMessage() . "\r\n");
}

$result = $root->createComment("Comment", "before", $root->children[0]);
if (PEAR::isError($result)) {
    die('Error while reading configuration: ' . $result->getMessage() . "\r\n");
}

$exp = '// Comment
$conf[0] = \'foo\';
$conf[1] = \'bar\';
$conf[2] = \'too\';
';

//print_r($root->toString('phparray'));
if ($phpt->assertNoErrors('problem!')) {
   $phpt->assertEquals($root->toString('phparray'), $exp, 'uh oh');
}

echo 'tests done'; 
?>
--EXPECT--
tests done
