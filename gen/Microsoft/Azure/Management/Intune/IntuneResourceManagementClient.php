<?php
namespace Microsoft\Azure\Management\Intune;
final class IntuneResourceManagementClient
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
        $this->_Ios_group = new \Microsoft\Azure\Management\Intune\Ios($_client);
        $this->_Android_group = new \Microsoft\Azure\Management\Intune\Android($_client);
        $this->_GetLocations_operation = $_client->createOperation('GetLocations');
        $this->_GetLocationByHostName_operation = $_client->createOperation('GetLocationByHostName');
        $this->_GetApps_operation = $_client->createOperation('GetApps');
        $this->_GetMAMUserDevices_operation = $_client->createOperation('GetMAMUserDevices');
        $this->_GetMAMUserDeviceByDeviceName_operation = $_client->createOperation('GetMAMUserDeviceByDeviceName');
        $this->_WipeMAMUserDevice_operation = $_client->createOperation('WipeMAMUserDevice');
        $this->_GetOperationResults_operation = $_client->createOperation('GetOperationResults');
        $this->_GetMAMStatuses_operation = $_client->createOperation('GetMAMStatuses');
        $this->_GetMAMFlaggedUsers_operation = $_client->createOperation('GetMAMFlaggedUsers');
        $this->_GetMAMFlaggedUserByName_operation = $_client->createOperation('GetMAMFlaggedUserByName');
        $this->_GetMAMUserFlaggedEnrolledApps_operation = $_client->createOperation('GetMAMUserFlaggedEnrolledApps');
    }
    /**
     * @return \Microsoft\Azure\Management\Intune\Ios
     */
    public function getIos()
    {
        return $this->_Ios_group;
    }
    /**
     * @return \Microsoft\Azure\Management\Intune\Android
     */
    public function getAndroid()
    {
        return $this->_Android_group;
    }
    /**
     * Returns location for user tenant.
     * @return array
     */
    public function getLocations()
    {
        return $this->_GetLocations_operation->call([]);
    }
    /**
     * Returns location for given tenant.
     * @return array
     */
    public function getLocationByHostName()
    {
        return $this->_GetLocationByHostName_operation->call([]);
    }
    /**
     * Returns Intune Manageable apps.
     * @param string $hostName
     * @param string|null $_filter
     * @param integer|null $_top
     * @param string|null $_select
     * @return array
     */
    public function getApps(
        $hostName,
        $_filter = null,
        $_top = null,
        $_select = null
    )
    {
        return $this->_GetApps_operation->call([
            'hostName' => $hostName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$select' => $_select
        ]);
    }
    /**
     * Get devices for a user.
     * @param string $hostName
     * @param string $userName
     * @param string|null $_filter
     * @param integer|null $_top
     * @param string|null $_select
     * @return array
     */
    public function getMAMUserDevices(
        $hostName,
        $userName,
        $_filter = null,
        $_top = null,
        $_select = null
    )
    {
        return $this->_GetMAMUserDevices_operation->call([
            'hostName' => $hostName,
            'userName' => $userName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$select' => $_select
        ]);
    }
    /**
     * Get a unique device for a user.
     * @param string $hostName
     * @param string $userName
     * @param string $deviceName
     * @param string|null $_select
     * @return array
     */
    public function getMAMUserDeviceByDeviceName(
        $hostName,
        $userName,
        $deviceName,
        $_select = null
    )
    {
        return $this->_GetMAMUserDeviceByDeviceName_operation->call([
            'hostName' => $hostName,
            'userName' => $userName,
            'deviceName' => $deviceName,
            '$select' => $_select
        ]);
    }
    /**
     * Wipe a device for a user.
     * @param string $hostName
     * @param string $userName
     * @param string $deviceName
     * @return array
     */
    public function wipeMAMUserDevice(
        $hostName,
        $userName,
        $deviceName
    )
    {
        return $this->_WipeMAMUserDevice_operation->call([
            'hostName' => $hostName,
            'userName' => $userName,
            'deviceName' => $deviceName
        ]);
    }
    /**
     * Returns operationResults.
     * @param string $hostName
     * @param string|null $_filter
     * @param integer|null $_top
     * @param string|null $_select
     * @return array
     */
    public function getOperationResults(
        $hostName,
        $_filter = null,
        $_top = null,
        $_select = null
    )
    {
        return $this->_GetOperationResults_operation->call([
            'hostName' => $hostName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$select' => $_select
        ]);
    }
    /**
     * Returns Intune Tenant level statuses.
     * @param string $hostName
     * @return array
     */
    public function getMAMStatuses($hostName)
    {
        return $this->_GetMAMStatuses_operation->call(['hostName' => $hostName]);
    }
    /**
     * Returns Intune flagged user collection
     * @param string $hostName
     * @param string|null $_filter
     * @param integer|null $_top
     * @param string|null $_select
     * @return array
     */
    public function getMAMFlaggedUsers(
        $hostName,
        $_filter = null,
        $_top = null,
        $_select = null
    )
    {
        return $this->_GetMAMFlaggedUsers_operation->call([
            'hostName' => $hostName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$select' => $_select
        ]);
    }
    /**
     * Returns Intune flagged user details
     * @param string $hostName
     * @param string $userName
     * @param string|null $_select
     * @return array
     */
    public function getMAMFlaggedUserByName(
        $hostName,
        $userName,
        $_select = null
    )
    {
        return $this->_GetMAMFlaggedUserByName_operation->call([
            'hostName' => $hostName,
            'userName' => $userName,
            '$select' => $_select
        ]);
    }
    /**
     * Returns Intune flagged enrolled app collection for the User
     * @param string $hostName
     * @param string $userName
     * @param string|null $_filter
     * @param integer|null $_top
     * @param string|null $_select
     * @return array
     */
    public function getMAMUserFlaggedEnrolledApps(
        $hostName,
        $userName,
        $_filter = null,
        $_top = null,
        $_select = null
    )
    {
        return $this->_GetMAMUserFlaggedEnrolledApps_operation->call([
            'hostName' => $hostName,
            'userName' => $userName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$select' => $_select
        ]);
    }
    /**
     * @var \Microsoft\Azure\Management\Intune\Ios
     */
    private $_Ios_group;
    /**
     * @var \Microsoft\Azure\Management\Intune\Android
     */
    private $_Android_group;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetLocations_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetLocationByHostName_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetApps_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMAMUserDevices_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMAMUserDeviceByDeviceName_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_WipeMAMUserDevice_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetOperationResults_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMAMStatuses_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMAMFlaggedUsers_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMAMFlaggedUserByName_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMAMUserFlaggedEnrolledApps_operation;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/providers/Microsoft.Intune/locations' => ['get' => [
                'operationId' => 'GetLocations',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2015-01-14-preview']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/LocationCollection']]]
            ]],
            '/providers/Microsoft.Intune/locations/hostName' => ['get' => [
                'operationId' => 'GetLocationByHostName',
                'parameters' => [[
                    'name' => 'api-version',
                    'in' => 'query',
                    'required' => TRUE,
                    'type' => 'string',
                    'enum' => ['2015-01-14-preview']
                ]],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Location']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/apps' => ['get' => [
                'operationId' => 'GetApps',
                'parameters' => [
                    [
                        'name' => 'hostName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplicationCollection']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/users/{userName}/devices' => ['get' => [
                'operationId' => 'GetMAMUserDevices',
                'parameters' => [
                    [
                        'name' => 'hostName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'userName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/DeviceCollection']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/users/{userName}/devices/{deviceName}' => ['get' => [
                'operationId' => 'GetMAMUserDeviceByDeviceName',
                'parameters' => [
                    [
                        'name' => 'hostName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'userName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/Device']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/users/{userName}/devices/{deviceName}/wipe' => ['post' => [
                'operationId' => 'WipeMAMUserDevice',
                'parameters' => [
                    [
                        'name' => 'hostName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'userName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'deviceName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/WipeDeviceOperationResult']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/operationResults' => ['get' => [
                'operationId' => 'GetOperationResults',
                'parameters' => [
                    [
                        'name' => 'hostName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/OperationResultCollection']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/statuses/default' => ['get' => [
                'operationId' => 'GetMAMStatuses',
                'parameters' => [
                    [
                        'name' => 'hostName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/StatusesDefault']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/flaggedUsers' => ['get' => [
                'operationId' => 'GetMAMFlaggedUsers',
                'parameters' => [
                    [
                        'name' => 'hostName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FlaggedUserCollection']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/flaggedUsers/{userName}' => ['get' => [
                'operationId' => 'GetMAMFlaggedUserByName',
                'parameters' => [
                    [
                        'name' => 'hostName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'userName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FlaggedUser']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/flaggedUsers/{userName}/flaggedEnrolledApps' => ['get' => [
                'operationId' => 'GetMAMUserFlaggedEnrolledApps',
                'parameters' => [
                    [
                        'name' => 'hostName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'userName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/FlaggedEnrolledAppCollection']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/iosPolicies' => ['get' => [
                'operationId' => 'Ios_GetMAMPolicies',
                'parameters' => [
                    [
                        'name' => 'hostName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/IOSMAMPolicyCollection']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/iosPolicies/{policyName}' => [
                'get' => [
                    'operationId' => 'Ios_GetMAMPolicyByName',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ],
                        [
                            'name' => '$select',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/iOSMAMPolicy']]]
                ],
                'put' => [
                    'operationId' => 'Ios_CreateOrUpdateMAMPolicy',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/iOSMAMPolicy']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/iOSMAMPolicy']]]
                ],
                'patch' => [
                    'operationId' => 'Ios_PatchMAMPolicy',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/iOSMAMPolicy']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/iOSMAMPolicy']]]
                ],
                'delete' => [
                    'operationId' => 'Ios_DeleteMAMPolicy',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/providers/Microsoft.Intune/locations/{hostName}/iosPolicies/{policyName}/apps' => ['get' => [
                'operationId' => 'Ios_GetAppForMAMPolicy',
                'parameters' => [
                    [
                        'name' => 'hostName',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplicationCollection']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/iosPolicies/{policyName}/apps/{appName}' => [
                'put' => [
                    'operationId' => 'Ios_AddAppForMAMPolicy',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'appName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/MAMPolicyAppIdOrGroupIdPayload']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Ios_DeleteAppForMAMPolicy',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'appName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/providers/Microsoft.Intune/locations/{hostName}/iosPolicies/{policyName}/groups' => ['get' => [
                'operationId' => 'Ios_GetGroupsForMAMPolicy',
                'parameters' => [
                    [
                        'name' => 'hostName',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GroupsCollection']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/iosPolicies/{policyName}/groups/{groupId}' => [
                'put' => [
                    'operationId' => 'Ios_AddGroupForMAMPolicy',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'groupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/MAMPolicyAppIdOrGroupIdPayload']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Ios_DeleteGroupForMAMPolicy',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'groupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/providers/Microsoft.Intune/locations/{hostName}/androidPolicies' => ['get' => [
                'operationId' => 'Android_GetMAMPolicies',
                'parameters' => [
                    [
                        'name' => 'hostName',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AndroidMAMPolicyCollection']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/androidPolicies/{policyName}' => [
                'get' => [
                    'operationId' => 'Android_GetMAMPolicyByName',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ],
                        [
                            'name' => '$select',
                            'in' => 'query',
                            'required' => FALSE,
                            'type' => 'string'
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AndroidMAMPolicy']]]
                ],
                'put' => [
                    'operationId' => 'Android_CreateOrUpdateMAMPolicy',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AndroidMAMPolicy']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AndroidMAMPolicy']]]
                ],
                'patch' => [
                    'operationId' => 'Android_PatchMAMPolicy',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/AndroidMAMPolicy']
                        ]
                    ],
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/AndroidMAMPolicy']]]
                ],
                'delete' => [
                    'operationId' => 'Android_DeleteMAMPolicy',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/providers/Microsoft.Intune/locations/{hostName}/AndroidPolicies/{policyName}/apps' => ['get' => [
                'operationId' => 'Android_GetAppForMAMPolicy',
                'parameters' => [
                    [
                        'name' => 'hostName',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$top',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    [
                        'name' => '$select',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ApplicationCollection']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/androidPolicies/{policyName}/apps/{appName}' => [
                'put' => [
                    'operationId' => 'Android_AddAppForMAMPolicy',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'appName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/MAMPolicyAppIdOrGroupIdPayload']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Android_DeleteAppForMAMPolicy',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'appName',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ],
            '/providers/Microsoft.Intune/locations/{hostName}/androidPolicies/{policyName}/groups' => ['get' => [
                'operationId' => 'Android_GetGroupsForMAMPolicy',
                'parameters' => [
                    [
                        'name' => 'hostName',
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
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2015-01-14-preview']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/GroupsCollection']]]
            ]],
            '/providers/Microsoft.Intune/locations/{hostName}/androidPolicies/{policyName}/groups/{groupId}' => [
                'put' => [
                    'operationId' => 'Android_AddGroupForMAMPolicy',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'groupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/MAMPolicyAppIdOrGroupIdPayload']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'delete' => [
                    'operationId' => 'Android_DeleteGroupForMAMPolicy',
                    'parameters' => [
                        [
                            'name' => 'hostName',
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
                            'name' => 'groupId',
                            'in' => 'path',
                            'required' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2015-01-14-preview']
                        ]
                    ],
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ]
            ]
        ],
        'definitions' => [
            'Resource' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'type' => ['type' => 'string'],
                    'tags' => [
                        'type' => 'object',
                        'additionalProperties' => ['type' => 'string']
                    ],
                    'location' => ['type' => 'string']
                ],
                'required' => []
            ],
            'LocationProperties' => [
                'properties' => ['hostName' => ['type' => 'string']],
                'required' => ['hostName']
            ],
            'Location' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/LocationProperties']],
                'required' => []
            ],
            'Error' => [
                'properties' => [
                    'code' => ['type' => 'string'],
                    'message' => ['type' => 'string']
                ],
                'required' => [
                    'code',
                    'message'
                ]
            ],
            'LocationCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Location']
                    ],
                    'nextlink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'GroupProperties' => [
                'properties' => ['friendlyName' => ['type' => 'string']],
                'required' => ['friendlyName']
            ],
            'GroupItem' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/GroupProperties']],
                'required' => []
            ],
            'GroupsCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/GroupItem']
                    ],
                    'nextlink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'ApplicationProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'platform' => [
                        'type' => 'string',
                        'enum' => [
                            'ios',
                            'android',
                            'windows'
                        ]
                    ],
                    'appId' => ['type' => 'string']
                ],
                'required' => [
                    'friendlyName',
                    'platform'
                ]
            ],
            'Application' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/ApplicationProperties']],
                'required' => []
            ],
            'ApplicationCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Application']
                    ],
                    'nextlink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'iOSMAMPolicyProperties' => [
                'properties' => [
                    'fileEncryptionLevel' => [
                        'type' => 'string',
                        'enum' => [
                            'deviceLocked',
                            'deviceLockedExceptFilesOpen',
                            'afterDeviceRestart',
                            'useDeviceSettings'
                        ]
                    ],
                    'touchId' => [
                        'type' => 'string',
                        'enum' => [
                            'enable',
                            'disable'
                        ]
                    ]
                ],
                'required' => []
            ],
            'iOSMAMPolicy' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/iOSMAMPolicyProperties']],
                'required' => []
            ],
            'IOSMAMPolicyCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/iOSMAMPolicy']
                    ],
                    'nextlink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'AndroidMAMPolicyProperties' => [
                'properties' => [
                    'screenCapture' => [
                        'type' => 'string',
                        'enum' => [
                            'allow',
                            'block'
                        ]
                    ],
                    'fileEncryption' => [
                        'type' => 'string',
                        'enum' => [
                            'required',
                            'notRequired'
                        ]
                    ]
                ],
                'required' => []
            ],
            'AndroidMAMPolicy' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/AndroidMAMPolicyProperties']],
                'required' => []
            ],
            'AndroidMAMPolicyCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/AndroidMAMPolicy']
                    ],
                    'nextlink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'MAMPolicyAppOrGroupIdProperties' => [
                'properties' => ['url' => ['type' => 'string']],
                'required' => ['url']
            ],
            'MAMPolicyAppIdOrGroupIdPayload' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/MAMPolicyAppOrGroupIdProperties']],
                'required' => []
            ],
            'MAMPolicyProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'description' => ['type' => 'string'],
                    'appSharingFromLevel' => [
                        'type' => 'string',
                        'enum' => [
                            'none',
                            'policyManagedApps',
                            'allApps'
                        ]
                    ],
                    'appSharingToLevel' => [
                        'type' => 'string',
                        'enum' => [
                            'none',
                            'policyManagedApps',
                            'allApps'
                        ]
                    ],
                    'authentication' => [
                        'type' => 'string',
                        'enum' => [
                            'required',
                            'notRequired'
                        ]
                    ],
                    'clipboardSharingLevel' => [
                        'type' => 'string',
                        'enum' => [
                            'blocked',
                            'policyManagedApps',
                            'policyManagedAppsWithPasteIn',
                            'allApps'
                        ]
                    ],
                    'dataBackup' => [
                        'type' => 'string',
                        'enum' => [
                            'allow',
                            'block'
                        ]
                    ],
                    'fileSharingSaveAs' => [
                        'type' => 'string',
                        'enum' => [
                            'allow',
                            'block'
                        ]
                    ],
                    'pin' => [
                        'type' => 'string',
                        'enum' => [
                            'required',
                            'notRequired'
                        ]
                    ],
                    'pinNumRetry' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'deviceCompliance' => [
                        'type' => 'string',
                        'enum' => [
                            'enable',
                            'disable'
                        ]
                    ],
                    'managedBrowser' => [
                        'type' => 'string',
                        'enum' => [
                            'required',
                            'notRequired'
                        ]
                    ],
                    'accessRecheckOfflineTimeout' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'accessRecheckOnlineTimeout' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'offlineWipeTimeout' => [
                        'type' => 'string',
                        'format' => 'duration'
                    ],
                    'numOfApps' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'groupStatus' => [
                        'type' => 'string',
                        'enum' => [
                            'notTargeted',
                            'targeted'
                        ]
                    ],
                    'lastModifiedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ]
                ],
                'required' => ['friendlyName']
            ],
            'DeviceProperties' => [
                'properties' => [
                    'userId' => ['type' => 'string'],
                    'friendlyName' => ['type' => 'string'],
                    'platform' => ['type' => 'string'],
                    'platformVersion' => ['type' => 'string'],
                    'deviceType' => ['type' => 'string']
                ],
                'required' => [
                    'userId',
                    'friendlyName',
                    'platform',
                    'platformVersion',
                    'deviceType'
                ]
            ],
            'Device' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/DeviceProperties']],
                'required' => []
            ],
            'DeviceCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/Device']
                    ],
                    'nextlink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'WipeDeviceOperationResultProperties' => [
                'properties' => ['value' => ['type' => 'string']],
                'required' => ['value']
            ],
            'WipeDeviceOperationResult' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/WipeDeviceOperationResultProperties']],
                'required' => []
            ],
            'operationMetadataProperties' => [
                'properties' => [
                    'name' => ['type' => 'string'],
                    'value' => ['type' => 'string']
                ],
                'required' => [
                    'name',
                    'value'
                ]
            ],
            'OperationResultProperties' => [
                'properties' => [
                    'friendlyName' => ['type' => 'string'],
                    'category' => ['type' => 'string'],
                    'lastModifiedTime' => ['type' => 'string'],
                    'state' => ['type' => 'string'],
                    'operationMetadata' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/operationMetadataProperties']
                    ]
                ],
                'required' => [
                    'friendlyName',
                    'operationMetadata'
                ]
            ],
            'OperationResult' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/OperationResultProperties']],
                'required' => []
            ],
            'OperationResultCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/OperationResult']
                    ],
                    'nextlink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'StatusesProperties' => [
                'properties' => [
                    'deployedPolicies' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'enrolledUsers' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'flaggedUsers' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'lastModifiedTime' => [
                        'type' => 'string',
                        'format' => 'date-time'
                    ],
                    'policyAppliedUsers' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'status' => ['type' => 'string'],
                    'wipeFailedApps' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'wipePendingApps' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'wipeSucceededApps' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ]
                ],
                'required' => []
            ],
            'StatusesDefault' => [
                'properties' => [
                    'properties' => ['$ref' => '#/definitions/StatusesProperties'],
                    'nextlink' => ['type' => 'string']
                ],
                'required' => []
            ],
            'FlaggedUserProperties' => [
                'properties' => [
                    'errorCount' => [
                        'type' => 'integer',
                        'format' => 'int32'
                    ],
                    'friendlyName' => ['type' => 'string']
                ],
                'required' => []
            ],
            'FlaggedUser' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/FlaggedUserProperties']],
                'required' => []
            ],
            'FlaggedUserCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/FlaggedUser']
                    ],
                    'nextlink' => ['type' => 'string']
                ],
                'required' => ['value']
            ],
            'FlaggedEnrolledAppError' => [
                'properties' => [
                    'errorCode' => ['type' => 'string'],
                    'severity' => ['type' => 'string']
                ],
                'required' => []
            ],
            'FlaggedEnrolledAppProperties' => [
                'properties' => [
                    'deviceType' => ['type' => 'string'],
                    'friendlyName' => ['type' => 'string'],
                    'lastModifiedTime' => ['type' => 'string'],
                    'platform' => ['type' => 'string'],
                    'errors' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/FlaggedEnrolledAppError']
                    ]
                ],
                'required' => []
            ],
            'FlaggedEnrolledApp' => [
                'properties' => ['properties' => ['$ref' => '#/definitions/FlaggedEnrolledAppProperties']],
                'required' => []
            ],
            'FlaggedEnrolledAppCollection' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/FlaggedEnrolledApp']
                    ],
                    'nextlink' => ['type' => 'string']
                ],
                'required' => ['value']
            ]
        ]
    ];
}
