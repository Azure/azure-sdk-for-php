<?php
namespace Microsoft\Azure\Management\StreamAnalytics;
final class StreamAnalyticsManagementClient
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
        $this->_Operations_group = new \Microsoft\Azure\Management\StreamAnalytics\Operations($_client);
        $this->_StreamingJobs_group = new \Microsoft\Azure\Management\StreamAnalytics\StreamingJobs($_client);
        $this->_Inputs_group = new \Microsoft\Azure\Management\StreamAnalytics\Inputs($_client);
        $this->_Outputs_group = new \Microsoft\Azure\Management\StreamAnalytics\Outputs($_client);
        $this->_Transformations_group = new \Microsoft\Azure\Management\StreamAnalytics\Transformations($_client);
        $this->_Functions_group = new \Microsoft\Azure\Management\StreamAnalytics\Functions($_client);
        $this->_Subscriptions_group = new \Microsoft\Azure\Management\StreamAnalytics\Subscriptions($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\StreamAnalytics\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StreamAnalytics\StreamingJobs
     */
    public function getStreamingJobs()
    {
        return $this->_StreamingJobs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StreamAnalytics\Inputs
     */
    public function getInputs()
    {
        return $this->_Inputs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StreamAnalytics\Outputs
     */
    public function getOutputs()
    {
        return $this->_Outputs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StreamAnalytics\Transformations
     */
    public function getTransformations()
    {
        return $this->_Transformations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StreamAnalytics\Functions
     */
    public function getFunctions()
    {
        return $this->_Functions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StreamAnalytics\Subscriptions
     */
    public function getSubscriptions()
    {
        return $this->_Subscriptions_group;
    }
    /**
     * @var \Microsoft\Azure\Management\StreamAnalytics\Operations
     */
    private $_Operations_group;
    /**
     * @var \Microsoft\Azure\Management\StreamAnalytics\StreamingJobs
     */
    private $_StreamingJobs_group;
    /**
     * @var \Microsoft\Azure\Management\StreamAnalytics\Inputs
     */
    private $_Inputs_group;
    /**
     * @var \Microsoft\Azure\Management\StreamAnalytics\Outputs
     */
    private $_Outputs_group;
    /**
     * @var \Microsoft\Azure\Management\StreamAnalytics\Transformations
     */
    private $_Transformations_group;
    /**
     * @var \Microsoft\Azure\Management\StreamAnalytics\Functions
     */
    private $_Functions_group;
    /**
     * @var \Microsoft\Azure\Management\StreamAnalytics\Subscriptions
     */
    private $_Subscriptions_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/providers/Microsoft.StreamAnalytics/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2016-03-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs/{jobName}' => [
                'put' => [
                    'operationId' => 'StreamingJobs_CreateOrReplace',
                    'parameters' => [
                        [
                            'name' => 'streamingJob',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/StreamingJob']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => FALSE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-None-Match',
                            'in' => 'header',
                            'required' => FALSE,
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/StreamingJob']],
                        '201' => ['schema' => ['$ref' => '#/definitions/StreamingJob']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'StreamingJobs_Update',
                    'parameters' => [
                        [
                            'name' => 'streamingJob',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/StreamingJob']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => FALSE,
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StreamingJob']]]
                ],
                'delete' => [
                    'operationId' => 'StreamingJobs_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '202' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'StreamingJobs_Get',
                    'parameters' => [
                        [
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StreamingJob']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs' => ['get' => [
                'operationId' => 'StreamingJobs_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
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
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StreamingJobListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.StreamAnalytics/streamingjobs' => ['get' => [
                'operationId' => 'StreamingJobs_List',
                'parameters' => [
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StreamingJobListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs/{jobName}/start' => ['post' => [
                'operationId' => 'StreamingJobs_Start',
                'parameters' => [
                    [
                        'name' => 'startJobParameters',
                        'in' => 'body',
                        'required' => FALSE,
                        'schema' => ['$ref' => '#/definitions/StartStreamingJobParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ],
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
                        'name' => 'jobName',
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
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs/{jobName}/stop' => ['post' => [
                'operationId' => 'StreamingJobs_Stop',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ],
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
                        'name' => 'jobName',
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
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs/{jobName}/inputs/{inputName}' => [
                'put' => [
                    'operationId' => 'Inputs_CreateOrReplace',
                    'parameters' => [
                        [
                            'name' => 'input',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Input']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => FALSE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-None-Match',
                            'in' => 'header',
                            'required' => FALSE,
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'inputName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Input']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Input']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Inputs_Update',
                    'parameters' => [
                        [
                            'name' => 'input',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Input']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => FALSE,
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'inputName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Input']]]
                ],
                'delete' => [
                    'operationId' => 'Inputs_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'inputName',
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
                    'operationId' => 'Inputs_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'inputName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Input']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs/{jobName}/inputs' => ['get' => [
                'operationId' => 'Inputs_ListByStreamingJob',
                'parameters' => [
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
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
                        'name' => 'jobName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/InputListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs/{jobName}/inputs/{inputName}/test' => ['post' => [
                'operationId' => 'Inputs_Test',
                'parameters' => [
                    [
                        'name' => 'input',
                        'in' => 'body',
                        'required' => FALSE,
                        'schema' => ['$ref' => '#/definitions/Input']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ],
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
                        'name' => 'jobName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'inputName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ResourceTestStatus']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs/{jobName}/outputs/{outputName}' => [
                'put' => [
                    'operationId' => 'Outputs_CreateOrReplace',
                    'parameters' => [
                        [
                            'name' => 'output',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Output']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => FALSE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-None-Match',
                            'in' => 'header',
                            'required' => FALSE,
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'outputName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Output']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Output']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Outputs_Update',
                    'parameters' => [
                        [
                            'name' => 'output',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Output']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => FALSE,
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'outputName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Output']]]
                ],
                'delete' => [
                    'operationId' => 'Outputs_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'outputName',
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
                    'operationId' => 'Outputs_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'outputName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Output']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs/{jobName}/outputs' => ['get' => [
                'operationId' => 'Outputs_ListByStreamingJob',
                'parameters' => [
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
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
                        'name' => 'jobName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OutputListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs/{jobName}/outputs/{outputName}/test' => ['post' => [
                'operationId' => 'Outputs_Test',
                'parameters' => [
                    [
                        'name' => 'output',
                        'in' => 'body',
                        'required' => FALSE,
                        'schema' => ['$ref' => '#/definitions/Output']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ],
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
                        'name' => 'jobName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'outputName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ResourceTestStatus']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs/{jobName}/transformations/{transformationName}' => [
                'put' => [
                    'operationId' => 'Transformations_CreateOrReplace',
                    'parameters' => [
                        [
                            'name' => 'transformation',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Transformation']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => FALSE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-None-Match',
                            'in' => 'header',
                            'required' => FALSE,
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'transformationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Transformation']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Transformation']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Transformations_Update',
                    'parameters' => [
                        [
                            'name' => 'transformation',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Transformation']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => FALSE,
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'transformationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Transformation']]]
                ],
                'get' => [
                    'operationId' => 'Transformations_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'transformationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Transformation']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs/{jobName}/functions/{functionName}' => [
                'put' => [
                    'operationId' => 'Functions_CreateOrReplace',
                    'parameters' => [
                        [
                            'name' => 'function',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Function']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => FALSE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'If-None-Match',
                            'in' => 'header',
                            'required' => FALSE,
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'functionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Function']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Function']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Functions_Update',
                    'parameters' => [
                        [
                            'name' => 'function',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Function']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => FALSE,
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'functionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Function']]]
                ],
                'delete' => [
                    'operationId' => 'Functions_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'functionName',
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
                    'operationId' => 'Functions_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'functionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Function']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs/{jobName}/functions' => ['get' => [
                'operationId' => 'Functions_ListByStreamingJob',
                'parameters' => [
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
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
                        'name' => 'jobName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FunctionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs/{jobName}/functions/{functionName}/test' => ['post' => [
                'operationId' => 'Functions_Test',
                'parameters' => [
                    [
                        'name' => 'function',
                        'in' => 'body',
                        'required' => FALSE,
                        'schema' => ['$ref' => '#/definitions/Function']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ],
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
                        'name' => 'jobName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'functionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ResourceTestStatus']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/Microsoft.StreamAnalytics/streamingjobs/{jobName}/functions/{functionName}/RetrieveDefaultDefinition' => ['post' => [
                'operationId' => 'Functions_RetrieveDefaultDefinition',
                'parameters' => [
                    [
                        'name' => 'functionRetrieveDefaultDefinitionParameters',
                        'in' => 'body',
                        'required' => FALSE,
                        'schema' => ['$ref' => '#/definitions/FunctionRetrieveDefaultDefinitionParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ],
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
                        'name' => 'jobName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'functionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Function']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.StreamAnalytics/locations/{location}/quotas' => ['get' => [
                'operationId' => 'Subscriptions_ListQuotas',
                'parameters' => [
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
                        'enum' => ['2016-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SubscriptionQuotasListResult']]]
            ]]
        ],
        'definitions' => [
            'Operation_display' => [
                'properties' => [
                    'provider' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'resource' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'operation' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'description' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Operation' => [
                'properties' => [
                    'name' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'display' => [
                        '$ref' => '#/definitions/Operation_display',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Operation'],
                        'readOnly' => TRUE
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Sku' => [
                'properties' => ['name' => [
                    'type' => 'string',
                    'enum' => ['Standard']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Serialization' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DiagnosticCondition' => [
                'properties' => [
                    'since' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'code' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'message' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Diagnostics' => [
                'properties' => ['conditions' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/DiagnosticCondition'],
                    'readOnly' => TRUE
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'InputProperties' => [
                'properties' => [
                    'serialization' => ['$ref' => '#/definitions/Serialization'],
                    'diagnostics' => [
                        '$ref' => '#/definitions/Diagnostics',
                        'readOnly' => TRUE
                    ],
                    'etag' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Input' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/InputProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TransformationProperties' => [
                'properties' => [
                    'streamingUnits' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'query' => ['type' => 'string'],
                    'etag' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Transformation' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/TransformationProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OutputDataSource' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OutputProperties' => [
                'properties' => [
                    'datasource' => ['$ref' => '#/definitions/OutputDataSource'],
                    'serialization' => ['$ref' => '#/definitions/Serialization'],
                    'diagnostics' => [
                        '$ref' => '#/definitions/Diagnostics',
                        'readOnly' => TRUE
                    ],
                    'etag' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Output' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/OutputProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FunctionProperties' => [
                'properties' => ['etag' => [
                    'type' => 'string',
                    'readOnly' => TRUE
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Function' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/FunctionProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StreamingJobProperties' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'jobId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'provisioningState' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'jobState' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'outputStartMode' => [
                        'type' => 'string',
                        'enum' => [
                            'JobStartTime',
                            'CustomTime',
                            'LastOutputEventTime'
                        ]
                    ],
                    'outputStartTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'lastOutputEventTime' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'eventsOutOfOrderPolicy' => [
                        'type' => 'string',
                        'enum' => [
                            'Adjust',
                            'Drop'
                        ]
                    ],
                    'outputErrorPolicy' => [
                        'type' => 'string',
                        'enum' => [
                            'Stop',
                            'Drop'
                        ]
                    ],
                    'eventsOutOfOrderMaxDelayInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'eventsLateArrivalMaxDelayInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'dataLocale' => ['type' => 'string'],
                    'compatibilityLevel' => [
                        'type' => 'string',
                        'enum' => ['1.0']
                    ],
                    'createdDate' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'inputs' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Input']
                    ],
                    'transformation' => ['$ref' => '#/definitions/Transformation'],
                    'outputs' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Output']
                    ],
                    'functions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Function']
                    ],
                    'etag' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StreamingJob' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/StreamingJobProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StreamingJobListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/StreamingJob'],
                        'readOnly' => TRUE
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StartStreamingJobParameters' => [
                'properties' => [
                    'outputStartMode' => [
                        'type' => 'string',
                        'enum' => [
                            'JobStartTime',
                            'CustomTime',
                            'LastOutputEventTime'
                        ]
                    ],
                    'outputStartTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
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
            'JavaScriptFunctionBindingProperties' => [
                'properties' => ['script' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.StreamAnalytics/JavascriptUdf' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/JavaScriptFunctionBindingProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureMachineLearningWebServiceOutputColumn' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'dataType' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureMachineLearningWebServiceInputColumn' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'dataType' => ['type' => 'string'],
                    'mapTo' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureMachineLearningWebServiceInputs' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'columnNames' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AzureMachineLearningWebServiceInputColumn']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureMachineLearningWebServiceFunctionBindingProperties' => [
                'properties' => [
                    'endpoint' => ['type' => 'string'],
                    'apiKey' => ['type' => 'string'],
                    'inputs' => ['$ref' => '#/definitions/AzureMachineLearningWebServiceInputs'],
                    'outputs' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AzureMachineLearningWebServiceOutputColumn']
                    ],
                    'batchSize' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.MachineLearning/WebService' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AzureMachineLearningWebServiceFunctionBindingProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FunctionBinding' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FunctionOutput' => [
                'properties' => ['dataType' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FunctionInput' => [
                'properties' => [
                    'dataType' => ['type' => 'string'],
                    'isConfigurationParameter' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ScalarFunctionConfiguration' => [
                'properties' => [
                    'inputs' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/FunctionInput']
                    ],
                    'output' => ['$ref' => '#/definitions/FunctionOutput'],
                    'binding' => ['$ref' => '#/definitions/FunctionBinding']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Scalar' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ScalarFunctionConfiguration']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'JavaScriptFunctionBindingRetrievalProperties' => [
                'properties' => [
                    'script' => ['type' => 'string'],
                    'udfType' => [
                        'type' => 'string',
                        'enum' => ['Scalar']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.StreamAnalytics/JavascriptUdf' => [
                'properties' => ['bindingRetrievalProperties' => ['$ref' => '#/definitions/JavaScriptFunctionBindingRetrievalProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureMachineLearningWebServiceFunctionBindingRetrievalProperties' => [
                'properties' => [
                    'executeEndpoint' => ['type' => 'string'],
                    'udfType' => [
                        'type' => 'string',
                        'enum' => ['Scalar']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.MachineLearning/WebService' => [
                'properties' => ['bindingRetrievalProperties' => ['$ref' => '#/definitions/AzureMachineLearningWebServiceFunctionBindingRetrievalProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FunctionRetrieveDefaultDefinitionParameters' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubResource' => [
                'properties' => [
                    'id' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'name' => ['type' => 'string'],
                    'type' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Avro' => [
                'properties' => ['properties' => ['type' => 'object']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'JsonSerializationProperties' => [
                'properties' => [
                    'encoding' => [
                        'type' => 'string',
                        'enum' => ['UTF8']
                    ],
                    'format' => [
                        'type' => 'string',
                        'enum' => [
                            'LineSeparated',
                            'Array'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Json' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/JsonSerializationProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'CsvSerializationProperties' => [
                'properties' => [
                    'fieldDelimiter' => ['type' => 'string'],
                    'encoding' => [
                        'type' => 'string',
                        'enum' => ['UTF8']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Csv' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/CsvSerializationProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EventHubStreamInputDataSourceProperties' => [
                'properties' => ['consumerGroupName' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EventHubDataSourceProperties' => [
                'properties' => ['eventHubName' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ServiceBusDataSourceProperties' => [
                'properties' => [
                    'serviceBusNamespace' => ['type' => 'string'],
                    'sharedAccessPolicyName' => ['type' => 'string'],
                    'sharedAccessPolicyKey' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ServiceBusTopicOutputDataSourceProperties' => [
                'properties' => [
                    'topicName' => ['type' => 'string'],
                    'propertyColumns' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.ServiceBus/Topic' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ServiceBusTopicOutputDataSourceProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ServiceBusQueueOutputDataSourceProperties' => [
                'properties' => [
                    'queueName' => ['type' => 'string'],
                    'propertyColumns' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.ServiceBus/Queue' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ServiceBusQueueOutputDataSourceProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DocumentDbOutputDataSourceProperties' => [
                'properties' => [
                    'accountId' => ['type' => 'string'],
                    'accountKey' => ['type' => 'string'],
                    'database' => ['type' => 'string'],
                    'collectionNamePattern' => ['type' => 'string'],
                    'partitionKey' => ['type' => 'string'],
                    'documentId' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Storage/DocumentDB' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DocumentDbOutputDataSourceProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureSqlDatabaseOutputDataSourceProperties' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureSqlDatabaseDataSourceProperties' => [
                'properties' => [
                    'server' => ['type' => 'string'],
                    'database' => ['type' => 'string'],
                    'user' => ['type' => 'string'],
                    'password' => ['type' => 'string'],
                    'table' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Sql/Server/Database' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AzureSqlDatabaseOutputDataSourceProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EventHubOutputDataSourceProperties' => [
                'properties' => ['partitionKey' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.ServiceBus/EventHub' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/EventHubOutputDataSourceProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureTableOutputDataSourceProperties' => [
                'properties' => [
                    'accountName' => ['type' => 'string'],
                    'accountKey' => ['type' => 'string'],
                    'table' => ['type' => 'string'],
                    'partitionKey' => ['type' => 'string'],
                    'rowKey' => ['type' => 'string'],
                    'columnsToRemove' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'batchSize' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Storage/Table' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AzureTableOutputDataSourceProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StorageAccount' => [
                'properties' => [
                    'accountName' => ['type' => 'string'],
                    'accountKey' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BlobReferenceInputDataSourceProperties' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BlobStreamInputDataSourceProperties' => [
                'properties' => ['sourcePartitionCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BlobDataSourceProperties' => [
                'properties' => [
                    'storageAccounts' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/StorageAccount']
                    ],
                    'container' => ['type' => 'string'],
                    'pathPattern' => ['type' => 'string'],
                    'dateFormat' => ['type' => 'string'],
                    'timeFormat' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BlobOutputDataSourceProperties' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Storage/Blob' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BlobOutputDataSourceProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Storage/Blob' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BlobReferenceInputDataSourceProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ReferenceInputDataSource' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Reference' => [
                'properties' => ['datasource' => ['$ref' => '#/definitions/ReferenceInputDataSource']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IoTHubStreamInputDataSourceProperties' => [
                'properties' => [
                    'iotHubNamespace' => ['type' => 'string'],
                    'sharedAccessPolicyName' => ['type' => 'string'],
                    'sharedAccessPolicyKey' => ['type' => 'string'],
                    'consumerGroupName' => ['type' => 'string'],
                    'endpoint' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Devices/IotHubs' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/IoTHubStreamInputDataSourceProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.ServiceBus/EventHub' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/EventHubStreamInputDataSourceProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Storage/Blob' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BlobStreamInputDataSourceProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'StreamInputDataSource' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Stream' => [
                'properties' => ['datasource' => ['$ref' => '#/definitions/StreamInputDataSource']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'InputListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Input'],
                        'readOnly' => TRUE
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ErrorResponse' => [
                'properties' => [
                    'code' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'message' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceTestStatus' => [
                'properties' => [
                    'status' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'error' => [
                        '$ref' => '#/definitions/ErrorResponse',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OutputListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Output'],
                        'readOnly' => TRUE
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FunctionListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Function'],
                        'readOnly' => TRUE
                    ],
                    'nextLink' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubscriptionQuota_properties' => [
                'properties' => [
                    'maxCount' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ],
                    'currentCount' => [
                        'type' => 'integer',
                        'format' => 'int32',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubscriptionQuota' => [
                'properties' => ['properties' => [
                    '$ref' => '#/definitions/SubscriptionQuota_properties',
                    'readOnly' => TRUE
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SubscriptionQuotasListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SubscriptionQuota'],
                    'readOnly' => TRUE
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
