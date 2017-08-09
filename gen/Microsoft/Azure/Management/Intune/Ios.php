<?php
namespace Microsoft\Azure\Management\Intune;
final class Ios
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_GetMAMPolicies_operation = $_client->createOperation('Ios_GetMAMPolicies');
        $this->_GetMAMPolicyByName_operation = $_client->createOperation('Ios_GetMAMPolicyByName');
        $this->_CreateOrUpdateMAMPolicy_operation = $_client->createOperation('Ios_CreateOrUpdateMAMPolicy');
        $this->_PatchMAMPolicy_operation = $_client->createOperation('Ios_PatchMAMPolicy');
        $this->_DeleteMAMPolicy_operation = $_client->createOperation('Ios_DeleteMAMPolicy');
        $this->_GetAppForMAMPolicy_operation = $_client->createOperation('Ios_GetAppForMAMPolicy');
        $this->_AddAppForMAMPolicy_operation = $_client->createOperation('Ios_AddAppForMAMPolicy');
        $this->_DeleteAppForMAMPolicy_operation = $_client->createOperation('Ios_DeleteAppForMAMPolicy');
        $this->_GetGroupsForMAMPolicy_operation = $_client->createOperation('Ios_GetGroupsForMAMPolicy');
        $this->_AddGroupForMAMPolicy_operation = $_client->createOperation('Ios_AddGroupForMAMPolicy');
        $this->_DeleteGroupForMAMPolicy_operation = $_client->createOperation('Ios_DeleteGroupForMAMPolicy');
    }
    /**
     * Returns Intune iOSPolicies.
     * @param string $hostName
     * @param string $_filter
     * @param integer $_top
     * @param string $_select
     * @return array
     */
    public function getMAMPolicies(
        $hostName,
        $_filter,
        $_top,
        $_select
    )
    {
        return $this->_GetMAMPolicies_operation->call([
            'hostName' => $hostName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$select' => $_select
        ]);
    }
    /**
     * Returns Intune iOS policies.
     * @param string $hostName
     * @param string $policyName
     * @param string $_select
     * @return array
     */
    public function getMAMPolicyByName(
        $hostName,
        $policyName,
        $_select
    )
    {
        return $this->_GetMAMPolicyByName_operation->call([
            'hostName' => $hostName,
            'policyName' => $policyName,
            '$select' => $_select
        ]);
    }
    /**
     * Creates or updates iOSMAMPolicy.
     * @param string $hostName
     * @param string $policyName
     * @param array $parameters
     * @return array
     */
    public function createOrUpdateMAMPolicy(
        $hostName,
        $policyName,
        array $parameters
    )
    {
        return $this->_CreateOrUpdateMAMPolicy_operation->call([
            'hostName' => $hostName,
            'policyName' => $policyName,
            'parameters' => $parameters
        ]);
    }
    /**
     *  patch an iOSMAMPolicy.
     * @param string $hostName
     * @param string $policyName
     * @param array $parameters
     * @return array
     */
    public function patchMAMPolicy(
        $hostName,
        $policyName,
        array $parameters
    )
    {
        return $this->_PatchMAMPolicy_operation->call([
            'hostName' => $hostName,
            'policyName' => $policyName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Delete Ios Policy
     * @param string $hostName
     * @param string $policyName
     */
    public function deleteMAMPolicy(
        $hostName,
        $policyName
    )
    {
        return $this->_DeleteMAMPolicy_operation->call([
            'hostName' => $hostName,
            'policyName' => $policyName
        ]);
    }
    /**
     * Get apps for an iOSMAMPolicy.
     * @param string $hostName
     * @param string $policyName
     * @param string $_filter
     * @param integer $_top
     * @param string $_select
     * @return array
     */
    public function getAppForMAMPolicy(
        $hostName,
        $policyName,
        $_filter,
        $_top,
        $_select
    )
    {
        return $this->_GetAppForMAMPolicy_operation->call([
            'hostName' => $hostName,
            'policyName' => $policyName,
            '$filter' => $_filter,
            '$top' => $_top,
            '$select' => $_select
        ]);
    }
    /**
     * Add app to an iOSMAMPolicy.
     * @param string $hostName
     * @param string $policyName
     * @param string $appName
     * @param array $parameters
     */
    public function addAppForMAMPolicy(
        $hostName,
        $policyName,
        $appName,
        array $parameters
    )
    {
        return $this->_AddAppForMAMPolicy_operation->call([
            'hostName' => $hostName,
            'policyName' => $policyName,
            'appName' => $appName,
            'parameters' => $parameters
        ]);
    }
    /**
     * Delete App for Ios Policy
     * @param string $hostName
     * @param string $policyName
     * @param string $appName
     */
    public function deleteAppForMAMPolicy(
        $hostName,
        $policyName,
        $appName
    )
    {
        return $this->_DeleteAppForMAMPolicy_operation->call([
            'hostName' => $hostName,
            'policyName' => $policyName,
            'appName' => $appName
        ]);
    }
    /**
     * Returns groups for a given iOSMAMPolicy.
     * @param string $hostName
     * @param string $policyName
     * @return array
     */
    public function getGroupsForMAMPolicy(
        $hostName,
        $policyName
    )
    {
        return $this->_GetGroupsForMAMPolicy_operation->call([
            'hostName' => $hostName,
            'policyName' => $policyName
        ]);
    }
    /**
     * Add group to an iOSMAMPolicy.
     * @param string $hostName
     * @param string $policyName
     * @param string $groupId
     * @param array $parameters
     */
    public function addGroupForMAMPolicy(
        $hostName,
        $policyName,
        $groupId,
        array $parameters
    )
    {
        return $this->_AddGroupForMAMPolicy_operation->call([
            'hostName' => $hostName,
            'policyName' => $policyName,
            'groupId' => $groupId,
            'parameters' => $parameters
        ]);
    }
    /**
     * Delete Group for iOS Policy
     * @param string $hostName
     * @param string $policyName
     * @param string $groupId
     */
    public function deleteGroupForMAMPolicy(
        $hostName,
        $policyName,
        $groupId
    )
    {
        return $this->_DeleteGroupForMAMPolicy_operation->call([
            'hostName' => $hostName,
            'policyName' => $policyName,
            'groupId' => $groupId
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMAMPolicies_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetMAMPolicyByName_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateOrUpdateMAMPolicy_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_PatchMAMPolicy_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteMAMPolicy_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetAppForMAMPolicy_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_AddAppForMAMPolicy_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteAppForMAMPolicy_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetGroupsForMAMPolicy_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_AddGroupForMAMPolicy_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_DeleteGroupForMAMPolicy_operation;
}
