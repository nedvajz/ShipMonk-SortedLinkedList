<?php
declare(strict_types = 1);

namespace Ondra\ShipmonkTest\StringList;

use Ondra\ShipmonkTest\Core\AbstractSortedLinkedList;
use Ondra\ShipmonkTest\Core\NodeInterface;

class StringSortedLinkedList extends AbstractSortedLinkedList
{
    public function add(string $value): void
    {
        $node = new StringNode($value);
        $this->addNode($node);
    }

    public function getFirst(): ?string
    {
        return $this->head?->getValue();
    }

    public function getCurrent(): ?string
    {
        return $this->current?->getValue();
    }

    public function getLast(): ?string
    {
        return $this->getTail($this->head)?->getValue();
    }

    public function reset(): void
    {
        $this->current = $this->head;
    }

    public function getNext(): ?string
    {
        $this->current = $this->current->getNext();

        return $this->current?->getValue();
    }
}