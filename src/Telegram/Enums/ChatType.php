<?php

namespace DevDasher\TelePHP\Telegram\Enums;

enum ChatType: string
{
    case SENDER = 'sender';
    case GROUP = 'group';
    case SUPERGROUP = 'supergroup';
    case PRIVATE = 'private';
    case CHANNEL = 'channel';
}