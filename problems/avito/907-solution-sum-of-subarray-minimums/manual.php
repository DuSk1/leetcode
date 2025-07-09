<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection PhpUnused */

class Solution
{

    /**
     * @param int[] $arr
     * @return int
     */
    public function sumSubarrayMins(array $arr): int
    {
        $res = 0;
        $mod = 10 ** 9 + 7;
        $stack = [[-1, -INF]];

        for ($i = 0; $i < count($arr); $i++) {

            while (count($stack) > 1 && $arr[$i] < end($stack)[1]) {
                [$index, $val] = array_pop($stack);
                $res += $val * ($i - $index) * ($index - end($stack)[0]);
            }

            $stack[] = [$i, $arr[$i]];

        }

        $limit = count($arr);

        while (count($stack) > 1) {
            [$index, $val] = array_pop($stack);
            $res += $val * ($limit - $index) * ($index - end($stack)[0]);
        }

        return $res % $mod;
    }
}

$arr = [3, 1, 2, 4];

$solution = new Solution();
$result = $solution->sumSubarrayMins($arr);

var_dump($result);