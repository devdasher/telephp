<?php

namespace DevDasher\TelePHP\Telegram\Enums;

enum InputMediaType: string
{
    case ANIMATION = 'animation';
    case DOCUMENT = 'document';
    case AUDIO = 'audio';
    case PHOTO = 'photo';
    case VIDEO = 'video';
}