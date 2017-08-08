<?php
namespace Microsoft\Azure\Management\Sql\_2014_04_01;
final class SqlManagementClient
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
        $this->_DatabaseAdvisors_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseAdvisors($_client);
        $this->_BackupLongTermRetentionPolicies_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\BackupLongTermRetentionPolicies($_client);
        $this->_BackupLongTermRetentionVaults_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\BackupLongTermRetentionVaults($_client);
        $this->_RestorePoints_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\RestorePoints($_client);
        $this->_RecoverableDatabases_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\RecoverableDatabases($_client);
        $this->_RestorableDroppedDatabases_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\RestorableDroppedDatabases($_client);
        $this->_Capabilities_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\Capabilities($_client);
        $this->_ServerConnectionPolicies_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\ServerConnectionPolicies($_client);
        $this->_DatabaseThreatDetectionPolicies_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseThreatDetectionPolicies($_client);
        $this->_DataMaskingPolicies_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\DataMaskingPolicies($_client);
        $this->_DataMaskingRules_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\DataMaskingRules($_client);
        $this->_TransparentDataEncryptionConfigurations_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\TransparentDataEncryptionConfigurations($_client);
        $this->_FirewallRules_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\FirewallRules($_client);
        $this->_GeoBackupPolicies_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\GeoBackupPolicies($_client);
        $this->_Databases_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\Databases($_client);
        $this->_ElasticPools_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\ElasticPools($_client);
        $this->_Operations_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\Operations($_client);
        $this->_Queries_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\Queries($_client);
        $this->_QueryStatistics_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\QueryStatistics($_client);
        $this->_ReplicationLinks_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\ReplicationLinks($_client);
        $this->_ServerAzureADAdministrators_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\ServerAzureADAdministrators($_client);
        $this->_ServerCommunicationLinks_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\ServerCommunicationLinks($_client);
        $this->_Servers_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\Servers($_client);
        $this->_ServiceObjectives_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\ServiceObjectives($_client);
        $this->_ElasticPoolActivities_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\ElasticPoolActivities($_client);
        $this->_ElasticPoolDatabaseActivities_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\ElasticPoolDatabaseActivities($_client);
        $this->_RecommendedElasticPools_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\RecommendedElasticPools($_client);
        $this->_ServiceTierAdvisors_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\ServiceTierAdvisors($_client);
        $this->_TransparentDataEncryptions_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\TransparentDataEncryptions($_client);
        $this->_TransparentDataEncryptionActivities_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\TransparentDataEncryptionActivities($_client);
        $this->_ServerTableAuditingPolicies_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\ServerTableAuditingPolicies($_client);
        $this->_DatabaseTableAuditingPolicies_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseTableAuditingPolicies($_client);
        $this->_DatabaseConnectionPolicies_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseConnectionPolicies($_client);
        $this->_ServerUsages_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\ServerUsages($_client);
        $this->_DatabaseUsages_group = new \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseUsages($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseAdvisors
     */
    public function getDatabaseAdvisors()
    {
        return $this->_DatabaseAdvisors_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\BackupLongTermRetentionPolicies
     */
    public function getBackupLongTermRetentionPolicies()
    {
        return $this->_BackupLongTermRetentionPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\BackupLongTermRetentionVaults
     */
    public function getBackupLongTermRetentionVaults()
    {
        return $this->_BackupLongTermRetentionVaults_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\RestorePoints
     */
    public function getRestorePoints()
    {
        return $this->_RestorePoints_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\RecoverableDatabases
     */
    public function getRecoverableDatabases()
    {
        return $this->_RecoverableDatabases_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\RestorableDroppedDatabases
     */
    public function getRestorableDroppedDatabases()
    {
        return $this->_RestorableDroppedDatabases_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\Capabilities
     */
    public function getCapabilities()
    {
        return $this->_Capabilities_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\ServerConnectionPolicies
     */
    public function getServerConnectionPolicies()
    {
        return $this->_ServerConnectionPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseThreatDetectionPolicies
     */
    public function getDatabaseThreatDetectionPolicies()
    {
        return $this->_DatabaseThreatDetectionPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\DataMaskingPolicies
     */
    public function getDataMaskingPolicies()
    {
        return $this->_DataMaskingPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\DataMaskingRules
     */
    public function getDataMaskingRules()
    {
        return $this->_DataMaskingRules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\TransparentDataEncryptionConfigurations
     */
    public function getTransparentDataEncryptionConfigurations()
    {
        return $this->_TransparentDataEncryptionConfigurations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\FirewallRules
     */
    public function getFirewallRules()
    {
        return $this->_FirewallRules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\GeoBackupPolicies
     */
    public function getGeoBackupPolicies()
    {
        return $this->_GeoBackupPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\Databases
     */
    public function getDatabases()
    {
        return $this->_Databases_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\ElasticPools
     */
    public function getElasticPools()
    {
        return $this->_ElasticPools_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\Queries
     */
    public function getQueries()
    {
        return $this->_Queries_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\QueryStatistics
     */
    public function getQueryStatistics()
    {
        return $this->_QueryStatistics_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\ReplicationLinks
     */
    public function getReplicationLinks()
    {
        return $this->_ReplicationLinks_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\ServerAzureADAdministrators
     */
    public function getServerAzureADAdministrators()
    {
        return $this->_ServerAzureADAdministrators_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\ServerCommunicationLinks
     */
    public function getServerCommunicationLinks()
    {
        return $this->_ServerCommunicationLinks_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\Servers
     */
    public function getServers()
    {
        return $this->_Servers_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\ServiceObjectives
     */
    public function getServiceObjectives()
    {
        return $this->_ServiceObjectives_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\ElasticPoolActivities
     */
    public function getElasticPoolActivities()
    {
        return $this->_ElasticPoolActivities_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\ElasticPoolDatabaseActivities
     */
    public function getElasticPoolDatabaseActivities()
    {
        return $this->_ElasticPoolDatabaseActivities_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\RecommendedElasticPools
     */
    public function getRecommendedElasticPools()
    {
        return $this->_RecommendedElasticPools_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\ServiceTierAdvisors
     */
    public function getServiceTierAdvisors()
    {
        return $this->_ServiceTierAdvisors_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\TransparentDataEncryptions
     */
    public function getTransparentDataEncryptions()
    {
        return $this->_TransparentDataEncryptions_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\TransparentDataEncryptionActivities
     */
    public function getTransparentDataEncryptionActivities()
    {
        return $this->_TransparentDataEncryptionActivities_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\ServerTableAuditingPolicies
     */
    public function getServerTableAuditingPolicies()
    {
        return $this->_ServerTableAuditingPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseTableAuditingPolicies
     */
    public function getDatabaseTableAuditingPolicies()
    {
        return $this->_DatabaseTableAuditingPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseConnectionPolicies
     */
    public function getDatabaseConnectionPolicies()
    {
        return $this->_DatabaseConnectionPolicies_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\ServerUsages
     */
    public function getServerUsages()
    {
        return $this->_ServerUsages_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseUsages
     */
    public function getDatabaseUsages()
    {
        return $this->_DatabaseUsages_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseAdvisors
     */
    private $_DatabaseAdvisors_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\BackupLongTermRetentionPolicies
     */
    private $_BackupLongTermRetentionPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\BackupLongTermRetentionVaults
     */
    private $_BackupLongTermRetentionVaults_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\RestorePoints
     */
    private $_RestorePoints_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\RecoverableDatabases
     */
    private $_RecoverableDatabases_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\RestorableDroppedDatabases
     */
    private $_RestorableDroppedDatabases_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\Capabilities
     */
    private $_Capabilities_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\ServerConnectionPolicies
     */
    private $_ServerConnectionPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseThreatDetectionPolicies
     */
    private $_DatabaseThreatDetectionPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\DataMaskingPolicies
     */
    private $_DataMaskingPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\DataMaskingRules
     */
    private $_DataMaskingRules_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\TransparentDataEncryptionConfigurations
     */
    private $_TransparentDataEncryptionConfigurations_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\FirewallRules
     */
    private $_FirewallRules_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\GeoBackupPolicies
     */
    private $_GeoBackupPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\Databases
     */
    private $_Databases_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\ElasticPools
     */
    private $_ElasticPools_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\Operations
     */
    private $_Operations_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\Queries
     */
    private $_Queries_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\QueryStatistics
     */
    private $_QueryStatistics_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\ReplicationLinks
     */
    private $_ReplicationLinks_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\ServerAzureADAdministrators
     */
    private $_ServerAzureADAdministrators_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\ServerCommunicationLinks
     */
    private $_ServerCommunicationLinks_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\Servers
     */
    private $_Servers_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\ServiceObjectives
     */
    private $_ServiceObjectives_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\ElasticPoolActivities
     */
    private $_ElasticPoolActivities_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\ElasticPoolDatabaseActivities
     */
    private $_ElasticPoolDatabaseActivities_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\RecommendedElasticPools
     */
    private $_RecommendedElasticPools_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\ServiceTierAdvisors
     */
    private $_ServiceTierAdvisors_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\TransparentDataEncryptions
     */
    private $_TransparentDataEncryptions_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\TransparentDataEncryptionActivities
     */
    private $_TransparentDataEncryptionActivities_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\ServerTableAuditingPolicies
     */
    private $_ServerTableAuditingPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseTableAuditingPolicies
     */
    private $_DatabaseTableAuditingPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseConnectionPolicies
     */
    private $_DatabaseConnectionPolicies_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\ServerUsages
     */
    private $_ServerUsages_group;
    /**
     * @var \Microsoft\Azure\Management\Sql\_2014_04_01\DatabaseUsages
     */
    private $_DatabaseUsages_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/advisors' => ['get' => [
                'operationId' => 'DatabaseAdvisors_ListByDatabase',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AdvisorListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/advisors/{advisorName}' => [
                'get' => [
                    'operationId' => 'DatabaseAdvisors_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'advisorName',
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Advisor']]]
                ],
                'put' => [
                    'operationId' => 'DatabaseAdvisors_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'advisorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Advisor'
                        ],
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
                            'enum' => ['2014-04-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Advisor']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/backupLongTermRetentionPolicies/{backupLongTermRetentionPolicyName}' => [
                'get' => [
                    'operationId' => 'BackupLongTermRetentionPolicies_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupLongTermRetentionPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['Default']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupLongTermRetentionPolicy']]]
                ],
                'put' => [
                    'operationId' => 'BackupLongTermRetentionPolicies_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupLongTermRetentionPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['Default']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/BackupLongTermRetentionPolicy'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/BackupLongTermRetentionPolicy']],
                        '201' => ['schema' => ['$ref' => '#/definitions/BackupLongTermRetentionPolicy']],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/backupLongTermRetentionVaults/{backupLongTermRetentionVaultName}' => [
                'get' => [
                    'operationId' => 'BackupLongTermRetentionVaults_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupLongTermRetentionVaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['RegisteredVault']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/BackupLongTermRetentionVault']]]
                ],
                'put' => [
                    'operationId' => 'BackupLongTermRetentionVaults_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'backupLongTermRetentionVaultName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['RegisteredVault']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/BackupLongTermRetentionVault'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/BackupLongTermRetentionVault']],
                        '201' => ['schema' => ['$ref' => '#/definitions/BackupLongTermRetentionVault']],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/restorePoints' => ['get' => [
                'operationId' => 'RestorePoints_ListByDatabase',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RestorePointListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/recoverableDatabases/{databaseName}' => ['get' => [
                'operationId' => 'RecoverableDatabases_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecoverableDatabase']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/recoverableDatabases' => ['get' => [
                'operationId' => 'RecoverableDatabases_ListByServer',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecoverableDatabaseListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/restorableDroppedDatabases/{restorableDroppededDatabaseId}' => ['get' => [
                'operationId' => 'RestorableDroppedDatabases_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'restorableDroppededDatabaseId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RestorableDroppedDatabase']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/restorableDroppedDatabases' => ['get' => [
                'operationId' => 'RestorableDroppedDatabases_ListByServer',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RestorableDroppedDatabaseListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Sql/locations/{locationId}/capabilities' => ['get' => [
                'operationId' => 'Capabilities_ListByLocation',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'locationId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LocationCapabilities']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/connectionPolicies/{connectionPolicyName}' => [
                'put' => [
                    'operationId' => 'ServerConnectionPolicies_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['default']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ServerConnectionPolicy'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ServerConnectionPolicy']],
                        '201' => ['schema' => ['$ref' => '#/definitions/ServerConnectionPolicy']]
                    ]
                ],
                'get' => [
                    'operationId' => 'ServerConnectionPolicies_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['default']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerConnectionPolicy']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/securityAlertPolicies/{securityAlertPolicyName}' => [
                'get' => [
                    'operationId' => 'DatabaseThreatDetectionPolicies_Get',
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'securityAlertPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['default']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseSecurityAlertPolicy']]]
                ],
                'put' => [
                    'operationId' => 'DatabaseThreatDetectionPolicies_CreateOrUpdate',
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'securityAlertPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['default']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/DatabaseSecurityAlertPolicy'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/DatabaseSecurityAlertPolicy']],
                        '201' => ['schema' => ['$ref' => '#/definitions/DatabaseSecurityAlertPolicy']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/dataMaskingPolicies/{dataMaskingPolicyName}' => [
                'put' => [
                    'operationId' => 'DataMaskingPolicies_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'dataMaskingPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['Default']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/DataMaskingPolicy'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataMaskingPolicy']]]
                ],
                'get' => [
                    'operationId' => 'DataMaskingPolicies_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'dataMaskingPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['Default']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataMaskingPolicy']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/dataMaskingPolicies/{dataMaskingPolicyName}/rules/{dataMaskingRuleName}' => ['put' => [
                'operationId' => 'DataMaskingRules_CreateOrUpdate',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'dataMaskingPolicyName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['Default']
                    ],
                    [
                        'name' => 'dataMaskingRuleName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/DataMaskingRule'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/DataMaskingRule']],
                    '201' => ['schema' => ['$ref' => '#/definitions/DataMaskingRule']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/dataMaskingPolicies/{dataMaskingPolicyName}/rules' => ['get' => [
                'operationId' => 'DataMaskingRules_ListByDatabase',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'dataMaskingPolicyName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['Default']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DataMaskingRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/transparentDataEncryption' => ['get' => [
                'operationId' => 'TransparentDataEncryptionConfigurations_ListByDatabase',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TransparentDataEncryptionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/firewallRules/{firewallRuleName}' => [
                'put' => [
                    'operationId' => 'FirewallRules_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'firewallRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/FirewallRule'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/FirewallRule']],
                        '201' => ['schema' => ['$ref' => '#/definitions/FirewallRule']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'FirewallRules_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'firewallRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'FirewallRules_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'firewallRuleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FirewallRule']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/firewallRules' => ['get' => [
                'operationId' => 'FirewallRules_ListByServer',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FirewallRuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/geoBackupPolicies/{geoBackupPolicyName}' => [
                'put' => [
                    'operationId' => 'GeoBackupPolicies_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'geoBackupPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['Default']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/GeoBackupPolicy'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/GeoBackupPolicy']],
                        '200' => ['schema' => ['$ref' => '#/definitions/GeoBackupPolicy']]
                    ]
                ],
                'get' => [
                    'operationId' => 'GeoBackupPolicies_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'geoBackupPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['Default']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GeoBackupPolicy']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/geoBackupPolicies' => ['get' => [
                'operationId' => 'GeoBackupPolicies_ListByDatabase',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GeoBackupPolicyListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/import' => ['post' => [
                'operationId' => 'Databases_Import',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/ImportRequest'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ImportExportResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/extensions/{extensionName}' => ['put' => [
                'operationId' => 'Databases_CreateImportOperation',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'extensionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['import']
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/ImportExtensionRequest'
                    ]
                ],
                'responses' => [
                    '201' => ['schema' => ['$ref' => '#/definitions/ImportExportResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/export' => ['post' => [
                'operationId' => 'Databases_Export',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/ExportRequest'
                    ]
                ],
                'responses' => [
                    '200' => ['schema' => ['$ref' => '#/definitions/ImportExportResponse']],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/metrics' => ['get' => [
                'operationId' => 'Databases_ListMetrics',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MetricListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/metricDefinitions' => ['get' => [
                'operationId' => 'Databases_ListMetricDefinitions',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MetricDefinitionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/pause' => ['post' => [
                'operationId' => 'Databases_Pause',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '200' => [],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/resume' => ['post' => [
                'operationId' => 'Databases_Resume',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '200' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}' => [
                'put' => [
                    'operationId' => 'Databases_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Database'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Database']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Database']],
                        '202' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'Databases_Update',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/DatabaseUpdate'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Database']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Databases_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Databases_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => '$expand',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Database']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases' => ['get' => [
                'operationId' => 'Databases_ListByServer',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
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
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/elasticPools/{elasticPoolName}/databases/{databaseName}' => ['get' => [
                'operationId' => 'Databases_GetByElasticPool',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'elasticPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Database']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/elasticPools/{elasticPoolName}/databases' => ['get' => [
                'operationId' => 'Databases_ListByElasticPool',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'elasticPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/recommendedElasticPools/{recommendedElasticPoolName}/databases/{databaseName}' => ['get' => [
                'operationId' => 'Databases_GetByRecommendedElasticPool',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'recommendedElasticPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Database']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/recommendedElasticPools/{recommendedElasticPoolName}/databases' => ['get' => [
                'operationId' => 'Databases_ListByRecommendedElasticPool',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'recommendedElasticPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/elasticPools/{elasticPoolName}/metrics' => ['get' => [
                'operationId' => 'ElasticPools_ListMetrics',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'elasticPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MetricListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/elasticPools/{elasticPoolName}/metricDefinitions' => ['get' => [
                'operationId' => 'ElasticPools_ListMetricDefinitions',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'elasticPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/MetricDefinitionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/elasticPools/{elasticPoolName}' => [
                'put' => [
                    'operationId' => 'ElasticPools_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'elasticPoolName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ElasticPool'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ElasticPool']],
                        '201' => ['schema' => ['$ref' => '#/definitions/ElasticPool']],
                        '202' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'ElasticPools_Update',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'elasticPoolName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ElasticPoolUpdate'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ElasticPool']],
                        '202' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'ElasticPools_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'elasticPoolName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'ElasticPools_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'elasticPoolName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ElasticPool']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/elasticPools' => ['get' => [
                'operationId' => 'ElasticPools_ListByServer',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ElasticPoolListResult']]]
            ]],
            '/providers/Microsoft.Sql/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2014-04-01']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/topQueries' => ['get' => [
                'operationId' => 'Queries_ListByDatabase',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TopQueriesListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/topQueries/{queryId}/statistics' => ['get' => [
                'operationId' => 'QueryStatistics_ListByQuery',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'queryId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/QueryStatisticListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/replicationLinks/{linkId}' => [
                'delete' => [
                    'operationId' => 'ReplicationLinks_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'linkId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'ReplicationLinks_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'linkId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ReplicationLink']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/replicationLinks/{linkId}/failover' => ['post' => [
                'operationId' => 'ReplicationLinks_Failover',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'linkId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '204' => [],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/replicationLinks/{linkId}/forceFailoverAllowDataLoss' => ['post' => [
                'operationId' => 'ReplicationLinks_FailoverAllowDataLoss',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'linkId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => [
                    '204' => [],
                    '202' => []
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/replicationLinks' => ['get' => [
                'operationId' => 'ReplicationLinks_ListByDatabase',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ReplicationLinkListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/administrators/{administratorName}' => [
                'put' => [
                    'operationId' => 'ServerAzureADAdministrators_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'administratorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['activeDirectory']
                        ],
                        [
                            'name' => 'properties',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ServerAzureADAdministrator'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ServerAzureADAdministrator']],
                        '201' => ['schema' => ['$ref' => '#/definitions/ServerAzureADAdministrator']],
                        '202' => ['schema' => ['$ref' => '#/definitions/ServerAzureADAdministrator']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'ServerAzureADAdministrators_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'administratorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['activeDirectory']
                        ]
                    ],
                    'responses' => [
                        '202' => ['schema' => ['$ref' => '#/definitions/ServerAzureADAdministrator']],
                        '204' => ['schema' => ['$ref' => '#/definitions/ServerAzureADAdministrator']],
                        '200' => ['schema' => ['$ref' => '#/definitions/ServerAzureADAdministrator']]
                    ]
                ],
                'get' => [
                    'operationId' => 'ServerAzureADAdministrators_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'administratorName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['activeDirectory']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerAzureADAdministrator']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/administrators' => ['get' => [
                'operationId' => 'ServerAzureADAdministrators_ListByServer',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerAdministratorListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/communicationLinks/{communicationLinkName}' => [
                'delete' => [
                    'operationId' => 'ServerCommunicationLinks_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'communicationLinkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'get' => [
                    'operationId' => 'ServerCommunicationLinks_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'communicationLinkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerCommunicationLink']]]
                ],
                'put' => [
                    'operationId' => 'ServerCommunicationLinks_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'communicationLinkName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ServerCommunicationLink'
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/ServerCommunicationLink']],
                        '202' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/communicationLinks' => ['get' => [
                'operationId' => 'ServerCommunicationLinks_ListByServer',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerCommunicationLinkListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Sql/servers' => ['get' => [
                'operationId' => 'Servers_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}' => [
                'put' => [
                    'operationId' => 'Servers_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/Server'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Server']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Server']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Servers_Update',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ServerUpdate'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Server']]]
                ],
                'delete' => [
                    'operationId' => 'Servers_Delete',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Servers_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Server']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers' => ['get' => [
                'operationId' => 'Servers_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Sql/checkNameAvailability' => ['post' => [
                'operationId' => 'Servers_CheckNameAvailability',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        '$ref' => '#/definitions/CheckNameAvailabilityRequest'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CheckNameAvailabilityResponse']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/serviceObjectives/{serviceObjectiveName}' => ['get' => [
                'operationId' => 'ServiceObjectives_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceObjectiveName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServiceObjective']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/serviceObjectives' => ['get' => [
                'operationId' => 'ServiceObjectives_ListByServer',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServiceObjectiveListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/elasticPools/{elasticPoolName}/elasticPoolActivity' => ['get' => [
                'operationId' => 'ElasticPoolActivities_ListByElasticPool',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'elasticPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ElasticPoolActivityListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/elasticPools/{elasticPoolName}/elasticPoolDatabaseActivity' => ['get' => [
                'operationId' => 'ElasticPoolDatabaseActivities_ListByElasticPool',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'elasticPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ElasticPoolDatabaseActivityListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/recommendedElasticPools/{recommendedElasticPoolName}' => ['get' => [
                'operationId' => 'RecommendedElasticPools_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'recommendedElasticPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecommendedElasticPool']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/recommendedElasticPools' => ['get' => [
                'operationId' => 'RecommendedElasticPools_ListByServer',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecommendedElasticPoolListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/recommendedElasticPools/{recommendedElasticPoolName}/metrics' => ['get' => [
                'operationId' => 'RecommendedElasticPools_ListMetrics',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'recommendedElasticPoolName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RecommendedElasticPoolListMetricsResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/serviceTierAdvisors/{serviceTierAdvisorName}' => ['get' => [
                'operationId' => 'ServiceTierAdvisors_Get',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serviceTierAdvisorName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServiceTierAdvisor']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/serviceTierAdvisors' => ['get' => [
                'operationId' => 'ServiceTierAdvisors_ListByDatabase',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServiceTierAdvisorListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/transparentDataEncryption/{transparentDataEncryptionName}' => [
                'put' => [
                    'operationId' => 'TransparentDataEncryptions_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'transparentDataEncryptionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['current']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/TransparentDataEncryption'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/TransparentDataEncryption']],
                        '201' => ['schema' => ['$ref' => '#/definitions/TransparentDataEncryption']]
                    ]
                ],
                'get' => [
                    'operationId' => 'TransparentDataEncryptions_Get',
                    'parameters' => [
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2014-04-01']
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
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'transparentDataEncryptionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['current']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TransparentDataEncryption']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/transparentDataEncryption/{transparentDataEncryptionName}/operationResults' => ['get' => [
                'operationId' => 'TransparentDataEncryptionActivities_ListByConfiguration',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'transparentDataEncryptionName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['current']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TransparentDataEncryptionActivityListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/auditingPolicies/{tableAuditingPolicyName}' => [
                'get' => [
                    'operationId' => 'ServerTableAuditingPolicies_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'tableAuditingPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['default']
                        ],
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
                            'enum' => ['2014-04-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerTableAuditingPolicy']]]
                ],
                'put' => [
                    'operationId' => 'ServerTableAuditingPolicies_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'tableAuditingPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['default']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ServerTableAuditingPolicy'
                        ],
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
                            'enum' => ['2014-04-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ServerTableAuditingPolicy']],
                        '201' => ['schema' => ['$ref' => '#/definitions/ServerTableAuditingPolicy']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/auditingPolicies' => ['get' => [
                'operationId' => 'ServerTableAuditingPolicies_ListByServer',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerTableAuditingPolicyListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/auditingPolicies/{tableAuditingPolicyName}' => [
                'get' => [
                    'operationId' => 'DatabaseTableAuditingPolicies_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'tableAuditingPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['default']
                        ],
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
                            'enum' => ['2014-04-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseTableAuditingPolicy']]]
                ],
                'put' => [
                    'operationId' => 'DatabaseTableAuditingPolicies_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'tableAuditingPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['default']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/DatabaseTableAuditingPolicy'
                        ],
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
                            'enum' => ['2014-04-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/DatabaseTableAuditingPolicy']],
                        '201' => ['schema' => ['$ref' => '#/definitions/DatabaseTableAuditingPolicy']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/auditingPolicies' => ['get' => [
                'operationId' => 'DatabaseTableAuditingPolicies_ListByDatabase',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseTableAuditingPolicyListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/connectionPolicies/{connectionPolicyName}' => [
                'get' => [
                    'operationId' => 'DatabaseConnectionPolicies_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['default']
                        ],
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
                            'enum' => ['2014-04-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseConnectionPolicy']]]
                ],
                'put' => [
                    'operationId' => 'DatabaseConnectionPolicies_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'serverName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'databaseName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionPolicyName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['default']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/DatabaseConnectionPolicy'
                        ],
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
                            'enum' => ['2014-04-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/DatabaseConnectionPolicy']],
                        '201' => ['schema' => ['$ref' => '#/definitions/DatabaseConnectionPolicy']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/usages' => ['get' => [
                'operationId' => 'ServerUsages_ListByServer',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServerUsageListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Sql/servers/{serverName}/databases/{databaseName}/usages' => ['get' => [
                'operationId' => 'DatabaseUsages_ListByDatabase',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2014-04-01']
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
                        'name' => 'serverName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'databaseName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DatabaseUsageListResult']]]
            ]]
        ],
        'definitions' => [
            'Resource' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'ProxyResource' => ['properties' => []],
            'AdvisorProperties' => ['properties' => [
                'advisorStatus' => [
                    'type' => 'string',
                    'enum' => [
                        'GA',
                        'PublicPreview',
                        'LimitedPublicPreview',
                        'PrivatePreview'
                    ]
                ],
                'autoExecuteValue' => [
                    'type' => 'string',
                    'enum' => [
                        'Enabled',
                        'Disabled',
                        'Default'
                    ]
                ],
                'recommendationsStatus' => ['type' => 'string'],
                'lastChecked' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'Advisor' => ['properties' => [
                'kind' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/AdvisorProperties']
            ]],
            'AdvisorListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Advisor']
            ]]],
            'BackupLongTermRetentionPolicyProperties' => ['properties' => [
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'Disabled',
                        'Enabled'
                    ]
                ],
                'recoveryServicesBackupPolicyResourceId' => ['type' => 'string']
            ]],
            'BackupLongTermRetentionPolicy' => ['properties' => [
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/BackupLongTermRetentionPolicyProperties']
            ]],
            'BackupLongTermRetentionVaultProperties' => ['properties' => ['recoveryServicesVaultResourceId' => ['type' => 'string']]],
            'BackupLongTermRetentionVault' => ['properties' => [
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/BackupLongTermRetentionVaultProperties']
            ]],
            'TrackedResource' => ['properties' => [
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'location' => ['type' => 'string']
            ]],
            'RestorePointProperties' => ['properties' => [
                'restorePointType' => [
                    'type' => 'string',
                    'enum' => [
                        'DISCRETE',
                        'CONTINUOUS'
                    ]
                ],
                'restorePointCreationDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'earliestRestoreDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'RestorePoint' => ['properties' => ['properties' => ['$ref' => '#/definitions/RestorePointProperties']]],
            'RestorePointListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/RestorePoint']
            ]]],
            'RecoverableDatabaseProperties' => ['properties' => [
                'edition' => ['type' => 'string'],
                'serviceLevelObjective' => ['type' => 'string'],
                'elasticPoolName' => ['type' => 'string'],
                'lastAvailableBackupDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'RecoverableDatabase' => ['properties' => ['properties' => ['$ref' => '#/definitions/RecoverableDatabaseProperties']]],
            'RecoverableDatabaseListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/RecoverableDatabase']
            ]]],
            'RestorableDroppedDatabaseProperties' => ['properties' => [
                'databaseName' => ['type' => 'string'],
                'edition' => ['type' => 'string'],
                'maxSizeBytes' => ['type' => 'string'],
                'serviceLevelObjective' => ['type' => 'string'],
                'elasticPoolName' => ['type' => 'string'],
                'creationDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'deletionDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'earliestRestoreDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'RestorableDroppedDatabase' => ['properties' => [
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/RestorableDroppedDatabaseProperties']
            ]],
            'RestorableDroppedDatabaseListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/RestorableDroppedDatabase']
            ]]],
            'MaxSizeCapability' => ['properties' => [
                'limit' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'unit' => [
                    'type' => 'string',
                    'enum' => [
                        'Megabytes',
                        'Gigabytes',
                        'Terabytes',
                        'Petabytes'
                    ]
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Visible',
                        'Available',
                        'Default',
                        'Disabled'
                    ]
                ]
            ]],
            'PerformanceLevel' => ['properties' => [
                'unit' => [
                    'type' => 'string',
                    'enum' => ['DTU']
                ],
                'value' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'ServiceObjectiveCapability' => ['properties' => [
                'name' => ['type' => 'string'],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Visible',
                        'Available',
                        'Default',
                        'Disabled'
                    ]
                ],
                'performanceLevel' => ['$ref' => '#/definitions/PerformanceLevel'],
                'id' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'supportedMaxSizes' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/MaxSizeCapability']
                ],
                'includedMaxSize' => ['$ref' => '#/definitions/MaxSizeCapability']
            ]],
            'EditionCapability' => ['properties' => [
                'name' => ['type' => 'string'],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Visible',
                        'Available',
                        'Default',
                        'Disabled'
                    ]
                ],
                'supportedServiceLevelObjectives' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ServiceObjectiveCapability']
                ]
            ]],
            'ElasticPoolPerDatabaseMinDtuCapability' => ['properties' => [
                'limit' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Visible',
                        'Available',
                        'Default',
                        'Disabled'
                    ]
                ]
            ]],
            'ElasticPoolPerDatabaseMaxDtuCapability' => ['properties' => [
                'limit' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Visible',
                        'Available',
                        'Default',
                        'Disabled'
                    ]
                ],
                'supportedPerDatabaseMinDtus' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ElasticPoolPerDatabaseMinDtuCapability']
                ]
            ]],
            'ElasticPoolDtuCapability' => ['properties' => [
                'limit' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'maxDatabaseCount' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Visible',
                        'Available',
                        'Default',
                        'Disabled'
                    ]
                ],
                'supportedMaxSizes' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/MaxSizeCapability']
                ],
                'includedMaxSize' => ['$ref' => '#/definitions/MaxSizeCapability'],
                'supportedPerDatabaseMaxSizes' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/MaxSizeCapability']
                ],
                'supportedPerDatabaseMaxDtus' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ElasticPoolPerDatabaseMaxDtuCapability']
                ]
            ]],
            'ElasticPoolEditionCapability' => ['properties' => [
                'name' => ['type' => 'string'],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Visible',
                        'Available',
                        'Default',
                        'Disabled'
                    ]
                ],
                'supportedElasticPoolDtus' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ElasticPoolDtuCapability']
                ]
            ]],
            'ServerVersionCapability' => ['properties' => [
                'name' => ['type' => 'string'],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Visible',
                        'Available',
                        'Default',
                        'Disabled'
                    ]
                ],
                'supportedEditions' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/EditionCapability']
                ],
                'supportedElasticPoolEditions' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ElasticPoolEditionCapability']
                ]
            ]],
            'LocationCapabilities' => ['properties' => [
                'name' => ['type' => 'string'],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Visible',
                        'Available',
                        'Default',
                        'Disabled'
                    ]
                ],
                'supportedServerVersions' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ServerVersionCapability']
                ]
            ]],
            'ServerConnectionPolicyProperties' => ['properties' => ['connectionType' => [
                'type' => 'string',
                'enum' => [
                    'Default',
                    'Proxy',
                    'Redirect'
                ]
            ]]],
            'ServerConnectionPolicy' => ['properties' => [
                'kind' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ServerConnectionPolicyProperties']
            ]],
            'DatabaseSecurityAlertPolicyProperties' => ['properties' => [
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'New',
                        'Enabled',
                        'Disabled'
                    ]
                ],
                'disabledAlerts' => ['type' => 'string'],
                'emailAddresses' => ['type' => 'string'],
                'emailAccountAdmins' => [
                    'type' => 'string',
                    'enum' => [
                        'Enabled',
                        'Disabled'
                    ]
                ],
                'storageEndpoint' => ['type' => 'string'],
                'storageAccountAccessKey' => ['type' => 'string'],
                'retentionDays' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'useServerDefault' => [
                    'type' => 'string',
                    'enum' => [
                        'Enabled',
                        'Disabled'
                    ]
                ]
            ]],
            'DatabaseSecurityAlertPolicy' => ['properties' => [
                'location' => ['type' => 'string'],
                'kind' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/DatabaseSecurityAlertPolicyProperties']
            ]],
            'DataMaskingPolicyProperties' => ['properties' => [
                'dataMaskingState' => [
                    'type' => 'string',
                    'enum' => [
                        'Disabled',
                        'Enabled'
                    ]
                ],
                'exemptPrincipals' => ['type' => 'string'],
                'applicationPrincipals' => ['type' => 'string'],
                'maskingLevel' => ['type' => 'string']
            ]],
            'DataMaskingPolicy' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/DataMaskingPolicyProperties'],
                'location' => ['type' => 'string'],
                'kind' => ['type' => 'string']
            ]],
            'DataMaskingRuleProperties' => ['properties' => [
                'id' => ['type' => 'string'],
                'aliasName' => ['type' => 'string'],
                'ruleState' => [
                    'type' => 'string',
                    'enum' => [
                        'Disabled',
                        'Enabled'
                    ]
                ],
                'schemaName' => ['type' => 'string'],
                'tableName' => ['type' => 'string'],
                'columnName' => ['type' => 'string'],
                'maskingFunction' => [
                    'type' => 'string',
                    'enum' => [
                        'Default',
                        'CCN',
                        'Email',
                        'Number',
                        'SSN',
                        'Text'
                    ]
                ],
                'numberFrom' => ['type' => 'string'],
                'numberTo' => ['type' => 'string'],
                'prefixSize' => ['type' => 'string'],
                'suffixSize' => ['type' => 'string'],
                'replacementString' => ['type' => 'string']
            ]],
            'DataMaskingRule' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/DataMaskingRuleProperties'],
                'location' => ['type' => 'string'],
                'kind' => ['type' => 'string']
            ]],
            'DataMaskingRuleListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/DataMaskingRule']
            ]]],
            'TransparentDataEncryptionProperties' => ['properties' => ['status' => [
                'type' => 'string',
                'enum' => [
                    'Enabled',
                    'Disabled'
                ]
            ]]],
            'TransparentDataEncryption' => ['properties' => [
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/TransparentDataEncryptionProperties']
            ]],
            'TransparentDataEncryptionListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/TransparentDataEncryption']
            ]]],
            'OperationImpact' => ['properties' => [
                'name' => ['type' => 'string'],
                'unit' => ['type' => 'string'],
                'changeValueAbsolute' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'changeValueRelative' => [
                    'type' => 'number',
                    'format' => 'double'
                ]
            ]],
            'RecommendedIndexProperties' => ['properties' => [
                'action' => [
                    'type' => 'string',
                    'enum' => [
                        'Create',
                        'Drop',
                        'Rebuild'
                    ]
                ],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'Active',
                        'Pending',
                        'Executing',
                        'Verifying',
                        'Pending Revert',
                        'Reverting',
                        'Reverted',
                        'Ignored',
                        'Expired',
                        'Blocked',
                        'Success'
                    ]
                ],
                'created' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModified' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'indexType' => [
                    'type' => 'string',
                    'enum' => [
                        'CLUSTERED',
                        'NONCLUSTERED',
                        'COLUMNSTORE',
                        'CLUSTERED COLUMNSTORE'
                    ]
                ],
                'schema' => ['type' => 'string'],
                'table' => ['type' => 'string'],
                'columns' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'includedColumns' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'indexScript' => ['type' => 'string'],
                'estimatedImpact' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/OperationImpact']
                ],
                'reportedImpact' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/OperationImpact']
                ]
            ]],
            'RecommendedIndex' => ['properties' => ['properties' => ['$ref' => '#/definitions/RecommendedIndexProperties']]],
            'SloUsageMetric' => ['properties' => [
                'serviceLevelObjective' => [
                    'type' => 'string',
                    'enum' => [
                        'Basic',
                        'S0',
                        'S1',
                        'S2',
                        'S3',
                        'P1',
                        'P2',
                        'P3',
                        'P4',
                        'P6',
                        'P11',
                        'P15',
                        'System',
                        'System2',
                        'ElasticPool'
                    ]
                ],
                'serviceLevelObjectiveId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'inRangeTimeRatio' => [
                    'type' => 'number',
                    'format' => 'double'
                ]
            ]],
            'ServiceTierAdvisorProperties' => ['properties' => [
                'observationPeriodStart' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'observationPeriodEnd' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'activeTimeRatio' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'minDtu' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'avgDtu' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'maxDtu' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'maxSizeInGB' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'serviceLevelObjectiveUsageMetrics' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/SloUsageMetric']
                ],
                'currentServiceLevelObjective' => ['type' => 'string'],
                'currentServiceLevelObjectiveId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'usageBasedRecommendationServiceLevelObjective' => ['type' => 'string'],
                'usageBasedRecommendationServiceLevelObjectiveId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'databaseSizeBasedRecommendationServiceLevelObjective' => ['type' => 'string'],
                'databaseSizeBasedRecommendationServiceLevelObjectiveId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'disasterPlanBasedRecommendationServiceLevelObjective' => ['type' => 'string'],
                'disasterPlanBasedRecommendationServiceLevelObjectiveId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'overallRecommendationServiceLevelObjective' => ['type' => 'string'],
                'overallRecommendationServiceLevelObjectiveId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'confidence' => [
                    'type' => 'number',
                    'format' => 'double'
                ]
            ]],
            'ServiceTierAdvisor' => ['properties' => ['properties' => ['$ref' => '#/definitions/ServiceTierAdvisorProperties']]],
            'DatabaseProperties' => ['properties' => [
                'collation' => ['type' => 'string'],
                'creationDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'containmentState' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'currentServiceObjectiveId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'databaseId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'earliestRestoreDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'createMode' => [
                    'type' => 'string',
                    'enum' => [
                        'Copy',
                        'Default',
                        'NonReadableSecondary',
                        'OnlineSecondary',
                        'PointInTimeRestore',
                        'Recovery',
                        'Restore',
                        'RestoreLongTermRetentionBackup'
                    ]
                ],
                'sourceDatabaseId' => ['type' => 'string'],
                'sourceDatabaseDeletionDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'restorePointInTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'recoveryServicesRecoveryPointResourceId' => ['type' => 'string'],
                'edition' => [
                    'type' => 'string',
                    'enum' => [
                        'Web',
                        'Business',
                        'Basic',
                        'Standard',
                        'Premium',
                        'Free',
                        'Stretch',
                        'DataWarehouse',
                        'System',
                        'System2'
                    ]
                ],
                'maxSizeBytes' => ['type' => 'string'],
                'requestedServiceObjectiveId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'requestedServiceObjectiveName' => [
                    'type' => 'string',
                    'enum' => [
                        'Basic',
                        'S0',
                        'S1',
                        'S2',
                        'S3',
                        'P1',
                        'P2',
                        'P3',
                        'P4',
                        'P6',
                        'P11',
                        'P15',
                        'System',
                        'System2',
                        'ElasticPool'
                    ]
                ],
                'serviceLevelObjective' => [
                    'type' => 'string',
                    'enum' => [
                        'Basic',
                        'S0',
                        'S1',
                        'S2',
                        'S3',
                        'P1',
                        'P2',
                        'P3',
                        'P4',
                        'P6',
                        'P11',
                        'P15',
                        'System',
                        'System2',
                        'ElasticPool'
                    ]
                ],
                'status' => ['type' => 'string'],
                'elasticPoolName' => ['type' => 'string'],
                'defaultSecondaryLocation' => ['type' => 'string'],
                'serviceTierAdvisors' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ServiceTierAdvisor']
                ],
                'transparentDataEncryption' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/TransparentDataEncryption']
                ],
                'recommendedIndex' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RecommendedIndex']
                ],
                'failoverGroupId' => ['type' => 'string'],
                'readScale' => [
                    'type' => 'string',
                    'enum' => [
                        'Enabled',
                        'Disabled'
                    ]
                ],
                'sampleName' => [
                    'type' => 'string',
                    'enum' => ['AdventureWorksLT']
                ]
            ]],
            'DatabaseUpdate' => ['properties' => [
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'properties' => ['$ref' => '#/definitions/DatabaseProperties']
            ]],
            'ElasticPoolProperties' => ['properties' => [
                'creationDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'Creating',
                        'Ready',
                        'Disabled'
                    ]
                ],
                'edition' => [
                    'type' => 'string',
                    'enum' => [
                        'Basic',
                        'Standard',
                        'Premium'
                    ]
                ],
                'dtu' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'databaseDtuMax' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'databaseDtuMin' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'storageMB' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'ElasticPoolUpdate' => ['properties' => [
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'properties' => ['$ref' => '#/definitions/ElasticPoolProperties']
            ]],
            'TransparentDataEncryptionActivityProperties' => ['properties' => [
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'Encrypting',
                        'Decrypting'
                    ]
                ],
                'percentComplete' => [
                    'type' => 'number',
                    'format' => 'double'
                ]
            ]],
            'TransparentDataEncryptionActivity' => ['properties' => [
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/TransparentDataEncryptionActivityProperties']
            ]],
            'ElasticPoolDatabaseActivityProperties' => ['properties' => [
                'databaseName' => ['type' => 'string'],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'errorCode' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'errorMessage' => ['type' => 'string'],
                'errorSeverity' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'operation' => ['type' => 'string'],
                'operationId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'percentComplete' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'requestedElasticPoolName' => ['type' => 'string'],
                'currentElasticPoolName' => ['type' => 'string'],
                'currentServiceObjective' => ['type' => 'string'],
                'requestedServiceObjective' => ['type' => 'string'],
                'serverName' => ['type' => 'string'],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'state' => ['type' => 'string']
            ]],
            'ElasticPoolDatabaseActivity' => ['properties' => [
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ElasticPoolDatabaseActivityProperties']
            ]],
            'ElasticPoolActivityProperties' => ['properties' => [
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'errorCode' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'errorMessage' => ['type' => 'string'],
                'errorSeverity' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'operation' => ['type' => 'string'],
                'operationId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'percentComplete' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'requestedDatabaseDtuMax' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'requestedDatabaseDtuMin' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'requestedDtu' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'requestedElasticPoolName' => ['type' => 'string'],
                'requestedStorageLimitInGB' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'elasticPoolName' => ['type' => 'string'],
                'serverName' => ['type' => 'string'],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'state' => ['type' => 'string'],
                'requestedStorageLimitInMB' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'requestedDatabaseDtuGuarantee' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'requestedDatabaseDtuCap' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'requestedDtuGuarantee' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'ElasticPoolActivity' => ['properties' => [
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ElasticPoolActivityProperties']
            ]],
            'RecommendedElasticPoolMetric' => ['properties' => [
                'dateTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'dtu' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'sizeGB' => [
                    'type' => 'number',
                    'format' => 'double'
                ]
            ]],
            'Database' => ['properties' => [
                'kind' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/DatabaseProperties']
            ]],
            'ElasticPool' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ElasticPoolProperties'],
                'kind' => ['type' => 'string']
            ]],
            'RecommendedElasticPoolProperties' => ['properties' => [
                'databaseEdition' => [
                    'type' => 'string',
                    'enum' => [
                        'Basic',
                        'Standard',
                        'Premium'
                    ]
                ],
                'dtu' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'databaseDtuMin' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'databaseDtuMax' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'storageMB' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'observationPeriodStart' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'observationPeriodEnd' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'maxObservedDtu' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'maxObservedStorageMB' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'databases' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Database']
                ],
                'metrics' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/RecommendedElasticPoolMetric']
                ]
            ]],
            'RecommendedElasticPool' => ['properties' => ['properties' => ['$ref' => '#/definitions/RecommendedElasticPoolProperties']]],
            'FirewallRuleProperties' => ['properties' => [
                'startIpAddress' => ['type' => 'string'],
                'endIpAddress' => ['type' => 'string']
            ]],
            'FirewallRule' => ['properties' => [
                'kind' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/FirewallRuleProperties']
            ]],
            'FirewallRuleListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/FirewallRule']
            ]]],
            'GeoBackupPolicyProperties' => ['properties' => [
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'Disabled',
                        'Enabled'
                    ]
                ],
                'storageType' => ['type' => 'string']
            ]],
            'GeoBackupPolicy' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/GeoBackupPolicyProperties'],
                'kind' => ['type' => 'string'],
                'location' => ['type' => 'string']
            ]],
            'GeoBackupPolicyListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/GeoBackupPolicy']
            ]]],
            'ImportExtensionProperties' => ['properties' => ['operationMode' => ['type' => 'string']]],
            'ImportExtensionRequest' => ['properties' => [
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ImportExtensionProperties']
            ]],
            'ImportExportResponseProperties' => ['properties' => [
                'requestType' => ['type' => 'string'],
                'requestId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'serverName' => ['type' => 'string'],
                'databaseName' => ['type' => 'string'],
                'status' => ['type' => 'string'],
                'lastModifiedTime' => ['type' => 'string'],
                'queuedTime' => ['type' => 'string'],
                'blobUri' => ['type' => 'string'],
                'errorMessage' => ['type' => 'string']
            ]],
            'ImportExportResponse' => ['properties' => ['properties' => ['$ref' => '#/definitions/ImportExportResponseProperties']]],
            'ImportRequest' => ['properties' => [
                'databaseName' => ['type' => 'string'],
                'edition' => [
                    'type' => 'string',
                    'enum' => [
                        'Web',
                        'Business',
                        'Basic',
                        'Standard',
                        'Premium',
                        'Free',
                        'Stretch',
                        'DataWarehouse',
                        'System',
                        'System2'
                    ]
                ],
                'serviceObjectiveName' => [
                    'type' => 'string',
                    'enum' => [
                        'Basic',
                        'S0',
                        'S1',
                        'S2',
                        'S3',
                        'P1',
                        'P2',
                        'P3',
                        'P4',
                        'P6',
                        'P11',
                        'P15',
                        'System',
                        'System2',
                        'ElasticPool'
                    ]
                ],
                'maxSizeBytes' => ['type' => 'string']
            ]],
            'ExportRequest' => ['properties' => [
                'storageKeyType' => [
                    'type' => 'string',
                    'enum' => [
                        'StorageAccessKey',
                        'SharedAccessKey'
                    ]
                ],
                'storageKey' => ['type' => 'string'],
                'storageUri' => ['type' => 'string'],
                'administratorLogin' => ['type' => 'string'],
                'administratorLoginPassword' => ['type' => 'string'],
                'authenticationType' => [
                    'type' => 'string',
                    'enum' => [
                        'SQL',
                        'ADPassword'
                    ]
                ]
            ]],
            'MetricValue' => ['properties' => [
                'count' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'average' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'maximum' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'minimum' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'timestamp' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'total' => [
                    'type' => 'number',
                    'format' => 'double'
                ]
            ]],
            'MetricName' => ['properties' => [
                'value' => ['type' => 'string'],
                'localizedValue' => ['type' => 'string']
            ]],
            'Metric' => ['properties' => [
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'timeGrain' => ['type' => 'string'],
                'unit' => [
                    'type' => 'string',
                    'enum' => [
                        'count',
                        'bytes',
                        'seconds',
                        'percent',
                        'countPerSecond',
                        'bytesPerSecond'
                    ]
                ],
                'name' => ['$ref' => '#/definitions/MetricName'],
                'metricValues' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/MetricValue']
                ]
            ]],
            'MetricListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Metric']
            ]]],
            'MetricAvailability' => ['properties' => [
                'retention' => ['type' => 'string'],
                'timeGrain' => ['type' => 'string']
            ]],
            'MetricDefinition' => ['properties' => [
                'name' => ['$ref' => '#/definitions/MetricName'],
                'primaryAggregationType' => [
                    'type' => 'string',
                    'enum' => [
                        'None',
                        'Average',
                        'Count',
                        'Minimum',
                        'Maximum',
                        'Total'
                    ]
                ],
                'resourceUri' => ['type' => 'string'],
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
                'metricAvailabilities' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/MetricAvailability']
                ]
            ]],
            'MetricDefinitionListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/MetricDefinition']
            ]]],
            'Operation_display' => ['properties' => [
                'provider' => ['type' => 'string'],
                'resource' => ['type' => 'string'],
                'operation' => ['type' => 'string']
            ]],
            'Operation' => ['properties' => [
                'name' => ['type' => 'string'],
                'display' => ['$ref' => '#/definitions/Operation_display']
            ]],
            'OperationListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Operation']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'QueryMetric' => ['properties' => [
                'name' => ['type' => 'string'],
                'displayName' => ['type' => 'string'],
                'unit' => [
                    'type' => 'string',
                    'enum' => [
                        'percentage',
                        'KB',
                        'microseconds'
                    ]
                ],
                'value' => [
                    'type' => 'number',
                    'format' => 'double'
                ]
            ]],
            'QueryInterval' => ['properties' => [
                'intervalStartTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'executionCount' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'metrics' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/QueryMetric']
                ]
            ]],
            'QueryStatistic' => ['properties' => [
                'queryId' => ['type' => 'string'],
                'intervals' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/QueryInterval']
                ]
            ]],
            'TopQueries' => ['properties' => [
                'aggregationFunction' => [
                    'type' => 'string',
                    'enum' => [
                        'min',
                        'max',
                        'avg',
                        'sum'
                    ]
                ],
                'executionType' => [
                    'type' => 'string',
                    'enum' => [
                        'any',
                        'regular',
                        'irregular',
                        'aborted',
                        'exception'
                    ]
                ],
                'intervalType' => ['type' => 'string'],
                'numberOfTopQueries' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'observationStartTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'observationEndTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'observedMetric' => [
                    'type' => 'string',
                    'enum' => [
                        'cpu',
                        'io',
                        'logio',
                        'duration',
                        'executionCount'
                    ]
                ],
                'queries' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/QueryStatistic']
                ]
            ]],
            'TopQueriesListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/TopQueries']
            ]]],
            'QueryStatisticListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/QueryStatistic']
            ]]],
            'ReplicationLinkProperties' => ['properties' => [
                'isTerminationAllowed' => ['type' => 'boolean'],
                'replicationMode' => ['type' => 'string'],
                'partnerServer' => ['type' => 'string'],
                'partnerDatabase' => ['type' => 'string'],
                'partnerLocation' => ['type' => 'string'],
                'role' => [
                    'type' => 'string',
                    'enum' => [
                        'Primary',
                        'Secondary',
                        'NonReadableSecondary',
                        'Source',
                        'Copy'
                    ]
                ],
                'partnerRole' => [
                    'type' => 'string',
                    'enum' => [
                        'Primary',
                        'Secondary',
                        'NonReadableSecondary',
                        'Source',
                        'Copy'
                    ]
                ],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'percentComplete' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'replicationState' => [
                    'type' => 'string',
                    'enum' => [
                        'PENDING',
                        'SEEDING',
                        'CATCH_UP',
                        'SUSPENDED'
                    ]
                ]
            ]],
            'ReplicationLink' => ['properties' => [
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ReplicationLinkProperties']
            ]],
            'ReplicationLinkListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ReplicationLink']
            ]]],
            'ServerAdministratorProperties' => ['properties' => [
                'administratorType' => ['type' => 'string'],
                'login' => ['type' => 'string'],
                'sid' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'tenantId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ]
            ]],
            'ServerAzureADAdministrator' => ['properties' => ['properties' => ['$ref' => '#/definitions/ServerAdministratorProperties']]],
            'ServerAdministratorListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ServerAzureADAdministrator']
            ]]],
            'ServerCommunicationLinkProperties' => ['properties' => [
                'state' => ['type' => 'string'],
                'partnerServer' => ['type' => 'string']
            ]],
            'ServerCommunicationLink' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ServerCommunicationLinkProperties'],
                'location' => ['type' => 'string'],
                'kind' => ['type' => 'string']
            ]],
            'ServerCommunicationLinkListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ServerCommunicationLink']
            ]]],
            'ServerProperties' => ['properties' => [
                'fullyQualifiedDomainName' => ['type' => 'string'],
                'version' => [
                    'type' => 'string',
                    'enum' => [
                        '2.0',
                        '12.0'
                    ]
                ],
                'administratorLogin' => ['type' => 'string'],
                'administratorLoginPassword' => ['type' => 'string'],
                'externalAdministratorSid' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'externalAdministratorLogin' => ['type' => 'string'],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'Ready',
                        'Disabled'
                    ]
                ]
            ]],
            'Server' => ['properties' => [
                'kind' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ServerProperties']
            ]],
            'ServerUpdate' => ['properties' => [
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'properties' => ['$ref' => '#/definitions/ServerProperties']
            ]],
            'ServerListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Server']
            ]]],
            'ServiceObjectiveProperties' => ['properties' => [
                'serviceObjectiveName' => ['type' => 'string'],
                'isDefault' => ['type' => 'boolean'],
                'isSystem' => ['type' => 'boolean'],
                'description' => ['type' => 'string'],
                'enabled' => ['type' => 'boolean']
            ]],
            'ServiceObjective' => ['properties' => ['properties' => ['$ref' => '#/definitions/ServiceObjectiveProperties']]],
            'ServiceObjectiveListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ServiceObjective']
            ]]],
            'CheckNameAvailabilityRequest' => ['properties' => [
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'CheckNameAvailabilityResponse' => ['properties' => [
                'available' => ['type' => 'boolean'],
                'message' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'reason' => [
                    'type' => 'string',
                    'enum' => [
                        'Invalid',
                        'AlreadyExists'
                    ]
                ]
            ]],
            'RecommendedElasticPoolListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/RecommendedElasticPool']
            ]]],
            'RecommendedElasticPoolListMetricsResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/RecommendedElasticPoolMetric']
            ]]],
            'ElasticPoolListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ElasticPool']
            ]]],
            'ElasticPoolActivityListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ElasticPoolActivity']
            ]]],
            'ElasticPoolDatabaseActivityListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ElasticPoolDatabaseActivity']
            ]]],
            'DatabaseListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Database']
            ]]],
            'ServiceTierAdvisorListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ServiceTierAdvisor']
            ]]],
            'TransparentDataEncryptionActivityListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/TransparentDataEncryptionActivity']
            ]]],
            'TableAuditingPolicyProperties' => ['properties' => [
                'auditingState' => ['type' => 'string'],
                'auditLogsTableName' => ['type' => 'string'],
                'eventTypesToAudit' => ['type' => 'string'],
                'fullAuditLogsTableName' => ['type' => 'string'],
                'retentionDays' => ['type' => 'string'],
                'storageAccountKey' => ['type' => 'string'],
                'storageAccountName' => ['type' => 'string'],
                'storageAccountResourceGroupName' => ['type' => 'string'],
                'storageAccountSecondaryKey' => ['type' => 'string'],
                'storageAccountSubscriptionId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'storageTableEndpoint' => ['type' => 'string']
            ]],
            'DatabaseTableAuditingPolicyProperties' => ['properties' => ['useServerDefault' => ['type' => 'string']]],
            'ServerTableAuditingPolicyProperties' => ['properties' => []],
            'DatabaseConnectionPolicyProperties' => ['properties' => [
                'securityEnabledAccess' => ['type' => 'string'],
                'proxyDnsName' => ['type' => 'string'],
                'proxyPort' => ['type' => 'string'],
                'visibility' => ['type' => 'string'],
                'useServerDefault' => ['type' => 'string'],
                'redirectionState' => ['type' => 'string'],
                'state' => ['type' => 'string']
            ]],
            'DatabaseConnectionPolicy' => ['properties' => [
                'kind' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/DatabaseConnectionPolicyProperties']
            ]],
            'DatabaseTableAuditingPolicy' => ['properties' => [
                'kind' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/DatabaseTableAuditingPolicyProperties']
            ]],
            'ServerTableAuditingPolicy' => ['properties' => [
                'kind' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ServerTableAuditingPolicyProperties']
            ]],
            'DatabaseTableAuditingPolicyListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/DatabaseTableAuditingPolicy']
            ]]],
            'ServerTableAuditingPolicyListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ServerTableAuditingPolicy']
            ]]],
            'ServerUsage' => ['properties' => [
                'name' => ['type' => 'string'],
                'resourceName' => ['type' => 'string'],
                'displayName' => ['type' => 'string'],
                'currentValue' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'limit' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'unit' => ['type' => 'string'],
                'nextResetTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'ServerUsageListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/ServerUsage']
            ]]],
            'DatabaseUsage' => ['properties' => [
                'name' => ['type' => 'string'],
                'resourceName' => ['type' => 'string'],
                'displayName' => ['type' => 'string'],
                'currentValue' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'limit' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'unit' => ['type' => 'string'],
                'nextResetTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'DatabaseUsageListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/DatabaseUsage']
            ]]]
        ]
    ];
}
