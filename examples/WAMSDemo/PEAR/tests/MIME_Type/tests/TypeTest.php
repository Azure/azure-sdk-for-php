<?php
require_once 'MIME/Type.php';

class MIME_TypeTest extends PHPUnit_Framework_TestCase
{
    public function testParseParameterPearError()
    {
        $mt = new MIME_Type();
        $mt->parse(new PEAR_Error('this is an error'));
        $this->assertEquals('', $mt->media);
    }

    public function testParse()
    {
        $mt = new MIME_Type();
        $mt->parse('application/ogg;description=Hello there!;asd=fgh');
        $this->assertEquals('application', $mt->media);
        $this->assertEquals('ogg'        , $mt->subType);

        $params = array(
            'description' => array('Hello there!', ''),
            'asd' => array('fgh', '')
        );
        $this->assertEquals(2, count($mt->parameters));
        foreach ($params as $name => $param) {
            $this->assertTrue(isset($mt->parameters[$name]));
            $this->assertInstanceOf('MIME_Type_Parameter', $mt->parameters[$name]);
            $this->assertEquals($name,     $mt->parameters[$name]->name);
            $this->assertEquals($param[0], $mt->parameters[$name]->value);
            $this->assertEquals($param[1], $mt->parameters[$name]->comment);
        }
    }

    public function testParseAgain()
    {
        $mt = new MIME_Type();
        $mt->parse('application/ogg;description=Hello there!;asd=fgh');
        $this->assertEquals(2, count($mt->parameters));

        $mt->parse('text/plain;hello=there!');
        $this->assertEquals(1, count($mt->parameters));
    }

    public function testHasParameters()
    {
        $this->assertFalse(MIME_Type::hasParameters('text/plain'));
        $this->assertFalse(MIME_Type::hasParameters('text/*'));
        $this->assertFalse(MIME_Type::hasParameters('*/*'));
        $this->assertTrue(MIME_Type::hasParameters('text/xml;description=test'));
        $this->assertTrue(MIME_Type::hasParameters('text/xml;one=test;two=three'));
    }

    public function testGetParameters()
    {
        $this->assertEquals(
            array(),
            MIME_Type::getParameters('text/plain')
        );
        //rest is tested in testParse()
    }

    public function testStripParameters()
    {
        $this->assertEquals(
            'text/plain',
            MIME_Type::stripParameters('text/plain')
        );
        $this->assertEquals(
            'text/plain',
            MIME_Type::stripParameters('text/plain;asd=def')
        );
        $this->assertEquals(
            'text/plain',
            MIME_Type::stripParameters('text/plain;asd=def;ghj=jkl')
        );
    }

    public function testStripComments()
    {
        $this->assertEquals('def', MIME_Type::stripComments('(abc)def(ghi)', $null));
        $this->assertEquals('def', MIME_Type::stripComments('(abc)def', $null));
        $this->assertEquals('def', MIME_Type::stripComments('def(ghi)', $null));
    }

    public function testStripCommentsEscaped()
    {
        $comment = '';
        $this->assertEquals(
            'def', MIME_Type::stripComments('(\)abc)def(\))', $comment)
        );
        $this->assertEquals(')abc )', $comment);
    }

    public function testStripCommentsEscapedString()
    {
        $comment = false;
        $this->assertEquals(
            'foo', MIME_Type::stripComments('\\foo(abc)', $comment)
        );
        $this->assertEquals('abc', $comment);
    }

    public function testStripCommentsQuoted()
    {
        $this->assertEquals('def', MIME_Type::stripComments('(a"bc)def")def', $null));
        $this->assertEquals('(abc)def', MIME_Type::stripComments('"(abc)def"', $null));
    }

    public function testStripCommentsParameterComment()
    {
        $comment = '';
        $this->assertEquals(
            'def',
            MIME_Type::stripComments('(abc)def(ghi)', $comment)
        );
        $this->assertEquals('abc ghi', $comment);
    }

    public function testGetMedia()
    {
        $this->assertEquals('text', MIME_Type::getMedia('text/plain'));
        $this->assertEquals('application', MIME_Type::getMedia('application/ogg'));
        $this->assertEquals('*', MIME_Type::getMedia('*/*'));
    }

    public function testGetSubType()
    {
        $this->assertEquals('plain', MIME_Type::getSubType('text/plain'));
        $this->assertEquals('ogg', MIME_Type::getSubType('application/ogg'));
        $this->assertEquals('*', MIME_Type::getSubType('*/*'));
        $this->assertEquals('plain', MIME_Type::getSubType('text/plain;a=b'));
    }

    public function testGet()
    {
        $mt = new MIME_Type('text/xml');
        $this->assertEquals('text/xml', $mt->get());

        $mt = new MIME_Type('text/xml; this="is"; a="parameter" (with a comment)');
        $this->assertEquals(
            'text/xml; this="is"; a="parameter" (with a comment)',
            $mt->get()
        );
    }

