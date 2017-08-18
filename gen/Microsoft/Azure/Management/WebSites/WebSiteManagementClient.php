<?php
namespace Microsoft\Azure\Management\WebSites;
final class WebSiteManagementClient
{
    /**
     * @param \Microsoft\Rest\RunTimeInterface $_runTime
     * @param string $subscriptionId
     */
    public function __construct(
        \Microsoft\Rest\RunTimeInterface $_runTime,
        $subscriptionId
    )
    {
        $_client = $_runTime->createClientFromData(
            self::_SWAGGER_OBJECT_DATA,
            ['subscriptionId' => $subscriptionId]
        );
        $this->_AppServiceCertificateOrders_group = new \Microsoft\Azure\Management\WebSites\AppServiceCertificateOrders($_client);
        $this->_Domains_group = new \Microsoft\Azure\Management\WebSites\Domains($_client);
        $this->_TopLevelDomains_group = new \Microsoft\Azure\Management\WebSites\TopLevelDomains($_client);
        $this->_Certificates_group = new \Microsoft\Azure\Management\WebSites\Certificates($_client);
        $this->_DeletedWebApps_group = new \Microsoft\Azure\Management\WebSites\DeletedWebApps($_client);
        $this->_Provider_group = new \Microsoft\Azure\Management\WebSites\Provider($_client);
        $this->_Recommendations_group = new \Microsoft\Azure\Management\WebSites\Recommendations($_client);
        $this->_WebApps_group = new \Microsoft\Azure\Management\WebSites\WebApps($_client);
        $this->_AppServiceEnvironments_group = new \Microsoft\Azure\Management\WebSites\AppServiceEnvironments($_client);
        $this->_AppServicePlans_group = new \Microsoft\Azure\Management\WebSites\AppServicePlans($_client);
        $this->_GetPublishingUser_operation = $_client->createOperation('GetPublishingUser');
        $this->_UpdatePublishingUser_operation = $_client->createOperation('UpdatePublishingUser');
        $this->_ListSourceControls_operation = $_client->createOperation('ListSourceControls');
        $this->_UpdateSourceControl_operation = $_client->createOperation('UpdateSourceControl');
        $this->_CheckNameAvailability_operation = $_client->createOperation('CheckNameAvailability');
        $this->_ListGeoRegions_operation = $_client->createOperation('ListGeoRegions');
        $this->_ListPremierAddOnOffers_operation = $_client->createOperation('ListPremierAddOnOffers');
        $this->_ListSkus_operation = $_client->createOperation('ListSkus');
        $this->_Move_operation = $_client->createOperation('Move');
        $this->_Validate_operation = $_client->createOperation('Validate');
        $this->_ValidateMove_operation = $_client->createOperation('ValidateMove');
    }
    /**
     * @return \Microsoft\Azure\Management\WebSites\AppServiceCertificateOrders
     */
    public function getAppServiceCertificateOrders()
    {
        return $this->_AppServiceCertificateOrders_group;
    }
    /**
     * @return \Microsoft\Azure\Management\WebSites\Domains
     */
    public function getDomains()
    {
        return $this->_Domains_group;
    }
    /**
     * @return \Microsoft\Azure\Management\WebSites\TopLevelDomains
     */
    public function getTopLevelDomains()
    {
        return $this->_TopLevelDomains_group;
    }
    /**
     * @return \Microsoft\Azure\Management\WebSites\Certificates
     */
    public function getCertificates()
    {
        return $this->_Certificates_group;
    }
    /**
     * @return \Microsoft\Azure\Management\WebSites\DeletedWebApps
     */
    public function getDeletedWebApps()
    {
        return $this->_DeletedWebApps_group;
    }
    /**
     * @return \Microsoft\Azure\Management\WebSites\Provider
     */
    public function getProvider()
    {
        return $this->_Provider_group;
    }
    /**
     * @return \Microsoft\Azure\Management\WebSites\Recommendations
     */
    public function getRecommendations()
    {
        return $this->_Recommendations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\WebSites\WebApps
     */
    public function getWebApps()
    {
        return $this->_WebApps_group;
    }
    /**
     * @return \Microsoft\Azure\Management\WebSites\AppServiceEnvironments
     */
    public function getAppServiceEnvironments()
    {
        return $this->_AppServiceEnvironments_group;
    }
    /**
     * @return \Microsoft\Azure\Management\WebSites\AppServicePlans
     */
    public function getAppServicePlans()
    {
        return $this->_AppServicePlans_group;
    }
    /**
     * Gets publishing user
     * @return array
     */
    public function getPublishingUser()
    {
        return $this->_GetPublishingUser_operation->call([]);
    }
    /**
     * Updates publishing user
     * @param array $userDetails
     * @return array
     */
    public function updatePublishingUser(array $userDetails)
    {
        return $this->_UpdatePublishingUser_operation->call(['userDetails' => $userDetails]);
    }
    /**
     * Gets the source controls available for Azure websites.
     * @return array
     */
    public function listSourceControls()
    {
        return $this->_ListSourceControls_operation->call([]);
    }
    /**
     * Updates source control token
     * @param string $sourceControlType
     * @param array $requestMessage
     * @return array
     */
    public function updateSourceControl(
        $sourceControlType,
        array $requestMessage
    )
    {
        return $this->_UpdateSourceControl_operation->call([
            'sourceControlType' => $sourceControlType,
            'requestMessage' => $requestMessage
        ]);
    }
    /**
     * Check if a resource name is available.
     * @param array $request
     * @return array
     */
    public function checkNameAvailability(array $request)
    {
        return $this->_CheckNameAvailability_operation->call(['request' => $request]);
    }
    /**
     * Get a list of available geographical regions.
     * @param string|null $sku
     * @param boolean|null $linuxWorkersEnabled
     * @return array
     */
    public function listGeoRegions(
        $sku = null,
        $linuxWorkersEnabled = null
    )
    {
        return $this->_ListGeoRegions_operation->call([
            'sku' => $sku,
            'linuxWorkersEnabled' => $linuxWorkersEnabled
        ]);
    }
    /**
     * List all premier add-on offers.
     * @return array
     */
    public function listPremierAddOnOffers()
    {
        return $this->_ListPremierAddOnOffers_operation->call([]);
    }
    /**
     * List all SKUs.
     * @return array
     */
    public function listSkus()
    {
        return $this->_ListSkus_operation->call([]);
    }
    /**
     * Move resources between resource groups.
     * @param string $resourceGroupName
     * @param array $moveResourceEnvelope
     */
    public function move(
        $resourceGroupName,
        array $moveResourceEnvelope
    )
    {
        return $this->_Move_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'moveResourceEnvelope' => $moveResourceEnvelope
        ]);
    }
    /**
     * Validate if a resource can be created.
     * @param string $resourceGroupName
     * @param array $validateRequest
     * @return array
     */
    public function validate(
        $resourceGroupName,
        array $validateRequest
    )
    {
        return $this->_Validate_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'validateRequest' => $validateRequest
        ]);
    }
    /**
     * Validate whether a resource can be moved.
     * @param string $resourceGroupName
     * @param array $moveResourceEnvelope
     */
    public function validateMove(
        $resourceGroupName,
        array $moveResourceEnvelope
    )
    {
        return $this->_ValidateMove_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'moveResourceEnvelope' => $moveResourceEnvelope
        ]);
    }
    /**
     * @var \Microsoft\Azure\Management\WebSites\AppServiceCertificateOrders
     */
    private $_AppServiceCertificateOrders_group;
    /**
     * @var \Microsoft\Azure\Management\WebSites\Domains
     */
    private $_Domains_group;
    /**
     * @var \Microsoft\Azure\Management\WebSites\TopLevelDomains
     */
    private $_TopLevelDomains_group;
    /**
     * @var \Microsoft\Azure\Management\WebSites\Certificates
     */
    private $_Certificates_group;
    /**
     * @var \Microsoft\Azure\Management\WebSites\DeletedWebApps
     */
    private $_DeletedWebApps_group;
    /**
     * @var \Microsoft\Azure\Management\WebSites\Provider
     */
    private $_Provider_group;
    /**
     * @var \Microsoft\Azure\Management\WebSites\Recommendations
     */
    private $_Recommendations_group;
    /**
     * @var \Microsoft\Azure\Management\WebSites\WebApps
     */
    private $_WebApps_group;
    /**
     * @var \Microsoft\Azure\Management\WebSites\AppServiceEnvironments
     */
    private $_AppServiceEnvironments_group;
    /**
     * @var \Microsoft\Azure\Management\WebSites\AppServicePlans
     */
    private $_AppServicePlans_group;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetPublishingUser_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdatePublishingUser_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSourceControls_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateSourceControl_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckNameAvailability_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListGeoRegions_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListPremierAddOnOffers_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSkus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Move_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Validate_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ValidateMove_operation;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/providers/Microsoft.CertificateRegistration/certificateOrders' => ['get' => [
                'operationId' => 'AppServiceCertificateOrders_List',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppServiceCertificateOrderCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.CertificateRegistration/validateCertificateRegistrationInformation' => ['post' => [
                'operationId' => 'AppServiceCertificateOrders_ValidatePurchaseInformation',
                'parameters' => [
                    [
                        'name' => 'appServiceCertificateOrder',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/AppServiceCertificateOrder']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CertificateRegistration/certificateOrders' => ['get' => [
                'operationId' => 'AppServiceCertificateOrders_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppServiceCertificateOrderCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CertificateRegistration/certificateOrders/{certificateOrderName}' => [
                'get' => [
                    'operationId' => 'AppServiceCertificateOrders_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateOrderName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppServiceCertificateOrder']]]
                ],
                'put' => [
                    'operationId' => 'AppServiceCertificateOrders_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateOrderName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateDistinguishedName',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AppServiceCertificateOrder']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/AppServiceCertificateOrder']],
                        '201' => ['schema' => ['$ref' => '#/definitions/AppServiceCertificateOrder']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'AppServiceCertificateOrders_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateOrderName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CertificateRegistration/certificateOrders/{certificateOrderName}/certificates' => ['get' => [
                'operationId' => 'AppServiceCertificateOrders_ListCertificates',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'certificateOrderName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppServiceCertificateCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CertificateRegistration/certificateOrders/{certificateOrderName}/certificates/{name}' => [
                'get' => [
                    'operationId' => 'AppServiceCertificateOrders_GetCertificate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateOrderName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppServiceCertificateResource']]]
                ],
                'put' => [
                    'operationId' => 'AppServiceCertificateOrders_CreateOrUpdateCertificate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateOrderName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'keyVaultCertificate',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AppServiceCertificateResource']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/AppServiceCertificateResource']],
                        '201' => ['schema' => ['$ref' => '#/definitions/AppServiceCertificateResource']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'AppServiceCertificateOrders_DeleteCertificate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateOrderName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CertificateRegistration/certificateOrders/{certificateOrderName}/reissue' => ['post' => [
                'operationId' => 'AppServiceCertificateOrders_Reissue',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'certificateOrderName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'reissueCertificateOrderRequest',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ReissueCertificateOrderRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CertificateRegistration/certificateOrders/{certificateOrderName}/renew' => ['post' => [
                'operationId' => 'AppServiceCertificateOrders_Renew',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'certificateOrderName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'renewCertificateOrderRequest',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/RenewCertificateOrderRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CertificateRegistration/certificateOrders/{certificateOrderName}/resendEmail' => ['post' => [
                'operationId' => 'AppServiceCertificateOrders_ResendEmail',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'certificateOrderName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CertificateRegistration/certificateOrders/{certificateOrderName}/resendRequestEmails' => ['post' => [
                'operationId' => 'AppServiceCertificateOrders_ResendRequestEmails',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'certificateOrderName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'nameIdentifier',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/NameIdentifier']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CertificateRegistration/certificateOrders/{certificateOrderName}/retrieveSiteSeal' => ['post' => [
                'operationId' => 'AppServiceCertificateOrders_RetrieveSiteSeal',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'certificateOrderName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'siteSealRequest',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/SiteSealRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteSeal']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CertificateRegistration/certificateOrders/{certificateOrderName}/verifyDomainOwnership' => ['post' => [
                'operationId' => 'AppServiceCertificateOrders_VerifyDomainOwnership',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'certificateOrderName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CertificateRegistration/certificateOrders/{name}/retrieveCertificateActions' => ['post' => [
                'operationId' => 'AppServiceCertificateOrders_RetrieveCertificateActions',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/CertificateOrderAction']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.CertificateRegistration/certificateOrders/{name}/retrieveEmailHistory' => ['post' => [
                'operationId' => 'AppServiceCertificateOrders_RetrieveCertificateEmailHistory',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/CertificateEmail']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.DomainRegistration/checkDomainAvailability' => ['post' => [
                'operationId' => 'Domains_CheckAvailability',
                'parameters' => [
                    [
                        'name' => 'identifier',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/NameIdentifier']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DomainAvailablilityCheckResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.DomainRegistration/domains' => ['get' => [
                'operationId' => 'Domains_List',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DomainCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.DomainRegistration/generateSsoRequest' => ['post' => [
                'operationId' => 'Domains_GetControlCenterSsoRequest',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DomainControlCenterSsoRequest']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.DomainRegistration/listDomainRecommendations' => ['post' => [
                'operationId' => 'Domains_ListRecommendations',
                'parameters' => [
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/DomainRecommendationSearchParameters']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NameIdentifierCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DomainRegistration/domains' => ['get' => [
                'operationId' => 'Domains_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DomainCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DomainRegistration/domains/{domainName}' => [
                'get' => [
                    'operationId' => 'Domains_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Domain']]]
                ],
                'put' => [
                    'operationId' => 'Domains_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domain',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Domain']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-01']
                        ]
                    ],
                    'responses' => [
                        '202' => ['schema' => ['$ref' => '#/definitions/Domain']],
                        '200' => ['schema' => ['$ref' => '#/definitions/Domain']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Domains_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'forceHardDeleteDomain',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DomainRegistration/domains/{domainName}/domainOwnershipIdentifiers' => ['get' => [
                'operationId' => 'Domains_ListOwnershipIdentifiers',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'domainName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DomainOwnershipIdentifierCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.DomainRegistration/domains/{domainName}/domainOwnershipIdentifiers/{name}' => [
                'get' => [
                    'operationId' => 'Domains_GetOwnershipIdentifier',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DomainOwnershipIdentifier']]]
                ],
                'put' => [
                    'operationId' => 'Domains_CreateOrUpdateOwnershipIdentifier',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainOwnershipIdentifier',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/DomainOwnershipIdentifier']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DomainOwnershipIdentifier']]]
                ],
                'delete' => [
                    'operationId' => 'Domains_DeleteOwnershipIdentifier',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'Domains_UpdateOwnershipIdentifier',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainOwnershipIdentifier',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/DomainOwnershipIdentifier']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DomainOwnershipIdentifier']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.DomainRegistration/topLevelDomains' => ['get' => [
                'operationId' => 'TopLevelDomains_List',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TopLevelDomainCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.DomainRegistration/topLevelDomains/{name}' => ['get' => [
                'operationId' => 'TopLevelDomains_Get',
                'parameters' => [
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TopLevelDomain']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.DomainRegistration/topLevelDomains/{name}/listAgreements' => ['post' => [
                'operationId' => 'TopLevelDomains_ListAgreements',
                'parameters' => [
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'agreementOption',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/TopLevelDomainAgreementOption']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TldLegalAgreementCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Web/certificates' => ['get' => [
                'operationId' => 'Certificates_List',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CertificateCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/certificates' => ['get' => [
                'operationId' => 'Certificates_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CertificateCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/certificates/{name}' => [
                'get' => [
                    'operationId' => 'Certificates_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Certificate']]]
                ],
                'put' => [
                    'operationId' => 'Certificates_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Certificate']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Certificate']]]
                ],
                'delete' => [
                    'operationId' => 'Certificates_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'Certificates_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Certificate']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Certificate']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Web/deletedSites' => ['post' => [
                'operationId' => 'DeletedWebApps_List',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeletedWebAppCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/deletedSites' => ['get' => [
                'operationId' => 'DeletedWebApps_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeletedWebAppCollection']]]
            ]],
            '/providers/Microsoft.Web/availableStacks' => ['get' => [
                'operationId' => 'Provider_GetAvailableStacks',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2016-03-01']
                ]],
                'responses' => ['200' => ['schema' => ['type' => 'object']]]
            ]],
            '/providers/Microsoft.Web/operations' => ['get' => [
                'operationId' => 'Provider_ListOperations',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2016-03-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CsmOperationCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Web/availableStacks' => ['get' => [
                'operationId' => 'Provider_GetAvailableStacksOnPrem',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'object']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Web/recommendations' => ['get' => [
                'operationId' => 'Recommendations_List',
                'parameters' => [
                    [
                        'name' => 'featured',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Recommendation']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Web/recommendations/reset' => ['post' => [
                'operationId' => 'Recommendations_ResetAllFilters',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{siteName}/recommendationHistory' => ['get' => [
                'operationId' => 'Recommendations_ListHistoryForWebApp',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'siteName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Recommendation']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{siteName}/recommendations' => ['get' => [
                'operationId' => 'Recommendations_ListRecommendedRulesForWebApp',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'siteName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'featured',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Recommendation']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{siteName}/recommendations/disable' => ['post' => [
                'operationId' => 'Recommendations_DisableAllForWebApp',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'siteName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{siteName}/recommendations/reset' => ['post' => [
                'operationId' => 'Recommendations_ResetAllFiltersForWebApp',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'siteName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{siteName}/recommendations/{name}' => ['get' => [
                'operationId' => 'Recommendations_GetRuleDetailsByWebApp',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'siteName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'updateSeen',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecommendationRule']]]
            ]],
            '/providers/Microsoft.Web/publishingUsers/web' => [
                'get' => [
                    'operationId' => 'GetPublishingUser',
                    'parameters' => [[
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/User']]]
                ],
                'put' => [
                    'operationId' => 'UpdatePublishingUser',
                    'parameters' => [
                        [
                            'name' => 'userDetails',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/User']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/User']]]
                ]
            ],
            '/providers/Microsoft.Web/sourcecontrols' => ['get' => [
                'operationId' => 'ListSourceControls',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2016-03-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SourceControlCollection']]]
            ]],
            '/providers/Microsoft.Web/sourcecontrols/{sourceControlType}' => ['put' => [
                'operationId' => 'UpdateSourceControl',
                'parameters' => [
                    [
                        'name' => 'sourceControlType',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'requestMessage',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/SourceControl']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SourceControl']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Web/checknameavailability' => ['post' => [
                'operationId' => 'CheckNameAvailability',
                'parameters' => [
                    [
                        'name' => 'request',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ResourceNameAvailabilityRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceNameAvailability']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Web/geoRegions' => ['get' => [
                'operationId' => 'ListGeoRegions',
                'parameters' => [
                    [
                        'name' => 'sku',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string',
                        'enum' => [
                            'Free',
                            'Shared',
                            'Basic',
                            'Standard',
                            'Premium',
                            'Dynamic',
                            'Isolated'
                        ]
                    ],
                    [
                        'name' => 'linuxWorkersEnabled',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GeoRegionCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Web/premieraddonoffers' => ['get' => [
                'operationId' => 'ListPremierAddOnOffers',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PremierAddOnOfferCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Web/skus' => ['get' => [
                'operationId' => 'ListSkus',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SkuInfos']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/moveResources' => ['post' => [
                'operationId' => 'Move',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'moveResourceEnvelope',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CsmMoveResourceEnvelope']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/validate' => ['post' => [
                'operationId' => 'Validate',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'validateRequest',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ValidateRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ValidateResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/validateMoveResources' => ['post' => [
                'operationId' => 'ValidateMove',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'moveResourceEnvelope',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CsmMoveResourceEnvelope']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Web/sites' => ['get' => [
                'operationId' => 'WebApps_List',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WebAppCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites' => ['get' => [
                'operationId' => 'WebApps_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'includeSlots',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WebAppCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}' => [
                'get' => [
                    'operationId' => 'WebApps_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Site']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'siteEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Site']
                        ],
                        [
                            'name' => 'skipDnsRegistration',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'skipCustomDomainVerification',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'forceDnsRegistration',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'ttlInSeconds',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Site']],
                        '202' => ['schema' => ['$ref' => '#/definitions/Site']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'WebApps_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'deleteMetrics',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'deleteEmptyServerFarm',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'skipDnsRegistration',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '404' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/analyzeCustomHostname' => ['get' => [
                'operationId' => 'WebApps_AnalyzeCustomHostname',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hostName',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CustomHostnameAnalysisResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/applySlotConfig' => ['post' => [
                'operationId' => 'WebApps_ApplySlotConfigToProduction',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slotSwapEntity',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CsmSlotEntity']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/backup' => ['post' => [
                'operationId' => 'WebApps_Backup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'request',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/BackupRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupItem']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/backups' => ['get' => [
                'operationId' => 'WebApps_ListBackups',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupItemCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/backups/discover' => ['put' => [
                'operationId' => 'WebApps_DiscoverRestore',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'request',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/RestoreRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RestoreRequest']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/backups/{backupId}' => [
                'get' => [
                    'operationId' => 'WebApps_GetBackupStatus',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupItem']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteBackup',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '404' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/backups/{backupId}/list' => ['post' => [
                'operationId' => 'WebApps_ListBackupStatusSecrets',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'backupId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'request',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/BackupRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupItem']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/backups/{backupId}/restore' => ['post' => [
                'operationId' => 'WebApps_Restore',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'backupId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'request',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/RestoreRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RestoreResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config' => ['get' => [
                'operationId' => 'WebApps_ListConfigurations',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteConfigResourceCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/appsettings' => ['put' => [
                'operationId' => 'WebApps_UpdateApplicationSettings',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appSettings',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/StringDictionary']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StringDictionary']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/appsettings/list' => ['post' => [
                'operationId' => 'WebApps_ListApplicationSettings',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StringDictionary']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/authsettings' => ['put' => [
                'operationId' => 'WebApps_UpdateAuthSettings',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'siteAuthSettings',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/SiteAuthSettings']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteAuthSettings']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/authsettings/list' => ['post' => [
                'operationId' => 'WebApps_GetAuthSettings',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteAuthSettings']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/backup' => [
                'put' => [
                    'operationId' => 'WebApps_UpdateBackupConfiguration',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'request',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/BackupRequest']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupRequest']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteBackupConfiguration',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/backup/list' => ['post' => [
                'operationId' => 'WebApps_GetBackupConfiguration',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupRequest']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/connectionstrings' => ['put' => [
                'operationId' => 'WebApps_UpdateConnectionStrings',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'connectionStrings',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ConnectionStringDictionary']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ConnectionStringDictionary']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/connectionstrings/list' => ['post' => [
                'operationId' => 'WebApps_ListConnectionStrings',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ConnectionStringDictionary']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/logs' => [
                'get' => [
                    'operationId' => 'WebApps_GetDiagnosticLogsConfiguration',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteLogsConfig']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_UpdateDiagnosticLogsConfig',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'siteLogsConfig',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SiteLogsConfig']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteLogsConfig']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/metadata' => ['put' => [
                'operationId' => 'WebApps_UpdateMetadata',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'metadata',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/StringDictionary']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StringDictionary']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/metadata/list' => ['post' => [
                'operationId' => 'WebApps_ListMetadata',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StringDictionary']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/publishingcredentials/list' => ['post' => [
                'operationId' => 'WebApps_ListPublishingCredentials',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/User']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/pushsettings' => ['put' => [
                'operationId' => 'WebApps_UpdateSitePushSettings',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'pushSettings',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/PushSettings']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PushSettings']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/pushsettings/list' => ['post' => [
                'operationId' => 'WebApps_ListSitePushSettings',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PushSettings']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/slotConfigNames' => [
                'get' => [
                    'operationId' => 'WebApps_ListSlotConfigurationNames',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SlotConfigNamesResource']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_UpdateSlotConfigurationNames',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slotConfigNames',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SlotConfigNamesResource']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SlotConfigNamesResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/web' => [
                'get' => [
                    'operationId' => 'WebApps_GetConfiguration',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteConfigResource']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateConfiguration',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'siteConfig',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SiteConfigResource']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteConfigResource']]]
                ],
                'patch' => [
                    'operationId' => 'WebApps_UpdateConfiguration',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'siteConfig',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SiteConfigResource']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteConfigResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/web/snapshots' => ['get' => [
                'operationId' => 'WebApps_ListConfigurationSnapshotInfo',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SiteConfigurationSnapshotInfo']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/web/snapshots/{snapshotId}' => ['get' => [
                'operationId' => 'WebApps_GetConfigurationSnapshot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'snapshotId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteConfigResource']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/config/web/snapshots/{snapshotId}/recover' => ['post' => [
                'operationId' => 'WebApps_RecoverSiteConfigurationSnapshot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'snapshotId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/deployments' => ['get' => [
                'operationId' => 'WebApps_ListDeployments',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeploymentCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/deployments/{id}' => [
                'get' => [
                    'operationId' => 'WebApps_GetDeployment',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Deployment']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateDeployment',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'deployment',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Deployment']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Deployment']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteDeployment',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/domainOwnershipIdentifiers' => ['get' => [
                'operationId' => 'WebApps_ListDomainOwnershipIdentifiers',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IdentifierCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/domainOwnershipIdentifiers/{domainOwnershipIdentifierName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetDomainOwnershipIdentifier',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainOwnershipIdentifierName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Identifier']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateDomainOwnershipIdentifier',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainOwnershipIdentifierName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainOwnershipIdentifier',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Identifier']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Identifier']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteDomainOwnershipIdentifier',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainOwnershipIdentifierName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'WebApps_UpdateDomainOwnershipIdentifier',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainOwnershipIdentifierName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainOwnershipIdentifier',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Identifier']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Identifier']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/extensions/MSDeploy' => [
                'get' => [
                    'operationId' => 'WebApps_GetMSDeployStatus',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MSDeployStatus']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateMSDeployOperation',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'MSDeploy',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/MSDeploy']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/MSDeployStatus']],
                        '409' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/extensions/MSDeploy/log' => ['get' => [
                'operationId' => 'WebApps_GetMSDeployLog',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MSDeployLog']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/functions/admin/token' => ['get' => [
                'operationId' => 'WebApps_GetFunctionsAdminToken',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'string']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/hostNameBindings' => ['get' => [
                'operationId' => 'WebApps_ListHostNameBindings',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HostNameBindingCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/hostNameBindings/{hostName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetHostNameBinding',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hostName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HostNameBinding']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateHostNameBinding',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hostName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hostNameBinding',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/HostNameBinding']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HostNameBinding']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteHostNameBinding',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hostName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/hybridConnectionNamespaces/{namespaceName}/relays/{relayName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetHybridConnection',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridConnection']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateHybridConnection',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/HybridConnection']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridConnection']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteHybridConnection',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '404' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'WebApps_UpdateHybridConnection',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/HybridConnection']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridConnection']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/hybridConnectionNamespaces/{namespaceName}/relays/{relayName}/listKeys' => ['post' => [
                'operationId' => 'WebApps_ListHybridConnectionKeys',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'namespaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'relayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridConnectionKey']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/hybridConnectionRelays' => ['get' => [
                'operationId' => 'WebApps_ListHybridConnections',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridConnection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/hybridconnection' => ['get' => [
                'operationId' => 'WebApps_ListRelayServiceConnections',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RelayServiceConnectionEntity']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/hybridconnection/{entityName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetRelayServiceConnection',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'entityName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RelayServiceConnectionEntity']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateRelayServiceConnection',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'entityName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/RelayServiceConnectionEntity']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RelayServiceConnectionEntity']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteRelayServiceConnection',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'entityName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '404' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'WebApps_UpdateRelayServiceConnection',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'entityName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/RelayServiceConnectionEntity']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RelayServiceConnectionEntity']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/instances' => ['get' => [
                'operationId' => 'WebApps_ListInstanceIdentifiers',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WebAppInstanceCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/instances/{instanceId}/deployments' => ['get' => [
                'operationId' => 'WebApps_ListInstanceDeployments',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instanceId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeploymentCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/instances/{instanceId}/deployments/{id}' => [
                'get' => [
                    'operationId' => 'WebApps_GetInstanceDeployment',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'instanceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Deployment']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateInstanceDeployment',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'instanceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'deployment',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Deployment']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Deployment']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteInstanceDeployment',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'instanceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/instances/{instanceId}/extensions/MSDeploy' => [
                'get' => [
                    'operationId' => 'WebApps_GetInstanceMsDeployStatus',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'instanceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MSDeployStatus']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateInstanceMSDeployOperation',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'instanceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'MSDeploy',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/MSDeploy']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/MSDeployStatus']],
                        '409' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/instances/{instanceId}/extensions/MSDeploy/log' => ['get' => [
                'operationId' => 'WebApps_GetInstanceMSDeployLog',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instanceId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MSDeployLog']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/iscloneable' => ['post' => [
                'operationId' => 'WebApps_IsCloneable',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteCloneability']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/metricdefinitions' => ['get' => [
                'operationId' => 'WebApps_ListMetricDefinitions',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricDefinitionCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/metrics' => ['get' => [
                'operationId' => 'WebApps_ListMetrics',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'details',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/migrate' => ['put' => [
                'operationId' => 'WebApps_MigrateStorage',
                'parameters' => [
                    [
                        'name' => 'subscriptionName',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'migrationOptions',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/StorageMigrationOptions']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageMigrationResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/migratemysql' => ['post' => [
                'operationId' => 'WebApps_MigrateMySql',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'migrationRequestEnvelope',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/MigrateMySqlRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Operation']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/migratemysql/status' => ['get' => [
                'operationId' => 'WebApps_GetMigrateMySqlStatus',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MigrateMySqlStatus']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/networkFeatures/{view}' => ['get' => [
                'operationId' => 'WebApps_ListNetworkFeatures',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'view',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/NetworkFeatures']],
                    '404' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/networkTrace/start' => ['post' => [
                'operationId' => 'WebApps_StartWebSiteNetworkTrace',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'durationInSeconds',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'maxFrameLength',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'sasUrl',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'string']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/networkTrace/stop' => ['post' => [
                'operationId' => 'WebApps_StopWebSiteNetworkTrace',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'string']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/newpassword' => ['post' => [
                'operationId' => 'WebApps_GenerateNewSitePublishingPassword',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/perfcounters' => ['get' => [
                'operationId' => 'WebApps_ListPerfMonCounters',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PerfMonCounterCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/phplogging' => ['get' => [
                'operationId' => 'WebApps_GetSitePhpErrorLogFlag',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SitePhpErrorLogFlag']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/premieraddons' => ['get' => [
                'operationId' => 'WebApps_ListPremierAddOns',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PremierAddOn']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/premieraddons/{premierAddOnName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetPremierAddOn',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'premierAddOnName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PremierAddOn']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_AddPremierAddOn',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'premierAddOnName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'premierAddOn',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/PremierAddOn']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PremierAddOn']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeletePremierAddOn',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'premierAddOnName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/publicCertificates' => ['get' => [
                'operationId' => 'WebApps_ListPublicCertificates',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PublicCertificateCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/publicCertificates/{publicCertificateName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetPublicCertificate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'publicCertificateName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PublicCertificate']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdatePublicCertificate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'publicCertificateName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'publicCertificate',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/PublicCertificate']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PublicCertificate']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeletePublicCertificate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'publicCertificateName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/publishxml' => ['post' => [
                'operationId' => 'WebApps_ListPublishingProfileXmlWithSecrets',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'publishingProfileOptions',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CsmPublishingProfileOptions']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'file']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/recover' => ['post' => [
                'operationId' => 'WebApps_Recover',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'recoveryEntity',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/SnapshotRecoveryRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecoverResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/resetSlotConfig' => ['post' => [
                'operationId' => 'WebApps_ResetProductionSlotConfig',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/restart' => ['post' => [
                'operationId' => 'WebApps_Restart',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'softRestart',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => 'synchronous',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots' => ['get' => [
                'operationId' => 'WebApps_ListSlots',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WebAppCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}' => [
                'get' => [
                    'operationId' => 'WebApps_GetSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Site']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'siteEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Site']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'skipDnsRegistration',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'skipCustomDomainVerification',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'forceDnsRegistration',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'ttlInSeconds',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Site']],
                        '202' => ['schema' => ['$ref' => '#/definitions/Site']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'deleteMetrics',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'deleteEmptyServerFarm',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'skipDnsRegistration',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '404' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/analyzeCustomHostname' => ['get' => [
                'operationId' => 'WebApps_AnalyzeCustomHostnameSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hostName',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CustomHostnameAnalysisResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/applySlotConfig' => ['post' => [
                'operationId' => 'WebApps_ApplySlotConfigurationSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slotSwapEntity',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CsmSlotEntity']
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/backup' => ['post' => [
                'operationId' => 'WebApps_BackupSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'request',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/BackupRequest']
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupItem']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/backups' => ['get' => [
                'operationId' => 'WebApps_ListBackupsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupItemCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/backups/discover' => ['put' => [
                'operationId' => 'WebApps_DiscoverRestoreSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'request',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/RestoreRequest']
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RestoreRequest']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/backups/{backupId}' => [
                'get' => [
                    'operationId' => 'WebApps_GetBackupStatusSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupItem']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteBackupSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '404' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/backups/{backupId}/list' => ['post' => [
                'operationId' => 'WebApps_ListBackupStatusSecretsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'backupId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'request',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/BackupRequest']
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupItem']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/backups/{backupId}/restore' => ['post' => [
                'operationId' => 'WebApps_RestoreSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'backupId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'request',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/RestoreRequest']
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RestoreResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config' => ['get' => [
                'operationId' => 'WebApps_ListConfigurationsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteConfigResourceCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/appsettings' => ['put' => [
                'operationId' => 'WebApps_UpdateApplicationSettingsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appSettings',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/StringDictionary']
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StringDictionary']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/appsettings/list' => ['post' => [
                'operationId' => 'WebApps_ListApplicationSettingsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StringDictionary']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/authsettings' => ['put' => [
                'operationId' => 'WebApps_UpdateAuthSettingsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'siteAuthSettings',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/SiteAuthSettings']
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteAuthSettings']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/authsettings/list' => ['post' => [
                'operationId' => 'WebApps_GetAuthSettingsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteAuthSettings']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/backup' => [
                'put' => [
                    'operationId' => 'WebApps_UpdateBackupConfigurationSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'request',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/BackupRequest']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupRequest']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteBackupConfigurationSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/backup/list' => ['post' => [
                'operationId' => 'WebApps_GetBackupConfigurationSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupRequest']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/connectionstrings' => ['put' => [
                'operationId' => 'WebApps_UpdateConnectionStringsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'connectionStrings',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ConnectionStringDictionary']
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ConnectionStringDictionary']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/connectionstrings/list' => ['post' => [
                'operationId' => 'WebApps_ListConnectionStringsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ConnectionStringDictionary']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/logs' => [
                'get' => [
                    'operationId' => 'WebApps_GetDiagnosticLogsConfigurationSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteLogsConfig']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_UpdateDiagnosticLogsConfigSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'siteLogsConfig',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SiteLogsConfig']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteLogsConfig']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/metadata' => ['put' => [
                'operationId' => 'WebApps_UpdateMetadataSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'metadata',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/StringDictionary']
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StringDictionary']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/metadata/list' => ['post' => [
                'operationId' => 'WebApps_ListMetadataSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StringDictionary']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/publishingcredentials/list' => ['post' => [
                'operationId' => 'WebApps_ListPublishingCredentialsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/User']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/pushsettings' => ['put' => [
                'operationId' => 'WebApps_UpdateSitePushSettingsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'pushSettings',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/PushSettings']
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PushSettings']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/pushsettings/list' => ['post' => [
                'operationId' => 'WebApps_ListSitePushSettingsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PushSettings']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/web' => [
                'get' => [
                    'operationId' => 'WebApps_GetConfigurationSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteConfigResource']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateConfigurationSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'siteConfig',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SiteConfigResource']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteConfigResource']]]
                ],
                'patch' => [
                    'operationId' => 'WebApps_UpdateConfigurationSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'siteConfig',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SiteConfigResource']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteConfigResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/web/snapshots' => ['get' => [
                'operationId' => 'WebApps_ListConfigurationSnapshotInfoSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SiteConfigurationSnapshotInfo']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/web/snapshots/{snapshotId}' => ['get' => [
                'operationId' => 'WebApps_GetConfigurationSnapshotSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'snapshotId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteConfigResource']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/config/web/snapshots/{snapshotId}/recover' => ['post' => [
                'operationId' => 'WebApps_RecoverSiteConfigurationSnapshotSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'snapshotId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/deployments' => ['get' => [
                'operationId' => 'WebApps_ListDeploymentsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeploymentCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/deployments/{id}' => [
                'get' => [
                    'operationId' => 'WebApps_GetDeploymentSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Deployment']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateDeploymentSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'deployment',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Deployment']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Deployment']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteDeploymentSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/domainOwnershipIdentifiers' => ['get' => [
                'operationId' => 'WebApps_ListDomainOwnershipIdentifiersSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IdentifierCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/domainOwnershipIdentifiers/{domainOwnershipIdentifierName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetDomainOwnershipIdentifierSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainOwnershipIdentifierName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Identifier']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateDomainOwnershipIdentifierSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainOwnershipIdentifierName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainOwnershipIdentifier',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Identifier']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Identifier']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteDomainOwnershipIdentifierSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainOwnershipIdentifierName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'WebApps_UpdateDomainOwnershipIdentifierSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainOwnershipIdentifierName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'domainOwnershipIdentifier',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Identifier']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Identifier']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/extensions/MSDeploy' => [
                'get' => [
                    'operationId' => 'WebApps_GetMSDeployStatusSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MSDeployStatus']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateMSDeployOperationSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'MSDeploy',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/MSDeploy']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/MSDeployStatus']],
                        '409' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/extensions/MSDeploy/log' => ['get' => [
                'operationId' => 'WebApps_GetMSDeployLogSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MSDeployLog']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/functions/admin/token' => ['get' => [
                'operationId' => 'WebApps_GetFunctionsAdminTokenSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'string']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/hostNameBindings' => ['get' => [
                'operationId' => 'WebApps_ListHostNameBindingsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HostNameBindingCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/hostNameBindings/{hostName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetHostNameBindingSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hostName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HostNameBinding']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateHostNameBindingSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hostName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hostNameBinding',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/HostNameBinding']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HostNameBinding']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteHostNameBindingSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hostName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/hybridConnectionNamespaces/{namespaceName}/relays/{relayName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetHybridConnectionSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridConnection']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateHybridConnectionSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/HybridConnection']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridConnection']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteHybridConnectionSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '404' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'WebApps_UpdateHybridConnectionSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/HybridConnection']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridConnection']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/hybridConnectionNamespaces/{namespaceName}/relays/{relayName}/listKeys' => ['post' => [
                'operationId' => 'WebApps_ListHybridConnectionKeysSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'namespaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'relayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridConnectionKey']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/hybridConnectionRelays' => ['get' => [
                'operationId' => 'WebApps_ListHybridConnectionsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridConnection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/hybridconnection' => ['get' => [
                'operationId' => 'WebApps_ListRelayServiceConnectionsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RelayServiceConnectionEntity']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/hybridconnection/{entityName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetRelayServiceConnectionSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'entityName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RelayServiceConnectionEntity']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateRelayServiceConnectionSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'entityName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/RelayServiceConnectionEntity']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RelayServiceConnectionEntity']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteRelayServiceConnectionSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'entityName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '404' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'WebApps_UpdateRelayServiceConnectionSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'entityName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/RelayServiceConnectionEntity']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RelayServiceConnectionEntity']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/instances' => ['get' => [
                'operationId' => 'WebApps_ListInstanceIdentifiersSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WebAppInstanceCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/instances/{instanceId}/deployments' => ['get' => [
                'operationId' => 'WebApps_ListInstanceDeploymentsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instanceId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeploymentCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/instances/{instanceId}/deployments/{id}' => [
                'get' => [
                    'operationId' => 'WebApps_GetInstanceDeploymentSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'instanceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Deployment']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateInstanceDeploymentSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'instanceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'deployment',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Deployment']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Deployment']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteInstanceDeploymentSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'instanceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/instances/{instanceId}/extensions/MSDeploy' => [
                'get' => [
                    'operationId' => 'WebApps_GetInstanceMsDeployStatusSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'instanceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MSDeployStatus']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateInstanceMSDeployOperationSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'instanceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'MSDeploy',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/MSDeploy']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/MSDeployStatus']],
                        '409' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/instances/{instanceId}/extensions/MSDeploy/log' => ['get' => [
                'operationId' => 'WebApps_GetInstanceMSDeployLogSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instanceId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MSDeployLog']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/iscloneable' => ['post' => [
                'operationId' => 'WebApps_IsCloneableSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteCloneability']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/metricdefinitions' => ['get' => [
                'operationId' => 'WebApps_ListMetricDefinitionsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricDefinitionCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/metrics' => ['get' => [
                'operationId' => 'WebApps_ListMetricsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'details',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/migratemysql/status' => ['get' => [
                'operationId' => 'WebApps_GetMigrateMySqlStatusSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MigrateMySqlStatus']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/networkFeatures/{view}' => ['get' => [
                'operationId' => 'WebApps_ListNetworkFeaturesSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'view',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/NetworkFeatures']],
                    '404' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/networkTrace/start' => ['post' => [
                'operationId' => 'WebApps_StartWebSiteNetworkTraceSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'durationInSeconds',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'maxFrameLength',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'sasUrl',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'string']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/networkTrace/stop' => ['post' => [
                'operationId' => 'WebApps_StopWebSiteNetworkTraceSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'string']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/newpassword' => ['post' => [
                'operationId' => 'WebApps_GenerateNewSitePublishingPasswordSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/perfcounters' => ['get' => [
                'operationId' => 'WebApps_ListPerfMonCountersSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PerfMonCounterCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/phplogging' => ['get' => [
                'operationId' => 'WebApps_GetSitePhpErrorLogFlagSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SitePhpErrorLogFlag']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/premieraddons' => ['get' => [
                'operationId' => 'WebApps_ListPremierAddOnsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PremierAddOn']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/premieraddons/{premierAddOnName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetPremierAddOnSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'premierAddOnName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PremierAddOn']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_AddPremierAddOnSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'premierAddOnName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'premierAddOn',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/PremierAddOn']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PremierAddOn']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeletePremierAddOnSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'premierAddOnName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/publicCertificates' => ['get' => [
                'operationId' => 'WebApps_ListPublicCertificatesSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PublicCertificateCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/publicCertificates/{publicCertificateName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetPublicCertificateSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'publicCertificateName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PublicCertificate']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdatePublicCertificateSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'publicCertificateName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'publicCertificate',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/PublicCertificate']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PublicCertificate']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeletePublicCertificateSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'publicCertificateName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/publishxml' => ['post' => [
                'operationId' => 'WebApps_ListPublishingProfileXmlWithSecretsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'publishingProfileOptions',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CsmPublishingProfileOptions']
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'file']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/recover' => ['post' => [
                'operationId' => 'WebApps_RecoverSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'recoveryEntity',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/SnapshotRecoveryRequest']
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecoverResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/resetSlotConfig' => ['post' => [
                'operationId' => 'WebApps_ResetSlotConfigurationSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/restart' => ['post' => [
                'operationId' => 'WebApps_RestartSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'softRestart',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => 'synchronous',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/slotsdiffs' => ['post' => [
                'operationId' => 'WebApps_ListSlotDifferencesSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slotSwapEntity',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CsmSlotEntity']
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SlotDifferenceCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/slotsswap' => ['post' => [
                'operationId' => 'WebApps_SwapSlotSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slotSwapEntity',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CsmSlotEntity']
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => [
                    '200' => [],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/snapshots' => ['get' => [
                'operationId' => 'WebApps_ListSnapshotsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SnapshotCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/sourcecontrols/web' => [
                'get' => [
                    'operationId' => 'WebApps_GetSourceControlSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteSourceControl']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateSourceControlSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'siteSourceControl',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SiteSourceControl']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/SiteSourceControl']],
                        '201' => ['schema' => ['$ref' => '#/definitions/SiteSourceControl']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteSourceControlSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '202' => [],
                        '404' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/start' => ['post' => [
                'operationId' => 'WebApps_StartSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/stop' => ['post' => [
                'operationId' => 'WebApps_StopSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/sync' => ['post' => [
                'operationId' => 'WebApps_SyncRepositorySlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/syncfunctiontriggers' => ['post' => [
                'operationId' => 'WebApps_SyncFunctionTriggersSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/usages' => ['get' => [
                'operationId' => 'WebApps_ListUsagesSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CsmUsageQuotaCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/virtualNetworkConnections' => ['get' => [
                'operationId' => 'WebApps_ListVnetConnectionsSlot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slot',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VnetInfo']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/virtualNetworkConnections/{vnetName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetVnetConnectionSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VnetInfo']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateVnetConnectionSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VnetInfo']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VnetInfo']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteVnetConnectionSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '404' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'WebApps_UpdateVnetConnectionSlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VnetInfo']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VnetInfo']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slots/{slot}/virtualNetworkConnections/{vnetName}/gateways/{gatewayName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetVnetConnectionGatewaySlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'gatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VnetGateway']],
                        '404' => []
                    ]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateVnetConnectionGatewaySlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'gatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VnetGateway']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VnetGateway']]]
                ],
                'patch' => [
                    'operationId' => 'WebApps_UpdateVnetConnectionGatewaySlot',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'gatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VnetGateway']
                        ],
                        [
                            'name' => 'slot',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VnetGateway']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slotsdiffs' => ['post' => [
                'operationId' => 'WebApps_ListSlotDifferencesFromProduction',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slotSwapEntity',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CsmSlotEntity']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SlotDifferenceCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/slotsswap' => ['post' => [
                'operationId' => 'WebApps_SwapSlotWithProduction',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'slotSwapEntity',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CsmSlotEntity']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => [
                    '200' => [],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/snapshots' => ['get' => [
                'operationId' => 'WebApps_ListSnapshots',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SnapshotCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/sourcecontrols/web' => [
                'get' => [
                    'operationId' => 'WebApps_GetSourceControl',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SiteSourceControl']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateSourceControl',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'siteSourceControl',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SiteSourceControl']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/SiteSourceControl']],
                        '201' => ['schema' => ['$ref' => '#/definitions/SiteSourceControl']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteSourceControl',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '202' => [],
                        '404' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/start' => ['post' => [
                'operationId' => 'WebApps_Start',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/stop' => ['post' => [
                'operationId' => 'WebApps_Stop',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/sync' => ['post' => [
                'operationId' => 'WebApps_SyncRepository',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/syncfunctiontriggers' => ['post' => [
                'operationId' => 'WebApps_SyncFunctionTriggers',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/usages' => ['get' => [
                'operationId' => 'WebApps_ListUsages',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CsmUsageQuotaCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/virtualNetworkConnections' => ['get' => [
                'operationId' => 'WebApps_ListVnetConnections',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VnetInfo']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/virtualNetworkConnections/{vnetName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetVnetConnection',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VnetInfo']]]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateVnetConnection',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VnetInfo']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VnetInfo']]]
                ],
                'delete' => [
                    'operationId' => 'WebApps_DeleteVnetConnection',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '404' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'WebApps_UpdateVnetConnection',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VnetInfo']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VnetInfo']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/sites/{name}/virtualNetworkConnections/{vnetName}/gateways/{gatewayName}' => [
                'get' => [
                    'operationId' => 'WebApps_GetVnetConnectionGateway',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'gatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VnetGateway']],
                        '404' => []
                    ]
                ],
                'put' => [
                    'operationId' => 'WebApps_CreateOrUpdateVnetConnectionGateway',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'gatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VnetGateway']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VnetGateway']]]
                ],
                'patch' => [
                    'operationId' => 'WebApps_UpdateVnetConnectionGateway',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'gatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VnetGateway']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VnetGateway']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Web/hostingEnvironments' => ['get' => [
                'operationId' => 'AppServiceEnvironments_List',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppServiceEnvironmentCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppServiceEnvironmentCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}' => [
                'get' => [
                    'operationId' => 'AppServiceEnvironments_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppServiceEnvironmentResource']]]
                ],
                'put' => [
                    'operationId' => 'AppServiceEnvironments_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hostingEnvironmentEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AppServiceEnvironmentResource']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/AppServiceEnvironmentResource']],
                        '202' => ['schema' => ['$ref' => '#/definitions/AppServiceEnvironmentResource']],
                        '400' => [],
                        '404' => [],
                        '409' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'AppServiceEnvironments_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'forceDelete',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => [],
                        '400' => [],
                        '404' => [],
                        '409' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/capacities/compute' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListCapacities',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StampCapacityCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/capacities/virtualip' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListVips',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AddressResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/diagnostics' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListDiagnostics',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/HostingEnvironmentDiagnostics']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/diagnostics/{diagnosticsName}' => ['get' => [
                'operationId' => 'AppServiceEnvironments_GetDiagnosticsItem',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'diagnosticsName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HostingEnvironmentDiagnostics']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/metricdefinitions' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListMetricDefinitions',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MetricDefinition']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/metrics' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListMetrics',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'details',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/multiRolePools' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListMultiRolePools',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkerPoolCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/multiRolePools/default' => [
                'get' => [
                    'operationId' => 'AppServiceEnvironments_GetMultiRolePool',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkerPoolResource']]]
                ],
                'put' => [
                    'operationId' => 'AppServiceEnvironments_CreateOrUpdateMultiRolePool',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'multiRolePoolEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/WorkerPoolResource']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/WorkerPoolResource']],
                        '202' => ['schema' => ['$ref' => '#/definitions/WorkerPoolResource']],
                        '400' => [],
                        '404' => [],
                        '409' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/multiRolePools/default/instances/{instance}/metricdefinitions' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListMultiRolePoolInstanceMetricDefinitions',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instance',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricDefinitionCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/multiRolePools/default/instances/{instance}metrics' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListMultiRolePoolInstanceMetrics',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instance',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'details',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/multiRolePools/default/metricdefinitions' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListMultiRoleMetricDefinitions',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricDefinitionCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/multiRolePools/default/metrics' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListMultiRoleMetrics',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'startTime',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'endTime',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'timeGrain',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'details',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/multiRolePools/default/skus' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListMultiRolePoolSkus',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SkuInfoCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/multiRolePools/default/usages' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListMultiRoleUsages',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/UsageCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/operations' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListOperations',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Operation']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/reboot' => ['post' => [
                'operationId' => 'AppServiceEnvironments_Reboot',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '400' => [],
                    '404' => [],
                    '409' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/resume' => ['post' => [
                'operationId' => 'AppServiceEnvironments_Resume',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/WebAppCollection']],
                    '202' => ['schema' => ['$ref' => '#/definitions/WebAppCollection']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/serverfarms' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListAppServicePlans',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppServicePlanCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/sites' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListWebApps',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'propertiesToInclude',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WebAppCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/suspend' => ['post' => [
                'operationId' => 'AppServiceEnvironments_Suspend',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/WebAppCollection']],
                    '202' => ['schema' => ['$ref' => '#/definitions/WebAppCollection']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/usages' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListUsages',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CsmUsageQuotaCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/workerPools' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListWorkerPools',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkerPoolCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/workerPools/{workerPoolName}' => [
                'get' => [
                    'operationId' => 'AppServiceEnvironments_GetWorkerPool',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workerPoolName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkerPoolResource']]]
                ],
                'put' => [
                    'operationId' => 'AppServiceEnvironments_CreateOrUpdateWorkerPool',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workerPoolName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'workerPoolEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/WorkerPoolResource']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/WorkerPoolResource']],
                        '202' => ['schema' => ['$ref' => '#/definitions/WorkerPoolResource']],
                        '400' => [],
                        '404' => [],
                        '409' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/workerPools/{workerPoolName}/instances/{instance}/metricdefinitions' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListWorkerPoolInstanceMetricDefinitions',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workerPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instance',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricDefinitionCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/workerPools/{workerPoolName}/instances/{instance}metrics' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListWorkerPoolInstanceMetrics',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workerPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instance',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'details',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/workerPools/{workerPoolName}/metricdefinitions' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListWebWorkerMetricDefinitions',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workerPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricDefinitionCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/workerPools/{workerPoolName}/metrics' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListWebWorkerMetrics',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workerPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'details',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/workerPools/{workerPoolName}/skus' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListWorkerPoolSkus',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workerPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SkuInfoCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/hostingEnvironments/{name}/workerPools/{workerPoolName}/usages' => ['get' => [
                'operationId' => 'AppServiceEnvironments_ListWebWorkerUsages',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workerPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/UsageCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Web/serverfarms' => ['get' => [
                'operationId' => 'AppServicePlans_List',
                'parameters' => [
                    [
                        'name' => 'detailed',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppServicePlanCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms' => ['get' => [
                'operationId' => 'AppServicePlans_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppServicePlanCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}' => [
                'get' => [
                    'operationId' => 'AppServicePlans_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppServicePlan']]]
                ],
                'put' => [
                    'operationId' => 'AppServicePlans_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'appServicePlan',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AppServicePlan']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/AppServicePlan']],
                        '202' => ['schema' => ['$ref' => '#/definitions/AppServicePlan']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'AppServicePlans_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => ['200' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/capabilities' => ['get' => [
                'operationId' => 'AppServicePlans_ListCapabilities',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Capability']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/hybridConnectionNamespaces/{namespaceName}/relays/{relayName}' => [
                'get' => [
                    'operationId' => 'AppServicePlans_GetHybridConnection',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridConnection']]]
                ],
                'delete' => [
                    'operationId' => 'AppServicePlans_DeleteHybridConnection',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'namespaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'relayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/hybridConnectionNamespaces/{namespaceName}/relays/{relayName}/listKeys' => ['post' => [
                'operationId' => 'AppServicePlans_ListHybridConnectionKeys',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'namespaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'relayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridConnectionKey']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/hybridConnectionNamespaces/{namespaceName}/relays/{relayName}/sites' => ['get' => [
                'operationId' => 'AppServicePlans_ListWebAppsByHybridConnection',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'namespaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'relayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/hybridConnectionPlanLimits/limit' => ['get' => [
                'operationId' => 'AppServicePlans_GetHybridConnectionPlanLimit',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridConnectionLimits']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/hybridConnectionRelays' => ['get' => [
                'operationId' => 'AppServicePlans_ListHybridConnections',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridConnectionCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/metricdefinitions' => ['get' => [
                'operationId' => 'AppServicePlans_ListMetricDefintions',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricDefinitionCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/metrics' => ['get' => [
                'operationId' => 'AppServicePlans_ListMetrics',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'details',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceMetricCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/restartSites' => ['post' => [
                'operationId' => 'AppServicePlans_RestartWebApps',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'softRestart',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/sites' => ['get' => [
                'operationId' => 'AppServicePlans_ListWebApps',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$skipToken',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WebAppCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/virtualNetworkConnections' => ['get' => [
                'operationId' => 'AppServicePlans_ListVnets',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VnetInfo']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/virtualNetworkConnections/{vnetName}' => ['get' => [
                'operationId' => 'AppServicePlans_GetVnetFromServerFarm',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vnetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/VnetInfo']],
                    '404' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/virtualNetworkConnections/{vnetName}/gateways/{gatewayName}' => [
                'get' => [
                    'operationId' => 'AppServicePlans_GetVnetGateway',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'gatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VnetGateway']]]
                ],
                'put' => [
                    'operationId' => 'AppServicePlans_UpdateVnetGateway',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'gatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionEnvelope',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VnetGateway']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VnetGateway']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/virtualNetworkConnections/{vnetName}/routes' => ['get' => [
                'operationId' => 'AppServicePlans_ListRoutesForVnet',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vnetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VnetRoute']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/virtualNetworkConnections/{vnetName}/routes/{routeName}' => [
                'get' => [
                    'operationId' => 'AppServicePlans_GetRouteForVnet',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => [
                            'type' => 'array',
                            'items' => ['$ref' => '#/definitions/VnetRoute']
                        ]],
                        '404' => []
                    ]
                ],
                'put' => [
                    'operationId' => 'AppServicePlans_CreateOrUpdateVnetRoute',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'route',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VnetRoute']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VnetRoute']],
                        '400' => [],
                        '404' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'AppServicePlans_DeleteVnetRoute',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '404' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'AppServicePlans_UpdateVnetRoute',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'name',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'route',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VnetRoute']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VnetRoute']],
                        '400' => [],
                        '404' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Web/serverfarms/{name}/workers/{workerName}/reboot' => ['post' => [
                'operationId' => 'AppServicePlans_RebootWorker',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]]
        ],
        'definitions' => [
            'AppServiceCertificate' => [
                'properties' => [
                    'keyVaultId' => ['type' => 'string'],
                    'keyVaultSecretName' => ['type' => 'string'],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Initialized',
                            'WaitingOnCertificateOrder',
                            'Succeeded',
                            'CertificateOrderFailed',
                            'OperationNotPermittedOnKeyVault',
                            'AzureServiceUnauthorizedToAccessKeyVault',
                            'KeyVaultDoesNotExist',
                            'KeyVaultSecretDoesNotExist',
                            'UnknownError',
                            'ExternalPrivateKey',
                            'Unknown'
                        ],
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AppServiceCertificateResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AppServiceCertificate']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AppServiceCertificateCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AppServiceCertificateResource']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'CertificateDetails' => [
                'properties' => [
                    'version' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ],
                    'serialNumber' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'thumbprint' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'subject' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'notBefore' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'notAfter' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'signatureAlgorithm' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'issuer' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'rawData' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AppServiceCertificateOrder_properties' => [
                'properties' => [
                    'certificates' => [
                        'type' => 'object',
                        'additionalProperties' => ['$ref' => '#/definitions/AppServiceCertificate']
                    ],
                    'distinguishedName' => ['type' => 'string'],
                    'domainVerificationToken' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'validityInYears' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'keySize' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'productType' => [
                        'type' => 'string',
                        'enum' => [
                            'StandardDomainValidatedSsl',
                            'StandardDomainValidatedWildCardSsl'
                        ]
                    ],
                    'autoRenew' => ['type' => 'boolean'],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Succeeded',
                            'Failed',
                            'Canceled',
                            'InProgress',
                            'Deleting'
                        ],
                        'readOnly' => TRUE
                    ],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'Pendingissuance',
                            'Issued',
                            'Revoked',
                            'Canceled',
                            'Denied',
                            'Pendingrevocation',
                            'PendingRekey',
                            'Unused',
                            'Expired',
                            'NotSubmitted'
                        ],
                        'readOnly' => TRUE
                    ],
                    'signedCertificate' => [
                        '$ref' => '#/definitions/CertificateDetails',
                        'readOnly' => TRUE
                    ],
                    'csr' => ['type' => 'string'],
                    'intermediate' => [
                        '$ref' => '#/definitions/CertificateDetails',
                        'readOnly' => TRUE
                    ],
                    'root' => [
                        '$ref' => '#/definitions/CertificateDetails',
                        'readOnly' => TRUE
                    ],
                    'serialNumber' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'lastCertificateIssuanceTime' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'expirationTime' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'isPrivateKeyExternal' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'appServiceCertificateNotRenewableReasons' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'RegistrationStatusNotSupportedForRenewal',
                                'ExpirationNotInRenewalTimeRange',
                                'SubscriptionNotActive'
                            ]
                        ],
                        'readOnly' => TRUE
                    ],
                    'nextAutoRenewalTimeStamp' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AppServiceCertificateOrder' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AppServiceCertificateOrder_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AppServiceCertificateOrderCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AppServiceCertificateOrder']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'CertificateEmail_properties' => [
                'properties' => [
                    'emailId' => ['type' => 'string'],
                    'timeStamp' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CertificateEmail' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/CertificateEmail_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CertificateOrderAction_properties' => [
                'properties' => [
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'CertificateIssued',
                            'CertificateOrderCanceled',
                            'CertificateOrderCreated',
                            'CertificateRevoked',
                            'DomainValidationComplete',
                            'FraudDetected',
                            'OrgNameChange',
                            'OrgValidationComplete',
                            'SanDrop',
                            'FraudCleared',
                            'CertificateExpired',
                            'CertificateExpirationWarning',
                            'FraudDocumentationRequired',
                            'Unknown'
                        ]
                    ],
                    'createdAt' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CertificateOrderAction' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/CertificateOrderAction_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NameIdentifier' => [
                'properties' => ['name' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProxyOnlyResource' => [
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'kind' => ['type' => 'string'],
                    'type' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ReissueCertificateOrderRequest_properties' => [
                'properties' => [
                    'keySize' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'delayExistingRevokeInHours' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'csr' => ['type' => 'string'],
                    'isPrivateKeyExternal' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ReissueCertificateOrderRequest' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ReissueCertificateOrderRequest_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RenewCertificateOrderRequest_properties' => [
                'properties' => [
                    'keySize' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'csr' => ['type' => 'string'],
                    'isPrivateKeyExternal' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RenewCertificateOrderRequest' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RenewCertificateOrderRequest_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Resource' => [
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'kind' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'type' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['location']
            ],
            'SiteSeal' => [
                'properties' => ['html' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['html']
            ],
            'SiteSealRequest' => [
                'properties' => [
                    'lightTheme' => ['type' => 'boolean'],
                    'locale' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Address' => [
                'properties' => [
                    'address1' => ['type' => 'string'],
                    'address2' => ['type' => 'string'],
                    'city' => ['type' => 'string'],
                    'country' => ['type' => 'string'],
                    'postalCode' => ['type' => 'string'],
                    'state' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'address1',
                    'city',
                    'country',
                    'postalCode',
                    'state'
                ]
            ],
            'Contact' => [
                'properties' => [
                    'addressMailing' => ['$ref' => '#/definitions/Address'],
                    'email' => ['type' => 'string'],
                    'fax' => ['type' => 'string'],
                    'jobTitle' => ['type' => 'string'],
                    'nameFirst' => ['type' => 'string'],
                    'nameLast' => ['type' => 'string'],
                    'nameMiddle' => ['type' => 'string'],
                    'organization' => ['type' => 'string'],
                    'phone' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'email',
                    'nameFirst',
                    'nameLast',
                    'phone'
                ]
            ],
            'HostName' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'siteNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'azureResourceName' => ['type' => 'string'],
                    'azureResourceType' => [
                        'type' => 'string',
                        'enum' => [
                            'Website',
                            'TrafficManager'
                        ]
                    ],
                    'customHostNameDnsRecordType' => [
                        'type' => 'string',
                        'enum' => [
                            'CName',
                            'A'
                        ]
                    ],
                    'hostNameType' => [
                        'type' => 'string',
                        'enum' => [
                            'Verified',
                            'Managed'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DomainPurchaseConsent' => [
                'properties' => [
                    'agreementKeys' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'agreedBy' => ['type' => 'string'],
                    'agreedAt' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Domain_properties' => [
                'properties' => [
                    'contactAdmin' => ['$ref' => '#/definitions/Contact'],
                    'contactBilling' => ['$ref' => '#/definitions/Contact'],
                    'contactRegistrant' => ['$ref' => '#/definitions/Contact'],
                    'contactTech' => ['$ref' => '#/definitions/Contact'],
                    'registrationStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Active',
                            'Awaiting',
                            'Cancelled',
                            'Confiscated',
                            'Disabled',
                            'Excluded',
                            'Expired',
                            'Failed',
                            'Held',
                            'Locked',
                            'Parked',
                            'Pending',
                            'Reserved',
                            'Reverted',
                            'Suspended',
                            'Transferred',
                            'Unknown',
                            'Unlocked',
                            'Unparked',
                            'Updated',
                            'JsonConverterFailed'
                        ],
                        'readOnly' => TRUE
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Succeeded',
                            'Failed',
                            'Canceled',
                            'InProgress',
                            'Deleting'
                        ],
                        'readOnly' => TRUE
                    ],
                    'nameServers' => [
                        'type' => 'array',
                        'items' => ['type' => 'string'],
                        'readOnly' => TRUE
                    ],
                    'privacy' => ['type' => 'boolean'],
                    'createdTime' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'expirationTime' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'lastRenewedTime' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'autoRenew' => ['type' => 'boolean'],
                    'readyForDnsRecordManagement' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'managedHostNames' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HostName'],
                        'readOnly' => TRUE
                    ],
                    'consent' => ['$ref' => '#/definitions/DomainPurchaseConsent'],
                    'domainNotRenewableReasons' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'RegistrationStatusNotSupportedForRenewal',
                                'ExpirationNotInRenewalTimeRange',
                                'SubscriptionNotActive'
                            ]
                        ],
                        'readOnly' => TRUE
                    ],
                    'dnsType' => [
                        'type' => 'string',
                        'enum' => [
                            'AzureDns',
                            'DefaultDomainRegistrarDns'
                        ]
                    ],
                    'dnsZoneId' => ['type' => 'string'],
                    'targetDnsType' => [
                        'type' => 'string',
                        'enum' => [
                            'AzureDns',
                            'DefaultDomainRegistrarDns'
                        ]
                    ],
                    'authCode' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Domain' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/Domain_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DomainAvailablilityCheckResult' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'available' => ['type' => 'boolean'],
                    'domainType' => [
                        'type' => 'string',
                        'enum' => [
                            'Regular',
                            'SoftDeleted'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DomainCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Domain']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'DomainControlCenterSsoRequest' => [
                'properties' => [
                    'url' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'postParameterKey' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'postParameterValue' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DomainOwnershipIdentifier_properties' => [
                'properties' => ['ownershipId' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DomainOwnershipIdentifier' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DomainOwnershipIdentifier_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DomainOwnershipIdentifierCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DomainOwnershipIdentifier']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'DomainRecommendationSearchParameters' => [
                'properties' => [
                    'keywords' => ['type' => 'string'],
                    'maxDomainRecommendations' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NameIdentifierCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/NameIdentifier']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'TldLegalAgreement' => [
                'properties' => [
                    'agreementKey' => ['type' => 'string'],
                    'title' => ['type' => 'string'],
                    'content' => ['type' => 'string'],
                    'url' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'agreementKey',
                    'title',
                    'content'
                ]
            ],
            'TldLegalAgreementCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TldLegalAgreement']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'TopLevelDomain_properties' => [
                'properties' => [
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'privacy' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TopLevelDomain' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/TopLevelDomain_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TopLevelDomainAgreementOption' => [
                'properties' => [
                    'includePrivacy' => ['type' => 'boolean'],
                    'forTransfer' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TopLevelDomainCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TopLevelDomain']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'HostingEnvironmentProfile' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'type' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Certificate_properties' => [
                'properties' => [
                    'friendlyName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'subjectName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'hostNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'pfxBlob' => [
                        'type' => 'string',
                        'format' => 'byte'
                    ],
                    'siteName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'selfLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'issuer' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'issueDate' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'expirationDate' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'password' => ['type' => 'string'],
                    'thumbprint' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'valid' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'cerBlob' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'publicKeyHash' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'hostingEnvironmentProfile' => [
                        '$ref' => '#/definitions/HostingEnvironmentProfile',
                        'readOnly' => TRUE
                    ],
                    'keyVaultId' => ['type' => 'string'],
                    'keyVaultSecretName' => ['type' => 'string'],
                    'keyVaultSecretStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Initialized',
                            'WaitingOnCertificateOrder',
                            'Succeeded',
                            'CertificateOrderFailed',
                            'OperationNotPermittedOnKeyVault',
                            'AzureServiceUnauthorizedToAccessKeyVault',
                            'KeyVaultDoesNotExist',
                            'KeyVaultSecretDoesNotExist',
                            'UnknownError',
                            'ExternalPrivateKey',
                            'Unknown'
                        ],
                        'readOnly' => TRUE
                    ],
                    'geoRegion' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'serverFarmId' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Certificate' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/Certificate_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CertificateCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Certificate']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'ApiDefinitionInfo' => [
                'properties' => ['url' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AutoHealCustomAction' => [
                'properties' => [
                    'exe' => ['type' => 'string'],
                    'parameters' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AutoHealActions' => [
                'properties' => [
                    'actionType' => [
                        'type' => 'string',
                        'enum' => [
                            'Recycle',
                            'LogEvent',
                            'CustomAction'
                        ]
                    ],
                    'customAction' => ['$ref' => '#/definitions/AutoHealCustomAction'],
                    'minProcessExecutionTime' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RequestsBasedTrigger' => [
                'properties' => [
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'timeInterval' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StatusCodesBasedTrigger' => [
                'properties' => [
                    'status' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'subStatus' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'win32Status' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'timeInterval' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SlowRequestsBasedTrigger' => [
                'properties' => [
                    'timeTaken' => ['type' => 'string'],
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'timeInterval' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AutoHealTriggers' => [
                'properties' => [
                    'requests' => ['$ref' => '#/definitions/RequestsBasedTrigger'],
                    'privateBytesInKB' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'statusCodes' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/StatusCodesBasedTrigger']
                    ],
                    'slowRequests' => ['$ref' => '#/definitions/SlowRequestsBasedTrigger']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AutoHealRules' => [
                'properties' => [
                    'triggers' => ['$ref' => '#/definitions/AutoHealTriggers'],
                    'actions' => ['$ref' => '#/definitions/AutoHealActions']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CloningInfo' => [
                'properties' => [
                    'correlationId' => ['type' => 'string'],
                    'overwrite' => ['type' => 'boolean'],
                    'cloneCustomHostNames' => ['type' => 'boolean'],
                    'cloneSourceControl' => ['type' => 'boolean'],
                    'sourceWebAppId' => ['type' => 'string'],
                    'hostingEnvironment' => ['type' => 'string'],
                    'appSettingsOverrides' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'configureLoadBalancing' => ['type' => 'boolean'],
                    'trafficManagerProfileId' => ['type' => 'string'],
                    'trafficManagerProfileName' => ['type' => 'string'],
                    'ignoreQuotas' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => ['sourceWebAppId']
            ],
            'ConnStringInfo' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'connectionString' => ['type' => 'string'],
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'MySql',
                            'SQLServer',
                            'SQLAzure',
                            'Custom',
                            'NotificationHub',
                            'ServiceBus',
                            'EventHub',
                            'ApiHub',
                            'DocDb',
                            'RedisCache',
                            'PostgreSQL'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CorsSettings' => [
                'properties' => ['allowedOrigins' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'HostNameSslState' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'sslState' => [
                        'type' => 'string',
                        'enum' => [
                            'Disabled',
                            'SniEnabled',
                            'IpBasedEnabled'
                        ]
                    ],
                    'virtualIP' => ['type' => 'string'],
                    'thumbprint' => ['type' => 'string'],
                    'toUpdate' => ['type' => 'boolean'],
                    'hostType' => [
                        'type' => 'string',
                        'enum' => [
                            'Standard',
                            'Repository'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NameValuePair' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'value' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteMachineKey' => [
                'properties' => [
                    'validation' => ['type' => 'string'],
                    'validationKey' => ['type' => 'string'],
                    'decryption' => ['type' => 'string'],
                    'decryptionKey' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'HandlerMapping' => [
                'properties' => [
                    'extension' => ['type' => 'string'],
                    'scriptProcessor' => ['type' => 'string'],
                    'arguments' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualDirectory' => [
                'properties' => [
                    'virtualPath' => ['type' => 'string'],
                    'physicalPath' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualApplication' => [
                'properties' => [
                    'virtualPath' => ['type' => 'string'],
                    'physicalPath' => ['type' => 'string'],
                    'preloadEnabled' => ['type' => 'boolean'],
                    'virtualDirectories' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualDirectory']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RampUpRule' => [
                'properties' => [
                    'actionHostName' => ['type' => 'string'],
                    'reroutePercentage' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'changeStep' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'changeIntervalInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'minReroutePercentage' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'maxReroutePercentage' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'changeDecisionCallbackUrl' => ['type' => 'string'],
                    'name' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Experiments' => [
                'properties' => ['rampUpRules' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RampUpRule']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteLimits' => [
                'properties' => [
                    'maxPercentageCpu' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'maxMemoryInMb' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'maxDiskSizeInMb' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PushSettings_properties' => [
                'properties' => [
                    'isPushEnabled' => ['type' => 'boolean'],
                    'tagWhitelistJson' => ['type' => 'string'],
                    'tagsRequiringAuth' => ['type' => 'string'],
                    'dynamicTagsJson' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PushSettings' => [
                'properties' => [
                    'isPushEnabled' => ['type' => 'boolean'],
                    'tagWhitelistJson' => ['type' => 'string'],
                    'tagsRequiringAuth' => ['type' => 'string'],
                    'dynamicTagsJson' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/PushSettings_properties']
                ],
                'additionalProperties' => FALSE,
                'required' => ['isPushEnabled']
            ],
            'IpSecurityRestriction' => [
                'properties' => [
                    'ipAddress' => ['type' => 'string'],
                    'subnetMask' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['ipAddress']
            ],
            'SiteConfig' => [
                'properties' => [
                    'numberOfWorkers' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'defaultDocuments' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'netFrameworkVersion' => ['type' => 'string'],
                    'phpVersion' => ['type' => 'string'],
                    'pythonVersion' => ['type' => 'string'],
                    'nodeVersion' => ['type' => 'string'],
                    'linuxFxVersion' => ['type' => 'string'],
                    'requestTracingEnabled' => ['type' => 'boolean'],
                    'requestTracingExpirationTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'remoteDebuggingEnabled' => ['type' => 'boolean'],
                    'remoteDebuggingVersion' => ['type' => 'string'],
                    'httpLoggingEnabled' => ['type' => 'boolean'],
                    'logsDirectorySizeLimit' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'detailedErrorLoggingEnabled' => ['type' => 'boolean'],
                    'publishingUsername' => ['type' => 'string'],
                    'appSettings' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/NameValuePair']
                    ],
                    'connectionStrings' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ConnStringInfo']
                    ],
                    'machineKey' => [
                        '$ref' => '#/definitions/SiteMachineKey',
                        'readOnly' => TRUE
                    ],
                    'handlerMappings' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HandlerMapping']
                    ],
                    'documentRoot' => ['type' => 'string'],
                    'scmType' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Dropbox',
                            'Tfs',
                            'LocalGit',
                            'GitHub',
                            'CodePlexGit',
                            'CodePlexHg',
                            'BitbucketGit',
                            'BitbucketHg',
                            'ExternalGit',
                            'ExternalHg',
                            'OneDrive',
                            'VSO'
                        ]
                    ],
                    'use32BitWorkerProcess' => ['type' => 'boolean'],
                    'webSocketsEnabled' => ['type' => 'boolean'],
                    'alwaysOn' => ['type' => 'boolean'],
                    'javaVersion' => ['type' => 'string'],
                    'javaContainer' => ['type' => 'string'],
                    'javaContainerVersion' => ['type' => 'string'],
                    'appCommandLine' => ['type' => 'string'],
                    'managedPipelineMode' => [
                        'type' => 'string',
                        'enum' => [
                            'Integrated',
                            'Classic'
                        ]
                    ],
                    'virtualApplications' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualApplication']
                    ],
                    'loadBalancing' => [
                        'type' => 'string',
                        'enum' => [
                            'WeightedRoundRobin',
                            'LeastRequests',
                            'LeastResponseTime',
                            'WeightedTotalTraffic',
                            'RequestHash'
                        ]
                    ],
                    'experiments' => ['$ref' => '#/definitions/Experiments'],
                    'limits' => ['$ref' => '#/definitions/SiteLimits'],
                    'autoHealEnabled' => ['type' => 'boolean'],
                    'autoHealRules' => ['$ref' => '#/definitions/AutoHealRules'],
                    'tracingOptions' => ['type' => 'string'],
                    'vnetName' => ['type' => 'string'],
                    'cors' => ['$ref' => '#/definitions/CorsSettings'],
                    'push' => ['$ref' => '#/definitions/PushSettings'],
                    'apiDefinition' => ['$ref' => '#/definitions/ApiDefinitionInfo'],
                    'autoSwapSlotName' => ['type' => 'string'],
                    'localMySqlEnabled' => ['type' => 'boolean'],
                    'ipSecurityRestrictions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/IpSecurityRestriction']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SlotSwapStatus' => [
                'properties' => [
                    'timestampUtc' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'sourceSlotName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'destinationSlotName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeletedSite_properties' => [
                'properties' => [
                    'deletedTimestamp' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'state' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'hostNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string'],
                        'readOnly' => TRUE
                    ],
                    'repositorySiteName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'usageState' => [
                        'type' => 'string',
                        'enum' => [
                            'Normal',
                            'Exceeded'
                        ],
                        'readOnly' => TRUE
                    ],
                    'enabled' => ['type' => 'boolean'],
                    'enabledHostNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string'],
                        'readOnly' => TRUE
                    ],
                    'availabilityState' => [
                        'type' => 'string',
                        'enum' => [
                            'Normal',
                            'Limited',
                            'DisasterRecoveryMode'
                        ],
                        'readOnly' => TRUE
                    ],
                    'hostNameSslStates' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HostNameSslState']
                    ],
                    'serverFarmId' => ['type' => 'string'],
                    'reserved' => ['type' => 'boolean'],
                    'lastModifiedTimeUtc' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'siteConfig' => ['$ref' => '#/definitions/SiteConfig'],
                    'trafficManagerHostNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string'],
                        'readOnly' => TRUE
                    ],
                    'premiumAppDeployed' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'scmSiteAlsoStopped' => ['type' => 'boolean'],
                    'targetSwapSlot' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'hostingEnvironmentProfile' => ['$ref' => '#/definitions/HostingEnvironmentProfile'],
                    'microService' => ['type' => 'string'],
                    'gatewaySiteName' => ['type' => 'string'],
                    'clientAffinityEnabled' => ['type' => 'boolean'],
                    'clientCertEnabled' => ['type' => 'boolean'],
                    'hostNamesDisabled' => ['type' => 'boolean'],
                    'outboundIpAddresses' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'containerSize' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'dailyMemoryTimeQuota' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'suspendedTill' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'maxNumberOfWorkers' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ],
                    'cloningInfo' => ['$ref' => '#/definitions/CloningInfo'],
                    'resourceGroup' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'isDefaultContainer' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'defaultHostName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'slotSwapStatus' => [
                        '$ref' => '#/definitions/SlotSwapStatus',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeletedSite' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DeletedSite_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeletedWebAppCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DeletedSite']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'CsmOperationDisplay' => [
                'properties' => [
                    'provider' => ['type' => 'string'],
                    'resource' => ['type' => 'string'],
                    'operation' => ['type' => 'string'],
                    'description' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Dimension' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'displayName' => ['type' => 'string'],
                    'internalName' => ['type' => 'string'],
                    'toBeExportedForShoebox' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricAvailability' => [
                'properties' => [
                    'timeGrain' => ['type' => 'string'],
                    'blobDuration' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricSpecification' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'displayName' => ['type' => 'string'],
                    'displayDescription' => ['type' => 'string'],
                    'unit' => ['type' => 'string'],
                    'aggregationType' => ['type' => 'string'],
                    'supportsInstanceLevelAggregation' => ['type' => 'boolean'],
                    'enableRegionalMdmAccount' => ['type' => 'boolean'],
                    'sourceMdmAccount' => ['type' => 'string'],
                    'sourceMdmNamespace' => ['type' => 'string'],
                    'metricFilterPattern' => ['type' => 'string'],
                    'fillGapWithZero' => ['type' => 'boolean'],
                    'isInternal' => ['type' => 'boolean'],
                    'dimensions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Dimension']
                    ],
                    'category' => ['type' => 'string'],
                    'availabilities' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/MetricAvailability']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ServiceSpecification' => [
                'properties' => ['metricSpecifications' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/MetricSpecification']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CsmOperationDescriptionProperties' => [
                'properties' => ['serviceSpecification' => ['$ref' => '#/definitions/ServiceSpecification']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CsmOperationDescription' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'display' => ['$ref' => '#/definitions/CsmOperationDisplay'],
                    'origin' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/CsmOperationDescriptionProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CsmOperationCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/CsmOperationDescription']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'Recommendation' => [
                'properties' => [
                    'creationTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'recommendationId' => ['type' => 'string'],
                    'resourceId' => ['type' => 'string'],
                    'resourceScope' => [
                        'type' => 'string',
                        'enum' => [
                            'ServerFarm',
                            'Subscription',
                            'WebSite'
                        ]
                    ],
                    'ruleName' => ['type' => 'string'],
                    'displayName' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'level' => [
                        'type' => 'string',
                        'enum' => [
                            'Critical',
                            'Warning',
                            'Information',
                            'NonUrgentSuggestion'
                        ]
                    ],
                    'channels' => [
                        'type' => 'string',
                        'enum' => [
                            'Notification',
                            'Api',
                            'Email',
                            'Webhook',
                            'All'
                        ]
                    ],
                    'tags' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'actionName' => ['type' => 'string'],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'nextNotificationTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'notificationExpirationTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'notifiedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'score' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'isDynamic' => ['type' => 'boolean'],
                    'extensionName' => ['type' => 'string'],
                    'bladeName' => ['type' => 'string'],
                    'forwardLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RecommendationRule' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'displayName' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'recommendationId' => [
                        'type' => 'string',
                        'format' => 'uuid'
                    ],
                    'description' => ['type' => 'string'],
                    'actionName' => ['type' => 'string'],
                    'level' => [
                        'type' => 'string',
                        'enum' => [
                            'Critical',
                            'Warning',
                            'Information',
                            'NonUrgentSuggestion'
                        ]
                    ],
                    'channels' => [
                        'type' => 'string',
                        'enum' => [
                            'Notification',
                            'Api',
                            'Email',
                            'Webhook',
                            'All'
                        ]
                    ],
                    'tags' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'isDynamic' => ['type' => 'boolean'],
                    'extensionName' => ['type' => 'string'],
                    'bladeName' => ['type' => 'string'],
                    'forwardLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Capability' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'value' => ['type' => 'string'],
                    'reason' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CsmMoveResourceEnvelope' => [
                'properties' => [
                    'targetResourceGroup' => ['type' => 'string'],
                    'resources' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GeoRegion_properties' => [
                'properties' => [
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'description' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'displayName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GeoRegion' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/GeoRegion_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GeoRegionCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/GeoRegion']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'SkuCapacity' => [
                'properties' => [
                    'minimum' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'maximum' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'default' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'scaleType' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GlobalCsmSkuDescription' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'tier' => ['type' => 'string'],
                    'capacity' => ['$ref' => '#/definitions/SkuCapacity'],
                    'locations' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'capabilities' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Capability']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PremierAddOnOffer_properties' => [
                'properties' => [
                    'sku' => ['type' => 'string'],
                    'product' => ['type' => 'string'],
                    'vendor' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'promoCodeRequired' => ['type' => 'boolean'],
                    'quota' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'webHostingPlanRestrictions' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Free',
                            'Shared',
                            'Basic',
                            'Standard',
                            'Premium'
                        ]
                    ],
                    'privacyPolicyUrl' => ['type' => 'string'],
                    'legalTermsUrl' => ['type' => 'string'],
                    'marketplacePublisher' => ['type' => 'string'],
                    'marketplaceOffer' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PremierAddOnOffer' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/PremierAddOnOffer_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PremierAddOnOfferCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PremierAddOnOffer']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'ResourceNameAvailability' => [
                'properties' => [
                    'nameAvailable' => ['type' => 'boolean'],
                    'reason' => [
                        'type' => 'string',
                        'enum' => [
                            'Invalid',
                            'AlreadyExists'
                        ]
                    ],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceNameAvailabilityRequest' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'Site',
                            'Slot',
                            'HostingEnvironment'
                        ]
                    ],
                    'isFqdn' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'type'
                ]
            ],
            'SkuInfos' => [
                'properties' => [
                    'resourceType' => ['type' => 'string'],
                    'skus' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/GlobalCsmSkuDescription']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SourceControl_properties' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'token' => ['type' => 'string'],
                    'tokenSecret' => ['type' => 'string'],
                    'refreshToken' => ['type' => 'string'],
                    'expirationTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SourceControl' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SourceControl_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SourceControlCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SourceControl']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'User_properties' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'publishingUserName' => ['type' => 'string'],
                    'publishingPassword' => ['type' => 'string'],
                    'publishingPasswordHash' => ['type' => 'string'],
                    'publishingPasswordHashSalt' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'User' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/User_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ValidateProperties' => [
                'properties' => [
                    'serverFarmId' => ['type' => 'string'],
                    'skuName' => ['type' => 'string'],
                    'needLinuxWorkers' => ['type' => 'boolean'],
                    'capacity' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'hostingEnvironment' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ValidateRequest' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'ServerFarm',
                            'Site'
                        ]
                    ],
                    'location' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/ValidateProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'type',
                    'location',
                    'properties'
                ]
            ],
            'ValidateResponseError' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ValidateResponse' => [
                'properties' => [
                    'status' => ['type' => 'string'],
                    'error' => ['$ref' => '#/definitions/ValidateResponseError']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FileSystemApplicationLogsConfig' => [
                'properties' => ['level' => [
                    'type' => 'string',
                    'enum' => [
                        'Off',
                        'Verbose',
                        'Information',
                        'Warning',
                        'Error'
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureTableStorageApplicationLogsConfig' => [
                'properties' => [
                    'level' => [
                        'type' => 'string',
                        'enum' => [
                            'Off',
                            'Verbose',
                            'Information',
                            'Warning',
                            'Error'
                        ]
                    ],
                    'sasUrl' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['sasUrl']
            ],
            'AzureBlobStorageApplicationLogsConfig' => [
                'properties' => [
                    'level' => [
                        'type' => 'string',
                        'enum' => [
                            'Off',
                            'Verbose',
                            'Information',
                            'Warning',
                            'Error'
                        ]
                    ],
                    'sasUrl' => ['type' => 'string'],
                    'retentionInDays' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationLogsConfig' => [
                'properties' => [
                    'fileSystem' => ['$ref' => '#/definitions/FileSystemApplicationLogsConfig'],
                    'azureTableStorage' => ['$ref' => '#/definitions/AzureTableStorageApplicationLogsConfig'],
                    'azureBlobStorage' => ['$ref' => '#/definitions/AzureBlobStorageApplicationLogsConfig']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureBlobStorageHttpLogsConfig' => [
                'properties' => [
                    'sasUrl' => ['type' => 'string'],
                    'retentionInDays' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'enabled' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DatabaseBackupSetting' => [
                'properties' => [
                    'databaseType' => [
                        'type' => 'string',
                        'enum' => [
                            'SqlAzure',
                            'MySql',
                            'LocalMySql',
                            'PostgreSql'
                        ]
                    ],
                    'name' => ['type' => 'string'],
                    'connectionStringName' => ['type' => 'string'],
                    'connectionString' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['databaseType']
            ],
            'BackupItem_properties' => [
                'properties' => [
                    'id' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ],
                    'storageAccountUrl' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'blobName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'InProgress',
                            'Failed',
                            'Succeeded',
                            'TimedOut',
                            'Created',
                            'Skipped',
                            'PartiallySucceeded',
                            'DeleteInProgress',
                            'DeleteFailed',
                            'Deleted'
                        ],
                        'readOnly' => TRUE
                    ],
                    'sizeInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'readOnly' => TRUE
                    ],
                    'created' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'log' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'databases' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DatabaseBackupSetting'],
                        'readOnly' => TRUE
                    ],
                    'scheduled' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'lastRestoreTimeStamp' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'finishedTimeStamp' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'correlationId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'websiteSizeInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupItem' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BackupItem_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupItemCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/BackupItem']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'BackupSchedule' => [
                'properties' => [
                    'frequencyInterval' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'frequencyUnit' => [
                        'type' => 'string',
                        'enum' => [
                            'Day',
                            'Hour'
                        ]
                    ],
                    'keepAtLeastOneBackup' => ['type' => 'boolean'],
                    'retentionPeriodInDays' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'lastExecutionTime' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'frequencyInterval',
                    'frequencyUnit',
                    'keepAtLeastOneBackup',
                    'retentionPeriodInDays'
                ]
            ],
            'BackupRequest_properties' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'enabled' => ['type' => 'boolean'],
                    'storageAccountUrl' => ['type' => 'string'],
                    'backupSchedule' => ['$ref' => '#/definitions/BackupSchedule'],
                    'databases' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DatabaseBackupSetting']
                    ],
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'Default',
                            'Clone',
                            'Relocation',
                            'Snapshot'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupRequest' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BackupRequest_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ConnStringValueTypePair' => [
                'properties' => [
                    'value' => ['type' => 'string'],
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'MySql',
                            'SQLServer',
                            'SQLAzure',
                            'Custom',
                            'NotificationHub',
                            'ServiceBus',
                            'EventHub',
                            'ApiHub',
                            'DocDb',
                            'RedisCache',
                            'PostgreSQL'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'value',
                    'type'
                ]
            ],
            'ConnectionStringDictionary' => [
                'properties' => ['properties' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/ConnStringValueTypePair']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CsmPublishingProfileOptions' => [
                'properties' => ['format' => [
                    'type' => 'string',
                    'enum' => [
                        'FileZilla3',
                        'WebDeploy',
                        'Ftp'
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CsmSlotEntity' => [
                'properties' => [
                    'targetSlot' => ['type' => 'string'],
                    'preserveVnet' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'targetSlot',
                    'preserveVnet'
                ]
            ],
            'LocalizableString' => [
                'properties' => [
                    'value' => ['type' => 'string'],
                    'localizedValue' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CsmUsageQuota' => [
                'properties' => [
                    'unit' => ['type' => 'string'],
                    'nextResetTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'currentValue' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'limit' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'name' => ['$ref' => '#/definitions/LocalizableString']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CsmUsageQuotaCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/CsmUsageQuota']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'ErrorEntity' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'extendedCode' => ['type' => 'string'],
                    'messageTemplate' => ['type' => 'string'],
                    'parameters' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'innerErrors' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ErrorEntity']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CustomHostnameAnalysisResult_properties' => [
                'properties' => [
                    'isHostnameAlreadyVerified' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'customDomainVerificationTest' => [
                        'type' => 'string',
                        'enum' => [
                            'Passed',
                            'Failed',
                            'Skipped'
                        ],
                        'readOnly' => TRUE
                    ],
                    'customDomainVerificationFailureInfo' => [
                        '$ref' => '#/definitions/ErrorEntity',
                        'readOnly' => TRUE
                    ],
                    'hasConflictOnScaleUnit' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'hasConflictAcrossSubscription' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'conflictingAppResourceId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'cNameRecords' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'txtRecords' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'aRecords' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'alternateCNameRecords' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'alternateTxtRecords' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CustomHostnameAnalysisResult' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/CustomHostnameAnalysisResult_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Deployment_properties' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'status' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'message' => ['type' => 'string'],
                    'author' => ['type' => 'string'],
                    'deployer' => ['type' => 'string'],
                    'authorEmail' => ['type' => 'string'],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'active' => ['type' => 'boolean'],
                    'details' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Deployment' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/Deployment_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeploymentCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Deployment']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'EnabledConfig' => [
                'properties' => ['enabled' => ['type' => 'boolean']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FileSystemHttpLogsConfig' => [
                'properties' => [
                    'retentionInMb' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'retentionInDays' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'enabled' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'HostNameBinding_properties' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'siteName' => ['type' => 'string'],
                    'domainId' => ['type' => 'string'],
                    'azureResourceName' => ['type' => 'string'],
                    'azureResourceType' => [
                        'type' => 'string',
                        'enum' => [
                            'Website',
                            'TrafficManager'
                        ]
                    ],
                    'customHostNameDnsRecordType' => [
                        'type' => 'string',
                        'enum' => [
                            'CName',
                            'A'
                        ]
                    ],
                    'hostNameType' => [
                        'type' => 'string',
                        'enum' => [
                            'Verified',
                            'Managed'
                        ]
                    ],
                    'sslState' => [
                        'type' => 'string',
                        'enum' => [
                            'Disabled',
                            'SniEnabled',
                            'IpBasedEnabled'
                        ]
                    ],
                    'thumbprint' => ['type' => 'string'],
                    'virtualIP' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'HostNameBinding' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/HostNameBinding_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'HostNameBindingCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HostNameBinding']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'HttpLogsConfig' => [
                'properties' => [
                    'fileSystem' => ['$ref' => '#/definitions/FileSystemHttpLogsConfig'],
                    'azureBlobStorage' => ['$ref' => '#/definitions/AzureBlobStorageHttpLogsConfig']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'HybridConnection_properties' => [
                'properties' => [
                    'serviceBusNamespace' => ['type' => 'string'],
                    'relayName' => ['type' => 'string'],
                    'relayArmUri' => ['type' => 'string'],
                    'hostname' => ['type' => 'string'],
                    'port' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'sendKeyName' => ['type' => 'string'],
                    'sendKeyValue' => ['type' => 'string'],
                    'serviceBusSuffix' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'HybridConnection' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/HybridConnection_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'HybridConnectionKey_properties' => [
                'properties' => [
                    'sendKeyName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'sendKeyValue' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'HybridConnectionKey' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/HybridConnectionKey_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Identifier_properties' => [
                'properties' => ['id' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Identifier' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/Identifier_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IdentifierCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Identifier']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'MSDeployCore' => [
                'properties' => [
                    'packageUri' => ['type' => 'string'],
                    'connectionString' => ['type' => 'string'],
                    'dbType' => ['type' => 'string'],
                    'setParametersXmlFileUri' => ['type' => 'string'],
                    'setParameters' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'skipAppData' => ['type' => 'boolean'],
                    'appOffline' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MSDeploy' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/MSDeployCore']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MSDeployLogEntry' => [
                'properties' => [
                    'time' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'Message',
                            'Warning',
                            'Error'
                        ],
                        'readOnly' => TRUE
                    ],
                    'message' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MSDeployLog_properties' => [
                'properties' => ['entries' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/MSDeployLogEntry'],
                    'readOnly' => TRUE
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MSDeployLog' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/MSDeployLog_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MSDeployStatus_properties' => [
                'properties' => [
                    'deployer' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'accepted',
                            'running',
                            'succeeded',
                            'failed',
                            'canceled'
                        ],
                        'readOnly' => TRUE
                    ],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'complete' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MSDeployStatus' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/MSDeployStatus_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MigrateMySqlRequest_properties' => [
                'properties' => [
                    'connectionString' => ['type' => 'string'],
                    'migrationType' => [
                        'type' => 'string',
                        'enum' => [
                            'LocalToRemote',
                            'RemoteToLocal'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MigrateMySqlRequest' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/MigrateMySqlRequest_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MigrateMySqlStatus_properties' => [
                'properties' => [
                    'migrationOperationStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'InProgress',
                            'Failed',
                            'Succeeded',
                            'TimedOut',
                            'Created'
                        ],
                        'readOnly' => TRUE
                    ],
                    'operationId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'localMySqlEnabled' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MigrateMySqlStatus' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/MigrateMySqlStatus_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VnetRoute_properties' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'startAddress' => ['type' => 'string'],
                    'endAddress' => ['type' => 'string'],
                    'routeType' => [
                        'type' => 'string',
                        'enum' => [
                            'DEFAULT',
                            'INHERITED',
                            'STATIC'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VnetRoute' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/VnetRoute_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VnetInfo_properties' => [
                'properties' => [
                    'vnetResourceId' => ['type' => 'string'],
                    'certThumbprint' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'certBlob' => ['type' => 'string'],
                    'routes' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VnetRoute'],
                        'readOnly' => TRUE
                    ],
                    'resyncRequired' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'dnsServers' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VnetInfo' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/VnetInfo_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RelayServiceConnectionEntity_properties' => [
                'properties' => [
                    'entityName' => ['type' => 'string'],
                    'entityConnectionString' => ['type' => 'string'],
                    'resourceType' => ['type' => 'string'],
                    'resourceConnectionString' => ['type' => 'string'],
                    'hostname' => ['type' => 'string'],
                    'port' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'biztalkUri' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RelayServiceConnectionEntity' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RelayServiceConnectionEntity_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkFeatures_properties' => [
                'properties' => [
                    'virtualNetworkName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'virtualNetworkConnection' => [
                        '$ref' => '#/definitions/VnetInfo',
                        'readOnly' => TRUE
                    ],
                    'hybridConnections' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RelayServiceConnectionEntity'],
                        'readOnly' => TRUE
                    ],
                    'hybridConnectionsV2' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HybridConnection'],
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkFeatures' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/NetworkFeatures_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Operation' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'InProgress',
                            'Failed',
                            'Succeeded',
                            'TimedOut',
                            'Created'
                        ]
                    ],
                    'errors' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ErrorEntity']
                    ],
                    'createdTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'modifiedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'expirationTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'geoMasterOperationId' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PerfMonSample' => [
                'properties' => [
                    'time' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'instanceName' => ['type' => 'string'],
                    'value' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'coreCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PerfMonSet' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'timeGrain' => ['type' => 'string'],
                    'values' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PerfMonSample']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PerfMonResponse' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'data' => ['$ref' => '#/definitions/PerfMonSet']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PerfMonCounterCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PerfMonResponse']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'PremierAddOn_properties' => [
                'properties' => [
                    'sku' => ['type' => 'string'],
                    'product' => ['type' => 'string'],
                    'vendor' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'marketplacePublisher' => ['type' => 'string'],
                    'marketplaceOffer' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PremierAddOn' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/PremierAddOn_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PublicCertificate_properties' => [
                'properties' => [
                    'blob' => ['type' => 'string'],
                    'publicCertificateLocation' => [
                        'type' => 'string',
                        'enum' => [
                            'CurrentUserMy',
                            'LocalMachineMy',
                            'Unknown'
                        ]
                    ],
                    'thumbprint' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PublicCertificate' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/PublicCertificate_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PublicCertificateCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PublicCertificate']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'RecoverResponse_properties' => [
                'properties' => ['operationId' => [
                    'type' => 'string',
                    'readOnly' => TRUE
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RecoverResponse' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RecoverResponse_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceMetricName' => [
                'properties' => [
                    'value' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'localizedValue' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceMetricProperty' => [
                'properties' => [
                    'key' => ['type' => 'string'],
                    'value' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceMetricValue' => [
                'properties' => [
                    'timestamp' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'average' => [
                        'type' => 'number',
                        'format' => 'double',
                        'readOnly' => TRUE
                    ],
                    'minimum' => [
                        'type' => 'number',
                        'format' => 'double',
                        'readOnly' => TRUE
                    ],
                    'maximum' => [
                        'type' => 'number',
                        'format' => 'double',
                        'readOnly' => TRUE
                    ],
                    'total' => [
                        'type' => 'number',
                        'format' => 'double',
                        'readOnly' => TRUE
                    ],
                    'count' => [
                        'type' => 'number',
                        'format' => 'double',
                        'readOnly' => TRUE
                    ],
                    'properties' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceMetricProperty'],
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceMetric' => [
                'properties' => [
                    'name' => [
                        '$ref' => '#/definitions/ResourceMetricName',
                        'readOnly' => TRUE
                    ],
                    'unit' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'timeGrain' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'resourceId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'metricValues' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceMetricValue'],
                        'readOnly' => TRUE
                    ],
                    'properties' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceMetricProperty'],
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceMetricAvailability' => [
                'properties' => [
                    'timeGrain' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'retention' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceMetricCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceMetric']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'ResourceMetricDefinition_properties' => [
                'properties' => [
                    'name' => [
                        '$ref' => '#/definitions/ResourceMetricName',
                        'readOnly' => TRUE
                    ],
                    'unit' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'primaryAggregationType' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'metricAvailabilities' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceMetricAvailability'],
                        'readOnly' => TRUE
                    ],
                    'resourceUri' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'properties' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string'],
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceMetricDefinition' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ResourceMetricDefinition_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceMetricDefinitionCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceMetricDefinition']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'RestoreRequest_properties' => [
                'properties' => [
                    'storageAccountUrl' => ['type' => 'string'],
                    'blobName' => ['type' => 'string'],
                    'overwrite' => ['type' => 'boolean'],
                    'siteName' => ['type' => 'string'],
                    'databases' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DatabaseBackupSetting']
                    ],
                    'ignoreConflictingHostNames' => ['type' => 'boolean'],
                    'ignoreDatabases' => ['type' => 'boolean'],
                    'operationType' => [
                        'type' => 'string',
                        'enum' => [
                            'Default',
                            'Clone',
                            'Relocation',
                            'Snapshot'
                        ]
                    ],
                    'adjustConnectionStrings' => ['type' => 'boolean'],
                    'hostingEnvironment' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RestoreRequest' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RestoreRequest_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RestoreResponse_properties' => [
                'properties' => ['operationId' => [
                    'type' => 'string',
                    'readOnly' => TRUE
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RestoreResponse' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RestoreResponse_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Site_properties' => [
                'properties' => [
                    'state' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'hostNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string'],
                        'readOnly' => TRUE
                    ],
                    'repositorySiteName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'usageState' => [
                        'type' => 'string',
                        'enum' => [
                            'Normal',
                            'Exceeded'
                        ],
                        'readOnly' => TRUE
                    ],
                    'enabled' => ['type' => 'boolean'],
                    'enabledHostNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string'],
                        'readOnly' => TRUE
                    ],
                    'availabilityState' => [
                        'type' => 'string',
                        'enum' => [
                            'Normal',
                            'Limited',
                            'DisasterRecoveryMode'
                        ],
                        'readOnly' => TRUE
                    ],
                    'hostNameSslStates' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HostNameSslState']
                    ],
                    'serverFarmId' => ['type' => 'string'],
                    'reserved' => ['type' => 'boolean'],
                    'lastModifiedTimeUtc' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'siteConfig' => ['$ref' => '#/definitions/SiteConfig'],
                    'trafficManagerHostNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string'],
                        'readOnly' => TRUE
                    ],
                    'scmSiteAlsoStopped' => ['type' => 'boolean'],
                    'targetSwapSlot' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'hostingEnvironmentProfile' => ['$ref' => '#/definitions/HostingEnvironmentProfile'],
                    'clientAffinityEnabled' => ['type' => 'boolean'],
                    'clientCertEnabled' => ['type' => 'boolean'],
                    'hostNamesDisabled' => ['type' => 'boolean'],
                    'outboundIpAddresses' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'containerSize' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'dailyMemoryTimeQuota' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'suspendedTill' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'maxNumberOfWorkers' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ],
                    'cloningInfo' => ['$ref' => '#/definitions/CloningInfo'],
                    'resourceGroup' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'isDefaultContainer' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'defaultHostName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'slotSwapStatus' => [
                        '$ref' => '#/definitions/SlotSwapStatus',
                        'readOnly' => TRUE
                    ],
                    'premiumAppDeployed' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'microService' => ['type' => 'string'],
                    'gatewaySiteName' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Site' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/Site_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteAuthSettings_properties' => [
                'properties' => [
                    'enabled' => ['type' => 'boolean'],
                    'runtimeVersion' => ['type' => 'string'],
                    'unauthenticatedClientAction' => [
                        'type' => 'string',
                        'enum' => [
                            'RedirectToLoginPage',
                            'AllowAnonymous'
                        ]
                    ],
                    'tokenStoreEnabled' => ['type' => 'boolean'],
                    'allowedExternalRedirectUrls' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'defaultProvider' => [
                        'type' => 'string',
                        'enum' => [
                            'AzureActiveDirectory',
                            'Facebook',
                            'Google',
                            'MicrosoftAccount',
                            'Twitter'
                        ]
                    ],
                    'tokenRefreshExtensionHours' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'clientId' => ['type' => 'string'],
                    'clientSecret' => ['type' => 'string'],
                    'issuer' => ['type' => 'string'],
                    'allowedAudiences' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'additionalLoginParams' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'googleClientId' => ['type' => 'string'],
                    'googleClientSecret' => ['type' => 'string'],
                    'googleOAuthScopes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'facebookAppId' => ['type' => 'string'],
                    'facebookAppSecret' => ['type' => 'string'],
                    'facebookOAuthScopes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'twitterConsumerKey' => ['type' => 'string'],
                    'twitterConsumerSecret' => ['type' => 'string'],
                    'microsoftAccountClientId' => ['type' => 'string'],
                    'microsoftAccountClientSecret' => ['type' => 'string'],
                    'microsoftAccountOAuthScopes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteAuthSettings' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SiteAuthSettings_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteCloneabilityCriterion' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'description' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteCloneability' => [
                'properties' => [
                    'result' => [
                        'type' => 'string',
                        'enum' => [
                            'Cloneable',
                            'PartiallyCloneable',
                            'NotCloneable'
                        ]
                    ],
                    'blockingFeatures' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SiteCloneabilityCriterion']
                    ],
                    'unsupportedFeatures' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SiteCloneabilityCriterion']
                    ],
                    'blockingCharacteristics' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SiteCloneabilityCriterion']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteConfigResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SiteConfig']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteConfigResourceCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SiteConfigResource']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'SiteConfigurationSnapshotInfo_properties' => [
                'properties' => [
                    'time' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'id' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteConfigurationSnapshotInfo' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SiteConfigurationSnapshotInfo_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteInstance_properties' => [
                'properties' => ['name' => [
                    'type' => 'string',
                    'readOnly' => TRUE
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteInstance' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SiteInstance_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteLogsConfig_properties' => [
                'properties' => [
                    'applicationLogs' => ['$ref' => '#/definitions/ApplicationLogsConfig'],
                    'httpLogs' => ['$ref' => '#/definitions/HttpLogsConfig'],
                    'failedRequestsTracing' => ['$ref' => '#/definitions/EnabledConfig'],
                    'detailedErrorMessages' => ['$ref' => '#/definitions/EnabledConfig']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteLogsConfig' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SiteLogsConfig_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SitePhpErrorLogFlag_properties' => [
                'properties' => [
                    'localLogErrors' => ['type' => 'string'],
                    'masterLogErrors' => ['type' => 'string'],
                    'localLogErrorsMaxLength' => ['type' => 'string'],
                    'masterLogErrorsMaxLength' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SitePhpErrorLogFlag' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SitePhpErrorLogFlag_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteSourceControl_properties' => [
                'properties' => [
                    'repoUrl' => ['type' => 'string'],
                    'branch' => ['type' => 'string'],
                    'isManualIntegration' => ['type' => 'boolean'],
                    'deploymentRollbackEnabled' => ['type' => 'boolean'],
                    'isMercurial' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SiteSourceControl' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SiteSourceControl_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SlotConfigNames' => [
                'properties' => [
                    'connectionStringNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'appSettingNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SlotConfigNamesResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SlotConfigNames']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SlotDifference_properties' => [
                'properties' => [
                    'type' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'settingType' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'diffRule' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'settingName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'valueInCurrentSlot' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'valueInTargetSlot' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'description' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SlotDifference' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SlotDifference_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SlotDifferenceCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SlotDifference']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'Snapshot_properties' => [
                'properties' => ['time' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'readOnly' => TRUE
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Snapshot' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/Snapshot_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SnapshotCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Snapshot']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'SnapshotRecoveryTarget' => [
                'properties' => [
                    'location' => ['type' => 'string'],
                    'id' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SnapshotRecoveryRequest_properties' => [
                'properties' => [
                    'snapshotTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'recoveryTarget' => ['$ref' => '#/definitions/SnapshotRecoveryTarget'],
                    'overwrite' => ['type' => 'boolean'],
                    'recoverConfiguration' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SnapshotRecoveryRequest' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SnapshotRecoveryRequest_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StorageMigrationOptions_properties' => [
                'properties' => [
                    'azurefilesConnectionString' => ['type' => 'string'],
                    'azurefilesShare' => ['type' => 'string'],
                    'switchSiteAfterMigration' => ['type' => 'boolean'],
                    'blockWriteAccessToSite' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StorageMigrationOptions' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/StorageMigrationOptions_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StorageMigrationResponse_properties' => [
                'properties' => ['operationId' => [
                    'type' => 'string',
                    'readOnly' => TRUE
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StorageMigrationResponse' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/StorageMigrationResponse_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StringDictionary' => [
                'properties' => ['properties' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VnetGateway_properties' => [
                'properties' => [
                    'vnetName' => ['type' => 'string'],
                    'vpnPackageUri' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VnetGateway' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/VnetGateway_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'WebAppCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Site']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'WebAppInstanceCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SiteInstance']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'VirtualIPMapping' => [
                'properties' => [
                    'virtualIP' => ['type' => 'string'],
                    'internalHttpPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'internalHttpsPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'inUse' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AddressResponse' => [
                'properties' => [
                    'serviceIpAddress' => ['type' => 'string'],
                    'internalIpAddress' => ['type' => 'string'],
                    'outboundIpAddresses' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'vipMappings' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualIPMapping']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkProfile' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'type' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'subnet' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'WorkerPool' => [
                'properties' => [
                    'workerSizeId' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'computeMode' => [
                        'type' => 'string',
                        'enum' => [
                            'Shared',
                            'Dedicated',
                            'Dynamic'
                        ]
                    ],
                    'workerSize' => ['type' => 'string'],
                    'workerCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'instanceNames' => [
                        'type' => 'array',
                        'items' => ['type' => 'string'],
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StampCapacity' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'availableCapacity' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'totalCapacity' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'unit' => ['type' => 'string'],
                    'computeMode' => [
                        'type' => 'string',
                        'enum' => [
                            'Shared',
                            'Dedicated',
                            'Dynamic'
                        ]
                    ],
                    'workerSize' => [
                        'type' => 'string',
                        'enum' => [
                            'Default',
                            'Small',
                            'Medium',
                            'Large'
                        ]
                    ],
                    'workerSizeId' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'excludeFromCapacityAllocation' => ['type' => 'boolean'],
                    'isApplicableForAllComputeModes' => ['type' => 'boolean'],
                    'siteMode' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkAccessControlEntry' => [
                'properties' => [
                    'action' => [
                        'type' => 'string',
                        'enum' => [
                            'Permit',
                            'Deny'
                        ]
                    ],
                    'description' => ['type' => 'string'],
                    'order' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'remoteSubnet' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AppServiceEnvironment' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Succeeded',
                            'Failed',
                            'Canceled',
                            'InProgress',
                            'Deleting'
                        ],
                        'readOnly' => TRUE
                    ],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'Preparing',
                            'Ready',
                            'Scaling',
                            'Deleting'
                        ],
                        'readOnly' => TRUE
                    ],
                    'vnetName' => ['type' => 'string'],
                    'vnetResourceGroupName' => ['type' => 'string'],
                    'vnetSubnetName' => ['type' => 'string'],
                    'virtualNetwork' => ['$ref' => '#/definitions/VirtualNetworkProfile'],
                    'internalLoadBalancingMode' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Web',
                            'Publishing'
                        ]
                    ],
                    'multiSize' => ['type' => 'string'],
                    'multiRoleCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'workerPools' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/WorkerPool']
                    ],
                    'ipsslAddressCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'databaseEdition' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'databaseServiceObjective' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'upgradeDomains' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ],
                    'subscriptionId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'dnsSuffix' => ['type' => 'string'],
                    'lastAction' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'lastActionResult' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'allowedMultiSizes' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'allowedWorkerSizes' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'maximumNumberOfMachines' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ],
                    'vipMappings' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualIPMapping'],
                        'readOnly' => TRUE
                    ],
                    'environmentCapacities' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/StampCapacity'],
                        'readOnly' => TRUE
                    ],
                    'networkAccessControlList' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/NetworkAccessControlEntry']
                    ],
                    'environmentIsHealthy' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'environmentStatus' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'resourceGroup' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'frontEndScaleFactor' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'defaultFrontEndScaleFactor' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ],
                    'apiManagementAccountId' => ['type' => 'string'],
                    'suspended' => ['type' => 'boolean'],
                    'dynamicCacheEnabled' => ['type' => 'boolean'],
                    'clusterSettings' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/NameValuePair']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'location',
                    'virtualNetwork',
                    'workerPools'
                ]
            ],
            'AppServiceEnvironmentCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AppServiceEnvironment']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'AppServiceEnvironmentResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AppServiceEnvironment']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AppServicePlan_properties' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'workerTierName' => ['type' => 'string'],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'Ready',
                            'Pending'
                        ],
                        'readOnly' => TRUE
                    ],
                    'subscription' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'adminSiteName' => ['type' => 'string'],
                    'hostingEnvironmentProfile' => ['$ref' => '#/definitions/HostingEnvironmentProfile'],
                    'maximumNumberOfWorkers' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ],
                    'geoRegion' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'perSiteScaling' => ['type' => 'boolean'],
                    'numberOfSites' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ],
                    'resourceGroup' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'reserved' => ['type' => 'boolean'],
                    'targetWorkerCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'targetWorkerSizeId' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'Succeeded',
                            'Failed',
                            'Canceled',
                            'InProgress',
                            'Deleting'
                        ],
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SkuDescription' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'tier' => ['type' => 'string'],
                    'size' => ['type' => 'string'],
                    'family' => ['type' => 'string'],
                    'capacity' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'skuCapacity' => ['$ref' => '#/definitions/SkuCapacity'],
                    'locations' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'capabilities' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Capability']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AppServicePlan' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/AppServicePlan_properties'],
                    'sku' => ['$ref' => '#/definitions/SkuDescription']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AppServicePlanCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AppServicePlan']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'HostingEnvironmentDiagnostics' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'diagnosicsOutput' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricAvailabilily' => [
                'properties' => [
                    'timeGrain' => ['type' => 'string'],
                    'retention' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricDefinition_properties' => [
                'properties' => [
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'unit' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'primaryAggregationType' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'metricAvailabilities' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/MetricAvailabilily'],
                        'readOnly' => TRUE
                    ],
                    'displayName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricDefinition' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/MetricDefinition_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SkuInfo' => [
                'properties' => [
                    'resourceType' => ['type' => 'string'],
                    'sku' => ['$ref' => '#/definitions/SkuDescription'],
                    'capacity' => ['$ref' => '#/definitions/SkuCapacity']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SkuInfoCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SkuInfo']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'StampCapacityCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/StampCapacity']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'Usage_properties' => [
                'properties' => [
                    'displayName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'resourceName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'unit' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'currentValue' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'readOnly' => TRUE
                    ],
                    'limit' => [
                        'type' => 'integer',
                        'format' => 'int64',
                        'readOnly' => TRUE
                    ],
                    'nextResetTime' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'computeMode' => [
                        'type' => 'string',
                        'enum' => [
                            'Shared',
                            'Dedicated',
                            'Dynamic'
                        ],
                        'readOnly' => TRUE
                    ],
                    'siteMode' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Usage' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/Usage_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UsageCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Usage']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'WorkerPoolResource' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/WorkerPool'],
                    'sku' => ['$ref' => '#/definitions/SkuDescription']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'WorkerPoolCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/WorkerPoolResource']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'HybridConnectionCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HybridConnection']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'HybridConnectionLimits_properties' => [
                'properties' => [
                    'current' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ],
                    'maximum' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'HybridConnectionLimits' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/HybridConnectionLimits_properties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ]
        ]
    ];
}
