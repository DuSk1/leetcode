<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection PhpUnused */

class Solution
{

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    public function combinationSum2(array $candidates, int $target): array
    {
        $result = [];

        sort($candidates);

        $this->backtrack($candidates, $target, [], 0, $result);

        return $result;
    }

    public function backtrack($candidates, $target, $current, $start, &$result): void
    {
        if ($target == 0) {
            $result[] = $current;
            return;
        }

        for ($i = $start; $i < count($candidates); $i++) {

            if ($i > $start && $candidates[$i] == $candidates[$i - 1]) {
                continue;
            }

            if ($candidates[$i] > $target) {
                break;
            }

            $current[] = $candidates[$i];

            $this->backtrack($candidates, $target - $candidates[$i], $current, $i + 1, $result);

            array_pop($current);
        }
    }
}

// Example usage

$solution = new Solution();

$candidates = [10, 1, 2, 7, 6, 1, 5];
$target = 8;

$result = $solution->combinationSum2($candidates, $target);
print_r($result); // Output: [[1,1,6],[1,2,5],[1,7],[2,6]]
