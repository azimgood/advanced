<?php

namespace app\modules\news;

class NewsModule extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\news\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here

        $this->modules = [
            'approve' => [
                // you should consider using a shorter namespace here!
                'class' => 'app\modules\news\modules\approve\ApproveModule',
            ],
        ];
    }
}
