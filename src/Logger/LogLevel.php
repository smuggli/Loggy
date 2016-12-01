<?php
declare(strict_types = 1);

namespace Smuggli\Loggy;

/**
 * Class LogLevel
 *
 * @package Smuggli\Loggy
 *
 * @author  Stephan Muggli <stephan.muggli@googlemail.com>
 */
class LogLevel
{
    const DEBUG = 1 << 1;
    const INFO = 1 << 2;
    const NOTICE = 1 << 3;
    const WARNING = 1 << 4;
    const ERROR = 1 << 5;
    const CRITICAL = 1 << 6;
    const ALERT = 1 << 7;
    const EMERGENCY = 1 << 8;
}
