<?php
/*

3 2

0 5
-3 2
7 10

1 6

$point = [
    5, - значение точки (координата)
    0, - признак, что это точка
    1 - индекс точки (порядок её поступления на вход)
];

$interval = [
    3, - координата начало \ конец
    1, - признак начала (1) \ конца (-1)
    null
];

sort($array); // quik sort
time: O(n * logn), в худшем случае O(n^2)
mem: O(n)

*/

$intervals = [
    [0, 5],
    [-3, 2],
    [7, 10]
];

$inPoints = [1, 6];

$n = count($intervals); // кол-во отрезков
$m = count($inPoints); // кол-во точек

$points = [];

foreach ($intervals as $point) {
    $a = $point[0];
    $b = $point[1];

    if ($a > $b) {
        [$a, $b] = [$b, $a];
    }

    $points[] = [$a, 1, null];
    $points[] = [$b, -1, null];
}

for ($i = 0; $i < $m; $i++) {

    $points[] = [$inPoints[$i], 0, $i];

}

sort($points);

$result = array_fill(0, $m, null);

/*
[
    0 => null,
    1 =>  null
]
*/

$currentPointsCount = 0; // кол-во точек в интервалах

foreach ($points as $point) {

    if ($point[1] === 0) { // если точка

        $result[$point[2]] = $currentPointsCount;

        continue;
    }

    $currentPointsCount += $point[1];

}


echo implode(' ', $result);