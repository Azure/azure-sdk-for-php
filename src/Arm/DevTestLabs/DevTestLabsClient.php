<?php

/**
 * Code generated by Microsoft (R) AutoRest Code Generator 0.17.0.0
 * Changes may cause incorrect behavior and will be lost if the code is
 * regenerated.
 *
 * PHP version: 5.5
 *
 * @category    Microsoft
 *
 * @author      Azure PHP SDK <azurephpsdk@microsoft.com>
 * @copyright   2016 Microsoft Corporation
 * @license     https://github.com/Azure/azure-sdk-for-php/blob/arm/LICENSE
 *
 * @link        https://github.com/Azure/azure-sdk-for-php/tree/arm
 *
 * @version     Release: 0.10.0_2016, API Version: 2016-05-15
 */

namespace MicrosoftAzure\Arm\DevTestLabs;

use MicrosoftAzure\Common\Internal\Authentication\OAuthScheme;
use MicrosoftAzure\Common\Internal\Filters\OAuthFilter;
use MicrosoftAzure\Common\Internal\Http\HttpClient;
use MicrosoftAzure\Common\Internal\Resources;
use MicrosoftAzure\Common\Internal\Serialization\JsonSerializer;
use MicrosoftAzure\Common\OAuthServiceClient;
use MicrosoftAzure\Common\RestServiceClient;

/**
 * The DevTest Labs Client.
 */
class DevTestLabsClient extends RestServiceClient
{
    /**
     * Credentials needed for the client to connect to Azure.
     *
     * @var OAuthSettings
     */
    private $_credentials;
    /**
     * Client API version.
     *
     * @var string
     */
    private $_apiVersion;
    /**
     * The subscription ID.
     *
     * @var string
     */
    private $_subscriptionId;
    /**
     * Gets or sets the preferred language for the response.
     *
     * @var string
     */
    private $_acceptLanguage;
    /**
     * Gets or sets the retry timeout in seconds for Long Running Operations.
     * Default value is 30.
     *
     * @var int
     */
    private $_longRunningOperationRetryTimeout;
    /**
     * When set to true a unique x-ms-client-request-id value is generated and
     * included in each request. Default is true.
     *
     * @var bool
     */
    private $_generateClientRequestId;

    /**
     * Method group: LabOperations.
     *
     * @var LabOperations
     */
    private $_labOperations;

    /**
     * Method group: ArtifactSourceOperations.
     *
     * @var ArtifactSourceOperations
     */
    private $_artifactSourceOperations;

    /**
     * Method group: ArtifactOperations.
     *
     * @var ArtifactOperations
     */
    private $_artifactOperations;

    /**
     * Method group: CostOperations.
     *
     * @var CostOperations
     */
    private $_costOperations;

    /**
     * Method group: CustomImageOperations.
     *
     * @var CustomImageOperations
     */
    private $_customImageOperations;

    /**
     * Method group: FormulaOperations.
     *
     * @var FormulaOperations
     */
    private $_formulaOperations;

    /**
     * Method group: GalleryImageOperations.
     *
     * @var GalleryImageOperations
     */
    private $_galleryImageOperations;

    /**
     * Method group: PolicySet.
     *
     * @var PolicySet
     */
    private $_policySet;

    /**
     * Method group: PolicyOperations.
     *
     * @var PolicyOperations
     */
    private $_policyOperations;

    /**
     * Method group: ScheduleOperations.
     *
     * @var ScheduleOperations
     */
    private $_scheduleOperations;

    /**
     * Method group: VirtualMachine.
     *
     * @var VirtualMachine
     */
    private $_virtualMachine;

    /**
     * Method group: VirtualNetworkOperations.
     *
     * @var VirtualNetworkOperations
     */
    private $_virtualNetworkOperations;

    /**
     * Base Url for the API.
     *
     * @var string
     */
    private $_baseUrl = 'https://management.azure.com';

    /**
     * Header filters for http calls.
     *
     * @var array
     */
    private $_filters;

    /**
     * Retry intervals in number of seconds.
     *
     * @var int
     */
    private $_retryInterval;

