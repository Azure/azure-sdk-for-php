<?php
namespace Microsoft\Azure\Management\MobileEngagement\_2014_12_01;
final class EngagementManagementClient
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
        $this->_AppCollections_group = new \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\AppCollections($_client);
        $this->_Apps_group = new \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\Apps($_client);
        $this->_SupportedPlatforms_group = new \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\SupportedPlatforms($_client);
        $this->_Campaigns_group = new \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\Campaigns($_client);
        $this->_Devices_group = new \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\Devices($_client);
        $this->_ExportTasks_group = new \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\ExportTasks($_client);
        $this->_ImportTasks_group = new \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\ImportTasks($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\AppCollections
     */
    public function getAppCollections()
    {
        return $this->_AppCollections_group;
    }
    /**
     * @return \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\Apps
     */
    public function getApps()
    {
        return $this->_Apps_group;
    }
    /**
     * @return \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\SupportedPlatforms
     */
    public function getSupportedPlatforms()
    {
        return $this->_SupportedPlatforms_group;
    }
    /**
     * @return \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\Campaigns
     */
    public function getCampaigns()
    {
        return $this->_Campaigns_group;
    }
    /**
     * @return \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\Devices
     */
    public function getDevices()
    {
        return $this->_Devices_group;
    }
    /**
     * @return \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\ExportTasks
     */
    public function getExportTasks()
    {
        return $this->_ExportTasks_group;
    }
    /**
     * @return \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\ImportTasks
     */
    public function getImportTasks()
    {
        return $this->_ImportTasks_group;
    }
    /**
     * @var \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\AppCollections
     */
    private $_AppCollections_group;
    /**
     * @var \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\Apps
     */
    private $_Apps_group;
    /**
     * @var \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\SupportedPlatforms
     */
    private $_SupportedPlatforms_group;
    /**
     * @var \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\Campaigns
     */
    private $_Campaigns_group;
    /**
     * @var \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\Devices
     */
    private $_Devices_group;
    /**
     * @var \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\ExportTasks
     */
    private $_ExportTasks_group;
    /**
     * @var \Microsoft\Azure\Management\MobileEngagement\_2014_12_01\ImportTasks
     */
    private $_ImportTasks_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/providers/Microsoft.MobileEngagement/appCollections' => ['get' => [
                'operationId' => 'AppCollections_List',
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
                        'enum' => ['2014-12-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppCollectionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.MobileEngagement/checkAppCollectionNameAvailability' => ['post' => [
                'operationId' => 'AppCollections_CheckNameAvailability',
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
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/AppCollectionNameAvailability'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppCollectionNameAvailability']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps' => ['get' => [
                'operationId' => 'Apps_List',
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
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AppListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.MobileEngagement/supportedPlatforms' => ['get' => [
                'operationId' => 'SupportedPlatforms_List',
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
                        'enum' => ['2014-12-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SupportedPlatformsListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/campaigns/{kind}' => [
                'get' => [
                    'operationId' => 'Campaigns_List',
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
                            'name' => 'appCollection',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'appName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-12-01']
                        ],
                        [
                            'name' => 'kind',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => [
                                'announcements',
                                'polls',
                                'dataPushes',
                                'nativePushes'
                            ]
                        ],
                        [
                            'name' => '$skip',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'integer',
                            'format' => 'int32'
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
                        ],
                        [
                            'name' => '$orderby',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ],
                        [
                            'name' => '$search',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CampaignsListResult']]]
                ],
                'post' => [
                    'operationId' => 'Campaigns_Create',
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
                            'name' => 'appCollection',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'appName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'kind',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => [
                                'announcements',
                                'polls',
                                'dataPushes',
                                'nativePushes'
                            ]
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-12-01']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Campaign'
                        ]
                    ],
                    'responses' => ['201' => ['schema' => ['$ref' => '#/definitions/CampaignStateResult']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/campaigns/{kind}/{id}' => [
                'get' => [
                    'operationId' => 'Campaigns_Get',
                    'parameters' => [
                        [
                            'name' => 'kind',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => [
                                'announcements',
                                'polls',
                                'dataPushes',
                                'nativePushes'
                            ]
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'integer',
                            'format' => 'int32'
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
                            'name' => 'appCollection',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'appName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-12-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CampaignResult']]]
                ],
                'put' => [
                    'operationId' => 'Campaigns_Update',
                    'parameters' => [
                        [
                            'name' => 'kind',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => [
                                'announcements',
                                'polls',
                                'dataPushes',
                                'nativePushes'
                            ]
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'integer',
                            'format' => 'int32'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Campaign'
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
                            'name' => 'appCollection',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'appName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-12-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CampaignStateResult']]]
                ],
                'delete' => [
                    'operationId' => 'Campaigns_Delete',
                    'parameters' => [
                        [
                            'name' => 'kind',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => [
                                'announcements',
                                'polls',
                                'dataPushes',
                                'nativePushes'
                            ]
                        ],
                        [
                            'name' => 'id',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'integer',
                            'format' => 'int32'
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
                            'name' => 'appCollection',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'appName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-12-01']
                        ]
                    ],
                    'responses' => ['200' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/campaignsByName/{kind}/{name}' => ['get' => [
                'operationId' => 'Campaigns_GetByName',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'kind',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => [
                            'announcements',
                            'polls',
                            'dataPushes',
                            'nativePushes'
                        ]
                    ],
                    [
                        'name' => 'name',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CampaignResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/campaigns/{kind}/{id}/test' => ['post' => [
                'operationId' => 'Campaigns_TestSaved',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'kind',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => [
                            'announcements',
                            'polls',
                            'dataPushes',
                            'nativePushes'
                        ]
                    ],
                    [
                        'name' => 'id',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/CampaignTestSavedParameters'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CampaignStateResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/campaigns/{kind}/test' => ['post' => [
                'operationId' => 'Campaigns_TestNew',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'kind',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => [
                            'announcements',
                            'polls',
                            'dataPushes',
                            'nativePushes'
                        ]
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/CampaignTestNewParameters'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CampaignState']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/campaigns/{kind}/{id}/activate' => ['post' => [
                'operationId' => 'Campaigns_Activate',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'kind',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => [
                            'announcements',
                            'polls',
                            'dataPushes',
                            'nativePushes'
                        ]
                    ],
                    [
                        'name' => 'id',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CampaignStateResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/campaigns/{kind}/{id}/suspend' => ['post' => [
                'operationId' => 'Campaigns_Suspend',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'kind',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => [
                            'announcements',
                            'polls',
                            'dataPushes',
                            'nativePushes'
                        ]
                    ],
                    [
                        'name' => 'id',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CampaignStateResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/campaigns/{kind}/{id}/push' => ['post' => [
                'operationId' => 'Campaigns_Push',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'kind',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => [
                            'announcements',
                            'polls',
                            'dataPushes',
                            'nativePushes'
                        ]
                    ],
                    [
                        'name' => 'id',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/CampaignPushParameters'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CampaignPushResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/campaigns/{kind}/{id}/statistics' => ['get' => [
                'operationId' => 'Campaigns_GetStatistics',
                'parameters' => [
                    [
                        'name' => 'kind',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => [
                            'announcements',
                            'polls',
                            'dataPushes',
                            'nativePushes'
                        ]
                    ],
                    [
                        'name' => 'id',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'integer',
                        'format' => 'int32'
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CampaignStatisticsResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/campaigns/{kind}/{id}/finish' => ['post' => [
                'operationId' => 'Campaigns_Finish',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'kind',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => [
                            'announcements',
                            'polls',
                            'dataPushes',
                            'nativePushes'
                        ]
                    ],
                    [
                        'name' => 'id',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CampaignStateResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices' => ['get' => [
                'operationId' => 'Devices_List',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DevicesQueryResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/{deviceId}' => ['get' => [
                'operationId' => 'Devices_GetByDeviceId',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'deviceId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Device']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/users/{userId}' => ['get' => [
                'operationId' => 'Devices_GetByUserId',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'userId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Device']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/tag' => ['post' => [
                'operationId' => 'Devices_TagByDeviceId',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/DeviceTagsParameters'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeviceTagsResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/users/tag' => ['post' => [
                'operationId' => 'Devices_TagByUserId',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/DeviceTagsParameters'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeviceTagsResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/exportTasks' => ['get' => [
                'operationId' => 'ExportTasks_List',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => '$skip',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
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
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/exportTaskListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/exportTasks/{id}' => ['get' => [
                'operationId' => 'ExportTasks_Get',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'id',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/exportTaskResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/exportTasks/activities' => ['post' => [
                'operationId' => 'ExportTasks_CreateActivitiesTask',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/dateRangeExportTaskParameter'
                    ]
                ],
                'responses' => ['202' => ['schema' => ['$ref' => '#/definitions/exportTaskResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/exportTasks/crashes' => ['post' => [
                'operationId' => 'ExportTasks_CreateCrashesTask',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/dateRangeExportTaskParameter'
                    ]
                ],
                'responses' => ['202' => ['schema' => ['$ref' => '#/definitions/exportTaskResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/exportTasks/errors' => ['post' => [
                'operationId' => 'ExportTasks_CreateErrorsTask',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/dateRangeExportTaskParameter'
                    ]
                ],
                'responses' => ['202' => ['schema' => ['$ref' => '#/definitions/exportTaskResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/exportTasks/events' => ['post' => [
                'operationId' => 'ExportTasks_CreateEventsTask',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/dateRangeExportTaskParameter'
                    ]
                ],
                'responses' => ['202' => ['schema' => ['$ref' => '#/definitions/exportTaskResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/exportTasks/jobs' => ['post' => [
                'operationId' => 'ExportTasks_CreateJobsTask',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/dateRangeExportTaskParameter'
                    ]
                ],
                'responses' => ['202' => ['schema' => ['$ref' => '#/definitions/exportTaskResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/exportTasks/sessions' => ['post' => [
                'operationId' => 'ExportTasks_CreateSessionsTask',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/dateRangeExportTaskParameter'
                    ]
                ],
                'responses' => ['202' => ['schema' => ['$ref' => '#/definitions/exportTaskResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/exportTasks/tags' => ['post' => [
                'operationId' => 'ExportTasks_CreateTagsTask',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/exportTaskParameter'
                    ]
                ],
                'responses' => ['202' => ['schema' => ['$ref' => '#/definitions/exportTaskResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/exportTasks/tokens' => ['post' => [
                'operationId' => 'ExportTasks_CreateTokensTask',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/exportTaskParameter'
                    ]
                ],
                'responses' => ['202' => ['schema' => ['$ref' => '#/definitions/exportTaskResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/exportTasks/feedbackByDate' => ['post' => [
                'operationId' => 'ExportTasks_CreateFeedbackTaskByDateRange',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/feedbackByDateRangeParameter'
                    ]
                ],
                'responses' => ['202' => ['schema' => ['$ref' => '#/definitions/exportTaskResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/exportTasks/feedbackByCampaign' => ['post' => [
                'operationId' => 'ExportTasks_CreateFeedbackTaskByCampaign',
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/feedbackByCampaignParameter'
                    ]
                ],
                'responses' => ['202' => ['schema' => ['$ref' => '#/definitions/exportTaskResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/importTasks' => [
                'get' => [
                    'operationId' => 'ImportTasks_List',
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
                            'name' => 'appCollection',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'appName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-12-01']
                        ],
                        [
                            'name' => '$skip',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'integer',
                            'format' => 'int32'
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
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/importTaskListResult']]]
                ],
                'post' => [
                    'operationId' => 'ImportTasks_Create',
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
                            'name' => 'appCollection',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'appName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-12-01']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/importTask'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/importTaskResult']],
                        '202' => ['schema' => ['$ref' => '#/definitions/importTaskResult']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.MobileEngagement/appcollections/{appCollection}/apps/{appName}/devices/importTasks/{id}' => ['get' => [
                'operationId' => 'ImportTasks_Get',
                'parameters' => [
                    [
                        'name' => 'id',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
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
                        'name' => 'appCollection',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'appName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-12-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/importTaskResult']]]
            ]]
        ],
        'definitions' => [
            'ApiError_error' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string']
            ]],
            'ApiError' => ['properties' => ['error' => ['$ref' => '#/definitions/ApiError_error']]],
            'AppProperties' => ['properties' => [
                'backendId' => ['type' => 'string'],
                'platform' => ['type' => 'string'],
                'appState' => ['type' => 'string']
            ]],
            'App' => ['properties' => ['properties' => ['$ref' => '#/definitions/AppProperties']]],
            'AppListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/App']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'AppCollectionProperties' => ['properties' => ['provisioningState' => [
                'type' => 'string',
                'enum' => [
                    'Creating',
                    'Succeeded'
                ]
            ]]],
            'AppCollection' => ['properties' => ['properties' => ['$ref' => '#/definitions/AppCollectionProperties']]],
            'AppCollectionListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AppCollection']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'AppCollectionNameAvailability' => ['properties' => [
                'name' => ['type' => 'string'],
                'available' => ['type' => 'boolean'],
                'unavailabilityReason' => ['type' => 'string']
            ]],
            'SupportedPlatformsListResult' => ['properties' => ['platforms' => [
                'type' => 'array',
                'items' => ['type' => 'string']
            ]]],
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'CampaignTestSavedParameters' => ['properties' => [
                'deviceId' => ['type' => 'string'],
                'lang' => ['type' => 'string']
            ]],
            'Criterion' => ['properties' => []],
            'Filter' => ['properties' => []],
            'Campaign_audience' => ['properties' => [
                'expression' => ['type' => 'string'],
                'criteria' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/Criterion']
                ],
                'filters' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Filter']
                ]
            ]],
            'NotificationOptions' => ['properties' => [
                'bigText' => ['type' => 'string'],
                'bigPicture' => ['type' => 'string'],
                'sound' => ['type' => 'string'],
                'actionText' => ['type' => 'string']
            ]],
            'CampaignLocalization' => ['properties' => [
                'notificationTitle' => ['type' => 'string'],
                'notificationMessage' => ['type' => 'string'],
                'notificationImage' => [
                    'type' => 'string',
                    'format' => 'byte'
                ],
                'notificationOptions' => ['$ref' => '#/definitions/NotificationOptions'],
                'title' => ['type' => 'string'],
                'body' => ['type' => 'string'],
                'actionButtonText' => ['type' => 'string'],
                'exitButtonText' => ['type' => 'string'],
                'actionUrl' => ['type' => 'string'],
                'payload' => ['type' => 'object']
            ]],
            'PollQuestionLocalization' => ['properties' => ['title' => ['type' => 'string']]],
            'PollQuestionChoiceLocalization' => ['properties' => ['title' => ['type' => 'string']]],
            'PollQuestionChoice' => ['properties' => [
                'id' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'localization' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/PollQuestionChoiceLocalization']
                ],
                'isDefault' => ['type' => 'boolean']
            ]],
            'PollQuestion' => ['properties' => [
                'id' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'localization' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/PollQuestionLocalization']
                ],
                'choices' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/PollQuestionChoice']
                ]
            ]],
            'Campaign' => ['properties' => [
                'name' => ['type' => 'string'],
                'audience' => ['$ref' => '#/definitions/Campaign_audience'],
                'category' => ['type' => 'string'],
                'pushMode' => [
                    'type' => 'string',
                    'enum' => [
                        'real-time',
                        'one-shot',
                        'manual'
                    ]
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'text/plain',
                        'text/html',
                        'only_notif',
                        'text/base64'
                    ]
                ],
                'deliveryTime' => [
                    'type' => 'string',
                    'enum' => [
                        'any',
                        'background',
                        'session'
                    ]
                ],
                'deliveryActivities' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'startTime' => ['type' => 'string'],
                'endTime' => ['type' => 'string'],
                'timezone' => ['type' => 'string'],
                'notificationType' => [
                    'type' => 'string',
                    'enum' => [
                        'system',
                        'popup'
                    ]
                ],
                'notificationIcon' => ['type' => 'boolean'],
                'notificationCloseable' => ['type' => 'boolean'],
                'notificationVibrate' => ['type' => 'boolean'],
                'notificationSound' => ['type' => 'boolean'],
                'notificationBadge' => ['type' => 'boolean'],
                'localization' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/CampaignLocalization']
                ],
                'questions' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/PollQuestion']
                ]
            ]],
            'CampaignTestNewParameters' => ['properties' => ['data' => ['$ref' => '#/definitions/Campaign']]],
            'CampaignPushParameters' => ['properties' => [
                'deviceIds' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'data' => ['$ref' => '#/definitions/Campaign']
            ]],
            'CampaignState' => ['properties' => ['state' => [
                'type' => 'string',
                'enum' => [
                    'draft',
                    'scheduled',
                    'in-progress',
                    'finished',
                    'queued'
                ]
            ]]],
            'CampaignStateResult' => ['properties' => ['id' => [
                'type' => 'integer',
                'format' => 'int32'
            ]]],
            'carrier-name' => ['properties' => ['name' => ['type' => 'string']]],
            'carrier-country' => ['properties' => ['name' => ['type' => 'string']]],
            'firmware-version' => ['properties' => ['name' => ['type' => 'string']]],
            'device-manufacturer' => ['properties' => ['name' => ['type' => 'string']]],
            'device-model' => ['properties' => ['name' => ['type' => 'string']]],
            'application-version' => ['properties' => ['name' => ['type' => 'string']]],
            'network-type' => ['properties' => ['name' => ['type' => 'string']]],
            'language' => ['properties' => ['name' => ['type' => 'string']]],
            'screen-size' => ['properties' => ['name' => ['type' => 'string']]],
            'location' => ['properties' => [
                'country' => ['type' => 'string'],
                'region' => ['type' => 'string'],
                'locality' => ['type' => 'string']
            ]],
            'geo-fencing' => ['properties' => [
                'lat' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'lon' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'radius' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'expiration' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'announcement-feedback' => ['properties' => [
                'content-id' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'action' => [
                    'type' => 'string',
                    'enum' => [
                        'pushed',
                        'replied',
                        'actioned',
                        'exited'
                    ]
                ]
            ]],
            'poll-feedback' => ['properties' => [
                'content-id' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'action' => [
                    'type' => 'string',
                    'enum' => [
                        'pushed',
                        'replied',
                        'actioned',
                        'exited'
                    ]
                ]
            ]],
            'poll-answer-feedback' => ['properties' => [
                'content-id' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'choice-id' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'datapush-feedback' => ['properties' => [
                'content-id' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'action' => [
                    'type' => 'string',
                    'enum' => [
                        'pushed',
                        'replied',
                        'actioned',
                        'exited'
                    ]
                ]
            ]],
            'segment' => ['properties' => [
                'id' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'exclude' => ['type' => 'boolean']
            ]],
            'string-tag' => ['properties' => [
                'name' => ['type' => 'string'],
                'value' => ['type' => 'string']
            ]],
            'date-tag' => ['properties' => [
                'name' => ['type' => 'string'],
                'value' => [
                    'type' => 'string',
                    'format' => 'date'
                ],
                'op' => [
                    'type' => 'string',
                    'enum' => [
                        'EQ',
                        'LT',
                        'GT',
                        'LE',
                        'GE'
                    ]
                ]
            ]],
            'integer-tag' => ['properties' => [
                'name' => ['type' => 'string'],
                'value' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'op' => [
                    'type' => 'string',
                    'enum' => [
                        'EQ',
                        'LT',
                        'GT',
                        'LE',
                        'GE'
                    ]
                ]
            ]],
            'boolean-tag' => ['properties' => [
                'name' => ['type' => 'string'],
                'value' => ['type' => 'boolean']
            ]],
            'engage-subset' => ['properties' => ['max' => [
                'type' => 'integer',
                'format' => 'int32'
            ]]],
            'engage-old-users' => ['properties' => ['threshold' => [
                'type' => 'integer',
                'format' => 'int32'
            ]]],
            'engage-new-users' => ['properties' => ['threshold' => [
                'type' => 'integer',
                'format' => 'int32'
            ]]],
            'engage-active-users' => ['properties' => ['threshold' => [
                'type' => 'integer',
                'format' => 'int32'
            ]]],
            'engage-idle-users' => ['properties' => ['threshold' => [
                'type' => 'integer',
                'format' => 'int32'
            ]]],
            'native-push-enabled' => ['properties' => []],
            'push-quota' => ['properties' => []],
            'app-info' => ['properties' => ['appInfo' => [
                'type' => 'array',
                'items' => ['type' => 'string']
            ]]],
            'CampaignListResult' => ['properties' => [
                'name' => ['type' => 'string'],
                'activatedDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'finishedDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'timezone' => ['type' => 'string']
            ]],
            'CampaignResult' => ['properties' => [
                'id' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'draft',
                        'scheduled',
                        'in-progress',
                        'finished',
                        'queued'
                    ]
                ],
                'activatedDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'finishedDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'CampaignPushResult' => ['properties' => ['invalidDeviceIds' => [
                'type' => 'array',
                'items' => ['type' => 'string']
            ]]],
            'CampaignStatisticsResult' => ['properties' => [
                'queued' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'pushed' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'pushed-native' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'pushed-native-google' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'pushed-native-adm' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'delivered' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'dropped' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'system-notification-displayed' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'in-app-notification-displayed' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'content-displayed' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'system-notification-actioned' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'system-notification-exited' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'in-app-notification-actioned' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'in-app-notification-exited' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'content-actioned' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'content-exited' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'answers' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'object']
                ]
            ]],
            'CampaignsListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/CampaignListResult']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'DeviceMeta' => ['properties' => [
                'firstSeen' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'lastSeen' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'lastInfo' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'lastLocation' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'nativePushEnabled' => ['type' => 'boolean']
            ]],
            'DeviceQueryResult' => ['properties' => [
                'deviceId' => ['type' => 'string'],
                'meta' => ['$ref' => '#/definitions/DeviceMeta'],
                'appInfo' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'DevicesQueryResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/DeviceQueryResult']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'DeviceInfo' => ['properties' => [
                'phoneModel' => ['type' => 'string'],
                'phoneManufacturer' => ['type' => 'string'],
                'firmwareVersion' => ['type' => 'string'],
                'firmwareName' => ['type' => 'string'],
                'androidAPILevel' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'carrierCountry' => ['type' => 'string'],
                'locale' => ['type' => 'string'],
                'carrierName' => ['type' => 'string'],
                'networkType' => ['type' => 'string'],
                'networkSubtype' => ['type' => 'string'],
                'applicationVersionName' => ['type' => 'string'],
                'applicationVersionCode' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'timeZoneOffset' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'serviceVersion' => ['type' => 'string']
            ]],
            'DeviceLocation' => ['properties' => [
                'countrycode' => ['type' => 'string'],
                'region' => ['type' => 'string'],
                'locality' => ['type' => 'string']
            ]],
            'Device' => ['properties' => [
                'deviceId' => ['type' => 'string'],
                'meta' => ['$ref' => '#/definitions/DeviceMeta'],
                'info' => ['$ref' => '#/definitions/DeviceInfo'],
                'location' => ['$ref' => '#/definitions/DeviceLocation'],
                'appInfo' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'DeviceTagsParameters' => ['properties' => [
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'deleteOnNull' => ['type' => 'boolean']
            ]],
            'DeviceTagsResult' => ['properties' => ['invalidIds' => [
                'type' => 'array',
                'items' => ['type' => 'string']
            ]]],
            'exportOptions' => ['properties' => ['exportUserId' => ['type' => 'boolean']]],
            'dateRangeExportTaskParameter' => ['properties' => [
                'containerUrl' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'startDate' => [
                    'type' => 'string',
                    'format' => 'date'
                ],
                'endDate' => [
                    'type' => 'string',
                    'format' => 'date'
                ],
                'exportFormat' => [
                    'type' => 'string',
                    'enum' => [
                        'JsonBlob',
                        'CsvBlob'
                    ]
                ]
            ]],
            'exportTaskParameter' => ['properties' => [
                'containerUrl' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'exportFormat' => [
                    'type' => 'string',
                    'enum' => [
                        'JsonBlob',
                        'CsvBlob'
                    ]
                ]
            ]],
            'feedbackByCampaignParameter' => ['properties' => [
                'containerUrl' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'campaignType' => [
                    'type' => 'string',
                    'enum' => [
                        'Announcement',
                        'DataPush',
                        'NativePush',
                        'Poll'
                    ]
                ],
                'campaignIds' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'exportFormat' => [
                    'type' => 'string',
                    'enum' => [
                        'JsonBlob',
                        'CsvBlob'
                    ]
                ]
            ]],
            'feedbackByDateRangeParameter' => ['properties' => [
                'containerUrl' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'campaignType' => [
                    'type' => 'string',
                    'enum' => [
                        'Announcement',
                        'DataPush',
                        'NativePush',
                        'Poll'
                    ]
                ],
                'campaignWindowStart' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'campaignWindowEnd' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'exportFormat' => [
                    'type' => 'string',
                    'enum' => [
                        'JsonBlob',
                        'CsvBlob'
                    ]
                ]
            ]],
            'exportTaskResult' => ['properties' => [
                'id' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'Queued',
                        'Started',
                        'Succeeded',
                        'Failed'
                    ]
                ],
                'dateCreated' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'dateCompleted' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'exportType' => [
                    'type' => 'string',
                    'enum' => [
                        'Activity',
                        'Tag',
                        'Crash',
                        'Error',
                        'Event',
                        'Job',
                        'Session',
                        'Token',
                        'Push'
                    ]
                ],
                'errorDetails' => ['type' => 'string']
            ]],
            'exportTaskListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/exportTaskResult']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'importTask' => ['properties' => ['storageUrl' => ['type' => 'string']]],
            'importTaskResult' => ['properties' => [
                'id' => ['type' => 'string'],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'Queued',
                        'Started',
                        'Succeeded',
                        'Failed'
                    ]
                ],
                'dateCreated' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'dateCompleted' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'errorDetails' => ['type' => 'string']
            ]],
            'importTaskListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/importTaskResult']
                ],
                'nextLink' => ['type' => 'string']
            ]]
        ]
    ];
}
