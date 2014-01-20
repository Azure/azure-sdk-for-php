--TEST--
regression test for bug #10185
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';

$conf =  'LogFormat "%h %l %u %t \"%r\" %>s %b" common'.PHP_EOL;
$conf .= '<Directory "/foo/bar">'.PHP_EOL;
$conf .= '  CustomLog "/foo/bar/access.log" common'.PHP_EOL;
$conf .= '</Directory>'.PHP_EOL;
$conf .= '<Directory "\foo\bar\">'.PHP_EOL;
$conf .= '  CustomLog "\foo\bar\access.log" common'.PHP_EOL;
$conf .= '</Directory>'.PHP_EOL;
$conf .= '<Directory "\\\foo\\\bar">'.PHP_EOL;
$conf .= '  CustomLog "\\\foo\\\bar\\\access.log" common'.PHP_EOL;
$conf .= '</Directory>'.PHP_EOL;
file_put_contents('bug10185.httpd.conf.old', $conf);

$conf1 = new Config;
$root1 =& $conf1->parseConfig('bug10185.httpd.conf.old', 'apache');
$conf1->writeConfig('bug10185.httpd.conf.new.php', 'phparray',
		    array('name' => 'test'));

$conf2 = new Config;
$root2 =& $conf2->parseConfig('bug10185.httpd.conf.new.php', 'phparray',
		    array('name' => 'test'));
$conf2->writeConfig('bug10185.httpd.conf.new', 'apache');
readfile('bug10185.httpd.conf.new');

?>
--CLEAN--
<?php
unlink('bug10185.httpd.conf.new.php');
unlink('bug10185.httpd.conf.new');
unlink('bug10185.httpd.conf.old');
?>
--EXPECT--
LogFormat "%h %l %u %t \"%r\" %>s %b" common
<Directory "/foo/bar">
  CustomLog "/foo/bar/access.log" common
</Directory>
<Directory "\foo\bar\">
  CustomLog "\foo\bar\access.log" common
</Directory>
<Directory "\\foo\\bar">
  CustomLog "\\foo\\bar\\access.log" common
</Directory>
