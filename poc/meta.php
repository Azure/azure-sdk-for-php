<?php
namespace Meta
{
    interface SingletonInterface
    {
        /**
         * @return self
         */
        static function getInstance();
    }

    final class A implements SingletonInterface
    {
        /**
         * @return self
         */
        static function getInstance()
        {
            if (self::$instance == null)
            {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * @var self
         */
        private static $instance;

        private function __construct()
        {
        }
    }

    interface ParameterInfo
    {
        function getName();
    }

    interface OperationInterface
    {
        /**
         * @return string
         */
        function getOperationId();

        /**
         * @return ParameterInfo[]
         */
        function getParameters();
    }

    final class CreateA implements ParameterInfo
    {
        /**
         * @return string
         */
        public function getName()
        {
            return "A";
        }

        public static function getInstance()
        {
            if (self::$instance == null)
            {
                self::$instance = new self();
            }
            return self::$instance;
        }

        private function __constructor()
        {
        }

        /**
         * @var self
         */
        private static $instance;
    }

    final class Create implements OperationInterface
    {
        const OPERATION_ID = "create";

        private function __construct()
        {
        }

        /**
         * @return string
         */
        function getOperationId()
        {
            return Create::OPERATION_ID;
        }

        public static function getInstance()
        {
            if (Create::$instance == null)
            {
                Create::$instance = new Create();
            }
            return Create::$instance;
        }

        /**
         * @var Create
         */
        private static $instance = null;

        /**
         * @return ParameterInfo[]
         */
        function getParameters()
        {
            return [];
        }
    }

    const ALL = [ "create" ];

    final class CreateAFinal implements ParameterInfo
    {
        function getName()
        {
            return "A";
        }
    }

    final class CreateBFinal implements ParameterInfo
    {
        function getName()
        {
            return "B";
        }
    }

    final class Create2 implements OperationInterface
    {
        function getOperationId()
        {
            return "create";
        }

        /**
         * @return ParameterInfo[]
         */
        function getParameters()
        {
            return [ new CreateAFinal(), new CreateBFinal() ];
        }
    }
}

namespace
{
    function print_array(array $x)
    {
        print $x[0];
    }

    $class = Meta\Create::class;
    print constant($class . "::OPERATION_ID") . "\n";
    print Meta\Create::getInstance()->getOperationId() . "\n";
    print constant("Meta\ALL")[0] . "\n";
    print_array(Meta\ALL);

    $x = Meta\A::getInstance();
}

namespace Meta2
{

    use Meta\OperationInterface;

    interface TypeInfoInterface
    {
    }

    final class StringInfo implements TypeInfoInterface
    {
    }

    interface ParameterInfo
    {
        /**
         * @return string
         */
        function getName();

        /**
         * @return TypeInfoInterface
         */
        function getType();
    }

    interface OperationInfo
    {
        /**
         * @return &InfoInterface[]
         */
        function getParameters();
    }

    final class X implements OperationInfo
    {
        private $x = ['a', 'b'];

        /**
         * @return &InfoInterface[]
         */
        function getParameters()
        {
            return $this->x;
        }
    }

    final class CreateA
    {
        public function getName()
        {
            return "a";
        }
    }

    final class Create
    {

    }
}

namespace Meta2\Create
{
    final class A
    {
    }
}

namespace {
    // doesn't work in PHP 5.6
    $xx = new stdClass {
        $a = 5
    };
}

namespace {
    final class B
    {

    }
    final class A
    {
        /**
         * @var B
         */
        public $b;

        public function setB(B $b)
        {
            $this->b = $b;
        }
    }
    $a = new A;
    $a->b = 3;
    $a->setB(3);
    $a->setB(new B);
}