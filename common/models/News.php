<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $type
 * @property integer $approved
 * @property string $created_at
 * @property string $updated_at
 * @property string $description
 * @property integer $author
 * @property string $title
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type','description','title'], 'required'],
            [['type'], 'integer'],
            [['approved'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['short_description'], 'string']
        ];
    }
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                        ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                    ],
                'value' => new Expression('NOW()'),
            ],
            'blamestamp' => [
                'class' => 'yii\behaviors\BlameableBehavior',
                'createdByAttribute' => ['author'],
                'updatedByAttribute' => ['author'],
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['author', 'author'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['author'],
                ]
            ],

            // 'slug' => [
            // 		'class' => 'common\behaviors\Slug',
            // 		'in_attribute' => 'name',
            // 		'out_attribute' => 'slug',
            // 		'translit' => true
        	  // ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'News ID',
            'type' => 'News Type',
            'approved' => 'News Approved',
            'created_at' => 'News Added Time',
            'updated_at' => 'News Updated Time',
            'description' => 'News Info',
            'author' => 'News Added By',
            'title' => 'News Title',
        ];
    }

    public function getUser101()
    {
      return $this->hasOne(User::className(), ['id' => 'author']);
    }
    public function getCateg()
    {
      return $this->hasOne(Categories::className(), ['id' => 'type']);
    }
    public function getCategName()
    {
      $categ = $this->categ;

      return $categ ? $categ->category : '';
    }
    public function getUserName()
    {
      $username = $this->user101;

      return $username ? $username->username : '';
    }

    public static function getCategsList()
    {
        // Выбираем только те категории, у которых есть дочерние категории
        $categs = News::find()
            ->joinWith('categ')
            ->distinct(true)
            ->all();

        return ArrayHelper::map($categs, 'categ.id', 'categ.category');
    }

    public static function getUsersList()
    {
        // Выбираем только те категории, у которых есть дочерние категории
        $usernames = News::find()
            ->joinWith('user101')
            ->distinct(true)
            ->all();

        return ArrayHelper::map($usernames, 'user101.id', 'user101.username');
    }
}
