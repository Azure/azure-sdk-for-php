<?php
namespace Microsoft\Azure;

use GuzzleHttp\Exception\ClientException;
use Microsoft\Azure\Management\Advisor\AdvisorManagementClient;

class AdvisorTest extends TestInfo
{
    /**
     * @var AdvisorManagementClient
     */
    private $client;

    /**
     * AdvisorTest constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->client = new AdvisorManagementClient($this->runTime, $this->subscriptionId);
    }

    function testRecommendations()
    {
        $recommendations = $this->client->getRecommendations();
        try {
            $recommendations->getGenerateStatus('someoperation');
        } catch (ClientException $e) {
            print_r($e->getMessage());
        }
        try {
            $recommendations->get(
                '/subscriptions/a00aa0aa-a0a0-0a0a-aaa0-aa0000000000',
                'rec');
        } catch (ClientException $e) {
            print_r($e->getMessage());
        }
        try {
            $recommendations->list_(
                '',
                '',
                '');
        } catch (ClientException $e) {
            print_r($e->getMessage());
        }
        try {
            $recommendations->generate();
        } catch (ClientException $e) {
            print_r($e->getMessage());
        }
    }

    function testOperations()
    {
        $operations = $this->client->getOperations();
        try {
            $operations->list_();
        } catch (ClientException $e) {
            print_r($e->getMessage());
        }
    }
}