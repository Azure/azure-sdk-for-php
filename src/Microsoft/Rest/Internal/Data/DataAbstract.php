<?php
namespace Microsoft\Rest\Internal\Data;

use Microsoft\Rest\Internal\ExpectedPropertyException;

class DataAbstract
{
    /**
     * @param string|int $key
     * @return bool
     */
    protected function hasKey($key)
    {
        return isset($this->value[$key]);
    }

    /**
     * @param string|int $key
     * @throws ExpectedPropertyException
     */
    protected function requireKey($key)
    {
        if (!$this->hasKey($key)) {
            throw new ExpectedPropertyException($this, $key);
        }
    }

    /**
     * @param string $key
     * @param string $className
     * @return mixed|null
     */
    protected function getChildOrNull($key, $className)
    {
        return $this->hasKey($key) ? new $className($this, $key) : null;
    }

    protected function getChildOrValueOrNull($key, $className)
    {
        $value = $this->getChildValueOrNull($key);
        return $value === null
                ? null
            : is_array($value)
                ? new $className($this, $key)
                : $value;
    }

    /**
     * @param string $key
     * @param string $className
     * @return mixed
     */
    protected function getChild($key, $className)
    {
        $this->requireKey($key);
        return new $className($this, $key);
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    protected function getChildValueOrNull($key)
    {
        return $this->hasKey($key) ? $this->value[$key] : null;
    }

    /**
     * @param $key
     * @return mixed
     */
    protected function getChildValue($key)
    {
        $this->requireKey($key);
        return $this->value[$key];
    }

    /**
     * @param string $className
     * @return array
     */
    protected function getChildren($className = DataAbstract::class)
    {
        /**
         * @var DataAbstract[]
         */
        $children = [];
        foreach (array_keys($this->value) as $key)
        {
            $children[$key] = new $className($this, $key);
        }
        return $children;
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
    protected function getKey()
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