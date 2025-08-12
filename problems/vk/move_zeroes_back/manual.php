<?php /** @noinspection ALL */

/**
 *Дан массив nums. Нужно переместить все нули (0) в конец массива, при этом порядок остальных элементов должен сохраниться.
 *
 * Необходимо изменять исходный массив напрямую, без создания нового массива для хранения результата.
 *
 * Ввод: nums = [2,1,0,0,4,0,9]
 *
 * Вывод: [2,1,4,9,0,0,0]
 *
 */
final class Solution
{
    public function switchZeros(array &$nums): void
    {
        $p1 = count($nums) - 1;
        $p2 = count($nums) - 1;

        while ($p1 >= 0) {

            if ($nums[$p1] != 0) {
                $p1--;
                continue;
            }

            [$nums[$p1], $nums[$p2]] = [$nums[$p2], $nums[$p1]];

            $p1--;
            $p2--;
        }
    }
}

$nums = [2, 1, 0, 0, 4, 0, 9];
$solution = new Solution();
$solution->switchZeros($nums);

echo implode(',', $nums) . PHP_EOL; // Output: 2,1,4,9,0,0,0

