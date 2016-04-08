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
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */

namespace WindowsAzure\MediaServices\Templates;
use WindowsAzure\Common\Internal\Validate;
use WindowsAzure\Common\Internal\Utilities;
use WindowsAzure\Common\Internal\Resources;
use WindowsAzure\MediaServices\Templates\WidevineMessage;

/**
 * Represents WidevineMessageSerializer helper class used in media services
 *
 * @category  Microsoft
 * @package   WindowsAzure\MediaServices\Models
 * @author    Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright Microsoft Corporation
 * @license   http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @version   Release: 0.4.2_2016-04
 * @link      https://github.com/windowsazure/azure-sdk-for-php
 */
class WidevineMessageSerializer
{

    /**
     * Serialize a WidevineMessage as JSON
     * @param WidevineMessage $template 
     * @return string
     */
    public static function serialize($template) {
        Validate::isA($template, 'WindowsAzure\MediaServices\Templates\WidevineMessage', 'template');

        return json_encode($template);
    }

    /**
     * Deserialize a JSON as a WidevineMessage
     * @param string $json 
     * @return WidevineMessage the message.
     */
    public static function deserialize($json) {
        $data = json_decode($json);

        $template = new WidevineMessage();
        foreach ($data as $key => $value) {
            if ($key == 'content_key_specs') {
                $specs = array();
                foreach($value as $child) {
                    $spec = new ContentKeySpecs();
                    foreach ($child as $ckey => $cvalue) {
                        if ($ckey == 'required_output_protection') {
                            $rop = new RequiredOutputProtection();
                            if (isset($cvalue->hdcp)) {
                                $rop->hdcp = $cvalue->hdcp;
                            }
                            $spec->{$ckey} = $rop;  
                        } else {
                            $spec->{$ckey} = $cvalue;  
                        }
                    }
                    $specs[] = $spec;
                }
                $template->content_key_specs = $specs;
            } else {
                $template->{$key} = $value;        
            }
        }

        return $template;
    }
   
}



