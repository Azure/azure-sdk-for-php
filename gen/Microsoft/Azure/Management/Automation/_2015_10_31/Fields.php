<?php
namespace Microsoft\Azure\Management\Automation\_2015_10_31;
final class Fields
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_ListByType_operation = $_client->createOperation('Fields_ListByType');
    }
    /**
     * Retrieve a list of fields of a given type identified by module name.
     * @param string $resourceGroupName
     * @param string $automationAccountName
     * @param string $moduleName
     * @param string $typeName
     * @return array
     */
    public function listByType(
        $resourceGroupName,
        $automationAccountName,
        $moduleName,
        $typeName
    )
    {
        return $this->_ListByType_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'automationAccountName' => $automationAccountName,
            'moduleName' => $moduleName,
            'typeName' => $typeName
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListByType_operation;
}
