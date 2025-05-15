<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection PhpUnused */

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    public function findLengthOfLCIS(array $nums): int
    {
        $max = 1;
        $act = 1;

        foreach ($nums as $k => $item) {
            if ($k === 0) {
                continue;
            }

            if ($item > $nums[$k - 1]) {
                $act++;
                $max = max($max, $act);
                continue;
            }

            $act = 1;
        }

        return $max;
    }
}