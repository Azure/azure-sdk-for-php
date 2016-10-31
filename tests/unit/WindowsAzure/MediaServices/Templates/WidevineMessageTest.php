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

namespace Tests\unit\WindowsAzure\MediaServices\Templates;

use WindowsAzure\MediaServices\Templates\WidevineMessageSerializer;
use WindowsAzure\MediaServices\Templates\WidevineMessage;
use WindowsAzure\MediaServices\Templates\AllowedTrackTypes;
use WindowsAzure\MediaServices\Templates\ContentKeySpecs;
use WindowsAzure\MediaServices\Templates\Hdcp;
use WindowsAzure\MediaServices\Templates\RequiredOutputProtection;

/**
 * Unit Tests for WidevineMessage.
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
class WidevineMessageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \WindowsAzure\MediaServices\Templates\WidevineMessageSerializer::serialize
     * @covers \WindowsAzure\MediaServices\Templates\WidevineMessageSerializer::deserialize
     */
    public function testRoundTrip()
    {
        // Setup
        $expected = new WidevineMessage();
        $expected->allowed_track_types = AllowedTrackTypes::SD_HD;
        $contentKeySpecs = new ContentKeySpecs();
        $contentKeySpecs->required_output_protection = new RequiredOutputProtection();
        $contentKeySpecs->required_output_protection->hdcp = Hdcp::HDCP_NONE;
        $contentKeySpecs->security_level = 1;
        $contentKeySpecs->track_type = 'SD';
        $expected->content_key_specs = [$contentKeySpecs];
        $policyOverrides = new \stdClass();
        $policyOverrides->can_play = true;
        $policyOverrides->can_persist = true;
        $policyOverrides->can_renew = false;
        $expected->policy_overrides = $policyOverrides;

        $json = WidevineMessageSerializer::serialize($expected);

        $actual = WidevineMessageSerializer::deserialize($json);

        $this->assertEqualsWidevineMessage($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\WidevineMessageSerializer::deserialize
     */
    public function testFromJson()
    {
        // Setup
        $expected = new WidevineMessage();
        $expected->allowed_track_types = AllowedTrackTypes::SD_HD;
        $contentKeySpecs = new ContentKeySpecs();
        $contentKeySpecs->required_output_protection = new RequiredOutputProtection();
        $contentKeySpecs->required_output_protection->hdcp = Hdcp::HDCP_NONE;
        $contentKeySpecs->security_level = 1;
        $contentKeySpecs->track_type = 'SD';
        $expected->content_key_specs = [$contentKeySpecs];
        $policyOverrides = new \stdClass();
        $policyOverrides->can_play = true;
        $policyOverrides->can_persist = true;
        $policyOverrides->can_renew = false;
        $expected->policy_overrides = $policyOverrides;

        $json = '{"allowed_track_types":"SD_HD","content_key_specs":[{"track_type":"SD","key_id":null,"security_level":1,"required_output_protection":{"hdcp":"HDCP_NONE"}}],"policy_overrides":{"can_play":true,"can_persist":true,"can_renew":false}}';

        // Test
        $actual = WidevineMessageSerializer::deserialize($json);

        // Assert
        $this->assertEqualsWidevineMessage($expected, $actual);
    }

    /**
     * @covers \WindowsAzure\MediaServices\Templates\WidevineMessageSerializer::serialize
     */
    public function testToJson()
    {
        // Setup
        $template = new WidevineMessage();
        $template->allowed_track_types = AllowedTrackTypes::SD_HD;
        $contentKeySpecs = new ContentKeySpecs();
        $contentKeySpecs->required_output_protection = new RequiredOutputProtection();
        $contentKeySpecs->required_output_protection->hdcp = Hdcp::HDCP_NONE;
        $contentKeySpecs->security_level = 1;
        $contentKeySpecs->track_type = 'SD';
        $template->content_key_specs = [$contentKeySpecs];
        $policyOverrides = new \stdClass();
        $policyOverrides->can_play = true;
        $policyOverrides->can_persist = true;
        $policyOverrides->can_renew = false;
        $template->policy_overrides = $policyOverrides;

        $expected = '{"allowed_track_types":"SD_HD","content_key_specs":[{"track_type":"SD","key_id":null,"security_level":1,"required_output_protection":{"hdcp":"HDCP_NONE"}}],"policy_overrides":{"can_play":true,"can_persist":true,"can_renew":false}}';

        // Test
        $actual = WidevineMessageSerializer::serialize($template);

        // Assert
        $this->assertJsonStringEqualsJsonString($expected, $actual);
    }

    /**
     * Assertion that both Widevine messages are equals.
     *
     * @param WidevineMessage $expected
     * @param WidevineMessage $actual
     */
    public function assertEqualsWidevineMessage($expected, $actual)
    {
        $this->assertEquals($expected->allowed_track_types, $actual->allowed_track_types);
        $this->assertEquals(count($expected->content_key_specs), count($actual->content_key_specs));
        for ($i = 0; $i < count($expected->content_key_specs); ++$i) {
            $expectedCks = $expected->content_key_specs[$i];
            $actualCks = $actual->content_key_specs[$i];
            $this->assertEquals($expectedCks->track_type, $actualCks->track_type);
            $this->assertEquals($expectedCks->key_id, $actualCks->key_id);
            $this->assertEquals($expectedCks->security_level, $actualCks->security_level);
            $this->assertEquals($expectedCks->required_output_protection, $actualCks->required_output_protection);
            if (isset($expectedCks->required_output_protection) &&
                isset($actualCks->required_output_protection)) {
                $this->assertEquals($expectedCks->required_output_protection->hdcp, $actualCks->required_output_protection->hdcp);
            }
        }
        $this->assertEquals($expected->policy_overrides, $actual->policy_overrides);
    }
}
