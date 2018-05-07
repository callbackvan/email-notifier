<?php

namespace CBH\MailSender\Provider;

use CBH\MailSender\Entity\MessageInterface;

/**
 * Интерфейс провайдера E-mail
 *
 * @package CBH\MailSender\Provider
 */
interface ProviderInterface
{
    /**
     * Отправить E-mail
     *
     * @param MessageInterface $email
     *
     * @return void
     */
    public function sendEmail(MessageInterface $email);
}
