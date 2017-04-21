<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\City;

/**
 * CitySearch represents the model behind the search form about `app\models\City`.
 */
class CitySearch extends City
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_city', 'population'], 'integer'],
            [['ccode', 'name'], 'safe'],
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
      if(isset($_GET['ccode']) && !is_numeric($_GET['ccode'])){
        $query = City::find()->where(['ccode' => $_GET['ccode']]);
      } else {
        $query = City::find();
      }


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
            'id_city' => $this->id_city,
            'population' => $this->population,
        ]);

        $query->andFilterWhere(['like', 'ccode', $this->ccode])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
