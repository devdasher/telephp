<?php

namespace DevDasher\TelePHP\Telegram\Types\Chat;

use DevDasher\TelePHP\Telegram\Enums\ChatType;
use DevDasher\TelePHP\Telegram\Types\AbstractEntity;
use DevDasher\TelePHP\Telegram\Types\Media\Photo\PhotoSize;
use DevDasher\TelePHP\Telegram\Types\Message\Message;

/**
 * @method int id()
 * @method ChatType type()
 */
class Chat extends AbstractEntity
{
    public function __construct(
        public int $id,
        public ChatType $type,
        public ?string $title = null,
        public ?string $username = null,
        public ?string $first_name = null,
        public ?string $last_name = null,
        public ?bool $is_forum = null,
        public ?ChatPhoto $photo = null,
        public ?array $active_usernames = null,
        public ?string $emoji_status_custom_emoji_id = null,
        public ?int $emoji_status_expiration_date = null,
        public ?string $bio = null,
        public ?bool $has_private_forwards = null,
        public ?bool $has_restricted_voice_and_video_messages = null,
        public ?bool $join_to_send_messages = null,
        public ?bool $join_by_request = null,
        public ?string $description = null,
        public ?string $invite_link = null,
        public ?Message $pinned_message = null,
        public ?ChatPermissions $permissions = null,
        public ?int $slow_mode_delay = null,
        public ?int $message_auto_delete_time = null,
        public ?bool $has_aggressive_anti_spam_enabled = null,
        public ?bool $has_hidden_members = null,
        public ?bool $has_protected_content = null,
        public ?string $sticker_set_name = null,
        public ?bool $can_set_sticker_set = null,
        public ?int $linked_chat_id = null,
        public ?ChatLocation $location = null,
    ) {
    }

    public function type(): ?ChatType
    {
        return $this->type;
    }

    public function types(): array
    {
        return ChatType::cases();
    }

    public function isPrivate(): bool
    {
        return $this->type() === ChatType::PRIVATE->value;
    }

    public function isChannel(): bool
    {
        return $this->type() === ChatType::CHANNEL->value;
    }

    public function isGroup(): bool
    {
        return $this->type() === ChatType::GROUP->value;
    }

    public function isSupergroup(): bool
    {
        return $this->type() === ChatType::SUPERGROUP->value;
    }

    public function isSender(): bool
    {
        return $this->type() === ChatType::SENDER->value;
    }
}