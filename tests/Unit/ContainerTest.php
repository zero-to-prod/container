<?php

namespace Tests\Unit;

use DateTime;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use ReflectionClass;
use stdClass;
use Tests\TestCase;
use Zerotoprod\Container\Container;
use Zerotoprod\Container\ContainerContract;
use Zerotoprod\Container\EntryNotFoundException;

class ContainerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setContainerInstance(null);
    }

    private function setContainerInstance($instance): void
    {
        $reflection = new ReflectionClass(Container::class);
        $property = $reflection->getProperty('instance');
        $property->setAccessible(true);
        $property->setValue(null, $instance);
    }

    /** @test */
    public function container_implements_psr_container_interface(): void
    {
        $container = new Container();
        $this->assertInstanceOf(ContainerInterface::class, $container);
        $this->assertInstanceOf(ContainerContract::class, $container);
    }

    /** @test */
    public function get_instance_returns_singleton(): void
    {
        $instance1 = Container::getInstance();
        $instance2 = Container::getInstance();

        $this->assertSame($instance1, $instance2);
        $this->assertInstanceOf(Container::class, $instance1);
    }

    /** @test */
    public function instance_method_registers_and_returns_instance(): void
    {
        $container = new Container();
        $object = new stdClass();

        $returned = $container->instance('test', $object);

        $this->assertSame($object, $returned);
        $this->assertTrue($container->has('test'));
        $this->assertSame($object, $container->get('test'));
    }

    /** @test */
    public function has_returns_true_for_registered_instances(): void
    {
        $container = new Container();
        $container->instance('exists', new stdClass());

        $this->assertTrue($container->has('exists'));
        $this->assertFalse($container->has('does_not_exist'));
    }

    /** @test */
    public function get_returns_registered_instance(): void
    {
        $container = new Container();
        $object = new stdClass();
        $container->instance('test', $object);

        $this->assertSame($object, $container->get('test'));
    }

    /** @test */
    public function get_throws_exception_for_missing_entries(): void
    {
        $container = new Container();

        $this->expectException(NotFoundExceptionInterface::class);
        $this->expectException(EntryNotFoundException::class);

        $container->get('missing');
    }

    /** @test */
    public function container_can_store_primitive_values(): void
    {
        $container = new Container();

        $container->instance('string', 'value');
        $container->instance('int', 42);
        $container->instance('bool', true);
        $container->instance('array', ['key' => 'value']);

        $this->assertSame('value', $container->get('string'));
        $this->assertSame(42, $container->get('int'));
        $this->assertTrue($container->get('bool'));
        $this->assertSame(['key' => 'value'], $container->get('array'));
    }

    /** @test */
    public function container_can_store_object_instances(): void
    {
        $container = new Container();
        $dateTime = new DateTime();
        $container->instance(DateTime::class, $dateTime);

        $this->assertSame($dateTime, $container->get(DateTime::class));
    }

    /** @test */
    public function exception_message_contains_missing_id(): void
    {
        $container = new Container();
        $missingId = 'missing_service_id';

        try {
            $container->get($missingId);
            $this->fail('Expected exception was not thrown');
        } catch (EntryNotFoundException $e) {
            $this->assertStringContainsString($missingId, $e->getMessage());
        }
    }
}