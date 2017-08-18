<?php
namespace Microsoft\Azure\Management\Resource;
final class SubscriptionClient
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
        $this->_Subscriptions_group = new \Microsoft\Azure\Management\Resource\Subscriptions($_client);
        $this->_Tenants_group = new \Microsoft\Azure\Management\Resource\Tenants($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Resource\Subscriptions
     */
    public function getSubscriptions()
    {
        return $this->_Subscriptions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Resource\Tenants
     */
    public function getTenants()
    {
        return $this->_Tenants_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Resource\Subscriptions
     */
    private $_Subscriptions_group;
    /**
     * @var \Microsoft\Azure\Management\Resource\Tenants
     */
    private $_Tenants_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/locations' => ['get' => [
                'operationId' => 'Subscriptions_ListLocations',
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
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LocationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}' => ['get' => [
                'operationId' => 'Subscriptions_Get',
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
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Subscription']]]
            ]],
            '/subscriptions' => ['get' => [
                'operationId' => 'Subscriptions_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2016-06-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SubscriptionListResult']]]
            ]],
            '/tenants' => ['get' => [
                'operationId' => 'Tenants_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2016-06-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TenantListResult']]]
            ]]
        ],
        'definitions' => [
            'Location' => [
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'subscriptionId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'displayName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'latitude' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'longitude' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LocationListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Location']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubscriptionPolicies' => [
                'properties' => [
                    'locationPlacementId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'quotaId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'spendingLimit' => [
                        'type' => 'string',
                        'enum' => [
                            'On',
                            'Off',
                            'CurrentPeriodOff'
                        ],
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Subscription' => [
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'subscriptionId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'displayName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'state' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Warned',
                            'PastDue',
                            'Disabled',
                            'Deleted'
                        ],
                        'readOnly' => TRUE
                    ],
                    'subscriptionPolicies' => ['$ref' => '#/definitions/SubscriptionPolicies'],
                    'authorizationSource' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubscriptionListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Subscription']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['nextLink']
            ],
            'TenantIdDescription' => [
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'tenantId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TenantListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TenantIdDescription']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['nextLink']
            ]
        ]
    ];
}
