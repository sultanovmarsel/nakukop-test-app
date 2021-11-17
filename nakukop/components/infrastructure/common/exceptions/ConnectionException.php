<?php

namespace Nakukop\infrastructure\common\exceptions;

use Nakukop\infrastructure\common\ErrorMap;

/**
 * Class ConnectionException
 * @package Nakukop\infrastructure\common\exceptions
 */
class ConnectionException extends \RuntimeException
{
    /**
     * ConnectionException constructor.
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        parent::__construct(sprintf("%s '%s'", ErrorMap::CANT_CONNECT, $message), $code, $previous);
    }
}
