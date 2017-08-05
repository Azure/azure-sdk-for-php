<?php
namespace Microsoft\Rest\Internal\Https;

final class AzureHttps implements HttpsInterface
{
    /**
     * @param string $method
     * @param string $url
     * @param string[] $headers
     * @param string $body
     * @param array $options
     * @return mixed
     */
    function send($method, $url, array $headers, $body, array $options)
    {
        if ($this->token === null) {
            $response = $this->http->send(
                'POST',
                'https://login.microsoftonline.com/' . $this->tenantId . '/oauth2/token',
                [],
                null,
                [
                    'form_params' => [
                        'grant_type' => 'client_credentials',
                        'client_id' => $this->clientId,
                        'client_secret' => $this->clientSecret,
                        'resource' => 'https://management.core.windows.net/'
                    ]
                ]);
            $this->token = $response['access_token'];
        }
        $headers['Authorization'] = 'Bearer ' . $this->token;
        return $this->http->send($method, $url, $headers, $body, $options);
    }

    /**
     * @param HttpsInterface $http
     * @param string $clientId
     * @param string $tenantId
     * @param string $clientSecret
     */
    function __construct(
        HttpsInterface $http,
        $clientId,
        $tenantId,
        $clientSecret)
    {
        $this->http = $http;
        $this->clientId = $clientId;
        $this->tenantId = $tenantId;
        $this->clientSecret = $clientSecret;
    }

    /**
     * @var string|null
     */
    private $token = null;

    /**
     * @var HttpsInterface
     */
    private $http;

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