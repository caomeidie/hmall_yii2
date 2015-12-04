<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<h1>注册</h1>
<p class="note">带*为必填项</p>
<div class="row">
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>

            <?= $form->field($model, 'admin_name') ?>
            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="row">
                 <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::classname(), [
                         'imageOptions'=>[
                                 'alt'=>'点击换图',
                                 'title'=>'点击换图',
                                 'style'=>'cursor:pointer',
                                 'padding'=>'0',
                                 'height'=>'35',
                                 'id'=>'captcha_change',
                         ]
                  ]) ?>
            </div>
            <div class="form-group">
                <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>