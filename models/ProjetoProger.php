<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projetoProger".
 *
 * @property integer $id
 * @property string $nome
 * @property string $descricao
 * @property integer $idSituacao
 * @property integer $idGrandeArea
 * @property integer $idAreaAtuacao
 * @property integer $idSubArea
 * @property integer $idEspecialidade
 * @property integer $idSetor
 * @property integer $idPrograma
 * @property integer $interdepartamental
 * @property integer $interinstitucional
 * @property string $dataInicio
 * @property string $dataFim
 * @property string $observacoes
 * @property integer $idGestor
 * @property integer $idTipoEncargo
 * @property GrandeArea $idGrandeArea0
 * @property AreaAtuacao $idAreaAtuacao0
 * @property SubArea $idSubArea0
 * @property Especialidade $idEspecialidade0
 * @property Gestor $idGestor0
 * @property Setor $idSetor0
 * @property Situacao $idSituacao0
 * @property TipoEncargo $idTipoEncargo0
 */
class ProjetoProger extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projetoProger';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'descricao', 'idSituacao', 'idGrandeArea', 'idSetor', 'interdepartamental', 'interinstitucional', 'dataInicio', 'dataFim', 'resolucoes','idGestor', 'idTipoEncargo'], 'required'],
            [['nome', 'descricao', 'resolucoes','observacoes'], 'string'],
            [['idSituacao', 'idGrandeArea', 'idEspecialidade', 'idSetor', 'idPrograma', 'interdepartamental', 'interinstitucional', 'idGestor','idTipoEncargo'], 'integer'],
            ['idAreaAtuacao', 'integer', 'message' => '"Área de atuação" não pode ficar em branco quando uma grande área for selecionada.'],
            ['idSubArea', 'integer', 'message' => '"Subárea" não pode ficar em branco quando uma área de atuação for selecionada.'],
            [['dataInicio', 'dataFim'], 'safe'],
            ['dataFim', 'compare', 'operator' => '>=', 'compareAttribute' => 'dataInicio'],
            [['idGrandeArea'], 'exist', 'skipOnError' => true, 'targetClass' => GrandeArea::className(), 'targetAttribute' => ['idGrandeArea' => 'id']],
            [['idAreaAtuacao'], 'exist', 'skipOnError' => true, 'targetClass' => AreaAtuacao::className(), 'targetAttribute' => ['idAreaAtuacao' => 'id']],
            [['idSubArea'], 'exist', 'skipOnError' => true, 'targetClass' => SubArea::className(), 'targetAttribute' => ['idSubArea' => 'id']],
            [['idEspecialidade'], 'exist', 'skipOnError' => true, 'targetClass' => Especialidade::className(), 'targetAttribute' => ['idEspecialidade' => 'id']],           
            [['idGestor'], 'exist', 'skipOnError' => true, 'targetClass' => Gestor::className(), 'targetAttribute' => ['idGestor' => 'id']],
            [['idSetor'], 'exist', 'skipOnError' => true, 'targetClass' => Setor::className(), 'targetAttribute' => ['idSetor' => 'id']],
            [['idSituacao'], 'exist', 'skipOnError' => true, 'targetClass' => Situacao::className(), 'targetAttribute' => ['idSituacao' => 'id']],
            [['idPrograma'], 'exist', 'skipOnError' => true, 'targetClass' => ProgramaProger::className(), 'targetAttribute' => ['idPrograma' => 'id']],
            [['idTipoEncargo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoEncargo::className(), 'targetAttribute' => ['idTipoEncargo' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'descricao' => 'Descrição',
            'idSituacao' => 'Situação',
            'idGrandeArea' => 'Grande Área',
            'idAreaAtuacao' => 'Área de Atuação',
            'idSubArea' => 'Subárea',
            'idEspecialidade' => 'Especialidade',
            'idSetor' => 'Setor',
            'idPrograma' => 'Programa',
            'interdepartamental' => 'Interdepartamental',
            'interinstitucional' => 'Interinstitucional',
            'dataInicio' => 'Data de Início',
            'dataFim' => 'Data do Fim',
            'resolucoes' => 'Resoluções',
            'observacoes' => 'Observações',
            'idGestor' => 'Gestor',
            'idTipoEncargo' => 'Tipo de Encargo',
        ];
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGrandeArea0()
    {
        return $this->hasOne(GrandeArea::className(), ['id' => 'idGrandeArea']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAreaAtuacao0()
    {
        return $this->hasOne(AreaAtuacao::className(), ['id' => 'idAreaAtuacao']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSubArea0()
    {
        return $this->hasOne(SubArea::className(), ['id' => 'idSubArea']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEspecialidade0()
    {
        return $this->hasOne(Especialidade::className(), ['id' => 'idEspecialidade']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGestor0()
    {
        return $this->hasOne(Gestor::className(), ['id' => 'idGestor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSetor0()
    {
        return $this->hasOne(Setor::className(), ['id' => 'idSetor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdSituacao0()
    {
        return $this->hasOne(Situacao::className(), ['id' => 'idSituacao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPrograma0()
    {
        return $this->hasOne(ProgramaProger::className(), ['id' => 'idPrograma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoEncargo0()
    {
        return $this->hasOne(TipoEncargo::className(), ['id' => 'idTipoEncargo']);
    }

    public function getInterdepartamental(){
        switch ($this->interdepartamental) {
            case 1:
                return 'Sim';
                break;

            case 0:
                return 'Não';
                break;
        }
    }

    public function getInterinstitucional(){
        switch ($this->interinstitucional) {
            case 1:
                return 'Sim';
                break;

            case 0:
                return 'Não';
                break;
        }
    }
}
