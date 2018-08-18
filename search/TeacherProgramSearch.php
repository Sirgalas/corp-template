<?php

namespace app\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\entities\TeacherProgram;

/**
 * TeacherProgramSearch represents the model behind the search form of `app\entities\TeacherProgram`.
 */
class TeacherProgramSearch extends TeacherProgram
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teachers_id', 'programs_id'], 'integer'],
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
        $query = TeacherProgram::find();

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
            'teachers_id' => $this->teachers_id,
            'programs_id' => $this->programs_id,
        ]);

        return $dataProvider;
    }
}
