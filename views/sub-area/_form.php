<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use app\models\AreaAtuacao;

/* @var $this yii\web\View */
/* @var $model app\models\SubArea */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sub-area-form">

    <?php $form = ActiveForm::begin(); ?>    

    <?= $form->field($model, 'nome')->textInput(['maxlength' =>100,'style' =>'width: 50%' ]) ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' =>100,'style' =>'width: 50%' ]) ?>

     <?= $form->field($model, 'idAreaAtuacao')->dropDownList(ArrayHelper::map(AreaAtuacao::find()->orderBy('nome')->where(['ativo' => 1])->all(),'id', 'nome'),['prompt'=>'Selecione a área de atuação', 'style' =>'width: 50%'])  ?>

    <!-- botão "ativo: sim/não" com default sim -->  
    <?php $model->isNewRecord ? $model->ativo = 1: $model->ativo = $model->ativo ; ?>  
    
    <?= $form->field($model, 'ativo')->radioList(array('1'=>'Sim','0'=>'Não')) ?>
     <!-- -->  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Salvar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
