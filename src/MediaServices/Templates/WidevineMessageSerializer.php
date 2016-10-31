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

namespace WindowsAzure\MediaServices\Templates;

/**
 * Represents WidevineMessageSerializer helper class used in media services.
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
class WidevineMessageSerializer
{
    /**
     * Serialize a WidevineMessage as JSON.
     *
     * @param WidevineMessage $template
     *
     * @return string
     */
    public static function serialize($template)
    {
        return json_encode($template);
    }

    /**
     * Deserialize a JSON as a WidevineMessage.
     *
     * @param string $json
     *
     * @return WidevineMessage the message
     */
    public static function deserialize($json)
    {
        $data = json_decode($json);

        $template = new WidevineMessage();
        foreach ($data as $key => $value) {
            if ($key == 'content_key_specs') {
                $specs = [];
                foreach ($value as $child) {
                    $spec = new ContentKeySpecs();
                    foreach ($child as $cKey => $cValue) {
                        if ($cKey == 'required_output_protection') {
                            $rop = new RequiredOutputProtection();
                            if (isset($cValue->hdcp)) {
                                $rop->hdcp = $cValue->hdcp;
                            }
                            $spec->{$cKey} = $rop;
                        } else {
                            $spec->{$cKey} = $cValue;
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
