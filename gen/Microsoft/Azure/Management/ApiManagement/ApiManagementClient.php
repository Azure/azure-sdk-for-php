<?php
namespace Microsoft\Azure\Management\ApiManagement;
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
        $this->_Policy_group = new \Microsoft\Azure\Management\ApiManagement\Policy($_client);
        $this->_PolicySnippets_group = new \Microsoft\Azure\Management\ApiManagement\PolicySnippets($_client);
        $this->_Regions_group = new \Microsoft\Azure\Management\ApiManagement\Regions($_client);
        $this->_Api_group = new \Microsoft\Azure\Management\ApiManagement\Api($_client);
        $this->_ApiOperation_group = new \Microsoft\Azure\Management\ApiManagement\ApiOperation($_client);
        $this->_ApiOperationPolicy_group = new \Microsoft\Azure\Management\ApiManagement\ApiOperationPolicy($_client);
        $this->_ApiProduct_group = new \Microsoft\Azure\Management\ApiManagement\ApiProduct($_client);
        $this->_ApiPolicy_group = new \Microsoft\Azure\Management\ApiManagement\ApiPolicy($_client);
        $this->_AuthorizationServer_group = new \Microsoft\Azure\Management\ApiManagement\AuthorizationServer($_client);
        $this->_Backend_group = new \Microsoft\Azure\Management\ApiManagement\Backend($_client);
        $this->_Certificate_group = new \Microsoft\Azure\Management\ApiManagement\Certificate($_client);
        $this->_ApiManagementOperations_group = new \Microsoft\Azure\Management\ApiManagement\ApiManagementOperations($_client);
        $this->_ApiManagementService_group = new \Microsoft\Azure\Management\ApiManagement\ApiManagementService($_client);
        $this->_EmailTemplate_group = new \Microsoft\Azure\Management\ApiManagement\EmailTemplate($_client);
        $this->_Group_group = new \Microsoft\Azure\Management\ApiManagement\Group($_client);
        $this->_GroupUser_group = new \Microsoft\Azure\Management\ApiManagement\GroupUser($_client);
        $this->_IdentityProvider_group = new \Microsoft\Azure\Management\ApiManagement\IdentityProvider($_client);
        $this->_Logger_group = new \Microsoft\Azure\Management\ApiManagement\Logger($_client);
        $this->_NetworkStatus_group = new \Microsoft\Azure\Management\ApiManagement\NetworkStatus($_client);
        $this->_OpenIdConnectProvider_group = new \Microsoft\Azure\Management\ApiManagement\OpenIdConnectProvider($_client);
        $this->_Product_group = new \Microsoft\Azure\Management\ApiManagement\Product($_client);
        $this->_ProductApi_group = new \Microsoft\Azure\Management\ApiManagement\ProductApi($_client);
        $this->_ProductGroup_group = new \Microsoft\Azure\Management\ApiManagement\ProductGroup($_client);
        $this->_ProductSubscriptions_group = new \Microsoft\Azure\Management\ApiManagement\ProductSubscriptions($_client);
        $this->_ProductPolicy_group = new \Microsoft\Azure\Management\ApiManagement\ProductPolicy($_client);
        $this->_Property_group = new \Microsoft\Azure\Management\ApiManagement\Property($_client);
        $this->_QuotaByCounterKeys_group = new \Microsoft\Azure\Management\ApiManagement\QuotaByCounterKeys($_client);
        $this->_QuotaByPeriodKeys_group = new \Microsoft\Azure\Management\ApiManagement\QuotaByPeriodKeys($_client);
        $this->_Reports_group = new \Microsoft\Azure\Management\ApiManagement\Reports($_client);
        $this->_Subscription_group = new \Microsoft\Azure\Management\ApiManagement\Subscription($_client);
        $this->_TenantAccess_group = new \Microsoft\Azure\Management\ApiManagement\TenantAccess($_client);
        $this->_TenantAccessGit_group = new \Microsoft\Azure\Management\ApiManagement\TenantAccessGit($_client);
        $this->_TenantConfiguration_group = new \Microsoft\Azure\Management\ApiManagement\TenantConfiguration($_client);
        $this->_User_group = new \Microsoft\Azure\Management\ApiManagement\User($_client);
        $this->_UserGroup_group = new \Microsoft\Azure\Management\ApiManagement\UserGroup($_client);
        $this->_UserSubscription_group = new \Microsoft\Azure\Management\ApiManagement\UserSubscription($_client);
        $this->_UserIdentities_group = new \Microsoft\Azure\Management\ApiManagement\UserIdentities($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\Policy
     */
    public function getPolicy()
    {
        return $this->_Policy_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\PolicySnippets
     */
    public function getPolicySnippets()
    {
        return $this->_PolicySnippets_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\Regions
     */
    public function getRegions()
    {
        return $this->_Regions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\Api
     */
    public function getApi()
    {
        return $this->_Api_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\ApiOperation
     */
    public function getApiOperation()
    {
        return $this->_ApiOperation_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\ApiOperationPolicy
     */
    public function getApiOperationPolicy()
    {
        return $this->_ApiOperationPolicy_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\ApiProduct
     */
    public function getApiProduct()
    {
        return $this->_ApiProduct_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\ApiPolicy
     */
    public function getApiPolicy()
    {
        return $this->_ApiPolicy_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\AuthorizationServer
     */
    public function getAuthorizationServer()
    {
        return $this->_AuthorizationServer_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\Backend
     */
    public function getBackend()
    {
        return $this->_Backend_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\Certificate
     */
    public function getCertificate()
    {
        return $this->_Certificate_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\ApiManagementOperations
     */
    public function getApiManagementOperations()
    {
        return $this->_ApiManagementOperations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\ApiManagementService
     */
    public function getApiManagementService()
    {
        return $this->_ApiManagementService_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\EmailTemplate
     */
    public function getEmailTemplate()
    {
        return $this->_EmailTemplate_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\Group
     */
    public function getGroup()
    {
        return $this->_Group_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\GroupUser
     */
    public function getGroupUser()
    {
        return $this->_GroupUser_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\IdentityProvider
     */
    public function getIdentityProvider()
    {
        return $this->_IdentityProvider_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\Logger
     */
    public function getLogger()
    {
        return $this->_Logger_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\NetworkStatus
     */
    public function getNetworkStatus()
    {
        return $this->_NetworkStatus_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\OpenIdConnectProvider
     */
    public function getOpenIdConnectProvider()
    {
        return $this->_OpenIdConnectProvider_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\Product
     */
    public function getProduct()
    {
        return $this->_Product_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\ProductApi
     */
    public function getProductApi()
    {
        return $this->_ProductApi_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\ProductGroup
     */
    public function getProductGroup()
    {
        return $this->_ProductGroup_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\ProductSubscriptions
     */
    public function getProductSubscriptions()
    {
        return $this->_ProductSubscriptions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\ProductPolicy
     */
    public function getProductPolicy()
    {
        return $this->_ProductPolicy_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\Property
     */
    public function getProperty()
    {
        return $this->_Property_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\QuotaByCounterKeys
     */
    public function getQuotaByCounterKeys()
    {
        return $this->_QuotaByCounterKeys_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\QuotaByPeriodKeys
     */
    public function getQuotaByPeriodKeys()
    {
        return $this->_QuotaByPeriodKeys_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\Reports
     */
    public function getReports()
    {
        return $this->_Reports_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\Subscription
     */
    public function getSubscription()
    {
        return $this->_Subscription_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\TenantAccess
     */
    public function getTenantAccess()
    {
        return $this->_TenantAccess_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\TenantAccessGit
     */
    public function getTenantAccessGit()
    {
        return $this->_TenantAccessGit_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\TenantConfiguration
     */
    public function getTenantConfiguration()
    {
        return $this->_TenantConfiguration_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\User
     */
    public function getUser()
    {
        return $this->_User_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\UserGroup
     */
    public function getUserGroup()
    {
        return $this->_UserGroup_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\UserSubscription
     */
    public function getUserSubscription()
    {
        return $this->_UserSubscription_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ApiManagement\UserIdentities
     */
    public function getUserIdentities()
    {
        return $this->_UserIdentities_group;
    }
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\Policy
     */
    private $_Policy_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\PolicySnippets
     */
    private $_PolicySnippets_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\Regions
     */
    private $_Regions_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\Api
     */
    private $_Api_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\ApiOperation
     */
    private $_ApiOperation_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\ApiOperationPolicy
     */
    private $_ApiOperationPolicy_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\ApiProduct
     */
    private $_ApiProduct_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\ApiPolicy
     */
    private $_ApiPolicy_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\AuthorizationServer
     */
    private $_AuthorizationServer_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\Backend
     */
    private $_Backend_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\Certificate
     */
    private $_Certificate_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\ApiManagementOperations
     */
    private $_ApiManagementOperations_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\ApiManagementService
     */
    private $_ApiManagementService_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\EmailTemplate
     */
    private $_EmailTemplate_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\Group
     */
    private $_Group_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\GroupUser
     */
    private $_GroupUser_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\IdentityProvider
     */
    private $_IdentityProvider_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\Logger
     */
    private $_Logger_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\NetworkStatus
     */
    private $_NetworkStatus_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\OpenIdConnectProvider
     */
    private $_OpenIdConnectProvider_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\Product
     */
    private $_Product_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\ProductApi
     */
    private $_ProductApi_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\ProductGroup
     */
    private $_ProductGroup_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\ProductSubscriptions
     */
    private $_ProductSubscriptions_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\ProductPolicy
     */
    private $_ProductPolicy_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\Property
     */
    private $_Property_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\QuotaByCounterKeys
     */
    private $_QuotaByCounterKeys_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\QuotaByPeriodKeys
     */
    private $_QuotaByPeriodKeys_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\Reports
     */
    private $_Reports_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\Subscription
     */
    private $_Subscription_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\TenantAccess
     */
    private $_TenantAccess_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\TenantAccessGit
     */
    private $_TenantAccessGit_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\TenantConfiguration
     */
    private $_TenantConfiguration_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\User
     */
    private $_User_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\UserGroup
     */
    private $_UserGroup_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\UserSubscription
     */
    private $_UserSubscription_group;
    /**
     * @var \Microsoft\Azure\Management\ApiManagement\UserIdentities
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
                            'schema' => ['$ref' => '#/definitions/PolicyContract']
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
                            'schema' => ['$ref' => '#/definitions/ApiCreateOrUpdateParameter']
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
                            'schema' => ['$ref' => '#/definitions/ApiUpdateContract']
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
                            'schema' => ['$ref' => '#/definitions/OperationContract']
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
                            'schema' => ['$ref' => '#/definitions/OperationUpdateContract']
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
                            'schema' => ['$ref' => '#/definitions/PolicyContract']
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
                            'schema' => ['$ref' => '#/definitions/PolicyContract']
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
                            'schema' => ['$ref' => '#/definitions/AuthorizationServerContract']
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
                            'schema' => ['$ref' => '#/definitions/AuthorizationServerUpdateContract']
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
                            'schema' => ['$ref' => '#/definitions/BackendContract']
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
                            'schema' => ['$ref' => '#/definitions/BackendUpdateParameters']
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
                            'schema' => ['$ref' => '#/definitions/CertificateCreateOrUpdateParameters']
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
                        'schema' => ['$ref' => '#/definitions/ApiManagementServiceBackupRestoreParameters']
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
                        'schema' => ['$ref' => '#/definitions/ApiManagementServiceBackupRestoreParameters']
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
                            'schema' => ['$ref' => '#/definitions/ApiManagementServiceResource']
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
                            'schema' => ['$ref' => '#/definitions/ApiManagementServiceUpdateParameters']
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
                        'schema' => ['$ref' => '#/definitions/ApiManagementServiceCheckNameAvailabilityParameters']
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
                        'schema' => ['$ref' => '#/definitions/ApiManagementServiceApplyNetworkConfigurationParameters']
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
                            'schema' => ['$ref' => '#/definitions/EmailTemplateUpdateParameters']
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
                            'schema' => ['$ref' => '#/definitions/EmailTemplateUpdateParameters']
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
                            'schema' => ['$ref' => '#/definitions/GroupCreateParameters']
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
                            'schema' => ['$ref' => '#/definitions/GroupUpdateParameters']
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
                            'schema' => ['$ref' => '#/definitions/IdentityProviderContract']
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
                            'schema' => ['$ref' => '#/definitions/IdentityProviderUpdateParameters']
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
                            'schema' => ['$ref' => '#/definitions/LoggerContract']
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
                            'schema' => ['$ref' => '#/definitions/LoggerUpdateContract']
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
                            'schema' => ['$ref' => '#/definitions/OpenidConnectProviderContract']
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
                            'schema' => ['$ref' => '#/definitions/OpenidConnectProviderUpdateContract']
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
                            'schema' => ['$ref' => '#/definitions/ProductContract']
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
                            'schema' => ['$ref' => '#/definitions/ProductUpdateParameters']
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
                            'schema' => ['$ref' => '#/definitions/PolicyContract']
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
                            'schema' => ['$ref' => '#/definitions/PropertyContract']
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
                            'schema' => ['$ref' => '#/definitions/PropertyUpdateParameters']
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
                            'schema' => ['$ref' => '#/definitions/QuotaCounterValueContractProperties']
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
                            'schema' => ['$ref' => '#/definitions/QuotaCounterValueContractProperties']
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
                            'schema' => ['$ref' => '#/definitions/SubscriptionCreateParameters']
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
                            'schema' => ['$ref' => '#/definitions/SubscriptionUpdateParameters']
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
                            'schema' => ['$ref' => '#/definitions/AccessInformationUpdateParameters']
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
                        'schema' => ['$ref' => '#/definitions/DeployConfigurationParameters']
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
                        'schema' => ['$ref' => '#/definitions/SaveConfigurationParameter']
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
                        'schema' => ['$ref' => '#/definitions/DeployConfigurationParameters']
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
                            'schema' => ['$ref' => '#/definitions/UserCreateParameters']
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
                            'schema' => ['$ref' => '#/definitions/UserUpdateParameters']
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
                        'schema' => ['$ref' => '#/definitions/UserTokenParameters']
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
            'ErrorFieldContract' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'target' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ErrorResponse' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'details' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ErrorFieldContract']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PolicyContractProperties' => [
                'properties' => ['policyContent' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['policyContent']
            ],
            'PolicyContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/PolicyContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PolicyCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PolicyContract']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PolicySnippetContract' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'content' => ['type' => 'string'],
                    'toolTip' => ['type' => 'string'],
                    'scope' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PolicySnippetsCollection' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/PolicySnippetContract']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RegionContract' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'isMasterRegion' => ['type' => 'boolean'],
                    'isDeleted' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RegionListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RegionContract']
                    ],
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Resource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiContractProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => ['path']
            ],
            'ApiContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ApiContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApiContract']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiCreateOrUpdateProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiCreateOrUpdateParameter' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ApiCreateOrUpdateProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiContractUpdateProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiUpdateContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ApiContractUpdateProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OAuth2AuthenticationSettingsContract' => [
                'properties' => [
                    'authorizationServerId' => ['type' => 'string'],
                    'scope' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AuthenticationSettingsContract' => [
                'properties' => ['oAuth2' => ['$ref' => '#/definitions/OAuth2AuthenticationSettingsContract']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubscriptionKeyParameterNamesContract' => [
                'properties' => [
                    'header' => ['type' => 'string'],
                    'query' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiEntityBaseContract' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationContractProperties' => [
                'properties' => [
                    'displayName' => ['type' => 'string'],
                    'method' => ['type' => 'string'],
                    'urlTemplate' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'displayName',
                    'method',
                    'urlTemplate'
                ]
            ],
            'OperationContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/OperationContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/OperationContract']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationUpdateContractProperties' => [
                'properties' => [
                    'displayName' => ['type' => 'string'],
                    'method' => ['type' => 'string'],
                    'urlTemplate' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ParameterContract' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'defaultValue' => ['type' => 'string'],
                    'required' => ['type' => 'boolean'],
                    'values' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'type'
                ]
            ],
            'RepresentationContract' => [
                'properties' => [
                    'contentType' => ['type' => 'string'],
                    'sample' => ['type' => 'string'],
                    'schemaId' => ['type' => 'string'],
                    'typeName' => ['type' => 'string'],
                    'formParameters' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ParameterContract']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['contentType']
            ],
            'RequestContract' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResponseContract' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => ['statusCode']
            ],
            'OperationEntityBaseContract' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationUpdateContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/OperationUpdateContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProductUpdateProperties' => [
                'properties' => ['name' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProductContractProperties' => [
                'properties' => ['displayName' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['displayName']
            ],
            'ProductEntityBaseParameters' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProductContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ProductContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProductCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ProductContract']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AuthorizationServerContractProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'displayName',
                    'clientRegistrationEndpoint',
                    'authorizationEndpoint',
                    'grantTypes',
                    'clientId'
                ]
            ],
            'AuthorizationServerContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AuthorizationServerContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AuthorizationServerCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AuthorizationServerContract']
                    ],
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AuthorizationServerUpdateContractProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AuthorizationServerUpdateContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AuthorizationServerUpdateContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TokenBodyParameterContract' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'value' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'value'
                ]
            ],
            'AuthorizationServerContractBaseProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackendAuthorizationHeaderCredentials' => [
                'properties' => [
                    'scheme' => ['type' => 'string'],
                    'parameter' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'scheme',
                    'parameter'
                ]
            ],
            'X509CertificateName' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'issuerCertificateThumbprint' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackendServiceFabricClusterProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'clientCertificatethumbprint',
                    'managementEndpoints'
                ]
            ],
            'BackendProperties' => [
                'properties' => ['serviceFabricCluster' => ['$ref' => '#/definitions/BackendServiceFabricClusterProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackendCredentialsContract' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackendProxyContract' => [
                'properties' => [
                    'url' => ['type' => 'string'],
                    'username' => ['type' => 'string'],
                    'password' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['url']
            ],
            'BackendTlsProperties' => [
                'properties' => [
                    'validateCertificateChain' => ['type' => 'boolean'],
                    'validateCertificateName' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackendBaseParameters' => [
                'properties' => [
                    'title' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'resourceId' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/BackendProperties'],
                    'credentials' => ['$ref' => '#/definitions/BackendCredentialsContract'],
                    'proxy' => ['$ref' => '#/definitions/BackendProxyContract'],
                    'tls' => ['$ref' => '#/definitions/BackendTlsProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackendContractProperties' => [
                'properties' => [
                    'url' => ['type' => 'string'],
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'http',
                            'soap'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'url',
                    'protocol'
                ]
            ],
            'BackendContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BackendContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackendCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/BackendContract']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackendUpdateParameters' => [
                'properties' => [
                    'url' => ['type' => 'string'],
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'http',
                            'soap'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CertificateContractProperties' => [
                'properties' => [
                    'subject' => ['type' => 'string'],
                    'thumbprint' => ['type' => 'string'],
                    'expirationDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'subject',
                    'thumbprint',
                    'expirationDate'
                ]
            ],
            'CertificateContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/CertificateContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CertificateCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/CertificateContract']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CertificateCreateOrUpdateProperties' => [
                'properties' => [
                    'data' => ['type' => 'string'],
                    'password' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'data',
                    'password'
                ]
            ],
            'CertificateCreateOrUpdateParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/CertificateCreateOrUpdateProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CertificateInformation' => [
                'properties' => [
                    'expiry' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'thumbprint' => ['type' => 'string'],
                    'subject' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'expiry',
                    'thumbprint',
                    'subject'
                ]
            ],
            'HostnameConfiguration' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'type',
                    'hostName'
                ]
            ],
            'VirtualNetworkConfiguration' => [
                'properties' => [
                    'vnetid' => ['type' => 'string'],
                    'subnetname' => ['type' => 'string'],
                    'subnetResourceId' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiManagementServiceSkuProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => ['name']
            ],
            'AdditionalLocation' => [
                'properties' => [
                    'location' => ['type' => 'string'],
                    'sku' => ['$ref' => '#/definitions/ApiManagementServiceSkuProperties'],
                    'staticIps' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'virtualNetworkConfiguration' => ['$ref' => '#/definitions/VirtualNetworkConfiguration']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'location',
                    'sku'
                ]
            ],
            'ApiManagementServiceBackupRestoreParameters' => [
                'properties' => [
                    'storageAccount' => ['type' => 'string'],
                    'accessKey' => ['type' => 'string'],
                    'containerName' => ['type' => 'string'],
                    'backupName' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'storageAccount',
                    'accessKey',
                    'containerName',
                    'backupName'
                ]
            ],
            'ApiManagementServiceProperties' => [
                'properties' => [
                    'publisherEmail' => ['type' => 'string'],
                    'publisherName' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'publisherEmail',
                    'publisherName'
                ]
            ],
            'ApiManagementServiceUpdateProperties' => [
                'properties' => [
                    'publisherEmail' => ['type' => 'string'],
                    'publisherName' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiManagementServiceBaseProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiManagementServiceResource' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApiManagementServiceProperties'],
                    'sku' => ['$ref' => '#/definitions/ApiManagementServiceSkuProperties'],
                    'location' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'properties',
                    'sku',
                    'location'
                ]
            ],
            'ApimResource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiManagementServiceUpdateParameters' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApiManagementServiceUpdateProperties'],
                    'sku' => ['$ref' => '#/definitions/ApiManagementServiceSkuProperties'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiManagementServiceListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApiManagementServiceResource']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'ApiManagementServiceGetSsoTokenResult' => [
                'properties' => ['redirectUri' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiManagementServiceCheckNameAvailabilityParameters' => [
                'properties' => ['name' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['name']
            ],
            'ApiManagementServiceNameAvailabilityResult' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApiManagementServiceApplyNetworkConfigurationParameters' => [
                'properties' => ['location' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Operation_display' => [
                'properties' => [
                    'provider' => ['type' => 'string'],
                    'operation' => ['type' => 'string'],
                    'resource' => ['type' => 'string'],
                    'description' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Operation' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'display' => ['$ref' => '#/definitions/Operation_display']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Operation']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EmailTemplateParametersContractProperties' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'title' => ['type' => 'string'],
                    'description' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EmailTemplateContractProperties' => [
                'properties' => [
                    'subject' => ['type' => 'string'],
                    'body' => ['type' => 'string'],
                    'title' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'isDefault' => ['type' => 'boolean'],
                    'parameters' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/EmailTemplateParametersContractProperties']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'subject',
                    'body'
                ]
            ],
            'EmailTemplateContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/EmailTemplateContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EmailTemplateCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/EmailTemplateContract']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EmailTemplateUpdateParameterProperties' => [
                'properties' => [
                    'subject' => ['type' => 'string'],
                    'title' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'body' => ['type' => 'string'],
                    'parameters' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/EmailTemplateParametersContractProperties']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EmailTemplateUpdateParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/EmailTemplateUpdateParameterProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GroupContractProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => ['displayName']
            ],
            'GroupContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/GroupContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GroupCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/GroupContract']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GroupCreateParametersProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => ['displayName']
            ],
            'GroupCreateParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/GroupCreateParametersProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GroupUpdateParametersProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GroupUpdateParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/GroupUpdateParametersProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UserIdentityContract' => [
                'properties' => [
                    'provider' => ['type' => 'string'],
                    'id' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UserUpdateParametersProperties' => [
                'properties' => [
                    'email' => ['type' => 'string'],
                    'password' => ['type' => 'string'],
                    'firstName' => ['type' => 'string'],
                    'lastName' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UserCreateParameterProperties' => [
                'properties' => [
                    'email' => ['type' => 'string'],
                    'firstName' => ['type' => 'string'],
                    'lastName' => ['type' => 'string'],
                    'password' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'email',
                    'firstName',
                    'lastName'
                ]
            ],
            'UserContractProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UserEntityBaseParameters' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UserContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UserContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UserCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/UserContract']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IdentityProviderContractProperties' => [
                'properties' => [
                    'clientId' => ['type' => 'string'],
                    'clientSecret' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'clientId',
                    'clientSecret'
                ]
            ],
            'IdentityProviderContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/IdentityProviderContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IdentityProviderList' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/IdentityProviderContract']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IdentityProviderUpdateProperties' => [
                'properties' => [
                    'clientId' => ['type' => 'string'],
                    'clientSecret' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IdentityProviderUpdateParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/IdentityProviderUpdateProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IdentityProviderBaseParameters' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LoggerContractProperties' => [
                'properties' => [
                    'loggerType' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'credentials' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'isBuffered' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'loggerType',
                    'credentials'
                ]
            ],
            'LoggerContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/LoggerContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LoggerCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/LoggerContract']
                    ],
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LoggerUpdateParameters' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LoggerUpdateContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/LoggerUpdateParameters']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ConnectivityStatusContract' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'status',
                    'lastUpdated',
                    'lastStatusChange'
                ]
            ],
            'NetworkStatusContract' => [
                'properties' => [
                    'dnsServers' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'connectivityStatus' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ConnectivityStatusContract']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'dnsServers',
                    'connectivityStatus'
                ]
            ],
            'OpenidConnectProviderContractProperties' => [
                'properties' => [
                    'displayName' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'metadataEndpoint' => ['type' => 'string'],
                    'clientId' => ['type' => 'string'],
                    'clientSecret' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'displayName',
                    'metadataEndpoint',
                    'clientId'
                ]
            ],
            'OpenidConnectProviderContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/OpenidConnectProviderContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OpenIdConnectProviderCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/OpenidConnectProviderContract']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OpenidConnectProviderUpdateContractProperties' => [
                'properties' => [
                    'displayName' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'metadataEndpoint' => ['type' => 'string'],
                    'clientId' => ['type' => 'string'],
                    'clientSecret' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OpenidConnectProviderUpdateContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/OpenidConnectProviderUpdateContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProductUpdateParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ProductUpdateProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubscriptionContractProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'userId',
                    'productId',
                    'state',
                    'primaryKey',
                    'secondaryKey'
                ]
            ],
            'SubscriptionContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SubscriptionContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubscriptionCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubscriptionContract']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PropertyContractProperties' => [
                'properties' => [
                    'displayName' => ['type' => 'string'],
                    'value' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'displayName',
                    'value'
                ]
            ],
            'PropertyContract' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/PropertyContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PropertyCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PropertyContract']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PropertyUpdateParameterProperties' => [
                'properties' => [
                    'displayName' => ['type' => 'string'],
                    'value' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PropertyUpdateParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/PropertyUpdateParameterProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PropertyEntityBaseParameters' => [
                'properties' => [
                    'tags' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'secret' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'QuotaCounterValueContractProperties' => [
                'properties' => [
                    'callsCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'kbTransferred' => [
                        'type' => 'number',
                        'format' => 'double'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'QuotaCounterContract' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'counterKey',
                    'periodKey',
                    'periodStartTime',
                    'periodEndTime'
                ]
            ],
            'QuotaCounterCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/QuotaCounterContract']
                    ],
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'QuotaCounterValueContract' => [
                'properties' => ['value' => ['$ref' => '#/definitions/QuotaCounterValueContractProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ReportRecordContract' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ReportCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ReportRecordContract']
                    ],
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RequestReportRecordContract' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RequestReportCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RequestReportRecordContract']
                    ],
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubscriptionCreateParameterProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'userId',
                    'productId',
                    'displayName'
                ]
            ],
            'SubscriptionCreateParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SubscriptionCreateParameterProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubscriptionUpdateParameterProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubscriptionUpdateParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SubscriptionUpdateParameterProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AccessInformationContract' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'primaryKey' => ['type' => 'string'],
                    'secondaryKey' => ['type' => 'string'],
                    'enabled' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AccessInformationUpdateParameters' => [
                'properties' => ['enabled' => ['type' => 'boolean']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeployConfigurationParameters' => [
                'properties' => [
                    'branch' => ['type' => 'string'],
                    'force' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => ['branch']
            ],
            'OperationResultContract' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SaveConfigurationParameter' => [
                'properties' => [
                    'branch' => ['type' => 'string'],
                    'force' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => ['branch']
            ],
            'TenantConfigurationSyncStateContract' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GenerateSsoUrlResult' => [
                'properties' => ['value' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UserCreateParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UserCreateParameterProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UserIdentityCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/UserIdentityContract']
                    ],
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UserTokenParameters' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'keyType',
                    'expiry'
                ]
            ],
            'UserTokenResult' => [
                'properties' => ['value' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UserUpdateParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UserUpdateParametersProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
