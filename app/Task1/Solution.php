<?php

namespace App\Task1;

class Solution
{

    protected array $result = [];

    // [2, 3, 5], 8

    function combinationSum(array $candidates, int $target)
    {
        $arr = [];

        for ($i = 0; count($candidates) > $i; $i++) {

            $target = ($target - $candidates[$i]);

            if ($target > $candidates[$i]) {
                $arr[$i] = $candidates[$i];
                $this->combinationSum($candidates, $target);

                if (in_array($target, $candidates)) {
                    $arr[$i] = $target;
                }
            }

            if (array_sum($arr) != $target) {
                unset($arr[$i]);
            }

        }

        return $arr;
    }
}