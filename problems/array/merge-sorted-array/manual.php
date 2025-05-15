<?php


class Solution876
{
    public function merge(array &$nums1, int $m, array $nums2, int $n): void
    {
        $i = $m - 1;
        $j = $n - 1;
        $k = $m + $n - 1;

        while ($i >= 0 && $j >= 0) {
            if ($nums1[$i] > $nums2[$j]) {
                $nums1[$k] = $nums1[$i];
                $i--;
            } else {
                $nums1[$k] = $nums2[$j];
                $j--;
            }
            $k--;
        }

        while ($j >= 0) {
            $nums1[$k] = $nums2[$j];
            $j--;
            $k--;
        }
    }
}

$nums1 = [1, 2, 3, 0, 0, 0];
$m = 3;
$nums2 = [2, 5, 6];
$n = 3;

$solution = new Solution876();
$solution->merge($nums1, $m, $nums2, $n);
print_r($nums1);

exit(0);
