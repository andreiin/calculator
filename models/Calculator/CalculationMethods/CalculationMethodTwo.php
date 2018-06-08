<?php

namespace app\models\Calculator\CalculationMethods;

class CalculationMethodTwo implements CalculationMethodInterface
{
    /**
     * Return price of improving users MMC rating from $start to $end
     *
     * @param int $start Start MMC rating
     * @param int $end End MMC rating
     *
     * @return float
     */
    public function calculate(int $start, int $end): float
    {
        // find difference between target and current users MMC rating
        $difference = $end - $start;
        $pointPrice = self::getPointPrice();
        return $difference * $pointPrice;
    }

    /** Point price
     *
     * @return float
     */
    private function getPointPrice(): float
    {
        return 3.0;
    }
}