<?php

namespace Buxus\Handler;

use Buxus\Command\Command;
use Buxus\Map\CommandHandlerMap;

final class StandardCommandHandlerLocator implements CommandHandlerLocator
{
    /**
     * @var CommandHandlerMap
     */
    protected $commandHandlerMap;

    /**
     * @param $commandHandlerMap
     */
    public function __construct(CommandHandlerMap $commandHandlerMap)
    {
        $this->commandHandlerMap = $commandHandlerMap;
    }

    /**
     * @param Command $command
     * @return CommandHandler
     */
    public function getHandler(Command $command)
    {
        return $this->commandHandlerMap->getCommand(get_class($command));
    }
}