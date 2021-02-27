<?php

namespace Wisesight\Imap\Tests;

class ConnectionTest extends AbstractTest
{
    public function testCount()
    {
        $this->assertInternalType('int', self::getConnection()->count());
    }

    public function testGetMailboxes()
    {
        $mailboxes = self::getConnection()->getMailboxes();
        $this->assertInternalType('array', $mailboxes);

        foreach ($mailboxes as $mailbox) {
            $this->assertInstanceOf('\Wisesight\Imap\Mailbox', $mailbox);
        }
    }

    public function testGetMailbox()
    {
        $mailbox = static::getConnection()->getMailbox('INBOX');
        $this->assertInstanceOf('\Wisesight\Imap\Mailbox', $mailbox);
    }

    /**
     * @expectedException \Wisesight\Imap\Exception\MailboxDoesNotExistException
     */
    public function testCreateMailbox()
    {
        $connection = static::getConnection();

        $name = 'test' . uniqid();
        $mailbox = $connection->createMailbox($name);
        $this->assertEquals(
            $name,
            $mailbox->getName(),
            'Correct mailbox must be returned from create'
        );
        $this->assertEquals(
            $name,
            $connection->getMailbox($name)->getName(),
            'Correct mailbox must be returned from connection'
        );

        $mailbox->delete();
        $connection->getMailbox($name);
    }

    /**
     * @expectedException \Wisesight\Imap\Exception\MailboxDoesNotExistException
     */
    public function testGetInvalidMailbox()
    {
        static::getConnection()->getMailbox('does-not-exist');
    }
}
