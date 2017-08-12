<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\Data\DataAbstract;

/**
 * Class ResponseObject
 * @package Microsoft\Rest\Internal\Swagger2
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#responseObject
 */
final class ResponseObject extends DataAbstract
{
    /**
     * @return SchemaObject|null
     */
    function schema()
    {
        return $this->getChildOrNull('schema', SchemaObject::class);
    }
}