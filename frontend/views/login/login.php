<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>TaskForce</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div class="table-layout">

    <main class="page-main">
        <div class="main-container page-container">
            <section class="registration__user">
                <h1>Вход</h1>
                <div class="registration-wrapper">

                    <?php $form=ActiveForm::begin(['id' => 'registration-form', 'enableClientValidation' => true, 'enableAjaxValidation' => true, 'options' => ['class' => 'registration__user-form form-create'], 'action' => ['/login'], 'method' => 'post']); ?>

                    <?= $form->field($loginForm, 'email', [
                        'template' => '{label}{input}{error}',
                    ])
                        ->input('text', ['class' => 'input textarea', 'type' => 'email','placeholder' => "kumarm@mail.ru", 'style' => 'width: 90%']);
                    ?>
                    <span>Введите адрес электронной почты</span><br><br>

                    <?= $form->field($loginForm, 'password', [
                        'template' => '{label}{input}{error}',
                    ])
                        ->passwordInput(['class' => 'input textarea', 'type' => 'password', 'style' => 'width: 90%'])
                    ?>

                        <button class="button button__registration" type="submit">Войти в аккаунт</button>

                    <?php ActiveForm::end(); ?>
                </div>
            </section>

        </div>
    </main>

</div>
</body>
</html>
