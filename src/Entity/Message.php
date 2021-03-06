<?php

namespace CBH\MailSender\Entity;

use CBH\MailSender\ValueObject\Attachment;
use DateTimeInterface;
use CBH\MailSender\ValueObject\Receiver;
use CBH\MailSender\ValueObject\Sender;

/**
 * Сообщение
 *
 * @package CBH\MailSender\Entity
 */
class Message implements MessageInterface, TemplateInterface
{
    /**
     * ID
     *
     * @var int
     */
    private $id = 0;

    /**
     * Тема письма
     *
     * @var string
     */
    private $subject = '';

    /**
     * Тело письма
     *
     * @var null|string
     */
    private $message;

    /**
     * Время отправки письма
     *
     * @var DateTimeInterface
     */
    private $sendTime;

    /**
     * Статус сообщения
     *
     * @var string
     */
    private $status = 'new';

    /**
     * Приоритет отправки
     *
     * @var int
     */
    private $priority = 100;

    /**
     * Отправитель письма
     *
     * @var Sender
     */
    private $sender;

    /**
     * Получатели
     *
     * @var Receiver[]
     */
    private $receivers = [];

    /**
     * Прикрепленные файлы
     *
     * @var Attachment[]
     */
    private $attachments = [];

    /**
     * Системный комментарий к уведомлению
     *
     * @var string
     */
    private $comment = '';

    /**
     * Имя шаблона
     *
     * @var null|string
     */
    private $templateName;

    /**
     * Переменные письма
     *
     * @var array
     */
    private $variables = [];

    /**
     * Конструктор.
     *
     * @param DateTimeInterface $sendTime
     */
    public function __construct(DateTimeInterface $sendTime)
    {
        $this->sendTime = $sendTime;
    }

    /**
     * Установить ID
     *
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    /**
     * Получить ID
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Установить тему письма
     *
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = (string) $subject;
    }

    /**
     * Тема письма
     *
     * @return null|string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Установить текст письма
     *
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = (string) $message;
    }

    /**
     * Текст письма
     *
     * @return null|string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Установить статус
     *
     * @param string $status
     */
    public function setStatus($status)
    {
        if (in_array($status, self::MESSAGE_STATUS, true)) {
            $this->status = (string) $status;
        }
    }

    /**
     * Статус письма
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Получить дату отправки
     *
     * @return DateTimeInterface
     */
    public function getSendTime()
    {
        return $this->sendTime;
    }

    /**
     * Установить отправителя
     *
     * @param string $address
     * @param string $name
     */
    public function setSender($address, $name)
    {
        $this->sender = new Sender($address, $name);
    }

    /**
     * Получить отправителя
     *
     * @return Sender
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Приоритет
     *
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Установить приоритет
     *
     * @param int $priority
     */
    public function setPriority($priority)
    {
        $this->priority = (int) $priority;
    }

    /**
     * Добавить получателя
     *
     * @param string $address
     * @param string $name
     */
    public function addReceiver($address, $name = null)
    {
        if (!$this->hasReceiver($address)) {
            $this->receivers[] = new Receiver($address, $name);
        }
    }

    /**
     * Получатели
     *
     * @return Receiver[]
     */
    public function getReceivers()
    {
        return $this->receivers;
    }

    /**
     * Установить комментарий
     *
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = (string) $comment;
    }

    /**
     * Получить комментарий
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Получить название шаблона
     *
     * @return null|string
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }

    /**
     * Установить название шаблона
     *
     * @param string $templateName
     */
    public function setTemplateName($templateName)
    {
        $this->templateName = (string) $templateName;
    }

    /**
     * Получить переменные
     *
     * @return array
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * Установить переменные
     *
     * @param array $variables
     */
    public function setVariables($variables)
    {
        $this->variables = array_merge($this->variables, $variables);
    }

    /**
     * Добавить переменную
     *
     * @param string $key
     * @param mixed  $value
     */
    public function addVariable($key, $value)
    {
        $this->variables[$key] = $value;
    }

    /**
     * Получить прикрепленные файлы
     *
     * @return Attachment[]
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * Добавить вложение
     *
     * @param Attachment $attachment
     */
    public function addAttachment(Attachment $attachment)
    {
        $this->attachments[] = $attachment;
    }

    /**
     * Проверяет добавлен ли указанный получатель
     *
     * @param string $address
     *
     * @return bool
     */
    private function hasReceiver($address)
    {
        $hasReceiver = false;

        foreach ($this->receivers as $receiver) {
            if (strtolower($receiver->getAddress()) === strtolower($address)) {
                $hasReceiver = true;
            }
        }

        return $hasReceiver;
    }
}
