<?php

/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use $this file except in compliance with the License.
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
 * @package   PEAR2\WindowsAzure\Services\Table\Models\Filters
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace PEAR2\WindowsAzure\Services\Table\Models\Filters;

/**
 * Binary filter
 *
 * @category  Microsoft
 * @package   PEAR2\WindowsAzure\Services\Table\Models\Filters
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class BinaryFilter
{
    /**
     * @var string 
     */
    private $_operator;
    
    /**
     * @var Filter
     */
    private $_left;
    
    /**
     * @var Filter
     */
    private $_right;
    
    public function getOperator() 
    {
        return $this->__operator;
    }

    public function setOperator($operator)
    {
        $this->_operator = $operator;
    }

    public function getLeft()
    {
        return $this->_left;
    }

    public function setLeft($left)
    {
        $this->_left = $left;
    }

    public function getRight()
    {
        return $this->_right;
    }

    public function setRight($right)
    {
        $this->_right = $right;
    }
}

?>
