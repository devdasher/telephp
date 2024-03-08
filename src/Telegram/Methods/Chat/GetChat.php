<?php

namespace DevDasher\TelePHP\Telegram\Methods\Chat;

use DevDasher\TelePHP\Telegram\Methods\AbstractMethod;
use DevDasher\TelePHP\Telegram\Types\Chat\Chat;

class GetChat extends AbstractMethod
{
    protected $relatedObject = Chat::class;

    public function __construct(
        public null|int|string $chat_id = null,
    ) {
    }

    public function getEntityClass(): string
    {
        return Chat::class;
    }
}