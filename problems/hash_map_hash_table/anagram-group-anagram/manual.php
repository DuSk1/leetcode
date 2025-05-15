<?php

// Группировка анаграмм https://algocode.io/courses/algo-big-tech/problem/group-anagrams
/*
 *
 *
 * !! ВСЕГДА ПРОВОДИТЬ ОТЛАДКУ В БЛОКНОТЕ ПОСЛЕ ТОГО КАК НАПИСАЛ КОД !!!!!!!!!!!!!
 *
 *
Time: O(n * m), где n - число строк, а m - длина самой длинной строки
Mem: O(n * m), где n - число строк, а m - длина самой длинной строки. Дополнительно алоцируем столько же памяти,
Сколько к нам и пришло.
*/
final class SolutionGroupAnagrams
{
    public function groupAnagrams(array $strs): array
    {
        $groupedAnagrams = [];
        $aASCIICode = ord('a');

        foreach ($strs as $anagram) {

            $charsCount = array_fill(0, 26, 0);

            foreach (str_split($anagram) as $char) {
                $charsCount[ord($char) - $aASCIICode]++;
            }

            $key = implode(',', $charsCount);

            $groupedAnagrams[$key][] = $anagram;
        }

        return array_values($groupedAnagrams);
    }
}

//$strs = ["eat", "tea", "tan", "ate", "nat", "bat"]; // ["eat","tea","ate"],["tan","nat"],["bat"]

$strs = ["ab","bat","ba","tab","ear","apt"]; // ["ab","ba","bat","tab"],["ear"],["apt"]
$solution = new SolutionGroupAnagrams();
$result = $solution->groupAnagrams($strs);
xdebug_var_dump($result);
