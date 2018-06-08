<?php

namespace app\models\Calculator\CalculationMethods;

interface CalculationMethodInterface
{
    /**
     * Return price of improving users MMC rating from $start to $end
     *
     * @param int $start Start MMC rating
     * @param int $end End MMC rating
     *
     * @return float
     */
    public function calculate(int $start, int $end): float;
}