    /**
     * Constructor for the service client.
     *
     * @param OAuthSettings $oauthSettings OAuth settings for to access the APIs
     */
    public function __construct($oauthSettings)
    {
        $this->_credentials = $oauthSettings;
        parent::__construct(
            $this->_credentials->getOAuthEndpointUri(),
            new JsonSerializer()
        );
        $oauthService = new OAuthServiceClient($this->_credentials);
        $authentification = new OAuthScheme($oauthService);
        $this->_filters = [new OAuthFilter($authentification)];

        $this->_labOperations = new LabOperations($this);
        $this->_artifactSourceOperations = new ArtifactSourceOperations($this);
        $this->_artifactOperations = new ArtifactOperations($this);
        $this->_costOperations = new CostOperations($this);
        $this->_customImageOperations = new CustomImageOperations($this);
        $this->_formulaOperations = new FormulaOperations($this);
        $this->_galleryImageOperations = new GalleryImageOperations($this);
        $this->_policySet = new PolicySet($this);
        $this->_policyOperations = new PolicyOperations($this);
        $this->_scheduleOperations = new ScheduleOperations($this);
        $this->_virtualMachine = new VirtualMachine($this);
        $this->_virtualNetworkOperations = new VirtualNetworkOperations($this);

        $this->setApiVersion('2016-05-15');
        $this->setAcceptLanguage('en-US');
        $this->setLongRunningOperationRetryTimeout(30);
        $this->setGenerateClientRequestId(true);
        $this->setRetryInterval(5);
    }

    /**
     * Gets credentials, Credentials needed for the client to connect to Azure.
     *
     * @return OAuthSettings
     */
    public function getCredentials()
    {
        return $this->_credentials;
    }

    /**
     * Sets credentials, Credentials needed for the client to connect to Azure.
     *
     * @param OAuthSettings $credentials
     *
     * @return none
     */
    private function setCredentials($credentials)
    {
        $this->_credentials = $credentials;
    }

    /**
     * Gets apiVersion, Client API version.
     *
     * @return string
     */
    public function getApiVersion()
    {
        return $this->_apiVersion;
    }

    /**
     * Sets apiVersion, Client API version.
     *
     * @param string $apiVersion
     *
     * @return none
     */
    private function setApiVersion($apiVersion)
    {
        $this->_apiVersion = $apiVersion;
    }

    /**
     * Gets subscriptionId, The subscription ID.
     *
     * @return string
     */
    public function getSubscriptionId()
    {
        return $this->_subscriptionId;
    }

    /**
     * Sets subscriptionId, The subscription ID.
     *
     * @param string $subscriptionId
     *
     * @return none
     */
    public function setSubscriptionId($subscriptionId)
    {
        $this->_subscriptionId = $subscriptionId;
    }

    /**
     * Gets acceptLanguage, the preferred language for the response.
     *
     * @return string
     */
    public function getAcceptLanguage()
    {
        return $this->_acceptLanguage;
    }

    /**
     * Sets acceptLanguage, the preferred language for the response.
     *
     * @param string $acceptLanguage
     *
     * @return none
     */
    public function setAcceptLanguage($acceptLanguage)
    {
        $this->_acceptLanguage = $acceptLanguage;
    }

    /**
     * Gets longRunningOperationRetryTimeout, the retry timeout in seconds for
     * Long Running Operations. Default value is 30.
     *
     * @return int
     */
    public function getLongRunningOperationRetryTimeout()
    {
        return $this->_longRunningOperationRetryTimeout;
    }

    /**
     * Sets longRunningOperationRetryTimeout, the retry timeout in seconds for
     * Long Running Operations. Default value is 30.
     *
     * @param int $longRunningOperationRetryTimeout
     *
     * @return none
     */
    public function setLongRunningOperationRetryTimeout($longRunningOperationRetryTimeout)
    {
        $this->_longRunningOperationRetryTimeout = $longRunningOperationRetryTimeout;
        set_time_limit($longRunningOperationRetryTimeout);
    }

    /**
     * Gets generateClientRequestId, When set to true a unique
     * x-ms-client-request-id value is generated and included in each
     * request. Default is true.
     *
     * @return bool
     */
    public function getGenerateClientRequestId()
    {
        return $this->_generateClientRequestId;
    }

    /**
     * Sets generateClientRequestId, When set to true a unique
     * x-ms-client-request-id value is generated and included in each
     * request. Default is true.
     *
     * @param bool $generateClientRequestId
     *
     * @return none
     */
    public function setGenerateClientRequestId($generateClientRequestId)
    {
        $this->_generateClientRequestId = $generateClientRequestId;
    }

    /**
     * Gets method group LabOperations.
     *
     * @return LabOperations
     */
    public function getLabOperations()
    {
        return $this->_labOperations;
    }

