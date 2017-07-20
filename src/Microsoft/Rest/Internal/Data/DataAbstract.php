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
     * @return string
     */
    function getPhpCode()
    {
        return self::valueToPhpCode($this->value);
    }

    /**
     * @param mixed $value
     * @return string
     */
    private static function valueToPhpCode($value)
    {
        if (is_array($value))
        {
            $body = [];
            foreach ($value as $key => $child)
            {
                $body[] = "'" . $key . "'=>" . self::valueToPhpCode($child);
            }
            return '['.implode(',', $body).']';
        }
        else
        {
            return "'" . $value . "'";
        }
    }

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