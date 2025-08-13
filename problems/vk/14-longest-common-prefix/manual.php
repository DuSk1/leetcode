<?php
/**
 * https://leetcode.com/problems/longest-common-prefix/description/
 * https://algocode.io/courses/algo-big-tech/problem/longest-common-prefix
 *
 * Время: O(n), где n - количество символов во всех строках массива strs.
 * Память: O(1)
 */

function longestCommonPrefix(array $strs): string
{
    if (empty($strs)) {
        return '';
    }

    $minLen = strlen($strs[0]);

    foreach ($strs as $el) {
        $minLen = min($minLen, strlen($el));
    }

    for ($i = 0; $i < $minLen; $i++) {
        $ch = $strs[0][$i];
        foreach ($strs as $el) {
            if ($el[$i] !== $ch) {
                return substr($el, 0, $i);
            }
        }
    }

    return substr($strs[0], 0, $minLen);
}

// Example usage
$strings = ["flower", "flow", "flight"];
try {
    $result = longestCommonPrefix($strings);
    echo "Longest common prefix: " . $result . PHP_EOL; // Output: "fl"
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
// Example with no common prefix
$strings2 = ["dog", "racecar", "car"];
try {
    $result2 = longestCommonPrefix($strings2);
    echo "Longest common prefix: " . $result2 . PHP_EOL; // Output: ""
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
