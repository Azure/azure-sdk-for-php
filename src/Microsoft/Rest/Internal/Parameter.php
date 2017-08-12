<?php
namespace Microsoft\Rest\Internal;

use Microsoft\Rest\Internal\Swagger\Definitions;
use Microsoft\Rest\Internal\Swagger2\ParameterObject;
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
        return $this->isConst;
    }

    /**
     * @return mixed|null
     */
    function getConstValue()
    {
        return $this->constValue;
    }

    /**
     * @param string $value
     * @return string
     */
    function urlEncode($value) {
        return $this->xMsSkipUrlEncoding ? $value : urlencode($value);
    }

    /**
     * @param mixed $value
     * @return string
     */
    function toJson($value) {
        return $this->type->toJson($value);
    }

    /**
     * @param Definitions $typeMap
     * @param array $sharedParameterMap
     * @param ParameterObject $parameterData
     * @return Parameter
     */
    static function createFromData(Definitions $typeMap, array $sharedParameterMap, ParameterObject $parameterData)
    {
        $name = $parameterData->name();

        $schemaData = $parameterData->schema();

        $type = $schemaData !== null
            ? $typeMap->createSchemaObjectFromData($schemaData)
            : $typeMap->createSchemaObjectFromDataType($parameterData);

        $in = $parameterData->in();

        $required = $parameterData->required();
        if ($required === null) {
            $required = $in === 'path';
        }

        $xMsSkipUrlEncoding = $parameterData->x_ms_skip_url_encoding();
        if ($xMsSkipUrlEncoding === null) {
            $xMsSkipUrlEncoding = FALSE;
        }

        if (isset($sharedParameterMap[$name])) {
            $isConst = TRUE;
            $constValue = $sharedParameterMap[$name];
        } else {
            $isConst = $type->isConst() && $required;
            $constValue = $isConst ? $type->getConstValue() : null;
        }

        return new self(
            $name,
            $in,
            $required,
            $xMsSkipUrlEncoding,
            $type,
            $isConst,
            $constValue);
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
     * @param bool $xMsSkipUrlEncoding
     * @param TypeAbstract $type
     * @param bool $isConst
     * @param mixed|null $constValue
     */
    function __construct(
        $name,
        $in,
        $required,
        $xMsSkipUrlEncoding,
        TypeAbstract $type,
        $isConst,
        $constValue)
    {
        $this->name = $name;
        $this->in = $in;
        $this->required = $required;
        $this->xMsSkipUrlEncoding = $xMsSkipUrlEncoding;
        $this->type = $type;
        $this->isConst = $isConst;
        $this->constValue = $constValue;
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
     * @var bool
     */
    private $xMsSkipUrlEncoding;

    /**
     * @var TypeAbstract
     */
    private $type;

    /**
     * @var bool
     */
    private $isConst;

    /**
     * @var mixed|null
     */
    private $constValue;
}