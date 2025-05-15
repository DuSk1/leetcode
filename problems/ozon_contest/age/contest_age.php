<?php

function extractNameAndAge(string $input): ?array
{
    $pattern = '/^([A-Z][a-z]{0,15}) is (\d{1,3}) years old$/';

    if (preg_match($pattern, $input, $matches)) {
        return [$matches[1], (int)$matches[2]];
    }

    return null;
}

function main(): void
{
    /*
        How old is Bd?
        C is 23 years younger than Bd
        C is 38 years younger than A
        Bd is 27 years old
     */

    $input = 'C is 23 years younger than Bd';
    $pattern = '/^([A-Z][a-z]{0,15}) is (\d{1,3}) years younger than ([A-Z][a-z]{0,15})$/';
    $matches = [];
    preg_match($pattern, $input, $matches);
    $name = $matches[1];
    $age = (int)$matches[2];
    $name2 = $matches[3];
    echo "Name: $name\n";
    echo "Age: $age\n";
    echo "Name2: $name2\n";
    $input = 'C is 38 years younger than A';
    $pattern = '/^([A-Z][a-z]{0,15}) is (\d{1,3}) years younger than ([A-Z][a-z]{0,15})$/';
    $matches = [];
    preg_match($pattern, $input, $matches);
    $name = $matches[1];
    $age = (int)$matches[2];
    $name2 = $matches[3];
    echo "Name: $name\n";
    echo "Age: $age\n";
    echo "Name2: $name2\n";
    $input = 'Bd is 27 years old';
    $pattern = '/^([A-Z][a-z]{0,15}) is (\d{1,3}) years old$/';


}

main();
