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
 * @package   WindowsAzure\Services\Table\Models\Filters
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
 
namespace WindowsAzure\Services\Table\Models\Filters;
use WindowsAzure\Services\Table\Models\EdmType;

/**
 * Constant filter
 *
 * @category  Microsoft
 * @package   WindowsAzure\Services\Table\Models\Filters
 * @author    Abdelrahman Elogeel <Abdelrahman.Elogeel@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/azure-sdk-for-php
 */
class ConstantFilter extends Filter
{
    /**
     * @var mix
     */
    private $_value;
    
    /**
     * @var string
     */
    private $_edmType;
    
    /**
     * Constructor.
     * 
     * @param string $edmType The EDM type.
     * @param string $value   The EDM value.
     */
    public function __construct($edmType, $value)
    {
        $this->_edmType = EdmType::processType($edmType);
        $this->_value   = $value;
    }

    /**
     * Gets value
     * 
     * @return mix 
     */
    public function getValue()
    {
        return $this->_value;
    }
    
    /**
     * Gets the type of the constant.
     * 
     * @return string
     */
    public function getEdmType()
    {
        return $this->_edmType;
    }
}

?>
