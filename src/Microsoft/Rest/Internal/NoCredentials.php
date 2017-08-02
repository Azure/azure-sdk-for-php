<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\CredentialsInterface;

final class NoCredentials implements CredentialsInterface
{
    /**
     * @return string[]
     */
    function getHeaders()
    {
        return [];
    }
}