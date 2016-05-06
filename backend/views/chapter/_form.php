<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Book;

/* @var $this yii\web\View */
/* @var $model backend\models\Chapter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chapter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pdf_url')->fileInput() ?>

     <?= $form->field($model, 'book_id')->widget(Select2::classname(), [
        'data' =>  ArrayHelper::map(Book::find()->all(),'id','name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Type book name'],
        'pluginOptions' => [
            'minimumInputLength' => 3,
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
