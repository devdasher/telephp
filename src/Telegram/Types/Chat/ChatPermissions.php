<?php

namespace DevDasher\TelePHP\Telegram\Types\Chat;

use DevDasher\TelePHP\Telegram\Types\AbstractEntity;

class ChatPermissions extends AbstractEntity
{
    public function __construct(
        public ?bool $can_send_messages = null,
        public ?bool $can_send_audios = null,
        public ?bool $can_send_documents = null,
        public ?bool $can_send_photos = null,
        public ?bool $can_send_videos = null,
        public ?bool $can_send_video_notes = null,
        public ?bool $can_send_voice_notes = null,
        public ?bool $can_send_polls = null,
        public ?bool $can_send_other_messages = null,
        public ?bool $can_add_web_page_previews = null,
        public ?bool $can_change_info = null,
        public ?bool $can_invite_users = null,
        public ?bool $can_pin_messages = null,
        public ?bool $can_manage_topics = null,
    ) {
    }
}