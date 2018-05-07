<?php

declare(strict_types = 1);

namespace CBH\MailSender\ValueObject;

use PHPUnit\Framework\TestCase;

class AttachmentTest extends TestCase
{
    /** @var Attachment */
    private $attachment;

    /** @var string */
    private $type = 'testType';

    /** @var string */
    private $name = 'testName';

    /** @var string */
    private $encoding = 'testEncoding';

    /** @var string */
    private $file = 'testFile';

    /**
     * Тест типа
     */
    public function testType()
    {
        $this->assertSame($this->type, $this->attachment->getType());
    }

    /**
     * Тест названия
     */
    public function testName()
    {
        $this->assertSame($this->name, $this->attachment->getName());
    }

    /**
     * Тест кодировки
     */
    public function testEncoding()
    {
        $this->assertSame($this->encoding, $this->attachment->getEncoding());
    }

    /**
     * Тест пути
     */
    public function testFile()
    {
        $this->assertSame($this->file, $this->attachment->getFile());
    }

    protected function setUp()
    {
        parent::setUp();

        $this->attachment = new Attachment($this->type, $this->name, $this->encoding, $this->file);
    }
}
