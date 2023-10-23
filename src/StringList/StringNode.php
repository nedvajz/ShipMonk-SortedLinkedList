<?php

namespace Ondra\ShipmonkTest\StringList;

use InvalidArgumentException;
use Ondra\ShipmonkTest\Core\NodeInterface;

/**
* @template string
*/
class StringNode implements NodeInterface
{
    private ?NodeInterface $next = null;

    public function __construct(
        private readonly string $value
    )
    {
    }

    public function getNext(): ?NodeInterface
    {
        return $this->next;
    }

    public function setNext(?NodeInterface $node): void
    {
        $this->next = $node;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isBefore(NodeInterface $anotherNode): bool
    {
        if ($anotherNode instanceof StringNode === false) {
            throw new InvalidArgumentException('Node must be instance of IntNode');
        }

        if ($anotherNode->getValue() > $this->value) {
            return true;
        }

        return false;
    }
}