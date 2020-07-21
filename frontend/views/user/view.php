<?php use frontend\models\UserCategory;
$id = Yii::$app->request->get('id');
$count = UserCategory::find()
    ->where(['user_id' => $id])
    ->count();
var_dump($count)?>

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
            <section class="content-view">
                <div class="user__card-wrapper">
                    <div class="user__card">
                        <img src="/img/man-hat.png" width="120" height="120" alt="Аватар пользователя">
                        <div class="content-view__headline">
                            <h1><?=$user['name'];?></h1>
                            <p>Россия, <?=$user->locations->city;?>, <?=Yii::$app->formatter->asRelativeTime($user->birthday) ?? '';?> лет</p>
                            <div class="profile-mini__name five-stars__rate">
                                <span></span><span></span><span></span><span></span><span class="star-disabled"></span>
                                <b>4.25</b>
                            </div>
                            <b class="done-task">Выполнил <?=count($user->taskCustomer);?> заказов</b><b class="done-review">Получил <?=count($user->reviewExecutor);?> отзывов</b>
                        </div>
                        <div class="content-view__headline user__card-bookmark user__card-bookmark--current">
                            <span>Был на сайте <?= Yii::$app->formatter->asRelativeTime($user['last_active_time']); ?></span>
                            <a href="#"><b></b></a>
                        </div>
                    </div>
                    <div class="content-view__description">
                        <p><?=$user['info'];?></p>
                    </div>
                    <div class="user__card-general-information">
                        <div class="user__card-info">
                            <h3 class="content-view__h3">Специализации</h3>
                            <div class="link-specialization">

                                <?php foreach ($user->categories as $category) : ?>
                                <a href="#" class="link-regular"><?=$category['title'];?></a>
                                <? endforeach;?>

                            </div>
                            <h3 class="content-view__h3">Контакты</h3>
                            <div class="user__card-link">
                                <a class="user__card-link--tel link-regular" href="#"><?=$user['phone'];?></a>
                                <a class="user__card-link--email link-regular" href="#"><?=$user['email'];?></a>
                                <a class="user__card-link--skype link-regular" href="#"><?=$user['skype'];?></a>
                            </div>
                        </div>
                        <div class="user__card-photo">
                            <h3 class="content-view__h3">Фото работ</h3>
                            <?php foreach ($user->files as $attachment) : ?>
                            <a href="#"><img src="<?=$attachment['url'];?>" width="85" height="86" alt="Фото работы"></a>
                            <? endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="content-view__feedback">
                    <h2>Отзывы <span>(<?=count($user->reviewExecutor);?>)</span></h2>
                    <div class="content-view__feedback-wrapper reviews-wrapper">
                        <div class="feedback-card__reviews">
                            <?php foreach ($user->reviewExecutor as $review) : ?>
                            <p class="link-task link">Задание <a href="/task/view/<?= $review->task->id ?>" class="link-regular">«<?=$review->task->title;?>»</a></p>
                            <div class="card__review">
                                <a href="#"><img src="/img/man-glasses.jpg" width="55" height="54"></a>
                                <div class="feedback-card__reviews-content">
                                    <p class="link-name link"><a href="#" class="link-regular"><?=$review->customer->name;?></a></p>
                                    <p class="review-text">
                                        <?=$review->description;?>
                                    </p>
                                </div>
                                <div class="card__review-rate">
                                    <p class="five-rate big-rate"><?=$review->score;?><span></span></p>
                                </div>
                            </div>
                            <? endforeach;?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="connect-desk">
                <div class="connect-desk__chat">
                    <h3>Переписка</h3>
                    <div class="chat__overflow">
                        <div class="chat__message chat__message--out">
                            <p class="chat__message-time">10.05.2019, 14:56</p>
                            <p class="chat__message-text">Привет. Во сколько сможешь
                                приступить к работе?</p>
                        </div>
                        <div class="chat__message chat__message--in">
                            <p class="chat__message-time">10.05.2019, 14:57</p>
                            <p class="chat__message-text">На задание
                                выделены всего сутки, так что через час</p>
                        </div>
                        <div class="chat__message chat__message--out">
                            <p class="chat__message-time">10.05.2019, 14:57</p>
                            <p class="chat__message-text">Хорошо. Думаю, мы справимся</p>
                        </div>
                    </div>
                    <p class="chat__your-message">Ваше сообщение</p>
                    <form class="chat__form">
                        <textarea class="input textarea textarea-chat" rows="2" name="message-text" placeholder="Текст сообщения"></textarea>
                        <button class="button chat__button" type="submit">Отправить</button>
                    </form>
                </div>
            </section>
        </div>
    </main>

</div>
</body>
</html>
