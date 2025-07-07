<?php /** @noinspection PhpMultipleClassDeclarationsInspection */


/**
 *
 * n - count(nums1)
 * m - count(nums2)
 *
 * time: O(n * log(n) + m * log(m))
 * mem: O(1)
 */
final class Solution
{
    public function gaps(array $nums1, array $nums2): int
    {
        sort($nums1);
        sort($nums2);
        $total = 0;
        $len1 = count($nums1);
        $len2 = count($nums2);
        $p1 = $p2 = 0;

        while ($p2 < $len2) {

            if (
                $p1 < $len1 - 1
                && abs($nums1[$p1] - $nums2[$p2]) > abs($nums1[$p1 + 1] - $nums2[$p2])
            ) {

                $p1++;

            } else {
                $total += abs($nums1[$p1] - $nums2[$p2]);
                $p2++;
            }
        }

        return $total;
    }
}

//Ввод: nums1 = [9,3,6,100], nums2 = [3,8,7] Вывод: 2

$nums1 = [9, 3, 6, 100];
$nums2 = [3, 8, 7];
$solution = new Solution();
$result = $solution->gaps($nums1, $nums2);

echo $result . PHP_EOL; // Output: 2
