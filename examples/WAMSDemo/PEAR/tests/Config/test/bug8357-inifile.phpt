--TEST--
regression test for bug #8357 - IniFile
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'bug8357.ini';

$res =& $config->parseConfig($datasrc, 'IniFile');

$root =& $config->getRoot();

print $root->toString('phparray');

?>
--EXPECT--
$conf['meta']['robots'][0] = 'index';
$conf['meta']['robots'][1] = 'follow';
$conf['meta']['keywords'][0] = 'key';
$conf['meta']['keywords'][1] = 'words';
