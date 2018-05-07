<?php

namespace CBH\MailSender\ValueObject;

/**
 * Отправитель письма
 *
 * @package CBH\MailSender\ValueObject
 */
class Sender
{
    /**
     * Адрес отправителя
     *
     * @var string
     */
    private $address;

    /**
     * Имя отправителя
     *
     * @var string
     */
    private $name;

    /**
     * Конструктор.
     *
     * @param string $address
     * @param string $name
     */
    public function __construct($address, $name)
    {
        $this->address = $address;
        $this->name    = $name;
    }

    /**
     * Получить Адрес
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Получить имя
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
