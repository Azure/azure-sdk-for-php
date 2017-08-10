<?php
namespace Microsoft\Azure\Management\KeyVault;
final class KeyVaultManagementClient
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
        $this->_Vaults_group = new \Microsoft\Azure\Management\KeyVault\Vaults($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\KeyVault\Vaults
     */
    public function getVaults()
    {
        return $this->_Vaults_group;
    }
    /**
     * @var \Microsoft\Azure\Management\KeyVault\Vaults
     */
    private $_Vaults_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.KeyVault/vaults/{vaultName}' => [
                'put' => [
                    'operationId' => 'Vaults_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-10-01']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VaultCreateOrUpdateParameters']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/Vault']],
                        '200' => ['schema' => ['$ref' => '#/definitions/Vault']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Vaults_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-10-01']
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
                    'operationId' => 'Vaults_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-10-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Vault']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.KeyVault/vaults' => ['get' => [
                'operationId' => 'Vaults_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-10-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VaultListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.KeyVault/deletedVaults' => ['get' => [
                'operationId' => 'Vaults_ListDeleted',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-10-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeletedVaultListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.KeyVault/locations/{location}/deletedVaults/{vaultName}' => ['get' => [
                'operationId' => 'Vaults_GetDeleted',
                'parameters' => [
                    [
                        'name' => 'vaultName',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-10-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeletedVault']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.KeyVault/locations/{location}/deletedVaults/{vaultName}/purge' => ['post' => [
                'operationId' => 'Vaults_PurgeDeleted',
                'parameters' => [
                    [
                        'name' => 'vaultName',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-10-01']
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
            '/subscriptions/{subscriptionId}/resources' => ['get' => [
                'operationId' => 'Vaults_List',
                'parameters' => [
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['resourceType eq \'Microsoft.KeyVault/vaults\'']
                    ],
                    [
                        'name' => '$top',
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
                        'enum' => ['2015-11-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceListResult']]]
            ]]
        ],
        'definitions' => [
            'Sku' => [
                'properties' => [
                    'family' => ['type' => 'string'],
                    'name' => [
                        'type' => 'string',
                        'enum' => [
                            'standard',
                            'premium'
                        ]
                    ]
                ],
                'required' => [
                    'family',
                    'name'
                ]
            ],
            'Permissions' => [
                'properties' => [
                    'keys' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'encrypt',
                                'decrypt',
                                'wrapKey',
                                'unwrapKey',
                                'sign',
                                'verify',
                                'get',
                                'list',
                                'create',
                                'update',
                                'import',
                                'delete',
                                'backup',
                                'restore',
                                'recover',
                                'purge'
                            ]
                        ]
                    ],
                    'secrets' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'get',
                                'list',
                                'set',
                                'delete',
                                'backup',
                                'restore',
                                'recover',
                                'purge'
                            ]
                        ]
                    ],
                    'certificates' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'get',
                                'list',
                                'delete',
                                'create',
                                'import',
                                'update',
                                'managecontacts',
                                'getissuers',
                                'listissuers',
                                'setissuers',
                                'deleteissuers',
                                'manageissuers',
                                'recover',
                                'purge'
                            ]
                        ]
                    ],
                    'storage' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'get',
                                'list',
                                'delete',
                                'set',
                                'update',
                                'regeneratekey',
                                'setsas',
                                'listsas',
                                'getsas',
                                'deletesas'
                            ]
                        ]
                    ]
                ],
                'required' => []
            ],
            'AccessPolicyEntry' => [
                'properties' => [
                    'tenantId' => [
                        'type' => 'string',
                        'format' => 'uuid'
                    ],
                    'objectId' => ['type' => 'string'],
                    'applicationId' => [
                        'type' => 'string',
                        'format' => 'uuid'
                    ],
                    'permissions' => ['$ref' => '#/definitions/Permissions']
                ],
                'required' => [
                    'tenantId',
                    'objectId',
                    'permissions'
                ]
            ],
            'VaultProperties' => [
                'properties' => [
                    'tenantId' => [
                        'type' => 'string',
                        'format' => 'uuid'
                    ],
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'accessPolicies' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AccessPolicyEntry']
                    ],
                    'vaultUri' => ['type' => 'string'],
                    'enabledForDeployment' => ['type' => 'boolean'],
                    'enabledForDiskEncryption' => ['type' => 'boolean'],
                    'enabledForTemplateDeployment' => ['type' => 'boolean'],
                    'enableSoftDelete' => ['type' => 'boolean'],
                    'createMode' => [
                        'type' => 'string',
                        'enum' => [
                            'recover',
                            'default'
                        ]
                    ]
                ],
                'required' => [
                    'tenantId',
                    'sku'
                ]
            ],
            'DeletedVaultProperties' => [
                'properties' => [
                    'vaultId' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'deletionDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'scheduledPurgeDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'VaultCreateOrUpdateParameters' => [
                'properties' => [
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'properties' => ['$ref' => '#/definitions/VaultProperties']
                ],
                'required' => [
                    'location',
                    'properties'
                ]
            ],
            'Vault' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/VaultProperties']],
                'required' => ['properties']
            ],
            'DeletedVault' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/DeletedVaultProperties']
                ],
                'required' => []
            ],
            'VaultListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Vault']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'DeletedVaultListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DeletedVault']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
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
                'required' => [
                    'name',
                    'location'
                ]
            ],
            'ResourceListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Resource']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ]
        ]
    ];
}
