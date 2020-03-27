<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->getUserName();?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                    ['label' => 'Пользователи', 'icon' => 'user', 'url' => ['/user'], 'active' => Yii::$app->controller->id == 'user'],
                    ['label' => 'Пользователи', 'icon' => 'user', 'url' => ['user/user/index'], 'active' => $this->context->id == 'user/user'],
                    [
                        'label' => 'Магазин',
                        'icon' => 'shopping-bag',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Категории', 'icon' => 'tasks', 'url' => ['/shop/category/index'], 'active' => $this->context->id == 'shop/category'],
                            ['label' => 'Бренды', 'icon' => 'apple', 'url' => ['/shop/brand/index'], 'active' => $this->context->id == 'shop/brand'],
                            ['label' => 'Характеристики', 'icon' => 'filter', 'url' => ['/shop/characteristic/index'], 'active' => $this->context->id == 'shop/characteristic'],
                            ['label' => 'Товары', 'icon' => 'suitcase', 'url' => ['/shop/product/index'], 'active' => $this->context->id == 'shop/product'],
                            ['label' => 'Методы доставки', 'icon' => 'truck', 'url' => ['/shop/delivery/index'], 'active' => $this->context->id == 'shop/delivery'],
                            ['label' => 'Заказы', 'icon' => 'shopping-cart', 'url' => ['/shop/order/index'], 'active' => $this->context->id == 'shop/order'],
                            ['label' => 'Отзывы', 'icon' => 'commenting', 'url' => ['/shop/review/index'], 'active' => $this->context->id == 'shop/review'],
                        ],
                    ],
                    [
                        'label' => 'Настройки оплаты',
                        'icon' => 'cc-visa',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Ключи', 'icon' => 'key', 'url' => ['/payment/payment-keys/view'], 'active' => $this->context->id == 'payment/payment-keys'],
                            ['label' => 'Правила', 'icon' => 'university', 'url' => ['/payment/payment-rules/view'], 'active' => $this->context->id == 'payment/payment-rules'],
                            ['label' => 'Офферта', 'icon' => 'cc-mastercard', 'url' => ['/payment/payment-offerta/view'], 'active' => $this->context->id == 'payment/payment-offerta'],
                        ],
                    ],
                    [
                        'label' => 'Контакты',
                        'icon' => 'address-card',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Адрес', 'icon' => 'address-book', 'url' => ['/other/contacts/address/index'], 'active' => $this->context->id == 'other/contacts/address'],
                            ['label' => 'Почта', 'icon' => 'envelope-open', 'url' => ['/other/contacts/email/index'], 'active' => $this->context->id == 'other/contacts/email'],
                            ['label' => 'Телефоны', 'icon' => 'phone', 'url' => ['/other/contacts/phone/index'], 'active' => $this->context->id == 'other/contacts/phone'],
                            ['label' => 'Соц сети', 'icon' => 'instagram', 'url' => ['/other/contacts/soc/index'], 'active' => $this->context->id == 'other/contacts/soc'],
                        ],
                    ],
                    [
                        'label' => 'Другое',
                        'icon' => 'cubes',
                        'url' => '#',
                        'items' => [
                            ['label' => 'О нас', 'icon' => 'info-circle', 'url' => ['/other/about-us/view', 'id' => 1], 'active' => $this->context->id == 'other/about-us'],
                            ['label' => 'Гарантии', 'icon' => 'info-circle', 'url' => ['/other/guarantee/view', 'id' => 1], 'active' => $this->context->id == 'other/guarantee'],
                            ['label' => 'Доставка и оплата', 'icon' => 'info-circle', 'url' => ['/other/delivery-and-payment/view', 'id' => 1], 'active' => $this->context->id == 'other/delivery-and-payment'],
                        ],
                    ],
                    ['label' => 'Слайдер', 'icon' => 'picture-o', 'url' => ['/other/carousel/index'], 'active' => $this->context->id == 'other/carousel'],
                ],
            ]
        ) ?>

    </section>

</aside>
