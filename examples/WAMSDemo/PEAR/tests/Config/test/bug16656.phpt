--TEST--
Test for request #11827: newline option for inicommented container
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . '/bug16656.ini';

function make_visible($str)
{
    return str_replace(
        array("\n", "\r"),
        array('\\n', '\\r'),
        $str
    );
}

$root = $config->parseConfig(
    $datasrc, 'inicommented'
);

//windows - \r\n
echo make_visible(
    $root->toString(
        'inicommented',
        array('linebreak' => "\r\n")
    )
) . "\n";

//mac - \r
echo make_visible(
    $root->toString(
        'inicommented',
        array('linebreak' => "\r")
    )
) . "\n";

//unix - \n
echo make_visible(
    $root->toString(
        'inicommented',
        array('linebreak' => "\n")
    )
) . "\n";

//default - \n
echo make_visible(
    $root->toString('inicommented')
) . "\n";
?>
--EXPECT--
foo = bar\r\nbar = baz\r\n
foo = bar\rbar = baz\r
foo = bar\nbar = baz\n
foo = bar\nbar = baz\n
