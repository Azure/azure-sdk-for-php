<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\Data\DataAbstract;

/**
 * Class SchemaObjectMap
 * @package Microsoft\Rest\Internal\Swagger2
 */
final class SchemaObjectMap extends DataAbstract
{
    /**
     * @return SchemaObject[]
     */
    function children()
    {
        return $this->getChildren(SchemaObject::class);
    }
}