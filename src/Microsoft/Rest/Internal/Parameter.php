<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Types\TypeAbstract;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#parameterObject
 */
final class Parameter
{
    /**
     * @return bool
     */
    function isConst()
    {
        return $this->type->isConst() && $this->required;
    }

    function getConstValue()
    {
        return $this->type->getConstValue();
    }

    /**
     * @param TypeAbstract[] $typeMap
     * @param DataAbstract $parameterData
     * @return Parameter
     */
    static function createFromData(array $typeMap, DataAbstract $parameterData)
    {
        $schemaData = $parameterData->getChildOrNull('schema');
        $type = TypeAbstract::createFromData(
            $typeMap,
            $schemaData !== null ? $schemaData : $parameterData);
        $in = $parameterData->getChildValue('in');
        $required = $parameterData->getChildValueOrNull('required');
        if ($required === null) {
            $required = $in === 'path';
        }
        return new self(
            $parameterData->getChildValue('name'),
            $in,
            $required,
            $type);
    }

    function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    function getIn() {
        return $this->in;
    }

    /**
     * @param string $name
     * @param string $in
     * @param bool $required
     * @param TypeAbstract $type
     */
    function __construct($name, $in, $required, TypeAbstract $type)
    {
        $this->name = $name;
        $this->in = $in;
        $this->required = $required;
        $this->type = $type;
    }

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $in;

    /**
     * @var bool
     */
    private $required;

    /**
     * @var TypeAbstract
     */
    private $type;
}