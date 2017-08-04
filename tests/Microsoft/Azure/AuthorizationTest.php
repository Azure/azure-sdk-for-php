<?php
namespace Microsoft\Azure;

use Microsoft\Azure\Management\Authorization\_2015_07_01\AuthorizationManagementClient;

class AuthorizationTest extends TestInfo
{
    /**
     * @var AuthorizationManagementClient
     */
    private $client;

    /**
     * AdvisorTest constructor.
     */
    function __construct()
    {
        parent::__construct();
        $this->client = new AuthorizationManagementClient($this->runTime, $this->subscriptionId);
    }

    function testClassicAdministrators() {
        $admin = $this->client->getClassicAdministrators();
        try {
            $result = $admin->list_();
            print_r($result);
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }

    function testPermissions() {
        $permissions = $this->client->getPermissions();
        try {
            $permissions->listForResource(
                'res',
                'ns',
                'path',
                'type',
                'name');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        $result = $permissions->listForResourceGroup('name');
        print_r($result);
    }

    function testProviderOperationsMetadata()
    {
        $x = $this->client->getProviderOperationsMetadata();
        try {
            $x->list_('something');
        } catch(\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $x->get('a', 'a');
        } catch(\Exception $e) {
            print_r($e->getMessage());
        }
    }

    function testRoleAssignments()
    {
        $roleAssignments = $this->client->getRoleAssignments();
        try {
            $result = $roleAssignments->get('', '');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $result = $roleAssignments->list_('');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $result = $roleAssignments->listForResourceGroup('', '');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $roleAssignments->listForResource(
                '',
                '',
                '',
                '',
                '',
                '');
        } catch(\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $roleAssignments->delete('', '');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $result = $roleAssignments->create('', '', []);
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $result = $roleAssignments->createById('', []);
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $roleAssignments->deleteById('');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $roleAssignments->getById('role');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
        try {
            $roleAssignments->listForScope('', '');
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }
}