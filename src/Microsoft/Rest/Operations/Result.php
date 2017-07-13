<?php
namespace Microsoft\Rest\Operations;

final class Result
{
    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param $value
     * @return self
     */
    public static function create($value)
    {
        $result = new self();
        $result->value = $value;
        return $result;
    }

    private $value;

    private function __construct()
    {
    }
}