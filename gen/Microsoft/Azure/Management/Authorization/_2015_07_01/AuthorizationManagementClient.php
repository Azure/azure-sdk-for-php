<?php
namespace Microsoft\Azure\Management\Authorization\_2015_07_01;
final class AuthorizationManagementClient
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
        $this->_ClassicAdministrators_group = new \Microsoft\Azure\Management\Authorization\_2015_07_01\ClassicAdministrators($_client);
        $this->_Permissions_group = new \Microsoft\Azure\Management\Authorization\_2015_07_01\Permissions($_client);
        $this->_ProviderOperationsMetadata_group = new \Microsoft\Azure\Management\Authorization\_2015_07_01\ProviderOperationsMetadata($_client);
        $this->_RoleAssignments_group = new \Microsoft\Azure\Management\Authorization\_2015_07_01\RoleAssignments($_client);
        $this->_RoleDefinitions_group = new \Microsoft\Azure\Management\Authorization\_2015_07_01\RoleDefinitions($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Authorization\_2015_07_01\ClassicAdministrators
     */
    public function getClassicAdministrators()
    {
        return $this->_ClassicAdministrators_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Authorization\_2015_07_01\Permissions
     */
    public function getPermissions()
    {
        return $this->_Permissions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Authorization\_2015_07_01\ProviderOperationsMetadata
     */
    public function getProviderOperationsMetadata()
    {
        return $this->_ProviderOperationsMetadata_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Authorization\_2015_07_01\RoleAssignments
     */
    public function getRoleAssignments()
    {
        return $this->_RoleAssignments_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Authorization\_2015_07_01\RoleDefinitions
     */
    public function getRoleDefinitions()
    {
        return $this->_RoleDefinitions_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Authorization\_2015_07_01\ClassicAdministrators
     */
    private $_ClassicAdministrators_group;
    /**
     * @var \Microsoft\Azure\Management\Authorization\_2015_07_01\Permissions
     */
    private $_Permissions_group;
    /**
     * @var \Microsoft\Azure\Management\Authorization\_2015_07_01\ProviderOperationsMetadata
     */
    private $_ProviderOperationsMetadata_group;
    /**
     * @var \Microsoft\Azure\Management\Authorization\_2015_07_01\RoleAssignments
     */
    private $_RoleAssignments_group;
    /**
     * @var \Microsoft\Azure\Management\Authorization\_2015_07_01\RoleDefinitions
     */
    private $_RoleDefinitions_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/providers/Microsoft.Authorization/classicAdministrators' => ['get' => [
                'operationId' => 'ClassicAdministrators_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-07-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ClassicAdministratorListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.Authorization/permissions' => ['get' => [
                'operationId' => 'Permissions_ListForResourceGroup',
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
                        'enum' => ['2015-07-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PermissionGetResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/{resourceProviderNamespace}/{parentResourcePath}/{resourceType}/{resourceName}/providers/Microsoft.Authorization/permissions' => ['get' => [
                'operationId' => 'Permissions_ListForResource',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceProviderNamespace',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parentResourcePath',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceType',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-07-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PermissionGetResult']]]
            ]],
            '/providers/Microsoft.Authorization/providerOperations/{resourceProviderNamespace}' => ['get' => [
                'operationId' => 'ProviderOperationsMetadata_Get',
                'parameters' => [
                    [
                        'name' => 'resourceProviderNamespace',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-07-01']
                    ],
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProviderOperationsMetadata']]]
            ]],
            '/providers/Microsoft.Authorization/providerOperations' => ['get' => [
                'operationId' => 'ProviderOperationsMetadata_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-07-01']
                    ],
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProviderOperationsMetadataListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/{resourceProviderNamespace}/{parentResourcePath}/{resourceType}/{resourceName}/providers/Microsoft.Authorization/roleAssignments' => ['get' => [
                'operationId' => 'RoleAssignments_ListForResource',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceProviderNamespace',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parentResourcePath',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceType',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-07-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleAssignmentListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Authorization/roleAssignments' => ['get' => [
                'operationId' => 'RoleAssignments_ListForResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-07-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleAssignmentListResult']]]
            ]],
            '/{scope}/providers/Microsoft.Authorization/roleAssignments/{roleAssignmentName}' => [
                'delete' => [
                    'operationId' => 'RoleAssignments_Delete',
                    'parameters' => [
                        [
                            'name' => 'scope',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'roleAssignmentName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-07-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleAssignment']]]
                ],
                'put' => [
                    'operationId' => 'RoleAssignments_Create',
                    'parameters' => [
                        [
                            'name' => 'scope',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'roleAssignmentName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/RoleAssignmentCreateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-07-01']
                        ]
                    ],
                    'responses' => ['201' => ['schema' => ['$ref' => '#/definitions/RoleAssignment']]]
                ],
                'get' => [
                    'operationId' => 'RoleAssignments_Get',
                    'parameters' => [
                        [
                            'name' => 'scope',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'roleAssignmentName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-07-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleAssignment']]]
                ]
            ],
            '/{roleAssignmentId}' => [
                'delete' => [
                    'operationId' => 'RoleAssignments_DeleteById',
                    'parameters' => [
                        [
                            'name' => 'roleAssignmentId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-07-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleAssignment']]]
                ],
                'put' => [
                    'operationId' => 'RoleAssignments_CreateById',
                    'parameters' => [
                        [
                            'name' => 'roleAssignmentId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/RoleAssignmentCreateParameters'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-07-01']
                        ]
                    ],
                    'responses' => ['201' => ['schema' => ['$ref' => '#/definitions/RoleAssignment']]]
                ],
                'get' => [
                    'operationId' => 'RoleAssignments_GetById',
                    'parameters' => [
                        [
                            'name' => 'roleAssignmentId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-07-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleAssignment']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Authorization/roleAssignments' => ['get' => [
                'operationId' => 'RoleAssignments_List',
                'parameters' => [
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-07-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleAssignmentListResult']]]
            ]],
            '/{scope}/providers/Microsoft.Authorization/roleAssignments' => ['get' => [
                'operationId' => 'RoleAssignments_ListForScope',
                'parameters' => [
                    [
                        'name' => 'scope',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-07-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleAssignmentListResult']]]
            ]],
            '/{scope}/providers/Microsoft.Authorization/roleDefinitions/{roleDefinitionId}' => [
                'delete' => [
                    'operationId' => 'RoleDefinitions_Delete',
                    'parameters' => [
                        [
                            'name' => 'scope',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'roleDefinitionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-07-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleDefinition']]]
                ],
                'get' => [
                    'operationId' => 'RoleDefinitions_Get',
                    'parameters' => [
                        [
                            'name' => 'scope',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'roleDefinitionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-07-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleDefinition']]]
                ],
                'put' => [
                    'operationId' => 'RoleDefinitions_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'scope',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'roleDefinitionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'roleDefinition',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/RoleDefinition'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-07-01']
                        ]
                    ],
                    'responses' => ['201' => ['schema' => ['$ref' => '#/definitions/RoleDefinition']]]
                ]
            ],
            '/{roleDefinitionId}' => ['get' => [
                'operationId' => 'RoleDefinitions_GetById',
                'parameters' => [
                    [
                        'name' => 'roleDefinitionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-07-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleDefinition']]]
            ]],
            '/{scope}/providers/Microsoft.Authorization/roleDefinitions' => ['get' => [
                'operationId' => 'RoleDefinitions_List',
                'parameters' => [
                    [
                        'name' => 'scope',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-07-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RoleDefinitionListResult']]]
            ]]
        ],
        'definitions' => [
            'RoleAssignmentFilter' => ['properties' => ['principalId' => ['type' => 'string']]],
            'RoleDefinitionFilter' => ['properties' => ['roleName' => ['type' => 'string']]],
            'ClassicAdministratorProperties' => ['properties' => [
                'emailAddress' => ['type' => 'string'],
                'role' => ['type' => 'string']
            ]],
            'ClassicAdministrator' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ClassicAdministratorProperties']
            ]],
            'ClassicAdministratorListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ClassicAdministrator']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'Permission' => ['properties' => [
                'actions' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'notActions' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'PermissionGetResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Permission']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ProviderOperation' => ['properties' => [
                'name' => ['type' => 'string'],
                'displayName' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'origin' => ['type' => 'string'],
                'properties' => ['type' => 'object']
            ]],
            'ResourceType' => ['properties' => [
                'name' => ['type' => 'string'],
                'displayName' => ['type' => 'string'],
                'operations' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ProviderOperation']
                ]
            ]],
            'ProviderOperationsMetadata' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'displayName' => ['type' => 'string'],
                'resourceTypes' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ResourceType']
                ],
                'operations' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ProviderOperation']
                ]
            ]],
            'ProviderOperationsMetadataListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ProviderOperationsMetadata']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'RoleAssignmentPropertiesWithScope' => ['properties' => [
                'scope' => ['type' => 'string'],
                'roleDefinitionId' => ['type' => 'string'],
                'principalId' => ['type' => 'string']
            ]],
            'RoleAssignment' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/RoleAssignmentPropertiesWithScope']
            ]],
            'RoleAssignmentListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RoleAssignment']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'RoleAssignmentProperties' => ['properties' => [
                'roleDefinitionId' => ['type' => 'string'],
                'principalId' => ['type' => 'string']
            ]],
            'RoleAssignmentCreateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/RoleAssignmentProperties']]],
            'RoleDefinitionProperties' => ['properties' => [
                'roleName' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'permissions' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Permission']
                ],
                'assignableScopes' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'RoleDefinition' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/RoleDefinitionProperties']
            ]],
            'RoleDefinitionListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RoleDefinition']
                ],
                'nextLink' => ['type' => 'string']
            ]]
        ]
    ];
}
