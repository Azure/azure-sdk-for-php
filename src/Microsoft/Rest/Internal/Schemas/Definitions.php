<?php
namespace Microsoft\Rest\Internal\Schemas;

use Microsoft\Rest\Internal\Swagger2\DataTypeObject;
use Microsoft\Rest\Internal\Swagger2\SchemaObject;
use Microsoft\Rest\Internal\Swagger2\SwaggerObject;

final class Definitions
{
    /**
     * @param SchemaObject|null $schemaObject
     * @return SchemaAbstract|null
     */
    function get($schemaObject)
    {
        if ($schemaObject === null) {
            return null;
        }

        $ref = $schemaObject->ref();
        if ($ref !== null)
        {
            return $this->definitions[$ref];
        }

        $result = self::createDefinition($schemaObject);
        $result->update($this, $schemaObject);
        return $result;
    }

    /**
     * @param DataTypeObject $dataTypeObject
     * @return DataTypeSchema
     */
    function getDataType(DataTypeObject $dataTypeObject)
    {
        $result = self::createDataTypeDefinition($dataTypeObject);
        $result->updateDataType($this, $dataTypeObject);
        return $result;
    }

    /**
     * Definitions constructor.
     * @param SwaggerObject $swaggerObject
     */
    function __construct(SwaggerObject $swaggerObject)
    {
        $this->definitions = [];
        $schemaObjectMap = $swaggerObject->definitions()->children();
        foreach ($schemaObjectMap as $name => $schemaObject) {
            $this->definitions[self::PREFIX . $name] = self::createDefinition($schemaObject);
        }
        foreach ($schemaObjectMap as $name => $schemaObject) {
            $this->definitions[self::PREFIX . $name]->update($this, $schemaObject);
        }
    }

    const PREFIX = '#/definitions/';

    /**
     * @param SchemaObject $schemaObject
     * @return SchemaAbstract
     * @throws \Exception
     */
    private static function createDefinition(SchemaObject $schemaObject)
    {
        switch ($schemaObject->type()) {
            case null:
            case 'object':
                return new ObjectSchema();
        }
        return self::createDataTypeDefinition($schemaObject);
    }

    /**
     * @param DataTypeObject $dataTypeObject
     * @return DataTypeSchema
     */
    private static function createDataTypeDefinition(DataTypeObject $dataTypeObject)
    {
        switch ($dataTypeObject->type()) {
            case 'array':
                return new ArraySchema();
            default:
                return new PrimitiveSchema();
        }
    }

    /**
     * @var SchemaAbstract[]
     */
    private $definitions;
}