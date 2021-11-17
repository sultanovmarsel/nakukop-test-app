<?php

namespace Nakukop\application\configService\providers;

use Nakukop\interfaces\application\configService\models\ConfigInterface;

/**
 * Class GrpcProvider
 * @package Nakukop\application\configService\providers
 */
class GrpcProvider extends AbstractProvider
{
    protected const PROVIDER_NAME = 'some_grpc_service';

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return static::PROVIDER_NAME;
    }

    /**
     * Конфигурируем запрос и отдаем ответ
     *
     * @return array
     */
    public function getAll(): array
    {
        //$params['header'] = '...';
        //$params['body'] = '...';
        //return $this->connection->send($params);

        return [
            $this->createModel([
                'slug' => 'grpc_field1',
                'value' => 'xxx'
            ]),
            $this->createModel([
                'slug' => 'grpc_field2',
                'value' => 'yyy'
            ]),
        ];
    }

    /**
     * Конфигурируем запрос и отдаем ответ
     *
     * @param string $slug
     * @return ConfigInterface|null
     */
    public function getBySlug(string $slug): ?ConfigInterface
    {
        $data = [];
        //$params['header'] = '...';
        //$params['body'] = '...';
        //$data = $this->connection->send($params);

        return $this->createModel($data);
    }

    /**
     * Конфигурируем запрос и отдаем ответ
     *
     * @param ConfigInterface $config
     * @return ConfigInterface
     */
    public function save(ConfigInterface $config): ConfigInterface
    {
        $data = [];
        //$params['header'] = '...';
        //$params['body'] = '...';
        //$data = $this->connection->send($params);

        return $this->createModel($data);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $data = [];
        //$params['header'] = '...';
        //$params['body'] = '...';
        //return (bool) $this->connection->send($params);

        return true;
    }
}
