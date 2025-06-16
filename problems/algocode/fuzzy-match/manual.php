<?php
/**
 * Fuzzy Match
 * https://algocode.io/courses/algo-big-tech/problem/fuzzy-matching
 */

/** @noinspection PhpMultipleClassDeclarationsInspection */
final class Solution
{
    public function fuzzyMatch(string $s, string $t): bool
    {
        $i = $j = 0;

        while ($i < strlen($s) && $j < strlen($t)) {
            if($s[$i] == $t[$j]) {
                $i++;
            }

            $j++;
        }

        return $i == strlen($s);
    }
}


$s = 'abc';
$t = 'a1b2c3';
//$s = 'abc';
//$t = 'acb';
$solution = new Solution();
$result = $solution->fuzzyMatch($s, $t);
var_dump($result);
exit(0);
