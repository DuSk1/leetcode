<?php

final class SolutionRoute
{
    public function route(array $tickets): array
    {
        $mapping = $destinations = [];

        foreach ($tickets as $ticket) {
            $destinations[$ticket[1]] = true;

            $mapping[$ticket[0]] = $ticket[1];
        }

        $startCity = '';

        foreach ($tickets as $ticket) {

            if (isset($destinations[$ticket[0]])) {
                continue;
            }

            $startCity = $ticket[0];
            break;
        }

        $result = [$startCity];

        foreach ($tickets as $ticket) {
            $result[] = $mapping[end($result)];
        }

        return $result;
    }
}

$s = new SolutionRoute();
$tickets = [
    ["Москва", "Париж"],
    ["Париж", "Лондон"],
    ["Лондон", "Берлин"]
];

$res = $s->route($tickets);
xdebug_var_dump($res);
