<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

final class Solution
{
    public function groupAnagram(array $strs): array
    {
        $result = [];

        foreach ($strs as $str) {
            $key = $this->getKey($str);
            $result[$key][] = $str;
        }

        return array_values($result);
    }

    private function getKey(string $str): string
    {
        $arr = array_fill(0, 26, null);
        $arStr = str_split($str);

        foreach ($arStr as $char) {
            $index = ord($char) - 97;

            $arr[$index] = $char;
        }

        return implode('', $arr);
    }
}

// Ввод: strs=["ab","bat","ba","tab","ear","apt"]
// Вывод:[["ab",ba"],["bat","tab"],["apt"],["ear"]]
$strs = ["ab", "bat", "ba", "tab", "ear", "apt"];
$solution = new Solution();
$result = $solution->groupAnagram($strs);
print_r($result); // Output: [["ab","ba"],["bat","tab"],["apt"],["ear"]]
