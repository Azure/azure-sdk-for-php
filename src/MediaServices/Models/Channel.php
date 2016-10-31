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

use WindowsAzure\Common\Internal\Validate;

/**
 * Represents Channel object used in media services.
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
class Channel
{
    /**
     * Channel id.
     *
     * @var string
     */
    private $_id;

    /**
     * Channel Name.
     *
     * @var string
     */
    private $_name;

    /**
     * Created.
     *
     * @var \DateTime
     */
    private $_created;

    /**
     * Channel Description.
     *
     * @var string
     */
    private $_description;

    /**
     * Channel LastModified DateTime.
     *
     * @var \DateTime
     */
    private $_lastModified;

    /**
     * Channel State.
     *
     * @var string
     */
    private $_state;

    /**
     * Channel Input.
     *
     * @var ChannelInput
     */
    private $_input;

    /**
     * Channel Output.
     *
     * @var ChannelOutput
     */
    private $_output;

    /**
     * Channel Preview.
     *
     * @var ChannelPreview
     */
    private $_preview;

    /**
     * Channel CrossSiteAccessPolicies.
     *
     * @var CrossSiteAccessPolicies
     */
    private $_crossSiteAccessPolicies;

    /**
     * Channel EncodingType.
     *
     * @var string
     */
    private $_encodingType;

    /**
     * Channel Encoding.
     *
     * @var ChannelEncoding
     */
    private $_encoding;

    /**
     * Channel Slate.
     *
     * @var ChannelSlate
     */
    private $_slate;

    /**
     * Create Channel from array.
     *
     * @param array $options Array containing values for object properties
     *
     * @return Channel
     */
    public static function createFromOptions($options)
    {
        $operation = new self();
        $operation->fromArray($options);

        return $operation;
    }

    /**
     * Create Channel.
     */
    public function __construct()
    {
    }

    /**
     * Fill Channel from array.
     *
     * @param array $options Array containing values for object properties
     */
    public function fromArray($options)
    {
        if (isset($options['Id'])) {
            Validate::isString($options['Id'], 'options[Id]');
            $this->_id = $options['Id'];
        }

        if (isset($options['Name'])) {
            Validate::isString($options['Name'], 'options[Name]');
            $this->_name = $options['Name'];
        }

        if (isset($options['Created'])) {
            Validate::isDateString($options['Created'], 'options[Created]');
            $this->_created = new \DateTime($options['Created']);
        }

        if (isset($options['Description'])) {
            Validate::isString($options['Description'], 'options[Description]');
            $this->_description = $options['Description'];
        }

        if (isset($options['LastModified'])) {
            Validate::isDateString($options['LastModified'], 'options[LastModified]');
            $this->_lastModified = new \DateTime($options['LastModified']);
        }

        if (isset($options['State'])) {
            Validate::isString($options['State'], 'options[State]');
            $this->_state = $options['State'];
        }

        if (!empty($options['Input'])) {
            Validate::isArray($options['Input'], 'options[Input]');
            $this->_input = ChannelInput::createFromOptions($options['Input']);
        }

        if (!empty($options['Output'])) {
            Validate::isArray($options['Output'], 'options[Output]');
            $this->_output = ChannelOutput::createFromOptions($options['Output']);
        }

        if (!empty($options['Preview'])) {
            Validate::isArray($options['Preview'], 'options[Preview]');
            $this->_preview = ChannelPreview::createFromOptions($options['Preview']);
        }

        if (!empty($options['CrossSiteAccessPolicies'])) {
            Validate::isArray($options['CrossSiteAccessPolicies'], 'options[CrossSiteAccessPolicies]');
            $this->_crossSiteAccessPolicies = CrossSiteAccessPolicies::createFromOptions(
                $options['CrossSiteAccessPolicies']
            );
        }

        if (isset($options['EncodingType'])) {
            Validate::isString($options['EncodingType'], 'options[EncodingType]');
            $this->_encodingType = $options['EncodingType'];
        }

        if (!empty($options['Encoding'])) {
            Validate::isArray($options['Encoding'], 'options[Encoding]');
            $this->_encoding = ChannelEncoding::createFromOptions($options['Encoding']);
        }

        if (!empty($options['Slate'])) {
            Validate::isArray($options['Slate'], 'options[Slate]');
            $this->_slate = ChannelSlate::createFromOptions($options['Slate']);
        }
    }

    /**
     * Get the channel identifier.
     *
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * Set channel identifier.
     *
     * @param string $value Operation id
     */
    public function setId($value)
    {
        $this->_id = $value;
    }

    /**
     * Get channel Name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * Set channel Name.
     *
     * @param string $value Description
     */
    public function setName($value)
    {
        $this->_name = $value;
    }

    /**
     * Get channel creation date.
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * Get channel Description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * Set channel Description.
     *
     * @param string $value Description
     */
    public function setDescription($value)
    {
        $this->_description = $value;
    }

    /**
     * Get channel EncodingType.
     *
     * @return string
     */
    public function getEncodingType()
    {
        return $this->_encodingType;
    }

    /**
     * Set channel EncodingType.
     *
     * @param string $value Encoding type
     */
    public function setEncodingType($value)
    {
        $this->_encodingType = $value;
    }

    /**
     * Get channel last modification date.
     *
     * @return \DateTime
     */
    public function getLastModified()
    {
        return $this->_lastModified;
    }

    /**
     * Get channel State.
     *
     * @return string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * Get channel Input.
     *
     * @return ChannelInput
     */
    public function getInput()
    {
        return $this->_input;
    }

    /**
     * Set channel Input.
     *
     * @param ChannelInput $value Input
     */
    public function setInput($value)
    {
        $this->_input = $value;
    }

    /**
     * Get channel Output.
     *
     * @return ChannelOutput
     */
    public function getOutput()
    {
        return $this->_output;
    }

    /**
     * Set channel Output.
     *
     * @param ChannelOutput $value Output
     */
    public function setOutput(ChannelOutput $value)
    {
        $this->_output = $value;
    }

    /**
     * Get channel Preview.
     *
     * @return ChannelPreview
     */
    public function getPreview()
    {
        return $this->_preview;
    }

    /**
     * Set channel Preview.
     *
     * @param ChannelPreview $value Preview
     */
    public function setPreview(ChannelPreview $value)
    {
        $this->_preview = $value;
    }

    /**
     * Get channel CrossSiteAccessPolicies.
     *
     * @return CrossSiteAccessPolicies
     */
    public function getCrossSiteAccessPolicies()
    {
        return $this->_crossSiteAccessPolicies;
    }

    /**
     * Set channel CrossSiteAccessPolicies.
     *
     * @param CrossSiteAccessPolicies $value CrossSiteAccessPolicies
     */
    public function setCrossSiteAccessPolicies(CrossSiteAccessPolicies $value)
    {
        $this->_crossSiteAccessPolicies = $value;
    }

    /**
     * Get channel Encoding.
     *
     * @return ChannelEncoding
     */
    public function getEncoding()
    {
        return $this->_encoding;
    }

    /**
     * Set channel Encoding.
     *
     * @param ChannelEncoding $value Encoding
     */
    public function setEncoding(ChannelEncoding $value)
    {
        $this->_encoding = $value;
    }

    /**
     * Get channel Slate.
     *
     * @return ChannelSlate
     */
    public function getSlate()
    {
        return $this->_slate;
    }

    /**
     * Set channel Slate.
     *
     * @param ChannelSlate $value Slate
     */
    public function setSlate(ChannelSlate $value)
    {
        $this->_slate = $value;
    }
}
