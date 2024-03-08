<?php

namespace DevDasher\TelePHP\Telegram\Enums;

enum ChatMemberStatus: string
{
    case ADMINISTRATOR = 'administrator';
    case CREATOR = 'creator';
    case RESTRICTED = 'restricted';
    case LEFT = 'left';
    case MEMBER = 'member';
    case KICKED = 'kicked';
}