<?php

namespace Nakukop\interfaces\application\configService;

use Nakukop\interfaces\application\configService\models\ConfigInterface;
use Nakukop\interfaces\infrastructure\common\SluggableInterface;

/**
 * Interface ConfigProviderInterface
 * @package Nakukop\interfaces\application\configService
 */
interface ConfigProviderInterface extends SluggableInterface
{
    /**
     * @param array $data
     * @return ConfigInterface
     */
    public function createModel(array $data): ConfigInterface;

    /**
     * @return ConfigInterface[]
     */
    public function getAll(): array;

    /**
     * @param string $slug
     * @return ConfigInterface|null
     */
    public function getBySlug(string $slug): ?ConfigInterface;

    /**
     * @param ConfigInterface $config
     * @return ConfigInterface
     */
    public function save(ConfigInterface $config): ConfigInterface;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
