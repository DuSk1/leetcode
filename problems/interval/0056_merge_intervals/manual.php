<?php
/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection PhpUnused */

class Solution
{
    // time: O(N*logN)
    // mem: O(n)
    public function merge($intervals): array
    {
        // time: O(n*log(n))
        sort($intervals); // в худшем случае O(n^2)

        $result = [];
        $result[] = $intervals[0];

        /**
         * $i:
         *  1
         *  2
         *  3
         */
        for ($i = 1; $i < count($intervals); $i++) {

            $interval = $intervals[$i];
            // если текущий интервал и последний в ответе пересекаются,
            // значит объединяем их, иначе добавляем интервал к ответу и это значит,
            // что ни один интервал, который имеет точку начала меньше текущего интервала
            // не будет пересечен ни с одним лежащим правее и не с текущим
            if ($this->isOverlapping(end($result), $interval)) {

                $result[count($result) - 1] = $this->mergeTwoIntervals(end($result), $interval);

            } else {

                $result[] = $interval;

            }

        }

        return $result;
    }

    private function isOverlapping(array $a, array $b): bool
    {
        /*
         Проверяем, пересекаются ли два интервала.
         Интервалы пересекаются, если максимальное значение начала одного из интервалов
         меньше или равно минимальному значению конца другого интервала.
         Например, для интервалов [1, 5] и [4, 8]:
         max(1, 4) <= min(5, 8) -> 4 <= 5 -> true (интервалы пересекаются)
        */
        return max($a[0], $b[0]) <= min($a[1], $b[1]);
    }


    private function mergeTwoIntervals(array $a, array $b): array
    {
        // интервалы обязательно должны пересекаться
        // по условию start <= end
        // $a[0] <= $b[0]
        return [$a[0], max($a[1], $b[1])];
    }
}

$solution = new Solution();

$intervals = [[15, 18], [2, 6], [1, 3], [8, 10]];
$expected = [[1, 6], [8, 10], [15, 18]];

$solution->merge($intervals);

//$intervals = [[1, 4], [4, 5]];
//$expected = [[1, 5]];

//$intervals = [[1, 4], [0, 4]];
//$expected = [[0, 4]];

//$intervals = [[1, 4], [2, 3]];
//$expected = [[1, 4]];
