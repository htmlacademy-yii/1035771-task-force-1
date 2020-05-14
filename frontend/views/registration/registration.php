<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Location;
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
                <h1>Регистрация аккаунта</h1>

                <div class="registration-wrapper">
                    <?php $form=ActiveForm::begin(['id' => 'registration-form', 'enableClientValidation' => true, 'enableAjaxValidation' => true, 'options' => ['class' => 'registration__user-form form-create'], 'method' => 'post']); ?>

                        <?= $form->field($userRegistration, 'email', [
                            'template' => '{label}{input}{error}',
                        ])
                            ->input('text', ['class' => 'input textarea', 'type' => 'email','placeholder' => "kumarm@mail.ru", 'style' => 'width: 90%']);
                        ?>
                        <span>Введите валидный адрес электронной почты</span><br><br>

                        <?= $form->field($userRegistration, 'name', [
                            'template' => '{label}{input}{error}',
                        ])
                            ->input('text', ['class' => 'input textarea', 'placeholder' => "Мамедов Кумар", 'style' => 'width: 90%']);
                        ?>
                        <span>Введите ваше имя и фамилию</span><br><br>

                        <?= $form->field($userRegistration, 'location_id', [
                            'template' => '{label}{input}{error}',
                        ])
                            ->dropDownList(Location::find()->select(['city', 'id'])->indexBy('id')->column(),
                                ['class' => 'multiple-select input town-select registration-town','style' => 'width: 100%',
                                'prompt' => ['text' => 'Выберите город', 'options' => ['class' => '']]]);
                        ?>
                        <span>Укажите город, чтобы находить подходящие задачи</span><br><br>

                        <?= $form->field($userRegistration, 'password', [
                            'template' => '{label}{input}{error}',
                        ])
                            ->passwordInput(['class' => 'input textarea', 'type' => 'password', 'style' => 'width: 90%'])
                        ?>
                        <span>Длина пароля от 8 символов</span>

                        <?= Html::submitButton('Создать аккаунт', ['class' => 'button button__registration']); ?>
                    <?php ActiveForm::end(); ?>
                </div>
            </section>

        </div>
    </main>
    <footer class="page-footer">
        <div class="main-container page-footer__container">
            <div class="page-footer__info">
                <p class="page-footer__info-copyright">
                    © 2019, ООО «ТаскФорс»
                    Все права защищены
                </p>
                <p class="page-footer__info-use">
                    «TaskForce» — это сервис для поиска исполнителей на разовые задачи.
                    mail@taskforce.com
                </p>
            </div>
            <div class="page-footer__links">
                <ul class="links__list">
                    <li class="links__item">
                        <a href="">Задания</a>
                    </li>
                    <li class="links__item">
                        <a href="">Мой профиль</a>
                    </li>
                    <li class="links__item">
                        <a href="">Исполнители</a>
                    </li>
                    <li class="links__item">
                        <a href="">Регистрация</a>
                    </li>
                    <li class="links__item">
                        <a href="">Создать задание</a>
                    </li>
                    <li class="links__item">
                        <a href="">Справка</a>
                    </li>
                </ul>
            </div>
            <div class="page-footer__copyright">
                <a>
                    <img class="copyright-logo"
                         src="/img/academy-logo.png"
                         width="185" height="63"
                         alt="Логотип HTML Academy">
                </a>
            </div>

            <div class="clipart-woman">
                <img src="/img/clipart-woman.png" width="238" height="450">
            </div>
            <div class="clipart-message">
                <div class="clipart-message-text">
                    <h2>Знаете ли вы, что?</h2>
                    <p>После регистрации вам будет доступно более
                        двух тысяч заданий из двадцати разных категорий.</p>
                    <p>В среднем, наши исполнители зарабатывают
                        от 500 рублей в час.</p>
                </div>
            </div>

        </div>

    </footer>
</div>
</body>
</html>
