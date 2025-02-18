<?php

namespace Zerotoprod\Container;

/**
 * A PSR Compliant Container.
 *
 * @link https://github.com/zero-to-prod/container
 */
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
     * A PSR Compliant Container.
     * @link https://github.com/zero-to-prod/container
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
     * A PSR Compliant Container.
     * @link https://github.com/zero-to-prod/container
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
     * A PSR Compliant Container.
     * @link https://github.com/zero-to-prod/container
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
     * A PSR Compliant Container.
     *
     * @link https://github.com/zero-to-prod/container
     */
    public function has($id): bool
    {
        return isset($this->instances[$id]);
    }
}