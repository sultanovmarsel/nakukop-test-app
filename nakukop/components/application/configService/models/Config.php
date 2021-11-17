<?php

namespace Nakukop\application\configService\models;

use Nakukop\infrastructure\common\traits\DataObject;
use Nakukop\interfaces\application\configService\models\ConfigInterface;

/**
 * Class Config
 * @package Nakukop\application\configService\models
 */
class Config implements ConfigInterface
{
    use DataObject;

    protected $keys = [
        'slug',
        'value',
    ];

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return isset($this->data['slug']) ? (string) $this->data['slug'] : null;
    }

    /**
     * @return mixed|null
     */
    public function getValue()
    {
        return isset($this->data['value']) ? $this->data['value'] : null;
    }
}
