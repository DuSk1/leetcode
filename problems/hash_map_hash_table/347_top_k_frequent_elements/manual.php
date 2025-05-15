<?php

/**
 * Time: O(n)
 * Mem: O(n)
 */
class Solution347
{
    public function topKFrequent(array $nums, int $k): array
    {
        $count = [];
        // ключ - число, значение - сколько раз встретилось
        foreach ($nums as $num) {
            $count[$num] += 1;
        }

        // индекс массива - сколько раз встретилось число
        // значение - список чисел, которые встретились столько раз
        $frequencyList = array_fill(0, count($nums) + 1, []);

        foreach ($count as $num => $frequency) {
            $frequencyList[$frequency][] = $num;
        }

        // допустим у нас получился такой frequencyList:
        // 0: []
        // 1: [2, 5]
        // 2: []
        // 3: [4]
        // 4: []
        // 5: []
        // при k = 2 нам нужно вернуть 4 и 2 или 4 и 5 - без разницы
        // для этого проходимся с конца и ищем первые k элементов
        $result = [];

        for ($i = count($frequencyList) - 1; $i >= 0; $i--) {

            foreach ($frequencyList[$i] as $num) {

                if ($k <= 0) {
                    return $result;
                }

                $result[] = $num;

                $k--;
            }

        }

        return $result;
    }
}

$tests = [
    [[1, 1, 1, 2, 2, 3], 2, [1, 2]],
    [[1], 1, [1]],
    [[1, 2], 2, [1, 2]],
    [[1, 2, 3, 4, 5], 3, [1, 2, 3]],
    [[1, 2, 3, 4, 5], 5, [1, 2, 3, 4, 5]],
    [[1, 2, 3, 4, 5], 1, [1]],
];

$solution = new Solution();

foreach ($tests as $test) {
    $nums = $test[0];
    $k = $test[1];
    $result = $test[2];
    $output = $solution->topKFrequent($nums, $k);
    if ($output === $result) {
        echo 'Test passed' . PHP_EOL;
    } else {
        echo 'Test failed' . PHP_EOL;
        echo 'Expected: ' . implode(',', $result) . PHP_EOL;
        echo 'Got: ' . implode(',', $output) . PHP_EOL;
    }
}
