<?php

namespace CBH\MailSender\ValueObject;

use PHPUnit\Framework\TestCase;

/**
 * Class AttachmentTest
 *
 * @package CBH\MailSender\ValueObject
 */
class AttachmentTest extends TestCase
{
    /**
     * Прикрепленный файл
     *
     * @var Attachment
     */
    private $attachment;

    /**
     * Тестовый тип
     *
     * @var string
     */
    private $type = 'testType';

    /**
     * Тестовое имя
     *
     * @var string
     */
    private $name = 'testName';

    /**
     * Тестовая кодировка
     *
     * @var string
     */
    private $encoding = 'testEncoding';

    /**
     * Тестовый файл
     *
     * @var string
     */
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
     * Тест файла
     */
    public function testFile()
    {
        $this->assertSame($this->file, $this->attachment->getFile());
    }

    /**
     * Установка окружения
     */
    protected function setUp()
    {
        parent::setUp();

        $this->attachment = new Attachment($this->type, $this->name, $this->encoding, $this->file);
    }
}
