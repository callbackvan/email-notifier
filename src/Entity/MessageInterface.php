<?php

namespace CBH\MailSender\Entity;

use CBH\MailSender\ValueObject\Attachment;
use CBH\MailSender\ValueObject\Receiver;

/**
 * Интерфейс сообщения
 *
 * @package CBH\MailSender\Entity
 */
interface MessageInterface
{
    /**
     * Новый не обработанный e-mail
     */
    const MESSAGE_STATUS_NEW = 'new';

    /**
     * E-mail отправлен
     */
    const MESSAGE_STATUS_SENT = 'sent';

    /**
     * Ошибка отправки
     */
    const MESSAGE_STATUS_FAIL = 'fail';

    /**
     * Статусы E-mail сообщения
     */
    const MESSAGE_STATUS = [
        self::MESSAGE_STATUS_NEW,
        self::MESSAGE_STATUS_SENT,
        self::MESSAGE_STATUS_FAIL,
    ];

    /**
     * Получить ID
     *
     * @return int
     */
    public function getId();

    /**
     * Тема письма
     *
     * @return string
     */
    public function getSubject();

    /**
     * Текст письма
     *
     * @return null|string
     */
    public function getMessage();

    /**
     * Статус письма
     *
     * @return string
     */
    public function getStatus();

    /**
     * Получатели
     *
     * @return Receiver[]
     */
    public function getReceivers();

    /**
     * Прикрепленные файлы
     *
     * @return Attachment[]
     */
    public function getAttachments();
}
