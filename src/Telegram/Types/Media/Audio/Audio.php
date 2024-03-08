<?php

namespace DevDasher\TelePHP\Telegram\Types\Media\Animation;

use DevDasher\TelePHP\Telegram\Types\AbstractEntity;
use DevDasher\TelePHP\Telegram\Types\Media\Photo\PhotoSize;

class Audio extends AbstractEntity
{
    public function __construct(
        public string $file_id,
        public string $file_unique_id,
        public int $duration,
        public ?string $performer = null,
        public ?string $title = null,
        public ?string $file_name = null,
        public ?string $mime_type = null,
        public ?int $file_size = null,
        public ?PhotoSize $thumbnail = null,
    ) {
    }
}