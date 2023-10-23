<?php

namespace Ondra\ShipmonkTest\Core;

/**
 * @template T
 */
interface NodeInterface
{
    public function setNext(?self $node): void;

    public function getNext(): ?NodeInterface;

    /**
     * @return T
     */
    public function getValue();

    public function isBefore(NodeInterface $newNode): bool;

}