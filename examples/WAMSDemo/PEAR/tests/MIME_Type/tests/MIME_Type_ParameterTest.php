<?php
require_once 'MIME/Type/Parameter.php';

class MIME_Type_ParameterTest extends PHPUnit_Framework_TestCase
{
    public function testHasComment()
    {
        $this->assertTrue(
            MIME_Type_Parameter::hasComment(
                'a="parameter" (with a comment)'
            )
        );
        $this->assertTrue(
            MIME_Type_Parameter::hasComment(
                'param=foo(with a comment)'
            )
        );
    }

    public function testHasCommentNegative()
    {
        $this->assertFalse(
            MIME_Type_Parameter::hasComment(
                'a="parameter"'
            )
        );
        $this->assertFalse(
            MIME_Type_Parameter::hasComment(
                'foo=bar'
            )
        );
    }

    public function testGetComment()
    {
        $this->assertEquals(
            'with a comment',
            MIME_Type_Parameter::getComment(
                'a="parameter" (with a comment)'
            )
        );
    }

    public function testGetCommentNone()
    {
        $this->assertEquals(
            '',
            MIME_Type_Parameter::getComment(
                'a="parameter"'
            )
        );
    }
}

?>