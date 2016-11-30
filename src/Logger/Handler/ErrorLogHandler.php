<?php
declare(strict_types = 1);

namespace Smuggli\Loggy\Handler;

/**
 * Class ErrorLogHandler
 *
 * @package Smuggli\Loggy
 *
 * @author  Stephan Muggli <stephan.muggli@googlemail.com>
 */
class ErrorLogHandler implements HandlerInterface
{
    public function handle($data)
    {
        error_log($data);
    }
}