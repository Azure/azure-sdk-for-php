<?php
namespace Microsoft\Azure\Management\ApiManagement\_2017_03_01;
final class ApiManagementClient
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
        $this->_Policy_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Policy($_client);
        $this->_PolicySnippets_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\PolicySnippets($_client);
        $this->_Regions_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Regions($_client);
        $this->_Api_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Api($_client);
        $this->_ApiOperation_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiOperation($_client);
        $this->_ApiOperationPolicy_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiOperationPolicy($_client);
        $this->_ApiProduct_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiProduct($_client);
        $this->_ApiPolicy_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiPolicy($_client);
        $this->_AuthorizationServer_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\AuthorizationServer($_client);
        $this->_Backend_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Backend($_client);
        $this->_Certificate_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Certificate($_client);
        $this->_ApiManagementOperations_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiManagementOperations($_client);
        $this->_ApiManagementService_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiManagementService($_client);
        $this->_EmailTemplate_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\EmailTemplate($_client);
        $this->_Group_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Group($_client);
        $this->_GroupUser_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\GroupUser($_client);
        $this->_IdentityProvider_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\IdentityProvider($_client);
        $this->_Logger_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Logger($_client);
        $this->_NetworkStatus_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\NetworkStatus($_client);
        $this->_OpenIdConnectProvider_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\OpenIdConnectProvider($_client);
        $this->_Product_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Product($_client);
        $this->_ProductApi_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ProductApi($_client);
        $this->_ProductGroup_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ProductGroup($_client);
        $this->_ProductSubscriptions_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ProductSubscriptions($_client);
        $this->_ProductPolicy_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ProductPolicy($_client);
        $this->_Property_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Property($_client);
        $this->_QuotaByCounterKeys_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\QuotaByCounterKeys($_client);
        $this->_QuotaByPeriodKeys_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\QuotaByPeriodKeys($_client);
        $this->_Reports_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Reports($_client);
        $this->_Subscription_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Subscription($_client);
        $this->_TenantAccess_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\TenantAccess($_client);
        $this->_TenantAccessGit_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\TenantAccessGit($_client);
        $this->_TenantConfiguration_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\TenantConfiguration($_client);
        $this->_User_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\User($_client);
        $this->_UserGroup_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\UserGroup($_client);
        $this->_UserSubscription_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\UserSubscription($_client);
        $this->_UserIdentities_group = new \Microsoft\Azure\Management\ApiManagement\_2017_03_01\UserIdentities($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Policy
     */
    public function getPolicy()
    {
        return $this->_Policy_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\PolicySnippets
     */
    public function getPolicySnippets()
    {
        return $this->_PolicySnippets_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Regions
     */
    public function getRegions()
    {
        return $this->_Regions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Api
     */
    public function getApi()
    {
        return $this->_Api_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiOperation
     */
    public function getApiOperation()
    {
        return $this->_ApiOperation_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiOperationPolicy
     */
    public function getApiOperationPolicy()
    {
        return $this->_ApiOperationPolicy_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiProduct
     */
    public function getApiProduct()
    {
        return $this->_ApiProduct_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiPolicy
     */
    public function getApiPolicy()
    {
        return $this->_ApiPolicy_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\AuthorizationServer
     */
    public function getAuthorizationServer()
    {
        return $this->_AuthorizationServer_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Backend
     */
    public function getBackend()
    {
        return $this->_Backend_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Certificate
     */
    public function getCertificate()
    {
        return $this->_Certificate_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiManagementOperations
     */
    public function getApiManagementOperations()
    {
        return $this->_ApiManagementOperations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiManagementService
     */
    public function getApiManagementService()
    {
        return $this->_ApiManagementService_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\EmailTemplate
     */
    public function getEmailTemplate()
    {
        return $this->_EmailTemplate_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Group
     */
    public function getGroup()
    {
        return $this->_Group_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\GroupUser
     */
    public function getGroupUser()
    {
        return $this->_GroupUser_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\IdentityProvider
     */
    public function getIdentityProvider()
    {
        return $this->_IdentityProvider_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Logger
     */
    public function getLogger()
    {
        return $this->_Logger_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\NetworkStatus
     */
    public function getNetworkStatus()
    {
        return $this->_NetworkStatus_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\OpenIdConnectProvider
     */
    public function getOpenIdConnectProvider()
    {
        return $this->_OpenIdConnectProvider_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Product
     */
    public function getProduct()
    {
        return $this->_Product_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ProductApi
     */
    public function getProductApi()
    {
        return $this->_ProductApi_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ProductGroup
     */
    public function getProductGroup()
    {
        return $this->_ProductGroup_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ProductSubscriptions
     */
    public function getProductSubscriptions()
    {
        return $this->_ProductSubscriptions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ProductPolicy
     */
    public function getProductPolicy()
    {
        return $this->_ProductPolicy_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Property
     */
    public function getProperty()
    {
        return $this->_Property_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\QuotaByCounterKeys
     */
    public function getQuotaByCounterKeys()
    {
        return $this->_QuotaByCounterKeys_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\QuotaByPeriodKeys
     */
    public function getQuotaByPeriodKeys()
    {
        return $this->_QuotaByPeriodKeys_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Reports
     */
    public function getReports()
    {
        return $this->_Reports_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Subscription
     */
    public function getSubscription()
    {
        return $this->_Subscription_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\TenantAccess
     */
    public function getTenantAccess()
    {
        return $this->_TenantAccess_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\TenantAccessGit
     */
    public function getTenantAccessGit()
    {
        return $this->_TenantAccessGit_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\TenantConfiguration
     */
    public function getTenantConfiguration()
    {
        return $this->_TenantConfiguration_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\User
     */
    public function getUser()
    {
        return $this->_User_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\UserGroup
     */
    public function getUserGroup()
    {
        return $this->_UserGroup_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\UserSubscription
     */
    public function getUserSubscription()
    {
        return $this->_UserSubscription_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\_2017_03_01\UserIdentities
     */
    public function getUserIdentities()
    {
        return $this->_UserIdentities_group;
    }
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Policy
     */
    private $_Policy_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\PolicySnippets
     */
    private $_PolicySnippets_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Regions
     */
    private $_Regions_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Api
     */
    private $_Api_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiOperation
     */
    private $_ApiOperation_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiOperationPolicy
     */
    private $_ApiOperationPolicy_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiProduct
     */
    private $_ApiProduct_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiPolicy
     */
    private $_ApiPolicy_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\AuthorizationServer
     */
    private $_AuthorizationServer_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Backend
     */
    private $_Backend_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Certificate
     */
    private $_Certificate_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiManagementOperations
     */
    private $_ApiManagementOperations_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ApiManagementService
     */
    private $_ApiManagementService_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\EmailTemplate
     */
    private $_EmailTemplate_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Group
     */
    private $_Group_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\GroupUser
     */
    private $_GroupUser_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\IdentityProvider
     */
    private $_IdentityProvider_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Logger
     */
    private $_Logger_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\NetworkStatus
     */
    private $_NetworkStatus_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\OpenIdConnectProvider
     */
    private $_OpenIdConnectProvider_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Product
     */
    private $_Product_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ProductApi
     */
    private $_ProductApi_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ProductGroup
     */
    private $_ProductGroup_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ProductSubscriptions
     */
    private $_ProductSubscriptions_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\ProductPolicy
     */
    private $_ProductPolicy_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Property
     */
    private $_Property_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\QuotaByCounterKeys
     */
    private $_QuotaByCounterKeys_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\QuotaByPeriodKeys
     */
    private $_QuotaByPeriodKeys_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Reports
     */
    private $_Reports_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\Subscription
     */
    private $_Subscription_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\TenantAccess
     */
    private $_TenantAccess_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\TenantAccessGit
     */
    private $_TenantAccessGit_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\TenantConfiguration
     */
    private $_TenantConfiguration_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\User
     */
    private $_User_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\UserGroup
     */
    private $_UserGroup_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\UserSubscription
     */
    private $_UserSubscription_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\_2017_03_01\UserIdentities
     */
    private $_UserIdentities_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/policies' => ['get' => [
                'operationId' => 'Policy_ListByService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'scope',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string',
                        'enum' => [
                            'Tenant',
                            'Product',
                            'Api',
                            'Operation',
                            'All'
                        ]
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PolicyCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/policies/{policyId}' => [
                'get' => [
                    'operationId' => 'Policy_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['policy']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PolicyContract']]]
                ],
                'put' => [
                    'operationId' => 'Policy_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['policy']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/PolicyContract'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/PolicyContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/PolicyContract']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Policy_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['policy']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/policySnippets' => ['get' => [
                'operationId' => 'PolicySnippets_ListByService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'scope',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string',
                        'enum' => [
                            'Tenant',
                            'Product',
                            'Api',
                            'Operation',
                            'All'
                        ]
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PolicySnippetsCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/regions' => ['get' => [
                'operationId' => 'Regions_ListByService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RegionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/apis' => ['get' => [
                'operationId' => 'Api_ListByService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApiCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/apis/{apiId}' => [
                'get' => [
                    'operationId' => 'Api_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApiContract']]]
                ],
                'put' => [
                    'operationId' => 'Api_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ApiCreateOrUpdateParameter'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => FALSE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/ApiContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/ApiContract']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Api_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ApiUpdateContract'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'delete' => [
                    'operationId' => 'Api_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/apis/{apiId}/operations' => ['get' => [
                'operationId' => 'ApiOperation_ListByApi',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'apiId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/apis/{apiId}/operations/{operationId}' => [
                'get' => [
                    'operationId' => 'ApiOperation_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'operationId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationContract']]]
                ],
                'put' => [
                    'operationId' => 'ApiOperation_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'operationId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/OperationContract'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/OperationContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/OperationContract']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'ApiOperation_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'operationId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/OperationUpdateContract'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'delete' => [
                    'operationId' => 'ApiOperation_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'operationId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/apis/{apiId}/operations/{operationId}/policies/{policyId}' => [
                'get' => [
                    'operationId' => 'ApiOperationPolicy_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'operationId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['policy']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PolicyContract']]]
                ],
                'put' => [
                    'operationId' => 'ApiOperationPolicy_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'operationId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['policy']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/PolicyContract'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/PolicyContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/PolicyContract']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'ApiOperationPolicy_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'operationId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['policy']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/apis/{apiId}/products' => ['get' => [
                'operationId' => 'ApiProduct_ListByApis',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'apiId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProductCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/apis/{apiId}/policies' => ['get' => [
                'operationId' => 'ApiPolicy_ListByApi',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'apiId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PolicyCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/apis/{apiId}/policies/{policyId}' => [
                'get' => [
                    'operationId' => 'ApiPolicy_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['policy']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PolicyContract']]]
                ],
                'put' => [
                    'operationId' => 'ApiPolicy_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['policy']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/PolicyContract'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/PolicyContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/PolicyContract']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'ApiPolicy_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['policy']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/authorizationServers' => ['get' => [
                'operationId' => 'AuthorizationServer_ListByService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AuthorizationServerCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/authorizationServers/{authsid}' => [
                'get' => [
                    'operationId' => 'AuthorizationServer_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authsid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AuthorizationServerContract']]]
                ],
                'put' => [
                    'operationId' => 'AuthorizationServer_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authsid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/AuthorizationServerContract'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/AuthorizationServerContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/AuthorizationServerContract']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'AuthorizationServer_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authsid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/AuthorizationServerUpdateContract'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'delete' => [
                    'operationId' => 'AuthorizationServer_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authsid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/backends' => ['get' => [
                'operationId' => 'Backend_ListByService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackendCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/backends/{backendid}' => [
                'get' => [
                    'operationId' => 'Backend_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backendid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackendContract']]]
                ],
                'put' => [
                    'operationId' => 'Backend_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backendid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/BackendContract'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/BackendContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/BackendContract']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Backend_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backendid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/BackendUpdateParameters'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'delete' => [
                    'operationId' => 'Backend_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backendid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/certificates' => ['get' => [
                'operationId' => 'Certificate_ListByService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CertificateCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/certificates/{certificateId}' => [
                'get' => [
                    'operationId' => 'Certificate_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CertificateContract']]]
                ],
                'put' => [
                    'operationId' => 'Certificate_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/CertificateCreateOrUpdateParameters'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => FALSE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/CertificateContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/CertificateContract']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Certificate_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/providers/Microsoft.ApiManagement/operations' => ['get' => [
                'operationId' => 'ApiManagementOperations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2017-03-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/restore' => ['post' => [
                'operationId' => 'ApiManagementService_Restore',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/ApiManagementServiceBackupRestoreParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ApiManagementServiceResource']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/backup' => ['post' => [
                'operationId' => 'ApiManagementService_Backup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/ApiManagementServiceBackupRestoreParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ApiManagementServiceResource']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}' => [
                'put' => [
                    'operationId' => 'ApiManagementService_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ApiManagementServiceResource'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ApiManagementServiceResource']],
                        '201' => ['schema' => ['$ref' => '#/definitions/ApiManagementServiceResource']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'ApiManagementService_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ApiManagementServiceUpdateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ApiManagementServiceResource']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'ApiManagementService_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApiManagementServiceResource']]]
                ],
                'delete' => [
                    'operationId' => 'ApiManagementService_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service' => ['get' => [
                'operationId' => 'ApiManagementService_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApiManagementServiceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ApiManagement/service' => ['get' => [
                'operationId' => 'ApiManagementService_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApiManagementServiceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/getssotoken' => ['post' => [
                'operationId' => 'ApiManagementService_GetSsoToken',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApiManagementServiceGetSsoTokenResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ApiManagement/checkNameAvailability' => ['post' => [
                'operationId' => 'ApiManagementService_CheckNameAvailability',
                'parameters' => [
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/ApiManagementServiceCheckNameAvailabilityParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApiManagementServiceNameAvailabilityResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/applynetworkconfigurationupdates' => ['post' => [
                'operationId' => 'ApiManagementService_ApplyNetworkConfigurationUpdates',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => FALSE,
                        '$ref' => '#/definitions/ApiManagementServiceApplyNetworkConfigurationParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '200' => ['schema' => ['$ref' => '#/definitions/ApiManagementServiceResource']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/templates' => ['get' => [
                'operationId' => 'EmailTemplate_ListByService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/EmailTemplateCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/templates/{templateName}' => [
                'get' => [
                    'operationId' => 'EmailTemplate_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'templateName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => [
                                'applicationApprovedNotificationMessage',
                                'accountClosedDeveloper',
                                'quotaLimitApproachingDeveloperNotificationMessage',
                                'newDeveloperNotificationMessage',
                                'emailChangeIdentityDefault',
                                'inviteUserNotificationMessage',
                                'newCommentNotificationMessage',
                                'confirmSignUpIdentityDefault',
                                'newIssueNotificationMessage',
                                'purchaseDeveloperNotificationMessage',
                                'passwordResetIdentityDefault',
                                'passwordResetByAdminNotificationMessage',
                                'rejectDeveloperNotificationMessage',
                                'requestDeveloperNotificationMessage'
                            ]
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/EmailTemplateContract']]]
                ],
                'put' => [
                    'operationId' => 'EmailTemplate_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'templateName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => [
                                'applicationApprovedNotificationMessage',
                                'accountClosedDeveloper',
                                'quotaLimitApproachingDeveloperNotificationMessage',
                                'newDeveloperNotificationMessage',
                                'emailChangeIdentityDefault',
                                'inviteUserNotificationMessage',
                                'newCommentNotificationMessage',
                                'confirmSignUpIdentityDefault',
                                'newIssueNotificationMessage',
                                'purchaseDeveloperNotificationMessage',
                                'passwordResetIdentityDefault',
                                'passwordResetByAdminNotificationMessage',
                                'rejectDeveloperNotificationMessage',
                                'requestDeveloperNotificationMessage'
                            ]
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/EmailTemplateUpdateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/EmailTemplateContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/EmailTemplateContract']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'EmailTemplate_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'templateName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => [
                                'applicationApprovedNotificationMessage',
                                'accountClosedDeveloper',
                                'quotaLimitApproachingDeveloperNotificationMessage',
                                'newDeveloperNotificationMessage',
                                'emailChangeIdentityDefault',
                                'inviteUserNotificationMessage',
                                'newCommentNotificationMessage',
                                'confirmSignUpIdentityDefault',
                                'newIssueNotificationMessage',
                                'purchaseDeveloperNotificationMessage',
                                'passwordResetIdentityDefault',
                                'passwordResetByAdminNotificationMessage',
                                'rejectDeveloperNotificationMessage',
                                'requestDeveloperNotificationMessage'
                            ]
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/EmailTemplateUpdateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'delete' => [
                    'operationId' => 'EmailTemplate_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'templateName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => [
                                'applicationApprovedNotificationMessage',
                                'accountClosedDeveloper',
                                'quotaLimitApproachingDeveloperNotificationMessage',
                                'newDeveloperNotificationMessage',
                                'emailChangeIdentityDefault',
                                'inviteUserNotificationMessage',
                                'newCommentNotificationMessage',
                                'confirmSignUpIdentityDefault',
                                'newIssueNotificationMessage',
                                'purchaseDeveloperNotificationMessage',
                                'passwordResetIdentityDefault',
                                'passwordResetByAdminNotificationMessage',
                                'rejectDeveloperNotificationMessage',
                                'requestDeveloperNotificationMessage'
                            ]
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/groups' => ['get' => [
                'operationId' => 'Group_ListByService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GroupCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/groups/{groupId}' => [
                'get' => [
                    'operationId' => 'Group_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'groupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GroupContract']]]
                ],
                'put' => [
                    'operationId' => 'Group_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'groupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/GroupCreateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/GroupContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/GroupContract']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Group_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'groupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/GroupUpdateParameters'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'delete' => [
                    'operationId' => 'Group_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'groupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/groups/{groupId}/users' => ['get' => [
                'operationId' => 'GroupUser_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'groupId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/UserCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/groups/{groupId}/users/{uid}' => [
                'put' => [
                    'operationId' => 'GroupUser_Create',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'groupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'uid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/UserContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/UserContract']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'GroupUser_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'groupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'uid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/identityProviders' => ['get' => [
                'operationId' => 'IdentityProvider_ListByService',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
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
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IdentityProviderList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/identityProviders/{identityProviderName}' => [
                'get' => [
                    'operationId' => 'IdentityProvider_Get',
                    'parameters' => [
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
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
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'identityProviderName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => [
                                'facebook',
                                'google',
                                'microsoft',
                                'twitter',
                                'aad',
                                'aadB2C'
                            ]
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IdentityProviderContract']]]
                ],
                'put' => [
                    'operationId' => 'IdentityProvider_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'identityProviderName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => [
                                'facebook',
                                'google',
                                'microsoft',
                                'twitter',
                                'aad',
                                'aadB2C'
                            ]
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/IdentityProviderContract'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/IdentityProviderContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/IdentityProviderContract']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'IdentityProvider_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'identityProviderName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => [
                                'facebook',
                                'google',
                                'microsoft',
                                'twitter',
                                'aad',
                                'aadB2C'
                            ]
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/IdentityProviderUpdateParameters'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'delete' => [
                    'operationId' => 'IdentityProvider_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'identityProviderName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => [
                                'facebook',
                                'google',
                                'microsoft',
                                'twitter',
                                'aad',
                                'aadB2C'
                            ]
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/loggers' => ['get' => [
                'operationId' => 'Logger_ListByService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LoggerCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/loggers/{loggerid}' => [
                'get' => [
                    'operationId' => 'Logger_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'loggerid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LoggerContract']]]
                ],
                'put' => [
                    'operationId' => 'Logger_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'loggerid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/LoggerContract'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/LoggerContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/LoggerContract']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Logger_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'loggerid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/LoggerUpdateContract'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'delete' => [
                    'operationId' => 'Logger_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'loggerid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/networkstatus' => ['get' => [
                'operationId' => 'NetworkStatus_ListByService',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
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
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkStatusContract']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/locations/{locationName}/networkstatus' => ['get' => [
                'operationId' => 'NetworkStatus_ListByLocation',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
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
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'locationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkStatusContract']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/openidConnectProviders' => ['get' => [
                'operationId' => 'OpenIdConnectProvider_ListByService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OpenIdConnectProviderCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/openidConnectProviders/{opid}' => [
                'get' => [
                    'operationId' => 'OpenIdConnectProvider_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'opid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OpenidConnectProviderContract']]]
                ],
                'put' => [
                    'operationId' => 'OpenIdConnectProvider_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'opid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/OpenidConnectProviderContract'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/OpenidConnectProviderContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/OpenidConnectProviderContract']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'OpenIdConnectProvider_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'opid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/OpenidConnectProviderUpdateContract'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'delete' => [
                    'operationId' => 'OpenIdConnectProvider_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'opid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/products' => ['get' => [
                'operationId' => 'Product_ListByService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'expandGroups',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProductCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/products/{productId}' => [
                'get' => [
                    'operationId' => 'Product_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'productId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProductContract']]]
                ],
                'put' => [
                    'operationId' => 'Product_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'productId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ProductContract'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/ProductContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/ProductContract']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Product_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'productId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ProductUpdateParameters'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'delete' => [
                    'operationId' => 'Product_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'productId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'deleteSubscriptions',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/products/{productId}/apis' => ['get' => [
                'operationId' => 'ProductApi_ListByProduct',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'productId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApiCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/products/{productId}/apis/{apiId}' => [
                'put' => [
                    'operationId' => 'ProductApi_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'productId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/ApiContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/ApiContract']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'ProductApi_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'productId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'apiId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/products/{productId}/groups' => ['get' => [
                'operationId' => 'ProductGroup_ListByProduct',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'productId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GroupCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/products/{productId}/groups/{groupId}' => [
                'put' => [
                    'operationId' => 'ProductGroup_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'productId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'groupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/GroupContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/GroupContract']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'ProductGroup_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'productId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'groupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/products/{productId}/subscriptions' => ['get' => [
                'operationId' => 'ProductSubscriptions_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'productId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SubscriptionCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/products/{productId}/policies' => ['get' => [
                'operationId' => 'ProductPolicy_ListByProduct',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'productId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PolicyCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/products/{productId}/policies/{policyId}' => [
                'get' => [
                    'operationId' => 'ProductPolicy_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'productId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['policy']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PolicyContract']]]
                ],
                'put' => [
                    'operationId' => 'ProductPolicy_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'productId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['policy']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/PolicyContract'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/PolicyContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/PolicyContract']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'ProductPolicy_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'productId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['policy']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/properties' => ['get' => [
                'operationId' => 'Property_ListByService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PropertyCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/properties/{propId}' => [
                'get' => [
                    'operationId' => 'Property_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'propId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PropertyContract']]]
                ],
                'put' => [
                    'operationId' => 'Property_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'propId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/PropertyContract'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/PropertyContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/PropertyContract']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Property_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'propId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/PropertyUpdateParameters'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'delete' => [
                    'operationId' => 'Property_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'propId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/quotas/{quotaCounterKey}' => [
                'get' => [
                    'operationId' => 'QuotaByCounterKeys_ListByService',
                    'parameters' => [
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
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
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'quotaCounterKey',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/QuotaCounterCollection']]]
                ],
                'patch' => [
                    'operationId' => 'QuotaByCounterKeys_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'quotaCounterKey',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/QuotaCounterValueContractProperties'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/quotas/{quotaCounterKey}/{quotaPeriodKey}' => [
                'get' => [
                    'operationId' => 'QuotaByPeriodKeys_Get',
                    'parameters' => [
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
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
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'quotaCounterKey',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'quotaPeriodKey',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/QuotaCounterContract']]]
                ],
                'patch' => [
                    'operationId' => 'QuotaByPeriodKeys_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'quotaCounterKey',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'quotaPeriodKey',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/QuotaCounterValueContractProperties'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/reports/{byApiId}' => ['get' => [
                'operationId' => 'Reports_ListByApi',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'byApiId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['byApi']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ReportCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/reports/{byUserId}' => ['get' => [
                'operationId' => 'Reports_ListByUser',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'byUserId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['byUser']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ReportCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/reports/{byOperationId}' => ['get' => [
                'operationId' => 'Reports_ListByOperation',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'byOperationId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['byOperation']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ReportCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/reports/{byProductId}' => ['get' => [
                'operationId' => 'Reports_ListByProduct',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'byProductId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['byProduct']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ReportCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/reports/{byGeoId}' => ['get' => [
                'operationId' => 'Reports_ListByGeo',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'byGeoId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['byGeo']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ReportCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/reports/{bySubscriptionId}' => ['get' => [
                'operationId' => 'Reports_ListBySubscription',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'bySubscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['bySubscription']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ReportCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/reports/{byTimeId}' => ['get' => [
                'operationId' => 'Reports_ListByTime',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'byTimeId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['byTime']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'interval',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ReportCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/reports/{byRequestId}' => ['get' => [
                'operationId' => 'Reports_ListByRequest',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'byRequestId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['byRequest']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RequestReportCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/subscriptions' => ['get' => [
                'operationId' => 'Subscription_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SubscriptionCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/subscriptions/{sid}' => [
                'get' => [
                    'operationId' => 'Subscription_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'sid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SubscriptionContract']]]
                ],
                'put' => [
                    'operationId' => 'Subscription_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'sid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/SubscriptionCreateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/SubscriptionContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/SubscriptionContract']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Subscription_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'sid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/SubscriptionUpdateParameters'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'delete' => [
                    'operationId' => 'Subscription_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'sid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/subscriptions/{sid}/regeneratePrimaryKey' => ['post' => [
                'operationId' => 'Subscription_RegeneratePrimaryKey',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'sid',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/subscriptions/{sid}/regenerateSecondaryKey' => ['post' => [
                'operationId' => 'Subscription_RegenerateSecondaryKey',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'sid',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/tenant/{accessName}' => [
                'get' => [
                    'operationId' => 'TenantAccess_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'accessName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['access']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AccessInformationContract']]]
                ],
                'patch' => [
                    'operationId' => 'TenantAccess_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/AccessInformationUpdateParameters'
                        ],
                        [
                            'name' => 'accessName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['access']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/tenant/{accessName}/regeneratePrimaryKey' => ['post' => [
                'operationId' => 'TenantAccess_RegeneratePrimaryKey',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'accessName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['access']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/tenant/{accessName}/regenerateSecondaryKey' => ['post' => [
                'operationId' => 'TenantAccess_RegenerateSecondaryKey',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'accessName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['access']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/tenant/{accessName}/git' => ['get' => [
                'operationId' => 'TenantAccessGit_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'accessName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['access']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AccessInformationContract']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/tenant/{accessName}/git/regeneratePrimaryKey' => ['post' => [
                'operationId' => 'TenantAccessGit_RegeneratePrimaryKey',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'accessName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['access']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/tenant/{accessName}/git/regenerateSecondaryKey' => ['post' => [
                'operationId' => 'TenantAccessGit_RegenerateSecondaryKey',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'accessName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['access']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/tenant/{configurationName}/deploy' => ['post' => [
                'operationId' => 'TenantConfiguration_Deploy',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/DeployConfigurationParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'configurationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['configuration']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationResultContract']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/tenant/{configurationName}/save' => ['post' => [
                'operationId' => 'TenantConfiguration_Save',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/SaveConfigurationParameter'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'configurationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['configuration']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationResultContract']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/tenant/{configurationName}/validate' => ['post' => [
                'operationId' => 'TenantConfiguration_Validate',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/DeployConfigurationParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'configurationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['configuration']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationResultContract']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/tenant/{configurationName}/syncState' => ['get' => [
                'operationId' => 'TenantConfiguration_GetSyncState',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'configurationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['configuration']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TenantConfigurationSyncStateContract']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/users' => ['get' => [
                'operationId' => 'User_ListByService',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/UserCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/users/{uid}' => [
                'get' => [
                    'operationId' => 'User_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'uid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/UserContract']]]
                ],
                'put' => [
                    'operationId' => 'User_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'uid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/UserCreateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/UserContract']],
                        '200' => ['schema' => ['$ref' => '#/definitions/UserContract']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'User_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'uid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/UserUpdateParameters'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '204' => [],
                        '405' => ['schema' => ['$ref' => '#/definitions/ErrorResponse']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'User_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'uid',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'deleteSubscriptions',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'boolean'
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/users/{uid}/generateSsoUrl' => ['post' => [
                'operationId' => 'User_GenerateSsoUrl',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'uid',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GenerateSsoUrlResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/users/{uid}/token' => ['post' => [
                'operationId' => 'User_GetSharedAccessToken',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'uid',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/UserTokenParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/UserTokenResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/users/{uid}/groups' => ['get' => [
                'operationId' => 'UserGroup_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'uid',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GroupCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/users/{uid}/subscriptions' => ['get' => [
                'operationId' => 'UserSubscription_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'uid',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SubscriptionCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ApiManagement/service/{serviceName}/users/{uid}/identities' => ['get' => [
                'operationId' => 'UserIdentities_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'uid',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/UserIdentityCollection']]]
            ]]
        ],
        'definitions' => [
            'ErrorFieldContract' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string'],
                'target' => ['type' => 'string']
            ]],
            'ErrorResponse' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string'],
                'details' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ErrorFieldContract']
                ]
            ]],
            'PolicyContractProperties' => ['properties' => ['policyContent' => ['type' => 'string']]],
            'PolicyContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/PolicyContractProperties']]],
            'PolicyCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/PolicyContract']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'PolicySnippetContract' => ['properties' => [
                'name' => ['type' => 'string'],
                'content' => ['type' => 'string'],
                'toolTip' => ['type' => 'string'],
                'scope' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'PolicySnippetsCollection' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/PolicySnippetContract']
            ]]],
            'RegionContract' => ['properties' => [
                'name' => ['type' => 'string'],
                'isMasterRegion' => ['type' => 'boolean'],
                'isDeleted' => ['type' => 'boolean']
            ]],
            'RegionListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RegionContract']
                ],
                'count' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'ApiContractProperties' => ['properties' => [
                'displayName' => ['type' => 'string'],
                'serviceUrl' => ['type' => 'string'],
                'path' => ['type' => 'string'],
                'protocols' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'http',
                            'https'
                        ]
                    ]
                ]
            ]],
            'ApiContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/ApiContractProperties']]],
            'ApiCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ApiContract']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ApiCreateOrUpdateProperties' => ['properties' => [
                'contentValue' => ['type' => 'string'],
                'contentFormat' => [
                    'type' => 'string',
                    'enum' => [
                        'wadl-xml',
                        'wadl-link-json',
                        'swagger-json',
                        'swagger-link-json',
                        'wsdl',
                        'wsdl-link'
                    ]
                ]
            ]],
            'ApiCreateOrUpdateParameter' => ['properties' => ['properties' => ['$ref' => '#/definitions/ApiCreateOrUpdateProperties']]],
            'ApiContractUpdateProperties' => ['properties' => [
                'displayName' => ['type' => 'string'],
                'serviceUrl' => ['type' => 'string'],
                'path' => ['type' => 'string'],
                'protocols' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'http',
                            'https'
                        ]
                    ]
                ]
            ]],
            'ApiUpdateContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/ApiContractUpdateProperties']]],
            'OAuth2AuthenticationSettingsContract' => ['properties' => [
                'authorizationServerId' => ['type' => 'string'],
                'scope' => ['type' => 'string']
            ]],
            'AuthenticationSettingsContract' => ['properties' => ['oAuth2' => ['$ref' => '#/definitions/OAuth2AuthenticationSettingsContract']]],
            'SubscriptionKeyParameterNamesContract' => ['properties' => [
                'header' => ['type' => 'string'],
                'query' => ['type' => 'string']
            ]],
            'ApiEntityBaseContract' => ['properties' => [
                'description' => ['type' => 'string'],
                'authenticationSettings' => ['$ref' => '#/definitions/AuthenticationSettingsContract'],
                'subscriptionKeyParameterNames' => ['$ref' => '#/definitions/SubscriptionKeyParameterNamesContract'],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'http',
                        'soap'
                    ]
                ],
                'apiRevision' => ['type' => 'string'],
                'isCurrent' => ['type' => 'boolean'],
                'isOnline' => ['type' => 'boolean']
            ]],
            'OperationContractProperties' => ['properties' => [
                'displayName' => ['type' => 'string'],
                'method' => ['type' => 'string'],
                'urlTemplate' => ['type' => 'string']
            ]],
            'OperationContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/OperationContractProperties']]],
            'OperationCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/OperationContract']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'OperationUpdateContractProperties' => ['properties' => [
                'displayName' => ['type' => 'string'],
                'method' => ['type' => 'string'],
                'urlTemplate' => ['type' => 'string']
            ]],
            'ParameterContract' => ['properties' => [
                'name' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'defaultValue' => ['type' => 'string'],
                'required' => ['type' => 'boolean'],
                'values' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'RepresentationContract' => ['properties' => [
                'contentType' => ['type' => 'string'],
                'sample' => ['type' => 'string'],
                'schemaId' => ['type' => 'string'],
                'typeName' => ['type' => 'string'],
                'formParameters' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ParameterContract']
                ]
            ]],
            'RequestContract' => ['properties' => [
                'description' => ['type' => 'string'],
                'queryParameters' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ParameterContract']
                ],
                'headers' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ParameterContract']
                ],
                'representations' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RepresentationContract']
                ]
            ]],
            'ResponseContract' => ['properties' => [
                'statusCode' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'description' => ['type' => 'string'],
                'representations' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RepresentationContract']
                ],
                'headers' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ParameterContract']
                ]
            ]],
            'OperationEntityBaseContract' => ['properties' => [
                'templateParameters' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ParameterContract']
                ],
                'description' => ['type' => 'string'],
                'request' => ['$ref' => '#/definitions/RequestContract'],
                'responses' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ResponseContract']
                ],
                'policies' => ['type' => 'string']
            ]],
            'OperationUpdateContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/OperationUpdateContractProperties']]],
            'ProductUpdateProperties' => ['properties' => ['name' => ['type' => 'string']]],
            'ProductContractProperties' => ['properties' => ['displayName' => ['type' => 'string']]],
            'ProductEntityBaseParameters' => ['properties' => [
                'description' => ['type' => 'string'],
                'terms' => ['type' => 'string'],
                'subscriptionRequired' => ['type' => 'boolean'],
                'approvalRequired' => ['type' => 'boolean'],
                'subscriptionsLimit' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'notPublished',
                        'published'
                    ]
                ]
            ]],
            'ProductContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/ProductContractProperties']]],
            'ProductCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ProductContract']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'AuthorizationServerContractProperties' => ['properties' => [
                'displayName' => ['type' => 'string'],
                'clientRegistrationEndpoint' => ['type' => 'string'],
                'authorizationEndpoint' => ['type' => 'string'],
                'grantTypes' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'authorizationCode',
                            'implicit',
                            'resourceOwnerPassword',
                            'clientCredentials'
                        ]
                    ]
                ],
                'clientId' => ['type' => 'string']
            ]],
            'AuthorizationServerContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/AuthorizationServerContractProperties']]],
            'AuthorizationServerCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AuthorizationServerContract']
                ],
                'count' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'AuthorizationServerUpdateContractProperties' => ['properties' => [
                'displayName' => ['type' => 'string'],
                'clientRegistrationEndpoint' => ['type' => 'string'],
                'authorizationEndpoint' => ['type' => 'string'],
                'grantTypes' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'authorizationCode',
                            'implicit',
                            'resourceOwnerPassword',
                            'clientCredentials'
                        ]
                    ]
                ],
                'clientId' => ['type' => 'string']
            ]],
            'AuthorizationServerUpdateContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/AuthorizationServerUpdateContractProperties']]],
            'TokenBodyParameterContract' => ['properties' => [
                'name' => ['type' => 'string'],
                'value' => ['type' => 'string']
            ]],
            'AuthorizationServerContractBaseProperties' => ['properties' => [
                'description' => ['type' => 'string'],
                'authorizationMethods' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'HEAD',
                            'OPTIONS',
                            'TRACE',
                            'GET',
                            'POST',
                            'PUT',
                            'PATCH',
                            'DELETE'
                        ]
                    ]
                ],
                'clientAuthenticationMethod' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'Basic',
                            'Body'
                        ]
                    ]
                ],
                'tokenBodyParameters' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/TokenBodyParameterContract']
                ],
                'tokenEndpoint' => ['type' => 'string'],
                'supportState' => ['type' => 'boolean'],
                'defaultScope' => ['type' => 'string'],
                'bearerTokenSendingMethods' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'authorizationHeader',
                            'query'
                        ]
                    ]
                ],
                'clientSecret' => ['type' => 'string'],
                'resourceOwnerUsername' => ['type' => 'string'],
                'resourceOwnerPassword' => ['type' => 'string']
            ]],
            'BackendAuthorizationHeaderCredentials' => ['properties' => [
                'scheme' => ['type' => 'string'],
                'parameter' => ['type' => 'string']
            ]],
            'X509CertificateName' => ['properties' => [
                'name' => ['type' => 'string'],
                'issuerCertificateThumbprint' => ['type' => 'string']
            ]],
            'BackendServiceFabricClusterProperties' => ['properties' => [
                'clientCertificatethumbprint' => ['type' => 'string'],
                'maxPartitionResolutionRetries' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'managementEndpoints' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'serverCertificateThumbprints' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'serverX509Names' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/X509CertificateName']
                ]
            ]],
            'BackendProperties' => ['properties' => ['serviceFabricCluster' => ['$ref' => '#/definitions/BackendServiceFabricClusterProperties']]],
            'BackendCredentialsContract' => ['properties' => [
                'certificate' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'query' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'header' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'authorization' => ['$ref' => '#/definitions/BackendAuthorizationHeaderCredentials']
            ]],
            'BackendProxyContract' => ['properties' => [
                'url' => ['type' => 'string'],
                'username' => ['type' => 'string'],
                'password' => ['type' => 'string']
            ]],
            'BackendTlsProperties' => ['properties' => [
                'validateCertificateChain' => ['type' => 'boolean'],
                'validateCertificateName' => ['type' => 'boolean']
            ]],
            'BackendBaseParameters' => ['properties' => [
                'title' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'resourceId' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/BackendProperties'],
                'credentials' => ['$ref' => '#/definitions/BackendCredentialsContract'],
                'proxy' => ['$ref' => '#/definitions/BackendProxyContract'],
                'tls' => ['$ref' => '#/definitions/BackendTlsProperties']
            ]],
            'BackendContractProperties' => ['properties' => [
                'url' => ['type' => 'string'],
                'protocol' => [
                    'type' => 'string',
                    'enum' => [
                        'http',
                        'soap'
                    ]
                ]
            ]],
            'BackendContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/BackendContractProperties']]],
            'BackendCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/BackendContract']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'BackendUpdateParameters' => ['properties' => [
                'url' => ['type' => 'string'],
                'protocol' => [
                    'type' => 'string',
                    'enum' => [
                        'http',
                        'soap'
                    ]
                ]
            ]],
            'CertificateContractProperties' => ['properties' => [
                'subject' => ['type' => 'string'],
                'thumbprint' => ['type' => 'string'],
                'expirationDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'CertificateContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/CertificateContractProperties']]],
            'CertificateCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/CertificateContract']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'CertificateCreateOrUpdateProperties' => ['properties' => [
                'data' => ['type' => 'string'],
                'password' => ['type' => 'string']
            ]],
            'CertificateCreateOrUpdateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/CertificateCreateOrUpdateProperties']]],
            'CertificateInformation' => ['properties' => [
                'expiry' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'thumbprint' => ['type' => 'string'],
                'subject' => ['type' => 'string']
            ]],
            'HostnameConfiguration' => ['properties' => [
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'Proxy',
                        'Portal',
                        'Management',
                        'Scm'
                    ]
                ],
                'hostName' => ['type' => 'string'],
                'encodedCertificate' => ['type' => 'string'],
                'certificatePassword' => ['type' => 'string'],
                'negotiateClientCertificate' => ['type' => 'boolean'],
                'certificate' => ['$ref' => '#/definitions/CertificateInformation']
            ]],
            'VirtualNetworkConfiguration' => ['properties' => [
                'vnetid' => ['type' => 'string'],
                'subnetname' => ['type' => 'string'],
                'subnetResourceId' => ['type' => 'string']
            ]],
            'ApiManagementServiceSkuProperties' => ['properties' => [
                'name' => [
                    'type' => 'string',
                    'enum' => [
                        'Developer',
                        'Standard',
                        'Premium'
                    ]
                ],
                'capacity' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'AdditionalLocation' => ['properties' => [
                'location' => ['type' => 'string'],
                'sku' => ['$ref' => '#/definitions/ApiManagementServiceSkuProperties'],
                'staticIps' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'virtualNetworkConfiguration' => ['$ref' => '#/definitions/VirtualNetworkConfiguration']
            ]],
            'ApiManagementServiceBackupRestoreParameters' => ['properties' => [
                'storageAccount' => ['type' => 'string'],
                'accessKey' => ['type' => 'string'],
                'containerName' => ['type' => 'string'],
                'backupName' => ['type' => 'string']
            ]],
            'ApiManagementServiceProperties' => ['properties' => [
                'publisherEmail' => ['type' => 'string'],
                'publisherName' => ['type' => 'string']
            ]],
            'ApiManagementServiceUpdateProperties' => ['properties' => [
                'publisherEmail' => ['type' => 'string'],
                'publisherName' => ['type' => 'string']
            ]],
            'ApiManagementServiceBaseProperties' => ['properties' => [
                'notificationSenderEmail' => ['type' => 'string'],
                'provisioningState' => ['type' => 'string'],
                'targetProvisioningState' => ['type' => 'string'],
                'createdAtUtc' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'gatewayUrl' => ['type' => 'string'],
                'portalUrl' => ['type' => 'string'],
                'managementApiUrl' => ['type' => 'string'],
                'scmUrl' => ['type' => 'string'],
                'hostnameConfigurations' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/HostnameConfiguration']
                ],
                'staticIps' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'virtualNetworkConfiguration' => ['$ref' => '#/definitions/VirtualNetworkConfiguration'],
                'additionalLocations' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AdditionalLocation']
                ],
                'customProperties' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'virtualNetworkType' => [
                    'type' => 'string',
                    'enum' => [
                        'None',
                        'External',
                        'Internal'
                    ]
                ]
            ]],
            'ApiManagementServiceResource' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApiManagementServiceProperties'],
                'sku' => ['$ref' => '#/definitions/ApiManagementServiceSkuProperties'],
                'location' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ApimResource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'ApiManagementServiceUpdateParameters' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApiManagementServiceUpdateProperties'],
                'sku' => ['$ref' => '#/definitions/ApiManagementServiceSkuProperties'],
                'etag' => ['type' => 'string']
            ]],
            'ApiManagementServiceListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ApiManagementServiceResource']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ApiManagementServiceGetSsoTokenResult' => ['properties' => ['redirectUri' => ['type' => 'string']]],
            'ApiManagementServiceCheckNameAvailabilityParameters' => ['properties' => ['name' => ['type' => 'string']]],
            'ApiManagementServiceNameAvailabilityResult' => ['properties' => [
                'nameAvailable' => ['type' => 'boolean'],
                'message' => ['type' => 'string'],
                'reason' => [
                    'type' => 'string',
                    'enum' => [
                        'Valid',
                        'Invalid',
                        'AlreadyExists'
                    ]
                ]
            ]],
            'ApiManagementServiceApplyNetworkConfigurationParameters' => ['properties' => ['location' => ['type' => 'string']]],
            'Operation_display' => ['properties' => [
                'provider' => ['type' => 'string'],
                'operation' => ['type' => 'string'],
                'resource' => ['type' => 'string'],
                'description' => ['type' => 'string']
            ]],
            'Operation' => ['properties' => [
                'name' => ['type' => 'string'],
                'display' => ['$ref' => '#/definitions/Operation_display']
            ]],
            'OperationListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Operation']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'EmailTemplateParametersContractProperties' => ['properties' => [
                'name' => ['type' => 'string'],
                'title' => ['type' => 'string'],
                'description' => ['type' => 'string']
            ]],
            'EmailTemplateContractProperties' => ['properties' => [
                'subject' => ['type' => 'string'],
                'body' => ['type' => 'string'],
                'title' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'isDefault' => ['type' => 'boolean'],
                'parameters' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/EmailTemplateParametersContractProperties']
                ]
            ]],
            'EmailTemplateContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/EmailTemplateContractProperties']]],
            'EmailTemplateCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/EmailTemplateContract']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'EmailTemplateUpdateParameterProperties' => ['properties' => [
                'subject' => ['type' => 'string'],
                'title' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'body' => ['type' => 'string'],
                'parameters' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/EmailTemplateParametersContractProperties']
                ]
            ]],
            'EmailTemplateUpdateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/EmailTemplateUpdateParameterProperties']]],
            'GroupContractProperties' => ['properties' => [
                'displayName' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'builtIn' => ['type' => 'boolean'],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'custom',
                        'system',
                        'external'
                    ]
                ],
                'externalId' => ['type' => 'string']
            ]],
            'GroupContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/GroupContractProperties']]],
            'GroupCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/GroupContract']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'GroupCreateParametersProperties' => ['properties' => [
                'displayName' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'custom',
                        'system',
                        'external'
                    ]
                ],
                'externalId' => ['type' => 'string']
            ]],
            'GroupCreateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/GroupCreateParametersProperties']]],
            'GroupUpdateParametersProperties' => ['properties' => [
                'displayName' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'custom',
                        'system',
                        'external'
                    ]
                ],
                'externalId' => ['type' => 'string']
            ]],
            'GroupUpdateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/GroupUpdateParametersProperties']]],
            'UserIdentityContract' => ['properties' => [
                'provider' => ['type' => 'string'],
                'id' => ['type' => 'string']
            ]],
            'UserUpdateParametersProperties' => ['properties' => [
                'email' => ['type' => 'string'],
                'password' => ['type' => 'string'],
                'firstName' => ['type' => 'string'],
                'lastName' => ['type' => 'string']
            ]],
            'UserCreateParameterProperties' => ['properties' => [
                'email' => ['type' => 'string'],
                'firstName' => ['type' => 'string'],
                'lastName' => ['type' => 'string'],
                'password' => ['type' => 'string']
            ]],
            'UserContractProperties' => ['properties' => [
                'firstName' => ['type' => 'string'],
                'lastName' => ['type' => 'string'],
                'email' => ['type' => 'string'],
                'registrationDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'groups' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/GroupContract']
                ]
            ]],
            'UserEntityBaseParameters' => ['properties' => [
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'active',
                        'blocked'
                    ]
                ],
                'note' => ['type' => 'string'],
                'identities' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/UserIdentityContract']
                ]
            ]],
            'UserContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/UserContractProperties']]],
            'UserCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/UserContract']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'IdentityProviderContractProperties' => ['properties' => [
                'clientId' => ['type' => 'string'],
                'clientSecret' => ['type' => 'string']
            ]],
            'IdentityProviderContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/IdentityProviderContractProperties']]],
            'IdentityProviderList' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/IdentityProviderContract']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'IdentityProviderUpdateProperties' => ['properties' => [
                'clientId' => ['type' => 'string'],
                'clientSecret' => ['type' => 'string']
            ]],
            'IdentityProviderUpdateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/IdentityProviderUpdateProperties']]],
            'IdentityProviderBaseParameters' => ['properties' => [
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'facebook',
                        'google',
                        'microsoft',
                        'twitter',
                        'aad',
                        'aadB2C'
                    ]
                ],
                'allowedTenants' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'signupPolicyName' => ['type' => 'string'],
                'signinPolicyName' => ['type' => 'string'],
                'profileEditingPolicyName' => ['type' => 'string'],
                'passwordResetPolicyName' => ['type' => 'string']
            ]],
            'LoggerContractProperties' => ['properties' => [
                'loggerType' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'credentials' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'isBuffered' => ['type' => 'boolean']
            ]],
            'LoggerContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/LoggerContractProperties']]],
            'LoggerCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/LoggerContract']
                ],
                'count' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'LoggerUpdateParameters' => ['properties' => [
                'loggerType' => [
                    'type' => 'string',
                    'enum' => ['azureEventHub']
                ],
                'description' => ['type' => 'string'],
                'credentials' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'isBuffered' => ['type' => 'boolean']
            ]],
            'LoggerUpdateContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/LoggerUpdateParameters']]],
            'ConnectivityStatusContract' => ['properties' => [
                'name' => ['type' => 'string'],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'initializing',
                        'success',
                        'failure'
                    ]
                ],
                'error' => ['type' => 'string'],
                'lastUpdated' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastStatusChange' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'NetworkStatusContract' => ['properties' => [
                'dnsServers' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'connectivityStatus' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ConnectivityStatusContract']
                ]
            ]],
            'OpenidConnectProviderContractProperties' => ['properties' => [
                'displayName' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'metadataEndpoint' => ['type' => 'string'],
                'clientId' => ['type' => 'string'],
                'clientSecret' => ['type' => 'string']
            ]],
            'OpenidConnectProviderContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/OpenidConnectProviderContractProperties']]],
            'OpenIdConnectProviderCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/OpenidConnectProviderContract']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'OpenidConnectProviderUpdateContractProperties' => ['properties' => [
                'displayName' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'metadataEndpoint' => ['type' => 'string'],
                'clientId' => ['type' => 'string'],
                'clientSecret' => ['type' => 'string']
            ]],
            'OpenidConnectProviderUpdateContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/OpenidConnectProviderUpdateContractProperties']]],
            'ProductUpdateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/ProductUpdateProperties']]],
            'SubscriptionContractProperties' => ['properties' => [
                'userId' => ['type' => 'string'],
                'productId' => ['type' => 'string'],
                'displayName' => ['type' => 'string'],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'suspended',
                        'active',
                        'expired',
                        'submitted',
                        'rejected',
                        'cancelled'
                    ]
                ],
                'createdDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'startDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'expirationDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'notificationDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'primaryKey' => ['type' => 'string'],
                'secondaryKey' => ['type' => 'string'],
                'stateComment' => ['type' => 'string']
            ]],
            'SubscriptionContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/SubscriptionContractProperties']]],
            'SubscriptionCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SubscriptionContract']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'PropertyContractProperties' => ['properties' => [
                'displayName' => ['type' => 'string'],
                'value' => ['type' => 'string']
            ]],
            'PropertyContract' => ['properties' => ['properties' => ['$ref' => '#/definitions/PropertyContractProperties']]],
            'PropertyCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/PropertyContract']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'PropertyUpdateParameterProperties' => ['properties' => [
                'displayName' => ['type' => 'string'],
                'value' => ['type' => 'string']
            ]],
            'PropertyUpdateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/PropertyUpdateParameterProperties']]],
            'PropertyEntityBaseParameters' => ['properties' => [
                'tags' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'secret' => ['type' => 'boolean']
            ]],
            'QuotaCounterValueContractProperties' => ['properties' => [
                'callsCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'kbTransferred' => [
                    'type' => 'number',
                    'format' => 'double'
                ]
            ]],
            'QuotaCounterContract' => ['properties' => [
                'counterKey' => ['type' => 'string'],
                'periodKey' => ['type' => 'string'],
                'periodStartTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'periodEndTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'Value' => ['$ref' => '#/definitions/QuotaCounterValueContractProperties']
            ]],
            'QuotaCounterCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/QuotaCounterContract']
                ],
                'count' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'QuotaCounterValueContract' => ['properties' => ['value' => ['$ref' => '#/definitions/QuotaCounterValueContractProperties']]],
            'ReportRecordContract' => ['properties' => [
                'name' => ['type' => 'string'],
                'timestamp' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'interval' => ['type' => 'string'],
                'country' => ['type' => 'string'],
                'region' => ['type' => 'string'],
                'zip' => ['type' => 'string'],
                'userId' => ['type' => 'string'],
                'productId' => ['type' => 'string'],
                'apiId' => ['type' => 'string'],
                'operationId' => ['type' => 'string'],
                'apiRegion' => ['type' => 'string'],
                'subscriptionId' => ['type' => 'string'],
                'callCountSuccess' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'callCountBlocked' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'callCountFailed' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'callCountOther' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'callCountTotal' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'bandwidth' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'cacheHitCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'cacheMissCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'apiTimeAvg' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'apiTimeMin' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'apiTimeMax' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'serviceTimeAvg' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'serviceTimeMin' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'serviceTimeMax' => [
                    'type' => 'number',
                    'format' => 'double'
                ]
            ]],
            'ReportCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ReportRecordContract']
                ],
                'count' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'RequestReportRecordContract' => ['properties' => [
                'apiId' => ['type' => 'string'],
                'operationId' => ['type' => 'string'],
                'productId' => ['type' => 'string'],
                'userId' => ['type' => 'string'],
                'method' => ['type' => 'string'],
                'url' => ['type' => 'string'],
                'ipAddress' => ['type' => 'string'],
                'backendResponseCode' => ['type' => 'string'],
                'responseCode' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'responseSize' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'timestamp' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'cache' => ['type' => 'string'],
                'apiTime' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'serviceTime' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'apiRegion' => ['type' => 'string'],
                'subscriptionId' => ['type' => 'string'],
                'requestId' => ['type' => 'string'],
                'requestSize' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'RequestReportCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RequestReportRecordContract']
                ],
                'count' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ]
            ]],
            'SubscriptionCreateParameterProperties' => ['properties' => [
                'userId' => ['type' => 'string'],
                'productId' => ['type' => 'string'],
                'displayName' => ['type' => 'string'],
                'primaryKey' => ['type' => 'string'],
                'secondaryKey' => ['type' => 'string'],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'suspended',
                        'active',
                        'expired',
                        'submitted',
                        'rejected',
                        'cancelled'
                    ]
                ]
            ]],
            'SubscriptionCreateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/SubscriptionCreateParameterProperties']]],
            'SubscriptionUpdateParameterProperties' => ['properties' => [
                'userId' => ['type' => 'string'],
                'productId' => ['type' => 'string'],
                'expirationDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'displayName' => ['type' => 'string'],
                'primaryKey' => ['type' => 'string'],
                'secondaryKey' => ['type' => 'string'],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'suspended',
                        'active',
                        'expired',
                        'submitted',
                        'rejected',
                        'cancelled'
                    ]
                ],
                'stateComment' => ['type' => 'string']
            ]],
            'SubscriptionUpdateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/SubscriptionUpdateParameterProperties']]],
            'AccessInformationContract' => ['properties' => [
                'id' => ['type' => 'string'],
                'primaryKey' => ['type' => 'string'],
                'secondaryKey' => ['type' => 'string'],
                'enabled' => ['type' => 'boolean']
            ]],
            'AccessInformationUpdateParameters' => ['properties' => ['enabled' => ['type' => 'boolean']]],
            'DeployConfigurationParameters' => ['properties' => [
                'branch' => ['type' => 'string'],
                'force' => ['type' => 'boolean']
            ]],
            'OperationResultContract' => ['properties' => [
                'id' => ['type' => 'string'],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Started',
                        'InProgress',
                        'Succeeded',
                        'Failed'
                    ]
                ],
                'started' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'updated' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'resultInfo' => ['type' => 'string'],
                'error' => ['$ref' => '#/definitions/ErrorResponse']
            ]],
            'SaveConfigurationParameter' => ['properties' => [
                'branch' => ['type' => 'string'],
                'force' => ['type' => 'boolean']
            ]],
            'TenantConfigurationSyncStateContract' => ['properties' => [
                'branch' => ['type' => 'string'],
                'commitId' => ['type' => 'string'],
                'isExport' => ['type' => 'boolean'],
                'isSynced' => ['type' => 'boolean'],
                'isGitEnabled' => ['type' => 'boolean'],
                'syncDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'configurationChangeDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'GenerateSsoUrlResult' => ['properties' => ['value' => ['type' => 'string']]],
            'UserCreateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/UserCreateParameterProperties']]],
            'UserIdentityCollection' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/UserIdentityContract']
                ],
                'count' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'UserTokenParameters' => ['properties' => [
                'keyType' => [
                    'type' => 'string',
                    'enum' => [
                        'primary',
                        'secondary'
                    ]
                ],
                'expiry' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'UserTokenResult' => ['properties' => ['value' => ['type' => 'string']]],
            'UserUpdateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/UserUpdateParametersProperties']]]
        ]
    ];
}
