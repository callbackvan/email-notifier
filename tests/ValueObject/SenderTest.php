<?php

declare(strict_types = 1);

namespace CBH\MailSender\ValueObject;

use PHPUnit\Framework\TestCase;

class SenderTest extends TestCase
{
    /** @var Sender */
    private $sender;

    /** @var string */
    private $address = 'sebastian@phpunit.de';

    /** @var string */
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

    protected function setUp()
    {
        parent::setUp();

        $this->sender = new Sender($this->address, $this->name);
    }
}
