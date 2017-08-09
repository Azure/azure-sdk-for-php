<?php
namespace Microsoft\Azure\Management\RecoveryServices;
final class RecoveryServicesClient
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
        $this->_BackupVaultConfigs_group = new \Microsoft\Azure\Management\RecoveryServices\BackupVaultConfigs($_client);
        $this->_BackupStorageConfigs_group = new \Microsoft\Azure\Management\RecoveryServices\BackupStorageConfigs($_client);
        $this->_VaultCertificates_group = new \Microsoft\Azure\Management\RecoveryServices\VaultCertificates($_client);
        $this->_RegisteredIdentities_group = new \Microsoft\Azure\Management\RecoveryServices\RegisteredIdentities($_client);
        $this->_ReplicationUsages_group = new \Microsoft\Azure\Management\RecoveryServices\ReplicationUsages($_client);
        $this->_Vaults_group = new \Microsoft\Azure\Management\RecoveryServices\Vaults($_client);
        $this->_Operations_group = new \Microsoft\Azure\Management\RecoveryServices\Operations($_client);
        $this->_VaultExtendedInfo_group = new \Microsoft\Azure\Management\RecoveryServices\VaultExtendedInfo($_client);
        $this->_Usages_group = new \Microsoft\Azure\Management\RecoveryServices\Usages($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\BackupVaultConfigs
     */
    public function getBackupVaultConfigs()
    {
        return $this->_BackupVaultConfigs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\BackupStorageConfigs
     */
    public function getBackupStorageConfigs()
    {
        return $this->_BackupStorageConfigs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\VaultCertificates
     */
    public function getVaultCertificates()
    {
        return $this->_VaultCertificates_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\RegisteredIdentities
     */
    public function getRegisteredIdentities()
    {
        return $this->_RegisteredIdentities_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\ReplicationUsages
     */
    public function getReplicationUsages()
    {
        return $this->_ReplicationUsages_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Vaults
     */
    public function getVaults()
    {
        return $this->_Vaults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\VaultExtendedInfo
     */
    public function getVaultExtendedInfo()
    {
        return $this->_VaultExtendedInfo_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Usages
     */
    public function getUsages()
    {
        return $this->_Usages_group;
    }
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\BackupVaultConfigs
     */
    private $_BackupVaultConfigs_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\BackupStorageConfigs
     */
    private $_BackupStorageConfigs_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\VaultCertificates
     */
    private $_VaultCertificates_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\RegisteredIdentities
     */
    private $_RegisteredIdentities_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\ReplicationUsages
     */
    private $_ReplicationUsages_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Vaults
     */
    private $_Vaults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Operations
     */
    private $_Operations_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\VaultExtendedInfo
     */
    private $_VaultExtendedInfo_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Usages
     */
    private $_Usages_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupconfig/vaultconfig' => [
                'get' => [
                    'operationId' => 'BackupVaultConfigs_Get',
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
                            'enum' => ['2016-12-01']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupVaultConfig']]]
                ],
                'patch' => [
                    'operationId' => 'BackupVaultConfigs_Update',
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
                            'enum' => ['2016-12-01']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupVaultConfig',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/BackupVaultConfig'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupVaultConfig']]]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupstorageconfig/vaultstorageconfig' => [
                'get' => [
                    'operationId' => 'BackupStorageConfigs_Get',
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
                            'enum' => ['2016-12-01']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupStorageConfig']]]
                ],
                'patch' => [
                    'operationId' => 'BackupStorageConfigs_Update',
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
                            'enum' => ['2016-12-01']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupStorageConfig',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/BackupStorageConfig'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/certificates/{certificateName}' => ['put' => [
                'operationId' => 'VaultCertificates_Create',
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
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vaultName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'certificateName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'certificateRequest',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/CertificateRequest'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VaultCertificateResponse']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/registeredIdentities/{identityName}' => ['delete' => [
                'operationId' => 'RegisteredIdentities_Delete',
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
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vaultName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'identityName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/replicationUsages' => ['get' => [
                'operationId' => 'ReplicationUsages_List',
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
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vaultName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ReplicationUsageList']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.RecoveryServices/vaults' => ['get' => [
                'operationId' => 'Vaults_ListBySubscriptionId',
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
                        'enum' => ['2016-06-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VaultList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults' => ['get' => [
                'operationId' => 'Vaults_ListByResourceGroup',
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
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VaultList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}' => [
                'get' => [
                    'operationId' => 'Vaults_Get',
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
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Vault']]]
                ],
                'put' => [
                    'operationId' => 'Vaults_CreateOrUpdate',
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
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vault',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Vault'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Vault']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Vault']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'Vaults_Delete',
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
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'patch' => [
                    'operationId' => 'Vaults_Update',
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
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vault',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Vault'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Vault']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Vault']]
                    ]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/operations' => ['get' => [
                'operationId' => 'Operations_List',
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
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ClientDiscoveryResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/extendedInformation/vaultExtendedInfo' => [
                'get' => [
                    'operationId' => 'VaultExtendedInfo_Get',
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
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'vaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VaultExtendedInfoResource']]]
                ],
                'put' => [
                    'operationId' => 'VaultExtendedInfo_CreateOrUpdate',
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
                            'name' => 'vaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'resourceResourceExtendedInfoDetails',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/VaultExtendedInfoResource'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VaultExtendedInfoResource']]]
                ],
                'patch' => [
                    'operationId' => 'VaultExtendedInfo_Update',
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
                            'name' => 'vaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
                        ],
                        [
                            'name' => 'resourceResourceExtendedInfoDetails',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/VaultExtendedInfoResource'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VaultExtendedInfoResource']]]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/usages' => ['get' => [
                'operationId' => 'Usages_ListByVaults',
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
                        'enum' => ['2016-06-01']
                    ],
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'vaultName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VaultUsageList']]]
            ]]
        ],
        'definitions' => [
            'BackupStorageConfigProperties' => ['properties' => [
                'storageModelType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'GeoRedundant',
                        'LocallyRedundant'
                    ]
                ],
                'storageType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'GeoRedundant',
                        'LocallyRedundant'
                    ]
                ],
                'storageTypeState' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'Locked',
                        'Unlocked'
                    ]
                ]
            ]],
            'BackupStorageConfig' => ['properties' => ['properties' => ['$ref' => '#/definitions/BackupStorageConfigProperties']]],
            'BackupVaultConfigProperties' => ['properties' => [
                'storageType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'GeoRedundant',
                        'LocallyRedundant'
                    ]
                ],
                'storageTypeState' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'Locked',
                        'Unlocked'
                    ]
                ],
                'enhancedSecurityState' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'Enabled',
                        'Disabled'
                    ]
                ]
            ]],
            'BackupVaultConfig' => ['properties' => ['properties' => ['$ref' => '#/definitions/BackupVaultConfigProperties']]],
            'VaultExtendedInfo' => ['properties' => [
                'integrityKey' => ['type' => 'string'],
                'encryptionKey' => ['type' => 'string'],
                'encryptionKeyThumbprint' => ['type' => 'string'],
                'algorithm' => ['type' => 'string']
            ]],
            'VaultExtendedInfoResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/VaultExtendedInfo']]],
            'Sku' => ['properties' => ['name' => [
                'type' => 'string',
                'enum' => [
                    'Standard',
                    'RS0'
                ]
            ]]],
            'UpgradeDetails' => ['properties' => [
                'operationId' => ['type' => 'string'],
                'startTimeUtc' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastUpdatedTimeUtc' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTimeUtc' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Unknown',
                        'InProgress',
                        'Upgraded',
                        'Failed'
                    ]
                ],
                'message' => ['type' => 'string'],
                'triggerType' => [
                    'type' => 'string',
                    'enum' => [
                        'UserTriggered',
                        'ForcedUpgrade'
                    ]
                ],
                'upgradedResourceId' => ['type' => 'string'],
                'previousResourceId' => ['type' => 'string']
            ]],
            'VaultProperties' => ['properties' => [
                'provisioningState' => ['type' => 'string'],
                'upgradeDetails' => ['$ref' => '#/definitions/UpgradeDetails']
            ]],
            'Vault' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/VaultProperties'],
                'sku' => ['$ref' => '#/definitions/Sku']
            ]],
            'TrackedResource' => ['properties' => [
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'eTag' => ['type' => 'string']
            ]],
            'RawCertificateData' => ['properties' => [
                'authType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'ACS',
                        'AAD',
                        'AccessControlService',
                        'AzureActiveDirectory'
                    ]
                ],
                'certificate' => [
                    'type' => 'string',
                    'format' => 'byte'
                ]
            ]],
            'CertificateRequest' => ['properties' => ['properties' => ['$ref' => '#/definitions/RawCertificateData']]],
            'AzureActiveDirectory' => ['properties' => [
                'aadAuthority' => ['type' => 'string'],
                'aadTenantId' => ['type' => 'string'],
                'servicePrincipalClientId' => ['type' => 'string'],
                'servicePrincipalObjectId' => ['type' => 'string'],
                'azureManagementEndpointAudience' => ['type' => 'string']
            ]],
            'AccessControlService' => ['properties' => [
                'globalAcsNamespace' => ['type' => 'string'],
                'globalAcsHostName' => ['type' => 'string'],
                'globalAcsRPRealm' => ['type' => 'string']
            ]],
            'ResourceCertificateDetails' => ['properties' => [
                'certificate' => [
                    'type' => 'string',
                    'format' => 'byte'
                ],
                'friendlyName' => ['type' => 'string'],
                'issuer' => ['type' => 'string'],
                'resourceId' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'subject' => ['type' => 'string'],
                'thumbprint' => ['type' => 'string'],
                'validFrom' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'validTo' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'VaultCertificateResponse' => ['properties' => [
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'id' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ResourceCertificateDetails']
            ]],
            'JobsSummary' => ['properties' => [
                'failedJobs' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'suspendedJobs' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'inProgressJobs' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'MonitoringSummary' => ['properties' => [
                'unHealthyVmCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'unHealthyProviderCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'eventsCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'deprecatedProviderCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'supportedProviderCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'unsupportedProviderCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'ReplicationUsage' => ['properties' => [
                'monitoringSummary' => ['$ref' => '#/definitions/MonitoringSummary'],
                'jobsSummary' => ['$ref' => '#/definitions/JobsSummary'],
                'protectedItemCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'recoveryPlanCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'registeredServersCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'recoveryServicesProviderAuthType' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'ReplicationUsageList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ReplicationUsage']
            ]]],
            'ClientDiscoveryDisplay' => ['properties' => [
                'Provider' => ['type' => 'string'],
                'Resource' => ['type' => 'string'],
                'Operation' => ['type' => 'string'],
                'Description' => ['type' => 'string']
            ]],
            'ClientDiscoveryForLogSpecification' => ['properties' => [
                'name' => ['type' => 'string'],
                'displayName' => ['type' => 'string'],
                'blobDuration' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'ClientDiscoveryForServiceSpecification' => ['properties' => ['logSpecifications' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ClientDiscoveryForLogSpecification']
            ]]],
            'ClientDiscoveryProperties' => ['properties' => ['serviceSpecification' => ['$ref' => '#/definitions/ClientDiscoveryForServiceSpecification']]],
            'ClientDiscoveryValueForSingleApi' => ['properties' => [
                'Name' => ['type' => 'string'],
                'Display' => ['$ref' => '#/definitions/ClientDiscoveryDisplay'],
                'Origin' => ['type' => 'string'],
                'Properties' => ['$ref' => '#/definitions/ClientDiscoveryProperties']
            ]],
            'ClientDiscoveryResponse' => ['properties' => [
                'Value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ClientDiscoveryValueForSingleApi']
                ],
                'NextLink' => ['type' => 'string']
            ]],
            'VaultList' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Vault']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'NameInfo' => ['properties' => [
                'value' => ['type' => 'string'],
                'localizedValue' => ['type' => 'string']
            ]],
            'VaultUsage' => ['properties' => [
                'unit' => [
                    'type' => 'string',
                    'enum' => [
                        'Count',
                        'Bytes',
                        'Seconds',
                        'Percent',
                        'CountPerSecond',
                        'BytesPerSecond'
                    ]
                ],
                'quotaPeriod' => ['type' => 'string'],
                'nextResetTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'currentValue' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'limit' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'name' => ['$ref' => '#/definitions/NameInfo']
            ]],
            'VaultUsageList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/VaultUsage']
            ]]]
        ]
    ];
}
