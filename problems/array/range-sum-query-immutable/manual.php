<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection PhpUnused */

class NumArray
{
    protected array $prefix;

    /**
     * time: O(n)
     * mem: O(n)
     * @param Integer[] $nums
     */
    public function __construct(array $nums)
    {
        $prefix = [0];
        $count = count($nums);

        for ($i = 0; $i < $count; $i++) {
            $prefix[] = $prefix[$i] + $nums[$i];
        }

        $this->prefix = $prefix;
    }

    /**
     * time: O(1)
     * mem: O(1)
     *
     * @param Integer $left
     * @param Integer $right
     * @return Integer
     */
    public function sumRange(int $left, int $right): int
    {
        return $this->prefix[$right + 1] - $this->prefix[$left];
    }
}

/**
 * Your NumArray object will be instantiated and called as such:
 * $obj = new NumArray($nums);
 * $ret_1 = $obj->sumRange($left, $right);
 */