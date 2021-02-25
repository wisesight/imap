<?php

namespace Wisesight\Imap\Search\Flag;

use Wisesight\Imap\Search\AbstractCondition;

/**
 * Represents an ANSWERED flag condition. Messages must have the \\ANSWERED flag
 * set in order to match the condition.
 */
class Answered extends AbstractCondition
{
    /**
     * Returns the keyword that the condition represents.
     *
     * @return string
     */
    public function getKeyword()
    {
        return 'ANSWERED';
    }
}
