<?php
/** @noinspection PhpMultipleClassDeclarationsInspection
 * https://algocode.io/courses/algo-big-tech/problem/validate-anagram
 * time: O(n), n - max(strlen(t),strlen(s))
 * mem: O(1)
 */

final class Solution
{
    public function isAnagram(string $s, string $t): bool
    {
        $arS = str_split($s);
        $arT = str_split($t);

        $map = array_fill(0, 26, 0);

        foreach ($arS as $char) {
            $index = ord($char) - 97;

            $map[$index] += 1;
        }

        foreach ($arT as $char) {
            $index = ord($char) - 97;

            $map[$index] -= 1;
        }

        return array_sum($map) === 0;
    }
}

/*
 * Ввод: s = "hello", t = "lolhe"
    Вывод: true
 */
$s = "hello";
$t = "lolhe";

$solution = new Solution();
$result = $solution->isAnagram($s, $t);
var_dump($result);

/*
 * Ввод: s = "abc", t = "abcc"
 * Вывод: false
 */

$s = "abc";
$t = "abcc";
$solution = new Solution();
$result = $solution->isAnagram($s, $t);
var_dump($result);
