--TEST--
Test for request #12387: Allow hyphens in the key
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . '/bug12387.ini';
$root = $config->parseConfig($datasrc, 'genericconf');
var_dump($root->toArray());
?>
--EXPECT--
array(1) {
  ["root"]=>
  array(1) {
    ["hy-phen"]=>
    string(5) "value"
  }
}
