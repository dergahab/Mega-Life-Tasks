<?php

use App\Task1\Solution;
use App\Task2\Calculation;

include('./vendor/autoload.php');


// $calculate = new Calculation;

// echo $calculate->calculate("5-3");

$solution = new Solution;

print_r($solution->combinationSum([2, 3], 4));