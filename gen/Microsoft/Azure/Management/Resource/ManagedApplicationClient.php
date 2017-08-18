<?php
namespace Microsoft\Azure\Management\Resource;
final class ManagedApplicationClient
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
        $this->_Appliances_group = new \Microsoft\Azure\Management\Resource\Appliances($_client);
        $this->_ApplianceDefinitions_group = new \Microsoft\Azure\Management\Resource\ApplianceDefinitions($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Resource\Appliances
     */
    public function getAppliances()
    {
        return $this->_Appliances_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Resource\ApplianceDefinitions
     */
    public function getApplianceDefinitions()
    {
        return $this->_ApplianceDefinitions_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Resource\Appliances
     */
    private $_Appliances_group;
    /**
     * @var \Microsoft\Azure\Management\Resource\ApplianceDefinitions
     */
    private $_ApplianceDefinitions_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Solutions/appliances/{applianceName}' => [
                'get' => [
                    'operationId' => 'Appliances_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'applianceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Appliance']],
                        '404' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Appliances_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'applianceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '204' => [],
                        '202' => []
                    ]
                ],
                'put' => [
                    'operationId' => 'Appliances_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'applianceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Appliance']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Appliance']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Appliance']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Appliances_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'applianceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => FALSE,
                            'schema' => ['$ref' => '#/definitions/Appliance']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Appliance']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Solutions/appliances' => ['get' => [
                'operationId' => 'Appliances_ListByResourceGroup',
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
                        'enum' => ['2016-09-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplianceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Solutions/appliances' => ['get' => [
                'operationId' => 'Appliances_ListBySubscription',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplianceListResult']]]
            ]],
            '/{applianceId}' => [
                'get' => [
                    'operationId' => 'Appliances_GetById',
                    'parameters' => [
                        [
                            'name' => 'applianceId',
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
                            'enum' => ['2016-09-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Appliance']],
                        '404' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Appliances_DeleteById',
                    'parameters' => [
                        [
                            'name' => 'applianceId',
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
                            'enum' => ['2016-09-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '204' => [],
                        '202' => []
                    ]
                ],
                'put' => [
                    'operationId' => 'Appliances_CreateOrUpdateById',
                    'parameters' => [
                        [
                            'name' => 'applianceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Appliance']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Appliance']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Appliance']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Appliances_UpdateById',
                    'parameters' => [
                        [
                            'name' => 'applianceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => FALSE,
                            'schema' => ['$ref' => '#/definitions/Appliance']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Appliance']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Solutions/applianceDefinitions/{applianceDefinitionName}' => [
                'get' => [
                    'operationId' => 'ApplianceDefinitions_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'applianceDefinitionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ApplianceDefinition']],
                        '404' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'ApplianceDefinitions_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'applianceDefinitionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '204' => [],
                        '200' => [],
                        '202' => []
                    ]
                ],
                'put' => [
                    'operationId' => 'ApplianceDefinitions_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'applianceDefinitionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ApplianceDefinition']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ApplianceDefinition']],
                        '201' => ['schema' => ['$ref' => '#/definitions/ApplianceDefinition']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Solutions/applianceDefinitions' => ['get' => [
                'operationId' => 'ApplianceDefinitions_ListByResourceGroup',
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
                        'enum' => ['2016-09-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplianceDefinitionListResult']]]
            ]],
            '/{applianceDefinitionId}' => [
                'get' => [
                    'operationId' => 'ApplianceDefinitions_GetById',
                    'parameters' => [
                        [
                            'name' => 'applianceDefinitionId',
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
                            'enum' => ['2016-09-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ApplianceDefinition']],
                        '404' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'ApplianceDefinitions_DeleteById',
                    'parameters' => [
                        [
                            'name' => 'applianceDefinitionId',
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
                            'enum' => ['2016-09-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '204' => [],
                        '200' => [],
                        '202' => []
                    ]
                ],
                'put' => [
                    'operationId' => 'ApplianceDefinitions_CreateOrUpdateById',
                    'parameters' => [
                        [
                            'name' => 'applianceDefinitionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ApplianceDefinition']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01-preview']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ApplianceDefinition']],
                        '201' => ['schema' => ['$ref' => '#/definitions/ApplianceDefinition']]
                    ]
                ]
            ]
        ],
        'definitions' => [
            'ApplianceProperties' => [
                'properties' => [
                    'managedResourceGroupId' => ['type' => 'string'],
                    'applianceDefinitionId' => ['type' => 'string'],
                    'parameters' => ['type' => 'object'],
                    'outputs' => [
                        'type' => 'object',
                        'readOnly' => TRUE
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
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
                            'Updating'
                        ],
                        'readOnly' => TRUE
                    ],
                    'uiDefinitionUri' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['managedResourceGroupId']
            ],
            'Plan' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'publisher' => ['type' => 'string'],
                    'product' => ['type' => 'string'],
                    'promotionCode' => ['type' => 'string'],
                    'version' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'publisher',
                    'product',
                    'version'
                ]
            ],
            'Appliance' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ApplianceProperties'],
                    'plan' => ['$ref' => '#/definitions/Plan'],
                    'kind' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'properties',
                    'kind'
                ]
            ],
            'AppliancePropertiesPatchable' => [
                'properties' => [
                    'managedResourceGroupId' => ['type' => 'string'],
                    'applianceDefinitionId' => ['type' => 'string'],
                    'parameters' => ['type' => 'object'],
                    'outputs' => [
                        'type' => 'object',
                        'readOnly' => TRUE
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'enum' => [
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
                            'Updating'
                        ],
                        'readOnly' => TRUE
                    ],
                    'uiDefinitionUri' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'PlanPatchable' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'publisher' => ['type' => 'string'],
                    'product' => ['type' => 'string'],
                    'promotionCode' => ['type' => 'string'],
                    'version' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AppliancePatchable' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/AppliancePropertiesPatchable'],
                    'plan' => ['$ref' => '#/definitions/PlanPatchable'],
                    'kind' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplianceProviderAuthorization' => [
                'properties' => [
                    'principalId' => ['type' => 'string'],
                    'roleDefinitionId' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'principalId',
                    'roleDefinitionId'
                ]
            ],
            'ApplianceArtifact' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'uri' => ['type' => 'string'],
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'Template',
                            'Custom'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplianceDefinitionProperties' => [
                'properties' => [
                    'lockLevel' => [
                        'type' => 'string',
                        'enum' => [
                            'CanNotDelete',
                            'ReadOnly',
                            'None'
                        ]
                    ],
                    'displayName' => ['type' => 'string'],
                    'authorizations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplianceProviderAuthorization']
                    ],
                    'artifacts' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplianceArtifact']
                    ],
                    'description' => ['type' => 'string'],
                    'packageFileUri' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'lockLevel',
                    'authorizations',
                    'packageFileUri'
                ]
            ],
            'ApplianceDefinition' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ApplianceDefinitionProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'Sku' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'tier' => ['type' => 'string'],
                    'size' => ['type' => 'string'],
                    'family' => ['type' => 'string'],
                    'model' => ['type' => 'string'],
                    'capacity' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['name']
            ],
            'Identity' => [
                'properties' => [
                    'principalId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'tenantId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'type' => [
                        'type' => 'string',
                        'enum' => ['SystemAssigned']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GenericResource' => [
                'properties' => [
                    'managedBy' => ['type' => 'string'],
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'identity' => ['$ref' => '#/definitions/Identity']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Resource' => [
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'type' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplianceListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Appliance']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ApplianceDefinitionListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApplianceDefinition']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ErrorResponse' => [
                'properties' => [
                    'httpStatus' => ['type' => 'string'],
                    'errorCode' => ['type' => 'string'],
                    'errorMessage' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
