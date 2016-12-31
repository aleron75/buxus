## Buxus - A PHP Command Bus

#### Why a PHP Command Bus

- Keeps Application logic separated from Domain logic
- Commands enforce discoverability
- Command Handlers enforce Single Responsibility Principle
- Can be easily extended (decorated)

#### Getting started with the Command Bus

```php
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

