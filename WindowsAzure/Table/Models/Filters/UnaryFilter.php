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
 * @package   WindowsAzure\Table\Models\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
 
namespace WindowsAzure\Table\Models\Filters;

/**
 * Unary filter
 *
 * @category  Microsoft
 * @package   WindowsAzure\Table\Models\Filters
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class UnaryFilter extends Filter
{
    /**
     * @var string 
     */
    private $_operator;
    
    /**
     * @var Filter
     */
    private $_operand;
    
    /**
     * Constructor.
     * 
     * @param string $operator The operator.
     * @param Filter $operand  The operand filter.
     */
    public function __construct($operator, $operand)
    {
        $this->_operand  = $operand;
        $this->_operator = $operator;
    }
    
    /**
     * Gets operator
     * 
     * @return string 
     */
    public function getOperator()
    {
        return $this->_operator;
    }

    /**
     * Gets operand
     * 
     * @return Filter 
     */
    public function getOperand()
    {
        return $this->_operand;
    }
}


