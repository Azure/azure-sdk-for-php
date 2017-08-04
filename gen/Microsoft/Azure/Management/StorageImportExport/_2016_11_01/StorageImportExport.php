<?php
namespace Microsoft\Azure\Management\StorageImportExport\_2016_11_01;
final class StorageImportExport
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
        $this->_Jobs_group = new \Microsoft\Azure\Management\StorageImportExport\_2016_11_01\Jobs($_client);
        $this->_ListLocations_operation = $_client->createOperation('ListLocations');
        $this->_GetLocation_operation = $_client->createOperation('GetLocation');
        $this->_ListSupportedOperations_operation = $_client->createOperation('ListSupportedOperations');
    }
    /**
     * @return \Microsoft\Azure\Management\StorageImportExport\_2016_11_01\Jobs
     */
    public function getJobs()
    {
        return $this->_Jobs_group;
    }
    /**
     * Returns a list of locations to which you can ship the disks associated with an import or export job. A location is a Microsoft data center region.
     * @return array
     */
    public function listLocations()
    {
        return $this->_ListLocations_operation->call([]);
    }
    /**
     * Gets a location to which you can ship the disks associated with an import or export job. A location is an Azure region.
     * @param string $locationName
     * @return array
     */
    public function getLocation($locationName)
    {
        return $this->_GetLocation_operation->call(['locationName' => $locationName]);
    }
    /**
     * Returns the list of operations supported by the import/export resource provider.
     * @return array
     */
    public function listSupportedOperations()
    {
        return $this->_ListSupportedOperations_operation->call([]);
    }
    /**
     * @var \Microsoft\Azure\Management\StorageImportExport\_2016_11_01\Jobs
     */
    private $_Jobs_group;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListLocations_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetLocation_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSupportedOperations_operation;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/providers/Microsoft.ImportExport/locations' => ['get' => [
                'operationId' => 'ListLocations',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-11-01']
                    ],
                    [
                        'name' => 'Accept-Language',
                        'in' => 'header',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['en-us']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LocationsListResult']]]
            ]],
            '/providers/Microsoft.ImportExport/locations/{locationName}' => ['get' => [
                'operationId' => 'GetLocation',
                'parameters' => [
                    [
                        'name' => 'locationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-11-01']
                    ],
                    [
                        'name' => 'Accept-Language',
                        'in' => 'header',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['en-us']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Location']]]
            ]],
            '/providers/Microsoft.ImportExport/operations' => ['get' => [
                'operationId' => 'ListSupportedOperations',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-11-01']
                    ],
                    [
                        'name' => 'Accept-Language',
                        'in' => 'header',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['en-us']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SupportedOperationsListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ImportExport/jobs' => ['get' => [
                'operationId' => 'Jobs_List',
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
                        'enum' => ['2016-11-01']
                    ],
                    [
                        'name' => 'Accept-Language',
                        'in' => 'header',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['en-us']
                    ],
                    [
                        'name' => '$top',
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
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ImportExport/jobs' => ['get' => [
                'operationId' => 'Jobs_ListByResourceGroup',
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
                        'enum' => ['2016-11-01']
                    ],
                    [
                        'name' => 'Accept-Language',
                        'in' => 'header',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['en-us']
                    ],
                    [
                        'name' => '$top',
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
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ImportExport/jobs/{jobName}' => [
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
                            'enum' => ['2016-11-01']
                        ],
                        [
                            'name' => 'Accept-Language',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['en-us']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Job']]]
                ],
                'patch' => [
                    'operationId' => 'Jobs_Update',
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'jobProperties',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/MutableJob'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-11-01']
                        ],
                        [
                            'name' => 'Accept-Language',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['en-us']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Job']]]
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
                            'name' => 'jobName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'jobProperties',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Job'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-11-01']
                        ],
                        [
                            'name' => 'Accept-Language',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['en-us']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Job']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Job']]
                    ]
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
                            'enum' => ['2016-11-01']
                        ],
                        [
                            'name' => 'Accept-Language',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['en-us']
                        ]
                    ],
                    'responses' => ['200' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ImportExport/moveResources' => ['post' => [
                'operationId' => 'Jobs_Move',
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
                        'name' => 'MoveJobsParameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/MoveJobParameters'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-11-01']
                    ],
                    [
                        'name' => 'Accept-Language',
                        'in' => 'header',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['en-us']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ImportExport/jobs/{jobName}/listBitLockerKeys' => ['get' => [
                'operationId' => 'Jobs_ListBitLockerKeys',
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
                        'enum' => ['2016-11-01']
                    ],
                    [
                        'name' => 'Accept-Language',
                        'in' => 'header',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['en-us']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BitLockerKeysListResult']]]
            ]]
        ],
        'definitions' => [
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => ['type' => 'object']
            ]],
            'OperationDisplayInformation' => ['properties' => [
                'provider' => ['type' => 'string'],
                'resource' => ['type' => 'string'],
                'operation' => ['type' => 'string'],
                'description' => ['type' => 'string']
            ]],
            'Operation' => ['properties' => [
                'name' => ['type' => 'string'],
                'display' => ['$ref' => '#/definitions/OperationDisplayInformation']
            ]],
            'SupportedOperationsListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Operation']
            ]]],
            'DriveStatus' => ['properties' => [
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'Specified',
                        'Received',
                        'NeverReceived',
                        'Transferring',
                        'Completed',
                        'CompletedMoreInfo',
                        'ShippedBack'
                    ]
                ],
                'copyStatus' => ['type' => 'string'],
                'percentComplete' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'verboseLogUri' => ['type' => 'string'],
                'errorLogUri' => ['type' => 'string'],
                'manifestUri' => ['type' => 'string']
            ]],
            'BitLockerKeysListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/DriveStatus']
            ]]],
            'MoveJobParameters' => ['properties' => [
                'targetResourceGroup' => ['type' => 'string'],
                'resources' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'LocationProperties' => ['properties' => [
                'recipientName' => ['type' => 'string'],
                'streetAddress1' => ['type' => 'string'],
                'streetAddress2' => ['type' => 'string'],
                'city' => ['type' => 'string'],
                'stateOrProvince' => ['type' => 'string'],
                'postalCode' => ['type' => 'string'],
                'countryOrRegion' => ['type' => 'string'],
                'phone' => ['type' => 'string'],
                'supportedCarriers' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'alternateLocations' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'Location' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/LocationProperties']
            ]],
            'LocationsListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Location']
            ]]],
            'ErrorBase' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string'],
                'target' => ['type' => 'string']
            ]],
            'ErrorInfo' => ['properties' => ['details' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ErrorBase']
            ]]],
            'ErrorResponse' => ['properties' => ['error' => ['$ref' => '#/definitions/ErrorInfo']]],
            'ReturnAddress' => ['properties' => [
                'recipientName' => ['type' => 'string'],
                'streetAddress1' => ['type' => 'string'],
                'streetAddress2' => ['type' => 'string'],
                'city' => ['type' => 'string'],
                'stateOrProvince' => ['type' => 'string'],
                'postalCode' => ['type' => 'string'],
                'countryOrRegion' => ['type' => 'string'],
                'phone' => ['type' => 'string'],
                'email' => ['type' => 'string']
            ]],
            'ReturnShipping' => ['properties' => [
                'carrierName' => ['type' => 'string'],
                'carrierAccountNumber' => ['type' => 'string']
            ]],
            'PackageInfomation' => ['properties' => [
                'carrierName' => ['type' => 'string'],
                'trackingNumber' => ['type' => 'string'],
                'driveCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'shipDate' => ['type' => 'string']
            ]],
            'MutableJobProperties' => ['properties' => [
                'cancelRequested' => ['type' => 'boolean'],
                'state' => [
                    'type' => 'string',
                    'enum' => ['Shipping']
                ],
                'returnAddress' => ['$ref' => '#/definitions/ReturnAddress'],
                'returnShipping' => ['$ref' => '#/definitions/ReturnShipping'],
                'deliveryPackage' => ['$ref' => '#/definitions/PackageInfomation'],
                'logLevel' => ['type' => 'string'],
                'backupDriveManifest' => ['type' => 'boolean']
            ]],
            'MutableJob' => ['properties' => [
                'tags' => ['type' => 'object'],
                'properties' => ['$ref' => '#/definitions/MutableJobProperties']
            ]],
            'ShippingInformation' => ['properties' => [
                'name' => ['type' => 'string'],
                'address' => ['type' => 'string']
            ]],
            'Export_blobList' => ['properties' => [
                'blobPath' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'blobPathPrefix' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'Export' => ['properties' => [
                'blobList' => ['$ref' => '#/definitions/Export_blobList'],
                'blobListblobPath' => ['type' => 'string']
            ]],
            'JobProperties' => ['properties' => [
                'storageAccountId' => ['type' => 'string'],
                'containerSas' => ['type' => 'string'],
                'jobType' => [
                    'type' => 'string',
                    'enum' => [
                        'Import',
                        'Export'
                    ]
                ],
                'returnAddress' => ['$ref' => '#/definitions/ReturnAddress'],
                'returnShipping' => ['$ref' => '#/definitions/ReturnShipping'],
                'shippingInformation' => ['$ref' => '#/definitions/ShippingInformation'],
                'deliveryPackage' => ['$ref' => '#/definitions/PackageInfomation'],
                'returnPackage' => ['$ref' => '#/definitions/PackageInfomation'],
                'diagnosticsPath' => ['type' => 'string'],
                'logLevel' => [
                    'type' => 'string',
                    'enum' => [
                        'Error',
                        'Verbose'
                    ]
                ],
                'backupDriveManifest' => ['type' => 'boolean'],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'Creating',
                        'Shipping',
                        'Received',
                        'Transferring',
                        'Packaging',
                        'Closed',
                        'Completed'
                    ]
                ],
                'cancelRequested' => ['type' => 'boolean'],
                'percentComplete' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'incompleteBlobListUri' => ['type' => 'string'],
                'driveList' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/DriveStatus']
                ],
                'export' => ['$ref' => '#/definitions/Export'],
                'provisioningState' => ['type' => 'string']
            ]],
            'Job' => ['properties' => ['properties' => ['$ref' => '#/definitions/JobProperties']]],
            'JobListResult' => ['properties' => [
                'nextLink' => ['type' => 'string'],
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Job']
                ]
            ]],
            'Drive' => ['properties' => [
                'driveId' => ['type' => 'string'],
                'bitLockerKey' => ['type' => 'string'],
                'manifestFile' => ['type' => 'string'],
                'manifestHash' => ['type' => 'string']
            ]]
        ]
    ];
}
