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
namespace SD\Nodes;

use SD\Nodes\Node;
use SD\Nodes\NodeInterface;

/**
 * Every node should carry a value
 */
class Node implements NodeInterface
{
    /**
     * SinglyLinkedNode Constructor
     *
     * @param mixed $value Value to hold within the node
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Retrieves the value contained within the node
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets the value contained within the node
     * @param mixed $value value to carry
     * @return $this
     */
    public function setValue($value)
    {
        return $this->value = $value;
    }

    /**
     * Value being carried by this node
     * @var mixed
     */
    protected $value;
}
