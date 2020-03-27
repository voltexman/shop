<?php

use kartik\growl\Growl;
use shop\entities\other\contacts\Soc;
use shop\helpers\CategoryHelper;
use shop\helpers\ContactHelper;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

/** @var $content string */
/** @var $searchForm shop\forms\shop\search\SearchForm */

$searchForm = isset($this->params['searchForm']) ? $this->params['searchForm'] : null;


?>


<?php $this->beginContent('@frontend/views/layouts/layout.php') ?>

<div class="wrapper <?= !empty($this->params['home-page']) ? 'wrapper__main' : 'wrapper__another'?> ">
    <!-- Custom HTML -->
    <header>
        <div class="pre-header">
            <div class="container">
                <div class="custom_row">
                    <div class="header-left-column column">
                        <div class="mail">
                            <a href="mailto:<?= ContactHelper::getEmail()->email ?>"><?= ContactHelper::getEmail()->email ?></a>
                        </div>
                        <div class="social_list_wrapper">
                            <ul class="social_list list-style list-vertival">
                                <li>
                                    <a href="<?= ContactHelper::getSocByName(Soc::TYPE_VIBER)->link ?>" title="<?= ContactHelper::getSocByName(Soc::TYPE_VIBER)->name ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g><g><path fill="#7d7d7d" d="M16.252 14.225l-.465.466c-.658.658-2.172.606-3.145.418-3.234-.625-7.005-4.28-7.732-7.445-.36-1.568-.162-2.931.358-3.452l.465-.465a.659.659 0 0 1 .931 0L8.525 5.61a.652.652 0 0 1 .193.465.65.65 0 0 1-.193.464l-.465.466a1.319 1.319 0 0 0 0 1.861l3.074 3.034a1.315 1.315 0 0 0 1.861 0l.465-.465a.688.688 0 0 1 .931 0l1.861 1.86a.657.657 0 0 1 0 .931zM10 0C4.507 0 0 4.507 0 10c0 1.813.489 3.577 1.416 5.121L0 20l4.879-1.416A9.933 9.933 0 0 0 10 20c5.493 0 10-4.507 10-10S15.493 0 10 0z"/></g></g></svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= ContactHelper::getSocByName(Soc::TYPE_TELEGRAM)->link ?>" title="<?= ContactHelper::getSocByName(Soc::TYPE_TELEGRAM)->name ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20"><g><g><path fill="#7d7d7d" d="M16.253 5.738l-6.965 6.353-.868 3.27-1.602-4.008zm-10.778 5.85l2.83 7.075 3.685-3.684L18.307 20l4.449-20L0 9.478z"/></g></g></svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= ContactHelper::getSocByName(Soc::TYPE_YOUTUBE)->link ?>" title="<?= ContactHelper::getSocByName(Soc::TYPE_YOUTUBE)->name ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="20" viewBox="0 0 27 20"><g><g><g><path fill="#7d7d7d" d="M9.282 15.303V4.847l9.256 5.142zM22.41 0H3.846A3.85 3.85 0 0 0 0 3.846v12.308A3.85 3.85 0 0 0 3.846 20H22.41a3.85 3.85 0 0 0 3.846-3.846V3.846A3.85 3.85 0 0 0 22.41 0z"/></g><g><path fill="#7d7d7d" d="M10.82 7.46v5.186l4.59-2.635z"/></g></g></g></svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= ContactHelper::getSocByName(Soc::TYPE_INSTAGRAM)->link ?>" title="<?= ContactHelper::getSocByName(Soc::TYPE_INSTAGRAM)->name ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g><g><g><path fill="#7d7d7d" d="M15.898 5.86a1.76 1.76 0 0 1-1.757-1.758c0-.97.788-1.758 1.757-1.758.97 0 1.758.788 1.758 1.758a1.76 1.76 0 0 1-1.758 1.757zm-5.859 9.374a5.28 5.28 0 0 1-5.273-5.273 5.28 5.28 0 0 1 5.273-5.273 5.28 5.28 0 0 1 5.273 5.273 5.28 5.28 0 0 1-5.273 5.273zM17.07 0H2.93A2.933 2.933 0 0 0 0 2.93v14.14A2.933 2.933 0 0 0 2.93 20h14.14A2.933 2.933 0 0 0 20 17.07V2.93A2.933 2.933 0 0 0 17.07 0z"/></g><g><path fill="#7d7d7d" d="M15.898 3.516a.586.586 0 1 0 .001 1.172.586.586 0 0 0 0-1.172z"/></g><g><path fill="#7d7d7d" d="M10.04 5.86a4.107 4.107 0 0 0-4.103 4.1 4.107 4.107 0 0 0 4.102 4.103 4.107 4.107 0 0 0 4.102-4.102 4.107 4.107 0 0 0-4.102-4.102z"/></g></g></g></svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= ContactHelper::getSocByName(Soc::TYPE_FACEBOOK)->link ?>" title="<?= ContactHelper::getSocByName(Soc::TYPE_FACEBOOK)->name ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g><g><path fill="#7d7d7d" d="M17.07 0H2.93A2.933 2.933 0 0 0 0 2.93v14.14A2.933 2.933 0 0 0 2.93 20h5.898v-7.07H6.484V9.414h2.344V7.031a3.52 3.52 0 0 1 3.516-3.515h3.554V7.03h-3.554v2.383h3.554l-.585 3.516h-2.97V20h4.727A2.933 2.933 0 0 0 20 17.07V2.93A2.933 2.933 0 0 0 17.07 0z"/></g></g></svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="header-right-column column">
                        <div class="enter">
                            <div class="enter_img">
                                <div class="enter_icon icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"><g><g><path d="M16.984 19.253c-.14.101-.283.2-.427.294l-.2.128c-.189.117-.381.228-.577.332l-.13.067c-.45.23-.917.43-1.396.59l-.05.018c-.251.083-.505.157-.762.22h-.002c-.26.065-.522.118-.786.162-.007 0-.014.002-.022.004-.248.04-.498.07-.75.091l-.133.01c-.249.019-.498.031-.749.031-.254 0-.506-.012-.758-.031l-.13-.01a10.345 10.345 0 0 1-.756-.093l-.034-.006a10.162 10.162 0 0 1-1.556-.389l-.047-.016c-.252-.085-.5-.18-.745-.285l-.005-.002c-.231-.1-.458-.21-.682-.327l-.088-.045a10.28 10.28 0 0 1-.775-.462c-.182-.119-.361-.242-.536-.373l-.053-.042.039-.021 3.162-1.726c.544-.296.882-.866.882-1.485v-1.441l-.092-.111c-.009-.01-.874-1.062-1.2-2.487l-.037-.158-.136-.088a.663.663 0 0 1-.308-.557V9.627c0-.186.079-.36.223-.49l.132-.119V6.79l-.004-.052c0-.01-.119-.972.559-1.744C8.633 4.334 9.625 4 11 4c1.37 0 2.358.332 2.938.986.677.765.566 1.745.566 1.753l-.004 2.28.132.12c.144.129.223.303.223.489v1.418a.668.668 0 0 1-.473.63l-.198.06-.064.199a7.4 7.4 0 0 1-.999 2.013c-.105.148-.207.279-.294.38l-.1.112v1.48c0 .645.359 1.225.936 1.513l3.387 1.693.064.033c-.043.033-.087.063-.13.094zM.8 11C.8 5.376 5.376.8 11 .8S21.2 5.376 21.2 11c0 3.03-1.33 5.756-3.436 7.625a2.998 2.998 0 0 0-.357-.215l-3.387-1.693a.887.887 0 0 1-.492-.797v-1.183c.078-.097.16-.206.246-.327.439-.619.79-1.308 1.047-2.049.507-.24.834-.745.834-1.315V9.628c0-.347-.127-.684-.355-.948V6.813c.02-.207.094-1.379-.753-2.345C13.81 3.626 12.617 3.2 11 3.2c-1.616 0-2.81.426-3.547 1.267-.847.967-.774 2.138-.753 2.346V8.68c-.227.264-.355.6-.355.947v1.418c0 .44.198.851.536 1.129.324 1.269.991 2.23 1.237 2.555v1.158a.892.892 0 0 1-.464.783L4.49 18.395c-.101.055-.201.119-.301.19A10.176 10.176 0 0 1 .8 11zM22 11c0-6.065-4.935-11-11-11S0 4.935 0 11c0 3.204 1.378 6.091 3.57 8.103l-.01.01.357.3c.023.02.048.036.071.055.19.157.386.306.586.45a11.202 11.202 0 0 0 .852.558l.148.086c.245.14.496.271.752.392l.057.026c.835.388 1.727.673 2.66.842l.074.013c.29.05.582.09.879.117l.108.008c.295.024.594.04.896.04.3 0 .595-.016.889-.04.037-.002.074-.004.111-.008.294-.026.585-.065.872-.114l.074-.014a10.9 10.9 0 0 0 2.623-.822l.092-.042a11.056 11.056 0 0 0 1.532-.875c.074-.05.147-.104.22-.157.175-.126.348-.256.515-.393.038-.03.078-.056.114-.087l.366-.305-.01-.01A10.972 10.972 0 0 0 22 11z"/></g></g></svg>
                                </div>
                            </div>
                            <div class="enter_user_name">
                                <a href="#">
                                    <span>Личный кабинет</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="midle-header">
            <div class="container">
                <div class="custom_row">
                    <div class="header-left-column column">
                        <div class="logo">
                            <a href="/">
                                <img src="<?= Url::base() ?>/img/MAGAZIN.png" alt="MAGAZIN.png">
                            </a>
                        </div>
                        <div class="page_nemu">
                            <button class="burger_two">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            <nav class="page_nemu_nav">
                                <div class="page_nemu_nav_logo">
                                    <img src="<?= Url::base() ?>/img/MAGAZIN.png" alt="MAGAZIN.png">
                                </div>
                                <div class="page_nemu_enter_wrapper">
                                    <div class="enter">
                                        <div class="enter_img">
                                            <div class="enter_icon icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"><g><g><path d="M16.984 19.253c-.14.101-.283.2-.427.294l-.2.128c-.189.117-.381.228-.577.332l-.13.067c-.45.23-.917.43-1.396.59l-.05.018c-.251.083-.505.157-.762.22h-.002c-.26.065-.522.118-.786.162-.007 0-.014.002-.022.004-.248.04-.498.07-.75.091l-.133.01c-.249.019-.498.031-.749.031-.254 0-.506-.012-.758-.031l-.13-.01a10.345 10.345 0 0 1-.756-.093l-.034-.006a10.162 10.162 0 0 1-1.556-.389l-.047-.016c-.252-.085-.5-.18-.745-.285l-.005-.002c-.231-.1-.458-.21-.682-.327l-.088-.045a10.28 10.28 0 0 1-.775-.462c-.182-.119-.361-.242-.536-.373l-.053-.042.039-.021 3.162-1.726c.544-.296.882-.866.882-1.485v-1.441l-.092-.111c-.009-.01-.874-1.062-1.2-2.487l-.037-.158-.136-.088a.663.663 0 0 1-.308-.557V9.627c0-.186.079-.36.223-.49l.132-.119V6.79l-.004-.052c0-.01-.119-.972.559-1.744C8.633 4.334 9.625 4 11 4c1.37 0 2.358.332 2.938.986.677.765.566 1.745.566 1.753l-.004 2.28.132.12c.144.129.223.303.223.489v1.418a.668.668 0 0 1-.473.63l-.198.06-.064.199a7.4 7.4 0 0 1-.999 2.013c-.105.148-.207.279-.294.38l-.1.112v1.48c0 .645.359 1.225.936 1.513l3.387 1.693.064.033c-.043.033-.087.063-.13.094zM.8 11C.8 5.376 5.376.8 11 .8S21.2 5.376 21.2 11c0 3.03-1.33 5.756-3.436 7.625a2.998 2.998 0 0 0-.357-.215l-3.387-1.693a.887.887 0 0 1-.492-.797v-1.183c.078-.097.16-.206.246-.327.439-.619.79-1.308 1.047-2.049.507-.24.834-.745.834-1.315V9.628c0-.347-.127-.684-.355-.948V6.813c.02-.207.094-1.379-.753-2.345C13.81 3.626 12.617 3.2 11 3.2c-1.616 0-2.81.426-3.547 1.267-.847.967-.774 2.138-.753 2.346V8.68c-.227.264-.355.6-.355.947v1.418c0 .44.198.851.536 1.129.324 1.269.991 2.23 1.237 2.555v1.158a.892.892 0 0 1-.464.783L4.49 18.395c-.101.055-.201.119-.301.19A10.176 10.176 0 0 1 .8 11zM22 11c0-6.065-4.935-11-11-11S0 4.935 0 11c0 3.204 1.378 6.091 3.57 8.103l-.01.01.357.3c.023.02.048.036.071.055.19.157.386.306.586.45a11.202 11.202 0 0 0 .852.558l.148.086c.245.14.496.271.752.392l.057.026c.835.388 1.727.673 2.66.842l.074.013c.29.05.582.09.879.117l.108.008c.295.024.594.04.896.04.3 0 .595-.016.889-.04.037-.002.074-.004.111-.008.294-.026.585-.065.872-.114l.074-.014a10.9 10.9 0 0 0 2.623-.822l.092-.042a11.056 11.056 0 0 0 1.532-.875c.074-.05.147-.104.22-.157.175-.126.348-.256.515-.393.038-.03.078-.056.114-.087l.366-.305-.01-.01A10.972 10.972 0 0 0 22 11z"></path></g></g></svg>
                                            </div>
                                        </div>
                                        <div class="enter_user_name">
                                            <a href="#">
                                                <span>Личный кабинет</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="page_nemu-list list-style list-vertival">
                                    <li>
                                        <a href="<?= Url::to(['about']) ?>">
                                            О нас
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['guarantee']) ?>">
                                            Гарантии
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['delivery-and-payment']) ?>">
                                            Доставка и оплата
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['contacts']) ?>">
                                            Контакты
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="call-back">
                            <div class="call-back-image">
                                <span class="call-back-icon icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="49" viewBox="0 0 27 49"><g><g><path fill="#dcdcdc" d="M25.503 43.256H2.16V5.743h23.344zm-10.438 3.95h-2.467a1.416 1.416 0 1 1 0-2.831h2.467a1.416 1.416 0 1 1 0 2.831zM4.518 1.052a.789.789 0 1 1 0 1.578.789.789 0 0 1 0-1.578zm2.235.296a.493.493 0 1 1 0 .987.493.493 0 0 1 0-.987zm4.714.742h4.728a.309.309 0 0 1 0 .616h-4.728a.308.308 0 0 1 0-.616zM23.465 0H4.197A3.534 3.534 0 0 0 .663 3.534v41.932A3.534 3.534 0 0 0 4.197 49h19.268a3.534 3.534 0 0 0 3.536-3.534V3.534A3.535 3.535 0 0 0 23.465 0z"/></g></g></svg>
                                </span>
                            </div>
                            <?php if (ContactHelper::getPhones()): ?>
                                <div class="call-back-content">
                                    <div class="call-back-content-top">
                                        <a href="tel:<?= str_replace([' ', '_', '-', '(', ')'], '', ContactHelper::getPhones()[0]->text) ?>"><?= ContactHelper::getPhones()[0]->text ?></a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="header-right-column column">
                        <div class="call-back">
                            <div class="call-back-content">
                                <div class="call-back-content-top">
                                    Есть вопросы?
                                </div>
                                <div class="call-back-content-bottom">
                                    <a href="#">Заказать звонок</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_menu">
            <div class="container">
                <div class="custom_row">
                    <div class="header-left-column column">
                        <div class="xs_visible_logo_and_shoping_cart">
                            <div class="logo">
                                <a href="#">
                                    <img src="<?= Url::base() ?>/img/MAGAZIN.png" alt="">
                                </a>
                            </div>
                            <div class="equivalence_and_like">
                                <div class="equivalence_and_like-item">
                                    <a href="#">
										<span class="icon">
											<svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" viewBox="0 0 25 20"><g><g><g><g><path fill="#313131" d="M14.432 3.505a.37.37 0 0 1-.06-.733l7.976-1.33a.37.37 0 0 1 .122.727l-7.977 1.33a.337.337 0 0 1-.06.006z"></path></g><g><path fill="#313131" d="M1.929 5.591a.37.37 0 0 1-.06-.732l8.038-1.342a.37.37 0 0 1 .122.727L1.99 5.586a.343.343 0 0 1-.061.005z"></path></g></g><g><g><g><path fill="#313131" d="M23.583 10.842a3.814 3.814 0 0 1-3.79 3.44 3.813 3.813 0 0 1-3.79-3.44zm.755-.37a.369.369 0 0 0-.368-.368h-8.354a.369.369 0 0 0-.369.369 4.551 4.551 0 0 0 4.545 4.546 4.551 4.551 0 0 0 4.546-4.546z"></path></g><g><path fill="#313131" d="M15.616 10.842a.37.37 0 0 1-.327-.54l4.177-8.003c.127-.244.526-.244.654 0l4.177 8.003a.37.37 0 0 1-.654.341l-3.85-7.376-3.85 7.376a.37.37 0 0 1-.327.199z"></path></g></g><g><g><path fill="#313131" d="M8.337 13.227a3.813 3.813 0 0 1-3.79 3.44 3.813 3.813 0 0 1-3.791-3.44zm.755-.368a.369.369 0 0 0-.369-.37H.369a.369.369 0 0 0-.369.37 4.552 4.552 0 0 0 4.546 4.546 4.551 4.551 0 0 0 4.546-4.546z"></path></g><g><path fill="#313131" d="M8.723 13.227a.37.37 0 0 1-.327-.198l-3.85-7.376-3.85 7.376a.37.37 0 0 1-.654-.341l4.177-8.003c.128-.244.527-.244.654 0l4.177 8.003a.37.37 0 0 1-.327.54z"></path></g></g></g><g><path fill="#313131" d="M14.05 3.514a1.884 1.884 0 0 1-1.88 1.88 1.884 1.884 0 0 1-1.882-1.88c0-1.037.844-1.881 1.881-1.881 1.038 0 1.882.844 1.882 1.88zm.738-.001A2.622 2.622 0 0 0 12.17.895 2.622 2.622 0 0 0 9.55 3.513a2.622 2.622 0 0 0 2.62 2.619 2.621 2.621 0 0 0 2.618-2.62z"></path></g><g><path fill="#313131" d="M12.17 20a.369.369 0 0 1-.37-.369V5.763a.369.369 0 0 1 .738 0v13.868a.369.369 0 0 1-.369.369z"></path></g><g><path fill="#313131" d="M12.17 1.633a.369.369 0 0 1-.37-.369V.37a.369.369 0 0 1 .738 0v.895a.369.369 0 0 1-.369.369z"></path></g><g><path fill="#313131" d="M17.034 20h-9.73a.369.369 0 0 1 0-.738h9.73a.369.369 0 0 1 0 .738z"></path></g></g></g></svg>
										</span>
                                        <span class="e_l_count">1</span>
                                    </a>
                                </div>
                                <div class="equivalence_and_like-item">
                                    <a href="#">
										<span class="icon">
											<svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20"><g><g><g><path fill="#313131" d="M20.634 8.04c-.41 1.726-1.36 3.299-2.746 4.545l-7.115 6.302-6.993-6.3c-1.388-1.25-2.338-2.821-2.748-4.547C.737 6.8.858 6.1.858 6.095l.006-.042C1.135 3.025 3.252.827 5.9.827c1.953 0 3.672 1.192 4.488 3.11l.384.902.383-.903c.803-1.888 2.613-3.108 4.613-3.108 2.646 0 4.763 2.198 5.04 5.265 0 .007.122.707-.173 1.947zm.996-2.076C21.313 2.508 18.85 0 15.766 0c-2.054 0-3.935 1.098-4.993 2.857C9.724 1.075 7.92 0 5.899 0 2.816 0 .352 2.507.036 5.963.011 6.116-.09 6.92.22 8.23c.45 1.89 1.487 3.608 3 4.97l7.548 6.8 7.677-6.8c1.513-1.362 2.55-3.08 3-4.97.312-1.31.21-2.114.185-2.266z"></path></g><g><path fill="#313131" d="M6.666 2.533A4.171 4.171 0 0 0 2.5 6.699a.416.416 0 1 0 .834 0 3.337 3.337 0 0 1 3.333-3.333.416.416 0 1 0 0-.833z"></path></g></g></g></svg>
										</span>
                                        <span class="e_l_count">1</span>
                                    </a>
                                </div>
                                <a href="#" class="shoping_cart">
                                    <div class="shoping_cart_image">
									<span class="shoping_cart_image_icon icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20"><g><g><g><g><path fill="#3d3d3d" d="M1.022 1.63H3.36l3.329 12.038a.815.815 0 0 0 .788.598h10.23c.327 0 .612-.19.748-.489l3.723-8.56a.825.825 0 0 0-.068-.774.81.81 0 0 0-.68-.367H10.126a.818.818 0 0 0-.815.815c0 .449.367.815.815.815H20.18l-3.017 6.93H8.087L4.76.598A.815.815 0 0 0 3.97 0H1.022a.818.818 0 0 0-.815.815c0 .449.367.815.815.815z"/></g><g><path fill="#3d3d3d" d="M6.702 20a1.85 1.85 0 0 0 1.847-1.848 1.85 1.85 0 0 0-1.847-1.848 1.85 1.85 0 0 0-1.848 1.848A1.85 1.85 0 0 0 6.702 20z"/></g><g><path fill="#3d3d3d" d="M18.25 20h.136c.49-.04.938-.258 1.264-.639.326-.367.475-.842.448-1.345a1.852 1.852 0 0 0-1.97-1.712A1.851 1.851 0 0 0 18.25 20z"/></g></g></g></g></svg>
									</span>
                                        <span class="e_l_count">2</span>
                                    </div>
                                    <div class="shoping_cart_content">
                                        3 250 <span>грн</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="menu_container">
                            <div class="burger">
                                <div class="burger_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><title>apps</title><path d="M4 3h6a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm1 2v4h4V5H5zm-1 8h6a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1zm1 2v4h4v-4H5zm9-12h6a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm1 2v4h4V5h-4zm4 10h-5a1 1 0 0 1 0-2h6a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1v-2a1 1 0 0 1 2 0v1h4v-4z" fill="#000" fill-rule="nonzero"/></svg>
                                </div>
                                <div class="burger_text">
                                    КАТАЛОГ ТОВАРОВ
                                </div>
                            </div>
                            <div class="menu_box">
                                <ul id="main-menu" class="sm sm-vertical sm-clean">
                                    <?php if (CategoryHelper::getCategories()): ?>
                                        <?= CategoryHelper::showCategories() ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="serch_wrapper">
                            <div class="serch_wrapper_burger_md_hidden">
                                <button class="burger_two">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                            <div class="serch_wrappe_input">
                                <?php $form = ActiveForm::begin(['action' => Url::to(['/shop/catalog/search']), 'method' => 'get']); ?>
                                    <input type="text" name="SearchForm[text]" placeholder="Что вы ищите?" class="i_serch" required>
                                    <button type="submit" class="serch_button">
                                        <span class="serch_icon icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g><g><path fill="#313131" d="M7.783 1.415a6.374 6.374 0 0 1 6.367 6.368 6.363 6.363 0 0 1-6.367 6.367 6.374 6.374 0 0 1-6.368-6.367c0-3.503 2.865-6.368 6.368-6.368zm0 14.15a7.641 7.641 0 0 0 4.97-1.812l6.04 6.04c.137.138.31.207.5.207s.362-.069.5-.207a.708.708 0 0 0 0-1l-6.04-6.04a7.77 7.77 0 0 0 1.812-4.97A7.784 7.784 0 0 0 7.783 0C3.503 0 0 3.503 0 7.783c0 4.296 3.503 7.782 7.783 7.782z"/></g></g></svg>
                                        </span>
                                    </button>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>
                        <div class="equivalence_and_like">
                            <div class="equivalence_and_like-item">
                                <a href="#">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" viewBox="0 0 25 20"><g><g><g><g><path fill="#313131" d="M14.432 3.505a.37.37 0 0 1-.06-.733l7.976-1.33a.37.37 0 0 1 .122.727l-7.977 1.33a.337.337 0 0 1-.06.006z"/></g><g><path fill="#313131" d="M1.929 5.591a.37.37 0 0 1-.06-.732l8.038-1.342a.37.37 0 0 1 .122.727L1.99 5.586a.343.343 0 0 1-.061.005z"/></g></g><g><g><g><path fill="#313131" d="M23.583 10.842a3.814 3.814 0 0 1-3.79 3.44 3.813 3.813 0 0 1-3.79-3.44zm.755-.37a.369.369 0 0 0-.368-.368h-8.354a.369.369 0 0 0-.369.369 4.551 4.551 0 0 0 4.545 4.546 4.551 4.551 0 0 0 4.546-4.546z"/></g><g><path fill="#313131" d="M15.616 10.842a.37.37 0 0 1-.327-.54l4.177-8.003c.127-.244.526-.244.654 0l4.177 8.003a.37.37 0 0 1-.654.341l-3.85-7.376-3.85 7.376a.37.37 0 0 1-.327.199z"/></g></g><g><g><path fill="#313131" d="M8.337 13.227a3.813 3.813 0 0 1-3.79 3.44 3.813 3.813 0 0 1-3.791-3.44zm.755-.368a.369.369 0 0 0-.369-.37H.369a.369.369 0 0 0-.369.37 4.552 4.552 0 0 0 4.546 4.546 4.551 4.551 0 0 0 4.546-4.546z"/></g><g><path fill="#313131" d="M8.723 13.227a.37.37 0 0 1-.327-.198l-3.85-7.376-3.85 7.376a.37.37 0 0 1-.654-.341l4.177-8.003c.128-.244.527-.244.654 0l4.177 8.003a.37.37 0 0 1-.327.54z"/></g></g></g><g><path fill="#313131" d="M14.05 3.514a1.884 1.884 0 0 1-1.88 1.88 1.884 1.884 0 0 1-1.882-1.88c0-1.037.844-1.881 1.881-1.881 1.038 0 1.882.844 1.882 1.88zm.738-.001A2.622 2.622 0 0 0 12.17.895 2.622 2.622 0 0 0 9.55 3.513a2.622 2.622 0 0 0 2.62 2.619 2.621 2.621 0 0 0 2.618-2.62z"/></g><g><path fill="#313131" d="M12.17 20a.369.369 0 0 1-.37-.369V5.763a.369.369 0 0 1 .738 0v13.868a.369.369 0 0 1-.369.369z"/></g><g><path fill="#313131" d="M12.17 1.633a.369.369 0 0 1-.37-.369V.37a.369.369 0 0 1 .738 0v.895a.369.369 0 0 1-.369.369z"/></g><g><path fill="#313131" d="M17.034 20h-9.73a.369.369 0 0 1 0-.738h9.73a.369.369 0 0 1 0 .738z"/></g></g></g></svg>
                                    </span>
                                    <span class="e_l_count">1</span>
                                </a>
                            </div>
                            <div class="equivalence_and_like-item">
                                <a href="#">
                                    <span class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="20" viewBox="0 0 22 20"><g><g><g><path fill="#313131" d="M20.634 8.04c-.41 1.726-1.36 3.299-2.746 4.545l-7.115 6.302-6.993-6.3c-1.388-1.25-2.338-2.821-2.748-4.547C.737 6.8.858 6.1.858 6.095l.006-.042C1.135 3.025 3.252.827 5.9.827c1.953 0 3.672 1.192 4.488 3.11l.384.902.383-.903c.803-1.888 2.613-3.108 4.613-3.108 2.646 0 4.763 2.198 5.04 5.265 0 .007.122.707-.173 1.947zm.996-2.076C21.313 2.508 18.85 0 15.766 0c-2.054 0-3.935 1.098-4.993 2.857C9.724 1.075 7.92 0 5.899 0 2.816 0 .352 2.507.036 5.963.011 6.116-.09 6.92.22 8.23c.45 1.89 1.487 3.608 3 4.97l7.548 6.8 7.677-6.8c1.513-1.362 2.55-3.08 3-4.97.312-1.31.21-2.114.185-2.266z"/></g><g><path fill="#313131" d="M6.666 2.533A4.171 4.171 0 0 0 2.5 6.699a.416.416 0 1 0 .834 0 3.337 3.337 0 0 1 3.333-3.333.416.416 0 1 0 0-.833z"/></g></g></g></svg>
                                    </span>
                                    <span class="e_l_count">1</span>
                                </a>
                            </div>
                            <a href="#" class="shoping_cart">
                                <div class="shoping_cart_image">
									<span class="shoping_cart_image_icon icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20"><g><g><g><g><path fill="#3d3d3d" d="M1.022 1.63H3.36l3.329 12.038a.815.815 0 0 0 .788.598h10.23c.327 0 .612-.19.748-.489l3.723-8.56a.825.825 0 0 0-.068-.774.81.81 0 0 0-.68-.367H10.126a.818.818 0 0 0-.815.815c0 .449.367.815.815.815H20.18l-3.017 6.93H8.087L4.76.598A.815.815 0 0 0 3.97 0H1.022a.818.818 0 0 0-.815.815c0 .449.367.815.815.815z"></path></g><g><path fill="#3d3d3d" d="M6.702 20a1.85 1.85 0 0 0 1.847-1.848 1.85 1.85 0 0 0-1.847-1.848 1.85 1.85 0 0 0-1.848 1.848A1.85 1.85 0 0 0 6.702 20z"></path></g><g><path fill="#3d3d3d" d="M18.25 20h.136c.49-.04.938-.258 1.264-.639.326-.367.475-.842.448-1.345a1.852 1.852 0 0 0-1.97-1.712A1.851 1.851 0 0 0 18.25 20z"></path></g></g></g></g></svg>
									</span>
                                    <span class="e_l_count">2</span>
                                </div>
                                <div class="shoping_cart_content">
                                    3 250 <span>грн</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="header-right-column column">
                        <a href="#" class="shoping_cart">
                            <div class="shoping_cart_image">
                                <span class="shoping_cart_image_icon icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20"><g><g><g><g><path fill="#3d3d3d" d="M1.022 1.63H3.36l3.329 12.038a.815.815 0 0 0 .788.598h10.23c.327 0 .612-.19.748-.489l3.723-8.56a.825.825 0 0 0-.068-.774.81.81 0 0 0-.68-.367H10.126a.818.818 0 0 0-.815.815c0 .449.367.815.815.815H20.18l-3.017 6.93H8.087L4.76.598A.815.815 0 0 0 3.97 0H1.022a.818.818 0 0 0-.815.815c0 .449.367.815.815.815z"/></g><g><path fill="#3d3d3d" d="M6.702 20a1.85 1.85 0 0 0 1.847-1.848 1.85 1.85 0 0 0-1.847-1.848 1.85 1.85 0 0 0-1.848 1.848A1.85 1.85 0 0 0 6.702 20z"/></g><g><path fill="#3d3d3d" d="M18.25 20h.136c.49-.04.938-.258 1.264-.639.326-.367.475-.842.448-1.345a1.852 1.852 0 0 0-1.97-1.712A1.851 1.851 0 0 0 18.25 20z"/></g></g></g></g></svg>
                                </span>
                                <span class="e_l_count">2</span>
                            </div>
                            <div class="shoping_cart_content">
                                3 250 <span>грн</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </header>
    <main>

        <section class="s-bradcrumps <?= !empty($this->params['home-page']) ? 'home-page-breadcrumbs' : ''?>">
            <div class="container">
                <div class="custom_row">
                    <div class="column">
                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]); ?>
                    </div>
                </div>
            </div>
        </section>


        <?php foreach (Yii::$app->session->getAllFlashes() as $key => $message) {
            echo Growl::widget([
                'type' => $key == 'error' ? 'danger' : $key,
                'icon' => 'glyphicon glyphicon-ok-sign',
                'title' => 'Уведомление',
                'showSeparator' => true,
                'body' => $message,
                'options' => [
                    'class' => 'alert-main'
                ]
            ]);
        }
        ?>

        <?= $content ?>

    </main>
    <footer>
        <div class="top_footer_column">
            <div class="container">
                <div class="custom_row">
                    <div class="top_footer_column-text column">
                        <div class="footer_title">
                            <h5>MAGAZIN</h5>
                        </div>
                        <div class="top_footer_column-text_wrapper">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. In nulla posuere sollicitudin aliquam ultrices sagittis orci. Vitae purus faucibus ornare suspendisse sed nisi lacus sed viverra. Sodales ut eu sem integer vitae justo eget...
                            </p>
                            <a href="<?= Url::to(['about']) ?>">
                                Читати більше...
                            </a>
                        </div>
                    </div>
                    <div class="top_footer_column-nav column">
                        <div class="footer_title">
                            <h5>О компании</h5>
                        </div>
                        <div class="top_footer_column-nav_wrapper">
                            <nav>
                                <ul class="footer_nav-list list-style">
                                    <li>
                                        <a href="<?= Url::to(['about']) ?>">О нас</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['contacts']) ?>">Контакты</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['vacancy']) ?>">Вакансии</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['rules']) ?>">Правила сайту</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="top_footer_column-nav column">
                        <div class="footer_title">
                            <h5>Помощь</h5>
                        </div>
                        <div class="top_footer_column-nav_wrapper">
                            <nav>
                                <ul class="footer_nav-list list-style">
                                    <li>
                                        <a href="<?= Url::to(['delivery-and-payment']) ?>">Доставка и оплата</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['guarantee']) ?>">Гарантия</a>
                                    </li>
                                    <li>
                                        <a href="<?= Url::to(['news']) ?>">Новости</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="top_footer_contacts-nav column">
                        <div class="footer_title">
                            <h5>Маєте питання?</h5>
                        </div>
                        <div class="top_footer_contacts_wrapper">
                            <?php if (ContactHelper::getPhones()): ?>

                                <?php foreach (ContactHelper::getPhones() as $phone): ?>
                                    <div class="top_footer_contacts_wrapper-item">
                                        <span class="top_footer_icon icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"><g><g><path fill="#c8c8c8" d="M15.003 11.838a.725.725 0 0 1-.223.636l-2.113 2.097a1.19 1.19 0 0 1-.374.27 1.543 1.543 0 0 1-.452.143l-.096.008a2.164 2.164 0 0 1-.206.008c-.202 0-.527-.034-.978-.103-.45-.07-1-.239-1.652-.509-.652-.27-1.39-.675-2.217-1.215-.826-.54-1.705-1.282-2.637-2.225A17.412 17.412 0 0 1 2.21 8.851a14.944 14.944 0 0 1-1.175-1.852 9.97 9.97 0 0 1-.668-1.54 8.179 8.179 0 0 1-.302-1.193 3.936 3.936 0 0 1-.063-.786c.01-.19.016-.297.016-.318.02-.148.068-.3.143-.453a1.19 1.19 0 0 1 .27-.373L2.545.222A.7.7 0 0 1 3.053 0c.138 0 .26.04.366.12.106.079.196.177.27.293l1.7 3.226c.096.17.122.355.08.556a.99.99 0 0 1-.27.508l-.779.779a.265.265 0 0 0-.056.103.392.392 0 0 0-.023.12c.042.222.137.476.286.762.127.254.323.564.587.93.265.365.641.786 1.129 1.263.476.487.9.866 1.27 1.136.372.27.681.469.93.596.25.127.44.204.572.23l.199.04a.379.379 0 0 0 .103-.024.265.265 0 0 0 .104-.056l.905-.921a.973.973 0 0 1 .668-.254.83.83 0 0 1 .429.095h.016l3.066 1.811c.223.138.355.313.398.525z"/></g></g></svg>
                                        </span>
                                        <a href="tel:<?= str_replace([' ', '_', '-', '(', ')'], '', ContactHelper::getPhones()[0]->text) ?>"><?= ContactHelper::getPhones()[0]->text ?></a>
                                    </div>
                                <?php endforeach; ?>

                            <?php endif; ?>

                            <div class="top_footer_contacts_wrapper-item">
                                <span class="top_footer_icon icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="15" viewBox="0 0 23 15"><g><g><path fill="#c8c8c8" d="M12.367 9.537c-.304.25-.703.388-1.12.388-.42 0-.818-.137-1.122-.386l-1.75-1.443L0 14.86v.021c0 .065.055.12.12.12h22.191a.12.12 0 0 0 .119-.12v-.02l-8.368-6.723zm2.427-2.002l7.636 6.135V1.234zM0 1.193v12.474l7.643-6.174zm11.243 7.803h.005c.169 0 .336-.049.471-.138l.037-.024.025-.016.427-.353L22.406.049A.12.12 0 0 0 22.311 0H.119a.115.115 0 0 0-.074.027l10.67 8.794a.836.836 0 0 0 .528.175z"/></g></g></svg>
                                </span>
                                <a href="mailto:<?= ContactHelper::getEmail()->email ?>"><?= ContactHelper::getEmail()->email ?></a>
                            </div>
                            <div class="top_footer_contacts_wrapper-item">
                                <span class="top_footer_icon icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="15" viewBox="0 0 11 15"><g><g><path fill="#c8c8c8" d="M5.432 8.166A2.736 2.736 0 0 1 2.7 5.432 2.736 2.736 0 0 1 5.432 2.7a2.736 2.736 0 0 1 2.733 2.733 2.736 2.736 0 0 1-2.733 2.734zm0-8.166A5.439 5.439 0 0 0 0 5.432c0 3.718 4.861 9.175 5.068 9.406a.49.49 0 0 0 .728 0c.207-.23 5.069-5.688 5.069-9.406A5.439 5.439 0 0 0 5.432 0z"/></g></g></svg>
                                </span>
                                <address>
                                    <?= ContactHelper::getAddress()->text ?>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_copyright">
            <div class="container">
                <div class="custom_row">
                    <div class="column f-pay_column">
                        <div class="mastercard">
                            <ul class="list-style list-vertival mastercard-list">
                                <li>
                                    <img src="<?= Url::base() ?>/img/visa.png" alt="visa.png">
                                </li>
                                <li>
                                    <img src="<?= Url::base() ?>/img/mastercard.png" alt="mastercard.png">
                                </li>
                            </ul>
                        </div>
                        <div class="copyright">
                            <p>© Интернет-магазин MAGAZIN <?= date('Y') ?></p>
                        </div>
                    </div>
                    <div class="column f-social_column">
                        <ul class="social_list list-style list-vertival">
                            <li>
                                <a href="<?= ContactHelper::getSocByName(Soc::TYPE_VIBER)->link ?>" title="<?= ContactHelper::getSocByName(Soc::TYPE_VIBER)->name ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g><g><path fill="#7d7d7d" d="M16.252 14.225l-.465.466c-.658.658-2.172.606-3.145.418-3.234-.625-7.005-4.28-7.732-7.445-.36-1.568-.162-2.931.358-3.452l.465-.465a.659.659 0 0 1 .931 0L8.525 5.61a.652.652 0 0 1 .193.465.65.65 0 0 1-.193.464l-.465.466a1.319 1.319 0 0 0 0 1.861l3.074 3.034a1.315 1.315 0 0 0 1.861 0l.465-.465a.688.688 0 0 1 .931 0l1.861 1.86a.657.657 0 0 1 0 .931zM10 0C4.507 0 0 4.507 0 10c0 1.813.489 3.577 1.416 5.121L0 20l4.879-1.416A9.933 9.933 0 0 0 10 20c5.493 0 10-4.507 10-10S15.493 0 10 0z"/></g></g></svg>
                                </a>
                            </li>
                            <li>
                                <a href="<?= ContactHelper::getSocByName(Soc::TYPE_TELEGRAM)->link ?>" title="<?= ContactHelper::getSocByName(Soc::TYPE_TELEGRAM)->name ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20"><g><g><path fill="#7d7d7d" d="M16.253 5.738l-6.965 6.353-.868 3.27-1.602-4.008zm-10.778 5.85l2.83 7.075 3.685-3.684L18.307 20l4.449-20L0 9.478z"/></g></g></svg>
                                </a>
                            </li>
                            <li>
                                <a href="<?= ContactHelper::getSocByName(Soc::TYPE_YOUTUBE)->link ?>" title="<?= ContactHelper::getSocByName(Soc::TYPE_YOUTUBE)->name ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="20" viewBox="0 0 27 20"><g><g><g><path fill="#7d7d7d" d="M9.282 15.303V4.847l9.256 5.142zM22.41 0H3.846A3.85 3.85 0 0 0 0 3.846v12.308A3.85 3.85 0 0 0 3.846 20H22.41a3.85 3.85 0 0 0 3.846-3.846V3.846A3.85 3.85 0 0 0 22.41 0z"/></g><g><path fill="#7d7d7d" d="M10.82 7.46v5.186l4.59-2.635z"/></g></g></g></svg>
                                </a>
                            </li>
                            <li>
                                <a href="<?= ContactHelper::getSocByName(Soc::TYPE_INSTAGRAM)->link ?>" title="<?= ContactHelper::getSocByName(Soc::TYPE_INSTAGRAM)->name ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g><g><g><path fill="#7d7d7d" d="M15.898 5.86a1.76 1.76 0 0 1-1.757-1.758c0-.97.788-1.758 1.757-1.758.97 0 1.758.788 1.758 1.758a1.76 1.76 0 0 1-1.758 1.757zm-5.859 9.374a5.28 5.28 0 0 1-5.273-5.273 5.28 5.28 0 0 1 5.273-5.273 5.28 5.28 0 0 1 5.273 5.273 5.28 5.28 0 0 1-5.273 5.273zM17.07 0H2.93A2.933 2.933 0 0 0 0 2.93v14.14A2.933 2.933 0 0 0 2.93 20h14.14A2.933 2.933 0 0 0 20 17.07V2.93A2.933 2.933 0 0 0 17.07 0z"/></g><g><path fill="#7d7d7d" d="M15.898 3.516a.586.586 0 1 0 .001 1.172.586.586 0 0 0 0-1.172z"/></g><g><path fill="#7d7d7d" d="M10.04 5.86a4.107 4.107 0 0 0-4.103 4.1 4.107 4.107 0 0 0 4.102 4.103 4.107 4.107 0 0 0 4.102-4.102 4.107 4.107 0 0 0-4.102-4.102z"/></g></g></g></svg>
                                </a>
                            </li>
                            <li>
                                <a href="<?= ContactHelper::getSocByName(Soc::TYPE_FACEBOOK)->link ?>" title="<?= ContactHelper::getSocByName(Soc::TYPE_FACEBOOK)->name ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><g><g><path fill="#7d7d7d" d="M17.07 0H2.93A2.933 2.933 0 0 0 0 2.93v14.14A2.933 2.933 0 0 0 2.93 20h5.898v-7.07H6.484V9.414h2.344V7.031a3.52 3.52 0 0 1 3.516-3.515h3.554V7.03h-3.554v2.383h3.554l-.585 3.516h-2.97V20h4.727A2.933 2.933 0 0 0 20 17.07V2.93A2.933 2.933 0 0 0 17.07 0z"/></g></g></svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php $this->endContent() ?>








