<?php
declare(strict_types = 1);

namespace Smuggli\Loggy\Formatter;

use Smuggli\Loggy\Record\AbstractRecord;

/**
 * Class AbstractFormatter
 *
 * @package Smuggli\Loggy
 *
 * @author  Stephan Muggli <stephan.muggli@googlemail.com>
 */
abstract class AbstractFormatter implements FormatterInterface
{
    /**
     * Format error log record
     *
     * @param AbstractRecord $record
     *
     * @return string
     */
    public function format($record)
    {
        return sprintf('%s: %s - %s', $record->level, $record->datetime, $record->message);
    }
}
