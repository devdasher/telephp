<?php

namespace DevDasher\TelePHP;

use DevDasher\TelePHP\Telegram\Enums\UpdateType;
use GuzzleHttp\Client;

final readonly class Config
{
    public const DEFAULT_API_URL = 'https://api.telegram.org';

    public const DEFAULT_POLLING_TIMEOUT = 10;

    public const DEFAULT_POLLING_LIMIT = 100;

    public const DEFAULT_CACHE = ArrayCache::class;

    public const DEFAULT_CLIENT_TIMEOUT = 10;

    public const DEFAULT_ALLOWED_UPDATES = [
        UpdateType::MESSAGE->value,
        UpdateType::EDITED_MESSAGE->value,
        UpdateType::CHANNEL_POST->value,
        UpdateType::EDITED_CHANNEL_POST->value,
        UpdateType::INLINE_QUERY->value,
        UpdateType::CHOSEN_INLINE_RESULT->value,
        UpdateType::CALLBACK_QUERY->value,
        UpdateType::SHIPPING_QUERY->value,
        UpdateType::PRE_CHECKOUT_QUERY->value,
        UpdateType::POLL->value,
        UpdateType::POLL_ANSWER->value,
        UpdateType::MY_CHAT_MEMBER->value,
        UpdateType::CHAT_MEMBER->value,
        UpdateType::CHAT_JOIN_REQUEST->value,
    ];

    public function __construct(
        public string $apiUrl = self::DEFAULT_API_URL,
        public ?string $botName = null,
        public ?string $botUsername = null,
        public bool $testEnv = false,
        public bool $isLocal = false,
        // public int $clientTimeout = self::DEFAULT_CLIENT_TIMEOUT,
        public array $clientOptions = [],
        // public CacheInterface|string $cache = self::DEFAULT_CACHE,
        // public string|LoggerInterface $logger = self::DEFAULT_LOGGER,
        // public bool $enableHttp2 = self::DEFAULT_ENABLE_HTTP2,
    ) {

    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}