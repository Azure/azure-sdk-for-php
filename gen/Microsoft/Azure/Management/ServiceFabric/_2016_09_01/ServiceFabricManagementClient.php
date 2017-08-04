<?php
namespace Microsoft\Azure\Management\ServiceFabric\_2016_09_01;
final class ServiceFabricManagementClient
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
        $this->_Clusters_group = new \Microsoft\Azure\Management\ServiceFabric\_2016_09_01\Clusters($_client);
        $this->_ClusterVersions_group = new \Microsoft\Azure\Management\ServiceFabric\_2016_09_01\ClusterVersions($_client);
        $this->_Operations_group = new \Microsoft\Azure\Management\ServiceFabric\_2016_09_01\Operations($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceFabric\_2016_09_01\Clusters
     */
    public function getClusters()
    {
        return $this->_Clusters_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceFabric\_2016_09_01\ClusterVersions
     */
    public function getClusterVersions()
    {
        return $this->_ClusterVersions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServiceFabric\_2016_09_01\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @var \Microsoft\Azure\Management\ServiceFabric\_2016_09_01\Clusters
     */
    private $_Clusters_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceFabric\_2016_09_01\ClusterVersions
     */
    private $_ClusterVersions_group;
    /**
     * @var \Microsoft\Azure\Management\ServiceFabric\_2016_09_01\Operations
     */
    private $_Operations_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServiceFabric/clusters/{clusterName}' => [
                'patch' => [
                    'operationId' => 'Clusters_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'clusterName',
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
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ClusterUpdateParameters'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Cluster']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Clusters_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'clusterName',
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Cluster']]]
                ],
                'put' => [
                    'operationId' => 'Clusters_Create',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'clusterName',
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
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Cluster'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Cluster']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Clusters_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'clusterName',
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
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.ServiceFabric/clusters' => ['get' => [
                'operationId' => 'Clusters_ListByResourceGroup',
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
                        'enum' => ['2016-09-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ClusterListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ServiceFabric/clusters' => ['get' => [
                'operationId' => 'Clusters_List',
                'parameters' => [
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ClusterListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ServiceFabric/locations/{location}/clusterVersions' => ['get' => [
                'operationId' => 'ClusterVersions_List',
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
                        'enum' => ['2016-09-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ClusterCodeVersionsListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ServiceFabric/locations/{location}/environments/{environment}/clusterVersions' => ['get' => [
                'operationId' => 'ClusterVersions_ListByEnvironment',
                'parameters' => [
                    [
                        'name' => 'location',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'environment',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => [
                            'Windows',
                            'Linux'
                        ]
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ClusterCodeVersionsListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ServiceFabric/locations/{location}/environments/{environment}/clusterVersions/{clusterVersion}' => ['get' => [
                'operationId' => 'ClusterVersions_Get',
                'parameters' => [
                    [
                        'name' => 'location',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'environment',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => [
                            'Windows',
                            'Linux'
                        ]
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
                        'name' => 'clusterVersion',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ClusterCodeVersionsResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ServiceFabric/locations/{location}/clusterVersions/{clusterVersion}' => ['get' => [
                'operationId' => 'ClusterVersions_ListByVersion',
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
                        'enum' => ['2016-09-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'clusterVersion',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ClusterCodeVersionsListResult']]]
            ]],
            '/providers/Microsoft.ServiceFabric/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2016-09-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]]
        ],
        'definitions' => [
            'ClusterVersionDetails' => ['properties' => [
                'codeVersion' => ['type' => 'string'],
                'supportExpiryUtc' => ['type' => 'string'],
                'environment' => [
                    'type' => 'string',
                    'enum' => [
                        'Windows',
                        'Linux'
                    ]
                ]
            ]],
            'ClusterCodeVersionsResult' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ClusterVersionDetails']
            ]],
            'ClusterCodeVersionsListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ClusterCodeVersionsResult']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'CertificateDescription' => ['properties' => [
                'thumbprint' => ['type' => 'string'],
                'thumbprintSecondary' => ['type' => 'string'],
                'x509StoreName' => [
                    'type' => 'string',
                    'enum' => [
                        'AddressBook',
                        'AuthRoot',
                        'CertificateAuthority',
                        'Disallowed',
                        'My',
                        'Root',
                        'TrustedPeople',
                        'TrustedPublisher'
                    ]
                ]
            ]],
            'SettingsParameterDescription' => ['properties' => [
                'name' => ['type' => 'string'],
                'value' => ['type' => 'string']
            ]],
            'SettingsSectionDescription' => ['properties' => [
                'name' => ['type' => 'string'],
                'parameters' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SettingsParameterDescription']
                ]
            ]],
            'EndpointRangeDescription' => ['properties' => [
                'startPort' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'endPort' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'NodeTypeDescription' => ['properties' => [
                'name' => ['type' => 'string'],
                'placementProperties' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'capacities' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'clientConnectionEndpointPort' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'httpGatewayEndpointPort' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'durabilityLevel' => [
                    'type' => 'string',
                    'enum' => [
                        'Bronze',
                        'Silver',
                        'Gold'
                    ]
                ],
                'applicationPorts' => ['$ref' => '#/definitions/EndpointRangeDescription'],
                'ephemeralPorts' => ['$ref' => '#/definitions/EndpointRangeDescription'],
                'isPrimary' => ['type' => 'boolean'],
                'vmInstanceCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'reverseProxyEndpointPort' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'ClientCertificateThumbprint' => ['properties' => [
                'isAdmin' => ['type' => 'boolean'],
                'certificateThumbprint' => ['type' => 'string']
            ]],
            'ClientCertificateCommonName' => ['properties' => [
                'isAdmin' => ['type' => 'boolean'],
                'certificateCommonName' => ['type' => 'string'],
                'certificateIssuerThumbprint' => ['type' => 'string']
            ]],
            'ClusterHealthPolicy' => ['properties' => [
                'maxPercentUnhealthyNodes' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'maxPercentUnhealthyApplications' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'ClusterUpgradeDeltaHealthPolicy' => ['properties' => [
                'maxPercentDeltaUnhealthyNodes' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'maxPercentUpgradeDomainDeltaUnhealthyNodes' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'maxPercentDeltaUnhealthyApplications' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'ClusterUpgradePolicy' => ['properties' => [
                'overrideUserUpgradePolicy' => ['type' => 'boolean'],
                'forceRestart' => ['type' => 'boolean'],
                'upgradeReplicaSetCheckTimeout' => ['type' => 'string'],
                'healthCheckWaitDuration' => ['type' => 'string'],
                'healthCheckStableDuration' => ['type' => 'string'],
                'healthCheckRetryTimeout' => ['type' => 'string'],
                'upgradeTimeout' => ['type' => 'string'],
                'upgradeDomainTimeout' => ['type' => 'string'],
                'healthPolicy' => ['$ref' => '#/definitions/ClusterHealthPolicy'],
                'deltaHealthPolicy' => ['$ref' => '#/definitions/ClusterUpgradeDeltaHealthPolicy']
            ]],
            'DiagnosticsStorageAccountConfig' => ['properties' => [
                'storageAccountName' => ['type' => 'string'],
                'protectedAccountKeyName' => ['type' => 'string'],
                'blobEndpoint' => ['type' => 'string'],
                'queueEndpoint' => ['type' => 'string'],
                'tableEndpoint' => ['type' => 'string']
            ]],
            'AzureActiveDirectory' => ['properties' => [
                'tenantId' => ['type' => 'string'],
                'clusterApplication' => ['type' => 'string'],
                'clientApplication' => ['type' => 'string']
            ]],
            'ClusterPropertiesUpdateParameters' => ['properties' => [
                'reliabilityLevel' => [
                    'type' => 'string',
                    'enum' => [
                        'Bronze',
                        'Silver',
                        'Gold'
                    ]
                ],
                'upgradeMode' => [
                    'type' => 'string',
                    'enum' => [
                        'Automatic',
                        'Manual'
                    ]
                ],
                'clusterCodeVersion' => ['type' => 'string'],
                'certificate' => ['$ref' => '#/definitions/CertificateDescription'],
                'clientCertificateThumbprints' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ClientCertificateThumbprint']
                ],
                'clientCertificateCommonNames' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ClientCertificateCommonName']
                ],
                'fabricSettings' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SettingsSectionDescription']
                ],
                'reverseProxyCertificate' => ['$ref' => '#/definitions/CertificateDescription'],
                'nodeTypes' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/NodeTypeDescription']
                ],
                'upgradeDescription' => ['$ref' => '#/definitions/ClusterUpgradePolicy']
            ]],
            'ClusterProperties' => ['properties' => [
                'availableClusterVersions' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ClusterVersionDetails']
                ],
                'clusterId' => ['type' => 'string'],
                'clusterState' => [
                    'type' => 'string',
                    'enum' => [
                        'WaitingForNodes',
                        'Deploying',
                        'BaselineUpgrade',
                        'UpdatingUserConfiguration',
                        'UpdatingUserCertificate',
                        'UpdatingInfrastructure',
                        'EnforcingClusterVersion',
                        'UpgradeServiceUnreachable',
                        'AutoScale',
                        'Ready'
                    ]
                ],
                'clusterEndpoint' => ['type' => 'string'],
                'clusterCodeVersion' => ['type' => 'string'],
                'certificate' => ['$ref' => '#/definitions/CertificateDescription'],
                'reliabilityLevel' => [
                    'type' => 'string',
                    'enum' => [
                        'Bronze',
                        'Silver',
                        'Gold',
                        'Platinum'
                    ]
                ],
                'upgradeMode' => [
                    'type' => 'string',
                    'enum' => [
                        'Automatic',
                        'Manual'
                    ]
                ],
                'clientCertificateThumbprints' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ClientCertificateThumbprint']
                ],
                'clientCertificateCommonNames' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ClientCertificateCommonName']
                ],
                'fabricSettings' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SettingsSectionDescription']
                ],
                'reverseProxyCertificate' => ['$ref' => '#/definitions/CertificateDescription'],
                'managementEndpoint' => ['type' => 'string'],
                'nodeTypes' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/NodeTypeDescription']
                ],
                'azureActiveDirectory' => ['$ref' => '#/definitions/AzureActiveDirectory'],
                'provisioningState' => [
                    'type' => 'string',
                    'enum' => [
                        'Updating',
                        'Succeeded',
                        'Failed',
                        'Canceled'
                    ]
                ],
                'vmImage' => ['type' => 'string'],
                'diagnosticsStorageAccountConfig' => ['$ref' => '#/definitions/DiagnosticsStorageAccountConfig'],
                'upgradeDescription' => ['$ref' => '#/definitions/ClusterUpgradePolicy']
            ]],
            'ClusterUpdateParameters' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ClusterPropertiesUpdateParameters'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'Cluster' => ['properties' => ['properties' => ['$ref' => '#/definitions/ClusterProperties']]],
            'ClusterListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Cluster']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'AvailableOperationDisplay' => ['properties' => [
                'provider' => ['type' => 'string'],
                'resource' => ['type' => 'string'],
                'operation' => ['type' => 'string'],
                'description' => ['type' => 'string']
            ]],
            'OperationResult' => ['properties' => [
                'name' => ['type' => 'string'],
                'display' => ['$ref' => '#/definitions/AvailableOperationDisplay'],
                'origin' => ['type' => 'string'],
                'nextLink' => ['type' => 'string']
            ]],
            'OperationListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/OperationResult']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ErrorModel_error' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string']
            ]],
            'ErrorModel' => ['properties' => ['error' => ['$ref' => '#/definitions/ErrorModel_error']]],
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]]
        ]
    ];
}
