<?php

/* @var $this yii\web\View */
/* @var $model andrewdanilov\custompages\models\Category */

$this->title = 'Add category';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
