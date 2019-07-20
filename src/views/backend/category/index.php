<?php

use yii\helpers\Html;
use yii\grid\GridView;
use andrewdanilov\CustomPages\common\models\Category;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel andrewdanilov\CustomPages\backend\models\CategorySearch */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;

$category_templates = Bootstrap::getCategoryTemplates();
$pages_templates = Bootstrap::getPagesTemplates();
?>
<div class="page-index">

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
	        [
		        'attribute' => 'id',
		        'headerOptions' => ['width' => 100],
	        ],
            'title',
            'slug',
            [
            	'attribute' => 'category_template',
	            'value' => function (Category $model) use ($category_templates) {
    	            if (isset($category_templates[$model->category_template])) {
		                return $category_templates[$model->category_template];
	                }
    	            return Html::tag('i', 'Нет');
	            }
            ],
	        [
            	'attribute' => 'pages_template',
	            'value' => function (Category $model) use ($pages_templates) {
    	            if (isset($pages_templates[$model->pages_template])) {
		                return $pages_templates[$model->pages_template];
	                }
    	            return Html::tag('i', 'Нет');
	            }
            ],

	        [
		        'class' => 'andrewdanilov\gridtools\FontawesomeActionColumn',
		        'template' => '{update}{delete}',
	        ],
        ],
    ]); ?>
</div>
