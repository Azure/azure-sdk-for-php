<?php
namespace Microsoft\Azure\Management\RecoveryServices\SiteRecovery;
final class SiteRecoveryManagementClient
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
        $this->_ReplicationProtectedItems_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationProtectedItems($_client);
        $this->_ReplicationNetworkMappings_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationNetworkMappings($_client);
        $this->_ReplicationFabrics_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationFabrics($_client);
        $this->_ReplicationvCenters_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationvCenters($_client);
        $this->_ReplicationStorageClassificationMappings_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationStorageClassificationMappings($_client);
        $this->_ReplicationStorageClassifications_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationStorageClassifications($_client);
        $this->_ReplicationRecoveryServicesProviders_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationRecoveryServicesProviders($_client);
        $this->_RecoveryPoints_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\RecoveryPoints($_client);
        $this->_ReplicationRecoveryPlans_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationRecoveryPlans($_client);
        $this->_ReplicationProtectionContainers_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationProtectionContainers($_client);
        $this->_ReplicationProtectionContainerMappings_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationProtectionContainerMappings($_client);
        $this->_ReplicationProtectableItems_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationProtectableItems($_client);
        $this->_ReplicationPolicies_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationPolicies($_client);
        $this->_Operations_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\Operations($_client);
        $this->_ReplicationNetworks_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationNetworks($_client);
        $this->_ReplicationLogicalNetworks_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationLogicalNetworks($_client);
        $this->_ReplicationJobs_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationJobs($_client);
        $this->_ReplicationEvents_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationEvents($_client);
        $this->_ReplicationAlertSettings_group = new \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationAlertSettings($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationProtectedItems
     */
    public function getReplicationProtectedItems()
    {
        return $this->_ReplicationProtectedItems_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationNetworkMappings
     */
    public function getReplicationNetworkMappings()
    {
        return $this->_ReplicationNetworkMappings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationFabrics
     */
    public function getReplicationFabrics()
    {
        return $this->_ReplicationFabrics_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationvCenters
     */
    public function getReplicationvCenters()
    {
        return $this->_ReplicationvCenters_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationStorageClassificationMappings
     */
    public function getReplicationStorageClassificationMappings()
    {
        return $this->_ReplicationStorageClassificationMappings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationStorageClassifications
     */
    public function getReplicationStorageClassifications()
    {
        return $this->_ReplicationStorageClassifications_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationRecoveryServicesProviders
     */
    public function getReplicationRecoveryServicesProviders()
    {
        return $this->_ReplicationRecoveryServicesProviders_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\RecoveryPoints
     */
    public function getRecoveryPoints()
    {
        return $this->_RecoveryPoints_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationRecoveryPlans
     */
    public function getReplicationRecoveryPlans()
    {
        return $this->_ReplicationRecoveryPlans_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationProtectionContainers
     */
    public function getReplicationProtectionContainers()
    {
        return $this->_ReplicationProtectionContainers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationProtectionContainerMappings
     */
    public function getReplicationProtectionContainerMappings()
    {
        return $this->_ReplicationProtectionContainerMappings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationProtectableItems
     */
    public function getReplicationProtectableItems()
    {
        return $this->_ReplicationProtectableItems_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationPolicies
     */
    public function getReplicationPolicies()
    {
        return $this->_ReplicationPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationNetworks
     */
    public function getReplicationNetworks()
    {
        return $this->_ReplicationNetworks_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationLogicalNetworks
     */
    public function getReplicationLogicalNetworks()
    {
        return $this->_ReplicationLogicalNetworks_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationJobs
     */
    public function getReplicationJobs()
    {
        return $this->_ReplicationJobs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationEvents
     */
    public function getReplicationEvents()
    {
        return $this->_ReplicationEvents_group;
    }
    /**
     * @return \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationAlertSettings
     */
    public function getReplicationAlertSettings()
    {
        return $this->_ReplicationAlertSettings_group;
    }
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationProtectedItems
     */
    private $_ReplicationProtectedItems_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationNetworkMappings
     */
    private $_ReplicationNetworkMappings_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationFabrics
     */
    private $_ReplicationFabrics_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationvCenters
     */
    private $_ReplicationvCenters_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationStorageClassificationMappings
     */
    private $_ReplicationStorageClassificationMappings_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationStorageClassifications
     */
    private $_ReplicationStorageClassifications_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationRecoveryServicesProviders
     */
    private $_ReplicationRecoveryServicesProviders_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\RecoveryPoints
     */
    private $_RecoveryPoints_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationRecoveryPlans
     */
    private $_ReplicationRecoveryPlans_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationProtectionContainers
     */
    private $_ReplicationProtectionContainers_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationProtectionContainerMappings
     */
    private $_ReplicationProtectionContainerMappings_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationProtectableItems
     */
    private $_ReplicationProtectableItems_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationPolicies
     */
    private $_ReplicationPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\Operations
     */
    private $_Operations_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationNetworks
     */
    private $_ReplicationNetworks_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationLogicalNetworks
     */
    private $_ReplicationLogicalNetworks_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationJobs
     */
    private $_ReplicationJobs_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationEvents
     */
    private $_ReplicationEvents_group;
    /**
     * @var \Microsoft\Azure\Management\RecoveryServices\SiteRecovery\ReplicationAlertSettings
     */
    private $_ReplicationAlertSettings_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectedItems' => ['get' => [
                'operationId' => 'ReplicationProtectedItems_ListByReplicationProtectionContainers',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ReplicationProtectedItemCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationProtectedItems' => ['get' => [
                'operationId' => 'ReplicationProtectedItems_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'skipToken',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ReplicationProtectedItemCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectedItems/{replicatedProtectedItemName}/applyRecoveryPoint' => ['post' => [
                'operationId' => 'ReplicationProtectedItems_ApplyRecoveryPoint',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'replicatedProtectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'applyRecoveryPointInput',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ApplyRecoveryPointInput']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ReplicationProtectedItem']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectedItems/{replicatedProtectedItemName}/repairReplication' => ['post' => [
                'operationId' => 'ReplicationProtectedItems_RepairReplication',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'replicatedProtectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ReplicationProtectedItem']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectedItems/{replicationProtectedItemName}/updateMobilityService' => ['post' => [
                'operationId' => 'ReplicationProtectedItems_UpdateMobilityService',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'replicationProtectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'updateMobilityServiceRequest',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/UpdateMobilityServiceRequest']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ReplicationProtectedItem']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectedItems/{replicatedProtectedItemName}/reProtect' => ['post' => [
                'operationId' => 'ReplicationProtectedItems_Reprotect',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'replicatedProtectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'rrInput',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ReverseReplicationInput']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ReplicationProtectedItem']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectedItems/{replicatedProtectedItemName}/failoverCommit' => ['post' => [
                'operationId' => 'ReplicationProtectedItems_FailoverCommit',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'replicatedProtectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ReplicationProtectedItem']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectedItems/{replicatedProtectedItemName}/testFailoverCleanup' => ['post' => [
                'operationId' => 'ReplicationProtectedItems_TestFailoverCleanup',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'replicatedProtectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'cleanupInput',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/TestFailoverCleanupInput']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ReplicationProtectedItem']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectedItems/{replicatedProtectedItemName}/testFailover' => ['post' => [
                'operationId' => 'ReplicationProtectedItems_TestFailover',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'replicatedProtectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'failoverInput',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/TestFailoverInput']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ReplicationProtectedItem']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectedItems/{replicatedProtectedItemName}/unplannedFailover' => ['post' => [
                'operationId' => 'ReplicationProtectedItems_UnplannedFailover',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'replicatedProtectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'failoverInput',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/UnplannedFailoverInput']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ReplicationProtectedItem']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectedItems/{replicatedProtectedItemName}/plannedFailover' => ['post' => [
                'operationId' => 'ReplicationProtectedItems_PlannedFailover',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'replicatedProtectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'failoverInput',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/PlannedFailoverInput']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ReplicationProtectedItem']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectedItems/{replicatedProtectedItemName}/remove' => ['post' => [
                'operationId' => 'ReplicationProtectedItems_Delete',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'replicatedProtectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'disableProtectionInput',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/DisableProtectionInput']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectedItems/{replicatedProtectedItemName}' => [
                'get' => [
                    'operationId' => 'ReplicationProtectedItems_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'protectionContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'replicatedProtectedItemName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ReplicationProtectedItem']]]
                ],
                'put' => [
                    'operationId' => 'ReplicationProtectedItems_Create',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'protectionContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'replicatedProtectedItemName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'input',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/EnableProtectionInput']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ReplicationProtectedItem']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'ReplicationProtectedItems_Purge',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'protectionContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'replicatedProtectedItemName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'ReplicationProtectedItems_Update',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'protectionContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'replicatedProtectedItemName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'updateProtectionInput',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/UpdateReplicationProtectedItemInput']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ReplicationProtectedItem']],
                        '202' => []
                    ]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationNetworkMappings' => ['get' => [
                'operationId' => 'ReplicationNetworkMappings_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkMappingCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationNetworks/{networkName}/replicationNetworkMappings' => ['get' => [
                'operationId' => 'ReplicationNetworkMappings_ListByReplicationNetworks',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'networkName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkMappingCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationNetworks/{networkName}/replicationNetworkMappings/{networkMappingName}' => [
                'get' => [
                    'operationId' => 'ReplicationNetworkMappings_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'networkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkMappingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkMapping']]]
                ],
                'put' => [
                    'operationId' => 'ReplicationNetworkMappings_Create',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'networkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkMappingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'input',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/CreateNetworkMappingInput']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/NetworkMapping']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'ReplicationNetworkMappings_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'networkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkMappingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'ReplicationNetworkMappings_Update',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'networkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'networkMappingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'input',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/UpdateNetworkMappingInput']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/NetworkMapping']],
                        '202' => []
                    ]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/migratetoaad' => ['post' => [
                'operationId' => 'ReplicationFabrics_MigrateToAad',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/renewCertificate' => ['post' => [
                'operationId' => 'ReplicationFabrics_RenewCertificate',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'renewCertificate',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/RenewCertificateInput']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/Fabric']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/reassociateGateway' => ['post' => [
                'operationId' => 'ReplicationFabrics_ReassociateGateway',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'failoverProcessServerRequest',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/FailoverProcessServerRequest']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/Fabric']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/checkConsistency' => ['post' => [
                'operationId' => 'ReplicationFabrics_CheckConsistency',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/Fabric']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/remove' => ['post' => [
                'operationId' => 'ReplicationFabrics_Delete',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}' => [
                'get' => [
                    'operationId' => 'ReplicationFabrics_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Fabric']]]
                ],
                'put' => [
                    'operationId' => 'ReplicationFabrics_Create',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'input',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/FabricCreationInput']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Fabric']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'ReplicationFabrics_Purge',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics' => ['get' => [
                'operationId' => 'ReplicationFabrics_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FabricCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationvCenters/{vCenterName}' => [
                'get' => [
                    'operationId' => 'ReplicationvCenters_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'vCenterName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VCenter']]]
                ],
                'put' => [
                    'operationId' => 'ReplicationvCenters_Create',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'vCenterName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'addVCenterRequest',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AddVCenterRequest']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VCenter']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'ReplicationvCenters_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'vCenterName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'ReplicationvCenters_Update',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'vCenterName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'updateVCenterRequest',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/UpdateVCenterRequest']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/VCenter']],
                        '202' => []
                    ]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationvCenters' => ['get' => [
                'operationId' => 'ReplicationvCenters_ListByReplicationFabrics',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VCenterCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationvCenters' => ['get' => [
                'operationId' => 'ReplicationvCenters_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VCenterCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationStorageClassifications/{storageClassificationName}/replicationStorageClassificationMappings/{storageClassificationMappingName}' => [
                'get' => [
                    'operationId' => 'ReplicationStorageClassificationMappings_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'storageClassificationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'storageClassificationMappingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageClassificationMapping']]]
                ],
                'put' => [
                    'operationId' => 'ReplicationStorageClassificationMappings_Create',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'storageClassificationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'storageClassificationMappingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'pairingInput',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/StorageClassificationMappingInput']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/StorageClassificationMapping']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'ReplicationStorageClassificationMappings_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'storageClassificationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'storageClassificationMappingName',
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationStorageClassifications/{storageClassificationName}/replicationStorageClassificationMappings' => ['get' => [
                'operationId' => 'ReplicationStorageClassificationMappings_ListByReplicationStorageClassifications',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'storageClassificationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageClassificationMappingCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationStorageClassificationMappings' => ['get' => [
                'operationId' => 'ReplicationStorageClassificationMappings_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageClassificationMappingCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationStorageClassifications/{storageClassificationName}' => ['get' => [
                'operationId' => 'ReplicationStorageClassifications_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'storageClassificationName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageClassification']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationStorageClassifications' => ['get' => [
                'operationId' => 'ReplicationStorageClassifications_ListByReplicationFabrics',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageClassificationCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationStorageClassifications' => ['get' => [
                'operationId' => 'ReplicationStorageClassifications_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StorageClassificationCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationRecoveryServicesProviders/{providerName}/refreshProvider' => ['post' => [
                'operationId' => 'ReplicationRecoveryServicesProviders_RefreshProvider',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'providerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/RecoveryServicesProvider']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationRecoveryServicesProviders/{providerName}/remove' => ['post' => [
                'operationId' => 'ReplicationRecoveryServicesProviders_Delete',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'providerName',
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationRecoveryServicesProviders/{providerName}' => [
                'get' => [
                    'operationId' => 'ReplicationRecoveryServicesProviders_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'providerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecoveryServicesProvider']]]
                ],
                'delete' => [
                    'operationId' => 'ReplicationRecoveryServicesProviders_Purge',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'providerName',
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationRecoveryServicesProviders' => ['get' => [
                'operationId' => 'ReplicationRecoveryServicesProviders_ListByReplicationFabrics',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecoveryServicesProviderCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationRecoveryServicesProviders' => ['get' => [
                'operationId' => 'ReplicationRecoveryServicesProviders_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecoveryServicesProviderCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectedItems/{replicatedProtectedItemName}/recoveryPoints/{recoveryPointName}' => ['get' => [
                'operationId' => 'RecoveryPoints_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'replicatedProtectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'recoveryPointName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecoveryPoint']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectedItems/{replicatedProtectedItemName}/recoveryPoints' => ['get' => [
                'operationId' => 'RecoveryPoints_ListByReplicationProtectedItems',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'replicatedProtectedItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecoveryPointCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationRecoveryPlans/{recoveryPlanName}/reProtect' => ['post' => [
                'operationId' => 'ReplicationRecoveryPlans_Reprotect',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'recoveryPlanName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/RecoveryPlan']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationRecoveryPlans/{recoveryPlanName}/failoverCommit' => ['post' => [
                'operationId' => 'ReplicationRecoveryPlans_FailoverCommit',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'recoveryPlanName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/RecoveryPlan']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationRecoveryPlans/{recoveryPlanName}/testFailoverCleanup' => ['post' => [
                'operationId' => 'ReplicationRecoveryPlans_TestFailoverCleanup',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'recoveryPlanName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'input',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/RecoveryPlanTestFailoverCleanupInput']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/RecoveryPlan']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationRecoveryPlans/{recoveryPlanName}/testFailover' => ['post' => [
                'operationId' => 'ReplicationRecoveryPlans_TestFailover',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'recoveryPlanName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'input',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/RecoveryPlanTestFailoverInput']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/RecoveryPlan']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationRecoveryPlans/{recoveryPlanName}/unplannedFailover' => ['post' => [
                'operationId' => 'ReplicationRecoveryPlans_UnplannedFailover',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'recoveryPlanName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'input',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/RecoveryPlanUnplannedFailoverInput']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/RecoveryPlan']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationRecoveryPlans/{recoveryPlanName}/plannedFailover' => ['post' => [
                'operationId' => 'ReplicationRecoveryPlans_PlannedFailover',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'recoveryPlanName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'input',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/RecoveryPlanPlannedFailoverInput']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/RecoveryPlan']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationRecoveryPlans/{recoveryPlanName}' => [
                'get' => [
                    'operationId' => 'ReplicationRecoveryPlans_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'recoveryPlanName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecoveryPlan']]]
                ],
                'put' => [
                    'operationId' => 'ReplicationRecoveryPlans_Create',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'recoveryPlanName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'input',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/CreateRecoveryPlanInput']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/RecoveryPlan']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'ReplicationRecoveryPlans_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'recoveryPlanName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'ReplicationRecoveryPlans_Update',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'recoveryPlanName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'input',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/UpdateRecoveryPlanInput']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/RecoveryPlan']],
                        '202' => []
                    ]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationRecoveryPlans' => ['get' => [
                'operationId' => 'ReplicationRecoveryPlans_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecoveryPlanCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/switchprotection' => ['post' => [
                'operationId' => 'ReplicationProtectionContainers_SwitchProtection',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'switchInput',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/SwitchProtectionInput']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ProtectionContainer']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/remove' => ['post' => [
                'operationId' => 'ReplicationProtectionContainers_Delete',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/discoverProtectableItem' => ['post' => [
                'operationId' => 'ReplicationProtectionContainers_DiscoverProtectableItem',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'discoverProtectableItemRequest',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/DiscoverProtectableItemRequest']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ProtectionContainer']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}' => [
                'get' => [
                    'operationId' => 'ReplicationProtectionContainers_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'protectionContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectionContainer']]]
                ],
                'put' => [
                    'operationId' => 'ReplicationProtectionContainers_Create',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'protectionContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'creationInput',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/CreateProtectionContainerInput']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ProtectionContainer']],
                        '202' => []
                    ]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers' => ['get' => [
                'operationId' => 'ReplicationProtectionContainers_ListByReplicationFabrics',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectionContainerCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationProtectionContainers' => ['get' => [
                'operationId' => 'ReplicationProtectionContainers_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectionContainerCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectionContainerMappings/{mappingName}/remove' => ['post' => [
                'operationId' => 'ReplicationProtectionContainerMappings_Delete',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'mappingName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'removalInput',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/RemoveProtectionContainerMappingInput']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '204' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectionContainerMappings/{mappingName}' => [
                'get' => [
                    'operationId' => 'ReplicationProtectionContainerMappings_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'protectionContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'mappingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectionContainerMapping']]]
                ],
                'put' => [
                    'operationId' => 'ReplicationProtectionContainerMappings_Create',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'protectionContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'mappingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'creationInput',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/CreateProtectionContainerMappingInput']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ProtectionContainerMapping']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'ReplicationProtectionContainerMappings_Purge',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'protectionContainerName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'mappingName',
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
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectionContainerMappings' => ['get' => [
                'operationId' => 'ReplicationProtectionContainerMappings_ListByReplicationProtectionContainers',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectionContainerMappingCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationProtectionContainerMappings' => ['get' => [
                'operationId' => 'ReplicationProtectionContainerMappings_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectionContainerMappingCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectableItems/{protectableItemName}' => ['get' => [
                'operationId' => 'ReplicationProtectableItems_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'protectableItemName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectableItem']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationProtectionContainers/{protectionContainerName}/replicationProtectableItems' => ['get' => [
                'operationId' => 'ReplicationProtectableItems_ListByReplicationProtectionContainers',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'protectionContainerName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ProtectableItemCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationPolicies/{policyName}' => [
                'get' => [
                    'operationId' => 'ReplicationPolicies_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Policy']]]
                ],
                'put' => [
                    'operationId' => 'ReplicationPolicies_Create',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'input',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/CreatePolicyInput']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Policy']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'ReplicationPolicies_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                        '202' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'ReplicationPolicies_Update',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'input',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/UpdatePolicyInput']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Policy']],
                        '202' => []
                    ]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationPolicies' => ['get' => [
                'operationId' => 'ReplicationPolicies_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/PolicyCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationsDiscoveryCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationNetworks' => ['get' => [
                'operationId' => 'ReplicationNetworks_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationNetworks' => ['get' => [
                'operationId' => 'ReplicationNetworks_ListByReplicationFabrics',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/NetworkCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationNetworks/{networkName}' => ['get' => [
                'operationId' => 'ReplicationNetworks_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'networkName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Network']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationLogicalNetworks' => ['get' => [
                'operationId' => 'ReplicationLogicalNetworks_ListByReplicationFabrics',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LogicalNetworkCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationFabrics/{fabricName}/replicationLogicalNetworks/{logicalNetworkName}' => ['get' => [
                'operationId' => 'ReplicationLogicalNetworks_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'logicalNetworkName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LogicalNetwork']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationJobs/{jobName}/resume' => ['post' => [
                'operationId' => 'ReplicationJobs_Resume',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'resumeJobParams',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/ResumeJobParams']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/Job']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationJobs/{jobName}/restart' => ['post' => [
                'operationId' => 'ReplicationJobs_Restart',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/Job']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationJobs/{jobName}/cancel' => ['post' => [
                'operationId' => 'ReplicationJobs_Cancel',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/Job']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationJobs/{jobName}' => ['get' => [
                'operationId' => 'ReplicationJobs_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Job']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationJobs/export' => ['post' => [
                'operationId' => 'ReplicationJobs_Export',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'jobQueryParameter',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/JobQueryParameter']
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/Job']],
                    '202' => []
                ]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationJobs' => ['get' => [
                'operationId' => 'ReplicationJobs_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationEvents/{eventName}' => ['get' => [
                'operationId' => 'ReplicationEvents_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                        'name' => 'eventName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Event']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationEvents' => ['get' => [
                'operationId' => 'ReplicationEvents_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/EventCollection']]]
            ]],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationAlertSettings/{alertSettingName}' => [
                'get' => [
                    'operationId' => 'ReplicationAlertSettings_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'alertSettingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Alert']]]
                ],
                'put' => [
                    'operationId' => 'ReplicationAlertSettings_Create',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-08-10']
                        ],
                        [
                            'name' => 'resourceName',
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
                            'name' => 'alertSettingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'request',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ConfigureAlertRequest']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Alert']]]
                ]
            ],
            '/Subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.RecoveryServices/vaults/{resourceName}/replicationAlertSettings' => ['get' => [
                'operationId' => 'ReplicationAlertSettings_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-08-10']
                    ],
                    [
                        'name' => 'resourceName',
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
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AlertCollection']]]
            ]]
        ],
        'definitions' => [
            'AlertProperties' => [
                'properties' => [
                    'sendToOwners' => ['type' => 'string'],
                    'customEmailAddresses' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'locale' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Alert' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AlertProperties']],
                'required' => []
            ],
            'AlertCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Alert']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ConfigureAlertRequestProperties' => [
                'properties' => [
                    'sendToOwners' => ['type' => 'string'],
                    'customEmailAddresses' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'locale' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ConfigureAlertRequest' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ConfigureAlertRequestProperties']],
                'required' => []
            ],
            'EventProviderSpecificDetails' => [
                'properties' => [],
                'required' => []
            ],
            'EventSpecificDetails' => [
                'properties' => [],
                'required' => []
            ],
            'HealthError' => [
                'properties' => [
                    'errorLevel' => ['type' => 'string'],
                    'errorCode' => ['type' => 'string'],
                    'errorMessage' => ['type' => 'string'],
                    'possibleCauses' => ['type' => 'string'],
                    'recommendedAction' => ['type' => 'string'],
                    'creationTimeUtc' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'recoveryProviderErrorMessage' => ['type' => 'string'],
                    'entityId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'EventProperties' => [
                'properties' => [
                    'eventCode' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'eventType' => ['type' => 'string'],
                    'affectedObjectFriendlyName' => ['type' => 'string'],
                    'severity' => ['type' => 'string'],
                    'timeOfOccurrence' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'fabricId' => ['type' => 'string'],
                    'providerSpecificDetails' => ['$ref' => '#/definitions/EventProviderSpecificDetails'],
                    'eventSpecificDetails' => ['$ref' => '#/definitions/EventSpecificDetails'],
                    'healthErrors' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HealthError']
                    ]
                ],
                'required' => []
            ],
            'Event' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/EventProperties']],
                'required' => []
            ],
            'EventCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Event']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'EncryptionDetails' => [
                'properties' => [
                    'kekState' => ['type' => 'string'],
                    'kekCertThumbprint' => ['type' => 'string'],
                    'kekCertExpiryDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => []
            ],
            'FabricSpecificDetails' => [
                'properties' => [],
                'required' => []
            ],
            'FabricProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'encryptionDetails' => ['$ref' => '#/definitions/EncryptionDetails'],
                    'rolloverEncryptionDetails' => ['$ref' => '#/definitions/EncryptionDetails'],
                    'internalIdentifier' => ['type' => 'string'],
                    'bcdrState' => ['type' => 'string'],
                    'customDetails' => ['$ref' => '#/definitions/FabricSpecificDetails'],
                    'healthErrorDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HealthError']
                    ],
                    'health' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Fabric' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/FabricProperties']],
                'required' => []
            ],
            'FabricCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Fabric']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'FabricSpecificCreationInput' => [
                'properties' => [],
                'required' => []
            ],
            'FabricCreationInputProperties' => [
                'properties' => ['customDetails' => ['$ref' => '#/definitions/FabricSpecificCreationInput']],
                'required' => []
            ],
            'FabricCreationInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/FabricCreationInputProperties']],
                'required' => []
            ],
            'FailoverProcessServerRequestProperties' => [
                'properties' => [
                    'containerName' => ['type' => 'string'],
                    'sourceProcessServerId' => ['type' => 'string'],
                    'targetProcessServerId' => ['type' => 'string'],
                    'vmsToMigrate' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'updateType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'FailoverProcessServerRequest' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/FailoverProcessServerRequestProperties']],
                'required' => []
            ],
            'TaskTypeDetails' => [
                'properties' => [],
                'required' => []
            ],
            'GroupTaskDetails' => [
                'properties' => ['childTasks' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ASRTask']
                ]],
                'required' => []
            ],
            'ServiceError' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'possibleCauses' => ['type' => 'string'],
                    'recommendedAction' => ['type' => 'string'],
                    'activityId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ProviderError' => [
                'properties' => [
                    'errorCode' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'errorMessage' => ['type' => 'string'],
                    'errorId' => ['type' => 'string'],
                    'possibleCauses' => ['type' => 'string'],
                    'recommendedAction' => ['type' => 'string']
                ],
                'required' => []
            ],
            'JobErrorDetails' => [
                'properties' => [
                    'serviceErrorDetails' => ['$ref' => '#/definitions/ServiceError'],
                    'providerErrorDetails' => ['$ref' => '#/definitions/ProviderError'],
                    'errorLevel' => ['type' => 'string'],
                    'creationTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'taskId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ASRTask' => [
                'properties' => [
                    'taskId' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'allowedActions' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'friendlyName' => ['type' => 'string'],
                    'state' => ['type' => 'string'],
                    'stateDescription' => ['type' => 'string'],
                    'taskType' => ['type' => 'string'],
                    'customDetails' => ['$ref' => '#/definitions/TaskTypeDetails'],
                    'groupTaskCustomDetails' => ['$ref' => '#/definitions/GroupTaskDetails'],
                    'errors' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/JobErrorDetails']
                    ]
                ],
                'required' => []
            ],
            'JobDetails' => [
                'properties' => ['affectedObjectDetails' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]],
                'required' => []
            ],
            'JobProperties' => [
                'properties' => [
                    'activityId' => ['type' => 'string'],
                    'scenarioName' => ['type' => 'string'],
                    'friendlyName' => ['type' => 'string'],
                    'state' => ['type' => 'string'],
                    'stateDescription' => ['type' => 'string'],
                    'tasks' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ASRTask']
                    ],
                    'errors' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/JobErrorDetails']
                    ],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'endTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'allowedActions' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'targetObjectId' => ['type' => 'string'],
                    'targetObjectName' => ['type' => 'string'],
                    'targetInstanceType' => ['type' => 'string'],
                    'customDetails' => ['$ref' => '#/definitions/JobDetails']
                ],
                'required' => []
            ],
            'ARMExceptionDetails' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'possibleCauses' => ['type' => 'string'],
                    'recommendedAction' => ['type' => 'string'],
                    'clientRequestId' => ['type' => 'string'],
                    'activityId' => ['type' => 'string'],
                    'target' => ['type' => 'string']
                ],
                'required' => []
            ],
            'MethodCallStatus' => [
                'properties' => [
                    'isVirtual' => ['type' => 'string'],
                    'parameters' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'containsGenericParameters' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ARMInnerError' => [
                'properties' => [
                    'trace' => ['type' => 'string'],
                    'source' => ['type' => 'string'],
                    'methodStatus' => ['$ref' => '#/definitions/MethodCallStatus'],
                    'cloudId' => ['type' => 'string'],
                    'hVHostId' => ['type' => 'string'],
                    'hVClusterId' => ['type' => 'string'],
                    'networkId' => ['type' => 'string'],
                    'vmId' => ['type' => 'string'],
                    'fabricId' => ['type' => 'string'],
                    'liveId' => ['type' => 'string'],
                    'containerId' => ['type' => 'string'],
                    'resourceId' => ['type' => 'string'],
                    'resourceName' => ['type' => 'string'],
                    'subscriptionId' => ['type' => 'string'],
                    'serializedSRSLogContext' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ARMException' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string'],
                    'target' => ['type' => 'string'],
                    'details' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ARMExceptionDetails']
                    ],
                    'innererror' => ['$ref' => '#/definitions/ARMInnerError']
                ],
                'required' => []
            ],
            'Job' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/JobProperties'],
                    'status' => ['type' => 'string'],
                    'error' => ['$ref' => '#/definitions/ARMException'],
                    'startTime' => ['type' => 'string'],
                    'endTime' => ['type' => 'string']
                ],
                'required' => []
            ],
            'JobCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Job']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'JobQueryParameter' => [
                'properties' => [
                    'startTime' => ['type' => 'string'],
                    'endTime' => ['type' => 'string'],
                    'fabricId' => ['type' => 'string'],
                    'affectedObjectTypes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'jobStatus' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'ResumeJobParamsProperties' => [
                'properties' => ['comments' => ['type' => 'string']],
                'required' => []
            ],
            'ResumeJobParams' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ResumeJobParamsProperties']],
                'required' => []
            ],
            'LogicalNetworkProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'networkVirtualizationStatus' => ['type' => 'string'],
                    'logicalNetworkUsage' => ['type' => 'string'],
                    'logicalNetworkDefinitionsStatus' => ['type' => 'string']
                ],
                'required' => []
            ],
            'LogicalNetwork' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/LogicalNetworkProperties']],
                'required' => []
            ],
            'LogicalNetworkCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/LogicalNetwork']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'NetworkMappingFabricSpecificSettings' => [
                'properties' => [],
                'required' => []
            ],
            'NetworkMappingProperties' => [
                'properties' => [
                    'state' => ['type' => 'string'],
                    'primaryNetworkFriendlyName' => ['type' => 'string'],
                    'primaryNetworkId' => ['type' => 'string'],
                    'primaryFabricFriendlyName' => ['type' => 'string'],
                    'recoveryNetworkFriendlyName' => ['type' => 'string'],
                    'recoveryNetworkId' => ['type' => 'string'],
                    'recoveryFabricArmId' => ['type' => 'string'],
                    'recoveryFabricFriendlyName' => ['type' => 'string'],
                    'fabricSpecificSettings' => ['$ref' => '#/definitions/NetworkMappingFabricSpecificSettings']
                ],
                'required' => []
            ],
            'NetworkMapping' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/NetworkMappingProperties']],
                'required' => []
            ],
            'FabricSpecificCreateNetworkMappingInput' => [
                'properties' => [],
                'required' => []
            ],
            'CreateNetworkMappingInputProperties' => [
                'properties' => [
                    'recoveryFabricName' => ['type' => 'string'],
                    'recoveryNetworkId' => ['type' => 'string'],
                    'fabricSpecificDetails' => ['$ref' => '#/definitions/FabricSpecificCreateNetworkMappingInput']
                ],
                'required' => []
            ],
            'CreateNetworkMappingInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/CreateNetworkMappingInputProperties']],
                'required' => []
            ],
            'FabricSpecificUpdateNetworkMappingInput' => [
                'properties' => [],
                'required' => []
            ],
            'UpdateNetworkMappingInputProperties' => [
                'properties' => [
                    'recoveryFabricName' => ['type' => 'string'],
                    'recoveryNetworkId' => ['type' => 'string'],
                    'fabricSpecificDetails' => ['$ref' => '#/definitions/FabricSpecificUpdateNetworkMappingInput']
                ],
                'required' => []
            ],
            'UpdateNetworkMappingInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UpdateNetworkMappingInputProperties']],
                'required' => []
            ],
            'Subnet' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'friendlyName' => ['type' => 'string'],
                    'addressList' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'NetworkProperties' => [
                'properties' => [
                    'fabricType' => ['type' => 'string'],
                    'subnets' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Subnet']
                    ],
                    'friendlyName' => ['type' => 'string'],
                    'networkType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Network' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/NetworkProperties']],
                'required' => []
            ],
            'NetworkCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Network']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'Display' => [
                'properties' => [
                    'provider' => ['type' => 'string'],
                    'resource' => ['type' => 'string'],
                    'operation' => ['type' => 'string'],
                    'description' => ['type' => 'string']
                ],
                'required' => []
            ],
            'OperationsDiscovery' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'display' => ['$ref' => '#/definitions/Display'],
                    'origin' => ['type' => 'string'],
                    'properties' => ['type' => 'object']
                ],
                'required' => []
            ],
            'OperationsDiscoveryCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/OperationsDiscovery']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'PolicyProviderSpecificDetails' => [
                'properties' => [],
                'required' => []
            ],
            'PolicyProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'providerSpecificDetails' => ['$ref' => '#/definitions/PolicyProviderSpecificDetails']
                ],
                'required' => []
            ],
            'Policy' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/PolicyProperties']],
                'required' => []
            ],
            'PolicyCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Policy']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'PolicyProviderSpecificInput' => [
                'properties' => [],
                'required' => []
            ],
            'CreatePolicyInputProperties' => [
                'properties' => ['providerSpecificInput' => ['$ref' => '#/definitions/PolicyProviderSpecificInput']],
                'required' => []
            ],
            'CreatePolicyInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/CreatePolicyInputProperties']],
                'required' => []
            ],
            'UpdatePolicyInputProperties' => [
                'properties' => ['replicationProviderSettings' => ['$ref' => '#/definitions/PolicyProviderSpecificInput']],
                'required' => []
            ],
            'UpdatePolicyInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UpdatePolicyInputProperties']],
                'required' => []
            ],
            'ConfigurationSettings' => [
                'properties' => [],
                'required' => []
            ],
            'ProtectableItemProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'protectionStatus' => ['type' => 'string'],
                    'replicationProtectedItemId' => ['type' => 'string'],
                    'recoveryServicesProviderId' => ['type' => 'string'],
                    'protectionReadinessErrors' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'supportedReplicationProviders' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'customDetails' => ['$ref' => '#/definitions/ConfigurationSettings']
                ],
                'required' => []
            ],
            'ProtectableItem' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ProtectableItemProperties']],
                'required' => []
            ],
            'ProtectableItemCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ProtectableItem']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ProtectionContainerMappingProviderSpecificDetails' => [
                'properties' => ['instanceType' => ['type' => 'string']],
                'required' => []
            ],
            'ProtectionContainerMappingProperties' => [
                'properties' => [
                    'targetProtectionContainerId' => ['type' => 'string'],
                    'targetProtectionContainerFriendlyName' => ['type' => 'string'],
                    'providerSpecificDetails' => ['$ref' => '#/definitions/ProtectionContainerMappingProviderSpecificDetails'],
                    'health' => ['type' => 'string'],
                    'healthErrorDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HealthError']
                    ],
                    'policyId' => ['type' => 'string'],
                    'state' => ['type' => 'string'],
                    'sourceProtectionContainerFriendlyName' => ['type' => 'string'],
                    'sourceFabricFriendlyName' => ['type' => 'string'],
                    'targetFabricFriendlyName' => ['type' => 'string'],
                    'policyFriendlyName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ProtectionContainerMapping' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ProtectionContainerMappingProperties']],
                'required' => []
            ],
            'ProtectionContainerMappingCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ProtectionContainerMapping']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ReplicationProviderSpecificContainerMappingInput' => [
                'properties' => ['instanceType' => ['type' => 'string']],
                'required' => []
            ],
            'CreateProtectionContainerMappingInputProperties' => [
                'properties' => [
                    'targetProtectionContainerId' => ['type' => 'string'],
                    'PolicyId' => ['type' => 'string'],
                    'providerSpecificInput' => ['$ref' => '#/definitions/ReplicationProviderSpecificContainerMappingInput']
                ],
                'required' => []
            ],
            'CreateProtectionContainerMappingInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/CreateProtectionContainerMappingInputProperties']],
                'required' => []
            ],
            'ReplicationProviderContainerUnmappingInput' => [
                'properties' => ['instanceType' => ['type' => 'string']],
                'required' => []
            ],
            'RemoveProtectionContainerMappingInputProperties' => [
                'properties' => ['providerSpecificInput' => ['$ref' => '#/definitions/ReplicationProviderContainerUnmappingInput']],
                'required' => []
            ],
            'RemoveProtectionContainerMappingInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RemoveProtectionContainerMappingInputProperties']],
                'required' => []
            ],
            'ProtectionContainerFabricSpecificDetails' => [
                'properties' => ['instanceType' => ['type' => 'string']],
                'required' => []
            ],
            'ProtectionContainerProperties' => [
                'properties' => [
                    'fabricFriendlyName' => ['type' => 'string'],
                    'friendlyName' => ['type' => 'string'],
                    'fabricType' => ['type' => 'string'],
                    'protectedItemCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'pairingStatus' => ['type' => 'string'],
                    'role' => ['type' => 'string'],
                    'fabricSpecificDetails' => ['$ref' => '#/definitions/ProtectionContainerFabricSpecificDetails']
                ],
                'required' => []
            ],
            'ProtectionContainer' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ProtectionContainerProperties']],
                'required' => []
            ],
            'ProtectionContainerCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ProtectionContainer']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ReplicationProviderSpecificContainerCreationInput' => [
                'properties' => [],
                'required' => []
            ],
            'CreateProtectionContainerInputProperties' => [
                'properties' => ['providerSpecificInput' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ReplicationProviderSpecificContainerCreationInput']
                ]],
                'required' => []
            ],
            'CreateProtectionContainerInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/CreateProtectionContainerInputProperties']],
                'required' => []
            ],
            'DiscoverProtectableItemRequestProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'ipAddress' => ['type' => 'string'],
                    'osType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'DiscoverProtectableItemRequest' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DiscoverProtectableItemRequestProperties']],
                'required' => []
            ],
            'SwitchProtectionProviderSpecificInput' => [
                'properties' => [],
                'required' => []
            ],
            'SwitchProtectionInputProperties' => [
                'properties' => [
                    'replicationProtectedItemName' => ['type' => 'string'],
                    'providerSpecificDetails' => ['$ref' => '#/definitions/SwitchProtectionProviderSpecificInput']
                ],
                'required' => []
            ],
            'SwitchProtectionInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/SwitchProtectionInputProperties']],
                'required' => []
            ],
            'CurrentScenarioDetails' => [
                'properties' => [
                    'scenarioName' => ['type' => 'string'],
                    'jobId' => ['type' => 'string'],
                    'startTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => []
            ],
            'RecoveryPlanProtectedItem' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'virtualMachineId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'RecoveryPlanActionDetails' => [
                'properties' => [],
                'required' => []
            ],
            'RecoveryPlanAction' => [
                'properties' => [
                    'actionName' => ['type' => 'string'],
                    'failoverTypes' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'ReverseReplicate',
                                'Commit',
                                'PlannedFailover',
                                'UnplannedFailover',
                                'DisableProtection',
                                'TestFailover',
                                'TestFailoverCleanup',
                                'Failback',
                                'FinalizeFailback',
                                'ChangePit',
                                'RepairReplication',
                                'SwitchProtection',
                                'CompleteMigration'
                            ]
                        ]
                    ],
                    'failoverDirections' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'string',
                            'enum' => [
                                'PrimaryToRecovery',
                                'RecoveryToPrimary'
                            ]
                        ]
                    ],
                    'customDetails' => ['$ref' => '#/definitions/RecoveryPlanActionDetails']
                ],
                'required' => [
                    'actionName',
                    'failoverTypes',
                    'failoverDirections',
                    'customDetails'
                ]
            ],
            'RecoveryPlanGroup' => [
                'properties' => [
                    'groupType' => [
                        'type' => 'string',
                        'enum' => [
                            'Shutdown',
                            'Boot',
                            'Failover'
                        ]
                    ],
                    'replicationProtectedItems' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RecoveryPlanProtectedItem']
                    ],
                    'startGroupActions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RecoveryPlanAction']
                    ],
                    'endGroupActions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RecoveryPlanAction']
                    ]
                ],
                'required' => ['groupType']
            ],
            'RecoveryPlanProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'primaryFabricId' => ['type' => 'string'],
                    'primaryFabricFriendlyName' => ['type' => 'string'],
                    'recoveryFabricId' => ['type' => 'string'],
                    'recoveryFabricFriendlyName' => ['type' => 'string'],
                    'failoverDeploymentModel' => ['type' => 'string'],
                    'replicationProviders' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'allowedOperations' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'lastPlannedFailoverTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'lastTestFailoverTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'currentScenario' => ['$ref' => '#/definitions/CurrentScenarioDetails'],
                    'currentScenarioStatus' => ['type' => 'string'],
                    'currentScenarioStatusDescription' => ['type' => 'string'],
                    'groups' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RecoveryPlanGroup']
                    ]
                ],
                'required' => []
            ],
            'RecoveryPlan' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RecoveryPlanProperties']],
                'required' => []
            ],
            'RecoveryPlanCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RecoveryPlan']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'CreateRecoveryPlanInputProperties' => [
                'properties' => [
                    'primaryFabricId' => ['type' => 'string'],
                    'recoveryFabricId' => ['type' => 'string'],
                    'failoverDeploymentModel' => [
                        'type' => 'string',
                        'enum' => [
                            'NotApplicable',
                            'Classic',
                            'ResourceManager'
                        ]
                    ],
                    'groups' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RecoveryPlanGroup']
                    ]
                ],
                'required' => [
                    'primaryFabricId',
                    'recoveryFabricId',
                    'groups'
                ]
            ],
            'CreateRecoveryPlanInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/CreateRecoveryPlanInputProperties']],
                'required' => ['properties']
            ],
            'UpdateRecoveryPlanInputProperties' => [
                'properties' => ['groups' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RecoveryPlanGroup']
                ]],
                'required' => []
            ],
            'UpdateRecoveryPlanInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UpdateRecoveryPlanInputProperties']],
                'required' => []
            ],
            'RecoveryPlanProviderSpecificFailoverInput' => [
                'properties' => [],
                'required' => []
            ],
            'RecoveryPlanPlannedFailoverInputProperties' => [
                'properties' => [
                    'failoverDirection' => [
                        'type' => 'string',
                        'enum' => [
                            'PrimaryToRecovery',
                            'RecoveryToPrimary'
                        ]
                    ],
                    'providerSpecificDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RecoveryPlanProviderSpecificFailoverInput']
                    ]
                ],
                'required' => ['failoverDirection']
            ],
            'RecoveryPlanPlannedFailoverInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RecoveryPlanPlannedFailoverInputProperties']],
                'required' => ['properties']
            ],
            'RecoveryPlanUnplannedFailoverInputProperties' => [
                'properties' => [
                    'failoverDirection' => [
                        'type' => 'string',
                        'enum' => [
                            'PrimaryToRecovery',
                            'RecoveryToPrimary'
                        ]
                    ],
                    'sourceSiteOperations' => [
                        'type' => 'string',
                        'enum' => [
                            'Required',
                            'NotRequired'
                        ]
                    ],
                    'providerSpecificDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RecoveryPlanProviderSpecificFailoverInput']
                    ]
                ],
                'required' => [
                    'failoverDirection',
                    'sourceSiteOperations'
                ]
            ],
            'RecoveryPlanUnplannedFailoverInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RecoveryPlanUnplannedFailoverInputProperties']],
                'required' => ['properties']
            ],
            'RecoveryPlanTestFailoverInputProperties' => [
                'properties' => [
                    'failoverDirection' => [
                        'type' => 'string',
                        'enum' => [
                            'PrimaryToRecovery',
                            'RecoveryToPrimary'
                        ]
                    ],
                    'networkType' => ['type' => 'string'],
                    'networkId' => ['type' => 'string'],
                    'skipTestFailoverCleanup' => ['type' => 'string'],
                    'providerSpecificDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RecoveryPlanProviderSpecificFailoverInput']
                    ]
                ],
                'required' => [
                    'failoverDirection',
                    'networkType'
                ]
            ],
            'RecoveryPlanTestFailoverInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RecoveryPlanTestFailoverInputProperties']],
                'required' => ['properties']
            ],
            'RecoveryPlanTestFailoverCleanupInputProperties' => [
                'properties' => ['comments' => ['type' => 'string']],
                'required' => []
            ],
            'RecoveryPlanTestFailoverCleanupInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RecoveryPlanTestFailoverCleanupInputProperties']],
                'required' => ['properties']
            ],
            'RecoveryPointProperties' => [
                'properties' => [
                    'recoveryPointTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'recoveryPointType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'RecoveryPoint' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RecoveryPointProperties']],
                'required' => []
            ],
            'RecoveryPointCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RecoveryPoint']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'RecoveryServicesProviderProperties' => [
                'properties' => [
                    'fabricType' => ['type' => 'string'],
                    'friendlyName' => ['type' => 'string'],
                    'providerVersion' => ['type' => 'string'],
                    'serverVersion' => ['type' => 'string'],
                    'providerVersionState' => ['type' => 'string'],
                    'providerVersionExpiryDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'fabricFriendlyName' => ['type' => 'string'],
                    'lastHeartBeat' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'connectionStatus' => ['type' => 'string'],
                    'protectedItemCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'allowedScenarios' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'healthErrorDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HealthError']
                    ]
                ],
                'required' => []
            ],
            'RecoveryServicesProvider' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RecoveryServicesProviderProperties']],
                'required' => []
            ],
            'RecoveryServicesProviderCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RecoveryServicesProvider']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ReplicationProviderSpecificSettings' => [
                'properties' => [],
                'required' => []
            ],
            'ReplicationProtectedItemProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'protectedItemType' => ['type' => 'string'],
                    'protectableItemId' => ['type' => 'string'],
                    'recoveryServicesProviderId' => ['type' => 'string'],
                    'primaryFabricFriendlyName' => ['type' => 'string'],
                    'recoveryFabricFriendlyName' => ['type' => 'string'],
                    'recoveryFabricId' => ['type' => 'string'],
                    'primaryProtectionContainerFriendlyName' => ['type' => 'string'],
                    'recoveryProtectionContainerFriendlyName' => ['type' => 'string'],
                    'protectionState' => ['type' => 'string'],
                    'protectionStateDescription' => ['type' => 'string'],
                    'activeLocation' => ['type' => 'string'],
                    'testFailoverState' => ['type' => 'string'],
                    'testFailoverStateDescription' => ['type' => 'string'],
                    'allowedOperations' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'replicationHealth' => ['type' => 'string'],
                    'replicationHealthErrors' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HealthError']
                    ],
                    'policyId' => ['type' => 'string'],
                    'policyFriendlyName' => ['type' => 'string'],
                    'lastSuccessfulFailoverTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'lastSuccessfulTestFailoverTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'currentScenario' => ['$ref' => '#/definitions/CurrentScenarioDetails'],
                    'failoverRecoveryPointId' => ['type' => 'string'],
                    'providerSpecificDetails' => ['$ref' => '#/definitions/ReplicationProviderSpecificSettings'],
                    'recoveryContainerId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ReplicationProtectedItem' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ReplicationProtectedItemProperties']],
                'required' => []
            ],
            'EnableProtectionProviderSpecificInput' => [
                'properties' => [],
                'required' => []
            ],
            'EnableProtectionInputProperties' => [
                'properties' => [
                    'policyId' => ['type' => 'string'],
                    'protectableItemId' => ['type' => 'string'],
                    'providerSpecificDetails' => ['$ref' => '#/definitions/EnableProtectionProviderSpecificInput']
                ],
                'required' => []
            ],
            'EnableProtectionInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/EnableProtectionInputProperties']],
                'required' => []
            ],
            'VMNicInputDetails' => [
                'properties' => [
                    'nicId' => ['type' => 'string'],
                    'recoveryVMSubnetName' => ['type' => 'string'],
                    'replicaNicStaticIPAddress' => ['type' => 'string'],
                    'selectionType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'UpdateReplicationProtectedItemProviderInput' => [
                'properties' => [],
                'required' => []
            ],
            'UpdateReplicationProtectedItemInputProperties' => [
                'properties' => [
                    'recoveryAzureVMName' => ['type' => 'string'],
                    'recoveryAzureVMSize' => ['type' => 'string'],
                    'selectedRecoveryAzureNetworkId' => ['type' => 'string'],
                    'enableRDPOnTargetOption' => ['type' => 'string'],
                    'vmNics' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VMNicInputDetails']
                    ],
                    'licenseType' => [
                        'type' => 'string',
                        'enum' => [
                            'NotSpecified',
                            'NoLicenseType',
                            'WindowsServer'
                        ]
                    ],
                    'recoveryAvailabilitySetId' => ['type' => 'string'],
                    'providerSpecificDetails' => ['$ref' => '#/definitions/UpdateReplicationProtectedItemProviderInput']
                ],
                'required' => []
            ],
            'UpdateReplicationProtectedItemInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UpdateReplicationProtectedItemInputProperties']],
                'required' => []
            ],
            'DisableProtectionProviderSpecificInput' => [
                'properties' => [],
                'required' => []
            ],
            'DisableProtectionInputProperties' => [
                'properties' => [
                    'disableProtectionReason' => [
                        'type' => 'string',
                        'enum' => [
                            'NotSpecified',
                            'MigrationComplete'
                        ]
                    ],
                    'replicationProviderInput' => ['$ref' => '#/definitions/DisableProtectionProviderSpecificInput']
                ],
                'required' => []
            ],
            'DisableProtectionInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DisableProtectionInputProperties']],
                'required' => []
            ],
            'ProviderSpecificFailoverInput' => [
                'properties' => [],
                'required' => []
            ],
            'PlannedFailoverInputProperties' => [
                'properties' => [
                    'failoverDirection' => ['type' => 'string'],
                    'providerSpecificDetails' => ['$ref' => '#/definitions/ProviderSpecificFailoverInput']
                ],
                'required' => []
            ],
            'PlannedFailoverInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/PlannedFailoverInputProperties']],
                'required' => []
            ],
            'UnplannedFailoverInputProperties' => [
                'properties' => [
                    'failoverDirection' => ['type' => 'string'],
                    'sourceSiteOperations' => ['type' => 'string'],
                    'providerSpecificDetails' => ['$ref' => '#/definitions/ProviderSpecificFailoverInput']
                ],
                'required' => []
            ],
            'UnplannedFailoverInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UnplannedFailoverInputProperties']],
                'required' => []
            ],
            'TestFailoverInputProperties' => [
                'properties' => [
                    'failoverDirection' => ['type' => 'string'],
                    'networkType' => ['type' => 'string'],
                    'networkId' => ['type' => 'string'],
                    'skipTestFailoverCleanup' => ['type' => 'string'],
                    'providerSpecificDetails' => ['$ref' => '#/definitions/ProviderSpecificFailoverInput']
                ],
                'required' => []
            ],
            'TestFailoverInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/TestFailoverInputProperties']],
                'required' => []
            ],
            'TestFailoverCleanupInputProperties' => [
                'properties' => ['comments' => ['type' => 'string']],
                'required' => []
            ],
            'TestFailoverCleanupInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/TestFailoverCleanupInputProperties']],
                'required' => ['properties']
            ],
            'ReverseReplicationProviderSpecificInput' => [
                'properties' => [],
                'required' => []
            ],
            'ReverseReplicationInputProperties' => [
                'properties' => [
                    'failoverDirection' => ['type' => 'string'],
                    'providerSpecificDetails' => ['$ref' => '#/definitions/ReverseReplicationProviderSpecificInput']
                ],
                'required' => []
            ],
            'ReverseReplicationInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ReverseReplicationInputProperties']],
                'required' => []
            ],
            'UpdateMobilityServiceRequestProperties' => [
                'properties' => ['runAsAccountId' => ['type' => 'string']],
                'required' => []
            ],
            'UpdateMobilityServiceRequest' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UpdateMobilityServiceRequestProperties']],
                'required' => []
            ],
            'ApplyRecoveryPointProviderSpecificInput' => [
                'properties' => [],
                'required' => []
            ],
            'ApplyRecoveryPointInputProperties' => [
                'properties' => [
                    'recoveryPointId' => ['type' => 'string'],
                    'providerSpecificDetails' => ['$ref' => '#/definitions/ApplyRecoveryPointProviderSpecificInput']
                ],
                'required' => []
            ],
            'ApplyRecoveryPointInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ApplyRecoveryPointInputProperties']],
                'required' => []
            ],
            'StorageClassificationProperties' => [
                'properties' => ['friendlyName' => ['type' => 'string']],
                'required' => []
            ],
            'StorageClassification' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/StorageClassificationProperties']],
                'required' => []
            ],
            'StorageClassificationCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/StorageClassification']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'StorageClassificationMappingProperties' => [
                'properties' => ['targetStorageClassificationId' => ['type' => 'string']],
                'required' => []
            ],
            'StorageClassificationMapping' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/StorageClassificationMappingProperties']],
                'required' => []
            ],
            'StorageClassificationMappingCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/StorageClassificationMapping']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'StorageMappingInputProperties' => [
                'properties' => ['targetStorageClassificationId' => ['type' => 'string']],
                'required' => []
            ],
            'StorageClassificationMappingInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/StorageMappingInputProperties']],
                'required' => []
            ],
            'VCenterProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'internalId' => ['type' => 'string'],
                    'lastHeartbeat' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'discoveryStatus' => ['type' => 'string'],
                    'processServerId' => ['type' => 'string'],
                    'ipAddress' => ['type' => 'string'],
                    'infrastructureId' => ['type' => 'string'],
                    'port' => ['type' => 'string'],
                    'runAsAccountId' => ['type' => 'string'],
                    'fabricArmResourceName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'VCenter' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/VCenterProperties']],
                'required' => []
            ],
            'VCenterCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VCenter']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'AddVCenterRequestProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'ipAddress' => ['type' => 'string'],
                    'processServerId' => ['type' => 'string'],
                    'port' => ['type' => 'string'],
                    'runAsAccountId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'AddVCenterRequest' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AddVCenterRequestProperties']],
                'required' => []
            ],
            'UpdateVCenterRequestProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'ipAddress' => ['type' => 'string'],
                    'processServerId' => ['type' => 'string'],
                    'port' => ['type' => 'string'],
                    'runAsAccountId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'UpdateVCenterRequest' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/UpdateVCenterRequestProperties']],
                'required' => []
            ],
            'RenewCertificateInputProperties' => [
                'properties' => ['renewCertificateType' => ['type' => 'string']],
                'required' => []
            ],
            'RenewCertificateInput' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/RenewCertificateInputProperties']],
                'required' => []
            ],
            'NetworkMappingCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/NetworkMapping']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ReplicationProtectedItemCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ReplicationProtectedItem']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ProtectedItemsQueryParameter' => [
                'properties' => [
                    'sourceFabricName' => ['type' => 'string'],
                    'recoveryPlanName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'AzureToAzure' => [
                'properties' => [
                    'primaryFabricLocation' => ['type' => 'string'],
                    'recoveryFabricLocation' => ['type' => 'string']
                ],
                'required' => []
            ],
            'VmmToAzure' => [
                'properties' => [],
                'required' => []
            ],
            'VmmToVmm' => [
                'properties' => [],
                'required' => []
            ],
            'AzureToAzure' => [
                'properties' => ['primaryNetworkId' => ['type' => 'string']],
                'required' => []
            ],
            'VmmToAzure' => [
                'properties' => [],
                'required' => []
            ],
            'VmmToVmm' => [
                'properties' => [],
                'required' => []
            ],
            'AzureToAzure' => [
                'properties' => ['primaryNetworkId' => ['type' => 'string']],
                'required' => []
            ],
            'VmmToAzure' => [
                'properties' => [],
                'required' => []
            ],
            'VmmToVmm' => [
                'properties' => [],
                'required' => []
            ],
            'Azure' => [
                'properties' => [
                    'location' => ['type' => 'string'],
                    'containerIds' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'VMM' => [
                'properties' => [],
                'required' => []
            ],
            'HyperVSite' => [
                'properties' => [],
                'required' => []
            ],
            'MobilityServiceUpdate' => [
                'properties' => [
                    'version' => ['type' => 'string'],
                    'rebootStatus' => ['type' => 'string'],
                    'osType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ProcessServer' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'id' => ['type' => 'string'],
                    'ipAddress' => ['type' => 'string'],
                    'osType' => ['type' => 'string'],
                    'agentVersion' => ['type' => 'string'],
                    'lastHeartbeat' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'versionStatus' => ['type' => 'string'],
                    'mobilityServiceUpdates' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/MobilityServiceUpdate']
                    ],
                    'hostId' => ['type' => 'string'],
                    'machineCount' => ['type' => 'string'],
                    'replicationPairCount' => ['type' => 'string'],
                    'systemLoad' => ['type' => 'string'],
                    'systemLoadStatus' => ['type' => 'string'],
                    'cpuLoad' => ['type' => 'string'],
                    'cpuLoadStatus' => ['type' => 'string'],
                    'totalMemoryInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'availableMemoryInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'memoryUsageStatus' => ['type' => 'string'],
                    'totalSpaceInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'availableSpaceInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'spaceUsageStatus' => ['type' => 'string'],
                    'psServiceStatus' => ['type' => 'string'],
                    'sslCertExpiryDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'sslCertExpiryRemainingDays' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'RetentionVolume' => [
                'properties' => [
                    'volumeName' => ['type' => 'string'],
                    'capacityInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'freeSpaceInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'thresholdPercentage' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'DataStore' => [
                'properties' => [
                    'symbolicName' => ['type' => 'string'],
                    'uuid' => ['type' => 'string'],
                    'capacity' => ['type' => 'string'],
                    'freeSpace' => ['type' => 'string'],
                    'type' => ['type' => 'string']
                ],
                'required' => []
            ],
            'MasterTargetServer' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'ipAddress' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'osType' => ['type' => 'string'],
                    'agentVersion' => ['type' => 'string'],
                    'lastHeartbeat' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'versionStatus' => ['type' => 'string'],
                    'retentionVolumes' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RetentionVolume']
                    ],
                    'dataStores' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DataStore']
                    ],
                    'validationErrors' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HealthError']
                    ]
                ],
                'required' => []
            ],
            'RunAsAccount' => [
                'properties' => [
                    'accountId' => ['type' => 'string'],
                    'accountName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'VMware' => [
                'properties' => [
                    'processServers' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ProcessServer']
                    ],
                    'masterTargetServers' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/MasterTargetServer']
                    ],
                    'runAsAccounts' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RunAsAccount']
                    ],
                    'replicationPairCount' => ['type' => 'string'],
                    'processServerCount' => ['type' => 'string'],
                    'agentCount' => ['type' => 'string'],
                    'protectedServers' => ['type' => 'string'],
                    'systemLoad' => ['type' => 'string'],
                    'systemLoadStatus' => ['type' => 'string'],
                    'cpuLoad' => ['type' => 'string'],
                    'cpuLoadStatus' => ['type' => 'string'],
                    'totalMemoryInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'availableMemoryInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'memoryUsageStatus' => ['type' => 'string'],
                    'totalSpaceInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'availableSpaceInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'spaceUsageStatus' => ['type' => 'string'],
                    'webLoad' => ['type' => 'string'],
                    'webLoadStatus' => ['type' => 'string'],
                    'databaseServerLoad' => ['type' => 'string'],
                    'databaseServerLoadStatus' => ['type' => 'string'],
                    'csServiceStatus' => ['type' => 'string'],
                    'ipAddress' => ['type' => 'string'],
                    'agentVersion' => ['type' => 'string'],
                    'hostName' => ['type' => 'string'],
                    'lastHeartbeat' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'versionStatus' => ['type' => 'string'],
                    'sslCertExpiryDate' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'sslCertExpiryRemainingDays' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'psTemplateVersion' => ['type' => 'string']
                ],
                'required' => []
            ],
            'VMNicDetails' => [
                'properties' => [
                    'nicId' => ['type' => 'string'],
                    'replicaNicId' => ['type' => 'string'],
                    'sourceNicArmId' => ['type' => 'string'],
                    'vMSubnetName' => ['type' => 'string'],
                    'vMNetworkName' => ['type' => 'string'],
                    'recoveryVMNetworkId' => ['type' => 'string'],
                    'recoveryVMSubnetName' => ['type' => 'string'],
                    'ipAddressType' => ['type' => 'string'],
                    'primaryNicStaticIPAddress' => ['type' => 'string'],
                    'replicaNicStaticIPAddress' => ['type' => 'string'],
                    'selectionType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InitialReplicationDetails' => [
                'properties' => [
                    'initialReplicationType' => ['type' => 'string'],
                    'initialReplicationProgressPercentage' => ['type' => 'string']
                ],
                'required' => []
            ],
            'DiskDetails' => [
                'properties' => [
                    'maxSizeMB' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'vhdType' => ['type' => 'string'],
                    'vhdId' => ['type' => 'string'],
                    'vhdName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplicaBaseReplicationDetails' => [
                'properties' => [
                    'lastReplicatedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'vmNics' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VMNicDetails']
                    ],
                    'vmId' => ['type' => 'string'],
                    'vmProtectionState' => ['type' => 'string'],
                    'vmProtectionStateDescription' => ['type' => 'string'],
                    'initialReplicationDetails' => ['$ref' => '#/definitions/InitialReplicationDetails'],
                    'vMDiskDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DiskDetails']
                    ]
                ],
                'required' => []
            ],
            'HyperVReplica2012' => [
                'properties' => [
                    'lastReplicatedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'vmNics' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VMNicDetails']
                    ],
                    'vmId' => ['type' => 'string'],
                    'vmProtectionState' => ['type' => 'string'],
                    'vmProtectionStateDescription' => ['type' => 'string'],
                    'initialReplicationDetails' => ['$ref' => '#/definitions/InitialReplicationDetails'],
                    'vMDiskDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DiskDetails']
                    ]
                ],
                'required' => []
            ],
            'HyperVReplica2012R2' => [
                'properties' => [
                    'lastReplicatedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'vmNics' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VMNicDetails']
                    ],
                    'vmId' => ['type' => 'string'],
                    'vmProtectionState' => ['type' => 'string'],
                    'vmProtectionStateDescription' => ['type' => 'string'],
                    'initialReplicationDetails' => ['$ref' => '#/definitions/InitialReplicationDetails'],
                    'vMDiskDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DiskDetails']
                    ]
                ],
                'required' => []
            ],
            'AzureVmDiskDetails' => [
                'properties' => [
                    'vhdType' => ['type' => 'string'],
                    'vhdId' => ['type' => 'string'],
                    'vhdName' => ['type' => 'string'],
                    'maxSizeMB' => ['type' => 'string'],
                    'targetDiskLocation' => ['type' => 'string'],
                    'targetDiskName' => ['type' => 'string'],
                    'lunId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'OSDetails' => [
                'properties' => [
                    'osType' => ['type' => 'string'],
                    'productType' => ['type' => 'string'],
                    'osEdition' => ['type' => 'string'],
                    'oSVersion' => ['type' => 'string'],
                    'oSMajorVersion' => ['type' => 'string'],
                    'oSMinorVersion' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplicaAzure' => [
                'properties' => [
                    'azureVMDiskDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AzureVmDiskDetails']
                    ],
                    'recoveryAzureVMName' => ['type' => 'string'],
                    'recoveryAzureVMSize' => ['type' => 'string'],
                    'recoveryAzureStorageAccount' => ['type' => 'string'],
                    'recoveryAzureLogStorageAccountId' => ['type' => 'string'],
                    'lastReplicatedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'vmId' => ['type' => 'string'],
                    'vmProtectionState' => ['type' => 'string'],
                    'vmProtectionStateDescription' => ['type' => 'string'],
                    'initialReplicationDetails' => ['$ref' => '#/definitions/InitialReplicationDetails'],
                    'vmNics' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VMNicDetails']
                    ],
                    'selectedRecoveryAzureNetworkId' => ['type' => 'string'],
                    'encryption' => ['type' => 'string'],
                    'oSDetails' => ['$ref' => '#/definitions/OSDetails'],
                    'sourceVmRAMSizeInMB' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'sourceVmCPUCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'enableRDPOnTargetOption' => ['type' => 'string'],
                    'recoveryAzureResourceGroupId' => ['type' => 'string'],
                    'recoveryAvailabilitySetId' => ['type' => 'string'],
                    'useManagedDisks' => ['type' => 'string'],
                    'licenseType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMageAzureV2ProtectedDiskDetails' => [
                'properties' => [
                    'diskId' => ['type' => 'string'],
                    'diskName' => ['type' => 'string'],
                    'protectionStage' => ['type' => 'string'],
                    'healthErrorCode' => ['type' => 'string'],
                    'rpoInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'resyncRequired' => ['type' => 'string'],
                    'resyncProgressPercentage' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'resyncDurationInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'diskCapacityInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'fileSystemCapacityInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'sourceDataInMegaBytes' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'psDataInMegaBytes' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'targetDataInMegaBytes' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'diskResized' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMageAzureV2' => [
                'properties' => [
                    'infrastructureVmId' => ['type' => 'string'],
                    'vCenterInfrastructureId' => ['type' => 'string'],
                    'protectionStage' => ['type' => 'string'],
                    'vmId' => ['type' => 'string'],
                    'vmProtectionState' => ['type' => 'string'],
                    'vmProtectionStateDescription' => ['type' => 'string'],
                    'resyncProgressPercentage' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'rpoInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'compressedDataRateInMB' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'uncompressedDataRateInMB' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'ipAddress' => ['type' => 'string'],
                    'agentVersion' => ['type' => 'string'],
                    'isAgentUpdateRequired' => ['type' => 'string'],
                    'isRebootAfterUpdateRequired' => ['type' => 'string'],
                    'lastHeartbeat' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'processServerId' => ['type' => 'string'],
                    'multiVmGroupId' => ['type' => 'string'],
                    'multiVmGroupName' => ['type' => 'string'],
                    'multiVmSyncStatus' => ['type' => 'string'],
                    'protectedDisks' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InMageAzureV2ProtectedDiskDetails']
                    ],
                    'diskResized' => ['type' => 'string'],
                    'masterTargetId' => ['type' => 'string'],
                    'sourceVmCPUCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'sourceVmRAMSizeInMB' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'osType' => ['type' => 'string'],
                    'vhdName' => ['type' => 'string'],
                    'osDiskId' => ['type' => 'string'],
                    'azureVMDiskDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AzureVmDiskDetails']
                    ],
                    'recoveryAzureVMName' => ['type' => 'string'],
                    'recoveryAzureVMSize' => ['type' => 'string'],
                    'recoveryAzureStorageAccount' => ['type' => 'string'],
                    'recoveryAzureLogStorageAccountId' => ['type' => 'string'],
                    'vmNics' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VMNicDetails']
                    ],
                    'selectedRecoveryAzureNetworkId' => ['type' => 'string'],
                    'discoveryType' => ['type' => 'string'],
                    'enableRDPOnTargetOption' => ['type' => 'string'],
                    'datastores' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'targetVmId' => ['type' => 'string'],
                    'recoveryAzureResourceGroupId' => ['type' => 'string'],
                    'recoveryAvailabilitySetId' => ['type' => 'string'],
                    'useManagedDisks' => ['type' => 'string'],
                    'licenseType' => ['type' => 'string'],
                    'validationErrors' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HealthError']
                    ]
                ],
                'required' => []
            ],
            'OSDiskDetails' => [
                'properties' => [
                    'osVhdId' => ['type' => 'string'],
                    'osType' => ['type' => 'string'],
                    'vhdName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMageProtectedDiskDetails' => [
                'properties' => [
                    'diskId' => ['type' => 'string'],
                    'diskName' => ['type' => 'string'],
                    'protectionStage' => ['type' => 'string'],
                    'healthErrorCode' => ['type' => 'string'],
                    'rpoInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'resyncRequired' => ['type' => 'string'],
                    'resyncProgressPercentage' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'resyncDurationInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'diskCapacityInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'fileSystemCapacityInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'sourceDataInMB' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'psDataInMB' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'targetDataInMB' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'diskResized' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMageAgentDetails' => [
                'properties' => [
                    'agentVersion' => ['type' => 'string'],
                    'agentUpdateStatus' => ['type' => 'string'],
                    'postUpdateRebootStatus' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMage' => [
                'properties' => [
                    'activeSiteType' => ['type' => 'string'],
                    'sourceVmCPUCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'sourceVmRAMSizeInMB' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'osDetails' => ['$ref' => '#/definitions/OSDiskDetails'],
                    'protectionStage' => ['type' => 'string'],
                    'vmId' => ['type' => 'string'],
                    'vmProtectionState' => ['type' => 'string'],
                    'vmProtectionStateDescription' => ['type' => 'string'],
                    'resyncDetails' => ['$ref' => '#/definitions/InitialReplicationDetails'],
                    'retentionWindowStart' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'retentionWindowEnd' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'compressedDataRateInMB' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'uncompressedDataRateInMB' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'rpoInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'protectedDisks' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InMageProtectedDiskDetails']
                    ],
                    'ipAddress' => ['type' => 'string'],
                    'lastHeartbeat' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'processServerId' => ['type' => 'string'],
                    'masterTargetId' => ['type' => 'string'],
                    'consistencyPoints' => [
                        'type' => 'object',
                        'additionalProperties' => [
                            'type' => 'string',
                            'format' => 'date-time'
                        ]
                    ],
                    'diskResized' => ['type' => 'string'],
                    'rebootAfterUpdateStatus' => ['type' => 'string'],
                    'multiVmGroupId' => ['type' => 'string'],
                    'multiVmGroupName' => ['type' => 'string'],
                    'multiVmSyncStatus' => ['type' => 'string'],
                    'agentDetails' => ['$ref' => '#/definitions/InMageAgentDetails'],
                    'vCenterInfrastructureId' => ['type' => 'string'],
                    'infrastructureVmId' => ['type' => 'string'],
                    'vmNics' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VMNicDetails']
                    ],
                    'discoveryType' => ['type' => 'string'],
                    'azureStorageAccountId' => ['type' => 'string'],
                    'datastores' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'validationErrors' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HealthError']
                    ]
                ],
                'required' => []
            ],
            'A2AProtectedDiskDetails' => [
                'properties' => [
                    'diskUri' => ['type' => 'string'],
                    'diskName' => ['type' => 'string'],
                    'diskCapacityInBytes' => [
                        'type' => 'integer',
                        'format' => 'int64'
                    ],
                    'recoveryAzureStorageAccountId' => ['type' => 'string'],
                    'primaryStagingAzureStorageAccountId' => ['type' => 'string'],
                    'primaryDiskAzureStorageAccountId' => ['type' => 'string'],
                    'recoveryDiskUri' => ['type' => 'string'],
                    'diskType' => ['type' => 'string'],
                    'resyncRequired' => ['type' => 'boolean'],
                    'monitoringPercentageCompletion' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'monitoringJobType' => ['type' => 'string'],
                    'dataPendingInStagingStorageAccountInMB' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'dataPendingAtSourceAgentInMB' => [
                        'type' => 'number',
                        'format' => 'double'
                    ]
                ],
                'required' => []
            ],
            'RoleAssignment' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'scope' => ['type' => 'string'],
                    'principalId' => ['type' => 'string'],
                    'roleDefinitionId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InputEndpoint' => [
                'properties' => [
                    'endpointName' => ['type' => 'string'],
                    'privatePort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'publicPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'protocol' => ['type' => 'string']
                ],
                'required' => []
            ],
            'AzureToAzureVmSyncedConfigDetails' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'roleAssignments' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RoleAssignment']
                    ],
                    'inputEndpoints' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InputEndpoint']
                    ]
                ],
                'required' => []
            ],
            'A2A' => [
                'properties' => [
                    'fabricObjectId' => ['type' => 'string'],
                    'multiVmGroupId' => ['type' => 'string'],
                    'multiVmGroupName' => ['type' => 'string'],
                    'managementId' => ['type' => 'string'],
                    'protectedDisks' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/A2AProtectedDiskDetails']
                    ],
                    'primaryFabricLocation' => ['type' => 'string'],
                    'recoveryFabricLocation' => ['type' => 'string'],
                    'osType' => ['type' => 'string'],
                    'recoveryAzureVMSize' => ['type' => 'string'],
                    'recoveryAzureVMName' => ['type' => 'string'],
                    'recoveryAzureResourceGroupId' => ['type' => 'string'],
                    'recoveryCloudService' => ['type' => 'string'],
                    'recoveryAvailabilitySet' => ['type' => 'string'],
                    'selectedRecoveryAzureNetworkId' => ['type' => 'string'],
                    'vmNics' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/VMNicDetails']
                    ],
                    'vmSyncedConfigDetails' => ['$ref' => '#/definitions/AzureToAzureVmSyncedConfigDetails'],
                    'monitoringPercentageCompletion' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'monitoringJobType' => ['type' => 'string'],
                    'lastHeartbeat' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'agentVersion' => ['type' => 'string'],
                    'isReplicationAgentUpdateRequired' => ['type' => 'boolean'],
                    'recoveryFabricObjectId' => ['type' => 'string'],
                    'vmProtectionState' => ['type' => 'string'],
                    'vmProtectionStateDescription' => ['type' => 'string'],
                    'lifecycleId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplicaAzure' => [
                'properties' => [
                    'hvHostVmId' => ['type' => 'string'],
                    'vmName' => ['type' => 'string'],
                    'osType' => ['type' => 'string'],
                    'vhdId' => ['type' => 'string'],
                    'targetStorageAccountId' => ['type' => 'string'],
                    'targetAzureNetworkId' => ['type' => 'string'],
                    'targetAzureSubnetId' => ['type' => 'string'],
                    'enableRDPOnTargetOption' => ['type' => 'string'],
                    'targetAzureVmName' => ['type' => 'string'],
                    'logStorageAccountId' => ['type' => 'string'],
                    'disksToInclude' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'targetAzureV1ResourceGroupId' => ['type' => 'string'],
                    'targetAzureV2ResourceGroupId' => ['type' => 'string'],
                    'useManagedDisks' => ['type' => 'string']
                ],
                'required' => []
            ],
            'San' => [
                'properties' => [],
                'required' => []
            ],
            'InMageAzureV2' => [
                'properties' => [
                    'masterTargetId' => ['type' => 'string'],
                    'processServerId' => ['type' => 'string'],
                    'storageAccountId' => ['type' => 'string'],
                    'runAsAccountId' => ['type' => 'string'],
                    'multiVmGroupId' => ['type' => 'string'],
                    'multiVmGroupName' => ['type' => 'string'],
                    'disksToInclude' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'targetAzureNetworkId' => ['type' => 'string'],
                    'targetAzureSubnetId' => ['type' => 'string'],
                    'enableRDPOnTargetOption' => ['type' => 'string'],
                    'targetAzureVmName' => ['type' => 'string'],
                    'logStorageAccountId' => ['type' => 'string'],
                    'targetAzureV1ResourceGroupId' => ['type' => 'string'],
                    'targetAzureV2ResourceGroupId' => ['type' => 'string'],
                    'useManagedDisks' => ['type' => 'string']
                ],
                'required' => ['storageAccountId']
            ],
            'InMageVolumeExclusionOptions' => [
                'properties' => [
                    'volumeLabel' => ['type' => 'string'],
                    'OnlyExcludeIfSingleVolume' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMageDiskSignatureExclusionOptions' => [
                'properties' => ['diskSignature' => ['type' => 'string']],
                'required' => []
            ],
            'InMageDiskExclusionInput' => [
                'properties' => [
                    'volumeOptions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InMageVolumeExclusionOptions']
                    ],
                    'diskSignatureOptions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InMageDiskSignatureExclusionOptions']
                    ]
                ],
                'required' => []
            ],
            'InMage' => [
                'properties' => [
                    'vmFriendlyName' => ['type' => 'string'],
                    'masterTargetId' => ['type' => 'string'],
                    'processServerId' => ['type' => 'string'],
                    'retentionDrive' => ['type' => 'string'],
                    'runAsAccountId' => ['type' => 'string'],
                    'multiVmGroupId' => ['type' => 'string'],
                    'multiVmGroupName' => ['type' => 'string'],
                    'datastoreName' => ['type' => 'string'],
                    'diskExclusionInput' => ['$ref' => '#/definitions/InMageDiskExclusionInput'],
                    'disksToInclude' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'A2AVmDiskInputDetails' => [
                'properties' => [
                    'diskUri' => ['type' => 'string'],
                    'recoveryAzureStorageAccountId' => ['type' => 'string'],
                    'primaryStagingAzureStorageAccountId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'A2A' => [
                'properties' => [
                    'fabricObjectId' => ['type' => 'string'],
                    'recoveryContainerId' => ['type' => 'string'],
                    'recoveryResourceGroupId' => ['type' => 'string'],
                    'recoveryCloudServiceId' => ['type' => 'string'],
                    'recoveryAvailabilitySetId' => ['type' => 'string'],
                    'vmDisks' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/A2AVmDiskInputDetails']
                    ]
                ],
                'required' => []
            ],
            'Resource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'location' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplicaAzure' => [
                'properties' => [
                    'recoveryAzureV1ResourceGroupId' => ['type' => 'string'],
                    'recoveryAzureV2ResourceGroupId' => ['type' => 'string'],
                    'useManagedDisks' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMageAzureV2' => [
                'properties' => [
                    'recoveryAzureV1ResourceGroupId' => ['type' => 'string'],
                    'recoveryAzureV2ResourceGroupId' => ['type' => 'string'],
                    'useManagedDisks' => ['type' => 'string']
                ],
                'required' => []
            ],
            'A2A' => [
                'properties' => [
                    'recoveryCloudServiceId' => ['type' => 'string'],
                    'recoveryResourceGroupId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplicaBaseEventDetails' => [
                'properties' => [
                    'containerName' => ['type' => 'string'],
                    'fabricName' => ['type' => 'string'],
                    'remoteContainerName' => ['type' => 'string'],
                    'remoteFabricName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplica2012' => [
                'properties' => [
                    'containerName' => ['type' => 'string'],
                    'fabricName' => ['type' => 'string'],
                    'remoteContainerName' => ['type' => 'string'],
                    'remoteFabricName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplica2012R2' => [
                'properties' => [
                    'containerName' => ['type' => 'string'],
                    'fabricName' => ['type' => 'string'],
                    'remoteContainerName' => ['type' => 'string'],
                    'remoteFabricName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplicaAzure' => [
                'properties' => [
                    'containerName' => ['type' => 'string'],
                    'fabricName' => ['type' => 'string'],
                    'remoteContainerName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'A2A' => [
                'properties' => [
                    'protectedItemName' => ['type' => 'string'],
                    'fabricObjectId' => ['type' => 'string'],
                    'fabricName' => ['type' => 'string'],
                    'fabricLocation' => ['type' => 'string'],
                    'remoteFabricName' => ['type' => 'string'],
                    'remoteFabricLocation' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMageAzureV2' => [
                'properties' => [
                    'eventType' => ['type' => 'string'],
                    'category' => ['type' => 'string'],
                    'component' => ['type' => 'string'],
                    'correctiveAction' => ['type' => 'string'],
                    'details' => ['type' => 'string'],
                    'summary' => ['type' => 'string'],
                    'siteName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'JobStatus' => [
                'properties' => [
                    'jobId' => ['type' => 'string'],
                    'jobFriendlyName' => ['type' => 'string'],
                    'jobStatus' => ['type' => 'string'],
                    'affectedObjectType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVVirtualMachine' => [
                'properties' => [
                    'sourceItemId' => ['type' => 'string'],
                    'generation' => ['type' => 'string'],
                    'osDetails' => ['$ref' => '#/definitions/OSDetails'],
                    'diskDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DiskDetails']
                    ]
                ],
                'required' => []
            ],
            'DiskVolumeDetails' => [
                'properties' => [
                    'label' => ['type' => 'string'],
                    'name' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMageDiskDetails' => [
                'properties' => [
                    'diskId' => ['type' => 'string'],
                    'diskName' => ['type' => 'string'],
                    'diskSizeInMB' => ['type' => 'string'],
                    'diskType' => ['type' => 'string'],
                    'diskConfiguration' => ['type' => 'string'],
                    'volumeList' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/DiskVolumeDetails']
                    ]
                ],
                'required' => []
            ],
            'VMwareVirtualMachine' => [
                'properties' => [
                    'agentGeneratedId' => ['type' => 'string'],
                    'agentInstalled' => ['type' => 'string'],
                    'osType' => ['type' => 'string'],
                    'agentVersion' => ['type' => 'string'],
                    'ipAddress' => ['type' => 'string'],
                    'poweredOn' => ['type' => 'string'],
                    'vCenterInfrastructureId' => ['type' => 'string'],
                    'discoveryType' => ['type' => 'string'],
                    'diskDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/InMageDiskDetails']
                    ],
                    'validationErrors' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/HealthError']
                    ]
                ],
                'required' => []
            ],
            'ReplicationGroupDetails' => [
                'properties' => [],
                'required' => []
            ],
            'InMage' => [
                'properties' => ['replicaVmDeletionStatus' => ['type' => 'string']],
                'required' => []
            ],
            'HyperVReplicaAzure' => [
                'properties' => [
                    'vaultLocation' => ['type' => 'string'],
                    'primaryKekCertificatePfx' => ['type' => 'string'],
                    'secondaryKekCertificatePfx' => ['type' => 'string'],
                    'recoveryPointId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplicaAzureFailback' => [
                'properties' => [
                    'dataSyncOption' => ['type' => 'string'],
                    'recoveryVmCreationOption' => ['type' => 'string'],
                    'providerIdForAlternateRecovery' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMageAzureV2' => [
                'properties' => [
                    'vaultLocation' => ['type' => 'string'],
                    'recoveryPointId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMage' => [
                'properties' => [
                    'recoveryPointType' => ['type' => 'string'],
                    'recoveryPointId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'A2A' => [
                'properties' => [
                    'recoveryPointId' => ['type' => 'string'],
                    'cloudServiceCreationOption' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplicaAzure' => [
                'properties' => [
                    'hvHostVmId' => ['type' => 'string'],
                    'vmName' => ['type' => 'string'],
                    'osType' => ['type' => 'string'],
                    'vHDId' => ['type' => 'string'],
                    'storageAccountId' => ['type' => 'string'],
                    'logStorageAccountId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMageAzureV2' => [
                'properties' => [
                    'masterTargetId' => ['type' => 'string'],
                    'processServerId' => ['type' => 'string'],
                    'storageAccountId' => ['type' => 'string'],
                    'runAsAccountId' => ['type' => 'string'],
                    'policyId' => ['type' => 'string'],
                    'logStorageAccountId' => ['type' => 'string'],
                    'disksToInclude' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'InMage' => [
                'properties' => [
                    'masterTargetId' => ['type' => 'string'],
                    'processServerId' => ['type' => 'string'],
                    'retentionDrive' => ['type' => 'string'],
                    'runAsAccountId' => ['type' => 'string'],
                    'datastoreName' => ['type' => 'string'],
                    'diskExclusionInput' => ['$ref' => '#/definitions/InMageDiskExclusionInput'],
                    'profileId' => ['type' => 'string'],
                    'disksToInclude' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'A2A' => [
                'properties' => [
                    'recoveryContainerId' => ['type' => 'string'],
                    'vmDisks' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/A2AVmDiskInputDetails']
                    ],
                    'recoveryResourceGroupId' => ['type' => 'string'],
                    'recoveryCloudServiceId' => ['type' => 'string'],
                    'recoveryAvailabilitySetId' => ['type' => 'string'],
                    'policyId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplicaAzure' => [
                'properties' => [
                    'vaultLocation' => ['type' => 'string'],
                    'primaryKekCertificatePfx' => ['type' => 'string'],
                    'secondaryKekCertificatePfx' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMageAzureV2' => [
                'properties' => ['vaultLocation' => ['type' => 'string']],
                'required' => []
            ],
            'A2A' => [
                'properties' => [],
                'required' => []
            ],
            'JobEntity' => [
                'properties' => [
                    'jobId' => ['type' => 'string'],
                    'jobFriendlyName' => ['type' => 'string'],
                    'targetObjectId' => ['type' => 'string'],
                    'targetObjectName' => ['type' => 'string'],
                    'targetInstanceType' => ['type' => 'string'],
                    'jobScenarioName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'JobTaskDetails' => [
                'properties' => ['jobTask' => ['$ref' => '#/definitions/JobEntity']],
                'required' => []
            ],
            'VirtualMachineTaskDetails' => [
                'properties' => [
                    'skippedReason' => ['type' => 'string'],
                    'skippedReasonString' => ['type' => 'string'],
                    'jobTask' => ['$ref' => '#/definitions/JobEntity']
                ],
                'required' => []
            ],
            'FabricReplicationGroupTaskDetails' => [
                'properties' => [
                    'skippedReason' => ['type' => 'string'],
                    'skippedReasonString' => ['type' => 'string'],
                    'jobTask' => ['$ref' => '#/definitions/JobEntity']
                ],
                'required' => []
            ],
            'ManualActionTaskDetails' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'instructions' => ['type' => 'string'],
                    'observation' => ['type' => 'string']
                ],
                'required' => []
            ],
            'ScriptActionTaskDetails' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'path' => ['type' => 'string'],
                    'output' => ['type' => 'string'],
                    'isPrimarySideScript' => ['type' => 'boolean']
                ],
                'required' => []
            ],
            'VmNicUpdatesTaskDetails' => [
                'properties' => [
                    'vmId' => ['type' => 'string'],
                    'nicId' => ['type' => 'string'],
                    'name' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InconsistentVmDetails' => [
                'properties' => [
                    'vmName' => ['type' => 'string'],
                    'cloudName' => ['type' => 'string'],
                    'details' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'errorIds' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'ConsistencyCheckTaskDetails' => [
                'properties' => ['vmDetails' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/InconsistentVmDetails']
                ]],
                'required' => []
            ],
            'AutomationRunbookTaskDetails' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'cloudServiceName' => ['type' => 'string'],
                    'subscriptionId' => ['type' => 'string'],
                    'accountName' => ['type' => 'string'],
                    'runbookId' => ['type' => 'string'],
                    'runbookName' => ['type' => 'string'],
                    'jobId' => ['type' => 'string'],
                    'jobOutput' => ['type' => 'string'],
                    'isPrimarySideScript' => ['type' => 'boolean']
                ],
                'required' => []
            ],
            'InlineWorkflowTaskDetails' => [
                'properties' => ['workflowIds' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]],
                'required' => []
            ],
            'RecoveryPlanGroupTaskDetails' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'groupId' => ['type' => 'string'],
                    'rpGroupType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'RecoveryPlanShutdownGroupTaskDetails' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'groupId' => ['type' => 'string'],
                    'rpGroupType' => ['type' => 'string']
                ],
                'required' => []
            ],
            'AsrJobDetails' => [
                'properties' => [],
                'required' => []
            ],
            'TestFailoverReplicationProtectedItemDetails' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'friendlyName' => ['type' => 'string'],
                    'testVmName' => ['type' => 'string'],
                    'testVmFriendlyName' => ['type' => 'string'],
                    'networkConnectionStatus' => ['type' => 'string'],
                    'networkFriendlyName' => ['type' => 'string'],
                    'subnet' => ['type' => 'string']
                ],
                'required' => []
            ],
            'TestFailoverJobDetails' => [
                'properties' => [
                    'testFailoverStatus' => ['type' => 'string'],
                    'comments' => ['type' => 'string'],
                    'networkName' => ['type' => 'string'],
                    'networkFriendlyName' => ['type' => 'string'],
                    'networkType' => ['type' => 'string'],
                    'protectedItemDetails' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/TestFailoverReplicationProtectedItemDetails']
                    ]
                ],
                'required' => []
            ],
            'ExportJobDetails' => [
                'properties' => [
                    'blobUri' => ['type' => 'string'],
                    'sasToken' => ['type' => 'string']
                ],
                'required' => []
            ],
            'SwitchProtectionJobDetails' => [
                'properties' => ['newReplicationProtectedItemId' => ['type' => 'string']],
                'required' => []
            ],
            'A2A' => [
                'properties' => [],
                'required' => []
            ],
            'A2A' => [
                'properties' => [
                    'recoveryContainerId' => ['type' => 'string'],
                    'vmDisks' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/A2AVmDiskInputDetails']
                    ],
                    'recoveryResourceGroupId' => ['type' => 'string'],
                    'recoveryCloudServiceId' => ['type' => 'string'],
                    'recoveryAvailabilitySetId' => ['type' => 'string'],
                    'policyId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplicaAzure' => [
                'properties' => [
                    'recoveryPointHistoryDurationInHours' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'applicationConsistentSnapshotFrequencyInHours' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'replicationInterval' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'onlineReplicationStartTime' => ['type' => 'string'],
                    'encryption' => ['type' => 'string'],
                    'activeStorageAccountId' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplicaBasePolicyDetails' => [
                'properties' => [
                    'recoveryPoints' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'applicationConsistentSnapshotFrequencyInHours' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'compression' => ['type' => 'string'],
                    'initialReplicationMethod' => ['type' => 'string'],
                    'onlineReplicationStartTime' => ['type' => 'string'],
                    'offlineReplicationImportPath' => ['type' => 'string'],
                    'offlineReplicationExportPath' => ['type' => 'string'],
                    'replicationPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'allowedAuthenticationType' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'replicaDeletionOption' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplica2012' => [
                'properties' => [
                    'recoveryPoints' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'applicationConsistentSnapshotFrequencyInHours' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'compression' => ['type' => 'string'],
                    'initialReplicationMethod' => ['type' => 'string'],
                    'onlineReplicationStartTime' => ['type' => 'string'],
                    'offlineReplicationImportPath' => ['type' => 'string'],
                    'offlineReplicationExportPath' => ['type' => 'string'],
                    'replicationPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'allowedAuthenticationType' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'replicaDeletionOption' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplica2012R2' => [
                'properties' => [
                    'replicationFrequencyInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'recoveryPoints' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'applicationConsistentSnapshotFrequencyInHours' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'compression' => ['type' => 'string'],
                    'initialReplicationMethod' => ['type' => 'string'],
                    'onlineReplicationStartTime' => ['type' => 'string'],
                    'offlineReplicationImportPath' => ['type' => 'string'],
                    'offlineReplicationExportPath' => ['type' => 'string'],
                    'replicationPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'allowedAuthenticationType' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'replicaDeletionOption' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMageBasePolicyDetails' => [
                'properties' => [
                    'recoveryPointThresholdInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'recoveryPointHistory' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'appConsistentFrequencyInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'multiVmSyncStatus' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMageAzureV2' => [
                'properties' => [
                    'crashConsistentFrequencyInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'recoveryPointThresholdInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'recoveryPointHistory' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'appConsistentFrequencyInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'multiVmSyncStatus' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMage' => [
                'properties' => [
                    'recoveryPointThresholdInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'recoveryPointHistory' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'appConsistentFrequencyInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'multiVmSyncStatus' => ['type' => 'string']
                ],
                'required' => []
            ],
            'A2A' => [
                'properties' => [
                    'recoveryPointThresholdInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'recoveryPointHistory' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'appConsistentFrequencyInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'multiVmSyncStatus' => ['type' => 'string'],
                    'crashConsistentFrequencyInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'HyperVReplicaAzure' => [
                'properties' => [
                    'recoveryPointHistoryDuration' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'applicationConsistentSnapshotFrequencyInHours' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'replicationInterval' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'onlineReplicationStartTime' => ['type' => 'string'],
                    'encryption' => ['type' => 'string'],
                    'storageAccounts' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'required' => []
            ],
            'HyperVReplica2012' => [
                'properties' => [
                    'recoveryPoints' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'applicationConsistentSnapshotFrequencyInHours' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'compression' => ['type' => 'string'],
                    'initialReplicationMethod' => ['type' => 'string'],
                    'onlineReplicationStartTime' => ['type' => 'string'],
                    'offlineReplicationImportPath' => ['type' => 'string'],
                    'offlineReplicationExportPath' => ['type' => 'string'],
                    'replicationPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'allowedAuthenticationType' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'replicaDeletion' => ['type' => 'string']
                ],
                'required' => []
            ],
            'HyperVReplica2012R2' => [
                'properties' => [
                    'replicationFrequencyInSeconds' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'recoveryPoints' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'applicationConsistentSnapshotFrequencyInHours' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'compression' => ['type' => 'string'],
                    'initialReplicationMethod' => ['type' => 'string'],
                    'onlineReplicationStartTime' => ['type' => 'string'],
                    'offlineReplicationImportPath' => ['type' => 'string'],
                    'offlineReplicationExportPath' => ['type' => 'string'],
                    'replicationPort' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'allowedAuthenticationType' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'replicaDeletion' => ['type' => 'string']
                ],
                'required' => []
            ],
            'InMageAzureV2' => [
                'properties' => [
                    'recoveryPointThresholdInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'recoveryPointHistory' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'crashConsistentFrequencyInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'appConsistentFrequencyInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'multiVmSyncStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Enable',
                            'Disable'
                        ]
                    ]
                ],
                'required' => ['multiVmSyncStatus']
            ],
            'InMage' => [
                'properties' => [
                    'recoveryPointThresholdInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'recoveryPointHistory' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'appConsistentFrequencyInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'multiVmSyncStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Enable',
                            'Disable'
                        ]
                    ]
                ],
                'required' => ['multiVmSyncStatus']
            ],
            'A2A' => [
                'properties' => [
                    'recoveryPointHistory' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'crashConsistentFrequencyInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'appConsistentFrequencyInMinutes' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'multiVmSyncStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'Enable',
                            'Disable'
                        ]
                    ]
                ],
                'required' => ['multiVmSyncStatus']
            ],
            'ScriptActionDetails' => [
                'properties' => [
                    'path' => ['type' => 'string'],
                    'timeout' => ['type' => 'string'],
                    'fabricLocation' => [
                        'type' => 'string',
                        'enum' => [
                            'Primary',
                            'Recovery'
                        ]
                    ]
                ],
                'required' => [
                    'path',
                    'fabricLocation'
                ]
            ],
            'AutomationRunbookActionDetails' => [
                'properties' => [
                    'runbookId' => ['type' => 'string'],
                    'timeout' => ['type' => 'string'],
                    'fabricLocation' => [
                        'type' => 'string',
                        'enum' => [
                            'Primary',
                            'Recovery'
                        ]
                    ]
                ],
                'required' => ['fabricLocation']
            ],
            'ManualActionDetails' => [
                'properties' => ['description' => ['type' => 'string']],
                'required' => []
            ],
            'HyperVReplicaAzure' => [
                'properties' => [
                    'vaultLocation' => ['type' => 'string'],
                    'primaryKekCertificatePfx' => ['type' => 'string'],
                    'secondaryKekCertificatePfx' => ['type' => 'string'],
                    'recoveryPointType' => [
                        'type' => 'string',
                        'enum' => [
                            'Latest',
                            'LatestApplicationConsistent',
                            'LatestProcessed'
                        ]
                    ]
                ],
                'required' => ['vaultLocation']
            ],
            'HyperVReplicaAzureFailback' => [
                'properties' => [
                    'dataSyncOption' => [
                        'type' => 'string',
                        'enum' => [
                            'ForDownTime',
                            'ForSynchronization'
                        ]
                    ],
                    'recoveryVmCreationOption' => [
                        'type' => 'string',
                        'enum' => [
                            'CreateVmIfNotFound',
                            'NoAction'
                        ]
                    ]
                ],
                'required' => [
                    'dataSyncOption',
                    'recoveryVmCreationOption'
                ]
            ],
            'InMageAzureV2' => [
                'properties' => [
                    'vaultLocation' => ['type' => 'string'],
                    'recoveryPointType' => [
                        'type' => 'string',
                        'enum' => [
                            'Latest',
                            'LatestApplicationConsistent',
                            'LatestCrashConsistent',
                            'LatestProcessed'
                        ]
                    ]
                ],
                'required' => [
                    'vaultLocation',
                    'recoveryPointType'
                ]
            ],
            'InMage' => [
                'properties' => ['recoveryPointType' => [
                    'type' => 'string',
                    'enum' => [
                        'LatestTime',
                        'LatestTag',
                        'Custom'
                    ]
                ]],
                'required' => ['recoveryPointType']
            ],
            'A2A' => [
                'properties' => [
                    'recoveryPointType' => [
                        'type' => 'string',
                        'enum' => [
                            'Latest',
                            'LatestApplicationConsistent',
                            'LatestCrashConsistent',
                            'LatestProcessed'
                        ]
                    ],
                    'cloudServiceCreationOption' => ['type' => 'string']
                ],
                'required' => ['recoveryPointType']
            ],
            'A2A' => [
                'properties' => ['location' => ['type' => 'string']],
                'required' => []
            ]
        ]
    ];
}
