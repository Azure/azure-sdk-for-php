<?php
set_include_path(dirname(dirname(__FILE__)) . ':' . get_include_path());
require_once 'phpt_test.php.inc';
require_once 'Config.php';
$config = new Config;
$phpt = new PEAR_PHPTest(true);
// install Text_Diff for spectacular results...
?>