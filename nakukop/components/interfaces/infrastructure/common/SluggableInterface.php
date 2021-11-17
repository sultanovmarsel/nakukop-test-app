<?php

namespace Nakukop\interfaces\infrastructure\common;

/**
 * Interface SluggableInterface
 * @package Nakukop\interfaces\infrastructure\common
 */
interface SluggableInterface
{
    /** @return string */
    public function getSlug(): string;
}
