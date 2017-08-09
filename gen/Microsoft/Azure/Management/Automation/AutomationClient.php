<?php
namespace Microsoft\Azure\Management\Automation;
final class AutomationClient
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
        $this->_AutomationAccount_group = new \Microsoft\Azure\Management\Automation\AutomationAccount($_client);
        $this->_Operations_group = new \Microsoft\Azure\Management\Automation\Operations($_client);
        $this->_Statistics_group = new \Microsoft\Azure\Management\Automation\Statistics($_client);
        $this->_Usages_group = new \Microsoft\Azure\Management\Automation\Usages($_client);
        $this->_Certificate_group = new \Microsoft\Azure\Management\Automation\Certificate($_client);
        $this->_Connection_group = new \Microsoft\Azure\Management\Automation\Connection($_client);
        $this->_ConnectionType_group = new \Microsoft\Azure\Management\Automation\ConnectionType($_client);
        $this->_Credential_group = new \Microsoft\Azure\Management\Automation\Credential($_client);
        $this->_DscCompilationJob_group = new \Microsoft\Azure\Management\Automation\DscCompilationJob($_client);
        $this->_DscConfiguration_group = new \Microsoft\Azure\Management\Automation\DscConfiguration($_client);
        $this->_AgentRegistrationInformation_group = new \Microsoft\Azure\Management\Automation\AgentRegistrationInformation($_client);
        $this->_DscNode_group = new \Microsoft\Azure\Management\Automation\DscNode($_client);
        $this->_NodeReports_group = new \Microsoft\Azure\Management\Automation\NodeReports($_client);
        $this->_DscNodeConfiguration_group = new \Microsoft\Azure\Management\Automation\DscNodeConfiguration($_client);
        $this->_HybridRunbookWorkerGroup_group = new \Microsoft\Azure\Management\Automation\HybridRunbookWorkerGroup($_client);
        $this->_Job_group = new \Microsoft\Azure\Management\Automation\Job($_client);
        $this->_JobStream_group = new \Microsoft\Azure\Management\Automation\JobStream($_client);
        $this->_JobSchedule_group = new \Microsoft\Azure\Management\Automation\JobSchedule($_client);
        $this->_Activity_group = new \Microsoft\Azure\Management\Automation\Activity($_client);
        $this->_Module_group = new \Microsoft\Azure\Management\Automation\Module($_client);
        $this->_ObjectDataTypes_group = new \Microsoft\Azure\Management\Automation\ObjectDataTypes($_client);
        $this->_Fields_group = new \Microsoft\Azure\Management\Automation\Fields($_client);
        $this->_RunbookDraft_group = new \Microsoft\Azure\Management\Automation\RunbookDraft($_client);
        $this->_Runbook_group = new \Microsoft\Azure\Management\Automation\Runbook($_client);
        $this->_TestJobStreams_group = new \Microsoft\Azure\Management\Automation\TestJobStreams($_client);
        $this->_TestJobs_group = new \Microsoft\Azure\Management\Automation\TestJobs($_client);
        $this->_Schedule_group = new \Microsoft\Azure\Management\Automation\Schedule($_client);
        $this->_Variable_group = new \Microsoft\Azure\Management\Automation\Variable($_client);
        $this->_Webhook_group = new \Microsoft\Azure\Management\Automation\Webhook($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\AutomationAccount
     */
    public function getAutomationAccount()
    {
        return $this->_AutomationAccount_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\Operations
     */
    public function getOperations()
    {
        return $this->_Operations_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\Statistics
     */
    public function getStatistics()
    {
        return $this->_Statistics_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\Usages
     */
    public function getUsages()
    {
        return $this->_Usages_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\Certificate
     */
    public function getCertificate()
    {
        return $this->_Certificate_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\Connection
     */
    public function getConnection()
    {
        return $this->_Connection_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\ConnectionType
     */
    public function getConnectionType()
    {
        return $this->_ConnectionType_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\Credential
     */
    public function getCredential()
    {
        return $this->_Credential_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\DscCompilationJob
     */
    public function getDscCompilationJob()
    {
        return $this->_DscCompilationJob_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\DscConfiguration
     */
    public function getDscConfiguration()
    {
        return $this->_DscConfiguration_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\AgentRegistrationInformation
     */
    public function getAgentRegistrationInformation()
    {
        return $this->_AgentRegistrationInformation_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\DscNode
     */
    public function getDscNode()
    {
        return $this->_DscNode_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\NodeReports
     */
    public function getNodeReports()
    {
        return $this->_NodeReports_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\DscNodeConfiguration
     */
    public function getDscNodeConfiguration()
    {
        return $this->_DscNodeConfiguration_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\HybridRunbookWorkerGroup
     */
    public function getHybridRunbookWorkerGroup()
    {
        return $this->_HybridRunbookWorkerGroup_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\Job
     */
    public function getJob()
    {
        return $this->_Job_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\JobStream
     */
    public function getJobStream()
    {
        return $this->_JobStream_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\JobSchedule
     */
    public function getJobSchedule()
    {
        return $this->_JobSchedule_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\Activity
     */
    public function getActivity()
    {
        return $this->_Activity_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\Module
     */
    public function getModule()
    {
        return $this->_Module_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\ObjectDataTypes
     */
    public function getObjectDataTypes()
    {
        return $this->_ObjectDataTypes_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\Fields
     */
    public function getFields()
    {
        return $this->_Fields_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\RunbookDraft
     */
    public function getRunbookDraft()
    {
        return $this->_RunbookDraft_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\Runbook
     */
    public function getRunbook()
    {
        return $this->_Runbook_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\TestJobStreams
     */
    public function getTestJobStreams()
    {
        return $this->_TestJobStreams_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\TestJobs
     */
    public function getTestJobs()
    {
        return $this->_TestJobs_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\Schedule
     */
    public function getSchedule()
    {
        return $this->_Schedule_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\Variable
     */
    public function getVariable()
    {
        return $this->_Variable_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Automation\Webhook
     */
    public function getWebhook()
    {
        return $this->_Webhook_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Automation\AutomationAccount
     */
    private $_AutomationAccount_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\Operations
     */
    private $_Operations_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\Statistics
     */
    private $_Statistics_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\Usages
     */
    private $_Usages_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\Certificate
     */
    private $_Certificate_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\Connection
     */
    private $_Connection_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\ConnectionType
     */
    private $_ConnectionType_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\Credential
     */
    private $_Credential_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\DscCompilationJob
     */
    private $_DscCompilationJob_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\DscConfiguration
     */
    private $_DscConfiguration_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\AgentRegistrationInformation
     */
    private $_AgentRegistrationInformation_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\DscNode
     */
    private $_DscNode_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\NodeReports
     */
    private $_NodeReports_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\DscNodeConfiguration
     */
    private $_DscNodeConfiguration_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\HybridRunbookWorkerGroup
     */
    private $_HybridRunbookWorkerGroup_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\Job
     */
    private $_Job_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\JobStream
     */
    private $_JobStream_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\JobSchedule
     */
    private $_JobSchedule_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\Activity
     */
    private $_Activity_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\Module
     */
    private $_Module_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\ObjectDataTypes
     */
    private $_ObjectDataTypes_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\Fields
     */
    private $_Fields_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\RunbookDraft
     */
    private $_RunbookDraft_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\Runbook
     */
    private $_Runbook_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\TestJobStreams
     */
    private $_TestJobStreams_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\TestJobs
     */
    private $_TestJobs_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\Schedule
     */
    private $_Schedule_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\Variable
     */
    private $_Variable_group;
    /**
     * @var \Microsoft\Azure\Management\Automation\Webhook
     */
    private $_Webhook_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}' => [
                'patch' => [
                    'operationId' => 'AutomationAccount_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/AutomationAccountUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AutomationAccount']]]
                ],
                'put' => [
                    'operationId' => 'AutomationAccount_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/AutomationAccountCreateOrUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/AutomationAccount']],
                        '200' => ['schema' => ['$ref' => '#/definitions/AutomationAccount']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'AutomationAccount_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'AutomationAccount_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AutomationAccount']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts' => ['get' => [
                'operationId' => 'AutomationAccount_ListByResourceGroup',
                'parameters' => [
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AutomationAccountListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Automation/automationAccounts' => ['get' => [
                'operationId' => 'AutomationAccount_List',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AutomationAccountListResult']]]
            ]],
            '/providers/Microsoft.Automation/operations' => ['get' => [
                'operationId' => 'Operations_List',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2015-10-31']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/statistics' => ['get' => [
                'operationId' => 'Statistics_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StatisticsListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/usages' => ['get' => [
                'operationId' => 'Usages_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/UsageListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/certificates/{certificateName}' => [
                'delete' => [
                    'operationId' => 'Certificate_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'get' => [
                    'operationId' => 'Certificate_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Certificate']]]
                ],
                'put' => [
                    'operationId' => 'Certificate_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
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
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/CertificateCreateOrUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/Certificate']],
                        '200' => ['schema' => ['$ref' => '#/definitions/Certificate']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Certificate_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
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
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/CertificateUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Certificate']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/certificates' => ['get' => [
                'operationId' => 'Certificate_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CertificateListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/connections/{connectionName}' => [
                'delete' => [
                    'operationId' => 'Connection_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Connection']],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'Connection_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Connection']]]
                ],
                'put' => [
                    'operationId' => 'Connection_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ConnectionCreateOrUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/Connection']],
                        '200' => ['schema' => ['$ref' => '#/definitions/Connection']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Connection_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ConnectionUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Connection']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/connections' => ['get' => [
                'operationId' => 'Connection_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ConnectionListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/connectionTypes/{connectionTypeName}' => [
                'delete' => [
                    'operationId' => 'ConnectionType_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionTypeName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'ConnectionType_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionTypeName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ConnectionType']]]
                ],
                'put' => [
                    'operationId' => 'ConnectionType_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'connectionTypeName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ConnectionTypeCreateOrUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/ConnectionType']],
                        '409' => ['schema' => ['$ref' => '#/definitions/ConnectionType']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/connectionTypes' => ['get' => [
                'operationId' => 'ConnectionType_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ConnectionTypeListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/credentials/{credentialName}' => [
                'delete' => [
                    'operationId' => 'Credential_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'credentialName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'get' => [
                    'operationId' => 'Credential_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'credentialName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Credential']]]
                ],
                'put' => [
                    'operationId' => 'Credential_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'credentialName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/CredentialCreateOrUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/Credential']],
                        '200' => ['schema' => ['$ref' => '#/definitions/Credential']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Credential_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'credentialName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/CredentialUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Credential']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/credentials' => ['get' => [
                'operationId' => 'Credential_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/CredentialListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/compilationjobs/{compilationJobId}' => [
                'put' => [
                    'operationId' => 'DscCompilationJob_Create',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'compilationJobId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'format' => 'uuid'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/DscCompilationJobCreateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['201' => ['schema' => ['$ref' => '#/definitions/DscCompilationJob']]]
                ],
                'get' => [
                    'operationId' => 'DscCompilationJob_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'compilationJobId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'format' => 'uuid'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DscCompilationJob']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/compilationjobs' => ['get' => [
                'operationId' => 'DscCompilationJob_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DscCompilationJobListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/compilationjobs/{jobId}/streams/{jobStreamId}' => ['get' => [
                'operationId' => 'DscCompilationJob_GetStream',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'format' => 'uuid'
                    ],
                    [
                        'name' => 'jobStreamId',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobStream']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/configurations/{configurationName}' => [
                'delete' => [
                    'operationId' => 'DscConfiguration_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'configurationName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'DscConfiguration_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'configurationName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DscConfiguration']]]
                ],
                'put' => [
                    'operationId' => 'DscConfiguration_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'configurationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/DscConfigurationCreateOrUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/DscConfiguration']],
                        '201' => ['schema' => ['$ref' => '#/definitions/DscConfiguration']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/configurations/{configurationName}/content' => ['get' => [
                'operationId' => 'DscConfiguration_GetContent',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'configurationName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'file']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/configurations' => ['get' => [
                'operationId' => 'DscConfiguration_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DscConfigurationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/agentRegistrationInformation' => ['get' => [
                'operationId' => 'AgentRegistrationInformation_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AgentRegistration']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/agentRegistrationInformation/regenerateKey' => ['post' => [
                'operationId' => 'AgentRegistrationInformation_RegenerateKey',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'parameters',
                        'in' => 'body',
                        'required' => TRUE,
                        '$ref' => '#/definitions/AgentRegistrationRegenerateKeyParameter'
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AgentRegistration']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/nodes/{nodeId}' => [
                'delete' => [
                    'operationId' => 'DscNode_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeId',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DscNode']]]
                ],
                'get' => [
                    'operationId' => 'DscNode_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeId',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DscNode']]]
                ],
                'patch' => [
                    'operationId' => 'DscNode_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/DscNodeUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DscNode']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/nodes' => ['get' => [
                'operationId' => 'DscNode_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DscNodeListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/nodes/{nodeId}/reports' => ['get' => [
                'operationId' => 'NodeReports_ListByNode',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'nodeId',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DscNodeReportListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/nodes/{nodeId}/reports/{reportId}' => ['get' => [
                'operationId' => 'NodeReports_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'nodeId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'reportId',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DscNodeReport']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/nodes/{nodeId}/reports/{reportId}/content' => ['get' => [
                'operationId' => 'NodeReports_GetContent',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'nodeId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'reportId',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'file']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/nodeConfigurations/{nodeConfigurationName}' => [
                'delete' => [
                    'operationId' => 'DscNodeConfiguration_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeConfigurationName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'get' => [
                    'operationId' => 'DscNodeConfiguration_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeConfigurationName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DscNodeConfiguration']]]
                ],
                'put' => [
                    'operationId' => 'DscNodeConfiguration_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'nodeConfigurationName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/DscNodeConfigurationCreateOrUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/DscNodeConfiguration']],
                        '201' => ['schema' => ['$ref' => '#/definitions/DscNodeConfiguration']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/nodeConfigurations' => ['get' => [
                'operationId' => 'DscNodeConfiguration_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DscNodeConfigurationListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/hybridRunbookWorkerGroups/{hybridRunbookWorkerGroupName}' => [
                'delete' => [
                    'operationId' => 'HybridRunbookWorkerGroup_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hybridRunbookWorkerGroupName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'get' => [
                    'operationId' => 'HybridRunbookWorkerGroup_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hybridRunbookWorkerGroupName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridRunbookWorkerGroup']]]
                ],
                'patch' => [
                    'operationId' => 'HybridRunbookWorkerGroup_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'hybridRunbookWorkerGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/HybridRunbookWorkerGroupUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridRunbookWorkerGroup']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/hybridRunbookWorkerGroups' => ['get' => [
                'operationId' => 'HybridRunbookWorkerGroup_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/HybridRunbookWorkerGroupsListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/jobs/{jobId}/output' => ['get' => [
                'operationId' => 'Job_GetOutput',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobId',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'file']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/jobs/{jobId}/runbookContent' => ['get' => [
                'operationId' => 'Job_GetRunbookContent',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobId',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'file']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/jobs/{jobId}/suspend' => ['post' => [
                'operationId' => 'Job_Suspend',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'format' => 'uuid'
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/jobs/{jobId}/stop' => ['post' => [
                'operationId' => 'Job_Stop',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'format' => 'uuid'
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/jobs/{jobId}' => [
                'get' => [
                    'operationId' => 'Job_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'jobId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'format' => 'uuid'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Job']]]
                ],
                'put' => [
                    'operationId' => 'Job_Create',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'jobId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'format' => 'uuid'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/JobCreateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['201' => ['schema' => ['$ref' => '#/definitions/Job']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/jobs' => ['get' => [
                'operationId' => 'Job_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/jobs/{jobId}/resume' => ['post' => [
                'operationId' => 'Job_Resume',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string',
                        'format' => 'uuid'
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/jobs/{jobId}/streams/{jobStreamId}' => ['get' => [
                'operationId' => 'JobStream_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobStreamId',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobStream']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/jobs/{jobId}/streams' => ['get' => [
                'operationId' => 'JobStream_ListByJob',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobId',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobStreamListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/jobSchedules/{jobScheduleId}' => [
                'delete' => [
                    'operationId' => 'JobSchedule_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'jobScheduleId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'format' => 'uuid'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'get' => [
                    'operationId' => 'JobSchedule_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'jobScheduleId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'format' => 'uuid'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobSchedule']]]
                ],
                'put' => [
                    'operationId' => 'JobSchedule_Create',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'jobScheduleId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string',
                            'format' => 'uuid'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/JobScheduleCreateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['201' => ['schema' => ['$ref' => '#/definitions/JobSchedule']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/jobSchedules' => ['get' => [
                'operationId' => 'JobSchedule_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobScheduleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/modules/{moduleName}/activities/{activityName}' => ['get' => [
                'operationId' => 'Activity_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'moduleName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'activityName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Activity']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/modules/{moduleName}/activities' => ['get' => [
                'operationId' => 'Activity_ListByModule',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'moduleName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ActivityListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/modules/{moduleName}' => [
                'delete' => [
                    'operationId' => 'Module_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'moduleName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'get' => [
                    'operationId' => 'Module_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'moduleName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Module']]]
                ],
                'put' => [
                    'operationId' => 'Module_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'moduleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ModuleCreateOrUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/Module']],
                        '200' => ['schema' => ['$ref' => '#/definitions/Module']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Module_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'moduleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ModuleUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Module']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/modules' => ['get' => [
                'operationId' => 'Module_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ModuleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/modules/{moduleName}/objectDataTypes/{typeName}/fields' => ['get' => [
                'operationId' => 'ObjectDataTypes_ListFieldsByModuleAndType',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'moduleName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'typeName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TypeFieldListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/objectDataTypes/{typeName}/fields' => ['get' => [
                'operationId' => 'ObjectDataTypes_ListFieldsByType',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'typeName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TypeFieldListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/modules/{moduleName}/types/{typeName}/fields' => ['get' => [
                'operationId' => 'Fields_ListByType',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'moduleName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'typeName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TypeFieldListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/runbooks/{runbookName}/draft/content' => [
                'get' => [
                    'operationId' => 'RunbookDraft_GetContent',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'runbookName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['type' => 'file']]]
                ],
                'put' => [
                    'operationId' => 'RunbookDraft_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'runbookName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'runbookContent',
                            'in' => 'body',
                            'required' => TRUE,
                            'type' => 'file'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '202' => [],
                        '200' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/runbooks/{runbookName}/draft' => ['get' => [
                'operationId' => 'RunbookDraft_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'runbookName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RunbookDraft']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/runbooks/{runbookName}/draft/publish' => ['post' => [
                'operationId' => 'RunbookDraft_Publish',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'runbookName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => [
                    '202' => [],
                    '200' => ['schema' => ['$ref' => '#/definitions/Runbook']]
                ]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/runbooks/{runbookName}/draft/undoEdit' => ['post' => [
                'operationId' => 'RunbookDraft_UndoEdit',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'runbookName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RunbookDraftUndoEditResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/runbooks/{runbookName}/content' => ['get' => [
                'operationId' => 'Runbook_GetContent',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'runbookName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'file']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/runbooks/{runbookName}' => [
                'get' => [
                    'operationId' => 'Runbook_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'runbookName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Runbook']]]
                ],
                'put' => [
                    'operationId' => 'Runbook_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'runbookName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/RunbookCreateOrUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '201' => [],
                        '400' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'Runbook_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'runbookName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/RunbookUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Runbook']]]
                ],
                'delete' => [
                    'operationId' => 'Runbook_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'runbookName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => []]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/runbooks' => ['get' => [
                'operationId' => 'Runbook_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/RunbookListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/runbooks/{runbookName}/draft/testJob/streams/{jobStreamId}' => ['get' => [
                'operationId' => 'TestJobStreams_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'runbookName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'jobStreamId',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobStream']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/runbooks/{runbookName}/draft/testJob/streams' => ['get' => [
                'operationId' => 'TestJobStreams_ListByTestJob',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'runbookName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/JobStreamListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/runbooks/{runbookName}/draft/testJob' => [
                'put' => [
                    'operationId' => 'TestJobs_Create',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'runbookName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/TestJobCreateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['201' => ['schema' => ['$ref' => '#/definitions/TestJob']]]
                ],
                'get' => [
                    'operationId' => 'TestJobs_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'runbookName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/TestJob']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/runbooks/{runbookName}/draft/testJob/resume' => ['post' => [
                'operationId' => 'TestJobs_Resume',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'runbookName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/runbooks/{runbookName}/draft/testJob/stop' => ['post' => [
                'operationId' => 'TestJobs_Stop',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'runbookName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/runbooks/{runbookName}/draft/testJob/suspend' => ['post' => [
                'operationId' => 'TestJobs_Suspend',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'runbookName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/schedules/{scheduleName}' => [
                'put' => [
                    'operationId' => 'Schedule_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'scheduleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ScheduleCreateOrUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/Schedule']],
                        '409' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'Schedule_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'scheduleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/ScheduleUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Schedule']]]
                ],
                'get' => [
                    'operationId' => 'Schedule_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'scheduleName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Schedule']]]
                ],
                'delete' => [
                    'operationId' => 'Schedule_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'scheduleName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '404' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/schedules' => ['get' => [
                'operationId' => 'Schedule_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ScheduleListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/variables/{variableName}' => [
                'put' => [
                    'operationId' => 'Variable_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'variableName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/VariableCreateOrUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Variable']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Variable']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Variable_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'variableName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/VariableUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Variable']]]
                ],
                'delete' => [
                    'operationId' => 'Variable_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'variableName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'get' => [
                    'operationId' => 'Variable_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'variableName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Variable']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/variables' => ['get' => [
                'operationId' => 'Variable_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/VariableListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/webhooks/generateUri' => ['post' => [
                'operationId' => 'Webhook_GenerateUri',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['type' => 'string']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/webhooks/{webhookName}' => [
                'delete' => [
                    'operationId' => 'Webhook_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'webhookName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'get' => [
                    'operationId' => 'Webhook_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'webhookName',
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Webhook']]]
                ],
                'put' => [
                    'operationId' => 'Webhook_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'webhookName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/WebhookCreateOrUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/Webhook']],
                        '201' => ['schema' => ['$ref' => '#/definitions/Webhook']]
                    ]
                ],
                'patch' => [
                    'operationId' => 'Webhook_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'automationAccountName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'webhookName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            '$ref' => '#/definitions/WebhookUpdateParameters'
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
                            'enum' => ['2015-10-31']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Webhook']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/Microsoft.Automation/automationAccounts/{automationAccountName}/webhooks' => ['get' => [
                'operationId' => 'Webhook_ListByAutomationAccount',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'automationAccountName',
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
                        'enum' => ['2015-10-31']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WebhookListResult']]]
            ]]
        ],
        'definitions' => [
            'ErrorResponse' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string']
            ]],
            'UsageCounterName' => ['properties' => [
                'value' => ['type' => 'string'],
                'localizedValue' => ['type' => 'string']
            ]],
            'Usage' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['$ref' => '#/definitions/UsageCounterName'],
                'unit' => ['type' => 'string'],
                'currentValue' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'limit' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'throttleStatus' => ['type' => 'string']
            ]],
            'UsageListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Usage']
            ]]],
            'Statistics' => ['properties' => [
                'counterProperty' => ['type' => 'string'],
                'counterValue' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'id' => ['type' => 'string']
            ]],
            'StatisticsListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Statistics']
            ]]],
            'RunbookParameter' => ['properties' => [
                'type' => ['type' => 'string'],
                'isMandatory' => ['type' => 'boolean'],
                'position' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'defaultValue' => ['type' => 'string']
            ]],
            'ContentHash' => ['properties' => [
                'algorithm' => ['type' => 'string'],
                'value' => ['type' => 'string']
            ]],
            'ContentLink' => ['properties' => [
                'uri' => ['type' => 'string'],
                'contentHash' => ['$ref' => '#/definitions/ContentHash'],
                'version' => ['type' => 'string']
            ]],
            'RunbookDraft' => ['properties' => [
                'inEdit' => ['type' => 'boolean'],
                'draftContentLink' => ['$ref' => '#/definitions/ContentLink'],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/RunbookParameter']
                ],
                'outputTypes' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ]
            ]],
            'RunbookProperties' => ['properties' => [
                'runbookType' => [
                    'type' => 'string',
                    'enum' => [
                        'Script',
                        'Graph',
                        'PowerShellWorkflow',
                        'PowerShell',
                        'GraphPowerShellWorkflow',
                        'GraphPowerShell'
                    ]
                ],
                'publishContentLink' => ['$ref' => '#/definitions/ContentLink'],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'New',
                        'Edit',
                        'Published'
                    ]
                ],
                'logVerbose' => ['type' => 'boolean'],
                'logProgress' => ['type' => 'boolean'],
                'logActivityTrace' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'jobCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/RunbookParameter']
                ],
                'outputTypes' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'draft' => ['$ref' => '#/definitions/RunbookDraft'],
                'provisioningState' => [
                    'type' => 'string',
                    'enum' => ['Succeeded']
                ],
                'lastModifiedBy' => ['type' => 'string'],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'description' => ['type' => 'string']
            ]],
            'Runbook' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/RunbookProperties'],
                'etag' => ['type' => 'string']
            ]],
            'ModuleErrorInfo' => ['properties' => [
                'code' => ['type' => 'string'],
                'message' => ['type' => 'string']
            ]],
            'ModuleProperties' => ['properties' => [
                'isGlobal' => ['type' => 'boolean'],
                'version' => ['type' => 'string'],
                'sizeInBytes' => [
                    'type' => 'integer',
                    'format' => 'int64'
                ],
                'activityCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'provisioningState' => [
                    'type' => 'string',
                    'enum' => [
                        'Created',
                        'Creating',
                        'StartingImportModuleRunbook',
                        'RunningImportModuleRunbook',
                        'ContentRetrieved',
                        'ContentDownloaded',
                        'ContentValidated',
                        'ConnectionTypeImported',
                        'ContentStored',
                        'ModuleDataStored',
                        'ActivitiesStored',
                        'ModuleImportRunbookComplete',
                        'Succeeded',
                        'Failed',
                        'Cancelled',
                        'Updating'
                    ]
                ],
                'contentLink' => ['$ref' => '#/definitions/ContentLink'],
                'error' => ['$ref' => '#/definitions/ModuleErrorInfo'],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'description' => ['type' => 'string']
            ]],
            'Module' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ModuleProperties'],
                'etag' => ['type' => 'string']
            ]],
            'DscNodeConfigurationAssociationProperty' => ['properties' => ['name' => ['type' => 'string']]],
            'DscNode' => ['properties' => [
                'lastSeen' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'registrationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'ip' => ['type' => 'string'],
                'accountId' => ['type' => 'string'],
                'nodeConfiguration' => ['$ref' => '#/definitions/DscNodeConfigurationAssociationProperty'],
                'status' => ['type' => 'string'],
                'nodeId' => ['type' => 'string'],
                'etag' => ['type' => 'string']
            ]],
            'ContentSource' => ['properties' => [
                'hash' => ['$ref' => '#/definitions/ContentHash'],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'embeddedContent',
                        'uri'
                    ]
                ],
                'value' => ['type' => 'string'],
                'version' => ['type' => 'string']
            ]],
            'DscConfigurationParameter' => ['properties' => [
                'type' => ['type' => 'string'],
                'isMandatory' => ['type' => 'boolean'],
                'position' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'defaultValue' => ['type' => 'string']
            ]],
            'DscConfigurationProperties' => ['properties' => [
                'provisioningState' => [
                    'type' => 'string',
                    'enum' => ['Succeeded']
                ],
                'jobCount' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/DscConfigurationParameter']
                ],
                'source' => ['$ref' => '#/definitions/ContentSource'],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'New',
                        'Edit',
                        'Published'
                    ]
                ],
                'logVerbose' => ['type' => 'boolean'],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'description' => ['type' => 'string']
            ]],
            'DscConfiguration' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/DscConfigurationProperties'],
                'etag' => ['type' => 'string']
            ]],
            'Sku' => ['properties' => [
                'name' => [
                    'type' => 'string',
                    'enum' => [
                        'Free',
                        'Basic'
                    ]
                ],
                'family' => ['type' => 'string'],
                'capacity' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'AutomationAccountProperties' => ['properties' => [
                'sku' => ['$ref' => '#/definitions/Sku'],
                'lastModifiedBy' => ['type' => 'string'],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'Ok',
                        'Unavailable',
                        'Suspended'
                    ]
                ],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'description' => ['type' => 'string']
            ]],
            'AutomationAccount' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/AutomationAccountProperties'],
                'etag' => ['type' => 'string']
            ]],
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
            'AutomationAccountListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AutomationAccount']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'Operation_display' => ['properties' => [
                'provider' => ['type' => 'string'],
                'resource' => ['type' => 'string'],
                'operation' => ['type' => 'string']
            ]],
            'Operation' => ['properties' => [
                'name' => ['type' => 'string'],
                'display' => ['$ref' => '#/definitions/Operation_display']
            ]],
            'OperationListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/Operation']
            ]]],
            'AutomationAccountCreateOrUpdateProperties' => ['properties' => ['sku' => ['$ref' => '#/definitions/Sku']]],
            'AutomationAccountCreateOrUpdateParameters' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/AutomationAccountCreateOrUpdateProperties'],
                'name' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'AutomationAccountUpdateProperties' => ['properties' => ['sku' => ['$ref' => '#/definitions/Sku']]],
            'AutomationAccountUpdateParameters' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/AutomationAccountUpdateProperties'],
                'name' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'CertificateProperties' => ['properties' => [
                'thumbprint' => ['type' => 'string'],
                'expiryTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'isExportable' => ['type' => 'boolean'],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'description' => ['type' => 'string']
            ]],
            'Certificate' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/CertificateProperties']
            ]],
            'CertificateListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Certificate']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'CertificateUpdateProperties' => ['properties' => ['description' => ['type' => 'string']]],
            'CertificateUpdateParameters' => ['properties' => [
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/CertificateUpdateProperties']
            ]],
            'CertificateCreateOrUpdateProperties' => ['properties' => [
                'base64Value' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'thumbprint' => ['type' => 'string'],
                'isExportable' => ['type' => 'boolean']
            ]],
            'CertificateCreateOrUpdateParameters' => ['properties' => [
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/CertificateCreateOrUpdateProperties']
            ]],
            'ConnectionTypeAssociationProperty' => ['properties' => ['name' => ['type' => 'string']]],
            'ConnectionProperties' => ['properties' => [
                'connectionType' => ['$ref' => '#/definitions/ConnectionTypeAssociationProperty'],
                'fieldDefinitionValues' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'description' => ['type' => 'string']
            ]],
            'Connection' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ConnectionProperties']
            ]],
            'ConnectionListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Connection']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ConnectionUpdateProperties' => ['properties' => [
                'description' => ['type' => 'string'],
                'fieldDefinitionValues' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'ConnectionUpdateParameters' => ['properties' => [
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ConnectionUpdateProperties']
            ]],
            'ConnectionCreateOrUpdateProperties' => ['properties' => [
                'description' => ['type' => 'string'],
                'connectionType' => ['$ref' => '#/definitions/ConnectionTypeAssociationProperty'],
                'fieldDefinitionValues' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'ConnectionCreateOrUpdateParameters' => ['properties' => [
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ConnectionCreateOrUpdateProperties']
            ]],
            'FieldDefinition' => ['properties' => [
                'isEncrypted' => ['type' => 'boolean'],
                'isOptional' => ['type' => 'boolean'],
                'type' => ['type' => 'string']
            ]],
            'ConnectionTypeProperties' => ['properties' => [
                'isGlobal' => ['type' => 'boolean'],
                'fieldDefinitions' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/FieldDefinition']
                ],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'description' => ['type' => 'string']
            ]],
            'ConnectionType' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ConnectionTypeProperties']
            ]],
            'ConnectionTypeListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ConnectionType']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ConnectionTypeCreateOrUpdateProperties' => ['properties' => [
                'isGlobal' => ['type' => 'boolean'],
                'fieldDefinitions' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/FieldDefinition']
                ]
            ]],
            'ConnectionTypeCreateOrUpdateParameters' => ['properties' => [
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ConnectionTypeCreateOrUpdateProperties']
            ]],
            'CredentialProperties' => ['properties' => [
                'userName' => ['type' => 'string'],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'description' => ['type' => 'string']
            ]],
            'Credential' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/CredentialProperties']
            ]],
            'CredentialListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Credential']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'CredentialUpdateProperties' => ['properties' => [
                'userName' => ['type' => 'string'],
                'password' => ['type' => 'string'],
                'description' => ['type' => 'string']
            ]],
            'CredentialUpdateParameters' => ['properties' => [
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/CredentialUpdateProperties']
            ]],
            'CredentialCreateOrUpdateProperties' => ['properties' => [
                'userName' => ['type' => 'string'],
                'password' => ['type' => 'string'],
                'description' => ['type' => 'string']
            ]],
            'CredentialCreateOrUpdateParameters' => ['properties' => [
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/CredentialCreateOrUpdateProperties']
            ]],
            'ActivityParameter' => ['properties' => [
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string'],
                'isMandatory' => ['type' => 'boolean'],
                'isDynamic' => ['type' => 'boolean'],
                'position' => ['type' => 'boolean'],
                'valueFromPipeline' => ['type' => 'boolean'],
                'valueFromPipelineByPropertyName' => ['type' => 'boolean'],
                'valueFromRemainingArguments' => ['type' => 'boolean']
            ]],
            'ActivityParameterSet' => ['properties' => [
                'name' => ['type' => 'string'],
                'parameters' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ActivityParameter']
                ]
            ]],
            'ActivityOutputType' => ['properties' => [
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'ActivityProperties' => ['properties' => [
                'definition' => ['type' => 'string'],
                'parameterSets' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ActivityParameterSet']
                ],
                'outputTypes' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ActivityOutputType']
                ],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'description' => ['type' => 'string']
            ]],
            'Activity' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ActivityProperties']
            ]],
            'ActivityListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Activity']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'AdvancedScheduleMonthlyOccurrence' => ['properties' => [
                'occurrence' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'day' => [
                    'type' => 'string',
                    'enum' => [
                        'Monday',
                        'Tuesday',
                        'Wednesday',
                        'Thursday',
                        'Friday',
                        'Saturday',
                        'Sunday'
                    ]
                ]
            ]],
            'AdvancedSchedule' => ['properties' => [
                'weekDays' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'monthDays' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'monthlyOccurrences' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AdvancedScheduleMonthlyOccurrence']
                ]
            ]],
            'AgentRegistrationKeys' => ['properties' => [
                'primary' => ['type' => 'string'],
                'secondary' => ['type' => 'string']
            ]],
            'AgentRegistration' => ['properties' => [
                'dscMetaConfiguration' => ['type' => 'string'],
                'endpoint' => ['type' => 'string'],
                'keys' => ['$ref' => '#/definitions/AgentRegistrationKeys'],
                'id' => ['type' => 'string']
            ]],
            'AgentRegistrationRegenerateKeyParameter' => ['properties' => [
                'keyName' => [
                    'type' => 'string',
                    'enum' => [
                        'Primary',
                        'Secondary'
                    ]
                ],
                'name' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'DscConfigurationAssociationProperty' => ['properties' => ['name' => ['type' => 'string']]],
            'DscCompilationJobCreateProperties' => ['properties' => [
                'configuration' => ['$ref' => '#/definitions/DscConfigurationAssociationProperty'],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'DscCompilationJobCreateParameters' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/DscCompilationJobCreateProperties'],
                'name' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'DscCompilationJobProperties' => ['properties' => [
                'configuration' => ['$ref' => '#/definitions/DscConfigurationAssociationProperty'],
                'startedBy' => ['type' => 'string'],
                'jobId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'New',
                        'Activating',
                        'Running',
                        'Completed',
                        'Failed',
                        'Stopped',
                        'Blocked',
                        'Suspended',
                        'Disconnected',
                        'Suspending',
                        'Stopping',
                        'Resuming',
                        'Removing'
                    ]
                ],
                'statusDetails' => ['type' => 'string'],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'exception' => ['type' => 'string'],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastStatusModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'DscCompilationJob' => ['properties' => [
                'id' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/DscCompilationJobProperties']
            ]],
            'DscCompilationJobListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/DscCompilationJob']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'DscConfigurationListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/DscConfiguration']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'DscConfigurationCreateOrUpdateProperties' => ['properties' => [
                'logVerbose' => ['type' => 'boolean'],
                'logProgress' => ['type' => 'boolean'],
                'source' => ['$ref' => '#/definitions/ContentSource'],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['$ref' => '#/definitions/DscConfigurationParameter']
                ],
                'description' => ['type' => 'string']
            ]],
            'DscConfigurationCreateOrUpdateParameters' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/DscConfigurationCreateOrUpdateProperties'],
                'name' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'DscMetaConfiguration' => ['properties' => [
                'configurationModeFrequencyMins' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'rebootNodeIfNeeded' => ['type' => 'boolean'],
                'configurationMode' => ['type' => 'string'],
                'actionAfterReboot' => ['type' => 'string'],
                'certificateId' => ['type' => 'string'],
                'refreshFrequencyMins' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'allowModuleOverwrite' => ['type' => 'boolean']
            ]],
            'DscNodeConfigurationCreateOrUpdateParameters' => ['properties' => [
                'source' => ['$ref' => '#/definitions/ContentSource'],
                'name' => ['type' => 'string'],
                'configuration' => ['$ref' => '#/definitions/DscConfigurationAssociationProperty']
            ]],
            'DscNodeConfiguration' => ['properties' => [
                'name' => ['type' => 'string'],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'configuration' => ['$ref' => '#/definitions/DscConfigurationAssociationProperty'],
                'id' => ['type' => 'string']
            ]],
            'DscNodeConfigurationListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/DscNodeConfiguration']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'DscNodeListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/DscNode']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'DscNodeUpdateParameters' => ['properties' => [
                'nodeId' => ['type' => 'string'],
                'nodeConfiguration' => ['$ref' => '#/definitions/DscNodeConfigurationAssociationProperty']
            ]],
            'DscReportError' => ['properties' => [
                'errorSource' => ['type' => 'string'],
                'resourceId' => ['type' => 'string'],
                'errorCode' => ['type' => 'string'],
                'errorMessage' => ['type' => 'string'],
                'locale' => ['type' => 'string'],
                'errorDetails' => ['type' => 'string']
            ]],
            'DscReportResourceNavigation' => ['properties' => ['resourceId' => ['type' => 'string']]],
            'DscReportResource' => ['properties' => [
                'resourceId' => ['type' => 'string'],
                'sourceInfo' => ['type' => 'string'],
                'dependsOn' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/DscReportResourceNavigation']
                ],
                'moduleName' => ['type' => 'string'],
                'moduleVersion' => ['type' => 'string'],
                'resourceName' => ['type' => 'string'],
                'error' => ['type' => 'string'],
                'status' => ['type' => 'string'],
                'durationInSeconds' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'startDate' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'DscNodeReport' => ['properties' => [
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'type' => ['type' => 'string'],
                'reportId' => ['type' => 'string'],
                'status' => ['type' => 'string'],
                'refreshMode' => ['type' => 'string'],
                'rebootRequested' => ['type' => 'string'],
                'reportFormatVersion' => ['type' => 'string'],
                'configurationVersion' => ['type' => 'string'],
                'id' => ['type' => 'string'],
                'errors' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/DscReportError']
                ],
                'resources' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/DscReportResource']
                ],
                'metaConfiguration' => ['$ref' => '#/definitions/DscMetaConfiguration'],
                'hostName' => ['type' => 'string'],
                'iPV4Addresses' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'iPV6Addresses' => [
                    'type' => 'array',
                    'items' => ['type' => 'string']
                ],
                'numberOfResources' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ],
                'rawErrors' => ['type' => 'string']
            ]],
            'DscNodeReportListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/DscNodeReport']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'HybridRunbookWorker' => ['properties' => [
                'name' => ['type' => 'string'],
                'ip' => ['type' => 'string'],
                'registrationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ]
            ]],
            'RunAsCredentialAssociationProperty' => ['properties' => ['name' => ['type' => 'string']]],
            'HybridRunbookWorkerGroup' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'hybridRunbookWorkers' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/HybridRunbookWorker']
                ],
                'credential' => ['$ref' => '#/definitions/RunAsCredentialAssociationProperty']
            ]],
            'HybridRunbookWorkerGroupsListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/HybridRunbookWorkerGroup']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'HybridRunbookWorkerGroupUpdateParameters' => ['properties' => ['credential' => ['$ref' => '#/definitions/RunAsCredentialAssociationProperty']]],
            'RunbookAssociationProperty' => ['properties' => ['name' => ['type' => 'string']]],
            'JobProperties' => ['properties' => [
                'runbook' => ['$ref' => '#/definitions/RunbookAssociationProperty'],
                'startedBy' => ['type' => 'string'],
                'runOn' => ['type' => 'string'],
                'jobId' => [
                    'type' => 'string',
                    'format' => 'uuid'
                ],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'New',
                        'Activating',
                        'Running',
                        'Completed',
                        'Failed',
                        'Stopped',
                        'Blocked',
                        'Suspended',
                        'Disconnected',
                        'Suspending',
                        'Stopping',
                        'Resuming',
                        'Removing'
                    ]
                ],
                'statusDetails' => ['type' => 'string'],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'exception' => ['type' => 'string'],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastStatusModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'Job' => ['properties' => [
                'id' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/JobProperties']
            ]],
            'JobCreateProperties' => ['properties' => [
                'runbook' => ['$ref' => '#/definitions/RunbookAssociationProperty'],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'runOn' => ['type' => 'string']
            ]],
            'JobCreateParameters' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/JobCreateProperties'],
                'name' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'JobListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Job']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ScheduleAssociationProperty' => ['properties' => ['name' => ['type' => 'string']]],
            'JobScheduleCreateProperties' => ['properties' => [
                'schedule' => ['$ref' => '#/definitions/ScheduleAssociationProperty'],
                'runbook' => ['$ref' => '#/definitions/RunbookAssociationProperty'],
                'runOn' => ['type' => 'string'],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'JobScheduleCreateParameters' => ['properties' => ['properties' => ['$ref' => '#/definitions/JobScheduleCreateProperties']]],
            'JobScheduleProperties' => ['properties' => [
                'jobScheduleId' => ['type' => 'string'],
                'schedule' => ['$ref' => '#/definitions/ScheduleAssociationProperty'],
                'runbook' => ['$ref' => '#/definitions/RunbookAssociationProperty'],
                'runOn' => ['type' => 'string'],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'JobSchedule' => ['properties' => [
                'id' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/JobScheduleProperties']
            ]],
            'JobScheduleListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/JobSchedule']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'JobStreamProperties' => ['properties' => [
                'jobStreamId' => ['type' => 'string'],
                'time' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'streamType' => [
                    'type' => 'string',
                    'enum' => [
                        'Progress',
                        'Output',
                        'Warning',
                        'Error',
                        'Debug',
                        'Verbose',
                        'Any'
                    ]
                ],
                'streamText' => ['type' => 'string'],
                'summary' => ['type' => 'string'],
                'value' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'object']
                ]
            ]],
            'JobStream' => ['properties' => [
                'id' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/JobStreamProperties']
            ]],
            'JobStreamListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/JobStream']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ModuleCreateOrUpdateProperties' => ['properties' => ['contentLink' => ['$ref' => '#/definitions/ContentLink']]],
            'ModuleCreateOrUpdateParameters' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ModuleCreateOrUpdateProperties'],
                'name' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'ModuleListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Module']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ModuleUpdateProperties' => ['properties' => ['contentLink' => ['$ref' => '#/definitions/ContentLink']]],
            'ModuleUpdateParameters' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/ModuleUpdateProperties'],
                'name' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'RunbookDraftUndoEditResult' => ['properties' => [
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
                'requestId' => ['type' => 'string']
            ]],
            'RunbookCreateOrUpdateProperties' => ['properties' => [
                'logVerbose' => ['type' => 'boolean'],
                'logProgress' => ['type' => 'boolean'],
                'runbookType' => [
                    'type' => 'string',
                    'enum' => [
                        'Script',
                        'Graph',
                        'PowerShellWorkflow',
                        'PowerShell',
                        'GraphPowerShellWorkflow',
                        'GraphPowerShell'
                    ]
                ],
                'draft' => ['$ref' => '#/definitions/RunbookDraft'],
                'publishContentLink' => ['$ref' => '#/definitions/ContentLink'],
                'description' => ['type' => 'string'],
                'logActivityTrace' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'RunbookCreateOrUpdateParameters' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/RunbookCreateOrUpdateProperties'],
                'name' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'RunbookCreateOrUpdateDraftProperties' => ['properties' => [
                'logVerbose' => ['type' => 'boolean'],
                'logProgress' => ['type' => 'boolean'],
                'runbookType' => [
                    'type' => 'string',
                    'enum' => [
                        'Script',
                        'Graph',
                        'PowerShellWorkflow',
                        'PowerShell',
                        'GraphPowerShellWorkflow',
                        'GraphPowerShell'
                    ]
                ],
                'draft' => ['$ref' => '#/definitions/RunbookDraft'],
                'description' => ['type' => 'string'],
                'logActivityTrace' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'RunbookCreateOrUpdateDraftParameters' => ['properties' => ['runbookContent' => ['type' => 'string']]],
            'RunbookUpdateProperties' => ['properties' => [
                'description' => ['type' => 'string'],
                'logVerbose' => ['type' => 'boolean'],
                'logProgress' => ['type' => 'boolean'],
                'logActivityTrace' => [
                    'type' => 'integer',
                    'format' => 'int32'
                ]
            ]],
            'RunbookUpdateParameters' => ['properties' => [
                'properties' => ['$ref' => '#/definitions/RunbookUpdateProperties'],
                'name' => ['type' => 'string'],
                'location' => ['type' => 'string'],
                'tags' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'RunbookListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Runbook']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'ScheduleCreateOrUpdateProperties' => ['properties' => [
                'description' => ['type' => 'string'],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'expiryTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'interval' => ['type' => 'object'],
                'frequency' => [
                    'type' => 'string',
                    'enum' => [
                        'OneTime',
                        'Day',
                        'Hour',
                        'Week',
                        'Month'
                    ]
                ],
                'timeZone' => ['type' => 'string'],
                'advancedSchedule' => ['$ref' => '#/definitions/AdvancedSchedule']
            ]],
            'ScheduleCreateOrUpdateParameters' => ['properties' => [
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ScheduleCreateOrUpdateProperties']
            ]],
            'ScheduleProperties' => ['properties' => [
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'startTimeOffsetMinutes' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'expiryTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'expiryTimeOffsetMinutes' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'isEnabled' => ['type' => 'boolean'],
                'nextRun' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'nextRunOffsetMinutes' => [
                    'type' => 'number',
                    'format' => 'double'
                ],
                'interval' => ['type' => 'object'],
                'frequency' => [
                    'type' => 'string',
                    'enum' => [
                        'OneTime',
                        'Day',
                        'Hour',
                        'Week',
                        'Month'
                    ]
                ],
                'timeZone' => ['type' => 'string'],
                'advancedSchedule' => ['$ref' => '#/definitions/AdvancedSchedule'],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'description' => ['type' => 'string']
            ]],
            'Schedule' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ScheduleProperties']
            ]],
            'ScheduleUpdateProperties' => ['properties' => [
                'description' => ['type' => 'string'],
                'isEnabled' => ['type' => 'boolean']
            ]],
            'ScheduleUpdateParameters' => ['properties' => [
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/ScheduleUpdateProperties']
            ]],
            'ScheduleListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Schedule']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'SubResource' => ['properties' => ['id' => ['type' => 'string']]],
            'TestJobCreateParameters' => ['properties' => [
                'runbookName' => ['type' => 'string'],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'runOn' => ['type' => 'string']
            ]],
            'TestJob' => ['properties' => [
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'status' => ['type' => 'string'],
                'statusDetails' => ['type' => 'string'],
                'runOn' => ['type' => 'string'],
                'startTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'endTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'exception' => ['type' => 'string'],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastStatusModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ]
            ]],
            'TypeField' => ['properties' => [
                'name' => ['type' => 'string'],
                'type' => ['type' => 'string']
            ]],
            'TypeFieldListResult' => ['properties' => ['value' => [
                'type' => 'array',
                'items' => ['$ref' => '#/definitions/TypeField']
            ]]],
            'VariableCreateOrUpdateProperties' => ['properties' => [
                'value' => ['type' => 'string'],
                'description' => ['type' => 'string'],
                'isEncrypted' => ['type' => 'boolean']
            ]],
            'VariableCreateOrUpdateParameters' => ['properties' => [
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/VariableCreateOrUpdateProperties']
            ]],
            'VariableProperties' => ['properties' => [
                'value' => ['type' => 'string'],
                'isEncrypted' => ['type' => 'boolean'],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'description' => ['type' => 'string']
            ]],
            'Variable' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/VariableProperties']
            ]],
            'VariableListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Variable']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'VariableUpdateProperties' => ['properties' => [
                'value' => ['type' => 'string'],
                'description' => ['type' => 'string']
            ]],
            'VariableUpdateParameters' => ['properties' => [
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/VariableUpdateProperties']
            ]],
            'WebhookCreateOrUpdateProperties' => ['properties' => [
                'isEnabled' => ['type' => 'boolean'],
                'uri' => ['type' => 'string'],
                'expiryTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'runbook' => ['$ref' => '#/definitions/RunbookAssociationProperty'],
                'runOn' => ['type' => 'string']
            ]],
            'WebhookCreateOrUpdateParameters' => ['properties' => [
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/WebhookCreateOrUpdateProperties']
            ]],
            'WebhookProperties' => ['properties' => [
                'isEnabled' => ['type' => 'boolean'],
                'uri' => ['type' => 'string'],
                'expiryTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastInvokedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'runbook' => ['$ref' => '#/definitions/RunbookAssociationProperty'],
                'runOn' => ['type' => 'string'],
                'creationTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'lastModifiedTime' => [
                    'type' => 'string',
                    'format' => 'date-time'
                ],
                'description' => ['type' => 'string']
            ]],
            'Webhook' => ['properties' => [
                'id' => ['type' => 'string'],
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/WebhookProperties']
            ]],
            'WebhookListResult' => ['properties' => [
                'value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Webhook']
                ],
                'nextLink' => ['type' => 'string']
            ]],
            'WebhookUpdateProperties' => ['properties' => [
                'isEnabled' => ['type' => 'boolean'],
                'runOn' => ['type' => 'string'],
                'parameters' => [
                    'type' => 'object',
                    'additionalProperties' => ['type' => 'string']
                ],
                'description' => ['type' => 'string']
            ]],
            'WebhookUpdateParameters' => ['properties' => [
                'name' => ['type' => 'string'],
                'properties' => ['$ref' => '#/definitions/WebhookUpdateProperties']
            ]]
        ]
    ];
}
