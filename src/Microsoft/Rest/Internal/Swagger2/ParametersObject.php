<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\Data\DataAbstract;

/**
 * Class ParametersObject
 * @package Microsoft\Rest\Internal\Swagger2
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#parametersDefinitionsObject
 */
class ParametersObject extends DataAbstract
{
    /**
     * @return ParameterObject[]
     */
    function children()
    {
        return $this->getChildren(ParameterObject::class);
    }
}