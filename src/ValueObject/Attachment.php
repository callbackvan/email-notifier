<?php

namespace CBH\MailSender\ValueObject;

/**
 * Прикрепленный файл
 *
 * @package CBH\MailSender\ValueObject
 */
class Attachment
{
    /**
     * Тип файла
     *
     * @var string
     */
    private $type;

    /**
     * Имя файла
     *
     * @var string
     */
    private $name;

    /**
     * Кодировка
     *
     * @var string
     */
    private $encoding;

    /**
     * Файл
     *
     * @var string
     */
    private $file;

    /**
     * Конструктор.
     *
     * @param string $type
     * @param string $name
     * @param string $encoding
     * @param string $file
     */
    public function __construct($type, $name, $encoding, $file)
    {
        $this->type     = $type;
        $this->name     = $name;
        $this->encoding = $encoding;
        $this->file     = $file;
    }

    /**
     * Тип файла
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Имя файла
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Кодировка
     *
     * @return string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Файл
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }
}
