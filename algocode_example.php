<?php /** @noinspection ALL */

final class Solution2
{
    public function prefixArray(array $nums1, array $nums2): array
    {
        $commonCount = 0;

        $countMap = array_fill(0, max(count($nums1), count($nums2)), 0);

        $prefixArray = [];

        for ($i = 0; $i < count($nums1); $i++) {

            $commonCountNum1 = &$countMap[$nums1[$i]];
            $commonCountNum2 = &$countMap[$nums2[$i]];

            $commonCountNum1++;

            if ($commonCountNum1 == 2) {
                $commonCount++;
            }

            $commonCountNum2++;

            if ($commonCountNum2 == 2) {
                $commonCount++;
            }

            $prefixArray[$i] = $commonCount;

        }

        return $prefixArray;
    }
}


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