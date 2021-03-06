<?php

namespace Wisesight\Imap\Search\State;

use Wisesight\Imap\Search\AbstractCondition;

/**
 * Represents a NEW condition. Only new messages will match this condition.
 */
class NewMessage extends AbstractCondition
{
    /**
     * Returns the keyword that the condition represents.
     *
     * @return string
     */
    public function getKeyword()
    {
        return 'NEW';
    }
}
