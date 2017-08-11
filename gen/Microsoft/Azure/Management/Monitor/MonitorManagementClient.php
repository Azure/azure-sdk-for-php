<?php
namespace Microsoft\Azure\Management\Monitor;
final class MonitorManagementClient
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
        $this->_AutoscaleSettings_group = new \Microsoft\Azure\Management\Monitor\AutoscaleSettings($_client);
        $this->_AlertRuleIncidents_group = new \Microsoft\Azure\Management\Monitor\AlertRuleIncidents($_client);
        $this->_AlertRules_group = new \Microsoft\Azure\Management\Monitor\AlertRules($_client);
        $this->_LogProfiles_group = new \Microsoft\Azure\Management\Monitor\LogProfiles($_client);
        $this->_ServiceDiagnosticSettings_group = new \Microsoft\Azure\Management\Monitor\ServiceDiagnosticSettings($_client);
        $this->_ActionGroups_group = new \Microsoft\Azure\Management\Monitor\ActionGroups($_client);
        $this->_ActivityLogAlerts_group = new \Microsoft\Azure\Management\Monitor\ActivityLogAlerts($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Monitor\AutoscaleSettings
     */
    public function getAutoscaleSettings()
    {
        return $this->_AutoscaleSettings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Monitor\AlertRuleIncidents
     */
    public function getAlertRuleIncidents()
    {
        return $this->_AlertRuleIncidents_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Monitor\AlertRules
     */
    public function getAlertRules()
    {
        return $this->_AlertRules_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Monitor\LogProfiles
     */
    public function getLogProfiles()
    {
        return $this->_LogProfiles_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Monitor\ServiceDiagnosticSettings
     */
    public function getServiceDiagnosticSettings()
    {
        return $this->_ServiceDiagnosticSettings_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Monitor\ActionGroups
     */
    public function getActionGroups()
    {
        return $this->_ActionGroups_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Monitor\ActivityLogAlerts
     */
    public function getActivityLogAlerts()
    {
        return $this->_ActivityLogAlerts_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Monitor\AutoscaleSettings
     */
    private $_AutoscaleSettings_group;
    /**
     * @var \Microsoft\Azure\Management\Monitor\AlertRuleIncidents
     */
    private $_AlertRuleIncidents_group;
    /**
     * @var \Microsoft\Azure\Management\Monitor\AlertRules
     */
    private $_AlertRules_group;
    /**
     * @var \Microsoft\Azure\Management\Monitor\LogProfiles
     */
    private $_LogProfiles_group;
    /**
     * @var \Microsoft\Azure\Management\Monitor\ServiceDiagnosticSettings
     */
    private $_ServiceDiagnosticSettings_group;
    /**
     * @var \Microsoft\Azure\Management\Monitor\ActionGroups
     */
    private $_ActionGroups_group;
    /**
     * @var \Microsoft\Azure\Management\Monitor\ActivityLogAlerts
     */
    private $_ActivityLogAlerts_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/microsoft.insights/autoscalesettings' => ['get' => [
                'operationId' => 'AutoscaleSettings_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-04-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AutoscaleSettingResourceCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/microsoft.insights/autoscalesettings/{autoscaleSettingName}' => [
                'put' => [
                    'operationId' => 'AutoscaleSettings_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'autoscaleSettingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AutoscaleSettingResource']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/AutoscaleSettingResource']],
                        '201' => ['schema' => ['$ref' => '#/definitions/AutoscaleSettingResource']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'AutoscaleSettings_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'autoscaleSettingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-01']
                        ],
                        [
                            'name' => 'subscriptionId',
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
                    'operationId' => 'AutoscaleSettings_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'autoscaleSettingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AutoscaleSettingResource']]]
                ],
                'patch' => [
                    'operationId' => 'AutoscaleSettings_Update',
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
                            'name' => 'autoscaleSettingName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-04-01']
                        ],
                        [
                            'name' => 'autoscaleSettingResource',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AutoscaleSettingResourcePatch']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AutoscaleSettingResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/microsoft.insights/alertrules/{ruleName}/incidents/{incidentName}' => ['get' => [
                'operationId' => 'AlertRuleIncidents_Get',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'ruleName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'incidentName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Incident']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/microsoft.insights/alertrules/{ruleName}/incidents' => ['get' => [
                'operationId' => 'AlertRuleIncidents_ListByAlertRule',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'ruleName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IncidentListResult']]]
            ]],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/microsoft.insights/alertrules/{ruleName}' => [
                'put' => [
                    'operationId' => 'AlertRules_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'ruleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AlertRuleResource']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/AlertRuleResource']],
                        '201' => ['schema' => ['$ref' => '#/definitions/AlertRuleResource']]
                    ]
                ],
                'delete' => [
                    'operationId' => 'AlertRules_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'ruleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => [
                        '204' => [],
                        '200' => []
                    ]
                ],
                'get' => [
                    'operationId' => 'AlertRules_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'ruleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AlertRuleResource']]]
                ],
                'patch' => [
                    'operationId' => 'AlertRules_Update',
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
                            'name' => 'ruleName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
                        [
                            'name' => 'alertRulesResource',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AlertRuleResourcePatch']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/AlertRuleResource']],
                        '201' => ['schema' => ['$ref' => '#/definitions/AlertRuleResource']]
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourcegroups/{resourceGroupName}/providers/microsoft.insights/alertrules' => ['get' => [
                'operationId' => 'AlertRules_ListByResourceGroup',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AlertRuleResourceCollection']]]
            ]],
            '/subscriptions/{subscriptionId}/providers/microsoft.insights/logprofiles/{logProfileName}' => [
                'delete' => [
                    'operationId' => 'LogProfiles_Delete',
                    'parameters' => [
                        [
                            'name' => 'logProfileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => []]
                ],
                'get' => [
                    'operationId' => 'LogProfiles_Get',
                    'parameters' => [
                        [
                            'name' => 'logProfileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LogProfileResource']]]
                ],
                'put' => [
                    'operationId' => 'LogProfiles_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'logProfileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/LogProfileResource']
                        ],
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LogProfileResource']]]
                ],
                'patch' => [
                    'operationId' => 'LogProfiles_Update',
                    'parameters' => [
                        [
                            'name' => 'subscriptionId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'logProfileName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-03-01']
                        ],
                        [
                            'name' => 'logProfilesResource',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/LogProfileResourcePatch']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LogProfileResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/microsoft.insights/logprofiles' => ['get' => [
                'operationId' => 'LogProfiles_List',
                'parameters' => [
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-03-01']
                    ],
                    [
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LogProfileCollection']]]
            ]],
            '/{resourceUri}/providers/microsoft.insights/diagnosticSettings/service' => [
                'get' => [
                    'operationId' => 'ServiceDiagnosticSettings_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceUri',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServiceDiagnosticSettingsResource']]]
                ],
                'put' => [
                    'operationId' => 'ServiceDiagnosticSettings_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceUri',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ServiceDiagnosticSettingsResource']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServiceDiagnosticSettingsResource']]]
                ],
                'patch' => [
                    'operationId' => 'ServiceDiagnosticSettings_Update',
                    'parameters' => [
                        [
                            'name' => 'resourceUri',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ],
                        [
                            'name' => 'serviceDiagnosticSettingsResource',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ServiceDiagnosticSettingsResourcePatch']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ServiceDiagnosticSettingsResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/microsoft.insights/actionGroups/{actionGroupName}' => [
                'put' => [
                    'operationId' => 'ActionGroups_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'actionGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'actionGroup',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ActionGroupResource']
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
                            'enum' => ['2017-04-01']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ActionGroupResource']],
                        '201' => ['schema' => ['$ref' => '#/definitions/ActionGroupResource']]
                    ]
                ],
                'get' => [
                    'operationId' => 'ActionGroups_Get',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'actionGroupName',
                            'in' => 'path',
                            'required' => TRUE,
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
                            'enum' => ['2017-04-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ActionGroupResource']]]
                ],
                'delete' => [
                    'operationId' => 'ActionGroups_Delete',
                    'parameters' => [
                        [
                            'name' => 'resourceGroupName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'actionGroupName',
                            'in' => 'path',
                            'required' => TRUE,
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
                            'enum' => ['2017-04-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/microsoft.insights/actionGroups' => ['get' => [
                'operationId' => 'ActionGroups_ListBySubscriptionId',
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
                        'enum' => ['2017-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ActionGroupList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/microsoft.insights/actionGroups' => ['get' => [
                'operationId' => 'ActionGroups_ListByResourceGroup',
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
                        'enum' => ['2017-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ActionGroupList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/microsoft.insights/actionGroups/{actionGroupName}/subscribe' => ['post' => [
                'operationId' => 'ActionGroups_EnableReceiver',
                'parameters' => [
                    [
                        'name' => 'resourceGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'actionGroupName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'enableRequest',
                        'in' => 'body',
                        'required' => TRUE,
                        'schema' => ['$ref' => '#/definitions/EnableRequest']
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
                        'enum' => ['2017-04-01']
                    ]
                ],
                'responses' => ['200' => []]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/microsoft.insights/activityLogAlerts/{activityLogAlertName}' => [
                'put' => [
                    'operationId' => 'ActivityLogAlerts_CreateOrUpdate',
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
                            'name' => 'activityLogAlertName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
                        ],
                        [
                            'name' => 'activityLogAlert',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ActivityLogAlertResource']
                        ]
                    ],
                    'responses' => [
                        '200' => ['schema' => ['$ref' => '#/definitions/ActivityLogAlertResource']],
                        '201' => ['schema' => ['$ref' => '#/definitions/ActivityLogAlertResource']]
                    ]
                ],
                'get' => [
                    'operationId' => 'ActivityLogAlerts_Get',
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
                            'name' => 'activityLogAlertName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ActivityLogAlertResource']]]
                ],
                'delete' => [
                    'operationId' => 'ActivityLogAlerts_Delete',
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
                            'name' => 'activityLogAlertName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'patch' => [
                    'operationId' => 'ActivityLogAlerts_Update',
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
                            'name' => 'activityLogAlertName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2017-04-01']
                        ],
                        [
                            'name' => 'activityLogAlertPatch',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ActivityLogAlertPatchBody']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ActivityLogAlertResource']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/microsoft.insights/activityLogAlerts' => ['get' => [
                'operationId' => 'ActivityLogAlerts_ListBySubscriptionId',
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
                        'enum' => ['2017-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ActivityLogAlertList']]]
            ]],
            '/subscriptions/{subscriptionId}/resourceGroups/{resourceGroupName}/providers/microsoft.insights/activityLogAlerts' => ['get' => [
                'operationId' => 'ActivityLogAlerts_ListByResourceGroup',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2017-04-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ActivityLogAlertList']]]
            ]]
        ],
        'definitions' => [
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
            'ScaleCapacity' => [
                'properties' => [
                    'minimum' => ['type' => 'string'],
                    'maximum' => ['type' => 'string'],
                    'default' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'minimum',
                    'maximum',
                    'default'
                ]
            ],
            'MetricTrigger' => [
                'properties' => [
                    'metricName' => ['type' => 'string'],
                    'metricResourceUri' => ['type' => 'string'],
                    'timeGrain' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'statistic' => [
                        'type' => 'string',
                        'enum' => [
                            'Average',
                            'Min',
                            'Max',
                            'Sum'
                        ]
                    ],
                    'timeWindow' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'timeAggregation' => [
                        'type' => 'string',
                        'enum' => [
                            'Average',
                            'Minimum',
                            'Maximum',
                            'Total',
                            'Count'
                        ]
                    ],
                    'operator' => [
                        'type' => 'string',
                        'enum' => [
                            'Equals',
                            'NotEquals',
                            'GreaterThan',
                            'GreaterThanOrEqual',
                            'LessThan',
                            'LessThanOrEqual'
                        ]
                    ],
                    'threshold' => [
                        'type' => 'number',
                        'format' => 'double'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'metricName',
                    'metricResourceUri',
                    'timeGrain',
                    'statistic',
                    'timeWindow',
                    'timeAggregation',
                    'operator',
                    'threshold'
                ]
            ],
            'ScaleAction' => [
                'properties' => [
                    'direction' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Increase',
                            'Decrease'
                        ]
                    ],
                    'type' => [
                        'type' => 'string',
                        'enum' => [
                            'ChangeCount',
                            'PercentChangeCount',
                            'ExactCount'
                        ]
                    ],
                    'value' => ['type' => 'string'],
                    'cooldown' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'direction',
                    'type',
                    'cooldown'
                ]
            ],
            'ScaleRule' => [
                'properties' => [
                    'metricTrigger' => ['$ref' => '#/definitions/MetricTrigger'],
                    'scaleAction' => ['$ref' => '#/definitions/ScaleAction']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'metricTrigger',
                    'scaleAction'
                ]
            ],
            'TimeWindow' => [
                'properties' => [
                    'timeZone' => ['type' => 'string'],
                    'start' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'end' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'start',
                    'end'
                ]
            ],
            'RecurrentSchedule' => [
                'properties' => [
                    'timeZone' => ['type' => 'string'],
                    'days' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'hours' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'integer',
                            'format' => 'int32'
                        ]
                    ],
                    'minutes' => [
                        'type' => 'array',
                        'items' => [
                            'type' => 'integer',
                            'format' => 'int32'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'timeZone',
                    'days',
                    'hours',
                    'minutes'
                ]
            ],
            'Recurrence' => [
                'properties' => [
                    'frequency' => [
                        'type' => 'string',
                        'enum' => [
                            'None',
                            'Second',
                            'Minute',
                            'Hour',
                            'Day',
                            'Week',
                            'Month',
                            'Year'
                        ]
                    ],
                    'schedule' => ['$ref' => '#/definitions/RecurrentSchedule']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'frequency',
                    'schedule'
                ]
            ],
            'AutoscaleProfile' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'capacity' => ['$ref' => '#/definitions/ScaleCapacity'],
                    'rules' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ScaleRule']
                    ],
                    'fixedDate' => ['$ref' => '#/definitions/TimeWindow'],
                    'recurrence' => ['$ref' => '#/definitions/Recurrence']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'capacity',
                    'rules'
                ]
            ],
            'EmailNotification' => [
                'properties' => [
                    'sendToSubscriptionAdministrator' => ['type' => 'boolean'],
                    'sendToSubscriptionCoAdministrators' => ['type' => 'boolean'],
                    'customEmails' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'WebhookNotification' => [
                'properties' => [
                    'serviceUri' => ['type' => 'string'],
                    'properties' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AutoscaleNotification' => [
                'properties' => [
                    'operation' => ['type' => 'string'],
                    'email' => ['$ref' => '#/definitions/EmailNotification'],
                    'webhooks' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/WebhookNotification']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['operation']
            ],
            'AutoscaleSetting' => [
                'properties' => [
                    'profiles' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AutoscaleProfile']
                    ],
                    'notifications' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AutoscaleNotification']
                    ],
                    'enabled' => ['type' => 'boolean'],
                    'name' => ['type' => 'string'],
                    'targetResourceUri' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['profiles']
            ],
            'AutoscaleSettingResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AutoscaleSetting']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'AutoscaleSettingResourcePatch' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'properties' => ['$ref' => '#/definitions/AutoscaleSetting']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AutoscaleSettingResourceCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AutoscaleSettingResource']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'ErrorResponse' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Incident' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'ruleName' => ['type' => 'string'],
                    'isActive' => ['type' => 'boolean'],
                    'activatedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'resolvedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'IncidentListResult' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/Incident']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RuleDataSource' => [
                'properties' => ['resourceUri' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RuleCondition' => [
                'properties' => ['dataSource' => ['$ref' => '#/definitions/RuleDataSource']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Azure.Management.Insights.Models.RuleMetricDataSource' => [
                'properties' => ['metricName' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RuleManagementEventClaimsDataSource' => [
                'properties' => ['emailAddress' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Azure.Management.Insights.Models.RuleManagementEventDataSource' => [
                'properties' => [
                    'eventName' => ['type' => 'string'],
                    'eventSource' => ['type' => 'string'],
                    'level' => ['type' => 'string'],
                    'operationName' => ['type' => 'string'],
                    'resourceGroupName' => ['type' => 'string'],
                    'resourceProviderName' => ['type' => 'string'],
                    'status' => ['type' => 'string'],
                    'subStatus' => ['type' => 'string'],
                    'claims' => ['$ref' => '#/definitions/RuleManagementEventClaimsDataSource']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Azure.Management.Insights.Models.ThresholdRuleCondition' => [
                'properties' => [
                    'operator' => [
                        'type' => 'string',
                        'enum' => [
                            'GreaterThan',
                            'GreaterThanOrEqual',
                            'LessThan',
                            'LessThanOrEqual'
                        ]
                    ],
                    'threshold' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'windowSize' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'timeAggregation' => [
                        'type' => 'string',
                        'enum' => [
                            'Average',
                            'Minimum',
                            'Maximum',
                            'Total',
                            'Last'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'operator',
                    'threshold'
                ]
            ],
            'Microsoft.Azure.Management.Insights.Models.LocationThresholdRuleCondition' => [
                'properties' => [
                    'windowSize' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'failedLocationCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['failedLocationCount']
            ],
            'ManagementEventAggregationCondition' => [
                'properties' => [
                    'operator' => [
                        'type' => 'string',
                        'enum' => [
                            'GreaterThan',
                            'GreaterThanOrEqual',
                            'LessThan',
                            'LessThanOrEqual'
                        ]
                    ],
                    'threshold' => [
                        'type' => 'number',
                        'format' => 'double'
                    ],
                    'windowSize' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Azure.Management.Insights.Models.ManagementEventRuleCondition' => [
                'properties' => ['aggregation' => ['$ref' => '#/definitions/ManagementEventAggregationCondition']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RuleAction' => [
                'properties' => [],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Azure.Management.Insights.Models.RuleEmailAction' => [
                'properties' => [
                    'sendToServiceOwners' => ['type' => 'boolean'],
                    'customEmails' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'Microsoft.Azure.Management.Insights.Models.RuleWebhookAction' => [
                'properties' => [
                    'serviceUri' => ['type' => 'string'],
                    'properties' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AlertRule' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'isEnabled' => ['type' => 'boolean'],
                    'condition' => ['$ref' => '#/definitions/RuleCondition'],
                    'actions' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/RuleAction']
                    ],
                    'lastUpdatedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'isEnabled',
                    'condition'
                ]
            ],
            'AlertRuleResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AlertRule']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'AlertRuleResourcePatch' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'properties' => ['$ref' => '#/definitions/AlertRule']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'AlertRuleResourceCollection' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/AlertRuleResource']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'RetentionPolicy' => [
                'properties' => [
                    'enabled' => ['type' => 'boolean'],
                    'days' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'enabled',
                    'days'
                ]
            ],
            'LogProfileProperties' => [
                'properties' => [
                    'storageAccountId' => ['type' => 'string'],
                    'serviceBusRuleId' => ['type' => 'string'],
                    'locations' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'categories' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'retentionPolicy' => ['$ref' => '#/definitions/RetentionPolicy']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'locations',
                    'categories',
                    'retentionPolicy'
                ]
            ],
            'LogProfileResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/LogProfileProperties']],
                'additionalProperties' => FALSE,
                'required' => ['properties']
            ],
            'LogProfileResourcePatch' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'properties' => ['$ref' => '#/definitions/LogProfileProperties']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'LogProfileCollection' => [
                'properties' => ['value' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/LogProfileResource']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['value']
            ],
            'MetricSettings' => [
                'properties' => [
                    'timeGrain' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'enabled' => ['type' => 'boolean'],
                    'retentionPolicy' => ['$ref' => '#/definitions/RetentionPolicy']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'timeGrain',
                    'enabled'
                ]
            ],
            'LogSettings' => [
                'properties' => [
                    'category' => ['type' => 'string'],
                    'enabled' => ['type' => 'boolean'],
                    'retentionPolicy' => ['$ref' => '#/definitions/RetentionPolicy']
                ],
                'additionalProperties' => FALSE,
                'required' => ['enabled']
            ],
            'ServiceDiagnosticSettings' => [
                'properties' => [
                    'storageAccountId' => ['type' => 'string'],
                    'serviceBusRuleId' => ['type' => 'string'],
                    'eventHubAuthorizationRuleId' => ['type' => 'string'],
                    'metrics' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/MetricSettings']
                    ],
                    'logs' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/LogSettings']
                    ],
                    'workspaceId' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ServiceDiagnosticSettingsResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ServiceDiagnosticSettings']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ServiceDiagnosticSettingsResourcePatch' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'properties' => ['$ref' => '#/definitions/ServiceDiagnosticSettings']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EmailReceiver' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'emailAddress' => ['type' => 'string'],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'NotSpecified',
                            'Enabled',
                            'Disabled'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'emailAddress'
                ]
            ],
            'SmsReceiver' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'countryCode' => ['type' => 'string'],
                    'phoneNumber' => ['type' => 'string'],
                    'status' => [
                        'type' => 'string',
                        'enum' => [
                            'NotSpecified',
                            'Enabled',
                            'Disabled'
                        ]
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'countryCode',
                    'phoneNumber'
                ]
            ],
            'WebhookReceiver' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'serviceUri' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'name',
                    'serviceUri'
                ]
            ],
            'ActionGroup' => [
                'properties' => [
                    'groupShortName' => ['type' => 'string'],
                    'enabled' => ['type' => 'boolean'],
                    'emailReceivers' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/EmailReceiver']
                    ],
                    'smsReceivers' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/SmsReceiver']
                    ],
                    'webhookReceivers' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/WebhookReceiver']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'groupShortName',
                    'enabled'
                ]
            ],
            'ActionGroupResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ActionGroup']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ActionGroupList' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ActionGroupResource']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'EnableRequest' => [
                'properties' => ['receiverName' => ['type' => 'string']],
                'additionalProperties' => FALSE,
                'required' => ['receiverName']
            ],
            'ActivityLogAlertLeafCondition' => [
                'properties' => [
                    'field' => ['type' => 'string'],
                    'equals' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'field',
                    'equals'
                ]
            ],
            'ActivityLogAlertAllOfCondition' => [
                'properties' => ['allOf' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ActivityLogAlertLeafCondition']
                ]],
                'additionalProperties' => FALSE,
                'required' => ['allOf']
            ],
            'ActivityLogAlertActionGroup' => [
                'properties' => [
                    'actionGroupId' => ['type' => 'string'],
                    'webhookProperties' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ]
                ],
                'additionalProperties' => FALSE,
                'required' => ['actionGroupId']
            ],
            'ActivityLogAlertActionList' => [
                'properties' => ['actionGroups' => [
                    'type' => 'array',
                    'items' => ['$ref' => '#/definitions/ActivityLogAlertActionGroup']
                ]],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ActivityLogAlert' => [
                'properties' => [
                    'scopes' => [
                        'type' => 'array',
                        'items' => ['type' => 'string']
                    ],
                    'enabled' => ['type' => 'boolean'],
                    'condition' => ['$ref' => '#/definitions/ActivityLogAlertAllOfCondition'],
                    'actions' => ['$ref' => '#/definitions/ActivityLogAlertActionList'],
                    'description' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => [
                    'scopes',
                    'condition',
                    'actions'
                ]
            ],
            'ActivityLogAlertResource' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ActivityLogAlert']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ActivityLogAlertList' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ActivityLogAlertResource']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ActivityLogAlertPatch' => [
                'properties' => ['enabled' => ['type' => 'boolean']],
                'additionalProperties' => FALSE,
                'required' => []
            ],
            'ActivityLogAlertPatchBody' => [
                'properties' => [
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'properties' => ['$ref' => '#/definitions/ActivityLogAlertPatch']
                ],
                'additionalProperties' => FALSE,
                'required' => []
            ]
        ]
    ];
}
