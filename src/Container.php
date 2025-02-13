<?php

namespace Zerotoprod\Container;

class Container implements ContainerContract
{
    /**
     * The current globally available container (if any).
     *
     * @var static
     */
    protected static $instance;

    /**
     * The container's shared instances.
     *
     * @var object[]
     */
    protected $instances = [];

    /**
     * Get the globally available instance of the container.
     *
     * @return static
     */
    public static function getInstance()
    {
        return static::$instance = static::$instance ?: new static;
    }

    /**
     * Register an existing instance as shared in the container.
     *
     * @param  string  $abstract
     * @param  mixed   $instance
     *
     * @return mixed
     */
    public function instance(string $abstract, $instance)
    {
        $this->instances[$abstract] = $instance;

        return $instance;
    }

    /**
     * @inheritDoc
     *
     * @param  string  $id
     *
     * @return mixed
     */
    public function get($id)
    {
        if (!$this->has($id)) {
            throw new EntryNotFoundException($id);
        }

        return $this->instances[$id];
    }

    /**
     * @inheritDoc
     *
     * @param  string  $id
     */
    public function has($id): bool
    {
        return isset($this->instances[$id]);
    }
}