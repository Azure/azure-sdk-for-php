<?php
namespace Microsoft\Azure\Management\ServerManagement;
final class PowerShell
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListSession_operation = $_client->createOperation('PowerShell_ListSession');
        $this->_CreateSession_operation = $_client->createOperation('PowerShell_CreateSession');
        $this->_GetCommandStatus_operation = $_client->createOperation('PowerShell_GetCommandStatus');
        $this->_UpdateCommand_operation = $_client->createOperation('PowerShell_UpdateCommand');
        $this->_InvokeCommand_operation = $_client->createOperation('PowerShell_InvokeCommand');
        $this->_CancelCommand_operation = $_client->createOperation('PowerShell_CancelCommand');
        $this->_TabCompletion_operation = $_client->createOperation('PowerShell_TabCompletion');
    }
    /**
     * Gets a list of the active sessions.
     * @param string $resourceGroupName
     * @param string $nodeName
     * @param string $session
     * @return array
     */
    public function listSession(
        $resourceGroupName,
        $nodeName,
        $session
    )
    {
        return $this->_ListSession_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'nodeName' => $nodeName,
            'session' => $session
        ]);
    }
    /**
     * Creates a PowerShell session.
     * @param string $resourceGroupName
     * @param string $nodeName
     * @param string $session
     * @param string $pssession
     * @return array
     */
    public function createSession(
        $resourceGroupName,
        $nodeName,
        $session,
        $pssession
    )
    {
        return $this->_CreateSession_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'nodeName' => $nodeName,
            'session' => $session,
            'pssession' => $pssession
        ]);
    }
    /**
     * Gets the status of a command.
     * @param string $resourceGroupName
     * @param string $nodeName
     * @param string $session
     * @param string $pssession
     * @param string|null $_expand
     * @return array
     */
    public function getCommandStatus(
        $resourceGroupName,
        $nodeName,
        $session,
        $pssession,
        $_expand = null
    )
    {
        return $this->_GetCommandStatus_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'nodeName' => $nodeName,
            'session' => $session,
            'pssession' => $pssession,
            '$expand' => $_expand
        ]);
    }
    /**
     * Updates a running PowerShell command with more data.
     * @param string $resourceGroupName
     * @param string $nodeName
     * @param string $session
     * @param string $pssession
     * @return array
     */
    public function updateCommand(
        $resourceGroupName,
        $nodeName,
        $session,
        $pssession
    )
    {
        return $this->_UpdateCommand_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'nodeName' => $nodeName,
            'session' => $session,
            'pssession' => $pssession
        ]);
    }
    /**
     * Creates a PowerShell script and invokes it.
     * @param string $resourceGroupName
     * @param string $nodeName
     * @param string $session
     * @param string $pssession
     * @param array $powerShellCommandParameters
     * @return array
     */
    public function invokeCommand(
        $resourceGroupName,
        $nodeName,
        $session,
        $pssession,
        array $powerShellCommandParameters
    )
    {
        return $this->_InvokeCommand_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'nodeName' => $nodeName,
            'session' => $session,
            'pssession' => $pssession,
            'PowerShellCommandParameters' => $powerShellCommandParameters
        ]);
    }
    /**
     * Cancels a PowerShell command.
     * @param string $resourceGroupName
     * @param string $nodeName
     * @param string $session
     * @param string $pssession
     * @return array
     */
    public function cancelCommand(
        $resourceGroupName,
        $nodeName,
        $session,
        $pssession
    )
    {
        return $this->_CancelCommand_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'nodeName' => $nodeName,
            'session' => $session,
            'pssession' => $pssession
        ]);
    }
    /**
     * Gets tab completion values for a command.
     * @param string $resourceGroupName
     * @param string $nodeName
     * @param string $session
     * @param string $pssession
     * @param array $powerShellTabCompletionParamters
     * @return array
     */
    public function tabCompletion(
        $resourceGroupName,
        $nodeName,
        $session,
        $pssession,
        array $powerShellTabCompletionParamters
    )
    {
        return $this->_TabCompletion_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'nodeName' => $nodeName,
            'session' => $session,
            'pssession' => $pssession,
            'PowerShellTabCompletionParamters' => $powerShellTabCompletionParamters
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListSession_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CreateSession_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_GetCommandStatus_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_UpdateCommand_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_InvokeCommand_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_CancelCommand_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_TabCompletion_operation;
}
