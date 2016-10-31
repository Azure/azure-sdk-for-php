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

/**
 * The base class for the options for list request.
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
class ListOptions
{
    /**
     * The skip query parameter for list API.
     *
     * @var int
     */
    private $_skip;

    /**
     * The top query parameter for list API.
     *
     * @var int
     */
    private $_top;

    /**
     * Creates a list option instance with default parameters.
     */
    public function __construct()
    {
    }

    /**
     * Gets the skip parameter.
     *
     * @return int
     */
    public function getSkip()
    {
        return $this->_skip;
    }

    /**
     * Sets the skip parameter.
     *
     * @param int $skip value
     */
    public function setSkip($skip)
    {
        $this->_skip = $skip;
    }

    /**
     * Gets the top parameter.
     *
     * @return int
     */
    public function getTop()
    {
        return $this->_top;
    }

    /**
     * Sets the top parameter.
     *
     * @param int $top value
     */
    public function setTop($top)
    {
        $this->_top = $top;
    }
}
