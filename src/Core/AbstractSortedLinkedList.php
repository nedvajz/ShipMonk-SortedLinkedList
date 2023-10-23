<?php
declare(strict_types = 1);

namespace Ondra\ShipmonkTest\Core;

class AbstractSortedLinkedList
{
    protected ?NodeInterface $head = null;
    protected ?NodeInterface $current = null;

    protected function addNode(NodeInterface $node): void
    {
        $isInitialNode = $this->head === null;
        if ($isInitialNode) {
            $this->head = $node;
            $this->current = $node;
            return;
        }

        $beforeNode = $this->getLastBefore($this->head, $node);
        $nextNode = $beforeNode->getNext();
        $beforeNode->setNext($node);
        $node->setNext($nextNode);
    }

    protected function getLastBefore(NodeInterface $listedNode, NodeInterface $newNode): NodeInterface
    {
        $nextNode = $listedNode->getNext();
        if ($nextNode === null) {
            return $listedNode;
        }

        if ($nextNode->isBefore($newNode)) {
            return $this->getLastBefore($nextNode, $newNode);
        }

        return $listedNode;
    }

    protected function getTail(?NodeInterface $node): ?NodeInterface
    {
        if ($node === null) {
            return null;
        }

        $nextNode = $node->getNext();
        if ($nextNode === null) {
            return $node;
        }

        return $this->getTail($nextNode);
    }
}