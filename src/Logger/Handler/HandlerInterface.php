<?php
declare(strict_types = 1);

namespace Smuggli\Loggy\Handler;

/**
 * Interface HandlerInterface
 *
 * @package Smuggli\Loggy
 *
 * @author  Stephan Muggli <stephan.muggli@googlemail.com>
 */
interface HandlerInterface
{
    public function handle($data);
}