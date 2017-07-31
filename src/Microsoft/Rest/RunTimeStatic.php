<?php
namespace Microsoft\Rest;

use Microsoft\Rest\Internal\RunTime;

final class RunTimeStatic
{
    /**
     * @return RunTimeInterface
     */
    static function create()
    {
        return new RunTime();
    }

    private function __construct() { }
}