<?php


function isPalindromePermutation(string $s): bool
{
    $count = array_fill(0, 26, 0);

    foreach (str_split($s) as $char) {
        $index = ord($char) - ord('a');

        $count[$index] = ($count[$index] + 1) % 2;
    }

    return array_sum($count) <= 1;
}

function testIsPalindromePermutation()
{
    $testCases = [
        'aabbcc' => true,
        'abc' => false,
        'aabbc' => true,
        'aabbccdd' => true,
        'aabbccdde' => true,
        'aabbccddeee' => true,
    ];

    foreach ($testCases as $input => $expected) {
        $result = isPalindromePermutation($input);
        if ($result !== $expected) {
            echo "Test failed for input '$input'. Expected: ". print_r($expected, true).", got: $result\n";
        } else {
            echo "Test passed for input '$input'.\n";
        }
    }
}

testIsPalindromePermutation();

exit(0);
