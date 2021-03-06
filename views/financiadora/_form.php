<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Financiadora */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="financiadora-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' =>100,'style' =>'width: 50%' ]) ?>

    <?= $form->field($model, 'sigla')->textInput(['maxlength' =>20,'style' =>'width: 20%' ]) ?>

     <!-- botão "ativo: sim/não" com default sim -->  
     <?php $model->isNewRecord ? $model->ativo = 1: $model->ativo = $model->ativo ; ?>  
    
    <?= $form->field($model, 'ativo')->radioList(array('1'=>'Sim','0'=>'Não')) ?>
     <!-- -->  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
