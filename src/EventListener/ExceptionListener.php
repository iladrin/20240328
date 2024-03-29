<?php

namespace App\EventListener;

use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class ExceptionListener
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    #[AsEventListener(event: KernelEvents::CONTROLLER)]
    public function onKernelTerminate(ControllerEvent $event): void
    {
        $this->logger->info('Hello there');
    }
}
