<?php
namespace Microsoft\Rest\Internal\Swagger;

use Microsoft\Rest\Internal\Types\TypeAbstract;

final class SchemaObject
{
    function removeRefs(DefinitionsObject $definitionsObject)
    {
        $this->type = $this->type->removeRefTypes($definitionsObject);
    }

    /**
     * @return TypeAbstract
     */
    function getType()
    {
        return $this->type;
    }

    /**
     * @param TypeAbstract $type
     */
    function __construct(TypeAbstract $type)
    {
        $this->type = $type;
    }

    /**
     * @var TypeAbstract
     */
    private $type;
}