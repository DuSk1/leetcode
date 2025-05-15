<?php

class ListNode
{
    public function __construct(
        public ?int $val = null,
        public ?ListNode $next = null
    ) {}
}

class Solution23
{
    // Main function to merge k sorted linked lists
    public function mergeKLists($lists): ?ListNode
    {
        $dummy = new ListNode;  // Dummy node to simplify the merging process
        $current = $dummy;        // Pointer to the current node in the merged list

        // Continue merging until no more minimum nodes in the lists
        while (($minIndex = $this->findMin($lists)) !== null) {
            // Append the minimum node to the merged list
            $current->next = $lists[$minIndex];
            $current = $current->next;

            // Move the pointer in the selected list to the next node
            $lists[$minIndex] = $lists[$minIndex]->next;
        }

        return $dummy->next;  // Return the merged list starting from the next of the dummy node
    }

    // Helper function to find the index of the minimum value node in the list array
    public function findMin(&$lists): ?int
    {
        $minValue = null;  // Minimum value found so far
        $minIndex = null;  // Index of the minimum value node

        $size = count($lists);

        for ($i = 0; $i < $size; $i++) {
            // Skip null nodes
            if ($lists[$i] === null) {
                continue;
            }

            // If it's the first node or has a smaller value than the current minimum
            if ($minValue === null || $lists[$i]->val < $minValue) {
                $minValue = $lists[$i]->val;
                $minIndex = $i;
            }
        }

        return $minIndex;
    }

}

$firstData = new ListNode(1, new ListNode(4, new ListNode(5)));
$secondData = new ListNode(1, new ListNode(3, new ListNode(4)));
$thirdData = new ListNode(2, new ListNode(6));

$s = new Solution23;
$res = $s->mergeKLists([$firstData, $secondData, $thirdData]);


exit(0);
