<?php

namespace DevDasher\TelePHP\Telegram\Enums;

enum SwitchInlineQueryChosenChat: string
{
    case ALLOW_USER_CHATS = 'allow_user_chats';
    case ALLOW_BOT_CHATS = 'allow_bot_chats';
    case ALLOW_GROUP_CHATS = 'allow_group_chats';
    case ALLOW_CHANNEL_CHATS = 'allow_channel_chats';
}