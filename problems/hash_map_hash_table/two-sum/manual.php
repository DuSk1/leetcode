<?php

/**
 * Time: O(n)
 * Mem: O(n)
 */
class Solution1
{
    public function twoSum(array $nums, int $target): array
    {
        $map = [];

        foreach ($nums as $i => $num) {
            $diff = $target - $num;

            if (isset($map[$diff])) {
                return [$map[$diff], $i];
            }

            $map[$num] = $i;
        }

        return [];
    }
}

$s = new Solution1;
//$nums = [2, 7, 11, 15];
// $target = 9;
$nums = [3, 2, 4];
$target = 6;

$res = $s->twoSum($nums, $target);
xdebug_var_dump($res);
