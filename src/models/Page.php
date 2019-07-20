<?php
namespace andrewdanilov\CustomPages\models;

use yii\db\ActiveRecord;
use andrewdanilov\CustomPages\behaviors\DateBehavior;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property int $category_id
 * @property string $slug
 * @property string $image
 * @property string $title
 * @property string $text
 * @property string $published_at
 * @property string $meta_title
 * @property string $meta_description
 * @property Category $category
 */
class Page extends ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
			[
				'class' => 'common\behaviors\DateBehavior',
				'dateAttributes' => [
					'published_at' => DateBehavior::DATE_FORMAT,
				],
			],
		];
	}

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'text', 'published_at'], 'string'],
            [['category_id'], 'integer'],
            [['slug', 'title', 'meta_title', 'meta_description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'slug' => 'ЧПУ страницы',
            'image' => 'Обложка',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'published_at' => 'Опубликовано',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
        ];
    }

    public function getCategory()
    {
    	return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
}
