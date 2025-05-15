<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

/**
 * Time: O(n)
 * Mem: O(n)
 */
class Solution
{
    public function isSymmetric(array $points): bool
    {
        $pointsSet = [];

        foreach ($points as $point) {
            $pointsSet[$point[0] . ',' . $point[1]] = true;
        }

        $arXs = array_column($points, 0);

        $maxX = max($arXs);
        $minX = min($arXs);

        foreach ($points as $point) {

            $x = $point[0];
            $y = $point[1];

            $symX = $maxX + $minX - $x;

            if (!isset($pointsSet[$symX . ',' . $y])) {

                return false;
            }

        }

        return true;
    }
}

$solution = new Solution();

xdebug_var_dump($solution->isSymmetric([[1, 1]])); // true
//xdebug_var_dump($solution->isSymmetric([[1, 1], [2, 2], [3, 1], [2, 0]])); // true
//
//xdebug_var_dump($solution->isSymmetric([[1, 1], [2, 2], [3, 1], [4, 0]])); // false
//xdebug_var_dump($solution->isSymmetric([[1, 1], [3, 1], [2, 2], [2, 0]])); // true
//xdebug_var_dump($solution->isSymmetric([[1, 1], [2, 2], [3, 1]]));
