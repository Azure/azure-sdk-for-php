<?php
namespace Microsoft\Azure\Management\HdInsight\_2015_03_01_preview;
final class HDInsightManagementClient
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
        $this->_Clusters_group = new \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Clusters($_client);
        $this->_Applications_group = new \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Applications($_client);
        $this->_Location_group = new \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Location($_client);
        $this->_Configurations_group = new \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Configurations($_client);
        $this->_Extension_group = new \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Extension($_client);
        $this->_ScriptActions_group = new \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\ScriptActions($_client);
        $this->_ScriptExecutionHistory_group = new \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\ScriptExecutionHistory($_client);
        $this->_Operations_group = new \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Operations($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Clusters
     */
    public function getClusters()
    {
        return $this->_Clusters_group;
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Applications
     */
    public function getApplications()
    {
        return $this->_Applications_group;
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Location
     */
    public function getLocation()
    {
        return $this->_Location_group;
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Configurations
     */
    public function getConfigurations()
    {
        return $this->_Configurations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Extension
     */
    public function getExtension()
    {
        return $this->_Extension_group;
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\ScriptActions
     */
    public function getScriptActions()
    {
        return $this->_ScriptActions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\ScriptExecutionHistory
     */
    public function getScriptExecutionHistory()
    {
        return $this->_ScriptExecutionHistory_group;
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @var \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Clusters
     */
    private $_Clusters_group;
    /**
     * @var \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Applications
     */
    private $_Applications_group;
    /**
     * @var \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Location
     */
    private $_Location_group;
    /**
     * @var \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Configurations
     */
    private $_Configurations_group;
    /**
     * @var \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Extension
     */
    private $_Extension_group;
    /**
     * @var \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\ScriptActions
     */
    private $_ScriptActions_group;
    /**
     * @var \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\ScriptExecutionHistory
     */
    private $_ScriptExecutionHistory_group;
    /**
     * @var \Microsoft\Azure\Management\HdInsight\_2015_03_01_preview\Operations
     */
    private $_Operations_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.HDInsight/clusters/{clusterName}' => [
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
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ClusterCreateParametersExtended'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-01-preview']
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
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ClusterPatchParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-01-preview']
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
                            'enum' => ['2015-03-01-preview']
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
                        '200' => []
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
                            'enum' => ['2015-03-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Cluster']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.HDInsight/clusters' => ['get' => [
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
                        'enum' => ['2015-03-01-preview']
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
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.HDInsight/clusters/{clusterName}/roles/{roleName}/resize' => ['post' => [
                'operationId' => 'Clusters_Resize',
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
                        'name' => 'roleName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['workernode']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/ClusterResizeParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-03-01-preview']
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
                    '200' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.HDInsight/clusters' => ['get' => [
                'operationId' => 'Clusters_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-03-01-preview']
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
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.HDInsight/clusters/{clusterName}/changerdpsetting' => ['post' => [
                'operationId' => 'Clusters_ChangeRdpSettings',
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
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/RDPSettingsParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-03-01-preview']
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
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.HDInsight/clusters/{clusterName}/executeScriptActions' => ['post' => [
                'operationId' => 'Clusters_ExecuteScriptActions',
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
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/ExecuteScriptActionParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-03-01-preview']
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
                    '200' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.HDInsight/clusters/{clusterName}/applications' => ['get' => [
                'operationId' => 'Applications_List',
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
                        'enum' => ['2015-03-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplicationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.HDInsight/clusters/{clusterName}/applications/{applicationName}' => [
                'get' => [
                    'operationId' => 'Applications_Get',
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
                            'enum' => ['2015-03-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'applicationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => []
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Application']]]
                ],
                'put' => [
                    'operationId' => 'Applications_Create',
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
                            'name' => 'applicationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['hue']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ApplicationGetProperties'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Application']]]
                ],
                'delete' => [
                    'operationId' => 'Applications_Delete',
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
                            'name' => 'applicationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['hue']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.HDInsight/locations/{location}/capabilities' => ['get' => [
                'operationId' => 'Location_GetCapabilities',
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
                        'enum' => ['2015-03-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/capabilitiesResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.HDInsight/clusters/{clusterName}/configurations/{configurationName}' => [
                'post' => [
                    'operationId' => 'Configurations_UpdateHTTPSettings',
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
                            'name' => 'configurationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['gateway']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/HttpConnectivitySettings'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-01-preview']
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
                    'operationId' => 'Configurations_Get',
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
                            'name' => 'configurationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => [
                                'gateway',
                                'core-site'
                            ]
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HttpConnectivitySettings']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.HDInsight/clusters/{clusterName}/extensions/{extensionName}' => [
                'put' => [
                    'operationId' => 'Extension_Create',
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
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Extension'
                        ],
                        [
                            'name' => 'extensionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['clustermonitoring']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'get' => [
                    'operationId' => 'Extension_Get',
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
                            'name' => 'extensionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['clustermonitoring']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Extension']]]
                ],
                'delete' => [
                    'operationId' => 'Extension_Delete',
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
                            'name' => 'extensionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['clustermonitoring']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-03-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.HDInsight/clusters/{clusterName}/scriptActions/{scriptName}' => ['delete' => [
                'operationId' => 'ScriptActions_Delete',
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
                        'name' => 'scriptName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-03-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.HDInsight/clusters/{clusterName}/scriptActions' => ['get' => [
                'operationId' => 'ScriptActions_List',
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
                        'enum' => ['2015-03-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ScriptActionsList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.HDInsight/clusters/{clusterName}/scriptExecutionHistory/{scriptExecutionId}' => ['get' => [
                'operationId' => 'ScriptExecutionHistory_Get',
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
                        'name' => 'scriptExecutionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-03-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RuntimeScriptActionDetail']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.HDInsight/clusters/{clusterName}/scriptExecutionHistory' => ['get' => [
                'operationId' => 'ScriptExecutionHistory_List',
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
                        'enum' => ['2015-03-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ScriptActionExecutionHistoryList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.HDInsight/clusters/{clusterName}/scriptExecutionHistory/{scriptExecutionId}/promote' => ['post' => [
                'operationId' => 'ScriptExecutionHistory_Promote',
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
                        'name' => 'scriptExecutionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-03-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/providers/Microsoft.HDInsight/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2015-03-01-preview']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]]
        ],
        'definitions' => [
            'HttpSettingsParameters' => ['properties' => [
                'restAuthCredential.isEnabled' => ['type' => 'string'],
                'restAuthCredential.username' => ['type' => 'string'],
                'restAuthCredential.password' => ['type' => 'string']
            ]],
            'ClusterDefinition' => ['properties' => [
                'blueprint' => ['type' => 'string'],
                'kind' => ['type' => 'string'],
                'componentVersion' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'configurations' => ['type' => 'object']
            ]],
            'SecurityProfile' => ['properties' => [
                'directoryType' => [
                    'type' => 'string',
                    'enum' => ['ActiveDirectory']
                ],
                'domain' => ['type' => 'string'],
                'organizationalUnitDN' => ['type' => 'string'],
                'ldapsUrls' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'domainUsername' => ['type' => 'string'],
                'domainUserPassword' => ['type' => 'string'],
                'clusterUsersGroupDNs' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'HardwareProfile' => ['properties' => ['vmSize' => ['type' => 'string']]],
            'VirtualNetworkProfile' => ['properties' => [
                'id' => ['type' => 'string'],
                'subnet' => ['type' => 'string']
            ]],
            'RdpSettings' => ['properties' => [
                'username' => ['type' => 'string'],
                'password' => ['type' => 'string'],
                'expiryDate' => [
                    'type' => 'string',
                    'format' => 'date'
                ]
            ]],
            'WindowsOperatingSystemProfile' => ['properties' => ['rdpSettings' => ['$ref' => '#/definitions/RdpSettings']]],
            'SshPublicKey' => ['properties' => ['certificateData' => ['type' => 'string']]],
            'SshProfile' => ['properties' => ['publicKeys' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/SshPublicKey']
            ]]],
            'LinuxOperatingSystemProfile' => ['properties' => [
                'username' => ['type' => 'string'],
                'password' => ['type' => 'string'],
                'sshProfile' => ['$ref' => '#/definitions/SshProfile']
            ]],
            'OsProfile' => ['properties' => [
                'windowsOperatingSystemProfile' => ['$ref' => '#/definitions/WindowsOperatingSystemProfile'],
                'linuxOperatingSystemProfile' => ['$ref' => '#/definitions/LinuxOperatingSystemProfile']
            ]],
            'ScriptAction' => ['properties' => [
                'name' => ['type' => 'string'],
                'uri' => ['type' => 'string'],
                'parameters' => ['type' => 'string']
            ]],
            'Role' => ['properties' => [
                'name' => ['type' => 'string'],
                'minInstanceCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'targetInstanceCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'hardwareProfile' => ['$ref' => '#/definitions/HardwareProfile'],
                'osProfile' => ['$ref' => '#/definitions/OsProfile'],
                'virtualNetworkProfile' => ['$ref' => '#/definitions/VirtualNetworkProfile'],
                'scriptActions' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ScriptAction']
                ]
            ]],
            'ComputeProfile' => ['properties' => ['roles' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Role']
            ]]],
            'StorageAccount' => ['properties' => [
                'name' => ['type' => 'string'],
                'isDefault' => ['type' => 'boolean'],
                'container' => ['type' => 'string'],
                'key' => ['type' => 'string']
            ]],
            'StorageProfile' => ['properties' => ['storageaccounts' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/StorageAccount']
            ]]],
            'ClusterCreateProperties' => ['properties' => [
                'clusterVersion' => ['type' => 'string'],
                'osType' => [
                    'type' => 'string',
                    'enum' => [
                        'Windows',
                        'Linux'
                    ]
                ],
                'tier' => [
                    'type' => 'string',
                    'enum' => [
                        'Standard',
                        'Premium'
                    ]
                ],
                'clusterDefinition' => ['$ref' => '#/definitions/ClusterDefinition'],
                'securityProfile' => ['$ref' => '#/definitions/SecurityProfile'],
                'computeProfile' => ['$ref' => '#/definitions/ComputeProfile'],
                'storageProfile' => ['$ref' => '#/definitions/StorageProfile']
            ]],
            'ClusterCreateParametersExtended' => ['properties' => [
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'properties' => ['$ref' => '#/definitions/ClusterCreateProperties']
            ]],
            'ClusterPatchParameters' => ['properties' => ['tags' => [
                'type' => 'object',
                'additionalProperties' => ['type' => 'string']
            ]]],
            'QuotaInfo' => ['properties' => ['coresUsed' => [
                'type' => 'integer',
                'format' => 'int32'
            ]]],
            'errors' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string']
            ]],
            'ConnectivityEndpoint' => ['properties' => [
                'name' => ['type' => 'string'],
                'protocol' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'port' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'ClusterGetProperties' => ['properties' => [
                'clusterVersion' => ['type' => 'string'],
                'osType' => [
                    'type' => 'string',
                    'enum' => [
                        'Windows',
                        'Linux'
                    ]
                ],
                'tier' => [
                    'type' => 'string',
                    'enum' => [
                        'Standard',
                        'Premium'
                    ]
                ],
                'clusterDefinition' => ['$ref' => '#/definitions/ClusterDefinition'],
                'securityProfile' => ['$ref' => '#/definitions/SecurityProfile'],
                'computeProfile' => ['$ref' => '#/definitions/ComputeProfile'],
                'provisioningState' => [
                    'type' => 'string',
                    'enum' => [
                        'InProgress',
                        'Failed',
                        'Succeeded',
                        'Canceled',
                        'Deleting'
                    ]
                ],
                'createdDate' => ['type' => 'string'],
                'clusterState' => ['type' => 'string'],
                'quotaInfo' => ['$ref' => '#/definitions/QuotaInfo'],
                'errors' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/errors']
                ],
                'connectivityEndpoints' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ConnectivityEndpoint']
                ]
            ]],
            'Cluster' => ['properties' => [
                'etag' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ClusterGetProperties']
            ]],
            'RuntimeScriptAction' => ['properties' => [
                'name' => ['type' => 'string'],
                'uri' => ['type' => 'string'],
                'parameters' => ['type' => 'string'],
                'roles' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'applicationName' => ['type' => 'string']
            ]],
            'ExecuteScriptActionParameters' => ['properties' => [
                'scriptActions' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RuntimeScriptAction']
                ],
                'persistOnSuccess' => ['type' => 'string']
            ]],
            'ClusterListPersistedScriptActionsResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RuntimeScriptAction']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ScriptActionExecutionSummary' => ['properties' => [
                'status' => ['type' => 'string'],
                'instanceCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'RuntimeScriptActionDetail' => ['properties' => [
                'scriptExecutionId' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'startTime' => ['type' => 'string'],
                'endTime' => ['type' => 'string'],
                'status' => ['type' => 'string'],
                'operation' => ['type' => 'string'],
                'executionSummary' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ScriptActionExecutionSummary']
                ],
                'debugInformation' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'uri' => ['type' => 'string'],
                'parameters' => ['type' => 'string'],
                'roles' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'applicationName' => ['type' => 'string']
            ]],
            'ClusterListRuntimeScriptActionDetailResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RuntimeScriptActionDetail']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ClusterListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Cluster']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ClusterResizeParameters' => ['properties' => ['targetInstanceCount' => [
                'type' => 'integer',
                'format' => 'int32'
            ]]],
            'OperationResource' => ['properties' => [
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'InProgress',
                        'Succeeded',
                        'Failed'
                    ]
                ],
                'error' => ['$ref' => '#/definitions/errors']
            ]],
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
            'SubResource' => ['properties' => ['id' => ['type' => 'string']]],
            'Operation_display' => ['properties' => [
                'provider' => ['type' => 'string'],
                'resource' => ['type' => 'string'],
                'operation' => ['type' => 'string']
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
            'ApplicationGetHttpsEndpoint' => [
                'properties' => [
                    'accessModes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'location' => ['type' => 'string'],
                    'destinationPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'publicPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ],
            'ApplicationGetEndpoint' => ['properties' => [
                'location' => ['type' => 'string'],
                'destinationPort' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'publicPort' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'ApplicationGetProperties' => ['properties' => [
                'computeProfile' => ['$ref' => '#/definitions/ComputeProfile'],
                'installScriptActions' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RuntimeScriptAction']
                ],
                'uninstallScriptActions' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RuntimeScriptAction']
                ],
                'httpsEndpoints' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ApplicationGetHttpsEndpoint']
                ],
                'sshEndpoints' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ApplicationGetEndpoint']
                ],
                'provisioningState' => ['type' => 'string'],
                'applicationType' => ['type' => 'string'],
                'applicationState' => ['type' => 'string'],
                'errors' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/errors']
                ],
                'createdDate' => ['type' => 'string'],
                'marketplaceIdentifier' => ['type' => 'string'],
                'additionalProperties' => ['type' => 'string']
            ]],
            'Application' => ['properties' => [
                'id' => ['$ref' => '#/definitions/SubResource'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'etag' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'properties' => ['$ref' => '#/definitions/ApplicationGetProperties']
            ]],
            'ApplicationListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Application']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'versionSpec' => ['properties' => [
                'friendlyName' => ['type' => 'string'],
                'displayName' => ['type' => 'string'],
                'isDefault' => ['type' => 'string'],
                'componentVersions' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'versionsCapability' => ['properties' => ['available' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/versionSpec']
            ]]],
            'regionsCapability' => ['properties' => ['available' => [
                'type' => 'array',
                'items' => ['type' => 'string']
            ]]],
            'vmSizesCapability' => ['properties' => ['available' => [
                'type' => 'array',
                'items' => ['type' => 'string']
            ]]],
            'vmSizeCompatibilityFilter' => ['properties' => [
                'FilterMode' => ['type' => 'string'],
                'Regions' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'ClusterFlavors' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'NodeTypes' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'ClusterVersions' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'vmsizes' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'regionalQuotaCapability' => ['properties' => [
                'region_name' => ['type' => 'string'],
                'cores_used' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'cores_available' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ]
            ]],
            'quotaCapability' => ['properties' => ['regionalQuotas' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/regionalQuotaCapability']
            ]]],
            'capabilitiesResult' => ['properties' => [
                'versions' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/versionsCapability']
                ],
                'regions' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/regionsCapability']
                ],
                'vmsizes' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/vmSizesCapability']
                ],
                'vmsize_filters' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/vmSizeCompatibilityFilter']
                ],
                'features' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'quota' => ['$ref' => '#/definitions/quotaCapability']
            ]],
            'RDPSettingsParameters' => ['properties' => ['osProfile' => ['$ref' => '#/definitions/OsProfile']]],
            'HttpConnectivitySettings' => ['properties' => [
                'restAuthCredential.isEnabled' => ['type' => 'string'],
                'restAuthCredential.username' => ['type' => 'string'],
                'restAuthCredential.password' => ['type' => 'string']
            ]],
            'Extension' => ['properties' => [
                'workspaceId' => ['type' => 'string'],
                'primaryKey' => ['type' => 'string']
            ]],
            'ScriptActionExecutionHistoryList' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RuntimeScriptActionDetail']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ScriptActionPersistedGetResponseSpec' => ['properties' => [
                'name' => ['type' => 'string'],
                'uri' => ['type' => 'string'],
                'parameters' => ['type' => 'string'],
                'roles' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'applicationName' => ['type' => 'string']
            ]],
            'ScriptActionsList' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RuntimeScriptActionDetail']
                ],
                'nextLink' => ['type' => 'string']
            ]]
        ]
    ];
}
