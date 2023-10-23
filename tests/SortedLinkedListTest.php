<?php
declare(strict_types = 1);

namespace Ondra\ShipmonkTest\IntegerList;

use Ondra\ShipmonkTest\SortedLinkedListFactory;
use PHPUnit\Framework\TestCase;

class SortedLinkedListTest extends TestCase
{

    public function testIntList(): void
    {
        $sortedLinkedList = SortedLinkedListFactory::createIntegerSortedLinkedList();
        $sortedLinkedList->add(1);

        self::assertTrue(true);
        self::assertSame(1, $sortedLinkedList->getFirst());

        $sortedLinkedList->add(5);
        self::assertSame(5, $sortedLinkedList->getNext());

        $sortedLinkedList->add(3);
        self::assertSame(5, $sortedLinkedList->getCurrent());
        self::assertSame(null, $sortedLinkedList->getNext());
        self::assertSame(5, $sortedLinkedList->getLast());

        $sortedLinkedList->add(7);
        self::assertSame(7, $sortedLinkedList->getLast());

        $sortedLinkedList->reset();
        self::assertSame(1, $sortedLinkedList->getCurrent());
        self::assertSame(3, $sortedLinkedList->getNext());
        self::assertSame(5, $sortedLinkedList->getNext());
        self::assertSame(7, $sortedLinkedList->getNext());

//        $this->expectException();

        $sortedLinkedList->add('string');
    }

    public function testStringList(): void
    {

    }
}
