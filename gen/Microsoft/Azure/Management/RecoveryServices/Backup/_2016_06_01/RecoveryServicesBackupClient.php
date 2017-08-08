<?php
namespace Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01;
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
        $this->_ItemLevelRecoveryConnections_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ItemLevelRecoveryConnections($_client);
        $this->_Restores_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\Restores($_client);
        $this->_ProtectionPolicyOperationStatuses_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionPolicyOperationStatuses($_client);
        $this->_ProtectionPolicyOperationResults_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionPolicyOperationResults($_client);
        $this->_ProtectionPolicies_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionPolicies($_client);
        $this->_ProtectionContainerOperationResults_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionContainerOperationResults($_client);
        $this->_ProtectionContainerRefreshOperationResults_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionContainerRefreshOperationResults($_client);
        $this->_ProtectionContainers_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionContainers($_client);
        $this->_RecoveryPoints_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\RecoveryPoints($_client);
        $this->_Backups_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\Backups($_client);
        $this->_ProtectedItemOperationStatuses_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectedItemOperationStatuses($_client);
        $this->_ProtectedItemOperationResults_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectedItemOperationResults($_client);
        $this->_ProtectedItems_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectedItems($_client);
        $this->_ProtectableItems_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectableItems($_client);
        $this->_ExportJobsOperationResults_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ExportJobsOperationResults($_client);
        $this->_JobOperationResults_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\JobOperationResults($_client);
        $this->_Jobs_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\Jobs($_client);
        $this->_JobCancellations_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\JobCancellations($_client);
        $this->_JobDetails_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\JobDetails($_client);
        $this->_BackupOperationStatuses_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\BackupOperationStatuses($_client);
        $this->_BackupOperationResults_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\BackupOperationResults($_client);
        $this->_BackupEngines_group = new \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\BackupEngines($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ItemLevelRecoveryConnections
     */
    public function getItemLevelRecoveryConnections()
    {
        return $this->_ItemLevelRecoveryConnections_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\Restores
     */
    public function getRestores()
    {
        return $this->_Restores_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionPolicyOperationStatuses
     */
    public function getProtectionPolicyOperationStatuses()
    {
        return $this->_ProtectionPolicyOperationStatuses_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionPolicyOperationResults
     */
    public function getProtectionPolicyOperationResults()
    {
        return $this->_ProtectionPolicyOperationResults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionPolicies
     */
    public function getProtectionPolicies()
    {
        return $this->_ProtectionPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionContainerOperationResults
     */
    public function getProtectionContainerOperationResults()
    {
        return $this->_ProtectionContainerOperationResults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionContainerRefreshOperationResults
     */
    public function getProtectionContainerRefreshOperationResults()
    {
        return $this->_ProtectionContainerRefreshOperationResults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionContainers
     */
    public function getProtectionContainers()
    {
        return $this->_ProtectionContainers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\RecoveryPoints
     */
    public function getRecoveryPoints()
    {
        return $this->_RecoveryPoints_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\Backups
     */
    public function getBackups()
    {
        return $this->_Backups_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectedItemOperationStatuses
     */
    public function getProtectedItemOperationStatuses()
    {
        return $this->_ProtectedItemOperationStatuses_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectedItemOperationResults
     */
    public function getProtectedItemOperationResults()
    {
        return $this->_ProtectedItemOperationResults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectedItems
     */
    public function getProtectedItems()
    {
        return $this->_ProtectedItems_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectableItems
     */
    public function getProtectableItems()
    {
        return $this->_ProtectableItems_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ExportJobsOperationResults
     */
    public function getExportJobsOperationResults()
    {
        return $this->_ExportJobsOperationResults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\JobOperationResults
     */
    public function getJobOperationResults()
    {
        return $this->_JobOperationResults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\Jobs
     */
    public function getJobs()
    {
        return $this->_Jobs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\JobCancellations
     */
    public function getJobCancellations()
    {
        return $this->_JobCancellations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\JobDetails
     */
    public function getJobDetails()
    {
        return $this->_JobDetails_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\BackupOperationStatuses
     */
    public function getBackupOperationStatuses()
    {
        return $this->_BackupOperationStatuses_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\BackupOperationResults
     */
    public function getBackupOperationResults()
    {
        return $this->_BackupOperationResults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\BackupEngines
     */
    public function getBackupEngines()
    {
        return $this->_BackupEngines_group;
    }
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ItemLevelRecoveryConnections
     */
    private $_ItemLevelRecoveryConnections_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\Restores
     */
    private $_Restores_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionPolicyOperationStatuses
     */
    private $_ProtectionPolicyOperationStatuses_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionPolicyOperationResults
     */
    private $_ProtectionPolicyOperationResults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionPolicies
     */
    private $_ProtectionPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionContainerOperationResults
     */
    private $_ProtectionContainerOperationResults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionContainerRefreshOperationResults
     */
    private $_ProtectionContainerRefreshOperationResults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectionContainers
     */
    private $_ProtectionContainers_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\RecoveryPoints
     */
    private $_RecoveryPoints_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\Backups
     */
    private $_Backups_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectedItemOperationStatuses
     */
    private $_ProtectedItemOperationStatuses_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectedItemOperationResults
     */
    private $_ProtectedItemOperationResults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectedItems
     */
    private $_ProtectedItems_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ProtectableItems
     */
    private $_ProtectableItems_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\ExportJobsOperationResults
     */
    private $_ExportJobsOperationResults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\JobOperationResults
     */
    private $_JobOperationResults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\Jobs
     */
    private $_Jobs_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\JobCancellations
     */
    private $_JobCancellations_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\JobDetails
     */
    private $_JobDetails_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\BackupOperationStatuses
     */
    private $_BackupOperationStatuses_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\BackupOperationResults
     */
    private $_BackupOperationResults_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\Backup\_2016_06_01\BackupEngines
     */
    private $_BackupEngines_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/recoveryPoints/{recoveryPointId}/revokeInstantItemRecovery' => ['post' => [
                'operationId' => 'ItemLevelRecoveryConnections_Revoke',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/recoveryPoints/{recoveryPointId}/provisionInstantItemRecovery' => ['post' => [
                'operationId' => 'ItemLevelRecoveryConnections_Provision',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
                        'name' => 'resourceILRRequest',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/ILRRequestResource'
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
                        'enum' => ['2016-06-01']
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
                        'name' => 'resourceRestoreRequest',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/RestoreRequestResource'
                    ]
                ],
                'responses' => ['202' => []]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupPolicies/{policyName}/operations/{operationId}' => ['get' => [
                'operationId' => 'ProtectionPolicyOperationStatuses_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupPolicies/{policyName}/operationResults/{operationId}' => ['get' => [
                'operationId' => 'ProtectionPolicyOperationResults_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupPolicies/{policyName}' => [
                'get' => [
                    'operationId' => 'ProtectionPolicies_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
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
                            'enum' => ['2016-06-01']
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
                            'name' => 'resourceProtectionPolicy',
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
                            'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupPolicies' => ['get' => [
                'operationId' => 'ProtectionPolicies_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/operationResults/{operationId}' => ['get' => [
                'operationId' => 'ProtectionContainerOperationResults_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/operationResults/{operationId}' => ['get' => [
                'operationId' => 'ProtectionContainerRefreshOperationResults_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupProtectionContainers' => ['get' => [
                'operationId' => 'ProtectionContainers_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/refreshContainers' => ['post' => [
                'operationId' => 'ProtectionContainers_Refresh',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/registeredIdentities/{identityName}' => ['delete' => [
                'operationId' => 'ProtectionContainers_Unregister',
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
                        'name' => 'identityName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['204' => []]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/recoveryPoints/{recoveryPointId}' => ['get' => [
                'operationId' => 'RecoveryPoints_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/recoveryPoints' => ['get' => [
                'operationId' => 'RecoveryPoints_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/backup' => ['post' => [
                'operationId' => 'Backups_Trigger',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
                        'name' => 'resourceBackupRequest',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/BackupRequestResource'
                    ]
                ],
                'responses' => ['202' => []]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/operationsStatus/{operationId}' => ['get' => [
                'operationId' => 'ProtectedItemOperationStatuses_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}/operationResults/{operationId}' => ['get' => [
                'operationId' => 'ProtectedItemOperationResults_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupProtectedItems' => ['get' => [
                'operationId' => 'ProtectedItems_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupFabrics/{fabricName}/protectionContainers/{containerName}/protectedItems/{protectedItemName}' => [
                'get' => [
                    'operationId' => 'ProtectedItems_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-06-01']
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
                            'enum' => ['2016-06-01']
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
                            'name' => 'resourceProtectedItem',
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
                            'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupProtectableItems' => ['get' => [
                'operationId' => 'ProtectableItems_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupJobs/operationResults/{operationId}' => ['get' => [
                'operationId' => 'ExportJobsOperationResults_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupJobs/{jobName}/operationResults/{operationId}' => ['get' => [
                'operationId' => 'JobOperationResults_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupJobsExport' => ['post' => [
                'operationId' => 'Jobs_Export',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupJobs' => ['get' => [
                'operationId' => 'Jobs_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupJobs/{jobName}/cancel' => ['post' => [
                'operationId' => 'JobCancellations_Trigger',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupJobs/{jobName}' => ['get' => [
                'operationId' => 'JobDetails_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupOperations/{operationId}' => ['get' => [
                'operationId' => 'BackupOperationStatuses_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupOperationResults/{operationId}' => ['get' => [
                'operationId' => 'BackupOperationResults_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{vaultName}/backupEngines' => ['get' => [
                'operationId' => 'BackupEngines_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-06-01']
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
            ]]
        ],
        'definitions' => [
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
            'JobResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/Job']]],
            'JobResourceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/JobResource']
            ]]],
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
                'healthStatus' => ['type' => 'string'],
                'canReRegister' => ['type' => 'boolean'],
                'backupEngineId' => ['type' => 'string']
            ]],
            'BMSBackupEngineQueryObject' => ['properties' => ['backupManagementType' => [
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
            'OperationResultInfoBase' => ['properties' => []],
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
                        'DPMUnknown'
                    ]
                ],
                'sourceResourceId' => ['type' => 'string'],
                'policyId' => ['type' => 'string'],
                'lastRecoveryPoint' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'ProtectedItemResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/ProtectedItem']]],
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
            'ProtectedItemResourceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ProtectedItemResource']
            ]]],
            'GetProtectedItemQueryObject' => ['properties' => ['expand' => ['type' => 'string']]],
            'BackupRequest' => ['properties' => []],
            'BackupRequestResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/BackupRequest']]],
            'ProtectedItemQueryObject' => ['properties' => [
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
                        'DPMUnknown'
                    ]
                ],
                'policyName' => ['type' => 'string'],
                'containerName' => ['type' => 'string']
            ]],
            'RecoveryPoint' => ['properties' => []],
            'RecoveryPointResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/RecoveryPoint']]],
            'RecoveryPointResourceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/RecoveryPointResource']
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
                'containerType' => ['type' => 'string']
            ]],
            'ProtectionContainerResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/ProtectionContainer']]],
            'ProtectionContainerResourceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ProtectionContainerResource']
            ]]],
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
            'ProtectionPolicy' => ['properties' => ['protectedItemsCount' => [
                'type' => 'integer',
                'format' => 'int32'
            ]]],
            'ProtectionPolicyResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/ProtectionPolicy']]],
            'ProtectionPolicyResourceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ProtectionPolicyResource']
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
                'status' => ['type' => 'string'],
                'friendlyName' => ['type' => 'string']
            ]],
            'RestoreRequest' => ['properties' => []],
            'RestoreRequestResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/RestoreRequest']]],
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
            'ILRRequest' => ['properties' => []],
            'ILRRequestResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/ILRRequest']]],
            'AzureBackupServerEngine' => ['properties' => []],
            'DpmBackupEngine' => ['properties' => []],
            'AzureSqlContainer' => ['properties' => []],
            'IaaSVMContainer' => ['properties' => [
                'virtualMachineId' => ['type' => 'string'],
                'virtualMachineVersion' => ['type' => 'string'],
                'resourceGroup' => ['type' => 'string']
            ]],
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
                        'DPMUnknown'
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
            'IaaSVMProtectableItem' => ['properties' => ['virtualMachineId' => ['type' => 'string']]],
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
                'lastBackupStatus' => ['type' => 'string'],
                'lastBackupTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'extendedInfo' => ['$ref' => '#/definitions/AzureIaaSVMProtectedItemExtendedInfo']
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
                'extendedInfo' => ['$ref' => '#/definitions/MabFileFolderProtectedItemExtendedInfo']
            ]],
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
            'IaasVMBackupRequest' => ['properties' => ['recoveryPointExpiryTimeInUTC' => [
                'type' => 'string',
                'format' => 'date-time'
            ]]],
            'SchedulePolicy' => ['properties' => []],
            'RetentionPolicy' => ['properties' => []],
            'AzureIaasVM' => ['properties' => [
                'schedulePolicy' => ['$ref' => '#/definitions/SchedulePolicy'],
                'retentionPolicy' => ['$ref' => '#/definitions/RetentionPolicy']
            ]],
            'MAB' => ['properties' => [
                'schedulePolicy' => ['$ref' => '#/definitions/SchedulePolicy'],
                'retentionPolicy' => ['$ref' => '#/definitions/RetentionPolicy']
            ]],
            'AzureSql' => ['properties' => ['retentionPolicy' => ['$ref' => '#/definitions/RetentionPolicy']]],
            'KEKDetails' => ['properties' => [
                'keyUrl' => ['type' => 'string'],
                'keyVaultId' => ['type' => 'string'],
                'keyBackupData' => ['type' => 'string']
            ]],
            'BEKDetails' => ['properties' => [
                'secretUrl' => ['type' => 'string'],
                'secretVaultId' => ['type' => 'string'],
                'secretData' => ['type' => 'string']
            ]],
            'KeyAndSecretDetails' => ['properties' => [
                'kekDetails' => ['$ref' => '#/definitions/KEKDetails'],
                'bekDetails' => ['$ref' => '#/definitions/BEKDetails']
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
                'isInstantILRSessionActive' => ['type' => 'boolean']
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
            'EncryptionDetails' => ['properties' => [
                'encryptionEnabled' => ['type' => 'boolean'],
                'kekUrl' => ['type' => 'string'],
                'secretKeyUrl' => ['type' => 'string'],
                'kekVaultId' => ['type' => 'string'],
                'secretKeyVaultId' => ['type' => 'string']
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
            'IaasVMILRRegistrationRequest' => ['properties' => [
                'recoveryPointId' => ['type' => 'string'],
                'virtualMachineId' => ['type' => 'string'],
                'initiatorName' => ['type' => 'string'],
                'renewExistingRegistration' => ['type' => 'boolean']
            ]],
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
            'MabErrorInfo' => ['properties' => [
                'errorString' => ['type' => 'string'],
                'recommendations' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
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
                        'DPMVenusContainer',
                        'MABContainer',
                        'ClusterResource',
                        'AzureSqlContainer',
                        'WindowsServer',
                        'Windows'
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
                        'DPMUnknown'
                    ]
                ],
                'errorDetails' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/MabErrorInfo']
                ],
                'extendedInfo' => ['$ref' => '#/definitions/MabJobExtendedInfo']
            ]],
            'OperationResultInfo' => ['properties' => ['jobList' => [
                'type' => 'array',
                'items' => ['type' => 'string']
            ]]],
            'ExportJobsOperationResultInfo' => ['properties' => [
                'blobUrl' => ['type' => 'string'],
                'blobSasKey' => ['type' => 'string']
            ]],
            'Microsoft.Compute/virtualMachines' => ['properties' => []],
            'Microsoft.ClassicCompute/virtualMachines' => ['properties' => []],
            'Microsoft.Compute/virtualMachines' => ['properties' => []],
            'Microsoft.ClassicCompute/virtualMachines' => ['properties' => []],
            'Microsoft.Compute/virtualMachines' => ['properties' => []],
            'Microsoft.ClassicCompute/virtualMachines' => ['properties' => []],
            'OperationStatusJobExtendedInfo' => ['properties' => ['jobId' => ['type' => 'string']]],
            'ClientScriptForConnect' => ['properties' => [
                'scriptContent' => ['type' => 'string'],
                'scriptExtension' => ['type' => 'string'],
                'osType' => ['type' => 'string']
            ]],
            'InstantItemRecoveryTarget' => ['properties' => ['clientScripts' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ClientScriptForConnect']
            ]]],
            'OperationStatusProvisionILRExtendedInfo' => ['properties' => ['recoveryTarget' => ['$ref' => '#/definitions/InstantItemRecoveryTarget']]],
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
            'LongTermSchedulePolicy' => ['properties' => []],
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
            'SimpleRetentionPolicy' => ['properties' => ['retentionDuration' => ['$ref' => '#/definitions/RetentionDuration']]],
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
            'ResourceList' => ['properties' => ['nextLink' => ['type' => 'string']]],
            'BackupEngineBaseResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/BackupEngineBase']]],
            'BackupEngineBaseResourceList' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/BackupEngineBaseResource']
            ]]],
            'OperationResultInfoBaseResource' => ['properties' => ['properties' => ['$ref' => '#/definitions/OperationResultInfoBase']]]
        ]
    ];
}
