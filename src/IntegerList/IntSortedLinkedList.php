<?php
declare(strict_types = 1);

namespace Ondra\ShipmonkTest\IntegerList;

use Ondra\ShipmonkTest\Core\AbstractSortedLinkedList;
use Ondra\ShipmonkTest\Core\NodeInterface;

class IntSortedLinkedList extends AbstractSortedLinkedList
{
    public function add(int $value): void
    {
        $node = new IntNode($value);
        $this->addNode($node);
    }

    public function getFirst(): ?int
    {
        return $this->head?->getValue();
    }

    public function getCurrent(): ?int
    {
        return $this->current?->getValue();
    }

    public function getLast(): ?int
    {
        return $this->getTail($this->head)?->getValue();
    }

    public function reset(): void
    {
        $this->current = $this->head;
    }

    public function getNext(): ?int
    {
        $this->current = $this->current->getNext();

        return $this->current?->getValue();
    }
}