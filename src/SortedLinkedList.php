<?php
declare(strict_types = 1);

namespace Ondra\ShipmonkTest;

use InvalidArgumentException;
use Ondra\ShipmonkTest\Node\NodeFactory;
use Ondra\ShipmonkTest\Node\NodeInterface;

class SortedLinkedList
{
    private ?NodeInterface $head = null;
    private ?NodeInterface $current = null;

    private int $count = 0;

    public function add($value): void
    {
        $node = NodeFactory::createNodeByValue($value);

        if ($this->head !== null && $node instanceof $this->head === false) {
            throw new InvalidArgumentException('Unsupported type');
        }

        $this->addNode($node);
        $this->count++;
    }

    public function remove($value): void
    {
        $nodeToRemove = $this->getNodeByValue($this->head, NodeFactory::createNodeByValue($value));
        if ($nodeToRemove === null) {
            throw new InvalidArgumentException('Node not found');
        }
        $beforeNode = $this->getLastBefore($this->head, $nodeToRemove);

        $beforeNode->setNext($nodeToRemove->getNext());
        unset($nodeToRemove);
        $this->count--;
    }

    public function count(): int
    {
        return $this->count;
    }

    public function getFirst(): mixed
    {
        return $this->head?->getValue();
    }

    public function getCurrent(): mixed
    {
        return $this->current?->getValue();
    }

    public function getLast(): mixed
    {
        return $this->getTail($this->head)?->getValue();
    }

    public function reset(): void
    {
        $this->current = $this->head;
    }

    public function getNext(): mixed
    {
        $this->current = $this->current->getNext();

        return $this->current?->getValue();
    }

    private function addNode(NodeInterface $node): void
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

    private function getLastBefore(NodeInterface $listedNode, NodeInterface $newNode): NodeInterface
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

    private function getNodeByValue(NodeInterface $listedNode, NodeInterface $searchedNode): ?NodeInterface
    {
        $searchedNodeValue = $searchedNode->getValue();
        $nodeValue = $listedNode->getValue();
        if ($nodeValue === $searchedNodeValue) {
            return $listedNode;
        }

        $nextNode = $listedNode->getNext();
        if ($nextNode === null) {
            return null;
        }

        return $this->getNodeByValue($nextNode, $searchedNode);
    }

    private function getTail(?NodeInterface $node): ?NodeInterface
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