<?php

namespace CBH\MailSender\ValueObject;

use PHPUnit\Framework\TestCase;

/**
 * Тест получателя
 *
 * @package CBH\MailSender\ValueObject
 */
class ReceiverTest extends TestCase
{
    /**
     * Получатель
     *
     * @var Receiver
     */
    private $receiver;

    /**
     * Тестовый email
     *
     * @var string
     */
    private $address = 'some email';

    /**
     * Тестовое имя
     *
     * @var string
     */
    private $name = 'some name';

    /**
     * Установка окружения
     */
    protected function setUp()
    {
        parent::setUp();

        $this->receiver = new Receiver($this->address, $this->name);
    }

    /**
     * Тест имени получателя
     */
    public function testName()
    {
        $this->assertSame($this->name, $this->receiver->getName());
    }

    /**
     * Тест адреса получателя
     */
    public function testAddress()
    {
        $this->assertSame($this->address, $this->receiver->getAddress());
    }
}
