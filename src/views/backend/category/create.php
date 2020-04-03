<?php

use Yii;

/* @var $this yii\web\View */
/* @var $model andrewdanilov\custompages\models\Category */

$this->title = Yii::t('custompages/backend', 'Add category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('custompages/backend', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
