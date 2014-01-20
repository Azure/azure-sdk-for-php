<?php
require_once 'HTML/Template/IT.php';
require_once 'PHPUnit/Framework/TestCase.php';

class ITTest extends PHPUnit_Framework_TestCase
{
   /**
    * An HTML_Template_IT object
    * @var object
    */
    var $tpl;

    function setUp()
    {
        $this->tpl = new HTML_Template_IT(dirname(__FILE__) . '/templates');
    }

    function tearDown()
    {
        unset($this->tpl);
    }

    function _stripWhitespace($str)
    {
        return preg_replace('/\\s+/', '', $str);
    }

    function _methodExists($name)
    {
        if (in_array(strtolower($name), get_class_methods($this->tpl))) {
            return true;
        }
        $this->assertTrue(false, 'method '. $name . ' not implemented in ' . get_class($this->tpl));
        return false;
    }

   /**
    * Tests a setTemplate method
    *
    */
    function testSetTemplate()
    {
        $result = $this->tpl->setTemplate('A template', false, false);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error setting template: '. $result->getMessage());
        }
        $this->assertEquals('A template', $this->tpl->get());
    }

   /**
    * Tests a loadTemplatefile method
    *
    */
    function testLoadTemplatefile()
    {
        $result = $this->tpl->loadTemplatefile('loadtemplatefile.html', false, false);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading template file: '. $result->getMessage());
        }
        $this->assertEquals('A template', trim($this->tpl->get()));
    }

   /**
    * Tests a setVariable method
    *
    */
    function testSetVariable()
    {
        $result = $this->tpl->setTemplate('{placeholder1} {placeholder2} {placeholder3}', true, true);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error setting template: '. $result->getMessage());
        }
        // "scalar" call
        $this->tpl->setVariable('placeholder1', 'var1');
        // array call
        $this->tpl->setVariable(array(
            'placeholder2' => 'var2',
            'placeholder3' => 'var3'
        ));
        $this->assertEquals('var1 var2 var3', $this->tpl->get());
    }

   /**
    * Tests the <!-- INCLUDE --> functionality
    *
    */
    function testInclude()
    {
        $result = $this->tpl->loadTemplateFile('include.html', false, false);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading template file: '. $result->getMessage());
        }
        $this->assertEquals('Master file; Included file', trim($this->tpl->get()));
    }

   /**
    *
    */
    function testCurrentBlock()
    {
        $result = $this->tpl->loadTemplateFile('blockiteration.html', true, true);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading template file: '. $result->getMessage());
        }
        $this->tpl->setVariable('outer', 'a');
        $this->tpl->setCurrentBlock('inner_block');
        for ($i = 0; $i < 5; $i++) {
            $this->tpl->setVariable('inner', $i + 1);
            $this->tpl->parseCurrentBlock();
        } // for
        $this->assertEquals('a|1|2|3|4|5#', $this->_stripWhitespace($this->tpl->get()));
    }

   /**
    *
    */
    function testRemovePlaceholders()
    {
        $result = $this->tpl->setTemplate('{placeholder1},{placeholder2},{placeholder3}', true, true);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error setting template: '. $result->getMessage());
        }
        // we do not set {placeholder3}
        $this->tpl->setVariable(array(
            'placeholder1' => 'var1',
            'placeholder2' => 'var2'
        ));
        $this->assertEquals('var1,var2,', $this->tpl->get());

        // Now, we should really add a switch for keeping {stuff} in
        // data supplied to setVariable() safe. Until then, removing it should
        // be expected behaviour
        $result = $this->tpl->setTemplate('{placeholder1},{placeholder2},{placeholder3}', true, true);
        $this->tpl->setOption('preserve_input', false);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error setting template: '. $result->getMessage());
        }
        $this->tpl->setVariable(array(
            'placeholder1' => 'var1',
            'placeholder2' => 'var2',
            'placeholder3' => 'var3{stuff}'
        ));
        $this->assertEquals('var1,var2,var3', $this->tpl->get());

        $result = $this->tpl->setTemplate('{placeholder1},{placeholder2},{placeholder3}', true, true);
        $this->tpl->setOption('preserve_input', true);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error setting template: '. $result->getMessage());
        }
        $this->tpl->setVariable(array(
            'placeholder1' => 'var1',
            'placeholder2' => 'var2',
            'placeholder3' => 'var3{stuff}'
        ));
        $this->assertEquals('var1,var2,var3{stuff}', $this->tpl->get());

    }

   /**
    *
    */
    function testTouchBlock()
    {
        $result = $this->tpl->loadTemplateFile('blockiteration.html', false, true);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading template file: '. $result->getMessage());
        }
        $this->tpl->setVariable('outer', 'data');
        // inner_block should be preserved in output, even if empty
        $this->tpl->touchBlock('inner_block');
        $this->assertEquals('data|{inner}#', $this->_stripWhitespace($this->tpl->get()));
    }

    // Not available in stock class

   /**
    *
    */
    /*
    function testHideBlock()
    {
        if (!$this->_methodExists('hideBlock')) {
            return;
        }
        $result = $this->tpl->loadTemplateFile('blockiteration.html', false, true);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading template file: '. $result->getMessage());
        }
        $this->tpl->setVariable(array(
            'outer' => 'data',
            'inner' => 'stuff'
        ));
        // inner_block is not empty, but should be removed nonetheless
        $this->tpl->hideBlock('inner_block');
        $this->assertEquals('data#', $this->_stripWhitespace($this->tpl->get()));
    }
	*/
   /**
    *
    */
    /*
	function testSetGlobalVariable()
    {
        if (!$this->_methodExists('setGlobalVariable')) {
            return;
        }
        $result = $this->tpl->loadTemplateFile('globals.html', false, true);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading template file: '. $result->getMessage());
        }
        $this->tpl->setGlobalVariable('glob', 'glob');
        // {var2} is not, block_two should be removed
        $this->tpl->setVariable(array(
            'var1' => 'one',
            'var3' => 'three'
        ));
        for ($i = 0; $i < 3; $i++) {
            $this->tpl->setVariable('var4', $i + 1);
            $this->tpl->parse('block_four');
        } // for
        $this->assertEquals('glob:one#glob:three|glob:1|glob:2|glob:3#', $this->_stripWhitespace($this->tpl->get()));
    }
	*/


    /**
     * Test for bug #9501. preg_replace treat $<NUM> and \<NUM> as
     * backreferences. IT escapes them.
     *
     */
    function testBug9501()
    {
        $this->tpl->setTemplate("Test: {VALUE}");
        $this->tpl->clearCache = true;

        $this->tpl->setVariable("VALUE", '$12.34');
        $this->assertEquals('Test: $12.34', $this->tpl->get());

        $this->tpl->setVariable("VALUE", '$1256.34');
        $this->assertEquals('Test: $1256.34', $this->tpl->get());

        $this->tpl->setVariable("VALUE", '^1.34');
        $this->assertEquals('Test: ^1.34', $this->tpl->get());

        $this->tpl->setVariable("VALUE", '$1.34');
        $this->assertEquals('Test: $1.34', $this->tpl->get());

        $this->tpl->setVariable("VALUE", '\$12.34');
        $this->assertEquals('Test: \$12.34', $this->tpl->get());

        $this->tpl->setVariable("VALUE", "\$12.34");
        $this->assertEquals('Test: $12.34', $this->tpl->get());

        $this->tpl->setVariable("VALUE", "\$12.34");
        $this->assertEquals('Test: $12.34', $this->tpl->get());

        // $12 is not parsed as a variable as it starts with a number
        $this->tpl->setVariable("VALUE", "$12.34");
        $this->assertEquals('Test: $12.34', $this->tpl->get());

        $this->tpl->setVariable("VALUE", "\\$12.34");
        $this->assertEquals('Test: \$12.34', $this->tpl->get());

        // taken from the bugreport
        $word = 'Cost is $456.98';
        $this->tpl->setVariable("VALUE", $word);
        $this->assertEquals('Test: Cost is $456.98', $this->tpl->get());

        $word = "Cost is \$" . '183.22';
        $this->tpl->setVariable("VALUE", $word);
        $this->assertEquals('Test: Cost is $183.22', $this->tpl->get());
    }

    function testBug9783 ()
    {
        $this->tpl->setTemplate("<!-- BEGIN entry -->{DATA} <!-- END entry -->", true, true);
        $data = array ('{Bakken}', 'Soria', 'Joye');
        foreach ($data as $name) {
            $this->tpl->setCurrentBlock('entry');
            $this->tpl->setVariable('DATA', $name);
            $this->tpl->parseCurrentBlock();
        }

        $this->assertEquals('{Bakken} Soria Joye', trim($this->tpl->get()));

    }

    function testBug9853 ()
    {
        $this->tpl->loadTemplatefile("bug_9853_01.tpl", true, true);

        $this->tpl->setVariable("VAR" , "Ok !");
        $this->tpl->parse("foo1");

        $this->tpl->setVariable("VAR" , "Ok !");
        $this->tpl->parse("foo2");

        $this->tpl->setVariable("VAR." , "Ok !");
        $this->tpl->setVariable("VAR2" , "Okay");
        $this->tpl->parse("bar");

        $this->tpl->parse();
        $output01 = $this->tpl->get();

        $this->tpl->loadTemplatefile("bug_9853_02.tpl", true, true);

        $this->tpl->setVariable("VAR" , "Ok !");
        $this->tpl->parse("foo.");

        $this->tpl->setVariable("VAR" , "Ok !");
        $this->tpl->parse("foo2");

        $this->tpl->setVariable("VAR." , "Ok !");
        $this->tpl->setVariable("VAR2" , "Okay");
        $this->tpl->parse("bar");

        $this->tpl->parse();
        $output02 = $this->tpl->get();

        $this->assertEquals($output01, $output02);
    }


   /**
    * Tests iterations over two blocks
    *
    */
    function testBlockIteration()
    {
        $data = array(
            'a',
            array('b', array('1', '2', '3', '4')),
            'c',
            array('d', array('5', '6', '7'))
        );

        $result = $this->tpl->loadTemplateFile('blockiteration.html', true, true);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading template file: '. $result->getMessage());
        }
        foreach ($data as $value) {
            if (is_array($value)) {
                $this->tpl->setVariable('outer', $value[0]);
                foreach ($value[1] as $v) {
                    $this->tpl->setVariable('inner', $v);
                    $this->tpl->parse('inner_block');
                }
            } else {
                $this->tpl->setVariable('outer', $value);
            }
            $this->tpl->parse('outer_block');
        }
        $this->assertEquals('a#b|1|2|3|4#c#d|5|6|7#', $this->_stripWhitespace($this->tpl->get()));
    }

   /**
    *
    *
    */
    function testTouchBlockIteration()
    {
        $data = array('a','b','c','d','e');
        $result = $this->tpl->loadTemplateFile('blockiteration.html', true, true);
        if (PEAR::isError($result)) {
            $this->assertTrue(false, 'Error loading template file: '. $result->getMessage());
        }
        for ($i = 0; $i < count($data); $i++) {
            $this->tpl->setVariable('outer', $data[$i]);
            // the inner_block is empty and should be removed
            if (0 == $i % 2) {
                $this->tpl->touchBlock('inner_block');
            }
            $this->tpl->parse('outer_block');
        }
        $this->assertEquals('a|#b#c|#d#e|#', $this->_stripWhitespace($this->tpl->get()));
    }

    public function testShouldSetOptionsCorrectly() {
        $result = $this->tpl->setOption('removeEmptyBlocks', false);

        $this->assertFalse(PEAR::isError($result));

        $this->assertFalse($this->tpl->removeEmptyBlocks);

        $result = $this->tpl->setOption('removeEmptyBlocks', true);

        $this->assertFalse(PEAR::isError($result));

        $this->assertTrue($this->tpl->removeEmptyBlocks);

    }


    public function testPlaceholderReplacementScope() { 
        $result = $this->tpl->loadTemplateFile('placeholderreplacementscope.html', true, true);
       
        if (PEAR::isError($result)) {
            $this->fail('Error loading template file: ' . $result->getMessage());
        }


        $this->tpl->setCurrentBlock('foo');
        $this->tpl->setVariable('var1','test');
        $this->tpl->parseCurrentBlock();
        $this->tpl->setCurrentBlock('bar');
        $this->tpl->setVariable('var1','not');
        $this->tpl->setVariable('var2','good');
        $this->tpl->parseCurrentBlock();

        $actual = $this->_stripWhitespace($this->tpl->get());
        $this->assertEquals('testgood', $actual);
    }

}

?>
