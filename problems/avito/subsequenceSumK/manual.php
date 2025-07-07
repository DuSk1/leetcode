<?php
/** @noinspection PhpMultipleClassDeclarationsInspection */
/*
time: O(n)
mem: O(n)
*/
// Ввод: nums = [1, 2, 3], k = 5 Вывод: 2
//$nums = [1, 2, 3];
//$k = 5;

//Ввод: nums = [1, 2, 3], k = 7 Вывод: -1
//$nums = [1, 2, 3];
//$k = 7;

// nums = [1, 2, 5, 7], k = 7 Вывод: 2
//$nums = [1, 2, 5, 7];
//$k = 7;


function subsequenceSumK(array $nums, int $k): int
{
    // Храним встретившиеся префиксные суммы (левая граница)
    $hashmap = [1];
    // Текущая префиксная сумма (правая граница)
    $currentSum = 0;

    foreach ($nums as $idx => $num) {

        $currentSum += $num;

        $difference = $currentSum - $k;

        if (isset($hashmap[$difference])) {
            return $idx;
        }

        $hashmap[$currentSum] = ($hashmap[$currentSum] ?? 0) + 1;
    }

    return -1;
}

$nums = [1, 2, 5, 7];
$k = 7;
$result = subsequenceSumK($nums, $k);
echo $result . PHP_EOL;