<?php
namespace Microsoft\Azure\Management\Consumption;
final class ConsumptionManagementClient
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
        $this->_UsageDetails_group = new \Microsoft\Azure\Management\Consumption\UsageDetails($_client);
        $this->_Operations_group = new \Microsoft\Azure\Management\Consumption\Operations($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Consumption\UsageDetails
     */
    public function getUsageDetails()
    {
        return $this->_UsageDetails_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Consumption\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Consumption\UsageDetails
     */
    private $_UsageDetails_group;
    /**
     * @var \Microsoft\Azure\Management\Consumption\Operations
     */
    private $_Operations_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/{scope}/providers/Microsoft.Consumption/usageDetails' => ['get' => [
                'operationId' => 'UsageDetails_List',
                'parameters' => [
                    [
                        'name' => 'scope',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$skiptoken',
                        'in' => 'query',
                        'required' => FALSE,
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
                        'enum' => ['2017-04-24-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/UsageDetailsListResult']]]
            ]],
            '/providers/Microsoft.Consumption/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2017-04-24-preview']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]]
        ],
        'definitions' => [
            'MeterDetails' => [
                'properties' => [
                    'meterName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'meterCategory' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'meterSubCategory' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'unit' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'meterLocation' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'totalIncludedQuantity' => [
                        'type' => 'number',
                        'format' => 'decimal',
                        'readOnly' => TRUE
                    ],
                    'pretaxStandardRate' => [
                        'type' => 'number',
                        'format' => 'decimal',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UsageDetailProperties' => [
                'properties' => [
                    'billingPeriodId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'invoiceId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'usageStart' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'usageEnd' => [
                        'type' => 'string',
                        'format' => 'date-time',
                        'readOnly' => TRUE
                    ],
                    'instanceName' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'instanceId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'instanceLocation' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'currency' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'usageQuantity' => [
                        'type' => 'number',
                        'format' => 'decimal',
                        'readOnly' => TRUE
                    ],
                    'billableQuantity' => [
                        'type' => 'number',
                        'format' => 'decimal',
                        'readOnly' => TRUE
                    ],
                    'pretaxCost' => [
                        'type' => 'number',
                        'format' => 'decimal',
                        'readOnly' => TRUE
                    ],
                    'isEstimated' => [
                        'type' => 'boolean',
                        'readOnly' => TRUE
                    ],
                    'meterId' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'meterDetails' => [
                        '$ref' => '#/definitions/MeterDetails',
                        'readOnly' => TRUE
                    ],
                    'additionalProperties' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string'],
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UsageDetail' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UsageDetailProperties']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UsageDetailsListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/UsageDetail'],
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
            'ErrorDetails' => [
                'properties' => [
                    'code' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'message' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ],
                    'target' => [
                        'type' => 'string',
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ErrorResponse' => [
                'properties' => ['error' => ['$ref' => '#/definitions/ErrorDetails']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
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
                    'display' => ['$ref' => '#/definitions/Operation_display']
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
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string'],
                        'readOnly' => TRUE
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
