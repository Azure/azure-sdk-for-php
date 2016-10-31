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
 * The goal state representation.
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
class ChunkedGoalStateDeserializer implements IGoalStateDeserializer
{
    /**
     * @var XmlGoalStateDeserializer
     */
    private $_deserializer;

    /**
     * @var resource
     */
    private $_inputStream;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->_deserializer = new XmlGoalStateDeserializer();
    }

    /**
     * Initializes the goal state deserializer with the input stream.
     *
     * @param resource $inputStream The input stream
     */
    public function initialize($inputStream)
    {
        $this->_inputStream = $inputStream;
    }

    /**
     * Deserializes a goal state document.
     *
     * @return GoalState
     */
    public function deserialize()
    {
        do {
            $lengthString = stream_get_line($this->_inputStream, 100, "\n");
        } while (
            empty($lengthString) || $lengthString == "\n" || $lengthString == "\r"
        );

        $intLengthString = hexdec(trim($lengthString));

        $chunkData = stream_get_contents($this->_inputStream, $intLengthString);
        $goalState = $this->_deserializer->deserialize($chunkData);

        return $goalState;
    }
}
