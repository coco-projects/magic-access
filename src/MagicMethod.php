<?php

    declare(strict_types = 1);

    namespace Coco\magicAccess;

trait MagicMethod
{
    private array $data = [];

    public function &__get(string $name)
    {
        if (!isset($this->data[$name])) {
            $this->data[$name] = new Data();
        }
        $var = &$this->data[$name]->data;

        return $var;
    }

    public function __set(string $name, mixed $value)
    {
        if (!isset($this->data[$name])) {
            $this->data[$name] = new Data();
        }

        $this->data[$name]->data = $value;
    }

    public function __unset(string $name)
    {
        unset($this->data[$name]);
    }
}
