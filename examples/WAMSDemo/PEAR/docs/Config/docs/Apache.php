<?php
/**
* Config.php example with Apache container
* @author   Bertrand Mansion <bmansion@mamasam.com>
* @package  Config
*/
// $Id: Apache.php 120908 2003-03-22 17:44:12Z mansion $

require_once('Config.php');

$datasrc = '/path/to/httpd.conf';
$conf = new Config();
$content =& $conf->parseConfig($datasrc, 'apache');
if (PEAR::isError($content)) {
    die($content->getMessage());
}

// adding a new virtual-host

$content->createBlank();
$content->createComment('My virtual host');
$content->createBlank();

$vhost =& $content->createSection('VirtualHost', array('127.0.0.1:82'));
$vhost->createDirective('DocumentRoot', '/usr/share/www');
$vhost->createDirective('ServerName', 'www.mamasam.com');
$location =& $vhost->createSection('Location', array('/admin'));
$location->createDirective('AuthType', 'basic');
$location->createDirective('Require', 'group admin');

// adding some directives Listen

if ($listen =& $content->getItem('directive', 'Listen')) {
    $res =& $content->createDirective('Listen', '82', null, 'after', $listen);
} else {
    $listen =& $content->createDirective('Listen', '81', null, 'bottom');
    if (PEAR::isError($listen)) {
        die($listen->getMessage());
    }
    $content->createDirective('Listen', '82', null, 'after', $listen);
}

echo '<pre>'.htmlspecialchars($content->toString('apache')).'</pre>';

// Writing the files
/*
if (!PEAR::isError($write = $conf->writeConfig('/tmp/httpd.conf', 'apache'))) {
    echo 'done writing config<br>';
} else {
    die($write->getMessage());
}

if ($vhost->writeDatasrc('/tmp/vhost.conf', 'apache')) {
    echo 'done writing vhost<br>';
}
*/
?>