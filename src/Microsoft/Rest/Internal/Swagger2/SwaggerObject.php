<?php
namespace Microsoft\Rest\Internal\Swagger2;

use Microsoft\Rest\Internal\Data\DataAbstract;

/**
 * Class SwaggerObject
 * https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#swagger-object
 */
final class SwaggerObject extends DataAbstract
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
        return $this->getChild('definitions', SchemaObjectMap::class);
    }

    /**
     * @return PathsObject
     */
    function paths()
    {
        return $this->getChild('paths', PathsObject::class);
    }

    /**
     * SwaggerObject constructor.
     * @param array $value
     */
    function __construct(array $value)
    {
        parent::__construct(null, null, $value);
    }
}