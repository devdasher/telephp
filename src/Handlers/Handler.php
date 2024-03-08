<?php

namespace DevDasher\TelePHP\Handlers;

use Closure;

class Handler
{
    protected const FALLBACK = 'FALLBACK';
    protected const EXCEPTION = 'EXCEPTION';
    protected const BEFORE_API_REQUEST = 'BEFORE_API_REQUEST';
    protected const AFTER_API_REQUEST = 'AFTER_API_REQUEST';
    protected const API_ERROR = 'API_ERROR';
    protected const PARAM_NAME_REGEX = '/{((?:(?!\d+,?\d?+)\w)+?)}/';

    public function __construct(
        protected $callback,
        protected ?string $pattern = null,
        protected array $middlewares = [],
        protected array $globalMiddlewaresToSkip = [],
        protected array $parameters = [],
    ) {
    }

    public function getPattern(): ?string
    {
        return $this->pattern;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function setMiddlewares(...$middlewares): self
    {
        $this->middlewares = $middlewares;
        return $this;
    }

    public function setGlobalMiddlewaresToSkip(...$middlewares): self
    {
        $this->globalMiddlewaresToSkip = $middlewares;
        return $this;
    }

    public function __invoke()
    {
    }
}
