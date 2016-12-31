<?php

namespace Buxus\Handler;

use Buxus\Command\Command;

interface CommandHandlerLocator
{
    /**
     * @param Command $command
     * @return CommandHandler
     */
    public function getHandler(Command $command);
}