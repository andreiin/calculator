<?php

/* @var $this yii\web\View */
/* @var $model app\models\Calculator\Calculator */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Price calculator';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-calculator">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to calculate:</p>

    <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'calculate-form']); ?>

    <?= $form->field($model, 'start')->textInput() ?>

    <?= $form->field($model, 'end')->textInput() ?>

    <?=$form->field($model,'calculationMethod')->radioList($model::getCalculationMethodArray()); ?>

    <?= Html::submitButton('Calculate') ?>

    <?php ActiveForm::end(); ?>

    <p>
        Your price is: <span class="price"></span>.
    </p>
</div>

<?php
$script = <<< JS
    $(document).on('submit', '#calculate-form', function(e) {
        e.preventDefault();
        $('.site-calculator .price').load(this.action, $(this).serialize());
        return false;
    });
JS;
$this->registerJs($script);
?>