<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Types\TypeAbstract;

final class Parameter
{
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
        return new self(
            $parameterData->getChildValue('name'),
            $parameterData->getChildValue('in'),
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
     * @param TypeAbstract $type
     */
    function __construct($name, $in, TypeAbstract $type)
    {
        $this->name = $name;
        $this->in = $in;
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
     * @var TypeAbstract
     */
    private $type;
}