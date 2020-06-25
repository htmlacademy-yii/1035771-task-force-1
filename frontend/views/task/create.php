<?php

use frontend\models\TaskCreate;
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
            <section class="create__task">
                <h1>Публикация нового задания</h1>
                <div class="create__task-main">
                    <?php $form=ActiveForm::begin(['id' => 'task-form', 'enableClientValidation' => true, 'enableAjaxValidation' => true, 'options' => ['class' => 'create__task-form form-create', ['enctype' => 'multipart/form-data']]]); ?>

                    <form class="create__task-form form-create" action="/" enctype="multipart/form-data" id="task-form">

                        <label for="10">Мне нужно</label>
                        <?= $form->field($task, 'title', [
                            'template' => '{input}',
                        ])
                            ->input('text', ['class' => 'input textarea', 'placeholder' => "Повесить полку", 'style' => 'width: 94%']);
                        ?>
                        <span>Кратко опишите суть работы</span>

                        <label for="11">Подробности задания</label>
                        <?= $form->field($task, 'description', [
                            'template' => '{input}',
                        ])
                            ->textarea(['class' => 'input textarea', 'placeholder' => "Place your text", 'style' => 'width: 94%', 'rows'=>'7']);
                        ?>
                        <span>Укажите все пожелания и детали, чтобы исполнителям было проще соориентироваться</span>

                        <label for="12">Категория</label>
                        <?= $form->field($task, 'category_id', [
                            'template' => '{input}',
                        ])
                            ->dropDownList(Category::find()->select(['title', 'id'])->indexBy('id')->column(),
                                ['class' => 'multiple-select input multiple-select-big','style' => 'width: 100%',
                                    'prompt' => ['text' => 'Выберите категорию', 'options' => ['class' => '']]]);
                        ?>
                        <span>Выберите категорию</span>

                        <label>Файлы</label>
                        <span>Загрузите файлы, которые помогут исполнителю лучше выполнить или оценить работу</span>
                        <?= $form->field($task, 'url_file', [
                            'template' => '{input}',
                        ])
                            ->fileInput(['multiple' => true, 'class' => 'create__file', 'placeholder' => "Добавить новый файл", 'style' => 'width: 100%']);
                        ?>

                            <!--                          <input type="file" name="files[]" class="dropzone">-->

                        <label for="13">Локация</label>
                        <input class="input-navigation input-middle input" id="13" type="search" name="q" placeholder="Санкт-Петербург, Калининский район">
                        <span>Укажите адрес исполнения, если задание требует присутствия</span>

                        <div class="create__price-time">
                            <div class="create__price-time--wrapper">
                                <label for="14">Бюджет</label>
                                <?= $form->field($task, 'budget', [
                                    'template' => '{input}',
                                ])
                                    ->textarea(['class' => 'input textarea input-money', 'placeholder' => "1000", 'style' => 'width: 86%', 'rows'=>'1']);
                                ?>
                                <span>Не заполняйте для оценки исполнителем</span>
                            </div>
                            <div class="create__price-time--wrapper">
                                <label for="15">Срок исполнения</label>
                                <?= $form->field($task, 'deadline', [
                                    'template' => '{input}',
                                ])
                                    ->input('date', ['class' => 'input-middle input input-date', 'placeholder' => "10.11, 15:00", 'style' => 'width: 86%', 'rows'=>'1']);
                                ?>
                                <span>Укажите крайний срок исполнения</span>
                            </div>
                        </div>
                    </form>
                    <?php ActiveForm::end(); ?>
                    <div class="create__warnings">
                        <div class="warning-item warning-item--advice">
                            <h2>Правила хорошего описания</h2>
                            <h3>Подробности</h3>
                            <p>Друзья, не используйте случайный<br>
                                контент – ни наш, ни чей-либо еще. Заполняйте свои
                                макеты, вайрфреймы, мокапы и прототипы реальным
                                содержимым.</p>
                            <h3>Файлы</h3>
                            <p>Если загружаете фотографии объекта, то убедитесь,
                                что всё в фокусе, а фото показывает объект со всех
                                ракурсов.</p>
                        </div>
                        <?php if ($errors): ?>
                        <div class="warning-item warning-item--error">
                            <h2>Ошибки заполнения формы</h2>
                            <?php foreach ($errors as $name => $error):?>
                            <h3><?= $task->attributeLabels()[$name] ?></h3>
                            <p>
                                <?php foreach ($error as $description): ?>
                                    <?= $description ?> <br>
                                <?php endforeach; ?>
                            </p>
                            <?php endforeach;?>

                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <button form="task-form" class="button" type="submit">Опубликовать</button>
            </section>
        </div>
    </main>

</div>
<script src="js/dropzone.js"></script>
<script>
    var dropzone = new Dropzone("div.create__file", {url: "/", paramName: "Attach"});
</script>
</body>
</html>
