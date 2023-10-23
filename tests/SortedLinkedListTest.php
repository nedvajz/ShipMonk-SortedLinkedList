<?php
declare(strict_types = 1);

namespace Ondra\ShipmonkTest\IntegerList;

use InvalidArgumentException;
use Ondra\ShipmonkTest\SortedLinkedList;
use PHPUnit\Framework\TestCase;
use stdClass;

class SortedLinkedListTest extends TestCase
{

    public function testIntList(): void
    {
        $sortedLinkedList = new SortedLinkedList();
        $sortedLinkedList->add(1);

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

        $this->expectExceptionObject(new InvalidArgumentException('Unsupported type'));
        $sortedLinkedList->add('ahoj');
    }

    public function testStringList(): void
    {
        $sortedLinkedList = new SortedLinkedList();
        $sortedLinkedList->add('ahoj');

        self::assertSame('ahoj', $sortedLinkedList->getFirst());

        $sortedLinkedList->add('q');
        self::assertSame('q', $sortedLinkedList->getNext());

        $sortedLinkedList->add('d');
        self::assertSame('q', $sortedLinkedList->getCurrent());
        self::assertSame(null, $sortedLinkedList->getNext());
        self::assertSame('q', $sortedLinkedList->getLast());

        $sortedLinkedList->add('z');
        self::assertSame('z', $sortedLinkedList->getLast());

        $sortedLinkedList->reset();
        self::assertSame('ahoj', $sortedLinkedList->getCurrent());
        self::assertSame('d', $sortedLinkedList->getNext());
        self::assertSame('q', $sortedLinkedList->getNext());
        self::assertSame('z', $sortedLinkedList->getNext());

        $this->expectExceptionObject(new InvalidArgumentException('Unsupported type'));
        $sortedLinkedList->add(1);
    }

    public function testRemove(): void
    {
        $sortedLinkedList = new SortedLinkedList();
        $sortedLinkedList->add(1);
        $sortedLinkedList->add(5);
        $sortedLinkedList->add(3);

        self::assertSame(3, $sortedLinkedList->count());
        $sortedLinkedList->remove(3);

        self::assertSame(2, $sortedLinkedList->count());
        self::assertSame(1, $sortedLinkedList->getFirst());
        self::assertSame(5, $sortedLinkedList->getLast());
    }

    /**
     * @dataProvider unsupportedTypeGenerator
     */
    public function testAddUnsupportedType($value): void
    {
        $sortedLinkedList = new SortedLinkedList();

        $this->expectExceptionObject(new InvalidArgumentException('Unsupported type'));
        $sortedLinkedList->add($value);
    }


    public function unsupportedTypeGenerator(): \Generator
    {
        yield [1.1];
        yield [true];
        yield [null];
        yield [[]];
        yield [new stdClass()];
    }
}
