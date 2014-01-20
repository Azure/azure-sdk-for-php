--TEST--
regression test for bug #11827
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . '/bug11827.ini';
$root = $config->parseConfig($datasrc, 'inifile');
var_dump($root->children[0]->children[0]->content);
?>
--EXPECT--
array(2) {
  [0]=>
  string(6) "value1"
  [1]=>
  string(6) "value2"
}
