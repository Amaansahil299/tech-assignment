<?php

namespace App\MessageHandler;

use App\Message\UserCreated;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class UserCreatedHandler implements MessageHandlerInterface
{
    private $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param UserCreated $userCreated
     * @return void
     */
    public function __invoke(UserCreated $userCreated): void
    {
        $this->logger->info('User created: ' . json_encode([
                'email' => $userCreated->getEmail(),
                'firstName' => $userCreated->getFirstName(),
                'lastName' => $userCreated->getLastName(),
            ]));
    }
}
