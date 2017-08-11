<?php
namespace Microsoft\Azure\Management\Network;
final class NetworkManagementClient
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
        $this->_ApplicationGateways_group = new \Microsoft\Azure\Management\Network\ApplicationGateways($_client);
        $this->_ExpressRouteCircuitAuthorizations_group = new \Microsoft\Azure\Management\Network\ExpressRouteCircuitAuthorizations($_client);
        $this->_ExpressRouteCircuitPeerings_group = new \Microsoft\Azure\Management\Network\ExpressRouteCircuitPeerings($_client);
        $this->_ExpressRouteCircuits_group = new \Microsoft\Azure\Management\Network\ExpressRouteCircuits($_client);
        $this->_ExpressRouteServiceProviders_group = new \Microsoft\Azure\Management\Network\ExpressRouteServiceProviders($_client);
        $this->_LoadBalancers_group = new \Microsoft\Azure\Management\Network\LoadBalancers($_client);
        $this->_LoadBalancerBackendAddressPools_group = new \Microsoft\Azure\Management\Network\LoadBalancerBackendAddressPools($_client);
        $this->_LoadBalancerFrontendIPConfigurations_group = new \Microsoft\Azure\Management\Network\LoadBalancerFrontendIPConfigurations($_client);
        $this->_InboundNatRules_group = new \Microsoft\Azure\Management\Network\InboundNatRules($_client);
        $this->_LoadBalancerLoadBalancingRules_group = new \Microsoft\Azure\Management\Network\LoadBalancerLoadBalancingRules($_client);
        $this->_LoadBalancerNetworkInterfaces_group = new \Microsoft\Azure\Management\Network\LoadBalancerNetworkInterfaces($_client);
        $this->_LoadBalancerProbes_group = new \Microsoft\Azure\Management\Network\LoadBalancerProbes($_client);
        $this->_NetworkInterfaces_group = new \Microsoft\Azure\Management\Network\NetworkInterfaces($_client);
        $this->_NetworkInterfaceIPConfigurations_group = new \Microsoft\Azure\Management\Network\NetworkInterfaceIPConfigurations($_client);
        $this->_NetworkInterfaceLoadBalancers_group = new \Microsoft\Azure\Management\Network\NetworkInterfaceLoadBalancers($_client);
        $this->_NetworkSecurityGroups_group = new \Microsoft\Azure\Management\Network\NetworkSecurityGroups($_client);
        $this->_SecurityRules_group = new \Microsoft\Azure\Management\Network\SecurityRules($_client);
        $this->_DefaultSecurityRules_group = new \Microsoft\Azure\Management\Network\DefaultSecurityRules($_client);
        $this->_NetworkWatchers_group = new \Microsoft\Azure\Management\Network\NetworkWatchers($_client);
        $this->_PacketCaptures_group = new \Microsoft\Azure\Management\Network\PacketCaptures($_client);
        $this->_PublicIPAddresses_group = new \Microsoft\Azure\Management\Network\PublicIPAddresses($_client);
        $this->_RouteFilters_group = new \Microsoft\Azure\Management\Network\RouteFilters($_client);
        $this->_RouteFilterRules_group = new \Microsoft\Azure\Management\Network\RouteFilterRules($_client);
        $this->_RouteTables_group = new \Microsoft\Azure\Management\Network\RouteTables($_client);
        $this->_Routes_group = new \Microsoft\Azure\Management\Network\Routes($_client);
        $this->_BgpServiceCommunities_group = new \Microsoft\Azure\Management\Network\BgpServiceCommunities($_client);
        $this->_Usages_group = new \Microsoft\Azure\Management\Network\Usages($_client);
        $this->_VirtualNetworks_group = new \Microsoft\Azure\Management\Network\VirtualNetworks($_client);
        $this->_Subnets_group = new \Microsoft\Azure\Management\Network\Subnets($_client);
        $this->_VirtualNetworkPeerings_group = new \Microsoft\Azure\Management\Network\VirtualNetworkPeerings($_client);
        $this->_VirtualNetworkGateways_group = new \Microsoft\Azure\Management\Network\VirtualNetworkGateways($_client);
        $this->_VirtualNetworkGatewayConnections_group = new \Microsoft\Azure\Management\Network\VirtualNetworkGatewayConnections($_client);
        $this->_LocalNetworkGateways_group = new \Microsoft\Azure\Management\Network\LocalNetworkGateways($_client);
        $this->_CheckDnsNameAvailability_operation = $_client->createOperation('CheckDnsNameAvailability');
    }
    /**
     * @return \Microsoft\Azure\Management\Network\ApplicationGateways
     */
    public function getApplicationGateways()
    {
        return $this->_ApplicationGateways_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\ExpressRouteCircuitAuthorizations
     */
    public function getExpressRouteCircuitAuthorizations()
    {
        return $this->_ExpressRouteCircuitAuthorizations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\ExpressRouteCircuitPeerings
     */
    public function getExpressRouteCircuitPeerings()
    {
        return $this->_ExpressRouteCircuitPeerings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\ExpressRouteCircuits
     */
    public function getExpressRouteCircuits()
    {
        return $this->_ExpressRouteCircuits_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\ExpressRouteServiceProviders
     */
    public function getExpressRouteServiceProviders()
    {
        return $this->_ExpressRouteServiceProviders_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\LoadBalancers
     */
    public function getLoadBalancers()
    {
        return $this->_LoadBalancers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\LoadBalancerBackendAddressPools
     */
    public function getLoadBalancerBackendAddressPools()
    {
        return $this->_LoadBalancerBackendAddressPools_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\LoadBalancerFrontendIPConfigurations
     */
    public function getLoadBalancerFrontendIPConfigurations()
    {
        return $this->_LoadBalancerFrontendIPConfigurations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\InboundNatRules
     */
    public function getInboundNatRules()
    {
        return $this->_InboundNatRules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\LoadBalancerLoadBalancingRules
     */
    public function getLoadBalancerLoadBalancingRules()
    {
        return $this->_LoadBalancerLoadBalancingRules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\LoadBalancerNetworkInterfaces
     */
    public function getLoadBalancerNetworkInterfaces()
    {
        return $this->_LoadBalancerNetworkInterfaces_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\LoadBalancerProbes
     */
    public function getLoadBalancerProbes()
    {
        return $this->_LoadBalancerProbes_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\NetworkInterfaces
     */
    public function getNetworkInterfaces()
    {
        return $this->_NetworkInterfaces_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\NetworkInterfaceIPConfigurations
     */
    public function getNetworkInterfaceIPConfigurations()
    {
        return $this->_NetworkInterfaceIPConfigurations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\NetworkInterfaceLoadBalancers
     */
    public function getNetworkInterfaceLoadBalancers()
    {
        return $this->_NetworkInterfaceLoadBalancers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\NetworkSecurityGroups
     */
    public function getNetworkSecurityGroups()
    {
        return $this->_NetworkSecurityGroups_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\SecurityRules
     */
    public function getSecurityRules()
    {
        return $this->_SecurityRules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\DefaultSecurityRules
     */
    public function getDefaultSecurityRules()
    {
        return $this->_DefaultSecurityRules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\NetworkWatchers
     */
    public function getNetworkWatchers()
    {
        return $this->_NetworkWatchers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\PacketCaptures
     */
    public function getPacketCaptures()
    {
        return $this->_PacketCaptures_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\PublicIPAddresses
     */
    public function getPublicIPAddresses()
    {
        return $this->_PublicIPAddresses_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\RouteFilters
     */
    public function getRouteFilters()
    {
        return $this->_RouteFilters_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\RouteFilterRules
     */
    public function getRouteFilterRules()
    {
        return $this->_RouteFilterRules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\RouteTables
     */
    public function getRouteTables()
    {
        return $this->_RouteTables_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\Routes
     */
    public function getRoutes()
    {
        return $this->_Routes_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\BgpServiceCommunities
     */
    public function getBgpServiceCommunities()
    {
        return $this->_BgpServiceCommunities_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\Usages
     */
    public function getUsages()
    {
        return $this->_Usages_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\VirtualNetworks
     */
    public function getVirtualNetworks()
    {
        return $this->_VirtualNetworks_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\Subnets
     */
    public function getSubnets()
    {
        return $this->_Subnets_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\VirtualNetworkPeerings
     */
    public function getVirtualNetworkPeerings()
    {
        return $this->_VirtualNetworkPeerings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\VirtualNetworkGateways
     */
    public function getVirtualNetworkGateways()
    {
        return $this->_VirtualNetworkGateways_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\VirtualNetworkGatewayConnections
     */
    public function getVirtualNetworkGatewayConnections()
    {
        return $this->_VirtualNetworkGatewayConnections_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\LocalNetworkGateways
     */
    public function getLocalNetworkGateways()
    {
        return $this->_LocalNetworkGateways_group;
    }
    /**
     * Checks whether a domain name in the cloudapp.net zone is available for use.
     * @param string $location
     * @param string|null $domainNameLabel
     * @return array
     */
    public function checkDnsNameAvailability(
        $location,
        $domainNameLabel = null
    )
    {
        return $this->_CheckDnsNameAvailability_operation->call([
            'location' => $location,
            'domainNameLabel' => $domainNameLabel
        ]);
    }
    /**
     * @var \Microsoft\Azure\Management\Network\ApplicationGateways
     */
    private $_ApplicationGateways_group;
    /**
     * @var \Microsoft\Azure\Management\Network\ExpressRouteCircuitAuthorizations
     */
    private $_ExpressRouteCircuitAuthorizations_group;
    /**
     * @var \Microsoft\Azure\Management\Network\ExpressRouteCircuitPeerings
     */
    private $_ExpressRouteCircuitPeerings_group;
    /**
     * @var \Microsoft\Azure\Management\Network\ExpressRouteCircuits
     */
    private $_ExpressRouteCircuits_group;
    /**
     * @var \Microsoft\Azure\Management\Network\ExpressRouteServiceProviders
     */
    private $_ExpressRouteServiceProviders_group;
    /**
     * @var \Microsoft\Azure\Management\Network\LoadBalancers
     */
    private $_LoadBalancers_group;
    /**
     * @var \Microsoft\Azure\Management\Network\LoadBalancerBackendAddressPools
     */
    private $_LoadBalancerBackendAddressPools_group;
    /**
     * @var \Microsoft\Azure\Management\Network\LoadBalancerFrontendIPConfigurations
     */
    private $_LoadBalancerFrontendIPConfigurations_group;
    /**
     * @var \Microsoft\Azure\Management\Network\InboundNatRules
     */
    private $_InboundNatRules_group;
    /**
     * @var \Microsoft\Azure\Management\Network\LoadBalancerLoadBalancingRules
     */
    private $_LoadBalancerLoadBalancingRules_group;
    /**
     * @var \Microsoft\Azure\Management\Network\LoadBalancerNetworkInterfaces
     */
    private $_LoadBalancerNetworkInterfaces_group;
    /**
     * @var \Microsoft\Azure\Management\Network\LoadBalancerProbes
     */
    private $_LoadBalancerProbes_group;
    /**
     * @var \Microsoft\Azure\Management\Network\NetworkInterfaces
     */
    private $_NetworkInterfaces_group;
    /**
     * @var \Microsoft\Azure\Management\Network\NetworkInterfaceIPConfigurations
     */
    private $_NetworkInterfaceIPConfigurations_group;
    /**
     * @var \Microsoft\Azure\Management\Network\NetworkInterfaceLoadBalancers
     */
    private $_NetworkInterfaceLoadBalancers_group;
    /**
     * @var \Microsoft\Azure\Management\Network\NetworkSecurityGroups
     */
    private $_NetworkSecurityGroups_group;
    /**
     * @var \Microsoft\Azure\Management\Network\SecurityRules
     */
    private $_SecurityRules_group;
    /**
     * @var \Microsoft\Azure\Management\Network\DefaultSecurityRules
     */
    private $_DefaultSecurityRules_group;
    /**
     * @var \Microsoft\Azure\Management\Network\NetworkWatchers
     */
    private $_NetworkWatchers_group;
    /**
     * @var \Microsoft\Azure\Management\Network\PacketCaptures
     */
    private $_PacketCaptures_group;
    /**
     * @var \Microsoft\Azure\Management\Network\PublicIPAddresses
     */
    private $_PublicIPAddresses_group;
    /**
     * @var \Microsoft\Azure\Management\Network\RouteFilters
     */
    private $_RouteFilters_group;
    /**
     * @var \Microsoft\Azure\Management\Network\RouteFilterRules
     */
    private $_RouteFilterRules_group;
    /**
     * @var \Microsoft\Azure\Management\Network\RouteTables
     */
    private $_RouteTables_group;
    /**
     * @var \Microsoft\Azure\Management\Network\Routes
     */
    private $_Routes_group;
    /**
     * @var \Microsoft\Azure\Management\Network\BgpServiceCommunities
     */
    private $_BgpServiceCommunities_group;
    /**
     * @var \Microsoft\Azure\Management\Network\Usages
     */
    private $_Usages_group;
    /**
     * @var \Microsoft\Azure\Management\Network\VirtualNetworks
     */
    private $_VirtualNetworks_group;
    /**
     * @var \Microsoft\Azure\Management\Network\Subnets
     */
    private $_Subnets_group;
    /**
     * @var \Microsoft\Azure\Management\Network\VirtualNetworkPeerings
     */
    private $_VirtualNetworkPeerings_group;
    /**
     * @var \Microsoft\Azure\Management\Network\VirtualNetworkGateways
     */
    private $_VirtualNetworkGateways_group;
    /**
     * @var \Microsoft\Azure\Management\Network\VirtualNetworkGatewayConnections
     */
    private $_VirtualNetworkGatewayConnections_group;
    /**
     * @var \Microsoft\Azure\Management\Network\LocalNetworkGateways
     */
    private $_LocalNetworkGateways_group;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckDnsNameAvailability_operation;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/applicationGateways/{applicationGatewayName}' => [
                'delete' => [
                    'operationId' => 'ApplicationGateways_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'applicationGatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '204' => [],
                        '200' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'ApplicationGateways_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'applicationGatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplicationGateway']]]
                ],
                'put' => [
                    'operationId' => 'ApplicationGateways_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'applicationGatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ApplicationGateway']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/ApplicationGateway']],
                        '200' => ['schema' => ['$ref' => '#/definitions/ApplicationGateway']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/applicationGateways' => ['get' => [
                'operationId' => 'ApplicationGateways_List',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplicationGatewayListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/applicationGateways' => ['get' => [
                'operationId' => 'ApplicationGateways_ListAll',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplicationGatewayListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/applicationGateways/{applicationGatewayName}/start' => ['post' => [
                'operationId' => 'ApplicationGateways_Start',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'applicationGatewayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
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
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/applicationGateways/{applicationGatewayName}/stop' => ['post' => [
                'operationId' => 'ApplicationGateways_Stop',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'applicationGatewayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
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
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/applicationGateways/{applicationGatewayName}/backendhealth' => ['post' => [
                'operationId' => 'ApplicationGateways_BackendHealth',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'applicationGatewayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ApplicationGatewayBackendHealth']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/applicationGatewayAvailableWafRuleSets' => ['get' => [
                'operationId' => 'ApplicationGateways_ListAvailableWafRuleSets',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplicationGatewayAvailableWafRuleSetsResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/applicationGatewayAvailableSslOptions/default' => ['get' => [
                'operationId' => 'ApplicationGateways_ListAvailableSslOptions',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplicationGatewayAvailableSslOptions']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/applicationGatewayAvailableSslOptions/default/predefinedPolicies' => ['get' => [
                'operationId' => 'ApplicationGateways_ListAvailableSslPredefinedPolicies',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplicationGatewayAvailableSslPredefinedPolicies']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/applicationGatewayAvailableSslOptions/default/predefinedPolicies/{predefinedPolicyName}' => ['get' => [
                'operationId' => 'ApplicationGateways_GetSslPredefinedPolicy',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'predefinedPolicyName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplicationGatewaySslPredefinedPolicy']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/locations/{location}/CheckDnsNameAvailability' => ['get' => [
                'operationId' => 'CheckDnsNameAvailability',
                'parameters' => [
                    [
                        'name' => 'location',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'domainNameLabel',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DnsNameAvailabilityResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/expressRouteCircuits/{circuitName}/authorizations/{authorizationName}' => [
                'delete' => [
                    'operationId' => 'ExpressRouteCircuitAuthorizations_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'circuitName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authorizationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'ExpressRouteCircuitAuthorizations_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'circuitName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authorizationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuitAuthorization']]]
                ],
                'put' => [
                    'operationId' => 'ExpressRouteCircuitAuthorizations_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'circuitName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authorizationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'authorizationParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ExpressRouteCircuitAuthorization']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuitAuthorization']],
                        '200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuitAuthorization']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/expressRouteCircuits/{circuitName}/authorizations' => ['get' => [
                'operationId' => 'ExpressRouteCircuitAuthorizations_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'circuitName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AuthorizationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/expressRouteCircuits/{circuitName}/peerings/{peeringName}' => [
                'delete' => [
                    'operationId' => 'ExpressRouteCircuitPeerings_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'circuitName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'peeringName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '202' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'ExpressRouteCircuitPeerings_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'circuitName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'peeringName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuitPeering']]]
                ],
                'put' => [
                    'operationId' => 'ExpressRouteCircuitPeerings_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'circuitName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'peeringName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'peeringParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ExpressRouteCircuitPeering']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuitPeering']],
                        '201' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuitPeering']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/expressRouteCircuits/{circuitName}/peerings' => ['get' => [
                'operationId' => 'ExpressRouteCircuitPeerings_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'circuitName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuitPeeringListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/expressRouteCircuits/{circuitName}' => [
                'delete' => [
                    'operationId' => 'ExpressRouteCircuits_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'circuitName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '202' => [],
                        '200' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'ExpressRouteCircuits_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'circuitName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuit']]]
                ],
                'put' => [
                    'operationId' => 'ExpressRouteCircuits_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'circuitName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ExpressRouteCircuit']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuit']],
                        '200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuit']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/expressRouteCircuits/{circuitName}/peerings/{peeringName}/arpTables/{devicePath}' => ['post' => [
                'operationId' => 'ExpressRouteCircuits_ListArpTable',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'circuitName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'peeringName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'devicePath',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuitsArpTableListResult']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/expressRouteCircuits/{circuitName}/peerings/{peeringName}/routeTables/{devicePath}' => ['post' => [
                'operationId' => 'ExpressRouteCircuits_ListRoutesTable',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'circuitName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'peeringName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'devicePath',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuitsRoutesTableListResult']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/expressRouteCircuits/{circuitName}/peerings/{peeringName}/routeTablesSummary/{devicePath}' => ['post' => [
                'operationId' => 'ExpressRouteCircuits_ListRoutesTableSummary',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'circuitName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'peeringName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'devicePath',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuitsRoutesTableSummaryListResult']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/expressRouteCircuits/{circuitName}/stats' => ['get' => [
                'operationId' => 'ExpressRouteCircuits_GetStats',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'circuitName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuitStats']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/expressRouteCircuits/{circuitName}/peerings/{peeringName}/stats' => ['get' => [
                'operationId' => 'ExpressRouteCircuits_GetPeeringStats',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'circuitName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'peeringName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuitStats']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/expressRouteCircuits' => ['get' => [
                'operationId' => 'ExpressRouteCircuits_List',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuitListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/expressRouteCircuits' => ['get' => [
                'operationId' => 'ExpressRouteCircuits_ListAll',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteCircuitListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/expressRouteServiceProviders' => ['get' => [
                'operationId' => 'ExpressRouteServiceProviders_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ExpressRouteServiceProviderListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/loadBalancers/{loadBalancerName}' => [
                'delete' => [
                    'operationId' => 'LoadBalancers_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'loadBalancerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '202' => [],
                        '200' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'LoadBalancers_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'loadBalancerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LoadBalancer']]]
                ],
                'put' => [
                    'operationId' => 'LoadBalancers_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'loadBalancerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/LoadBalancer']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/LoadBalancer']],
                        '200' => ['schema' => ['$ref' => '#/definitions/LoadBalancer']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/loadBalancers' => ['get' => [
                'operationId' => 'LoadBalancers_ListAll',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LoadBalancerListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/loadBalancers' => ['get' => [
                'operationId' => 'LoadBalancers_List',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LoadBalancerListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/loadBalancers/{loadBalancerName}/backendAddressPools' => ['get' => [
                'operationId' => 'LoadBalancerBackendAddressPools_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'loadBalancerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LoadBalancerBackendAddressPoolListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/loadBalancers/{loadBalancerName}/backendAddressPools/{backendAddressPoolName}' => ['get' => [
                'operationId' => 'LoadBalancerBackendAddressPools_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'loadBalancerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'backendAddressPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackendAddressPool']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/loadBalancers/{loadBalancerName}/frontendIPConfigurations' => ['get' => [
                'operationId' => 'LoadBalancerFrontendIPConfigurations_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'loadBalancerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LoadBalancerFrontendIPConfigurationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/loadBalancers/{loadBalancerName}/frontendIPConfigurations/{frontendIPConfigurationName}' => ['get' => [
                'operationId' => 'LoadBalancerFrontendIPConfigurations_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'loadBalancerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'frontendIPConfigurationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FrontendIPConfiguration']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/loadBalancers/{loadBalancerName}/inboundNatRules' => ['get' => [
                'operationId' => 'InboundNatRules_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'loadBalancerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/InboundNatRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/loadBalancers/{loadBalancerName}/inboundNatRules/{inboundNatRuleName}' => [
                'delete' => [
                    'operationId' => 'InboundNatRules_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'loadBalancerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'inboundNatRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '202' => [],
                        '200' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'InboundNatRules_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'loadBalancerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'inboundNatRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/InboundNatRule']]]
                ],
                'put' => [
                    'operationId' => 'InboundNatRules_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'loadBalancerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'inboundNatRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'inboundNatRuleParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/InboundNatRule']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/InboundNatRule']],
                        '200' => ['schema' => ['$ref' => '#/definitions/InboundNatRule']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/loadBalancers/{loadBalancerName}/loadBalancingRules' => ['get' => [
                'operationId' => 'LoadBalancerLoadBalancingRules_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'loadBalancerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LoadBalancerLoadBalancingRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/loadBalancers/{loadBalancerName}/loadBalancingRules/{loadBalancingRuleName}' => ['get' => [
                'operationId' => 'LoadBalancerLoadBalancingRules_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'loadBalancerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'loadBalancingRuleName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LoadBalancingRule']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/loadBalancers/{loadBalancerName}/networkInterfaces' => ['get' => [
                'operationId' => 'LoadBalancerNetworkInterfaces_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'loadBalancerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkInterfaceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/loadBalancers/{loadBalancerName}/probes' => ['get' => [
                'operationId' => 'LoadBalancerProbes_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'loadBalancerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LoadBalancerProbeListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/loadBalancers/{loadBalancerName}/probes/{probeName}' => ['get' => [
                'operationId' => 'LoadBalancerProbes_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'loadBalancerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'probeName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Probe']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkInterfaces/{networkInterfaceName}' => [
                'delete' => [
                    'operationId' => 'NetworkInterfaces_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkInterfaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '202' => [],
                        '200' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'NetworkInterfaces_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkInterfaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkInterface']]]
                ],
                'put' => [
                    'operationId' => 'NetworkInterfaces_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkInterfaceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/NetworkInterface']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/NetworkInterface']],
                        '200' => ['schema' => ['$ref' => '#/definitions/NetworkInterface']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/networkInterfaces' => ['get' => [
                'operationId' => 'NetworkInterfaces_ListAll',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkInterfaceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkInterfaces' => ['get' => [
                'operationId' => 'NetworkInterfaces_List',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkInterfaceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkInterfaces/{networkInterfaceName}/effectiveRouteTable' => ['post' => [
                'operationId' => 'NetworkInterfaces_GetEffectiveRouteTable',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkInterfaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/EffectiveRouteListResult']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkInterfaces/{networkInterfaceName}/effectiveNetworkSecurityGroups' => ['post' => [
                'operationId' => 'NetworkInterfaces_ListEffectiveNetworkSecurityGroups',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkInterfaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/EffectiveNetworkSecurityGroupListResult']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/microsoft.Compute/virtualMachineScaleSets/{virtualMachineScaleSetName}/virtualMachines/{virtualmachineIndex}/networkInterfaces' => ['get' => [
                'operationId' => 'NetworkInterfaces_ListVirtualMachineScaleSetVMNetworkInterfaces',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualMachineScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualmachineIndex',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkInterfaceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/microsoft.Compute/virtualMachineScaleSets/{virtualMachineScaleSetName}/networkInterfaces' => ['get' => [
                'operationId' => 'NetworkInterfaces_ListVirtualMachineScaleSetNetworkInterfaces',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualMachineScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkInterfaceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/microsoft.Compute/virtualMachineScaleSets/{virtualMachineScaleSetName}/virtualMachines/{virtualmachineIndex}/networkInterfaces/{networkInterfaceName}' => ['get' => [
                'operationId' => 'NetworkInterfaces_GetVirtualMachineScaleSetNetworkInterface',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualMachineScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualmachineIndex',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkInterfaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkInterface']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkInterfaces/{networkInterfaceName}/ipConfigurations' => ['get' => [
                'operationId' => 'NetworkInterfaceIPConfigurations_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkInterfaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkInterfaceIPConfigurationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkInterfaces/{networkInterfaceName}/ipConfigurations/{ipConfigurationName}' => ['get' => [
                'operationId' => 'NetworkInterfaceIPConfigurations_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkInterfaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'ipConfigurationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkInterfaceIPConfiguration']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkInterfaces/{networkInterfaceName}/loadBalancers' => ['get' => [
                'operationId' => 'NetworkInterfaceLoadBalancers_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkInterfaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkInterfaceLoadBalancerListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkSecurityGroups/{networkSecurityGroupName}' => [
                'delete' => [
                    'operationId' => 'NetworkSecurityGroups_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkSecurityGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'NetworkSecurityGroups_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkSecurityGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkSecurityGroup']]]
                ],
                'put' => [
                    'operationId' => 'NetworkSecurityGroups_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkSecurityGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/NetworkSecurityGroup']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/NetworkSecurityGroup']],
                        '200' => ['schema' => ['$ref' => '#/definitions/NetworkSecurityGroup']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/networkSecurityGroups' => ['get' => [
                'operationId' => 'NetworkSecurityGroups_ListAll',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkSecurityGroupListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkSecurityGroups' => ['get' => [
                'operationId' => 'NetworkSecurityGroups_List',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkSecurityGroupListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkSecurityGroups/{networkSecurityGroupName}/securityRules/{securityRuleName}' => [
                'delete' => [
                    'operationId' => 'SecurityRules_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkSecurityGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'securityRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '202' => [],
                        '200' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'SecurityRules_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkSecurityGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'securityRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SecurityRule']]]
                ],
                'put' => [
                    'operationId' => 'SecurityRules_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkSecurityGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'securityRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'securityRuleParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SecurityRule']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/SecurityRule']],
                        '201' => ['schema' => ['$ref' => '#/definitions/SecurityRule']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkSecurityGroups/{networkSecurityGroupName}/securityRules' => ['get' => [
                'operationId' => 'SecurityRules_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkSecurityGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SecurityRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkSecurityGroups/{networkSecurityGroupName}/defaultSecurityRules' => ['get' => [
                'operationId' => 'DefaultSecurityRules_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkSecurityGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SecurityRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkSecurityGroups/{networkSecurityGroupName}/defaultSecurityRules/{defaultSecurityRuleName}' => ['get' => [
                'operationId' => 'DefaultSecurityRules_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkSecurityGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'defaultSecurityRuleName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SecurityRule']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers/{networkWatcherName}' => [
                'put' => [
                    'operationId' => 'NetworkWatchers_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkWatcherName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/NetworkWatcher']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/NetworkWatcher']],
                        '201' => ['schema' => ['$ref' => '#/definitions/NetworkWatcher']]
                    ]
                ],
                'get' => [
                    'operationId' => 'NetworkWatchers_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkWatcherName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkWatcher']]]
                ],
                'delete' => [
                    'operationId' => 'NetworkWatchers_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkWatcherName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers' => ['get' => [
                'operationId' => 'NetworkWatchers_List',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkWatcherListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/networkWatchers' => ['get' => [
                'operationId' => 'NetworkWatchers_ListAll',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkWatcherListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers/{networkWatcherName}/topology' => ['post' => [
                'operationId' => 'NetworkWatchers_GetTopology',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkWatcherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/TopologyParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Topology']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers/{networkWatcherName}/ipFlowVerify' => ['post' => [
                'operationId' => 'NetworkWatchers_VerifyIPFlow',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkWatcherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/VerificationIPFlowParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/VerificationIPFlowResult']],
                    '202' => ['schema' => ['$ref' => '#/definitions/VerificationIPFlowResult']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers/{networkWatcherName}/nextHop' => ['post' => [
                'operationId' => 'NetworkWatchers_GetNextHop',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkWatcherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/NextHopParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/NextHopResult']],
                    '202' => ['schema' => ['$ref' => '#/definitions/NextHopResult']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers/{networkWatcherName}/securityGroupView' => ['post' => [
                'operationId' => 'NetworkWatchers_GetVMSecurityRules',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkWatcherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/SecurityGroupViewParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/SecurityGroupViewResult']],
                    '202' => ['schema' => ['$ref' => '#/definitions/SecurityGroupViewResult']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers/{networkWatcherName}/troubleshoot' => ['post' => [
                'operationId' => 'NetworkWatchers_GetTroubleshooting',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkWatcherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/TroubleshootingParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/TroubleshootingResult']],
                    '202' => ['schema' => ['$ref' => '#/definitions/TroubleshootingResult']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers/{networkWatcherName}/queryTroubleshootResult' => ['post' => [
                'operationId' => 'NetworkWatchers_GetTroubleshootingResult',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkWatcherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/QueryTroubleshootingParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/TroubleshootingResult']],
                    '202' => ['schema' => ['$ref' => '#/definitions/TroubleshootingResult']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers/{networkWatcherName}/configureFlowLog' => ['post' => [
                'operationId' => 'NetworkWatchers_SetFlowLogConfiguration',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkWatcherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/FlowLogInformation']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/FlowLogInformation']],
                    '202' => ['schema' => ['$ref' => '#/definitions/FlowLogInformation']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers/{networkWatcherName}/queryFlowLogStatus' => ['post' => [
                'operationId' => 'NetworkWatchers_GetFlowLogStatus',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkWatcherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/FlowLogStatusParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/FlowLogInformation']],
                    '202' => ['schema' => ['$ref' => '#/definitions/FlowLogInformation']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers/{networkWatcherName}/connectivityCheck' => ['post' => [
                'operationId' => 'NetworkWatchers_CheckConnectivity',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkWatcherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ConnectivityParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ConnectivityInformation']],
                    '202' => ['schema' => ['$ref' => '#/definitions/ConnectivityInformation']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers/{networkWatcherName}/packetCaptures/{packetCaptureName}' => [
                'put' => [
                    'operationId' => 'PacketCaptures_Create',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkWatcherName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'packetCaptureName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/PacketCapture']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['201' => ['schema' => ['$ref' => '#/definitions/PacketCaptureResult']]]
                ],
                'get' => [
                    'operationId' => 'PacketCaptures_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkWatcherName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'packetCaptureName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PacketCaptureResult']]]
                ],
                'delete' => [
                    'operationId' => 'PacketCaptures_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkWatcherName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'packetCaptureName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers/{networkWatcherName}/packetCaptures/{packetCaptureName}/stop' => ['post' => [
                'operationId' => 'PacketCaptures_Stop',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkWatcherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'packetCaptureName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
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
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers/{networkWatcherName}/packetCaptures/{packetCaptureName}/queryStatus' => ['post' => [
                'operationId' => 'PacketCaptures_GetStatus',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkWatcherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'packetCaptureName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/PacketCaptureQueryStatusResult']],
                    '202' => ['schema' => ['$ref' => '#/definitions/PacketCaptureQueryStatusResult']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/networkWatchers/{networkWatcherName}/packetCaptures' => ['get' => [
                'operationId' => 'PacketCaptures_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkWatcherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PacketCaptureListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/publicIPAddresses/{publicIpAddressName}' => [
                'delete' => [
                    'operationId' => 'PublicIPAddresses_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'publicIpAddressName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '202' => [],
                        '200' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'PublicIPAddresses_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'publicIpAddressName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PublicIPAddress']]]
                ],
                'put' => [
                    'operationId' => 'PublicIPAddresses_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'publicIpAddressName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/PublicIPAddress']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/PublicIPAddress']],
                        '200' => ['schema' => ['$ref' => '#/definitions/PublicIPAddress']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/publicIPAddresses' => ['get' => [
                'operationId' => 'PublicIPAddresses_ListAll',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PublicIPAddressListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/publicIPAddresses' => ['get' => [
                'operationId' => 'PublicIPAddresses_List',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PublicIPAddressListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{virtualMachineScaleSetName}/publicipaddresses' => ['get' => [
                'operationId' => 'PublicIPAddresses_ListVirtualMachineScaleSetPublicIPAddresses',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualMachineScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PublicIPAddressListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{virtualMachineScaleSetName}/virtualMachines/{virtualmachineIndex}/networkInterfaces/{networkInterfaceName}/ipconfigurations/{ipConfigurationName}/publicipaddresses' => ['get' => [
                'operationId' => 'PublicIPAddresses_ListVirtualMachineScaleSetVMPublicIPAddresses',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualMachineScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualmachineIndex',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkInterfaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'ipConfigurationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PublicIPAddressListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{virtualMachineScaleSetName}/virtualMachines/{virtualmachineIndex}/networkInterfaces/{networkInterfaceName}/ipconfigurations/{ipConfigurationName}/publicipaddresses/{publicIpAddressName}' => ['get' => [
                'operationId' => 'PublicIPAddresses_GetVirtualMachineScaleSetPublicIPAddress',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualMachineScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualmachineIndex',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'networkInterfaceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'ipConfigurationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'publicIpAddressName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PublicIPAddress']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/routeFilters/{routeFilterName}' => [
                'delete' => [
                    'operationId' => 'RouteFilters_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeFilterName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'RouteFilters_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeFilterName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RouteFilter']]]
                ],
                'put' => [
                    'operationId' => 'RouteFilters_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeFilterName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeFilterParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/RouteFilter']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/RouteFilter']],
                        '201' => ['schema' => ['$ref' => '#/definitions/RouteFilter']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'RouteFilters_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeFilterName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeFilterParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/PatchRouteFilter']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RouteFilter']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/routeFilters' => ['get' => [
                'operationId' => 'RouteFilters_ListByResourceGroup',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RouteFilterListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/routeFilters' => ['get' => [
                'operationId' => 'RouteFilters_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RouteFilterListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/routeFilters/{routeFilterName}/routeFilterRules/{ruleName}' => [
                'delete' => [
                    'operationId' => 'RouteFilterRules_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeFilterName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'ruleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'RouteFilterRules_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeFilterName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'ruleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RouteFilterRule']]]
                ],
                'put' => [
                    'operationId' => 'RouteFilterRules_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeFilterName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'ruleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeFilterRuleParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/RouteFilterRule']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/RouteFilterRule']],
                        '201' => ['schema' => ['$ref' => '#/definitions/RouteFilterRule']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'RouteFilterRules_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeFilterName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'ruleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeFilterRuleParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/PatchRouteFilterRule']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RouteFilterRule']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/routeFilters/{routeFilterName}/routeFilterRules' => ['get' => [
                'operationId' => 'RouteFilterRules_ListByRouteFilter',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'routeFilterName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RouteFilterRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/routeTables/{routeTableName}' => [
                'delete' => [
                    'operationId' => 'RouteTables_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeTableName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '200' => [],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'RouteTables_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeTableName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RouteTable']]]
                ],
                'put' => [
                    'operationId' => 'RouteTables_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeTableName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/RouteTable']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/RouteTable']],
                        '201' => ['schema' => ['$ref' => '#/definitions/RouteTable']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/routeTables' => ['get' => [
                'operationId' => 'RouteTables_List',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RouteTableListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/routeTables' => ['get' => [
                'operationId' => 'RouteTables_ListAll',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RouteTableListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/routeTables/{routeTableName}/routes/{routeName}' => [
                'delete' => [
                    'operationId' => 'Routes_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeTableName',
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Routes_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeTableName',
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Route']]]
                ],
                'put' => [
                    'operationId' => 'Routes_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'routeTableName',
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
                            'name' => 'routeParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Route']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Route']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Route']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/routeTables/{routeTableName}/routes' => ['get' => [
                'operationId' => 'Routes_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'routeTableName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RouteListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/bgpServiceCommunities' => ['get' => [
                'operationId' => 'BgpServiceCommunities_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BgpServiceCommunityListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/locations/{location}/usages' => ['get' => [
                'operationId' => 'Usages_List',
                'parameters' => [
                    [
                        'name' => 'location',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/UsagesListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}' => [
                'delete' => [
                    'operationId' => 'VirtualNetworks_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '204' => [],
                        '200' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'VirtualNetworks_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualNetwork']]]
                ],
                'put' => [
                    'operationId' => 'VirtualNetworks_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VirtualNetwork']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VirtualNetwork']],
                        '201' => ['schema' => ['$ref' => '#/definitions/VirtualNetwork']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Network/virtualNetworks' => ['get' => [
                'operationId' => 'VirtualNetworks_ListAll',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks' => ['get' => [
                'operationId' => 'VirtualNetworks_List',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}/CheckIPAddressAvailability' => ['get' => [
                'operationId' => 'VirtualNetworks_CheckIPAddressAvailability',
                'parameters' => [
                    [
                        'name' => 'ipAddress',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualNetworkName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IPAddressAvailabilityResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}/usages' => ['get' => [
                'operationId' => 'VirtualNetworks_ListUsage',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualNetworkName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkListUsageResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}/subnets/{subnetName}' => [
                'delete' => [
                    'operationId' => 'Subnets_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '204' => [],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Subnets_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Subnet']]]
                ],
                'put' => [
                    'operationId' => 'Subnets_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subnetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subnetParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Subnet']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Subnet']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Subnet']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}/subnets' => ['get' => [
                'operationId' => 'Subnets_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualNetworkName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SubnetListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}/virtualNetworkPeerings/{virtualNetworkPeeringName}' => [
                'delete' => [
                    'operationId' => 'VirtualNetworkPeerings_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkPeeringName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '204' => [],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'VirtualNetworkPeerings_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkPeeringName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkPeering']]]
                ],
                'put' => [
                    'operationId' => 'VirtualNetworkPeerings_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkPeeringName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'VirtualNetworkPeeringParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VirtualNetworkPeering']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkPeering']],
                        '201' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkPeering']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworks/{virtualNetworkName}/virtualNetworkPeerings' => ['get' => [
                'operationId' => 'VirtualNetworkPeerings_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualNetworkName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkPeeringListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworkGateways/{virtualNetworkGatewayName}' => [
                'put' => [
                    'operationId' => 'VirtualNetworkGateways_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkGatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VirtualNetworkGateway']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkGateway']],
                        '201' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkGateway']]
                    ]
                ],
                'get' => [
                    'operationId' => 'VirtualNetworkGateways_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkGatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkGateway']]]
                ],
                'delete' => [
                    'operationId' => 'VirtualNetworkGateways_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkGatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '202' => [],
                        '200' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworkGateways' => ['get' => [
                'operationId' => 'VirtualNetworkGateways_List',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkGatewayListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworkGateways/{virtualNetworkGatewayName}/connections' => ['get' => [
                'operationId' => 'VirtualNetworkGateways_ListConnections',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualNetworkGatewayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkGatewayListConnectionsResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworkGateways/{virtualNetworkGatewayName}/reset' => ['post' => [
                'operationId' => 'VirtualNetworkGateways_Reset',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualNetworkGatewayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'gatewayVip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
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
                    '200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkGateway']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworkGateways/{virtualNetworkGatewayName}/generatevpnclientpackage' => ['post' => [
                'operationId' => 'VirtualNetworkGateways_Generatevpnclientpackage',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualNetworkGatewayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/VpnClientParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'string']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworkGateways/{virtualNetworkGatewayName}/generatevpnprofile' => ['post' => [
                'operationId' => 'VirtualNetworkGateways_GenerateVpnProfile',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualNetworkGatewayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/VpnClientParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'string']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworkGateways/{virtualNetworkGatewayName}/getBgpPeerStatus' => ['post' => [
                'operationId' => 'VirtualNetworkGateways_GetBgpPeerStatus',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualNetworkGatewayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'peer',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/BgpPeerStatusListResult']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworkGateways/{virtualNetworkGatewayName}/getLearnedRoutes' => ['post' => [
                'operationId' => 'VirtualNetworkGateways_GetLearnedRoutes',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualNetworkGatewayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/GatewayRouteListResult']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/virtualNetworkGateways/{virtualNetworkGatewayName}/getAdvertisedRoutes' => ['post' => [
                'operationId' => 'VirtualNetworkGateways_GetAdvertisedRoutes',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualNetworkGatewayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'peer',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/GatewayRouteListResult']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/connections/{virtualNetworkGatewayConnectionName}' => [
                'put' => [
                    'operationId' => 'VirtualNetworkGatewayConnections_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkGatewayConnectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VirtualNetworkGatewayConnection']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkGatewayConnection']],
                        '201' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkGatewayConnection']]
                    ]
                ],
                'get' => [
                    'operationId' => 'VirtualNetworkGatewayConnections_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkGatewayConnectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkGatewayConnection']]]
                ],
                'delete' => [
                    'operationId' => 'VirtualNetworkGatewayConnections_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkGatewayConnectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/connections/{virtualNetworkGatewayConnectionName}/sharedkey' => [
                'put' => [
                    'operationId' => 'VirtualNetworkGatewayConnections_SetSharedKey',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkGatewayConnectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ConnectionSharedKey']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/ConnectionSharedKey']],
                        '200' => ['schema' => ['$ref' => '#/definitions/ConnectionSharedKey']]
                    ]
                ],
                'get' => [
                    'operationId' => 'VirtualNetworkGatewayConnections_GetSharedKey',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkGatewayConnectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ConnectionSharedKey']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/connections' => ['get' => [
                'operationId' => 'VirtualNetworkGatewayConnections_List',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkGatewayConnectionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/connections/{virtualNetworkGatewayConnectionName}/sharedkey/reset' => ['post' => [
                'operationId' => 'VirtualNetworkGatewayConnections_ResetSharedKey',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualNetworkGatewayConnectionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ConnectionResetSharedKey']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ConnectionResetSharedKey']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/localNetworkGateways/{localNetworkGatewayName}' => [
                'put' => [
                    'operationId' => 'LocalNetworkGateways_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'localNetworkGatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/LocalNetworkGateway']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/LocalNetworkGateway']],
                        '200' => ['schema' => ['$ref' => '#/definitions/LocalNetworkGateway']]
                    ]
                ],
                'get' => [
                    'operationId' => 'LocalNetworkGateways_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'localNetworkGatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LocalNetworkGateway']]]
                ],
                'delete' => [
                    'operationId' => 'LocalNetworkGateways_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'localNetworkGatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
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
                        '200' => [],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Network/localNetworkGateways' => ['get' => [
                'operationId' => 'LocalNetworkGateways_List',
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
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LocalNetworkGatewayListResult']]]
            ]]
        ],
        'definitions' => [
            'SubResource' => [
                'properties' => ['id' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackendAddressPoolPropertiesFormat' => [
                'properties' => [
                    'backendIPConfigurations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/NetworkInterfaceIPConfiguration']
                    ],
                    'loadBalancingRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ],
                    'outboundNatRule' => ['$ref' => '#/definitions/SubResource'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackendAddressPool' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/BackendAddressPoolPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'InboundNatRulePropertiesFormat' => [
                'properties' => [
                    'frontendIPConfiguration' => ['$ref' => '#/definitions/SubResource'],
                    'backendIPConfiguration' => ['$ref' => '#/definitions/NetworkInterfaceIPConfiguration'],
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'Udp',
                            'Tcp'
                        ]
                    ],
                    'frontendPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'backendPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'idleTimeoutInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'enableFloatingIP' => ['type' => 'boolean'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'InboundNatRule' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/InboundNatRulePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SecurityRulePropertiesFormat' => [
                'properties' => [
                    'description' => ['type' => 'string'],
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'Tcp',
                            'Udp',
                            '*'
                        ]
                    ],
                    'sourcePortRange' => ['type' => 'string'],
                    'destinationPortRange' => ['type' => 'string'],
                    'sourceAddressPrefix' => ['type' => 'string'],
                    'sourceAddressPrefixes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'destinationAddressPrefix' => ['type' => 'string'],
                    'destinationAddressPrefixes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'sourcePortRanges' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'destinationPortRanges' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'access' => [
                        'type' => 'string',
                        'enum' => [
                            'Allow',
                            'Deny'
                        ]
                    ],
                    'priority' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'direction' => [
                        'type' => 'string',
                        'enum' => [
                            'Inbound',
                            'Outbound'
                        ]
                    ],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'protocol',
                    'sourceAddressPrefix',
                    'destinationAddressPrefix',
                    'access',
                    'direction'
                ]
            ],
            'SecurityRule' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/SecurityRulePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkInterfaceDnsSettings' => [
                'properties' => [
                    'dnsServers' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'appliedDnsServers' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'internalDnsNameLabel' => ['type' => 'string'],
                    'internalFqdn' => ['type' => 'string'],
                    'internalDomainNameSuffix' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkInterfacePropertiesFormat' => [
                'properties' => [
                    'virtualMachine' => ['$ref' => '#/definitions/SubResource'],
                    'networkSecurityGroup' => ['$ref' => '#/definitions/NetworkSecurityGroup'],
                    'ipConfigurations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/NetworkInterfaceIPConfiguration']
                    ],
                    'dnsSettings' => ['$ref' => '#/definitions/NetworkInterfaceDnsSettings'],
                    'macAddress' => ['type' => 'string'],
                    'primary' => ['type' => 'boolean'],
                    'enableAcceleratedNetworking' => ['type' => 'boolean'],
                    'enableIPForwarding' => ['type' => 'boolean'],
                    'resourceGuid' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkInterface' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/NetworkInterfacePropertiesFormat'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkSecurityGroupPropertiesFormat' => [
                'properties' => [
                    'securityRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SecurityRule']
                    ],
                    'defaultSecurityRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SecurityRule']
                    ],
                    'networkInterfaces' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/NetworkInterface']
                    ],
                    'subnets' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Subnet']
                    ],
                    'resourceGuid' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkSecurityGroup' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/NetworkSecurityGroupPropertiesFormat'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RoutePropertiesFormat' => [
                'properties' => [
                    'addressPrefix' => ['type' => 'string'],
                    'nextHopType' => [
                        'type' => 'string',
                        'enum' => [
                            'VirtualNetworkGateway',
                            'VnetLocal',
                            'Internet',
                            'VirtualAppliance',
                            'None'
                        ]
                    ],
                    'nextHopIpAddress' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['nextHopType']
            ],
            'Route' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/RoutePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RouteTablePropertiesFormat' => [
                'properties' => [
                    'routes' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Route']
                    ],
                    'subnets' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Subnet']
                    ],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RouteTable' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/RouteTablePropertiesFormat'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PublicIPAddressDnsSettings' => [
                'properties' => [
                    'domainNameLabel' => ['type' => 'string'],
                    'fqdn' => ['type' => 'string'],
                    'reverseFqdn' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PublicIPAddressPropertiesFormat' => [
                'properties' => [
                    'publicIPAllocationMethod' => [
                        'type' => 'string',
                        'enum' => [
                            'Static',
                            'Dynamic'
                        ]
                    ],
                    'publicIPAddressVersion' => [
                        'type' => 'string',
                        'enum' => [
                            'IPv4',
                            'IPv6'
                        ]
                    ],
                    'ipConfiguration' => ['$ref' => '#/definitions/IPConfiguration'],
                    'dnsSettings' => ['$ref' => '#/definitions/PublicIPAddressDnsSettings'],
                    'ipAddress' => ['type' => 'string'],
                    'idleTimeoutInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'resourceGuid' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PublicIPAddress' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/PublicIPAddressPropertiesFormat'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IPConfigurationPropertiesFormat' => [
                'properties' => [
                    'privateIPAddress' => ['type' => 'string'],
                    'privateIPAllocationMethod' => [
                        'type' => 'string',
                        'enum' => [
                            'Static',
                            'Dynamic'
                        ]
                    ],
                    'subnet' => ['$ref' => '#/definitions/Subnet'],
                    'publicIPAddress' => ['$ref' => '#/definitions/PublicIPAddress'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IPConfiguration' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/IPConfigurationPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceNavigationLinkFormat' => [
                'properties' => [
                    'linkedResourceType' => ['type' => 'string'],
                    'link' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceNavigationLink' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ResourceNavigationLinkFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubnetPropertiesFormat' => [
                'properties' => [
                    'addressPrefix' => ['type' => 'string'],
                    'networkSecurityGroup' => ['$ref' => '#/definitions/NetworkSecurityGroup'],
                    'routeTable' => ['$ref' => '#/definitions/RouteTable'],
                    'ipConfigurations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/IPConfiguration']
                    ],
                    'resourceNavigationLinks' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceNavigationLink']
                    ],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Subnet' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/SubnetPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkInterfaceIPConfigurationPropertiesFormat' => [
                'properties' => [
                    'applicationGatewayBackendAddressPools' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayBackendAddressPool']
                    ],
                    'loadBalancerBackendAddressPools' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/BackendAddressPool']
                    ],
                    'loadBalancerInboundNatRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InboundNatRule']
                    ],
                    'privateIPAddress' => ['type' => 'string'],
                    'privateIPAllocationMethod' => [
                        'type' => 'string',
                        'enum' => [
                            'Static',
                            'Dynamic'
                        ]
                    ],
                    'privateIPAddressVersion' => [
                        'type' => 'string',
                        'enum' => [
                            'IPv4',
                            'IPv6'
                        ]
                    ],
                    'subnet' => ['$ref' => '#/definitions/Subnet'],
                    'primary' => ['type' => 'boolean'],
                    'publicIPAddress' => ['$ref' => '#/definitions/PublicIPAddress'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkInterfaceIPConfiguration' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/NetworkInterfaceIPConfigurationPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayBackendAddress' => [
                'properties' => [
                    'fqdn' => ['type' => 'string'],
                    'ipAddress' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayBackendAddressPoolPropertiesFormat' => [
                'properties' => [
                    'backendIPConfigurations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/NetworkInterfaceIPConfiguration']
                    ],
                    'backendAddresses' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayBackendAddress']
                    ],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayBackendAddressPool' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewayBackendAddressPoolPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayConnectionDraining' => [
                'properties' => [
                    'enabled' => ['type' => 'boolean'],
                    'drainTimeoutInSec' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'enabled',
                    'drainTimeoutInSec'
                ]
            ],
            'ApplicationGatewayBackendHttpSettingsPropertiesFormat' => [
                'properties' => [
                    'port' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'Http',
                            'Https'
                        ]
                    ],
                    'cookieBasedAffinity' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'requestTimeout' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'probe' => ['$ref' => '#/definitions/SubResource'],
                    'authenticationCertificates' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ],
                    'connectionDraining' => ['$ref' => '#/definitions/ApplicationGatewayConnectionDraining'],
                    'hostName' => ['type' => 'string'],
                    'pickHostNameFromBackendAddress' => ['type' => 'boolean'],
                    'affinityCookieName' => ['type' => 'string'],
                    'probeEnabled' => ['type' => 'boolean'],
                    'path' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayBackendHttpSettings' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewayBackendHttpSettingsPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayBackendHealthServer' => [
                'properties' => [
                    'address' => ['type' => 'string'],
                    'ipConfiguration' => ['$ref' => '#/definitions/NetworkInterfaceIPConfiguration'],
                    'health' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'Up',
                            'Down',
                            'Partial',
                            'Draining'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayBackendHealthHttpSettings' => [
                'properties' => [
                    'backendHttpSettings' => ['$ref' => '#/definitions/ApplicationGatewayBackendHttpSettings'],
                    'servers' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayBackendHealthServer']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayBackendHealthPool' => [
                'properties' => [
                    'backendAddressPool' => ['$ref' => '#/definitions/ApplicationGatewayBackendAddressPool'],
                    'backendHttpSettingsCollection' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayBackendHealthHttpSettings']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayBackendHealth' => [
                'properties' => ['backendAddressPools' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ApplicationGatewayBackendHealthPool']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewaySku' => [
                'properties' => [
                    'name' => [
                        'type' => 'string',
                        'enum' => [
                            'Standard_Small',
                            'Standard_Medium',
                            'Standard_Large',
                            'WAF_Medium',
                            'WAF_Large'
                        ]
                    ],
                    'tier' => [
                        'type' => 'string',
                        'enum' => [
                            'Standard',
                            'WAF'
                        ]
                    ],
                    'capacity' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewaySslPolicy' => [
                'properties' => [
                    'disabledSslProtocols' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'TLSv1_0',
                                'TLSv1_1',
                                'TLSv1_2'
                            ]
                        ]
                    ],
                    'policyType' => [
                        'type' => 'string',
                        'enum' => [
                            'Predefined',
                            'Custom'
                        ]
                    ],
                    'policyName' => [
                        'type' => 'string',
                        'enum' => [
                            'AppGwSslPolicy20150501',
                            'AppGwSslPolicy20170401',
                            'AppGwSslPolicy20170401S'
                        ]
                    ],
                    'cipherSuites' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'TLS_ECDHE_RSA_WITH_AES_256_CBC_SHA384',
                                'TLS_ECDHE_RSA_WITH_AES_128_CBC_SHA256',
                                'TLS_ECDHE_RSA_WITH_AES_256_CBC_SHA',
                                'TLS_ECDHE_RSA_WITH_AES_128_CBC_SHA',
                                'TLS_DHE_RSA_WITH_AES_256_GCM_SHA384',
                                'TLS_DHE_RSA_WITH_AES_128_GCM_SHA256',
                                'TLS_DHE_RSA_WITH_AES_256_CBC_SHA',
                                'TLS_DHE_RSA_WITH_AES_128_CBC_SHA',
                                'TLS_RSA_WITH_AES_256_GCM_SHA384',
                                'TLS_RSA_WITH_AES_128_GCM_SHA256',
                                'TLS_RSA_WITH_AES_256_CBC_SHA256',
                                'TLS_RSA_WITH_AES_128_CBC_SHA256',
                                'TLS_RSA_WITH_AES_256_CBC_SHA',
                                'TLS_RSA_WITH_AES_128_CBC_SHA',
                                'TLS_ECDHE_ECDSA_WITH_AES_256_GCM_SHA384',
                                'TLS_ECDHE_ECDSA_WITH_AES_128_GCM_SHA256',
                                'TLS_ECDHE_ECDSA_WITH_AES_256_CBC_SHA384',
                                'TLS_ECDHE_ECDSA_WITH_AES_128_CBC_SHA256',
                                'TLS_ECDHE_ECDSA_WITH_AES_256_CBC_SHA',
                                'TLS_ECDHE_ECDSA_WITH_AES_128_CBC_SHA',
                                'TLS_DHE_DSS_WITH_AES_256_CBC_SHA256',
                                'TLS_DHE_DSS_WITH_AES_128_CBC_SHA256',
                                'TLS_DHE_DSS_WITH_AES_256_CBC_SHA',
                                'TLS_DHE_DSS_WITH_AES_128_CBC_SHA',
                                'TLS_RSA_WITH_3DES_EDE_CBC_SHA'
                            ]
                        ]
                    ],
                    'minProtocolVersion' => [
                        'type' => 'string',
                        'enum' => [
                            'TLSv1_0',
                            'TLSv1_1',
                            'TLSv1_2'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayIPConfigurationPropertiesFormat' => [
                'properties' => [
                    'subnet' => ['$ref' => '#/definitions/SubResource'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayIPConfiguration' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewayIPConfigurationPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayAuthenticationCertificatePropertiesFormat' => [
                'properties' => [
                    'data' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayAuthenticationCertificate' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewayAuthenticationCertificatePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewaySslCertificatePropertiesFormat' => [
                'properties' => [
                    'data' => ['type' => 'string'],
                    'password' => ['type' => 'string'],
                    'publicCertData' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewaySslCertificate' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewaySslCertificatePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayFrontendIPConfigurationPropertiesFormat' => [
                'properties' => [
                    'privateIPAddress' => ['type' => 'string'],
                    'privateIPAllocationMethod' => [
                        'type' => 'string',
                        'enum' => [
                            'Static',
                            'Dynamic'
                        ]
                    ],
                    'subnet' => ['$ref' => '#/definitions/SubResource'],
                    'publicIPAddress' => ['$ref' => '#/definitions/SubResource'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayFrontendIPConfiguration' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewayFrontendIPConfigurationPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayFrontendPortPropertiesFormat' => [
                'properties' => [
                    'port' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayFrontendPort' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewayFrontendPortPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayHttpListenerPropertiesFormat' => [
                'properties' => [
                    'frontendIPConfiguration' => ['$ref' => '#/definitions/SubResource'],
                    'frontendPort' => ['$ref' => '#/definitions/SubResource'],
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'Http',
                            'Https'
                        ]
                    ],
                    'hostName' => ['type' => 'string'],
                    'sslCertificate' => ['$ref' => '#/definitions/SubResource'],
                    'requireServerNameIndication' => ['type' => 'boolean'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayHttpListener' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewayHttpListenerPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayPathRulePropertiesFormat' => [
                'properties' => [
                    'paths' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'backendAddressPool' => ['$ref' => '#/definitions/SubResource'],
                    'backendHttpSettings' => ['$ref' => '#/definitions/SubResource'],
                    'redirectConfiguration' => ['$ref' => '#/definitions/SubResource'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayPathRule' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewayPathRulePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayProbeHealthResponseMatch' => [
                'properties' => [
                    'body' => ['type' => 'string'],
                    'statusCodes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayProbePropertiesFormat' => [
                'properties' => [
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'Http',
                            'Https'
                        ]
                    ],
                    'host' => ['type' => 'string'],
                    'path' => ['type' => 'string'],
                    'interval' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'timeout' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'unhealthyThreshold' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'pickHostNameFromBackendHttpSettings' => ['type' => 'boolean'],
                    'minServers' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'match' => ['$ref' => '#/definitions/ApplicationGatewayProbeHealthResponseMatch'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayProbe' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewayProbePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayRequestRoutingRulePropertiesFormat' => [
                'properties' => [
                    'ruleType' => [
                        'type' => 'string',
                        'enum' => [
                            'Basic',
                            'PathBasedRouting'
                        ]
                    ],
                    'backendAddressPool' => ['$ref' => '#/definitions/SubResource'],
                    'backendHttpSettings' => ['$ref' => '#/definitions/SubResource'],
                    'httpListener' => ['$ref' => '#/definitions/SubResource'],
                    'urlPathMap' => ['$ref' => '#/definitions/SubResource'],
                    'redirectConfiguration' => ['$ref' => '#/definitions/SubResource'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayRequestRoutingRule' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewayRequestRoutingRulePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayRedirectConfigurationPropertiesFormat' => [
                'properties' => [
                    'redirectType' => [
                        'type' => 'string',
                        'enum' => [
                            'Permanent',
                            'Found',
                            'SeeOther',
                            'Temporary'
                        ]
                    ],
                    'targetListener' => ['$ref' => '#/definitions/SubResource'],
                    'targetUrl' => ['type' => 'string'],
                    'includePath' => ['type' => 'boolean'],
                    'includeQueryString' => ['type' => 'boolean'],
                    'requestRoutingRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ],
                    'urlPathMaps' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ],
                    'pathRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayRedirectConfiguration' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewayRedirectConfigurationPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayUrlPathMapPropertiesFormat' => [
                'properties' => [
                    'defaultBackendAddressPool' => ['$ref' => '#/definitions/SubResource'],
                    'defaultBackendHttpSettings' => ['$ref' => '#/definitions/SubResource'],
                    'defaultRedirectConfiguration' => ['$ref' => '#/definitions/SubResource'],
                    'pathRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayPathRule']
                    ],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayUrlPathMap' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewayUrlPathMapPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayFirewallDisabledRuleGroup' => [
                'properties' => [
                    'ruleGroupName' => ['type' => 'string'],
                    'rules' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'integer',
                            'format' => 'int32'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['ruleGroupName']
            ],
            'ApplicationGatewayWebApplicationFirewallConfiguration' => [
                'properties' => [
                    'enabled' => ['type' => 'boolean'],
                    'firewallMode' => [
                        'type' => 'string',
                        'enum' => [
                            'Detection',
                            'Prevention'
                        ]
                    ],
                    'ruleSetType' => ['type' => 'string'],
                    'ruleSetVersion' => ['type' => 'string'],
                    'disabledRuleGroups' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayFirewallDisabledRuleGroup']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'enabled',
                    'firewallMode',
                    'ruleSetType',
                    'ruleSetVersion'
                ]
            ],
            'ApplicationGatewayPropertiesFormat' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/ApplicationGatewaySku'],
                    'sslPolicy' => ['$ref' => '#/definitions/ApplicationGatewaySslPolicy'],
                    'operationalState' => [
                        'type' => 'string',
                        'enum' => [
                            'Stopped',
                            'Starting',
                            'Running',
                            'Stopping'
                        ]
                    ],
                    'gatewayIPConfigurations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayIPConfiguration']
                    ],
                    'authenticationCertificates' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayAuthenticationCertificate']
                    ],
                    'sslCertificates' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewaySslCertificate']
                    ],
                    'frontendIPConfigurations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayFrontendIPConfiguration']
                    ],
                    'frontendPorts' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayFrontendPort']
                    ],
                    'probes' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayProbe']
                    ],
                    'backendAddressPools' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayBackendAddressPool']
                    ],
                    'backendHttpSettingsCollection' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayBackendHttpSettings']
                    ],
                    'httpListeners' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayHttpListener']
                    ],
                    'urlPathMaps' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayUrlPathMap']
                    ],
                    'requestRoutingRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayRequestRoutingRule']
                    ],
                    'redirectConfigurations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayRedirectConfiguration']
                    ],
                    'webApplicationFirewallConfiguration' => ['$ref' => '#/definitions/ApplicationGatewayWebApplicationFirewallConfiguration'],
                    'resourceGuid' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGateway' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewayPropertiesFormat'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGateway']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayFirewallRule' => [
                'properties' => [
                    'ruleId' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'description' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['ruleId']
            ],
            'ApplicationGatewayFirewallRuleGroup' => [
                'properties' => [
                    'ruleGroupName' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'rules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayFirewallRule']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'ruleGroupName',
                    'rules'
                ]
            ],
            'ApplicationGatewayFirewallRuleSetPropertiesFormat' => [
                'properties' => [
                    'provisioningState' => ['type' => 'string'],
                    'ruleSetType' => ['type' => 'string'],
                    'ruleSetVersion' => ['type' => 'string'],
                    'ruleGroups' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewayFirewallRuleGroup']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'ruleSetType',
                    'ruleSetVersion',
                    'ruleGroups'
                ]
            ],
            'ApplicationGatewayFirewallRuleSet' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ApplicationGatewayFirewallRuleSetPropertiesFormat']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayAvailableWafRuleSetsResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ApplicationGatewayFirewallRuleSet']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayAvailableSslOptionsPropertiesFormat' => [
                'properties' => [
                    'predefinedPolicies' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ],
                    'defaultPolicy' => [
                        'type' => 'string',
                        'enum' => [
                            'AppGwSslPolicy20150501',
                            'AppGwSslPolicy20170401',
                            'AppGwSslPolicy20170401S'
                        ]
                    ],
                    'availableCipherSuites' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'TLS_ECDHE_RSA_WITH_AES_256_CBC_SHA384',
                                'TLS_ECDHE_RSA_WITH_AES_128_CBC_SHA256',
                                'TLS_ECDHE_RSA_WITH_AES_256_CBC_SHA',
                                'TLS_ECDHE_RSA_WITH_AES_128_CBC_SHA',
                                'TLS_DHE_RSA_WITH_AES_256_GCM_SHA384',
                                'TLS_DHE_RSA_WITH_AES_128_GCM_SHA256',
                                'TLS_DHE_RSA_WITH_AES_256_CBC_SHA',
                                'TLS_DHE_RSA_WITH_AES_128_CBC_SHA',
                                'TLS_RSA_WITH_AES_256_GCM_SHA384',
                                'TLS_RSA_WITH_AES_128_GCM_SHA256',
                                'TLS_RSA_WITH_AES_256_CBC_SHA256',
                                'TLS_RSA_WITH_AES_128_CBC_SHA256',
                                'TLS_RSA_WITH_AES_256_CBC_SHA',
                                'TLS_RSA_WITH_AES_128_CBC_SHA',
                                'TLS_ECDHE_ECDSA_WITH_AES_256_GCM_SHA384',
                                'TLS_ECDHE_ECDSA_WITH_AES_128_GCM_SHA256',
                                'TLS_ECDHE_ECDSA_WITH_AES_256_CBC_SHA384',
                                'TLS_ECDHE_ECDSA_WITH_AES_128_CBC_SHA256',
                                'TLS_ECDHE_ECDSA_WITH_AES_256_CBC_SHA',
                                'TLS_ECDHE_ECDSA_WITH_AES_128_CBC_SHA',
                                'TLS_DHE_DSS_WITH_AES_256_CBC_SHA256',
                                'TLS_DHE_DSS_WITH_AES_128_CBC_SHA256',
                                'TLS_DHE_DSS_WITH_AES_256_CBC_SHA',
                                'TLS_DHE_DSS_WITH_AES_128_CBC_SHA',
                                'TLS_RSA_WITH_3DES_EDE_CBC_SHA'
                            ]
                        ]
                    ],
                    'availableProtocols' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'TLSv1_0',
                                'TLSv1_1',
                                'TLSv1_2'
                            ]
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayAvailableSslOptions' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ApplicationGatewayAvailableSslOptionsPropertiesFormat']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewaySslPredefinedPolicyPropertiesFormat' => [
                'properties' => [
                    'cipherSuites' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'TLS_ECDHE_RSA_WITH_AES_256_CBC_SHA384',
                                'TLS_ECDHE_RSA_WITH_AES_128_CBC_SHA256',
                                'TLS_ECDHE_RSA_WITH_AES_256_CBC_SHA',
                                'TLS_ECDHE_RSA_WITH_AES_128_CBC_SHA',
                                'TLS_DHE_RSA_WITH_AES_256_GCM_SHA384',
                                'TLS_DHE_RSA_WITH_AES_128_GCM_SHA256',
                                'TLS_DHE_RSA_WITH_AES_256_CBC_SHA',
                                'TLS_DHE_RSA_WITH_AES_128_CBC_SHA',
                                'TLS_RSA_WITH_AES_256_GCM_SHA384',
                                'TLS_RSA_WITH_AES_128_GCM_SHA256',
                                'TLS_RSA_WITH_AES_256_CBC_SHA256',
                                'TLS_RSA_WITH_AES_128_CBC_SHA256',
                                'TLS_RSA_WITH_AES_256_CBC_SHA',
                                'TLS_RSA_WITH_AES_128_CBC_SHA',
                                'TLS_ECDHE_ECDSA_WITH_AES_256_GCM_SHA384',
                                'TLS_ECDHE_ECDSA_WITH_AES_128_GCM_SHA256',
                                'TLS_ECDHE_ECDSA_WITH_AES_256_CBC_SHA384',
                                'TLS_ECDHE_ECDSA_WITH_AES_128_CBC_SHA256',
                                'TLS_ECDHE_ECDSA_WITH_AES_256_CBC_SHA',
                                'TLS_ECDHE_ECDSA_WITH_AES_128_CBC_SHA',
                                'TLS_DHE_DSS_WITH_AES_256_CBC_SHA256',
                                'TLS_DHE_DSS_WITH_AES_128_CBC_SHA256',
                                'TLS_DHE_DSS_WITH_AES_256_CBC_SHA',
                                'TLS_DHE_DSS_WITH_AES_128_CBC_SHA',
                                'TLS_RSA_WITH_3DES_EDE_CBC_SHA'
                            ]
                        ]
                    ],
                    'minProtocolVersion' => [
                        'type' => 'string',
                        'enum' => [
                            'TLSv1_0',
                            'TLSv1_1',
                            'TLSv1_2'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewaySslPredefinedPolicy' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/ApplicationGatewaySslPredefinedPolicyPropertiesFormat']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGatewayAvailableSslPredefinedPolicies' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplicationGatewaySslPredefinedPolicy']
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
                    'type' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DnsNameAvailabilityResult' => [
                'properties' => ['available' => ['type' => 'boolean']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AuthorizationPropertiesFormat' => [
                'properties' => [
                    'authorizationKey' => ['type' => 'string'],
                    'authorizationUseStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Available',
                            'InUse'
                        ]
                    ],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitAuthorization' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/AuthorizationPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AuthorizationListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ExpressRouteCircuitAuthorization']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitPeeringConfig' => [
                'properties' => [
                    'advertisedPublicPrefixes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'advertisedCommunities' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'advertisedPublicPrefixesState' => [
                        'type' => 'string',
                        'enum' => [
                            'NotConfigured',
                            'Configuring',
                            'Configured',
                            'ValidationNeeded'
                        ]
                    ],
                    'legacyMode' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'customerASN' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'routingRegistryName' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RouteFilterRulePropertiesFormat' => [
                'properties' => [
                    'access' => [
                        'type' => 'string',
                        'enum' => [
                            'Allow',
                            'Deny'
                        ]
                    ],
                    'routeFilterRuleType' => ['type' => 'string'],
                    'communities' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'access',
                    'routeFilterRuleType',
                    'communities'
                ]
            ],
            'RouteFilterRule' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/RouteFilterRulePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitStats' => [
                'properties' => [
                    'primarybytesIn' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'primarybytesOut' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'secondarybytesIn' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'secondarybytesOut' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitPeeringPropertiesFormat' => [
                'properties' => [
                    'peeringType' => [
                        'type' => 'string',
                        'enum' => [
                            'AzurePublicPeering',
                            'AzurePrivatePeering',
                            'MicrosoftPeering'
                        ]
                    ],
                    'state' => [
                        'type' => 'string',
                        'enum' => [
                            'Disabled',
                            'Enabled'
                        ]
                    ],
                    'azureASN' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'peerASN' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'primaryPeerAddressPrefix' => ['type' => 'string'],
                    'secondaryPeerAddressPrefix' => ['type' => 'string'],
                    'primaryAzurePort' => ['type' => 'string'],
                    'secondaryAzurePort' => ['type' => 'string'],
                    'sharedKey' => ['type' => 'string'],
                    'vlanId' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'microsoftPeeringConfig' => ['$ref' => '#/definitions/ExpressRouteCircuitPeeringConfig'],
                    'stats' => ['$ref' => '#/definitions/ExpressRouteCircuitStats'],
                    'provisioningState' => ['type' => 'string'],
                    'gatewayManagerEtag' => ['type' => 'string'],
                    'lastModifiedBy' => ['type' => 'string'],
                    'routeFilter' => ['$ref' => '#/definitions/RouteFilter'],
                    'ipv6PeeringConfig' => ['$ref' => '#/definitions/Ipv6ExpressRouteCircuitPeeringConfig']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitPeering' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ExpressRouteCircuitPeeringPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RouteFilterPropertiesFormat' => [
                'properties' => [
                    'rules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RouteFilterRule']
                    ],
                    'peerings' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ExpressRouteCircuitPeering']
                    ],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RouteFilter' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/RouteFilterPropertiesFormat'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Ipv6ExpressRouteCircuitPeeringConfig' => [
                'properties' => [
                    'primaryPeerAddressPrefix' => ['type' => 'string'],
                    'secondaryPeerAddressPrefix' => ['type' => 'string'],
                    'microsoftPeeringConfig' => ['$ref' => '#/definitions/ExpressRouteCircuitPeeringConfig'],
                    'routeFilter' => ['$ref' => '#/definitions/RouteFilter'],
                    'state' => [
                        'type' => 'string',
                        'enum' => [
                            'Disabled',
                            'Enabled'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitPeeringListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ExpressRouteCircuitPeering']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitSku' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'tier' => [
                        'type' => 'string',
                        'enum' => [
                            'Standard',
                            'Premium'
                        ]
                    ],
                    'family' => [
                        'type' => 'string',
                        'enum' => [
                            'UnlimitedData',
                            'MeteredData'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitServiceProviderProperties' => [
                'properties' => [
                    'serviceProviderName' => ['type' => 'string'],
                    'peeringLocation' => ['type' => 'string'],
                    'bandwidthInMbps' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitPropertiesFormat' => [
                'properties' => [
                    'allowClassicOperations' => ['type' => 'boolean'],
                    'circuitProvisioningState' => ['type' => 'string'],
                    'serviceProviderProvisioningState' => [
                        'type' => 'string',
                        'enum' => [
                            'NotProvisioned',
                            'Provisioning',
                            'Provisioned',
                            'Deprovisioning'
                        ]
                    ],
                    'authorizations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ExpressRouteCircuitAuthorization']
                    ],
                    'peerings' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ExpressRouteCircuitPeering']
                    ],
                    'serviceKey' => ['type' => 'string'],
                    'serviceProviderNotes' => ['type' => 'string'],
                    'serviceProviderProperties' => ['$ref' => '#/definitions/ExpressRouteCircuitServiceProviderProperties'],
                    'provisioningState' => ['type' => 'string'],
                    'gatewayManagerEtag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuit' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/ExpressRouteCircuitSku'],
                    'properties' => ['$ref' => '#/definitions/ExpressRouteCircuitPropertiesFormat'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitArpTable' => [
                'properties' => [
                    'age' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'interface' => ['type' => 'string'],
                    'ipAddress' => ['type' => 'string'],
                    'macAddress' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitsArpTableListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ExpressRouteCircuitArpTable']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitRoutesTable' => [
                'properties' => [
                    'network' => ['type' => 'string'],
                    'nextHop' => ['type' => 'string'],
                    'locPrf' => ['type' => 'string'],
                    'weight' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'path' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitsRoutesTableListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ExpressRouteCircuitRoutesTable']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitRoutesTableSummary' => [
                'properties' => [
                    'neighbor' => ['type' => 'string'],
                    'v' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'as' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'upDown' => ['type' => 'string'],
                    'statePfxRcd' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitsRoutesTableSummaryListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ExpressRouteCircuitRoutesTableSummary']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteCircuitListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ExpressRouteCircuit']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteServiceProviderBandwidthsOffered' => [
                'properties' => [
                    'offerName' => ['type' => 'string'],
                    'valueInMbps' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteServiceProviderPropertiesFormat' => [
                'properties' => [
                    'peeringLocations' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'bandwidthsOffered' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ExpressRouteServiceProviderBandwidthsOffered']
                    ],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteServiceProvider' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ExpressRouteServiceProviderPropertiesFormat']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExpressRouteServiceProviderListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ExpressRouteServiceProvider']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FrontendIPConfigurationPropertiesFormat' => [
                'properties' => [
                    'inboundNatRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ],
                    'inboundNatPools' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ],
                    'outboundNatRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ],
                    'loadBalancingRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ],
                    'privateIPAddress' => ['type' => 'string'],
                    'privateIPAllocationMethod' => [
                        'type' => 'string',
                        'enum' => [
                            'Static',
                            'Dynamic'
                        ]
                    ],
                    'subnet' => ['$ref' => '#/definitions/Subnet'],
                    'publicIPAddress' => ['$ref' => '#/definitions/PublicIPAddress'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FrontendIPConfiguration' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/FrontendIPConfigurationPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LoadBalancingRulePropertiesFormat' => [
                'properties' => [
                    'frontendIPConfiguration' => ['$ref' => '#/definitions/SubResource'],
                    'backendAddressPool' => ['$ref' => '#/definitions/SubResource'],
                    'probe' => ['$ref' => '#/definitions/SubResource'],
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'Udp',
                            'Tcp'
                        ]
                    ],
                    'loadDistribution' => [
                        'type' => 'string',
                        'enum' => [
                            'Default',
                            'SourceIP',
                            'SourceIPProtocol'
                        ]
                    ],
                    'frontendPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'backendPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'idleTimeoutInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'enableFloatingIP' => ['type' => 'boolean'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'protocol',
                    'frontendPort'
                ]
            ],
            'LoadBalancingRule' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/LoadBalancingRulePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProbePropertiesFormat' => [
                'properties' => [
                    'loadBalancingRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ],
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'Http',
                            'Tcp'
                        ]
                    ],
                    'port' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'intervalInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'numberOfProbes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'requestPath' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'protocol',
                    'port'
                ]
            ],
            'Probe' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ProbePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'InboundNatPoolPropertiesFormat' => [
                'properties' => [
                    'frontendIPConfiguration' => ['$ref' => '#/definitions/SubResource'],
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'Udp',
                            'Tcp'
                        ]
                    ],
                    'frontendPortRangeStart' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'frontendPortRangeEnd' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'backendPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'protocol',
                    'frontendPortRangeStart',
                    'frontendPortRangeEnd',
                    'backendPort'
                ]
            ],
            'InboundNatPool' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/InboundNatPoolPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OutboundNatRulePropertiesFormat' => [
                'properties' => [
                    'allocatedOutboundPorts' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'frontendIPConfigurations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ],
                    'backendAddressPool' => ['$ref' => '#/definitions/SubResource'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['backendAddressPool']
            ],
            'OutboundNatRule' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/OutboundNatRulePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LoadBalancerPropertiesFormat' => [
                'properties' => [
                    'frontendIPConfigurations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/FrontendIPConfiguration']
                    ],
                    'backendAddressPools' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/BackendAddressPool']
                    ],
                    'loadBalancingRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/LoadBalancingRule']
                    ],
                    'probes' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Probe']
                    ],
                    'inboundNatRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InboundNatRule']
                    ],
                    'inboundNatPools' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InboundNatPool']
                    ],
                    'outboundNatRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/OutboundNatRule']
                    ],
                    'resourceGuid' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LoadBalancer' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/LoadBalancerPropertiesFormat'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LoadBalancerListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/LoadBalancer']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'InboundNatRuleListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InboundNatRule']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LoadBalancerBackendAddressPoolListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/BackendAddressPool']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LoadBalancerFrontendIPConfigurationListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/FrontendIPConfiguration']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LoadBalancerLoadBalancingRuleListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/LoadBalancingRule']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LoadBalancerProbeListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Probe']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkInterfaceListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/NetworkInterface']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ErrorDetails' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'target' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Error' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'target' => ['type' => 'string'],
                    'details' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ErrorDetails']
                    ],
                    'innerError' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureAsyncOperationResult' => [
                'properties' => [
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'InProgress',
                            'Succeeded',
                            'Failed'
                        ]
                    ],
                    'error' => ['$ref' => '#/definitions/Error']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkInterfaceIPConfigurationListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/NetworkInterfaceIPConfiguration']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkInterfaceLoadBalancerListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/LoadBalancer']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EffectiveNetworkSecurityGroupAssociation' => [
                'properties' => [
                    'subnet' => ['$ref' => '#/definitions/SubResource'],
                    'networkInterface' => ['$ref' => '#/definitions/SubResource']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EffectiveNetworkSecurityRule' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'Tcp',
                            'Udp',
                            'All'
                        ]
                    ],
                    'sourcePortRange' => ['type' => 'string'],
                    'destinationPortRange' => ['type' => 'string'],
                    'sourcePortRanges' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'destinationPortRanges' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'sourceAddressPrefix' => ['type' => 'string'],
                    'destinationAddressPrefix' => ['type' => 'string'],
                    'sourceAddressPrefixes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'destinationAddressPrefixes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'expandedSourceAddressPrefix' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'expandedDestinationAddressPrefix' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'access' => [
                        'type' => 'string',
                        'enum' => [
                            'Allow',
                            'Deny'
                        ]
                    ],
                    'priority' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'direction' => [
                        'type' => 'string',
                        'enum' => [
                            'Inbound',
                            'Outbound'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EffectiveNetworkSecurityGroup' => [
                'properties' => [
                    'networkSecurityGroup' => ['$ref' => '#/definitions/SubResource'],
                    'association' => ['$ref' => '#/definitions/EffectiveNetworkSecurityGroupAssociation'],
                    'effectiveSecurityRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/EffectiveNetworkSecurityRule']
                    ],
                    'tagMap' => [
                        'type' => 'object',
                        'additionalProperties' => [
                            'type' => 'array',
                            'items' => ['type' => 'string']
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EffectiveNetworkSecurityGroupListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/EffectiveNetworkSecurityGroup']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EffectiveRoute' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'source' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'User',
                            'VirtualNetworkGateway',
                            'Default'
                        ]
                    ],
                    'state' => [
                        'type' => 'string',
                        'enum' => [
                            'Active',
                            'Invalid'
                        ]
                    ],
                    'addressPrefix' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'nextHopIpAddress' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'nextHopType' => [
                        'type' => 'string',
                        'enum' => [
                            'VirtualNetworkGateway',
                            'VnetLocal',
                            'Internet',
                            'VirtualAppliance',
                            'None'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EffectiveRouteListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/EffectiveRoute']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SecurityRuleListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SecurityRule']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkSecurityGroupListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/NetworkSecurityGroup']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkWatcherPropertiesFormat' => [
                'properties' => ['provisioningState' => [
                    'type' => 'string',
                    'enum' => [
                        'Succeeded',
                        'Updating',
                        'Deleting',
                        'Failed'
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkWatcher' => [
                'properties' => [
                    'etag' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/NetworkWatcherPropertiesFormat']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkWatcherListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/NetworkWatcher']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TopologyParameters' => [
                'properties' => ['targetResourceGroupName' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['targetResourceGroupName']
            ],
            'TopologyAssociation' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'resourceId' => ['type' => 'string'],
                    'associationType' => [
                        'type' => 'string',
                        'enum' => [
                            'Associated',
                            'Contains'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TopologyResource' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'id' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'associations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TopologyAssociation']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Topology' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'createdDateTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'lastModified' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'resources' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TopologyResource']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VerificationIPFlowParameters' => [
                'properties' => [
                    'targetResourceId' => ['type' => 'string'],
                    'direction' => [
                        'type' => 'string',
                        'enum' => [
                            'Inbound',
                            'Outbound'
                        ]
                    ],
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'TCP',
                            'UDP'
                        ]
                    ],
                    'localPort' => ['type' => 'string'],
                    'remotePort' => ['type' => 'string'],
                    'localIPAddress' => ['type' => 'string'],
                    'remoteIPAddress' => ['type' => 'string'],
                    'targetNicResourceId' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'targetResourceId',
                    'direction',
                    'protocol',
                    'localPort',
                    'remotePort',
                    'localIPAddress',
                    'remoteIPAddress'
                ]
            ],
            'VerificationIPFlowResult' => [
                'properties' => [
                    'access' => [
                        'type' => 'string',
                        'enum' => [
                            'Allow',
                            'Deny'
                        ]
                    ],
                    'ruleName' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NextHopParameters' => [
                'properties' => [
                    'targetResourceId' => ['type' => 'string'],
                    'sourceIPAddress' => ['type' => 'string'],
                    'destinationIPAddress' => ['type' => 'string'],
                    'targetNicResourceId' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'targetResourceId',
                    'sourceIPAddress',
                    'destinationIPAddress'
                ]
            ],
            'NextHopResult' => [
                'properties' => [
                    'nextHopType' => [
                        'type' => 'string',
                        'enum' => [
                            'Internet',
                            'VirtualAppliance',
                            'VirtualNetworkGateway',
                            'VnetLocal',
                            'HyperNetGateway',
                            'None'
                        ]
                    ],
                    'nextHopIpAddress' => ['type' => 'string'],
                    'routeTableId' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SecurityGroupViewParameters' => [
                'properties' => ['targetResourceId' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['targetResourceId']
            ],
            'NetworkInterfaceAssociation' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'securityRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SecurityRule']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubnetAssociation' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'securityRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SecurityRule']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SecurityRuleAssociations' => [
                'properties' => [
                    'networkInterfaceAssociation' => ['$ref' => '#/definitions/NetworkInterfaceAssociation'],
                    'subnetAssociation' => ['$ref' => '#/definitions/SubnetAssociation'],
                    'defaultSecurityRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SecurityRule']
                    ],
                    'effectiveSecurityRules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/EffectiveNetworkSecurityRule']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SecurityGroupNetworkInterface' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'securityRuleAssociations' => ['$ref' => '#/definitions/SecurityRuleAssociations']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SecurityGroupViewResult' => [
                'properties' => ['networkInterfaces' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SecurityGroupNetworkInterface']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PacketCaptureStorageLocation' => [
                'properties' => [
                    'storageId' => ['type' => 'string'],
                    'storagePath' => ['type' => 'string'],
                    'filePath' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PacketCaptureFilter' => [
                'properties' => [
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'TCP',
                            'UDP',
                            'Any'
                        ]
                    ],
                    'localIPAddress' => ['type' => 'string'],
                    'remoteIPAddress' => ['type' => 'string'],
                    'localPort' => ['type' => 'string'],
                    'remotePort' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PacketCaptureParameters' => [
                'properties' => [
                    'target' => ['type' => 'string'],
                    'bytesToCapturePerPacket' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'totalBytesPerSession' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'timeLimitInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'storageLocation' => ['$ref' => '#/definitions/PacketCaptureStorageLocation'],
                    'filters' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PacketCaptureFilter']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'target',
                    'storageLocation'
                ]
            ],
            'PacketCapture' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/PacketCaptureParameters']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'PacketCaptureResultProperties' => [
                'properties' => ['provisioningState' => [
                    'type' => 'string',
                    'enum' => [
                        'Succeeded',
                        'Updating',
                        'Deleting',
                        'Failed'
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PacketCaptureResult' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'id' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/PacketCaptureResultProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PacketCaptureListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/PacketCaptureResult']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PacketCaptureQueryStatusResult' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'id' => ['type' => 'string'],
                    'captureStartTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'packetCaptureStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'NotStarted',
                            'Running',
                            'Stopped',
                            'Error',
                            'Unknown'
                        ]
                    ],
                    'stopReason' => ['type' => 'string'],
                    'packetCaptureError' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'InternalError',
                                'AgentStopped',
                                'CaptureFailed',
                                'LocalFileFailed',
                                'StorageFailed'
                            ]
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TroubleshootingProperties' => [
                'properties' => [
                    'storageId' => ['type' => 'string'],
                    'storagePath' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'storageId',
                    'storagePath'
                ]
            ],
            'TroubleshootingParameters' => [
                'properties' => [
                    'targetResourceId' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/TroubleshootingProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'targetResourceId',
                    'properties'
                ]
            ],
            'QueryTroubleshootingParameters' => [
                'properties' => ['targetResourceId' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['targetResourceId']
            ],
            'TroubleshootingRecommendedActions' => [
                'properties' => [
                    'actionId' => ['type' => 'string'],
                    'actionText' => ['type' => 'string'],
                    'actionUri' => ['type' => 'string'],
                    'actionUriText' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TroubleshootingDetails' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'reasonType' => ['type' => 'string'],
                    'summary' => ['type' => 'string'],
                    'detail' => ['type' => 'string'],
                    'recommendedActions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TroubleshootingRecommendedActions']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TroubleshootingResult' => [
                'properties' => [
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'code' => ['type' => 'string'],
                    'results' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TroubleshootingDetails']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RetentionPolicyParameters' => [
                'properties' => [
                    'days' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'enabled' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FlowLogProperties' => [
                'properties' => [
                    'storageId' => ['type' => 'string'],
                    'enabled' => ['type' => 'boolean'],
                    'retentionPolicy' => ['$ref' => '#/definitions/RetentionPolicyParameters']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'storageId',
                    'enabled'
                ]
            ],
            'FlowLogStatusParameters' => [
                'properties' => ['targetResourceId' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['targetResourceId']
            ],
            'FlowLogInformation' => [
                'properties' => [
                    'targetResourceId' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/FlowLogProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'targetResourceId',
                    'properties'
                ]
            ],
            'ConnectivitySource' => [
                'properties' => [
                    'resourceId' => ['type' => 'string'],
                    'port' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['resourceId']
            ],
            'ConnectivityDestination' => [
                'properties' => [
                    'resourceId' => ['type' => 'string'],
                    'address' => ['type' => 'string'],
                    'port' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ConnectivityParameters' => [
                'properties' => [
                    'source' => ['$ref' => '#/definitions/ConnectivitySource'],
                    'destination' => ['$ref' => '#/definitions/ConnectivityDestination']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'source',
                    'destination'
                ]
            ],
            'ConnectivityIssue' => [
                'properties' => [
                    'origin' => [
                        'type' => 'string',
                        'enum' => [
                            'Local',
                            'Inbound',
                            'Outbound'
                        ]
                    ],
                    'severity' => [
                        'type' => 'string',
                        'enum' => [
                            'Error',
                            'Warning'
                        ]
                    ],
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'AgentStopped',
                            'GuestFirewall',
                            'DnsResolution',
                            'SocketBind',
                            'NetworkSecurityRule',
                            'UserDefinedRoute',
                            'PortThrottled',
                            'Platform'
                        ]
                    ],
                    'context' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'object',
                            'additionalProperties' => ['type' => 'string']
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ConnectivityHop' => [
                'properties' => [
                    'type' => ['type' => 'string'],
                    'id' => ['type' => 'string'],
                    'address' => ['type' => 'string'],
                    'resourceId' => ['type' => 'string'],
                    'nextHopIds' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'issues' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ConnectivityIssue']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ConnectivityInformation' => [
                'properties' => [
                    'hops' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ConnectivityHop']
                    ],
                    'connectionStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'Connected',
                            'Disconnected',
                            'Degraded'
                        ]
                    ],
                    'avgLatencyInMs' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'minLatencyInMs' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'maxLatencyInMs' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'probesSent' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'probesFailed' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PublicIPAddressListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PublicIPAddress']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PatchRouteFilterRule' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/RouteFilterRulePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PatchRouteFilter' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/RouteFilterPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RouteFilterListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RouteFilter']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RouteFilterRuleListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RouteFilterRule']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RouteTableListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RouteTable']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RouteListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Route']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BGPCommunity' => [
                'properties' => [
                    'serviceSupportedRegion' => ['type' => 'string'],
                    'communityName' => ['type' => 'string'],
                    'communityValue' => ['type' => 'string'],
                    'communityPrefixes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'isAuthorizedToUse' => ['type' => 'boolean'],
                    'serviceGroup' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BgpServiceCommunityPropertiesFormat' => [
                'properties' => [
                    'serviceName' => ['type' => 'string'],
                    'bgpCommunities' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/BGPCommunity']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BgpServiceCommunity' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BgpServiceCommunityPropertiesFormat']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BgpServiceCommunityListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/BgpServiceCommunity']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UsageName' => [
                'properties' => [
                    'value' => ['type' => 'string'],
                    'localizedValue' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Usage' => [
                'properties' => [
                    'unit' => ['type' => 'string'],
                    'currentValue' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'limit' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'name' => ['$ref' => '#/definitions/UsageName']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'unit',
                    'currentValue',
                    'limit',
                    'name'
                ]
            ],
            'UsagesListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Usage']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkPeeringPropertiesFormat' => [
                'properties' => [
                    'allowVirtualNetworkAccess' => ['type' => 'boolean'],
                    'allowForwardedTraffic' => ['type' => 'boolean'],
                    'allowGatewayTransit' => ['type' => 'boolean'],
                    'useRemoteGateways' => ['type' => 'boolean'],
                    'remoteVirtualNetwork' => ['$ref' => '#/definitions/SubResource'],
                    'peeringState' => [
                        'type' => 'string',
                        'enum' => [
                            'Initiated',
                            'Connected',
                            'Disconnected'
                        ]
                    ],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkPeering' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/VirtualNetworkPeeringPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubnetListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Subnet']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkPeeringListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualNetworkPeering']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AddressSpace' => [
                'properties' => ['addressPrefixes' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DhcpOptions' => [
                'properties' => ['dnsServers' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkPropertiesFormat' => [
                'properties' => [
                    'addressSpace' => ['$ref' => '#/definitions/AddressSpace'],
                    'dhcpOptions' => ['$ref' => '#/definitions/DhcpOptions'],
                    'subnets' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Subnet']
                    ],
                    'virtualNetworkPeerings' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualNetworkPeering']
                    ],
                    'resourceGuid' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetwork' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/VirtualNetworkPropertiesFormat'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualNetwork']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IPAddressAvailabilityResult' => [
                'properties' => [
                    'available' => ['type' => 'boolean'],
                    'availableIPAddresses' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkUsageName' => [
                'properties' => [
                    'localizedValue' => ['type' => 'string'],
                    'value' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkUsage' => [
                'properties' => [
                    'currentValue' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'id' => ['type' => 'string'],
                    'limit' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'name' => ['$ref' => '#/definitions/VirtualNetworkUsageName'],
                    'unit' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkListUsageResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualNetworkUsage']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkGatewayIPConfigurationPropertiesFormat' => [
                'properties' => [
                    'privateIPAllocationMethod' => [
                        'type' => 'string',
                        'enum' => [
                            'Static',
                            'Dynamic'
                        ]
                    ],
                    'subnet' => ['$ref' => '#/definitions/SubResource'],
                    'publicIPAddress' => ['$ref' => '#/definitions/SubResource'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkGatewayIPConfiguration' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/VirtualNetworkGatewayIPConfigurationPropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkGatewaySku' => [
                'properties' => [
                    'name' => [
                        'type' => 'string',
                        'enum' => [
                            'Basic',
                            'HighPerformance',
                            'Standard',
                            'UltraPerformance',
                            'VpnGw1',
                            'VpnGw2',
                            'VpnGw3'
                        ]
                    ],
                    'tier' => [
                        'type' => 'string',
                        'enum' => [
                            'Basic',
                            'HighPerformance',
                            'Standard',
                            'UltraPerformance',
                            'VpnGw1',
                            'VpnGw2',
                            'VpnGw3'
                        ]
                    ],
                    'capacity' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VpnClientRootCertificatePropertiesFormat' => [
                'properties' => [
                    'publicCertData' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['publicCertData']
            ],
            'VpnClientRootCertificate' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/VpnClientRootCertificatePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'VpnClientRevokedCertificatePropertiesFormat' => [
                'properties' => [
                    'thumbprint' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VpnClientRevokedCertificate' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/VpnClientRevokedCertificatePropertiesFormat'],
                    'name' => ['type' => 'string'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VpnClientConfiguration' => [
                'properties' => [
                    'vpnClientAddressPool' => ['$ref' => '#/definitions/AddressSpace'],
                    'vpnClientRootCertificates' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VpnClientRootCertificate']
                    ],
                    'vpnClientRevokedCertificates' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VpnClientRevokedCertificate']
                    ],
                    'vpnClientProtocols' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'IkeV2',
                                'SSTP'
                            ]
                        ]
                    ],
                    'radiusServerAddress' => ['type' => 'string'],
                    'radiusServerSecret' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BgpSettings' => [
                'properties' => [
                    'asn' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'bgpPeeringAddress' => ['type' => 'string'],
                    'peerWeight' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkGatewayPropertiesFormat' => [
                'properties' => [
                    'ipConfigurations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualNetworkGatewayIPConfiguration']
                    ],
                    'gatewayType' => [
                        'type' => 'string',
                        'enum' => [
                            'Vpn',
                            'ExpressRoute'
                        ]
                    ],
                    'vpnType' => [
                        'type' => 'string',
                        'enum' => [
                            'PolicyBased',
                            'RouteBased'
                        ]
                    ],
                    'enableBgp' => ['type' => 'boolean'],
                    'activeActive' => ['type' => 'boolean'],
                    'gatewayDefaultSite' => ['$ref' => '#/definitions/SubResource'],
                    'sku' => ['$ref' => '#/definitions/VirtualNetworkGatewaySku'],
                    'vpnClientConfiguration' => ['$ref' => '#/definitions/VpnClientConfiguration'],
                    'bgpSettings' => ['$ref' => '#/definitions/BgpSettings'],
                    'resourceGuid' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BgpPeerStatus' => [
                'properties' => [
                    'localAddress' => ['type' => 'string'],
                    'neighbor' => ['type' => 'string'],
                    'asn' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'state' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'Stopped',
                            'Idle',
                            'Connecting',
                            'Connected'
                        ]
                    ],
                    'connectedDuration' => ['type' => 'string'],
                    'routesReceived' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'messagesSent' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'messagesReceived' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GatewayRoute' => [
                'properties' => [
                    'localAddress' => ['type' => 'string'],
                    'network' => ['type' => 'string'],
                    'nextHop' => ['type' => 'string'],
                    'sourcePeer' => ['type' => 'string'],
                    'origin' => ['type' => 'string'],
                    'asPath' => ['type' => 'string'],
                    'weight' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkGateway' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/VirtualNetworkGatewayPropertiesFormat'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'VpnClientParameters' => [
                'properties' => [
                    'processorArchitecture' => [
                        'type' => 'string',
                        'enum' => [
                            'Amd64',
                            'X86'
                        ]
                    ],
                    'authenticationMethod' => [
                        'type' => 'string',
                        'enum' => [
                            'EAPTLS',
                            'EAPMSCHAPv2'
                        ]
                    ],
                    'radiusServerAuthCertificate' => ['type' => 'string'],
                    'clientRootCertificates' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkGatewayListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualNetworkGateway']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BgpPeerStatusListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/BgpPeerStatus']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GatewayRouteListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/GatewayRoute']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TunnelConnectionHealth' => [
                'properties' => [
                    'tunnel' => ['type' => 'string'],
                    'connectionStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'Connecting',
                            'Connected',
                            'NotConnected'
                        ]
                    ],
                    'ingressBytesTransferred' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'egressBytesTransferred' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'lastConnectionEstablishedUtcTime' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LocalNetworkGatewayPropertiesFormat' => [
                'properties' => [
                    'localNetworkAddressSpace' => ['$ref' => '#/definitions/AddressSpace'],
                    'gatewayIpAddress' => ['type' => 'string'],
                    'bgpSettings' => ['$ref' => '#/definitions/BgpSettings'],
                    'resourceGuid' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LocalNetworkGateway' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/LocalNetworkGatewayPropertiesFormat'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'IpsecPolicy' => [
                'properties' => [
                    'saLifeTimeSeconds' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'saDataSizeKilobytes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'ipsecEncryption' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'DES',
                            'DES3',
                            'AES128',
                            'AES192',
                            'AES256',
                            'GCMAES128',
                            'GCMAES192',
                            'GCMAES256'
                        ]
                    ],
                    'ipsecIntegrity' => [
                        'type' => 'string',
                        'enum' => [
                            'MD5',
                            'SHA1',
                            'SHA256',
                            'GCMAES128',
                            'GCMAES192',
                            'GCMAES256'
                        ]
                    ],
                    'ikeEncryption' => [
                        'type' => 'string',
                        'enum' => [
                            'DES',
                            'DES3',
                            'AES128',
                            'AES192',
                            'AES256'
                        ]
                    ],
                    'ikeIntegrity' => [
                        'type' => 'string',
                        'enum' => [
                            'MD5',
                            'SHA1',
                            'SHA256',
                            'SHA384'
                        ]
                    ],
                    'dhGroup' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'DHGroup1',
                            'DHGroup2',
                            'DHGroup14',
                            'DHGroup2048',
                            'ECP256',
                            'ECP384',
                            'DHGroup24'
                        ]
                    ],
                    'pfsGroup' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'PFS1',
                            'PFS2',
                            'PFS2048',
                            'ECP256',
                            'ECP384',
                            'PFS24'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'saLifeTimeSeconds',
                    'saDataSizeKilobytes',
                    'ipsecEncryption',
                    'ipsecIntegrity',
                    'ikeEncryption',
                    'ikeIntegrity',
                    'dhGroup',
                    'pfsGroup'
                ]
            ],
            'VirtualNetworkGatewayConnectionPropertiesFormat' => [
                'properties' => [
                    'authorizationKey' => ['type' => 'string'],
                    'virtualNetworkGateway1' => ['$ref' => '#/definitions/VirtualNetworkGateway'],
                    'virtualNetworkGateway2' => ['$ref' => '#/definitions/VirtualNetworkGateway'],
                    'localNetworkGateway2' => ['$ref' => '#/definitions/LocalNetworkGateway'],
                    'connectionType' => [
                        'type' => 'string',
                        'enum' => [
                            'IPsec',
                            'Vnet2Vnet',
                            'ExpressRoute',
                            'VPNClient'
                        ]
                    ],
                    'routingWeight' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'sharedKey' => ['type' => 'string'],
                    'connectionStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'Connecting',
                            'Connected',
                            'NotConnected'
                        ]
                    ],
                    'tunnelConnectionStatus' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TunnelConnectionHealth']
                    ],
                    'egressBytesTransferred' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'ingressBytesTransferred' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'peer' => ['$ref' => '#/definitions/SubResource'],
                    'enableBgp' => ['type' => 'boolean'],
                    'usePolicyBasedTrafficSelectors' => ['type' => 'boolean'],
                    'ipsecPolicies' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/IpsecPolicy']
                    ],
                    'resourceGuid' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'virtualNetworkGateway1',
                    'connectionType'
                ]
            ],
            'VirtualNetworkGatewayConnection' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/VirtualNetworkGatewayConnectionPropertiesFormat'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'VirtualNetworkGatewayConnectionListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualNetworkGatewayConnection']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ConnectionResetSharedKey' => [
                'properties' => ['keyLength' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]],
                'additionalProperties' => FALSE,
                'required' => ['keyLength']
            ],
            'ConnectionSharedKey' => [
                'properties' => ['value' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'LocalNetworkGatewayListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/LocalNetworkGateway']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'virtualNetworkConnectionGatewayReference' => [
                'properties' => ['id' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['id']
            ],
            'VirtualNetworkGatewayConnectionListEntityPropertiesFormat' => [
                'properties' => [
                    'authorizationKey' => ['type' => 'string'],
                    'virtualNetworkGateway1' => ['$ref' => '#/definitions/virtualNetworkConnectionGatewayReference'],
                    'virtualNetworkGateway2' => ['$ref' => '#/definitions/virtualNetworkConnectionGatewayReference'],
                    'localNetworkGateway2' => ['$ref' => '#/definitions/virtualNetworkConnectionGatewayReference'],
                    'connectionType' => [
                        'type' => 'string',
                        'enum' => [
                            'IPsec',
                            'Vnet2Vnet',
                            'ExpressRoute',
                            'VPNClient'
                        ]
                    ],
                    'routingWeight' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'sharedKey' => ['type' => 'string'],
                    'connectionStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'Connecting',
                            'Connected',
                            'NotConnected'
                        ]
                    ],
                    'tunnelConnectionStatus' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TunnelConnectionHealth']
                    ],
                    'egressBytesTransferred' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'ingressBytesTransferred' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'peer' => ['$ref' => '#/definitions/SubResource'],
                    'enableBgp' => ['type' => 'boolean'],
                    'usePolicyBasedTrafficSelectors' => ['type' => 'boolean'],
                    'ipsecPolicies' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/IpsecPolicy']
                    ],
                    'resourceGuid' => ['type' => 'string'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'virtualNetworkGateway1',
                    'connectionType'
                ]
            ],
            'VirtualNetworkGatewayConnectionListEntity' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/VirtualNetworkGatewayConnectionListEntityPropertiesFormat'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'VirtualNetworkGatewayListConnectionsResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualNetworkGatewayConnectionListEntity']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
