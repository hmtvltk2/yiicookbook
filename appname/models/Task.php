<?php

namespace appname\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property int $node_id
 * @property int $process_id
 * @property bool $done
 * @property string $created_at
 * @property string $finished_at
 * @property int $assignee
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'node_id', 'process_id', 'assignee'], 'default', 'value' => null],
            [['id', 'node_id', 'process_id', 'assignee'], 'integer'],
            [['done'], 'boolean'],
            [['created_at', 'finished_at'], 'safe'],
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
            'node_id' => 'Node ID',
            'process_id' => 'Process ID',
            'done' => 'Done',
            'created_at' => 'Created At',
            'finished_at' => 'Finished At',
            'assignee' => 'Assignee',
        ];
    }
}
