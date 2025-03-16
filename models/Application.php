<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $date_of_birth
 * @property string|null $description
 * @property float|null $income
 * @property int|null $number_of_dependants
 * @property string $created_at
 * @property string $updated_at
 */
class Application extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'date_of_birth'], 'required'],
            [['date_of_birth', 'created_at', 'updated_at'], 'safe'],
            [['description'], 'string'],
            [['income'], 'number'],
            [['number_of_dependants'], 'integer', 'min' => 0],
            [['first_name', 'last_name'], 'string', 'max' => 255],
            [['description', 'income', 'number_of_dependants'], 'default', 'value' => null],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'date_of_birth' => 'Date of Birth',
            'description' => 'Description',
            'income' => 'Income',
            'number_of_dependants' => 'Number of Dependants',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
