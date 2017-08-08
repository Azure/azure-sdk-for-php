<?php
namespace Microsoft\Azure\Management\Sql\_2015_05_01_preview;
final class SqlManagementClient
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
        $this->_DatabaseAdvisors_group = new \Microsoft\Azure\Management\Sql\_2015_05_01_preview\DatabaseAdvisors($_client);
        $this->_DatabaseRecommendedActions_group = new \Microsoft\Azure\Management\Sql\_2015_05_01_preview\DatabaseRecommendedActions($_client);
        $this->_ServerAdvisors_group = new \Microsoft\Azure\Management\Sql\_2015_05_01_preview\ServerAdvisors($_client);
        $this->_DatabaseBlobAuditingPolicies_group = new \Microsoft\Azure\Management\Sql\_2015_05_01_preview\DatabaseBlobAuditingPolicies($_client);
        $this->_EncryptionProtectors_group = new \Microsoft\Azure\Management\Sql\_2015_05_01_preview\EncryptionProtectors($_client);
        $this->_FailoverGroups_group = new \Microsoft\Azure\Management\Sql\_2015_05_01_preview\FailoverGroups($_client);
        $this->_ServerKeys_group = new \Microsoft\Azure\Management\Sql\_2015_05_01_preview\ServerKeys($_client);
        $this->_Servers_group = new \Microsoft\Azure\Management\Sql\_2015_05_01_preview\Servers($_client);
        $this->_SyncAgents_group = new \Microsoft\Azure\Management\Sql\_2015_05_01_preview\SyncAgents($_client);
        $this->_SyncGroups_group = new \Microsoft\Azure\Management\Sql\_2015_05_01_preview\SyncGroups($_client);
        $this->_SyncMembers_group = new \Microsoft\Azure\Management\Sql\_2015_05_01_preview\SyncMembers($_client);
        $this->_VirtualNetworkRules_group = new \Microsoft\Azure\Management\Sql\_2015_05_01_preview\VirtualNetworkRules($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2015_05_01_preview\DatabaseAdvisors
     */
    public function getDatabaseAdvisors()
    {
        return $this->_DatabaseAdvisors_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2015_05_01_preview\DatabaseRecommendedActions
     */
    public function getDatabaseRecommendedActions()
    {
        return $this->_DatabaseRecommendedActions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2015_05_01_preview\ServerAdvisors
     */
    public function getServerAdvisors()
    {
        return $this->_ServerAdvisors_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2015_05_01_preview\DatabaseBlobAuditingPolicies
     */
    public function getDatabaseBlobAuditingPolicies()
    {
        return $this->_DatabaseBlobAuditingPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2015_05_01_preview\EncryptionProtectors
     */
    public function getEncryptionProtectors()
    {
        return $this->_EncryptionProtectors_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2015_05_01_preview\FailoverGroups
     */
    public function getFailoverGroups()
    {
        return $this->_FailoverGroups_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2015_05_01_preview\ServerKeys
     */
    public function getServerKeys()
    {
        return $this->_ServerKeys_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2015_05_01_preview\Servers
     */
    public function getServers()
    {
        return $this->_Servers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2015_05_01_preview\SyncAgents
     */
    public function getSyncAgents()
    {
        return $this->_SyncAgents_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2015_05_01_preview\SyncGroups
     */
    public function getSyncGroups()
    {
        return $this->_SyncGroups_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2015_05_01_preview\SyncMembers
     */
    public function getSyncMembers()
    {
        return $this->_SyncMembers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2015_05_01_preview\VirtualNetworkRules
     */
    public function getVirtualNetworkRules()
    {
        return $this->_VirtualNetworkRules_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Sql\_2015_05_01_preview\DatabaseAdvisors
     */
    private $_DatabaseAdvisors_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2015_05_01_preview\DatabaseRecommendedActions
     */
    private $_DatabaseRecommendedActions_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2015_05_01_preview\ServerAdvisors
     */
    private $_ServerAdvisors_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2015_05_01_preview\DatabaseBlobAuditingPolicies
     */
    private $_DatabaseBlobAuditingPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2015_05_01_preview\EncryptionProtectors
     */
    private $_EncryptionProtectors_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2015_05_01_preview\FailoverGroups
     */
    private $_FailoverGroups_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2015_05_01_preview\ServerKeys
     */
    private $_ServerKeys_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2015_05_01_preview\Servers
     */
    private $_Servers_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2015_05_01_preview\SyncAgents
     */
    private $_SyncAgents_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2015_05_01_preview\SyncGroups
     */
    private $_SyncGroups_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2015_05_01_preview\SyncMembers
     */
    private $_SyncMembers_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2015_05_01_preview\VirtualNetworkRules
     */
    private $_VirtualNetworkRules_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/advisors' => ['get' => [
                'operationId' => 'DatabaseAdvisors_ListByDatabase',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Advisor']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/advisors/{advisorName}' => [
                'get' => [
                    'operationId' => 'DatabaseAdvisors_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'advisorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Advisor']]]
                ],
                'patch' => [
                    'operationId' => 'DatabaseAdvisors_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'advisorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Advisor'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Advisor']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/advisors/{advisorName}/recommendedActions' => ['get' => [
                'operationId' => 'DatabaseRecommendedActions_ListByDatabaseAdvisor',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'advisorName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RecommendedAction']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/advisors/{advisorName}/recommendedActions/{recommendedActionName}' => [
                'get' => [
                    'operationId' => 'DatabaseRecommendedActions_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'advisorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'recommendedActionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecommendedAction']]]
                ],
                'patch' => [
                    'operationId' => 'DatabaseRecommendedActions_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'advisorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'recommendedActionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/RecommendedAction'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecommendedAction']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/advisors' => ['get' => [
                'operationId' => 'ServerAdvisors_ListByServer',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Advisor']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/advisors/{advisorName}' => [
                'get' => [
                    'operationId' => 'ServerAdvisors_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'advisorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Advisor']]]
                ],
                'patch' => [
                    'operationId' => 'ServerAdvisors_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'advisorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Advisor'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Advisor']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/auditingSettings/{blobAuditingPolicyName}' => [
                'get' => [
                    'operationId' => 'DatabaseBlobAuditingPolicies_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'blobAuditingPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['default']
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseBlobAuditingPolicy']]]
                ],
                'put' => [
                    'operationId' => 'DatabaseBlobAuditingPolicies_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'blobAuditingPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['default']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/DatabaseBlobAuditingPolicy'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/DatabaseBlobAuditingPolicy']],
                        '201' => ['schema' => ['$ref' => '#/definitions/DatabaseBlobAuditingPolicy']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/encryptionProtector' => ['get' => [
                'operationId' => 'EncryptionProtectors_ListByServer',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/EncryptionProtectorListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/encryptionProtector/{encryptionProtectorName}' => [
                'get' => [
                    'operationId' => 'EncryptionProtectors_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'encryptionProtectorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['current']
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/EncryptionProtector']]]
                ],
                'put' => [
                    'operationId' => 'EncryptionProtectors_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'encryptionProtectorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['current']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/EncryptionProtector'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/EncryptionProtector']],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/failoverGroups/{failoverGroupName}' => [
                'get' => [
                    'operationId' => 'FailoverGroups_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'failoverGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FailoverGroup']]]
                ],
                'put' => [
                    'operationId' => 'FailoverGroups_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'failoverGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/FailoverGroup'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/FailoverGroup']],
                        '202' => [],
                        '201' => ['schema' => ['$ref' => '#/definitions/FailoverGroup']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'FailoverGroups_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'failoverGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '202' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'FailoverGroups_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'failoverGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/FailoverGroupUpdate'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/FailoverGroup']],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/failoverGroups' => ['get' => [
                'operationId' => 'FailoverGroups_ListByServer',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FailoverGroupListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/failoverGroups/{failoverGroupName}/failover' => ['post' => [
                'operationId' => 'FailoverGroups_Failover',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'failoverGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/FailoverGroup']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/failoverGroups/{failoverGroupName}/forceFailoverAllowDataLoss' => ['post' => [
                'operationId' => 'FailoverGroups_ForceFailoverAllowDataLoss',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'failoverGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/FailoverGroup']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/keys' => ['get' => [
                'operationId' => 'ServerKeys_ListByServer',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerKeyListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/keys/{keyName}' => [
                'get' => [
                    'operationId' => 'ServerKeys_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'keyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerKey']]]
                ],
                'put' => [
                    'operationId' => 'ServerKeys_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'keyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ServerKey'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ServerKey']],
                        '202' => [],
                        '201' => ['schema' => ['$ref' => '#/definitions/ServerKey']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'ServerKeys_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'keyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Sql/servers' => ['get' => [
                'operationId' => 'Servers_List',
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers' => ['get' => [
                'operationId' => 'Servers_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}' => [
                'get' => [
                    'operationId' => 'Servers_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Server']]]
                ],
                'put' => [
                    'operationId' => 'Servers_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Server'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Server']],
                        '202' => [],
                        '201' => ['schema' => ['$ref' => '#/definitions/Server']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Servers_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '202' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'Servers_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ServerUpdate'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Server']],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/syncAgents/{syncAgentName}' => [
                'get' => [
                    'operationId' => 'SyncAgents_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncAgentName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SyncAgent']]]
                ],
                'put' => [
                    'operationId' => 'SyncAgents_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncAgentName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/SyncAgent'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/SyncAgent']],
                        '202' => [],
                        '201' => ['schema' => ['$ref' => '#/definitions/SyncAgent']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'SyncAgents_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncAgentName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/syncAgents' => ['get' => [
                'operationId' => 'SyncAgents_ListByServer',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SyncAgentListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/syncAgents/{syncAgentName}/generateKey' => ['post' => [
                'operationId' => 'SyncAgents_GenerateKey',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'syncAgentName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SyncAgentKeyProperties']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/syncAgents/{syncAgentName}/linkedDatabases' => ['get' => [
                'operationId' => 'SyncAgents_ListLinkedDatabases',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'syncAgentName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SyncAgentLinkedDatabaseListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Sql/locations/{locationName}/syncDatabaseIds' => ['get' => [
                'operationId' => 'SyncGroups_ListSyncDatabaseIds',
                'parameters' => [
                    [
                        'name' => 'locationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SyncDatabaseIdListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/syncGroups/{syncGroupName}/refreshHubSchema' => ['post' => [
                'operationId' => 'SyncGroups_RefreshHubSchema',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'syncGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => [
                    '200' => [],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/syncGroups/{syncGroupName}/hubSchemas' => ['get' => [
                'operationId' => 'SyncGroups_ListHubSchemas',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'syncGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SyncFullSchemaPropertiesListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/syncGroups/{syncGroupName}/logs' => ['get' => [
                'operationId' => 'SyncGroups_ListLogs',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'syncGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'startTime',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'endTime',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'type',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => [
                            'All',
                            'Error',
                            'Warning',
                            'Success'
                        ]
                    ],
                    [
                        'name' => 'continuationToken',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SyncGroupLogListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/syncGroups/{syncGroupName}/cancelSync' => ['post' => [
                'operationId' => 'SyncGroups_CancelSync',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'syncGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/syncGroups/{syncGroupName}/triggerSync' => ['post' => [
                'operationId' => 'SyncGroups_TriggerSync',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'syncGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/syncGroups/{syncGroupName}' => [
                'get' => [
                    'operationId' => 'SyncGroups_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SyncGroup']]]
                ],
                'put' => [
                    'operationId' => 'SyncGroups_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/SyncGroup'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/SyncGroup']],
                        '202' => [],
                        '201' => ['schema' => ['$ref' => '#/definitions/SyncGroup']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'SyncGroups_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '202' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'SyncGroups_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/SyncGroup'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/SyncGroup']],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/syncGroups' => ['get' => [
                'operationId' => 'SyncGroups_ListByDatabase',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SyncGroupListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/syncGroups/{syncGroupName}/syncMembers/{syncMemberName}' => [
                'get' => [
                    'operationId' => 'SyncMembers_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncMemberName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SyncMember']]]
                ],
                'put' => [
                    'operationId' => 'SyncMembers_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncMemberName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/SyncMember'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/SyncMember']],
                        '202' => [],
                        '201' => ['schema' => ['$ref' => '#/definitions/SyncMember']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'SyncMembers_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncMemberName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '202' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'SyncMembers_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'syncMemberName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/SyncMember'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/SyncMember']],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/syncGroups/{syncGroupName}/syncMembers' => ['get' => [
                'operationId' => 'SyncMembers_ListBySyncGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'syncGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SyncMemberListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/syncGroups/{syncGroupName}/syncMembers/{syncMemberName}/schemas' => ['get' => [
                'operationId' => 'SyncMembers_ListMemberSchemas',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'syncGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'syncMemberName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SyncFullSchemaPropertiesListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/syncGroups/{syncGroupName}/syncMembers/{syncMemberName}/refreshSchema' => ['post' => [
                'operationId' => 'SyncMembers_RefreshMemberSchema',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'syncGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'syncMemberName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => [
                    '200' => [],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/virtualNetworkRules/{virtualNetworkRuleName}' => [
                'get' => [
                    'operationId' => 'VirtualNetworkRules_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkRule']]]
                ],
                'put' => [
                    'operationId' => 'VirtualNetworkRules_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/VirtualNetworkRule'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkRule']],
                        '202' => [],
                        '201' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkRule']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'VirtualNetworkRules_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'virtualNetworkRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2015-05-01-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/virtualNetworkRules' => ['get' => [
                'operationId' => 'VirtualNetworkRules_ListByServer',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2015-05-01-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualNetworkRuleListResult']]]
            ]]
        ],
        'definitions' => [
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'ProxyResource' => ['properties' => []],
            'RecommendedActionStateInfo' => ['properties' => [
                'currentValue' => [
                    'type' => 'string',
                    'enum' => [
                        'Active',
                        'Pending',
                        'Executing',
                        'Verifying',
                        'PendingRevert',
                        'RevertCancelled',
                        'Reverting',
                        'Reverted',
                        'Ignored',
                        'Expired',
                        'Monitoring',
                        'Resolved',
                        'Success',
                        'Error'
                    ]
                ],
                'actionInitiatedBy' => [
                    'type' => 'string',
                    'enum' => [
                        'User',
                        'System'
                    ]
                ],
                'lastModified' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'RecommendedActionImplementationInfo' => ['properties' => [
                'method' => [
                    'type' => 'string',
                    'enum' => [
                        'TSql',
                        'AzurePowerShell'
                    ]
                ],
                'script' => ['type' => 'string']
            ]],
            'RecommendedActionErrorInfo' => ['properties' => [
                'errorCode' => ['type' => 'string'],
                'isRetryable' => [
                    'type' => 'string',
                    'enum' => [
                        'Yes',
                        'No'
                    ]
                ]
            ]],
            'RecommendedActionImpactRecord' => ['properties' => [
                'dimensionName' => ['type' => 'string'],
                'unit' => ['type' => 'string'],
                'absoluteValue' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'changeValueAbsolute' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'changeValueRelative' => [
                    'type' => 'number',
                    'format' => 'double'
                ]
            ]],
            'RecommendedActionMetricInfo' => ['properties' => [
                'metricName' => ['type' => 'string'],
                'unit' => ['type' => 'string'],
                'timeGrain' => ['type' => 'string'],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'value' => [
                    'type' => 'number',
                    'format' => 'double'
                ]
            ]],
            'RecommendedActionProperties' => ['properties' => [
                'recommendationReason' => ['type' => 'string'],
                'validSince' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastRefresh' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'state' => ['$ref' => '#/definitions/RecommendedActionStateInfo'],
                'isExecutableAction' => ['type' => 'boolean'],
                'isRevertableAction' => ['type' => 'boolean'],
                'isArchivedAction' => ['type' => 'boolean'],
                'executeActionStartTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'executeActionDuration' => ['type' => 'string'],
                'revertActionStartTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'revertActionDuration' => ['type' => 'string'],
                'executeActionInitiatedBy' => [
                    'type' => 'string',
                    'enum' => [
                        'User',
                        'System'
                    ]
                ],
                'executeActionInitiatedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'revertActionInitiatedBy' => [
                    'type' => 'string',
                    'enum' => [
                        'User',
                        'System'
                    ]
                ],
                'revertActionInitiatedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'score' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'implementationDetails' => ['$ref' => '#/definitions/RecommendedActionImplementationInfo'],
                'errorDetails' => ['$ref' => '#/definitions/RecommendedActionErrorInfo'],
                'estimatedImpact' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RecommendedActionImpactRecord']
                ],
                'observedImpact' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RecommendedActionImpactRecord']
                ],
                'timeSeries' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RecommendedActionMetricInfo']
                ],
                'linkedObjects' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'details' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'object']
                ]
            ]],
            'RecommendedAction' => ['properties' => [
                'kind' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/RecommendedActionProperties']
            ]],
            'AdvisorProperties' => ['properties' => [
                'advisorStatus' => [
                    'type' => 'string',
                    'enum' => [
                        'GA',
                        'PublicPreview',
                        'LimitedPublicPreview',
                        'PrivatePreview'
                    ]
                ],
                'autoExecuteStatus' => [
                    'type' => 'string',
                    'enum' => [
                        'Enabled',
                        'Disabled',
                        'Default'
                    ]
                ],
                'autoExecuteStatusInheritedFrom' => [
                    'type' => 'string',
                    'enum' => [
                        'Default',
                        'Subscription',
                        'Server',
                        'ElasticPool',
                        'Database'
                    ]
                ],
                'recommendationsStatus' => ['type' => 'string'],
                'lastChecked' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'recommendedActions' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RecommendedAction']
                ]
            ]],
            'Advisor' => ['properties' => [
                'kind' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/AdvisorProperties']
            ]],
            'DatabaseBlobAuditingPolicyProperties' => ['properties' => [
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'Enabled',
                        'Disabled'
                    ]
                ],
                'storageEndpoint' => ['type' => 'string'],
                'storageAccountAccessKey' => ['type' => 'string'],
                'retentionDays' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'auditActionsAndGroups' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'storageAccountSubscriptionId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'isStorageSecondaryKeyInUse' => ['type' => 'boolean']
            ]],
            'DatabaseBlobAuditingPolicy' => ['properties' => [
                'kind' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/DatabaseBlobAuditingPolicyProperties']
            ]],
            'EncryptionProtectorProperties' => ['properties' => [
                'subregion' => ['type' => 'string'],
                'serverKeyName' => ['type' => 'string'],
                'serverKeyType' => [
                    'type' => 'string',
                    'enum' => [
                        'ServiceManaged',
                        'AzureKeyVault'
                    ]
                ],
                'uri' => ['type' => 'string'],
                'thumbprint' => ['type' => 'string']
            ]],
            'EncryptionProtector' => ['properties' => [
                'kind' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/EncryptionProtectorProperties']
            ]],
            'EncryptionProtectorListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/EncryptionProtector']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'FailoverGroupReadWriteEndpoint' => ['properties' => [
                'failoverPolicy' => [
                    'type' => 'string',
                    'enum' => [
                        'Manual',
                        'Automatic'
                    ]
                ],
                'failoverWithDataLossGracePeriodMinutes' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'FailoverGroupReadOnlyEndpoint' => ['properties' => ['failoverPolicy' => [
                'type' => 'string',
                'enum' => [
                    'Disabled',
                    'Enabled'
                ]
            ]]],
            'PartnerInfo' => ['properties' => [
                'id' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'replicationRole' => [
                    'type' => 'string',
                    'enum' => [
                        'Primary',
                        'Secondary'
                    ]
                ]
            ]],
            'FailoverGroupProperties' => ['properties' => [
                'readWriteEndpoint' => ['$ref' => '#/definitions/FailoverGroupReadWriteEndpoint'],
                'readOnlyEndpoint' => ['$ref' => '#/definitions/FailoverGroupReadOnlyEndpoint'],
                'replicationRole' => [
                    'type' => 'string',
                    'enum' => [
                        'Primary',
                        'Secondary'
                    ]
                ],
                'replicationState' => ['type' => 'string'],
                'partnerServers' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/PartnerInfo']
                ],
                'databases' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'FailoverGroup' => ['properties' => [
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'properties' => ['$ref' => '#/definitions/FailoverGroupProperties']
            ]],
            'FailoverGroupUpdateProperties' => ['properties' => [
                'readWriteEndpoint' => ['$ref' => '#/definitions/FailoverGroupReadWriteEndpoint'],
                'readOnlyEndpoint' => ['$ref' => '#/definitions/FailoverGroupReadOnlyEndpoint'],
                'databases' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'FailoverGroupUpdate' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/FailoverGroupUpdateProperties'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'FailoverGroupListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/FailoverGroup']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ServerKeyProperties' => ['properties' => [
                'subregion' => ['type' => 'string'],
                'serverKeyType' => [
                    'type' => 'string',
                    'enum' => [
                        'ServiceManaged',
                        'AzureKeyVault'
                    ]
                ],
                'uri' => ['type' => 'string'],
                'thumbprint' => ['type' => 'string'],
                'creationDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'ServerKey' => ['properties' => [
                'kind' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ServerKeyProperties']
            ]],
            'ServerKeyListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ServerKey']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ResourceIdentity' => ['properties' => [
                'principalId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => ['SystemAssigned']
                ],
                'tenantId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ]
            ]],
            'ServerProperties' => ['properties' => [
                'administratorLogin' => ['type' => 'string'],
                'administratorLoginPassword' => ['type' => 'string'],
                'version' => ['type' => 'string'],
                'state' => ['type' => 'string'],
                'fullyQualifiedDomainName' => ['type' => 'string']
            ]],
            'Server' => ['properties' => [
                'identity' => ['$ref' => '#/definitions/ResourceIdentity'],
                'kind' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ServerProperties']
            ]],
            'ServerListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Server']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'TrackedResource' => ['properties' => [
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'ServerUpdate' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ServerProperties'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'SyncAgentProperties' => ['properties' => [
                'name' => ['type' => 'string'],
                'syncDatabaseId' => ['type' => 'string'],
                'lastAliveTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'Online',
                        'Offline',
                        'NeverConnected'
                    ]
                ],
                'isUpToDate' => ['type' => 'boolean'],
                'expiryTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'version' => ['type' => 'string']
            ]],
            'SyncAgent' => ['properties' => ['properties' => ['$ref' => '#/definitions/SyncAgentProperties']]],
            'SyncAgentListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SyncAgent']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'SyncAgentKeyProperties' => ['properties' => ['syncAgentKey' => ['type' => 'string']]],
            'SyncAgentLinkedDatabaseProperties' => ['properties' => [
                'databaseType' => [
                    'type' => 'string',
                    'enum' => [
                        'AzureSqlDatabase',
                        'SqlServerDatabase'
                    ]
                ],
                'databaseId' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'serverName' => ['type' => 'string'],
                'databaseName' => ['type' => 'string'],
                'userName' => ['type' => 'string']
            ]],
            'SyncAgentLinkedDatabase' => ['properties' => ['properties' => ['$ref' => '#/definitions/SyncAgentLinkedDatabaseProperties']]],
            'SyncAgentLinkedDatabaseListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SyncAgentLinkedDatabase']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'SyncDatabaseIdProperties' => ['properties' => ['id' => ['type' => 'string']]],
            'SyncDatabaseIdListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SyncDatabaseIdProperties']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'SyncFullSchemaTableColumn' => ['properties' => [
                'dataSize' => ['type' => 'string'],
                'dataType' => ['type' => 'string'],
                'errorId' => ['type' => 'string'],
                'hasError' => ['type' => 'boolean'],
                'isPrimaryKey' => ['type' => 'boolean'],
                'name' => ['type' => 'string'],
                'quotedName' => ['type' => 'string']
            ]],
            'SyncFullSchemaTable' => ['properties' => [
                'columns' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SyncFullSchemaTableColumn']
                ],
                'errorId' => ['type' => 'string'],
                'hasError' => ['type' => 'boolean'],
                'name' => ['type' => 'string'],
                'quotedName' => ['type' => 'string']
            ]],
            'SyncFullSchemaProperties' => ['properties' => [
                'tables' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SyncFullSchemaTable']
                ],
                'lastUpdateTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'SyncFullSchemaPropertiesListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SyncFullSchemaProperties']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'SyncGroupLogProperties' => ['properties' => [
                'timestamp' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'All',
                        'Error',
                        'Warning',
                        'Success'
                    ]
                ],
                'source' => ['type' => 'string'],
                'details' => ['type' => 'string'],
                'tracingId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'operationStatus' => ['type' => 'string']
            ]],
            'SyncGroupLogListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SyncGroupLogProperties']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'SyncGroupSchemaTableColumn' => ['properties' => [
                'quotedName' => ['type' => 'string'],
                'dataSize' => ['type' => 'string'],
                'dataType' => ['type' => 'string']
            ]],
            'SyncGroupSchemaTable' => ['properties' => [
                'columns' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SyncGroupSchemaTableColumn']
                ],
                'quotedName' => ['type' => 'string']
            ]],
            'SyncGroupSchema' => ['properties' => [
                'tables' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SyncGroupSchemaTable']
                ],
                'masterSyncMemberName' => ['type' => 'string']
            ]],
            'SyncGroupProperties' => ['properties' => [
                'interval' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'lastSyncTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'conflictResolutionPolicy' => [
                    'type' => 'string',
                    'enum' => [
                        'HubWin',
                        'MemberWin'
                    ]
                ],
                'syncDatabaseId' => ['type' => 'string'],
                'hubDatabaseUserName' => ['type' => 'string'],
                'hubDatabasePassword' => ['type' => 'string'],
                'syncState' => [
                    'type' => 'string',
                    'enum' => [
                        'NotReady',
                        'Error',
                        'Warning',
                        'Progressing',
                        'Good'
                    ]
                ],
                'schema' => ['$ref' => '#/definitions/SyncGroupSchema']
            ]],
            'SyncGroup' => ['properties' => ['properties' => ['$ref' => '#/definitions/SyncGroupProperties']]],
            'SyncGroupListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SyncGroup']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'SyncMemberProperties' => ['properties' => [
                'databaseType' => [
                    'type' => 'string',
                    'enum' => [
                        'AzureSqlDatabase',
                        'SqlServerDatabase'
                    ]
                ],
                'syncAgentId' => ['type' => 'string'],
                'sqlServerDatabaseId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'serverName' => ['type' => 'string'],
                'databaseName' => ['type' => 'string'],
                'userName' => ['type' => 'string'],
                'password' => ['type' => 'string'],
                'syncDirection' => [
                    'type' => 'string',
                    'enum' => [
                        'Bidirectional',
                        'OneWayMemberToHub',
                        'OneWayHubToMember'
                    ]
                ],
                'syncState' => [
                    'type' => 'string',
                    'enum' => [
                        'SyncInProgress',
                        'SyncSucceeded',
                        'SyncFailed',
                        'DisabledTombstoneCleanup',
                        'DisabledBackupRestore',
                        'SyncSucceededWithWarnings',
                        'SyncCancelling',
                        'SyncCancelled',
                        'UnProvisioned',
                        'Provisioning',
                        'Provisioned',
                        'ProvisionFailed',
                        'DeProvisioning',
                        'DeProvisioned',
                        'DeProvisionFailed',
                        'Reprovisioning',
                        'ReprovisionFailed',
                        'UnReprovisioned'
                    ]
                ]
            ]],
            'SyncMember' => ['properties' => ['properties' => ['$ref' => '#/definitions/SyncMemberProperties']]],
            'SyncMemberListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SyncMember']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'VirtualNetworkRuleProperties' => ['properties' => [
                'virtualNetworkSubnetId' => ['type' => 'string'],
                'ignoreVnetPrivateAccessConfiguration' => ['type' => 'boolean'],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'Initializing',
                        'InProgress',
                        'Ready',
                        'Deleting',
                        'Unknown'
                    ]
                ]
            ]],
            'VirtualNetworkRule' => ['properties' => ['properties' => ['$ref' => '#/definitions/VirtualNetworkRuleProperties']]],
            'VirtualNetworkRuleListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualNetworkRule']
                ],
                'nextLink' => ['type' => 'string']
            ]]
        ]
    ];
}
