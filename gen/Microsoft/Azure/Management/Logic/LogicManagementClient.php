<?php
namespace Microsoft\Azure\Management\Logic;
final class LogicManagementClient
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
        $this->_Workflows_group = new \Microsoft\Azure\Management\Logic\Workflows($_client);
        $this->_WorkflowVersions_group = new \Microsoft\Azure\Management\Logic\WorkflowVersions($_client);
        $this->_WorkflowTriggers_group = new \Microsoft\Azure\Management\Logic\WorkflowTriggers($_client);
        $this->_WorkflowTriggerHistories_group = new \Microsoft\Azure\Management\Logic\WorkflowTriggerHistories($_client);
        $this->_WorkflowRuns_group = new \Microsoft\Azure\Management\Logic\WorkflowRuns($_client);
        $this->_WorkflowRunActions_group = new \Microsoft\Azure\Management\Logic\WorkflowRunActions($_client);
        $this->_IntegrationAccounts_group = new \Microsoft\Azure\Management\Logic\IntegrationAccounts($_client);
        $this->_Schemas_group = new \Microsoft\Azure\Management\Logic\Schemas($_client);
        $this->_Maps_group = new \Microsoft\Azure\Management\Logic\Maps($_client);
        $this->_Partners_group = new \Microsoft\Azure\Management\Logic\Partners($_client);
        $this->_Agreements_group = new \Microsoft\Azure\Management\Logic\Agreements($_client);
        $this->_Certificates_group = new \Microsoft\Azure\Management\Logic\Certificates($_client);
        $this->_Sessions_group = new \Microsoft\Azure\Management\Logic\Sessions($_client);
        $this->_ListOperations_operation = $_client->createOperation('ListOperations');
    }
    /**
     * @return \Microsoft\Azure\Management\Logic\Workflows
     */
    public function getWorkflows()
    {
        return $this->_Workflows_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Logic\WorkflowVersions
     */
    public function getWorkflowVersions()
    {
        return $this->_WorkflowVersions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Logic\WorkflowTriggers
     */
    public function getWorkflowTriggers()
    {
        return $this->_WorkflowTriggers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Logic\WorkflowTriggerHistories
     */
    public function getWorkflowTriggerHistories()
    {
        return $this->_WorkflowTriggerHistories_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Logic\WorkflowRuns
     */
    public function getWorkflowRuns()
    {
        return $this->_WorkflowRuns_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Logic\WorkflowRunActions
     */
    public function getWorkflowRunActions()
    {
        return $this->_WorkflowRunActions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Logic\IntegrationAccounts
     */
    public function getIntegrationAccounts()
    {
        return $this->_IntegrationAccounts_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Logic\Schemas
     */
    public function getSchemas()
    {
        return $this->_Schemas_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Logic\Maps
     */
    public function getMaps()
    {
        return $this->_Maps_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Logic\Partners
     */
    public function getPartners()
    {
        return $this->_Partners_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Logic\Agreements
     */
    public function getAgreements()
    {
        return $this->_Agreements_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Logic\Certificates
     */
    public function getCertificates()
    {
        return $this->_Certificates_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Logic\Sessions
     */
    public function getSessions()
    {
        return $this->_Sessions_group;
    }
    /**
     * Lists all of the available Logic REST API operations.
     * @return array
     */
    public function listOperations()
    {
        return $this->_ListOperations_operation->call([]);
    }
    /**
     * @var \Microsoft\Azure\Management\Logic\Workflows
     */
    private $_Workflows_group;
    /**
     * @var \Microsoft\Azure\Management\Logic\WorkflowVersions
     */
    private $_WorkflowVersions_group;
    /**
     * @var \Microsoft\Azure\Management\Logic\WorkflowTriggers
     */
    private $_WorkflowTriggers_group;
    /**
     * @var \Microsoft\Azure\Management\Logic\WorkflowTriggerHistories
     */
    private $_WorkflowTriggerHistories_group;
    /**
     * @var \Microsoft\Azure\Management\Logic\WorkflowRuns
     */
    private $_WorkflowRuns_group;
    /**
     * @var \Microsoft\Azure\Management\Logic\WorkflowRunActions
     */
    private $_WorkflowRunActions_group;
    /**
     * @var \Microsoft\Azure\Management\Logic\IntegrationAccounts
     */
    private $_IntegrationAccounts_group;
    /**
     * @var \Microsoft\Azure\Management\Logic\Schemas
     */
    private $_Schemas_group;
    /**
     * @var \Microsoft\Azure\Management\Logic\Maps
     */
    private $_Maps_group;
    /**
     * @var \Microsoft\Azure\Management\Logic\Partners
     */
    private $_Partners_group;
    /**
     * @var \Microsoft\Azure\Management\Logic\Agreements
     */
    private $_Agreements_group;
    /**
     * @var \Microsoft\Azure\Management\Logic\Certificates
     */
    private $_Certificates_group;
    /**
     * @var \Microsoft\Azure\Management\Logic\Sessions
     */
    private $_Sessions_group;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListOperations_operation;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/providers/Microsoft.Logic/workflows' => ['get' => [
                'operationId' => 'Workflows_ListBySubscription',
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
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkflowListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows' => ['get' => [
                'operationId' => 'Workflows_ListByResourceGroup',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkflowListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}' => [
                'get' => [
                    'operationId' => 'Workflows_Get',
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
                            'name' => 'workflowName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Workflow']]]
                ],
                'put' => [
                    'operationId' => 'Workflows_CreateOrUpdate',
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
                            'name' => 'workflowName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'workflow',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Workflow'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Workflow']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Workflow']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Workflows_Update',
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
                            'name' => 'workflowName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'workflow',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Workflow'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Workflow']]]
                ],
                'delete' => [
                    'operationId' => 'Workflows_Delete',
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
                            'name' => 'workflowName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/disable' => ['post' => [
                'operationId' => 'Workflows_Disable',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/enable' => ['post' => [
                'operationId' => 'Workflows_Enable',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/generateUpgradedDefinition' => ['post' => [
                'operationId' => 'Workflows_GenerateUpgradedDefinition',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/GenerateUpgradedDefinitionParameters'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'object']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/listSwagger' => ['post' => [
                'operationId' => 'Workflows_ListSwagger',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'object']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/regenerateAccessKey' => ['post' => [
                'operationId' => 'Workflows_RegenerateAccessKey',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'keyType',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/RegenerateActionParameter'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/locations/{location}/workflows/{workflowName}/validate' => ['post' => [
                'operationId' => 'Workflows_Validate',
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
                        'name' => 'location',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => 'workflow',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/Workflow'
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/versions' => ['get' => [
                'operationId' => 'WorkflowVersions_List',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkflowVersionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/versions/{versionId}' => ['get' => [
                'operationId' => 'WorkflowVersions_Get',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'versionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkflowVersion']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/versions/{versionId}/triggers/{triggerName}/listCallbackUrl' => ['post' => [
                'operationId' => 'WorkflowVersions_ListCallbackUrl',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'versionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'triggerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => FALSE,
                        '$ref' => '#/definitions/GetCallbackUrlParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkflowTriggerCallbackUrl']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/triggers/' => ['get' => [
                'operationId' => 'WorkflowTriggers_List',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkflowTriggerListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/triggers/{triggerName}' => ['get' => [
                'operationId' => 'WorkflowTriggers_Get',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'triggerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkflowTrigger']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/triggers/{triggerName}/run' => ['post' => [
                'operationId' => 'WorkflowTriggers_Run',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'triggerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => []
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/triggers/{triggerName}/listCallbackUrl' => ['post' => [
                'operationId' => 'WorkflowTriggers_ListCallbackUrl',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'triggerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkflowTriggerCallbackUrl']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/triggers/{triggerName}/histories' => ['get' => [
                'operationId' => 'WorkflowTriggerHistories_List',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'triggerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkflowTriggerHistoryListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/triggers/{triggerName}/histories/{historyName}' => ['get' => [
                'operationId' => 'WorkflowTriggerHistories_Get',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'triggerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'historyName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkflowTriggerHistory']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/triggers/{triggerName}/histories/{historyName}/resubmit' => ['post' => [
                'operationId' => 'WorkflowTriggerHistories_Resubmit',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'triggerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'historyName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => ['202' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/runs' => ['get' => [
                'operationId' => 'WorkflowRuns_List',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkflowRunListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/runs/{runName}' => ['get' => [
                'operationId' => 'WorkflowRuns_Get',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'runName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkflowRun']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/runs/{runName}/cancel' => ['post' => [
                'operationId' => 'WorkflowRuns_Cancel',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'runName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/runs/{runName}/actions' => ['get' => [
                'operationId' => 'WorkflowRunActions_List',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'runName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkflowRunActionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/workflows/{workflowName}/runs/{runName}/actions/{actionName}' => ['get' => [
                'operationId' => 'WorkflowRunActions_Get',
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
                        'name' => 'workflowName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'runName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'actionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkflowRunAction']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Logic/integrationAccounts' => ['get' => [
                'operationId' => 'IntegrationAccounts_ListBySubscription',
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
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts' => ['get' => [
                'operationId' => 'IntegrationAccounts_ListByResourceGroup',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}' => [
                'get' => [
                    'operationId' => 'IntegrationAccounts_Get',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccount']]]
                ],
                'put' => [
                    'operationId' => 'IntegrationAccounts_CreateOrUpdate',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'integrationAccount',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/IntegrationAccount'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccount']],
                        '201' => ['schema' => ['$ref' => '#/definitions/IntegrationAccount']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'IntegrationAccounts_Update',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'integrationAccount',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/IntegrationAccount'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccount']]]
                ],
                'delete' => [
                    'operationId' => 'IntegrationAccounts_Delete',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/listCallbackUrl' => ['post' => [
                'operationId' => 'IntegrationAccounts_GetCallbackUrl',
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
                        'name' => 'integrationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/GetCallbackUrlParameters'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CallbackUrl']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/schemas' => ['get' => [
                'operationId' => 'Schemas_ListByIntegrationAccounts',
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
                        'name' => 'integrationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountSchemaListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/schemas/{schemaName}' => [
                'get' => [
                    'operationId' => 'Schemas_Get',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'schemaName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountSchema']]]
                ],
                'put' => [
                    'operationId' => 'Schemas_CreateOrUpdate',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'schemaName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'schema',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/IntegrationAccountSchema'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountSchema']],
                        '201' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountSchema']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Schemas_Delete',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'schemaName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/maps' => ['get' => [
                'operationId' => 'Maps_ListByIntegrationAccounts',
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
                        'name' => 'integrationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountMapListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/maps/{mapName}' => [
                'get' => [
                    'operationId' => 'Maps_Get',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'mapName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountMap']]]
                ],
                'put' => [
                    'operationId' => 'Maps_CreateOrUpdate',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'mapName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'map',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/IntegrationAccountMap'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountMap']],
                        '201' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountMap']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Maps_Delete',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'mapName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/partners' => ['get' => [
                'operationId' => 'Partners_ListByIntegrationAccounts',
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
                        'name' => 'integrationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountPartnerListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/partners/{partnerName}' => [
                'get' => [
                    'operationId' => 'Partners_Get',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'partnerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountPartner']]]
                ],
                'put' => [
                    'operationId' => 'Partners_CreateOrUpdate',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'partnerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'partner',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/IntegrationAccountPartner'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountPartner']],
                        '201' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountPartner']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Partners_Delete',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'partnerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/agreements' => ['get' => [
                'operationId' => 'Agreements_ListByIntegrationAccounts',
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
                        'name' => 'integrationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountAgreementListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/agreements/{agreementName}' => [
                'get' => [
                    'operationId' => 'Agreements_Get',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'agreementName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountAgreement']]]
                ],
                'put' => [
                    'operationId' => 'Agreements_CreateOrUpdate',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'agreementName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'agreement',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/IntegrationAccountAgreement'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountAgreement']],
                        '201' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountAgreement']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Agreements_Delete',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'agreementName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/certificates' => ['get' => [
                'operationId' => 'Certificates_ListByIntegrationAccounts',
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
                        'name' => 'integrationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountCertificateListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/certificates/{certificateName}' => [
                'get' => [
                    'operationId' => 'Certificates_Get',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountCertificate']]]
                ],
                'put' => [
                    'operationId' => 'Certificates_CreateOrUpdate',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'certificate',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/IntegrationAccountCertificate'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountCertificate']],
                        '201' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountCertificate']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Certificates_Delete',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'certificateName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/sessions' => ['get' => [
                'operationId' => 'Sessions_ListByIntegrationAccounts',
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
                        'name' => 'integrationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountSessionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Logic/integrationAccounts/{integrationAccountName}/sessions/{sessionName}' => [
                'get' => [
                    'operationId' => 'Sessions_Get',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'sessionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountSession']]]
                ],
                'put' => [
                    'operationId' => 'Sessions_CreateOrUpdate',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'sessionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'session',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/IntegrationAccountSession'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountSession']],
                        '201' => ['schema' => ['$ref' => '#/definitions/IntegrationAccountSession']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Sessions_Delete',
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
                            'name' => 'integrationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'sessionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/providers/Microsoft.Logic/operations' => ['get' => [
                'operationId' => 'ListOperations',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2016-06-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
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
            'SubResource' => ['properties' => ['id' => ['type' => 'string']]],
            'ResourceReference' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'Sku' => ['properties' => [
                'name' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Free',
                        'Shared',
                        'Basic',
                        'Standard',
                        'Premium'
                    ]
                ],
                'plan' => ['$ref' => '#/definitions/ResourceReference']
            ]],
            'WorkflowParameter' => ['properties' => [
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'String',
                        'SecureString',
                        'Int',
                        'Float',
                        'Bool',
                        'Array',
                        'Object',
                        'SecureObject'
                    ]
                ],
                'value' => ['type' => 'object'],
                'metadata' => ['type' => 'object'],
                'description' => ['type' => 'string']
            ]],
            'WorkflowProperties' => ['properties' => [
                'provisioningState' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Accepted',
                        'Running',
                        'Ready',
                        'Creating',
                        'Created',
                        'Deleting',
                        'Deleted',
                        'Canceled',
                        'Failed',
                        'Succeeded',
                        'Moving',
                        'Updating',
                        'Registering',
                        'Registered',
                        'Unregistering',
                        'Unregistered',
                        'Completed'
                    ]
                ],
                'createdTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'changedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Completed',
                        'Enabled',
                        'Disabled',
                        'Deleted',
                        'Suspended'
                    ]
                ],
                'version' => ['type' => 'string'],
                'accessEndpoint' => ['type' => 'string'],
                'sku' => ['$ref' => '#/definitions/Sku'],
                'integrationAccount' => ['$ref' => '#/definitions/ResourceReference'],
                'definition' => ['type' => 'object'],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/WorkflowParameter']
                ]
            ]],
            'Workflow' => ['properties' => ['properties' => ['$ref' => '#/definitions/WorkflowProperties']]],
            'WorkflowFilter' => ['properties' => ['state' => [
                'type' => 'string',
                'enum' => [
                    'NotSpecified',
                    'Completed',
                    'Enabled',
                    'Disabled',
                    'Deleted',
                    'Suspended'
                ]
            ]]],
            'WorkflowListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Workflow']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'WorkflowVersionProperties' => ['properties' => [
                'createdTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'changedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Completed',
                        'Enabled',
                        'Disabled',
                        'Deleted',
                        'Suspended'
                    ]
                ],
                'version' => ['type' => 'string'],
                'accessEndpoint' => ['type' => 'string'],
                'sku' => ['$ref' => '#/definitions/Sku'],
                'integrationAccount' => ['$ref' => '#/definitions/ResourceReference'],
                'definition' => ['type' => 'object'],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/WorkflowParameter']
                ]
            ]],
            'WorkflowVersion' => ['properties' => ['properties' => ['$ref' => '#/definitions/WorkflowVersionProperties']]],
            'WorkflowVersionListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/WorkflowVersion']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'RecurrenceScheduleOccurrence' => ['properties' => [
                'day' => [
                    'type' => 'string',
                    'enum' => [
                        'Sunday',
                        'Monday',
                        'Tuesday',
                        'Wednesday',
                        'Thursday',
                        'Friday',
                        'Saturday'
                    ]
                ],
                'occurrence' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'RecurrenceSchedule' => ['properties' => [
                'minutes' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'hours' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'weekDays' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'Sunday',
                            'Monday',
                            'Tuesday',
                            'Wednesday',
                            'Thursday',
                            'Friday',
                            'Saturday'
                        ]
                    ]
                ],
                'monthDays' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'monthlyOccurrences' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RecurrenceScheduleOccurrence']
                ]
            ]],
            'WorkflowTriggerRecurrence' => ['properties' => [
                'frequency' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Second',
                        'Minute',
                        'Hour',
                        'Day',
                        'Week',
                        'Month',
                        'Year'
                    ]
                ],
                'interval' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'timeZone' => ['type' => 'string'],
                'schedule' => ['$ref' => '#/definitions/RecurrenceSchedule']
            ]],
            'WorkflowTriggerProperties' => ['properties' => [
                'provisioningState' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Accepted',
                        'Running',
                        'Ready',
                        'Creating',
                        'Created',
                        'Deleting',
                        'Deleted',
                        'Canceled',
                        'Failed',
                        'Succeeded',
                        'Moving',
                        'Updating',
                        'Registering',
                        'Registered',
                        'Unregistering',
                        'Unregistered',
                        'Completed'
                    ]
                ],
                'createdTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'changedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Completed',
                        'Enabled',
                        'Disabled',
                        'Deleted',
                        'Suspended'
                    ]
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Paused',
                        'Running',
                        'Waiting',
                        'Succeeded',
                        'Skipped',
                        'Suspended',
                        'Cancelled',
                        'Failed',
                        'Faulted',
                        'TimedOut',
                        'Aborted',
                        'Ignored'
                    ]
                ],
                'lastExecutionTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'nextExecutionTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'recurrence' => ['$ref' => '#/definitions/WorkflowTriggerRecurrence'],
                'workflow' => ['$ref' => '#/definitions/ResourceReference']
            ]],
            'WorkflowTrigger' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/WorkflowTriggerProperties'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'WorkflowTriggerFilter' => ['properties' => ['state' => [
                'type' => 'string',
                'enum' => [
                    'NotSpecified',
                    'Completed',
                    'Enabled',
                    'Disabled',
                    'Deleted',
                    'Suspended'
                ]
            ]]],
            'WorkflowTriggerListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/WorkflowTrigger']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'WorkflowTriggerListCallbackUrlQueries' => ['properties' => [
                'api-version' => ['type' => 'string'],
                'sp' => ['type' => 'string'],
                'sv' => ['type' => 'string'],
                'sig' => ['type' => 'string']
            ]],
            'WorkflowTriggerCallbackUrl' => ['properties' => [
                'value' => ['type' => 'string'],
                'method' => ['type' => 'string'],
                'basePath' => ['type' => 'string'],
                'relativePath' => ['type' => 'string'],
                'relativePathParameters' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'queries' => ['$ref' => '#/definitions/WorkflowTriggerListCallbackUrlQueries']
            ]],
            'Correlation' => ['properties' => ['clientTrackingId' => ['type' => 'string']]],
            'ContentHash' => ['properties' => [
                'algorithm' => ['type' => 'string'],
                'value' => ['type' => 'string']
            ]],
            'ContentLink' => ['properties' => [
                'uri' => ['type' => 'string'],
                'contentVersion' => ['type' => 'string'],
                'contentSize' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'contentHash' => ['$ref' => '#/definitions/ContentHash'],
                'metadata' => ['type' => 'object']
            ]],
            'WorkflowTriggerHistoryProperties' => ['properties' => [
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Paused',
                        'Running',
                        'Waiting',
                        'Succeeded',
                        'Skipped',
                        'Suspended',
                        'Cancelled',
                        'Failed',
                        'Faulted',
                        'TimedOut',
                        'Aborted',
                        'Ignored'
                    ]
                ],
                'code' => ['type' => 'string'],
                'error' => ['type' => 'object'],
                'trackingId' => ['type' => 'string'],
                'correlation' => ['$ref' => '#/definitions/Correlation'],
                'inputsLink' => ['$ref' => '#/definitions/ContentLink'],
                'outputsLink' => ['$ref' => '#/definitions/ContentLink'],
                'fired' => ['type' => 'boolean'],
                'run' => ['$ref' => '#/definitions/ResourceReference']
            ]],
            'WorkflowTriggerHistory' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/WorkflowTriggerHistoryProperties'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'WorkflowTriggerHistoryListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/WorkflowTriggerHistory']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'WorkflowTriggerHistoryFilter' => ['properties' => ['status' => [
                'type' => 'string',
                'enum' => [
                    'NotSpecified',
                    'Paused',
                    'Running',
                    'Waiting',
                    'Succeeded',
                    'Skipped',
                    'Suspended',
                    'Cancelled',
                    'Failed',
                    'Faulted',
                    'TimedOut',
                    'Aborted',
                    'Ignored'
                ]
            ]]],
            'WorkflowRunTrigger' => ['properties' => [
                'name' => ['type' => 'string'],
                'inputs' => ['type' => 'object'],
                'inputsLink' => ['$ref' => '#/definitions/ContentLink'],
                'outputs' => ['type' => 'object'],
                'outputsLink' => ['$ref' => '#/definitions/ContentLink'],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'trackingId' => ['type' => 'string'],
                'correlation' => ['$ref' => '#/definitions/Correlation'],
                'code' => ['type' => 'string'],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Paused',
                        'Running',
                        'Waiting',
                        'Succeeded',
                        'Skipped',
                        'Suspended',
                        'Cancelled',
                        'Failed',
                        'Faulted',
                        'TimedOut',
                        'Aborted',
                        'Ignored'
                    ]
                ],
                'error' => ['type' => 'object'],
                'trackedProperties' => ['type' => 'object']
            ]],
            'WorkflowOutputParameter' => ['properties' => ['error' => ['type' => 'object']]],
            'WorkflowRunProperties' => ['properties' => [
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Paused',
                        'Running',
                        'Waiting',
                        'Succeeded',
                        'Skipped',
                        'Suspended',
                        'Cancelled',
                        'Failed',
                        'Faulted',
                        'TimedOut',
                        'Aborted',
                        'Ignored'
                    ]
                ],
                'code' => ['type' => 'string'],
                'error' => ['type' => 'object'],
                'correlationId' => ['type' => 'string'],
                'correlation' => ['$ref' => '#/definitions/Correlation'],
                'workflow' => ['$ref' => '#/definitions/ResourceReference'],
                'trigger' => ['$ref' => '#/definitions/WorkflowRunTrigger'],
                'outputs' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/WorkflowOutputParameter']
                ],
                'response' => ['$ref' => '#/definitions/WorkflowRunTrigger']
            ]],
            'WorkflowRun' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/WorkflowRunProperties'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'WorkflowRunFilter' => ['properties' => ['status' => [
                'type' => 'string',
                'enum' => [
                    'NotSpecified',
                    'Paused',
                    'Running',
                    'Waiting',
                    'Succeeded',
                    'Skipped',
                    'Suspended',
                    'Cancelled',
                    'Failed',
                    'Faulted',
                    'TimedOut',
                    'Aborted',
                    'Ignored'
                ]
            ]]],
            'WorkflowRunListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/WorkflowRun']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ErrorProperties' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string']
            ]],
            'ErrorResponse' => ['properties' => ['error' => ['$ref' => '#/definitions/ErrorProperties']]],
            'RetryHistory' => ['properties' => [
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'code' => ['type' => 'string'],
                'clientRequestId' => ['type' => 'string'],
                'serviceRequestId' => ['type' => 'string'],
                'error' => ['$ref' => '#/definitions/ErrorResponse']
            ]],
            'WorkflowRunActionProperties' => ['properties' => [
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Paused',
                        'Running',
                        'Waiting',
                        'Succeeded',
                        'Skipped',
                        'Suspended',
                        'Cancelled',
                        'Failed',
                        'Faulted',
                        'TimedOut',
                        'Aborted',
                        'Ignored'
                    ]
                ],
                'code' => ['type' => 'string'],
                'error' => ['type' => 'object'],
                'trackingId' => ['type' => 'string'],
                'correlation' => ['$ref' => '#/definitions/Correlation'],
                'inputsLink' => ['$ref' => '#/definitions/ContentLink'],
                'outputsLink' => ['$ref' => '#/definitions/ContentLink'],
                'trackedProperties' => ['type' => 'object'],
                'retryHistory' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RetryHistory']
                ]
            ]],
            'WorkflowRunAction' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/WorkflowRunActionProperties'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'WorkflowRunActionFilter' => ['properties' => ['status' => [
                'type' => 'string',
                'enum' => [
                    'NotSpecified',
                    'Paused',
                    'Running',
                    'Waiting',
                    'Succeeded',
                    'Skipped',
                    'Suspended',
                    'Cancelled',
                    'Failed',
                    'Faulted',
                    'TimedOut',
                    'Aborted',
                    'Ignored'
                ]
            ]]],
            'WorkflowRunActionListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/WorkflowRunAction']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'RegenerateActionParameter' => ['properties' => ['keyType' => [
                'type' => 'string',
                'enum' => [
                    'NotSpecified',
                    'Primary',
                    'Secondary'
                ]
            ]]],
            'GenerateUpgradedDefinitionParameters' => ['properties' => ['targetSchemaVersion' => ['type' => 'string']]],
            'IntegrationAccountSku' => ['properties' => ['name' => [
                'type' => 'string',
                'enum' => [
                    'NotSpecified',
                    'Free',
                    'Standard'
                ]
            ]]],
            'IntegrationAccount' => ['properties' => [
                'properties' => ['type' => 'object'],
                'sku' => ['$ref' => '#/definitions/IntegrationAccountSku']
            ]],
            'IntegrationAccountListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/IntegrationAccount']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'GetCallbackUrlParameters' => ['properties' => [
                'notAfter' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'keyType' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Primary',
                        'Secondary'
                    ]
                ]
            ]],
            'CallbackUrl' => ['properties' => ['value' => ['type' => 'string']]],
            'IntegrationAccountSchemaProperties' => ['properties' => [
                'schemaType' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Xml'
                    ]
                ],
                'targetNamespace' => ['type' => 'string'],
                'documentName' => ['type' => 'string'],
                'fileName' => ['type' => 'string'],
                'createdTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'changedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'metadata' => ['type' => 'object'],
                'content' => ['type' => 'string'],
                'contentType' => ['type' => 'string'],
                'contentLink' => ['$ref' => '#/definitions/ContentLink']
            ]],
            'IntegrationAccountSchema' => ['properties' => ['properties' => ['$ref' => '#/definitions/IntegrationAccountSchemaProperties']]],
            'IntegrationAccountSchemaListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/IntegrationAccountSchema']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'IntegrationAccountSchemaFilter' => ['properties' => ['schemaType' => [
                'type' => 'string',
                'enum' => [
                    'NotSpecified',
                    'Xml'
                ]
            ]]],
            'IntegrationAccountMapProperties_parametersSchema' => ['properties' => ['ref' => ['type' => 'string']]],
            'IntegrationAccountMapProperties' => ['properties' => [
                'mapType' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Xslt'
                    ]
                ],
                'parametersSchema' => ['$ref' => '#/definitions/IntegrationAccountMapProperties_parametersSchema'],
                'createdTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'changedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'content' => ['type' => 'string'],
                'contentType' => ['type' => 'string'],
                'contentLink' => ['$ref' => '#/definitions/ContentLink'],
                'metadata' => ['type' => 'object']
            ]],
            'IntegrationAccountMap' => ['properties' => ['properties' => ['$ref' => '#/definitions/IntegrationAccountMapProperties']]],
            'IntegrationAccountMapListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/IntegrationAccountMap']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'IntegrationAccountMapFilter' => ['properties' => ['mapType' => [
                'type' => 'string',
                'enum' => [
                    'NotSpecified',
                    'Xslt'
                ]
            ]]],
            'BusinessIdentity' => ['properties' => [
                'qualifier' => ['type' => 'string'],
                'value' => ['type' => 'string']
            ]],
            'B2BPartnerContent' => ['properties' => ['businessIdentities' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/BusinessIdentity']
            ]]],
            'PartnerContent' => ['properties' => ['b2b' => ['$ref' => '#/definitions/B2BPartnerContent']]],
            'IntegrationAccountPartnerProperties' => ['properties' => [
                'partnerType' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'B2B'
                    ]
                ],
                'createdTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'changedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'metadata' => ['type' => 'object'],
                'content' => ['$ref' => '#/definitions/PartnerContent']
            ]],
            'IntegrationAccountPartner' => ['properties' => ['properties' => ['$ref' => '#/definitions/IntegrationAccountPartnerProperties']]],
            'IntegrationAccountPartnerListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/IntegrationAccountPartner']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'IntegrationAccountPartnerFilter' => ['properties' => ['partnerType' => [
                'type' => 'string',
                'enum' => [
                    'NotSpecified',
                    'B2B'
                ]
            ]]],
            'AS2MessageConnectionSettings' => ['properties' => [
                'ignoreCertificateNameMismatch' => ['type' => 'boolean'],
                'supportHttpStatusCodeContinue' => ['type' => 'boolean'],
                'keepHttpConnectionAlive' => ['type' => 'boolean'],
                'unfoldHttpHeaders' => ['type' => 'boolean']
            ]],
            'AS2AcknowledgementConnectionSettings' => ['properties' => [
                'ignoreCertificateNameMismatch' => ['type' => 'boolean'],
                'supportHttpStatusCodeContinue' => ['type' => 'boolean'],
                'keepHttpConnectionAlive' => ['type' => 'boolean'],
                'unfoldHttpHeaders' => ['type' => 'boolean']
            ]],
            'AS2MdnSettings' => ['properties' => [
                'needMdn' => ['type' => 'boolean'],
                'signMdn' => ['type' => 'boolean'],
                'sendMdnAsynchronously' => ['type' => 'boolean'],
                'receiptDeliveryUrl' => ['type' => 'string'],
                'dispositionNotificationTo' => ['type' => 'string'],
                'signOutboundMdnIfOptional' => ['type' => 'boolean'],
                'mdnText' => ['type' => 'string'],
                'sendInboundMdnToMessageBox' => ['type' => 'boolean'],
                'micHashingAlgorithm' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'None',
                        'MD5',
                        'SHA1',
                        'SHA2256',
                        'SHA2384',
                        'SHA2512'
                    ]
                ]
            ]],
            'AS2SecuritySettings' => ['properties' => [
                'overrideGroupSigningCertificate' => ['type' => 'boolean'],
                'signingCertificateName' => ['type' => 'string'],
                'encryptionCertificateName' => ['type' => 'string'],
                'enableNrrForInboundEncodedMessages' => ['type' => 'boolean'],
                'enableNrrForInboundDecodedMessages' => ['type' => 'boolean'],
                'enableNrrForOutboundMdn' => ['type' => 'boolean'],
                'enableNrrForOutboundEncodedMessages' => ['type' => 'boolean'],
                'enableNrrForOutboundDecodedMessages' => ['type' => 'boolean'],
                'enableNrrForInboundMdn' => ['type' => 'boolean'],
                'sha2AlgorithmFormat' => ['type' => 'string']
            ]],
            'AS2ValidationSettings' => ['properties' => [
                'overrideMessageProperties' => ['type' => 'boolean'],
                'encryptMessage' => ['type' => 'boolean'],
                'signMessage' => ['type' => 'boolean'],
                'compressMessage' => ['type' => 'boolean'],
                'checkDuplicateMessage' => ['type' => 'boolean'],
                'interchangeDuplicatesValidityDays' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'checkCertificateRevocationListOnSend' => ['type' => 'boolean'],
                'checkCertificateRevocationListOnReceive' => ['type' => 'boolean'],
                'encryptionAlgorithm' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'None',
                        'DES3',
                        'RC2',
                        'AES128',
                        'AES192',
                        'AES256'
                    ]
                ],
                'signingAlgorithm' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Default',
                        'SHA1',
                        'SHA2256',
                        'SHA2384',
                        'SHA2512'
                    ]
                ]
            ]],
            'AS2EnvelopeSettings' => ['properties' => [
                'messageContentType' => ['type' => 'string'],
                'transmitFileNameInMimeHeader' => ['type' => 'boolean'],
                'fileNameTemplate' => ['type' => 'string'],
                'suspendMessageOnFileNameGenerationError' => ['type' => 'boolean'],
                'autogenerateFileName' => ['type' => 'boolean']
            ]],
            'AS2ErrorSettings' => ['properties' => [
                'suspendDuplicateMessage' => ['type' => 'boolean'],
                'resendIfMdnNotReceived' => ['type' => 'boolean']
            ]],
            'AS2ProtocolSettings' => ['properties' => [
                'messageConnectionSettings' => ['$ref' => '#/definitions/AS2MessageConnectionSettings'],
                'acknowledgementConnectionSettings' => ['$ref' => '#/definitions/AS2AcknowledgementConnectionSettings'],
                'mdnSettings' => ['$ref' => '#/definitions/AS2MdnSettings'],
                'securitySettings' => ['$ref' => '#/definitions/AS2SecuritySettings'],
                'validationSettings' => ['$ref' => '#/definitions/AS2ValidationSettings'],
                'envelopeSettings' => ['$ref' => '#/definitions/AS2EnvelopeSettings'],
                'errorSettings' => ['$ref' => '#/definitions/AS2ErrorSettings']
            ]],
            'AS2OneWayAgreement' => ['properties' => [
                'senderBusinessIdentity' => ['$ref' => '#/definitions/BusinessIdentity'],
                'receiverBusinessIdentity' => ['$ref' => '#/definitions/BusinessIdentity'],
                'protocolSettings' => ['$ref' => '#/definitions/AS2ProtocolSettings']
            ]],
            'AS2AgreementContent' => ['properties' => [
                'receiveAgreement' => ['$ref' => '#/definitions/AS2OneWayAgreement'],
                'sendAgreement' => ['$ref' => '#/definitions/AS2OneWayAgreement']
            ]],
            'X12ValidationSettings' => ['properties' => [
                'validateCharacterSet' => ['type' => 'boolean'],
                'checkDuplicateInterchangeControlNumber' => ['type' => 'boolean'],
                'interchangeControlNumberValidityDays' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'checkDuplicateGroupControlNumber' => ['type' => 'boolean'],
                'checkDuplicateTransactionSetControlNumber' => ['type' => 'boolean'],
                'validateEdiTypes' => ['type' => 'boolean'],
                'validateXsdTypes' => ['type' => 'boolean'],
                'allowLeadingAndTrailingSpacesAndZeroes' => ['type' => 'boolean'],
                'trimLeadingAndTrailingSpacesAndZeroes' => ['type' => 'boolean'],
                'trailingSeparatorPolicy' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'NotAllowed',
                        'Optional',
                        'Mandatory'
                    ]
                ]
            ]],
            'X12FramingSettings' => ['properties' => [
                'dataElementSeparator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'componentSeparator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'replaceSeparatorsInPayload' => ['type' => 'boolean'],
                'replaceCharacter' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'segmentTerminator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'characterSet' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Basic',
                        'Extended',
                        'UTF8'
                    ]
                ],
                'segmentTerminatorSuffix' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'None',
                        'CR',
                        'LF',
                        'CRLF'
                    ]
                ]
            ]],
            'X12EnvelopeSettings' => ['properties' => [
                'controlStandardsId' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'useControlStandardsIdAsRepetitionCharacter' => ['type' => 'boolean'],
                'senderApplicationId' => ['type' => 'string'],
                'receiverApplicationId' => ['type' => 'string'],
                'controlVersionNumber' => ['type' => 'string'],
                'interchangeControlNumberLowerBound' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'interchangeControlNumberUpperBound' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'rolloverInterchangeControlNumber' => ['type' => 'boolean'],
                'enableDefaultGroupHeaders' => ['type' => 'boolean'],
                'functionalGroupId' => ['type' => 'string'],
                'groupControlNumberLowerBound' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'groupControlNumberUpperBound' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'rolloverGroupControlNumber' => ['type' => 'boolean'],
                'groupHeaderAgencyCode' => ['type' => 'string'],
                'groupHeaderVersion' => ['type' => 'string'],
                'transactionSetControlNumberLowerBound' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'transactionSetControlNumberUpperBound' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'rolloverTransactionSetControlNumber' => ['type' => 'boolean'],
                'transactionSetControlNumberPrefix' => ['type' => 'string'],
                'transactionSetControlNumberSuffix' => ['type' => 'string'],
                'overwriteExistingTransactionSetControlNumber' => ['type' => 'boolean'],
                'groupHeaderDateFormat' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'CCYYMMDD',
                        'YYMMDD'
                    ]
                ],
                'groupHeaderTimeFormat' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'HHMM',
                        'HHMMSS',
                        'HHMMSSdd',
                        'HHMMSSd'
                    ]
                ],
                'usageIndicator' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Test',
                        'Information',
                        'Production'
                    ]
                ]
            ]],
            'X12AcknowledgementSettings' => ['properties' => [
                'needTechnicalAcknowledgement' => ['type' => 'boolean'],
                'batchTechnicalAcknowledgements' => ['type' => 'boolean'],
                'needFunctionalAcknowledgement' => ['type' => 'boolean'],
                'functionalAcknowledgementVersion' => ['type' => 'string'],
                'batchFunctionalAcknowledgements' => ['type' => 'boolean'],
                'needImplementationAcknowledgement' => ['type' => 'boolean'],
                'implementationAcknowledgementVersion' => ['type' => 'string'],
                'batchImplementationAcknowledgements' => ['type' => 'boolean'],
                'needLoopForValidMessages' => ['type' => 'boolean'],
                'sendSynchronousAcknowledgement' => ['type' => 'boolean'],
                'acknowledgementControlNumberPrefix' => ['type' => 'string'],
                'acknowledgementControlNumberSuffix' => ['type' => 'string'],
                'acknowledgementControlNumberLowerBound' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'acknowledgementControlNumberUpperBound' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'rolloverAcknowledgementControlNumber' => ['type' => 'boolean']
            ]],
            'X12MessageFilter' => ['properties' => ['messageFilterType' => [
                'type' => 'string',
                'enum' => [
                    'NotSpecified',
                    'Include',
                    'Exclude'
                ]
            ]]],
            'X12SecuritySettings' => ['properties' => [
                'authorizationQualifier' => ['type' => 'string'],
                'authorizationValue' => ['type' => 'string'],
                'securityQualifier' => ['type' => 'string'],
                'passwordValue' => ['type' => 'string']
            ]],
            'X12ProcessingSettings' => ['properties' => [
                'maskSecurityInfo' => ['type' => 'boolean'],
                'convertImpliedDecimal' => ['type' => 'boolean'],
                'preserveInterchange' => ['type' => 'boolean'],
                'suspendInterchangeOnError' => ['type' => 'boolean'],
                'createEmptyXmlTagsForTrailingSeparators' => ['type' => 'boolean'],
                'useDotAsDecimalSeparator' => ['type' => 'boolean']
            ]],
            'X12EnvelopeOverride' => ['properties' => [
                'targetNamespace' => ['type' => 'string'],
                'protocolVersion' => ['type' => 'string'],
                'messageId' => ['type' => 'string'],
                'responsibleAgencyCode' => ['type' => 'string'],
                'headerVersion' => ['type' => 'string'],
                'senderApplicationId' => ['type' => 'string'],
                'receiverApplicationId' => ['type' => 'string'],
                'functionalIdentifierCode' => ['type' => 'string'],
                'dateFormat' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'CCYYMMDD',
                        'YYMMDD'
                    ]
                ],
                'timeFormat' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'HHMM',
                        'HHMMSS',
                        'HHMMSSdd',
                        'HHMMSSd'
                    ]
                ]
            ]],
            'X12ValidationOverride' => ['properties' => [
                'messageId' => ['type' => 'string'],
                'validateEdiTypes' => ['type' => 'boolean'],
                'validateXsdTypes' => ['type' => 'boolean'],
                'allowLeadingAndTrailingSpacesAndZeroes' => ['type' => 'boolean'],
                'validateCharacterSet' => ['type' => 'boolean'],
                'trimLeadingAndTrailingSpacesAndZeroes' => ['type' => 'boolean'],
                'trailingSeparatorPolicy' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'NotAllowed',
                        'Optional',
                        'Mandatory'
                    ]
                ]
            ]],
            'X12MessageIdentifier' => ['properties' => ['messageId' => ['type' => 'string']]],
            'X12SchemaReference' => ['properties' => [
                'messageId' => ['type' => 'string'],
                'senderApplicationId' => ['type' => 'string'],
                'schemaVersion' => ['type' => 'string'],
                'schemaName' => ['type' => 'string']
            ]],
            'X12DelimiterOverrides' => ['properties' => [
                'protocolVersion' => ['type' => 'string'],
                'messageId' => ['type' => 'string'],
                'dataElementSeparator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'componentSeparator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'segmentTerminator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'segmentTerminatorSuffix' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'None',
                        'CR',
                        'LF',
                        'CRLF'
                    ]
                ],
                'replaceCharacter' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'replaceSeparatorsInPayload' => ['type' => 'boolean'],
                'targetNamespace' => ['type' => 'string']
            ]],
            'X12ProtocolSettings' => ['properties' => [
                'validationSettings' => ['$ref' => '#/definitions/X12ValidationSettings'],
                'framingSettings' => ['$ref' => '#/definitions/X12FramingSettings'],
                'envelopeSettings' => ['$ref' => '#/definitions/X12EnvelopeSettings'],
                'acknowledgementSettings' => ['$ref' => '#/definitions/X12AcknowledgementSettings'],
                'messageFilter' => ['$ref' => '#/definitions/X12MessageFilter'],
                'securitySettings' => ['$ref' => '#/definitions/X12SecuritySettings'],
                'processingSettings' => ['$ref' => '#/definitions/X12ProcessingSettings'],
                'envelopeOverrides' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/X12EnvelopeOverride']
                ],
                'validationOverrides' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/X12ValidationOverride']
                ],
                'messageFilterList' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/X12MessageIdentifier']
                ],
                'schemaReferences' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/X12SchemaReference']
                ],
                'x12DelimiterOverrides' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/X12DelimiterOverrides']
                ]
            ]],
            'X12OneWayAgreement' => ['properties' => [
                'senderBusinessIdentity' => ['$ref' => '#/definitions/BusinessIdentity'],
                'receiverBusinessIdentity' => ['$ref' => '#/definitions/BusinessIdentity'],
                'protocolSettings' => ['$ref' => '#/definitions/X12ProtocolSettings']
            ]],
            'X12AgreementContent' => ['properties' => [
                'receiveAgreement' => ['$ref' => '#/definitions/X12OneWayAgreement'],
                'sendAgreement' => ['$ref' => '#/definitions/X12OneWayAgreement']
            ]],
            'EdifactValidationSettings' => ['properties' => [
                'validateCharacterSet' => ['type' => 'boolean'],
                'checkDuplicateInterchangeControlNumber' => ['type' => 'boolean'],
                'interchangeControlNumberValidityDays' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'checkDuplicateGroupControlNumber' => ['type' => 'boolean'],
                'checkDuplicateTransactionSetControlNumber' => ['type' => 'boolean'],
                'validateEdiTypes' => ['type' => 'boolean'],
                'validateXsdTypes' => ['type' => 'boolean'],
                'allowLeadingAndTrailingSpacesAndZeroes' => ['type' => 'boolean'],
                'trimLeadingAndTrailingSpacesAndZeroes' => ['type' => 'boolean'],
                'trailingSeparatorPolicy' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'NotAllowed',
                        'Optional',
                        'Mandatory'
                    ]
                ]
            ]],
            'EdifactFramingSettings' => ['properties' => [
                'serviceCodeListDirectoryVersion' => ['type' => 'string'],
                'characterEncoding' => ['type' => 'string'],
                'protocolVersion' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'dataElementSeparator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'componentSeparator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'segmentTerminator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'releaseIndicator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'repetitionSeparator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'characterSet' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'UNOB',
                        'UNOA',
                        'UNOC',
                        'UNOD',
                        'UNOE',
                        'UNOF',
                        'UNOG',
                        'UNOH',
                        'UNOI',
                        'UNOJ',
                        'UNOK',
                        'UNOX',
                        'UNOY',
                        'KECA'
                    ]
                ],
                'decimalPointIndicator' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Comma',
                        'Decimal'
                    ]
                ],
                'segmentTerminatorSuffix' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'None',
                        'CR',
                        'LF',
                        'CRLF'
                    ]
                ]
            ]],
            'EdifactEnvelopeSettings' => ['properties' => [
                'groupAssociationAssignedCode' => ['type' => 'string'],
                'communicationAgreementId' => ['type' => 'string'],
                'applyDelimiterStringAdvice' => ['type' => 'boolean'],
                'createGroupingSegments' => ['type' => 'boolean'],
                'enableDefaultGroupHeaders' => ['type' => 'boolean'],
                'recipientReferencePasswordValue' => ['type' => 'string'],
                'recipientReferencePasswordQualifier' => ['type' => 'string'],
                'applicationReferenceId' => ['type' => 'string'],
                'processingPriorityCode' => ['type' => 'string'],
                'interchangeControlNumberLowerBound' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'interchangeControlNumberUpperBound' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'rolloverInterchangeControlNumber' => ['type' => 'boolean'],
                'interchangeControlNumberPrefix' => ['type' => 'string'],
                'interchangeControlNumberSuffix' => ['type' => 'string'],
                'senderReverseRoutingAddress' => ['type' => 'string'],
                'receiverReverseRoutingAddress' => ['type' => 'string'],
                'functionalGroupId' => ['type' => 'string'],
                'groupControllingAgencyCode' => ['type' => 'string'],
                'groupMessageVersion' => ['type' => 'string'],
                'groupMessageRelease' => ['type' => 'string'],
                'groupControlNumberLowerBound' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'groupControlNumberUpperBound' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'rolloverGroupControlNumber' => ['type' => 'boolean'],
                'groupControlNumberPrefix' => ['type' => 'string'],
                'groupControlNumberSuffix' => ['type' => 'string'],
                'groupApplicationReceiverQualifier' => ['type' => 'string'],
                'groupApplicationReceiverId' => ['type' => 'string'],
                'groupApplicationSenderQualifier' => ['type' => 'string'],
                'groupApplicationSenderId' => ['type' => 'string'],
                'groupApplicationPassword' => ['type' => 'string'],
                'overwriteExistingTransactionSetControlNumber' => ['type' => 'boolean'],
                'transactionSetControlNumberPrefix' => ['type' => 'string'],
                'transactionSetControlNumberSuffix' => ['type' => 'string'],
                'transactionSetControlNumberLowerBound' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'transactionSetControlNumberUpperBound' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'rolloverTransactionSetControlNumber' => ['type' => 'boolean'],
                'isTestInterchange' => ['type' => 'boolean'],
                'senderInternalIdentification' => ['type' => 'string'],
                'senderInternalSubIdentification' => ['type' => 'string'],
                'receiverInternalIdentification' => ['type' => 'string'],
                'receiverInternalSubIdentification' => ['type' => 'string']
            ]],
            'EdifactAcknowledgementSettings' => ['properties' => [
                'needTechnicalAcknowledgement' => ['type' => 'boolean'],
                'batchTechnicalAcknowledgements' => ['type' => 'boolean'],
                'needFunctionalAcknowledgement' => ['type' => 'boolean'],
                'batchFunctionalAcknowledgements' => ['type' => 'boolean'],
                'needLoopForValidMessages' => ['type' => 'boolean'],
                'sendSynchronousAcknowledgement' => ['type' => 'boolean'],
                'acknowledgementControlNumberPrefix' => ['type' => 'string'],
                'acknowledgementControlNumberSuffix' => ['type' => 'string'],
                'acknowledgementControlNumberLowerBound' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'acknowledgementControlNumberUpperBound' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'rolloverAcknowledgementControlNumber' => ['type' => 'boolean']
            ]],
            'EdifactMessageFilter' => ['properties' => ['messageFilterType' => [
                'type' => 'string',
                'enum' => [
                    'NotSpecified',
                    'Include',
                    'Exclude'
                ]
            ]]],
            'EdifactProcessingSettings' => ['properties' => [
                'maskSecurityInfo' => ['type' => 'boolean'],
                'preserveInterchange' => ['type' => 'boolean'],
                'suspendInterchangeOnError' => ['type' => 'boolean'],
                'createEmptyXmlTagsForTrailingSeparators' => ['type' => 'boolean'],
                'useDotAsDecimalSeparator' => ['type' => 'boolean']
            ]],
            'EdifactEnvelopeOverride' => ['properties' => [
                'messageId' => ['type' => 'string'],
                'messageVersion' => ['type' => 'string'],
                'messageRelease' => ['type' => 'string'],
                'messageAssociationAssignedCode' => ['type' => 'string'],
                'targetNamespace' => ['type' => 'string'],
                'functionalGroupId' => ['type' => 'string'],
                'senderApplicationQualifier' => ['type' => 'string'],
                'senderApplicationId' => ['type' => 'string'],
                'receiverApplicationQualifier' => ['type' => 'string'],
                'receiverApplicationId' => ['type' => 'string'],
                'controllingAgencyCode' => ['type' => 'string'],
                'groupHeaderMessageVersion' => ['type' => 'string'],
                'groupHeaderMessageRelease' => ['type' => 'string'],
                'associationAssignedCode' => ['type' => 'string'],
                'applicationPassword' => ['type' => 'string']
            ]],
            'EdifactMessageIdentifier' => ['properties' => ['messageId' => ['type' => 'string']]],
            'EdifactSchemaReference' => ['properties' => [
                'messageId' => ['type' => 'string'],
                'messageVersion' => ['type' => 'string'],
                'messageRelease' => ['type' => 'string'],
                'senderApplicationId' => ['type' => 'string'],
                'senderApplicationQualifier' => ['type' => 'string'],
                'associationAssignedCode' => ['type' => 'string'],
                'schemaName' => ['type' => 'string']
            ]],
            'EdifactValidationOverride' => ['properties' => [
                'messageId' => ['type' => 'string'],
                'enforceCharacterSet' => ['type' => 'boolean'],
                'validateEdiTypes' => ['type' => 'boolean'],
                'validateXsdTypes' => ['type' => 'boolean'],
                'allowLeadingAndTrailingSpacesAndZeroes' => ['type' => 'boolean'],
                'trailingSeparatorPolicy' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'NotAllowed',
                        'Optional',
                        'Mandatory'
                    ]
                ],
                'trimLeadingAndTrailingSpacesAndZeroes' => ['type' => 'boolean']
            ]],
            'EdifactDelimiterOverride' => ['properties' => [
                'messageId' => ['type' => 'string'],
                'messageVersion' => ['type' => 'string'],
                'messageRelease' => ['type' => 'string'],
                'dataElementSeparator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'componentSeparator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'segmentTerminator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'repetitionSeparator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'segmentTerminatorSuffix' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'None',
                        'CR',
                        'LF',
                        'CRLF'
                    ]
                ],
                'decimalPointIndicator' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'Comma',
                        'Decimal'
                    ]
                ],
                'releaseIndicator' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'messageAssociationAssignedCode' => ['type' => 'string'],
                'targetNamespace' => ['type' => 'string']
            ]],
            'EdifactProtocolSettings' => ['properties' => [
                'validationSettings' => ['$ref' => '#/definitions/EdifactValidationSettings'],
                'framingSettings' => ['$ref' => '#/definitions/EdifactFramingSettings'],
                'envelopeSettings' => ['$ref' => '#/definitions/EdifactEnvelopeSettings'],
                'acknowledgementSettings' => ['$ref' => '#/definitions/EdifactAcknowledgementSettings'],
                'messageFilter' => ['$ref' => '#/definitions/EdifactMessageFilter'],
                'processingSettings' => ['$ref' => '#/definitions/EdifactProcessingSettings'],
                'envelopeOverrides' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/EdifactEnvelopeOverride']
                ],
                'messageFilterList' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/EdifactMessageIdentifier']
                ],
                'schemaReferences' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/EdifactSchemaReference']
                ],
                'validationOverrides' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/EdifactValidationOverride']
                ],
                'edifactDelimiterOverrides' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/EdifactDelimiterOverride']
                ]
            ]],
            'EdifactOneWayAgreement' => ['properties' => [
                'senderBusinessIdentity' => ['$ref' => '#/definitions/BusinessIdentity'],
                'receiverBusinessIdentity' => ['$ref' => '#/definitions/BusinessIdentity'],
                'protocolSettings' => ['$ref' => '#/definitions/EdifactProtocolSettings']
            ]],
            'EdifactAgreementContent' => ['properties' => [
                'receiveAgreement' => ['$ref' => '#/definitions/EdifactOneWayAgreement'],
                'sendAgreement' => ['$ref' => '#/definitions/EdifactOneWayAgreement']
            ]],
            'AgreementContent' => ['properties' => [
                'aS2' => ['$ref' => '#/definitions/AS2AgreementContent'],
                'x12' => ['$ref' => '#/definitions/X12AgreementContent'],
                'edifact' => ['$ref' => '#/definitions/EdifactAgreementContent']
            ]],
            'IntegrationAccountAgreementProperties' => ['properties' => [
                'createdTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'changedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'metadata' => ['type' => 'object'],
                'agreementType' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'AS2',
                        'X12',
                        'Edifact'
                    ]
                ],
                'hostPartner' => ['type' => 'string'],
                'guestPartner' => ['type' => 'string'],
                'hostIdentity' => ['$ref' => '#/definitions/BusinessIdentity'],
                'guestIdentity' => ['$ref' => '#/definitions/BusinessIdentity'],
                'content' => ['$ref' => '#/definitions/AgreementContent']
            ]],
            'IntegrationAccountAgreement' => ['properties' => ['properties' => ['$ref' => '#/definitions/IntegrationAccountAgreementProperties']]],
            'IntegrationAccountAgreementListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/IntegrationAccountAgreement']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'IntegrationAccountAgreementFilter' => ['properties' => ['agreementType' => [
                'type' => 'string',
                'enum' => [
                    'NotSpecified',
                    'AS2',
                    'X12',
                    'Edifact'
                ]
            ]]],
            'KeyVaultKeyReference_keyVault' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'KeyVaultKeyReference' => ['properties' => [
                'keyVault' => ['$ref' => '#/definitions/KeyVaultKeyReference_keyVault'],
                'keyName' => ['type' => 'string'],
                'keyVersion' => ['type' => 'string']
            ]],
            'IntegrationAccountCertificateProperties' => ['properties' => [
                'createdTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'changedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'metadata' => ['type' => 'object'],
                'key' => ['$ref' => '#/definitions/KeyVaultKeyReference'],
                'publicCertificate' => ['type' => 'string']
            ]],
            'IntegrationAccountCertificate' => ['properties' => ['properties' => ['$ref' => '#/definitions/IntegrationAccountCertificateProperties']]],
            'IntegrationAccountCertificateListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/IntegrationAccountCertificate']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'IntegrationAccountSessionFilter' => ['properties' => ['changedTime' => [
                'type' => 'string',
                'format' => 'date-time'
            ]]],
            'IntegrationAccountSessionProperties' => ['properties' => [
                'createdTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'changedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'content' => ['type' => 'object']
            ]],
            'IntegrationAccountSession' => ['properties' => ['properties' => ['$ref' => '#/definitions/IntegrationAccountSessionProperties']]],
            'IntegrationAccountSessionListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/IntegrationAccountSession']
                ],
                'nextLink' => ['type' => 'string']
            ]],
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
            ]]
        ]
    ];
}
