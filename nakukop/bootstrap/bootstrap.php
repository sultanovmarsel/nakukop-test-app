<?php

use Illuminate\Contracts\Container\Container;
use Laravel\Lumen\Application;
use Nakukop\application\configService\ConfigService;
use Nakukop\application\configService\providers\GrpcProvider;
use Nakukop\application\configService\providers\HttpProvider;
use Nakukop\application\configService\providers\RestProvider;
use Nakukop\infrastructure\common\connections\GrpcConnection;
use Nakukop\infrastructure\common\connections\HttpConnection;
use Nakukop\infrastructure\common\connections\RestConnection;
use Nakukop\infrastructure\logService\LogService;
use Nakukop\interfaces\application\configService\ConfigServiceInterface;
use Nakukop\interfaces\infrastructure\logService\LogServiceInterface;

/** @var Application $app */

$app->bind(ConfigServiceInterface::class, function (Container $container) {
    return new ConfigService(
        $container->make('configProviders'),
        $container->make(LogServiceInterface::class),
    );
});

// есть различные варианты как определить провайдеров, но этот наверное самый простой
// также коннекшны можно в отдельные контейнеры вынести, но в рамках задачи смысла в этом не вижу
$app->bind('configProviders', function () {
    return [
        new RestProvider(new RestConnection()),
        new GrpcProvider(new GrpcConnection()),
        new HttpProvider(new HttpConnection()),
    ];
});

$app->bind(LogServiceInterface::class, function () {
    return new LogService(storage_path('logs/logs.log'));
});
