<?php
namespace Microsoft\Azure\Management\Commerce\_2015_06_01_preview;
final class UsageManagementClient
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
        $this->_UsageAggregates_group = new \Microsoft\Azure\Management\Commerce\_2015_06_01_preview\UsageAggregates($_client);
        $this->_RateCard_group = new \Microsoft\Azure\Management\Commerce\_2015_06_01_preview\RateCard($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Commerce\_2015_06_01_preview\UsageAggregates
     */
    public function getUsageAggregates()
    {
        return $this->_UsageAggregates_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Commerce\_2015_06_01_preview\RateCard
     */
    public function getRateCard()
    {
        return $this->_RateCard_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Commerce\_2015_06_01_preview\UsageAggregates
     */
    private $_UsageAggregates_group;
    /**
     * @var \Microsoft\Azure\Management\Commerce\_2015_06_01_preview\RateCard
     */
    private $_RateCard_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/providers/Microsoft.Commerce/UsageAggregates' => ['get' => [
                'operationId' => 'UsageAggregates_List',
                'parameters' => [
                    [
                        'name' => 'reportedStartTime',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    [
                        'name' => 'reportedEndTime',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    [
                        'name' => 'showDetails',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'boolean'
                    ],
                    [
                        'name' => 'aggregationGranularity',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string',
                        'enum' => [
                            'Daily',
                            'Hourly'
                        ]
                    ],
                    [
                        'name' => 'continuationToken',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-06-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/UsageAggregationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Commerce/RateCard' => ['get' => [
                'operationId' => 'RateCard_Get',
                'parameters' => [
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-06-01-preview']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceRateCardInfo']]]
            ]]
        ],
        'definitions' => [
            'InfoField' => ['properties' => ['project' => ['type' => 'string']]],
            'UsageSample' => ['properties' => [
                'subscriptionId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'meterId' => ['type' => 'string'],
                'usageStartTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'usageEndTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'quantity' => ['type' => 'object'],
                'unit' => ['type' => 'string'],
                'meterName' => ['type' => 'string'],
                'meterCategory' => ['type' => 'string'],
                'meterSubCategory' => ['type' => 'string'],
                'meterRegion' => ['type' => 'string'],
                'infoFields' => ['$ref' => '#/definitions/InfoField'],
                'instanceData' => ['type' => 'string']
            ]],
            'UsageAggregation' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/UsageSample']
            ]],
            'UsageAggregationListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/UsageAggregation']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'RateCardQueryParameters' => ['properties' => [
                'OfferDurableId' => ['type' => 'string'],
                'Currency' => ['type' => 'string'],
                'Locale' => ['type' => 'string'],
                'RegionInfo' => ['type' => 'string']
            ]],
            'OfferTermInfo' => ['properties' => ['EffectiveDate' => [
                'type' => 'string',
                'format' => 'date-time'
            ]]],
            'MeterInfo' => ['properties' => [
                'MeterId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'MeterName' => ['type' => 'string'],
                'MeterCategory' => ['type' => 'string'],
                'MeterSubCategory' => ['type' => 'string'],
                'Unit' => ['type' => 'string'],
                'MeterTags' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'MeterRegion' => ['type' => 'string'],
                'MeterRates' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'type' => 'number',
                        'format' => 'double'
                    ]
                ],
                'EffectiveDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'IncludedQuantity' => [
                    'type' => 'number',
                    'format' => 'double'
                ]
            ]],
            'ResourceRateCardInfo' => ['properties' => [
                'Currency' => ['type' => 'string'],
                'Locale' => ['type' => 'string'],
                'IsTaxIncluded' => ['type' => 'boolean'],
                'OfferTerms' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/OfferTermInfo']
                ],
                'Meters' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/MeterInfo']
                ]
            ]],
            'Monetary Credit' => ['properties' => [
                'Credit' => [
                    'type' => 'number',
                    'format' => 'decimal'
                ],
                'ExcludedMeterIds' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'format' => 'uuid'
                    ]
                ]
            ]],
            'Monetary Commitment' => ['properties' => [
                'TieredDiscount' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'type' => 'number',
                        'format' => 'decimal'
                    ]
                ],
                'ExcludedMeterIds' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'format' => 'uuid'
                    ]
                ]
            ]],
            'Recurring Charge' => ['properties' => ['RecurringCharge' => [
                'type' => 'integer',
                'format' => 'int32'
            ]]],
            'ErrorResponse' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string']
            ]]
        ]
    ];
}
