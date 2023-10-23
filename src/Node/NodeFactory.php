<?php
declare(strict_types = 1);

namespace Ondra\ShipmonkTest\Node;

class NodeFactory
{
    public static function createNodeByValue(mixed $value): NodeInterface
    {
        $valueType = gettype($value);
        return match ($valueType) {
            'integer' => new IntegerNode($value),
            'string' => new StringNode($value),
            default => throw new \InvalidArgumentException('Unsupported type'),
        };
    }

}