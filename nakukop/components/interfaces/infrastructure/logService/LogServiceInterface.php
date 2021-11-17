<?php

namespace Nakukop\interfaces\infrastructure\logService;

/**
 * Interface LogServiceInterface
 * @package Nakukop\interfaces\infrastructure\logService
 */
interface LogServiceInterface
{
    /**
     * @param string $log
     */
    public function log(string $log): void;
}
