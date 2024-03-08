<?php

namespace DevDasher\TelePHP\Telegram\Methods\Location;

use DevDasher\TelePHP\Telegram\Types\AbstractEntity;

class Location extends AbstractEntity
{
    public function __construct(
        public float $longitude,
        public float $latitude,
        public ?float $horizontal_accuracy = null,
        public ?int $live_period = null,
        public ?int $heading = null,
        public ?int $proximity_alert_radius = null,
    ) {
    }
}