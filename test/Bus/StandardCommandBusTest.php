<?php

namespace Buxus\Test\Bus;

use Buxus\Bus\StandardCommandBus;
use Buxus\Command\Command;
use Buxus\Handler\CommandHandler;
use Buxus\Handler\CommandHandlerLocator;

class StandardCommandBusTest extends \PHPUnit_Framework_TestCase
{
    public function testDispatchCallsHandleMethod()
    {
        $command = $this->getMockBuilder(Command::class)
            ->getMock();
        $commandHandler = $this->getMockBuilder(CommandHandler::class)
            ->setMethods(['handle'])
            ->getMock();
        $commandHandlerLocator = $this->getMockBuilder(CommandHandlerLocator::class)
            ->setMethods(['getHandler'])
            ->getMock();
        $commandHandlerLocator
            ->expects($this->once())
            ->method('getHandler')
            ->willReturn($commandHandler)
            ->with($command);
        $commandHandler
            ->expects($this->once())
            ->method('handle')
            ->with($command);

        $standardCommandBus = new StandardCommandBus($commandHandlerLocator);

        $standardCommandBus->dispatch($command);
    }
}