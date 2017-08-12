<?php
namespace Microsoft\Rest\Internal\Types;

use Microsoft\Rest\Internal\Swagger2\DataTypeObject;
use Microsoft\Rest\Internal\Types\Primitives\PrimitiveTypeAbstract;

abstract class SimpleTypeAbstract extends TypeAbstract
{
    /**
     * @param DataTypeObject $dataTypeObject
     * @return TypeAbstract
     * @throws \Exception
     */
    public static function createSimpleFromDataWithRefs(DataTypeObject $dataTypeObject)
    {
        $type = $dataTypeObject->type();
        switch ($type) {
            case 'array':
                return ArrayType::createArrayFromDataWithRefs($dataTypeObject);
            default:
                return PrimitiveTypeAbstract::createPrimitiveFromDataWithRefs($dataTypeObject);
        }
    }
}