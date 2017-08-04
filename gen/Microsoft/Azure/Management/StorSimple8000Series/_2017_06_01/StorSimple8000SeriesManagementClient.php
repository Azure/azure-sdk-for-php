<?php
namespace Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01;
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
        $this->_Operations_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Operations($_client);
        $this->_Managers_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Managers($_client);
        $this->_AccessControlRecords_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\AccessControlRecords($_client);
        $this->_Alerts_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Alerts($_client);
        $this->_BandwidthSettings_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\BandwidthSettings($_client);
        $this->_CloudAppliances_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\CloudAppliances($_client);
        $this->_Devices_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Devices($_client);
        $this->_DeviceSettings_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\DeviceSettings($_client);
        $this->_BackupPolicies_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\BackupPolicies($_client);
        $this->_BackupSchedules_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\BackupSchedules($_client);
        $this->_Backups_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Backups($_client);
        $this->_HardwareComponentGroups_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\HardwareComponentGroups($_client);
        $this->_Jobs_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Jobs($_client);
        $this->_VolumeContainers_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\VolumeContainers($_client);
        $this->_Volumes_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Volumes($_client);
        $this->_StorageAccountCredentials_group = new \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\StorageAccountCredentials($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Managers
     */
    public function getManagers()
    {
        return $this->_Managers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\AccessControlRecords
     */
    public function getAccessControlRecords()
    {
        return $this->_AccessControlRecords_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Alerts
     */
    public function getAlerts()
    {
        return $this->_Alerts_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\BandwidthSettings
     */
    public function getBandwidthSettings()
    {
        return $this->_BandwidthSettings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\CloudAppliances
     */
    public function getCloudAppliances()
    {
        return $this->_CloudAppliances_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Devices
     */
    public function getDevices()
    {
        return $this->_Devices_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\DeviceSettings
     */
    public function getDeviceSettings()
    {
        return $this->_DeviceSettings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\BackupPolicies
     */
    public function getBackupPolicies()
    {
        return $this->_BackupPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\BackupSchedules
     */
    public function getBackupSchedules()
    {
        return $this->_BackupSchedules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Backups
     */
    public function getBackups()
    {
        return $this->_Backups_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\HardwareComponentGroups
     */
    public function getHardwareComponentGroups()
    {
        return $this->_HardwareComponentGroups_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Jobs
     */
    public function getJobs()
    {
        return $this->_Jobs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\VolumeContainers
     */
    public function getVolumeContainers()
    {
        return $this->_VolumeContainers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Volumes
     */
    public function getVolumes()
    {
        return $this->_Volumes_group;
    }
    /**
     * @return \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\StorageAccountCredentials
     */
    public function getStorageAccountCredentials()
    {
        return $this->_StorageAccountCredentials_group;
    }
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Operations
     */
    private $_Operations_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Managers
     */
    private $_Managers_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\AccessControlRecords
     */
    private $_AccessControlRecords_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Alerts
     */
    private $_Alerts_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\BandwidthSettings
     */
    private $_BandwidthSettings_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\CloudAppliances
     */
    private $_CloudAppliances_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Devices
     */
    private $_Devices_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\DeviceSettings
     */
    private $_DeviceSettings_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\BackupPolicies
     */
    private $_BackupPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\BackupSchedules
     */
    private $_BackupSchedules_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Backups
     */
    private $_Backups_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\HardwareComponentGroups
     */
    private $_HardwareComponentGroups_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Jobs
     */
    private $_Jobs_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\VolumeContainers
     */
    private $_VolumeContainers_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\Volumes
     */
    private $_Volumes_group;
    /**
     * @var \Microsoft\Azure\Management\StorSimple8000Series\_2017_06_01\StorageAccountCredentials
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
                            '$ref' => '#/definitions/Manager'
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
                            '$ref' => '#/definitions/ManagerPatch'
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
                            '$ref' => '#/definitions/ManagerExtendedInfo'
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
                            '$ref' => '#/definitions/ManagerExtendedInfo'
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
                            '$ref' => '#/definitions/AccessControlRecord'
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
                        '$ref' => '#/definitions/ClearAlertRequest'
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
                        '$ref' => '#/definitions/SendTestAlertEmailRequest'
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
                            '$ref' => '#/definitions/BandwidthSetting'
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
                        '$ref' => '#/definitions/CloudAppliance'
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
                        '$ref' => '#/definitions/ConfigureDeviceRequest'
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
                            '$ref' => '#/definitions/DevicePatch'
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
                        '$ref' => '#/definitions/FailoverRequest'
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
                        '$ref' => '#/definitions/ListFailoverTargetsRequest'
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
                            '$ref' => '#/definitions/AlertSettings'
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
                            '$ref' => '#/definitions/NetworkSettingsPatch'
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
                            '$ref' => '#/definitions/SecuritySettingsPatch'
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
                            '$ref' => '#/definitions/TimeSettings'
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
                            '$ref' => '#/definitions/BackupPolicy'
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
                            '$ref' => '#/definitions/BackupSchedule'
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
                        '$ref' => '#/definitions/CloneRequest'
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
                        '$ref' => '#/definitions/ControllerPowerStateChangeRequest'
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
                            '$ref' => '#/definitions/VolumeContainer'
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
                            '$ref' => '#/definitions/Volume'
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
                            '$ref' => '#/definitions/StorageAccountCredential'
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
            'AccessControlRecordProperties' => ['properties' => [
                'initiatorName' => ['type' => 'string'],
                'volumeCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'AccessControlRecord' => ['properties' => ['properties' => ['$ref' => '#/definitions/AccessControlRecordProperties']]],
            'AccessControlRecordList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/AccessControlRecord']
            ]]],
            'AcsConfiguration' => ['properties' => [
                'namespace' => ['type' => 'string'],
                'realm' => ['type' => 'string'],
                'serviceUrl' => ['type' => 'string']
            ]],
            'AlertSource' => ['properties' => [
                'name' => ['type' => 'string'],
                'timeZone' => ['type' => 'string'],
                'alertSourceType' => [
                    'type' => 'string',
                    'enum' => [
                        'Resource',
                        'Device'
                    ]
                ]
            ]],
            'AlertErrorDetails' => ['properties' => [
                'errorCode' => ['type' => 'string'],
                'errorMessage' => ['type' => 'string'],
                'occurences' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'AlertProperties' => ['properties' => [
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
            ]],
            'Alert' => ['properties' => ['properties' => ['$ref' => '#/definitions/AlertProperties']]],
            'AlertFilter' => ['properties' => [
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
            ]],
            'AlertList' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Alert']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'AlertNotificationProperties' => ['properties' => [
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
            ]],
            'AlertSettings' => ['properties' => ['properties' => ['$ref' => '#/definitions/AlertNotificationProperties']]],
            'AsymmetricEncryptedSecret' => ['properties' => [
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
            ]],
            'AvailableProviderOperationDisplay' => ['properties' => [
                'provider' => ['type' => 'string'],
                'resource' => ['type' => 'string'],
                'operation' => ['type' => 'string'],
                'description' => ['type' => 'string']
            ]],
            'AvailableProviderOperation' => ['properties' => [
                'name' => ['type' => 'string'],
                'display' => ['$ref' => '#/definitions/AvailableProviderOperationDisplay'],
                'origin' => ['type' => 'string'],
                'properties' => ['type' => 'object']
            ]],
            'AvailableProviderOperationList' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AvailableProviderOperation']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'BackupElement' => ['properties' => [
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
            ]],
            'BackupProperties' => ['properties' => [
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
            ]],
            'Backup' => ['properties' => ['properties' => ['$ref' => '#/definitions/BackupProperties']]],
            'BackupFilter' => ['properties' => [
                'backupPolicyId' => ['type' => 'string'],
                'volumeId' => ['type' => 'string'],
                'createdTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'BackupList' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Backup']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'BackupPolicyProperties' => ['properties' => [
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
            ]],
            'BackupPolicy' => ['properties' => ['properties' => ['$ref' => '#/definitions/BackupPolicyProperties']]],
            'BackupPolicyList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/BackupPolicy']
            ]]],
            'ScheduleRecurrence' => ['properties' => [
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
            ]],
            'BackupScheduleProperties' => ['properties' => [
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
            ]],
            'BackupSchedule' => ['properties' => ['properties' => ['$ref' => '#/definitions/BackupScheduleProperties']]],
            'BackupScheduleList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/BackupSchedule']
            ]]],
            'Time' => ['properties' => [
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
            ]],
            'BandwidthSchedule' => ['properties' => [
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
            ]],
            'BandwidthRateSettingProperties' => ['properties' => [
                'schedules' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/BandwidthSchedule']
                ],
                'volumeCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'BandwidthSetting' => ['properties' => ['properties' => ['$ref' => '#/definitions/BandwidthRateSettingProperties']]],
            'BandwidthSettingList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/BandwidthSetting']
            ]]],
            'BaseModel' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'kind' => [
                    'type' => 'string',
                    'enum' => ['Series8000']
                ]
            ]],
            'ChapSettings' => ['properties' => [
                'initiatorUser' => ['type' => 'string'],
                'initiatorSecret' => ['$ref' => '#/definitions/AsymmetricEncryptedSecret'],
                'targetUser' => ['type' => 'string'],
                'targetSecret' => ['$ref' => '#/definitions/AsymmetricEncryptedSecret']
            ]],
            'ClearAlertRequest' => ['properties' => [
                'resolutionMessage' => ['type' => 'string'],
                'alerts' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'CloneRequest' => ['properties' => [
                'targetDeviceId' => ['type' => 'string'],
                'targetVolumeName' => ['type' => 'string'],
                'targetAccessControlRecordIds' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'backupElement' => ['$ref' => '#/definitions/BackupElement']
            ]],
            'CloudAppliance' => ['properties' => [
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
            ]],
            'VmImage' => ['properties' => [
                'name' => ['type' => 'string'],
                'version' => ['type' => 'string'],
                'offer' => ['type' => 'string'],
                'publisher' => ['type' => 'string'],
                'sku' => ['type' => 'string']
            ]],
            'CloudApplianceConfigurationProperties' => ['properties' => [
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
            ]],
            'CloudApplianceConfiguration' => ['properties' => ['properties' => ['$ref' => '#/definitions/CloudApplianceConfigurationProperties']]],
            'CloudApplianceConfigurationList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/CloudApplianceConfiguration']
            ]]],
            'CloudApplianceSettings' => ['properties' => [
                'serviceDataEncryptionKey' => ['$ref' => '#/definitions/AsymmetricEncryptedSecret'],
                'channelIntegrityKey' => ['$ref' => '#/definitions/AsymmetricEncryptedSecret']
            ]],
            'SecondaryDNSSettings' => ['properties' => ['secondaryDnsServers' => [
                'type' => 'array',
                'items' => ['type' => 'string']
            ]]],
            'NetworkInterfaceData0Settings' => ['properties' => [
                'controllerZeroIp' => ['type' => 'string'],
                'controllerOneIp' => ['type' => 'string']
            ]],
            'ConfigureDeviceRequestProperties' => ['properties' => [
                'friendlyName' => ['type' => 'string'],
                'currentDeviceName' => ['type' => 'string'],
                'timeZone' => ['type' => 'string'],
                'dnsSettings' => ['$ref' => '#/definitions/SecondaryDNSSettings'],
                'networkInterfaceData0Settings' => ['$ref' => '#/definitions/NetworkInterfaceData0Settings']
            ]],
            'ConfigureDeviceRequest' => ['properties' => ['properties' => ['$ref' => '#/definitions/ConfigureDeviceRequestProperties']]],
            'ControllerPowerStateChangeRequestProperties' => ['properties' => [
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
            ]],
            'ControllerPowerStateChangeRequest' => ['properties' => ['properties' => ['$ref' => '#/definitions/ControllerPowerStateChangeRequestProperties']]],
            'DataStatistics' => ['properties' => [
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
            ]],
            'DeviceDetails' => ['properties' => [
                'endpointCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'volumeContainerCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'DeviceRolloverDetails' => ['properties' => [
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
            ]],
            'DeviceProperties' => ['properties' => [
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
            ]],
            'Device' => ['properties' => ['properties' => ['$ref' => '#/definitions/DeviceProperties']]],
            'DeviceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Device']
            ]]],
            'DevicePatchProperties' => ['properties' => ['deviceDescription' => ['type' => 'string']]],
            'DevicePatch' => ['properties' => ['properties' => ['$ref' => '#/definitions/DevicePatchProperties']]],
            'DimensionFilter' => ['properties' => [
                'name' => ['type' => 'string'],
                'values' => ['type' => 'string']
            ]],
            'DNSSettings' => ['properties' => [
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
            ]],
            'EncryptionSettingsProperties' => ['properties' => [
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
            ]],
            'EncryptionSettings' => ['properties' => ['properties' => ['$ref' => '#/definitions/EncryptionSettingsProperties']]],
            'FailoverRequest' => ['properties' => [
                'targetDeviceId' => ['type' => 'string'],
                'volumeContainers' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'VolumeFailoverMetadata' => ['properties' => [
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
            ]],
            'VolumeContainerFailoverMetadata' => ['properties' => [
                'volumeContainerId' => ['type' => 'string'],
                'volumes' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VolumeFailoverMetadata']
                ]
            ]],
            'FailoverSetEligibilityResult' => ['properties' => [
                'isEligibleForFailover' => ['type' => 'boolean'],
                'errorMessage' => ['type' => 'string']
            ]],
            'FailoverSet' => ['properties' => [
                'volumeContainers' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/VolumeContainerFailoverMetadata']
                ],
                'eligibilityResult' => ['$ref' => '#/definitions/FailoverSetEligibilityResult']
            ]],
            'FailoverSetsList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/FailoverSet']
            ]]],
            'TargetEligibilityErrorMessage' => ['properties' => [
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
            ]],
            'TargetEligibilityResult' => ['properties' => [
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
            ]],
            'FailoverTarget' => ['properties' => [
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
            ]],
            'FailoverTargetsList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/FailoverTarget']
            ]]],
            'Feature' => ['properties' => [
                'name' => ['type' => 'string'],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'NotAvailable',
                        'UnsupportedDeviceVersion',
                        'Supported'
                    ]
                ]
            ]],
            'FeatureFilter' => ['properties' => ['deviceId' => ['type' => 'string']]],
            'FeatureList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Feature']
            ]]],
            'HardwareComponent' => ['properties' => [
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
            ]],
            'HardwareComponentGroupProperties' => ['properties' => [
                'displayName' => ['type' => 'string'],
                'lastUpdatedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'components' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/HardwareComponent']
                ]
            ]],
            'HardwareComponentGroup' => ['properties' => ['properties' => ['$ref' => '#/definitions/HardwareComponentGroupProperties']]],
            'HardwareComponentGroupList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/HardwareComponentGroup']
            ]]],
            'JobErrorItem' => ['properties' => [
                'recommendations' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string']
            ]],
            'JobErrorDetails' => ['properties' => [
                'errorDetails' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/JobErrorItem']
                ],
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string']
            ]],
            'JobStage' => ['properties' => [
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
            ]],
            'JobProperties' => ['properties' => [
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
            ]],
            'Job' => ['properties' => [
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
            ]],
            'JobFilter' => ['properties' => [
                'status' => ['type' => 'string'],
                'jobType' => ['type' => 'string'],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'JobList' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Job']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'Key' => ['properties' => ['activationKey' => ['type' => 'string']]],
            'ListFailoverTargetsRequest' => ['properties' => ['volumeContainers' => [
                'type' => 'array',
                'items' => ['type' => 'string']
            ]]],
            'ManagerIntrinsicSettings' => ['properties' => ['type' => [
                'type' => 'string',
                'enum' => [
                    'GardaV1',
                    'HelsinkiV1'
                ]
            ]]],
            'ManagerSku' => ['properties' => ['name' => ['type' => 'string']]],
            'ManagerProperties' => ['properties' => [
                'cisIntrinsicSettings' => ['$ref' => '#/definitions/ManagerIntrinsicSettings'],
                'sku' => ['$ref' => '#/definitions/ManagerSku'],
                'provisioningState' => ['type' => 'string']
            ]],
            'Manager' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ManagerProperties'],
                'etag' => ['type' => 'string']
            ]],
            'ManagerExtendedInfoProperties' => ['properties' => [
                'version' => ['type' => 'string'],
                'integrityKey' => ['type' => 'string'],
                'encryptionKey' => ['type' => 'string'],
                'encryptionKeyThumbprint' => ['type' => 'string'],
                'portalCertificateThumbprint' => ['type' => 'string'],
                'algorithm' => ['type' => 'string']
            ]],
            'ManagerExtendedInfo' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ManagerExtendedInfoProperties'],
                'etag' => ['type' => 'string']
            ]],
            'ManagerList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Manager']
            ]]],
            'ManagerPatch' => ['properties' => ['tags' => [
                'type' => 'object',
                'additionalProperties' => ['type' => 'string']
            ]]],
            'MetricAvailablity' => ['properties' => [
                'timeGrain' => ['type' => 'string'],
                'retention' => ['type' => 'string']
            ]],
            'MetricData' => ['properties' => [
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
            ]],
            'MetricName' => ['properties' => [
                'value' => ['type' => 'string'],
                'localizedValue' => ['type' => 'string']
            ]],
            'MetricDimension' => ['properties' => [
                'name' => ['type' => 'string'],
                'value' => ['type' => 'string']
            ]],
            'MetricDefinition' => ['properties' => [
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
            ]],
            'MetricDefinitionList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/MetricDefinition']
            ]]],
            'MetricNameFilter' => ['properties' => ['value' => ['type' => 'string']]],
            'MetricFilter' => ['properties' => [
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
            ]],
            'Metrics' => ['properties' => [
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
            ]],
            'MetricList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Metrics']
            ]]],
            'NicIPv4' => ['properties' => [
                'ipv4Address' => ['type' => 'string'],
                'ipv4Netmask' => ['type' => 'string'],
                'ipv4Gateway' => ['type' => 'string'],
                'controller0Ipv4Address' => ['type' => 'string'],
                'controller1Ipv4Address' => ['type' => 'string']
            ]],
            'NicIPv6' => ['properties' => [
                'ipv6Address' => ['type' => 'string'],
                'ipv6Prefix' => ['type' => 'string'],
                'ipv6Gateway' => ['type' => 'string'],
                'controller0Ipv6Address' => ['type' => 'string'],
                'controller1Ipv6Address' => ['type' => 'string']
            ]],
            'NetworkAdapters' => ['properties' => [
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
            ]],
            'NetworkAdapterList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/NetworkAdapters']
            ]]],
            'WebproxySettings' => ['properties' => [
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
            ]],
            'NetworkSettingsProperties' => ['properties' => [
                'dnsSettings' => ['$ref' => '#/definitions/DNSSettings'],
                'networkAdapters' => ['$ref' => '#/definitions/NetworkAdapterList'],
                'webproxySettings' => ['$ref' => '#/definitions/WebproxySettings']
            ]],
            'NetworkSettings' => ['properties' => ['properties' => ['$ref' => '#/definitions/NetworkSettingsProperties']]],
            'NetworkSettingsPatchProperties' => ['properties' => [
                'dnsSettings' => ['$ref' => '#/definitions/DNSSettings'],
                'networkAdapters' => ['$ref' => '#/definitions/NetworkAdapterList']
            ]],
            'NetworkSettingsPatch' => ['properties' => ['properties' => ['$ref' => '#/definitions/NetworkSettingsPatchProperties']]],
            'PublicKey' => ['properties' => ['key' => ['type' => 'string']]],
            'RemoteManagementSettings' => ['properties' => [
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
            ]],
            'RemoteManagementSettingsPatch' => ['properties' => ['remoteManagementMode' => [
                'type' => 'string',
                'enum' => [
                    'Unknown',
                    'Disabled',
                    'HttpsEnabled',
                    'HttpsAndHttpEnabled'
                ]
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
            'SecuritySettingsProperties' => ['properties' => [
                'remoteManagementSettings' => ['$ref' => '#/definitions/RemoteManagementSettings'],
                'chapSettings' => ['$ref' => '#/definitions/ChapSettings']
            ]],
            'SecuritySettings' => ['properties' => ['properties' => ['$ref' => '#/definitions/SecuritySettingsProperties']]],
            'SecuritySettingsPatchProperties' => ['properties' => [
                'remoteManagementSettings' => ['$ref' => '#/definitions/RemoteManagementSettingsPatch'],
                'deviceAdminPassword' => ['$ref' => '#/definitions/AsymmetricEncryptedSecret'],
                'snapshotPassword' => ['$ref' => '#/definitions/AsymmetricEncryptedSecret'],
                'chapSettings' => ['$ref' => '#/definitions/ChapSettings'],
                'cloudApplianceSettings' => ['$ref' => '#/definitions/CloudApplianceSettings']
            ]],
            'SecuritySettingsPatch' => ['properties' => ['properties' => ['$ref' => '#/definitions/SecuritySettingsPatchProperties']]],
            'SendTestAlertEmailRequest' => ['properties' => ['emailList' => [
                'type' => 'array',
                'items' => ['type' => 'string']
            ]]],
            'StorageAccountCredentialProperties' => ['properties' => [
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
            ]],
            'StorageAccountCredential' => ['properties' => ['properties' => ['$ref' => '#/definitions/StorageAccountCredentialProperties']]],
            'StorageAccountCredentialList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/StorageAccountCredential']
            ]]],
            'SymmetricEncryptedSecret' => ['properties' => [
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
            ]],
            'TimeSettingsProperties' => ['properties' => [
                'timeZone' => ['type' => 'string'],
                'primaryTimeServer' => ['type' => 'string'],
                'secondaryTimeServer' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'TimeSettings' => ['properties' => ['properties' => ['$ref' => '#/definitions/TimeSettingsProperties']]],
            'UpdatesProperties' => ['properties' => [
                'regularUpdatesAvailable' => ['type' => 'boolean'],
                'maintenanceModeUpdatesAvailable' => ['type' => 'boolean'],
                'isUpdateInProgress' => ['type' => 'boolean'],
                'lastUpdatedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'Updates' => ['properties' => ['properties' => ['$ref' => '#/definitions/UpdatesProperties']]],
            'VolumeProperties' => ['properties' => [
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
            ]],
            'Volume' => ['properties' => ['properties' => ['$ref' => '#/definitions/VolumeProperties']]],
            'VolumeContainerProperties' => ['properties' => [
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
            ]],
            'VolumeContainer' => ['properties' => ['properties' => ['$ref' => '#/definitions/VolumeContainerProperties']]],
            'VolumeContainerList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/VolumeContainer']
            ]]],
            'VolumeList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Volume']
            ]]]
        ]
    ];
}
