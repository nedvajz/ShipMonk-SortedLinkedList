<?php

namespace Ondra\ShipmonkTest;

use Ondra\ShipmonkTest;
use Ondra\ShipmonkTest\IntegerList\IntSortedLinkedList;

class SortedLinkedListFactory
{

    public static function createIntegerSortedLinkedList(): IntSortedLinkedList
    {
        return new IntSortedLinkedList();
    }
}