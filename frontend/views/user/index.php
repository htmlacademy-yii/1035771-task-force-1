<?php
use yii\widgets\ActiveForm;
use frontend\models\Category;
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
            <section class="user__search">
                <div class="user__search-link">
                    <p>Сортировать по:</p>
                    <ul class="user__search-list">
                        <li class="user__search-item user__search-item--current">
                            <a href="#" class="link-regular">Рейтингу</a>
                        </li>
                        <li class="user__search-item">
                            <a href="#" class="link-regular">Числу заказов</a>
                        </li>
                        <li class="user__search-item">
                            <a href="#" class="link-regular">Популярности</a>
                        </li>
                    </ul>
                </div>
                <div class="content-view__feedback-card user__search-wrapper">
                    <?php foreach ($users as $user): ?>
                    <div class="feedback-card__top">
                        <div class="user__search-icon">
                            <a href="#"><img src="/img/man-glasses.jpg" width="65" height="65"></a>
                            <span>17 заданий</span>
                            <span><?=$user->views?> отзывов</span>
                        </div>
                        <div class="feedback-card__top--name user__search-card">
                            <p class="link-name"><a href="/user/view/<?php echo $user->id?>" class="link-regular"><?=$user->name?></a></p>
                            <span></span><span></span><span></span><span></span><span class="star-disabled"></span>
                            <b>4.25</b>
                            <p class="user__search-content">
                                <?=$user->info?>
                            </p>
                        </div>
                        <span class="new-task__time">Был на сайте <?= Yii::$app->formatter->asRelativeTime($user->last_active_time); ?></span>
                    </div>

                    <div class="link-specialization user__search-link--bottom">
                        <?php foreach ($user->categories as $category): ?>
                        <a href="#" class="link-regular"><?=$category->title?></a>
                        <?php endforeach?>
                    </div>
                    <?php endforeach?>
                </div>
            </section>
            <section  class="search-task">
                <div class="search-task__wrapper">

                    <?php $form=ActiveForm::begin(['id' => 'search-task-form', 'options' => ['class' => 'search-task__form'], 'method'=>'get']); ?>
                        <fieldset class="search-task__categories">
                            <legend>Категории</legend>

                            <?php echo $form->field($formUser, 'categories')
                                ->checkboxList(Category::find()->select(['title', 'id'])->indexBy('id')->column(),
                                    ['item' => function ($index, $label, $name, $checked, $value) use ($formUser) {
                                        $checked = $checked ? 'checked':'';
                                        return '<input class="visually-hidden checkbox__input" id="categories_' . $value . '" type="checkbox" name="' . $name . '" value="' . $value . '"' . $checked . '>
                                        <label for="categories_' . $value . '">' . $label . '</label>';
                                    }])->label(false);
                            ?>

                        </fieldset>
                        <fieldset class="search-task__categories">
                            <legend>Дополнительно</legend>

                            <?php echo $form->field($formUser, 'free', [
                                'template' => '{input}{label}',
                                'options' => ['class' => ''],
                            ])
                                ->checkbox(['class' => 'visually-hidden checkbox__input'], false);
                            ?>


                            <?php echo $form->field($formUser, 'online', [
                                'template' => '{input}{label}',
                                'options' => ['class' => ''],
                            ])
                                ->checkbox(['class' => 'visually-hidden checkbox__input'], false);
                            ?>

                            <?php echo $form->field($formUser, 'review', [
                                'template' => '{input}{label}',
                                'options' => ['class' => ''],
                            ])
                                ->checkbox(['class' => 'visually-hidden checkbox__input'], false);
                            ?>

                        </fieldset>

                    <?php echo $form->field($formUser, 'search', [
                        'template' => '{label}{input}',
                        'options' => ['class' => ''],
                        'labelOptions' => ['class' => 'search-task__name', 'style' => 'display: block;']
                    ])
                        ->input('text', ['class' => 'input-middle input', 'style' => 'display: block']);
                    ?>

                        <button class="button" type="submit">Искать</button>

                    <?php ActiveForm::end(); ?>
                </div>
            </section>
        </div>
    </main>

</div>
</body>
</html>
