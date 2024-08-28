<?php

declare(strict_types=1);

namespace Ornikar\AttributeBinding;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
readonly class BindTo
{
    public function __construct(
        public string $concrete,
        public BindingType $bindingType = BindingType::Transient,
    ) {}
}
