<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;
use yii\helpers\Url;
use app\models\Edicao;
use yii\bootstrap\Alert;
use app\widgets\fluxo;
use app\views\relatorio\relatorioWidget;

$this->title = 'Curso: '.$nome;
?>

<h1>Curso <?= $nome?></h1>
<?= fluxo::widget(['index'=>3, 'novo'=>$novo, 'action'=>'curso-proger/cadastrar', 'idmodel'=>$idmodel]); ?>
<!-- gridview de relatorios -->
<?= relatorioWidget::widget(['type'=>'gridview','controller'=>'curso-proger','idmodel'=>$idmodel, 'idTipoProger'=>$model->idTipoProger, 'novo'=>$novo]); ?>

<div class="well">
    <!-- form de relatorio -->
    <?= relatorioWidget::widget(['model'=>$model]); ?>

    <div class="form-group">           
        <a href="?r=curso-proger/cadastrar&n=<?= $novo?>&s=2&idmodel=<?php echo $idmodel?>"><button class="btn btn-warning">Voltar(Etapa 2)</button></a>

        <?= Html::a(Html::button ('Avançar (Etapa 4)', ['class' => 'btn btn-warning','title'=>"Esta ação não salva dados, certifique-se de salvar os dados antes de prosseguir"]), ['/curso-proger/cadastrar','n'=>$novo, 's'=>4,'idmodel'=>$idmodel])?>

    </div>
</div>
<div>
    <?= Html::a('Ver Cursos', ['/curso-proger/index'],['class'=>'btn btn-info  btn']) ?>
</div>