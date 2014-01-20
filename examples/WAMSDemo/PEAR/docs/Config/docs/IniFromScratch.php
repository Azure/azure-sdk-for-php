<?php
/**
* Config.php example
* 
* Lots of different manipulations to show Config features.
*
* @author 	Bertrand Mansion <bmansion@mamasam.com>
* @package	Config
*/
// $Id: IniFromScratch.php 120857 2003-03-21 18:04:21Z mansion $

require_once('Config.php');

// Creates a PHPArray config with attributes, from scratch

$dsn = array('type' => 'mysql',
             'host' => 'localhost',
             'user' => 'mamasam',
             'pass' => 'foobar');

$c = new Config_Container('section', 'root');
  $c->createComment('DB Config');
  $db =& $c->createSection('DB', $dsn);
    $fields =& $db->createSection('fields');
    $fields->createDirective('username', 'USERNAME', array('type' => 'varchar', 'size' => 32));
    $fields->createDirective('password', 'PASSWD', array('type' => 'varchar', 'size' => 32));
  $c->createBlank();
  $c->createComment('Support config');
  $c->createDirective('support', 'See my wishlist...');

echo '<pre>'. $c->toString('phparray') .'</pre>';
unset($c);

// Parses and writes an existing php array $conf

$conf['storage']['driver'] = 'sql';
$conf['storage']['params']['phptype']  = 'mysql';
$conf['storage']['params']['hostspec'] = 'localhost';
$conf['storage']['params']['username'] = 'mamasam';
$conf['storage']['params']['password'] = 'foobar';
$conf['menu']['apps'] = array('imp', 'turba');
$conf['stdcontent']['para'][0] = 'This is really cool !';
$conf['stdcontent']['para'][1] = 'It just rocks...';

$c = new Config();
$root =& $c->parseConfig($conf, 'phparray');

$storage =& $root->getItem('section', 'storage');
$storage->removeItem();
$root->addItem($storage);

echo '<pre>'. $root->toString('phparray', array('name' => 'test')) .'</pre>';

if ($c->writeConfig('/tmp/Config_Test.php', 'phparray', array('name' => 'test')) === true) {
    echo 'Config written into /tmp/Config_Test.php';
}

// Making a php ini file with $storage only

$ini = new Config();
$iniRoot =& $ini->getRoot();
$iniRoot->addItem($storage);

$comment =& new Config_Container('comment', null, 'This is the php ini version of storage');
$iniRoot->addItem($comment, 'top');
$iniRoot->createBlank('after', $comment);
echo '<pre>'. $iniRoot->toString('inicommented') .'</pre>';

// Gonna make an array with it

echo '<pre>'; var_dump($iniRoot->toArray()); echo '</pre>';

// Now, I'll parse you php.ini file and make it a php array

$phpIni = new Config();
$phpIni->parseConfig('/usr/local/lib/php.ini', 'inifile');
$root =& $phpIni->getRoot();
echo '<pre>'.$root->toString('phparray', array('name' => 'php_ini')).'</pre>';

?>