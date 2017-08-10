<?php
namespace Microsoft\Azure\Management\ServerManagement;
final class ServerManagement
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
        $this->_Gateway_group = new \Microsoft\Azure\Management\ServerManagement\Gateway($_client);
        $this->_Node_group = new \Microsoft\Azure\Management\ServerManagement\Node($_client);
        $this->_Session_group = new \Microsoft\Azure\Management\ServerManagement\Session($_client);
        $this->_PowerShell_group = new \Microsoft\Azure\Management\ServerManagement\PowerShell($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\ServerManagement\Gateway
     */
    public function getGateway()
    {
        return $this->_Gateway_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServerManagement\Node
     */
    public function getNode()
    {
        return $this->_Node_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServerManagement\Session
     */
    public function getSession()
    {
        return $this->_Session_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ServerManagement\PowerShell
     */
    public function getPowerShell()
    {
        return $this->_PowerShell_group;
    }
    /**
     * @var \Microsoft\Azure\Management\ServerManagement\Gateway
     */
    private $_Gateway_group;
    /**
     * @var \Microsoft\Azure\Management\ServerManagement\Node
     */
    private $_Node_group;
    /**
     * @var \Microsoft\Azure\Management\ServerManagement\Session
     */
    private $_Session_group;
    /**
     * @var \Microsoft\Azure\Management\ServerManagement\PowerShell
     */
    private $_PowerShell_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/gateways/{gatewayName}' => [
                'put' => [
                    'operationId' => 'Gateway_Create',
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
                            'enum' => ['2016-07-01-preview']
                        ],
                        [
                            'name' => 'resourceGroupName',
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
                            'name' => 'GatewayParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/GatewayParameters']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/GatewayResource']],
                        '201' => ['schema' => ['$ref' => '#/definitions/GatewayResource']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Gateway_Update',
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
                            'enum' => ['2016-07-01-preview']
                        ],
                        [
                            'name' => 'resourceGroupName',
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
                            'name' => 'GatewayParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/GatewayParameters']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/GatewayResource']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Gateway_Delete',
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
                            'enum' => ['2016-07-01-preview']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'gatewayName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Gateway_Get',
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
                            'enum' => ['2016-07-01-preview']
                        ],
                        [
                            'name' => 'resourceGroupName',
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
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string',
                            'enum' => [
                                'status',
                                'download'
                            ]
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GatewayResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ServerManagement/gateways' => ['get' => [
                'operationId' => 'Gateway_List',
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
                        'enum' => ['2016-07-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GatewayResources']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/gateways' => ['get' => [
                'operationId' => 'Gateway_ListForResourceGroup',
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
                        'enum' => ['2016-07-01-preview']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GatewayResources']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/gateways/{gatewayName}/upgradetolatest' => ['post' => [
                'operationId' => 'Gateway_Upgrade',
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
                        'enum' => ['2016-07-01-preview']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'gatewayName',
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
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/gateways/{gatewayName}/regenerateprofile' => ['post' => [
                'operationId' => 'Gateway_RegenerateProfile',
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
                        'enum' => ['2016-07-01-preview']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'gatewayName',
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
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/gateways/{gatewayName}/profile' => ['post' => [
                'operationId' => 'Gateway_GetProfile',
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
                        'enum' => ['2016-07-01-preview']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'gatewayName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/GatewayProfile']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}' => [
                'put' => [
                    'operationId' => 'Node_Create',
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
                            'enum' => ['2016-07-01-preview']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'GatewayParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/NodeParameters']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/NodeResource']],
                        '201' => ['schema' => ['$ref' => '#/definitions/NodeResource']],
                        '202' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'Node_Update',
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
                            'enum' => ['2016-07-01-preview']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'NodeParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/NodeParameters']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/NodeResource']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Node_Delete',
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
                            'enum' => ['2016-07-01-preview']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Node_Get',
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
                            'enum' => ['2016-07-01-preview']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NodeResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ServerManagement/nodes' => ['get' => [
                'operationId' => 'Node_List',
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
                        'enum' => ['2016-07-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NodeResources']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes' => ['get' => [
                'operationId' => 'Node_ListForResourceGroup',
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
                        'enum' => ['2016-07-01-preview']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NodeResources']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}' => [
                'put' => [
                    'operationId' => 'Session_Create',
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
                            'enum' => ['2016-07-01-preview']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'session',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'SessionParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SessionParameters']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/SessionResource']],
                        '201' => ['schema' => ['$ref' => '#/definitions/SessionResource']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Session_Delete',
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
                            'enum' => ['2016-07-01-preview']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'session',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Session_Get',
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
                            'enum' => ['2016-07-01-preview']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'session',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SessionResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}/features/powerShellConsole/pssessions' => ['get' => [
                'operationId' => 'PowerShell_ListSession',
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
                        'enum' => ['2016-07-01-preview']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'nodeName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'session',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PowerShellSessionResources']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}/features/powerShellConsole/pssessions/{pssession}' => [
                'put' => [
                    'operationId' => 'PowerShell_CreateSession',
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
                            'enum' => ['2016-07-01-preview']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'session',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'pssession',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/PowerShellSessionResource']],
                        '202' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'PowerShell_GetCommandStatus',
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
                            'enum' => ['2016-07-01-preview']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'session',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'pssession',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string',
                            'enum' => ['output']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PowerShellCommandStatus']]]
                ],
                'patch' => [
                    'operationId' => 'PowerShell_UpdateCommand',
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
                            'enum' => ['2016-07-01-preview']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'session',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'pssession',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/PowerShellCommandResults']],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}/features/powerShellConsole/pssessions/{pssession}/invokeCommand' => ['post' => [
                'operationId' => 'PowerShell_InvokeCommand',
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
                        'enum' => ['2016-07-01-preview']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'nodeName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'session',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'pssession',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'PowerShellCommandParameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/PowerShellCommandParameters']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/PowerShellCommandResults']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}/features/powerShellConsole/pssessions/{pssession}/cancel' => ['post' => [
                'operationId' => 'PowerShell_CancelCommand',
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
                        'enum' => ['2016-07-01-preview']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'nodeName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'session',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'pssession',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/PowerShellCommandResults']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ServerManagement/nodes/{nodeName}/sessions/{session}/features/powerShellConsole/pssessions/{pssession}/tab' => ['post' => [
                'operationId' => 'PowerShell_TabCompletion',
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
                        'enum' => ['2016-07-01-preview']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'nodeName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'session',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'pssession',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'PowerShellTabCompletionParamters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/PowerShellTabCompletionParameters']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PowerShellTabCompletionResults']]]
            ]]
        ],
        'definitions' => [
            'Resource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'etag' => ['type' => 'string']
                ],
                'required' => []
            ],
            'EncryptionJwkResource' => [
                'properties' => [
                    'kty' => ['type' => 'string'],
                    'alg' => ['type' => 'string'],
                    'e' => ['type' => 'string'],
                    'n' => ['type' => 'string']
                ],
                'required' => []
            ],
            'GatewayStatus' => [
                'properties' => [
                    'availableMemoryMByte' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'gatewayCpuUtilizationPercent' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'totalCpuUtilizationPercent' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'gatewayVersion' => ['type' => 'string'],
                    'friendlyOsName' => ['type' => 'string'],
                    'installedDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'logicalProcessorCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'name' => ['type' => 'string'],
                    'gatewayId' => ['type' => 'string'],
                    'gatewayWorkingSetMByte' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'statusUpdated' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'groupPolicyError' => ['type' => 'string'],
                    'allowGatewayGroupPolicyStatus' => ['type' => 'boolean'],
                    'requireMfaGroupPolicyStatus' => ['type' => 'boolean'],
                    'encryptionCertificateThumbprint' => ['type' => 'string'],
                    'secondaryEncryptionCertificateThumbprint' => ['type' => 'string'],
                    'encryptionJwk' => ['$ref' => '#/definitions/EncryptionJwkResource'],
                    'secondaryEncryptionJwk' => ['$ref' => '#/definitions/EncryptionJwkResource'],
                    'activeMessageCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'latestPublishedMsiVersion' => ['type' => 'string'],
                    'publishedTimeUtc' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => []
            ],
            'GatewayResource_properties' => [
                'properties' => [
                    'created' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'updated' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'upgradeMode' => [
                        'type' => 'string',
                        'enum' => [
                            'Manual',
                            'Automatic'
                        ]
                    ],
                    'desiredVersion' => ['type' => 'string'],
                    'instances' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/GatewayStatus']
                    ],
                    'activeMessageCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'latestPublishedMsiVersion' => ['type' => 'string'],
                    'publishedTimeUtc' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'installerDownload' => ['type' => 'string'],
                    'minimumVersion' => ['type' => 'string']
                ],
                'required' => []
            ],
            'GatewayResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/GatewayResource_properties']],
                'required' => []
            ],
            'GatewayResources' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/GatewayResource']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'GatewayProfile' => [
                'properties' => [
                    'dataPlaneServiceBaseAddress' => ['type' => 'string'],
                    'gatewayId' => ['type' => 'string'],
                    'environment' => ['type' => 'string'],
                    'upgradeManifestUrl' => ['type' => 'string'],
                    'messagingNamespace' => ['type' => 'string'],
                    'messagingAccount' => ['type' => 'string'],
                    'messagingKey' => ['type' => 'string'],
                    'requestQueue' => ['type' => 'string'],
                    'responseTopic' => ['type' => 'string'],
                    'statusBlobSignature' => ['type' => 'string']
                ],
                'required' => []
            ],
            'GatewayParameters_properties' => [
                'properties' => ['upgradeMode' => [
                    'type' => 'string',
                    'enum' => [
                        'Manual',
                        'Automatic'
                    ]
                ]],
                'required' => []
            ],
            'GatewayParameters' => [
                'properties' => [
                    'location' => ['type' => 'string'],
                    'tags' => ['type' => 'object'],
                    'properties' => ['$ref' => '#/definitions/GatewayParameters_properties']
                ],
                'required' => []
            ],
            'NodeResource_properties' => [
                'properties' => [
                    'gatewayId' => ['type' => 'string'],
                    'connectionName' => ['type' => 'string'],
                    'created' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'updated' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => []
            ],
            'NodeResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/NodeResource_properties']],
                'required' => []
            ],
            'NodeResources' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/NodeResource']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'NodeParameters_properties' => [
                'properties' => [
                    'gatewayId' => ['type' => 'string'],
                    'connectionName' => ['type' => 'string'],
                    'userName' => ['type' => 'string'],
                    'password' => ['type' => 'string']
                ],
                'required' => []
            ],
            'NodeParameters' => [
                'properties' => [
                    'location' => ['type' => 'string'],
                    'tags' => ['type' => 'object'],
                    'properties' => ['$ref' => '#/definitions/NodeParameters_properties']
                ],
                'required' => []
            ],
            'SessionResource_properties' => [
                'properties' => [
                    'userName' => ['type' => 'string'],
                    'created' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'updated' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => []
            ],
            'SessionResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SessionResource_properties']],
                'required' => []
            ],
            'SessionParameters_properties' => [
                'properties' => [
                    'userName' => ['type' => 'string'],
                    'password' => ['type' => 'string'],
                    'retentionPeriod' => [
                        'type' => 'string',
                        'enum' => [
                            'Session',
                            'Persistent'
                        ]
                    ],
                    'credentialDataFormat' => [
                        'type' => 'string',
                        'enum' => ['RsaEncrypted']
                    ],
                    'EncryptionCertificateThumbprint' => ['type' => 'string']
                ],
                'required' => []
            ],
            'SessionParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SessionParameters_properties']],
                'required' => []
            ],
            'Version' => [
                'properties' => [
                    'major' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'minor' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'build' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'revision' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'majorRevision' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'minorRevision' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'PowerShellSessionResource_properties' => [
                'properties' => [
                    'sessionId' => ['type' => 'string'],
                    'state' => ['type' => 'string'],
                    'runspaceAvailability' => ['type' => 'string'],
                    'disconnectedOn' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'expiresOn' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'version' => ['$ref' => '#/definitions/Version'],
                    'name' => ['type' => 'string']
                ],
                'required' => []
            ],
            'PowerShellSessionResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/PowerShellSessionResource_properties']],
                'required' => []
            ],
            'PromptFieldDescription' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'label' => ['type' => 'string'],
                    'helpMessage' => ['type' => 'string'],
                    'promptFieldTypeIsList' => ['type' => 'boolean'],
                    'promptFieldType' => [
                        'type' => 'string',
                        'enum' => [
                            'String',
                            'SecureString',
                            'Credential'
                        ]
                    ]
                ],
                'required' => []
            ],
            'PowerShellCommandResult' => [
                'properties' => [
                    'messageType' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'foregroundColor' => ['type' => 'string'],
                    'backgroundColor' => ['type' => 'string'],
                    'value' => ['type' => 'string'],
                    'prompt' => ['type' => 'string'],
                    'exitCode' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'id' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'caption' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'descriptions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PromptFieldDescription']
                    ]
                ],
                'required' => []
            ],
            'PowerShellCommandResults' => [
                'properties' => [
                    'results' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PowerShellCommandResult']
                    ],
                    'pssession' => ['type' => 'string'],
                    'command' => ['type' => 'string'],
                    'completed' => ['type' => 'boolean']
                ],
                'required' => []
            ],
            'PowerShellCommandStatus' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/PowerShellCommandResults']],
                'required' => []
            ],
            'PowerShellSessionResources' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/PowerShellSessionResource']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'PowerShellCommandParameters_properties' => [
                'properties' => ['command' => ['type' => 'string']],
                'required' => []
            ],
            'PowerShellCommandParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/PowerShellCommandParameters_properties']],
                'required' => []
            ],
            'PromptMessageResponse' => [
                'properties' => ['response' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'required' => []
            ],
            'PowerShellTabCompletionParameters' => [
                'properties' => ['command' => ['type' => 'string']],
                'required' => []
            ],
            'PowerShellTabCompletionResults' => [
                'properties' => ['results' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'required' => []
            ],
            'Error' => [
                'properties' => [
                    'code' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'message' => ['type' => 'string'],
                    'fields' => ['type' => 'string']
                ],
                'required' => []
            ]
        ]
    ];
}
