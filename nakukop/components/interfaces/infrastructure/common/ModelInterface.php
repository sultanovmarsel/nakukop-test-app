<?php

namespace Nakukop\interfaces\infrastructure\common;

/**
 * Interface ModelInterface
 * @package Nakukop\interfaces\infrastructure\common
 */
interface ModelInterface extends \JsonSerializable
{
    /** @return array */
    public function toArray(): array;
}
