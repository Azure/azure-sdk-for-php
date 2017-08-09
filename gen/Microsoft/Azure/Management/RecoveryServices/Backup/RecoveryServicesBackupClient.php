<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup;
final class RecoveryServicesBackupClient
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
        $this->_BackupResourceVaultConfigs_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\BackupResourceVaultConfigs($_client);
        $this->_BackupEngines_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\BackupEngines($_client);
        $this->_ProtectionContainerRefreshOperationResults_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionContainerRefreshOperationResults($_client);
        $this->_ProtectionContainers_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionContainers($_client);
        $this->_ProtectionContainerOperationResults_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionContainerOperationResults($_client);
        $this->_ProtectedItems_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectedItems($_client);
        $this->_Backups_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\Backups($_client);
        $this->_ProtectedItemOperationResults_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectedItemOperationResults($_client);
        $this->_ProtectedItemOperationStatuses_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectedItemOperationStatuses($_client);
        $this->_RecoveryPoints_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\RecoveryPoints($_client);
        $this->_ItemLevelRecoveryConnections_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\ItemLevelRecoveryConnections($_client);
        $this->_Restores_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\Restores($_client);
        $this->_BackupJobs_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\BackupJobs($_client);
        $this->_JobDetails_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\JobDetails($_client);
        $this->_JobCancellations_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\JobCancellations($_client);
        $this->_JobOperationResults_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\JobOperationResults($_client);
        $this->_ExportJobsOperationResults_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\ExportJobsOperationResults($_client);
        $this->_Jobs_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\Jobs($_client);
        $this->_BackupOperationResults_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\BackupOperationResults($_client);
        $this->_BackupOperationStatuses_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\BackupOperationStatuses($_client);
        $this->_BackupPolicies_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\BackupPolicies($_client);
        $this->_ProtectionPolicies_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionPolicies($_client);
        $this->_ProtectionPolicyOperationResults_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionPolicyOperationResults($_client);
        $this->_ProtectionPolicyOperationStatuses_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionPolicyOperationStatuses($_client);
        $this->_BackupProtectableItems_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\BackupProtectableItems($_client);
        $this->_BackupProtectedItems_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\BackupProtectedItems($_client);
        $this->_BackupProtectionContainers_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\BackupProtectionContainers($_client);
        $this->_SecurityPINs_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\SecurityPINs($_client);
        $this->_BackupResourceStorageConfigs_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\BackupResourceStorageConfigs($_client);
        $this->_BackupUsageSummaries_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\BackupUsageSummaries($_client);
        $this->_Operations_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\Operations($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\BackupResourceVaultConfigs
     */
    public function getBackupResourceVaultConfigs()
    {
        return $this->_BackupResourceVaultConfigs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\BackupEngines
     */
    public function getBackupEngines()
    {
        return $this->_BackupEngines_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionContainerRefreshOperationResults
     */
    public function getProtectionContainerRefreshOperationResults()
    {
        return $this->_ProtectionContainerRefreshOperationResults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionContainers
     */
    public function getProtectionContainers()
    {
        return $this->_ProtectionContainers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionContainerOperationResults
     */
    public function getProtectionContainerOperationResults()
    {
        return $this->_ProtectionContainerOperationResults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectedItems
     */
    public function getProtectedItems()
    {
        return $this->_ProtectedItems_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\Backups
     */
    public function getBackups()
    {
        return $this->_Backups_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectedItemOperationResults
     */
    public function getProtectedItemOperationResults()
    {
        return $this->_ProtectedItemOperationResults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectedItemOperationStatuses
     */
    public function getProtectedItemOperationStatuses()
    {
        return $this->_ProtectedItemOperationStatuses_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\RecoveryPoints
     */
    public function getRecoveryPoints()
    {
        return $this->_RecoveryPoints_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\ItemLevelRecoveryConnections
     */
    public function getItemLevelRecoveryConnections()
    {
        return $this->_ItemLevelRecoveryConnections_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\Restores
     */
    public function getRestores()
    {
        return $this->_Restores_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\BackupJobs
     */
    public function getBackupJobs()
    {
        return $this->_BackupJobs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\JobDetails
     */
    public function getJobDetails()
    {
        return $this->_JobDetails_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\JobCancellations
     */
    public function getJobCancellations()
    {
        return $this->_JobCancellations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\JobOperationResults
     */
    public function getJobOperationResults()
    {
        return $this->_JobOperationResults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\ExportJobsOperationResults
     */
    public function getExportJobsOperationResults()
    {
        return $this->_ExportJobsOperationResults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\Jobs
     */
    public function getJobs()
    {
        return $this->_Jobs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\BackupOperationResults
     */
    public function getBackupOperationResults()
    {
        return $this->_BackupOperationResults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\BackupOperationStatuses
     */
    public function getBackupOperationStatuses()
    {
        return $this->_BackupOperationStatuses_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\BackupPolicies
     */
    public function getBackupPolicies()
    {
        return $this->_BackupPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionPolicies
     */
    public function getProtectionPolicies()
    {
        return $this->_ProtectionPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionPolicyOperationResults
     */
    public function getProtectionPolicyOperationResults()
    {
        return $this->_ProtectionPolicyOperationResults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionPolicyOperationStatuses
     */
    public function getProtectionPolicyOperationStatuses()
    {
        return $this->_ProtectionPolicyOperationStatuses_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\BackupProtectableItems
     */
    public function getBackupProtectableItems()
    {
        return $this->_BackupProtectableItems_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\BackupProtectedItems
     */
    public function getBackupProtectedItems()
    {
        return $this->_BackupProtectedItems_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\BackupProtectionContainers
     */
    public function getBackupProtectionContainers()
    {
        return $this->_BackupProtectionContainers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\SecurityPINs
     */
    public function getSecurityPINs()
    {
        return $this->_SecurityPINs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\BackupResourceStorageConfigs
     */
    public function getBackupResourceStorageConfigs()
    {
        return $this->_BackupResourceStorageConfigs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\BackupUsageSummaries
     */
    public function getBackupUsageSummaries()
    {
        return $this->_BackupUsageSummaries_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\BackupResourceVaultConfigs
     */
    private $_BackupResourceVaultConfigs_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\BackupEngines
     */
    private $_BackupEngines_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionContainerRefreshOperationResults
     */
    private $_ProtectionContainerRefreshOperationResults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionContainers
     */
    private $_ProtectionContainers_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionContainerOperationResults
     */
    private $_ProtectionContainerOperationResults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectedItems
     */
    private $_ProtectedItems_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\Backups
     */
    private $_Backups_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectedItemOperationResults
     */
    private $_ProtectedItemOperationResults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectedItemOperationStatuses
     */
    private $_ProtectedItemOperationStatuses_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\RecoveryPoints
     */
    private $_RecoveryPoints_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\ItemLevelRecoveryConnections
     */
    private $_ItemLevelRecoveryConnections_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\Restores
     */
    private $_Restores_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\BackupJobs
     */
    private $_BackupJobs_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\JobDetails
     */
    private $_JobDetails_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\JobCancellations
     */
    private $_JobCancellations_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\JobOperationResults
     */
    private $_JobOperationResults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\ExportJobsOperationResults
     */
    private $_ExportJobsOperationResults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\Jobs
     */
    private $_Jobs_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\BackupOperationResults
     */
    private $_BackupOperationResults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\BackupOperationStatuses
     */
    private $_BackupOperationStatuses_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\BackupPolicies
     */
    private $_BackupPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionPolicies
     */
    private $_ProtectionPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionPolicyOperationResults
     */
    private $_ProtectionPolicyOperationResults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\ProtectionPolicyOperationStatuses
     */
    private $_ProtectionPolicyOperationStatuses_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\BackupProtectableItems
     */
    private $_BackupProtectableItems_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\BackupProtectedItems
     */
    private $_BackupProtectedItems_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\BackupProtectionContainers
     */
    private $_BackupProtectionContainers_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\SecurityPINs
     */
    private $_SecurityPINs_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\BackupResourceStorageConfigs
     */
    private $_BackupResourceStorageConfigs_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\BackupUsageSummaries
     */
    private $_BackupUsageSummaries_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\Operations
     */
    private $_Operations_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupconfig/vaultconfig' => [
                'get' => [
                    'operationId' => 'BackupResourceVaultConfigs_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
                        ],
                        [
                            'name' => 'vaultName',
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
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupResourceVaultConfigResource']]]
                ],
                'patch' => [
                    'operationId' => 'BackupResourceVaultConfigs_Update',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
                        ],
                        [
                            'name' => 'vaultName',
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
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/BackupResourceVaultConfigResource'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/BackupResourceVaultConfigResource']],
                        '204' => []
                    ]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupEngines' => ['get' => [
                'operationId' => 'BackupEngines_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
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
                        'name' => '$skipToken',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupEngineBaseResourceList']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupEngines/{backupEngineName}' => ['get' => [
                'operationId' => 'BackupEngines_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'backupEngineName',
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
                        'name' => '$skipToken',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupEngineBaseResource']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/operationResults/{operationId}' => ['get' => [
                'operationId' => 'ProtectionContainerRefreshOperationResults_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'fabricName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'operationId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}' => ['get' => [
                'operationId' => 'ProtectionContainers_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'fabricName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'containerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectionContainerResource']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/refreshContainers' => ['post' => [
                'operationId' => 'ProtectionContainers_Refresh',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'fabricName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['202' => []]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/operationResults/{operationId}' => ['get' => [
                'operationId' => 'ProtectionContainerOperationResults_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'fabricName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'containerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'operationId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ProtectionContainerResource']],
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}' => [
                'get' => [
                    'operationId' => 'ProtectedItems_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
                        ],
                        [
                            'name' => 'vaultName',
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
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'fabricName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'containerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'protectedItemName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => '$filter',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectedItemResource']]]
                ],
                'put' => [
                    'operationId' => 'ProtectedItems_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
                        ],
                        [
                            'name' => 'vaultName',
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
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'fabricName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'containerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'protectedItemName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ProtectedItemResource'
                        ]
                    ],
                    'responses' => ['202' => []]
                ],
                'delete' => [
                    'operationId' => 'ProtectedItems_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
                        ],
                        [
                            'name' => 'vaultName',
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
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'fabricName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'containerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'protectedItemName',
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/backup' => ['post' => [
                'operationId' => 'Backups_Trigger',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'fabricName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'containerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'protectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/BackupRequestResource'
                    ]
                ],
                'responses' => ['202' => []]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/operationResults/{operationId}' => ['get' => [
                'operationId' => 'ProtectedItemOperationResults_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'fabricName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'containerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'protectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'operationId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ProtectedItemResource']],
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/operationsStatus/{operationId}' => ['get' => [
                'operationId' => 'ProtectedItemOperationStatuses_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'fabricName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'containerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'protectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'operationId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationStatus']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/recoveryPoints' => ['get' => [
                'operationId' => 'RecoveryPoints_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'fabricName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'containerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'protectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecoveryPointResourceList']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/recoveryPoints/{recoveryPointId}' => ['get' => [
                'operationId' => 'RecoveryPoints_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'fabricName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'containerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'protectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'recoveryPointId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecoveryPointResource']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/recoveryPoints/{recoveryPointId}/provisionInstantItemRecovery' => ['post' => [
                'operationId' => 'ItemLevelRecoveryConnections_Provision',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'fabricName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'containerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'protectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'recoveryPointId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/ILRRequestResource'
                    ]
                ],
                'responses' => ['202' => []]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/recoveryPoints/{recoveryPointId}/revokeInstantItemRecovery' => ['post' => [
                'operationId' => 'ItemLevelRecoveryConnections_Revoke',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'fabricName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'containerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'protectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'recoveryPointId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['202' => []]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/recoveryPoints/{recoveryPointId}/restore' => ['post' => [
                'operationId' => 'Restores_Trigger',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'fabricName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'containerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'protectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'recoveryPointId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/RestoreRequestResource'
                    ]
                ],
                'responses' => ['202' => []]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupJobs' => ['get' => [
                'operationId' => 'BackupJobs_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
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
                        'name' => '$skipToken',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobResourceList']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupJobs/{jobName}' => ['get' => [
                'operationId' => 'JobDetails_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobResource']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupJobs/{jobName}/cancel' => ['post' => [
                'operationId' => 'JobCancellations_Trigger',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['202' => []]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupJobs/{jobName}/operationResults/{operationId}' => ['get' => [
                'operationId' => 'JobOperationResults_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
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
                        'name' => 'operationId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => [],
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupJobs/operationResults/{operationId}' => ['get' => [
                'operationId' => 'ExportJobsOperationResults_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'operationId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/OperationResultInfoBaseResource']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupJobsExport' => ['post' => [
                'operationId' => 'Jobs_Export',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['202' => []]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupOperationResults/{operationId}' => ['get' => [
                'operationId' => 'BackupOperationResults_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'operationId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => [],
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupOperations/{operationId}' => ['get' => [
                'operationId' => 'BackupOperationStatuses_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'operationId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationStatus']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupPolicies' => ['get' => [
                'operationId' => 'BackupPolicies_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectionPolicyResourceList']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupPolicies/{policyName}' => [
                'get' => [
                    'operationId' => 'ProtectionPolicies_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
                        ],
                        [
                            'name' => 'vaultName',
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
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectionPolicyResource']]]
                ],
                'put' => [
                    'operationId' => 'ProtectionPolicies_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
                        ],
                        [
                            'name' => 'vaultName',
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
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ProtectionPolicyResource'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ProtectionPolicyResource']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'ProtectionPolicies_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
                        ],
                        [
                            'name' => 'vaultName',
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
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'policyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupPolicies/{policyName}/operationResults/{operationId}' => ['get' => [
                'operationId' => 'ProtectionPolicyOperationResults_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'policyName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'operationId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectionPolicyResource']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupPolicies/{policyName}/operations/{operationId}' => ['get' => [
                'operationId' => 'ProtectionPolicyOperationStatuses_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'policyName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'operationId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationStatus']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupProtectableItems' => ['get' => [
                'operationId' => 'BackupProtectableItems_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
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
                        'name' => '$skipToken',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WorkloadProtectableItemResourceList']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupProtectedItems' => ['get' => [
                'operationId' => 'BackupProtectedItems_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
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
                        'name' => '$skipToken',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectedItemResourceList']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupProtectionContainers' => ['get' => [
                'operationId' => 'BackupProtectionContainers_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectionContainerResourceList']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupSecurityPIN' => ['post' => [
                'operationId' => 'SecurityPINs_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TokenInformation']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupstorageconfig/vaultstorageconfig' => [
                'get' => [
                    'operationId' => 'BackupResourceStorageConfigs_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
                        ],
                        [
                            'name' => 'vaultName',
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
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupResourceConfigResource']]]
                ],
                'patch' => [
                    'operationId' => 'BackupResourceStorageConfigs_Update',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-12-01']
                        ],
                        [
                            'name' => 'vaultName',
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
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['204' => []]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupUsageSummaries' => ['get' => [
                'operationId' => 'BackupUsageSummaries_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-12-01']
                    ],
                    [
                        'name' => 'vaultName',
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
                        'name' => 'subscriptionId',
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
                        'name' => '$skipToken',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupManagementUsageList']]]
            ]],
            '/providers/Microsoft.RecoveryServices/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2016-08-10']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ClientDiscoveryResponse']]]
            ]]
        ],
        'definitions' => [
            'DPMContainerExtendedInfo' => ['properties' => ['lastRefreshedAt' => [
                'type' => 'string',
                'format' => 'date-time'
            ]]],
            'AzureBackupServerContainer' => ['properties' => [
                'canReRegister' => ['type' => 'boolean'],
                'containerId' => ['type' => 'string'],
                'protectedItemCount' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'dpmAgentVersion' => ['type' => 'string'],
                'DPMServers' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'UpgradeAvailable' => ['type' => 'boolean'],
                'protectionStatus' => ['type' => 'string'],
                'extendedInfo' => ['$ref' => '#/definitions/DPMContainerExtendedInfo']
            ]],
            'AzureBackupServerEngine' => ['properties' => []],
            'Microsoft.ClassicCompute/virtualMachines' => ['properties' => []],
            'Microsoft.ClassicCompute/virtualMachines' => ['properties' => []],
            'Microsoft.ClassicCompute/virtualMachines' => ['properties' => []],
            'Microsoft.Compute/virtualMachines' => ['properties' => []],
            'Microsoft.Compute/virtualMachines' => ['properties' => []],
            'Microsoft.Compute/virtualMachines' => ['properties' => []],
            'AzureIaaSVMErrorInfo' => ['properties' => [
                'errorCode' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'errorTitle' => ['type' => 'string'],
                'errorString' => ['type' => 'string'],
                'recommendations' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'AzureIaaSVMHealthDetails' => ['properties' => [
                'code' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'title' => ['type' => 'string'],
                'message' => ['type' => 'string'],
                'recommendations' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'AzureIaaSVMJobTaskDetails' => ['properties' => [
                'taskId' => ['type' => 'string'],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'instanceId' => ['type' => 'string'],
                'duration' => [
                    'type' => 'string',
                    'format' => 'duration'
                ],
                'status' => ['type' => 'string'],
                'progressPercentage' => [
                    'type' => 'number',
                    'format' => 'double'
                ]
            ]],
            'AzureIaaSVMJobExtendedInfo' => ['properties' => [
                'tasksList' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AzureIaaSVMJobTaskDetails']
                ],
                'propertyBag' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'progressPercentage' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'dynamicErrorMessage' => ['type' => 'string']
            ]],
            'AzureIaaSVMJob' => ['properties' => [
                'duration' => [
                    'type' => 'string',
                    'format' => 'duration'
                ],
                'actionsInfo' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'Invalid',
                            'Cancellable',
                            'Retriable'
                        ]
                    ]
                ],
                'errorDetails' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AzureIaaSVMErrorInfo']
                ],
                'virtualMachineVersion' => ['type' => 'string'],
                'extendedInfo' => ['$ref' => '#/definitions/AzureIaaSVMJobExtendedInfo']
            ]],
            'AzureIaaSVMProtectedItemExtendedInfo' => ['properties' => [
                'oldestRecoveryPoint' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'recoveryPointCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'policyInconsistent' => ['type' => 'boolean']
            ]],
            'AzureIaaSVMProtectedItem' => ['properties' => [
                'friendlyName' => ['type' => 'string'],
                'virtualMachineId' => ['type' => 'string'],
                'protectionStatus' => ['type' => 'string'],
                'protectionState' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'IRPending',
                        'Protected',
                        'ProtectionError',
                        'ProtectionStopped',
                        'ProtectionPaused'
                    ]
                ],
                'healthStatus' => [
                    'type' => 'string',
                    'enum' => [
                        'Passed',
                        'ActionRequired',
                        'ActionSuggested',
                        'Invalid'
                    ]
                ],
                'healthDetails' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AzureIaaSVMHealthDetails']
                ],
                'lastBackupStatus' => ['type' => 'string'],
                'lastBackupTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'protectedItemDataId' => ['type' => 'string'],
                'extendedInfo' => ['$ref' => '#/definitions/AzureIaaSVMProtectedItemExtendedInfo']
            ]],
            'SchedulePolicy' => ['properties' => []],
            'RetentionPolicy' => ['properties' => []],
            'AzureIaasVM' => ['properties' => [
                'schedulePolicy' => ['$ref' => '#/definitions/SchedulePolicy'],
                'retentionPolicy' => ['$ref' => '#/definitions/RetentionPolicy'],
                'timeZone' => ['type' => 'string']
            ]],
            'AzureSqlContainer' => ['properties' => []],
            'AzureSqlProtectedItemExtendedInfo' => ['properties' => [
                'oldestRecoveryPoint' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'recoveryPointCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'policyState' => ['type' => 'string']
            ]],
            'Microsoft.Sql/servers/databases' => ['properties' => [
                'protectedItemDataId' => ['type' => 'string'],
                'protectionState' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'IRPending',
                        'Protected',
                        'ProtectionError',
                        'ProtectionStopped',
                        'ProtectionPaused'
                    ]
                ],
                'extendedInfo' => ['$ref' => '#/definitions/AzureSqlProtectedItemExtendedInfo']
            ]],
            'AzureSql' => ['properties' => ['retentionPolicy' => ['$ref' => '#/definitions/RetentionPolicy']]],
            'BackupEngineExtendedInfo' => ['properties' => [
                'databaseName' => ['type' => 'string'],
                'protectedItemsCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'protectedServersCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'diskCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'usedDiskSpace' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'availableDiskSpace' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'refreshedAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'azureProtectedInstances' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'BackupEngineBase' => ['properties' => [
                'friendlyName' => ['type' => 'string'],
                'backupManagementType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'AzureIaasVM',
                        'MAB',
                        'DPM',
                        'AzureBackupServer',
                        'AzureSql'
                    ]
                ],
                'registrationStatus' => ['type' => 'string'],
                'backupEngineState' => ['type' => 'string'],
                'healthStatus' => ['type' => 'string'],
                'canReRegister' => ['type' => 'boolean'],
                'backupEngineId' => ['type' => 'string'],
                'dpmVersion' => ['type' => 'string'],
                'azureBackupAgentVersion' => ['type' => 'string'],
                'isAzureBackupAgentUpgradeAvailable' => ['type' => 'boolean'],
                'isDPMUpgradeAvailable' => ['type' => 'boolean'],
                'extendedInfo' => ['$ref' => '#/definitions/BackupEngineExtendedInfo']
            ]],
            'BackupEngineBaseResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/BackupEngineBase']]],
            'BackupEngineBaseResourceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/BackupEngineBaseResource']
            ]]],
            'NameInfo' => ['properties' => [
                'value' => ['type' => 'string'],
                'localizedValue' => ['type' => 'string']
            ]],
            'BackupManagementUsage' => ['properties' => [
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
            'BackupManagementUsageList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/BackupManagementUsage']
            ]]],
            'BackupRequest' => ['properties' => []],
            'BackupRequestResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/BackupRequest']]],
            'BackupResourceConfig' => ['properties' => [
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
            'BackupResourceConfigResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/BackupResourceConfig']]],
            'BackupResourceVaultConfig' => ['properties' => [
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
            'BackupResourceVaultConfigResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/BackupResourceVaultConfig']]],
            'BEKDetails' => ['properties' => [
                'secretUrl' => ['type' => 'string'],
                'secretVaultId' => ['type' => 'string'],
                'secretData' => ['type' => 'string']
            ]],
            'BMSBackupEngineQueryObject' => ['properties' => ['expand' => ['type' => 'string']]],
            'BMSBackupEnginesQueryObject' => ['properties' => [
                'backupManagementType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'AzureIaasVM',
                        'MAB',
                        'DPM',
                        'AzureBackupServer',
                        'AzureSql'
                    ]
                ],
                'friendlyName' => ['type' => 'string'],
                'expand' => ['type' => 'string']
            ]],
            'BMSBackupSummariesQueryObject' => ['properties' => ['type' => [
                'type' => 'string',
                'enum' => [
                    'Invalid',
                    'BackupProtectedItemCountSummary',
                    'BackupProtectionContainerCountSummary'
                ]
            ]]],
            'BMSContainerQueryObject' => ['properties' => [
                'backupManagementType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'AzureIaasVM',
                        'MAB',
                        'DPM',
                        'AzureBackupServer',
                        'AzureSql'
                    ]
                ],
                'containerType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'Unknown',
                        'IaasVMContainer',
                        'IaasVMServiceContainer',
                        'DPMContainer',
                        'AzureBackupServerContainer',
                        'MABContainer',
                        'Cluster',
                        'AzureSqlContainer',
                        'Windows',
                        'VCenter'
                    ]
                ],
                'backupEngineName' => ['type' => 'string'],
                'status' => ['type' => 'string'],
                'friendlyName' => ['type' => 'string']
            ]],
            'BMSPOQueryObject' => ['properties' => [
                'backupManagementType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'AzureIaasVM',
                        'MAB',
                        'DPM',
                        'AzureBackupServer',
                        'AzureSql'
                    ]
                ],
                'status' => ['type' => 'string'],
                'friendlyName' => ['type' => 'string']
            ]],
            'BMSRPQueryObject' => ['properties' => [
                'startDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'ClientScriptForConnect' => ['properties' => [
                'scriptContent' => ['type' => 'string'],
                'scriptExtension' => ['type' => 'string'],
                'osType' => ['type' => 'string'],
                'url' => ['type' => 'string'],
                'scriptNameSuffix' => ['type' => 'string']
            ]],
            'Day' => ['properties' => [
                'date' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'isLast' => ['type' => 'boolean']
            ]],
            'DailyRetentionFormat' => ['properties' => ['daysOfTheMonth' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Day']
            ]]],
            'RetentionDuration' => ['properties' => [
                'count' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'durationType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'Days',
                        'Weeks',
                        'Months',
                        'Years'
                    ]
                ]
            ]],
            'DailyRetentionSchedule' => ['properties' => [
                'retentionTimes' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'retentionDuration' => ['$ref' => '#/definitions/RetentionDuration']
            ]],
            'DpmBackupEngine' => ['properties' => []],
            'DPMContainer' => ['properties' => [
                'canReRegister' => ['type' => 'boolean'],
                'containerId' => ['type' => 'string'],
                'protectedItemCount' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'dpmAgentVersion' => ['type' => 'string'],
                'DPMServers' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'UpgradeAvailable' => ['type' => 'boolean'],
                'protectionStatus' => ['type' => 'string'],
                'extendedInfo' => ['$ref' => '#/definitions/DPMContainerExtendedInfo']
            ]],
            'DpmErrorInfo' => ['properties' => [
                'errorString' => ['type' => 'string'],
                'recommendations' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'DpmJobTaskDetails' => ['properties' => [
                'taskId' => ['type' => 'string'],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'duration' => [
                    'type' => 'string',
                    'format' => 'duration'
                ],
                'status' => ['type' => 'string']
            ]],
            'DpmJobExtendedInfo' => ['properties' => [
                'tasksList' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/DpmJobTaskDetails']
                ],
                'propertyBag' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'dynamicErrorMessage' => ['type' => 'string']
            ]],
            'DpmJob' => ['properties' => [
                'duration' => [
                    'type' => 'string',
                    'format' => 'duration'
                ],
                'dpmServerName' => ['type' => 'string'],
                'containerName' => ['type' => 'string'],
                'containerType' => ['type' => 'string'],
                'workloadType' => ['type' => 'string'],
                'actionsInfo' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'Invalid',
                            'Cancellable',
                            'Retriable'
                        ]
                    ]
                ],
                'errorDetails' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/DpmErrorInfo']
                ],
                'extendedInfo' => ['$ref' => '#/definitions/DpmJobExtendedInfo']
            ]],
            'DPMProtectedItemExtendedInfo' => ['properties' => [
                'protectableObjectLoadPath' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'protected' => ['type' => 'boolean'],
                'isPresentOnCloud' => ['type' => 'boolean'],
                'lastBackupStatus' => ['type' => 'string'],
                'lastRefreshedAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'oldestRecoveryPoint' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'recoveryPointCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'onPremiseOldestRecoveryPoint' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'onPremiseLatestRecoveryPoint' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'onPremiseRecoveryPointCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'isCollocated' => ['type' => 'boolean'],
                'protectionGroupName' => ['type' => 'string'],
                'diskStorageUsedInBytes' => ['type' => 'string'],
                'totalDiskStorageSizeInBytes' => ['type' => 'string']
            ]],
            'DPMProtectedItem' => ['properties' => [
                'friendlyName' => ['type' => 'string'],
                'backupEngineName' => ['type' => 'string'],
                'protectionState' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'IRPending',
                        'Protected',
                        'ProtectionError',
                        'ProtectionStopped',
                        'ProtectionPaused'
                    ]
                ],
                'isScheduledForDeferredDelete' => ['type' => 'boolean'],
                'extendedInfo' => ['$ref' => '#/definitions/DPMProtectedItemExtendedInfo']
            ]],
            'EncryptionDetails' => ['properties' => [
                'encryptionEnabled' => ['type' => 'boolean'],
                'kekUrl' => ['type' => 'string'],
                'secretKeyUrl' => ['type' => 'string'],
                'kekVaultId' => ['type' => 'string'],
                'secretKeyVaultId' => ['type' => 'string']
            ]],
            'ExportJobsOperationResultInfo' => ['properties' => [
                'blobUrl' => ['type' => 'string'],
                'blobSasKey' => ['type' => 'string']
            ]],
            'GenericRecoveryPoint' => ['properties' => [
                'friendlyName' => ['type' => 'string'],
                'recoveryPointType' => ['type' => 'string'],
                'recoveryPointTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'recoveryPointAdditionalInfo' => ['type' => 'string']
            ]],
            'GetProtectedItemQueryObject' => ['properties' => ['expand' => ['type' => 'string']]],
            'IaasVMBackupRequest' => ['properties' => ['recoveryPointExpiryTimeInUTC' => [
                'type' => 'string',
                'format' => 'date-time'
            ]]],
            'IaaSVMContainer' => ['properties' => [
                'virtualMachineId' => ['type' => 'string'],
                'virtualMachineVersion' => ['type' => 'string'],
                'resourceGroup' => ['type' => 'string']
            ]],
            'IaasVMILRRegistrationRequest' => ['properties' => [
                'recoveryPointId' => ['type' => 'string'],
                'virtualMachineId' => ['type' => 'string'],
                'initiatorName' => ['type' => 'string'],
                'renewExistingRegistration' => ['type' => 'boolean']
            ]],
            'IaaSVMProtectableItem' => ['properties' => ['virtualMachineId' => ['type' => 'string']]],
            'KEKDetails' => ['properties' => [
                'keyUrl' => ['type' => 'string'],
                'keyVaultId' => ['type' => 'string'],
                'keyBackupData' => ['type' => 'string']
            ]],
            'KeyAndSecretDetails' => ['properties' => [
                'kekDetails' => ['$ref' => '#/definitions/KEKDetails'],
                'bekDetails' => ['$ref' => '#/definitions/BEKDetails']
            ]],
            'RecoveryPointTierInformation' => ['properties' => [
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'InstantRP',
                        'HardenedRP'
                    ]
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'Valid',
                        'Disabled',
                        'Deleted'
                    ]
                ]
            ]],
            'IaasVMRecoveryPoint' => ['properties' => [
                'recoveryPointType' => ['type' => 'string'],
                'recoveryPointTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'recoveryPointAdditionalInfo' => ['type' => 'string'],
                'sourceVMStorageType' => ['type' => 'string'],
                'isSourceVMEncrypted' => ['type' => 'boolean'],
                'keyAndSecret' => ['$ref' => '#/definitions/KeyAndSecretDetails'],
                'isInstantILRSessionActive' => ['type' => 'boolean'],
                'recoveryPointTierDetails' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RecoveryPointTierInformation']
                ],
                'isManagedVirtualMachine' => ['type' => 'boolean'],
                'virtualMachineSize' => ['type' => 'string']
            ]],
            'IaasVMRestoreRequest' => ['properties' => [
                'recoveryPointId' => ['type' => 'string'],
                'recoveryType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'OriginalLocation',
                        'AlternateLocation',
                        'RestoreDisks'
                    ]
                ],
                'sourceResourceId' => ['type' => 'string'],
                'targetVirtualMachineId' => ['type' => 'string'],
                'targetResourceGroupId' => ['type' => 'string'],
                'storageAccountId' => ['type' => 'string'],
                'virtualNetworkId' => ['type' => 'string'],
                'subnetId' => ['type' => 'string'],
                'targetDomainNameId' => ['type' => 'string'],
                'region' => ['type' => 'string'],
                'affinityGroup' => ['type' => 'string'],
                'createNewCloudService' => ['type' => 'boolean'],
                'encryptionDetails' => ['$ref' => '#/definitions/EncryptionDetails']
            ]],
            'ILRRequest' => ['properties' => []],
            'ILRRequestResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/ILRRequest']]],
            'InstantItemRecoveryTarget' => ['properties' => ['clientScripts' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ClientScriptForConnect']
            ]]],
            'Job' => ['properties' => [
                'entityFriendlyName' => ['type' => 'string'],
                'backupManagementType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'AzureIaasVM',
                        'MAB',
                        'DPM',
                        'AzureBackupServer',
                        'AzureSql'
                    ]
                ],
                'operation' => ['type' => 'string'],
                'status' => ['type' => 'string'],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'activityId' => ['type' => 'string']
            ]],
            'JobQueryObject' => ['properties' => [
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'InProgress',
                        'Completed',
                        'Failed',
                        'CompletedWithWarnings',
                        'Cancelled',
                        'Cancelling'
                    ]
                ],
                'backupManagementType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'AzureIaasVM',
                        'MAB',
                        'DPM',
                        'AzureBackupServer',
                        'AzureSql'
                    ]
                ],
                'operation' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'Register',
                        'UnRegister',
                        'ConfigureBackup',
                        'Backup',
                        'Restore',
                        'DisableBackup',
                        'DeleteBackupData'
                    ]
                ],
                'jobId' => ['type' => 'string'],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'JobResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/Job']]],
            'JobResourceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/JobResource']
            ]]],
            'WeeklyRetentionSchedule' => ['properties' => [
                'daysOfTheWeek' => [
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
                ],
                'retentionTimes' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'retentionDuration' => ['$ref' => '#/definitions/RetentionDuration']
            ]],
            'WeeklyRetentionFormat' => ['properties' => [
                'daysOfTheWeek' => [
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
                ],
                'weeksOfTheMonth' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'First',
                            'Second',
                            'Third',
                            'Fourth',
                            'Last'
                        ]
                    ]
                ]
            ]],
            'MonthlyRetentionSchedule' => ['properties' => [
                'retentionScheduleFormatType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'Daily',
                        'Weekly'
                    ]
                ],
                'retentionScheduleDaily' => ['$ref' => '#/definitions/DailyRetentionFormat'],
                'retentionScheduleWeekly' => ['$ref' => '#/definitions/WeeklyRetentionFormat'],
                'retentionTimes' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'retentionDuration' => ['$ref' => '#/definitions/RetentionDuration']
            ]],
            'YearlyRetentionSchedule' => ['properties' => [
                'retentionScheduleFormatType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'Daily',
                        'Weekly'
                    ]
                ],
                'monthsOfYear' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'Invalid',
                            'January',
                            'February',
                            'March',
                            'April',
                            'May',
                            'June',
                            'July',
                            'August',
                            'September',
                            'October',
                            'November',
                            'December'
                        ]
                    ]
                ],
                'retentionScheduleDaily' => ['$ref' => '#/definitions/DailyRetentionFormat'],
                'retentionScheduleWeekly' => ['$ref' => '#/definitions/WeeklyRetentionFormat'],
                'retentionTimes' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'retentionDuration' => ['$ref' => '#/definitions/RetentionDuration']
            ]],
            'LongTermRetentionPolicy' => ['properties' => [
                'dailySchedule' => ['$ref' => '#/definitions/DailyRetentionSchedule'],
                'weeklySchedule' => ['$ref' => '#/definitions/WeeklyRetentionSchedule'],
                'monthlySchedule' => ['$ref' => '#/definitions/MonthlyRetentionSchedule'],
                'yearlySchedule' => ['$ref' => '#/definitions/YearlyRetentionSchedule']
            ]],
            'LongTermSchedulePolicy' => ['properties' => []],
            'MabContainerExtendedInfo' => ['properties' => [
                'lastRefreshedAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'backupItemType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'VM',
                        'FileFolder',
                        'AzureSqlDb',
                        'SQLDB',
                        'Exchange',
                        'Sharepoint',
                        'VMwareVM',
                        'SystemState',
                        'Client',
                        'GenericDataSource'
                    ]
                ],
                'backupItems' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'policyName' => ['type' => 'string'],
                'lastBackupStatus' => ['type' => 'string']
            ]],
            'MABWindowsContainer' => ['properties' => [
                'canReRegister' => ['type' => 'boolean'],
                'containerId' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'protectedItemCount' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'agentVersion' => ['type' => 'string'],
                'extendedInfo' => ['$ref' => '#/definitions/MabContainerExtendedInfo']
            ]],
            'MabErrorInfo' => ['properties' => [
                'errorString' => ['type' => 'string'],
                'recommendations' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'MabFileFolderProtectedItemExtendedInfo' => ['properties' => [
                'lastRefreshedAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'oldestRecoveryPoint' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'recoveryPointCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'MabFileFolderProtectedItem' => ['properties' => [
                'friendlyName' => ['type' => 'string'],
                'computerName' => ['type' => 'string'],
                'lastBackupStatus' => ['type' => 'string'],
                'protectionState' => ['type' => 'string'],
                'isScheduledForDeferredDelete' => ['type' => 'boolean'],
                'deferredDeleteSyncTimeInUTC' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'extendedInfo' => ['$ref' => '#/definitions/MabFileFolderProtectedItemExtendedInfo']
            ]],
            'MabJobTaskDetails' => ['properties' => [
                'taskId' => ['type' => 'string'],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'duration' => [
                    'type' => 'string',
                    'format' => 'duration'
                ],
                'status' => ['type' => 'string']
            ]],
            'MabJobExtendedInfo' => ['properties' => [
                'tasksList' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/MabJobTaskDetails']
                ],
                'propertyBag' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'dynamicErrorMessage' => ['type' => 'string']
            ]],
            'MabJob' => ['properties' => [
                'duration' => [
                    'type' => 'string',
                    'format' => 'duration'
                ],
                'actionsInfo' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'Invalid',
                            'Cancellable',
                            'Retriable'
                        ]
                    ]
                ],
                'mabServerName' => ['type' => 'string'],
                'mabServerType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'Unknown',
                        'IaasVMContainer',
                        'IaasVMServiceContainer',
                        'DPMContainer',
                        'AzureBackupServerContainer',
                        'MABContainer',
                        'Cluster',
                        'AzureSqlContainer',
                        'Windows',
                        'VCenter'
                    ]
                ],
                'workloadType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'VM',
                        'FileFolder',
                        'AzureSqlDb',
                        'SQLDB',
                        'Exchange',
                        'Sharepoint',
                        'VMwareVM',
                        'SystemState',
                        'Client',
                        'GenericDataSource'
                    ]
                ],
                'errorDetails' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/MabErrorInfo']
                ],
                'extendedInfo' => ['$ref' => '#/definitions/MabJobExtendedInfo']
            ]],
            'MAB' => ['properties' => [
                'schedulePolicy' => ['$ref' => '#/definitions/SchedulePolicy'],
                'retentionPolicy' => ['$ref' => '#/definitions/RetentionPolicy']
            ]],
            'OperationResultInfo' => ['properties' => ['jobList' => [
                'type' => 'array',
                'items' => ['type' => 'string']
            ]]],
            'OperationResultInfoBase' => ['properties' => []],
            'OperationResultInfoBaseResource' => ['properties' => ['operation' => ['$ref' => '#/definitions/OperationResultInfoBase']]],
            'OperationStatusError' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string']
            ]],
            'OperationStatusExtendedInfo' => ['properties' => []],
            'OperationStatus' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'InProgress',
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
                'error' => ['$ref' => '#/definitions/OperationStatusError'],
                'properties' => ['$ref' => '#/definitions/OperationStatusExtendedInfo']
            ]],
            'OperationStatusJobExtendedInfo' => ['properties' => ['jobId' => ['type' => 'string']]],
            'OperationStatusJobsExtendedInfo' => ['properties' => [
                'jobIds' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'failedJobsError' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'OperationStatusProvisionILRExtendedInfo' => ['properties' => ['recoveryTarget' => ['$ref' => '#/definitions/InstantItemRecoveryTarget']]],
            'OperationWorkerResponse' => ['properties' => [
                'statusCode' => [
                    'type' => 'string',
                    'enum' => [
                        'Continue',
                        'SwitchingProtocols',
                        'OK',
                        'Created',
                        'Accepted',
                        'NonAuthoritativeInformation',
                        'NoContent',
                        'ResetContent',
                        'PartialContent',
                        'MultipleChoices',
                        'Ambiguous',
                        'MovedPermanently',
                        'Moved',
                        'Found',
                        'Redirect',
                        'SeeOther',
                        'RedirectMethod',
                        'NotModified',
                        'UseProxy',
                        'Unused',
                        'TemporaryRedirect',
                        'RedirectKeepVerb',
                        'BadRequest',
                        'Unauthorized',
                        'PaymentRequired',
                        'Forbidden',
                        'NotFound',
                        'MethodNotAllowed',
                        'NotAcceptable',
                        'ProxyAuthenticationRequired',
                        'RequestTimeout',
                        'Conflict',
                        'Gone',
                        'LengthRequired',
                        'PreconditionFailed',
                        'RequestEntityTooLarge',
                        'RequestUriTooLong',
                        'UnsupportedMediaType',
                        'RequestedRangeNotSatisfiable',
                        'ExpectationFailed',
                        'UpgradeRequired',
                        'InternalServerError',
                        'NotImplemented',
                        'BadGateway',
                        'ServiceUnavailable',
                        'GatewayTimeout',
                        'HttpVersionNotSupported'
                    ]
                ],
                'Headers' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ]
            ]],
            'ProtectedItem' => ['properties' => [
                'backupManagementType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'AzureIaasVM',
                        'MAB',
                        'DPM',
                        'AzureBackupServer',
                        'AzureSql'
                    ]
                ],
                'workloadType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'VM',
                        'FileFolder',
                        'AzureSqlDb',
                        'SQLDB',
                        'Exchange',
                        'Sharepoint',
                        'VMwareVM',
                        'SystemState',
                        'Client',
                        'GenericDataSource'
                    ]
                ],
                'containerName' => ['type' => 'string'],
                'sourceResourceId' => ['type' => 'string'],
                'policyId' => ['type' => 'string'],
                'lastRecoveryPoint' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'ProtectedItemQueryObject' => ['properties' => [
                'healthState' => [
                    'type' => 'string',
                    'enum' => [
                        'Passed',
                        'ActionRequired',
                        'ActionSuggested',
                        'Invalid'
                    ]
                ],
                'backupManagementType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'AzureIaasVM',
                        'MAB',
                        'DPM',
                        'AzureBackupServer',
                        'AzureSql'
                    ]
                ],
                'itemType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'VM',
                        'FileFolder',
                        'AzureSqlDb',
                        'SQLDB',
                        'Exchange',
                        'Sharepoint',
                        'VMwareVM',
                        'SystemState',
                        'Client',
                        'GenericDataSource'
                    ]
                ],
                'policyName' => ['type' => 'string'],
                'containerName' => ['type' => 'string'],
                'backupEngineName' => ['type' => 'string'],
                'friendlyName' => ['type' => 'string']
            ]],
            'ProtectedItemResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/ProtectedItem']]],
            'ProtectedItemResourceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ProtectedItemResource']
            ]]],
            'ProtectionContainer' => ['properties' => [
                'friendlyName' => ['type' => 'string'],
                'backupManagementType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'AzureIaasVM',
                        'MAB',
                        'DPM',
                        'AzureBackupServer',
                        'AzureSql'
                    ]
                ],
                'registrationStatus' => ['type' => 'string'],
                'healthStatus' => ['type' => 'string'],
                'containerType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'Unknown',
                        'IaasVMContainer',
                        'IaasVMServiceContainer',
                        'DPMContainer',
                        'AzureBackupServerContainer',
                        'MABContainer',
                        'Cluster',
                        'AzureSqlContainer',
                        'Windows',
                        'VCenter'
                    ]
                ]
            ]],
            'ProtectionContainerResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/ProtectionContainer']]],
            'ProtectionContainerResourceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ProtectionContainerResource']
            ]]],
            'ProtectionPolicy' => ['properties' => ['protectedItemsCount' => [
                'type' => 'integer',
                'format' => 'int32'
            ]]],
            'ProtectionPolicyQueryObject' => ['properties' => ['backupManagementType' => [
                'type' => 'string',
                'enum' => [
                    'Invalid',
                    'AzureIaasVM',
                    'MAB',
                    'DPM',
                    'AzureBackupServer',
                    'AzureSql'
                ]
            ]]],
            'ProtectionPolicyResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/ProtectionPolicy']]],
            'ProtectionPolicyResourceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ProtectionPolicyResource']
            ]]],
            'RecoveryPoint' => ['properties' => []],
            'RecoveryPointResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/RecoveryPoint']]],
            'RecoveryPointResourceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/RecoveryPointResource']
            ]]],
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'eTag' => ['type' => 'string']
            ]],
            'ResourceList' => ['properties' => ['nextLink' => ['type' => 'string']]],
            'RestoreRequest' => ['properties' => []],
            'RestoreRequestResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/RestoreRequest']]],
            'SimpleRetentionPolicy' => ['properties' => ['retentionDuration' => ['$ref' => '#/definitions/RetentionDuration']]],
            'SimpleSchedulePolicy' => ['properties' => [
                'scheduleRunFrequency' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'Daily',
                        'Weekly'
                    ]
                ],
                'scheduleRunDays' => [
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
                ],
                'scheduleRunTimes' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'scheduleWeeklyFrequency' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'TokenInformation' => ['properties' => [
                'token' => ['type' => 'string'],
                'expiryTimeInUtcTicks' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'securityPIN' => ['type' => 'string']
            ]],
            'WorkloadProtectableItem' => ['properties' => [
                'backupManagementType' => ['type' => 'string'],
                'friendlyName' => ['type' => 'string'],
                'protectionState' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'NotProtected',
                        'Protecting',
                        'Protected'
                    ]
                ]
            ]],
            'WorkloadProtectableItemResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/WorkloadProtectableItem']]],
            'WorkloadProtectableItemResourceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/WorkloadProtectableItemResource']
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
                'blobDuration' => ['type' => 'string']
            ]],
            'ClientDiscoveryForServiceSpecification' => ['properties' => ['logSpecifications' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ClientDiscoveryForLogSpecification']
            ]]],
            'ClientDiscoveryForProperties' => ['properties' => ['serviceSpecification' => ['$ref' => '#/definitions/ClientDiscoveryForServiceSpecification']]],
            'ClientDiscoveryValueForSingleApi' => ['properties' => [
                'Name' => ['type' => 'string'],
                'Display' => ['$ref' => '#/definitions/ClientDiscoveryDisplay'],
                'Origin' => ['type' => 'string'],
                'Properties' => ['$ref' => '#/definitions/ClientDiscoveryForProperties']
            ]],
            'ClientDiscoveryResponse' => ['properties' => [
                'Value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ClientDiscoveryValueForSingleApi']
                ],
                'NextLink' => ['type' => 'string']
            ]]
        ]
    ];
}
