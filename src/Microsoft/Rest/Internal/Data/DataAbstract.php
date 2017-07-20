<?php
namespace Microsoft\Rest\Internal\Data;

abstract class DataAbstract
{
    /**
     * @return mixed
     */
    function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $key
     * @return MapData|null
     */
    function getChild($key)
    {
        return isset($this->value[$key]) ? MapData::create($this, $key) : null;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    function getChildValue($key)
    {
        $value = $this->value;
        return isset($value[$key]) ? $value[$key] : null;
    }

    /**
     * @return MapData[]
     */
    function getChildren()
    {
        /**
         * @var MapData[]
         */
        $children = [];
        foreach (array_keys($this->value) as $key)
        {
            $children[] = MapData::create($this, $key);
        }
        return $children;
    }

    /**
     * @return string
     */
    abstract function getPath();

    /**
     * @param mixed $value
     */
    protected function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @var mixed
     */
    private $value;
}