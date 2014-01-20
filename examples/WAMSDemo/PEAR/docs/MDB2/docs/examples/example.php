<?php

    // $Id: example.php,v 1.24 2006/05/31 14:38:06 lsmith Exp $
    //
    // MDB2 and MDB2_Schema example script.
    //

    ini_set('include_path', '../..'.PATH_SEPARATOR.ini_get('include_path'));

    // require the MDB2 code
    require_once 'MDB2.php';

    // define and set a PEAR error handler
    // will be called whenever an unexpected PEAR_Error occurs
    function handle_pear_error ($error_obj)
    {
        print '<pre><b>PEAR-Error</b><br />';
        echo $error_obj->getMessage().': '.$error_obj->getUserinfo();
        print '</pre>';
    }
    PEAR::setErrorHandling(PEAR_ERROR_CALLBACK, 'handle_pear_error');

    // just for kicks you can mess up this part to see some pear error handling
    $user = 'root';
    $pass = '';
    $host = 'localhost';
    $mdb2_name = 'metapear_test_db';
    $mdb2_type = !empty($_GET['db_type']) ? $_GET['db_type'] : 'mysql';
    echo($mdb2_type.'<br>');

    // Data Source Name: This is the universal connection string
    $dsn['username'] = $user;
    $dsn['password'] = $pass;
    $dsn['hostspec'] = $host;
    $dsn['phptype'] = $mdb2_type;
    // MDB2::factory will return a PEAR::MDB2 instance on success
    // or a Pear MDB2 error object on error
    // You can alternatively build a dsn here
    // $dsn = "$mdb2_type://$user:$pass@$host/$mdb2_name";
    Var_Dump($dsn);
    $mdb2 =& MDB2::factory($dsn);
    // With PEAR::isError you can differentiate between an error or
    // a valid connection.
    if (PEAR::isError($mdb2)) {
        die (__LINE__.$mdb2->getMessage());
    }

    // this loads the MDB2_Schema manager
    // this is a separate package you must install
    require_once 'MDB2/Schema.php';
    // you can either pass a dsn string, a dsn array or an exisiting mdb2 connection
    $schema =& MDB2_Schema::factory($mdb2);
    $input_file = 'metapear_test_db.schema';
    // lets create the database using 'metapear_test_db.schema'
    // if you have allready run this script you should have 'metapear_test_db.schema.before'
    // in that case MDB2 will just compare the two schemas and make any
    // necessary modifications to the existing database
    Var_Dump($schema->updateDatabase($input_file, $input_file.'.before'));
    echo('updating database from xml schema file<br>');

    echo('switching to database: '.$mdb2_name.'<br>');
    $mdb2->setDatabase($mdb2_name);
    // happy query
    $query ='SELECT * FROM test';
    echo('query for the following examples:'.$query.'<br>');
    // run the query and get a result handler
    $result = $mdb2->query($query);
    // lets just get row:0 and free the result
    $array = $result->fetchRow();
    $result->free();
    echo('<br>row:<br>');
    echo(Var_Dump($array).'<br>');
    $result = $mdb2->query($query);
    // lets just get row:0 and free the result
    $array = $result->fetchRow(MDB2_FETCHMODE_OBJECT);
    $result->free();
    echo('<br>row (object:<br>');
    echo(Var_Dump($array).'<br>');
    // run the query and get a result handler
    $result = $mdb2->query($query);
    // lets just get row:0 and free the result
    $array = $result->fetchRow();
    $result->free();
    echo('<br>row from object:<br>');
    echo(Var_Dump($array).'<br>');
    // run the query and get a result handler
    $result = $mdb2->query($query);
    // lets just get column:0 and free the result
    $array = $result->fetchCol(2);
    $result->free();
    echo('<br>get column #2 (counting from 0):<br>');
    echo(Var_Dump($array).'<br>');
    // run the query and get a result handler
    $result = $mdb2->query($query);
    Var_Dump($mdb2->loadModule('Reverse', null, true));
    echo('tableInfo:<br>');
    echo(Var_Dump($mdb2->reverse->tableInfo($result)).'<br>');
    $types = array('integer', 'text', 'timestamp');
    $result->setResultTypes($types);
    $array = $result->fetchAll(MDB2_FETCHMODE_FLIPPED);
    $result->free();
    echo('<br>all with result set flipped:<br>');
    echo(Var_Dump($array).'<br>');
    // save some time with this function
    // lets just get all and free the result
    $array = $mdb2->queryAll($query);
    echo('<br>all with just one call:<br>');
    echo(Var_Dump($array).'<br>');
    // run the query with the offset 1 and count 1 and get a result handler
    Var_Dump($mdb2->loadModule('Extended', null, false));
    $result = $mdb2->extended->limitQuery($query, null, 1, 1);
    // lets just get everything but with an associative array and free the result
    $array = $result->fetchAll(MDB2_FETCHMODE_ASSOC);
    echo('<br>associative array with offset 1 and count 1:<br>');
    echo(Var_Dump($array).'<br>');
    // lets create a sequence
    echo(Var_Dump($mdb2->loadModule('Manager', null, true)));
    echo('<br>create a new seq with start 3 name real_funky_id<br>');
    $err = $mdb2->manager->createSequence('real_funky_id', 3);
    if (PEAR::isError($err)) {
            echo('<br>could not create sequence again<br>');
    }
    echo('<br>get the next id:<br>');
    $value = $mdb2->nextId('real_funky_id');
    echo($value.'<br>');
    // lets try an prepare execute combo
    $alldata = array(
                     array(1, 'one', 'un'),
                     array(2, 'two', 'deux'),
                     array(3, 'three', 'trois'),
                     array(4, 'four', 'quatre')
    );
    $stmt = $mdb2->prepare('INSERT INTO numbers VALUES(?,?,?)', array('integer', 'text', 'text'), MDB2_PREPARE_MANIP);
    foreach ($alldata as $row) {
        echo('running execute<br>');
        $stmt->bindValueArray($row);
        $stmt->execute();
    }
    $array = array(4);
    echo('<br>see getOne in action:<br>');
    echo(Var_Dump($mdb2->extended->getOne('SELECT trans_en FROM numbers WHERE number = ?',null,$array,array('integer'))).'<br>');
    $mdb2->setFetchmode(MDB2_FETCHMODE_ASSOC);
    echo('<br>default fetchmode ist now MDB2_FETCHMODE_ASSOC<br>');
    echo('<br>see getRow in action:<br>');
    echo(Var_Dump($mdb2->extended->getRow('SELECT * FROM numbers WHERE number = ?',array('integer','text','text'),$array, array('integer'))));
    echo('default fetchmode ist now MDB2_FETCHMODE_ORDERED<br>');
    $mdb2->setFetchmode(MDB2_FETCHMODE_ORDERED);
    echo('<br>see getCol in action:<br>');
    echo(Var_Dump($mdb2->extended->getCol('SELECT * FROM numbers WHERE number != ?',null,$array,array('integer'), 1)).'<br>');
    echo('<br>see getAll in action:<br>');
    echo(Var_Dump($mdb2->extended->getAll('SELECT * FROM test WHERE test_id != ?',array('integer','text','text'), $array, array('integer'))).'<br>');
    echo('<br>see getAssoc in action:<br>');
    echo(Var_Dump($mdb2->extended->getAssoc('SELECT * FROM test WHERE test_id != ?',array('integer','text','text'), $array, array('integer'), MDB2_FETCHMODE_ASSOC)).'<br>');
    echo('tableInfo on a string:<br>');
    echo(Var_Dump($mdb2->reverse->tableInfo('numbers')).'<br>');
    echo('<br>just a simple update query:<br>');
    echo('<br>affected rows:<br>');
    echo(Var_Dump($mdb2->exec('UPDATE numbers set trans_en ='.$mdb2->quote(0, 'integer'))).'<br>');
    // subselect test
    $sub_select = $mdb2->subSelect('SELECT test_name from test WHERE test_name = '.$mdb2->quote('gummihuhn', 'text'), 'text');
    echo(Var_Dump($sub_select).'<br>');
    $query_with_subselect = 'SELECT * FROM test WHERE test_name IN ('.$sub_select.')';
    // run the query and get a result handler
    echo($query_with_subselect.'<br>');
    $result = $mdb2->query($query_with_subselect);
    $array = $result->fetchAll();
    $result->free();
    echo('<br>all with subselect:<br>');
    echo('<br>drop index (will fail if the index was never created):<br>');
    echo(Var_Dump($mdb2->manager->dropIndex('test', 'test_id_index')).'<br>');
    $index_def = array(
        'fields' => array(
            'test_id' => array(
                'sorting' => 'ascending'
            )
        )
    );
    echo('<br>create index:<br>');
    echo(Var_Dump($mdb2->manager->createIndex('test', 'test_id_index', $index_def)).'<br>');

    if ($mdb2_type == 'mysql') {
        $schema->db->setOption('debug', true);
        $schema->db->setOption('log_line_break', '<br>');
        // ok now lets create a new xml schema file from the existing DB
        $database_definition = $schema->getDefinitionFromDatabase();
        // we will not use the 'metapear_test_db.schema' for this
        // this feature is especially interesting for people that have an existing Db and want to move to MDB2's xml schema management
        // you can also try MDB2_MANAGER_DUMP_ALL and MDB2_MANAGER_DUMP_CONTENT
        echo(Var_Dump($schema->dumpDatabase(
            $database_definition,
            array(
                'output_mode' => 'file',
                'output' => $mdb2_name.'2.schema'
            ),
            MDB2_SCHEMA_DUMP_STRUCTURE
        )).'<br>');
        if ($schema->db->getOption('debug') === true) {
            echo($schema->db->getDebugOutput().'<br>');
        }
        // this is the database definition as an array
        echo(Var_Dump($database_definition).'<br>');
    }

    echo('<br>just a simple delete query:<br>');
    echo(Var_Dump($mdb2->exec('DELETE FROM numbers')).'<br>');
    // You can disconnect from the database with:
    $mdb2->disconnect()
?>
