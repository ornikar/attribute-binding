<?php

declare(strict_types=1);

namespace Tests;

use Ornikar\AttributeBinding\AttributeResolver;
use Ornikar\AttributeBinding\Binding;
use Ornikar\AttributeBinding\BindingType;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Tests\fixtures\Implementation;
use Tests\fixtures\DefaultBindingType;
use Tests\fixtures\NoBinding;
use Tests\fixtures\SingletonBinding;
use Tests\fixtures\NotAnInterface;
use Tests\fixtures\TooManyBindings;

#[CoversClass(AttributeResolver::class)]
class AttributeResolverTest extends TestCase
{
    private AttributeResolver $resolver;

    protected function setUp(): void
    {
        parent::setUp();

        $this->resolver = new AttributeResolver();
    }

    public function test_it_returns_a_binding_from_the_interface_attribute_with_the_default_type(): void
    {
        $expectedBinding = new Binding(
            DefaultBindingType::class,
            Implementation::class,
            BindingType::Transient,
        );

        $this->assertEquals($expectedBinding, $this->resolver->resolve(DefaultBindingType::class));
    }

    public function test_it_returns_a_binding_from_the_interface_attribute_with_the_defined_type(): void
    {
        $expectedBinding = new Binding(
            SingletonBinding::class,
            Implementation::class,
            BindingType::Singleton,
        );

        $this->assertEquals($expectedBinding, $this->resolver->resolve(SingletonBinding::class));
    }

    public function test_it_returns_null_if_abstract_is_not_an_existing_interface(): void
    {
        $this->assertNull($this->resolver->resolve('not_an_existing_interface'));
        $this->assertNull($this->resolver->resolve(NotAnInterface::class));
    }

    public function test_it_returns_null_if_the_interface_has_no_binding(): void
    {
        $this->assertNull($this->resolver->resolve(NoBinding::class));
    }

    public function test_it_returns_null_if_the_interface_has_too_many_bindings(): void
    {
        $this->assertNull($this->resolver->resolve(TooManyBindings::class));
    }
}
