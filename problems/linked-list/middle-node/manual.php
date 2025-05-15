<?php

class ListNode
{
    public function __construct(
        public ?int $val = null,
        public ?ListNode $next = null
    ) {}
}

class Solution876
{
    public function middleNode(ListNode $head): ?ListNode
    {
        $fast = $head;
        $slow = $head;

        while ($fast !== null && $fast->next !== null) {

            $slow = $slow->next;

            $fast = $fast->next->next;

        }

        return $slow;
    }
}
