<?php
namespace Microsoft\Rest\Internal\Path;

use Microsoft\Rest\Internal\Parameter;

final class PathStrPart
{
    /**
     * @return bool
     */
    function isParameter()
    {
        return $this->isParameter;
    }

    /**
     * @return string
     */
    function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $pathStr
     * @return PathStrPart[]
     * @throws PathParseException
     */
    static function parse($pathStr)
    {
        $i = $pathStr;
        /**
         * @var PathStrPart[]
         */
        $path = [];
        while (true) {

            $pos = strpos($i, '{');
            if ($pos === FALSE) {
                if (strlen($i) > 0)
                {
                    $path[] = new PathStrPart(false, $i);
                }
                break;
            }
            if ($pos !== 0) {
                $path[] = new PathStrPart(false, substr($i, 0, $pos));
                $i = substr($i, $pos + 1);
            }

            $pos = strpos($i, '}');
            if ($pos === FALSE) {
                throw new PathParseException('\'}\' expected', $pathStr);
            }
            if ($pos === 0)
            {
                throw new PathParseException('empty parameter name \'{}\'', $pathStr);
            }
            $path[] = new PathStrPart(true, substr($i, 0, $pos));
            $i = substr($i, $pos + 1);
        }
        return $path;
    }

    /**
     * @param Parameter[] $pathParameterMap
     * @param string $operationId
     * @return PathPartAbstract
     */
    /*
    function createPathPart(array $pathParameterMap, $operationId) {
        return $this->isParameter
            ? ParameterPathPart::create($pathParameterMap, $this->value, $operationId)
            : new ConstPathPart($this->value);
    }
    */

    /**
     * @param bool $isParameter
     * @param string $value
     */
    private function __construct($isParameter, $value)
    {
        $this->isParameter = $isParameter;
        $this->value = $value;
    }

    /**
     * @var bool
     */
    private $isParameter;

    /**
     * @var string
     */
    private $value;
}