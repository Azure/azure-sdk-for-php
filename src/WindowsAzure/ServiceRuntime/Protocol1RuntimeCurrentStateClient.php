<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * PHP version 5
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\ServiceRuntime
 * @author    Microsoft Corporation
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\WindowsAzure\ServiceRuntime;

class Protocol1RuntimeCurrentStateClient
{
    private $_serializer;
    private $_outputChannel;
    private $_endpoint;
    
    public function __construct($serializer, $outputChannel)
    {
        $this->_serializer = $serializer;
        $this->_outputChannel = $outputChannel;
        $this->_endpoint = null;
    }
    
    public function setEndpoint($endpoint)
    {
        $this->_endpoint = $endpoint;
    }
    
    public function setCurrentState($state)
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
}

?>