<?php

namespace contrib\workflow\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property int $id
 * @property string $name
 * @property int $process_id
 * @property bool $completed
 * @property string $created_at
 * @property string $finished_at
 * @property int $assignee
 * @property string $node_code
 * @property string $group
 * @property string $permission
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
            [['process_id'], 'required'],
            [['process_id', 'assignee'], 'default', 'value' => null],
            [['process_id', 'assignee'], 'integer'],
            [['completed'], 'boolean'],
            [['created_at', 'finished_at'], 'safe'],
            [['name', 'node_code', 'group', 'permission'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'process_id' => 'Process ID',
            'completed' => 'Completed',
            'created_at' => 'Created At',
            'finished_at' => 'Finished At',
            'assignee' => 'Assignee',
            'node_code' => 'Node Code',
            'group' => 'Group',
            'permission' => 'Permission',
        ];
    }
}
