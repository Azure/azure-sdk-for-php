--TEST--
bug 3298 regression test
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . '/bug3298.xml';
$root = $config->parseConfig($datasrc, 'XML');

$configArray = $root->toArray('PHParray');
$config2 = new Config();
$root2 = $config2->parseConfig(current($configArray), 'PHParray');

if ($root2->writeDatasrc('new_config.xml', 'XML')) {
   $file = file_get_contents("new_config.xml");
} else {
   echo "error updating XML";
}

if ($phpt->assertNoErrors('problem!')) {
   $phpt->assertEquals( file_get_contents($datasrc), $file, "XML doesn't match");
}
echo 'tests done'; 
?>
--CLEAN--
<?php
unlink('new_config.xml');
?>
--EXPECT--
tests done
