<?php
// +----------------------------------------------------------------------+
// | PHP versions 4 and 5                                                 |
// +----------------------------------------------------------------------+
// | Copyright (c) 1998-2006 Paul Cooper, Lukas Smith, Lorenzo Alberton   |
// | All rights reserved.                                                 |
// +----------------------------------------------------------------------+
// | MDB2 is a merge of PEAR DB and Metabases that provides a unified DB  |
// | API as well as database abstraction for PHP applications.            |
// | This LICENSE is in the BSD license style.                            |
// |                                                                      |
// | Redistribution and use in source and binary forms, with or without   |
// | modification, are permitted provided that the following conditions   |
// | are met:                                                             |
// |                                                                      |
// | Redistributions of source code must retain the above copyright       |
// | notice, this list of conditions and the following disclaimer.        |
// |                                                                      |
// | Redistributions in binary form must reproduce the above copyright    |
// | notice, this list of conditions and the following disclaimer in the  |
// | documentation and/or other materials provided with the distribution. |
// |                                                                      |
// | Neither the name of Manuel Lemos, Tomas V.V.Cox, Stig. S. Bakken,    |
// | Lukas Smith nor the names of his contributors may be used to endorse |
// | or promote products derived from this software without specific prior|
// | written permission.                                                  |
// |                                                                      |
// | THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS  |
// | "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT    |
// | LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS    |
// | FOR A PARTICULAR PURPOSE ARE DISCLAIMED.  IN NO EVENT SHALL THE      |
// | REGENTS OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,          |
// | INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, |
// | BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS|
// |  OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED  |
// | AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT          |
// | LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY|
// | WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE          |
// | POSSIBILITY OF SUCH DAMAGE.                                          |
// +----------------------------------------------------------------------+
// | Authors: Paul Cooper <pgc@ucecom.com>                                |
// |          Lorenzo Alberton <l dot alberton at quipo dot it>           |
// +----------------------------------------------------------------------+
//
// $Id: MDB2_extended_testcase.php,v 1.13 2007/02/28 12:15:26 quipo Exp $

require_once 'MDB2_testcase.php';

