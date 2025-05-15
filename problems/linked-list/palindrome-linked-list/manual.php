<?php
/*
234. Palindrome Linked List
 * Problem: https://leetcode.com/problems/palindrome-linked-list/

Given the head of a singly linked list, return true if it is a palindrome.

Time complexity: O(n)
Mem complexity: O(1)

 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution234 {

    public function findMiddleNode($head) {
        $slowPointer = $head;
        $fastPointer = $head->next;

        while ($fastPointer && $fastPointer->next) {
            $slowPointer = $slowPointer->next;
            $fastPointer = $fastPointer->next->next;
        }

        return $slowPointer;
    }

    public function reverseLinkedList($head) {
        $previousNode = null;
        $currentNode = $head;

        while ($currentNode) {
            $nextNode = $currentNode->next;
            $currentNode->next = $previousNode;
            $previousNode = $currentNode;
            $currentNode = $nextNode;
        }

        return $previousNode;
    }

    /**
     * @param ListNode|null $head
     * @return Boolean
     */
    public function isPalindrome(?ListNode $head): bool
    {
        if (!$head || !$head->next) {
            return true;
        }

        $middleNode = $this->findMiddleNode($head);

        $secondHalfStart = $this->reverseLinkedList($middleNode->next);

        $firstHalfStart = $head;
        $reversedSecondHalfStart = $secondHalfStart;

        while ($secondHalfStart) {
            if ($firstHalfStart->val !== $secondHalfStart->val) {
                return false;
            }

            $firstHalfStart = $firstHalfStart->next;
            $secondHalfStart = $secondHalfStart->next;
        }

        $middleNode->next = $this->reverseLinkedList($reversedSecondHalfStart);

        return true;
    }
}
