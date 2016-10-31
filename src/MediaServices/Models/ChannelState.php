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
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices\Models;

/**
 * Represents ChannelState type enum used in media services.
 *
 * @category  Microsoft
 *
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 *
 * @version   Release: 0.5.0_2016-11
 *
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class ChannelState
{
    /**
     * Stopped: This is the initial state of the Channel after its creation. In this state,
     * the Channel properties can be updated but streaming is not allowed.
     *
     * @var string
     */
    const Stopped = 'Stopped';

    /**
     * Starting: Channel is being started. No updates or streaming is allowed during this state.
     * If an error occurs, the Channel returns to the Stopped state.
     *
     * @var string
     */
    const Starting = 'Starting';

    /**
     * Running: The Channel is capable of processing live streams.
     *
     * @var string
     */
    const Running = 'Running';

    /**
     * Stopping: The channel is being stopped. No updates or streaming is allowed during this state.
     *
     * @var string
     */
    const Stopping = 'Stopping';

    /**
     * Deleting: The Channel is being deleted. No updates or streaming is allowed during this state.
     *
     * @var string
     */
    const Deleting = 'Deleting';
}
