<?php
declare(strict_types = 1);

namespace Ondra\ShipmonkTest\Node;

interface NodeInterface
{
    /**
     * @template T of int|string
     * @return T
     */
    public function getValue();

    public function setNext(?self $node): void;

    public function getNext(): ?NodeInterface;

    public function isBefore(NodeInterface $anotherNode): bool;

}