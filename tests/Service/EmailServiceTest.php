<?php

namespace CBH\MailSender\Service;

use CBH\MailSender\Entity\MessageInterface;
use CBH\MailSender\Provider\ProviderInterface;
use PHPUnit\Framework\TestCase;

/**
 * Тест сервиса
 *
 * @package CBH\MailSender\Service
 */
class EmailServiceTest extends TestCase
{
    /**
     * Сервис отправки уведомлений
     *
     * @var EmailService
     */
    private $emailService;

    /**
     * Интерфейс провайдера
     *
     * @var ProviderInterface
     */
    private $provider;

    /**
     * Установка окружения
     */
    protected function setUp()
    {
        parent::setUp();

        $this->provider = $this->createMock(ProviderInterface::class);

        $this->emailService = new EmailService($this->provider);
    }

    /**
     * Тест отправки сообщений
     */
    public function testOfSendingEmail()
    {
        $message = $this->createMock(MessageInterface::class);

        $this->provider->expects($this->once())
            ->method('sendEmail')
            ->with($message);

        $this->emailService->sendEmail($message);
    }
}
