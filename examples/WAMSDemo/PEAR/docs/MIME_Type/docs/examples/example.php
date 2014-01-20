<?php

require_once 'MIME/Type.php';

$type = 'application/x-test-app; foo="bar" (First argument); bar=baz (Second argument)';
$type2 = 'application/vnd.pear.test-type';

print "Checking type: $type\n";
if (MIME_Type::isExperimental($type)) {
    print "Type is experimental\n";
} else {
    print "Type is not experimental\n";
}

print "\nChecking type: $type2\n";
if (MIME_Type::isVendor($type2)) {
    print "Type is vendor-specific\n";
} else {
    print "Type is not vendor-specific\n";
}

$file = '@doc_dir@/MIME_Type/example.php';
print "\nChecking type of: $file\n";
$type = MIME_Type::autoDetect($file);
if (PEAR::isError($type)) {
    print 'Error: ' . $type->getMessage() . "\n";
} else {
    print $type . "\n";
}

?>
