<?php

namespace Nakukop\application\configService;

use Nakukop\interfaces\application\configService\ConfigProviderInterface;
use Nakukop\interfaces\application\configService\ConfigServiceInterface;
use Nakukop\interfaces\infrastructure\logService\LogServiceInterface;

/**
 * Class ConfigService
 * @package Nakukop\application\configService
 */
class ConfigService implements ConfigServiceInterface
{
    protected array $providers = [];

    protected LogServiceInterface $logService;

    /**
     * ConfigService constructor.
     * @param array $providers
     * @param LogServiceInterface $logService
     */
    public function __construct(array $providers, LogServiceInterface $logService)
    {
        foreach ($providers as $provider) {
            if (!$provider instanceof ConfigProviderInterface) {
                continue;
            }

            $this->providers[$provider->getSlug()] = $provider;
        }

        $this->logService = $logService;
    }

    /**
     * @todo: add cache
     *
     * @return array
     */
    public function getAll(): array
    {
        $result = [];

        /** @var ConfigProviderInterface $provider */
        foreach ($this->providers as $slug => $provider) {
            $result[$slug] = $provider->getAll();
        }

        return $result;
    }

    /**
     * @todo: add cache
     *
     * @param string $slug
     * @return ConfigProviderInterface|null
     */
    public function getProviderBySlug(string $slug): ?ConfigProviderInterface
    {
        return !empty($this->providers[$slug]) ? $this->providers[$slug] : null;
    }
}
