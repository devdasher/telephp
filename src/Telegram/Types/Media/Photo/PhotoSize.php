<?php

namespace DevDasher\TelePHP\Telegram\Types\Media\Photo;

use DevDasher\TelePHP\Telegram\Types\AbstractEntity;

class PhotoSize extends AbstractEntity
{
    public function __construct(
        public string $file_id,
        public string $file_unique_id,
        public int $width,
        public int $height,
        public ?int $file_size = null,
    ) {
    }
}