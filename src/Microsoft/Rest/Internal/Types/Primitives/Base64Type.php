<?php
namespace Microsoft\Rest\Internal\Types\Primitives;

use Microsoft\Rest\Internal\Types\NotConstTypeTrait;

/**
 * type: string
 * format: byte
 */
final class Base64Type extends PrimitiveTypeAbstract
{
    use NotConstTypeTrait;
}