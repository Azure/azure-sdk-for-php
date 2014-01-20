--TEST--
Test for request #16724: lowercase constant names option
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . '/bug16724-config.php';
$root = $config->parseConfig(
    $datasrc, 'phpconstants',
    array('lowercase' => true)
);
print_r($root->toArray());
echo $root->toString('phpconstants');

//not lowercasing should still work
$config = new Config();
$root = $config->parseConfig(
    $datasrc, 'phpconstants'
);
print_r($root->toArray());
?>
--EXPECT--
Array
(
    [root] => Array
        (
            [my_config_option] => foo
            [host12_3] => foo
        )

)
define('MY_CONFIG_OPTION', 'foo');
define('HOST12_3', 'foo');
Array
(
    [root] => Array
        (
            [MY_CONFIG_OPTION] => foo
            [HOST12_3] => foo
        )

)

