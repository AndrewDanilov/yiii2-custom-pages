<?php

use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\ElFinder;
use sadovojav\ckeditor\CKEditor;
use andrewdanilov\custompages\Module as CustomPages;
use andrewdanilov\custompages\models\Category;
use andrewdanilov\helpers\CKEditorHelper;
use andrewdanilov\helpers\NestedCategoryHelper;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model Category */

?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'parent_id')->dropDownList(NestedCategoryHelper::getDropdownTree(Category::find()), ['prompt' => 'Верхний уровень', 'style' => 'font-family:monospace;']) ?>

	<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'menu_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'text')->widget(CKEditor::class, [
		'editorOptions' => ElFinder::ckeditorOptions('elfinder', CKEditorHelper::defaultOptions()),
	]) ?>

    <?= $form->field($model, 'category_template')->dropDownList(CustomPages::getInstance()->getCategoryTemplates()) ?>

    <?= $form->field($model, 'pages_template')->dropDownList(CustomPages::getInstance()->getPagesTemplates()) ?>

    <?= $form->field($model, 'order')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('custompages/backend', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
