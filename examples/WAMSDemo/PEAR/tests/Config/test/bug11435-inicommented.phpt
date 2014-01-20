--TEST--
regression test for bug #11435 - IniCommented
--FILE--
<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'setup.php.inc';
$datasrc = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'bug11435.ini';

$res =& $config->parseConfig($datasrc, 'IniCommented');

$root =& $config->getRoot();

print $root->toString('IniCommented');

?>
--EXPECT--
[characters]
comma = "string,"
semi-colon = "string;"
equal-sign = "string="
double-quote = "string\""
single-quote = string'
percent = "string%"
tilde = "string~"
exclamation-mark = "string!"
pipe = "string|"
ampersand = "string&"
open-bracket = "string("
close-bracket = "string)"

[emptystrings]
string1 = 
string2 = NULL
string3 = 
string4 = "none"
