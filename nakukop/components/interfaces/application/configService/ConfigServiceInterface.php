<?php

namespace Nakukop\interfaces\application\configService;

/**
 * Interface ConfigServiceInterface
 * @package Nakukop\interfaces\application\configService
 */
interface ConfigServiceInterface
{
    /**
     * @return array
     */
    public function getAll(): array;

    /**
     * @param string $slug
     * @return ConfigProviderInterface|null
     */
    public function getProviderBySlug(string $slug): ?ConfigProviderInterface;
}
