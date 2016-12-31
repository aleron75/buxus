<?php

namespace Buxus\Map;

use Buxus\Handler\CommandHandler;

interface CommandHandlerMap
{
    /**
     * @param $command
     * @return CommandHandler
     */
    public function getCommand($command);
}