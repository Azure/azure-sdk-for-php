<?php
namespace Microsoft\Azure\Management\Billing;
final class BillingManagementClient
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
        $this->_BillingPeriods_group = new \Microsoft\Azure\Management\Billing\BillingPeriods($_client);
        $this->_Invoices_group = new \Microsoft\Azure\Management\Billing\Invoices($_client);
        $this->_Operations_group = new \Microsoft\Azure\Management\Billing\Operations($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Billing\BillingPeriods
     */
    public function getBillingPeriods()
    {
        return $this->_BillingPeriods_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Billing\Invoices
     */
    public function getInvoices()
    {
        return $this->_Invoices_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Billing\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Billing\BillingPeriods
     */
    private $_BillingPeriods_group;
    /**
     * @var \Microsoft\Azure\Management\Billing\Invoices
     */
    private $_Invoices_group;
    /**
     * @var \Microsoft\Azure\Management\Billing\Operations
     */
    private $_Operations_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/providers/Microsoft.Billing/billingPeriods' => ['get' => [
                'operationId' => 'BillingPeriods_List',
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
                        'enum' => ['2017-04-24-preview']
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
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BillingPeriodsListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Billing/billingPeriods/{billingPeriodName}' => ['get' => [
                'operationId' => 'BillingPeriods_Get',
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
                        'enum' => ['2017-04-24-preview']
                    ],
                    [
                        'name' => 'billingPeriodName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BillingPeriod']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Billing/invoices' => ['get' => [
                'operationId' => 'Invoices_List',
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
                        'enum' => ['2017-04-24-preview']
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
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/InvoicesListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Billing/invoices/{invoiceName}' => ['get' => [
                'operationId' => 'Invoices_Get',
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
                        'enum' => ['2017-04-24-preview']
                    ],
                    [
                        'name' => 'invoiceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Invoice']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Billing/invoices/latest' => ['get' => [
                'operationId' => 'Invoices_GetLatest',
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
                        'enum' => ['2017-04-24-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Invoice']]]
            ]],
            '/providers/Microsoft.Billing/operations' => ['get' => [
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
            'BillingPeriodProperties' => ['properties' => [
                'billingPeriodStartDate' => [
                    'type' => 'string',
                    'format' => 'date'
                ],
                'billingPeriodEndDate' => [
                    'type' => 'string',
                    'format' => 'date'
                ],
                'invoiceIds' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'BillingPeriod' => ['properties' => ['properties' => ['$ref' => '#/definitions/BillingPeriodProperties']]],
            'BillingPeriodsListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/BillingPeriod']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'DownloadUrl' => ['properties' => [
                'expiryTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'url' => ['type' => 'string']
            ]],
            'ErrorDetails' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string'],
                'target' => ['type' => 'string']
            ]],
            'ErrorResponse' => ['properties' => ['error' => ['$ref' => '#/definitions/ErrorDetails']]],
            'InvoiceProperties' => ['properties' => [
                'downloadUrl' => ['$ref' => '#/definitions/DownloadUrl'],
                'invoicePeriodStartDate' => [
                    'type' => 'string',
                    'format' => 'date'
                ],
                'invoicePeriodEndDate' => [
                    'type' => 'string',
                    'format' => 'date'
                ],
                'billingPeriodIds' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'Invoice' => ['properties' => ['properties' => ['$ref' => '#/definitions/InvoiceProperties']]],
            'InvoicesListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Invoice']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'Operation_display' => ['properties' => [
                'provider' => ['type' => 'string'],
                'resource' => ['type' => 'string'],
                'operation' => ['type' => 'string']
            ]],
            'Operation' => ['properties' => [
                'name' => ['type' => 'string'],
                'display' => ['$ref' => '#/definitions/Operation_display']
            ]],
            'OperationListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Operation']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]]
        ]
    ];
}
