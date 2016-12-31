## Buxus - A PHP Command Bus

[![Build Status](https://travis-ci.org/0x13a/buxus.svg?branch=master)](https://travis-ci.org/0x13a/buxus)

#### Why a PHP Command Bus

- Keeps Application logic separated from Domain logic
- Commands enforce discoverability
- Command Handlers enforce Single Responsibility Principle
- Can be easily extended (decorated)

#### Prerequisites

- PHP version >= 7.x

#### Getting started with the Command Bus

```php
<?php

$commandHandlerMap = [
    CreateProductCommand::class => new CreateProductHandler()
];
$standardCommandBus = new \Buxus\Bus\StandardCommandBus(
    new \Buxus\Handler\StandardCommandHandlerLocator(
        new \Buxus\Map\InMemoryCommandHandlerMap($commandHandlerMap)
    )
);
$loggedCommandBus->dispatch(new CreateProductCommand('beer'));
```

#### Extending Command Bus funcionality through Decorator

```php
<?php

$commandHandlerMap = [
    CreateProductCommand::class => new CreateProductHandler()
];
$standardCommandBus = new \Buxus\Bus\StandardCommandBus(
    new \Buxus\Handler\StandardCommandHandlerLocator(
        new \Buxus\Map\InMemoryCommandHandlerMap($commandHandlerMap)
    )
);
$loggedCommandBus = new LoggedCommandBus(
    $standardCommandBus,
    new Logger()
);
$loggedCommandBus->dispatch(new CreateProductCommand('beer'));
```



#### In this project

- No `NULL` is used
- `final` classes by default (*Composition over inheritance*)
- [Object Calisthenics]() compliant
- [SOLID]() compliant
- Immutable data structures


#### License

[MIT](#LICENSE) License

