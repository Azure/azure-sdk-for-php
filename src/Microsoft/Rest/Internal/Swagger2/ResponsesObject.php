<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\Data\DataAbstract;

/**
 * Class ResponsesObject
 * @package Microsoft\Rest\Internal\Swagger2
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#responsesObject
 */
class ResponsesObject extends DataAbstract
{
    /**
     * @return ResponseObject[]
     */
    function children()
    {
        return $this->getChildren(ResponseObject::class);
    }
}