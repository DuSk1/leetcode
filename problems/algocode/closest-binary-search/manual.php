<?php /** @noinspection PhpMultipleClassDeclarationsInspection */


function findClosest(array $nums, int $target): int {
    sort($nums);
    $left = 0;
    $right = count($nums) - 1;
    $closest = $nums[0];

    while ($left <= $right) {
        $mid = intdiv($left + $right, 2);

        if (abs($nums[$mid] - $target) < abs($closest - $target)) {
            $closest = $nums[$mid];
        }

        if ($nums[$mid] < $target) {
            $left = $mid + 1;
        } elseif ($nums[$mid] > $target) {
            $right = $mid - 1;
        } else {
            return $nums[$mid];
        }
    }

    return $closest;
}

$nums = [9,3,6,100];
$target = 7;

echo findClosest($nums, $target) . PHP_EOL;
