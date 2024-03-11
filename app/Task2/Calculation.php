<?php

namespace App\Task2;

use InvalidArgumentException;

class Calculation
{
    /**
     * @param String $mathString
     * @return Integer
     */
    public function calculate($mathString)
    {
        $tokens = preg_split('/(\+|-|\*|\/|\(|\))/', $mathString, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $result = [];
        $operators = [];

        foreach ($tokens as $token) {
            if ($token === '(') {
                $operators[] = $token;
            } elseif ($token === ')') {
                while (end($operators) !== '(') {
                    $result[] = array_pop($operators);
                }
                array_pop($operators); // Remove the '('
            } elseif (in_array($token, ['+', '-', '*', '/'])) {
                while (!empty($operators) && $this->precedence($operators[count($operators) - 1]) >= $this->precedence($token)) {
                    $result[] = array_pop($operators);
                }
                $operators[] = $token;
            } else {
                $result[] = $token;
            }
        }

        while (!empty($operators)) {
            $result[] = array_pop($operators);
        }

        $stack = [];
        foreach ($result as $token) {
            if (is_numeric($token)) {
                $stack[] = $token;
            } else {
                $operand2 = array_pop($stack);
                $operand1 = array_pop($stack);
                $stack[] = $this->doCalculation($token, $operand1, $operand2);
            }
        }

        return $stack[0];
    }

    public function precedence($operator)
    {
        if ($operator === '+' || $operator === '-') {
            return 1;
        } elseif ($operator === '*' || $operator === '/') {
            return 2;
        }
        return 0;
    }

    public function doCalculation($operator, $operand1, $operand2)
    {
        switch ($operator) {
            case '+':
                return $operand1 + $operand2;
            case '-':
                return $operand1 - $operand2;
            case '*':
                return $operand1 * $operand2;
            case '/':
                if ($operand2 !== 0) {
                    return $operand1 / $operand2;
                } else {
                    throw new InvalidArgumentException("Division by zero.");
                }
        }
    }
}