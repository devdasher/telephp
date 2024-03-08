<?php

namespace DevDasher\TelePHP\Telegram\Types;

use BackedEnum;
use DevDasher\TelePHP\Telegram\Enums\ChatAction;
use DevDasher\TelePHP\Telegram\Enums\ChatType;
use DevDasher\TelePHP\Telegram\Methods\Location\Location;
use DevDasher\TelePHP\Telegram\Types\Chat\Chat;
use DevDasher\TelePHP\Telegram\Types\Chat\ChatPermissions;
use DevDasher\TelePHP\Telegram\Types\Chat\ChatPhoto;
use DevDasher\TelePHP\Telegram\Types\Message\Message;
use DevDasher\TelePHP\Telegram\Types\Chat\Private\User;
use DevDasher\TelePHP\TelePHP;
use Illuminate\Support\Str;
use ReflectionClass;
use RuntimeException;

abstract class AbstractEntity
{
    public function getBot(): TelePHP
    {
        return TelePHP::getInstance();
    }
    
    public function getProperties(): array
    {
        return array_filter(get_object_vars($this), fn($v) => $v !== null);
    }

    public function toArray(): array
    {
        return json_decode(json_encode($this->getProperties()), true);
    }

    public function toJSON(int $flags = 0, int $depth = 512): string|false
    {
        return json_encode($this->getProperties(), $flags, $depth);
    }

    public function __call(string $name, array $arguments)
    {
        $name = Str::snake($name);
        if (property_exists($this, $name)) {
            return $this->{$name};
        }
        return null;
    }

    public static function create(array $properties, ?string $classToMap = null): self
    {
        $classToMap = $classToMap ?? get_called_class();
        $subEntities = $classToMap::getConvertableProperties();
        print_r($subEntities);
        foreach ($subEntities as $k => $c) {
            if (!isset($properties[$k])) {
                continue;
            }
            $property = &$properties[$k];
            if (enum_exists($c)) {
                $property = $c::from($property);
            } elseif (is_array($property)) {
                if (isset($property[0]) && is_array($property[0])) { // photo
                    foreach ($property as &$item) {
                        $item = self::create($item, $c);
                    }
                } else {
                    $property = self::create($property, $c);
                }
            }
        }
        return new $classToMap(...$properties);
    }

    public static function getConvertableProperties(string $class = null): ?array
    {
        $class = $classToMap ?? get_called_class();
        if (!class_exists($class)) {
            return null;
        }
        $rc = new ReflectionClass($class);
        $arr = [];
        foreach ($rc->getProperties() as $property) {
            $type = $property->getType();
            if (class_exists($name = $type->getName())) {
                $arr[] = $name;
            }
        }
        return $arr;
    }

    public static function getConvertableSubEntities(): array
    {
        return [];
    }

    public static function getConvertableFields(): array
    {
        return [
            Chat::class => ['chat', 'voter_chat'],
            Animation::class => ['animation'],
            Audio::class => ['audio'],
            Document::class => ['document'],
            Sticker::class => ['sticker'],
            Story::class => ['story'],
            Video::class => ['video'],
            VideoNote::class => ['video_note'],
            Voice::class => ['voice'],
            Contact::class => ['contact'],
            Dice::class => ['dice'],
            Game::class => ['game'],
            Poll::class => ['poll'],
            Venue::class => ['venue'],
            SuccessfulPayment::class => ['successful_payment'],
            UserShared::class => ['user_shared'],
            ChatShared::class => ['chat_shared'],
            WriteAccessAllowed::class => ['write_access_allowed'],
            PassportData::class => ['passport_data'],
            ProximityAlertTriggered::class => ['proximity_alert_triggered'],
            ForumTopicCreated::class => ['forum_topic_created'],
            ForumTopicEdited::class => ['forum_topic_edited'],
            ForumTopicClosed::class => ['forum_topic_closed'],
            ForumTopicReopened::class => ['forum_topic_reopened'],
            GeneralForumTopicHidden::class => ['general_forum_topic_hidden'],
            GeneralForumTopicUnhidden::class => ['general_forum_topic_unhidden'],
            VideoChatScheduled::class => ['video_chat_scheduled'],
            VideoChatStarted::class => ['video_chat_started'],
            VideoChatEnded::class => ['video_chat_ended'],
            VideoChatParticipantsInvited::class => ['video_chat_participants_invited'],
            WebAppData::class => ['web_app_data'],
            Invoice::class => ['invoice'],
            MessageAutoDeleteTimerChanged::class => ['message_auto_delete_timer_changed'],
            Message::class => ['message', 'reply_to_message'],
            User::class => [
                'from',
                'left_chat_member',
                'sender_chat',
                'forward_from_chat',
                'creator',
                'via_bot',
                'forward_from',
                'traveler',
                'watcher'
            ],
            PhotoSize::class => ['thumbnail'],
            InputFile::class => ['thumbnail'],
            Location::class => ['location'],
            KeyboardButtonRequestUser::class => ['request_user'],
            KeyboardButtonRequestChat::class => ['request_chat'],
            KeyboardButtonPollType::class => ['request_poll'],
            WebAppInfo::class => ['wep_app'],
            ChatPermissions::class => ['permissions'],
            ChatPhoto::class => ['chat_photo'],
            ChatAdministratorRights::class => ['user_administrator_rights'],
            ChatAdministratorRights::class => ['bot_administrator_rights'],
            LoginUrl::class => ['login_url'],
            SwitchInlineQueryChosenChat::class => ['switch_inline_query_chosen_chat'],
            CallbackGame::class => ['callback_game'],
            ChatMember::class => ['old_chat_member', 'new_chat_member'],
            ChatInviteLink::class => ['invite_link'],

            InlineKeyboardMarkup::class => ['reply_markup'],
            ReplyKeyboardMarkup::class => ['reply_markup'],
            ReplyKeyboardRemove::class => ['reply_markup'],
            ForceReply::class => ['reply_markup'],

            InlineKeyboardButton::class => ['inline_keyboard'],
            MessageEntity::class => ['entities', 'caption_entities', 'explanation_entities'],
            PollOption::class => ['options'],
            PhotoSize::class => ['photo', 'photos', 'new_chat_photo'],
            User::class => ['users', 'new_chat_members'],
            KeyboardButton::class => ['keyboard'],
        ];
    }

    public static function __callStatic($name, $arguments)
    {
    }
}

