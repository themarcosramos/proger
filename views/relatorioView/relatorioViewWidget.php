<?php
namespace app\views\relatorioView;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Relatorio;
use yii\data\ActiveDataProvider;

class relatorioViewWidget extends Widget{
    public $model; //Relatorio model
    public $type; // se é um form ou gridview
    public $idmodel; //id de Proger
    public $idTipoProger; // tipo de Proger
    public $controller; //controller onde serão chamadas as actions dos botoes da gridview ex: curso-proger
    public $novo; //se é um novo registro de Proger ou uma atualização

    public function init(){
        parent::init();
    }
    public function run(){

                $query = new ActiveDataProvider([
                    'query' =>Relatorio::find()->where(['idProger' => $this->idmodel, 'idTipoProger'=> $this->idTipoProger]),
                    'pagination' => ['pageSize' => 10],        
                ]);
                return $this->render('gridview', ['query'=>$query, 'controller'=>$this->controller, 'novo'=>$this->novo]);
         
         
    }
}