<?php

namespace PhpOffice\PhpSpreadsheet\Collection\Memory;

use DateInterval;
use Psr\SimpleCache\CacheInterface;

/**
 * This is the default implementation for in-memory cell collection.
 *
<<<<<<< HEAD
 * Alternative implementation should leverage off-memory, non-volatile storage
=======
 * Alternatives implementation should leverage off-memory, non-volatile storage
>>>>>>> 50f5a6f (Initial commit from local project)
 * to reduce overall memory usage.
 */
class SimpleCache3 implements CacheInterface
{
<<<<<<< HEAD
    private array $cache = [];
=======
    /**
     * @var array Cell Cache
     */
    private $cache = [];
>>>>>>> 50f5a6f (Initial commit from local project)

    public function clear(): bool
    {
        $this->cache = [];

        return true;
    }

<<<<<<< HEAD
    public function delete(string $key): bool
=======
    /**
     * @param string $key
     */
    public function delete($key): bool
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        unset($this->cache[$key]);

        return true;
    }

<<<<<<< HEAD
    public function deleteMultiple(iterable $keys): bool
=======
    /**
     * @param iterable $keys
     */
    public function deleteMultiple($keys): bool
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        foreach ($keys as $key) {
            $this->delete($key);
        }

        return true;
    }

<<<<<<< HEAD
    public function get(string $key, mixed $default = null): mixed
=======
    /**
     * @param string $key
     * @param mixed  $default
     */
    public function get($key, $default = null): mixed
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        if ($this->has($key)) {
            return $this->cache[$key];
        }

        return $default;
    }

<<<<<<< HEAD
    public function getMultiple(iterable $keys, mixed $default = null): iterable
=======
    /**
     * @param iterable $keys
     * @param mixed    $default
     */
    public function getMultiple($keys, $default = null): iterable
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $results = [];
        foreach ($keys as $key) {
            $results[$key] = $this->get($key, $default);
        }

        return $results;
    }

<<<<<<< HEAD
    public function has(string $key): bool
=======
    /**
     * @param string $key
     */
    public function has($key): bool
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        return array_key_exists($key, $this->cache);
    }

<<<<<<< HEAD
    public function set(string $key, mixed $value, null|int|DateInterval $ttl = null): bool
=======
    /**
     * @param string                 $key
     * @param mixed                  $value
     * @param null|DateInterval|int $ttl
     */
    public function set($key, $value, $ttl = null): bool
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        $this->cache[$key] = $value;

        return true;
    }

<<<<<<< HEAD
    public function setMultiple(iterable $values, null|int|DateInterval $ttl = null): bool
=======
    /**
     * @param iterable               $values
     * @param null|DateInterval|int $ttl
     */
    public function setMultiple($values, $ttl = null): bool
>>>>>>> 50f5a6f (Initial commit from local project)
    {
        foreach ($values as $key => $value) {
            $this->set($key, $value);
        }

        return true;
    }
}
