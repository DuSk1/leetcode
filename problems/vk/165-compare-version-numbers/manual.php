<?php

class Solution
{
    public function compareVersion(string $version1, string $version2): int
    {
        $v1 = explode('.', $version1);
        $v2 = explode('.', $version2);
        $len = max(count($v1), count($v2));

        for ($i = 0; $i < $len; $i++) {
            $num1 = $i < count($v1) ? intval($v1[$i]) : 0;
            $num2 = $i < count($v2) ? intval($v2[$i]) : 0;

            if ($num1 < $num2) return -1;
            if ($num1 > $num2) return 1;
        }

        return 0;
    }
}

// Тестовый код
$solution = new Solution();

/**
 * Input: version1 = "1.2", version2 = "1.10"
 * Output: -1
 * Explanation: 1.2 < 1.10, so the output is -1
 * Input: version1 = "1.0.1", version2 = "1"
 * Output: 1
 * Explanation: 1.0.1 > 1, so the output is 1
 * Input: version1 = "1.0", version2 = "1.0.0.0"
 * Output: 0
 */
$testCases = [
    ["1.2", "1.10", -1],
    ["1.0.1", "1", 1],
    ["1.0", "1.0.0.0", 0],
];

foreach ($testCases as $index => $testCase) {
    $version1 = $testCase[0];
    $version2 = $testCase[1];
    $expected = $testCase[2];

    $result = $solution->compareVersion($version1, $version2);
    echo "Test case " . ($index + 1) . ": ";
    if ($result === $expected) {
        echo "Passed\n";
    } else {
        echo "Failed (Expected: $expected, Got: $result)\n";
    }

}