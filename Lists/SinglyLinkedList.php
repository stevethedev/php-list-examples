<?php
/**
 * MIT License
 *
 * Copyright (c) 2017 Steven Jimenez
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @author Steven Jimenez
 * @copyright 2017 Steven Jimenez
 * @license MIT
 */

namespace SD\Lists;

use OutOfBoundsException;
use SD\Lists\ListInterface;
use SD\Nodes\SinglyLinkedNode;

class SinglyLinkedList implements ListInterface
{
    /**
     * Creates a singly-linked list data structure
     */
    public function __construct()
    {
        $this->headNode = null;
    }

    /**
     * Inserts a new value at the requested index. If no index is provided, then
     * assumes that the value should be inserted at the end of the data
     * structure.
     *
     * @param  mixed    value
     * @param  integer  index
     *
     * @return SinglyLinkedList
     */
    public function insert($value, $index = null)
    {
        $node = new SinglyLinkedNode($value);

        if (is_null($index) && is_null($this->headNode)) {
            $this->headNode = $node;
            return $this;
        }

        if (null === $index) {
            $this->getLastNode()->setNextNode($node);
            return $this;
        }

        if (0 == $index) {
            $node->setNextNode($this->headNode);
            $this->headNode = $node;
            return $this;
        }

        $previousNode = $this->getNode($index - 1);
        $node->setNextNode($previousNode->getNextNode());
        $previousNode->setNextNode($node);
        return $this;
    }

    /**
     * Retrieves a value from the identified index
     *
     * @param  integer  $index
     * @return mixed    value stored at the index
     */
    public function get($index)
    {
        return $this->getNode($index)->getValue();
    }

    /**
     * Updates a value at the identified index
     *
     * @param integer   $index
     * @param mixed     $value
     * @return $this
     */
    public function set($index, $value)
    {
        $this->getNode($index)->setValue($value);
        return $this;
    }

    /**
     * Removes "count" nodes, starting from the identified index
     *
     * @param  integer  index
     * @param  integer count (default: 1)
     * @return $this
     */
    public function remove($index, $count = 1)
    {
        $nextNode = $this->getNode($index + $count - 1)->getNextNode();

        if (0 === +$index) {
            $this->headNode = $nextNode;
            return $this;
        }

        $this->getNode($index - 1)->setNextNode($nextNode);
        return $this;
    }

    /**
     * Counts the number of nodes in the linked list
     *
     * @return integer
     */
    public function count()
    {
        $count = 0;
        $node = $this->headNode;
        while (!is_null($node)) {
            $node = $node->getNextNode();
            ++$count;
        }
        return $count;
    }

    /**
     * Retrieves the node at the identified index
     *
     * @param  integer index
     * @return SinglyLinkedNodeInterface
     */
    protected function getNode($index)
    {
        if (!is_null($index) && (!is_int($index) || 0 > intval($index))) {
            throw new OutOfBoundsException("Expected $index to be a positive integer");
        }

        $node = $this->headNode;
        for ($i = 0; $i < $index; ++$i) {
            $node = $node->getNextNode();
            if (!$node) {
                throw new OutOfBoundsException("Expected $index to be within length of list");
            }
        }

        return $node;
    }

    /**
     * Retrieves the last node in the structure
     *
     * @return SinglyLinkedNodeInterface
     */
    protected function getLastNode()
    {
        $node = $this->headNode;
        while ($node && $node->getNode()) {
            $node = $node->getNode();
        }
        return $node;
    }

    protected $headNode;
}
