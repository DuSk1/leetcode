<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection PhpUnused */

class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    public function findKthLargest(array $nums, int $k): int
    {
        $heap = new SplMinHeap();

        // add first k elements to heap
        for ($i = 0; $i < $k; $i++) {
            $heap->insert($nums[$i]);
        }

        //  We process the remaining elements
        for ($i = $k; $i < count($nums); $i++) {
            if ($nums[$i] > $heap->top()) {
                // delete minimal element from heap
                $heap->extract();
                // add current element to heap
                $heap->insert($nums[$i]);
            }
        }

        // Return the root of the heap (the k-th largest element)
        return $heap->top();
    }

}

$solution = new Solution();

$nums = [3,2,3,1,2,4,5,5,6];
$k = 4;

$result = $solution->findKthLargest($nums, $k);
echo "The {$k}-th largest element is: {$result}\n"; // Output: 4
