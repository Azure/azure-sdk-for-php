<?php
// +----------------------------------------------------------------------+
// | PHP versions 4 and 5                                                 |
// +----------------------------------------------------------------------+
// | Copyright (c) 1998-2006 Manuel Lemos, Paul Cooper                    |
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
// | Author: Paul Cooper <pgc@ucecom.com>                                 |
// +----------------------------------------------------------------------+
//
// $Id: MDB2_api_testcase.php,v 1.22 2007/04/25 09:11:35 quipo Exp $

require_once 'MDB2_testcase.php';

class MDB2_Api_TestCase extends MDB2_TestCase {
    var $clear_tables = false;

    function testParseDSN() {
        $expected = array (
            'phptype'  => 'phptype',
            'dbsyntax' => 'phptype',
            'username' => 'username',
            'password' => 'password',
            'protocol' => 'protocol',
            'hostspec' => false,
            'port'     => '110',
            'socket'   => false,
            'database' => '/usr/db_file.db',
            'mode'     => false,
        );
        $original = 'phptype://username:password@protocol+hostspec:110//usr/db_file.db?mode=0644';
        $this->assertEquals($expected, MDB2::parseDSN($original));

        // ---------------------------------------------------------------------

        $original = 'phptype(dbsyntax)://username:password@hostspec/database_name';
        $expected = array (
            'phptype'  => 'phptype',
            'dbsyntax' => 'dbsyntax',
            'username' => 'username',
            'password' => 'password',
            'protocol' => 'tcp',
            'hostspec' => 'hostspec',
            'port'     => false,
            'socket'   => false,
            'database' => 'database_name',
            'mode'     => false,
        );
        $this->assertEquals($expected, MDB2::parseDSN($original));

        // ---------------------------------------------------------------------

        $original = 'phptype://username:password@hostspec/database_name';
        $expected['dbsyntax'] = 'phptype';
        $this->assertEquals($expected, MDB2::parseDSN($original));

        // ---------------------------------------------------------------------

        $original = 'phptype://username:password@hostspec';
        $expected['database'] = false;
        $this->assertEquals($expected, MDB2::parseDSN($original));

        // ---------------------------------------------------------------------

        $original = 'phptype://username@hostspec';
        $expected['password'] = false;
        $this->assertEquals($expected, MDB2::parseDSN($original));

        // ---------------------------------------------------------------------

        $original = 'phptype://hostspec/database';
        $expected['username'] = false;
        $expected['database'] = 'database';
        $this->assertEquals($expected, MDB2::parseDSN($original));

        // ---------------------------------------------------------------------

        $original = 'phptype(dbsyntax)';
        $expected['database'] = false;
        $expected['hostspec'] = false;
        $expected['protocol'] = false;
        $expected['dbsyntax'] = 'dbsyntax';
        $this->assertEquals($expected, MDB2::parseDSN($original));

        // ---------------------------------------------------------------------

        //oracle's "Easy Connect" syntax (Oracle 10g, @see Bug #4854)
        $original = 'oci8://scott:tiger@//localhost/XE';
        $expected = array (
            'phptype'  => 'oci8',
            'dbsyntax' => 'oci8',
            'username' => 'scott',
            'password' => 'tiger',
            'protocol' => 'tcp',
            'hostspec' => '//localhost/XE',
            'port'     => false,
            'socket'   => false,
            'database' => false,
            'mode'     => false,
        );
        $this->assertEquals($expected, MDB2::parseDSN($original));

        // ---------------------------------------------------------------------

        //ibase dbname+path on windows
        $original = 'ibase://user:pwd@localhost/C:\\PATH_TO_DB\\TEST.FDB';
        $expected = array (
            'phptype'  => 'ibase',
            'dbsyntax' => 'ibase',
            'username' => 'user',
            'password' => 'pwd',
            'protocol' => 'tcp',
            'hostspec' => 'localhost',
            'port'     => false,
            'socket'   => false,
            'database' => 'C:\\PATH_TO_DB\\TEST.FDB',
            'mode'     => false,
        );
        $this->assertEquals($expected, MDB2::parseDSN($original));

        // ---------------------------------------------------------------------

        //sqlite dbname+path on unix
        $original = 'sqlite:////full/unix/path/to/file.db?mode=0666';
        $expected = array (
            'phptype'  => 'sqlite',
            'dbsyntax' => 'sqlite',
            'username' => false,
            'password' => false,
            'protocol' => 'tcp',
            'hostspec' => '',
            'port'     => false,
            'socket'   => false,
            'database' => '/full/unix/path/to/file.db',
            'mode'     => false,
        );
        $this->assertEquals($expected, MDB2::parseDSN($original));
    }

