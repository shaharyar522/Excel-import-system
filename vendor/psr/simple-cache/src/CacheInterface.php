<?php

namespace Psr\SimpleCache;

interface CacheInterface
{
    /**
     * Fetches a value from the cache.
     *
     * @param string $key     The unique key of this item in the cache.
     * @param mixed  $default Default value to return if the key does not exist.
     *
     * @return mixed The value of the item from the cache, or $default in case of cache miss.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *   MUST be thrown if the $key string is not a legal value.
     */
<<<<<<< HEAD
    public function get(string $key, mixed $default = null): mixed;
=======
    public function get($key, $default = null);
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Persists data in the cache, uniquely referenced by a key with an optional expiration TTL time.
     *
     * @param string                 $key   The key of the item to store.
     * @param mixed                  $value The value of the item to store, must be serializable.
     * @param null|int|\DateInterval $ttl   Optional. The TTL value of this item. If no value is sent and
     *                                      the driver supports TTL then the library may set a default value
     *                                      for it or let the driver take care of that.
     *
     * @return bool True on success and false on failure.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *   MUST be thrown if the $key string is not a legal value.
     */
<<<<<<< HEAD
    public function set(string $key, mixed $value, null|int|\DateInterval $ttl = null): bool;
=======
    public function set($key, $value, $ttl = null);
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Delete an item from the cache by its unique key.
     *
     * @param string $key The unique cache key of the item to delete.
     *
     * @return bool True if the item was successfully removed. False if there was an error.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *   MUST be thrown if the $key string is not a legal value.
     */
<<<<<<< HEAD
    public function delete(string $key): bool;
=======
    public function delete($key);
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Wipes clean the entire cache's keys.
     *
     * @return bool True on success and false on failure.
     */
<<<<<<< HEAD
    public function clear(): bool;
=======
    public function clear();
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Obtains multiple cache items by their unique keys.
     *
<<<<<<< HEAD
     * @param iterable<string> $keys    A list of keys that can be obtained in a single operation.
     * @param mixed            $default Default value to return for keys that do not exist.
     *
     * @return iterable<string, mixed> A list of key => value pairs. Cache keys that do not exist or are stale will have $default as value.
=======
     * @param iterable $keys    A list of keys that can obtained in a single operation.
     * @param mixed    $default Default value to return for keys that do not exist.
     *
     * @return iterable A list of key => value pairs. Cache keys that do not exist or are stale will have $default as value.
>>>>>>> 50f5a6f (Initial commit from local project)
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *   MUST be thrown if $keys is neither an array nor a Traversable,
     *   or if any of the $keys are not a legal value.
     */
<<<<<<< HEAD
    public function getMultiple(iterable $keys, mixed $default = null): iterable;
=======
    public function getMultiple($keys, $default = null);
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Persists a set of key => value pairs in the cache, with an optional TTL.
     *
     * @param iterable               $values A list of key => value pairs for a multiple-set operation.
     * @param null|int|\DateInterval $ttl    Optional. The TTL value of this item. If no value is sent and
     *                                       the driver supports TTL then the library may set a default value
     *                                       for it or let the driver take care of that.
     *
     * @return bool True on success and false on failure.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *   MUST be thrown if $values is neither an array nor a Traversable,
     *   or if any of the $values are not a legal value.
     */
<<<<<<< HEAD
    public function setMultiple(iterable $values, null|int|\DateInterval $ttl = null): bool;
=======
    public function setMultiple($values, $ttl = null);
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Deletes multiple cache items in a single operation.
     *
<<<<<<< HEAD
     * @param iterable<string> $keys A list of string-based keys to be deleted.
=======
     * @param iterable $keys A list of string-based keys to be deleted.
>>>>>>> 50f5a6f (Initial commit from local project)
     *
     * @return bool True if the items were successfully removed. False if there was an error.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *   MUST be thrown if $keys is neither an array nor a Traversable,
     *   or if any of the $keys are not a legal value.
     */
<<<<<<< HEAD
    public function deleteMultiple(iterable $keys): bool;
=======
    public function deleteMultiple($keys);
>>>>>>> 50f5a6f (Initial commit from local project)

    /**
     * Determines whether an item is present in the cache.
     *
     * NOTE: It is recommended that has() is only to be used for cache warming type purposes
     * and not to be used within your live applications operations for get/set, as this method
     * is subject to a race condition where your has() will return true and immediately after,
     * another script can remove it making the state of your app out of date.
     *
     * @param string $key The cache item key.
     *
     * @return bool
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *   MUST be thrown if the $key string is not a legal value.
     */
<<<<<<< HEAD
    public function has(string $key): bool;
=======
    public function has($key);
>>>>>>> 50f5a6f (Initial commit from local project)
}
