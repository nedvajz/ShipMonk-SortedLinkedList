<?php
declare(strict_types = 1);

namespace Ondra\ShipmonkTest\StringList;

use Ondra\ShipmonkTest\Core\NodeInterface;

class StringSortedLinkedList
{
    private ?NodeInterface $head = null;
    private ?NodeInterface $current = null;

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