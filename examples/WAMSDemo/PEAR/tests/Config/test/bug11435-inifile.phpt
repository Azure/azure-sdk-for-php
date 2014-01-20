--TEST--
regression test for bug #11435 - IniFile
--SKIPIF--
<?php
// The built in Ini parser of PHP can not parse the following characters
// no matter how they are escaped:
// ~ ! &
echo "skip";
?>
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'bug11435.ini';

$res =& $config->parseConfig($datasrc, 'IniFile');

$root =& $config->getRoot();

print $root->toString('IniFile');

?>
--EXPECT--
[characters]
comma = ,
semi-colon = ;
equal-sign = =
double-quote = "
single-quote = '
percent = %
tilde = ~
exclamation-mark = !
pipe = |
ampersand = &
open-bracket = (
close-bracket = )

[emptystrings]
string1 = 
string2 = NULL
string3 = ""
string4 = none
