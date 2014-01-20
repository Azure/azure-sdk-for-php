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
// $Id: MDB2_nonstandard_pgsql.php,v 1.5 2007/03/04 21:36:08 quipo Exp $

class MDB2_nonstandard_pgsql extends MDB2_nonstandard {

    var $trigger_body = '';

    function createTrigger($trigger_name, $table_name) {
        $this->trigger_body = 'EXECUTE PROCEDURE '.$trigger_name.'_func();';
        $table_name = $this->db->quoteIdentifier($table_name);
        $sql = 'CREATE OR REPLACE FUNCTION '.$trigger_name.'_func() RETURNS trigger AS \'
                DECLARE
                    id_number INTEGER;
                BEGIN
                    SELECT INTO id_number id FROM '. $table_name .' WHERE id = NEW.id;
                    RETURN NEW;
                END;
                \' LANGUAGE \'plpgsql\';';
        $res = $this->db->exec($sql);
        if (PEAR::isError($res)) {
            return $res;
        }
    
        $query = 'CREATE TRIGGER '. $trigger_name .' AFTER UPDATE ON '. $table_name .'
                  FOR EACH ROW ' .$this->trigger_body;
        return $this->db->exec($query);
    }

    function checkTrigger($trigger_name, $table_name, $def) {
        parent::checkTrigger($trigger_name, $table_name, $def);
        $this->test->assertEquals($this->trigger_body, $def['trigger_body']);
    }

    function dropTrigger($trigger_name, $table_name) {
        return $this->db->exec('DROP TRIGGER '.$trigger_name .' ON '. $table_name);
    }

    function createFunction($name) {
        $query = "CREATE FUNCTION $name (Decimal(6,2), Decimal(6,2)) RETURNS Decimal(6,2)
AS 'select $1 + $2;'
LANGUAGE SQL
IMMUTABLE
RETURNS NULL ON NULL INPUT";
        return $this->db->exec($query);
    }

    function dropFunction($name) {
        return $this->db->exec('DROP FUNCTION '.$name.' (Decimal(6,2), Decimal(6,2))');
    }
}

?>