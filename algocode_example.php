<?php /** @noinspection ALL */


/**
 * https://algocode.io/courses/algo-big-tech/problem/letter-combinations
 *
 * @param int $index
 * @param string $s
 * @param array $currentCombination
 * @param array $allCombinations
 * @return void
 */
function bruteforce(int $index, string $s, array &$currentCombination, array &$allCombinations): void
{
    // Если дошли до конца строки, добавляем текущую комбинацию в результат
    if ($index === strlen($s)) {
        $allCombinations[] = implode("", $currentCombination);
        return;
    }

    $phoneMap = [
        "2" => "abc", "3" => "def", "4" => "ghi", "5" => "jkl",
        "6" => "mno", "7" => "pqrs", "8" => "tuv", "9" => "wxyz"
    ];

    // Получаем текущую цифру
    $digit = $s[$index];

    // Перебираем все буквы, соответствующие текущей цифре
    foreach (str_split($phoneMap[$digit]) as $letter) {
        // Добавляем букву в текущую комбинацию
        $currentCombination[] = $letter;
        // Рекурсивно перебираем оставшиеся цифры
        bruteforce($index + 1, $s, $currentCombination, $allCombinations);
        // Убираем букву, чтобы попробовать следующую
        array_pop($currentCombination);
    }
}

function generateCombinations(string $s): array
{
    // Возвращает все комбинации букв для заданных цифр (рекурсивный способ).
    if (strlen($s) === 0) {
        return [];
    }

    // Результирующий список всех комбинаций
    $result = [];
    $currentCombination = [];
    // Запускаем рекурсивный перебор
    bruteforce(0, $s, $currentCombination, $result);
    return $result;
}


// Пример использования
$s = "24";
$result = generateCombinations($s);
xdebug_var_dump($result); // Вывод: ["ad","ae","af","bd","be","bf","cd","ce","cf"]


exit(0);


$nums = [1, 4, 5, -3, 7, 0, 2, 4];

/**
 * Время: O(n), где n — размер входного массива.
 * Память: O(1), так как мы используем только несколько переменных для хранения промежуточных значений.
 *
 * @param array $nums
 * @return array
 */
function prefixArray(array $nums): array
{
    $prefixArray = [0];
    $sum = 0;

    foreach ($nums as $num) {
        $sum += $num;
        $prefixArray[] = $sum;
    }

    return $prefixArray;
}

$result = prefixArray($nums);
print_r($result); // $prefix = [0, 1, 5, 10, 7, 14, 14, 16, 20]


exit(0);

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