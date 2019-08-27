**How to install**
1. Config module in config
```php
'modules' => [
    ...
    'admin' =>  [
        'class' => 'contrib\admin\Module',
        'layout' => '@app/layout/main',
        'controllerMap' => [
            'assignment' => [
                'class' => 'contrib\admin\controllers\AssignmentController',
                // 'userClassName' => 'main\models\UserModel',
                'idField' => 'id',
                'usernameField' => 'username',
                // 'fullnameField' => 'profile.full_name',
                // 'extraColumns' => [
                //     [
                //         'attribute' => 'full_name',
                //         'label' => 'Full Name',
                //         'value' => function ($model, $key, $index, $column) {
                //             return $model->profile->full_name;
                //         },
                //     ],
                //     [
                //         'attribute' => 'dept_name',
                //         'label' => 'Department',
                //         'value' => function ($model, $key, $index, $column) {
                //             return $model->profile->dept->name;
                //         },
                //     ],
                //     [
                //         'attribute' => 'post_name',
                //         'label' => 'Post',
                //         'value' => function ($model, $key, $index, $column) {
                //             return $model->profile->post->name;
                //         },
                //     ],
                // ],
                // 'searchClass' => 'app\models\UserSearch',

            ],
        ],
    ]
],
```
2. Run migrations

`yii migrate --migrationPath=@contrib/admin/migrations`
