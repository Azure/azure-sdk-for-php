<?php
namespace Microsoft\Azure\Management\Resource;
final class ManagementLinkClient
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
        $this->_ResourceLinks_group = new \Microsoft\Azure\Management\Resource\ResourceLinks($_client);
    }
    /**
     * @return \Microsoft\Azure\Management\Resource\ResourceLinks
     */
    public function getResourceLinks()
    {
        return $this->_ResourceLinks_group;
    }
    /**
     * @var \Microsoft\Azure\Management\Resource\ResourceLinks
     */
    private $_ResourceLinks_group;
    const _SWAGGER_OBJECT_DATA = [
        'host' => 'management.azure.com',
        'paths' => [
            '/{linkId}' => [
                'delete' => [
                    'operationId' => 'ResourceLinks_Delete',
                    'parameters' => [
                        [
                            'name' => 'linkId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
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
                    'responses' => [
                        '200' => [],
                        '204' => []
                    ]
                ],
                'put' => [
                    'operationId' => 'ResourceLinks_CreateOrUpdate',
                    'parameters' => [
                        [
                            'name' => 'linkId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
                            'type' => 'string'
                        ],
                        [
                            'name' => 'parameters',
                            'in' => 'body',
                            'required' => TRUE,
                            'schema' => ['$ref' => '#/definitions/ResourceLink']
                        ],
                        [
                            'name' => 'api-version',
                            'in' => 'query',
                            'required' => TRUE,
                            'type' => 'string',
                            'enum' => ['2016-09-01']
                        ]
                    ],
                    'responses' => [
                        '201' => ['schema' => ['$ref' => '#/definitions/ResourceLink']],
                        '200' => ['schema' => ['$ref' => '#/definitions/ResourceLink']]
                    ]
                ],
                'get' => [
                    'operationId' => 'ResourceLinks_Get',
                    'parameters' => [
                        [
                            'name' => 'linkId',
                            'in' => 'path',
                            'required' => TRUE,
                            'x-ms-skip-url-encoding' => TRUE,
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
                    'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceLink']]]
                ]
            ],
            '/subscriptions/{subscriptionId}/providers/Microsoft.Resources/links' => ['get' => [
                'operationId' => 'ResourceLinks_ListAtSubscription',
                'parameters' => [
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
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
                        'name' => 'subscriptionId',
                        'in' => 'path',
                        'required' => TRUE,
                        'type' => 'string'
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceLinkResult']]]
            ]],
            '/{scope}/providers/Microsoft.Resources/links' => ['get' => [
                'operationId' => 'ResourceLinks_ListAtSourceScope',
                'parameters' => [
                    [
                        'name' => 'scope',
                        'in' => 'path',
                        'required' => TRUE,
                        'x-ms-skip-url-encoding' => TRUE,
                        'type' => 'string'
                    ],
                    [
                        'name' => '$filter',
                        'in' => 'query',
                        'required' => FALSE,
                        'type' => 'string',
                        'enum' => ['atScope()']
                    ],
                    [
                        'name' => 'api-version',
                        'in' => 'query',
                        'required' => TRUE,
                        'type' => 'string',
                        'enum' => ['2016-09-01']
                    ]
                ],
                'responses' => ['200' => ['schema' => ['$ref' => '#/definitions/ResourceLinkResult']]]
            ]]
        ],
        'definitions' => [
            'ResourceLinkFilter' => [
                'properties' => ['targetId' => ['type' => 'string']],
                'required' => ['targetId']
            ],
            'ResourceLinkProperties' => [
                'properties' => [
                    'sourceId' => ['type' => 'string'],
                    'targetId' => ['type' => 'string'],
                    'notes' => ['type' => 'string']
                ],
                'required' => ['targetId']
            ],
            'ResourceLink' => [
                'properties' => [
                    'id' => ['type' => 'string'],
                    'name' => ['type' => 'string'],
                    'properties' => ['$ref' => '#/definitions/ResourceLinkProperties']
                ],
                'required' => []
            ],
            'ResourceLinkResult' => [
                'properties' => [
                    'value' => [
                        'type' => 'array',
                        'items' => ['$ref' => '#/definitions/ResourceLink']
                    ],
                    'nextLink' => ['type' => 'string']
                ],
                'required' => ['value']
            ]
        ]
    ];
}
