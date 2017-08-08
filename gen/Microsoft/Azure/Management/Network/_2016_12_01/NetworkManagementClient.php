<?php
namespace Microsoft\Azure\Management\Network\_2016_12_01;
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
        $this->_NetworkInterfaces_group = new \Microsoft\Azure\Management\Network\_2016_12_01\NetworkInterfaces($_client);
        $this->_ApplicationGateways_group = new \Microsoft\Azure\Management\Network\_2016_12_01\ApplicationGateways($_client);
        $this->_ExpressRouteCircuitAuthorizations_group = new \Microsoft\Azure\Management\Network\_2016_12_01\ExpressRouteCircuitAuthorizations($_client);
        $this->_ExpressRouteCircuitPeerings_group = new \Microsoft\Azure\Management\Network\_2016_12_01\ExpressRouteCircuitPeerings($_client);
        $this->_ExpressRouteCircuits_group = new \Microsoft\Azure\Management\Network\_2016_12_01\ExpressRouteCircuits($_client);
        $this->_ExpressRouteServiceProviders_group = new \Microsoft\Azure\Management\Network\_2016_12_01\ExpressRouteServiceProviders($_client);
        $this->_LoadBalancers_group = new \Microsoft\Azure\Management\Network\_2016_12_01\LoadBalancers($_client);
        $this->_NetworkSecurityGroups_group = new \Microsoft\Azure\Management\Network\_2016_12_01\NetworkSecurityGroups($_client);
        $this->_SecurityRules_group = new \Microsoft\Azure\Management\Network\_2016_12_01\SecurityRules($_client);
        $this->_NetworkWatchers_group = new \Microsoft\Azure\Management\Network\_2016_12_01\NetworkWatchers($_client);
        $this->_PacketCaptures_group = new \Microsoft\Azure\Management\Network\_2016_12_01\PacketCaptures($_client);
        $this->_PublicIPAddresses_group = new \Microsoft\Azure\Management\Network\_2016_12_01\PublicIPAddresses($_client);
        $this->_RouteFilters_group = new \Microsoft\Azure\Management\Network\_2016_12_01\RouteFilters($_client);
        $this->_RouteFilterRules_group = new \Microsoft\Azure\Management\Network\_2016_12_01\RouteFilterRules($_client);
        $this->_RouteTables_group = new \Microsoft\Azure\Management\Network\_2016_12_01\RouteTables($_client);
        $this->_Routes_group = new \Microsoft\Azure\Management\Network\_2016_12_01\Routes($_client);
        $this->_BgpServiceCommunities_group = new \Microsoft\Azure\Management\Network\_2016_12_01\BgpServiceCommunities($_client);
        $this->_Usages_group = new \Microsoft\Azure\Management\Network\_2016_12_01\Usages($_client);
        $this->_VirtualNetworks_group = new \Microsoft\Azure\Management\Network\_2016_12_01\VirtualNetworks($_client);
        $this->_Subnets_group = new \Microsoft\Azure\Management\Network\_2016_12_01\Subnets($_client);
        $this->_VirtualNetworkPeerings_group = new \Microsoft\Azure\Management\Network\_2016_12_01\VirtualNetworkPeerings($_client);
        $this->_VirtualNetworkGateways_group = new \Microsoft\Azure\Management\Network\_2016_12_01\VirtualNetworkGateways($_client);
        $this->_VirtualNetworkGatewayConnections_group = new \Microsoft\Azure\Management\Network\_2016_12_01\VirtualNetworkGatewayConnections($_client);
        $this->_LocalNetworkGateways_group = new \Microsoft\Azure\Management\Network\_2016_12_01\LocalNetworkGateways($_client);
        $this->_CheckDnsNameAvailability_operation = $_client->createOperation('CheckDnsNameAvailability');
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\NetworkInterfaces
     */
    public function getNetworkInterfaces()
    {
        return $this->_NetworkInterfaces_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\ApplicationGateways
     */
    public function getApplicationGateways()
    {
        return $this->_ApplicationGateways_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\ExpressRouteCircuitAuthorizations
     */
    public function getExpressRouteCircuitAuthorizations()
    {
        return $this->_ExpressRouteCircuitAuthorizations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\ExpressRouteCircuitPeerings
     */
    public function getExpressRouteCircuitPeerings()
    {
        return $this->_ExpressRouteCircuitPeerings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\ExpressRouteCircuits
     */
    public function getExpressRouteCircuits()
    {
        return $this->_ExpressRouteCircuits_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\ExpressRouteServiceProviders
     */
    public function getExpressRouteServiceProviders()
    {
        return $this->_ExpressRouteServiceProviders_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\LoadBalancers
     */
    public function getLoadBalancers()
    {
        return $this->_LoadBalancers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\NetworkSecurityGroups
     */
    public function getNetworkSecurityGroups()
    {
        return $this->_NetworkSecurityGroups_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\SecurityRules
     */
    public function getSecurityRules()
    {
        return $this->_SecurityRules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\NetworkWatchers
     */
    public function getNetworkWatchers()
    {
        return $this->_NetworkWatchers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\PacketCaptures
     */
    public function getPacketCaptures()
    {
        return $this->_PacketCaptures_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\PublicIPAddresses
     */
    public function getPublicIPAddresses()
    {
        return $this->_PublicIPAddresses_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\RouteFilters
     */
    public function getRouteFilters()
    {
        return $this->_RouteFilters_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\RouteFilterRules
     */
    public function getRouteFilterRules()
    {
        return $this->_RouteFilterRules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\RouteTables
     */
    public function getRouteTables()
    {
        return $this->_RouteTables_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\Routes
     */
    public function getRoutes()
    {
        return $this->_Routes_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\BgpServiceCommunities
     */
    public function getBgpServiceCommunities()
    {
        return $this->_BgpServiceCommunities_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\Usages
     */
    public function getUsages()
    {
        return $this->_Usages_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\VirtualNetworks
     */
    public function getVirtualNetworks()
    {
        return $this->_VirtualNetworks_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\Subnets
     */
    public function getSubnets()
    {
        return $this->_Subnets_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\VirtualNetworkPeerings
     */
    public function getVirtualNetworkPeerings()
    {
        return $this->_VirtualNetworkPeerings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\VirtualNetworkGateways
     */
    public function getVirtualNetworkGateways()
    {
        return $this->_VirtualNetworkGateways_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\VirtualNetworkGatewayConnections
     */
    public function getVirtualNetworkGatewayConnections()
    {
        return $this->_VirtualNetworkGatewayConnections_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Network\_2016_12_01\LocalNetworkGateways
     */
    public function getLocalNetworkGateways()
    {
        return $this->_LocalNetworkGateways_group;
    }
    /**
     * Checks whether a domain name in the cloudapp.net zone is available for use.
     * @param string $location
     * @param string $domainNameLabel
     * @return array
     */
    public function checkDnsNameAvailability(
        $location,
        $domainNameLabel
    )
    {
        return $this->_CheckDnsNameAvailability_operation->call([
            'location' => $location,
            'domainNameLabel' => $domainNameLabel
        ]);
    }
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\NetworkInterfaces
     */
    private $_NetworkInterfaces_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\ApplicationGateways
     */
    private $_ApplicationGateways_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\ExpressRouteCircuitAuthorizations
     */
    private $_ExpressRouteCircuitAuthorizations_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\ExpressRouteCircuitPeerings
     */
    private $_ExpressRouteCircuitPeerings_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\ExpressRouteCircuits
     */
    private $_ExpressRouteCircuits_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\ExpressRouteServiceProviders
     */
    private $_ExpressRouteServiceProviders_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\LoadBalancers
     */
    private $_LoadBalancers_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\NetworkSecurityGroups
     */
    private $_NetworkSecurityGroups_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\SecurityRules
     */
    private $_SecurityRules_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\NetworkWatchers
     */
    private $_NetworkWatchers_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\PacketCaptures
     */
    private $_PacketCaptures_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\PublicIPAddresses
     */
    private $_PublicIPAddresses_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\RouteFilters
     */
    private $_RouteFilters_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\RouteFilterRules
     */
    private $_RouteFilterRules_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\RouteTables
     */
    private $_RouteTables_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\Routes
     */
    private $_Routes_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\BgpServiceCommunities
     */
    private $_BgpServiceCommunities_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\Usages
     */
    private $_Usages_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\VirtualNetworks
     */
    private $_VirtualNetworks_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\Subnets
     */
    private $_Subnets_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\VirtualNetworkPeerings
     */
    private $_VirtualNetworkPeerings_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\VirtualNetworkGateways
     */
    private $_VirtualNetworkGateways_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\VirtualNetworkGatewayConnections
     */
    private $_VirtualNetworkGatewayConnections_group;
    /**
     * @var \Microsoft\Azure\Management\Network\_2016_12_01\LocalNetworkGateways
     */
    private $_LocalNetworkGateways_group;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CheckDnsNameAvailability_operation;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
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
                        'enum' => ['2016-09-01']
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
                        'enum' => ['2016-09-01']
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
                        'enum' => ['2016-09-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/NetworkInterface'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/ApplicationGateway'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/ExpressRouteCircuitAuthorization'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/ExpressRouteCircuitPeering'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/ExpressRouteCircuit'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/LoadBalancer'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/NetworkSecurityGroup'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/SecurityRule'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/NetworkWatcher'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        '$ref' => '#/definitions/TopologyParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
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
                        '$ref' => '#/definitions/VerificationIPFlowParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
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
                        '$ref' => '#/definitions/NextHopParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
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
                        '$ref' => '#/definitions/SecurityGroupViewParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
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
                        '$ref' => '#/definitions/TroubleshootingParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
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
                        '$ref' => '#/definitions/QueryTroubleshootingParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
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
                        '$ref' => '#/definitions/FlowLogInformation'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
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
                        '$ref' => '#/definitions/FlowLogStatusParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/PacketCapture'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/PublicIPAddress'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/RouteFilter'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/PatchRouteFilter'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/RouteFilterRule'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/PatchRouteFilterRule'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/RouteTable'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/Route'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/VirtualNetwork'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/Subnet'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/VirtualNetworkPeering'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/VirtualNetworkGateway'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        '$ref' => '#/definitions/VpnClientParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['202' => ['schema' => ['type' => 'string']]]
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/VirtualNetworkGatewayConnection'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/ConnectionSharedKey'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
                        '$ref' => '#/definitions/ConnectionResetSharedKey'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
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
                            '$ref' => '#/definitions/LocalNetworkGateway'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                            'enum' => ['2016-12-01']
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
                        'enum' => ['2016-12-01']
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
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'NetworkInterfaceDnsSettings' => ['properties' => [
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
            ]],
            'SubResource' => ['properties' => ['id' => ['type' => 'string']]],
            'PublicIPAddressDnsSettings' => ['properties' => [
                'domainNameLabel' => ['type' => 'string'],
                'fqdn' => ['type' => 'string'],
                'reverseFqdn' => ['type' => 'string']
            ]],
            'ResourceNavigationLinkFormat' => ['properties' => [
                'linkedResourceType' => ['type' => 'string'],
                'link' => ['type' => 'string'],
                'provisioningState' => ['type' => 'string']
            ]],
            'ResourceNavigationLink' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ResourceNavigationLinkFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'RoutePropertiesFormat' => ['properties' => [
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
            ]],
            'Route' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/RoutePropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'SecurityRulePropertiesFormat' => ['properties' => [
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
                'destinationAddressPrefix' => ['type' => 'string'],
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
            ]],
            'SecurityRule' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/SecurityRulePropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ApplicationGatewayBackendAddress' => ['properties' => [
                'fqdn' => ['type' => 'string'],
                'ipAddress' => ['type' => 'string']
            ]],
            'ApplicationGatewayBackendAddressPoolPropertiesFormat' => ['properties' => [
                'backendIPConfigurations' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/NetworkInterfaceIPConfiguration']
                ],
                'backendAddresses' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ApplicationGatewayBackendAddress']
                ],
                'provisioningState' => ['type' => 'string']
            ]],
            'ApplicationGatewayBackendAddressPool' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApplicationGatewayBackendAddressPoolPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'BackendAddressPoolPropertiesFormat' => ['properties' => [
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
            ]],
            'BackendAddressPool' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/BackendAddressPoolPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'InboundNatRulePropertiesFormat' => ['properties' => [
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
            ]],
            'InboundNatRule' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/InboundNatRulePropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'IPConfigurationPropertiesFormat' => ['properties' => [
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
            ]],
            'IPConfiguration' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/IPConfigurationPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'PublicIPAddressPropertiesFormat' => ['properties' => [
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
            ]],
            'PublicIPAddress' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/PublicIPAddressPropertiesFormat'],
                'etag' => ['type' => 'string']
            ]],
            'NetworkInterfaceIPConfigurationPropertiesFormat' => ['properties' => [
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
            ]],
            'NetworkInterfaceIPConfiguration' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/NetworkInterfaceIPConfigurationPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'NetworkInterfacePropertiesFormat' => ['properties' => [
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
            ]],
            'NetworkInterface' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/NetworkInterfacePropertiesFormat'],
                'etag' => ['type' => 'string']
            ]],
            'NetworkSecurityGroupPropertiesFormat' => ['properties' => [
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
            ]],
            'NetworkSecurityGroup' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/NetworkSecurityGroupPropertiesFormat'],
                'etag' => ['type' => 'string']
            ]],
            'RouteTable' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/RouteTablePropertiesFormat'],
                'etag' => ['type' => 'string']
            ]],
            'SubnetPropertiesFormat' => ['properties' => [
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
            ]],
            'Subnet' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/SubnetPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'RouteTablePropertiesFormat' => ['properties' => [
                'routes' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Route']
                ],
                'subnets' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Subnet']
                ],
                'provisioningState' => ['type' => 'string']
            ]],
            'NetworkInterfaceListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/NetworkInterface']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ApplicationGatewayConnectionDraining' => ['properties' => [
                'enabled' => ['type' => 'boolean'],
                'drainTimeoutInSec' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'ApplicationGatewayBackendHttpSettingsPropertiesFormat' => ['properties' => [
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
                'provisioningState' => ['type' => 'string'],
                'connectionDraining' => ['$ref' => '#/definitions/ApplicationGatewayConnectionDraining']
            ]],
            'ApplicationGatewayBackendHttpSettings' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApplicationGatewayBackendHttpSettingsPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ApplicationGatewayBackendHealthServer' => ['properties' => [
                'address' => ['type' => 'string'],
                'ipConfiguration' => ['$ref' => '#/definitions/SubResource'],
                'health' => [
                    'type' => 'string',
                    'enum' => [
                        'Unknown',
                        'Up',
                        'Down',
                        'Partial'
                    ]
                ]
            ]],
            'ApplicationGatewayBackendHealthHttpSettings' => ['properties' => [
                'backendHttpSettings' => ['$ref' => '#/definitions/ApplicationGatewayBackendHttpSettings'],
                'servers' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ApplicationGatewayBackendHealthServer']
                ]
            ]],
            'ApplicationGatewayBackendHealthPool' => ['properties' => [
                'backendAddressPool' => ['$ref' => '#/definitions/ApplicationGatewayBackendAddressPool'],
                'backendHttpSettingsCollection' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ApplicationGatewayBackendHealthHttpSettings']
                ]
            ]],
            'ApplicationGatewayBackendHealth' => ['properties' => ['backendAddressPools' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ApplicationGatewayBackendHealthPool']
            ]]],
            'ApplicationGatewaySku' => ['properties' => [
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
            ]],
            'ApplicationGatewaySslPolicy' => ['properties' => ['disabledSslProtocols' => [
                'type' => 'array',
                'items' => [
                    'type' => 'string',
                    'enum' => [
                        'TLSv1_0',
                        'TLSv1_1',
                        'TLSv1_2'
                    ]
                ]
            ]]],
            'ApplicationGatewayIPConfigurationPropertiesFormat' => ['properties' => [
                'subnet' => ['$ref' => '#/definitions/SubResource'],
                'provisioningState' => ['type' => 'string']
            ]],
            'ApplicationGatewayIPConfiguration' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApplicationGatewayIPConfigurationPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ApplicationGatewayAuthenticationCertificatePropertiesFormat' => ['properties' => [
                'data' => ['type' => 'string'],
                'provisioningState' => ['type' => 'string']
            ]],
            'ApplicationGatewayAuthenticationCertificate' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApplicationGatewayAuthenticationCertificatePropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ApplicationGatewaySslCertificatePropertiesFormat' => ['properties' => [
                'data' => ['type' => 'string'],
                'password' => ['type' => 'string'],
                'publicCertData' => ['type' => 'string'],
                'provisioningState' => ['type' => 'string']
            ]],
            'ApplicationGatewaySslCertificate' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApplicationGatewaySslCertificatePropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ApplicationGatewayFrontendIPConfigurationPropertiesFormat' => ['properties' => [
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
            ]],
            'ApplicationGatewayFrontendIPConfiguration' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApplicationGatewayFrontendIPConfigurationPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ApplicationGatewayFrontendPortPropertiesFormat' => ['properties' => [
                'port' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'provisioningState' => ['type' => 'string']
            ]],
            'ApplicationGatewayFrontendPort' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApplicationGatewayFrontendPortPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ApplicationGatewayHttpListenerPropertiesFormat' => ['properties' => [
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
            ]],
            'ApplicationGatewayHttpListener' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApplicationGatewayHttpListenerPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ApplicationGatewayPathRulePropertiesFormat' => ['properties' => [
                'paths' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'backendAddressPool' => ['$ref' => '#/definitions/SubResource'],
                'backendHttpSettings' => ['$ref' => '#/definitions/SubResource'],
                'provisioningState' => ['type' => 'string']
            ]],
            'ApplicationGatewayPathRule' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApplicationGatewayPathRulePropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ApplicationGatewayProbePropertiesFormat' => ['properties' => [
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
                'provisioningState' => ['type' => 'string']
            ]],
            'ApplicationGatewayProbe' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApplicationGatewayProbePropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ApplicationGatewayRequestRoutingRulePropertiesFormat' => ['properties' => [
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
                'provisioningState' => ['type' => 'string']
            ]],
            'ApplicationGatewayRequestRoutingRule' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApplicationGatewayRequestRoutingRulePropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ApplicationGatewayUrlPathMapPropertiesFormat' => ['properties' => [
                'defaultBackendAddressPool' => ['$ref' => '#/definitions/SubResource'],
                'defaultBackendHttpSettings' => ['$ref' => '#/definitions/SubResource'],
                'pathRules' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ApplicationGatewayPathRule']
                ],
                'provisioningState' => ['type' => 'string']
            ]],
            'ApplicationGatewayUrlPathMap' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApplicationGatewayUrlPathMapPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ApplicationGatewayWebApplicationFirewallConfiguration' => ['properties' => [
                'enabled' => ['type' => 'boolean'],
                'firewallMode' => [
                    'type' => 'string',
                    'enum' => [
                        'Detection',
                        'Prevention'
                    ]
                ]
            ]],
            'ApplicationGatewayPropertiesFormat' => ['properties' => [
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
                'webApplicationFirewallConfiguration' => ['$ref' => '#/definitions/ApplicationGatewayWebApplicationFirewallConfiguration'],
                'resourceGuid' => ['type' => 'string'],
                'provisioningState' => ['type' => 'string']
            ]],
            'ApplicationGateway' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ApplicationGatewayPropertiesFormat'],
                'etag' => ['type' => 'string']
            ]],
            'ApplicationGatewayListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ApplicationGateway']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'DnsNameAvailabilityResult' => ['properties' => ['available' => ['type' => 'boolean']]],
            'AuthorizationPropertiesFormat' => ['properties' => [
                'authorizationKey' => ['type' => 'string'],
                'authorizationUseStatus' => [
                    'type' => 'string',
                    'enum' => [
                        'Available',
                        'InUse'
                    ]
                ],
                'provisioningState' => ['type' => 'string']
            ]],
            'ExpressRouteCircuitAuthorization' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/AuthorizationPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'AuthorizationListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ExpressRouteCircuitAuthorization']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ExpressRouteCircuitPeeringConfig' => ['properties' => [
                'advertisedPublicPrefixes' => [
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
                'customerASN' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'routingRegistryName' => ['type' => 'string']
            ]],
            'ExpressRouteCircuitStats' => ['properties' => [
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
            ]],
            'RouteFilterRulePropertiesFormat' => ['properties' => [
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
            ]],
            'RouteFilterRule' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/RouteFilterRulePropertiesFormat'],
                'name' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'etag' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'ExpressRouteCircuitPeering' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ExpressRouteCircuitPeeringPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'RouteFilterPropertiesFormat' => ['properties' => [
                'rules' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RouteFilterRule']
                ],
                'peerings' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ExpressRouteCircuitPeering']
                ],
                'provisioningState' => ['type' => 'string']
            ]],
            'RouteFilter' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/RouteFilterPropertiesFormat'],
                'etag' => ['type' => 'string']
            ]],
            'ExpressRouteCircuitPeeringPropertiesFormat' => ['properties' => [
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
                'routeFilter' => ['$ref' => '#/definitions/RouteFilter']
            ]],
            'ExpressRouteCircuitPeeringListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ExpressRouteCircuitPeering']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ExpressRouteCircuitSku' => ['properties' => [
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
            ]],
            'ExpressRouteCircuitServiceProviderProperties' => ['properties' => [
                'serviceProviderName' => ['type' => 'string'],
                'peeringLocation' => ['type' => 'string'],
                'bandwidthInMbps' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'ExpressRouteCircuitPropertiesFormat' => ['properties' => [
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
            ]],
            'ExpressRouteCircuit' => ['properties' => [
                'sku' => ['$ref' => '#/definitions/ExpressRouteCircuitSku'],
                'properties' => ['$ref' => '#/definitions/ExpressRouteCircuitPropertiesFormat'],
                'etag' => ['type' => 'string']
            ]],
            'ExpressRouteCircuitArpTable' => ['properties' => [
                'age' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'interface' => ['type' => 'string'],
                'ipAddress' => ['type' => 'string'],
                'macAddress' => ['type' => 'string']
            ]],
            'ExpressRouteCircuitsArpTableListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ExpressRouteCircuitArpTable']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ExpressRouteCircuitRoutesTable' => ['properties' => [
                'network' => ['type' => 'string'],
                'nextHop' => ['type' => 'string'],
                'locPrf' => ['type' => 'string'],
                'weight' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'path' => ['type' => 'string']
            ]],
            'ExpressRouteCircuitsRoutesTableListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ExpressRouteCircuitRoutesTable']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ExpressRouteCircuitRoutesTableSummary' => ['properties' => [
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
            ]],
            'ExpressRouteCircuitsRoutesTableSummaryListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ExpressRouteCircuitRoutesTableSummary']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ExpressRouteCircuitListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ExpressRouteCircuit']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ExpressRouteServiceProviderBandwidthsOffered' => ['properties' => [
                'offerName' => ['type' => 'string'],
                'valueInMbps' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'ExpressRouteServiceProviderPropertiesFormat' => ['properties' => [
                'peeringLocations' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'bandwidthsOffered' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ExpressRouteServiceProviderBandwidthsOffered']
                ],
                'provisioningState' => ['type' => 'string']
            ]],
            'ExpressRouteServiceProvider' => ['properties' => ['properties' => ['$ref' => '#/definitions/ExpressRouteServiceProviderPropertiesFormat']]],
            'ExpressRouteServiceProviderListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ExpressRouteServiceProvider']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'FrontendIPConfigurationPropertiesFormat' => ['properties' => [
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
            ]],
            'FrontendIPConfiguration' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/FrontendIPConfigurationPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'LoadBalancingRulePropertiesFormat' => ['properties' => [
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
            ]],
            'LoadBalancingRule' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/LoadBalancingRulePropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ProbePropertiesFormat' => ['properties' => [
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
            ]],
            'Probe' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ProbePropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'InboundNatPoolPropertiesFormat' => ['properties' => [
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
            ]],
            'InboundNatPool' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/InboundNatPoolPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'OutboundNatRulePropertiesFormat' => ['properties' => [
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
            ]],
            'OutboundNatRule' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/OutboundNatRulePropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'LoadBalancerPropertiesFormat' => ['properties' => [
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
            ]],
            'LoadBalancer' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/LoadBalancerPropertiesFormat'],
                'etag' => ['type' => 'string']
            ]],
            'LoadBalancerListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/LoadBalancer']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ErrorDetails' => ['properties' => [
                'code' => ['type' => 'string'],
                'target' => ['type' => 'string'],
                'message' => ['type' => 'string']
            ]],
            'Error' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string'],
                'target' => ['type' => 'string'],
                'details' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ErrorDetails']
                ],
                'innerError' => ['type' => 'string']
            ]],
            'AzureAsyncOperationResult' => ['properties' => [
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'InProgress',
                        'Succeeded',
                        'Failed'
                    ]
                ],
                'error' => ['$ref' => '#/definitions/Error']
            ]],
            'EffectiveNetworkSecurityGroupAssociation' => ['properties' => [
                'subnet' => ['$ref' => '#/definitions/SubResource'],
                'networkInterface' => ['$ref' => '#/definitions/SubResource']
            ]],
            'EffectiveNetworkSecurityRule' => ['properties' => [
                'name' => ['type' => 'string'],
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
                'destinationAddressPrefix' => ['type' => 'string'],
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
            ]],
            'EffectiveNetworkSecurityGroup' => ['properties' => [
                'networkSecurityGroup' => ['$ref' => '#/definitions/SubResource'],
                'association' => ['$ref' => '#/definitions/EffectiveNetworkSecurityGroupAssociation'],
                'effectiveSecurityRules' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/EffectiveNetworkSecurityRule']
                ]
            ]],
            'EffectiveNetworkSecurityGroupListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/EffectiveNetworkSecurityGroup']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'EffectiveRoute' => ['properties' => [
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
            ]],
            'EffectiveRouteListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/EffectiveRoute']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'SecurityRuleListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SecurityRule']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'NetworkSecurityGroupListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/NetworkSecurityGroup']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'NetworkWatcherPropertiesFormat' => ['properties' => ['provisioningState' => [
                'type' => 'string',
                'enum' => [
                    'Succeeded',
                    'Updating',
                    'Deleting',
                    'Failed'
                ]
            ]]],
            'NetworkWatcher' => ['properties' => [
                'etag' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/NetworkWatcherPropertiesFormat']
            ]],
            'NetworkWatcherListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/NetworkWatcher']
            ]]],
            'TopologyParameters' => ['properties' => ['targetResourceGroupName' => ['type' => 'string']]],
            'TopologyAssociation' => ['properties' => [
                'name' => ['type' => 'string'],
                'resourceId' => ['type' => 'string'],
                'associationType' => [
                    'type' => 'string',
                    'enum' => [
                        'Associated',
                        'Contains'
                    ]
                ]
            ]],
            'TopologyResource' => ['properties' => [
                'name' => ['type' => 'string'],
                'id' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'associations' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/TopologyAssociation']
                ]
            ]],
            'Topology' => ['properties' => [
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
            ]],
            'VerificationIPFlowParameters' => ['properties' => [
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
            ]],
            'VerificationIPFlowResult' => ['properties' => [
                'access' => [
                    'type' => 'string',
                    'enum' => [
                        'Allow',
                        'Deny'
                    ]
                ],
                'ruleName' => ['type' => 'string']
            ]],
            'NextHopParameters' => ['properties' => [
                'targetResourceId' => ['type' => 'string'],
                'sourceIPAddress' => ['type' => 'string'],
                'destinationIPAddress' => ['type' => 'string'],
                'targetNicResourceId' => ['type' => 'string']
            ]],
            'NextHopResult' => ['properties' => [
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
            ]],
            'SecurityGroupViewParameters' => ['properties' => ['targetResourceId' => ['type' => 'string']]],
            'NetworkInterfaceAssociation' => ['properties' => [
                'id' => ['type' => 'string'],
                'securityRules' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SecurityRule']
                ]
            ]],
            'SubnetAssociation' => ['properties' => [
                'id' => ['type' => 'string'],
                'securityRules' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SecurityRule']
                ]
            ]],
            'SecurityRuleAssociations' => ['properties' => [
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
            ]],
            'SecurityGroupNetworkInterface' => ['properties' => [
                'id' => ['type' => 'string'],
                'securityRuleAssociations' => ['$ref' => '#/definitions/SecurityRuleAssociations']
            ]],
            'SecurityGroupViewResult' => ['properties' => ['networkInterfaces' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/SecurityGroupNetworkInterface']
            ]]],
            'PacketCaptureStorageLocation' => ['properties' => [
                'storageId' => ['type' => 'string'],
                'storagePath' => ['type' => 'string'],
                'filePath' => ['type' => 'string']
            ]],
            'PacketCaptureFilter' => ['properties' => [
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
            ]],
            'PacketCaptureParameters' => ['properties' => [
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
            ]],
            'PacketCapture' => ['properties' => ['properties' => ['$ref' => '#/definitions/PacketCaptureParameters']]],
            'PacketCaptureResultProperties' => ['properties' => ['provisioningState' => [
                'type' => 'string',
                'enum' => [
                    'Succeeded',
                    'Updating',
                    'Deleting',
                    'Failed'
                ]
            ]]],
            'PacketCaptureResult' => ['properties' => [
                'name' => ['type' => 'string'],
                'id' => ['type' => 'string'],
                'etag' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/PacketCaptureResultProperties']
            ]],
            'PacketCaptureListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/PacketCaptureResult']
            ]]],
            'PacketCaptureQueryStatusResult' => ['properties' => [
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
            ]],
            'TroubleshootingProperties' => ['properties' => [
                'storageId' => ['type' => 'string'],
                'storagePath' => ['type' => 'string']
            ]],
            'TroubleshootingParameters' => ['properties' => [
                'targetResourceId' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/TroubleshootingProperties']
            ]],
            'QueryTroubleshootingParameters' => ['properties' => ['targetResourceId' => ['type' => 'string']]],
            'TroubleshootingRecommendedActions' => ['properties' => [
                'actionId' => ['type' => 'string'],
                'actionText' => ['type' => 'string'],
                'actionUri' => ['type' => 'string'],
                'actionUriText' => ['type' => 'string']
            ]],
            'TroubleshootingDetails' => ['properties' => [
                'id' => ['type' => 'string'],
                'reasonType' => ['type' => 'string'],
                'summary' => ['type' => 'string'],
                'detail' => ['type' => 'string'],
                'recommendedActions' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/TroubleshootingRecommendedActions']
                ]
            ]],
            'TroubleshootingResult' => ['properties' => [
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
            ]],
            'RetentionPolicyParameters' => ['properties' => [
                'days' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'enabled' => ['type' => 'boolean']
            ]],
            'FlowLogProperties' => ['properties' => [
                'storageId' => ['type' => 'string'],
                'enabled' => ['type' => 'boolean'],
                'retentionPolicy' => ['$ref' => '#/definitions/RetentionPolicyParameters']
            ]],
            'FlowLogStatusParameters' => ['properties' => ['targetResourceId' => ['type' => 'string']]],
            'FlowLogInformation' => ['properties' => [
                'targetResourceId' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/FlowLogProperties']
            ]],
            'PublicIPAddressListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/PublicIPAddress']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'PatchRouteFilterRule' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/RouteFilterRulePropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'PatchRouteFilter' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/RouteFilterPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'RouteFilterListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RouteFilter']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'RouteFilterRuleListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RouteFilterRule']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'RouteTableListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RouteTable']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'RouteListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Route']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'BGPCommunity' => ['properties' => [
                'serviceSupportedRegion' => ['type' => 'string'],
                'communityName' => ['type' => 'string'],
                'communityValue' => ['type' => 'string'],
                'communityPrefixes' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'BgpServiceCommunityPropertiesFormat' => ['properties' => [
                'serviceName' => ['type' => 'string'],
                'bgpCommunities' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/BGPCommunity']
                ]
            ]],
            'BgpServiceCommunity' => ['properties' => ['properties' => ['$ref' => '#/definitions/BgpServiceCommunityPropertiesFormat']]],
            'BgpServiceCommunityListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/BgpServiceCommunity']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'UsageName' => ['properties' => [
                'value' => ['type' => 'string'],
                'localizedValue' => ['type' => 'string']
            ]],
            'Usage' => ['properties' => [
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
            ]],
            'UsagesListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Usage']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'VirtualNetworkPeeringPropertiesFormat' => ['properties' => [
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
            ]],
            'VirtualNetworkPeering' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/VirtualNetworkPeeringPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'SubnetListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Subnet']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'VirtualNetworkPeeringListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualNetworkPeering']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'AddressSpace' => ['properties' => ['addressPrefixes' => [
                'type' => 'array',
                'items' => ['type' => 'string']
            ]]],
            'DhcpOptions' => ['properties' => ['dnsServers' => [
                'type' => 'array',
                'items' => ['type' => 'string']
            ]]],
            'VirtualNetworkPropertiesFormat' => ['properties' => [
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
            ]],
            'VirtualNetwork' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/VirtualNetworkPropertiesFormat'],
                'etag' => ['type' => 'string']
            ]],
            'VirtualNetworkListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualNetwork']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'IPAddressAvailabilityResult' => ['properties' => [
                'available' => ['type' => 'boolean'],
                'availableIPAddresses' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'VirtualNetworkGatewayIPConfigurationPropertiesFormat' => ['properties' => [
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
            ]],
            'VirtualNetworkGatewayIPConfiguration' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/VirtualNetworkGatewayIPConfigurationPropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'VirtualNetworkGatewaySku' => ['properties' => [
                'name' => [
                    'type' => 'string',
                    'enum' => [
                        'Basic',
                        'HighPerformance',
                        'Standard',
                        'UltraPerformance'
                    ]
                ],
                'tier' => [
                    'type' => 'string',
                    'enum' => [
                        'Basic',
                        'HighPerformance',
                        'Standard',
                        'UltraPerformance'
                    ]
                ],
                'capacity' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'VpnClientRootCertificatePropertiesFormat' => ['properties' => [
                'publicCertData' => ['type' => 'string'],
                'provisioningState' => ['type' => 'string']
            ]],
            'VpnClientRootCertificate' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/VpnClientRootCertificatePropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'VpnClientRevokedCertificatePropertiesFormat' => ['properties' => [
                'thumbprint' => ['type' => 'string'],
                'provisioningState' => ['type' => 'string']
            ]],
            'VpnClientRevokedCertificate' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/VpnClientRevokedCertificatePropertiesFormat'],
                'name' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'VpnClientConfiguration' => ['properties' => [
                'vpnClientAddressPool' => ['$ref' => '#/definitions/AddressSpace'],
                'vpnClientRootCertificates' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VpnClientRootCertificate']
                ],
                'vpnClientRevokedCertificates' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VpnClientRevokedCertificate']
                ]
            ]],
            'BgpSettings' => ['properties' => [
                'asn' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'bgpPeeringAddress' => ['type' => 'string'],
                'peerWeight' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'VirtualNetworkGatewayPropertiesFormat' => ['properties' => [
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
            ]],
            'BgpPeerStatus' => ['properties' => [
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
                    'format' => 'int32'
                ]
            ]],
            'GatewayRoute' => ['properties' => [
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
            ]],
            'VirtualNetworkGateway' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/VirtualNetworkGatewayPropertiesFormat'],
                'etag' => ['type' => 'string']
            ]],
            'VpnClientParameters' => ['properties' => ['ProcessorArchitecture' => [
                'type' => 'string',
                'enum' => [
                    'Amd64',
                    'X86'
                ]
            ]]],
            'VirtualNetworkGatewayListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualNetworkGateway']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'BgpPeerStatusListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/BgpPeerStatus']
            ]]],
            'GatewayRouteListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/GatewayRoute']
            ]]],
            'TunnelConnectionHealth' => ['properties' => [
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
            ]],
            'LocalNetworkGatewayPropertiesFormat' => ['properties' => [
                'localNetworkAddressSpace' => ['$ref' => '#/definitions/AddressSpace'],
                'gatewayIpAddress' => ['type' => 'string'],
                'bgpSettings' => ['$ref' => '#/definitions/BgpSettings'],
                'resourceGuid' => ['type' => 'string'],
                'provisioningState' => ['type' => 'string']
            ]],
            'LocalNetworkGateway' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/LocalNetworkGatewayPropertiesFormat'],
                'etag' => ['type' => 'string']
            ]],
            'VirtualNetworkGatewayConnectionPropertiesFormat' => ['properties' => [
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
                'resourceGuid' => ['type' => 'string'],
                'provisioningState' => ['type' => 'string']
            ]],
            'VirtualNetworkGatewayConnection' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/VirtualNetworkGatewayConnectionPropertiesFormat'],
                'etag' => ['type' => 'string']
            ]],
            'VirtualNetworkGatewayConnectionListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualNetworkGatewayConnection']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ConnectionResetSharedKey' => ['properties' => ['keyLength' => [
                'type' => 'integer',
                'format' => 'int32'
            ]]],
            'ConnectionSharedKey' => ['properties' => ['value' => ['type' => 'string']]],
            'LocalNetworkGatewayListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/LocalNetworkGateway']
                ],
                'nextLink' => ['type' => 'string']
            ]]
        ]
    ];
}
