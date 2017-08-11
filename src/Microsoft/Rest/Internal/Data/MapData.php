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
     * @return string
     */
    function getPath()
    {
        return $this->parent === null
            ? '#'
            : $this->parent->getPath() . '/' . urlencode(strval($this->getKey()));
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
    function __construct($value, DataAbstract $parent = null, $key = null)
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