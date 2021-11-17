<?php

namespace Nakukop\interfaces\application\configService\models;

use Nakukop\interfaces\infrastructure\common\ModelInterface;

/**
 * Interface ConfigInterface
 * @package Nakukop\interfaces\application\configService\models
 */
interface ConfigInterface extends ModelInterface
{
    /** @return string|null */
    public function getSlug(): ?string;

    /** @return mixed */
    public function getValue();
}
