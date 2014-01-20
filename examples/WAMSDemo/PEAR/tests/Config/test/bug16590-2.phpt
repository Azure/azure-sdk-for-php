--TEST--
regression test for bug #16590, named arrays with number as first key
--FILE--
<?php
//having the number key in the root structure did always work,
// but it fails when we have sub arrays - at least, when
// duplicateDirectives is activated (which it is by default)
//The root problem was parsing the array into the config structure
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$conf = array(
    'DB' => array(
        '203' => 'mysql',
        'host' => 'localhost',
    ),
    'ok' => array(
        0 => 'foo',
        1 => 'bar',
    ),
    'ok2' => array(
        '0' => 'foo2',
        '1' => 'bar2',
    )
);
print_r($conf);

$arr_read = $config->parseConfig(
    $conf, 'phparray',
    array('duplicateDirectives' => true)
);

$arr_read = $arr_read->toArray();
print_r($arr_read['root']);
?>
--EXPECT--
Array
(
    [DB] => Array
        (
            [203] => mysql
            [host] => localhost
        )

    [ok] => Array
        (
            [0] => foo
            [1] => bar
        )

    [ok2] => Array
        (
            [0] => foo2
            [1] => bar2
        )

)
Array
(
    [DB] => Array
        (
            [203] => mysql
            [host] => localhost
        )

    [ok] => Array
        (
            [0] => foo
            [1] => bar
        )

    [ok2] => Array
        (
            [0] => foo2
            [1] => bar2
        )

)
