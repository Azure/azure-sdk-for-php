--TEST--
regression test for bug #11807: serializing null values in php arrays
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';

$path = dirname(__FILE__) . '/bug11807.txt';
$data = array(
    "string" => "id",
    "null" => null,
    "false" => false,
    "zero" => 0,
    "empty_string" => ''
);
$root = $config->parseConfig(
    $data,
    'phparray',
    array('name' => 'conf')
);
$config->writeConfig(
    $path,
    'phparray',
    array('name' => 'conf')
);

print file_get_contents($path);
?>
--CLEAN--
<?php
unlink(dirname(__FILE__) . '/bug11807.txt');
?>
--EXPECT--
<?php
$conf['string'] = 'id';
$conf['null'] = null;
$conf['false'] = false;
$conf['zero'] = 0;
$conf['empty_string'] = '';
?>