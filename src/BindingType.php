<?php

declare(strict_types=1);

namespace Ornikar\AttributeBinding;

enum BindingType
{
    case Singleton;
    case Transient;
}
