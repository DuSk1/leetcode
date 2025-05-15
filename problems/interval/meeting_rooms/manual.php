<?php /** @noinspection ALL */

class Solution
{
    public function roomsCount(array $intervals): int
    {
        $points = [];

        foreach ($intervals as $point) {
            $points[] = [$point[0], 1]; // точка, +1 - что нужна еще одна комната
            $points[] = [$point[1], -1]; // точка, -1 - что комната освободилась
        }

        unset($point);

        sort($points);

        $maxRoomCount = $currentRoomCount = 0;

        // для каждого момента времени находим используемое число комнат и выбираем максимальное значение
        foreach ($points as $point) {

            $currentRoomCount += $point[1];

            $maxRoomCount = max($maxRoomCount, $currentRoomCount);

        }

        return $maxRoomCount;
    }
}

// Тестовый код
$solution = new Solution();

$testCases = [
    [[[0, 30], [5, 10], [15, 20]], 2],
    [[[1, 3], [2, 5], [4, 6]], 2],
    [[[1, 2], [2, 3], [3, 4]], 1],
    [[[1, 10], [2, 6], [5, 8], [7, 9]], 3],
    [[[1, 4], [2, 3], [3, 5], [7, 8]], 2],
    [[[1, 18], [18, 23], [15, 29], [4, 15], [2, 11], [5, 13]], 4],
];

foreach ($testCases as $index => $testCase) {
    $input = $testCase[0];
    $expected = $testCase[1];
    $result = $solution->roomsCount($input);
    echo "Тест " . ($index + 1) . ": " . ($result === $expected ? "пройден" : "не пройден") . "<br>";
}