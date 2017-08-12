<?php
namespace Microsoft\Rest\Internal\Types\Primitives;

use Microsoft\Rest\Internal\InvalidSchemaObjectException;
use Microsoft\Rest\Internal\Swagger\Definitions;
use Microsoft\Rest\Internal\Swagger2\DataTypeObject;
use Microsoft\Rest\Internal\Types\TypeAbstract;

abstract class PrimitiveTypeAbstract extends TypeAbstract
{
    /**
     * @param mixed $value
     * @return string
     */
    function toJson($value)
    {
        return json_encode(strval($value));
    }

    /**
     * @param Definitions $definitionsObject
     * @return TypeAbstract
     */
    function removeRefTypes(Definitions $definitionsObject)
    {
        return $this;
    }

    /**
     * @param DataTypeObject $dataTypeObject
     * @return TypeAbstract
     * @throws InvalidSchemaObjectException
     */
    static function createPrimitiveFromDataWithRefs(DataTypeObject $dataTypeObject)
    {
        $type = $dataTypeObject->type();
        $format = $dataTypeObject->format();
        $enum = $dataTypeObject->enum();
        if ($enum) {
            if ($type === 'string' && $format === null) {
                return new EnumType($enum);
            }
        } else {
            switch ($type) {
                case 'boolean':
                    switch ($format) {
                        case null:
                            return new BooleanType();
                    }
                    break;
                case 'string':
                    switch ($format) {
                        case null:
                            return new StringType();
                        case 'byte':
                            return new Base64Type();
                        case 'binary':
                            return new BinaryType();
                        case 'date':
                            return new DateType();
                        case 'date-time':
                            return new DateTimeType();
                        case 'password':
                            return new PasswordType();
                        case 'duration':
                            return new DurationType();
                        case 'uuid':
                            return new UuidType();
                        case 'date-time-rfc1123':
                            return new DateTimeRfc1123Type();
                    }
                    break;
                case 'integer':
                    switch ($format) {
                        case 'int32':
                            return new Int32Type();
                        case 'int64':
                            return new Int64Type();
                    }
                    break;
                case 'number':
                    switch ($format) {
                        case 'float':
                            return new FloatType();
                        case 'double':
                            return new DoubleType();
                        case 'decimal':
                            return new DecimalType();
                    }
                    break;
                case 'file':
                    return new FileType();
            }
        }
        throw new InvalidSchemaObjectException($dataTypeObject);
    }
}