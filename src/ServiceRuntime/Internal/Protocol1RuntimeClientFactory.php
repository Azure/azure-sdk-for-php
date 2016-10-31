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

namespace WindowsAzure\ServiceRuntime\Internal;

/**
 * The runtime client factory.
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
class Protocol1RuntimeClientFactory
{
    /**
     * Gets the runtime version.
     *
     * @return string
     */
    public function getVersion()
    {
        return '2011-03-08';
    }

    /**
     * Creates a new runtime client instance.
     *
     * @param string $path The goal state path
     *
     * @return Protocol1RuntimeClient
     */
    public function createRuntimeClient($path)
    {
        $kernel = RuntimeKernel::getKernel();

        return new Protocol1RuntimeClient(
            $kernel->getProtocol1RuntimeGoalStateClient(),
            $kernel->getProtocol1RuntimeCurrentStateClient(),
            $path
        );
    }
}
