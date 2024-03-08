<?php

namespace App\Task2;

class Calculation
{
    protected $simb = ["(", ")", "+", "-", "*", "/", "%", 1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
    protected $result = 0;
    /**
     * @param String $s
     * @return Integer
     */
    function calculate(string $s)
    {
        foreach (str_split($s) as $char) { // string to array
            if ($key = array_search($char, $this->simb)) { // get index of element if exsist in array
                if (is_string($this->simb[$key])) {
                    switch ($this->simb[$key]) {
                        case '+':
                            $this->result += (float) $this->simb[$key];
                            break;
                        case '-':
                            $this->result -= (float) $this->simb[$key];
                            break;
                        case '*':
                            $this->result *= (float) $this->simb[$key];
                            break;
                        case '/':
                            $this->result /= (float) $this->simb[$key];
                            break;
                        case '%':
                            $this->result %= (float) $this->simb[$key];
                    }
                } else {
                    $this->result .= $this->simb[$key];
                }
            }
        }
        return $this->result;
    }
}