<?php
namespace Microsoft\Rest\Internal\Path;

use Microsoft\Rest\Internal\Parameter;

final class PathBuilder
{
    /**
     * @param Parameter[] $pathParameterMap
     * @param string $operationId
     * @param PathStrPart[] $pathStrParts
     * @return PathPartAbstract[]
     */
    static function create(array $pathParameterMap, $operationId, array $pathStrParts) {
        /** @var PathPartAbstract[] */
        $result = [];
        $lastConst = '';
        foreach ($pathStrParts as $part) {
            $value = $part->getValue();
            if (!$part->isParameter()) {
                $lastConst .= $value;
            } else {
                $parameter = $pathParameterMap[$value];
                if ($parameter->isConst()) {
                    $lastConst .= $parameter->getConstValue();
                } else {
                    if (strlen($lastConst) !== 0) {
                        $result[] = new ConstPathPart($lastConst);
                        $lastConst = '';
                    }
                    $result[] = new ParameterPathPart($parameter);
                }
            }
        }
        if (strlen($lastConst) !== 0) {
            $result[] = new ConstPathPart($lastConst);
        }
        return $result;
    }

    private function __construct() {}
}