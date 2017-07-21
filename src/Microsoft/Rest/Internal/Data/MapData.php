<?php
namespace Microsoft\Rest\Internal\Data;

final class MapData extends DataAbstract
{
    /**
     * @param DataAbstract $parent
     * @param string|int $key
     * @return MapData
     */
    static function create(DataAbstract $parent, $key)
    {
        return new MapData($parent->getValue()[$key], $parent, $key);
    }

    /**
     * @param string $path
     * @param string|int $key
     * @return string
     */
    static function appendPathKey($path, $key)
    {
        $keyStr = is_string($key) ? "'" . $key . "'" : strval($key);
        return $path . '[' . $keyStr . ']';
    }

    /**
     * @return string
     */
    function getPath()
    {
        return self::appendPathKey($this->parent->getPath(), $this->key);
    }

    /**
     * @return string|int
     */
    function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $value
     * @param DataAbstract $parent
     * @param string|int $key
     */
    protected function __construct($value, DataAbstract $parent, $key)
    {
        parent::__construct($value);
        $this->parent = $parent;
        $this->key = $key;
    }

    /**
     * @var DataAbstract
     */
    private $parent;

    /**
     * @var string|int
     */
    private $key;
}