<?php
declare(strict_types = 1);

namespace Smuggli\Loggy\Formatter;

/**
 * Interface FormatterInterface
 *
 * @package Smuggli\Loggy
 *
 * @author  Stephan Muggli <stephan.muggli@googlemail.com>
 */
interface FormatterInterface
{
    public function format($record);
}