--TEST--
regression test for bug #16590, named arrays with number as first key
--FILE--
<?php
//having the number key in the root structure did always work
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$conf = array(
    '203' => 'mysql',
    'host' => 'localhost',
);
print_r($conf);

$c = new Config();
$arr_read = $c->parseConfig($conf, 'phparray');
//var_dump($arr_read);
$arr_read = $arr_read->toArray();
print_r($arr_read['root']);
?>
--EXPECT--
Array
(
    [203] => mysql
    [host] => localhost
)
Array
(
    [203] => mysql
    [host] => localhost
)