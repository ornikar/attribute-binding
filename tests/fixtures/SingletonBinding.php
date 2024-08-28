<?php

declare(strict_types=1);

namespace Tests\fixtures;

use Ornikar\AttributeBinding\BindingType;
use Ornikar\AttributeBinding\BindTo;

#[BindTo(Implementation::class, BindingType::Singleton)]
interface SingletonBinding {}
