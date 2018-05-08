<?php

namespace CBH\MailSender\ValueObject;

use PHPUnit\Framework\TestCase;

/**
 * Class ReceiverTest
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
    private $address = 'sebastian@phpunit.de';

    /**
     * Тестовое имя
     *
     * @var string
     */
    private $name = 'Sebastian Bergmann';

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

    /**
     * Установка окружения
     */
    protected function setUp()
    {
        parent::setUp();

        $this->receiver = new Receiver($this->address, $this->name);
    }
}
