<?php

namespace DevDasher\TelePHP\Telegram\Types\Update;

use DevDasher\TelePHP\Telegram\Enums\MessageType;
use DevDasher\TelePHP\Telegram\Enums\UpdateType;
use DevDasher\TelePHP\Telegram\Types\AbstractEntity;
use DevDasher\TelePHP\Telegram\Types\Chat\Chat;
use DevDasher\TelePHP\Telegram\Types\Chat\ChatJoinRequest;
use DevDasher\TelePHP\Telegram\Types\Chat\ChatMember;
use DevDasher\TelePHP\Telegram\Types\Inline\ChosenInlineResult;
use DevDasher\TelePHP\Telegram\Types\Inline\InlineQuery;
use DevDasher\TelePHP\Telegram\Types\Message\Message;
use DevDasher\TelePHP\Telegram\Types\Poll\Poll;
use DevDasher\TelePHP\Telegram\Types\Poll\PollAnswer;
use DevDasher\TelePHP\Telegram\Types\User;
use Illuminate\Support\Arr;

/**
 * @method int updateId() Returns the update_id
 * @method int update_id() Returns the update_id
 */
class Update extends AbstractEntity
{
    public function __construct(
        public int $update_id,
        public ?Message $message = null,
        public ?Message $edited_message = null,
        public ?Message $channel_post = null,
        public ?Message $edited_channel_post = null,
        public ?InlineQuery $inline_query = null,
        public ?ChosenInlineResult $chosen_inline_result = null,
        // public ?CallbackQuery $callback_query = null,
        // public ?ShippingQuery $shipping_query = null,
        // public ?PreCheckoutQuery $pre_checkout_query = null,
        // public ?Poll $poll = null,
        // public ?PollAnswer $poll_answer = null,
        // public ?ChatMemberUpdated $my_chat_member = null,
        // public ?ChatMemberUpdated $chat_member = null,
        // public ?ChatJoinRequest $chat_join_request = null,
    ) {
    }

    /**
     * @param string|null $nestedKeys
     * @return Chat|null|mixed
     */
    public function chat(?string $nestedKeys = null): mixed
    {
        $message = $this->message();
        $updateType = $this->type();
        $chat = match ($updateType) {
            UpdateType::MESSAGE->value,
            UpdateType::CALLBACK_QUERY->value,
            UpdateType::EDITED_MESSAGE->value,
            UpdateType::CHANNEL_POST->value,
            UpdateType::MY_CHAT_MEMBER->value,
            UpdateType::CHAT_MEMBER->value,
            UpdateType::CHAT_JOIN_REQUEST->value,
            UpdateType::EDITED_CHANNEL_POST->value => $message->chat(),
            default => null,
        };
        if (!$chat) {
            return null;
        }
        if ($nestedKeys) {
            return Arr::get($chat, $nestedKeys);
        }
        return new Chat(...$chat);
    }

    public function chatId(): ?int
    {
        return null;
    }

    public function user(?string $nestedKeys = null): ?User
    {
        return null;
    }

    public function userId(): ?int
    {
        return null;
    }

    public function message(?string $nestedKeys = null): ?Message
    {
        return null;
    }

    public function messageId(?string $nestedKeys = null): ?int
    {
        return null;
    }

    public function inlineQuery(?string $nestedKeys = null): ?InlineQuery
    {
        return null;
    }

    public function chosenInlineResult(?string $nestedKeys = null): ?ChosenInlineResult
    {
        return null;
    }

    public function callbackQuery(?string $nestedKeys = null): ?CallbackQuery
    {
        return null;
    }

    public function callbackQueryId(): ?int
    {
        return null;
    }

    public function callbackQueryData(): ?string
    {
        return null;
    }

    public function shippingQuery(?string $nestedKeys = null): ?ShippingQuery
    {
        return null;
    }

    public function preCheckoutQuery(?string $nestedKeys = null): ?PreCheckoutQuery
    {
        return null;
    }

    public function poll(?string $nestedKeys = null): ?Poll
    {
        return null;
    }

    public function pollAnswer(?string $nestedKeys = null): ?PollAnswer
    {
        return null;
    }

    public function myChatMember(?string $nestedKeys = null): ?MyChatMember
    {
        return null;
    }

    public function chatMember(?string $nestedKeys = null): ?ChatMember
    {
        return null;
    }

    public function chatJoinRequest(?string $nestedKeys = null): ?ChatJoinRequest
    {
        return null;
    }

    public function type(): string
    {
        return 'TYPE!';
        // return current(array_common_keys(getUpdate(), array_flip($this->types())));
    }

    public function types(): array
    {
        return UpdateType::cases();
    }

    public function isMessage(): bool
    {
        return $this->type() === UpdateType::MESSAGE->value;
    }

    public function isEditedMessage(): bool
    {
        return $this->type() === UpdateType::EDITED_MESSAGE->value;
    }

    public function isChannelPost(): bool
    {
        return $this->type() === UpdateType::CHANNEL_POST->value;
    }

    public function isEditedChannelPost(): bool
    {
        return $this->type() === UpdateType::EDITED_CHANNEL_POST->value;
    }

    public function isInlineQuery(): bool
    {
        return $this->type() === UpdateType::INLINE_QUERY->value;
    }

    public function isChosenInlineResult(): bool
    {
        return $this->type() === UpdateType::CHOSEN_INLINE_RESULT->value;
    }

    public function isCallbackQuery(): bool
    {
        return $this->type() === UpdateType::CALLBACK_QUERY->value;
    }

    public function isShippingQuery(): bool
    {
        return $this->type() === UpdateType::SHIPPING_QUERY->value;
    }

    public function isPreCheckoutQuery(): bool
    {
        return $this->type() === UpdateType::PRE_CHECKOUT_QUERY->value;
    }

    public function isPoll(): bool
    {
        return $this->type() === UpdateType::POLL->value;
    }

    public function isPollAnswer(): bool
    {
        return $this->type() === UpdateType::POLL_ANSWER->value;
    }

    public function isMyChatMember(): bool
    {
        return $this->type() === UpdateType::MY_CHAT_MEMBER->value;
    }

    public function isChatMember(): bool
    {
        return $this->type() === UpdateType::CHAT_MEMBER->value;
    }

    public function isChatJoinRequest(): bool
    {
        return $this->type() === UpdateType::CHAT_JOIN_REQUEST->value;
    }
}