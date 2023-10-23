<?php
declare(strict_types = 1);

namespace Ondra\ShipmonkTest\Node;

use InvalidArgumentException;

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

    /**
     * @return string
     */
    public function getValue()
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