    public function testIsExperimental()
    {
        $this->assertTrue(MIME_Type::isExperimental('text/x-test'));
        $this->assertTrue(MIME_Type::isExperimental('image/X-test'));
        $this->assertFalse(MIME_Type::isExperimental('text/plain'));
    }

    public function testIsVendor()
    {
        $this->assertTrue(MIME_Type::isVendor('application/vnd.openoffice'));
        $this->assertFalse(MIME_Type::isVendor('application/vendor.openoffice'));
        $this->assertFalse(MIME_Type::isVendor('vnd/fsck'));
    }

    public function testIsWildcard()
    {
        $this->assertTrue(MIME_Type::isWildcard('*/*'));
        $this->assertTrue(MIME_Type::isWildcard('image/*'));
        $this->assertFalse(MIME_Type::isWildcard('text/plain'));
    }

    public function testWildcardMatch() {
        $this->assertTrue(MIME_Type::wildcardMatch('*/*', 'image/png'));
        $this->assertTrue(MIME_Type::wildcardMatch('image/*', 'image/png'));
        $this->assertFalse(MIME_Type::wildcardMatch('image/*', 'text/plain'));
    }

    public function testWildcardMatchNoWildcard()
    {
        $this->assertFalse(MIME_Type::wildcardMatch('image/foo', 'image/png'));
    }

    public function testAddParameter()
    {
        $mt = new MIME_Type('image/png; foo=bar');
        $mt->addParameter('baz', 'val', 'this is a comment');
        $res = $mt->get();
        $this->assertContains('foo=', $res);
        $this->assertContains('bar', $res);

        $this->assertContains('baz=', $res);
        $this->assertContains('val', $res);
        $this->assertContains('(this is a comment)', $res);
    }

    public function testRemoveParameter()
    {
        $mt = new MIME_Type('image/png; foo=bar');
        $mt->addParameter('baz', 'val', 'this is a comment');
        $mt->removeParameter('foo');
        $res = $mt->get();
        $this->assertNotContains('foo=', $res);
        $this->assertNotContains('bar', $res);
        $this->assertContains('baz=', $res);
    }

    public function testAutoDetect()
    {
        $dir = dirname(__FILE__) . '/files/';

        $mt = new MIME_Type(
            MIME_Type::autoDetect($dir . 'example.png')
        );
        $this->assertInstanceOf('MIME_Type', $mt);
        $this->assertEquals('image', $mt->media);
        $this->assertEquals('png', $mt->subType);

        $mt = new MIME_Type(
            MIME_Type::autoDetect($dir . 'example.jpg')
        );
        $this->assertInstanceOf('MIME_Type', $mt);
        $this->assertEquals('image', $mt->media);
        $this->assertEquals('jpeg', $mt->subType);
    }

    public function testAutoDetectNonexistingFile()
    {
        $res = MIME_Type::autoDetect('/this/file/does/not/exist');
        $this->assertInstanceOf('PEAR_Error', $res);
        $this->assertContains('doesn\'t exist', $res->getMessage());
    }

    public function testAutoDetectFinfo()
    {
        $mt = new MIME_Type();
        $mt->useMimeContentType = false;
        $mt->useFileCmd = false;
        $mt->useExtension = false;
        $type = $mt->autoDetect(dirname(__FILE__) . '/files/example.jpg');
        $this->assertNotInstanceOf('PEAR_Error', $type);
        $this->assertEquals('image', $mt->media);
        $this->assertEquals('jpeg', $mt->subType);
    }

    public function testAutoDetectFinfoMagic()
    {
        $mt = new MIME_Type();
        $mt->magicFile = dirname(__FILE__) . '/TypeTest.magic';
        $mt->useMimeContentType = false;
        $mt->useFileCmd = false;
        $mt->useExtension = false;

        $type = $mt->autoDetect(dirname(__FILE__) . '/files/example.php');
        $this->assertNotInstanceOf('PEAR_Error', $type);
        $this->assertEquals('text', $mt->media);
        $this->assertEquals('x-unittest', $mt->subType);
    }

    /**
     * @expectedException PHPUnit_Framework_Error
     */
    public function testAutoDetectFinfoNonExistingMagic()
    {
        $mt = new MIME_Type();
        $mt->magicFile = dirname(__FILE__) . '/magicdoesnotexist';
        $mt->useMimeContentType = false;
        $mt->useFileCmd = false;
        $mt->useExtension = false;

        $type = $mt->autoDetect(dirname(__FILE__) . '/files/example.php');
        $this->assertInstanceOf('PEAR_Error', $type);
    }

    public function testAutoDetectMimeContentType()
    {
        $mt = new MIME_Type();
        $mt->useFinfo = false;
        $mt->useFileCmd = false;
        $mt->useExtension = false;
        $type = $mt->autoDetect(dirname(__FILE__) . '/files/example.jpg');
        $this->assertEquals('image', $mt->media);
        $this->assertEquals('jpeg', $mt->subType);
    }

