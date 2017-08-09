<?php
namespace Microsoft\Azure\Management\ResourceHealth;
final class MicrosoftResourceHealth
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
        $this->_AvailabilityStatuses_group = new \Microsoft\Azure\Management\ResourceHealth\AvailabilityStatuses($_client);
        $this->_Operations_group = new \Microsoft\Azure\Management\ResourceHealth\Operations($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\ResourceHealth\AvailabilityStatuses
     */
    public function getAvailabilityStatuses()
    {
        return $this->_AvailabilityStatuses_group;
    }
    /**
     * @return \Microsoft\Azure\Management\ResourceHealth\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @var \Microsoft\Azure\Management\ResourceHealth\AvailabilityStatuses
     */
    private $_AvailabilityStatuses_group;
    /**
     * @var \Microsoft\Azure\Management\ResourceHealth\Operations
     */
    private $_Operations_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/providers/Microsoft.ResourceHealth/availabilityStatuses' => ['get' => [
                'operationId' => 'AvailabilityStatuses_ListBySubscriptionId',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
                    ],
                    [
                        'name' => '$filter',
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
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/availabilityStatusListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ResourceHealth/availabilityStatuses' => ['get' => [
                'operationId' => 'AvailabilityStatuses_ListByResourceGroup',
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
                        'enum' => ['2017-07-01']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/availabilityStatusListResult']]]
            ]],
            '/{resourceUri}/providers/Microsoft.ResourceHealth/availabilityStatuses/current' => ['get' => [
                'operationId' => 'AvailabilityStatuses_GetByResource',
                'parameters' => [
                    [
                        'name' => 'resourceUri',
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
                        'enum' => ['2017-07-01']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/availabilityStatus']]]
            ]],
            '/{resourceUri}/providers/Microsoft.ResourceHealth/availabilityStatuses' => ['get' => [
                'operationId' => 'AvailabilityStatuses_List',
                'parameters' => [
                    [
                        'name' => 'resourceUri',
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
                        'enum' => ['2017-07-01']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/availabilityStatusListResult']]]
            ]],
            '/providers/Microsoft.ResourceHealth/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2017-07-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/operationListResult']]]
            ]]
        ],
        'definitions' => [
            'availabilityStatus_properties_recentlyResolvedState' => [
                'properties' => [
                    'unavailableOccurredTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'resolvedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'unavailabilitySummary' => ['type' => 'string']
                ],
                'required' => []
            ],
            'recommendedAction' => [
                'properties' => [
                    'action' => ['type' => 'string'],
                    'actionUrl' => ['type' => 'string'],
                    'actionUrlText' => ['type' => 'string']
                ],
                'required' => []
            ],
            'serviceImpactingEvent_status' => [
                'properties' => ['value' => ['type' => 'string']],
                'required' => []
            ],
            'serviceImpactingEvent_incidentProperties' => [
                'properties' => [
                    'title' => ['type' => 'string'],
                    'service' => ['type' => 'string'],
                    'region' => ['type' => 'string'],
                    'incidentType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'serviceImpactingEvent' => [
                'properties' => [
                    'eventStartTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'eventStatusLastModifiedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'correlationId' => ['type' => 'string'],
                    'status' => ['$ref' => '#/definitions/serviceImpactingEvent_status'],
                    'incidentProperties' => ['$ref' => '#/definitions/serviceImpactingEvent_incidentProperties']
                ],
                'required' => []
            ],
            'availabilityStatus_properties' => [
                'properties' => [
                    'availabilityState' => [
                        'type' => 'string',
                        'enum' => [
                            'Available',
                            'Unavailable',
                            'Unknown'
                        ]
                    ],
                    'summary' => ['type' => 'string'],
                    'detailedStatus' => ['type' => 'string'],
                    'reasonType' => ['type' => 'string'],
                    'rootCauseAttributionTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'healthEventType' => ['type' => 'string'],
                    'healthEventCause' => ['type' => 'string'],
                    'healthEventCategory' => ['type' => 'string'],
                    'healthEventId' => ['type' => 'string'],
                    'resolutionETA' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'occuredTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'reasonChronicity' => [
                        'type' => 'string',
                        'enum' => [
                            'Transient',
                            'Persistent'
                        ]
                    ],
                    'reportedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'recentlyResolvedState' => ['$ref' => '#/definitions/availabilityStatus_properties_recentlyResolvedState'],
                    'recommendedActions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/recommendedAction']
                    ],
                    'serviceImpactingEvents' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/serviceImpactingEvent']
                    ]
                ],
                'required' => []
            ],
            'availabilityStatus' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/availabilityStatus_properties']
                ],
                'required' => []
            ],
            'availabilityStatusListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/availabilityStatus']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'operation_display' => [
                'properties' => [
                    'provider' => ['type' => 'string'],
                    'resource' => ['type' => 'string'],
                    'operation' => ['type' => 'string'],
                    'description' => ['type' => 'string']
                ],
                'required' => []
            ],
            'operation' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'display' => ['$ref' => '#/definitions/operation_display']
                ],
                'required' => []
            ],
            'operationListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/operation']
                ]],
                'required' => ['value']
            ],
            'ErrorResponse' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'details' => ['type' => 'string']
                ],
                'required' => []
            ]
        ]
    ];
}
