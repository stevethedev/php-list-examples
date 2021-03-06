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

// Load all of the files necessary for this code to run:
const BASE_DIR = __DIR__ . '/..';
require_once(BASE_DIR . '/Nodes/NodeInterface.php');
require_once(BASE_DIR . '/Nodes/Node.php');
require_once(BASE_DIR . '/Nodes/SinglyLinkedNodeInterface.php');
require_once(BASE_DIR . '/Nodes/SinglyLinkedNode.php');
require_once(BASE_DIR . '/Lists/ListInterface.php');
require_once(BASE_DIR . '/Lists/LinkedListInterface.php');
require_once(BASE_DIR . '/Lists/SinglyLinkedList.php');

// Get our Linked List ready
use SD\Lists\SinglyLinkedList;

// Start the example
$list = new SinglyLinkedList();
$list->insert('world')->insert('hello', 0);
echo $list->get(0), ' ', $list->get(1), '!', "\r\n";
echo $list->remove(1)->get(0), '!', "\r\n";
echo 'count: ', $list->count(), "\r\n";
echo $list->set(0, 'goodbye!')->get(0), '!', "\r\n";
