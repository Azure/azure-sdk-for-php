<?php
namespace Microsoft\Rest\Internal\Data;

use Microsoft\Rest\Internal\ExpectedPropertyException;

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
     * @param string|int $key
     * @return bool
     */
    function hasKey($key)
    {
        return isset($this->value[$key]);
    }

    /**
     * @param string|int $key
     * @throws ExpectedPropertyException
     */
    function requireKey($key)
    {
        if (!$this->hasKey($key)) {
            throw new ExpectedPropertyException($this, $key);
        }
    }

    /**
     * @param string $key
     * @return MapData|null
     */
    function getChildOrNull($key)
    {
        return $this->hasKey($key) ? MapData::create($this, $key) : null;
    }

    /**
     * @param $key
     * @return MapData
     */
    function getChild($key)
    {
        $this->requireKey($key);
        return MapData::create($this, $key);
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    function getChildValueOrNull($key)
    {
        return $this->hasKey($key) ? $this->value[$key] : null;
    }

    /**
     * @param $key
     * @return MapData
     */
    function getChildValue($key)
    {
        $this->requireKey($key);
        return $this->value[$key];
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