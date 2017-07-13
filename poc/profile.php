<?php

namespace Redis\_2017_01_01
{
    final class A
    {
        /**
         * prints "Hello world!"
         *
         * @return A
         */
        function id() {
            print "Hello world!";
            return $this;
        }
    }
}

namespace Redis
{
    class_alias("\Redis\_2017_01_01\A", "\Redis\A");
}

namespace
{

    $a = new \Redis\_2017_01_01\A();

    $a->id();

    $b = new \Redis\A();
    $c = $b->id();
    $c->id();
}