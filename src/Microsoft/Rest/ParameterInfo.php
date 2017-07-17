<?php
namespace Microsoft\Rest;

final class ParameterInfo
{
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $name
     * @param string $location
     */
    public function __construct($name, $location)
    {
        $this->name = $name;
        $this->location = $location;
    }

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $location;
}