    public function testAutoDetectFileCommand()
    {
        $mt = new MIME_Type();
        $mt->useFinfo = false;
        $mt->useMimeContentType = false;
        $mt->useExtension = false;
        $type = $mt->autoDetect(dirname(__FILE__) . '/files/example.jpg');
        $this->assertEquals('image', $mt->media);
        $this->assertEquals('jpeg', $mt->subType);
    }

    public function testAutoDetectFileCommandMagic()
    {
        $mt = new MIME_Type();
        $mt->magicFile = dirname(__FILE__) . '/TypeTest.magic';
        $mt->useFinfo = false;
        $mt->useMimeContentType = false;
        $mt->useExtension = false;
        $type = $mt->autoDetect(dirname(__FILE__) . '/files/example.php');
        $this->assertEquals('text', $mt->media);
        $this->assertEquals('x-unittest', $mt->subType);
    }

    public function testAutoDetectExtension()
    {
        $mt = new MIME_Type();
        $mt->useFinfo = false;
        $mt->useMimeContentType = false;
        $mt->useFileCmd = false;
        $type = $mt->autoDetect(dirname(__FILE__) . '/files/example.jpg');
        $this->assertEquals('image', $mt->media);
        $this->assertEquals('jpeg', $mt->subType);
    }

    public function testAutoDetectError()
    {
        $mt = new MIME_Type();
        $mt->useFinfo = false;
        $mt->useMimeContentType = false;
        $mt->useFileCmd = false;
        $mt->useExtension = false;

        $res = $mt->autoDetect(dirname(__FILE__) . '/files/example.jpg');
        $this->assertInstanceOf('PEAR_Error', $res);
        $this->assertEquals('', $mt->media);
        $this->assertEquals('', $mt->subType);
    }

    public function test_fileAutoDetectNoFileCommand()
    {
        $cmd = &PEAR::getStaticProperty('MIME_Type', 'fileCmd');
        $cmd = 'thiscommanddoesnotexist';

        require_once 'System/Command.php';
        $res = MIME_Type::_fileAutoDetect(dirname(__FILE__) . '/files/example.jpg');
        $this->assertInstanceOf('PEAR_Error', $res);
        $this->assertContains('thiscommanddoesnotexist', $res->getMessage());
    }

    public function testComments()
    {
        $type = new MIME_Type('(UTF-8 Plain Text) text / plain ; charset = utf-8');
        $this->assertEquals(
            'text/plain; charset="utf-8"', $type->get()
        );

        $type = new MIME_Type('text (Text) / plain ; charset = utf-8');
        $this->assertEquals(
            'text/plain; charset="utf-8"', $type->get()
        );

        $type = new MIME_Type('text / (Plain) plain ; charset = utf-8');
        $this->assertEquals(
            'text/plain; charset="utf-8"', $type->get()
        );

        $type = new MIME_Type('text / plain (Plain Text) ; charset = utf-8');
        $this->assertEquals(
            'text/plain; charset="utf-8"', $type->get()
        );

        $type = new MIME_Type('text / plain ; (Charset=utf-8) charset = utf-8');
        $this->assertEquals(
            'text/plain; charset="utf-8" (Charset=utf-8)', $type->get()
        );

        $type = new MIME_Type('text / plain ; charset (Charset) = utf-8');
        $this->assertEquals(
            'text/plain; charset="utf-8" (Charset)', $type->get()
        );

        $type = new MIME_Type('text / plain ; charset = (UTF8) utf-8');
        $this->assertEquals(
            'text/plain; charset="utf-8" (UTF8)', $type->get()
        );

        $type = new MIME_Type('text / plain ; charset = utf-8 (UTF-8 Plain Text)');
        $this->assertEquals(
            'text/plain; charset="utf-8" (UTF-8 Plain Text)', $type->get()
        );

        $type = new MIME_Type('application/x-foobar;description="bbgh(kdur"');
        $this->assertEquals(
            'application/x-foobar; description="bbgh(kdur"', $type->get()
        );

        $type = new MIME_Type('application/x-foobar;description="a \"quoted string\""');
        $this->assertEquals(
            'application/x-foobar; description="a \"quoted string\""', $type->get()
        );

    }


    public function test_handleDetectionParamPearError()
    {
        $err = new PEAR_Error('test');
        $ret = MIME_Type::_handleDetection($err, false);
        $this->assertInstanceOf('PEAR_Error', $ret);
    }

    public function test_handleDetectionEmptyType()
    {
        $ret = MIME_Type::_handleDetection('', false);
        $this->assertInstanceOf('PEAR_Error', $ret);

        $ret = MIME_Type::_handleDetection(false, false);
        $this->assertInstanceOf('PEAR_Error', $ret);
    }
}
?>
