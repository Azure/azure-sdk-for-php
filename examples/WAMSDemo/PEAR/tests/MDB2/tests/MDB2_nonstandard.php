<?php
// +----------------------------------------------------------------------+
// | PHP versions 4 and 5                                                 |
// +----------------------------------------------------------------------+
// | Copyright (c) 2006-2007 Lorenzo Alberton                             |
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
// | Author: Lorenzo Alberton <l.alberton@quipo.it>                       |
// +----------------------------------------------------------------------+
//
// $Id: MDB2_nonstandard.php,v 1.5 2007/03/04 21:26:52 quipo Exp $

class MDB2_nonstandard {
    //contains the MDB2 object of the db once we have connected
    var $db;
    
    //contains the PHPUnit_TestCase object
    var $test;
    
    /**
     * Returns a driver-specific object
     */
    function factory($db, $test) {
        $classname = 'MDB2_nonstandard_'.$db->phptype;
        include_once $classname.'.php';
        if (class_exists($classname)) {
            $obj =& new $classname();
            $obj->db =& $db;
            $obj->test =& $test;
            return $obj;
        }
        return $db->raiseError(MDB2_ERROR_UNSUPPORTED, null, null,
            'not capable', __FUNCTION__);
    }
    
    /**
     * Create a TRIGGER
     */
    function createTrigger($trigger_name, $table_name) {
        return $this->db->raiseError(MDB2_ERROR_NOT_CAPABLE, null, null,
            'not capable', __FUNCTION__);
    }

    /**
     * Check if getTriggerDefinition() returns the correct definition for the trigger
     */
    function checkTrigger($trigger_name, $table_name, $def) {
        $this->test->assertEquals(strtoupper($trigger_name), strtoupper($def['trigger_name']), 'Error getting trigger definition (name)');
        $this->test->assertEquals(strtoupper($table_name),  strtoupper($def['table_name']),   'Error getting trigger definition (table)');
        $this->test->assertEquals('AFTER',  $def['trigger_type'], 'Error getting trigger definition (type)');
        $this->test->assertEquals('UPDATE', $def['trigger_event'], 'Error getting trigger definition (event)');
        $this->test->assertTrue(is_string($def['trigger_body']), 'Error getting trigger definition (body)');
        $this->test->assertTrue($def['trigger_enabled'], 'Error getting trigger definition (enabled)');
        //$this->test->assertTrue(empty($def['trigger_comment']),  'Error getting trigger definition (comment)');
    }

    /**
     * Drop a TRIGGER
     */
    function dropTrigger($trigger_name, $table_name) {
        return $this->db->raiseError(MDB2_ERROR_NOT_CAPABLE, null, null,
            'not capable', __FUNCTION__);
    }
    
    /**
     * Create a VIEW
     */
    function createView($view_name, $table_name) {
        $query = 'CREATE VIEW '. $this->db->quoteIdentifier($view_name, true)
                .' (id) AS SELECT id FROM '
                . $this->db->quoteIdentifier($table_name, true) .' WHERE id > 1';
        return $this->db->exec($query);
    }

    /**
     * Drop a VIEW
     */
    function dropView($view_name) {
        return $this->db->exec('DROP VIEW '.$view_name);
    }

    /**
     * Create a FUNCTION
     */
    function createFunction($name) {
        return $this->db->raiseError(MDB2_ERROR_NOT_CAPABLE, null, null,
            'not capable', __FUNCTION__);
    }

    /**
     * Drop a FUNCTION
     */
    function dropFunction($name) {
        return $this->db->exec('DROP FUNCTION '.$name);
    }
}
?>