<?php
/**
 * @param array<int> $array
 * @return int[]
 */
function quickSort(array $array): array
{
    if (count($array) <= 1) {
        return $array;
    }

    $pivot = $array[0];
    $left = $right = [];

    for ($i = 1; $i < count($array); $i++) {
        if ($array[$i] < $pivot) {
            $left[] = $array[$i];
        } else {
            $right[] = $array[$i];
        }
    }

    return array_merge(quickSort($left), [$pivot], quickSort($right));
}

// Пример использования
$array = [5, 3, 8, 4, 2];
echo "Исходный массив: ";
xdebug_var_dump($array);

$sortedArray = quickSort($array);
echo "Отсортированный массив: ";
xdebug_var_dump($sortedArray);