    /**
     * Gets method group ArtifactSourceOperations.
     *
     * @return ArtifactSourceOperations
     */
    public function getArtifactSourceOperations()
    {
        return $this->_artifactSourceOperations;
    }

    /**
     * Gets method group ArtifactOperations.
     *
     * @return ArtifactOperations
     */
    public function getArtifactOperations()
    {
        return $this->_artifactOperations;
    }

    /**
     * Gets method group CostOperations.
     *
     * @return CostOperations
     */
    public function getCostOperations()
    {
        return $this->_costOperations;
    }

    /**
     * Gets method group CustomImageOperations.
     *
     * @return CustomImageOperations
     */
    public function getCustomImageOperations()
    {
        return $this->_customImageOperations;
    }

    /**
     * Gets method group FormulaOperations.
     *
     * @return FormulaOperations
     */
    public function getFormulaOperations()
    {
        return $this->_formulaOperations;
    }

    /**
     * Gets method group GalleryImageOperations.
     *
     * @return GalleryImageOperations
     */
    public function getGalleryImageOperations()
    {
        return $this->_galleryImageOperations;
    }

    /**
     * Gets method group PolicySet.
     *
     * @return PolicySet
     */
    public function getPolicySet()
    {
        return $this->_policySet;
    }

    /**
     * Gets method group PolicyOperations.
     *
     * @return PolicyOperations
     */
    public function getPolicyOperations()
    {
        return $this->_policyOperations;
    }

    /**
     * Gets method group ScheduleOperations.
     *
     * @return ScheduleOperations
     */
    public function getScheduleOperations()
    {
        return $this->_scheduleOperations;
    }

    /**
     * Gets method group VirtualMachine.
     *
     * @return VirtualMachine
     */
    public function getVirtualMachine()
    {
        return $this->_virtualMachine;
    }

    /**
     * Gets method group VirtualNetworkOperations.
     *
     * @return VirtualNetworkOperations
     */
    public function getVirtualNetworkOperations()
    {
        return $this->_virtualNetworkOperations;
    }

    /**
     * Gets filter for http requests.
     *
     * @return array, OAuth filters
     */
    public function getFilters()
    {
        return $this->_filters;
    }

    /**
     * Gets the data serializer.
     *
     * @return JsonSerializer, the data serializer
     */
    public function getDataSerializer()
    {
        return $this->dataSerializer;
    }

    /**
     * Gets host full Url for a relative path.
     *
     * @param string $path
     *
     * @return string, full Url
     */
    public function getUrl($path)
    {
        return $this->_baseUrl.$path;
    }

    /**
     * Gets retry intervals in number of seconds.
     *
     * @return int, number of seconds
     */
    public function getRetryInterval()
    {
        return $this->_retryInterval;
    }

    /**
     * Sets retry intervals in number of seconds.
     *
     * @param int $retryInterval
     *
     * @return none
     */
    public function setRetryInterval($retryInterval)
    {
        $this->_retryInterval = $retryInterval;
    }

    /**
     * Poll for the async status of a request.
     *
     * @param string $path
     * @param string $requestId from x-ms-request-id in the header
     *
     * @return string, status code, 200 or 202
     */
    public function pollAsyncOperation($path, $requestId)
    {
        $queryParams = [Resources::API_VERSION => '2016-05-15', 'monitor' => 'true'];
        $method = Resources::HTTP_GET;
        $statusCodes = [Resources::STATUS_OK, Resources::STATUS_ACCEPTED];

        $headers = [Resources::X_MS_REQUEST_ID => $requestId];
        $body = '';

        $response = HttpClient::send(
            $method,
            $headers,
            $queryParams,
            [],
            $path,
            $statusCodes,
            $body,
            $this->getFilters()
        );

        return $response->getStatusCode();
    }

    /**
     * Wait for the async request to finish.
     *
     * @param Response $response
     *
     * @return string, status code
     */
    public function awaitAsync($response)
    {
        $status = $response->getStatusCode();
        $headers = $response->getHeaders();

        if (array_key_exists(Resources::XTAG_LOCATION, $headers) && array_key_exists(Resources::X_MS_REQUEST_ID, $headers)) {
            $locations = $headers[Resources::XTAG_LOCATION];
            $requestIds = $headers[Resources::X_MS_REQUEST_ID];

            while ($status == Resources::STATUS_ACCEPTED) {
                sleep($this->getRetryInterval());
                $status = $this->pollAsyncOperation($locations[0], $requestIds[0]);
                echo '.';
            }
        }

        return $status;
    }
}
