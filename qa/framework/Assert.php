<?php

namespace ext\microsoft\windowsazure\services\queue;
use ReflectionClass;
use ReflectionMethod;
use Exception;

class Assert {
    public static function runTests($qt, $min = 0, $max = 10000) {
        $reflector = new ReflectionClass($qt);
        $classname = $reflector->getName();
        $cn = substr($classname, strrpos($classname, '\\') + 1);
        echo "== Start tests for $classname ==============================<br/>\n";
        $methods = $reflector->getMethods(ReflectionMethod::IS_PUBLIC);
        $counter = 0;
        $passcount = 0;
        $failcount = 0;
        foreach($methods as $method) {
            if ($method->getDeclaringClass()->getName() == $reflector->getName()
                    && $method->getNumberOfParameters() == 0
                    && $method->name != 'setup' && $method->name != 'cleanup'
                    ) {
                $counter++;
                if ($counter >= $min && $counter <= $max)
                {
                    $fnname = $method->name;
                    echo "\n";
                    echo "-- Start $counter: $cn.$fnname -------------------------------------<br/>\n";
                    try {
                        $method->invoke($qt);
                        echo "-- Finished $counter: +++PASS";
                        $passcount++;
                    } catch (Exception $ex) {
                        echo '<table>';
                        echo $ex->xdebug_message;
                        echo '</table>';
                        echo '!!!FAIL ' . $ex->getMessage() . "<br/>\n";
                        echo "-- Finished $counter: !!!FAIL";
                        $failcount++;
                    }
                    echo ": $cn.$fnname -------------------------------------<br/>\n";
                }
            }
        }
        echo "   $passcount passed<br/>\n";
        echo "   $failcount failed<br/>\n";
        $total = $passcount + $failcount;
        echo "   $total total<br/>\n";
        echo "== Finish tests for $classname ==============================<br/>\n";
    }
    public static function assertNotNull($msg, $obj) {
        if($obj === null) {
            throw new \Exception('Object should not be null:' . $msg);
        }
        //echo 'assertNotNull passed:' . $msg . ' was ' . json_encode($obj) . "<br/>\n" ;       
    }
    public static function assertNull($msg, $obj) {
        if($obj !== null) {
            throw new \Exception('Object should be null: ' . $msg . ' was ' . json_encode($obj));
        }
        //echo 'assertNull passed:' . $msg . ' was ' . json_encode($obj) . "<br/>\n" ;       
    }
    public static function assertTrue($msg, $obj) {
        if($obj != true) {
            throw new \Exception('Object should be true: ' . $msg . ', was ' . json_encode($obj));
        }
        //echo 'assertTrue passed:' . $msg . ' was ' . json_encode($obj) . "<br/>\n" ;       
    }
    public static function assertFalse($msg, $obj) {
        if($obj != false) {
            throw new \Exception('Object should be false: ' . $msg . ', was ' . json_encode($obj));
        }
        //echo 'assertFalse passed:' . $msg . ' was ' . json_encode($obj) . "<br/>\n" ;       
    }
    public static function assertEquals($msg, $obj1, $obj2) {
        if($obj1 != $obj2) {
            throw new \Exception('Objects should be equal:' . $msg . ', was ' . json_encode($obj1) . ' and ' . json_encode($obj2));
        }
        //echo 'assertEquals passed:' . $msg . ', was ' . json_encode($obj1) . ' and ' . json_encode($obj2) . "<br/>\n" ;
    }
}
?>
