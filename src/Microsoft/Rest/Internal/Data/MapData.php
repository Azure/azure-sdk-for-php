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
        return new MapData($parent, $key, $parent->getValue()[$key]);
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
     * @param DataAbstract|null $parent
     * @param string|int|null $key
     * @param mixed $value
     */
    function __construct($parent, $key, $value = null)
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