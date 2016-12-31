<?php

namespace Buxus\Bus;

use Buxus\Command\Command;
use Buxus\Handler\CommandHandlerLocator;

final class StandardCommandBus implements CommandBus
{
    /**
     * @var CommandHandlerLocator
     */
    private $commandHandlerLocator;

    /**
     * StandardCommandBus constructor.
     * @param CommandHandlerLocator $commandHandlerLocator
     */
    public function __construct(CommandHandlerLocator $commandHandlerLocator)
    {
        $this->commandHandlerLocator = $commandHandlerLocator;
    }

    /**
     * @param Command $command
     */
    public function dispatch(Command $command)
    {
        ($this
            ->commandHandlerLocator
            ->getHandler($command)
        )->handle($command);
    }
}