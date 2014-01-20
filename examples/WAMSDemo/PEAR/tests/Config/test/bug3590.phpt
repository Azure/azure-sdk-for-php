--TEST--
regression test for bug #3590
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'bug3590-input.php';

$root =& $config->parseConfig($datasrc, "phparray");
if (PEAR::isError($root)) {
    die('Error while reading configuration: ' . $root->getMessage() . "\r\n");
}

$exp = '$conf[\'mysql\'][\'user\'] = \'croooow\';
$conf[\'mysql\'][\'password\'] = \'coolrobot\';
$conf[\'mysql\'][\'host\'] = \'localhost\';
$conf[\'mysql\'][\'database\'] = \'deep13\';
$conf[\'emergencyemails\'][0] = \'joel@example.org\';
$conf[\'emergencyemails\'][1] = \'cambot@example.org\';
';

if ($phpt->assertNoErrors('problem!')) {
   $phpt->assertEquals($root->toString('phparray'), $exp, 'uh oh');
}

echo 'tests done'; 
?>
--EXPECT--
tests done
