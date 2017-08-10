<?php
namespace Microsoft\Azure\Management\Compute;
final class ComputeManagementClient
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
        $this->_AvailabilitySets_group = new \Microsoft\Azure\Management\Compute\AvailabilitySets($_client);
        $this->_VirtualMachineExtensionImages_group = new \Microsoft\Azure\Management\Compute\VirtualMachineExtensionImages($_client);
        $this->_VirtualMachineExtensions_group = new \Microsoft\Azure\Management\Compute\VirtualMachineExtensions($_client);
        $this->_VirtualMachineImages_group = new \Microsoft\Azure\Management\Compute\VirtualMachineImages($_client);
        $this->_Usage_group = new \Microsoft\Azure\Management\Compute\Usage($_client);
        $this->_VirtualMachineSizes_group = new \Microsoft\Azure\Management\Compute\VirtualMachineSizes($_client);
        $this->_Images_group = new \Microsoft\Azure\Management\Compute\Images($_client);
        $this->_ResourceSkus_group = new \Microsoft\Azure\Management\Compute\ResourceSkus($_client);
        $this->_VirtualMachines_group = new \Microsoft\Azure\Management\Compute\VirtualMachines($_client);
        $this->_VirtualMachineScaleSets_group = new \Microsoft\Azure\Management\Compute\VirtualMachineScaleSets($_client);
        $this->_VirtualMachineScaleSetExtensions_group = new \Microsoft\Azure\Management\Compute\VirtualMachineScaleSetExtensions($_client);
        $this->_VirtualMachineScaleSetVMs_group = new \Microsoft\Azure\Management\Compute\VirtualMachineScaleSetVMs($_client);
        $this->_Disks_group = new \Microsoft\Azure\Management\Compute\Disks($_client);
        $this->_Snapshots_group = new \Microsoft\Azure\Management\Compute\Snapshots($_client);
        $this->_VirtualMachineRunCommands_group = new \Microsoft\Azure\Management\Compute\VirtualMachineRunCommands($_client);
        $this->_ContainerServices_group = new \Microsoft\Azure\Management\Compute\ContainerServices($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\AvailabilitySets
     */
    public function getAvailabilitySets()
    {
        return $this->_AvailabilitySets_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\VirtualMachineExtensionImages
     */
    public function getVirtualMachineExtensionImages()
    {
        return $this->_VirtualMachineExtensionImages_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\VirtualMachineExtensions
     */
    public function getVirtualMachineExtensions()
    {
        return $this->_VirtualMachineExtensions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\VirtualMachineImages
     */
    public function getVirtualMachineImages()
    {
        return $this->_VirtualMachineImages_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\Usage
     */
    public function getUsage()
    {
        return $this->_Usage_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\VirtualMachineSizes
     */
    public function getVirtualMachineSizes()
    {
        return $this->_VirtualMachineSizes_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\Images
     */
    public function getImages()
    {
        return $this->_Images_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\ResourceSkus
     */
    public function getResourceSkus()
    {
        return $this->_ResourceSkus_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\VirtualMachines
     */
    public function getVirtualMachines()
    {
        return $this->_VirtualMachines_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\VirtualMachineScaleSets
     */
    public function getVirtualMachineScaleSets()
    {
        return $this->_VirtualMachineScaleSets_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\VirtualMachineScaleSetExtensions
     */
    public function getVirtualMachineScaleSetExtensions()
    {
        return $this->_VirtualMachineScaleSetExtensions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\VirtualMachineScaleSetVMs
     */
    public function getVirtualMachineScaleSetVMs()
    {
        return $this->_VirtualMachineScaleSetVMs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\Disks
     */
    public function getDisks()
    {
        return $this->_Disks_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\Snapshots
     */
    public function getSnapshots()
    {
        return $this->_Snapshots_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\VirtualMachineRunCommands
     */
    public function getVirtualMachineRunCommands()
    {
        return $this->_VirtualMachineRunCommands_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Compute\ContainerServices
     */
    public function getContainerServices()
    {
        return $this->_ContainerServices_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Compute\AvailabilitySets
     */
    private $_AvailabilitySets_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\VirtualMachineExtensionImages
     */
    private $_VirtualMachineExtensionImages_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\VirtualMachineExtensions
     */
    private $_VirtualMachineExtensions_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\VirtualMachineImages
     */
    private $_VirtualMachineImages_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\Usage
     */
    private $_Usage_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\VirtualMachineSizes
     */
    private $_VirtualMachineSizes_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\Images
     */
    private $_Images_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\ResourceSkus
     */
    private $_ResourceSkus_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\VirtualMachines
     */
    private $_VirtualMachines_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\VirtualMachineScaleSets
     */
    private $_VirtualMachineScaleSets_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\VirtualMachineScaleSetExtensions
     */
    private $_VirtualMachineScaleSetExtensions_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\VirtualMachineScaleSetVMs
     */
    private $_VirtualMachineScaleSetVMs_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\Disks
     */
    private $_Disks_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\Snapshots
     */
    private $_Snapshots_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\VirtualMachineRunCommands
     */
    private $_VirtualMachineRunCommands_group;
    /**
     * @var \Microsoft\Azure\Management\Compute\ContainerServices
     */
    private $_ContainerServices_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/availabilitySets/{availabilitySetName}' => [
                'put' => [
                    'operationId' => 'AvailabilitySets_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'availabilitySetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AvailabilitySet']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AvailabilitySet']]]
                ],
                'delete' => [
                    'operationId' => 'AvailabilitySets_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'availabilitySetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'AvailabilitySets_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'availabilitySetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AvailabilitySet']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/availabilitySets' => ['get' => [
                'operationId' => 'AvailabilitySets_List',
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
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AvailabilitySetListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/availabilitySets/{availabilitySetName}/vmSizes' => ['get' => [
                'operationId' => 'AvailabilitySets_ListAvailableSizes',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'availabilitySetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineSizeListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/locations/{location}/publishers/{publisherName}/artifacttypes/vmextension/types/{type}/versions/{version}' => ['get' => [
                'operationId' => 'VirtualMachineExtensionImages_Get',
                'parameters' => [
                    [
                        'name' => 'location',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'publisherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'type',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'version',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineExtensionImage']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/locations/{location}/publishers/{publisherName}/artifacttypes/vmextension/types' => ['get' => [
                'operationId' => 'VirtualMachineExtensionImages_ListTypes',
                'parameters' => [
                    [
                        'name' => 'location',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'publisherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualMachineExtensionImage']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/locations/{location}/publishers/{publisherName}/artifacttypes/vmextension/types/{type}/versions' => ['get' => [
                'operationId' => 'VirtualMachineExtensionImages_ListVersions',
                'parameters' => [
                    [
                        'name' => 'location',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'publisherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'type',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
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
                        'name' => '$orderby',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualMachineExtensionImage']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/extensions/{vmExtensionName}' => [
                'put' => [
                    'operationId' => 'VirtualMachineExtensions_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmExtensionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'extensionParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VirtualMachineExtension']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineExtension']],
                        '201' => ['schema' => ['$ref' => '#/definitions/VirtualMachineExtension']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'VirtualMachineExtensions_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmExtensionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                        '202' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'VirtualMachineExtensions_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmExtensionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineExtension']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/locations/{location}/publishers/{publisherName}/artifacttypes/vmimage/offers/{offer}/skus/{skus}/versions/{version}' => ['get' => [
                'operationId' => 'VirtualMachineImages_Get',
                'parameters' => [
                    [
                        'name' => 'location',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'publisherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'offer',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'skus',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'version',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineImage']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/locations/{location}/publishers/{publisherName}/artifacttypes/vmimage/offers/{offer}/skus/{skus}/versions' => ['get' => [
                'operationId' => 'VirtualMachineImages_List',
                'parameters' => [
                    [
                        'name' => 'location',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'publisherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'offer',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'skus',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
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
                        'name' => '$orderby',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualMachineImageResource']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/locations/{location}/publishers/{publisherName}/artifacttypes/vmimage/offers' => ['get' => [
                'operationId' => 'VirtualMachineImages_ListOffers',
                'parameters' => [
                    [
                        'name' => 'location',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'publisherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualMachineImageResource']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/locations/{location}/publishers' => ['get' => [
                'operationId' => 'VirtualMachineImages_ListPublishers',
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
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualMachineImageResource']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/locations/{location}/publishers/{publisherName}/artifacttypes/vmimage/offers/{offer}/skus' => ['get' => [
                'operationId' => 'VirtualMachineImages_ListSkus',
                'parameters' => [
                    [
                        'name' => 'location',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'publisherName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'offer',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualMachineImageResource']
                ]]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/locations/{location}/usages' => ['get' => [
                'operationId' => 'Usage_List',
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
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ListUsagesResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/locations/{location}/vmSizes' => ['get' => [
                'operationId' => 'VirtualMachineSizes_List',
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
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineSizeListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/images/{imageName}' => [
                'put' => [
                    'operationId' => 'Images_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'imageName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Image']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Image']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Image']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Images_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'imageName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                        '202' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Images_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'imageName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Image']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/images' => ['get' => [
                'operationId' => 'Images_ListByResourceGroup',
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
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ImageListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/images' => ['get' => [
                'operationId' => 'Images_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ImageListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/skus' => ['get' => [
                'operationId' => 'ResourceSkus_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceSkusResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/capture' => ['post' => [
                'operationId' => 'VirtualMachines_Capture',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/VirtualMachineCaptureParameters']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineCaptureResult']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}' => [
                'put' => [
                    'operationId' => 'VirtualMachines_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VirtualMachine']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VirtualMachine']],
                        '201' => ['schema' => ['$ref' => '#/definitions/VirtualMachine']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'VirtualMachines_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                        '202' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'VirtualMachines_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string',
                            'enum' => ['instanceView']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachine']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/convertToManagedDisks' => ['post' => [
                'operationId' => 'VirtualMachines_ConvertToManagedDisks',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/deallocate' => ['post' => [
                'operationId' => 'VirtualMachines_Deallocate',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/generalize' => ['post' => [
                'operationId' => 'VirtualMachines_Generalize',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines' => ['get' => [
                'operationId' => 'VirtualMachines_List',
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
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/virtualMachines' => ['get' => [
                'operationId' => 'VirtualMachines_ListAll',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/vmSizes' => ['get' => [
                'operationId' => 'VirtualMachines_ListAvailableSizes',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineSizeListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/powerOff' => ['post' => [
                'operationId' => 'VirtualMachines_PowerOff',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/restart' => ['post' => [
                'operationId' => 'VirtualMachines_Restart',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/start' => ['post' => [
                'operationId' => 'VirtualMachines_Start',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/redeploy' => ['post' => [
                'operationId' => 'VirtualMachines_Redeploy',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/performMaintenance' => ['post' => [
                'operationId' => 'VirtualMachines_PerformMaintenance',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachines/{vmName}/runCommand' => ['post' => [
                'operationId' => 'VirtualMachines_RunCommand',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/RunCommandInput']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/RunCommandResult']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}' => [
                'put' => [
                    'operationId' => 'VirtualMachineScaleSets_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmScaleSetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VirtualMachineScaleSet']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineScaleSet']],
                        '201' => ['schema' => ['$ref' => '#/definitions/VirtualMachineScaleSet']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'VirtualMachineScaleSets_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmScaleSetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                        '202' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'VirtualMachineScaleSets_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmScaleSetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineScaleSet']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/deallocate' => ['post' => [
                'operationId' => 'VirtualMachineScaleSets_Deallocate',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmInstanceIDs',
                        'in' => 'body',
                        'required' => FALSE,
                        'schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetVMInstanceIDs']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/delete' => ['post' => [
                'operationId' => 'VirtualMachineScaleSets_DeleteInstances',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmInstanceIDs',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetVMInstanceRequiredIDs']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/instanceView' => ['get' => [
                'operationId' => 'VirtualMachineScaleSets_GetInstanceView',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetInstanceView']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets' => ['get' => [
                'operationId' => 'VirtualMachineScaleSets_List',
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
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/virtualMachineScaleSets' => ['get' => [
                'operationId' => 'VirtualMachineScaleSets_ListAll',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetListWithLinkResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/skus' => ['get' => [
                'operationId' => 'VirtualMachineScaleSets_ListSkus',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetListSkusResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/poweroff' => ['post' => [
                'operationId' => 'VirtualMachineScaleSets_PowerOff',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmInstanceIDs',
                        'in' => 'body',
                        'required' => FALSE,
                        'schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetVMInstanceIDs']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/restart' => ['post' => [
                'operationId' => 'VirtualMachineScaleSets_Restart',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmInstanceIDs',
                        'in' => 'body',
                        'required' => FALSE,
                        'schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetVMInstanceIDs']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/start' => ['post' => [
                'operationId' => 'VirtualMachineScaleSets_Start',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmInstanceIDs',
                        'in' => 'body',
                        'required' => FALSE,
                        'schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetVMInstanceIDs']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/manualupgrade' => ['post' => [
                'operationId' => 'VirtualMachineScaleSets_UpdateInstances',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmInstanceIDs',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetVMInstanceRequiredIDs']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/reimage' => ['post' => [
                'operationId' => 'VirtualMachineScaleSets_Reimage',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmInstanceIDs',
                        'in' => 'body',
                        'required' => FALSE,
                        'schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetVMInstanceIDs']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/reimageall' => ['post' => [
                'operationId' => 'VirtualMachineScaleSets_ReimageAll',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmInstanceIDs',
                        'in' => 'body',
                        'required' => FALSE,
                        'schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetVMInstanceIDs']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/extensions/{vmssExtensionName}' => [
                'put' => [
                    'operationId' => 'VirtualMachineScaleSetExtensions_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmScaleSetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmssExtensionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'extensionParameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetExtension']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetExtension']],
                        '201' => ['schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetExtension']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'VirtualMachineScaleSetExtensions_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmScaleSetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmssExtensionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                        '202' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'VirtualMachineScaleSetExtensions_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmScaleSetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmssExtensionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
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
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetExtension']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/extensions' => ['get' => [
                'operationId' => 'VirtualMachineScaleSetExtensions_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetExtensionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/virtualmachines/{instanceId}/reimage' => ['post' => [
                'operationId' => 'VirtualMachineScaleSetVMs_Reimage',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instanceId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/virtualmachines/{instanceId}/reimageall' => ['post' => [
                'operationId' => 'VirtualMachineScaleSetVMs_ReimageAll',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instanceId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/virtualmachines/{instanceId}/deallocate' => ['post' => [
                'operationId' => 'VirtualMachineScaleSetVMs_Deallocate',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instanceId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/virtualmachines/{instanceId}' => [
                'delete' => [
                    'operationId' => 'VirtualMachineScaleSetVMs_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmScaleSetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'instanceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                        '202' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'VirtualMachineScaleSetVMs_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vmScaleSetName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'instanceId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetVM']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/virtualmachines/{instanceId}/instanceView' => ['get' => [
                'operationId' => 'VirtualMachineScaleSetVMs_GetInstanceView',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instanceId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetVMInstanceView']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{virtualMachineScaleSetName}/virtualMachines' => ['get' => [
                'operationId' => 'VirtualMachineScaleSetVMs_List',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'virtualMachineScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
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
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VirtualMachineScaleSetVMListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/virtualmachines/{instanceId}/poweroff' => ['post' => [
                'operationId' => 'VirtualMachineScaleSetVMs_PowerOff',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instanceId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/virtualmachines/{instanceId}/restart' => ['post' => [
                'operationId' => 'VirtualMachineScaleSetVMs_Restart',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instanceId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/virtualMachineScaleSets/{vmScaleSetName}/virtualmachines/{instanceId}/start' => ['post' => [
                'operationId' => 'VirtualMachineScaleSetVMs_Start',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vmScaleSetName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'instanceId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/disks/{diskName}' => [
                'put' => [
                    'operationId' => 'Disks_CreateOrUpdate',
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
                            'name' => 'diskName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'disk',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Disk']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Disk']],
                        '202' => ['schema' => ['$ref' => '#/definitions/Disk']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Disks_Update',
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
                            'name' => 'diskName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'disk',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/DiskUpdate']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Disk']],
                        '202' => ['schema' => ['$ref' => '#/definitions/Disk']]
                    ]
                ],
                'get' => [
                    'operationId' => 'Disks_Get',
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
                            'name' => 'diskName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Disk']]]
                ],
                'delete' => [
                    'operationId' => 'Disks_Delete',
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
                            'name' => 'diskName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/disks' => ['get' => [
                'operationId' => 'Disks_ListByResourceGroup',
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
                        'enum' => ['2017-03-30']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DiskList']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/disks' => ['get' => [
                'operationId' => 'Disks_List',
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
                        'enum' => ['2017-03-30']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DiskList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/disks/{diskName}/beginGetAccess' => ['post' => [
                'operationId' => 'Disks_GrantAccess',
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
                        'name' => 'diskName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'grantAccessData',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/GrantAccessData']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/AccessUri']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/disks/{diskName}/endGetAccess' => ['post' => [
                'operationId' => 'Disks_RevokeAccess',
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
                        'name' => 'diskName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/snapshots/{snapshotName}' => [
                'put' => [
                    'operationId' => 'Snapshots_CreateOrUpdate',
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
                            'name' => 'snapshotName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'snapshot',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Snapshot']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Snapshot']],
                        '202' => ['schema' => ['$ref' => '#/definitions/Snapshot']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Snapshots_Update',
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
                            'name' => 'snapshotName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ],
                        [
                            'name' => 'snapshot',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SnapshotUpdate']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Snapshot']],
                        '202' => ['schema' => ['$ref' => '#/definitions/Snapshot']]
                    ]
                ],
                'get' => [
                    'operationId' => 'Snapshots_Get',
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
                            'name' => 'snapshotName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Snapshot']]]
                ],
                'delete' => [
                    'operationId' => 'Snapshots_Delete',
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
                            'name' => 'snapshotName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-03-30']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/snapshots' => ['get' => [
                'operationId' => 'Snapshots_ListByResourceGroup',
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
                        'enum' => ['2017-03-30']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SnapshotList']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/snapshots' => ['get' => [
                'operationId' => 'Snapshots_List',
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
                        'enum' => ['2017-03-30']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SnapshotList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/snapshots/{snapshotName}/beginGetAccess' => ['post' => [
                'operationId' => 'Snapshots_GrantAccess',
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
                        'name' => 'snapshotName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'grantAccessData',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/GrantAccessData']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/AccessUri']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Compute/snapshots/{snapshotName}/endGetAccess' => ['post' => [
                'operationId' => 'Snapshots_RevokeAccess',
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
                        'name' => 'snapshotName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationStatusResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/locations/{location}/runCommands' => ['get' => [
                'operationId' => 'VirtualMachineRunCommands_List',
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
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RunCommandListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Compute/locations/{location}/runCommands/{commandId}' => ['get' => [
                'operationId' => 'VirtualMachineRunCommands_Get',
                'parameters' => [
                    [
                        'name' => 'location',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'commandId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-03-30']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RunCommandDocument']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.ContainerService/containerServices' => ['get' => [
                'operationId' => 'ContainerServices_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-01-31']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ContainerServiceListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerService/containerServices/{containerServiceName}' => [
                'put' => [
                    'operationId' => 'ContainerServices_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'containerServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ContainerService']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-01-31']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ContainerService']],
                        '201' => ['schema' => ['$ref' => '#/definitions/ContainerService']],
                        '202' => ['schema' => ['$ref' => '#/definitions/ContainerService']]
                    ]
                ],
                'get' => [
                    'operationId' => 'ContainerServices_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'containerServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-01-31']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ContainerService']]]
                ],
                'delete' => [
                    'operationId' => 'ContainerServices_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'containerServiceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-01-31']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.ContainerService/containerServices' => ['get' => [
                'operationId' => 'ContainerServices_ListByResourceGroup',
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
                        'enum' => ['2017-01-31']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ContainerServiceListResult']]]
            ]]
        ],
        'definitions' => [
            'InstanceViewStatus' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'level' => [
                        'type' => 'string',
                        'enum' => [
                            'Info',
                            'Warning',
                            'Error'
                        ]
                    ],
                    'displayStatus' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'time' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => []
            ],
            'SubResource' => [
                'properties' => ['id' => ['type' => 'string']],
                'required' => []
            ],
            'AvailabilitySetProperties' => [
                'properties' => [
                    'platformUpdateDomainCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'platformFaultDomainCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'virtualMachines' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ],
                    'statuses' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InstanceViewStatus']
                    ]
                ],
                'required' => []
            ],
            'Sku' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'tier' => ['type' => 'string'],
                    'capacity' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'required' => []
            ],
            'AvailabilitySet' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/AvailabilitySetProperties'],
                    'sku' => ['$ref' => '#/definitions/Sku']
                ],
                'required' => []
            ],
            'AvailabilitySetListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AvailabilitySet']
                ]],
                'required' => []
            ],
            'VirtualMachineSize' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'numberOfCores' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'osDiskSizeInMB' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'resourceDiskSizeInMB' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'memoryInMB' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'maxDataDiskCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'VirtualMachineSizeListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualMachineSize']
                ]],
                'required' => []
            ],
            'VirtualMachineExtensionImageProperties' => [
                'properties' => [
                    'operatingSystem' => ['type' => 'string'],
                    'computeRole' => ['type' => 'string'],
                    'handlerSchema' => ['type' => 'string'],
                    'vmScaleSetEnabled' => ['type' => 'boolean'],
                    'supportsMultipleExtensions' => ['type' => 'boolean']
                ],
                'required' => [
                    'operatingSystem',
                    'computeRole',
                    'handlerSchema'
                ]
            ],
            'VirtualMachineExtensionImage' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/VirtualMachineExtensionImageProperties']],
                'required' => []
            ],
            'VirtualMachineImageResource' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => [
                    'name',
                    'location'
                ]
            ],
            'VirtualMachineExtensionInstanceView' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'typeHandlerVersion' => ['type' => 'string'],
                    'substatuses' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InstanceViewStatus']
                    ],
                    'statuses' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InstanceViewStatus']
                    ]
                ],
                'required' => []
            ],
            'VirtualMachineExtensionProperties' => [
                'properties' => [
                    'forceUpdateTag' => ['type' => 'string'],
                    'publisher' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'typeHandlerVersion' => ['type' => 'string'],
                    'autoUpgradeMinorVersion' => ['type' => 'boolean'],
                    'settings' => ['type' => 'object'],
                    'protectedSettings' => ['type' => 'object'],
                    'provisioningState' => ['type' => 'string'],
                    'instanceView' => ['$ref' => '#/definitions/VirtualMachineExtensionInstanceView']
                ],
                'required' => []
            ],
            'VirtualMachineExtension' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/VirtualMachineExtensionProperties']],
                'required' => []
            ],
            'PurchasePlan' => [
                'properties' => [
                    'publisher' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'product' => ['type' => 'string']
                ],
                'required' => [
                    'publisher',
                    'name',
                    'product'
                ]
            ],
            'OSDiskImage' => [
                'properties' => ['operatingSystem' => [
                    'type' => 'string',
                    'enum' => [
                        'Windows',
                        'Linux'
                    ]
                ]],
                'required' => ['operatingSystem']
            ],
            'DataDiskImage' => [
                'properties' => ['lun' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]],
                'required' => []
            ],
            'VirtualMachineImageProperties' => [
                'properties' => [
                    'plan' => ['$ref' => '#/definitions/PurchasePlan'],
                    'osDiskImage' => ['$ref' => '#/definitions/OSDiskImage'],
                    'dataDiskImages' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DataDiskImage']
                    ]
                ],
                'required' => []
            ],
            'VirtualMachineImage' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/VirtualMachineImageProperties']],
                'required' => []
            ],
            'UsageName' => [
                'properties' => [
                    'value' => ['type' => 'string'],
                    'localizedValue' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Usage' => [
                'properties' => [
                    'unit' => ['type' => 'string'],
                    'currentValue' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'limit' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'name' => ['$ref' => '#/definitions/UsageName']
                ],
                'required' => [
                    'unit',
                    'currentValue',
                    'limit',
                    'name'
                ]
            ],
            'ListUsagesResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Usage']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'VirtualMachineCaptureParameters' => [
                'properties' => [
                    'vhdPrefix' => ['type' => 'string'],
                    'destinationContainerName' => ['type' => 'string'],
                    'overwriteVhds' => ['type' => 'boolean']
                ],
                'required' => [
                    'vhdPrefix',
                    'destinationContainerName',
                    'overwriteVhds'
                ]
            ],
            'VirtualMachineCaptureResultProperties' => [
                'properties' => ['output' => ['type' => 'object']],
                'required' => []
            ],
            'VirtualMachineCaptureResult' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/VirtualMachineCaptureResultProperties']],
                'required' => []
            ],
            'Plan' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'publisher' => ['type' => 'string'],
                    'product' => ['type' => 'string'],
                    'promotionCode' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HardwareProfile' => [
                'properties' => ['vmSize' => [
                    'type' => 'string',
                    'enum' => [
                        'Basic_A0',
                        'Basic_A1',
                        'Basic_A2',
                        'Basic_A3',
                        'Basic_A4',
                        'Standard_A0',
                        'Standard_A1',
                        'Standard_A2',
                        'Standard_A3',
                        'Standard_A4',
                        'Standard_A5',
                        'Standard_A6',
                        'Standard_A7',
                        'Standard_A8',
                        'Standard_A9',
                        'Standard_A10',
                        'Standard_A11',
                        'Standard_A1_v2',
                        'Standard_A2_v2',
                        'Standard_A4_v2',
                        'Standard_A8_v2',
                        'Standard_A2m_v2',
                        'Standard_A4m_v2',
                        'Standard_A8m_v2',
                        'Standard_D1',
                        'Standard_D2',
                        'Standard_D3',
                        'Standard_D4',
                        'Standard_D11',
                        'Standard_D12',
                        'Standard_D13',
                        'Standard_D14',
                        'Standard_D1_v2',
                        'Standard_D2_v2',
                        'Standard_D3_v2',
                        'Standard_D4_v2',
                        'Standard_D5_v2',
                        'Standard_D11_v2',
                        'Standard_D12_v2',
                        'Standard_D13_v2',
                        'Standard_D14_v2',
                        'Standard_D15_v2',
                        'Standard_DS1',
                        'Standard_DS2',
                        'Standard_DS3',
                        'Standard_DS4',
                        'Standard_DS11',
                        'Standard_DS12',
                        'Standard_DS13',
                        'Standard_DS14',
                        'Standard_DS1_v2',
                        'Standard_DS2_v2',
                        'Standard_DS3_v2',
                        'Standard_DS4_v2',
                        'Standard_DS5_v2',
                        'Standard_DS11_v2',
                        'Standard_DS12_v2',
                        'Standard_DS13_v2',
                        'Standard_DS14_v2',
                        'Standard_DS15_v2',
                        'Standard_F1',
                        'Standard_F2',
                        'Standard_F4',
                        'Standard_F8',
                        'Standard_F16',
                        'Standard_F1s',
                        'Standard_F2s',
                        'Standard_F4s',
                        'Standard_F8s',
                        'Standard_F16s',
                        'Standard_G1',
                        'Standard_G2',
                        'Standard_G3',
                        'Standard_G4',
                        'Standard_G5',
                        'Standard_GS1',
                        'Standard_GS2',
                        'Standard_GS3',
                        'Standard_GS4',
                        'Standard_GS5',
                        'Standard_H8',
                        'Standard_H16',
                        'Standard_H8m',
                        'Standard_H16m',
                        'Standard_H16r',
                        'Standard_H16mr',
                        'Standard_L4s',
                        'Standard_L8s',
                        'Standard_L16s',
                        'Standard_L32s',
                        'Standard_NC6',
                        'Standard_NC12',
                        'Standard_NC24',
                        'Standard_NC24r',
                        'Standard_NV6',
                        'Standard_NV12',
                        'Standard_NV24'
                    ]
                ]],
                'required' => []
            ],
            'ImageReference' => [
                'properties' => [
                    'publisher' => ['type' => 'string'],
                    'offer' => ['type' => 'string'],
                    'sku' => ['type' => 'string'],
                    'version' => ['type' => 'string']
                ],
                'required' => []
            ],
            'KeyVaultSecretReference' => [
                'properties' => [
                    'secretUrl' => ['type' => 'string'],
                    'sourceVault' => ['$ref' => '#/definitions/SubResource']
                ],
                'required' => [
                    'secretUrl',
                    'sourceVault'
                ]
            ],
            'KeyVaultKeyReference' => [
                'properties' => [
                    'keyUrl' => ['type' => 'string'],
                    'sourceVault' => ['$ref' => '#/definitions/SubResource']
                ],
                'required' => [
                    'keyUrl',
                    'sourceVault'
                ]
            ],
            'DiskEncryptionSettings' => [
                'properties' => [
                    'diskEncryptionKey' => ['$ref' => '#/definitions/KeyVaultSecretReference'],
                    'keyEncryptionKey' => ['$ref' => '#/definitions/KeyVaultKeyReference'],
                    'enabled' => ['type' => 'boolean']
                ],
                'required' => []
            ],
            'VirtualHardDisk' => [
                'properties' => ['uri' => ['type' => 'string']],
                'required' => []
            ],
            'ManagedDiskParameters' => [
                'properties' => ['storageAccountType' => [
                    'type' => 'string',
                    'enum' => [
                        'Standard_LRS',
                        'Premium_LRS'
                    ]
                ]],
                'required' => []
            ],
            'OSDisk' => [
                'properties' => [
                    'osType' => [
                        'type' => 'string',
                        'enum' => [
                            'Windows',
                            'Linux'
                        ]
                    ],
                    'encryptionSettings' => ['$ref' => '#/definitions/DiskEncryptionSettings'],
                    'name' => ['type' => 'string'],
                    'vhd' => ['$ref' => '#/definitions/VirtualHardDisk'],
                    'image' => ['$ref' => '#/definitions/VirtualHardDisk'],
                    'caching' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'ReadOnly',
                            'ReadWrite'
                        ]
                    ],
                    'createOption' => [
                        'type' => 'string',
                        'enum' => [
                            'fromImage',
                            'empty',
                            'attach'
                        ]
                    ],
                    'diskSizeGB' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'managedDisk' => ['$ref' => '#/definitions/ManagedDiskParameters']
                ],
                'required' => ['createOption']
            ],
            'DataDisk' => [
                'properties' => [
                    'lun' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'name' => ['type' => 'string'],
                    'vhd' => ['$ref' => '#/definitions/VirtualHardDisk'],
                    'image' => ['$ref' => '#/definitions/VirtualHardDisk'],
                    'caching' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'ReadOnly',
                            'ReadWrite'
                        ]
                    ],
                    'createOption' => [
                        'type' => 'string',
                        'enum' => [
                            'fromImage',
                            'empty',
                            'attach'
                        ]
                    ],
                    'diskSizeGB' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'managedDisk' => ['$ref' => '#/definitions/ManagedDiskParameters']
                ],
                'required' => [
                    'lun',
                    'createOption'
                ]
            ],
            'StorageProfile' => [
                'properties' => [
                    'imageReference' => ['$ref' => '#/definitions/ImageReference'],
                    'osDisk' => ['$ref' => '#/definitions/OSDisk'],
                    'dataDisks' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DataDisk']
                    ]
                ],
                'required' => []
            ],
            'AdditionalUnattendContent' => [
                'properties' => [
                    'passName' => [
                        'type' => 'string',
                        'enum' => ['oobeSystem']
                    ],
                    'componentName' => [
                        'type' => 'string',
                        'enum' => ['Microsoft-Windows-Shell-Setup']
                    ],
                    'settingName' => [
                        'type' => 'string',
                        'enum' => [
                            'AutoLogon',
                            'FirstLogonCommands'
                        ]
                    ],
                    'content' => ['type' => 'string']
                ],
                'required' => []
            ],
            'WinRMListener' => [
                'properties' => [
                    'protocol' => [
                        'type' => 'string',
                        'enum' => [
                            'Http',
                            'Https'
                        ]
                    ],
                    'certificateUrl' => ['type' => 'string']
                ],
                'required' => []
            ],
            'WinRMConfiguration' => [
                'properties' => ['listeners' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/WinRMListener']
                ]],
                'required' => []
            ],
            'WindowsConfiguration' => [
                'properties' => [
                    'provisionVMAgent' => ['type' => 'boolean'],
                    'enableAutomaticUpdates' => ['type' => 'boolean'],
                    'timeZone' => ['type' => 'string'],
                    'additionalUnattendContent' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AdditionalUnattendContent']
                    ],
                    'winRM' => ['$ref' => '#/definitions/WinRMConfiguration']
                ],
                'required' => []
            ],
            'SshPublicKey' => [
                'properties' => [
                    'path' => ['type' => 'string'],
                    'keyData' => ['type' => 'string']
                ],
                'required' => []
            ],
            'SshConfiguration' => [
                'properties' => ['publicKeys' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SshPublicKey']
                ]],
                'required' => []
            ],
            'LinuxConfiguration' => [
                'properties' => [
                    'disablePasswordAuthentication' => ['type' => 'boolean'],
                    'ssh' => ['$ref' => '#/definitions/SshConfiguration']
                ],
                'required' => []
            ],
            'VaultCertificate' => [
                'properties' => [
                    'certificateUrl' => ['type' => 'string'],
                    'certificateStore' => ['type' => 'string']
                ],
                'required' => []
            ],
            'VaultSecretGroup' => [
                'properties' => [
                    'sourceVault' => ['$ref' => '#/definitions/SubResource'],
                    'vaultCertificates' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VaultCertificate']
                    ]
                ],
                'required' => []
            ],
            'OSProfile' => [
                'properties' => [
                    'computerName' => ['type' => 'string'],
                    'adminUsername' => ['type' => 'string'],
                    'adminPassword' => ['type' => 'string'],
                    'customData' => ['type' => 'string'],
                    'windowsConfiguration' => ['$ref' => '#/definitions/WindowsConfiguration'],
                    'linuxConfiguration' => ['$ref' => '#/definitions/LinuxConfiguration'],
                    'secrets' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VaultSecretGroup']
                    ]
                ],
                'required' => []
            ],
            'NetworkInterfaceReferenceProperties' => [
                'properties' => ['primary' => ['type' => 'boolean']],
                'required' => []
            ],
            'NetworkInterfaceReference' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/NetworkInterfaceReferenceProperties']],
                'required' => []
            ],
            'NetworkProfile' => [
                'properties' => ['networkInterfaces' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/NetworkInterfaceReference']
                ]],
                'required' => []
            ],
            'BootDiagnostics' => [
                'properties' => [
                    'enabled' => ['type' => 'boolean'],
                    'storageUri' => ['type' => 'string']
                ],
                'required' => []
            ],
            'DiagnosticsProfile' => [
                'properties' => ['bootDiagnostics' => ['$ref' => '#/definitions/BootDiagnostics']],
                'required' => []
            ],
            'VirtualMachineExtensionHandlerInstanceView' => [
                'properties' => [
                    'type' => ['type' => 'string'],
                    'typeHandlerVersion' => ['type' => 'string'],
                    'status' => ['$ref' => '#/definitions/InstanceViewStatus']
                ],
                'required' => []
            ],
            'VirtualMachineAgentInstanceView' => [
                'properties' => [
                    'vmAgentVersion' => ['type' => 'string'],
                    'extensionHandlers' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachineExtensionHandlerInstanceView']
                    ],
                    'statuses' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InstanceViewStatus']
                    ]
                ],
                'required' => []
            ],
            'DiskInstanceView' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'encryptionSettings' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DiskEncryptionSettings']
                    ],
                    'statuses' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InstanceViewStatus']
                    ]
                ],
                'required' => []
            ],
            'BootDiagnosticsInstanceView' => [
                'properties' => [
                    'consoleScreenshotBlobUri' => ['type' => 'string'],
                    'serialConsoleLogBlobUri' => ['type' => 'string']
                ],
                'required' => []
            ],
            'VirtualMachineIdentity' => [
                'properties' => [
                    'principalId' => ['type' => 'string'],
                    'tenantId' => ['type' => 'string'],
                    'type' => [
                        'type' => 'string',
                        'enum' => ['SystemAssigned']
                    ]
                ],
                'required' => []
            ],
            'MaintenanceRedeployStatus' => [
                'properties' => [
                    'isCustomerInitiatedMaintenanceAllowed' => ['type' => 'boolean'],
                    'preMaintenanceWindowStartTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'preMaintenanceWindowEndTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'maintenanceWindowStartTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'maintenanceWindowEndTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'lastOperationResultCode' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'RetryLater',
                            'MaintenanceAborted',
                            'MaintenanceCompleted'
                        ]
                    ],
                    'lastOperationMessage' => ['type' => 'string']
                ],
                'required' => []
            ],
            'VirtualMachineInstanceView' => [
                'properties' => [
                    'platformUpdateDomain' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'platformFaultDomain' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'rdpThumbPrint' => ['type' => 'string'],
                    'vmAgent' => ['$ref' => '#/definitions/VirtualMachineAgentInstanceView'],
                    'maintenanceRedeployStatus' => ['$ref' => '#/definitions/MaintenanceRedeployStatus'],
                    'disks' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DiskInstanceView']
                    ],
                    'extensions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachineExtensionInstanceView']
                    ],
                    'bootDiagnostics' => ['$ref' => '#/definitions/BootDiagnosticsInstanceView'],
                    'statuses' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InstanceViewStatus']
                    ]
                ],
                'required' => []
            ],
            'VirtualMachineProperties' => [
                'properties' => [
                    'hardwareProfile' => ['$ref' => '#/definitions/HardwareProfile'],
                    'storageProfile' => ['$ref' => '#/definitions/StorageProfile'],
                    'osProfile' => ['$ref' => '#/definitions/OSProfile'],
                    'networkProfile' => ['$ref' => '#/definitions/NetworkProfile'],
                    'diagnosticsProfile' => ['$ref' => '#/definitions/DiagnosticsProfile'],
                    'availabilitySet' => ['$ref' => '#/definitions/SubResource'],
                    'provisioningState' => ['type' => 'string'],
                    'instanceView' => ['$ref' => '#/definitions/VirtualMachineInstanceView'],
                    'licenseType' => ['type' => 'string'],
                    'vmId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'VirtualMachine' => [
                'properties' => [
                    'plan' => ['$ref' => '#/definitions/Plan'],
                    'properties' => ['$ref' => '#/definitions/VirtualMachineProperties'],
                    'resources' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachineExtension']
                    ],
                    'identity' => ['$ref' => '#/definitions/VirtualMachineIdentity']
                ],
                'required' => []
            ],
            'VirtualMachineListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachine']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'UpgradePolicy' => [
                'properties' => ['mode' => [
                    'type' => 'string',
                    'enum' => [
                        'Automatic',
                        'Manual'
                    ]
                ]],
                'required' => []
            ],
            'RecoveryPolicy' => [
                'properties' => ['mode' => [
                    'type' => 'string',
                    'enum' => [
                        'None',
                        'OverProvision',
                        'Reprovision'
                    ]
                ]],
                'required' => []
            ],
            'ImageOSDisk' => [
                'properties' => [
                    'osType' => [
                        'type' => 'string',
                        'enum' => [
                            'Windows',
                            'Linux'
                        ]
                    ],
                    'osState' => [
                        'type' => 'string',
                        'enum' => [
                            'Generalized',
                            'Specialized'
                        ]
                    ],
                    'snapshot' => ['$ref' => '#/definitions/SubResource'],
                    'managedDisk' => ['$ref' => '#/definitions/SubResource'],
                    'blobUri' => ['type' => 'string'],
                    'caching' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'ReadOnly',
                            'ReadWrite'
                        ]
                    ],
                    'diskSizeGB' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'storageAccountType' => [
                        'type' => 'string',
                        'enum' => [
                            'Standard_LRS',
                            'Premium_LRS'
                        ]
                    ]
                ],
                'required' => [
                    'osType',
                    'osState'
                ]
            ],
            'ImageDataDisk' => [
                'properties' => [
                    'lun' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'snapshot' => ['$ref' => '#/definitions/SubResource'],
                    'managedDisk' => ['$ref' => '#/definitions/SubResource'],
                    'blobUri' => ['type' => 'string'],
                    'caching' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'ReadOnly',
                            'ReadWrite'
                        ]
                    ],
                    'diskSizeGB' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'storageAccountType' => [
                        'type' => 'string',
                        'enum' => [
                            'Standard_LRS',
                            'Premium_LRS'
                        ]
                    ]
                ],
                'required' => ['lun']
            ],
            'ImageStorageProfile' => [
                'properties' => [
                    'osDisk' => ['$ref' => '#/definitions/ImageOSDisk'],
                    'dataDisks' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ImageDataDisk']
                    ]
                ],
                'required' => ['osDisk']
            ],
            'ImageProperties' => [
                'properties' => [
                    'sourceVirtualMachine' => ['$ref' => '#/definitions/SubResource'],
                    'storageProfile' => ['$ref' => '#/definitions/ImageStorageProfile'],
                    'provisioningState' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Image' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ImageProperties']],
                'required' => []
            ],
            'ImageListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Image']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'VirtualMachineScaleSetIdentity' => [
                'properties' => [
                    'principalId' => ['type' => 'string'],
                    'tenantId' => ['type' => 'string'],
                    'type' => [
                        'type' => 'string',
                        'enum' => ['SystemAssigned']
                    ]
                ],
                'required' => []
            ],
            'ResourceSkuCapacity' => [
                'properties' => [
                    'minimum' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'maximum' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'default' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'scaleType' => [
                        'type' => 'string',
                        'enum' => [
                            'Automatic',
                            'Manual',
                            'None'
                        ]
                    ]
                ],
                'required' => []
            ],
            'ResourceSkuCosts' => [
                'properties' => [
                    'meterID' => ['type' => 'string'],
                    'quantity' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'extendedUnit' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ResourceSkuCapabilities' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'value' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ResourceSkuRestrictions' => [
                'properties' => [
                    'type' => [
                        'type' => 'string',
                        'enum' => ['location']
                    ],
                    'values' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'reasonCode' => [
                        'type' => 'string',
                        'enum' => [
                            'QuotaId',
                            'NotAvailableForSubscription'
                        ]
                    ]
                ],
                'required' => []
            ],
            'ResourceSku' => [
                'properties' => [
                    'resourceType' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'tier' => ['type' => 'string'],
                    'size' => ['type' => 'string'],
                    'family' => ['type' => 'string'],
                    'kind' => ['type' => 'string'],
                    'capacity' => ['$ref' => '#/definitions/ResourceSkuCapacity'],
                    'locations' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'apiVersions' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'costs' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceSkuCosts']
                    ],
                    'capabilities' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceSkuCapabilities']
                    ],
                    'restrictions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceSkuRestrictions']
                    ]
                ],
                'required' => []
            ],
            'ResourceSkusResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceSku']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'VirtualMachineScaleSetOSProfile' => [
                'properties' => [
                    'computerNamePrefix' => ['type' => 'string'],
                    'adminUsername' => ['type' => 'string'],
                    'adminPassword' => ['type' => 'string'],
                    'customData' => ['type' => 'string'],
                    'windowsConfiguration' => ['$ref' => '#/definitions/WindowsConfiguration'],
                    'linuxConfiguration' => ['$ref' => '#/definitions/LinuxConfiguration'],
                    'secrets' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VaultSecretGroup']
                    ]
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetManagedDiskParameters' => [
                'properties' => ['storageAccountType' => [
                    'type' => 'string',
                    'enum' => [
                        'Standard_LRS',
                        'Premium_LRS'
                    ]
                ]],
                'required' => []
            ],
            'VirtualMachineScaleSetOSDisk' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'caching' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'ReadOnly',
                            'ReadWrite'
                        ]
                    ],
                    'createOption' => [
                        'type' => 'string',
                        'enum' => [
                            'fromImage',
                            'empty',
                            'attach'
                        ]
                    ],
                    'osType' => [
                        'type' => 'string',
                        'enum' => [
                            'Windows',
                            'Linux'
                        ]
                    ],
                    'image' => ['$ref' => '#/definitions/VirtualHardDisk'],
                    'vhdContainers' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'managedDisk' => ['$ref' => '#/definitions/VirtualMachineScaleSetManagedDiskParameters']
                ],
                'required' => ['createOption']
            ],
            'VirtualMachineScaleSetDataDisk' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'lun' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'caching' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'ReadOnly',
                            'ReadWrite'
                        ]
                    ],
                    'createOption' => [
                        'type' => 'string',
                        'enum' => [
                            'fromImage',
                            'empty',
                            'attach'
                        ]
                    ],
                    'diskSizeGB' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'managedDisk' => ['$ref' => '#/definitions/VirtualMachineScaleSetManagedDiskParameters']
                ],
                'required' => [
                    'lun',
                    'createOption'
                ]
            ],
            'VirtualMachineScaleSetStorageProfile' => [
                'properties' => [
                    'imageReference' => ['$ref' => '#/definitions/ImageReference'],
                    'osDisk' => ['$ref' => '#/definitions/VirtualMachineScaleSetOSDisk'],
                    'dataDisks' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachineScaleSetDataDisk']
                    ]
                ],
                'required' => []
            ],
            'ApiEntityReference' => [
                'properties' => ['id' => ['type' => 'string']],
                'required' => []
            ],
            'VirtualMachineScaleSetPublicIPAddressConfigurationDnsSettings' => [
                'properties' => ['domainNameLabel' => ['type' => 'string']],
                'required' => ['domainNameLabel']
            ],
            'VirtualMachineScaleSetPublicIPAddressConfigurationProperties' => [
                'properties' => [
                    'idleTimeoutInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'dnsSettings' => ['$ref' => '#/definitions/VirtualMachineScaleSetPublicIPAddressConfigurationDnsSettings']
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetPublicIPAddressConfiguration' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/VirtualMachineScaleSetPublicIPAddressConfigurationProperties']
                ],
                'required' => ['name']
            ],
            'VirtualMachineScaleSetIPConfigurationProperties' => [
                'properties' => [
                    'subnet' => ['$ref' => '#/definitions/ApiEntityReference'],
                    'primary' => ['type' => 'boolean'],
                    'publicIPAddressConfiguration' => ['$ref' => '#/definitions/VirtualMachineScaleSetPublicIPAddressConfiguration'],
                    'privateIPAddressVersion' => [
                        'type' => 'string',
                        'enum' => [
                            'IPv4',
                            'IPv6'
                        ]
                    ],
                    'applicationGatewayBackendAddressPools' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ],
                    'loadBalancerBackendAddressPools' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ],
                    'loadBalancerInboundNatPools' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SubResource']
                    ]
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetIPConfiguration' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/VirtualMachineScaleSetIPConfigurationProperties']
                ],
                'required' => ['name']
            ],
            'VirtualMachineScaleSetNetworkConfigurationDnsSettings' => [
                'properties' => ['dnsServers' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'required' => []
            ],
            'VirtualMachineScaleSetNetworkConfigurationProperties' => [
                'properties' => [
                    'primary' => ['type' => 'boolean'],
                    'enableAcceleratedNetworking' => ['type' => 'boolean'],
                    'networkSecurityGroup' => ['$ref' => '#/definitions/SubResource'],
                    'dnsSettings' => ['$ref' => '#/definitions/VirtualMachineScaleSetNetworkConfigurationDnsSettings'],
                    'ipConfigurations' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachineScaleSetIPConfiguration']
                    ]
                ],
                'required' => ['ipConfigurations']
            ],
            'VirtualMachineScaleSetNetworkConfiguration' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/VirtualMachineScaleSetNetworkConfigurationProperties']
                ],
                'required' => ['name']
            ],
            'VirtualMachineScaleSetNetworkProfile' => [
                'properties' => ['networkInterfaceConfigurations' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualMachineScaleSetNetworkConfiguration']
                ]],
                'required' => []
            ],
            'VirtualMachineScaleSetExtensionProperties' => [
                'properties' => [
                    'forceUpdateTag' => ['type' => 'string'],
                    'publisher' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'typeHandlerVersion' => ['type' => 'string'],
                    'autoUpgradeMinorVersion' => ['type' => 'boolean'],
                    'settings' => ['type' => 'object'],
                    'protectedSettings' => ['type' => 'object'],
                    'provisioningState' => ['type' => 'string']
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetExtension' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/VirtualMachineScaleSetExtensionProperties']
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetExtensionListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachineScaleSetExtension']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'VirtualMachineScaleSetExtensionProfile' => [
                'properties' => ['extensions' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualMachineScaleSetExtension']
                ]],
                'required' => []
            ],
            'VirtualMachineScaleSetVMProfile' => [
                'properties' => [
                    'osProfile' => ['$ref' => '#/definitions/VirtualMachineScaleSetOSProfile'],
                    'storageProfile' => ['$ref' => '#/definitions/VirtualMachineScaleSetStorageProfile'],
                    'networkProfile' => ['$ref' => '#/definitions/VirtualMachineScaleSetNetworkProfile'],
                    'diagnosticsProfile' => ['$ref' => '#/definitions/DiagnosticsProfile'],
                    'extensionProfile' => ['$ref' => '#/definitions/VirtualMachineScaleSetExtensionProfile'],
                    'licenseType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetProperties' => [
                'properties' => [
                    'upgradePolicy' => ['$ref' => '#/definitions/UpgradePolicy'],
                    'recoveryPolicy' => ['$ref' => '#/definitions/RecoveryPolicy'],
                    'virtualMachineProfile' => ['$ref' => '#/definitions/VirtualMachineScaleSetVMProfile'],
                    'provisioningState' => ['type' => 'string'],
                    'overprovision' => ['type' => 'boolean'],
                    'uniqueId' => ['type' => 'string'],
                    'singlePlacementGroup' => ['type' => 'boolean']
                ],
                'required' => []
            ],
            'VirtualMachineScaleSet' => [
                'properties' => [
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'plan' => ['$ref' => '#/definitions/Plan'],
                    'properties' => ['$ref' => '#/definitions/VirtualMachineScaleSetProperties'],
                    'identity' => ['$ref' => '#/definitions/VirtualMachineScaleSetIdentity']
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetVMInstanceIDs' => [
                'properties' => ['instanceIds' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'required' => []
            ],
            'VirtualMachineScaleSetVMInstanceRequiredIDs' => [
                'properties' => ['instanceIds' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'required' => ['instanceIds']
            ],
            'VirtualMachineStatusCodeCount' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetInstanceViewStatusesSummary' => [
                'properties' => ['statusesSummary' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VirtualMachineStatusCodeCount']
                ]],
                'required' => []
            ],
            'VirtualMachineScaleSetVMExtensionsSummary' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'statusesSummary' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachineStatusCodeCount']
                    ]
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetInstanceView' => [
                'properties' => [
                    'virtualMachine' => ['$ref' => '#/definitions/VirtualMachineScaleSetInstanceViewStatusesSummary'],
                    'extensions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachineScaleSetVMExtensionsSummary']
                    ],
                    'statuses' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InstanceViewStatus']
                    ]
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachineScaleSet']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'VirtualMachineScaleSetListWithLinkResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachineScaleSet']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'VirtualMachineScaleSetSkuCapacity' => [
                'properties' => [
                    'minimum' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'maximum' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'defaultCapacity' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'scaleType' => [
                        'type' => 'string',
                        'enum' => [
                            'Automatic',
                            'None'
                        ]
                    ]
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetSku' => [
                'properties' => [
                    'resourceType' => ['type' => 'string'],
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'capacity' => ['$ref' => '#/definitions/VirtualMachineScaleSetSkuCapacity']
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetListSkusResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachineScaleSetSku']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'VirtualMachineScaleSetVMProperties' => [
                'properties' => [
                    'latestModelApplied' => ['type' => 'boolean'],
                    'vmId' => ['type' => 'string'],
                    'instanceView' => ['$ref' => '#/definitions/VirtualMachineInstanceView'],
                    'hardwareProfile' => ['$ref' => '#/definitions/HardwareProfile'],
                    'storageProfile' => ['$ref' => '#/definitions/StorageProfile'],
                    'osProfile' => ['$ref' => '#/definitions/OSProfile'],
                    'networkProfile' => ['$ref' => '#/definitions/NetworkProfile'],
                    'diagnosticsProfile' => ['$ref' => '#/definitions/DiagnosticsProfile'],
                    'availabilitySet' => ['$ref' => '#/definitions/SubResource'],
                    'provisioningState' => ['type' => 'string'],
                    'licenseType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetVM' => [
                'properties' => [
                    'instanceId' => ['type' => 'string'],
                    'sku' => ['$ref' => '#/definitions/Sku'],
                    'properties' => ['$ref' => '#/definitions/VirtualMachineScaleSetVMProperties'],
                    'plan' => ['$ref' => '#/definitions/Plan'],
                    'resources' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachineExtension']
                    ]
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetVMInstanceView' => [
                'properties' => [
                    'platformUpdateDomain' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'platformFaultDomain' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'rdpThumbPrint' => ['type' => 'string'],
                    'vmAgent' => ['$ref' => '#/definitions/VirtualMachineAgentInstanceView'],
                    'disks' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DiskInstanceView']
                    ],
                    'extensions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachineExtensionInstanceView']
                    ],
                    'bootDiagnostics' => ['$ref' => '#/definitions/BootDiagnosticsInstanceView'],
                    'statuses' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InstanceViewStatus']
                    ],
                    'placementGroupId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'VirtualMachineScaleSetVMListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VirtualMachineScaleSetVM']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'ApiErrorBase' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'target' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InnerError' => [
                'properties' => [
                    'exceptiontype' => ['type' => 'string'],
                    'errordetail' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ApiError' => [
                'properties' => [
                    'details' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ApiErrorBase']
                    ],
                    'innererror' => ['$ref' => '#/definitions/InnerError'],
                    'code' => ['type' => 'string'],
                    'target' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ComputeLongRunningOperationProperties' => [
                'properties' => ['output' => ['type' => 'object']],
                'required' => []
            ],
            'Resource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'location' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'required' => ['location']
            ],
            'SubResourceReadOnly' => [
                'properties' => ['id' => ['type' => 'string']],
                'required' => []
            ],
            'OperationStatusResponse' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'status' => ['type' => 'string'],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'error' => ['$ref' => '#/definitions/ApiError']
                ],
                'required' => []
            ],
            'DiskSku' => [
                'properties' => [
                    'name' => [
                        'type' => 'string',
                        'enum' => [
                            'Standard_LRS',
                            'Premium_LRS'
                        ]
                    ],
                    'tier' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ResourceUpdate' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'sku' => ['$ref' => '#/definitions/DiskSku']
                ],
                'required' => []
            ],
            'ImageDiskReference' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'lun' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => ['id']
            ],
            'CreationData' => [
                'properties' => [
                    'createOption' => [
                        'type' => 'string',
                        'enum' => [
                            'Empty',
                            'Attach',
                            'FromImage',
                            'Import',
                            'Copy'
                        ]
                    ],
                    'storageAccountId' => ['type' => 'string'],
                    'imageReference' => ['$ref' => '#/definitions/ImageDiskReference'],
                    'sourceUri' => ['type' => 'string'],
                    'sourceResourceId' => ['type' => 'string']
                ],
                'required' => ['createOption']
            ],
            'SourceVault' => [
                'properties' => ['id' => ['type' => 'string']],
                'required' => []
            ],
            'KeyVaultAndSecretReference' => [
                'properties' => [
                    'sourceVault' => ['$ref' => '#/definitions/SourceVault'],
                    'secretUrl' => ['type' => 'string']
                ],
                'required' => [
                    'sourceVault',
                    'secretUrl'
                ]
            ],
            'KeyVaultAndKeyReference' => [
                'properties' => [
                    'sourceVault' => ['$ref' => '#/definitions/SourceVault'],
                    'keyUrl' => ['type' => 'string']
                ],
                'required' => [
                    'sourceVault',
                    'keyUrl'
                ]
            ],
            'EncryptionSettings' => [
                'properties' => [
                    'enabled' => ['type' => 'boolean'],
                    'diskEncryptionKey' => ['$ref' => '#/definitions/KeyVaultAndSecretReference'],
                    'keyEncryptionKey' => ['$ref' => '#/definitions/KeyVaultAndKeyReference']
                ],
                'required' => []
            ],
            'DiskProperties' => [
                'properties' => [
                    'timeCreated' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'osType' => [
                        'type' => 'string',
                        'enum' => [
                            'Windows',
                            'Linux'
                        ]
                    ],
                    'creationData' => ['$ref' => '#/definitions/CreationData'],
                    'diskSizeGB' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'encryptionSettings' => ['$ref' => '#/definitions/EncryptionSettings'],
                    'provisioningState' => ['type' => 'string']
                ],
                'required' => ['creationData']
            ],
            'Disk' => [
                'properties' => [
                    'managedBy' => ['type' => 'string'],
                    'sku' => ['$ref' => '#/definitions/DiskSku'],
                    'properties' => ['$ref' => '#/definitions/DiskProperties']
                ],
                'required' => []
            ],
            'DiskUpdateProperties' => [
                'properties' => [
                    'osType' => [
                        'type' => 'string',
                        'enum' => [
                            'Windows',
                            'Linux'
                        ]
                    ],
                    'diskSizeGB' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'encryptionSettings' => ['$ref' => '#/definitions/EncryptionSettings']
                ],
                'required' => []
            ],
            'DiskUpdate' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DiskUpdateProperties']],
                'required' => []
            ],
            'DiskList' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Disk']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'GrantAccessData' => [
                'properties' => [
                    'access' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Read'
                        ]
                    ],
                    'durationInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => [
                    'access',
                    'durationInSeconds'
                ]
            ],
            'AccessUriRaw' => [
                'properties' => ['accessSAS' => ['type' => 'string']],
                'required' => []
            ],
            'AccessUriOutput' => [
                'properties' => ['output' => ['$ref' => '#/definitions/AccessUriRaw']],
                'required' => []
            ],
            'AccessUri' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AccessUriOutput']],
                'required' => []
            ],
            'Snapshot' => [
                'properties' => [
                    'managedBy' => ['type' => 'string'],
                    'sku' => ['$ref' => '#/definitions/DiskSku'],
                    'properties' => ['$ref' => '#/definitions/DiskProperties']
                ],
                'required' => []
            ],
            'SnapshotUpdate' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DiskUpdateProperties']],
                'required' => []
            ],
            'SnapshotList' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Snapshot']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'RunCommandInputParameter' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'value' => ['type' => 'string']
                ],
                'required' => [
                    'name',
                    'value'
                ]
            ],
            'RunCommandInput' => [
                'properties' => [
                    'commandId' => ['type' => 'string'],
                    'script' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'parameters' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RunCommandInputParameter']
                    ]
                ],
                'required' => ['commandId']
            ],
            'RunCommandParameterDefinition' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'defaultValue' => ['type' => 'string'],
                    'required' => ['type' => 'boolean']
                ],
                'required' => [
                    'name',
                    'type'
                ]
            ],
            'RunCommandDocumentBase' => [
                'properties' => [
                    '$schema' => ['type' => 'string'],
                    'id' => ['type' => 'string'],
                    'osType' => [
                        'type' => 'string',
                        'enum' => [
                            'Windows',
                            'Linux'
                        ]
                    ],
                    'label' => ['type' => 'string'],
                    'description' => ['type' => 'string']
                ],
                'required' => [
                    '$schema',
                    'id',
                    'osType',
                    'label',
                    'description'
                ]
            ],
            'RunCommandDocument' => [
                'properties' => [
                    'script' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'parameters' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RunCommandParameterDefinition']
                    ]
                ],
                'required' => ['script']
            ],
            'RunCommandListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RunCommandDocumentBase']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'RunCommandResultProperties' => [
                'properties' => ['output' => ['type' => 'object']],
                'required' => []
            ],
            'RunCommandResult' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RunCommandResultProperties']],
                'required' => []
            ],
            'ContainerServiceCustomProfile' => [
                'properties' => ['orchestrator' => ['type' => 'string']],
                'required' => ['orchestrator']
            ],
            'ContainerServiceServicePrincipalProfile' => [
                'properties' => [
                    'clientId' => ['type' => 'string'],
                    'secret' => ['type' => 'string']
                ],
                'required' => [
                    'clientId',
                    'secret'
                ]
            ],
            'ContainerServiceOrchestratorProfile' => [
                'properties' => ['orchestratorType' => [
                    'type' => 'string',
                    'enum' => [
                        'Swarm',
                        'DCOS',
                        'Custom',
                        'Kubernetes'
                    ]
                ]],
                'required' => ['orchestratorType']
            ],
            'ContainerServiceMasterProfile' => [
                'properties' => [
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'dnsPrefix' => ['type' => 'string'],
                    'fqdn' => ['type' => 'string']
                ],
                'required' => ['dnsPrefix']
            ],
            'ContainerServiceAgentPoolProfile' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'vmSize' => [
                        'type' => 'string',
                        'enum' => [
                            'Standard_A0',
                            'Standard_A1',
                            'Standard_A2',
                            'Standard_A3',
                            'Standard_A4',
                            'Standard_A5',
                            'Standard_A6',
                            'Standard_A7',
                            'Standard_A8',
                            'Standard_A9',
                            'Standard_A10',
                            'Standard_A11',
                            'Standard_D1',
                            'Standard_D2',
                            'Standard_D3',
                            'Standard_D4',
                            'Standard_D11',
                            'Standard_D12',
                            'Standard_D13',
                            'Standard_D14',
                            'Standard_D1_v2',
                            'Standard_D2_v2',
                            'Standard_D3_v2',
                            'Standard_D4_v2',
                            'Standard_D5_v2',
                            'Standard_D11_v2',
                            'Standard_D12_v2',
                            'Standard_D13_v2',
                            'Standard_D14_v2',
                            'Standard_G1',
                            'Standard_G2',
                            'Standard_G3',
                            'Standard_G4',
                            'Standard_G5',
                            'Standard_DS1',
                            'Standard_DS2',
                            'Standard_DS3',
                            'Standard_DS4',
                            'Standard_DS11',
                            'Standard_DS12',
                            'Standard_DS13',
                            'Standard_DS14',
                            'Standard_GS1',
                            'Standard_GS2',
                            'Standard_GS3',
                            'Standard_GS4',
                            'Standard_GS5'
                        ]
                    ],
                    'dnsPrefix' => ['type' => 'string'],
                    'fqdn' => ['type' => 'string']
                ],
                'required' => [
                    'name',
                    'count',
                    'vmSize',
                    'dnsPrefix'
                ]
            ],
            'ContainerServiceWindowsProfile' => [
                'properties' => [
                    'adminUsername' => ['type' => 'string'],
                    'adminPassword' => ['type' => 'string']
                ],
                'required' => [
                    'adminUsername',
                    'adminPassword'
                ]
            ],
            'ContainerServiceSshPublicKey' => [
                'properties' => ['keyData' => ['type' => 'string']],
                'required' => ['keyData']
            ],
            'ContainerServiceSshConfiguration' => [
                'properties' => ['publicKeys' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ContainerServiceSshPublicKey']
                ]],
                'required' => ['publicKeys']
            ],
            'ContainerServiceLinuxProfile' => [
                'properties' => [
                    'adminUsername' => ['type' => 'string'],
                    'ssh' => ['$ref' => '#/definitions/ContainerServiceSshConfiguration']
                ],
                'required' => [
                    'adminUsername',
                    'ssh'
                ]
            ],
            'ContainerServiceVMDiagnostics' => [
                'properties' => [
                    'enabled' => ['type' => 'boolean'],
                    'storageUri' => ['type' => 'string']
                ],
                'required' => ['enabled']
            ],
            'ContainerServiceDiagnosticsProfile' => [
                'properties' => ['vmDiagnostics' => ['$ref' => '#/definitions/ContainerServiceVMDiagnostics']],
                'required' => ['vmDiagnostics']
            ],
            'ContainerServiceProperties' => [
                'properties' => [
                    'provisioningState' => ['type' => 'string'],
                    'orchestratorProfile' => ['$ref' => '#/definitions/ContainerServiceOrchestratorProfile'],
                    'customProfile' => ['$ref' => '#/definitions/ContainerServiceCustomProfile'],
                    'servicePrincipalProfile' => ['$ref' => '#/definitions/ContainerServiceServicePrincipalProfile'],
                    'masterProfile' => ['$ref' => '#/definitions/ContainerServiceMasterProfile'],
                    'agentPoolProfiles' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ContainerServiceAgentPoolProfile']
                    ],
                    'windowsProfile' => ['$ref' => '#/definitions/ContainerServiceWindowsProfile'],
                    'linuxProfile' => ['$ref' => '#/definitions/ContainerServiceLinuxProfile'],
                    'diagnosticsProfile' => ['$ref' => '#/definitions/ContainerServiceDiagnosticsProfile']
                ],
                'required' => [
                    'masterProfile',
                    'agentPoolProfiles',
                    'linuxProfile'
                ]
            ],
            'ContainerService' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ContainerServiceProperties']],
                'required' => []
            ],
            'ContainerServiceListResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ContainerService']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ]
        ]
    ];
}
