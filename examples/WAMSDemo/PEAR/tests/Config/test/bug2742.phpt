--TEST--
test for bug 2742
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . '/bug2742.ini';
$root = &$config->parseConfig($datasrc, 'inicommented');
if ($phpt->assertNoErrors('problem!')) {
   $phpt->assertEquals('$php_ini[\'var\'] = \'1234\';',
       $root->toString('phparray', array('name' => 'php_ini')),
       'convert var = 1234 to array');
}
echo 'tests done'; 
?>
--EXPECT--
tests done
