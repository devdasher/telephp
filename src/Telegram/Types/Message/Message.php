<?php

namespace DevDasher\TelePHP\Telegram\Types\Message;

use DevDasher\TelePHP\Telegram\Types\AbstractEntity;
use DevDasher\TelePHP\Telegram\Types\Chat\Chat;
use DevDasher\TelePHP\Telegram\Types\Chat\Private\User;
use DevDasher\TelePHP\Telegram\Types\Media\Animation\Animation;
use DevDasher\TelePHP\Telegram\Types\Media\Photo\Photos;
use DevDasher\TelePHP\Telegram\Types\Media\Photo\PhotoSize;

/**
 * @method Chat chat()
 */
class Message extends AbstractEntity
{
    public function __construct(
        public int $message_id,
        public int $date,
        public Chat $chat,
        public ?User $from = null,
        public ?int $message_thread_id = null,
        public ?Chat $sender_chat = null,
        public ?User $forward_from = null,
        public ?Chat $forward_from_chat = null,
        public ?int $forward_from_message_id = null,
        public ?string $forward_signature = null,
        public ?string $forward_sender_name = null,
        public ?int $forward_date = null,
        public ?bool $is_topic_message = null,
        public ?bool $is_automatic_forward = null,
        public ?Message $reply_to_message = null,
        public ?User $via_bot = null,
        public ?int $edit_date = null,
        public ?bool $has_protected_content = null,
        public ?string $media_group_id = null,
        public ?string $author_signature = null,
        public ?string $text = null,
        public ?array $entities = null,
        public ?string $caption = null,
        public ?array $caption_entities = null,
        public ?bool $has_media_spoiler = null,
        public ?array $new_chat_members = null,
        public ?User $left_chat_member = null,
        public ?string $new_chat_title = null,
        public ?array $new_chat_photo = null,
        public ?bool $delete_chat_photo = null,
        public ?bool $group_chat_created = null,
        public ?bool $supergroup_chat_created = null,
        public ?bool $channel_chat_created = null,
        public ?int $migrate_to_chat_id = null,
        public ?int $migrate_from_chat_id = null,
        // public ?Photos $photo = null,
        public ?Animation $animation = null,
        // public ?Audio $audio = null,
        // public ?Document $document = null,
        // public ?Sticker $sticker = null,
        // public ?Story $story = null,
        // public ?Video $video = null,
        // public ?VideoNote $video_note = null,
        // public ?Voice $voice = null,
        // public ?Contact $contact = null,
        // public ?Dice $dice = null,
        // public ?Game $game = null,
        // public ?Poll $poll = null,
        // public ?Venue $venue = null,
        // public ?Location $location = null,
        // public ?MessageAutoDeleteTimerChanged $message_auto_delete_timer_changed = null,
        // public ?Message $pinned_message = null,
        // public ?Invoice $invoice = null,
        // public ?SuccessfulPayment $successful_payment = null,
        // public ?UserShared $user_shared = null,
        // public ?ChatShared $chat_shared = null,
        // public ?string $connected_website = null,
        // public ?WriteAccessAllowed $write_access_allowed = null,
        // public ?PassportData $passport_data = null,
        // public ?ProximityAlertTriggered $proximity_alert_triggered = null,
        // public ?ForumTopicCreated $forum_topic_created = null,
        // public ?ForumTopicEdited $forum_topic_edited = null,
        // public ?ForumTopicClosed $forum_topic_closed = null,
        // public ?ForumTopicReopened $forum_topic_reopened = null,
        // public ?GeneralForumTopicHidden $general_forum_topic_hidden = null,
        // public ?GeneralForumTopicUnhidden $general_forum_topic_unhidden = null,
        // public ?VideoChatScheduled $video_chat_scheduled = null,
        // public ?VideoChatStarted $video_chat_started = null,
        // public ?VideoChatEnded $video_chat_ended = null,
        // public ?VideoChatParticipantsInvited $video_chat_participants_invited = null,
        // public ?WebAppData $web_app_data = null,
        // public ?InlineKeyboardMarkup $reply_markup = null,
    ) {
    }

    public function copy(): self
    {
        return $this->getBot()->copyMessage(...get_defined_vars());
    }

    public function forward(...$vars): self
    {
        return $this->getBot()->forwardMessage(...get_defined_vars());
    }

    public function delete(): self
    {
        return $this->getBot()->deleteMessage();
    }

    public function resend(): self
    {
        return $this->getBot()->sendMessage(...get_defined_vars());
    }

    public function isForwarded(): bool
    {
        return boolval($this->forward_from || $this->forward_from_chat);
    }

    public function getText(): ?string
    {
        return $this->text ?? $this->caption;
    }

    public function getEntities(): ?MessageEntities
    {
        return $this->entities ?? $this->caption_entities;
    }

}