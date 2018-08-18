<?php

namespace app\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\entities\Gallery;

/**
 * GallerySearch represents the model behind the search form of `app\entities\Gallery`.
 */
class GallerySearch extends Gallery
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'image_id', 'author_id', 'last_redactor_id'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
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
        $query = Gallery::find();

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
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'image_id' => $this->image_id,
            'author_id' => $this->author_id,
            'last_redactor_id' => $this->last_redactor_id,
        ]);

        return $dataProvider;
    }
}
