<?php
namespace Microsoft\Azure\Management\DevTestLabs;
final class GalleryImages
{
    /**
     * @param \Microsoft\Rest\ClientInterface $_client
     */
    public function __construct(\Microsoft\Rest\ClientInterface $_client)
    {
        $this->_List_operation = $_client->createOperation('GalleryImages_List');
    }
    /**
     * List gallery images in a given lab.
     * @param string $resourceGroupName
     * @param string $labName
     * @param string|null $_expand
     * @param string|null $_filter
     * @param integer|null $_top
     * @param string|null $_orderby
     * @return array
     */
    public function list_(
        $resourceGroupName,
        $labName,
        $_expand = null,
        $_filter = null,
        $_top = null,
        $_orderby = null
    )
    {
        return $this->_List_operation->call([
            'resourceGroupName' => $resourceGroupName,
            'labName' => $labName,
            '$expand' => $_expand,
            '$filter' => $_filter,
            '$top' => $_top,
            '$orderby' => $_orderby
        ]);
    }
    /**
     * @var \Microsoft\Rest\OperationInterface
     */
    private $_List_operation;
}
