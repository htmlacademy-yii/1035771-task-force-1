
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
                    <form class="search-task__form" name="test" method="post" action="#">
                        <fieldset class="search-task__categories">
                            <legend>Категории</legend>
                            <input class="visually-hidden checkbox__input" id="1" type="checkbox" name="" value="" checked>
                            <label for="1">Курьерские услуги </label>
                            <input class="visually-hidden checkbox__input" id="2" type="checkbox" name="" value="" checked>
                            <label  for="2">Грузоперевозки </label>
                            <input class="visually-hidden checkbox__input" id="3" type="checkbox" name="" value="">
                            <label  for="3">Переводы </label>
                            <input class="visually-hidden checkbox__input" id="4" type="checkbox" name="" value="">
                            <label  for="4">Строительство и ремонт </label>
                            <input class="visually-hidden checkbox__input" id="5" type="checkbox" name="" value="">
                            <label  for="5">Выгул животных </label>
                        </fieldset>
                        <fieldset class="search-task__categories">
                            <legend>Дополнительно</legend>
                            <input class="visually-hidden checkbox__input" id="6" type="checkbox" name="" value="">
                            <label for="6">Без откликов</label>
                            <input class="visually-hidden checkbox__input" id="7" type="checkbox" name="" value="" checked>
                            <label for="7">Удаленная работа </label>
                        </fieldset>
                        <label class="search-task__name" for="8">Период</label>
                        <select class="multiple-select input" id="8"size="1" name="time[]">
                            <option value="day">За день</option>
                            <option selected value="week">За неделю</option>
                            <option value="month">За месяц</option>
                        </select>
                        <label class="search-task__name" for="9">Поиск по названию</label>
                        <input class="input-middle input" id="9" type="search" name="q" placeholder="">
                        <button class="button" type="submit">Искать</button>
                    </form>
                </div>
            </section>
        </div>
    </main>

</div>
</body>
