<?php
namespace Microsoft\Azure\Management\Compute\_2017_03_30;
final class VirtualMachineExtensionImages
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_Get_operation = $_client->createOperation('VirtualMachineExtensionImages_Get');
        $this->_ListTypes_operation = $_client->createOperation('VirtualMachineExtensionImages_ListTypes');
        $this->_ListVersions_operation = $_client->createOperation('VirtualMachineExtensionImages_ListVersions');
    }
    /**
     * Gets a virtual machine extension image.
     * @param string $location
     * @param string $publisherName
     * @param string $type
     * @param string $version
     * @return array
     */
    public function get(
        $location,
        $publisherName,
        $type,
        $version
    )
    {
        return $this->_Get_operation->call([
            'location' => $location,
            'publisherName' => $publisherName,
            'type' => $type,
            'version' => $version
        ]);
    }
    /**
     * Gets a list of virtual machine extension image types.
     * @param string $location
     * @param string $publisherName
     * @return array[]
     */
    public function listTypes(
        $location,
        $publisherName
    )
    {
        return $this->_ListTypes_operation->call([
            'location' => $location,
            'publisherName' => $publisherName
        ]);
    }
    /**
     * Gets a list of virtual machine extension image versions.
     * @param string $location
     * @param string $publisherName
     * @param string $type
     * @param string $_filter
     * @param integer $_top
     * @param string $_orderby
     * @return array[]
     */
    public function listVersions(
        $location,
        $publisherName,
        $type,
        $_filter,
        $_top,
        $_orderby
    )
    {
        return $this->_ListVersions_operation->call([
            'location' => $location,
            'publisherName' => $publisherName,
            'type' => $type,
            '$filter' => $_filter,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_Get_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListTypes_operation;
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_ListVersions_operation;
}
