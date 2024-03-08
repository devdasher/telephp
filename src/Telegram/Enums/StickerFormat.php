<?php

namespace DevDasher\TelePHP\Telegram\Enums;

enum StickerFormat: string
{
    case STATIC = 'static';
    case ANIMATED = 'animated';
    case VIDEO = 'video';
}