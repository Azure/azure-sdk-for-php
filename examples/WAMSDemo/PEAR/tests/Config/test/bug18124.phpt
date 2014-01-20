--TEST--
regression test for bug #11827, saving array back into ini
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . '/bug11827.ini';
$root = $config->parseConfig($datasrc, 'inifile');
echo $root->toString('inifile');
?>
--EXPECT--
[section]
directive[]=value1
directive[]=value2