    //test stuff in common.php
    function testConnect() {
        $db =& MDB2::factory($this->dsn, $this->options);
        if (PEAR::isError($db)) {
            $this->assertTrue(false, 'Connect failed bailing out - ' .$db->getMessage() . ' - ' .$db->getUserInfo());
        }
        if (PEAR::isError($this->db)) {
            exit;
        }
    }

    function testGetOption() {
        if (!$this->methodExists($this->db, 'getOption')) {
            return;
        }
        $option = $this->db->getOption('persistent');
        $this->assertEquals($option, $this->db->options['persistent']);
    }

    function testSetOption() {
        if (!$this->methodExists($this->db, 'setOption')) {
            return;
        }
        $option = $this->db->getOption('persistent');
        $this->db->setOption('persistent', !$option);
        $this->assertEquals(!$option, $this->db->getOption('persistent'));
        $this->db->setOption('persistent', $option);
    }

    function testLoadModule() {
        if (!$this->methodExists($this->db, 'loadModule')) {
            return;
        }
        $this->assertTrue(!PEAR::isError($this->db->loadModule('Manager', null, true)));
    }

    // test of the driver
    // helper function so that we don't have to write out a query a million times
    function standardQuery() {
        $query = 'SELECT * FROM users';
        // run the query and get a result handler
        if (!PEAR::isError($this->db)) {
            return $this->db->query($query);
        }
        return false;
    }

    function testQuery() {
        if (!$this->methodExists($this->db, 'query')) {
            return;
        }
        $result = $this->standardQuery();

        $this->assertTrue(MDB2::isResult($result), 'query: $result returned is not a resource');
    }

    function testExec() {
        if (!$this->methodExists($this->db, 'exec')) {
            return;
        }
        $result = $this->db->exec('UPDATE users SET user_name = user_name WHERE user_id = user_id');
        $this->assertFalse(PEAR::isError($result), 'exec: $result returned is an error');
        $this->assertEquals(0, $result, 'exec: incorrect number of affected rows returned');
    }

    function testFetchRow() {
        $result = $this->standardQuery();
        if (!$this->methodExists($result, 'fetchRow')) {
            return;
        }
        $err = $result->fetchRow();
        $result->free();

        if (PEAR::isError($err)) {
            $this->assertTrue(false, 'Error testFetch: '.$err->getMessage().' - '.$err->getUserInfo());
        }
    }

    function testNumRows() {
        $result = $this->standardQuery();
        if (!$this->methodExists($result, 'numRows')) {
            return;
        }
        $numrows = $result->numRows();
        $this->assertTrue(!PEAR::isError($numrows) && is_int($numrows));
        $result->free();
    }

    function testNumCols() {
        $result = $this->standardQuery();
        if (!$this->methodExists($result, 'numCols')) {
            return;
        }
        $numcols = $result->numCols();
        $this->assertTrue(!PEAR::isError($numcols) && $numcols > 0);
        $result->free();
    }

    function testSingleton() {
        $db =& MDB2::singleton();
        $this->assertTrue(MDB2::isConnection($db));

        // should have a different database name set
        $db =& MDB2::singleton($this->dsn, $this->options);

        $this->assertTrue($db->db_index != $this->db->db_index);
    }

    function testGetServerVersion() {
        $server_info = $this->db->getServerVersion(true);
        if (PEAR::isError($server_info)) {
            $this->assertTrue(false, 'Error: '.$server_info->getMessage().' - '.$server_info->getUserInfo());
        } else {
            $this->assertTrue(is_string($server_info), 'Error: Server info is not returned as a string: '. serialize($server_info));
        }
        $server_info = $this->db->getServerVersion();
        if (PEAR::isError($server_info)) {
            $this->assertTrue(false, 'Error: '.$server_info->getMessage().' - '.$server_info->getUserInfo());
        } else {
            $this->assertTrue(is_array($server_info), 'Error: Server info is not returned as an array: '. serialize($server_info));
        }
    }
}

?>