<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Swagger\Definitions;
use Microsoft\Rest\Internal\UnknownTypeException;

final class RefType extends TypeAbstract
{
    /**
     * @param mixed $value
     * @return string
     * @throws \Exception
     */
    function toJson($value)
    {
        throw new \Exception('RefType::toJson()');
    }

    function isConst()
    {
        throw new \Exception('RefType::isConst()');
    }

    /**
     * @return string
     * @throws \Exception
     */
    function getConstValue()
    {
        throw new \Exception('RefType::isConst()');
    }

    /**
     * @param string $ref
     * @param DataAbstract $data
     */
    function __construct($ref, DataAbstract $data)
    {
        $this->ref = $ref;
        $this->data = $data;
    }

    /**
     * @param Definitions $definitionsObject
     * @return TypeAbstract
     * @throws UnknownTypeException
     */
    function removeRefTypes(Definitions $definitionsObject)
    {
        return $definitionsObject->getSchemaObject($this->data, $this->ref)->getDataType();
    }

    /**
     * @var string
     */
    private $ref;

    /**
     * @var DataAbstract
     */
    private $data;
}