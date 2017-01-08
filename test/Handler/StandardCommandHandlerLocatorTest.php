<?php

namespace Buxus\Test\Handler;

use Buxus\Command\Command;
use Buxus\Handler\StandardCommandHandlerLocator;
use Buxus\Map\CommandHandlerMap;

class StandardCommandHandlerLocatorTest extends \PHPUnit_Framework_TestCase
{
    public function testGetHandlerReturnsCommandHandler()
    {
        $commandHandlerMap = $this->getMockBuilder(CommandHandlerMap::class)
            ->setMethods(['getCommand'])
            ->getMock();
        $command = $this->getMockBuilder(Command::class)
            ->getMock();
        $commandHandler = $this->getMockBuilder(CommandHandlerMap::class)
            ->getMock();
        $commandHandlerMap
            ->expects($this->once())
            ->method('getCommand')
            ->with(get_class($command))
            ->willReturn($commandHandler);
        $commandHandlerLocator = new StandardCommandHandlerLocator($commandHandlerMap);

        $this->assertSame($commandHandler, $commandHandlerLocator->getHandler($command));
    }
}