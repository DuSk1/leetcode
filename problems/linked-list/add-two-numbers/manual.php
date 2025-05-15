<?php

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

//$arr1 = [1, 2, 3];
//$arr2 = [4, 5, 6];
$arr1 = [9, 9, 9];
$arr2 = [1, 1, 1];
$s = new SolutionAddTwoNumbers();
$res = $s->addTwoNumbers($arr1, $arr2);
xdebug_var_dump($res);



exit(0);