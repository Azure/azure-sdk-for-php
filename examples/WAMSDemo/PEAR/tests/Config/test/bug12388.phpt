--TEST--
Test for request #12388: Allow spaces after the key
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . '/bug12388.ini';
$root = $config->parseConfig($datasrc, 'genericconf');
var_dump($root->toArray());
?>
--EXPECT--
array(1) {
  ["root"]=>
  array(4) {
    ["nospace"]=>
    string(5) "value"
    ["space_before"]=>
    string(5) "value"
    ["space_after"]=>
    string(5) "value"
    ["two_spaces_after"]=>
    string(5) "value"
  }
}
