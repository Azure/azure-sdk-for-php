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
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */

namespace PEAR2\WindowsAzure\ServiceRuntime;
use PEAR2\WindowsAzure\Resources;
use PEAR2\WindowsAzure\Validate;

/**
 * The role data.
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\ServiceRuntime
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class Role
{
    /**
     * @var string
     */
    private $_name;
    
    /**
     * @var array
     */
    private $_instances;
   
    /**
     * Constructor
     * 
     * @param string $name      The role name.
     * @param array  $instances The role instances.
     */
    public function __construct($name, $instances)
    {
        Validate::isArray($instances);
        
        $this->_name      = $name;
        $this->_instances = $instances;
    }
    
    /**
     * Returns the collection of instances for the role.
     * 
     * The number of instances of a role to be deployed to Windows Azure is
     * specified in the service's configuration file.
     * 
     * A role must define at least one internal endpoint in order for its set 
     * of instances to be known at runtime.
     * 
     * @return array
     */
    public function getInstances()
    {
        return $this->_instances;
    }
    
    /**
     * Returns the name of the role as it is declared in the service definition
     * file.
     * 
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }
}

?>