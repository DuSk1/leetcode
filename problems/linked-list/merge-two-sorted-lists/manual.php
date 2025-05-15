<?php

class ListNode
{
    public function __construct(
        public ?int $val = null,
        public ?ListNode $next = null
    ) {}
}

class Solution21
{
     /**
     * @param ListNode $list1
     * @param ListNode $list2
     * @return ListNode
     */
    public function mergeTwoLists($list1, $list2): ListNode
    {
        $dummy = new ListNode();
        $current = $dummy;

        while ($list1 !== null && $list2 !== null) {
            if ($list1->val < $list2->val) {
                $current->next = $list1;
                $list1 = $list1->next;
            } else {
                $current->next = $list2;
                $list2 = $list2->next;
            }
            $current = $current->next;
        }

        if ($list1 !== null) {
            $current->next = $list1;
        } else {
            $current->next = $list2;
        }

        return $dummy->next;
    }
}
