<?php

declare(strict_types=1);

namespace Ornikar\AttributeBinding;

use ReflectionAttribute;
use ReflectionClass;

class AttributeResolver implements BindingResolver
{
    public function resolve(string $abstract): ?Binding
    {
        if (interface_exists($abstract) !== true) {
            return null;
        }

        $attributes = (new ReflectionClass($abstract))
            ->getAttributes(BindTo::class, ReflectionAttribute::IS_INSTANCEOF);

        if (count($attributes) !== 1) {
            return null;
        }

        $bindTo = $attributes[0]->newInstance();
        assert($bindTo instanceof BindTo);

        return new Binding($abstract, $bindTo->concrete, $bindTo->bindingType);
    }
}
