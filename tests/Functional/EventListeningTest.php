<?php

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\Messenger\MessageBusInterface;
use App\Message\UserCreated;

class EventListeningTest extends WebTestCase
{
    private $messageBus;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::$container;

        $this->messageBus = $container->get(MessageBusInterface::class);
    }

    /**
     * @return void
     */
    public function testEventProcessing()
    {
        // Create and dispatch a message
        $message = new UserCreated('amanullahsahil299@gmail.com', 'Aman', 'Ullah');
        $this->messageBus->dispatch($message);

        // Wait for processing
        sleep(2); // Adjust this as needed

        // Fetch log entries
        $logEntries = $this->getLogEntries();
        $this->assertContains('UserCreated event received', $logEntries);
    }

    /**
     * @return array
     */
    private function getLogEntries(): array
    {
        // Assuming we've configured a Monolog handler that collects log entries in memory
        $logHandler = $this->getContainer()->get('monolog.handler.memory');

        // Get log records
        $logs = $logHandler->getLogs(); // Method to fetch logs from the in-memory handler

        return array_map(function ($log) {
            return $log['message'];
        }, $logs);
    }
}
