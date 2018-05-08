<?php

namespace CBH\MailSender\ValueObject;

use PHPUnit\Framework\TestCase;

/**
 * Class SenderTest
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
    private $address = 'sebastian@phpunit.de';

    /**
     * Тестовое имя
     *
     * @var string
     */
    private $name = 'Sebastian Bergmann';

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

    /**
     * Установка окружения
     */
    protected function setUp()
    {
        parent::setUp();

        $this->sender = new Sender($this->address, $this->name);
    }
}
