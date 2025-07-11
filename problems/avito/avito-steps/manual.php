<?php /** @noinspection PhpMultipleClassDeclarationsInspection */
/**
Время: O(n), где n - число записей о всех пользователях.
Память: O(n), где n - число записей о всех пользователях.
 */
final class Solution
{
    public function champions(array $statistic): array
    {
        $totalCompetitionDays = count($statistic);

        if($totalCompetitionDays <= 0) {
            return [
                'userIds' => [],
                'steps' => 0
            ];
        }

        $userDays = $userSteps = [];

        foreach ($statistic as $day) {
            foreach ($day as ['userId' => $userId, 'steps' => $steps]) {

                $userDays[$userId] = ($userDays[$userId] ?? 0) + 1;
                $userSteps[$userId] = ($userSteps[$userId] ?? 0) + $steps;

            }
        }

        $maxSteps = 0;

        foreach ($userDays as $userId => $dayCounter) {
            if ($dayCounter == $totalCompetitionDays) {
                $maxSteps = max($userSteps[$userId], $maxSteps);
            }
        }

        $winners = [];

        foreach ($userDays as $userId => $dayCounter) {
            if (
                $dayCounter == $totalCompetitionDays
                && $maxSteps == $userSteps[$userId]
            ) {

                $winners[] = $userId;
            }
        }

        return [
            'userIds' => $winners,
            'steps' => $maxSteps
        ];
    }
}



$statistic = [
    [
        ['userId' => 1, 'steps' => 1000],
        ['userId' => 2, 'steps' => 1500]
    ],
    [
        ['userId' => 2, 'steps' => 1000],
    ],
];

$solution = new Solution();
$result = $solution->champions($statistic);
print_r($result);
