<?php

namespace DevDasher\TelePHP\Telegram\Enums;

enum MenuButtonType: string
{
    case DEFAULT = 'default';
    case WEB_APP = 'web_app';
    case COMMANDS = 'commands';
}