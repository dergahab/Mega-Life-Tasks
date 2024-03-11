<?php

namespace App\Task1;

class Solution
{
    function combinationSum($candidates, $target)
    {
        $result = [];
        $current = [];
        sort($candidates);
        $this->backtrack($result, $current, $candidates, $target, 0);
        return $result;
    }

    function backtrack(&$result, &$current, $candidates, $target, $start)
    {

        if ($target === 0) {
            $result[] = $current;
            return;
        }
        for ($i = $start; $i < count($candidates); $i++) {
            if ($candidates[$i] > $target)
                break;
            if ($i > $start && $candidates[$i] === $candidates[$i - 1])
                continue;
            $current[] = $candidates[$i];
            $this->backtrack($result, $current, $candidates, $target - $candidates[$i], $i);
            array_pop($current);
        }
    }
}