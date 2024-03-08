<?php

namespace DevDasher\TelePHP\Telegram\Methods;

use DevDasher\TelePHP\Telegram\TelegramResponse;
use DevDasher\TelePHP\Telegram\Traits\ClientTrait;
use DevDasher\TelePHP\Telegram\Types\AbstractEntity;
use Illuminate\Support\Arr;

abstract class AbstractMethod
{
    use ClientTrait;

    public function getParameters(): array
    {
        return get_object_vars($this);
        return array_filter(get_object_vars($this), fn($v) => $v !== null);
    }

    public function getMethod(): string
    {
        return lcfirst(basename($this::class, 'Method'));
    }

    public function exec(array $options = []): AbstractEntity
    {
        return $this->sendRequest($this, $options);
    }

    public abstract function getEntityClass(): string;
}