<?php
namespace Microsoft\Rest\Internal\Data;

use Microsoft\Rest\Internal\ExpectedPropertyException;

class DataAbstract
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
     * @return DataAbstract|null
     */
    function getChildOrNull($key)
    {
        return $this->hasKey($key) ? new DataAbstract($this, $key) : null;
    }

    /**
     * @param string $key
     * @param string $className
     * @return mixed
     */
    function getChild($key, $className = DataAbstract::class)
    {
        $this->requireKey($key);
        return new $className($this, $key);
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
     * @return mixed
     */
    function getChildValue($key)
    {
        $this->requireKey($key);
        return $this->value[$key];
    }

    /**
     * @return DataAbstract[]
     */
    function getChildren()
    {
        /**
         * @var DataAbstract[]
         */
        $children = [];
        foreach (array_keys($this->value) as $key)
        {
            $children[] = new DataAbstract($this, $key);
        }
        return $children;
    }

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
     * @return string
     */
    function getPath()
    {
        return $this->parent === null
            ? '#'
            : $this->parent->getPath() . '/' . urlencode(strval($this->getKey()));
    }

    /**
     * @return string|int
     */
    function getKey()
    {
        return $this->key;
    }

    /**
     * @param DataAbstract|null $parent
     * @param string|int|null $key
     * @param mixed $value
     */
    function __construct($parent, $key, $value = null)
    {
        $this->parent = $parent;
        $this->key = $key;
        $this->value = $value === null ? $parent->getChildValue($key) : $value;
    }

    /**
     * @var DataAbstract
     */
    private $parent;

    /**
     * @var string|int
     */
    private $key;

    /**
     * @var mixed
     */
    private $value;
}