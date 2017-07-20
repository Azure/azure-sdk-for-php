<?php
namespace Microsoft\Rest\Internal\Data;

final class RootData extends DataAbstract
{
    /**
     * @param mixed $value
     * @param string $root
     * @return DataAbstract
     */
    static function create($value, $root)
    {
        return new RootData($value, $root);
    }

    /**
     * @return string
     */
    function getPath()
    {
        return $this->root;
    }

    /**
     * @param mixed $value
     * @param string $root
     */
    protected function __construct($value, $root)
    {
        parent::__construct($value);
        $this->root = $root;
    }

    private $root;
}