<?php
/**
 * Demonstrates how to use a custom magic database.
 * The detected MIME type should be text/x-custom-mimetype
 */
require_once 'MIME/Type.php';
$mt = new MIME_Type();
$mt->magicFile = dirname(__FILE__) . '/custom-magic.magic';

$type = $mt->autoDetect(dirname(__FILE__) . '/custom-magic.php');
echo 'Type:    ' . $type . "\n";
echo 'Media:   ' . $mt->media . "\n";
echo 'Subtype: ' . $mt->subType . "\n";
?>