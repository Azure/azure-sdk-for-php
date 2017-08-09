<?php
namespace Microsoft\Azure\Management\Scheduler;
final class SchedulerManagementClient
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
        $this->_JobCollections_group = new \Microsoft\Azure\Management\Scheduler\JobCollections($_client);
        $this->_Jobs_group = new \Microsoft\Azure\Management\Scheduler\Jobs($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Scheduler\JobCollections
     */
    public function getJobCollections()
    {
        return $this->_JobCollections_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Scheduler\Jobs
     */
    public function getJobs()
    {
        return $this->_Jobs_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Scheduler\JobCollections
     */
    private $_JobCollections_group;
    /**
     * @var \Microsoft\Azure\Management\Scheduler\Jobs
     */
    private $_Jobs_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/providers/Microsoft.Scheduler/jobCollections' => ['get' => [
                'operationId' => 'JobCollections_ListBySubscription',
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
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobCollectionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections' => ['get' => [
                'operationId' => 'JobCollections_ListByResourceGroup',
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
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobCollectionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections/{jobCollectionName}' => [
                'get' => [
                    'operationId' => 'JobCollections_Get',
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
                            'name' => 'jobCollectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobCollectionDefinition']]]
                ],
                'put' => [
                    'operationId' => 'JobCollections_CreateOrUpdate',
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
                            'name' => 'jobCollectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
                        [
                            'name' => 'jobCollection',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/JobCollectionDefinition'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/JobCollectionDefinition']],
                        '201' => ['schema' => ['$ref' => '#/definitions/JobCollectionDefinition']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'JobCollections_Patch',
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
                            'name' => 'jobCollectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
                        [
                            'name' => 'jobCollection',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/JobCollectionDefinition'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobCollectionDefinition']]]
                ],
                'delete' => [
                    'operationId' => 'JobCollections_Delete',
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
                            'name' => 'jobCollectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections/{jobCollectionName}/enable' => ['post' => [
                'operationId' => 'JobCollections_Enable',
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
                        'name' => 'jobCollectionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => [
                    '200' => [],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections/{jobCollectionName}/disable' => ['post' => [
                'operationId' => 'JobCollections_Disable',
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
                        'name' => 'jobCollectionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => [
                    '200' => [],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections/{jobCollectionName}/jobs/{jobName}' => [
                'get' => [
                    'operationId' => 'Jobs_Get',
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
                            'name' => 'jobCollectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobDefinition']]]
                ],
                'put' => [
                    'operationId' => 'Jobs_CreateOrUpdate',
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
                            'name' => 'jobCollectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
                        [
                            'name' => 'job',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/JobDefinition'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/JobDefinition']],
                        '201' => ['schema' => ['$ref' => '#/definitions/JobDefinition']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Jobs_Patch',
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
                            'name' => 'jobCollectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
                        [
                            'name' => 'job',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/JobDefinition'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobDefinition']]]
                ],
                'delete' => [
                    'operationId' => 'Jobs_Delete',
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
                            'name' => 'jobCollectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ]
                    ],
                    'responses' => ['200' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections/{jobCollectionName}/jobs/{jobName}/run' => ['post' => [
                'operationId' => 'Jobs_Run',
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
                        'name' => 'jobCollectionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections/{jobCollectionName}/jobs' => ['get' => [
                'operationId' => 'Jobs_List',
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
                        'name' => 'jobCollectionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Scheduler/jobCollections/{jobCollectionName}/jobs/{jobName}/history' => ['get' => [
                'operationId' => 'Jobs_ListJobHistory',
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
                        'name' => 'jobCollectionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$skip',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobHistoryListResult']]]
            ]]
        ],
        'definitions' => [
            'Sku' => [
                'properties' => ['name' => [
                    'type' => 'string',
                    'enum' => [
                        'Standard',
                        'Free',
                        'P10Premium',
                        'P20Premium'
                    ]
                ]],
                'required' => []
            ],
            'JobMaxRecurrence' => [
                'properties' => [
                    'frequency' => [
                        'type' => 'string',
                        'enum' => [
                            'Minute',
                            'Hour',
                            'Day',
                            'Week',
                            'Month'
                        ]
                    ],
                    'interval' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'JobCollectionQuota' => [
                'properties' => [
                    'maxJobCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'maxJobOccurrence' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'maxRecurrence' => ['$ref' => '#/definitions/JobMaxRecurrence']
                ],
                'required' => []
            ],
            'JobCollectionProperties' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'state' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled',
                            'Suspended',
                            'Deleted'
                        ]
                    ],
                    'quota' => ['$ref' => '#/definitions/JobCollectionQuota']
                ],
                'required' => []
            ],
            'JobCollectionDefinition' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'properties' => ['$ref' => '#/definitions/JobCollectionProperties']
                ],
                'required' => []
            ],
            'JobCollectionListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/JobCollectionDefinition']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HttpAuthentication' => [
                'properties' => ['type' => [
                    'type' => 'string',
                    'enum' => [
                        'NotSpecified',
                        'ClientCertificate',
                        'ActiveDirectoryOAuth',
                        'Basic'
                    ]
                ]],
                'required' => []
            ],
            'HttpRequest' => [
                'properties' => [
                    'authentication' => ['$ref' => '#/definitions/HttpAuthentication'],
                    'uri' => ['type' => 'string'],
                    'method' => ['type' => 'string'],
                    'body' => ['type' => 'string'],
                    'headers' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'StorageQueueMessage' => [
                'properties' => [
                    'storageAccount' => ['type' => 'string'],
                    'queueName' => ['type' => 'string'],
                    'sasToken' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ServiceBusQueueMessage' => [
                'properties' => ['queueName' => ['type' => 'string']],
                'required' => []
            ],
            'ServiceBusTopicMessage' => [
                'properties' => ['topicPath' => ['type' => 'string']],
                'required' => []
            ],
            'RetryPolicy' => [
                'properties' => [
                    'retryType' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Fixed'
                        ]
                    ],
                    'retryInterval' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'retryCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'JobErrorAction' => [
                'properties' => [
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'Http',
                            'Https',
                            'StorageQueue',
                            'ServiceBusQueue',
                            'ServiceBusTopic'
                        ]
                    ],
                    'request' => ['$ref' => '#/definitions/HttpRequest'],
                    'queueMessage' => ['$ref' => '#/definitions/StorageQueueMessage'],
                    'serviceBusQueueMessage' => ['$ref' => '#/definitions/ServiceBusQueueMessage'],
                    'serviceBusTopicMessage' => ['$ref' => '#/definitions/ServiceBusTopicMessage'],
                    'retryPolicy' => ['$ref' => '#/definitions/RetryPolicy']
                ],
                'required' => []
            ],
            'JobAction' => [
                'properties' => [
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'Http',
                            'Https',
                            'StorageQueue',
                            'ServiceBusQueue',
                            'ServiceBusTopic'
                        ]
                    ],
                    'request' => ['$ref' => '#/definitions/HttpRequest'],
                    'queueMessage' => ['$ref' => '#/definitions/StorageQueueMessage'],
                    'serviceBusQueueMessage' => ['$ref' => '#/definitions/ServiceBusQueueMessage'],
                    'serviceBusTopicMessage' => ['$ref' => '#/definitions/ServiceBusTopicMessage'],
                    'retryPolicy' => ['$ref' => '#/definitions/RetryPolicy'],
                    'errorAction' => ['$ref' => '#/definitions/JobErrorAction']
                ],
                'required' => []
            ],
            'JobRecurrenceScheduleMonthlyOccurrence' => [
                'properties' => [
                    'day' => [
                        'type' => 'string',
                        'enum' => [
                            'Monday',
                            'Tuesday',
                            'Wednesday',
                            'Thursday',
                            'Friday',
                            'Saturday',
                            'Sunday'
                        ]
                    ],
                    'Occurrence' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'JobRecurrenceSchedule' => [
                'properties' => [
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
                    'hours' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'integer',
                            'format' => 'int32'
                        ]
                    ],
                    'minutes' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'integer',
                            'format' => 'int32'
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
                        'items' => ['$ref' => '#/definitions/JobRecurrenceScheduleMonthlyOccurrence']
                    ]
                ],
                'required' => []
            ],
            'JobRecurrence' => [
                'properties' => [
                    'frequency' => [
                        'type' => 'string',
                        'enum' => [
                            'Minute',
                            'Hour',
                            'Day',
                            'Week',
                            'Month'
                        ]
                    ],
                    'interval' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'schedule' => ['$ref' => '#/definitions/JobRecurrenceSchedule']
                ],
                'required' => []
            ],
            'JobStatus' => [
                'properties' => [
                    'executionCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'failureCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'faultedCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'lastExecutionTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'nextExecutionTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => []
            ],
            'JobProperties' => [
                'properties' => [
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'action' => ['$ref' => '#/definitions/JobAction'],
                    'recurrence' => ['$ref' => '#/definitions/JobRecurrence'],
                    'state' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled',
                            'Faulted',
                            'Completed'
                        ]
                    ],
                    'status' => ['$ref' => '#/definitions/JobStatus']
                ],
                'required' => []
            ],
            'JobDefinition' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/JobProperties']
                ],
                'required' => []
            ],
            'JobListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/JobDefinition']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'JobHistoryDefinitionProperties' => [
                'properties' => [
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'expectedExecutionTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'actionName' => [
                        'type' => 'string',
                        'enum' => [
                            'MainAction',
                            'ErrorAction'
                        ]
                    ],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'Completed',
                            'Failed',
                            'Postponed'
                        ]
                    ],
                    'message' => ['type' => 'string'],
                    'retryCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'repeatCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'JobHistoryDefinition' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/JobHistoryDefinitionProperties']
                ],
                'required' => []
            ],
            'JobHistoryListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/JobHistoryDefinition']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ClientCertAuthentication' => [
                'properties' => [
                    'password' => ['type' => 'string'],
                    'pfx' => ['type' => 'string'],
                    'certificateThumbprint' => ['type' => 'string'],
                    'certificateExpirationDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'certificateSubjectName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'BasicAuthentication' => [
                'properties' => [
                    'username' => ['type' => 'string'],
                    'password' => ['type' => 'string']
                ],
                'required' => []
            ],
            'OAuthAuthentication' => [
                'properties' => [
                    'secret' => ['type' => 'string'],
                    'tenant' => ['type' => 'string'],
                    'audience' => ['type' => 'string'],
                    'clientId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ServiceBusAuthentication' => [
                'properties' => [
                    'sasKey' => ['type' => 'string'],
                    'sasKeyName' => ['type' => 'string'],
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'NotSpecified',
                            'SharedAccessKey'
                        ]
                    ]
                ],
                'required' => []
            ],
            'ServiceBusBrokeredMessageProperties' => [
                'properties' => [
                    'contentType' => ['type' => 'string'],
                    'correlationId' => ['type' => 'string'],
                    'forcePersistence' => ['type' => 'boolean'],
                    'label' => ['type' => 'string'],
                    'messageId' => ['type' => 'string'],
                    'partitionKey' => ['type' => 'string'],
                    'replyTo' => ['type' => 'string'],
                    'replyToSessionId' => ['type' => 'string'],
                    'scheduledEnqueueTimeUtc' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'sessionId' => ['type' => 'string'],
                    'timeToLive' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'to' => ['type' => 'string'],
                    'viaPartitionKey' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ServiceBusMessage' => [
                'properties' => [
                    'authentication' => ['$ref' => '#/definitions/ServiceBusAuthentication'],
                    'brokeredMessageProperties' => ['$ref' => '#/definitions/ServiceBusBrokeredMessageProperties'],
                    'customMessageProperties' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'message' => ['type' => 'string'],
                    'namespace' => ['type' => 'string'],
                    'transportType' => [
                        'type' => 'string',
                        'enum' => [
                            'NotSpecified',
                            'NetMessaging',
                            'AMQP'
                        ]
                    ]
                ],
                'required' => []
            ],
            'JobStateFilter' => [
                'properties' => ['state' => [
                    'type' => 'string',
                    'enum' => [
                        'Enabled',
                        'Disabled',
                        'Faulted',
                        'Completed'
                    ]
                ]],
                'required' => []
            ],
            'JobHistoryFilter' => [
                'properties' => ['status' => [
                    'type' => 'string',
                    'enum' => [
                        'Completed',
                        'Failed',
                        'Postponed'
                    ]
                ]],
                'required' => []
            ]
        ]
    ];
}
