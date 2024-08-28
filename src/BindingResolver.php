<?php

declare(strict_types=1);

namespace Ornikar\AttributeBinding;

interface BindingResolver
{
    public function resolve(string $abstract): ?Binding;
}
