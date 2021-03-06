<?php

namespace app\models\search;

use Yii; 
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tipoFuncao;

/**
 * tipoFuncaoSearch represents the model behind the search form about `app\models\tipoFuncao`.
 */
class TipoFuncaoSearch extends TipoFuncao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'ativo'], 'integer'],
            [['descricao'], 'safe'],
            [['ativo'], 'boolean'],
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
        $query = tipoFuncao::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'descricao' => SORT_ASC,                    
                ]
            ]
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
        ]);

         // grid filtering conditions
         $query->andFilterWhere([
            'id' => $this->id,
            'ativo' => $this->ativo,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
