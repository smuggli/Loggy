<?php
declare(strict_types = 1);

namespace Smuggli\Loggy\Handler;

/**
 * Class StdoutHandler
 *
 * @package Smuggli\Loggy
 *
 * @author  Stephan Muggli <stephan.muggli@googlemail.com>
 */
class StdoutHandler implements HandlerInterface
{
    public function handle($data)
    {
        echo $data . PHP_EOL;
    }
}
