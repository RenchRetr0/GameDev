<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\RegWidget;
use app\widgets\LoginWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?= (Yii::$app->user->isGuest ? RegWidget::widget([]) : ''); ?>
<?= (Yii::$app->user->isGuest ? LoginWidget::widget([]) : ''); ?>
<div class="wrap">
    <nav class="header" style="height: 5rem;">
        <a href="/gamedev/index">
            <img src="/png/amblema.png" class="i">
        </a>
        <ul class="mnu_top">
            <li><a href="/">Главная</a></li>
            <li><a href="#on">Наборы</a></li>
            <li><a href="#on">Товары</a></li>
            <li><a href="/site/about">О нас</a></li>
            <li><a href="/site/contact">Контакты</a></li>
        </ul>
        <div class="guest dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="true" id="dropdownBtn">
                <?php 
                    if(Yii::$app->user->isGuest){
                        echo '<img class="avatar" src="/png/Guest.png" alt="">';
                    }
                    else{
                        echo Html::img(Yii::$app->user->identity->img, ['class' => 'avatar']);
                    }
                ?>
                
            </a>
            <ul id="w2" class="dropdown-menu" id="dropdown">
                <?php
                    if(Yii::$app->user->isGuest){
                        echo ('<li data-toggle="modal" data-target="#login-modal">
                            <a href="#" tabindex="-1">Войти</a>
                        </li>
                        <li data-toggle="modal" data-target="#reg-modal">
                            <a href="#" tabindex="-1">Регистрация</a>
                        </li>');
                    }
                    else{
                        echo (
                        '<li>'
                        . '<div class="login">'
                        . Html::a(Html::img(Yii::$app->user->identity->img, ['class' => 'avatar1'])/*, Yii::$app->user->identity->login*/, '#on', ['class' => 'iop'])
                        . Yii::$app->user->identity->login
                        . '</div>'
                        . '</li>'
                        . '<li>'
                        . '<a href="#on" class="jyt">'
                        . '<div class="profil">'
                        . '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="svg">    <path d="M 12 3 A 4 4 0 0 0 8 7 A 4 4 0 0 0 12 11 A 4 4 0 0 0 16 7 A 4 4 0 0 0 12 3 z M 12 14 C 8.859 14 3 15.545 3 18.5 L 3 21 L 12.294922 21 C 12.197922 20.676 12.123219 20.342 12.074219 20 L 12.080078 20 C 12.033078 19.673 12 19.34 12 19 C 12 17.923 12.2515 16.907094 12.6875 15.996094 C 13.0115 15.316094 13.436125 14.69325 13.953125 14.15625 C 13.245125 14.05225 12.577 14 12 14 z M 18.064453 14 C 17.935453 14 17.8275 14.096609 17.8125 14.224609 L 17.695312 15.236328 C 17.211312 15.404328 16.774531 15.659281 16.394531 15.988281 L 15.457031 15.582031 C 15.339031 15.531031 15.202672 15.577453 15.138672 15.689453 L 14.201172 17.310547 C 14.137172 17.422547 14.166531 17.564625 14.269531 17.640625 L 15.076172 18.238281 C 15.029172 18.486281 15 18.74 15 19 C 15 19.26 15.028172 19.512766 15.076172 19.759766 L 14.271484 20.359375 C 14.168484 20.436375 14.138125 20.578453 14.203125 20.689453 L 15.138672 22.310547 C 15.202672 22.422547 15.340984 22.467016 15.458984 22.416016 L 16.394531 22.011719 C 16.773531 22.339719 17.211313 22.595672 17.695312 22.763672 L 17.8125 23.775391 C 17.8265 23.904391 17.935453 24 18.064453 24 L 19.935547 24 C 20.064547 24 20.1725 23.903391 20.1875 23.775391 L 20.304688 22.763672 C 20.788688 22.595672 21.225469 22.340719 21.605469 22.011719 L 22.542969 22.417969 C 22.660969 22.468969 22.797328 22.421547 22.861328 22.310547 L 23.798828 20.689453 C 23.862828 20.577453 23.833469 20.435375 23.730469 20.359375 L 22.923828 19.759766 C 22.971828 19.512766 23 19.26 23 19 C 23 18.74 22.971828 18.487234 22.923828 18.240234 L 23.728516 17.640625 C 23.831516 17.563625 23.861875 17.421547 23.796875 17.310547 L 22.861328 15.689453 C 22.797328 15.577453 22.659016 15.532984 22.541016 15.583984 L 21.605469 15.988281 C 21.226469 15.660281 20.788688 15.404328 20.304688 15.236328 L 20.1875 14.224609 C 20.1735 14.095609 20.064547 14 19.935547 14 L 18.064453 14 z M 19 17.25 C 19.966 17.25 20.75 18.033 20.75 19 C 20.75 19.966 19.966 20.75 19 20.75 C 18.034 20.75 17.25 19.966 17.25 19 C 17.25 18.033 18.034 17.25 19 17.25 z"></path></svg>'
                        . '<div class="iop">Профиль</div>'
                        . '</div>'
                        . '</a>'
                        . '<li>'
                        . '<a href="#on" class="jyt">'
                        . '<div class="profil">'
                        . '<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 486.569 486.569" style="enable-background:new 0 0 486.569 486.569;" xml:space="preserve" class="svg">
                            <g>
                                <path d="M146.069,320.369h268.1c30.4,0,55.2-24.8,55.2-55.2v-112.8c0-0.1,0-0.3,0-0.4c0-0.3,0-0.5,0-0.8c0-0.2,0-0.4-0.1-0.6
                                    c0-0.2-0.1-0.5-0.1-0.7s-0.1-0.4-0.1-0.6c-0.1-0.2-0.1-0.4-0.2-0.7c-0.1-0.2-0.1-0.4-0.2-0.6c-0.1-0.2-0.1-0.4-0.2-0.6
                                    c-0.1-0.2-0.2-0.4-0.3-0.7c-0.1-0.2-0.2-0.4-0.3-0.5c-0.1-0.2-0.2-0.4-0.3-0.6c-0.1-0.2-0.2-0.3-0.3-0.5c-0.1-0.2-0.3-0.4-0.4-0.6
                                    c-0.1-0.2-0.2-0.3-0.4-0.5c-0.1-0.2-0.3-0.3-0.4-0.5s-0.3-0.3-0.4-0.5s-0.3-0.3-0.4-0.4c-0.2-0.2-0.3-0.3-0.5-0.5
                                    c-0.2-0.1-0.3-0.3-0.5-0.4c-0.2-0.1-0.4-0.3-0.6-0.4c-0.2-0.1-0.3-0.2-0.5-0.3s-0.4-0.2-0.6-0.4c-0.2-0.1-0.4-0.2-0.6-0.3
                                    s-0.4-0.2-0.6-0.3s-0.4-0.2-0.6-0.3s-0.4-0.1-0.6-0.2c-0.2-0.1-0.5-0.2-0.7-0.2s-0.4-0.1-0.5-0.1c-0.3-0.1-0.5-0.1-0.8-0.1
                                    c-0.1,0-0.2-0.1-0.4-0.1l-339.8-46.9v-47.4c0-0.5,0-1-0.1-1.4c0-0.1,0-0.2-0.1-0.4c0-0.3-0.1-0.6-0.1-0.9c-0.1-0.3-0.1-0.5-0.2-0.8
                                    c0-0.2-0.1-0.3-0.1-0.5c-0.1-0.3-0.2-0.6-0.3-0.9c0-0.1-0.1-0.3-0.1-0.4c-0.1-0.3-0.2-0.5-0.4-0.8c-0.1-0.1-0.1-0.3-0.2-0.4
                                    c-0.1-0.2-0.2-0.4-0.4-0.6c-0.1-0.2-0.2-0.3-0.3-0.5s-0.2-0.3-0.3-0.5s-0.3-0.4-0.4-0.6c-0.1-0.1-0.2-0.2-0.3-0.3
                                    c-0.2-0.2-0.4-0.4-0.6-0.6c-0.1-0.1-0.2-0.2-0.3-0.3c-0.2-0.2-0.4-0.4-0.7-0.6c-0.1-0.1-0.3-0.2-0.4-0.3c-0.2-0.2-0.4-0.3-0.6-0.5
                                    c-0.3-0.2-0.6-0.4-0.8-0.5c-0.1-0.1-0.2-0.1-0.3-0.2c-0.4-0.2-0.9-0.4-1.3-0.6l-73.7-31c-6.9-2.9-14.8,0.3-17.7,7.2
                                    s0.3,14.8,7.2,17.7l65.4,27.6v61.2v9.7v74.4v66.5v84c0,28,21,51.2,48.1,54.7c-4.9,8.2-7.8,17.8-7.8,28c0,30.1,24.5,54.5,54.5,54.5
                                    s54.5-24.5,54.5-54.5c0-10-2.7-19.5-7.5-27.5h121.4c-4.8,8.1-7.5,17.5-7.5,27.5c0,30.1,24.5,54.5,54.5,54.5s54.5-24.5,54.5-54.5
                                    s-24.5-54.5-54.5-54.5h-255c-15.6,0-28.2-12.7-28.2-28.2v-36.6C126.069,317.569,135.769,320.369,146.069,320.369z M213.269,431.969
                                    c0,15.2-12.4,27.5-27.5,27.5s-27.5-12.4-27.5-27.5s12.4-27.5,27.5-27.5S213.269,416.769,213.269,431.969z M428.669,431.969
                                    c0,15.2-12.4,27.5-27.5,27.5s-27.5-12.4-27.5-27.5s12.4-27.5,27.5-27.5S428.669,416.769,428.669,431.969z M414.169,293.369h-268.1
                                    c-15.6,0-28.2-12.7-28.2-28.2v-66.5v-74.4v-5l324.5,44.7v101.1C442.369,280.769,429.669,293.369,414.169,293.369z"/>
                            </g>
                        </svg>'
                        . '<div class="iop">Корзина</div>'
                        . '</div>'
                        . '</a>'
                        . '</li>'
                        . '</li>'
                        . '<div class="line"></div>'
                        . '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Выйти',
                            ['class' => 'out']
                        )
                        . Html::endForm()
                        . '</li>');
                    }

                ?>
            </ul>
        </div>
    </nav>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <div class="mask">
        <svg width="612" height="612" viewBox="0 0 612 612" preserveAspectRatio="xMinYMin meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
                <linearGradient gradientUnits="userSpaceOnUse" x1="-819.2" x2="819.2" spreadMethod="pad" gradientTransform="matrix(0.313995361328125 0 0 0.313995361328125 305.95 297.1)" id="gradient0">
                    <stop offset="0" stop-color="#3ef5f0"/>
                    <stop offset="0.2901960784313726" stop-color="#3ef5f0"/>
                    <stop offset="0.7490196078431373" stop-color="#e248a0"/>
                    <stop offset="1" stop-color="#e248a0"/>
                </linearGradient>
                <linearGradient gradientUnits="userSpaceOnUse" x1="-819.2" x2="819.2" spreadMethod="pad" gradientTransform="matrix(0.2566986083984375 0 0 0.2566986083984375 259.05 275.75)" id="gradient1">
                    <stop offset="0" stop-color="#3ff6f0"/>
                    <stop offset="1" stop-color="#39b9f6"/>
                </linearGradient>
                <linearGradient gradientUnits="userSpaceOnUse" x1="-819.2" x2="819.2" spreadMethod="pad" gradientTransform="matrix(-0.1155242919921875 -0.19970703125 0.19970703125 -0.1155242919921875 258.6 440.1)" id="gradient2">
                    <stop offset="0" stop-color="#543864"/>
                    <stop offset="1" stop-color="#2f1f38"/>
                </linearGradient>
                <linearGradient gradientUnits="userSpaceOnUse" x1="-819.2" x2="819.2" spreadMethod="pad" gradientTransform="matrix(0.26922607421875 0 0 0.26922607421875 342.65 298.15)" id="gradient3">
                    <stop offset="0" stop-color="#f450aa"/>
                    <stop offset="1" stop-color="#a32f80"/>
                </linearGradient>
                <linearGradient gradientUnits="userSpaceOnUse" x1="-819.2" x2="819.2" spreadMethod="pad" gradientTransform="matrix(0.0058135986328125 -0.02166748046875 0.02166748046875 0.0058135986328125 417.15 449.1)" id="gradient4">
                    <stop offset="0" stop-color="#3ac3f4" stop-opacity="0"/>
                    <stop offset="1" stop-color="#144258" stop-opacity="0.4980392156862745"/>
                </linearGradient>
                <linearGradient gradientUnits="userSpaceOnUse" x1="-819.2" x2="819.2" spreadMethod="pad" gradientTransform="matrix(-0.0190887451171875 0.0050506591796875 -0.0050506591796875 -0.0190887451171875 332.45 240.6)" id="gradient5">
                    <stop offset="0" stop-color="#543864" stop-opacity="0"/>
                    <stop offset="1" stop-color="#23172a" stop-opacity="0.4980392156862745"/>
                </linearGradient>
                <linearGradient gradientUnits="userSpaceOnUse" x1="-819.2" x2="819.2" spreadMethod="pad" gradientTransform="matrix(0.01348876953125 0.013519287109375 -0.013519287109375 0.01348876953125 168.1 408.3)" id="gradient6">
                    <stop offset="0" stop-color="#f450aa" stop-opacity="0"/>
                    <stop offset="1" stop-color="#2c0c22" stop-opacity="0.24705882352941178"/>
                </linearGradient>
                <linearGradient gradientUnits="userSpaceOnUse" x1="-819.2" x2="819.2" spreadMethod="pad" gradientTransform="matrix(-0.1155242919921875 -0.19970703125 0.19970703125 -0.1155242919921875 179.25 486)" id="gradient7">
                    <stop offset="0" stop-color="#543864"/>
                    <stop offset="1" stop-color="#2f1f38"/>
                </linearGradient>
                <linearGradient gradientUnits="userSpaceOnUse" x1="-819.2" x2="819.2" spreadMethod="pad" gradientTransform="matrix(0.26922607421875 0 0 0.26922607421875 342.6 199.6)" id="gradient8">
                    <stop offset="0" stop-color="#f450aa"/>
                    <stop offset="1" stop-color="#a32f80"/>
                </linearGradient>
                <linearGradient gradientUnits="userSpaceOnUse" x1="-819.2" x2="819.2" spreadMethod="pad" gradientTransform="matrix(0.2502899169921875 0 0 0.2502899169921875 259.05 275.75)" id="gradient9">
                    <stop offset="0" stop-color="#3ff6f0"/>
                    <stop offset="1" stop-color="#39b9f6"/>
                </linearGradient>
                <linearGradient gradientUnits="userSpaceOnUse" x1="-819.2" x2="819.2" spreadMethod="pad" gradientTransform="matrix(0.26922607421875 0 0 0.26922607421875 342.6 403.4)" id="gradient10">
                    <stop offset="0" stop-color="#f450aa"/>
                    <stop offset="1" stop-color="#a32f80"/>
                </linearGradient>
                <linearGradient gradientUnits="userSpaceOnUse" x1="-819.2" x2="819.2" spreadMethod="pad" gradientTransform="matrix(-0.1155242919921875 -0.19970703125 0.19970703125 -0.1155242919921875 417.65 348.1)" id="gradient11">
                    <stop offset="0" stop-color="#543864"/>
                    <stop offset="1" stop-color="#2f1f38"/>
                </linearGradient>

                <filter id="penrose-glow">
                    <feGaussianBlur stdDeviation="20" />
                    <feComponentTransfer>
                        <feFuncA type="linear" slope="1.5" />
                    </feComponentTransfer>
                    <feBlend in2="SourceGraphic" />
                </filter>
            </defs>

            <g>
                <path filter="url(#penrose-glow)" class="penrose-bg" fill="url(#gradient0)" d="M48.75 479.35 L282.8 72.2 329.15 72.2 563.2 479.35 542.5 522 69.45 522 48.75 479.35 M167.2 436.65 L444.85 436.65 305.95 195.2 167.2 436.65"/>
                <path fill="url(#gradient1)" d="M330.35 74.35 L122.05 436.65 444.85 436.65 469.35 479.35 48.75 479.35 282.8 72.2 329.15 72.2 330.35 74.35"/>
                <path fill="url(#gradient2)" d="M48.75 479.35 L469.35 479.35 305.95 195.2 328.55 156 542.5 522 69.45 522 48.75 479.35"/>
                <path fill="url(#gradient3)" d="M122.05 436.65 L330.35 74.35 563.2 479.35 542.5 522 328.55 156 167.2 436.65 122.05 436.65"/>
                <g class="circle-spinner">
                    <path fill="#ebebeb" d="M448.45 274.85 Q434 250.15 412.05 231.7 390.05 213.25 363.2 203.3 335.6 193.1 306 193.1 284.3 193.1 263.35 198.7 242.35 204.35 223.55 215.2 L205.45 183.8 Q228.4 170.55 253.95 163.7 279.55 156.85 306 156.85 342.1 156.85 375.75 169.3 408.5 181.4 435.3 203.9 462.1 226.4 479.75 256.55 497.85 287.55 504.1 323.1 L468.45 329.4 Q463.3 300.25 448.45 274.85"/>
                    <path fill="#ebebeb" d="M176.75 203.95 L200 231.65 Q172 255.15 156.55 288.3 141.1 321.45 141.1 358.05 141.1 402.25 163.2 440.5 185.25 478.8 223.55 500.9 L205.45 532.25 Q158.75 505.3 131.8 458.6 104.85 411.95 104.85 358.05 104.85 313.45 123.7 273 142.6 232.6 176.75 203.95"/>
                    <path fill="#ebebeb" d="M306 559.2 Q270.55 559.2 237.25 547.05 L249.6 513.05 Q276.95 522.95 306 522.95 339.55 522.95 370.2 510 399.8 497.5 422.65 474.65 445.45 451.85 458 422.25 470.95 391.6 470.95 358.05 L507.2 358.05 Q507.2 398.95 491.4 436.35 476.1 472.45 448.25 500.25 420.4 528.1 384.3 543.4 346.95 559.2 306 559.2"/>
                    <path fill="#9900ff" fill-opacity="0" d="M508.5 358 Q508.5 441.9 449.2 501.2 389.85 560.5 306 560.5 222.15 560.5 162.8 501.2 103.5 441.9 103.5 358 103.5 274.15 162.8 214.85 222.15 155.5 306 155.5 389.85 155.5 449.2 214.85 508.5 274.15 508.5 358"/>
                </g>
                <path fill="url(#gradient4)" d="M360.25 436.65 L444.85 436.65 469.35 479.35 360.25 479.35 360.25 436.65"/>
                <path fill="url(#gradient5)" d="M374.85 315 L305.95 195.25 305.95 195.2 328.55 156 408.55 292.9 374.85 315"/>
                <path fill="url(#gradient6)" d="M205.05 370.8 L167.2 436.65 122.05 436.65 171.85 350.05 205.05 370.8"/>
                <path fill="url(#gradient7)" d="M48.75 479.35 L305.95 479.35 305.95 522 69.45 522 48.75 479.35"/>
                <path fill="url(#gradient8)" d="M328.55 156 L232.7 322.65 198.8 303.15 329.15 76.55 328.55 156"/>
                <path fill="url(#gradient9)" d="M330.35 74.35 L198.8 303.15 162.2 282 282.8 72.2 329.15 72.2 330.35 74.35 M306 479.35 L48.75 479.35 73.3 436.65 306 436.65 306 479.35"/>
                <path fill="url(#gradient10)" d="M418.25 309.45 L451.35 284.75 563.2 479.35 542.5 522 540.65 520.95 417.5 310.1 418.25 309.5 420.2 312.8 420.35 312.9 418.25 309.45"/>
                <path fill="url(#gradient11)" d="M420.35 312.9 L542.5 522 469.35 479.35 385.65 333.75 418.25 309.5 420.2 312.8 420.35 312.9"/>
            </g>
        </svg>
    </div>
    <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
