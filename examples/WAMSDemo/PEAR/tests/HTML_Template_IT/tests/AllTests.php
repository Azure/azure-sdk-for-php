<?php
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'HTML_Template_IT_AllTests::main');
}

require_once 'PHPUnit/TextUI/TestRunner.php';
require_once 'PHPUnit/Framework/TestSuite.php';


require_once 'ITTest.php';
require_once 'ITXTest.php';


class HTML_Template_IT_AllTests
{
    public static function main()
    {

        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('HTML_Template_IT tests');

        $suite->addTestSuite('ITTest');
        $suite->addTestSuite('ITXTest');

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'HTML_Template_IT_AllTests::main') {
    HTML_Template_IT_AllTests::main();
}
?>
