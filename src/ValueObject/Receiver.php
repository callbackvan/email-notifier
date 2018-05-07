<?php

namespace CBH\MailSender\ValueObject;

/**
 * Получатель
 *
 * @package CBH\MailSender\ValueObject
 */
class Receiver
{
    /**
     * Имя получателя
     *
     * @var null|string
     */
    private $name;

    /**
     * E-mail получателя
     *
     * @var string
     */
    private $address;

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
     * Имя получателя
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Адрес почтового ящика
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
}
