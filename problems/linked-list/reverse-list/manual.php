<?php /** @noinspection ALL */

/*
206. Reverse Linked List

Time complexity: O(n)
mem complexity: O(1)

Given the head of a singly linked list, reverse the list, and return the reversed list.

Example 1:
Input: head = [1,2,3,4,5]
Output: [5,4,3,2,1]

Example 2:

Input: head = [1,2]
Output: [2,1]

Example 3:

Input: head = []
Output: []

Constraints:

    The number of nodes in the list is the range [0, 5000].
    -5000 <= Node.val <= 5000

Follow up: A linked list can be reversed either iteratively or recursively. Could you implement both?

// init $c = $head
       $c
              $next = $c->next
null  (1) ->   (2)               -> (3) -> (4) -> (5) -> null
$p

null <-  $c->next = $p
$p = $c
$c = $next
 */

class Solution206
{
    public function reverseList(ListNode $head): ?ListNode
    {
        $prev = null;  // Pointer to the previous node
        $current = $head;  // Pointer to the current node

        // Continue until the current node is null
        while ($current !== null) {
            $next = $current->next;  // Pointer to the next node
            $current->next = $prev;  // Reverse the link
            $prev = $current;  // Move the previous pointer to the current node
            $current = $next;  // Move the current pointer to the next node
        }

        return $prev;  // Return the new head of the reversed list
    }
}

$s = new Solution206;
$firstData = new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4, new ListNode(5)))));
$res = $s->reverseList($firstData);
xdebug_var_dump($res);

exit(0);
