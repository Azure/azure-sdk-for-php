--TEST--
regression test for bug #7652 
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'bug7652.xml';

$res =& $config->parseConfig($datasrc, 'xml');

$root =& $config->getRoot();

print $root->toString('phparray');

?>
--EXPECT--
$conf['root']['tag1'][0]['#'] = '';
$conf['root']['tag1'][0]['@']['attrib'] = 'val';
$conf['root']['tag1'][1]['@']['attrib'] = 'val2';
$conf['root']['tag1'][1]['tag2'] = 'hello world';
$conf['root']['tag1'][2]['#'] = '';
$conf['root']['tag1'][2]['@']['attrib'] = 'val23';
