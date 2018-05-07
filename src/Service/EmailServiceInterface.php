<?php

namespace CBH\MailSender\Service;

use CBH\MailSender\Entity\MessageInterface;

/**
 * Интерфейс сервиса e-mail
 *
 * @package CBH\MailSender\Service
 */
interface EmailServiceInterface
{
    /**
     * Отправить e-mail
     *
     * @param MessageInterface $email
     *
     * @return void
     */
    public function sendEmail(MessageInterface $email);
}
