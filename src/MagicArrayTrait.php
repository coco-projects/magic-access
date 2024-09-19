<?php

    declare(strict_types = 1);

    namespace Coco\magicAccess;

    use Traversable;

trait MagicArrayTrait
{
    private array $data = [];

    /**
     * @param callable $callback
     *
     * @return $this
     */
    public function eachField(callable $callback): static
    {
        foreach ($this as $k => &$v) {
            $callback($v, $k);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return Traversable
     */
    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->data);
    }

    /**
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return array_key_exists($this->hash($offset), $this->data);
    }

    /**
     * @param mixed $offset
     *
     * @return mixed
     */
    public function &offsetGet(mixed $offset): mixed
    {
        $key = $this->hash($offset);

        if (!isset($this->data[$key])) {
            $this->data[$key] = null;
        }

        return $this->data[$key];
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     *
     * @return void
     */
    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->data[$this->hash($offset)] = $value;
    }

    /**
     * @param mixed $offset
     *
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->data[$this->hash($offset)]);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->data);
    }

    /**
     * @return $this
     */

    public function destroy(): static
    {
        $this->data = [];

        return $this;
    }

    /**
     * @param object|string|int|null $var
     *
     * @return string|int
     */
    private function hash(object|string|int|null $var): string|int
    {
        if (is_null($var)) {
            return $this->incIndex();
        }
        return is_object($var) ? spl_object_hash($var) : $var;
    }

    /**
     * @return int
     */
    private function incIndex(): int
    {
        $keys = array_keys($this->data);

        return count($keys) ? max($keys) + 1 : 0;
    }
}
