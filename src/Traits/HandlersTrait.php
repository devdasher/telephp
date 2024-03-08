<?php

namespace DevDasher\TelePHP\Traits;

use DevDasher\TelePHP\Handlers\Handler;
use DevDasher\TelePHP\Handlers\Listener;
use DevDasher\TelePHP\Handlers\MessageHandler;
use DevDasher\TelePHP\TelePHP;

trait HandlersTrait
{
    public function onText(string $pattern, callable $callback): TelePHP
    {
        return $this->addNewHandler('message.text', new Handler($callback, $pattern));
    }
    
    public function onPhoto(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.photo', new Handler($callback));
    }

    public function onAnimation(callable $callback): TelePHP
    {
        return $this->addNewHandler("message.animation", new Handler($callback));
    }

    public function onVideo(callable $callback): TelePHP
    {
        return $this->addNewHandler("message.video", new Handler($callback));
    }

    public function onVideoNote(callable $callback): TelePHP
    {
        return $this->addNewHandler("message.video_note", new Handler($callback));
    }

    public function onAudio(callable $callback): TelePHP
    {
        return $this->addNewHandler("message.audio", new Handler($callback));
    }

    public function onVoice(callable $callback): TelePHP
    {
        return $this->addNewHandler("message.voice", new Handler($callback));
    }

    public function onDocument(callable $callback): TelePHP
    {
        return $this->addNewHandler("message.document", new Handler($callback));
    }

    public function onLocation(callable $callback): TelePHP
    {
        return $this->addNewHandler("message.location", new Handler($callback));
    }

    public function onContact(callable $callback): TelePHP
    {
        return $this->addNewHandler("message.contact", new Handler($callback));
    }

    public function onMessagePoll(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.poll', new Handler($callback));
    }

    public function onVenue(callable $callback): TelePHP
    {
        return $this->addNewHandler("message.venue", new Handler($callback));
    }

    public function onGame(callable $callback): TelePHP
    {
        return $this->addNewHandler("message.game", new Handler($callback));
    }

    public function onDice(callable $callback): TelePHP
    {
        return $this->addNewHandler("message.dice", new Handler($callback));
    }

    public function onSticker(callable $callback): TelePHP
    {
        return $this->addNewHandler("message.sticker", new Handler($callback));
    }

    public function onStory(callable $callback): TelePHP
    {
        return $this->addNewHandler("message.story", new Handler($callback));
    }

    public function onNewChatMembers(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.new_chat_members', new Handler($callback));
    }

    public function onLeftChatMember(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.left_chat_member', new Handler($callback));
    }

    public function onNewChatTitle(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.new_chat_title', new Handler($callback));
    }

    public function onNewChatPhoto(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.new_chat_photo', new Handler($callback));
    }

    public function onDeleteChatPhoto(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.delete_chat_photo', new Handler($callback));
    }

    public function onGroupChatCreated(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.group_chat_created', new Handler($callback));
    }

    public function onSupergroupChatCreated(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.supergroup_chat_created', new Handler($callback));
    }

    public function onChannelChatCreated(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.channel_chat_created', new Handler($callback));
    }

    public function onAutoDeleteTimerChanged(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.message_auto_delete_timer_changed', new Handler($callback));
    }

    public function onMigrateToChatId(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.migrate_to_chat_id', new Handler($callback));
    }

    public function onMigrateFromChatId(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.migrate_from_chat_id', new Handler($callback));
    }

    public function onPinnedMessage(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.pinned_message', new Handler($callback));
    }

    public function onInvoice(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.invoice', new Handler($callback));
    }

    public function onSuccessfulPayment(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.successful_payment', new Handler($callback));
    }

    public function onUserShared(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.user_shared', new Handler($callback));
    }

    public function onChatShared(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.chat_shared', new Handler($callback));
    }

    public function onConnectedWebsite(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.connected_website', new Handler($callback));
    }

    public function onWriteAccessAllowed(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.write_access_allowed', new Handler($callback));
    }

    public function onPassportData(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.passport_data', new Handler($callback));
    }

    public function onProximityAlertTriggered(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.proximity_alert_triggered', new Handler($callback));
    }

    public function onForumTopicCreated(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.forum_topic_created', new Handler($callback));
    }

    public function onForumTopicEdited(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.forum_topic_edited', new Handler($callback));
    }

