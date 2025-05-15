<?php

// https://leetcode.com/problems/add-two-numbers/
// 2. Add Two Numbers

class Solution2
{
    public function addTwoNumbers(ListNode $l1, ListNode $l2): ?ListNode
    {
        $dummy = new ListNode;  // Dummy node to simplify the code
        $current = $dummy;        // Pointer to the current node in the result list
        $carry = 0;              // Carry value

        // Continue until no more nodes in both lists and no carry value
        while ($l1 !== null || $l2 !== null || $carry > 0) {
            $sum = $carry;  // Initialize the sum with the carry value

            // Add the value of the current node in the first list to the sum
            if ($l1 !== null) {
                $sum += $l1->val;
                $l1 = $l1->next;
            }

            // Add the value of the current node in the second list to the sum
            if ($l2 !== null) {
                $sum += $l2->val;
                $l2 = $l2->next;
            }

            // Update the carry value
            $carry = intdiv($sum, 10);

            // Create a new node with the digit value of the sum
            $current->next = new ListNode($sum % 10);
            $current = $current->next;
        }

        return $dummy->next;  // Return the result list starting from the next of the dummy node
    }
}

$s = new Solution2;
//$firstData = new ListNode(2, new ListNode(4, new ListNode(3)));
//$secondData = new ListNode(5, new ListNode(6, new ListNode(4)));
//$res = $s->addTwoNumbers($firstData, $secondData);

// Ввод: l1 = [0], l2 = [0]
// Вывод: [0]
//$firstData = new ListNode(0);
//$secondData = new ListNode(0);
//$res = $s->addTwoNumbers($firstData, $secondData);

// Ввод: l1 = [9,9,9,9,9,9,9], l2 = [9,9,9,9]
// Вывод: [8,9,9,9,0,0,0,1]

$l1 = new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9)))))));
$l2 = new ListNode(9, new ListNode(9, new ListNode(9, new ListNode(9))));
$res = $s->addTwoNumbers($l1, $l2);

exit(0);


final class SolutionAddTwoNumbers
{
    public function addTwoNumbers(array $arr1, array $arr2): array
    {
        $n = count($arr1) - 1; // n = 2
        $carry = $sum = 0;
        $res = [];

        for ($i = $n; $i >= 0; $i--) { // i = 0

            $sum = $arr1[$i] + $arr2[$i] + $carry; // sum =

            $carry = intdiv($sum, 10); // carry = 1

            array_unshift($res, $sum % 10); // [8, 9, 9, ]
        }

        if ($carry > 0) {
            array_unshift($res, $carry);  // [1 , 9, 9, 8]
        }

        return $res;
    }
}
// test
//$arr1 = [1, 2, 3];
//$arr2 = [4, 5, 6];
$arr1 = [9, 9, 9];
$arr2 = [1, 1, 1]; //
$s = new SolutionAddTwoNumbers();
$res = $s->addTwoNumbers($arr1, $arr2);
xdebug_var_dump($res); // [1, 1, 1, 0]



exit(0);

// https://leetcode.com/problems/merge-sorted-array/solutions/4132498/100-pass-rate-efficient-python-c-java-php-solution-in-place-merge-two-pointer/
// 876. Merge Sorted Array

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

        // If there are remaining elements in nums2, copy them to nums1
        while ($j >= 0) {
            $nums1[$k] = $nums2[$j];
            $j--;
            $k--;
        }
    }
}

//$nums1 = [1, 2, 3, 0, 0, 0];
$nums1 = [0];
$m = 0;
//$nums2 = [2, 5, 6];
$nums2 = [1];
$n = 1;

$solution = new Solution876();
$solution->merge($nums1, $m, $nums2, $n);
print_r($nums1);

exit(0);



$nums1 = [-2, 3, 3];
$nums2 = [0, 0, 3, 3];

