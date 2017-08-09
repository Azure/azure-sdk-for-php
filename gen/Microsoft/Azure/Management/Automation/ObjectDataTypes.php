<?php
namespace Microsoft\Azure\Management\Automation;
final class ObjectDataTypes
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListFieldsByModuleAndType_operation = $_client->createOperation('ObjectDataTypes_ListFieldsByModuleAndType');
        $this->_ListFieldsByType_operation = $_client->createOperation('ObjectDataTypes_ListFieldsByType');
    }
    /**
     * Retrieve a list of fields of a given type identified by module name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $moduleName
     * @param string $typeName
     * @return array
     */
    public function listFieldsByModuleAndType(
        $resourceGroupName,
        $automationAccountName,
        $moduleName,
        $typeName
    )
    {
        return $this->_ListFieldsByModuleAndType_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'moduleName' => $moduleName,
            'typeName' => $typeName
        ]);
    }
    /**
     * Retrieve a list of fields of a given type across all accessible modules.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $typeName
     * @return array
     */
    public function listFieldsByType(
        $resourceGroupName,
        $automationAccountName,
        $typeName
    )
    {
        return $this->_ListFieldsByType_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'typeName' => $typeName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListFieldsByModuleAndType_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListFieldsByType_operation;
}
