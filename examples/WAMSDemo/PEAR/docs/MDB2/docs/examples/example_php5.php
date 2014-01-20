<pre>
<?php

/**************************************/
/* a nice php5 only show case of MDB2 */
/**************************************/

require 'MDB2.php';

// the database needs to be created manually beforehand
$dsn = array(
    'phptype'  => 'pgsql',
    'username' => 'postgres',
#    'phptype'  => 'mysql',
#    'username' => 'root',
    'password' => 'test',
    'hostspec' => 'localhost',
    'database' => 'driver_test',
);
#$dsn = 'sqlite:///:memory:';

// create MDB2 instance
$mdb2 = MDB2::factory($dsn);
if (PEAR::isError($mdb2)) {
    die($mdb2->getMessage());
}

// set the default fetchmode
$mdb2->setFetchMode(MDB2_FETCHMODE_ASSOC);

$fields = array(
    'id' => array(
        'type'     => 'integer',
        'unsigned' => true,
        'autoincrement'  => true,
    ),
    'somename' => array(
        'type'     => 'text',
        'length'   => 12,
    ),
    'somedate'  => array(
        'type'     => 'date',
    ),
);
$table = 'sometable';

// create a table
// since we are on php5 we can use the magic __call() method to:
// - load the manager module: $mdb2->loadModule('Manager', null, true);
// - redirect the method call to the manager module: $mdb2->manager->createTable('sometable', $fields);
$mdb2->mgCreateTable($table, $fields);

$query = "INSERT INTO $table (somename, somedate) VALUES (:name, :date)";
// parameters:
// 1) the query (notice we are using named parameters, but we could also use ? instead
// 2) types of the placeholders (either keyed numerically in order or by name)
// 3) MDB2_PREPARE_MANIP denotes a DML statement
$stmt = $mdb2->prepare($query, array('text', 'date'), MDB2_PREPARE_MANIP);
if (PEAR::isError($stmt)) {
    die($stmt->getMessage());
}

// load Date helper class
MDB2::loadFile('Date');

$stmt->execute(array('name' => 'hello', 'date' => MDB2_Date::mdbToday()));
// get the last inserted id
echo 'last insert id: ';
var_dump($mdb2->lastInsertId($table, 'id'));
$stmt->execute(array('name' => 'world', 'date' => '2005-11-11'));
// get the last inserted id
echo 'last insert id: ';
var_dump($mdb2->lastInsertId($table, 'id'));

// load Iterator implementations
MDB2::loadFile('Iterator');

$query = 'SELECT * FROM '.$table;
// parameters:
// 1) the query
// 2) true means MDB2 tries to determine the result set type automatically
// 3) true is the default and means that internally a MDB2_Result instance should be created
// 4) 'MDB2_BufferedIterator' means the MDB2_Result should be wrapped inside an SeekableIterator
$result = $mdb2->query($query, true, true, 'MDB2_BufferedIterator');

// iterate over the result set
foreach ($result as $row) {
    echo 'output row:<br>';
    var_dump($row);
}

// call drop table, since dropTable is not implemented in our instance
// but inside the loaded Manager module __call() will find it there and
// will redirect the call accordingly
// we could also have done:
//  $mdb2->manager->dropTable($table); or
//  $mdb2->mgDropTable($table);
$mdb2->dropTable($table);

?>