function merge(array &$nums1, int $m, int $nums2, int $n)
{

    $n1Count = count($nums1);
    $n2Count = count($nums2);

    $result = [];

    $i = $j = 0;

    while ($i < $n1Count && $j < $n2Count) {
        if ($nums1[$i] < $nums2[$j]) {
            $result[] = $nums1[$i];
            $i++;
        } elseif ($nums1[$i] > $nums2[$j]) {
            $result[] = $nums2[$j];
            $j++;
        } else {
            $result[] = $nums1[$i];
            $result[] = $nums2[$j];
            $i++;
            $j++;
        }
    }

    while ($i < $n1Count) {
        $result[] = $nums1[$i];
        $i++;
    }

    while ($j < $n2Count) {
        $result[] = $nums2[$j];
        $j++;
    }

    return $result;
}

exit(0);

// Скользящее окно
function slidingWindow($s, $p): array
{
    $result = [];
    $pLength = strlen($p);
    $sLength = strlen($s);

    if ($sLength < $pLength) {
        return $result;
    }

    $pMap = [];
    $sMap = [];

    for ($i = 0; $i < $pLength; $i++) {
        $pMap[$p[$i]] = ($pMap[$p[$i]] ?? 0) + 1;
        $sMap[$s[$i]] = ($sMap[$s[$i]] ?? 0) + 1;
    }

    for ($i = 0; $i < $sLength - $pLength + 1; $i++) {
        if ($pMap == $sMap) {
            $result[] = $i;
        }

        if ($i + $pLength < $sLength) {
            $sMap[$s[$i]]--;
            if ($sMap[$s[$i]] === 0) {
                unset($sMap[$s[$i]]);
            }

            $sMap[$s[$i + $pLength]] = ($sMap[$s[$i + $pLength]] ?? 0) + 1;
        }
    }

    return $result;
}

$s = "cbaebabacd";
$p = "abc";

$res = slidingWindow($s, $p);
xdebug_var_dump($res);

exit(0);

// Обход дерева в глубину

final class Node
{

    public int $data;

    public ?Node $left;

    public ?Node $right;

}

final class Solution
{
    public function showValues($tree): void
    {
        $this->dfs($tree);
    }

    public function dfs($node): void
    {
        if ($node === null) {
            return;
        }

        $this->dfs($node->left);

        echo $node->data;

        $this->dfs($node->right);
    }
}

$tree = new Node();
$tree->data = 1;
$tree->left = new Node();
$tree->left->data = 2;
$tree->right = new Node();
$tree->right->data = 3;
$tree->left->left = new Node();
$tree->left->left->data = 4;
$tree->left->right = new Node();
$tree->left->right->data = 5;

$s = new Solution;
$s->showValues($tree);



exit(0);

// Обход дерева в ширину


final class Solution11
{
    public function showValues($tree): void
    {
        $p = $tree;

        $v = [$p];

        while ($v) {

            $vn = [];

            foreach($v as $x) {

                echo $x->data;

                if ($x->left) {
                    $vn[] = $x->left;
                }

                if($x->right) {
                    $vn[] = $x->right;
                }
            }

            $v = $vn;
        }
    }
}


//echo implode('', range('a', 'z')), PHP_EOL; // Лексикографический порядок

exit(0);

// https://leetcode.com/problems/find-all-anagrams-in-a-string/
// 438. Find All Anagrams in a String

class Solution438
{
    public function findAnagrams($s, $p): array
    {
        $hash = $this->fillHash($p);

        $start = 0;
        $end = strlen($p) - 1; //2

        $res = $windowHash = [];

        for ($i = 0; $i <= $end; $i++) {
            $windowHash[$s[$i]] = ($windowHash[$s[$i]] ?? 0) + 1;
        }

        while ($end < strlen($s)) {
            ksort($windowHash);

            if ($windowHash === $hash) {
                $res[] = $start;
            }

            if (isset($windowHash[$s[$start]])) {
                $windowHash[$s[$start]]--;

                if ($windowHash[$s[$start]] == 0) {
                    unset($windowHash[$s[$start]]);
                }
            }

            $start++;
            $end++;

            $windowHash[$s[$end]] = ($windowHash[$s[$end]] ?? 0) + 1;
        }

        return $res;
    }

