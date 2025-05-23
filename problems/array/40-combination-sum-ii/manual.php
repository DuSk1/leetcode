<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */
/** @noinspection PhpUnused */

class Solution
{
    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    public function combinationSum2(array $candidates, int $target): array
    {
        sort($candidates);
        $res = $path = [];

        self::dfsCom($candidates, 0, $target, $path, $res);

        return $res;
    }

    private function dfsCom($candidates, $cur, $target, $path, &$res): void
    {
        if ($target == 0) {
            $res[] = $path;
            return;
        }

        if ($target >= 0) {
            for ($i = $cur; $i < count($candidates); $i++) {

                if ($i > $cur && $candidates[$i] == $candidates[$i - 1]) {
                    continue;
                }

                $path[] = $candidates[$i];

                self::dfsCom($candidates, $i + 1, $target - $candidates[$i], $path, $res);

                array_pop($path);
            }
        }
    }

    public function test(): void
    {
        $candidates = [10, 1, 2, 7, 6, 1, 5];
        $target = 8;
        $result = $this->combinationSum2($candidates, $target);
        print_r($result);
    }

    public function test2(): void
    {
        $candidates = [2, 5, 2, 1, 2];
        $target = 5;
        $result = $this->combinationSum2($candidates, $target);
        print_r($result);
    }
}
