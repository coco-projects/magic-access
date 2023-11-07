<?php

    declare(strict_types = 1);

    namespace Coco\magicAccess;

trait MagicMethod
{
    /**
     * @param string $name
     *
     * @return mixed|null
     */
    public function &__get(string $name)
    {
        $var = $this->$name ?? null;

        return $var;
    }

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return void
     */
    public function __set(string $name, mixed $value)
    {
        $this->$name = $value;
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function __unset(string $name)
    {
        unset($this->$name);
    }
}
