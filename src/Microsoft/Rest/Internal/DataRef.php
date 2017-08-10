<?php
namespace Microsoft\Rest\Internal;

class DataRef
{
    /**
     * @return string[]
     */
    protected function keys()
    {
        return array_keys($this->value);
    }

    protected function getChildValue($name)
    {
        return $this->value[$name];
    }

    /**
     * @param string $name
     * @return mixed
     */
    protected function getChildValueOrNull($name)
    {
        return isset($this->value[$name]) ? $this->value[$name] : null;
    }

    /**
     * @param string $name
     * @param string $className
     * @return mixed
     */
    protected function getChildOrNull($name, $className)
    {
        return array_key_exists($name, $this->value)
            ? new $className($this, $name)
            : null;
    }

    /**
     * @param $className
     * @return array
     */
    protected function getChildren($className)
    {
        $result = [];
        foreach ($this->keys() as $key) {
            $result[] = new $className($this, $key);
        }
        return $result;
    }

    /**
     * @param DataRef|null $parent
     * @param string|null $name
     * @param mixed $value
     */
    protected function __construct($parent, $name, $value = null)
    {
        $this->parent = $parent;
        $this->name = $name;
        $this->value = $value === null ? $parent->value[$name] : $value;
    }

    /**
     * @var DataRef|null
     */
    private $parent;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var mixed
     */
    private $value;
}