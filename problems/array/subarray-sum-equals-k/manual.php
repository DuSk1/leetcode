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
    public function subarraySum(array $nums, int $k): int
    {
        $tempSum = 0;
        $ret = 0;
        $sumCount = [];
        $sumCount[0] = 1;

        foreach ($nums as $i) {

            $tempSum += $i;

            if (isset($sumCount[$tempSum - $k])) {
                $ret += $sumCount[$tempSum - $k];
            }

            if (isset($sumCount[$tempSum])) {
                $sumCount[$tempSum] = $sumCount[$tempSum] + 1;
            } else {
                $sumCount[$tempSum] = 1;
            }
        }

        return $ret;
    }
}
