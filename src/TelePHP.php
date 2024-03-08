<?php

namespace DevDasher\TelePHP;

use DevDasher\TelePHP\Handlers\Handler;
use DevDasher\TelePHP\Handlers\MessageHandler;
use DevDasher\TelePHP\Middlewares\Middleware;
use DevDasher\TelePHP\Telegram\Traits\ClientTrait;
use DevDasher\TelePHP\Telegram\Traits\HelpersTrait;
use DevDasher\TelePHP\Telegram\Traits\MethodsTrait;
use DevDasher\TelePHP\Telegram\Types\Chat\Chat;
use DevDasher\TelePHP\Telegram\Types\Update\Update;
use DevDasher\TelePHP\Traits\HandlersTrait;
use Exception;
use GuzzleHttp\Client;

class TelePHP
{
    use MethodsTrait, HelpersTrait, HandlersTrait, ClientTrait;

    private array $handlers = [];
    private array $groupHandlers = [];
    private ?Handler $currentHandler = null;
    private ?array $middlewares = null;
    private ?Client $client;
    private static ?self $app = null;

    public function __construct(
        private string $token,
        private ?Config $config = null,
        private ?Update $update = null,
    ) {
        $this->client = new Client(array_merge(
            ['base_uri' => "{$config->apiUrl}/bot{$token}/"],
            $config->clientOptions,
        ));
        self::$app = $this;
    }
    
    public function getClient(): Client
    {
        return $this->client;
    }

    public static function getInstance(
        ?string $token = null,
        ?Config $config = null,
        ?Update $update = null,
    ): self {
        return self::$app ?? new self(...get_defined_vars());
    }

    public function addNewHandler(string $key, Handler $handler): self
    {
        $handlers = &$this->handlers;
        foreach (explode('.', $key) as $k) {
            if (!isset($handlers[$k])) {
                $handlers[$k] = [];
            }
            $handlers = &$handlers[$k];
        }
        $handlers[] = $handler;
        $this->currentHandler = $handler;
        return $this;
    }

    public function getHandlers(): array
    {
        return $this->handlers;
    }

    public function setGlobalMiddlewares(...$middlewares)
    {
        if ($this->currentHandler) {
            throw new Exception("This method should be called before handlers for better code readability.");
        }
        $this->middlewares[] = $middlewares;
        return $this;
    }
    
    public function setMiddlewares(...$middlewares): self
    {
        if ($this->currentHandler) {
            $this->currentHandler->setMiddlewares($middlewares);
        } else {
            foreach ($middlewares as $middleware) {
                $this->middlewares[] = new Middleware($middleware);
            }
        }
        return $this;
    }

    public function setGlobalMiddlewaresToSkip(...$middlewares): self
    {
        if ($this->currentHandler) {
            $this->currentHandler->setGlobalMiddlewaresToSkip($middlewares);
        }
        return $this;
    }

    public function run()
    {

    }

    public static function __callStatic($name, $arguments)
    {
    }
}