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
                    'meterName' => ['type' => 'string'],
                    'meterCategory' => ['type' => 'string'],
                    'meterSubCategory' => ['type' => 'string'],
                    'unit' => ['type' => 'string'],
                    'meterLocation' => ['type' => 'string'],
                    'totalIncludedQuantity' => [
                        'type' => 'number',
                        'format' => 'decimal'
                    ],
                    'pretaxStandardRate' => [
                        'type' => 'number',
                        'format' => 'decimal'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'UsageDetailProperties' => [
                'properties' => [
                    'billingPeriodId' => ['type' => 'string'],
                    'invoiceId' => ['type' => 'string'],
                    'usageStart' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'usageEnd' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'instanceName' => ['type' => 'string'],
                    'instanceId' => ['type' => 'string'],
                    'instanceLocation' => ['type' => 'string'],
                    'currency' => ['type' => 'string'],
                    'usageQuantity' => [
                        'type' => 'number',
                        'format' => 'decimal'
                    ],
                    'billableQuantity' => [
                        'type' => 'number',
                        'format' => 'decimal'
                    ],
                    'pretaxCost' => [
                        'type' => 'number',
                        'format' => 'decimal'
                    ],
                    'isEstimated' => ['type' => 'boolean'],
                    'meterId' => ['type' => 'string'],
                    'meterDetails' => ['$ref' => '#/definitions/MeterDetails'],
                    'additionalProperties' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
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
                        'items' => ['$ref' => '#/definitions/UsageDetail']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ErrorDetails' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'target' => ['type' => 'string']
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
                    'provider' => ['type' => 'string'],
                    'resource' => ['type' => 'string'],
                    'operation' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Operation' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'display' => ['$ref' => '#/definitions/Operation_display']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Operation']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Resource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
