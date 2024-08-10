<?php

namespace App\Tests\Message;

use App\Message\UserCreated;
use App\MessageHandler\UserCreatedHandler;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class UserCreatedHandlerTest extends TestCase
{
    public function testHandle()
    {
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())
            ->method('info')
            ->with($this->stringContains('UserCreated event received'));

        $handler = new UserCreatedHandler($logger);
        $message = new UserCreated('amanullahsahil299@gmail.com', 'Aman', 'Ullah');

        $handler->handle($message);
    }
}
