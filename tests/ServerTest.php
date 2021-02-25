<?php

namespace Wisesight\Imap\Tests;

use Wisesight\Imap\Server;

class ServerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Wisesight\Imap\Exception\AuthenticationFailedException
     */
    public function testFailedAuthenticate()
    {
        $server = new Server('imap.gmail.com');
        $server->authenticate('fake_username', 'fake_password');
    }
}
