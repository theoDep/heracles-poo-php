<?php
require_once './src/Fighter.php';
// First Labour : Heracles vs Nemean Lion
// use your Figher class here

$heracles = new Fighter('🧔 Heracles', 20, 6);

$nemean_lion = new Fighter('🦁 Nemean Lion', 11, 13);

function fightToDeath($fighter1, $fighter2)
{
    $round = 1;
    while ($fighter1->life > 0 && $fighter2->life > 0)
    {
        echo "🕛 $round\n";
        $fighter1->fight($fighter2);
        if (!$fighter2->isAlive())
        {
            echo "🏆 $fighter1->name wins! (💙 $fighter1->life)\n";
            break;
        }
        $fighter2->fight($fighter1);
        if (!$fighter1->isAlive())
        {
            echo "🏆 $fighter2->name wins! (💙 $fighter2->life)\n";
            break;
        }
        $round++;
    }
}

fightToDeath($heracles, $nemean_lion);