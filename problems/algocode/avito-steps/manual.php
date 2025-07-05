<?php

/**
 * Оценка сложности
 *
 * Время: O(n), где n - число записей о всех пользователях.
 * Память: O(n), где n - число записей о всех пользователях.
 *
 * @param array $statistics 3D array: days -> users -> [user_id, steps]
 * @return array List of winner user IDs
 */
function find_competition_winners(array $statistics): array {
    $userDays = [];
    $userSteps = [];
    $daysTotal = count($statistics);

    foreach ($statistics as $day) {
        foreach ($day as [$userId, $steps]) {
            $userDays[$userId] = ($userDays[$userId] ?? 0) + 1;
            $userSteps[$userId] = ($userSteps[$userId] ?? 0) + $steps;
        }
    }

    $maxSteps = 0;
    foreach ($userDays as $userId => $days) {
        if ($days === $daysTotal) {
            $maxSteps = max($maxSteps, $userSteps[$userId]);
        }
    }

    $winners = [];
    foreach ($userDays as $userId => $days) {
        if ($days === $daysTotal && $userSteps[$userId] === $maxSteps) {
            $winners[] = $userId;
        }
    }

    return $winners;
}

$statistics = [
    [
        ['userId' => 1, 'steps' => 1000],
        ['userId' => 2, 'steps' => 1500],
    ],
    [
        ['userId' => 2, 'steps' => 1000],
    ],
];

$winners = find_competition_winners($statistics);
print_r($winners);

