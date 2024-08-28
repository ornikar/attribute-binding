# Attribute Binding

Declare interface bindings using attributes

## Installation

Using composer

```bash
composer require ornikar/attribute-binding
```

## Usage

```php
<?php

declare(strict_types=1);

namespace Acme;

use Ornikar\AttributeBinding\BindTo;

#[BindTo(MyImplementation::class)]
interface MyInterface
{
    //
}
```

Declare binding as singleton:
```php
<?php

declare(strict_types=1);

namespace Acme;

use Ornikar\AttributeBinding\BindingType;
use Ornikar\AttributeBinding\BindTo;

#[BindTo(MyImplementation::class, BindingType::Singleton)]
interface MyInterface
{
    //
}
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](https://choosealicense.com/licenses/mit/)