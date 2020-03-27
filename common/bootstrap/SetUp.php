<?php

namespace common\bootstrap;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use League\Flysystem\Adapter\Ftp;
use League\Flysystem\Filesystem;
use shop\cart\Cart;
use shop\cart\cost\calculator\DynamicCost;
use shop\cart\cost\calculator\SimpleCost;
use shop\components\storage\CookieStorage;
use shop\components\storage\HybridStorage;
use shop\components\storage\SessionStorage;
use shop\dispatchers\AsyncEventDispatcher;
use shop\dispatchers\DeferredEventDispatcher;
use shop\dispatchers\EventDispatcher;
use shop\dispatchers\SimpleEventDispatcher;
use shop\entities\behaviors\FlySystemImageUploadBehavior;
use shop\entities\shop\order\events\OrderCreateRequested;
use shop\entities\user\events\UserResetPasswordRequested;
use shop\jobs\AsyncEventJobHandler;
use shop\listeners\shop\category\CategoryPersistenceListener;
use shop\listeners\shop\product\ProductSearchPersistListener;
use shop\listeners\shop\product\ProductSearchRemoveListener;
use shop\listeners\shop\order\OrderCreateRequestedListener;
use shop\listeners\user\UserResetPasswordRequestedListener;
use shop\listeners\user\UserSignupRequestedListener;
use shop\repositories\events\EntityPersisted;
use shop\repositories\events\EntityRemoved;
use shop\entities\user\events\UserSignUpRequested;
use shop\useCases\shop\viewedProducts\storage\ViewedCookieStorage;
use shop\useCases\shop\viewedProducts\ViewedProducts;
use Yii;
use yii\base\BootstrapInterface;
use yii\base\ErrorHandler;
use yii\caching\Cache;
use yii\di\Container;
use yii\di\Instance;
use yii\mail\MailerInterface;
use yii\rbac\ManagerInterface;
use yiidreamteam\upload\ImageUploadBehavior;
use yii\queue\Queue;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app): void
    {

        $container = \Yii::$container;

        $container->setSingleton(Client::class, function () use ($app){
            return ClientBuilder::create()->build();
        });

        $container->setSingleton(MailerInterface::class, function () use ($app) {
            return $app->mailer;
        });

        $container->setSingleton(ErrorHandler::class, function () use ($app) {
            return $app->errorHandler;
        });

        $container->setSingleton(Queue::class, function () use ($app) {
            return $app->get('queue');
        });

        $container->setSingleton(Cache::class, function () use ($app) {
            return $app->cache;
        });

        $container->setSingleton(ManagerInterface::class, function () use ($app) {
            return $app->authManager;
        });


        $container->setSingleton(Cart::class, function () use ($app) {
            return new Cart(
//                new SessionStorage('cart', Yii::$app->session),
            new CookieStorage('cart', 3600),
                new DynamicCost(new SimpleCost())
            );
        });

        $container->setSingleton(ViewedProducts::class, function () use ($app) {
            return new ViewedProducts(new ViewedCookieStorage('viewed', 3600 * 24 * 30));
        });


        $container->setSingleton(EventDispatcher::class, DeferredEventDispatcher::class);

        $container->setSingleton(DeferredEventDispatcher::class, function (Container $container) {
            return new DeferredEventDispatcher(new AsyncEventDispatcher($container->get(Queue::class)));
        });


        $container->setSingleton(SimpleEventDispatcher::class, function (Container $container) {
            return new SimpleEventDispatcher($container, [
                UserSignUpRequested::class => [UserSignupRequestedListener::class],
                UserResetPasswordRequested::class => [UserResetPasswordRequestedListener::class],
                OrderCreateRequested::class => [OrderCreateRequestedListener::class],
                EntityPersisted::class => [
                    ProductSearchPersistListener::class,
                ],
                EntityRemoved::class => [
                    ProductSearchRemoveListener::class,
                ],
            ]);
        });

        $container->setSingleton(AsyncEventJobHandler::class, [], [
            Instance::of(SimpleEventDispatcher::class)
        ]);

        /*
        $container->setSingleton(Filesystem::class, function () use ($app) {
            return new Filesystem(new Ftp($app->params['ftp']));
        });

        $container->set(ImageUploadBehavior::class, FlySystemImageUploadBehavior::class);
        */
    }
}