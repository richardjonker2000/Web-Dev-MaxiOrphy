<?php

namespace app\models\Search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Artwork;

/**
 * ArtworkSearch represents the model behind the search form of `app\models\Artwork`.
 */
class ArtworkSearch extends Artwork
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ArtworkID'], 'integer'],
            [['Name', 'Description', 'ReleaseDate', 'Size'], 'safe'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Artwork::find();

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
            'ArtworkID' => $this->ArtworkID,
            'ReleaseDate' => $this->ReleaseDate,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Description', $this->Description])
            ->andFilterWhere(['like', 'Size', $this->Size]);

        return $dataProvider;
    }
}
