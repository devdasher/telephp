<?php

namespace DevDasher\TelePHP\Telegram;

use DevDasher\TelePHP\Telegram\Types\AbstractEntity;
use GuzzleHttp\Psr7\Response;
use RuntimeException;

class TelegramResponse
{
    private string $rawData;
    private array $data;

    public function __construct(private Response $response)
    {
        $this->rawData = strval($response->getBody());
        $this->data = json_decode($this->rawData, true);
    }

    public function toArray(): array
    {
        return [];
    }

    public function getResult(): ?array
    {
        return $this->data['result'] ?? null;
    }

    public function getRawData(): string
    {
        return $this->rawData;
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function isOk(): bool
    {
        return true;
    }

    public function getErrorCode(): ?int
    {
        return $this->data['error_code'] ?? null;
    }

    public function getDescription(): ?string
    {
        return $this->data['description'] ?? null;
    }

    public function getErrorMessage(): ?string
    {
        return $this->getDescription();
    }

    public function getParameters(): ?array
    {
        return $this->data['parameters'] ?? null;
    }

    public function getParameter(string $key): mixed
    {
        return $this->getParameters()[$key] ?? null;
    }
}