class MDB2_Extended_TestCase extends MDB2_TestCase
{
    /**
     *
     */
    function testAutoExecute()
    {
        $data = $this->getSampleData();
        $select_query = 'SELECT ' . implode(', ', array_keys($this->fields)) . ' FROM users';

        $result = $this->db->loadModule('Extended');
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading "Extended" module: '.$result->getMessage());
        }
        $result = $this->db->extended->autoExecute('users', $data, MDB2_AUTOQUERY_INSERT, null, $this->fields);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error auto executing insert: '.$result->getMessage());
        }

        $this->db->setFetchMode(MDB2_FETCHMODE_ASSOC);
        $result =& $this->db->query($select_query, $this->fields);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error selecting from users: '.$result->getMessage());
        } else {
            $this->verifyFetchedValues($result, null, $data);
            $result->free();
        }

        $where = 'user_id = '.$this->db->quote($data['user_id'], 'integer');
        $result = $this->db->extended->autoExecute('users', null, MDB2_AUTOQUERY_SELECT, $where, null, true, $this->fields);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error auto executing select: '.$result->getMessage());
        } else {
            $this->verifyFetchedValues($result, null, $data);
            $result->free();
        }

        $where = 'user_id = '.$this->db->quote($data['user_id'], 'integer');
        $result = $this->db->extended->autoExecute('users', null, MDB2_AUTOQUERY_SELECT, $where, null, true, MDB2_PREPARE_RESULT);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error auto executing select: '.$result->getMessage());
        } else {
            $result->setResultTypes($this->fields);
            $this->verifyFetchedValues($result, null, $data);
            $result->free();
        }

        $update_data = array();
        $data['user_name'] = $update_data['user_name'] = 'foo';

        $where = 'user_id = '.$this->db->quote($data['user_id'], 'integer');
        $result = $this->db->extended->autoExecute('users', $update_data, MDB2_AUTOQUERY_UPDATE, $where, $this->fields);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error auto executing insert: '.$result->getMessage());
        }

        $this->db->setFetchMode(MDB2_FETCHMODE_ASSOC);
        $result =& $this->db->query($select_query, $this->fields);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error selecting from users: '.$result->getMessage());
        } else {
            $this->verifyFetchedValues($result, null, $data);
            $result->free();
        }

        $where = array($where, 'user_name = '.$this->db->quote($data['user_name'], 'text'));
        $result = $this->db->extended->autoExecute('users', null, MDB2_AUTOQUERY_DELETE, $where, null);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error auto executing insert: '.$result->getMessage());
        }

        $this->db->setFetchMode(MDB2_FETCHMODE_ASSOC);
        $result =& $this->db->query($select_query, $this->fields);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error selecting from users: '.$result->getMessage());
        } else {
            $this->assertEquals(0, $result->numRows(), 'No rows were expected to be returned');
            $result->free();
        }
    }

    /**
     * Test getAssoc()
     *
     * Test fetching two columns from a resultset. Return them as (key,value) pairs.
     */
    function testGetAssoc()
    {
        $result = $this->db->loadModule('Extended');
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading "Extended" module: '.$result->getMessage());
        }

        $data = $this->getSampleData(1234);

        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        $stmt = $this->db->prepare($query, array_values($this->fields), MDB2_PREPARE_MANIP);
        $result = $stmt->execute(array_values($data));
        $stmt->free();

        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing prepared query: '.$result->getMessage());
        }

        //test getAssoc() with query parameters
        $query = 'SELECT user_id, user_name FROM users WHERE user_id=?';
        $result = $this->db->extended->getAssoc($query, array('integer', 'text'), array(1234), array('integer'));
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing getAssoc(): '.$result->getMessage());
        }
        $this->assertTrue(array_key_exists($data['user_id'], $result), 'Unexpected returned key');
        $this->assertEquals($data['user_name'], $result[$data['user_id']], 'Unexpected returned value');
        
        //test getAssoc() without query parameters
        $query = 'SELECT user_id, user_name FROM users WHERE user_id=1234';
        $result = $this->db->extended->getAssoc($query, array('integer', 'text'));
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing getAssoc(): '.$result->getMessage());
        } else {
            $this->assertTrue(array_key_exists($data['user_id'], $result), 'Unexpected returned key');
            $this->assertEquals($data['user_name'], $result[$data['user_id']], 'Unexpected returned value');
        }
        
        //add another record to the db
        $data2 = $this->getSampleData(4321);
        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        $stmt = $this->db->prepare($query, array_values($this->fields), MDB2_PREPARE_MANIP);
        $result = $stmt->execute(array_values($data2));
        $stmt->free();

        //test getAssoc() with $force_array=true
        $query = 'SELECT user_id, user_name FROM users ORDER BY user_id';
        $values = $this->db->extended->getAssoc($query, array('integer', 'text'), null, null, MDB2_FETCHMODE_ASSOC, true);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error executing getAssoc(): '.$values->getMessage());
        } else {
            $this->assertEquals(2, count($values), 'Error: incorrect number of returned rows');
            list($id, $value) = each($values);
            $this->assertEquals($data['user_id'],   $id,                 'Unexpected returned value');
            $this->assertEquals($data['user_name'], $value['user_name'], 'Unexpected returned value');
            list($id, $value) = each($values);
            $this->assertEquals($data2['user_id'],   $id,                 'Unexpected returned value');
            $this->assertEquals($data2['user_name'], $value['user_name'], 'Unexpected returned value');
        }


        //test getAssoc() with $force_array=false and $group=true
        $query = 'SELECT user_id, user_name FROM users ORDER BY user_id';
        $values = $this->db->extended->getAssoc($query, array('integer', 'text'), null, null, MDB2_FETCHMODE_ASSOC, false, true);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error executing getAssoc(): '.$values->getMessage());
        } else {
            //@todo: check if MDB2_FETCHMODE_ASSOC is behaving correctly in this case
            $this->assertEquals(2, count($values), 'Error: incorrect number of returned rows');
            list($id, $value) = each($values);
            $this->assertEquals($data['user_id'],   $id,       'Unexpected returned value');
            $this->assertEquals($data['user_name'], $value[0], 'Unexpected returned value');
            list($id, $value) = each($values);
            $this->assertEquals($data2['user_id'],   $id,       'Unexpected returned value');
            $this->assertEquals($data2['user_name'], $value[0], 'Unexpected returned value');

        }
        
        //test $group=true with 3 fields
        $query = 'SELECT user_password, user_id, user_name FROM users ORDER BY user_id';
        $values = $this->db->extended->getAssoc($query, array('integer', 'text', 'text'), null, null, MDB2_FETCHMODE_ASSOC, false, true);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error executing getAssoc(): '.$values->getMessage());
        } else {
            //the 2 values for user_password are equals, so they are collapsed in the same array
            $this->assertEquals(1, count($values), 'Error: incorrect number of returned rows');
            $values = $values[0];
            //there are 2 records
            $this->assertEquals(2, count($values), 'Error: incorrect number of returned rows');
            $value = array_shift($values);
            $this->assertEquals($data['user_id'],   $value['user_id'], 'Unexpected returned value');
            $this->assertEquals($data['user_name'], $value['user_name'], 'Unexpected returned value');
            $value = array_shift($values);
            $this->assertEquals($data2['user_id'],   $value['user_id'], 'Unexpected returned value');
            $this->assertEquals($data2['user_name'], $value['user_name'], 'Unexpected returned value');
        }
        
        //test $group=false with 3 fields
        $values = $this->db->extended->getAssoc($query, array('integer', 'text', 'text'), null, null, MDB2_FETCHMODE_ASSOC, false, false);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error executing getAssoc(): '.$values->getMessage());
        } else {
            //the 2 values for user_password are equals, so the first record is overwritten
            $this->assertEquals(1, count($values), 'Error: incorrect number of returned rows');
            $values = $values[0];
            $this->assertEquals($data2['user_id'],   $value['user_id'], 'Unexpected returned value');
            $this->assertEquals($data2['user_name'], $value['user_name'], 'Unexpected returned value');
        }
    }

    /**
     * Test getOne()
     *
     * Test fetching a single value
     */
    function testGetOne()
    {
        $result = $this->db->loadModule('Extended');
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading "Extended" module: '.$result->getMessage());
        }

        $data = $this->getSampleData(1234);

        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        $stmt = $this->db->prepare($query, array_values($this->fields), MDB2_PREPARE_MANIP);
        $result = $stmt->execute(array_values($data));
        $stmt->free();

        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing prepared query: '.$result->getMessage());
        }

        //test getOne() with query parameters
        $query = 'SELECT user_name FROM users WHERE user_id=?';
        $result = $this->db->extended->getOne($query, 'text', array(1234), array('integer'));
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing getOne(): '.$result->getMessage());
        }
        $this->assertEquals($data['user_name'], $result, 'Unexpected returned value');

        //test getOne() without query parameters
        $query = 'SELECT user_name FROM users WHERE user_id=1234';
        $result = $this->db->extended->getOne($query, 'text');
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing getOne(): '.$result->getMessage());
        }
        $this->assertEquals($data['user_name'], $result, 'Unexpected returned value');

        //test getOne() with column number (resultset: 0-based array)
        $query = 'SELECT user_id, user_name, approved FROM users WHERE user_id=1234';
        $result = $this->db->extended->getOne($query, 'text', null, null, 1); //get the 2nd column
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing getOne(): '.$result->getMessage());
        }
        $this->assertEquals($data['user_name'], $result, 'Unexpected returned value');
    }

    /**
     * Test getCol()
     *
     * Test fetching a column of result data.
     */
    function testGetCol()
    {
        $result = $this->db->loadModule('Extended');
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading "Extended" module: '.$result->getMessage());
        }

        $data = array(
            0 => $this->getSampleData(1234),
            1 => $this->getSampleData(4321),
        );
        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        $stmt = $this->db->prepare($query, array_values($this->fields), MDB2_PREPARE_MANIP);
        $result = $stmt->execute(array_values($data[0]));
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing prepared query: '.$result->getMessage());
        }
        $result = $stmt->execute(array_values($data[1]));
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing prepared query: '.$result->getMessage());
        }
        $stmt->free();

        //test getCol() with query parameters
        $query = 'SELECT user_name FROM users WHERE user_id>?';
        $result = $this->db->extended->getCol($query, 'text', array(1), array('integer'));
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing getCol(): '.$result->getMessage());
        }
        $expected = array(
            $data[0]['user_name'],
            $data[1]['user_name'],
        );
        $this->assertEquals($expected, $result, 'Unexpected returned value');

        //test getCol() without query parameters
        $query = 'SELECT user_name FROM users';
        $result = $this->db->extended->getCol($query, 'text');
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing getCol(): '.$result->getMessage());
        }
        $this->assertEquals($expected, $result, 'Unexpected returned value');

        //test getCol() with column number (resultset: 0-based array)
        $query = 'SELECT user_id, user_name, approved FROM users';
        $result = $this->db->extended->getCol($query, 'text', null, null, 1); //get the 2nd column
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing getCol(): '.$result->getMessage());
        }
        $this->assertEquals($expected, $result, 'Unexpected returned value');
    }

    /**
     * Test getRow()
     *
     * Test fetching a row of result data.
     */
    function testGetRow()
    {
        $result = $this->db->loadModule('Extended');
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading "Extended" module: '.$result->getMessage());
        }

        $data = $this->getSampleData(1234);
        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        $stmt = $this->db->prepare($query, array_values($this->fields), MDB2_PREPARE_MANIP);
        $result = $stmt->execute(array_values($data));
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing prepared query: '.$result->getMessage());
        }
        $stmt->free();

        //test getRow() with query parameters
        $query = 'SELECT user_id, user_name, user_password FROM users WHERE user_id=?';
        $result = $this->db->extended->getRow($query, array('integer', 'text', 'text'), array(1234), array('integer'), MDB2_FETCHMODE_ASSOC);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing getRow(): '.$result->getMessage());
        }
        $this->assertEquals($data['user_id'],       $result['user_id'],       'Unexpected returned value');
        $this->assertEquals($data['user_name'],     $result['user_name'],     'Unexpected returned value');
        $this->assertEquals($data['user_password'], $result['user_password'], 'Unexpected returned value');

        //test getRow() without query parameters
        $query = 'SELECT user_id, user_name, user_password FROM users';
        $result = $this->db->extended->getRow($query, array('integer', 'text', 'text'), null, null, MDB2_FETCHMODE_ASSOC);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing getRow(): '.$result->getMessage());
        }
        $this->assertEquals($data['user_id'],       $result['user_id'],       'Unexpected returned value');
        $this->assertEquals($data['user_name'],     $result['user_name'],     'Unexpected returned value');
        $this->assertEquals($data['user_password'], $result['user_password'], 'Unexpected returned value');
    }

    /**
     * Test getAll()
     *
     * Test fetching result data all at once.
     */
    function testGetAll()
    {
        $result = $this->db->loadModule('Extended');
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading "Extended" module: '.$result->getMessage());
        }

        $data = array();
        $total_rows = 5;

        $stmt = $this->db->prepare('INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')', array_values($this->fields), MDB2_PREPARE_MANIP);

        for ($row = 0; $row < $total_rows; $row++) {
            $data[$row] = $this->getSampleData($row);
            $result = $stmt->execute(array_values($data[$row]));
            if (PEAR::isError($result)) {
                $this->assertTrue(false, 'Error executing prepared query: '.$result->getMessage());
            }
        }
        $stmt->free();

        //test getAll() with query parameters
        $query = 'SELECT user_id, user_name, user_password FROM users WHERE user_id > ? ORDER BY user_id';
        $values = $this->db->extended->getAll($query, array('integer', 'text', 'text'), array(2), array('integer'), MDB2_FETCHMODE_ASSOC);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error fetching the result set: '.$values->getMessage());
        } else {
            $this->assertEquals(2, count($values), 'Error: incorrect number of returned rows');
            for ($i=0; $i<2; $i++) {
                $this->assertEquals($data[$i+3]['user_id'],       $values[$i]['user_id'],       'Unexpected returned value');
                $this->assertEquals($data[$i+3]['user_name'],     $values[$i]['user_name'],     'Unexpected returned value');
                $this->assertEquals($data[$i+3]['user_password'], $values[$i]['user_password'], 'Unexpected returned value');
            }
        }

        //test getAll() without query parameters
        $query = 'SELECT user_id, user_name, user_password FROM users ORDER BY user_id';
        $values = $this->db->extended->getAll($query, array('integer', 'text', 'text'), null, null, MDB2_FETCHMODE_ASSOC);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error fetching the result set: '.$values->getMessage());
        } else {
            $this->assertEquals($total_rows, count($values), 'Error: incorrect number of returned rows');
            for ($i=0; $i<$total_rows; $i++) {
                $this->assertEquals($data[$i]['user_id'],       $values[$i]['user_id'],       'Unexpected returned value');
                $this->assertEquals($data[$i]['user_name'],     $values[$i]['user_name'],     'Unexpected returned value');
                $this->assertEquals($data[$i]['user_password'], $values[$i]['user_password'], 'Unexpected returned value');
            }
        }
    }

    /**
     * Test limitQuery()
     *
     * Test fetching a limited resultset.
     */
    function testLimitQuery()
    {
        $result = $this->db->loadModule('Extended');
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading "Extended" module: '.$result->getMessage());
        }

        $data = array();
        $total_rows = 5;

        $stmt = $this->db->prepare('INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')', array_values($this->fields), MDB2_PREPARE_MANIP);

        for ($row = 0; $row < $total_rows; $row++) {
            $data[$row] = $this->getSampleData($row);
            $result = $stmt->execute(array_values($data[$row]));
            if (PEAR::isError($result)) {
                $this->assertTrue(false, 'Error executing prepared query: '.$result->getMessage());
            }
        }
        $stmt->free();
        
        $query = 'SELECT user_id, user_name, user_password FROM users ORDER BY user_id';
        $types = array('integer', 'text', 'text');

        //test limitQuery() with offset = 0
        $result = $this->db->extended->limitQuery($query, $types, 2);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing limitQuery(): '.$result->getMessage());
        }
        $values = $result->fetchAll(MDB2_FETCHMODE_ASSOC);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error fetching the result set');
        } else {
            $this->assertEquals(2, count($values), 'Error: incorrect number of returned rows');
            for ($i=0; $i<2; $i++) {
                $this->assertEquals($data[$i]['user_id'],       $values[$i]['user_id'],       'Unexpected returned value');
                $this->assertEquals($data[$i]['user_name'],     $values[$i]['user_name'],     'Unexpected returned value');
                $this->assertEquals($data[$i]['user_password'], $values[$i]['user_password'], 'Unexpected returned value');
            }
        }
        $result->free();

        //test limitQuery() with offset > 0
        $result = $this->db->extended->limitQuery($query, $types, 3, 2);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing limitQuery(): '.$result->getMessage());
        }
        $values = $result->fetchAll(MDB2_FETCHMODE_ASSOC);
        if (PEAR::isError($values)) {
            $this->assertTrue(false, 'Error fetching the result set');
        } else {
            $this->assertEquals(3, count($values), 'Error: incorrect number of returned rows');
            for ($i=0; $i<3; $i++) {
                $this->assertEquals($data[$i+2]['user_id'],       $values[$i]['user_id'],       'Unexpected returned value');
                $this->assertEquals($data[$i+2]['user_name'],     $values[$i]['user_name'],     'Unexpected returned value');
                $this->assertEquals($data[$i+2]['user_password'], $values[$i]['user_password'], 'Unexpected returned value');
            }
        }
        $result->free();
    }

    /**
     * Test execParam()
     *
     * Test executing a query with parameters
     */
    function testExecParam()
    {
        $result = $this->db->loadModule('Extended');
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading "Extended" module: '.$result->getMessage());
        }
        
        $data = $this->getSampleData(1234);
        
        $query = 'INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')';
        
        $result = $this->db->extended->execParam($query, array_values($data), $this->fields);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing execParam(): '.$result->getMessage());
        }
        
        $query = 'SELECT user_id, user_name, user_password FROM users WHERE user_id=?';
        $result = $this->db->extended->getRow($query, array('integer', 'text', 'text'), array(1234), array('integer'), MDB2_FETCHMODE_ASSOC);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing getRow(): '.$result->getMessage());
        }
        $this->assertEquals($data['user_id'],       $result['user_id'],       'Unexpected returned value');
        $this->assertEquals($data['user_name'],     $result['user_name'],     'Unexpected returned value');
        $this->assertEquals($data['user_password'], $result['user_password'], 'Unexpected returned value');
    }

    /**
     * Test executeMultiple()
     *
     * Test executing multiple prepared queries
     */
    function testExecuteMultiple()
    {
        $result = $this->db->loadModule('Extended');
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading "Extended" module: '.$result->getMessage());
        }

        $data = array();
        $total_rows = 5;
        
        for ($row = 0; $row < $total_rows; $row++) {
            $data[$row] = array_values($this->getSampleData($row));
        }

        $stmt = $this->db->prepare('INSERT INTO users (' . implode(', ', array_keys($this->fields)) . ') VALUES ('.implode(', ', array_fill(0, count($this->fields), '?')).')');
        $result = $this->db->extended->executeMultiple($stmt, $data);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error executing executeMultiple(): '.$result->getMessage());
        }
        $stmt->free();
        
        $query = 'SELECT ' . implode(', ', array_keys($this->fields)) . ' FROM users';
        $values = $this->db->queryAll($query, $this->fields, MDB2_FETCHMODE_ORDERED);
        
        $n_fields = count($this->fields);
        for ($i=0; $i<$total_rows; $i++) {
            for ($field=0; $field<$n_fields; $field++) {
                $this->assertEquals(strval($data[$i][$field]), strval($values[$i][$field]), 'Unexpected returned value');
            }
        }
    }
}
?>