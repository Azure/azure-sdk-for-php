<?php
namespace Microsoft\Azure\Management\HdInsight;
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
        $this->_Clusters_group = new \Microsoft\Azure\Management\HdInsight\Clusters($_client);
        $this->_Applications_group = new \Microsoft\Azure\Management\HdInsight\Applications($_client);
        $this->_Location_group = new \Microsoft\Azure\Management\HdInsight\Location($_client);
        $this->_Configurations_group = new \Microsoft\Azure\Management\HdInsight\Configurations($_client);
        $this->_Extension_group = new \Microsoft\Azure\Management\HdInsight\Extension($_client);
        $this->_ScriptActions_group = new \Microsoft\Azure\Management\HdInsight\ScriptActions($_client);
        $this->_ScriptExecutionHistory_group = new \Microsoft\Azure\Management\HdInsight\ScriptExecutionHistory($_client);
        $this->_Operations_group = new \Microsoft\Azure\Management\HdInsight\Operations($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\Clusters
     */
    public function getClusters()
    {
        return $this->_Clusters_group;
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\Applications
     */
    public function getApplications()
    {
        return $this->_Applications_group;
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\Location
     */
    public function getLocation()
    {
        return $this->_Location_group;
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\Configurations
     */
    public function getConfigurations()
    {
        return $this->_Configurations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\Extension
     */
    public function getExtension()
    {
        return $this->_Extension_group;
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\ScriptActions
     */
    public function getScriptActions()
    {
        return $this->_ScriptActions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\ScriptExecutionHistory
     */
    public function getScriptExecutionHistory()
    {
        return $this->_ScriptExecutionHistory_group;
    }
    /**
     * @return \Microsoft\Azure\Management\HdInsight\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @var \Microsoft\Azure\Management\HdInsight\Clusters
     */
    private $_Clusters_group;
    /**
     * @var \Microsoft\Azure\Management\HdInsight\Applications
     */
    private $_Applications_group;
    /**
     * @var \Microsoft\Azure\Management\HdInsight\Location
     */
    private $_Location_group;
    /**
     * @var \Microsoft\Azure\Management\HdInsight\Configurations
     */
    private $_Configurations_group;
    /**
     * @var \Microsoft\Azure\Management\HdInsight\Extension
     */
    private $_Extension_group;
    /**
     * @var \Microsoft\Azure\Management\HdInsight\ScriptActions
     */
    private $_ScriptActions_group;
    /**
     * @var \Microsoft\Azure\Management\HdInsight\ScriptExecutionHistory
     */
    private $_ScriptExecutionHistory_group;
    /**
     * @var \Microsoft\Azure\Management\HdInsight\Operations
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
                            'schema' => ['$ref' => '#/definitions/ClusterCreateParametersExtended']
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
                            'schema' => ['$ref' => '#/definitions/ClusterPatchParameters']
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
                        'schema' => ['$ref' => '#/definitions/ClusterResizeParameters']
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
                        'schema' => ['$ref' => '#/definitions/RDPSettingsParameters']
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
                        'schema' => ['$ref' => '#/definitions/ExecuteScriptActionParameters']
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
                            'schema' => ['$ref' => '#/definitions/ApplicationGetProperties']
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
                            'schema' => ['$ref' => '#/definitions/HttpConnectivitySettings']
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
                            'schema' => ['$ref' => '#/definitions/Extension']
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
            'HttpSettingsParameters' => [
                'properties' => [
                    'restAuthCredential.isEnabled' => ['type' => 'string'],
                    'restAuthCredential.username' => ['type' => 'string'],
                    'restAuthCredential.password' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['restAuthCredential.isEnabled']
            ],
            'ClusterDefinition' => [
                'properties' => [
                    'blueprint' => ['type' => 'string'],
                    'kind' => ['type' => 'string'],
                    'componentVersion' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'configurations' => ['type' => 'object']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SecurityProfile' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'HardwareProfile' => [
                'properties' => ['vmSize' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VirtualNetworkProfile' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'subnet' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RdpSettings' => [
                'properties' => [
                    'username' => ['type' => 'string'],
                    'password' => ['type' => 'string'],
                    'expiryDate' => [
                        'type' => 'string',
                        'format' => 'date'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'WindowsOperatingSystemProfile' => [
                'properties' => ['rdpSettings' => ['$ref' => '#/definitions/RdpSettings']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SshPublicKey' => [
                'properties' => ['certificateData' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SshProfile' => [
                'properties' => ['publicKeys' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SshPublicKey']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LinuxOperatingSystemProfile' => [
                'properties' => [
                    'username' => ['type' => 'string'],
                    'password' => ['type' => 'string'],
                    'sshProfile' => ['$ref' => '#/definitions/SshProfile']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OsProfile' => [
                'properties' => [
                    'windowsOperatingSystemProfile' => ['$ref' => '#/definitions/WindowsOperatingSystemProfile'],
                    'linuxOperatingSystemProfile' => ['$ref' => '#/definitions/LinuxOperatingSystemProfile']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ScriptAction' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'uri' => ['type' => 'string'],
                    'parameters' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'uri',
                    'parameters'
                ]
            ],
            'Role' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ComputeProfile' => [
                'properties' => ['roles' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Role']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StorageAccount' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'isDefault' => ['type' => 'boolean'],
                    'container' => ['type' => 'string'],
                    'key' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StorageProfile' => [
                'properties' => ['storageaccounts' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/StorageAccount']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClusterCreateProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClusterCreateParametersExtended' => [
                'properties' => [
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'properties' => ['$ref' => '#/definitions/ClusterCreateProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClusterPatchParameters' => [
                'properties' => ['tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'QuotaInfo' => [
                'properties' => ['coresUsed' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'errors' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ConnectivityEndpoint' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'protocol' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'port' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClusterGetProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => ['clusterDefinition']
            ],
            'Cluster' => [
                'properties' => [
                    'etag' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/ClusterGetProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RuntimeScriptAction' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'uri' => ['type' => 'string'],
                    'parameters' => ['type' => 'string'],
                    'roles' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'applicationName' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'uri',
                    'roles'
                ]
            ],
            'ExecuteScriptActionParameters' => [
                'properties' => [
                    'scriptActions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RuntimeScriptAction']
                    ],
                    'persistOnSuccess' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['persistOnSuccess']
            ],
            'ClusterListPersistedScriptActionsResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RuntimeScriptAction']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ScriptActionExecutionSummary' => [
                'properties' => [
                    'status' => ['type' => 'string'],
                    'instanceCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RuntimeScriptActionDetail' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'uri',
                    'roles'
                ]
            ],
            'ClusterListRuntimeScriptActionDetailResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RuntimeScriptActionDetail']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClusterListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Cluster']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClusterResizeParameters' => [
                'properties' => ['targetInstanceCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationResource' => [
                'properties' => [
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'InProgress',
                            'Succeeded',
                            'Failed'
                        ]
                    ],
                    'error' => ['$ref' => '#/definitions/errors']
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
                'required' => ['location']
            ],
            'SubResource' => [
                'properties' => ['id' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Operation_display' => [
                'properties' => [
                    'provider' => ['type' => 'string'],
                    'resource' => ['type' => 'string'],
                    'operation' => ['type' => 'string']
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
                ],
                'required' => []
            ],
            'ApplicationGetEndpoint' => [
                'properties' => [
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
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationGetProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Application' => [
                'properties' => [
                    'id' => ['$ref' => '#/definitions/SubResource'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'etag' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'properties' => ['$ref' => '#/definitions/ApplicationGetProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplicationListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Application']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'versionSpec' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'displayName' => ['type' => 'string'],
                    'isDefault' => ['type' => 'string'],
                    'componentVersions' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'versionsCapability' => [
                'properties' => ['available' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/versionSpec']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'regionsCapability' => [
                'properties' => ['available' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'vmSizesCapability' => [
                'properties' => ['available' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'vmSizeCompatibilityFilter' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'regionalQuotaCapability' => [
                'properties' => [
                    'region_name' => ['type' => 'string'],
                    'cores_used' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'cores_available' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'quotaCapability' => [
                'properties' => ['regionalQuotas' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/regionalQuotaCapability']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'capabilitiesResult' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RDPSettingsParameters' => [
                'properties' => ['osProfile' => ['$ref' => '#/definitions/OsProfile']],
                'additionalProperties' => FALSE,
                'required' => ['osProfile']
            ],
            'HttpConnectivitySettings' => [
                'properties' => [
                    'restAuthCredential.isEnabled' => ['type' => 'string'],
                    'restAuthCredential.username' => ['type' => 'string'],
                    'restAuthCredential.password' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Extension' => [
                'properties' => [
                    'workspaceId' => ['type' => 'string'],
                    'primaryKey' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ScriptActionExecutionHistoryList' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RuntimeScriptActionDetail']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ScriptActionPersistedGetResponseSpec' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'uri' => ['type' => 'string'],
                    'parameters' => ['type' => 'string'],
                    'roles' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'applicationName' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ScriptActionsList' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RuntimeScriptActionDetail']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
