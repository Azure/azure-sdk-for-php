<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\CredentialsInterface;
use Microsoft\Rest\RunTimeInterface;
use Microsoft\Rest\ClientInterface;
use Microsoft\Rest\Internal\Data\RootData;

final class RunTime implements RunTimeInterface
{
    /**
     * @param CredentialsInterface|null $credentials
     */
    function __construct(CredentialsInterface $credentials = null)
    {
        $this->credentials = $credentials;
    }

    /**
     * @param array $schemaObjectData see https://swagger.io/specification/#definitionsObject for more information.
     * @return ClientInterface
     */
    function createClientFromData(array $schemaObjectData)
    {
        return Client::createFromData($this->credentials, RootData::create($schemaObjectData, ''));
    }

    /**
     * @var CredentialsInterface|null
     */
    private $credentials;
}