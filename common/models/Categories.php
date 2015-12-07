<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;


class Categories extends \yii\db\ActiveRecord
{

	public static function tableName()
    {
        return 'categories';
    }
    
}
