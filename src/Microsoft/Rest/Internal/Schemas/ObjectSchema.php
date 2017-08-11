<?php
namespace Microsoft\Rest\Internal\Schemas;

use Microsoft\Rest\Internal\Swagger2\SchemaObject;

final class ObjectSchema extends SchemaAbstract
{
    /**
     * @param Definitions $definitions
     * @param SchemaObject $schemaObject
     */
    function update(Definitions $definitions, SchemaObject $schemaObject)
    {
        $properties = $schemaObject->properties();
        if ($properties !== null) {
            $this->propertyMap = [];
            foreach($properties->children() as $name => $property) {
                $this->propertyMap[$name] = $definitions->get($property);
            }
        }

        $this->allowAdditionalProperties = true;
        $additionalPropertiesObject = $schemaObject->additionalProperties();
        if ($additionalPropertiesObject !== null) {
            $allow = $additionalPropertiesObject->value();
            if (is_bool($allow)) {
                $this->allowAdditionalProperties = $allow;
            } else {
                $this->additionalProperties = $definitions->get($additionalPropertiesObject);
            }
        }
    }

    /**
     * @var SchemaAbstract[]|null
     */
    private $propertyMap;

    /**
     * @var bool
     */
    private $allowAdditionalProperties;

    /**
     * @var SchemaAbstract|null
     */
    private $additionalProperties;

    /**
     * @return bool
     */
    function isConst()
    {
        if ($this->allowAdditionalProperties) {
            return false;
        }
        // TODO:
        // 1. make sure all parameters are required.
        // 2. make sure the properties are not nullable
        // 3. make sure the object is not nullable
        foreach ($this->propertyMap as $property) {
            if (!$property->isConst()) {
                return false;
            }
        }
        return true;
    }
}