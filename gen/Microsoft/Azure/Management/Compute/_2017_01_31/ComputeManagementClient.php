<?php
namespace Microsoft\Azure\Management\Compute\_2017_01_31;
final class ComputeManagementClient
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
        $this->_ContainerServices_group = new \Microsoft\Azure\Management\Compute\_2017_01_31\ContainerServices($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\_2017_01_31\ContainerServices
     */
    public function getContainerServices()
    {
        return $this->_ContainerServices_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Compute\_2017_01_31\ContainerServices
     */
    private $_ContainerServices_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/providers/Microsoft.ContainerService/containerServices' => ['get' => [
                'operationId' => 'ContainerServices_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-01-31']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ContainerServiceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerService/containerServices/{containerServiceName}' => [
                'put' => [
                    'operationId' => 'ContainerServices_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'containerServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ContainerService'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-01-31']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ContainerService']],
                        '201' => ['schema' => ['$ref' => '#/definitions/ContainerService']],
                        '202' => ['schema' => ['$ref' => '#/definitions/ContainerService']]
                    ]
                ],
                'get' => [
                    'operationId' => 'ContainerServices_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'containerServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-01-31']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ContainerService']]]
                ],
                'delete' => [
                    'operationId' => 'ContainerServices_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'containerServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-01-31']
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
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerService/containerServices' => ['get' => [
                'operationId' => 'ContainerServices_ListByResourceGroup',
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
                        'enum' => ['2017-01-31']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ContainerServiceListResult']]]
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
            'ContainerServiceCustomProfile' => ['properties' => ['orchestrator' => ['type' => 'string']]],
            'ContainerServiceServicePrincipalProfile' => ['properties' => [
                'clientId' => ['type' => 'string'],
                'secret' => ['type' => 'string']
            ]],
            'ContainerServiceOrchestratorProfile' => ['properties' => ['orchestratorType' => [
                'type' => 'string',
                'enum' => [
                    'Swarm',
                    'DCOS',
                    'Custom',
                    'Kubernetes'
                ]
            ]]],
            'ContainerServiceMasterProfile' => ['properties' => [
                'count' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'dnsPrefix' => ['type' => 'string'],
                'fqdn' => ['type' => 'string']
            ]],
            'ContainerServiceAgentPoolProfile' => ['properties' => [
                'name' => ['type' => 'string'],
                'count' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'vmSize' => [
                    'type' => 'string',
                    'enum' => [
                        'Standard_A0',
                        'Standard_A1',
                        'Standard_A2',
                        'Standard_A3',
                        'Standard_A4',
                        'Standard_A5',
                        'Standard_A6',
                        'Standard_A7',
                        'Standard_A8',
                        'Standard_A9',
                        'Standard_A10',
                        'Standard_A11',
                        'Standard_D1',
                        'Standard_D2',
                        'Standard_D3',
                        'Standard_D4',
                        'Standard_D11',
                        'Standard_D12',
                        'Standard_D13',
                        'Standard_D14',
                        'Standard_D1_v2',
                        'Standard_D2_v2',
                        'Standard_D3_v2',
                        'Standard_D4_v2',
                        'Standard_D5_v2',
                        'Standard_D11_v2',
                        'Standard_D12_v2',
                        'Standard_D13_v2',
                        'Standard_D14_v2',
                        'Standard_G1',
                        'Standard_G2',
                        'Standard_G3',
                        'Standard_G4',
                        'Standard_G5',
                        'Standard_DS1',
                        'Standard_DS2',
                        'Standard_DS3',
                        'Standard_DS4',
                        'Standard_DS11',
                        'Standard_DS12',
                        'Standard_DS13',
                        'Standard_DS14',
                        'Standard_GS1',
                        'Standard_GS2',
                        'Standard_GS3',
                        'Standard_GS4',
                        'Standard_GS5'
                    ]
                ],
                'dnsPrefix' => ['type' => 'string'],
                'fqdn' => ['type' => 'string']
            ]],
            'ContainerServiceWindowsProfile' => ['properties' => [
                'adminUsername' => ['type' => 'string'],
                'adminPassword' => ['type' => 'string']
            ]],
            'ContainerServiceSshPublicKey' => ['properties' => ['keyData' => ['type' => 'string']]],
            'ContainerServiceSshConfiguration' => ['properties' => ['publicKeys' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ContainerServiceSshPublicKey']
            ]]],
            'ContainerServiceLinuxProfile' => ['properties' => [
                'adminUsername' => ['type' => 'string'],
                'ssh' => ['$ref' => '#/definitions/ContainerServiceSshConfiguration']
            ]],
            'ContainerServiceVMDiagnostics' => ['properties' => [
                'enabled' => ['type' => 'boolean'],
                'storageUri' => ['type' => 'string']
            ]],
            'ContainerServiceDiagnosticsProfile' => ['properties' => ['vmDiagnostics' => ['$ref' => '#/definitions/ContainerServiceVMDiagnostics']]],
            'ContainerServiceProperties' => ['properties' => [
                'provisioningState' => ['type' => 'string'],
                'orchestratorProfile' => ['$ref' => '#/definitions/ContainerServiceOrchestratorProfile'],
                'customProfile' => ['$ref' => '#/definitions/ContainerServiceCustomProfile'],
                'servicePrincipalProfile' => ['$ref' => '#/definitions/ContainerServiceServicePrincipalProfile'],
                'masterProfile' => ['$ref' => '#/definitions/ContainerServiceMasterProfile'],
                'agentPoolProfiles' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ContainerServiceAgentPoolProfile']
                ],
                'windowsProfile' => ['$ref' => '#/definitions/ContainerServiceWindowsProfile'],
                'linuxProfile' => ['$ref' => '#/definitions/ContainerServiceLinuxProfile'],
                'diagnosticsProfile' => ['$ref' => '#/definitions/ContainerServiceDiagnosticsProfile']
            ]],
            'ContainerService' => ['properties' => ['properties' => ['$ref' => '#/definitions/ContainerServiceProperties']]],
            'ContainerServiceListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ContainerService']
                ],
                'nextLink' => ['type' => 'string']
            ]]
        ]
    ];
}
