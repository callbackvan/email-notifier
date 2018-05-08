<?php

namespace CBH\MailSender\ValueObject;

use PHPUnit\Framework\TestCase;

/**
 * Тест отправителя
 *
 * @package CBH\MailSender\ValueObject
 */
class SenderTest extends TestCase
{
    /**
     * Отправитель
     *
     * @var Sender
     */
    private $sender;

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

        $this->sender = new Sender($this->address, $this->name);
    }

    /**
     * Тест имени отправителя
     */
    public function testName()
    {
        $this->assertSame($this->name, $this->sender->getName());
    }

    /**
     * Тест адреса отправителя
     */
    public function testAddress()
    {
        $this->assertSame($this->address, $this->sender->getAddress());
    }
}
