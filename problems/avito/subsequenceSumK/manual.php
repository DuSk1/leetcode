<?php
/** @noinspection PhpMultipleClassDeclarationsInspection */
/*
 Minimum Subsequence Length with Sum Equal to K
Дан массив целых чисел nums и целевое число k. Найти минимальную длину подпоследовательности (не обязательно подмассива, порядок не важен), сумма которой равна k.
Подпоследовательность — это любой набор элементов, выбранных из массива (без изменения порядка не требуется, если не указано).
Если такой подпоследовательности нет — вернуть -1.

⚠️ Важно: в примерах видно, что порядок не важен (в 3-м примере берётся просто 7), значит, мы можем выбирать любые элементы — это подмножество, а не подмассив.

time: O(n)
mem: O(n)

Ввод: nums = [1, 2, 3], k = 5 Вывод: 2
$nums = [1, 2, 3];
$k = 5;

Ввод: nums = [1, 2, 3], k = 7 Вывод: -1
$nums = [1, 2, 3];
$k = 7;

nums = [1, 2, 5, 7], k = 7 Вывод: 2
$nums = [1, 2, 5, 7];
$k = 7;


*/

function subsequenceSumK(array $nums, int $k): int
{
    $hashMap = [1];

    $currentSum = 0;

    foreach ($nums as $idx => $num) {

        $currentSum += $num;

        $difference = $currentSum - $k;

        if (isset($hashMap[$difference])) {
            return $idx;
        }

        $hashMap[$currentSum] = ($hashMap[$currentSum] ?? 0) + 1;
    }

    return -1;
}

$nums = [1, 2, 5, 7];
$k = 7;
$result = subsequenceSumK($nums, $k);
echo $result . PHP_EOL;