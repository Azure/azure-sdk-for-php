--TEST--
regression test for bug #7544 - IniFile
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'bug7544.ini';

$res =& $config->parseConfig($datasrc, 'IniFile');

$root =& $config->getRoot();

print $root->toString('phparray');

?>
--EXPECT--
$conf['test']['myattrib1'] = 'wee';
$conf['test']['myattrib2'] = '';
