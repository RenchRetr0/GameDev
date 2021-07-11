<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => ['/gamedev/index'],
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right', 'tag' => 'div'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/gamedev/index']],
            ['label' => 'О нас', 'url' => ['/site/about']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],
            //['label' => 'Регистрация', 'url' => ['gamedev/signup'], 'visible' => Yii::$app->user->isGuest],
            Yii::$app->user->isGuest ? (
            ['label' => Html::img("/png/Guest.png", ['class' => 'avatar1']), 'encode' => false, 'span' => false, 'items' => [
                ['label' => 'Регистрация', 'url' => ['/gamedev/signup'], ['class' => 'out']],
                ['label' => 'Войти', 'url' => ['/site/login']],
            ]]
            ) : (
                ['label' => Yii::$app->user->identity->login, 'items' => [
                    //['label' => 'Выйти', 'url' => ['/site/logout'], 'post'],
                    '<li>'
                    . Html::img("/png/Guest.png")
                    //.Html::a(Html::img("/png/Guest.png"/*, ['class' => 'height_avatar']*/)/*, '#', ['data-toggle' => 'dropdown', 'data-offset' => '50,-60', 'class' => 'user-avatar']*/)
                    . '</li>'
                    . '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Выйти',
                        ['class' => 'out']
                    )
                    . Html::endForm()
                    . '</li>'
                ]]
            )
        ],
    ]);
    NavBar::end();
    ?>

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
