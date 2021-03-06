<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Especialidade;

/**
 * EspecialidadeSearch represents the model behind the search form of `app\models\Especialidade`.
 */
class EspecialidadeSearch extends Especialidade
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ativo', 'idSubArea'], 'integer'],
            [['nome', 'codigo'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Especialidade::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'ativo' => $this->ativo,
            'idSubArea' => $this->idSubArea,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'codigo', $this->codigo]);

        return $dataProvider;
    }
}
