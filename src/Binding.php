<?php

declare(strict_types=1);

namespace Ornikar\AttributeBinding;

readonly class Binding
{
    public function __construct(
        public string $abstract,
        public string $concrete,
        public BindingType $type,
    ) {}
}
