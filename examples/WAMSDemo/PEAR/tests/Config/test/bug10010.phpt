--TEST--
regression test for bug #10010
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';

$aTrans = array(
		'foo' => 'bar',
		'aMonths' => array(
			1 => 'January',
			2 => 'February',
			3 => 'March',
			4 => 'April',
			5 => 'May',
			6 => 'June',
			7 => 'July',
			8 => 'August',
			9 => 'September',
			10 => 'October',
			11 => 'November',
			12 => 'December',)
		);


$c = new Config();
$root = & $c->parseConfig($aTrans,
		'phparray',
		array('duplicateDirectives' => false));
$filename = './bug10010-output.php';
$result = $c->writeConfig($filename,
		'phparray',
		array('name' => 'words'));

include($filename);
print_r($words)

?>
--CLEAN--
<?php
unlink('bug10010-output.php');
?>
--EXPECT--
Array
(
    [foo] => bar
    [aMonths] => Array
        (
            [1] => January
            [2] => February
            [3] => March
            [4] => April
            [5] => May
            [6] => June
            [7] => July
            [8] => August
            [9] => September
            [10] => October
            [11] => November
            [12] => December
        )

)
