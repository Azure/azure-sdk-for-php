<?php
namespace Microsoft\Rest\Parameters;

final class Info
{
    /**
     * @param string $name
     * @return self
     */
    public static function create($name)
    {
        $result = new self;
        $result->name = $name;
        return $result;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @var string
     */
    private $name;

    private function __construct()
    {
    }
}