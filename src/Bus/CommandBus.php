<?php

namespace Buxus\Bus;

use Buxus\Command\Command;

interface CommandBus
{
    /**
     * @param Command $command
     */
    public function dispatch(Command $command);
}