<?php

declare(strict_types=1);

namespace Ornikar\AttributeBinding;

use Closure;
use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider as AbstractServiceProvider;

class ServiceProvider extends AbstractServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(BindingResolver::class, AttributeResolver::class);

        $this->app->beforeResolving($this->beforeResolvingCallback());
    }

    private function beforeResolvingCallback(): Closure
    {
        return static function (string $abstract, array $parameters, Container $container): void {
            if ($container->bound($abstract) === true) {
                return;
            }

            $attributeResolver = $container->make(BindingResolver::class);
            assert($attributeResolver instanceof BindingResolver);

            $binding = $attributeResolver->resolve($abstract);

            if ($binding === null) {
                return;
            }

            $container->bind(
                $binding->abstract,
                $binding->concrete,
                $binding->type === BindingType::Singleton,
            );
        };
    }
}
