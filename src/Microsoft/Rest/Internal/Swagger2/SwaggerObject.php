<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\DataRef;

/**
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#swagger-object
 */
final class SwaggerObject extends DataRef
{
    /**
     * @return string
     */
    function host()
    {
        return $this->getChildValue('host');
    }

    /**
     * @return SchemaObjectMap
     */
    function definitions()
    {
        return new SchemaObjectMap($this, 'definitions');
    }

    /**
     * @return PathsObject
     */
    function paths()
    {
        return new PathsObject($this, 'paths');
    }

    /**
     * SwaggerObject constructor.
     * @param mixed $value
     */
    function __construct($value)
    {
        parent::__construct(null, null, $value);
    }
}