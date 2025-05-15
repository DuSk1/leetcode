<?php /** @noinspection ALL */


final class Solution
{
    /*
    nums1 =
[2,1,3,4,5]
     |
nums2 =
[3,1,2,5,4]
     |
    */
    public function commonPrefixArray(array $num1, array $num2): array
    {
        $n = count($num1); // n = 5

        $prefixCommonArray = array_fill(0, $n, 0); // [0,0,0,0,0]

        $countMap = [];
        $countCommon = 0;

        for ($i = 0; $i < $n; $i++) {

            // i = 2

            $commonMapNum1 = &$countMap[$num1[$i]]; // 3 => 1
            $commonMapNum2 = &$countMap[$num2[$i]]; // 2 => 1

            $commonMapNum1++; // 3 => 2
            /*
                [
                   2 => 1,
                   3 => 2,
                   1 => 2
                ]
            */

            if ($commonMapNum1 === 2) {
                $countCommon++; // 2
            }

            $commonMapNum2++; // 2 => 2
            /*
                [
                    2 => 2,
                    3 => 2,
                    1 => 2
                ]
            */

            if ($commonMapNum2 === 2) {
                $countCommon++; // 3
            }

            $prefixCommonArray[$i] = $countCommon;
            /*
                [
                    0 => 0,
                    1 => 1
                    2 => 3
                ]
            */
        }

        return $prefixCommonArray;
    }
}

// Пример использования
$nums1 = [1, 2, 3, 4, 5];
$nums2 = [3, 4, 5, 6, 7];

$s = new Solution();
$result = $s->commonPrefixArray($nums1, $nums2);

print_r($result); // [0, 0, 1, 2, 3]

exit(0);


/**
 * Решение с использованием хеш-таблицы
 * https://algocode.io/courses/algo-big-tech/theory/09599E33C36149A0BB5D908E3A6AB4B9/7C2BBA454D994708A87B8D4C3F5E9B23
 *
 * Время: O(n), где n — размер входного массива.
 * Память: O(n), где n — размер входного массива.
 *
 * @param array $nums
 * @return bool
 */
function containsDuplicate(array $nums): bool
{
    // Создаем хеш-таблицу
    $used = [];

    foreach ($nums as $num) {
        // Проверяем наличие в хеш-таблице
        if (isset($used[$num])) {
            return true;
        }

        // Добавляем элемент в хеш-таблицу
        $used[$num] = true;
    }

    return false;
}

// Решение с использованием множества
// https://algocode.io/courses/algo-big-tech/theory/09599E33C36149A0BB5D908E3A6AB4B9/7C2BBA454D994708A87B8D4C3F5E9B23

/**
 * Время: O(n), где n — размер входного массива.
 * Память: O(n), где n — размер входного массива.
 *
 * @param array $nums
 * @return bool
 */
function containsDuplicatePlenty(array $nums): bool
{
    // Создаем множество
    $used = [];

    foreach ($nums as $num) {
        // Проверяем наличие в множестве
        if (in_array($num, $used, true)) {
            return true;
        }

        // Добавляем элемент в множество
        $used[] = $num;
    }

    return false;
}