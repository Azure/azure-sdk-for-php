<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\DataRef;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#responsesObject
 */
final class ResponsesObject extends DataRef
{
    /**
     * @return ResponseObject[]
     */
    function children()
    {
        return $this->getChildren(ResponseObject::class);
    }
}