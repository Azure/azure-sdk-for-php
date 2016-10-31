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
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\ServiceManagement\Models;

use WindowsAzure\Common\Internal\Validate;

/**
 * The optional parameters for createDeployment API.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright 2012 Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class CreateDeploymentOptions
{
    /**
     * Indicates whether to start the deployment immediately after it is created.
     *
     * @var bool
     */
    private $_startDeployment;

    /**
     * Indicates whether to treat package validation warnings as errors.
     *
     * @var bool
     */
    private $_treatWarningsAsErrors;

    /**
     * Constructs new CreateDeploymentOptions instance.
     */
    public function __construct()
    {
        $this->_startDeployment = false;
        $this->_treatWarningsAsErrors = false;
    }

    /**
     * Gets start deployment flag.
     *
     * @return bool
     */
    public function getStartDeployment()
    {
        return $this->_startDeployment;
    }

    /**
     * Sets start deployment flag.
     *
     * @param bool $startDeployment Indicates whether to start the deployment
     *                              immediately after it is created
     */
    public function setStartDeployment($startDeployment)
    {
        Validate::isBoolean($startDeployment, 'startDeployment');

        $this->_startDeployment = $startDeployment;
    }

    /**
     * Gets treat warnings as errors flag.
     *
     * @return bool
     */
    public function getTreatWarningsAsErrors()
    {
        return $this->_treatWarningsAsErrors;
    }

    /**
     * Sets treat warnings as errors flag.
     *
     * @param bool $treatWarningsAsErrors Indicates whether to treat package
     *                                    validation warnings as errors
     */
    public function setTreatWarningsAsErrors($treatWarningsAsErrors)
    {
        Validate::isBoolean($treatWarningsAsErrors, 'treatWarningsAsErrors');

        $this->_treatWarningsAsErrors = $treatWarningsAsErrors;
    }
}
