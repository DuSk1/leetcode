<?php

function isValid(string $s): bool
{
    $runes = mb_str_split($s);

    $orig = $runes[0];
    $c = 0;

    $len = count($runes);

    for ($i = 1; $i < $len; $i++) {
        if ($c > 1) {
            return false;
        }

        if ($runes[$i] !== $orig) {
            $c++;
        } elseif ($runes[$i] === $orig && $c === 1) {
            $c--;
        }
    }

    return $c === 0;
}

function main(): void
{
    $in = fopen('php://stdin', 'r');
    $out = fopen('php://stdout', 'w');

    fscanf($in, "%d\n", $n);

    for ($i = 0; $i < $n; $i++) {
        $s = trim(fgets($in));

        if (isValid($s)) {
            fwrite($out, "YES\n");
        } else {
            fwrite($out, "NO\n");
        }
    }

    fclose($in);
    fclose($out);
}

$s = "abacaa";

if (isValid($s)) {
    echo "YES\n";
} else {
    echo "NO\n";
}


exit(0);