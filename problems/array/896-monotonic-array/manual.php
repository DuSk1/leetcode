<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection PhpUnused */

class Solution
{
    public function isMonotonic(array $nums): bool
    {
        if (empty($nums)) {
            return false;
        }

        $increasing = true;
        $decreasing = true;

        for ($i = 1; $i < count($nums); $i++) {
            if ($nums[$i] > $nums[$i - 1]) {
                $increasing = false;
            }

            if ($nums[$i] < $nums[$i - 1]) {
                $decreasing = false;
            }
        }

        return $decreasing || $increasing;
    }
}
