<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\CredentialsInterface;

final class OperationShared
{
    /**
     * @return string
     */
    function getHost()
    {
        return $this->host;
    }

    /**
     * @return CredentialsInterface
     */
    function getCredentials()
    {
        return $this->credentials;
    }

    /**
     * @param CredentialsInterface $credentials
     * @param string $host
     */
    function __construct(CredentialsInterface $credentials, $host)
    {
        $this->credentials = $credentials;
        $this->host = $host;
    }

    /**
     * @var CredentialsInterface
     */
    private $credentials;

    /**
     * @var string
     */
    private $host;
}