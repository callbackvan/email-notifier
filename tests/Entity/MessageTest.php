<?php

namespace CBH\MailSender\Entity;

use CBH\MailSender\ValueObject\Attachment;
use CBH\MailSender\ValueObject\Sender;
use DateTime;
use DateTimeInterface;
use PHPUnit\Framework\TestCase;

/**
 * Тест сообщения
 *
 * @package CBH\MailSender\Entity
 */
class MessageTest extends TestCase
{
    /**
     * Сообщение
     *
     * @var Message
     */
    private $message;

    /**
     * Дата
     *
     * @var DateTimeInterface
     */
    private $startDate;

    /**
     * Установка окружения
     */
    protected function setUp()
    {
        parent::setUp();

        $this->startDate = $this->createMock(DateTime::class);

        $this->message = new Message(
            $this->startDate
        );
    }

    /**
     * Время обработки уведомления
     */
    public function testSendTime()
    {
        $this->assertInstanceOf(DateTimeInterface::class, $this->message->getSendTime());
    }

    /**
     * Идентификатор сообщения
     */
    public function testId()
    {
        $expected = 1;

        $this->assertSame(0, $this->message->getId());
        $this->message->setId($expected);
        $this->assertSame($expected, $this->message->getId());
    }

    /**
     * Тест темы письма
     */
    public function testSubject()
    {
        $expected = 'some subject';

        $this->assertEmpty($this->message->getSubject());
        $this->message->setSubject($expected);
        $this->assertSame($expected, $this->message->getSubject());
    }

    /**
     * Тест сообщения
     */
    public function testMessage()
    {
        $expected = 'some message';

        $this->assertNull($this->message->getMessage());
        $this->message->setMessage($expected);
        $this->assertSame($expected, $this->message->getMessage());
    }

    /**
     * Тест статуса письма
     */
    public function testStatus()
    {
        $expected = MessageInterface::MESSAGE_STATUS_SENT;

        $this->assertSame(MessageInterface::MESSAGE_STATUS_NEW, $this->message->getStatus());
        $this->message->setStatus($expected);
        $this->assertSame($expected, $this->message->getStatus());
        $this->message->setStatus('some other status');
        $this->assertSame($expected, $this->message->getStatus());
    }

    /**
     * Тест отправителя
     */
    public function testSender()
    {
        $expectedAddress = 'some address';
        $expectedName    = 'some name';

        $this->assertNull($this->message->getSender());
        $this->message->setSender($expectedAddress, $expectedName);

        $sender = $this->message->getSender();

        $this->assertInstanceOf(Sender::class, $sender);
        $this->assertSame($expectedAddress, $sender->getAddress());
        $this->assertSame($expectedName, $sender->getName());
    }

    /**
     * Тест приоритета уведомления
     */
    public function testPriority()
    {
        $expected = 150;

        $this->assertSame(100, $this->message->getPriority());
        $this->message->setPriority($expected);
        $this->assertSame($expected, $this->message->getPriority());
    }

    /**
     * Тест получателей
     *
     * @param array $receivers
     *
     * @dataProvider receiverProvider()
     */
    public function testReceivers($receivers)
    {

        $this->assertEmpty($this->message->getReceivers());

        foreach ($receivers as $receiver) {
            $exceptedEmail = $receiver['email'];

            if (!empty($receiver['name'])) {
                $this->message->addReceiver($exceptedEmail, $receiver['name']);
            } else {
                $this->message->addReceiver($exceptedEmail);
            }
        }

        $this->assertNotEmpty($this->message->getReceivers());

        foreach ($this->message->getReceivers() as $i => $receiver) {
            $expectedEmail = $receivers[$i]['email'];
            $expectedName  = null;

            if (!empty($receivers[$i]['name'])) {
                $expectedName = $receivers[$i]['name'];
            }

            $this->assertSame($expectedEmail, $receiver->getAddress());
            $this->assertSame($expectedName, $receiver->getName());
        }
    }

    /**
     * Провайдер данных получателя
     */
    public function receiverProvider()
    {
        return [
            [
                [
                    [
                        'email' => 'some@mail.com',
                        'name'  => 'username',
                    ],
                ],
            ],
            [
                [
                    [
                        'email' => 'some@mail.com',
                        'name'  => 'username',
                    ],
                    [
                        'email' => 'some1@mail.com',
                        'name'  => 'username1',
                    ],
                    ['email' => 'some2@mail.com'],
                ],
            ],
        ];
    }

    /**
     * Тест комментария
     */
    public function testComment()
    {
        $expected = 'some comment';
        $this->assertEmpty($this->message->getComment());
        $this->message->setComment($expected);
        $this->assertSame($expected, $this->message->getComment());
    }

    /**
     * Тест идентификатора шаблона
     */
    public function testTemplateName()
    {
        $expected = 'some template name';
        $this->assertEmpty($this->message->getTemplateName());
        $this->message->setTemplateName($expected);
        $this->assertSame($expected, $this->message->getTemplateName());
    }

    /**
     * Тест комментария
     */
    public function testVariables()
    {
        $expected = [
            'var1' => 'somevar',
            'var2' => 'somevar2',
        ];

        $this->assertSame([], $this->message->getVariables());
        $this->message->setVariables($expected);
        $this->assertSame($expected, $this->message->getVariables());

        $expected2 = [
            'var2' => 'somenewvar2',
            'var3' => 'somevar3',
        ];

        $mergedArray = array_merge($expected, $expected2);

        $this->message->setVariables($expected2);

        $this->assertSame($mergedArray, $this->message->getVariables());
    }

    /**
     * Тест добавления переменной
     */
    public function testAddVariable()
    {
        $expected = ['key' => 'value'];

        $this->assertSame([], $this->message->getVariables());
        $this->message->addVariable('key', 'value');
        $this->assertSame($expected, $this->message->getVariables());

        $expected = [
            'key' => 'value',
            'key2' => 'value2',
        ];

        $this->message->addVariable('key2', 'value2');
        $this->assertSame($expected, $this->message->getVariables());
    }

    /**
     * Прикрепленный файл
     */
    public function testAttachments()
    {
        $attachment = $this->createMock(Attachment::class);

        $this->assertSame([], $this->message->getAttachments());

        $this->message->addAttachment($attachment);

        $this->assertSame([$attachment], $this->message->getAttachments());
    }
}
