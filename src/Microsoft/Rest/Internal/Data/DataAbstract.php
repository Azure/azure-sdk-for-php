<?php
namespace Microsoft\Rest\Internal\Data;

abstract class DataAbstract
{
    /**
     * @return mixed
     */
    function getData()
    {
        return $this->data;
    }

    /**
     * @param string $key
     * @return MapData|null
     */
    function at($key)
    {
        return MapData::create($this, $key);
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
        foreach (array_keys($this->data) as $key)
        {
            $children[] = $this->at($key);
        }
        return $children;
    }

    /**
     * @return string
     */
    abstract function getPath();

    /**
     * @param mixed $data
     */
    protected function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @var mixed
     */
    private $data;
}