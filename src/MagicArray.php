<?php

    declare(strict_types = 1);

    namespace Coco\magicAccess;

class MagicArray implements \ArrayAccess, \Countable, \IteratorAggregate
{
    use MagicArrayTrait;
}
