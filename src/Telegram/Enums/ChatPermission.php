<?php

namespace DevDasher\TelePHP\Telegram\Enums;

enum ChatPermission: string
{
    case CAN_SEND_MESSAGES = 'can_send_messages';
    case CAN_SEND_AUDIOS = 'can_send_audios';
    case CAN_SEND_DOCUMENTS = 'can_send_documents';
    case CAN_SEND_PHOTOS = 'can_send_photos';
    case CAN_SEND_VIDEOS = 'can_send_videos';
    case CAN_SEND_VIDEO_NOTES = 'can_send_video_notes';
    case CAN_SEND_VOICE_NOTES = 'can_send_voice_notes';
    case CAN_SEND_POLLS = 'can_send_polls';
    case CAN_SEND_OTHER_MESSAGES = 'can_send_other_messages';
    case CAN_ADD_WEB_PAGE_PREVIEWS = 'can_add_web_page_previews';
    case CAN_CHANGE_INFO = 'can_change_info';
    case CAN_INVITE_USERS = 'can_invite_users';
    case CAN_PIN_MESSAGES = 'can_pin_messages';
    case CAN_MANAGE_TOPICS = 'can_manage_topics';
}