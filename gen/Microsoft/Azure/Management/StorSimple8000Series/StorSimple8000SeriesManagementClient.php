<?php
namespace Microsoft\Azure\Management\StorSimple8000Series;
final class StorSimple8000SeriesManagementClient
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
        $this->_Operations_group = new \Microsoft\Azure\Management\StorSimple8000Series\Operations($_client);
        $this->_Managers_group = new \Microsoft\Azure\Management\StorSimple8000Series\Managers($_client);
        $this->_AccessControlRecords_group = new \Microsoft\Azure\Management\StorSimple8000Series\AccessControlRecords($_client);
        $this->_Alerts_group = new \Microsoft\Azure\Management\StorSimple8000Series\Alerts($_client);
        $this->_BandwidthSettings_group = new \Microsoft\Azure\Management\StorSimple8000Series\BandwidthSettings($_client);
        $this->_CloudAppliances_group = new \Microsoft\Azure\Management\StorSimple8000Series\CloudAppliances($_client);
        $this->_Devices_group = new \Microsoft\Azure\Management\StorSimple8000Series\Devices($_client);
        $this->_DeviceSettings_group = new \Microsoft\Azure\Management\StorSimple8000Series\DeviceSettings($_client);
        $this->_BackupPolicies_group = new \Microsoft\Azure\Management\StorSimple8000Series\BackupPolicies($_client);
        $this->_BackupSchedules_group = new \Microsoft\Azure\Management\StorSimple8000Series\BackupSchedules($_client);
        $this->_Backups_group = new \Microsoft\Azure\Management\StorSimple8000Series\Backups($_client);
        $this->_HardwareComponentGroups_group = new \Microsoft\Azure\Management\StorSimple8000Series\HardwareComponentGroups($_client);
        $this->_Jobs_group = new \Microsoft\Azure\Management\StorSimple8000Series\Jobs($_client);
        $this->_VolumeContainers_group = new \Microsoft\Azure\Management\StorSimple8000Series\VolumeContainers($_client);
        $this->_Volumes_group = new \Microsoft\Azure\Management\StorSimple8000Series\Volumes($_client);
        $this->_StorageAccountCredentials_group = new \Microsoft\Azure\Management\StorSimple8000Series\StorageAccountCredentials($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\Managers
     */
    public function getManagers()
    {
        return $this->_Managers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\AccessControlRecords
     */
    public function getAccessControlRecords()
    {
        return $this->_AccessControlRecords_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\Alerts
     */
    public function getAlerts()
    {
        return $this->_Alerts_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\BandwidthSettings
     */
    public function getBandwidthSettings()
    {
        return $this->_BandwidthSettings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\CloudAppliances
     */
    public function getCloudAppliances()
    {
        return $this->_CloudAppliances_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\Devices
     */
    public function getDevices()
    {
        return $this->_Devices_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\DeviceSettings
     */
    public function getDeviceSettings()
    {
        return $this->_DeviceSettings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\BackupPolicies
     */
    public function getBackupPolicies()
    {
        return $this->_BackupPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\BackupSchedules
     */
    public function getBackupSchedules()
    {
        return $this->_BackupSchedules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\Backups
     */
    public function getBackups()
    {
        return $this->_Backups_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\HardwareComponentGroups
     */
    public function getHardwareComponentGroups()
    {
        return $this->_HardwareComponentGroups_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\Jobs
     */
    public function getJobs()
    {
        return $this->_Jobs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\VolumeContainers
     */
    public function getVolumeContainers()
    {
        return $this->_VolumeContainers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\Volumes
     */
    public function getVolumes()
    {
        return $this->_Volumes_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\StorageAccountCredentials
     */
    public function getStorageAccountCredentials()
    {
        return $this->_StorageAccountCredentials_group;
    }
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\Operations
     */
    private $_Operations_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\Managers
     */
    private $_Managers_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\AccessControlRecords
     */
    private $_AccessControlRecords_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\Alerts
     */
    private $_Alerts_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\BandwidthSettings
     */
    private $_BandwidthSettings_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\CloudAppliances
     */
    private $_CloudAppliances_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\Devices
     */
    private $_Devices_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\DeviceSettings
     */
    private $_DeviceSettings_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\BackupPolicies
     */
    private $_BackupPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\BackupSchedules
     */
    private $_BackupSchedules_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\Backups
     */
    private $_Backups_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\HardwareComponentGroups
     */
    private $_HardwareComponentGroups_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\Jobs
     */
    private $_Jobs_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\VolumeContainers
     */
    private $_VolumeContainers_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\Volumes
     */
    private $_Volumes_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\StorageAccountCredentials
     */
    private $_StorageAccountCredentials_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/providers/Microsoft.StorSimple/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'x-ms-skip-url-encoding' => TRUE,
                    'type' => 'string',
                    'enum' => ['2017-06-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AvailableProviderOperationList']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.StorSimple/managers' => ['get' => [
                'operationId' => 'Managers_List',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ManagerList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers' => ['get' => [
                'operationId' => 'Managers_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ManagerList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}' => [
                'get' => [
                    'operationId' => 'Managers_Get',
                    'parameters' => [
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Manager']]]
                ],
                'put' => [
                    'operationId' => 'Managers_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Manager']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Manager']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Manager']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Managers_Delete',
                    'parameters' => [
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'Managers_Update',
                    'parameters' => [
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ManagerPatch']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Manager']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/publicEncryptionKey' => ['post' => [
                'operationId' => 'Managers_GetDevicePublicEncryptionKey',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PublicKey']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/encryptionSettings/default' => ['get' => [
                'operationId' => 'Managers_GetEncryptionSettings',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/EncryptionSettings']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/extendedInformation/vaultExtendedInfo' => [
                'get' => [
                    'operationId' => 'Managers_GetExtendedInfo',
                    'parameters' => [
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ManagerExtendedInfo']]]
                ],
                'put' => [
                    'operationId' => 'Managers_CreateExtendedInfo',
                    'parameters' => [
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ManagerExtendedInfo']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ManagerExtendedInfo']]]
                ],
                'delete' => [
                    'operationId' => 'Managers_DeleteExtendedInfo',
                    'parameters' => [
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['204' => []]
                ],
                'patch' => [
                    'operationId' => 'Managers_UpdateExtendedInfo',
                    'parameters' => [
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ManagerExtendedInfo']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => 'If-Match',
                            'in' => 'header',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ManagerExtendedInfo']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/features' => ['get' => [
                'operationId' => 'Managers_ListFeatureSupportStatus',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FeatureList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/listActivationKey' => ['post' => [
                'operationId' => 'Managers_GetActivationKey',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Key']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/listPublicEncryptionKey' => ['post' => [
                'operationId' => 'Managers_GetPublicEncryptionKey',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SymmetricEncryptedSecret']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/metrics' => ['get' => [
                'operationId' => 'Managers_ListMetrics',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MetricList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/metricsDefinitions' => ['get' => [
                'operationId' => 'Managers_ListMetricDefinition',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MetricDefinitionList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/regenerateActivationKey' => ['post' => [
                'operationId' => 'Managers_RegenerateActivationKey',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Key']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/accessControlRecords' => ['get' => [
                'operationId' => 'AccessControlRecords_ListByManager',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AccessControlRecordList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/accessControlRecords/{accessControlRecordName}' => [
                'get' => [
                    'operationId' => 'AccessControlRecords_Get',
                    'parameters' => [
                        [
                            'name' => 'accessControlRecordName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AccessControlRecord']]]
                ],
                'put' => [
                    'operationId' => 'AccessControlRecords_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'accessControlRecordName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AccessControlRecord']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/AccessControlRecord']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'AccessControlRecords_Delete',
                    'parameters' => [
                        [
                            'name' => 'accessControlRecordName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/alerts' => ['get' => [
                'operationId' => 'Alerts_ListByManager',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AlertList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/clearAlerts' => ['post' => [
                'operationId' => 'Alerts_Clear',
                'parameters' => [
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ClearAlertRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/sendTestAlertEmail' => ['post' => [
                'operationId' => 'Alerts_SendTestEmail',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/SendTestAlertEmailRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/bandwidthSettings' => ['get' => [
                'operationId' => 'BandwidthSettings_ListByManager',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BandwidthSettingList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/bandwidthSettings/{bandwidthSettingName}' => [
                'get' => [
                    'operationId' => 'BandwidthSettings_Get',
                    'parameters' => [
                        [
                            'name' => 'bandwidthSettingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BandwidthSetting']]]
                ],
                'put' => [
                    'operationId' => 'BandwidthSettings_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'bandwidthSettingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/BandwidthSetting']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/BandwidthSetting']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'BandwidthSettings_Delete',
                    'parameters' => [
                        [
                            'name' => 'bandwidthSettingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/cloudApplianceConfigurations' => ['get' => [
                'operationId' => 'CloudAppliances_ListSupportedConfigurations',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CloudApplianceConfigurationList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/provisionCloudAppliance' => ['post' => [
                'operationId' => 'CloudAppliances_Provision',
                'parameters' => [
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CloudAppliance']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => [
                    '200' => [],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/configureDevice' => ['post' => [
                'operationId' => 'Devices_Configure',
                'parameters' => [
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ConfigureDeviceRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices' => ['get' => [
                'operationId' => 'Devices_ListByManager',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => '$expand',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeviceList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}' => [
                'get' => [
                    'operationId' => 'Devices_Get',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ],
                        [
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Device']]]
                ],
                'delete' => [
                    'operationId' => 'Devices_Delete',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'Devices_Update',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/DevicePatch']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Device']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/authorizeForServiceEncryptionKeyRollover' => ['post' => [
                'operationId' => 'Devices_AuthorizeForServiceEncryptionKeyRollover',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/deactivate' => ['post' => [
                'operationId' => 'Devices_Deactivate',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/installUpdates' => ['post' => [
                'operationId' => 'Devices_InstallUpdates',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/listFailoverSets' => ['post' => [
                'operationId' => 'Devices_ListFailoverSets',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FailoverSetsList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/metrics' => ['get' => [
                'operationId' => 'Devices_ListMetrics',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MetricList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/metricsDefinitions' => ['get' => [
                'operationId' => 'Devices_ListMetricDefinition',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MetricDefinitionList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/scanForUpdates' => ['post' => [
                'operationId' => 'Devices_ScanForUpdates',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/updateSummary/default' => ['get' => [
                'operationId' => 'Devices_GetUpdateSummary',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Updates']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{sourceDeviceName}/failover' => ['post' => [
                'operationId' => 'Devices_Failover',
                'parameters' => [
                    [
                        'name' => 'sourceDeviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/FailoverRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{sourceDeviceName}/listFailoverTargets' => ['post' => [
                'operationId' => 'Devices_ListFailoverTargets',
                'parameters' => [
                    [
                        'name' => 'sourceDeviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ListFailoverTargetsRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FailoverTargetsList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/alertSettings/default' => [
                'get' => [
                    'operationId' => 'DeviceSettings_GetAlertSettings',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AlertSettings']]]
                ],
                'put' => [
                    'operationId' => 'DeviceSettings_CreateOrUpdateAlertSettings',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AlertSettings']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/AlertSettings']],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/networkSettings/default' => [
                'get' => [
                    'operationId' => 'DeviceSettings_GetNetworkSettings',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkSettings']]]
                ],
                'patch' => [
                    'operationId' => 'DeviceSettings_UpdateNetworkSettings',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/NetworkSettingsPatch']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/NetworkSettings']],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/securitySettings/default' => [
                'get' => [
                    'operationId' => 'DeviceSettings_GetSecuritySettings',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/SecuritySettings']]]
                ],
                'patch' => [
                    'operationId' => 'DeviceSettings_UpdateSecuritySettings',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/SecuritySettingsPatch']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/SecuritySettings']],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/securitySettings/default/syncRemoteManagementCertificate' => ['post' => [
                'operationId' => 'DeviceSettings_SyncRemotemanagementCertificate',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/timeSettings/default' => [
                'get' => [
                    'operationId' => 'DeviceSettings_GetTimeSettings',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TimeSettings']]]
                ],
                'put' => [
                    'operationId' => 'DeviceSettings_CreateOrUpdateTimeSettings',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/TimeSettings']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/TimeSettings']],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/backupPolicies' => ['get' => [
                'operationId' => 'BackupPolicies_ListByDevice',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupPolicyList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/backupPolicies/{backupPolicyName}' => [
                'get' => [
                    'operationId' => 'BackupPolicies_Get',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupPolicy']]]
                ],
                'put' => [
                    'operationId' => 'BackupPolicies_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/BackupPolicy']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/BackupPolicy']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'BackupPolicies_Delete',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/backupPolicies/{backupPolicyName}/backup' => ['post' => [
                'operationId' => 'BackupPolicies_BackupNow',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'backupPolicyName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'backupType',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/backupPolicies/{backupPolicyName}/schedules' => ['get' => [
                'operationId' => 'BackupSchedules_ListByBackupPolicy',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'backupPolicyName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupScheduleList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/backupPolicies/{backupPolicyName}/schedules/{backupScheduleName}' => [
                'get' => [
                    'operationId' => 'BackupSchedules_Get',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupScheduleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupSchedule']]]
                ],
                'put' => [
                    'operationId' => 'BackupSchedules_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupScheduleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/BackupSchedule']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/BackupSchedule']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'BackupSchedules_Delete',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupScheduleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/backups' => ['get' => [
                'operationId' => 'Backups_ListByDevice',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/backups/{backupName}' => ['delete' => [
                'operationId' => 'Backups_Delete',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'backupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/backups/{backupName}/elements/{backupElementName}/clone' => ['post' => [
                'operationId' => 'Backups_Clone',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'backupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'backupElementName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/CloneRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => [
                    '200' => [],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/backups/{backupName}/restore' => ['post' => [
                'operationId' => 'Backups_Restore',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'backupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => [
                    '200' => [],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/hardwareComponentGroups' => ['get' => [
                'operationId' => 'HardwareComponentGroups_ListByDevice',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HardwareComponentGroupList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/hardwareComponentGroups/{hardwareComponentGroupName}/changeControllerPowerState' => ['post' => [
                'operationId' => 'HardwareComponentGroups_ChangeControllerPowerState',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'hardwareComponentGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ControllerPowerStateChangeRequest']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/jobs' => ['get' => [
                'operationId' => 'Jobs_ListByDevice',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/jobs/{jobName}' => ['get' => [
                'operationId' => 'Jobs_Get',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Job']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/jobs/{jobName}/cancel' => ['post' => [
                'operationId' => 'Jobs_Cancel',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/jobs' => ['get' => [
                'operationId' => 'Jobs_ListByManager',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/volumeContainers' => ['get' => [
                'operationId' => 'VolumeContainers_ListByDevice',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VolumeContainerList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/volumeContainers/{volumeContainerName}' => [
                'get' => [
                    'operationId' => 'VolumeContainers_Get',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'volumeContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VolumeContainer']]]
                ],
                'put' => [
                    'operationId' => 'VolumeContainers_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'volumeContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/VolumeContainer']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VolumeContainer']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'VolumeContainers_Delete',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'volumeContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/volumeContainers/{volumeContainerName}/metrics' => ['get' => [
                'operationId' => 'VolumeContainers_ListMetrics',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'volumeContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MetricList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/volumeContainers/{volumeContainerName}/metricsDefinitions' => ['get' => [
                'operationId' => 'VolumeContainers_ListMetricDefinition',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'volumeContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MetricDefinitionList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/volumeContainers/{volumeContainerName}/volumes' => ['get' => [
                'operationId' => 'Volumes_ListByVolumeContainer',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'volumeContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VolumeList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/volumeContainers/{volumeContainerName}/volumes/{volumeName}' => [
                'get' => [
                    'operationId' => 'Volumes_Get',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'volumeContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'volumeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Volume']]]
                ],
                'put' => [
                    'operationId' => 'Volumes_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'volumeContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'volumeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/Volume']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Volume']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Volumes_Delete',
                    'parameters' => [
                        [
                            'name' => 'deviceName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'volumeContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'volumeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/volumeContainers/{volumeContainerName}/volumes/{volumeName}/metrics' => ['get' => [
                'operationId' => 'Volumes_ListMetrics',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'volumeContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'volumeName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MetricList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/volumeContainers/{volumeContainerName}/volumes/{volumeName}/metricsDefinitions' => ['get' => [
                'operationId' => 'Volumes_ListMetricDefinition',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'volumeContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'volumeName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MetricDefinitionList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/devices/{deviceName}/volumes' => ['get' => [
                'operationId' => 'Volumes_ListByDevice',
                'parameters' => [
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VolumeList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/storageAccountCredentials' => ['get' => [
                'operationId' => 'StorageAccountCredentials_ListByManager',
                'parameters' => [
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'managerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageAccountCredentialList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.StorSimple/managers/{managerName}/storageAccountCredentials/{storageAccountCredentialName}' => [
                'get' => [
                    'operationId' => 'StorageAccountCredentials_Get',
                    'parameters' => [
                        [
                            'name' => 'storageAccountCredentialName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageAccountCredential']]]
                ],
                'put' => [
                    'operationId' => 'StorageAccountCredentials_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'storageAccountCredentialName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/StorageAccountCredential']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/StorageAccountCredential']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'StorageAccountCredentials_Delete',
                    'parameters' => [
                        [
                            'name' => 'storageAccountCredentialName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'managerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-06-01']
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ]
            ]
        ],
        'definitions' => [
            'AccessControlRecordProperties' => [
                'properties' => [
                    'initiatorName' => ['type' => 'string'],
                    'volumeCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['initiatorName']
            ],
            'AccessControlRecord' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AccessControlRecordProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'AccessControlRecordList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AccessControlRecord']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'AcsConfiguration' => [
                'properties' => [
                    'namespace' => ['type' => 'string'],
                    'realm' => ['type' => 'string'],
                    'serviceUrl' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'namespace',
                    'realm',
                    'serviceUrl'
                ]
            ],
            'AlertSource' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'timeZone' => ['type' => 'string'],
                    'alertSourceType' => [
                        'type' => 'string',
                        'enum' => [
                            'Resource',
                            'Device'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AlertErrorDetails' => [
                'properties' => [
                    'errorCode' => ['type' => 'string'],
                    'errorMessage' => ['type' => 'string'],
                    'occurences' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AlertProperties' => [
                'properties' => [
                    'title' => ['type' => 'string'],
                    'scope' => [
                        'type' => 'string',
                        'enum' => [
                            'Resource',
                            'Device'
                        ]
                    ],
                    'alertType' => ['type' => 'string'],
                    'appearedAtTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'appearedAtSourceTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'clearedAtTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'clearedAtSourceTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'source' => ['$ref' => '#/definitions/AlertSource'],
                    'recommendation' => ['type' => 'string'],
                    'resolutionReason' => ['type' => 'string'],
                    'severity' => [
                        'type' => 'string',
                        'enum' => [
                            'Informational',
                            'Warning',
                            'Critical'
                        ]
                    ],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'Active',
                            'Cleared'
                        ]
                    ],
                    'errorDetails' => ['$ref' => '#/definitions/AlertErrorDetails'],
                    'detailedInformation' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'title',
                    'scope',
                    'alertType',
                    'appearedAtTime',
                    'appearedAtSourceTime',
                    'source',
                    'severity',
                    'status'
                ]
            ],
            'Alert' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AlertProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'AlertFilter' => [
                'properties' => [
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'Active',
                            'Cleared'
                        ]
                    ],
                    'severity' => [
                        'type' => 'string',
                        'enum' => [
                            'Informational',
                            'Warning',
                            'Critical'
                        ]
                    ],
                    'sourceType' => [
                        'type' => 'string',
                        'enum' => [
                            'Resource',
                            'Device'
                        ]
                    ],
                    'sourceName' => ['type' => 'string'],
                    'appearedOnTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AlertList' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Alert']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'AlertNotificationProperties' => [
                'properties' => [
                    'emailNotification' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'alertNotificationCulture' => ['type' => 'string'],
                    'notificationToServiceOwners' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'additionalRecipientEmailList' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['emailNotification']
            ],
            'AlertSettings' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AlertNotificationProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'AsymmetricEncryptedSecret' => [
                'properties' => [
                    'value' => ['type' => 'string'],
                    'encryptionCertThumbprint' => ['type' => 'string'],
                    'encryptionAlgorithm' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'AES256',
                            'RSAES_PKCS1_v_1_5'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'value',
                    'encryptionAlgorithm'
                ]
            ],
            'AvailableProviderOperationDisplay' => [
                'properties' => [
                    'provider' => ['type' => 'string'],
                    'resource' => ['type' => 'string'],
                    'operation' => ['type' => 'string'],
                    'description' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AvailableProviderOperation' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'display' => ['$ref' => '#/definitions/AvailableProviderOperationDisplay'],
                    'origin' => ['type' => 'string'],
                    'properties' => ['type' => 'object']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AvailableProviderOperationList' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AvailableProviderOperation']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'BackupElement' => [
                'properties' => [
                    'elementId' => ['type' => 'string'],
                    'elementName' => ['type' => 'string'],
                    'elementType' => ['type' => 'string'],
                    'sizeInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'volumeName' => ['type' => 'string'],
                    'volumeContainerId' => ['type' => 'string'],
                    'volumeType' => [
                        'type' => 'string',
                        'enum' => [
                            'Tiered',
                            'Archival',
                            'LocallyPinned'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'elementId',
                    'elementName',
                    'elementType',
                    'sizeInBytes',
                    'volumeName',
                    'volumeContainerId'
                ]
            ],
            'BackupProperties' => [
                'properties' => [
                    'createdOn' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'sizeInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'backupType' => [
                        'type' => 'string',
                        'enum' => [
                            'LocalSnapshot',
                            'CloudSnapshot'
                        ]
                    ],
                    'backupJobCreationType' => [
                        'type' => 'string',
                        'enum' => [
                            'Adhoc',
                            'BySchedule',
                            'BySSM'
                        ]
                    ],
                    'backupPolicyId' => ['type' => 'string'],
                    'ssmHostName' => ['type' => 'string'],
                    'elements' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/BackupElement']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'createdOn',
                    'sizeInBytes',
                    'elements'
                ]
            ],
            'Backup' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BackupProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'BackupFilter' => [
                'properties' => [
                    'backupPolicyId' => ['type' => 'string'],
                    'volumeId' => ['type' => 'string'],
                    'createdTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupList' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Backup']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'BackupPolicyProperties' => [
                'properties' => [
                    'volumeIds' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'nextBackupTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'lastBackupTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'schedulesCount' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'scheduledBackupStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Disabled',
                            'Enabled'
                        ]
                    ],
                    'backupPolicyCreationType' => [
                        'type' => 'string',
                        'enum' => [
                            'BySaaS',
                            'BySSM'
                        ]
                    ],
                    'ssmHostName' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['volumeIds']
            ],
            'BackupPolicy' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BackupPolicyProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'BackupPolicyList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/BackupPolicy']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'ScheduleRecurrence' => [
                'properties' => [
                    'recurrenceType' => [
                        'type' => 'string',
                        'enum' => [
                            'Minutes',
                            'Hourly',
                            'Daily',
                            'Weekly'
                        ]
                    ],
                    'recurrenceValue' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'weeklyDaysList' => [
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
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'recurrenceType',
                    'recurrenceValue'
                ]
            ],
            'BackupScheduleProperties' => [
                'properties' => [
                    'scheduleRecurrence' => ['$ref' => '#/definitions/ScheduleRecurrence'],
                    'backupType' => [
                        'type' => 'string',
                        'enum' => [
                            'LocalSnapshot',
                            'CloudSnapshot'
                        ]
                    ],
                    'retentionCount' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'scheduleStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'lastSuccessfulRun' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'scheduleRecurrence',
                    'backupType',
                    'retentionCount',
                    'startTime',
                    'scheduleStatus'
                ]
            ],
            'BackupSchedule' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BackupScheduleProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'BackupScheduleList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/BackupSchedule']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'Time' => [
                'properties' => [
                    'hours' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'minutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'seconds' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'hours',
                    'minutes',
                    'seconds'
                ]
            ],
            'BandwidthSchedule' => [
                'properties' => [
                    'start' => ['$ref' => '#/definitions/Time'],
                    'stop' => ['$ref' => '#/definitions/Time'],
                    'rateInMbps' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'days' => [
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
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'start',
                    'stop',
                    'rateInMbps',
                    'days'
                ]
            ],
            'BandwidthRateSettingProperties' => [
                'properties' => [
                    'schedules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/BandwidthSchedule']
                    ],
                    'volumeCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['schedules']
            ],
            'BandwidthSetting' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BandwidthRateSettingProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'BandwidthSettingList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/BandwidthSetting']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'BaseModel' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'kind' => [
                        'type' => 'string',
                        'enum' => ['Series8000']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ChapSettings' => [
                'properties' => [
                    'initiatorUser' => ['type' => 'string'],
                    'initiatorSecret' => ['$ref' => '#/definitions/AsymmetricEncryptedSecret'],
                    'targetUser' => ['type' => 'string'],
                    'targetSecret' => ['$ref' => '#/definitions/AsymmetricEncryptedSecret']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClearAlertRequest' => [
                'properties' => [
                    'resolutionMessage' => ['type' => 'string'],
                    'alerts' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['alerts']
            ],
            'CloneRequest' => [
                'properties' => [
                    'targetDeviceId' => ['type' => 'string'],
                    'targetVolumeName' => ['type' => 'string'],
                    'targetAccessControlRecordIds' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'backupElement' => ['$ref' => '#/definitions/BackupElement']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'targetDeviceId',
                    'targetVolumeName',
                    'targetAccessControlRecordIds',
                    'backupElement'
                ]
            ],
            'CloudAppliance' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'vnetName' => ['type' => 'string'],
                    'vnetRegion' => ['type' => 'string'],
                    'isVnetDnsConfigured' => ['type' => 'boolean'],
                    'isVnetExpressConfigured' => ['type' => 'boolean'],
                    'subnetName' => ['type' => 'string'],
                    'storageAccountName' => ['type' => 'string'],
                    'storageAccountType' => ['type' => 'string'],
                    'vmType' => ['type' => 'string'],
                    'vmImageName' => ['type' => 'string'],
                    'modelNumber' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'vnetRegion'
                ]
            ],
            'VmImage' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'version' => ['type' => 'string'],
                    'offer' => ['type' => 'string'],
                    'publisher' => ['type' => 'string'],
                    'sku' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'version',
                    'offer',
                    'publisher',
                    'sku'
                ]
            ],
            'CloudApplianceConfigurationProperties' => [
                'properties' => [
                    'modelNumber' => ['type' => 'string'],
                    'cloudPlatform' => ['type' => 'string'],
                    'acsConfiguration' => ['$ref' => '#/definitions/AcsConfiguration'],
                    'supportedStorageAccountTypes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'supportedRegions' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'supportedVmTypes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'supportedVmImages' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VmImage']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'modelNumber',
                    'cloudPlatform',
                    'acsConfiguration',
                    'supportedStorageAccountTypes',
                    'supportedRegions',
                    'supportedVmTypes',
                    'supportedVmImages'
                ]
            ],
            'CloudApplianceConfiguration' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/CloudApplianceConfigurationProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'CloudApplianceConfigurationList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/CloudApplianceConfiguration']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'CloudApplianceSettings' => [
                'properties' => [
                    'serviceDataEncryptionKey' => ['$ref' => '#/definitions/AsymmetricEncryptedSecret'],
                    'channelIntegrityKey' => ['$ref' => '#/definitions/AsymmetricEncryptedSecret']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SecondaryDNSSettings' => [
                'properties' => ['secondaryDnsServers' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkInterfaceData0Settings' => [
                'properties' => [
                    'controllerZeroIp' => ['type' => 'string'],
                    'controllerOneIp' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ConfigureDeviceRequestProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'currentDeviceName' => ['type' => 'string'],
                    'timeZone' => ['type' => 'string'],
                    'dnsSettings' => ['$ref' => '#/definitions/SecondaryDNSSettings'],
                    'networkInterfaceData0Settings' => ['$ref' => '#/definitions/NetworkInterfaceData0Settings']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'friendlyName',
                    'currentDeviceName',
                    'timeZone'
                ]
            ],
            'ConfigureDeviceRequest' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ConfigureDeviceRequestProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'ControllerPowerStateChangeRequestProperties' => [
                'properties' => [
                    'action' => [
                        'type' => 'string',
                        'enum' => [
                            'Start',
                            'Restart',
                            'Shutdown'
                        ]
                    ],
                    'activeController' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'None',
                            'Controller0',
                            'Controller1'
                        ]
                    ],
                    'controller0State' => [
                        'type' => 'string',
                        'enum' => [
                            'NotPresent',
                            'PoweredOff',
                            'Ok',
                            'Recovering',
                            'Warning',
                            'Failure'
                        ]
                    ],
                    'controller1State' => [
                        'type' => 'string',
                        'enum' => [
                            'NotPresent',
                            'PoweredOff',
                            'Ok',
                            'Recovering',
                            'Warning',
                            'Failure'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'action',
                    'activeController',
                    'controller0State',
                    'controller1State'
                ]
            ],
            'ControllerPowerStateChangeRequest' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ControllerPowerStateChangeRequestProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'DataStatistics' => [
                'properties' => [
                    'totalData' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'processedData' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'cloudData' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'throughput' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeviceDetails' => [
                'properties' => [
                    'endpointCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'volumeContainerCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeviceRolloverDetails' => [
                'properties' => [
                    'authorizationEligibility' => [
                        'type' => 'string',
                        'enum' => [
                            'InEligible',
                            'Eligible'
                        ]
                    ],
                    'authorizationStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Disabled',
                            'Enabled'
                        ]
                    ],
                    'inEligibilityReason' => [
                        'type' => 'string',
                        'enum' => [
                            'DeviceNotOnline',
                            'NotSupportedAppliance',
                            'RolloverPending'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DeviceProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'activationTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'culture' => ['type' => 'string'],
                    'deviceDescription' => ['type' => 'string'],
                    'deviceSoftwareVersion' => ['type' => 'string'],
                    'friendlySoftwareName' => ['type' => 'string'],
                    'deviceConfigurationStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Complete',
                            'Pending'
                        ]
                    ],
                    'targetIqn' => ['type' => 'string'],
                    'modelDescription' => ['type' => 'string'],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'Online',
                            'Offline',
                            'Deactivated',
                            'RequiresAttention',
                            'MaintenanceMode',
                            'Creating',
                            'Provisioning',
                            'Deactivating',
                            'Deleted',
                            'ReadyToSetup'
                        ]
                    ],
                    'serialNumber' => ['type' => 'string'],
                    'deviceType' => [
                        'type' => 'string',
                        'enum' => [
                            'Invalid',
                            'Series8000VirtualAppliance',
                            'Series8000PhysicalAppliance'
                        ]
                    ],
                    'activeController' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'None',
                            'Controller0',
                            'Controller1'
                        ]
                    ],
                    'friendlySoftwareVersion' => ['type' => 'string'],
                    'availableLocalStorageInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'availableTieredStorageInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'provisionedTieredStorageInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'provisionedLocalStorageInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'provisionedVolumeSizeInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'usingStorageInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'totalTieredStorageInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'agentGroupVersion' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'networkInterfaceCardCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'deviceLocation' => ['type' => 'string'],
                    'virtualMachineApiType' => [
                        'type' => 'string',
                        'enum' => [
                            'Classic',
                            'Arm'
                        ]
                    ],
                    'details' => ['$ref' => '#/definitions/DeviceDetails'],
                    'rolloverDetails' => ['$ref' => '#/definitions/DeviceRolloverDetails']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'friendlyName',
                    'activationTime',
                    'culture',
                    'deviceDescription',
                    'deviceSoftwareVersion',
                    'deviceConfigurationStatus',
                    'targetIqn',
                    'modelDescription',
                    'status',
                    'serialNumber',
                    'deviceType',
                    'activeController',
                    'friendlySoftwareVersion'
                ]
            ],
            'Device' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DeviceProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'DeviceList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Device']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'DevicePatchProperties' => [
                'properties' => ['deviceDescription' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DevicePatch' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DevicePatchProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'DimensionFilter' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'values' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DNSSettings' => [
                'properties' => [
                    'primaryDnsServer' => ['type' => 'string'],
                    'primaryIpv6DnsServer' => ['type' => 'string'],
                    'secondaryDnsServers' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'secondaryIpv6DnsServers' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EncryptionSettingsProperties' => [
                'properties' => [
                    'encryptionStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'keyRolloverStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Required',
                            'NotRequired'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'encryptionStatus',
                    'keyRolloverStatus'
                ]
            ],
            'EncryptionSettings' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/EncryptionSettingsProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'FailoverRequest' => [
                'properties' => [
                    'targetDeviceId' => ['type' => 'string'],
                    'volumeContainers' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VolumeFailoverMetadata' => [
                'properties' => [
                    'volumeId' => ['type' => 'string'],
                    'volumeType' => [
                        'type' => 'string',
                        'enum' => [
                            'Tiered',
                            'Archival',
                            'LocallyPinned'
                        ]
                    ],
                    'sizeInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'backupCreatedDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'backupElementId' => ['type' => 'string'],
                    'backupId' => ['type' => 'string'],
                    'backupPolicyId' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'VolumeContainerFailoverMetadata' => [
                'properties' => [
                    'volumeContainerId' => ['type' => 'string'],
                    'volumes' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VolumeFailoverMetadata']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FailoverSetEligibilityResult' => [
                'properties' => [
                    'isEligibleForFailover' => ['type' => 'boolean'],
                    'errorMessage' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FailoverSet' => [
                'properties' => [
                    'volumeContainers' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VolumeContainerFailoverMetadata']
                    ],
                    'eligibilityResult' => ['$ref' => '#/definitions/FailoverSetEligibilityResult']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FailoverSetsList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/FailoverSet']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TargetEligibilityErrorMessage' => [
                'properties' => [
                    'message' => ['type' => 'string'],
                    'resolution' => ['type' => 'string'],
                    'resultCode' => [
                        'type' => 'string',
                        'enum' => [
                            'TargetAndSourceCannotBeSameError',
                            'TargetIsNotOnlineError',
                            'TargetSourceIncompatibleVersionError',
                            'LocalToTieredVolumesConversionWarning',
                            'TargetInsufficientCapacityError',
                            'TargetInsufficientLocalVolumeMemoryError',
                            'TargetInsufficientTieredVolumeMemoryError'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TargetEligibilityResult' => [
                'properties' => [
                    'eligibilityStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'NotEligible',
                            'Eligible'
                        ]
                    ],
                    'messages' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TargetEligibilityErrorMessage']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FailoverTarget' => [
                'properties' => [
                    'deviceId' => ['type' => 'string'],
                    'deviceStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'Online',
                            'Offline',
                            'Deactivated',
                            'RequiresAttention',
                            'MaintenanceMode',
                            'Creating',
                            'Provisioning',
                            'Deactivating',
                            'Deleted',
                            'ReadyToSetup'
                        ]
                    ],
                    'modelDescription' => ['type' => 'string'],
                    'deviceSoftwareVersion' => ['type' => 'string'],
                    'dataContainersCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'volumesCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'availableLocalStorageInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'availableTieredStorageInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'deviceLocation' => ['type' => 'string'],
                    'friendlyDeviceSoftwareVersion' => ['type' => 'string'],
                    'eligibilityResult' => ['$ref' => '#/definitions/TargetEligibilityResult']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FailoverTargetsList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/FailoverTarget']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Feature' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'NotAvailable',
                            'UnsupportedDeviceVersion',
                            'Supported'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'status'
                ]
            ],
            'FeatureFilter' => [
                'properties' => ['deviceId' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'FeatureList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Feature']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'HardwareComponent' => [
                'properties' => [
                    'componentId' => ['type' => 'string'],
                    'displayName' => ['type' => 'string'],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'NotPresent',
                            'PoweredOff',
                            'Ok',
                            'Recovering',
                            'Warning',
                            'Failure'
                        ]
                    ],
                    'statusDisplayName' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'componentId',
                    'displayName',
                    'status',
                    'statusDisplayName'
                ]
            ],
            'HardwareComponentGroupProperties' => [
                'properties' => [
                    'displayName' => ['type' => 'string'],
                    'lastUpdatedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'components' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HardwareComponent']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'displayName',
                    'lastUpdatedTime',
                    'components'
                ]
            ],
            'HardwareComponentGroup' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/HardwareComponentGroupProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'HardwareComponentGroupList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/HardwareComponentGroup']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'JobErrorItem' => [
                'properties' => [
                    'recommendations' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'code',
                    'message'
                ]
            ],
            'JobErrorDetails' => [
                'properties' => [
                    'errorDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/JobErrorItem']
                    ],
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'code',
                    'message'
                ]
            ],
            'JobStage' => [
                'properties' => [
                    'message' => ['type' => 'string'],
                    'stageStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Running',
                            'Succeeded',
                            'Failed',
                            'Canceled'
                        ]
                    ],
                    'detail' => ['type' => 'string'],
                    'errorCode' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['stageStatus']
            ],
            'JobProperties' => [
                'properties' => [
                    'jobType' => [
                        'type' => 'string',
                        'enum' => [
                            'ScheduledBackup',
                            'ManualBackup',
                            'RestoreBackup',
                            'CloneVolume',
                            'FailoverVolumeContainers',
                            'CreateLocallyPinnedVolume',
                            'ModifyVolume',
                            'InstallUpdates',
                            'SupportPackageLogs',
                            'CreateCloudAppliance'
                        ]
                    ],
                    'dataStats' => ['$ref' => '#/definitions/DataStatistics'],
                    'entityLabel' => ['type' => 'string'],
                    'entityType' => ['type' => 'string'],
                    'jobStages' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/JobStage']
                    ],
                    'deviceId' => ['type' => 'string'],
                    'isCancellable' => ['type' => 'boolean'],
                    'backupType' => [
                        'type' => 'string',
                        'enum' => [
                            'LocalSnapshot',
                            'CloudSnapshot'
                        ]
                    ],
                    'sourceDeviceId' => ['type' => 'string'],
                    'backupPointInTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['jobType']
            ],
            'Job' => [
                'properties' => [
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'Running',
                            'Succeeded',
                            'Failed',
                            'Canceled'
                        ]
                    ],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'percentComplete' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'error' => ['$ref' => '#/definitions/JobErrorDetails'],
                    'properties' => ['$ref' => '#/definitions/JobProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'status',
                    'percentComplete'
                ]
            ],
            'JobFilter' => [
                'properties' => [
                    'status' => ['type' => 'string'],
                    'jobType' => ['type' => 'string'],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'JobList' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Job']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'Key' => [
                'properties' => ['activationKey' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['activationKey']
            ],
            'ListFailoverTargetsRequest' => [
                'properties' => ['volumeContainers' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ManagerIntrinsicSettings' => [
                'properties' => ['type' => [
                    'type' => 'string',
                    'enum' => [
                        'GardaV1',
                        'HelsinkiV1'
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => ['type']
            ],
            'ManagerSku' => [
                'properties' => ['name' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['name']
            ],
            'ManagerProperties' => [
                'properties' => [
                    'cisIntrinsicSettings' => ['$ref' => '#/definitions/ManagerIntrinsicSettings'],
                    'sku' => ['$ref' => '#/definitions/ManagerSku'],
                    'provisioningState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Manager' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ManagerProperties'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ManagerExtendedInfoProperties' => [
                'properties' => [
                    'version' => ['type' => 'string'],
                    'integrityKey' => ['type' => 'string'],
                    'encryptionKey' => ['type' => 'string'],
                    'encryptionKeyThumbprint' => ['type' => 'string'],
                    'portalCertificateThumbprint' => ['type' => 'string'],
                    'algorithm' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'integrityKey',
                    'algorithm'
                ]
            ],
            'ManagerExtendedInfo' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/ManagerExtendedInfoProperties'],
                    'etag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ManagerList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Manager']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'ManagerPatch' => [
                'properties' => ['tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricAvailablity' => [
                'properties' => [
                    'timeGrain' => ['type' => 'string'],
                    'retention' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricData' => [
                'properties' => [
                    'timeStamp' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'sum' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'count' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'average' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'minimum' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'maximum' => [
                        'type' => 'number',
                        'format' => 'double'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricName' => [
                'properties' => [
                    'value' => ['type' => 'string'],
                    'localizedValue' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricDimension' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'value' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricDefinition' => [
                'properties' => [
                    'name' => ['$ref' => '#/definitions/MetricName'],
                    'unit' => [
                        'type' => 'string',
                        'enum' => [
                            'Bytes',
                            'BytesPerSecond',
                            'Count',
                            'CountPerSecond',
                            'Percent',
                            'Seconds'
                        ]
                    ],
                    'primaryAggregationType' => [
                        'type' => 'string',
                        'enum' => [
                            'Average',
                            'Last',
                            'Maximum',
                            'Minimum',
                            'None',
                            'Total'
                        ]
                    ],
                    'resourceId' => ['type' => 'string'],
                    'metricAvailabilities' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/MetricAvailablity']
                    ],
                    'dimensions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/MetricDimension']
                    ],
                    'category' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricDefinitionList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/MetricDefinition']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricNameFilter' => [
                'properties' => ['value' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricFilter' => [
                'properties' => [
                    'name' => ['$ref' => '#/definitions/MetricNameFilter'],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'timeGrain' => ['type' => 'string'],
                    'category' => ['type' => 'string'],
                    'dimensions' => ['$ref' => '#/definitions/DimensionFilter']
                ],
                'additionalProperties' => FALSE,
                'required' => ['category']
            ],
            'Metrics' => [
                'properties' => [
                    'resourceId' => ['type' => 'string'],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'timeGrain' => ['type' => 'string'],
                    'primaryAggregation' => [
                        'type' => 'string',
                        'enum' => [
                            'Average',
                            'Last',
                            'Maximum',
                            'Minimum',
                            'None',
                            'Total'
                        ]
                    ],
                    'name' => ['$ref' => '#/definitions/MetricName'],
                    'dimensions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/MetricDimension']
                    ],
                    'unit' => [
                        'type' => 'string',
                        'enum' => [
                            'Bytes',
                            'BytesPerSecond',
                            'Count',
                            'CountPerSecond',
                            'Percent',
                            'Seconds'
                        ]
                    ],
                    'type' => ['type' => 'string'],
                    'values' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/MetricData']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MetricList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Metrics']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NicIPv4' => [
                'properties' => [
                    'ipv4Address' => ['type' => 'string'],
                    'ipv4Netmask' => ['type' => 'string'],
                    'ipv4Gateway' => ['type' => 'string'],
                    'controller0Ipv4Address' => ['type' => 'string'],
                    'controller1Ipv4Address' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NicIPv6' => [
                'properties' => [
                    'ipv6Address' => ['type' => 'string'],
                    'ipv6Prefix' => ['type' => 'string'],
                    'ipv6Gateway' => ['type' => 'string'],
                    'controller0Ipv6Address' => ['type' => 'string'],
                    'controller1Ipv6Address' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkAdapters' => [
                'properties' => [
                    'interfaceId' => [
                        'type' => 'string',
                        'enum' => [
                            'Invalid',
                            'Data0',
                            'Data1',
                            'Data2',
                            'Data3',
                            'Data4',
                            'Data5'
                        ]
                    ],
                    'netInterfaceStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'isDefault' => ['type' => 'boolean'],
                    'iscsiAndCloudStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Disabled',
                            'IscsiEnabled',
                            'CloudEnabled',
                            'IscsiAndCloudEnabled'
                        ]
                    ],
                    'speed' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'mode' => [
                        'type' => 'string',
                        'enum' => [
                            'Invalid',
                            'IPV4',
                            'IPV6',
                            'BOTH'
                        ]
                    ],
                    'nicIpv4Settings' => ['$ref' => '#/definitions/NicIPv4'],
                    'nicIpv6Settings' => ['$ref' => '#/definitions/NicIPv6']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'interfaceId',
                    'netInterfaceStatus',
                    'iscsiAndCloudStatus',
                    'mode'
                ]
            ],
            'NetworkAdapterList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/NetworkAdapters']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'WebproxySettings' => [
                'properties' => [
                    'connectionUri' => ['type' => 'string'],
                    'authentication' => [
                        'type' => 'string',
                        'enum' => [
                            'Invalid',
                            'None',
                            'Basic',
                            'NTLM'
                        ]
                    ],
                    'username' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'authentication',
                    'username'
                ]
            ],
            'NetworkSettingsProperties' => [
                'properties' => [
                    'dnsSettings' => ['$ref' => '#/definitions/DNSSettings'],
                    'networkAdapters' => ['$ref' => '#/definitions/NetworkAdapterList'],
                    'webproxySettings' => ['$ref' => '#/definitions/WebproxySettings']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'dnsSettings',
                    'networkAdapters',
                    'webproxySettings'
                ]
            ],
            'NetworkSettings' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/NetworkSettingsProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'NetworkSettingsPatchProperties' => [
                'properties' => [
                    'dnsSettings' => ['$ref' => '#/definitions/DNSSettings'],
                    'networkAdapters' => ['$ref' => '#/definitions/NetworkAdapterList']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NetworkSettingsPatch' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/NetworkSettingsPatchProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'PublicKey' => [
                'properties' => ['key' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['key']
            ],
            'RemoteManagementSettings' => [
                'properties' => [
                    'remoteManagementMode' => [
                        'type' => 'string',
                        'enum' => [
                            'Unknown',
                            'Disabled',
                            'HttpsEnabled',
                            'HttpsAndHttpEnabled'
                        ]
                    ],
                    'remoteManagementCertificate' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['remoteManagementMode']
            ],
            'RemoteManagementSettingsPatch' => [
                'properties' => ['remoteManagementMode' => [
                    'type' => 'string',
                    'enum' => [
                        'Unknown',
                        'Disabled',
                        'HttpsEnabled',
                        'HttpsAndHttpEnabled'
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => ['remoteManagementMode']
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
                'additionalProperties' => FALSE,
                'required' => ['location']
            ],
            'SecuritySettingsProperties' => [
                'properties' => [
                    'remoteManagementSettings' => ['$ref' => '#/definitions/RemoteManagementSettings'],
                    'chapSettings' => ['$ref' => '#/definitions/ChapSettings']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'remoteManagementSettings',
                    'chapSettings'
                ]
            ],
            'SecuritySettings' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SecuritySettingsProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'SecuritySettingsPatchProperties' => [
                'properties' => [
                    'remoteManagementSettings' => ['$ref' => '#/definitions/RemoteManagementSettingsPatch'],
                    'deviceAdminPassword' => ['$ref' => '#/definitions/AsymmetricEncryptedSecret'],
                    'snapshotPassword' => ['$ref' => '#/definitions/AsymmetricEncryptedSecret'],
                    'chapSettings' => ['$ref' => '#/definitions/ChapSettings'],
                    'cloudApplianceSettings' => ['$ref' => '#/definitions/CloudApplianceSettings']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SecuritySettingsPatch' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SecuritySettingsPatchProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'SendTestAlertEmailRequest' => [
                'properties' => ['emailList' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['emailList']
            ],
            'StorageAccountCredentialProperties' => [
                'properties' => [
                    'endPoint' => ['type' => 'string'],
                    'sslStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'accessKey' => ['$ref' => '#/definitions/AsymmetricEncryptedSecret'],
                    'volumesCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'endPoint',
                    'sslStatus'
                ]
            ],
            'StorageAccountCredential' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/StorageAccountCredentialProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'StorageAccountCredentialList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/StorageAccountCredential']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'SymmetricEncryptedSecret' => [
                'properties' => [
                    'value' => ['type' => 'string'],
                    'valueCertificateThumbprint' => ['type' => 'string'],
                    'encryptionAlgorithm' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'AES256',
                            'RSAES_PKCS1_v_1_5'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'value',
                    'encryptionAlgorithm'
                ]
            ],
            'TimeSettingsProperties' => [
                'properties' => [
                    'timeZone' => ['type' => 'string'],
                    'primaryTimeServer' => ['type' => 'string'],
                    'secondaryTimeServer' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['timeZone']
            ],
            'TimeSettings' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/TimeSettingsProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'UpdatesProperties' => [
                'properties' => [
                    'regularUpdatesAvailable' => ['type' => 'boolean'],
                    'maintenanceModeUpdatesAvailable' => ['type' => 'boolean'],
                    'isUpdateInProgress' => ['type' => 'boolean'],
                    'lastUpdatedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Updates' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UpdatesProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'VolumeProperties' => [
                'properties' => [
                    'sizeInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'volumeType' => [
                        'type' => 'string',
                        'enum' => [
                            'Tiered',
                            'Archival',
                            'LocallyPinned'
                        ]
                    ],
                    'volumeContainerId' => ['type' => 'string'],
                    'accessControlRecordIds' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'volumeStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Online',
                            'Offline'
                        ]
                    ],
                    'operationStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Updating',
                            'Deleting',
                            'Restoring'
                        ]
                    ],
                    'backupStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'monitoringStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'backupPolicyIds' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'sizeInBytes',
                    'volumeType',
                    'accessControlRecordIds',
                    'volumeStatus',
                    'monitoringStatus'
                ]
            ],
            'Volume' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/VolumeProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'VolumeContainerProperties' => [
                'properties' => [
                    'encryptionKey' => ['$ref' => '#/definitions/AsymmetricEncryptedSecret'],
                    'encryptionStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Enabled',
                            'Disabled'
                        ]
                    ],
                    'volumeCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'storageAccountCredentialId' => ['type' => 'string'],
                    'ownerShipStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Owned',
                            'NotOwned'
                        ]
                    ],
                    'bandWidthRateInMbps' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'bandwidthSettingId' => ['type' => 'string'],
                    'totalCloudStorageUsageInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['storageAccountCredentialId']
            ],
            'VolumeContainer' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/VolumeContainerProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'VolumeContainerList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VolumeContainer']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'VolumeList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Volume']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ]
        ]
    ];
}
