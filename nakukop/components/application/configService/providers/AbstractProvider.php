<?php

namespace Nakukop\application\configService\providers;

use Nakukop\application\configService\models\Config;
use Nakukop\infrastructure\common\exceptions\ConnectionException;
use Nakukop\interfaces\application\configService\ConfigProviderInterface;
use Nakukop\interfaces\application\configService\models\ConfigInterface;
use Nakukop\interfaces\infrastructure\common\ConnectionInterface;

/**
 * Class AbstractProvider
 * @package Nakukop\application\configService\providers
 */
abstract class AbstractProvider implements ConfigProviderInterface
{
    protected ConnectionInterface $connection;

    /**
     * RestProvider constructor.
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;

        if (!$this->connection->connect()) {
            throw new ConnectionException($this->getSlug());
        }
    }

    /**
     * @param array $data
     * @return ConfigInterface
     */
    public function createModel(array $data): ConfigInterface
    {
        return new Config($data);
    }
}
