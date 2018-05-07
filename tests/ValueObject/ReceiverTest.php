<?php

declare(strict_types = 1);

namespace CBH\MailSender\ValueObject;

use PHPUnit\Framework\TestCase;

class ReceiverTest extends TestCase
{
    /** @var Receiver */
    private $receiver;

    /** @var string */
    private $address = 'sebastian@phpunit.de';

    /** @var string */
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

    protected function setUp()
    {
        parent::setUp();

        $this->receiver = new Receiver($this->address, $this->name);
    }
}