    public function fillHash($p): array
    {
        $hash = [];

        $s = str_split($p);

        foreach ($s as $char) {
            $hash[$char] = ($hash[$char] ?? 0) + 1;
        }

        ksort($hash);

        return $hash;
    }
}

$s = new Solution438;

$s1 = "cbaebabacd";
$p1 = "abc";

$res = $s->findAnagrams($s1, $p1);

xdebug_var_dump($res);

exit(0);

function rbs(array $nums, int $target): int
{
    $l = 0;
    $r = count($nums);

    while ($l + 1 != $r) {

        $c = intdiv($l + $r, 2);

        if ($nums[$c] > $target) {
            $r = $c;
        } else {
            $l = $c;
        }
    }

    return $l;
}

$nums = [-1, 0, 3, 9, 9, 12, 12, 33];
$target = 6;

$res = rbs($nums, $target);
xdebug_var_dump($res);

exit(0);

function lbs(array $nums, int $target): int
{
    $l = -1;
    $r = count($nums) - 1;

    while ($l + 1 != $r) {

        $c = intdiv($l + $r, 2);

        if ($nums[$c] < $target) {
            $l = $c;
        } else {
            $r = $c;
        }

    }

    return $r;
}

$nums = [-1, 0, 3, 9, 12, 12, 33];
$target = 9;

$res = lbs($nums, $target);
xdebug_var_dump($res);

exit(0);

function maxSumPair(array $nums): int
{
    $m = $sm = 0;

    foreach ($nums as $number) {

        if ($number > $m) {
            $sm = $m;
            $m = $number;
        } elseif ($number > $sm) {
            $sm = $number;
        }
    }

    return $m + $sm;
}

$nums = [40, -20, 10, 5, 0, 2];
$res = maxSumPair($nums);
xdebug_var_dump($res);


exit(0);

$nums = [40, -20, 10, 5, 0, 2];

$minValue = 1000;

foreach ($nums as $number) {
    if (0 < $number && $number < $minValue) {
        $minValue = $number;
    }
}

echo $minValue, '<br>';


exit(0);



// https://leetcode.com/problems/valid-parentheses/description/
// 20. Valid Parentheses

class Solution20
{
    /**
     * @param String $s
     * @return Boolean
     */
    function isValid(string $s): bool
    {
        $sLength = strlen($s);

        if ($sLength % 2 !== 0) {
            return false;
        }

        $bracketSet = ['(' => ')', '[' => ']', '{' => '}'];

        $bracketStack = [];

        for ($i = 0; $i < $sLength; $i++) {

            if (array_key_exists($s[$i], $bracketSet)) {

                $bracketStack[] = $bracketSet[$s[$i]];

            } elseif (array_pop($bracketStack) !== $s[$i]) {
                return false;
            }
        }

        return count($bracketStack) === 0;
    }
}

$s = new Solution20;
$s1 = "(([]{}))";
$res = $s->isValid($s1);
xdebug_var_dump($res);


exit(0);




// https://leetcode.com/problems/valid-anagram/description/
// 242. Valid Anagram
class Solution242
{
    public function isAnagram($s, $t)
    {
        if ($s === $t) {
            return true;
        }

        if (strlen($s) !== strlen($t)) {
            return false;
        }

        $map = [];

        for ($i = 0; $i < strlen($s); $i++) {
            $map[$s[$i]] = ($map[$s[$i]] ?? 0) + 1;
            $map[$t[$i]] = ($map[$t[$i]] ?? 0) - 1;
        }

        foreach ($map as $value) {
            if ($value !== 0) {
                return false;
            }
        }

        return true;
    }
}

$s = new Solution242;
$s1 = "anagram";
$t1 = "nagaram";
$res = $s->isAnagram($s1, $t1);
xdebug_var_dump($res);

exit(0);
// https://leetcode.com/problems/valid-anagram/description/
// 242. Valid Anagram

