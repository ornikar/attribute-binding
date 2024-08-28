<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Container\EntryNotFoundException;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase;
use Ornikar\AttributeBinding\ServiceProvider;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\fixtures\DefaultBindingType;
use Tests\fixtures\Implementation;
use Tests\fixtures\NoBinding;

#[CoversClass(ServiceProvider::class)]
class ServiceProviderTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [ServiceProvider::class];
    }

    public function test_laravel_container_throws_an_exception_when_resolving_an_interface_without_binding(): void
    {
        $this->expectException(EntryNotFoundException::class);

        assert($this->app instanceof Application);
        $this->app->get(NoBinding::class);
    }

    public function test_laravel_container_can_resolve_an_interface_using_attribute_binding(): void
    {
        assert($this->app instanceof Application);
        $this->assertInstanceOf(Implementation::class, $this->app->get(DefaultBindingType::class));
    }
}
