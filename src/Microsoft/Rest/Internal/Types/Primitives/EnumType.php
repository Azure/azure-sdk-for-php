<?php
namespace Microsoft\Rest\Internal\Types\Primitives;

final class EnumType extends PrimitiveTypeAbstract
{
    /**
     * @return bool
     */
    function isConst()
    {
        return count($this->values) === 1;
    }

    /**
     * @return string
     */
    function getConstValue()
    {
        return $this->values[0];
    }

    /**.
     * @param string[] $values
     */
    function __construct(array $values)
    {
        $this->values = $values;
    }

    /**
     * @var string[]
     */
    private $values;
}