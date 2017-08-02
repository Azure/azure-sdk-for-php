<?php
namespace Microsoft\Rest;

interface CredentialsInterface
{
    /**
     * @return string[]
     */
    function getHeaders();
}