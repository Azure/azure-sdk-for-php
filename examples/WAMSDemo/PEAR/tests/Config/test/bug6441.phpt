--TEST--
regression test for bug #6441
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'bug6441.ini';

$configLoader =& new Config();
$conf_obj = $configLoader->parseConfig($datasrc, 'inicommented');
$temp = $conf_obj->toArray();
$conf = $temp['root'];
var_dump($conf);

?>
--EXPECT--
array(8) {
  ["val1"]=>
  string(1) "1"
  ["val2"]=>
  string(0) ""
  ["val3"]=>
  string(1) "1"
  ["val4"]=>
  string(0) ""
  ["val5"]=>
  string(1) "1"
  ["val6"]=>
  string(0) ""
  ["val7"]=>
  string(4) "true"
  ["val8"]=>
  string(5) "false"
}
