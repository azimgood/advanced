<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
          'class' => 'yii\rbac\DbManager',
          'defaultRoles' => ['guest'],
        ],
    ],

    'modules' => [
      'news' => [
          'class' => 'app\modules\news\NewsModule',
      ],

      'redactor' => [
          'class' => 'yii\redactor\RedactorModule',
          'uploadDir' => '@frontend/web/images/uploads',
          'uploadUrl' => '../../frontend/web/images/uploads',
          'imageAllowExtensions'=>['jpg','png','gif']
      ],
    ],

    'as access' => [
    'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/login',
            'site/error',
            'site/logout',
            'frontend/news/news/index',
        ]
    ],
];