$s = "rat";
$t = "car";

$s1 = getSortedChars($s);
$t1 = getSortedChars($t);

if ($s1 === $t1) {
    echo 'true';
} else {
    echo 'false';
}

function getSortedChars(string $s): string
{
    $chars = str_split($s);
    sort($chars);
    return implode('', $chars);
}

exit(0);


// https://leetcode.com/problems/group-anagrams/description/
// 49. Group Anagrams

$strs = ["eat", "tea", "tan", "ate", "nat", "bat"];

$map = [];

foreach ($strs as $str) {
    $chars = str_split($str);
    sort($chars);
    $key = implode('', $chars);

    if (!isset($map[$key])) {
        $map[$key] = [];
    }

    $map[$key][] = $str;
}

exit(0);

// https://leetcode.com/problems/4sum/description/
// 18. 4Sum

class Solution18
{
    public function fourSum($nums, $target)
    {
        $result = [];
        $n = count($nums);

        if ($n < 4) {
            return $result;
        }

        sort($nums);

        for ($i = 0; $i < $n - 3; $i++) {
            if ($i > 0 && $nums[$i] === $nums[$i - 1]) {
                continue;
            }

            for ($j = $i + 1; $j < $n - 2; $j++) {
                if ($j > $i + 1 && $nums[$j] === $nums[$j - 1]) {
                    continue;
                }

                $left = $j + 1;
                $right = $n - 1;

                while ($left < $right) {
                    $sum = $nums[$i] + $nums[$j] + $nums[$left] + $nums[$right];

                    if ($sum === $target) {
                        $result[] = [$nums[$i], $nums[$j], $nums[$left], $nums[$right]];

                        while ($left < $right && $nums[$left] === $nums[$left + 1]) {
                            $left++;
                        }

                        while ($left < $right && $nums[$right] === $nums[$right - 1]) {
                            $right--;
                        }

                        $left++;
                        $right--;
                    } elseif ($sum < $target) {
                        $left++;
                    } else {
                        $right--;
                    }
                }
            }
        }

        return $result;
    }
}

$s = new Solution18;
$nums = [1, 0, -1, 0, -2, 2];
$target = 0;
$res = $s->fourSum($nums, $target);
xdebug_var_dump($res);


exit(0);



exit(0);

// https://leetcode.com/problems/single-number/
// 136. Single Number

class Solution136
{
    public function singleNumber($nums)
    {
        /**
         * XOR числа с самим собой равен 0:
         * ( x \ oplus x = 0 )
         *
         * XOR числа с 0 - это само число:
         * ( x \ oplus 0 = x )
         */
        $result = 0;

        foreach ($nums as $num) {

            $binRes = sprintf('%08b', $result);
            $binNum = sprintf('%08b', $num);

            $result ^= $num;

            $binResult = sprintf('%08b', $result);
        }

        return $result;
    }
}

$s = new Solution136;
//$nums = [4, 1, 2, 1, 2];
$nums = [1];
$res = $s->singleNumber($nums);
xdebug_var_dump($res);

exit(0);


$x = 0b00100000;
$y = 0b00110000;
xdebug_var_dump($x);
xdebug_var_dump($y);
$res = $x ^ $y; // 00010000
xdebug_var_dump($res);
xdebug_var_dump(sprintf('%08b', $res));

//$number2 = 0b010;
//xdebug_var_dump(decbin($number2));
// Использование XOR для побитовой операции
//$result = decbin($number1 ^ $number2);
//$result = $number1 ^ $number2;

//xdebug_var_dump($result);

exit(0);


// https://leetcode.com/problems/search-in-rotated-sorted-array/
// 33. Search in Rotated Sorted Array

