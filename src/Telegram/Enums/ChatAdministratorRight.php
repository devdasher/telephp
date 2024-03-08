<?php

namespace DevDasher\TelePHP\Telegram\Enums;

enum ChatAdministratorRight: string
{
    case IS_ANONYMOUS = 'is_anonymous';
    case CAN_MANAGE_CHAT = 'can_manage_chat';
    case CAN_DELETE_MESSAGES = 'can_delete_messages';
    case CAN_MANAGE_VIDEO_CHATS = 'can_manage_video_chats';
    case CAN_RESTRICT_MEMBERS = 'can_restrict_members';
    case CAN_PROMOTE_MEMBERS = 'can_promote_members';
    case CAN_CHANGE_INFO = 'can_change_info';
    case CAN_INVITE_USERS = 'can_invite_users';
    case CAN_POST_MESSAGES = 'can_post_messages';
    case CAN_EDIT_MESSAGES = 'can_edit_messages';
    case CAN_PIN_MESSAGES = 'can_pin_messages';
    case CAN_MANAGE_TOPICS = 'can_manage_topics';
}