<?php
require_once 'MDB2/Schema.php';

$dsn = array(
    'phptype'  => 'mysql',
    'username' => 'username',
    'password' => 'password',
    'hostspec' => 'host',
);
$db_options = array();


$file = dirname(__FILE__).DIRECTORY_SEPARATOR.'driver_test.schema.xml';
$variables = array(
    'name'   => 'driver_test',
    'create' => true,
);

$options = array(
    'log_line_break'   => '<br />',
    'idxname_format'   => '%s',
    'debug'            => true,
    'quote_identifier' => true,
    'force_defaults'   => false,
    'portability'      => false
);
$options = array_merge($options, $db_options);

$schema =& MDB2_Schema::factory($dsn, $options);
if (PEAR::isError($schema)) {
    echo $schema->getMessage() . ' ' . $schema->getUserInfo();
    exit;
}

$definition = $schema->parseDatabaseDefinitionFile($file, $variables, true, true);
if (PEAR::isError($definition)) {
    echo $definition->getMessage() . ' - ' . $definition->getUserInfo();
} else {
    $operation = $schema->createDatabase($definition);
    if (PEAR::isError($operation)) {
        echo $operation->getMessage() . ' ' . $operation->getUserInfo();
    }
}
?>
DONE!