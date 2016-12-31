<?php

namespace Buxus\Map;

use Buxus\Exception\NotFoundCommandHandlerException;
use Buxus\Handler\CommandHandler;

/**
 * Class InMemoryCommandHandlerMap
 * @package Buxus
 */
final class InMemoryCommandHandlerMap implements CommandHandlerMap
{
    /**
     * @var array
     */
    private $commandHandlerCollection;

    /**
     * @param array $commandHandlerCollection
     */
    public function __construct(array $commandHandlerCollection)
    {
        $this->commandHandlerCollection = $commandHandlerCollection;
    }

    /**
     * @param string $command
     * @return bool
     */
    protected function commandExists($command)
    {
        return isset($this->commandHandlerCollection[$command]);
    }

    /**
     * @param string $command
     * @return CommandHandler
     *
     * @throws NotFoundCommandHandlerException
     */
    public function getCommand($command)
    {
        if (!$this->commandExists($command)) {
            throw new NotFoundCommandHandlerException($command, get_class());
        }

        return $this->commandHandlerCollection[$command];
    }
}