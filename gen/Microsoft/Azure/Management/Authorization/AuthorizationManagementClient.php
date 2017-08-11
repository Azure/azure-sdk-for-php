<?php
namespace Microsoft\Azure\Management\Authorization;
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
        $this->_ClassicAdministrators_group = new \Microsoft\Azure\Management\Authorization\ClassicAdministrators($_client);
        $this->_Permissions_group = new \Microsoft\Azure\Management\Authorization\Permissions($_client);
        $this->_ProviderOperationsMetadata_group = new \Microsoft\Azure\Management\Authorization\ProviderOperationsMetadata($_client);
        $this->_RoleAssignments_group = new \Microsoft\Azure\Management\Authorization\RoleAssignments($_client);
        $this->_RoleDefinitions_group = new \Microsoft\Azure\Management\Authorization\RoleDefinitions($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Authorization\ClassicAdministrators
     */
    public function getClassicAdministrators()
    {
        return $this->_ClassicAdministrators_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Authorization\Permissions
     */
    public function getPermissions()
    {
        return $this->_Permissions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Authorization\ProviderOperationsMetadata
     */
    public function getProviderOperationsMetadata()
    {
        return $this->_ProviderOperationsMetadata_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Authorization\RoleAssignments
     */
    public function getRoleAssignments()
    {
        return $this->_RoleAssignments_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Authorization\RoleDefinitions
     */
    public function getRoleDefinitions()
    {
        return $this->_RoleDefinitions_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Authorization\ClassicAdministrators
     */
    private $_ClassicAdministrators_group;
    /**
     * @var \Microsoft\Azure\Management\Authorization\Permissions
     */
    private $_Permissions_group;
    /**
     * @var \Microsoft\Azure\Management\Authorization\ProviderOperationsMetadata
     */
    private $_ProviderOperationsMetadata_group;
    /**
     * @var \Microsoft\Azure\Management\Authorization\RoleAssignments
     */
    private $_RoleAssignments_group;
    /**
     * @var \Microsoft\Azure\Management\Authorization\RoleDefinitions
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
                            'schema' => ['$ref' => '#/definitions/RoleAssignmentCreateParameters']
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
                            'schema' => ['$ref' => '#/definitions/RoleAssignmentCreateParameters']
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
                            'schema' => ['$ref' => '#/definitions/RoleDefinition']
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
            'RoleAssignmentFilter' => [
                'properties' => ['principalId' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RoleDefinitionFilter' => [
                'properties' => ['roleName' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClassicAdministratorProperties' => [
                'properties' => [
                    'emailAddress' => ['type' => 'string'],
                    'role' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClassicAdministrator' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/ClassicAdministratorProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClassicAdministratorListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ClassicAdministrator']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Permission' => [
                'properties' => [
                    'actions' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'notActions' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PermissionGetResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Permission']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProviderOperation' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'displayName' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'origin' => ['type' => 'string'],
                    'properties' => ['type' => 'object']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceType' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'displayName' => ['type' => 'string'],
                    'operations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ProviderOperation']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProviderOperationsMetadata' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProviderOperationsMetadataListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ProviderOperationsMetadata']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RoleAssignmentPropertiesWithScope' => [
                'properties' => [
                    'scope' => ['type' => 'string'],
                    'roleDefinitionId' => ['type' => 'string'],
                    'principalId' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RoleAssignment' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/RoleAssignmentPropertiesWithScope']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RoleAssignmentListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RoleAssignment']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RoleAssignmentProperties' => [
                'properties' => [
                    'roleDefinitionId' => ['type' => 'string'],
                    'principalId' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RoleAssignmentCreateParameters' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RoleAssignmentProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RoleDefinitionProperties' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RoleDefinition' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/RoleDefinitionProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RoleDefinitionListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RoleDefinition']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
