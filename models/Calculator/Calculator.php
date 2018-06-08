<?php

namespace app\models\Calculator;

use yii\base\Model;

class Calculator extends Model
{
    const MMC_MIN_VALUE = 0;
    const MMC_MAX_VALUE = 7000;

    public $start;
    public $end;
    public $calculationMethod;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['start', 'end', 'calculationMethod'], 'required'],
            [['start', 'end'], 'integer'],
            ['start', 'compare', 'compareValue' => self::MMC_MIN_VALUE, 'operator' => '>=', 'type' => 'number'],
            ['end', 'compare', 'compareValue' => self::MMC_MAX_VALUE, 'operator' => '<=', 'type' => 'number'],
            ['start', 'compare', 'compareAttribute' => 'end', 'operator' => '<', 'type' => 'number'],
            ['calculationMethod', 'in', 'range' => array_keys(self::getCalculationMethodArray())]
        ];
    }

    /**
     * @return float
     * @throws \Exception
     */
    public function getPrice() {
        if (class_exists($this->calculationMethod)) {
            $calculationMethod = new $this->calculationMethod;
        } else {
            throw new \Exception("Class \"$this->calculationMethod\" not exists");
        }
        /* @var $calculationMethod \app\models\Calculator\CalculationMethods\CalculationMethodInterface */
        return $calculationMethod->calculate($this->start, $this->end);
    }

    /**
     * @return array
     */
    public static function getCalculationMethodArray()
    {
        return [
            'app\models\Calculator\CalculationMethods\CalculationMethodOne' => 'Calculation Method One',
            'app\models\Calculator\CalculationMethods\CalculationMethodTwo' => 'Calculation Method Two',
        ];
    }
}