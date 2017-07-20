<?php
namespace Microsoft\Rest\Internal\Data;

final class MapData extends DataAbstract
{
    /**
     * @param DataAbstract $parent
     * @param string $key
     * @return MapData|null
     */
    static function create(DataAbstract $parent, $key)
    {
        $parentData = $parent->getData();
        return isset($parentData[$key]) ? new MapData($parentData[$key], $parent, $key) : null;
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
     * @param mixed $data
     * @param DataAbstract $parent
     * @param string $key
     */
    protected function __construct($data, DataAbstract $parent, $key)
    {
        parent::__construct($data);
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