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
        $this->_BackupJobs_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\BackupJobs($_client);
        $this->_JobDetails_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\JobDetails($_client);
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
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\BackupJobs
     */
    private $_BackupJobs_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\JobDetails
     */
    private $_JobDetails_group;
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupJobs' => ['get' => [
                'operationId' => 'BackupJobs_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-07-01']
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
                        'enum' => ['2017-07-01']
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
                            'schema' => ['$ref' => '#/definitions/BackupResourceVaultConfigResource']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupResourceVaultConfigResource']]]
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
                            'schema' => ['$ref' => '#/definitions/ProtectedItemResource']
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
                        'schema' => ['$ref' => '#/definitions/BackupRequestResource']
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
                        'schema' => ['$ref' => '#/definitions/ILRRequestResource']
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
                        'schema' => ['$ref' => '#/definitions/RestoreRequestResource']
                    ]
                ],
                'responses' => ['202' => []]
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
                            'schema' => ['$ref' => '#/definitions/ProtectionPolicyResource']
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
            'AzureIaaSVMErrorInfo' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureIaaSVMJobTaskDetails' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureIaaSVMJobExtendedInfo' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureIaaSVMJob' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DpmErrorInfo' => [
                'properties' => [
                    'errorString' => ['type' => 'string'],
                    'recommendations' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DpmJobTaskDetails' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DpmJobExtendedInfo' => [
                'properties' => [
                    'tasksList' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DpmJobTaskDetails']
                    ],
                    'propertyBag' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'dynamicErrorMessage' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DpmJob' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Job' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'JobQueryObject' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'JobResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/Job']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'JobResourceList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/JobResource']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MabErrorInfo' => [
                'properties' => [
                    'errorString' => ['type' => 'string'],
                    'recommendations' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MabJobTaskDetails' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MabJobExtendedInfo' => [
                'properties' => [
                    'tasksList' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/MabJobTaskDetails']
                    ],
                    'propertyBag' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'dynamicErrorMessage' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MabJob' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
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
                    ],
                    'eTag' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ResourceList' => [
                'properties' => ['nextLink' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DPMContainerExtendedInfo' => [
                'properties' => ['lastRefreshedAt' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureBackupServerContainer' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureBackupServerEngine' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.ClassicCompute/virtualMachines' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.ClassicCompute/virtualMachines' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.ClassicCompute/virtualMachines' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Compute/virtualMachines' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Compute/virtualMachines' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Compute/virtualMachines' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureIaaSVMHealthDetails' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureIaaSVMProtectedItemExtendedInfo' => [
                'properties' => [
                    'oldestRecoveryPoint' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'recoveryPointCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'policyInconsistent' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureIaaSVMProtectedItem' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SchedulePolicy' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RetentionPolicy' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureIaasVM' => [
                'properties' => [
                    'schedulePolicy' => ['$ref' => '#/definitions/SchedulePolicy'],
                    'retentionPolicy' => ['$ref' => '#/definitions/RetentionPolicy'],
                    'timeZone' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureSqlContainer' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureSqlProtectedItemExtendedInfo' => [
                'properties' => [
                    'oldestRecoveryPoint' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'recoveryPointCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'policyState' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Sql/servers/databases' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AzureSql' => [
                'properties' => ['retentionPolicy' => ['$ref' => '#/definitions/RetentionPolicy']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupEngineExtendedInfo' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupEngineBase' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupEngineBaseResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BackupEngineBase']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupEngineBaseResourceList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/BackupEngineBaseResource']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'NameInfo' => [
                'properties' => [
                    'value' => ['type' => 'string'],
                    'localizedValue' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupManagementUsage' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupManagementUsageList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/BackupManagementUsage']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupRequest' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupRequestResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BackupRequest']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupResourceConfig' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupResourceConfigResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BackupResourceConfig']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupResourceVaultConfig' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BackupResourceVaultConfigResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/BackupResourceVaultConfig']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BEKDetails' => [
                'properties' => [
                    'secretUrl' => ['type' => 'string'],
                    'secretVaultId' => ['type' => 'string'],
                    'secretData' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BMSBackupEngineQueryObject' => [
                'properties' => ['expand' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BMSBackupEnginesQueryObject' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BMSBackupSummariesQueryObject' => [
                'properties' => ['type' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'BackupProtectedItemCountSummary',
                        'BackupProtectionContainerCountSummary'
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BMSContainerQueryObject' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => ['backupManagementType']
            ],
            'BMSPOQueryObject' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'BMSRPQueryObject' => [
                'properties' => [
                    'startDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'endDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClientScriptForConnect' => [
                'properties' => [
                    'scriptContent' => ['type' => 'string'],
                    'scriptExtension' => ['type' => 'string'],
                    'osType' => ['type' => 'string'],
                    'url' => ['type' => 'string'],
                    'scriptNameSuffix' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Day' => [
                'properties' => [
                    'date' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'isLast' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DailyRetentionFormat' => [
                'properties' => ['daysOfTheMonth' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Day']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RetentionDuration' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DailyRetentionSchedule' => [
                'properties' => [
                    'retentionTimes' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'format' => 'date-time'
                        ]
                    ],
                    'retentionDuration' => ['$ref' => '#/definitions/RetentionDuration']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DpmBackupEngine' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DPMContainer' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DPMProtectedItemExtendedInfo' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'DPMProtectedItem' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EncryptionDetails' => [
                'properties' => [
                    'encryptionEnabled' => ['type' => 'boolean'],
                    'kekUrl' => ['type' => 'string'],
                    'secretKeyUrl' => ['type' => 'string'],
                    'kekVaultId' => ['type' => 'string'],
                    'secretKeyVaultId' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ExportJobsOperationResultInfo' => [
                'properties' => [
                    'blobUrl' => ['type' => 'string'],
                    'blobSasKey' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GenericRecoveryPoint' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'recoveryPointType' => ['type' => 'string'],
                    'recoveryPointTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'recoveryPointAdditionalInfo' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'GetProtectedItemQueryObject' => [
                'properties' => ['expand' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IaasVMBackupRequest' => [
                'properties' => ['recoveryPointExpiryTimeInUTC' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IaaSVMContainer' => [
                'properties' => [
                    'virtualMachineId' => ['type' => 'string'],
                    'virtualMachineVersion' => ['type' => 'string'],
                    'resourceGroup' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IaasVMILRRegistrationRequest' => [
                'properties' => [
                    'recoveryPointId' => ['type' => 'string'],
                    'virtualMachineId' => ['type' => 'string'],
                    'initiatorName' => ['type' => 'string'],
                    'renewExistingRegistration' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IaaSVMProtectableItem' => [
                'properties' => ['virtualMachineId' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'KEKDetails' => [
                'properties' => [
                    'keyUrl' => ['type' => 'string'],
                    'keyVaultId' => ['type' => 'string'],
                    'keyBackupData' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'KeyAndSecretDetails' => [
                'properties' => [
                    'kekDetails' => ['$ref' => '#/definitions/KEKDetails'],
                    'bekDetails' => ['$ref' => '#/definitions/BEKDetails']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RecoveryPointTierInformation' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IaasVMRecoveryPoint' => [
                'properties' => [
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
                    'virtualMachineSize' => ['type' => 'string'],
                    'originalStorageAccountOption' => ['type' => 'boolean']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IaasVMRestoreRequest' => [
                'properties' => [
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
                    'originalStorageAccountOption' => ['type' => 'boolean'],
                    'encryptionDetails' => ['$ref' => '#/definitions/EncryptionDetails']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ILRRequest' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ILRRequestResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ILRRequest']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'InstantItemRecoveryTarget' => [
                'properties' => ['clientScripts' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ClientScriptForConnect']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'WeeklyRetentionSchedule' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'WeeklyRetentionFormat' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MonthlyRetentionSchedule' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'YearlyRetentionSchedule' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LongTermRetentionPolicy' => [
                'properties' => [
                    'dailySchedule' => ['$ref' => '#/definitions/DailyRetentionSchedule'],
                    'weeklySchedule' => ['$ref' => '#/definitions/WeeklyRetentionSchedule'],
                    'monthlySchedule' => ['$ref' => '#/definitions/MonthlyRetentionSchedule'],
                    'yearlySchedule' => ['$ref' => '#/definitions/YearlyRetentionSchedule']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LongTermSchedulePolicy' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MabContainerExtendedInfo' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MABWindowsContainer' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MabFileFolderProtectedItemExtendedInfo' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MabFileFolderProtectedItem' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'MAB' => [
                'properties' => [
                    'schedulePolicy' => ['$ref' => '#/definitions/SchedulePolicy'],
                    'retentionPolicy' => ['$ref' => '#/definitions/RetentionPolicy']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationResultInfo' => [
                'properties' => ['jobList' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationResultInfoBase' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationResultInfoBaseResource' => [
                'properties' => ['operation' => ['$ref' => '#/definitions/OperationResultInfoBase']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationStatusError' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationStatusExtendedInfo' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationStatus' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationStatusJobExtendedInfo' => [
                'properties' => ['jobId' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationStatusJobsExtendedInfo' => [
                'properties' => [
                    'jobIds' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'failedJobsError' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationStatusProvisionILRExtendedInfo' => [
                'properties' => ['recoveryTarget' => ['$ref' => '#/definitions/InstantItemRecoveryTarget']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'OperationWorkerResponse' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProtectedItem' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProtectedItemQueryObject' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProtectedItemResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ProtectedItem']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProtectedItemResourceList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ProtectedItemResource']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProtectionContainer' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProtectionContainerResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ProtectionContainer']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProtectionContainerResourceList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ProtectionContainerResource']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProtectionPolicy' => [
                'properties' => ['protectedItemsCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProtectionPolicyQueryObject' => [
                'properties' => ['backupManagementType' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'AzureIaasVM',
                        'MAB',
                        'DPM',
                        'AzureBackupServer',
                        'AzureSql'
                    ]
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProtectionPolicyResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ProtectionPolicy']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ProtectionPolicyResourceList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ProtectionPolicyResource']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RecoveryPoint' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RecoveryPointResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RecoveryPoint']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RecoveryPointResourceList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RecoveryPointResource']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RestoreRequest' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RestoreRequestResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RestoreRequest']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SimpleRetentionPolicy' => [
                'properties' => ['retentionDuration' => ['$ref' => '#/definitions/RetentionDuration']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'SimpleSchedulePolicy' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'TokenInformation' => [
                'properties' => [
                    'token' => ['type' => 'string'],
                    'expiryTimeInUtcTicks' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'securityPIN' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'WorkloadProtectableItem' => [
                'properties' => [
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
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'WorkloadProtectableItemResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/WorkloadProtectableItem']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'WorkloadProtectableItemResourceList' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/WorkloadProtectableItemResource']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClientDiscoveryDisplay' => [
                'properties' => [
                    'Provider' => ['type' => 'string'],
                    'Resource' => ['type' => 'string'],
                    'Operation' => ['type' => 'string'],
                    'Description' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClientDiscoveryForLogSpecification' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'displayName' => ['type' => 'string'],
                    'blobDuration' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClientDiscoveryForServiceSpecification' => [
                'properties' => ['logSpecifications' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ClientDiscoveryForLogSpecification']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClientDiscoveryForProperties' => [
                'properties' => ['serviceSpecification' => ['$ref' => '#/definitions/ClientDiscoveryForServiceSpecification']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClientDiscoveryValueForSingleApi' => [
                'properties' => [
                    'Name' => ['type' => 'string'],
                    'Display' => ['$ref' => '#/definitions/ClientDiscoveryDisplay'],
                    'Origin' => ['type' => 'string'],
                    'Properties' => ['$ref' => '#/definitions/ClientDiscoveryForProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ClientDiscoveryResponse' => [
                'properties' => [
                    'Value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ClientDiscoveryValueForSingleApi']
                    ],
                    'NextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
