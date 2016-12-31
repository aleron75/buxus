<?php

namespace Buxus\Handler;

use Buxus\Command\Command;

interface CommandHandler
{
    /**
     * @param Command $command
     */
    public function handle(Command $command);
} 