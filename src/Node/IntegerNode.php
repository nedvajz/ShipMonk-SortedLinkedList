<?php
declare(strict_types = 1);

namespace Ondra\ShipmonkTest\Node;

use InvalidArgumentException;

class IntegerNode implements NodeInterface
{
    private ?NodeInterface $next = null;

    public function __construct(
        private readonly int $value
    )
    {
    }

    public function getNext(): ?IntegerNode
    {
        return $this->next;
    }

    public function setNext(?NodeInterface $node): void
    {
        $this->next = $node;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    public function isBefore(NodeInterface $anotherNode): bool
    {
        if ($anotherNode instanceof IntegerNode === false) {
            throw new InvalidArgumentException('Node must be instance of IntNode');
        }

        if ($anotherNode->getValue() > $this->value) {
            return true;
        }

        return false;
    }
}