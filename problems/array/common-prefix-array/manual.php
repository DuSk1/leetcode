<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection PhpUnused */

/**
 * https://s5-dusk1986.teamly.ru/space/8b9bd3fd-0dce-4a48-8863-67a196178db4/article/dea6a129-4073-4efc-8475-404b9d0e3e79
 *
 * Время: O(n), где n — размер входного массива. Линейная сложность, так как каждый
 * элемент проходит через цикл.
 * Память: O(n), где n — размер входного массива. Для подсчета мы используем хеш-таблицу,
 * а для результата — массив.
 *
 * @param array $nums1
 * @param array $nums2
 * @return array
 */
function findCommonPrefix(array $nums1, array $nums2): array
{
    $n = count($nums1);
    $prefixCommonArray = array_fill(0, $n, 0);

    // Используем хеш-таблицу для подсчета количества встреченных элементов
    $countMap = [];
    $commonCount = 0;

    for ($i = 0; $i < $n; $i++) {

        $currMapNum1 = &$countMap[$nums1[$i]];
        $currMapNum2 = &$countMap[$nums2[$i]];

        // Ключ здесь элемент массива, а значение - количество повторений
        $currMapNum1++;

        // Если элемент из nums1 уже встречался в nums2, увеличиваем общий счетчик
        if ($currMapNum1 == 2) {
            $commonCount++;
        }

        $currMapNum2++;

        // Если элемент из nums2 уже встречался в nums1, увеличиваем общий счетчик
        if ($currMapNum2 == 2) {
            $commonCount++;
        }

        // Сохраняем количество общих элементов на текущем индексе
        $prefixCommonArray[$i] = $commonCount;
    }

    return $prefixCommonArray;
}
// Пример использования
$nums1 = [1, 2, 3, 4, 5];
$nums2 = [3, 4, 5, 6, 7];
$result = findCommonPrefix($nums1, $nums2);
print_r($result); // [0, 0, 1, 2, 3]

exit(0);
