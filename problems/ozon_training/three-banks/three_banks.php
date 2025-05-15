<?php


/* Банки A, B и C
  Вам нужно обменять 1 рубль в максимально возможное количество долларов.
  Первая строка содержит целое число t (1 ≤ t ≤ 10000) — количество наборов входных данных.

  Каждый набор входных данных содержит описания обменных курсов трех банков.

  Описание обменного курса одного банка состоит из шести строк, каждая из которых содержит по два целых числа
  (1 ≤ n ≤ 100)
  и
  (1  ≤  m  ≤  100)
  — курс обмена одной валюты на другую:

• Курс обмена рублей на доллары.
• Курс обмена рублей на евро.
• Курс обмена долларов на рубли.
• Курс обмена долларов на евро.
• Курс обмена евро на рубли.
• Курс обмена евро на доллары.

Выходные данные
Для каждого набора входных данных в отдельной строке выведите одно число — максимальное количество долларов,
которое можно получить, если совершать не больше одного обмена в банке.
Ответ будет считаться правильным, если его относительная или абсолютная погрешность от верного не превосходит
10^−6.
10^-6 = 0.000001

1 набор данных на вход
Bank A
    100 1
    100 1
    1 100
    3 2
    1 100
    2 3

Bank B
    100 1
    100 1
    1 100
    3 2
    1 100
    2 3

Bank C
    100 1
    100 1
    1 100
    3 2
    1 100
    2 3

type Bank struct {
    Id     int
  RubUsd float64
  RubEur float64
  UsdRub float64
  UsdEur float64
  EurRub float64
  EurUsd float64
}
*/

class Bank
{
    public function __construct(
        public int   $id,
        public float $rubUsd,
        public float $rubEur,
        public float $usdRub,
        public float $usdEur,
        public float $eurRub,
        public float $eurUsd
    ) {}
}

function main()
{
    $files = array_diff(scandir('tests'), array('..', '.'));

    foreach ($files as $fileName) {
        if (str_contains($fileName, '.a')) {
            continue;
        }

        if ($fileName != '5') { // @TODO remove this line
            continue;
        }

        $incomingDataFilePath = 'tests/' . $fileName;

        // read first line
        $file = fopen($incomingDataFilePath, 'r');
        $firstLine = trim(fgets($file));

        $t = (int) $firstLine;

        $banks = [];

        while ($t > 0) {

            for ($i = 0; $i < 3; $i++) {
                $bankId = $i + 1;
                $rubUsd = str_replace("\n", '', fgets($file));
                $rubEur = str_replace("\n", '', fgets($file));
                $usdRub = str_replace("\n", '', fgets($file));
                $usdEur = str_replace("\n", '', fgets($file));
                $eurRub = str_replace("\n", '', fgets($file));
                $eurUsd = str_replace("\n", '', fgets($file));

                $rubUsd = getMultiplier($rubUsd);
                $rubEur = getMultiplier($rubEur);
                $usdRub = getMultiplier($usdRub);
                $usdEur = getMultiplier($usdEur);
                $eurRub = getMultiplier($eurRub);
                $eurUsd = getMultiplier($eurUsd);

                $banks[$t][] = new Bank($bankId, $rubUsd, $rubEur, $usdRub, $usdEur, $eurRub, $eurUsd);

            }

            $t--;

            break; // @TODO remove this line
        }

        fclose($file);

        /* Обменять 1 рубль в максимально возможное количество долларов.
        Всего 5 схем:
            r -> d
            r -> e -> d
            r -> e -> r -> d
            r -> d -> r -> d
            r -> d -> e -> d
        */

        $banksSet = array_shift($banks);

        $rubToUsd = schemaRubUsd($banksSet);
        $rubToEurToUsd = schemaRubEurToUsd($banksSet); // rubEur * eurUsd
//        $rubToEurToRubToUsd = $bank->rubEur * $bank->eurRub * $bank->usdRub;
//        $rubToUsdToRubToUsd = $bank->rubUsd * $bank->usdRub;
//        $rubToUsdToEurToUsd = $bank->rubUsd * $bank->usdEur;

//        $result[] = max($rubToUsd, $rubToEurToUsd, $rubToEurToRubToUsd, $rubToUsdToRubToUsd, $rubToUsdToEurToUsd);

        $result = max([$rubToUsd]);

        echo $result;

    }
}

function schemaRubUsd(array &$bankSet): float
{
    $results = [];

    // One operation per bank !! Ошибка в том что 1 банк - 1 операция

    return max($results);
}

function schemaRubEurToUsd(array &$bankSet): float
{
    $results = [];

    // One operation per bank !!

    return max($results);
}

function getMultiplier(string $course): float
{
    $course = explode(' ', $course);

    if (count($course) != 2) {
        throw new \DomainException('Invalid course format');
    }

    return (float) ($course[1] / $course[0]);
}

main();

exit(0);







