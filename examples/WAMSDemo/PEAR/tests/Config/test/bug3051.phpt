--TEST--
test for bug 3051
--FILE--
<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';

$root =& $config->parseConfig(dirname(__FILE__) . '/bug3051.xml', 'xml');

$root =& $root->getChild(0);

for ($i=0; $i < $root->countChildren('directive', 'item'); $i++) {
    $item = $root->getItem('directive', 'item', null, null, $i);
    print $item->getAttribute('name')."\n";

}
?>
--EXPECT--
item1
item2

