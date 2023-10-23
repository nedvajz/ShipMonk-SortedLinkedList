<?php

namespace Ondra\ShipmonkTest;

use Ondra\ShipmonkTest\IntegerList\IntSortedLinkedList;
use Ondra\ShipmonkTest\StringList\StringSortedLinkedList;

class SortedLinkedListFactory
{

    public static function createIntegerSortedLinkedList(): IntSortedLinkedList
    {
        return new IntSortedLinkedList();
    }

    public static function createStringSortedLinkedList(): StringSortedLinkedList
    {
        return new StringSortedLinkedList();
    }
}