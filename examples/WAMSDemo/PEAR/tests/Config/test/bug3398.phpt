--TEST--
regression test for bug #3398
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . '/bug3398.ini';

$root =& $config->parseConfig($datasrc, 'inicommented');
if (PEAR::isError($root)) {
    die('Error while reading configuration: ' . $root->getMessage() . "\r\n");
}

$exp = array( 'root' => array (
	'Preset' => array ('presets' => 'common'),
	'common' => array (
		'sntpTZ' => array(
			0 => 'type=4',
			1 => 'value=CST6DST5,M4.1.0/02:00:00,M10.5.0/02:00:00',
			2 => 'name=sntpTZ',
			3 => 'label=TimeZone',
			4 => 'form=text',
			5 => 'select=array (value => %value, size => 37);')
			)
	));
//print_r($root->toArray());
if ($phpt->assertNoErrors('problem!')) {
   $phpt->assertEquals($root->toArray(), $exp, 'uh oh');
}

echo 'tests done'; 
?>
--EXPECT--
tests done
