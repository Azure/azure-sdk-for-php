<?php

class A
{
    function getA() /* : string */
    {
        return $this->a;
    }

    function setA(/* string */ $a)
    {
        $this->a = $a;
        return $this;
    }

    function unsetA()
    {
        unset($this->a);
        return $this;
    }

    public $a;
}

$aaa = (new A)->unsetA()->setA('3');

print '$aaa->a = ' . $aaa->getA() . "\n";

$aaa->setA("aaaaa");

print_r($aaa);

/*
// PHP 5.6
$a = (object)[];

// $aa = new stdClass { $a = 5 };

$aa = new class() extends A
{
    public $a = 3;
};

print_r($aa);
*/