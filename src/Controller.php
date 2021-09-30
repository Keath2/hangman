<?php

namespace Keath2\hangman\Controller;

use function Keath2\hangman\View\showGame;

function menu($key)
{
    if ($key == "--new" || $key == "-n") {
        startGame();
    } elseif ($key == "--list" || $key == "-l") {
        echo "Databas is being developed\n";
    } elseif ($key == "--replay" || $key == "-r") {
        echo "Replay is being developed\n";
    } else {
        echo "Wrong key\n";
    }
}

function showResult($rightAnswers, $word, $lengthWord)
{
    if ($rightAnswers == $lengthWord) {
        echo "\n You win!";
    } else {
        echo "\n You lose!";
    }

    echo "\n The hidden word was: $word\n";
}

function startGame()
{
    $wordBase = array("hidden", "answer", "laptop", "unreal", "script");
    $randomChoice = random_int(0, count($wordBase) - 1);
    $word = $wordBase[$randomChoice];
    $lengthWord = strlen($word);
    $remaining = $word;

    $entryField = "";
    for ($i = 0; $i < $lengthWord; $i++) {
        $entryField .= ".";
    }

    $fails = 0;
    $rightAnswers = 0;

    while ($fails != 6 && $rightAnswers != $lengthWord) {
        showGame($fails, $entryField);
        $letter = mb_strtolower(readline("Letter: "));
        $attempt = 0;

        for ($i = 0; $i < strlen($remaining); $i++) {
            if ($remaining[$i] == $letter) {
                $entryField[$i] = $letter;
                $remaining[$i] = " ";
                $rightAnswers++;
                $attempt++;
            }
        }

        if ($attempt == 0) {
            $fails++;
        }
    }

    showGame($fails, $entryField);
    showResult($rightAnswers, $word, $lengthWord);
}
