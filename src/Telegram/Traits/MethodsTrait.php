<?php

namespace DevDasher\TelePHP\Telegram\Traits;

use CURLFile;
use DevDasher\TelePHP\Telegram\TelegramResponse;
use DevDasher\TelePHP\Telegram\Methods\Chat\GetChat;
use DevDasher\TelePHP\Telegram\Methods\Message\SendMessage;
use DevDasher\TelePHP\Telegram\Types\Chat\Chat;
use DevDasher\TelePHP\Telegram\Types\Message\Message;

trait MethodsTrait
{
    /**
     * Use this method to receive incoming updates using long polling [(wiki)](https://en.wikipedia.org/wiki/Push_technology#Long_polling). Returns an Array of [Update](https://core.telegram.org/bots/api#update) objects.
     *
     * @param integer $limit
     * @param integer $timeout
     * @param integer|null $offset
     * @param array|null $allowed_updates
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getupdates
     */
    public function getUpdates(
        int $limit = 100,
        int $timeout = 0,
        ?int $offset = null,
        ?array $allowed_updates = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to specify a URL and receive incoming updates via an outgoing webhook. Whenever there is an update for the bot, we will send an HTTPS POST request to the specified URL, containing a JSON-serialized Update. In case of an unsuccessful request, we will give up after a reasonable amount of attempts. Returns True on success.
     * 
     * If you'd like to make sure that the webhook was set by you, you can specify secret data in the parameter secret_token. If specified, the request will contain a header “X-Telegram-Bot-Api-Secret-Token” with the secret token as content.
     *
     * @param string $url
     * @param null|CURLFile|string|null $certificate
     * @param string|null $ip_address
     * @param integer|null $max_connections
     * @param array|null $allowed_updates
     * @param boolean|null $drop_pending_updates
     * @param string|null $secret_token A secret
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setwebhook
     */
    public function setWebhook(
        string $url,
        null|CURLFile|string $certificate = null,
        ?string $ip_address = null,
        ?int $max_connections = null,
        ?array $allowed_updates = null,
        ?bool $drop_pending_updates = null,
        ?string $secret_token = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to remove webhook integration if you decide to switch back to [getUpdates](https://core.telegram.org/bots/api#getupdates). Returns True on success.
     *
     * @param boolean|null $drop_pendinggetUpdates
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#deletewebhook
     */
    public function deleteWebhook(
        ?bool $drop_pending_updates = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get current webhook status. Requires no parameters. On success, returns a [WebhookInfo](https://core.telegram.org/bots/api#webhookinfo) object. If the bot is using [getUpdates](https://core.telegram.org/bots/api#getupdates), will return an object with the url field empty.
     *
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getwebhookinfo
     */
    public function getWebhookInfo(): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about the bot in form of a [User](https://core.telegram.org/bots/api#user) object.
     *
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getme
     */
    public function getMe(): TelegramResponse {
        return $this->sendRequest(__FUNCTION__);
    }

    /**
     * Use this method to log out from the cloud Bot API server before launching the bot locally. You must log out the bot before running it locally, otherwise there is no guarantee that the bot will receive updates. After a successful call, you can immediately log in on a local server, but will not be able to log in back to the cloud Bot API server for 10 minutes. Returns True on success. Requires no parameters.
     *
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#logout        
     */
    public function logOut(): TelegramResponse {
        return $this->sendRequest(__FUNCTION__);
    }

    /**
     * Use this method to close the bot instance before moving it from one local server to another. You need to delete the webhook before calling this method to ensure that the bot isn't launched again after server restart. The method will return error 429 in the first 10 minutes after the bot is launched. Returns True on success. Requires no parameters.
     *
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#close
     */
    public function close(): TelegramResponse {
        return $this->sendRequest(__FUNCTION__);
    }

    /**
     * Use this method to send text messages. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
     *
     * @param string $text
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param string|null $parse_mode
     * @param array|null $entities
     * @param boolean|null $disable_web_page_preview
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @return Message
     * 
     * @link https://core.telegram.org/bots/api#sendmessage   
     */
    public function sendMessage(
        string $text,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?string $parse_mode = null,
        ?array $entities = null,
        ?bool $disable_web_page_preview = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
    ): Message {
        return (new SendMessage(...get_defined_vars()))->exec();
    }

    /**
     * Use this method to forward messages of any kind. Service messages can't be forwarded. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
     *
     * @param integer|string $chat_id
     * @param integer|null $message_id
     * @param null|integer|string|null $from_chat_id
     * @param integer|null $message_thread_id
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#forwardmessage
     */
    public function forwardMessage(
        int|string $chat_id,
        ?int $message_id = null,
        null|int|string $from_chat_id = null,
        ?int $message_thread_id = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to copy messages of any kind. Service messages and invoice messages can't be copied. A [quiz](https://core.telegram.org/bots/api#poll) poll can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method [forwardMessage](https://core.telegram.org/bots/api#forwardmessage), but the copied message doesn't have a link to the original message. Returns the [MessageId](https://core.telegram.org/bots/api#messageid) of the sent message on success.
     *
     * @param integer|string $chat_id
     * @param integer|null $message_id
     * @param null|integer|string|null $from_chat_id
     * @param integer|null $message_thread_id
     * @param string|null $caption
     * @param array|null $caption_entities
     * @param string|null $parse_mode
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @return Message
     * 
     * @link https://core.telegram.org/bots/api#copymessage   
     */
    public function copyMessage(
        int|string $chat_id,
        ?int $message_id = null,
        null|int|string $from_chat_id = null,
        ?int $message_thread_id = null,
        ?string $caption = null,
        ?array $caption_entities = null,
        ?string $parse_mode = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
    ): Message {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send photos. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
     *
     * @param CURLFile|string $photo
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param string|null $caption
     * @param array|null $caption_entities
     * @param string|null $parse_mode
     * @param boolean|null $has_spoiler
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @return Message
     * 
     * @link https://core.telegram.org/bots/api#sendphoto     
     */
    public function sendPhoto(
        CURLFile|string $photo,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?string $caption = null,
        ?array $caption_entities = null,
        ?string $parse_mode = null,
        ?bool $has_spoiler = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
    ): Message {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must be in the .MP3 or .M4A format. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned. Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
     *
     * For sending voice messages, use the [sendVoice](https://core.telegram.org/bots/api#sendvoice) method instead.
     * 
     * @param CURLFile|string $audio
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param string|null $caption
     * @param array|null $caption_entities
     * @param string|null $parse_mode
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @param integer|null $duration
     * @param string|null $performer
     * @param string|null $title
     * @param null|CURLFile|string|null $thumbnail
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#sendaudio     
     */
    public function sendAudio(
        CURLFile|string $audio,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?string $caption = null,
        ?array $caption_entities = null,
        ?string $parse_mode = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
        ?int $duration = null,
        ?string $performer = null,
        ?string $title = null,
        null|CURLFile|string $thumbnail = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send general files. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned. Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param CURLFile|string $document
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param string|null $caption
     * @param array|null $caption_entities
     * @param string|null $parse_mode
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @param null|CURLFile|string|null $thumbnail
     * @param boolean|null $disable_content_type_detection
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#senddocument  
     */
    public function sendDocument(
        CURLFile|string $document,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?string $caption = null,
        ?array $caption_entities = null,
        ?string $parse_mode = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
        null|CURLFile|string $thumbnail = null,
        ?bool $disable_content_type_detection = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as Document). On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned. Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param CURLFile|string $video
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param string|null $caption
     * @param array|null $caption_entities
     * @param string|null $parse_mode
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @param null|CURLFile|string|null $thumbnail
     * @param boolean|null $disable_content_type_detection
     * @param integer|null $width
     * @param integer|null $height
     * @param boolean|null $has_spoiler
     * @param boolean|null $supports_streaming
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#sendvideo
     */
    public function sendVideo(
        CURLFile|string $video,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?string $caption = null,
        ?array $caption_entities = null,
        ?string $parse_mode = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
        null|CURLFile|string $thumbnail = null,
        ?bool $disable_content_type_detection = null,
        ?int $width = null,
        ?int $height = null,
        ?bool $has_spoiler = null,
        ?bool $supports_streaming = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param CURLFile|string $animation
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param string|null $caption
     * @param array|null $caption_entities
     * @param string|null $parse_mode
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @param null|CURLFile|string|null $thumbnail
     * @param boolean|null $disable_content_type_detection
     * @param integer|null $width
     * @param integer|null $height
     * @param boolean|null $has_spoiler
     * @param boolean|null $supports_streaming
     * @param integer|null $duration
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#sendanimation
     */
    public function sendAnimation(
        CURLFile|string $animation,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?string $caption = null,
        ?array $caption_entities = null,
        ?string $parse_mode = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
        null|CURLFile|string $thumbnail = null,
        ?bool $disable_content_type_detection = null,
        ?int $width = null,
        ?int $height = null,
        ?bool $has_spoiler = null,
        ?bool $supports_streaming = null,
        ?int $duration = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For this to work, your audio must be in an .OGG file encoded with OPUS (other formats may be sent as [Audio](https://core.telegram.org/bots/api#audio) or [Document](https://core.telegram.org/bots/api#audio)). On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
     *
     * @param CURLFile|string $voice
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param string|null $caption
     * @param array|null $caption_entities
     * @param string|null $parse_mode
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#sendvoice
     */
    public function sendVoice(
        CURLFile|string $voice,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?string $caption = null,
        ?array $caption_entities = null,
        ?string $parse_mode = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * As of [v.4.0](https://telegram.org/blog/video-messages-and-telescope), Telegram clients support rounded square MPEG4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
     *
     * @param CURLFile|string $video_note
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param string|null $caption
     * @param array|null $caption_entities
     * @param string|null $parse_mode
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @param integer|null $duration
     * @param integer|null $length
     * @param null|CURLFile|string|null $thumbnail
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#sendvideonote
     */
    public function sendVideoNote(
        CURLFile|string $video_note,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?string $caption = null,
        ?array $caption_entities = null,
        ?string $parse_mode = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
        ?int $duration = null,
        ?int $length = null,
        null|CURLFile|string $thumbnail = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be only grouped in an album with messages of the same type. On success, an array of [Messages](https://core.telegram.org/bots/api#message) that were sent is returned.
     *
     * @param array $media
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#sendmediagroup
     */
    public function sendMediaGroup(
        array $media,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send point on the map. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
     *
     * @param float|string $latitude
     * @param float|string $longitude
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @param null|float|string|null $horizontal_accuracy
     * @param integer|null $live_period
     * @param integer|null $heading
     * @param integer|null $proximity_alert_radius
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#sendlocation
     */
    public function sendLocation(
        float|string $latitude,
        float|string $longitude,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
        null|float|string $horizontal_accuracy = null,
        ?int $live_period = null,
        ?int $heading = null,
        ?int $proximity_alert_radius = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send information about a venue. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
     *
     * @param string $title
     * @param string $address
     * @param float|string $latitude
     * @param float|string $longitude
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @param string|null $foursquare_id
     * @param string|null $foursquare_type
     * @param string|null $google_place_id
     * @param string|null $google_place_type
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#sendvenue
     */
    public function sendVenue(
        string $title,
        string $address,
        float|string $latitude,
        float|string $longitude,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
        ?string $foursquare_id = null,
        ?string $foursquare_type = null,
        ?string $google_place_id = null,
        ?string $google_place_type = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send phone contacts. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
     *
     * @param string $phone_number
     * @param string $first_name
     * @param string|null $last_name
     * @param string|null $vcard
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#sendcontact
     */
    public function sendContact(
        string $phone_number,
        string $first_name,
        ?string $last_name = null,
        ?string $vcard = null,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send a native poll. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
     *
     * @param string $question
     * @param array $options
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @param boolean|null $is_anonymous
     * @param string|null $type
     * @param boolean|null $allows_multiple_answers
     * @param integer|null $correct_option_id
     * @param string|null $explanation
     * @param string|null $explanation_parse_mode
     * @param array|null $explanation_entities
     * @param integer|null $open_period
     * @param integer|null $close_date
     * @param boolean|null $is_closed
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#sendpoll
     */
    public function sendPoll(
        string $question,
        array $options,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
        ?bool $is_anonymous = null,
        ?string $type = null,
        ?bool $allows_multiple_answers = null,
        ?int $correct_option_id = null,
        ?string $explanation = null,
        ?string $explanation_parse_mode = null,
        ?array $explanation_entities = null,
        ?int $open_period = null,
        ?int $close_date = null,
        ?bool $is_closed = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send an animated emoji that will display a random value. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
     *
     * @param string $emoji
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#senddice
     */
    public function sendDice(
        string $emoji,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on success.
     *
     * - Example: The ImageBot needs some time to process a request and upload the image. Instead of sending a text message along the lines of “Retrieving image, please wait…”, the bot may use sendChatAction with action = upload_photo. The user will see a “sending photo” status for the bot.
     * 
     * We only recommend using this method when a TelegramResponse from the bot will take a noticeable amount of time to arrive.
     * 
     * @param string $action
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#sendchataction
     */
    public function sendChatAction(
        string $action,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get a list of profile pictures for a user. Returns a [UserProfilePhotos](https://core.telegram.org/bots/api#userprofilephotos) object.
     *
     * @param integer|null $user_id
     * @param integer|null $offset
     * @param integer|null $limit
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getuserprofilephotos
     */
    public function getUserProfilePhotos(
        ?int $user_id = null,
        ?int $offset = null,
        ?int $limit = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get basic information about a file and prepare it for downloading. For the moment, bots can download files of up to 20MB in size. On success, a File object is returned. The file can then be downloaded via the link `https://api.telegram.org/file/bot<token>/<file_path>`, where `<file_path>` is taken from the TelegramResponse. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile again.
     * 
     * @link https://core.telegram.org/bots/api#note
     *
     * Note: This function may not preserve the original file name and MIME type. You should save the file's MIME type and name (if available) when the File object is received.
     * 
     * @param string $file_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getfile
     */
    public function getFile(
        string $file_id,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able to return to the chat on their own using invite links, etc., unless [unbanned](https://core.telegram.org/bots/api#unbanchatmember) first. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param integer $user_id
     * @param null|integer|string|null $chat_id
     * @param integer|null $until_date
     * @param boolean|null $revoke_messages
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#banchatmember
     */
    public function banChatMember(
        int $user_id,
        null|int|string $chat_id = null,
        ?int $until_date = null,
        ?bool $revoke_messages = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to unban a previously banned user in a supergroup or channel. The user will not return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. By default, this method guarantees that after the call the user is not a member of the chat, but will be able to join it. So if the user is a member of the chat they will also be removed from the chat. If you don't want this, use the parameter only_if_banned. Returns True on success.
     *
     * @param integer $user_id
     * @param null|integer|string|null $chat_id
     * @param boolean|null $only_if_banned
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#unbanchatmember
     */
    public function unbanChatMember(
        int $user_id,
        null|int|string $chat_id = null,
        ?bool $only_if_banned = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work and must have the appropriate administrator rights. Pass True for all permissions to lift restrictions from a user. Returns True on success.
     *
     * @param integer $user_id
     * @param array $permissions
     * @param null|integer|string|null $chat_id
     * @param boolean|null $only_if_banned
     * @param boolean|null $use_independent_chat_permissions
     * @param integer|null $until_date
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#restrictchatmember
     */
    public function restrictChatMember(
        int $user_id,
        array $permissions,
        null|int|string $chat_id = null,
        ?bool $only_if_banned = null,
        ?bool $use_independent_chat_permissions = null,
        ?int $until_date = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Pass False for all boolean parameters to demote a user. Returns True on success.
     *
     * @param integer $user_id
     * @param null|integer|string|null $chat_id
     * @param boolean|null $is_anonymous
     * @param boolean|null $can_manage_chat
     * @param boolean|null $can_post_messages
     * @param boolean|null $can_edit_messages
     * @param boolean|null $can_delete_messages
     * @param boolean|null $can_manage_video_chats
     * @param boolean|null $can_restrict_members
     * @param boolean|null $can_promote_members
     * @param boolean|null $can_change_info
     * @param boolean|null $can_invite_users
     * @param boolean|null $can_pin_messages
     * @param boolean|null $can_manage_topics
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#promotechatmember
     */
    public function promoteChatMember(
        int $user_id,
        null|int|string $chat_id = null,
        ?bool $is_anonymous = null,
        ?bool $can_manage_chat = null,
        ?bool $can_post_messages = null,
        ?bool $can_edit_messages = null,
        ?bool $can_delete_messages = null,
        ?bool $can_manage_video_chats = null,
        ?bool $can_restrict_members = null,
        ?bool $can_promote_members = null,
        ?bool $can_change_info = null,
        ?bool $can_invite_users = null,
        ?bool $can_pin_messages = null,
        ?bool $can_manage_topics = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.
     *
     * @param integer $user_id
     * @param null|integer|string|null $chat_id
     * @param string $custom_title
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setchatadministratorcustomtitle
     */
    public function setChatAdministratorCustomTitle(
        int $user_id,
        null|int|string $chat_id = null,
        string $custom_title,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to ban a channel chat in a supergroup or a channel. Until the chat is [unbanned](https://core.telegram.org/bots/api#unbanchatsenderchat), the owner of the banned chat won't be able to send messages on behalf of any of their channels. The bot must be an administrator in the supergroup or channel for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param integer $sender_chat_id
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#banchatsenderchat
     */
    public function banChatSenderChat(
        int $sender_chat_id,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an administrator for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param integer $sender_chat_id
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#unbanchatsenderchat
     */
    public function unbanChatSenderChat(
        int $sender_chat_id,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a supergroup for this to work and must have the can_restrict_members administrator rights. Returns True on success.
     *
     * @param array $permissions
     * @param null|integer|string|null $chat_id
     * @param boolean|null $use_independent_chat_permissions
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setchatpermissions
     */
    public function setChatPermissions(
        array $permissions,
        null|int|string $chat_id = null,
        ?bool $use_independent_chat_permissions = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to generate a new primary invite link for a chat; any previously generated primary link is revoked. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the new invite link as String on success.
     *
     * - Note: Each administrator in a chat generates their own invite links. Bots can't use invite links generated by other administrators. If you want your bot to work with invite links, it will need to generate its own link using exportChatInviteLink or by calling the getChat method. If your bot needs to generate a new primary invite link replacing its previous one, use exportChatInviteLink again.
     * 
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#exportchatinvitelink
     */
    public function exportChatInviteLink(null|int|string $chat_id = null): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. The link can be revoked using the method [revokeChatInviteLink](https://core.telegram.org/bots/api#revokechatinvitelink). Returns the new invite link as [ChatInviteLink](https://core.telegram.org/bots/api#chatinvitelink) object.
     *
     * @param null|integer|string|null $chat_id
     * @param string|null $name
     * @param integer|null $expire_date
     * @param integer|null $member_limit
     * @param boolean|null $creates_join_request
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#createchatinvitelink
     */
    public function createChatInviteLink(
        null|int|string $chat_id = null,
        ?string $name = null,
        ?int $expire_date = null,
        ?int $member_limit = null,
        ?bool $creates_join_request = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the edited invite link as a [ChatInviteLink](https://core.telegram.org/bots/api#chatinvitelink) object.
     *
     * @param string $invite_link
     * @param null|integer|string|null $chat_id
     * @param string|null $name
     * @param integer|null $expire_date
     * @param integer|null $member_limit
     * @param boolean|null $creates_join_request
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#editchatinvitelink
     */
    public function editChatInviteLink(
        string $invite_link,
        null|int|string $chat_id = null,
        ?string $name = null,
        ?int $expire_date = null,
        ?int $member_limit = null,
        ?bool $creates_join_request = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically generated. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the revoked invite link as [ChatInviteLink](https://core.telegram.org/bots/api#chatinvitelink) object.
     *
     * @param string $invite_link
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#revokechatinvitelink
     */
    public function revokeChatInviteLink(
        string $invite_link,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to approve a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
     *
     * @param integer $user_id
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#approvechatjoinrequest
     */
    public function approveChatJoinRequest(
        int $user_id,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to decline a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
     *
     * @param integer $user_id
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#declinechatjoinrequest
     */
    public function declineChatJoinRequest(
        int $user_id,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param null|CURLFile|string $photo
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setchatphoto
     */
    public function setChatPhoto(
        null|CURLFile|string $photo,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#deletechatphoto
     */
    public function deleteChatPhoto(
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param string $title
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setchattitle
     */
    public function setChatTitle(
        string $title,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     *
     * @param string $description
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setchatdescription
     */
    public function setChatDescription(
        string $description,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to add a message to the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
     *
     * @param integer $message_id
     * @param null|integer|string|null $chat_id
     * @param boolean|null $disable_notification
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#pinchatmessage
     */
    public function pinChatMessage(
        int $message_id,
        null|int|string $chat_id = null,
        ?bool $disable_notification = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to remove a message from the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
     *
     * @param integer $message_id
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#unpinchatmessage
     */
    public function unpinChatMessage(
        int $message_id,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to clear the list of pinned messages in a chat. If the chat is not a private chat, the bot must be an administrator in the chat for this to work and must have the 'can_pin_messages' administrator right in a supergroup or 'can_edit_messages' administrator right in a channel. Returns True on success.
     *
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#unpinallchatmessages
     */
    public function unpinAllChatMessages(
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
     *
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#leavechat
     */
    public function leaveChat(
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get up to date information about the chat (current name of the user for one-on-one conversations, current username of a user, group or channel, etc.). Returns a [Chat](https://core.telegram.org/bots/api#chat) object on success.
     *
     * @param null|integer|string|null $chat_id
     * @return Chat
     * 
     * @link https://core.telegram.org/bots/api#getchat
     */
    public function getChat(
        null|int|string $chat_id = null,
    ): Chat {
        return (new GetChat(...get_defined_vars()))->exec();
    }

    /**
     * Use this method to get a list of administrators in a chat, which aren't bots. Returns an Array of [ChatMember](https://core.telegram.org/bots/api#chatmember) objects.
     *
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getchatadministrators
     */
    public function getChatAdministrators(
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get the number of members in a chat. Returns Int on success.
     *
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getchatmembercount
     */
    public function getChatMemberCount(
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get information about a member of a chat. The method is only guaranteed to work for other users if the bot is an administrator in the chat. Returns a [ChatMember](https://core.telegram.org/bots/api#chatmember) object on success.
     *
     * @param integer $user_id
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getchatmember
     */
    public function getChatMember(
        int $user_id,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in [getChat](https://core.telegram.org/bots/api#getchat) requests to check if the bot can use this method. Returns True on success.
     *
     * @param string $sticker_set_name
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setchatstickerset
     */
    public function setChatStickerSet(
        string $sticker_set_name,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in [getChat](https://core.telegram.org/bots/api#getchat) requests to check if the bot can use this method. Returns True on success.
     *
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#deletechatstickerset
     */
    public function deleteChatStickerSet(
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user. Requires no parameters. Returns an Array of [Sticker](https://core.telegram.org/bots/api#sticker) objects.
     *
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getforumtopiciconstickers
     */
    public function getForumTopicIconStickers(): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to create a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns information about the created topic as a [ForumTopic](https://core.telegram.org/bots/api#forumtopic) object.
     *
     * @param string $name
     * @param null|integer|string|null $chat_id
     * @param integer|null $icon_color
     * @param string|null $icon_custom_emoji_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#createforumtopic
     */
    public function createForumTopic(
        string $name,
        null|int|string $chat_id = null,
        ?int $icon_color = null,
        ?string $icon_custom_emoji_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to edit name and icon of a topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
     *
     * @param integer $message_thread_id
     * @param null|integer|string|null $chat_id
     * @param string|null $name
     * @param string|null $icon_custom_emoji_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#editforumtopic
     */
    public function editForumTopic(
        int $message_thread_id,
        null|int|string $chat_id = null,
        ?string $name,
        ?string $icon_custom_emoji_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to close an open topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
     *
     * @param integer $message_thread_id
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#closeforumtopic
     */
    public function closeForumTopic(
        int $message_thread_id,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to reopen a closed topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
     *
     * @param integer $message_thread_id
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#reopenforumtopic
     */
    public function reopenForumTopic(
        int $message_thread_id,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to delete a forum topic along with all its messages in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_delete_messages administrator rights. Returns True on success.
     *
     * @param integer $message_thread_id
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#deleteforumtopic
     */
    public function deleteForumTopic(
        int $message_thread_id,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to clear the list of pinned messages in a forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
     *
     * @param integer $message_thread_id
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#unpinallforumtopicmessages
     */
    public function unpinAllForumTopicMessages(
        int $message_thread_id,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to edit the name of the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have can_manage_topics administrator rights. Returns True on success.
     *
     * @param string $name
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#editgeneralforumtopic
     */
    public function editGeneralForumTopic(
        string $name,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to close an open 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
     *
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#closegeneralforumtopic
     */
    public function closeGeneralForumTopic(
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to reopen a closed 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. The topic will be automatically unhidden if it was hidden. Returns True on success.
     *
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#reopengeneralforumtopic
     */
    public function reopenGeneralForumTopic(
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to hide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. The topic will be automatically closed if it was open. Returns True on success.
     *
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#hidegeneralforumtopic
     */
    public function hideGeneralForumTopic(
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to unhide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
     *
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#unhidegeneralforumtopic
     */
    public function unhideGeneralForumTopic(
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to clear the list of pinned messages in a General forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
     *
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     */
    public function unpinAllGeneralForumTopicMessages(
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }


    /**
     * Use this method to send answers to callback queries sent from [inline keyboards](https://core.telegram.org/bots/features#inline-keyboards). The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, True is returned.
     * 
     * - Alternatively, the user can be redirected to the specified Game URL. For this option to work, you must first create a game for your bot via [@BotFather](https://t.me/botfather) and accept the terms. Otherwise, you may use links like `t.me/your_bot?start=XXXX` that open your bot with a parameter.
     *
     * @param string $text
     * @param boolean|null $show_alert
     * @param string|null $url
     * @param integer|null $cache_time
     * @param integer|null $callback_query_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#answercallbackquery
     */
    public function answerCallbackQuery(
        string $text,
        ?bool $show_alert = null,
        ?string $url = null,
        ?int $cache_time = null,
        ?int $callback_query_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to change the list of the bot's commands. See [this manual](https://core.telegram.org/bots/features#commands) for more details about bot commands. Returns True on success.
     *
     * @param array $commands
     * @param array|null $scope
     * @param string|null $language_code
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setmycommands
     */
    public function setMyCommands(
        array $commands,
        ?array $scope = null,
        ?string $language_code = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to delete the list of the bot's commands for the given scope and user language. After deletion, [higher level commands](https://core.telegram.org/bots/api#determining-list-of-commands) will be shown to affected users. Returns True on success.
     *
     * @param array|null $scope
     * @param string|null $language_code
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#deletemycommands
     */
    public function deleteMyCommands(
        ?array $scope = null,
        ?string $language_code = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get the current list of the bot's commands for the given scope and user language. Returns an Array of [BotCommand](https://core.telegram.org/bots/api#botcommand) objects. If commands aren't set, an empty list is returned.
     *
     * @param array|null $scope
     * @param string|null $language_code
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getmycommands
     */
    public function getMyCommands(
        ?array $scope = null,
        ?string $language_code = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to change the bot's name. Returns True on success.
     *
     * @param string|null $name
     * @param string|null $language_code
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setmyname
     */
    public function setMyName(
        ?string $name = null,
        ?string $language_code = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get the current bot name for the given user language. Returns [BotName](https://core.telegram.org/bots/api#botname) on success.
     *
     * @param string|null $language_code
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getmyname
     */
    public function getMyName(
        ?string $language_code = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to change the bot's description, which is shown in the chat with the bot if the chat is empty. Returns True on success.
     *
     * @param string|null $description
     * @param string|null $language_code
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setmydescription
     */
    public function setMyDescription(
        ?string $description = null,
        ?string $language_code = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get the current bot description for the given user language. Returns [BotDescription](https://core.telegram.org/bots/api#botdescription) on success.
     *
     * @param string|null $language_code
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getmydescription
     */
    public function getMyDescription(
        ?string $language_code = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to change the bot's short description, which is shown on the bot's profile page and is sent together with the link when users share the bot. Returns True on success.
     *
     * @param string|null $short_description
     * @param string|null $language_code
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setmyshortdescription
     */
    public function setMyShortDescription(
        ?string $short_description = null,
        ?string $language_code = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get the current bot short description for the given user language. Returns [BotShortDescription](https://core.telegram.org/bots/api#botshortdescription) on success.
     *
     * @param string|null $language_code
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getmyshortdescription
     */
    public function getMyShortDescription(
        ?string $language_code = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to change the bot's menu button in a private chat, or the default menu button. Returns True on success.
     *
     * @param array|null $menu_button
     * @param null|integer|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setchatmenubutton
     */
    public function setChatMenuButton(
        ?array $menu_button = null,
        null|int $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get the current value of the bot's menu button in a private chat, or the default menu button. Returns [MenuButton](https://core.telegram.org/bots/api#menubutton) on success.
     *
     * @param null|integer|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getchatmenubutton
     */
    public function getChatMenuButton(
        null|int $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to change the default administrator rights requested by the bot when it's added as an administrator to groups or channels. These rights will be suggested to users, but they are free to modify the list before adding the bot. Returns True on success.
     *
     * @param array|null $rights
     * @param boolean|null $for_channels
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setmydefaultadministratorrights
     */
    public function setMyDefaultAdministratorRights(
        ?array $rights = null,
        ?bool $for_channels = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get the current default administrator rights of the bot. Returns [ChatAdministratorRights](https://core.telegram.org/bots/api#chatadministratorrights) on success.
     *
     * @param boolean|null $for_channels
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getmydefaultadministratorrights
     */
    public function getMyDefaultAdministratorRights(
        ?bool $for_channels = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to edit text and [game](https://core.telegram.org/bots/api#games) messages. On success, if the edited message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
     *
     * @param string $text
     * @param integer|null $message_id
     * @param null|integer|string|null $chat_id
     * @param string|null $inline_message_id
     * @param string|null $parse_mode
     * @param array|null $entities
     * @param boolean|null $disable_web_page_preview
     * @param array|null $reply_markup
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#editmessagetext
     */
    public function editMessageText(
        string $text,
        ?int $message_id = null,
        null|int|string $chat_id = null,
        ?string $inline_message_id = null,
        ?string $parse_mode = null,
        ?array $entities = null,
        ?bool $disable_web_page_preview = null,
        ?array $reply_markup = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to edit captions of messages. On success, if the edited message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
     *
     * @param string|null $caption
     * @param integer|null $message_id
     * @param null|integer|string|null $chat_id
     * @param string|null $inline_message_id
     * @param string|null $parse_mode
     * @param array|null $caption_entities
     * @param array|null $reply_markup
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#editmessagecaption
     */
    public function editMessageCaption(
        ?string $caption = null,
        ?int $message_id = null,
        null|int|string $chat_id = null,
        ?string $inline_message_id = null,
        ?string $parse_mode = null,
        ?array $caption_entities = null,
        ?array $reply_markup = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to edit animation, audio, document, photo, or video messages. If a message is part of a message album, then it can be edited only to an audio for audio albums, only to a document for document albums and to a photo or a video otherwise. When an inline message is edited, a new file can't be uploaded; use a previously uploaded file via its file_id or specify a URL. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
     *
     * @param array $media
     * @param integer|null $message_id
     * @param null|integer|string|null $chat_id
     * @param string|null $inline_message_id
     * @param array|null $reply_markup
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#editmessagemedia
     */
    public function editMessageMedia(
        array $media,
        ?int $message_id = null,
        null|int|string $chat_id = null,
        ?string $inline_message_id = null,
        ?array $reply_markup = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly disabled by a call to [stopMessageLiveLocation](https://core.telegram.org/bots/api#stopmessagelivelocation). On success, if the edited message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
     *
     * @param float|string $latitude
     * @param float|string $longitude
     * @param integer|null $message_id
     * @param null|integer|string|null $chat_id
     * @param string|null $inline_message_id
     * @param array|null $reply_markup
     * @param null|float|string|null $horizontal_accuracy
     * @param integer|null $heading
     * @param integer|null $proximity_alert_radius
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#editmessagelivelocation
     */
    public function editMessageLiveLocation(
        float|string $latitude,
        float|string $longitude,
        ?int $message_id = null,
        null|int|string $chat_id = null,
        ?string $inline_message_id = null,
        ?array $reply_markup = null,
        null|float|string $horizontal_accuracy = null,
        ?int $heading = null,
        ?int $proximity_alert_radius = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to stop updating a live location message before live_period expires. On success, if the message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
     *
     * @param integer|null $message_id
     * @param string|null $inline_message_id
     * @param null|integer|string|null $chat_id
     * @param array|null $reply_markup
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#stopmessagelivelocation
     */
    public function stopMessageLiveLocation(
        ?int $message_id = null,
        ?string $inline_message_id = null,
        null|int|string $chat_id = null,
        ?array $reply_markup = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to edit only the reply markup of messages. On success, if the edited message is not an inline message, the edited [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned.
     *
     * @param array|null $reply_markup
     * @param integer|null $message_id
     * @param null|integer|string|null $chat_id
     * @param string|null $inline_message_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#editmessagereplymarkup
     */
    public function editMessageReplyMarkup(
        ?array $reply_markup = null,
        ?int $message_id = null,
        null|int|string $chat_id = null,
        ?string $inline_message_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to stop a poll which was sent by the bot. On success, the stopped [Poll](https://core.telegram.org/bots/api#poll) is returned.
     *
     * @param integer|null $message_id
     * @param null|integer|string|null $chat_id
     * @param array|null $reply_markup
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#stoppoll
     */
    public function stopPoll(
        ?int $message_id = null,
        null|int|string $chat_id = null,
        ?array $reply_markup = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to delete a message, including service messages, with the following limitations:
     * 
     * - A message can only be deleted if it was sent less than 48 hours ago.
     * - Service messages about a supergroup, channel, or forum topic creation can't be deleted.
     * - A dice message in a private chat can only be deleted if it was sent more than 24 hours ago.
     * - Bots can delete outgoing messages in private chats, groups, and supergroups.
     * - Bots can delete incoming messages in private chats.
     * - Bots granted can_post_messages permissions can delete outgoing messages in channels.
     * - If the bot is an administrator of a group, it can delete any message there.
     * - If the bot has can_delete_messages permission in a supergroup or a channel, it can delete any message there.
     * 
     * Returns True on success.
     *
     * @param integer $message_id
     * @param null|integer|string|null $chat_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#deletemessage
     */
    public function deleteMessage(
        null|int $message_id = null,
        null|int|string $chat_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send static .WEBP, [animated](https://telegram.org/blog/animated-stickers) .TGS, or [video](https://telegram.org/blog/video-stickers-better-reactions) .WEBM stickers. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
     *
     * @param CURLFile|string $sticker
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param array|null $reply_markup
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param string|null $emoji
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#sendsticker
     */
    public function sendSticker(
        CURLFile|string $sticker,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?array $reply_markup = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?string $emoji = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get a sticker set. On success, a [StickerSet](https://core.telegram.org/bots/api#stickerset) object is returned.
     *
     * @param string $name
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getstickerset
     */
    public function getStickerSet(string $name): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of Sticker objects.
     *
     * @param array $custom_emoji_ids
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getcustomemojistickers
     */
    public function getCustomEmojiStickers(array $custom_emoji_ids): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to upload a file with a sticker for later use in the [createNewStickerSet](https://core.telegram.org/bots/api#createnewstickerset) and [addStickerToSet](https://core.telegram.org/bots/api#addstickertoset) methods (the file can be used multiple times). Returns the uploaded [File](https://core.telegram.org/bots/api#file) on success.
     *
     * @param null|CURLFile|string $sticker
     * @param string $sticker_format
     * @param integer|null $user_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#uploadstickerfile
     */
    public function uploadStickerFile(
        null|CURLFile|string $sticker,
        string $sticker_format,
        ?int $user_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. Returns True on success.
     *
     * @param string $name
     * @param string $title
     * @param array $stickers
     * @param string $sticker_format
     * @param integer|null $user_id
     * @param string|null $sticker_type
     * @param boolean|null $needs_repainting
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#createnewstickerset
     */
    public function createNewStickerSet(
        string $name,
        string $title,
        array $stickers,
        string $sticker_format,
        ?int $user_id = null,
        ?string $sticker_type = null,
        ?bool $needs_repainting = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to add a new sticker to a set created by the bot. The format of the added sticker must match the format of the other stickers in the set. Emoji sticker sets can have up to 200 stickers. Animated and video sticker sets can have up to 50 stickers. Static sticker sets can have up to 120 stickers. Returns True on success.
     *
     * @param string $name
     * @param array $sticker
     * @param integer|null $user_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#addstickertoset
     */
    public function addStickerToSet(
        string $name,
        array $sticker,
        ?int $user_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to move a sticker in a set created by the bot to a specific position. Returns True on success.
     *
     * @param string $sticker
     * @param integer $position
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setstickerpositioninset
     */
    public function setStickerPositionInSet(
        string $sticker,
        int $position,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to delete a sticker from a set created by the bot. Returns True on success.
     *
     * @param string $sticker
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#deletestickerfromset
     */
    public function deleteStickerFromSet(string $sticker): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to change the list of emoji assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
     *
     * @param string $sticker
     * @param array $emoji_list
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setstickeremojilist
     */
    public function setStickerEmojiList(
        string $sticker,
        array $emoji_list,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to change search keywords assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
     *
     * @param string $sticker
     * @param array|null $keywords
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setstickerkeywords
     */
    public function setStickerKeywords(
        string $sticker,
        ?array $keywords = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to change the [mask position](https://core.telegram.org/bots/api#maskposition) of a mask sticker. The sticker must belong to a sticker set that was created by the bot. Returns True on success.
     *
     * @param string $sticker
     * @param array|null $mask_position
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setstickermaskposition
     */
    public function setStickerMaskPosition(
        string $sticker,
        ?array $mask_position = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to set the title of a created sticker set. Returns True on success.
     *
     * @param string $name
     * @param string $title
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setstickersettitle
     */
    public function setStickerSetTitle(
        string $name,
        string $title,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to set the thumbnail of a regular or mask sticker set. The format of the thumbnail file must match the format of the stickers in the set. Returns True on success.
     *
     * @param string $name
     * @param integer|null $user_id
     * @param null|CURLFile|string|null $thumbnail
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setstickersetthumbnail
     */
    public function setStickerSetThumbnail(
        string $name,
        ?int $user_id = null,
        null|CURLFile|string $thumbnail = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to set the thumbnail of a custom emoji sticker set. Returns True on success.
     *
     * @param string $name
     * @param string|null $custom_emoji_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setcustomemojistickersetthumbnail
     */
    public function setCustomEmojiStickerSetThumbnail(
        string $name,
        ?string $custom_emoji_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to delete a sticker set that was created by the bot. Returns True on success.
     *
     * @param string $name
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#deletestickerset
     */
    public function deleteStickerSet(string $name): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send answers to an inline query. On success, True is returned.
     * 
     * No more than 50 results per query are allowed.
     *
     * @param array $results
     * @param integer|null $cache_time
     * @param boolean|null $is_personal
     * @param string|null $next_offset
     * @param array|null $button
     * @param string|null $inline_query_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#answerinlinequery
     */
    public function answerInlineQuery(
        array $results,
        ?int $cache_time = null,
        ?bool $is_personal = null,
        ?string $next_offset = null,
        ?array $button = null,
        ?string $inline_query_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to set the result of an interaction with a [Web App](https://core.telegram.org/bots/webapps) and send a corresponding message on behalf of the user to the chat from which the query originated. On success, a [SentWebAppMessage](https://core.telegram.org/bots/api#sentwebappmessage) object is returned.
     *
     * @param array $result
     * @param string|null $web_app_query_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#answerwebappquery
     */
    public function answerWebAppQuery(
        array $result,
        ?string $web_app_query_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send invoices. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
     *
     * @param string $title
     * @param string $description
     * @param string $payload
     * @param string $provider_token
     * @param string $currency
     * @param array $prices
     * @param null|integer|string|null $chat_id
     * @param integer|null $message_thread_id
     * @param integer|null $max_tip_amount
     * @param array|null $suggested_tip_amounts
     * @param string|null $start_parameter
     * @param string|null $provider_data
     * @param string|null $photo_url
     * @param integer|null $photo_size
     * @param integer|null $photo_width
     * @param integer|null $photo_height
     * @param boolean|null $need_name
     * @param boolean|null $need_phone_number
     * @param boolean|null $need_email
     * @param boolean|null $need_shipping_address
     * @param boolean|null $send_phone_number_to_provider
     * @param boolean|null $send_email_to_provider
     * @param boolean|null $is_flexible
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#sendinvoice
     */
    public function sendInvoice(
        string $title,
        string $description,
        string $payload,
        string $provider_token,
        string $currency,
        array $prices,
        null|int|string $chat_id = null,
        ?int $message_thread_id = null,
        ?int $max_tip_amount = null,
        ?array $suggested_tip_amounts = null,
        ?string $start_parameter = null,
        ?string $provider_data = null,
        ?string $photo_url = null,
        ?int $photo_size = null,
        ?int $photo_width = null,
        ?int $photo_height = null,
        ?bool $need_name = null,
        ?bool $need_phone_number = null,
        ?bool $need_email = null,
        ?bool $need_shipping_address = null,
        ?bool $send_phone_number_to_provider = null,
        ?bool $send_email_to_provider = null,
        ?bool $is_flexible = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to create a link for an invoice. Returns the created invoice link as String on success.
     *
     * @param string $title
     * @param string $description
     * @param string $payload
     * @param string $provider_token
     * @param string $currency
     * @param array $prices
     * @param integer|null $max_tip_amount
     * @param array|null $suggested_tip_amounts
     * @param string|null $provider_data
     * @param string|null $photo_url
     * @param integer|null $photo_size
     * @param integer|null $photo_width
     * @param integer|null $photo_height
     * @param boolean|null $need_name
     * @param boolean|null $need_phone_number
     * @param boolean|null $need_email
     * @param boolean|null $need_shipping_address
     * @param boolean|null $send_phone_number_to_provider
     * @param boolean|null $send_email_to_provider
     * @param boolean|null $is_flexible
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#createinvoicelink
     */
    public function createInvoiceLink(
        string $title,
        string $description,
        string $payload,
        string $provider_token,
        string $currency,
        array $prices,
        ?int $max_tip_amount = null,
        ?array $suggested_tip_amounts = null,
        ?string $provider_data = null,
        ?string $photo_url = null,
        ?int $photo_size = null,
        ?int $photo_width = null,
        ?int $photo_height = null,
        ?bool $need_name = null,
        ?bool $need_phone_number = null,
        ?bool $need_email = null,
        ?bool $need_shipping_address = null,
        ?bool $send_phone_number_to_provider = null,
        ?bool $send_email_to_provider = null,
        ?bool $is_flexible = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API will send an [Update](https://core.telegram.org/bots/api#update) with a shipping_query field to the bot. Use this method to reply to shipping queries. On success, True is returned.
     *
     * @param boolean $ok
     * @param array|null $shipping_options
     * @param string|null $errorgetMessage
     * @param string|null $shipping_query_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#answershippingquery
     */
    public function answerShippingQuery(
        bool $ok,
        ?array $shipping_options = null,
        ?string $errorgetMessage = null,
        ?string $shipping_query_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the form of an [Update](https://core.telegram.org/bots/api#update) with the field pre_checkout_query. Use this method to respond to such pre-checkout queries. On success, True is returned. Note: The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
     *
     * @param boolean $ok
     * @param string|null $errorgetMessage
     * @param string|null $pre_checkout_query_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#answerprecheckoutquery
     */
    public function answerPreCheckoutQuery(
        bool $ok,
        ?string $errorgetMessage = null,
        ?string $pre_checkout_query_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Informs a user that some of the Telegram Passport elements they provided contains errors. The user will not be able to re-submit their Passport to you until the errors are fixed (the contents of the field for which you returned the error must change). Returns True on success.
     * 
     * Use this if the data submitted by the user doesn't satisfy the standards your service requires for any reason. For example, if a birthday date seems invalid, a submitted document is blurry, a scan shows evidence of tampering, etc. Supply some details in the error message to make sure the user knows how to correct the issues.
     *
     * @param integer $user_id
     * @param array $errors
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setpassportdataerrors
     */
    public function setPassportDataErrors(int $user_id, array $errors): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to send a game. On success, the sent [Message](https://core.telegram.org/bots/api#message) is returned.
     *
     * @param string $game_short_name
     * @param integer|null $chat_id
     * @param integer|null $message_thread_id
     * @param boolean|null $disable_notification
     * @param boolean|null $protect_content
     * @param integer|null $reply_to_message_id
     * @param boolean|null $allow_sending_without_reply
     * @param array|null $reply_markup
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#sendgame
     */
    public function sendGame(
        string $game_short_name,
        ?int $chat_id = null,
        ?int $message_thread_id = null,
        ?bool $disable_notification = null,
        ?bool $protect_content = null,
        ?int $reply_to_message_id = null,
        ?bool $allow_sending_without_reply = null,
        ?array $reply_markup = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to set the score of the specified user in a game message. On success, if the message is not an inline message, the [Message](https://core.telegram.org/bots/api#message) is returned, otherwise True is returned. Returns an error, if the new score is not greater than the user's current score in the chat and force is False.
     *
     * @param integer $user_id
     * @param string $score
     * @param boolean|null $force
     * @param boolean|null $disable_editgetMessage
     * @param integer|null $chat_id
     * @param integer|null $message_id
     * @param string|null $inline_message_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#setgamescore
     */
    public function setGameScore(
        int $user_id,
        string $score,
        ?bool $force = null,
        ?bool $disable_editgetMessage = null,
        ?int $chat_id = null,
        ?int $message_id = null,
        ?string $inline_message_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }

    /**
     * Use this method to get data for high score tables. Will return the score of the specified user and several of their neighbors in a game. Returns an Array of GameHighScore objects.
     * 
     * - This method will currently return scores for the target user, plus two of their closest neighbors on each side. Will also return the top three users if the user and their neighbors are not among them. Please note that this behavior is subject to change.
     *
     * @param integer $user_id
     * @param integer|null $chat_id
     * @param integer|null $message_id
     * @param string|null $inline_message_id
     * @return TelegramResponse
     * 
     * @link https://core.telegram.org/bots/api#getgamehighscores
     */
    public function getGameHighScores(
        int $user_id,
        ?int $chat_id = null,
        ?int $message_id = null,
        ?string $inline_message_id = null,
    ): TelegramResponse {
        return $this->sendRequest(__FUNCTION__, get_defined_vars());
    }
}