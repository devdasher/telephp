<?php

namespace DevDasher\TelePHP\Telegram\Types\Chat;

use DevDasher\TelePHP\Telegram\Types\AbstractEntity;

class ChatPhoto extends AbstractEntity
{
    public function __construct(
        public string $small_file_id,
        public string $small_file_unique_id,
        public string $big_file_id,
        public string $big_file_unique_id,
    ) {
    }
}