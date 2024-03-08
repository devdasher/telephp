<?php

namespace DevDasher\TelePHP\Telegram\Traits;

use DevDasher\TelePHP\Telegram\TelegramResponse;
use DevDasher\TelePHP\Telegram\Exceptions\TelegramException;
use DevDasher\TelePHP\Telegram\Methods\AbstractMethod;
use DevDasher\TelePHP\Telegram\Types\AbstractEntity;
use DevDasher\TelePHP\TelePHP;
use GuzzleHttp\Exception\ClientException;

trait ClientTrait
{
    public function sendRequest(
        string|AbstractMethod $method,
        array $parameters = [],
        array $options = [],
    ): AbstractEntity {
        if ($method instanceof AbstractMethod) {
            /** @var AbstractEntity $typeClass */
            $entityClass = $method->getEntityClass();
            $parameters = array_merge($method->getParameters(), $parameters);
            $method = $method->getMethod();
        }
        $client = TelePHP::getInstance()->getClient();
        try {
            $options = array_merge(['query' => $parameters], $options);
            $response = new TelegramResponse($client->post($method, $options));
            $entity = $entityClass::create($response->getResult());
            return $entity;
        } catch (ClientException $e) {
            throw new TelegramException($e);
        }
    }
}