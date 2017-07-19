<?php
namespace Microsoft\Rest;

final class TypeInfo
{
    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @var string
     */
    private $name;
}