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

class RuntimeKernel
{
    private static $_theKernel;
    
    private $_currentStateSerializer;
    private $_goalStateDeserializer;
    private $_inputChannel;
    private $_outputChannel;
    private $_protocol1RuntimeCurrentStateClient;
    private $_roleEnvironmentDataDeserializer;
    private $_protocol1RuntimeGoalStateClient;
    private $_runtimeVersionProtocolClient;
    private $_runtimeVersionManager;

    private function __construct()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public static function getKernel()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public function getCurrentStateSerializer()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public function getGoalStateDeserializer()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public function getInputChannel()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public function getOutputChannel()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public function getProtocol1RuntimeCurrentStateClient()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public function getRoleEnvironmentDataDeserializer()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public function getProtocol1RuntimeGoalStateClient()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public function getRuntimeVersionProtocolClient()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
    
    public function getRuntimeVersionManager()
    {
        throw new \Exception(Resources::NOT_IMPLEMENTED_MSG);
    }
}

?>