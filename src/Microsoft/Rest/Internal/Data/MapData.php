<?php
namespace Microsoft\Rest\Internal\Data;

final class MapData extends DataAbstract
{
    /**
     * @param DataAbstract $parent
     * @param string $key
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
        return $this->parent->getPath() . "[\"" . $this->key . "\"]";
    }

    /**
     * @return string
     */
    function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $value
     * @param DataAbstract $parent
     * @param string $key
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
     * @var string
     */
    private $key;
}