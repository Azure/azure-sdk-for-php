<?php
namespace Microsoft\Rest;

final class PathPart
{
    /**
     * @param string $value
     * @param bool $isParameter
     */
    public function __construct($value, $isParameter = false)
    {
        $this->value = $value;
        $this->isParameter = $isParameter;
    }

    /**
     * @var string
     */
    private $value;

    /**
     * @var bool
     */
    private $isParameter;
}