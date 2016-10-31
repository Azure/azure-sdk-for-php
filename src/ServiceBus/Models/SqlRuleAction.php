<?php
/**
 * LICENSE: Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0.
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
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */

namespace WindowsAzure\ServiceBus\Models;

use WindowsAzure\ServiceBus\Internal\Action;

/**
 * The SQL rule action.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/WindowsAzure/azure-sdk-for-php
 */
class SqlRuleAction extends Action
{
    /**
     * The SQL expression.
     *
     * @var string
     */
    private $_sqlExpression;

    /**
     * The compatibility level.
     *
     * @var string
     */
    private $_compatibilityLevel;

    /**
     * Creates a SQL Rule Action instance with default parameters.
     */
    public function __construct()
    {
        parent::__construct();
        $this->attributes['xsi:type'] = 'SqlRuleAction';
    }

    /**
     * Gets the SQL expression.
     *
     * @return string
     */
    public function getSqlExpression()
    {
        return $this->_sqlExpression;
    }

    /**
     * Sets the SQL expression.
     *
     * @param string $sqlExpression Sets the SQL expression
     */
    public function setSqlExpression($sqlExpression)
    {
        $this->_sqlExpression = $sqlExpression;
    }

    /**
     * Gets the compatibility level.
     *
     * @return string
     */
    public function getCompatibilityLevel()
    {
        return $this->_compatibilityLevel;
    }

    /**
     * Sets the compatibility level.
     *
     * @param string $compatibilityLevel The level of compatibility
     */
    public function setCompatibilityLevel($compatibilityLevel)
    {
        $this->_compatibilityLevel = $compatibilityLevel;
    }
}
