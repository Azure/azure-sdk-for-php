<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\UnknownTypeException;

final class RefType extends TypeAbstract
{
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
     * @param TypeAbstract[] $typeMap
     * @return TypeAbstract
     * @throws UnknownTypeException
     */
    function removeRefTypes(array $typeMap)
    {
        $ref = $this->ref;
        if (!isset($typeMap[$ref])) {
            throw new UnknownTypeException($this->data);
        }
        return $typeMap[$ref];
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