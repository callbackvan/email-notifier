<?php

namespace CBH\MailSender\Service;

use CBH\MailSender\Entity\MessageInterface;
use CBH\MailSender\Provider\ProviderInterface;

/**
 * Сервис отправки E-mail
 *
 * @package CBH\MailSender\Service
 */
class EmailService implements EmailServiceInterface
{
    /**
     * Провайдер E-mail уведомлений
     *
     * @var ProviderInterface
     */
    private $emailProvider;

    /**
     * Конструктор.
     *
     * @param ProviderInterface $emailProvider
     */
    public function __construct(
        ProviderInterface $emailProvider
    ) {
        $this->emailProvider = $emailProvider;
    }

    /**
     * Отправить E-mail
     *
     * @param MessageInterface $email
     *
     * @return void
     */
    public function sendEmail(MessageInterface $email)
    {
        $this->emailProvider->sendEmail($email);
    }
}
