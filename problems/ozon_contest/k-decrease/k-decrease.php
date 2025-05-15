<?php

function decreasable(string $nums, int $k): bool
{
    $nums = explode(' ', $nums);
    
    $n = count($nums);

    while (array_sum($nums) > 0) {
        $flag = false;

        for ($i = 0; $i <= $n - $k; $i++) {

            $slice = array_slice($nums, $i, $k);

            if (min($slice) > 0) {

                $flag = true;

                for ($j = $i; $j < $i + $k; $j++) {
                    $nums[$j]--;
                }

                break;
            }
        }

        if (!$flag) {
            return false;
        }
    }

    return true;
}

$nums = '6 8 8 9 12 12 12 12 15 15 15 18 19 19 22 22 22 22 22 22 22 22 22 22 22 22 22 22 22 22 22 22 22 22 22 22 22 16 14 14 13 10 10 10 10 7 7 7 4 3 2 0 0';
$k = 37;

$result = decreasable($nums, $k);
echo $result ? "YES" : "NO"; // Вывод: YES