<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection PhpUnused */

class NumArray
{
    protected array $prefix;

    /**
     * @param Integer[] $nums
     */
    public function pivotIndex(array $nums): int
    {
        $left = 0;
        $right = array_sum($nums);

        for ($i = 0; $i < count($nums); $i++) {

            $current = $nums[$i];

            if ($left === $right -= $current) {
                return $i;
            }

            $left += $current;
        }

        return -1;
    }
}
