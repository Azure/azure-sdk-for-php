--TEST--
regression test for bug #8357 - IniCommented
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'bug8357.ini';

$res =& $config->parseConfig($datasrc, 'IniCommented');

$root =& $config->getRoot();

print $root->toString('phparray');

?>
--EXPECT--
$conf['meta']['robots'] = 'index, follow';
$conf['meta']['keywords'] = 'key, words';
