<?php

namespace appname\models;

use Yii;

/**
 * This is the model class for table "process".
 *
 * @property int $id
 * @property int $flow_id
 * @property int $ref_id
 * @property string $ref_type
 * @property int $status
 * @property string $created_at
 */
class Process extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'flow_id', 'ref_id', 'status'], 'default', 'value' => null],
            [['id', 'flow_id', 'ref_id', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['ref_type'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'flow_id' => 'Flow ID',
            'ref_id' => 'Ref ID',
            'ref_type' => 'Ref Type',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }
}
