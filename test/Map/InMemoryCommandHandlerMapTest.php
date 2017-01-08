<?php

namespace Buxus\Test\Map;

use Buxus\Exception\NotFoundCommandHandlerException;
use Buxus\Map\InMemoryCommandHandlerMap;

class InMemoryCommandHandlerMapTest extends \PHPUnit_Framework_TestCase
{
    public function testGetCommandThrowsNotFoundCommandHandlerException()
    {
        $this->expectException(NotFoundCommandHandlerException::class);
        $this->expectExceptionMessage(sprintf('Command %s not found in %', 'AnotherClass', NotFoundCommandHandlerException::class));

        $inMemoryCommandHandlerMap = new InMemoryCommandHandlerMap(['Command' => 'CommandHandler']);
        $inMemoryCommandHandlerMap->getCommand('AnotherClass');
    }

    public function testGetCommandReturnsCommandHandler()
    {
        $inMemoryCommandHandlerMap = new InMemoryCommandHandlerMap(['Command' => 'CommandHandler']);

        $this->assertSame('CommandHandler', $inMemoryCommandHandlerMap->getCommand('Command'));
    }
}