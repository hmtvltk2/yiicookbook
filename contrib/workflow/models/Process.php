<?php

namespace contrib\workflow\models;

use Yii;

/**
 * This is the model class for table "process".
 *
 * @property int $id
 * @property int $flow_id
 * @property int $ref_id
 * @property string $ref_type
 * @property int $status
 * @property int $created_by
 * @property string $created_at
 * @property bool $completed
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
            [['flow_id'], 'required'],
            [['flow_id', 'ref_id', 'status', 'created_by'], 'default', 'value' => null],
            [['flow_id', 'ref_id', 'status', 'created_by'], 'integer'],
            [['created_at'], 'safe'],
            [['completed'], 'boolean'],
            [['ref_type'], 'string', 'max' => 255],
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
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'completed' => 'Completed',
        ];
    }
}
