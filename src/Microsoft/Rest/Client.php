<?php
namespace Microsoft\Rest;

final class Client
{
    /**
     * Client constructor.
     *
     * @param array $definitionsData see https://swagger.io/specification/#definitions-object-100 for more details.
     */
    public function __construct(array $definitionsData)
    {
        $this->definitions = [];
        foreach ($definitionsData as $key => $value)
        {
            $this->definitions[$key] = self::createDefinition($value);
        }
    }

    /**
     * Creates an operation according to the given parameters.
     *
     * @param string $path          see https://swagger.io/docs/specification/paths-and-operations/ for path templating.
     * @param string $httpMethod    is one of "get", "put", "post", "delete", "options", "head", "patch".
     *                              See https://swagger.io/specification/#pathItemObject for more details.
     * @param array  $operationData see https://swagger.io/specification/#operationObject for more details.
     * @return Operation
     */
    public function createOperation($path, $httpMethod, array $operationData)
    {
        return new Operation(
            $this,
            self::parsePath($path),
            self::parseHttpMethod($httpMethod),
            $operationData["operationId"],
            self::parseParameters($operationData["parameters"]));
    }

    /**
     * @var Definition[]
     */
    private $definitions;

    /**
     * @param array $definition
     * @return Definition
     */
    private static function createDefinition(array $definition)
    {
        return new Definition(self::createProperties($definition["properties"]));
    }

    /**
     * @param array $properties
     * @return Property[]
     */
    private static function createProperties(array $properties)
    {
        $result = [];
        foreach ($properties as $key => $value)
        {
            $properties[$key] = self::createProperty($value);
        }
        return $result;
    }

    /**
     * @param array $property
     * @return Property
     */
    private static function createProperty(array $property)
    {
        return new Property();
    }

    /**
     * @param  string     $path
     * @return PathPart[]
     */
    private static function parsePath($path)
    {
        return [];
    }

    /**
     * See https://swagger.io/specification/#pathItemObject for more details.
     *
     * @param  string $httpMethod is one of "get", "put", "post", "delete", "options", "head", or "patch".
     * @return string             is one of "GET", "PUT", "POST", "DELETE", "OPTIONS", "HEAD", or "PATCH".
     */
    private static function parseHttpMethod($httpMethod)
    {
        return strtoupper($httpMethod);
    }

    /**
     * @param  array           $parameters
     * @return ParameterInfo[]
     */
    private static function parseParameters(array $parameters = null)
    {
        $result = [];
        foreach ($parameters as $parameter) {
            $result[] = self::parseParameter($parameter);
        }
        return $result;
    }

    /**
     * @param  array    $parameter
     * @return TypeInfo
     */
    private static function parseType(array $parameter)
    {
        return new TypeInfo($parameter["type"]);
    }

    /**
     * @param  array         $parameter
     * @return ParameterInfo
     */
    private static function parseParameter(array $parameter)
    {
        return new ParameterInfo(
            $parameter["name"],
            $parameter["in"],
            self::parseType($parameter));
    }
}
