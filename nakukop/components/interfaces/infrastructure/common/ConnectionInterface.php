<?php

namespace Nakukop\interfaces\infrastructure\common;

/**
 * Interface ConnectionInterface
 * @package Nakukop\interfaces\infrastructure\common
 */
interface ConnectionInterface
{
    /**
     * @return bool
     */
    public function connect(): bool;

    /**
     * @param array $params
     * @return mixed
     */
    public function send(array $params = []);
}
