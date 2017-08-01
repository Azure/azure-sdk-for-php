<?php
namespace Microsoft\Rest\Internal\Types\Primitives;

use Microsoft\Rest\Internal\Data\DataAbstract;
use Microsoft\Rest\Internal\Types\TypeAbstract;
use Microsoft\Rest\Internal\UnknownTypeException;

abstract class PrimitiveTypeAbstract extends TypeAbstract
{
    /**
     * @param TypeAbstract[] $typeMap
     * @return TypeAbstract
     */
    function removeRefTypes(array $typeMap)
    {
        return $this;
    }

    /**
     * @param DataAbstract $schemaObjectData
     * @return TypeAbstract
     * @throws UnknownTypeException
     */
    static function createFromDataWithRefs(DataAbstract $schemaObjectData)
    {
        $type = $schemaObjectData->getChildValueOrNull('type');
        $format = $schemaObjectData->getChildValueOrNull('format');
        switch ($type) {
            case 'boolean':
                switch ($format) {
                    case null: return new BooleanType();
                }
                break;
            case 'string':
                switch ($format) {
                    case null: return new StringType();
                    case 'byte': return new Base64Type();
                    case 'binary': return new BinaryType();
                    case 'date': return new DateType();
                    case 'date-time': return new DateTimeType();
                    case 'password': return new PasswordType();
                    case 'duration': return new DurationType();
                    case 'uuid': return new UuidType();
                    case 'date-time-rfc1123': return new DateTimeRfc1123Type();
                }
                break;
            case 'integer':
                switch ($format) {
                    case 'int32': return new Int32Type();
                    case 'int64': return new Int64Type();
                }
                break;
            case 'number':
                switch ($format) {
                    case 'float': return new FloatType();
                    case 'double': return new DoubleType();
                    case 'decimal': return new DecimalType();
                }
                break;
        }
        throw new UnknownTypeException($schemaObjectData);
    }
}