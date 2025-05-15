<?php

/**
 * Изначально у Игоря была строка, состоящая из одинаковых символов. Над ней производилось некоторое количество
 * операций вставки символа. Очередной символ можно вставить только между любыми двумя одинаковыми символами.
 * Учесть, что вставок возможно и не было! 'kkk'
 * Дана строка Латинские нижний и верхний регистр
 * на вход подаю 2 строки:
 *  $modifiedStrOne = 'abacaa'; восстанавливаю оригинал: 'aaaa' | Вывод: YES
 *  $modifiedStrTwo = 'PppP'; восстанавливаю оригинал: '' | Вывод: NO
 *
 * insert operations, каждый новый символ можно вставить только между любыми двумя Одинаковыми символами.
 *
 */

class SolutionInsertChars
{
    public function solve(string $a, string $b): void
    {
        echo $this->solveOne($a);
        echo "\n";
        echo $this->solveOne($b);
    }

    public function solveOne(string $s): string
    {
        if (strlen($s) === 1) {
            return 'YES';
        }

        $rightChar = $s[0];

        for ($i = 0; $i < strlen($s); $i++) {

            $window = substr($s, $i, 2);

            if(!str_contains($window, $rightChar)) {
                return 'NO';
            }
        }

        return 'YES';
    }
}

// flfffffOfffffJfwffzf

$solution = new SolutionInsertChars;

$arTests = [];

$files = array_diff(scandir('tests'), array('..', '.'));

foreach ($files as $fileName) {
    $content = array_filter(explode("\n", file_get_contents('tests/' . $fileName)));

    if (str_contains($fileName, '.a')) {
        continue;
    }

    $answers = array_filter(explode("\n", file_get_contents('tests/' . $fileName . '.a')));

    $inputStringsCount = array_shift($content);

    for ($i = 0; $i < $inputStringsCount; $i++) {
        $s = array_shift($content);
        $expects = array_shift($answers);
        $arTests[$s] = $expects;
    }
}

foreach ($arTests as $s => $expects) {
    $res = $solution->solveOne($s);

    if ($res !== $expects) {
        echo 'FAIL: ', $s, PHP_EOL;
    }

}

echo 'Tests - OK';

exit(0);