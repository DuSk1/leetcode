<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

/*
 *
 * Compare Strings with Backspaces
 * https://algocode.io/courses/algo-big-tech/problem/tricky-string-comparison
O(n + m)
O (1)
*/

final class Solution
{
    public function compare(string $s, string $t): bool
    {
        $iHashCount = $jHashCount = 0;

        $i = strlen($s) - 1;
        $j = strlen($t) - 1;

        while ($i >= 0 || $j >= 0) {

            if ($s[$i] == '#') {
                $iHashCount++;
                $i--;
                continue;
            }

            if ($iHashCount > 0) {
                $iHashCount--;
                $i--;
            }

            if ($t[$j] == '#') {
                $jHashCount++;
                $j--;
                continue;
            }

            if ($jHashCount > 0) {
                $jHashCount--;
                $j--;
                continue;
            }

            if ($s[$i] == $t[$j]) {
                $i--;
                $j--;
                continue;
            }

            return false;

        }

        return $i === $j;
    }

}

//$s = 'ac#b#ac';
//$t = 'abc##aa#b#c';

//$s = 'a#####b';
//$t = 'b';

$s = 'abcd';
$t = 'abcd#';

$sol = new Solution();
$res = $sol->compare($s, $t);
xdebug_var_dump($res);
