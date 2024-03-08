<?php

namespace DevDasher\TelePHP\Telegram\Types\Chat;

use DevDasher\TelePHP\Telegram\Methods\Location\Location;
use DevDasher\TelePHP\Telegram\Types\AbstractEntity;

class ChatLocation extends AbstractEntity
{
    public function __construct(
        public Location $location,
        public string $address,
    ) {
    }
}