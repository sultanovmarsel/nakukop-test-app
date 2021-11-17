<?php

namespace Nakukop\infrastructure\common\connections;

use Nakukop\interfaces\infrastructure\common\ConnectionInterface;

/**
 * Class RestConnection
 * @package Nakukop\infrastructure\common\connections
 */
class RestConnection implements ConnectionInterface
{
    /**
     * @return bool
     */
    public function connect(): bool
    {
        // TODO: Implement connect() method.

        return true;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function send(array $params = [])
    {
        // TODO: Implement send() method.
    }
}
