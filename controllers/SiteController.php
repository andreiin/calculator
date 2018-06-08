<?php

namespace app\controllers;

use app\models\Calculator\Calculator;
use Yii;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        if (Yii::$app->request->isAjax) {
            $calculator = new Calculator();
            if ($calculator->load(Yii::$app->request->get()) && $calculator->validate()) {
                try {
                    $price = $calculator->getPrice();
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
                return $this->renderAjax('partial/price', [
                    'price' => $price,
                ]);
            }
            return 'error';
        }

        return $this->render('index', ['model' => new Calculator()]);
    }
}
