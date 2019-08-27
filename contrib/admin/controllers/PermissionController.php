<?php

namespace contrib\admin\controllers;

use contrib\admin\components\ItemController;
use yii\rbac\Item;

/**
 * PermissionController implements the CRUD actions for AuthItem model.

 */
class PermissionController extends ItemController
{

    /**
     * @inheritdoc
     */
    public function labels()
    {
        return [
            'Item' => 'Permission',
            'Items' => 'Permissions',
        ];
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return Item::TYPE_PERMISSION;
    }
}
