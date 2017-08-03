<?php
namespace Microsoft\Rest\Internal\Types;

trait NotConstTypeTrait
{
    function isConst() { return FALSE; }
    function getConstValue() { return null; }
}