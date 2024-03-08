<?php

namespace DevDasher\TelePHP\Telegram\Methods\Message;

use DevDasher\TelePHP\Telegram\Methods\AbstractMethod;
use DevDasher\TelePHP\Telegram\Types\Message\Message;

class SendMessage extends AbstractMethod
{
    public function __construct(
        public string $text,
        public null|int|string $chat_id = null,
        public ?int $message_thread_id = null,
        public ?string $parse_mode = null,
        public ?array $entities = null,
        public ?bool $disable_web_page_preview = null,
        public ?bool $disable_notification = null,
        public ?bool $protect_content = null,
        public ?int $reply_to_message_id = null,
        public ?bool $allow_sending_without_reply = null,
        public ?array $reply_markup = null,
    ) {
    }

    public function getEntityClass(): string
    {
        return Message::class;
    }
}
