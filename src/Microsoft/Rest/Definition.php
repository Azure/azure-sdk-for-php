<?php
namespace Microsoft\Rest;

final class Definition
{
    /**
     * @param Property[] $properties
     */
    public function __construct($properties)
    {
        $this->properties = $properties;
    }

    /**
     * @var Property[]
     */
    private $properties;
}