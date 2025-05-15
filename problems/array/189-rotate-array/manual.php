<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection PhpUnused */

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $k
     */
    public function rotate(array &$nums, int $k): void
    {
        $n = count($nums);

        $t = $n - ($k % $n);

        $this->reverse($nums, 0, $t - 1);
        $this->reverse($nums, $t, $n - 1);
        $this->reverse($nums, 0, $n - 1);
    }

    private function reverse(&$nums, $l, $r): void
    {
        while ($l <= $r) {

            [$nums[$l], $nums[$r]] = [$nums[$r], $nums[$l]];

            $l++;
            $r--;
        }
    }
}