class Solution33
{
    public function search($nums, $target)
    {
        $left = 0;
        $right = count($nums) - 1;

        while ($left <= $right) {
            $mid = $left + intdiv($right - $left, 2);

            if ($nums[$mid] === $target) {
                return $mid;
            }

            if ($nums[$left] <= $nums[$mid]) {
                if ($nums[$left] <= $target && $target < $nums[$mid]) {
                    $right = $mid - 1;
                } else {
                    $left = $mid + 1;
                }
            } else {
                if ($nums[$mid] < $target && $target <= $nums[$right]) {
                    $left = $mid + 1;
                } else {
                    $right = $mid - 1;
                }
            }
        }

        return -1;
    }
}

$s = new Solution33;
$nums = [4, 5, 6, 7, 0, 1, 2];
$target = 0;

$res = $s->search($nums, $target);
xdebug_var_dump($res);

exit(0);

// https://leetcode.com/problems/search-a-2d-matrix/description/
// 74. Search a 2D Matrix

class Solution74
{
    public function searchMatrix($matrix, $target): bool
    {
        $rows = count($matrix);
        $cols = count($matrix[0]);

        $left = 0;
        $right = $rows * $cols - 1;

        while ($left <= $right) {
            $mid = $left + intdiv($right - $left, 2);
            $midElement = $matrix[intdiv($mid, $cols)][($mid) % $cols]; // <-

            if ($midElement === $target) {
                return true;
            }

            if ($target < $midElement) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }

        return false;
    }
}

$s = new Solution74;
$matrix = [
    [1, 3, 5, 7],
    [10, 11, 16, 20],
    [23, 30, 34, 60]
];
$target = 3;
$res = $s->searchMatrix($matrix, $target);
xdebug_var_dump($res);


exit(0);

// https://leetcode.com/problems/guess-number-higher-or-lower/
// 374. Guess Number Higher or Lower

class Solution374
{
    public function guessNumber($n)
    {
        $left = 1;
        $right = $n;

        while ($left <= $right) {
            $mid = $left + intdiv($right - $left, 2);
            $res = guess($mid);

            if ($res === 0) {
                return $mid;
            }

            if ($res === -1) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }

        return -1;
    }
}

function guess($num): int
{
    $pick = 6;

    if ($num === $pick) {
        return 0;
    }

    if ($num < $pick) {
        return 1;
    }

    return -1;
}

$s = new Solution374;

$res = $s->guessNumber(10);
xdebug_var_dump($res);


exit(0);


// https://leetcode.com/problems/reverse-linked-list/
// 206. Reverse Linked List

class ListNode
{
    public function __construct(
        public ?int      $val = null,
        public ?ListNode $next = null
    )
    {
    }
}

class Solution206
{
    public function reverseList($head): ?ListNode
    {
        $prev = null;  // Pointer to the previous node
        $current = $head;  // Pointer to the current node

        // Continue until the current node is null
        while ($current !== null) {
            $next = $current->next;  // Pointer to the next node
            $current->next = $prev;  // Reverse the link
            $prev = $current;  // Move the previous pointer to the current node
            $current = $next;  // Move the current pointer to the next node
        }

        return $prev;  // Return the new head of the reversed list
    }
}

$s = new Solution206;
$firstData = new ListNode(1, new ListNode(2, new ListNode(3, new ListNode(4, new ListNode(5)))));
$res = $s->reverseList($firstData);
xdebug_var_dump($res);


exit(0);

// https://leetcode.com/problems/linked-list-cycle/solutions/3999014/99-68-two-pointer-hash-table/
// 141. Linked List Cycle

class Solution141
{
    public function hasCycle($head)
    {
        $slowPointer = $head;
        $fastPointer = $head;

        while ($fastPointer !== null && $fastPointer->next !== null) {
            $slowPointer = $slowPointer->next;
            $fastPointer = $fastPointer->next->next;
            if ($slowPointer === $fastPointer) {
                return true;
            }
        }

        return false;
    }
}

$s = new Solution141;
$firstData = new ListNode(1, new ListNode(4, new ListNode(5)));
$firstData->next->next->next = $firstData->next;
$res = $s->hasCycle($firstData);
xdebug_var_dump($res);
exit(0);

//$firstData = new ListNode(1, new ListNode(4, new ListNode(5)));

exit(0);
