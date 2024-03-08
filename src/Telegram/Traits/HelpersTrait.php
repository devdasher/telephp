<?php

namespace DevDasher\TelePHP\Telegram\Traits;

use DevDasher\TelePHP\Telegram\Types\CallbackQuery;
use DevDasher\TelePHP\Telegram\Types\Chat\Chat;
use DevDasher\TelePHP\Telegram\Types\Chat\ChatJoinRequest;
use DevDasher\TelePHP\Telegram\Types\Chat\ChatMember;
use DevDasher\TelePHP\Telegram\Types\Inline\ChosenInlineResult;
use DevDasher\TelePHP\Telegram\Types\Inline\InlineQuery;
use DevDasher\TelePHP\Telegram\Types\Message\Message;
use DevDasher\TelePHP\Telegram\Types\Poll\Poll;
use DevDasher\TelePHP\Telegram\Types\Poll\PollAnswer;
use DevDasher\TelePHP\Telegram\Types\Update\Update;
use DevDasher\TelePHP\Telegram\Types\User;

trait HelpersTrait
{
    public function update(): ?Update
    {
        return $this->update;
    }

    public function chat(): ?Chat
    {
        return $this->update()->chat();
    }

    public function chatId(): ?int
    {
        return $this->update()->chat()->id();
    }

    public function user(): ?User
    {
        return $this->update()->from();
    }

    public function userId(): ?int
    {
        return $this->update()->from()->id();
    }

    public function message(): ?Message
    {
        return $this->update()->message();
    }

    public function messageId(): ?int
    {
        return $this->update()->message()->messageId();
    }

    public function inlineQuery(): ?InlineQuery
    {
        return $this->update()->inlineQuery();
    }

    public function chosenInlineResult(): ?ChosenInlineResult
    {
        return $this->update()->chosenInlineResult();
    }

    public function callbackQuery(): ?CallbackQuery
    {
        return $this->update()->callbackQuery();
    }

    public function callbackQueryId(): ?int
    {
        return $this->update()->callbackQuery()->id();
    }

    public function callbackQueryData(): ?string
    {
        return $this->update()->callbackQuery()->data();
    }

    public function shippingQuery(): ?ShippingQuery
    {
        return $this->update()->shippingQuery();
    }

    public function preCheckoutQuery(): ?PreCheckoutQuery
    {
        return $this->update()->preCheckoutQuery();
    }

    public function poll(): ?Poll
    {
        return $this->update()->poll();
    }

    public function pollAnswer(): ?PollAnswer
    {
        return $this->update()->pollAnswer();
    }

    public function myChatMember(): ?MyChatMember
    {
        return $this->update()->myChatMember();
    }

    public function chatMember(): ?ChatMember
    {
        return $this->update()->chatMember();
    }

    public function chatJoinRequest(): ?ChatJoinRequest
    {
        return $this->update()->chatJoinRequest();
    }
}