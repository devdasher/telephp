<?php

namespace DevDasher\TelePHP\Telegram\Types\Media\Photo;

use DevDasher\TelePHP\Telegram\Types\AbstractEntity;

class Photos extends AbstractEntity implements \Iterator
{
    private $position = 0;
    protected $photos;

    public function __construct(array|PhotoSize ...$photos)
    {
        foreach ($photos as &$photo) {
            if (is_array($photo)) {
                $photo = new PhotoSize(...$photo);
            }
        }
        $this->photos = $photos;
    }

    public function getFirst(): PhotoSize
    {
        return $this->photos[0];
    }

    public function getLast(): PhotoSize
    {
        return $this->photos[count($this->photos)-1];
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): PhotoSize
    {
        return $this->photos[$this->position];
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->photos[$this->position]);
    }
}