<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\CredentialsInterface;

final class AzureCredentials implements CredentialsInterface
{
    /**
     * @return string[]
     */
    function getHeaders()
    {
        if ($this->token === null) {
            $client = new \GuzzleHttp\Client();
            $url = 'https://login.microsoftonline.com/' . $this->tenantId . '/oauth2/token';
            // $url = 'https://login.windows.net/72f988bf-86f1-41af-91ab-2d7cd011db47/';
            $response = $client->post(
                $url,
                [
                    'form_params' => [
                        'grant_type' => 'client_credentials',
                        'client_id' => $this->clientId,
                        'client_secret' => $this->clientSecret,
                        'resource' => 'https://management.core.windows.net/'
                    ]
                ]);
            $body = json_decode($response->getBody()->getContents());
            $this->token = $body->access_token;
        }
        return ['Authorization' => 'Bearer ' . $this->token];
    }

    /**
     * @param string $clientId
     * @param string $tenantId
     * @param string $clientSecret
     */
    function __construct($clientId, $tenantId, $clientSecret)
    {
        $this->clientId = $clientId;
        $this->tenantId = $tenantId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * @var string|null
     */
    private $token = null;

    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $tenantId;

    /**
     * @var string
     */
    private $clientSecret;
}