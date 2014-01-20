<?php
if (!defined('PHPUnit_MAIN_METHOD')) {
    define('PHPUnit_MAIN_METHOD', 'MIME_Type_AllTests::main');
}

require_once 'PHPUnit/Autoload.php';

class MIME_Type_AllTests
{
    public static function main()
    {
        //PEAR's phpunit call did not load it automatically
        require_once __DIR__ . '/bootstrap.php';

        PHPUnit_TextUI_TestRunner::run(self::suite());
    }

    public static function suite()
    {
        $suite = new PHPUnit_Framework_TestSuite('MIME_Type tests');
        /** Add testsuites, if there is. */
        $suite->addTestFiles(
            glob(__DIR__ . '/*Test.php', GLOB_BRACE)
        );

        return $suite;
    }
}

if (PHPUnit_MAIN_METHOD == 'MIME_Type_AllTests::main') {
    MIME_Type_AllTests::main();
}
?>