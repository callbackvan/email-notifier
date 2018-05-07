<?php

namespace CBH\MailSender\Entity;

/**
 * Интерфейс шаблонов сообщения
 *
 * @package CBH\MailSender\Entity
 */
interface TemplateInterface
{
    /**
     * Получить название шаблона
     *
     * @return string
     */
    public function getTemplateName();

    /**
     * Получить переменные шаблона
     *
     * @return array
     */
    public function getVariables();
}
