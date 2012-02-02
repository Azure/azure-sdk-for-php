<?php
/**
 * @small
 */
class FooTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers Foo::getNum
     */
    public function testGetNum()
    {
        $f = new Foo;
        $this->assertEquals(1, $f->getNum());

        return $f;
    }
}
