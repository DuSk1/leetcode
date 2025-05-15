<?php

/** @noinspection PhpMultipleClassDeclarationsInspection */

/** @noinspection PhpUnused */

class NumMatrix
{
    public array $matrix;
    public array $prefixSum;

    public function __construct($matrix)
    {
        $this->matrix = $matrix;
        $this->prefixSum = [];

        $row = count($matrix) + 1;

        $column = count($matrix[0]) + 1;

        echo "row:" . $row . " col:" . $column;

        for ($i = 0; $i < $row; $i++) {

            $array = array_fill(0, $column, 0);

            $this->prefixSum[] = $array;
        }

        for ($i = 1; $i < $row; $i++) {
            $row_sum = 0;
            for ($j = 1; $j < $column; $j++) {
                $row_sum = $row_sum + $this->matrix[$i - 1][$j - 1];
                $this->prefixSum[$i][$j] = $this->prefixSum[$i - 1][$j] + $row_sum;
            }
        }

        echo json_encode($this->prefixSum);
    }

    /**
     * @param Integer $row1 * @param Integer $col1
     * @param $col1
     * @param Integer $row2 * @param Integer $col2
     * @param $col2
     * @return Integer
     */
    public function sumRegion(int $row1, $col1, int $row2, $col2): int
    {
        return $this->prefixSum[$row2 + 1][$col2 + 1] - $this->prefixSum[$row2 + 1][$col1] - $this->prefixSum[$row1][$col2 + 1] + $this->prefixSum[$row1][$col1];
    }
}
