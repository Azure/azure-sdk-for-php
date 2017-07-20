<?php
namespace Microsoft\Rest\Internal\Data;

final class RootData extends DataAbstract
{
    /**
     * @param mixed $data
     * @param string $root
     * @return DataAbstract
     */
    static function create($data, $root)
    {
        return new RootData($data, $root);
    }

    /**
     * @return string
     */
    function getPath()
    {
        return "";
    }

    /**
     * @param mixed $data
     * @param string $root
     */
    protected function __construct($data, $root)
    {
        parent::__construct($data);
        $this->root = $root;
    }

    private $root;
}