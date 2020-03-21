<?php
use yii\widgets\ActiveForm;
use frontend\models\Category;
?>

<body>
<div class="table-layout">
    <main class="page-main">
        <div class="main-container page-container">
            <section class="new-task">
                <div class="new-task__wrapper">
                    <h1>Новые задания</h1>
                    <?php foreach ($task as $value): ?>
                    <div class="new-task__card">
                        <div class="new-task__title">
                            <a href="#" class="link-regular"><h2><?=$value->title;?></h2></a>
                            <a  class="new-task__type link-regular" href="#"><p><?=$value->categories->title;?></p></a>
                        </div>
                        <div class="new-task__icon new-task__icon--<?=$value->categories->icon;?>"></div>
                        <p class="new-task_description">
                            <?=$value->description;?>
                        </p>
                        <b class="new-task__price new-task__price--translation"><?=$value->budget;?><b> ₽</b></b>
                        <p class="new-task__place"><?=$value->locations->city;?></p>
                        <span class="new-task__time"><?= Yii::$app->formatter->asRelativeTime($value->creation_time); ?></span>
                    </div>
                    <?php endforeach?>
            </section>
            <section  class="search-task">
                <div class="search-task__wrapper">
                    <?php $form=ActiveForm::begin(['id' => 'search-task-form', 'options' => ['class' => 'search-task__form'], 'method'=>'get']); ?>
                    <fieldset class="search-task__categories">
                        <legend>Категории</legend>

                        <?php echo $form->field($model, 'categories')
                            ->checkboxList(Category::find()->select(['title', 'id'])->indexBy('id')->column(),
                                ['item' => function ($index, $label, $name, $checked, $value) use ($model) {
                                $checked = $checked ? 'checked':'';
                                return '<input class="visually-hidden checkbox__input" id="categories_' . $value . '" type="checkbox" name="' . $name . '" value="' . $value . '"' . $checked . '>
                                        <label for="categories_' . $value . '">' . $label . '</label>';
                            }])->label(false);
                        ?>

                    </fieldset>
                    <fieldset class="search-task__categories">
                        <legend>Дополнительно</legend>

                        <?php echo $form->field($model, 'withoutProposals', [
                        'template' => '{input}{label}',
                        'options' => ['class' => ''],
                    ])
                        ->checkbox(['class' => 'visually-hidden checkbox__input'], false);
                        ?>

                        <?php echo $form->field($model, 'remote', [
                            'template' => '{input}{label}',
                            'options' => ['class' => ''],
                        ])
                        ->checkbox(['class' => 'visually-hidden checkbox__input'], false);
                        ?>

                    </fieldset>

                        <?php echo $form->field($model, 'period', [
                            'template' => '{label}{input}',
                            'options' => ['class' => ''],
                            'labelOptions' => ['class' => 'search-task__name']
                        ])
                            ->dropDownList([
                                'all'=>'За всё время',
                                'day'=>'За день',
                                'week'=>'За неделю',
                                'month'=>'За месяц',
                                ],
                                ['class' => 'multiple-select input', 'style' => 'display: block']);?>

                        <?php echo $form->field($model, 'search', [
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
