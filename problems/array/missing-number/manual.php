<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection PhpUnused */

class Solution {

    /**
     * @param Integer[] $nums
     * @return float|int
     */
    public function missingNumber(array $nums): float|int
    {
        // sum from 1 (or 0) through n is n(n+1)/2

        // Step 1. Get size of input (n)
        $n = count($nums);

        // Step 2. Count sum from 0 to n
        $targetSum = $n * ($n+1) / 2;

        // Step 3. Count actual sum in nums
        $actualSum = array_sum($nums);

        // step 4 - the diff is the answer
        return $targetSum - $actualSum;
    }
}
