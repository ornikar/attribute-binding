<?php

declare(strict_types=1);

namespace Tests\fixtures;

use Ornikar\AttributeBinding\BindTo;

#[BindTo(Implementation::class)]
#[BindTo(Implementation::class)] // @phpstan-ignore-line
interface TooManyBindings {}