    public function onForumTopicClosed(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.forum_topic_closed', new Handler($callback));
    }

    public function onForumTopicReopened(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.forum_topic_reopened', new Handler($callback));
    }

    public function onGeneralForumTopicHidden(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.general_forum_topic_hidden', new Handler($callback));
    }

    public function onGeneralForumTopicUnhidden(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.general_forum_topic_unhidden', new Handler($callback));
    }

    public function onVideoChatScheduled(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.video_chat_scheduled', new Handler($callback));
    }

    public function onVideoChatStarted(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.video_chat_started', new Handler($callback));
    }

    public function onVideoChatEnded(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.video_chat_ended', new Handler($callback));
    }

    public function onVideoChatParticipantsInvited(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.video_chat_participants_invited', new Handler($callback));
    }

    public function onWebAppData(callable $callback): TelePHP
    {
        return $this->addNewHandler('message.web_app_data', new Handler($callback));
    }

    public function onMessage(callable $callback): TelePHP
    {
        return $this->addNewHandler('message', new Handler($callback));
    }

    public function onEditedMessage(callable $callback): TelePHP
    {
        return $this->addNewHandler('edited_message', new Handler($callback));
    }

    public function onCallbackQueryData(string $pattern, callable $callback): TelePHP
    {
        return $this->addNewHandler("callback_query.data.{$pattern}", new Handler($callback, $pattern));
    }

    public function onCallbackQuery(callable $callback): TelePHP
    {
        return $this->addNewHandler('callback_query', new Handler($callback));
    }

    public function onChannelPost(callable $callback): TelePHP
    {
        return $this->addNewHandler('channel_post', new Handler($callback));
    }

    public function onEditedChannelPost(callable $callback): TelePHP
    {
        return $this->addNewHandler('edited_channel_post', new Handler($callback));
    }

    public function onChatMember(callable $callback): TelePHP
    {
        return $this->addNewHandler('chat_member', new Handler($callback));
    }

    public function onMyChatMember(callable $callback): TelePHP
    {
        return $this->addNewHandler('my_chat_member', new Handler($callback));
    }

    public function onPoll(callable $callback): TelePHP
    {
        return $this->addNewHandler('poll', new Handler($callback));
    }

    public function onPollAnswer(callable $callback): TelePHP
    {
        return $this->addNewHandler('poll_answer', new Handler($callback));
    }

    public function onInlineQueryText(string $pattern, callable $callback): TelePHP
    {
        return $this->addNewHandler("inline_query.query.{$pattern}", new Handler($callback, $pattern));
    }

    public function onInlineQuery(callable $callback): TelePHP
    {
        return $this->addNewHandler('inline_query', new Handler($callback));
    }

    public function onShippingQuery(callable $callback): TelePHP
    {
        return $this->addNewHandler('shipping_query', new Handler($callback));
    }

    public function onChatJoinRequest(callable $callback): TelePHP
    {
        return $this->addNewHandler('chat_join_request', new Handler($callback));
    }


    public function onPreCheckoutQuery(callable $callback): TelePHP
    {
        return $this->addNewHandler('pre_checkout_query', new Handler($callback));
    }

    public function onChosenInlineResultQuery(string $pattern, callable $callback): TelePHP
    {
        return $this->addNewHandler("chosen_inline_result.query.{$pattern}", new Handler($callback, $pattern));
    }

    public function onChosenInlineResultId(string $pattern, callable $callback): TelePHP
    {
        return $this->addNewHandler("chosen_inline_result.result_id.{$pattern}", new Handler($callback, $pattern));
    }

    public function onChosenInlineResult(callable $callback): TelePHP
    {
        return $this->addNewHandler('chosen_inline_result', new Handler($callback));
    }

    public function fallbackOn(
        string $updateType,callable $callback): TelePHP
        {
        return $this->addNewHandler("{$updateType}.fallback", new Handler($callback));
    }

    public function fallback(callable $callback): TelePHP
    {
        return $this->addNewHandler('fallback', new Handler($callback));
    }

    public function onException(callable $callback): TelePHP
    {
        return $this->addNewHandler('exception', new Handler($callback));
    }

    public function onApiError(callable $callback): TelePHP
    {
        return $this->addNewHandler('api_error', new Handler($callback));
    }
}