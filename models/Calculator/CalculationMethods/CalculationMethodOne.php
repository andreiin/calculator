<?php

namespace app\models\Calculator\CalculationMethods;

class CalculationMethodOne implements CalculationMethodInterface
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
        $price = 0;
        foreach (self::getPointPrices() as $pointPrice) {
            if ($start >= $pointPrice['to']) {
                continue;
            } elseif ($end < $pointPrice['from']) {
                break;
            }
            $startPoint = ($start > $pointPrice['from']) ? $start : $pointPrice['from'];
            $endPoint = ($end < $pointPrice['to']) ? $end : $pointPrice['to'];
            $price += ($endPoint - $startPoint) * $pointPrice['price'];
        }
        return $price;
    }

    /**
     * Point prices
     *
     * @return array
     */
    private function getPointPrices(): array
    {
        return [
            ['from' => 0, 'to' => 2500, 'price' => 1],
            ['from' => 2500, 'to' => 3500, 'price' => 3],
            ['from' => 3500, 'to' => 5500, 'price' => 5],
            ['from' => 5500, 'to' => 7000, 'price' => 10],
        ];
    }
}