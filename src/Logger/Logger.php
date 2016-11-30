<?php
declare(strict_types = 1);

namespace Smuggli\Loggy;

/**
 * Class Logger
 *
 * @package Smuggli\Loggy
 *
 * @author  Stephan Muggli <stephan.muggli@googlemail.com>
 */
class Logger extends AbstractLogger
{
    /**
     * {@inheritdoc}
     */
    public function alert($message, array $context = array())
    {
        $this->log(LogLevel::ALERT, $message);
    }

    /**
     * {@inheritdoc}
     */
    public function debug($message, array $context = array())
    {
        $this->log(LogLevel::DEBUG, $message);
    }

    /**
     * {@inheritdoc}
     */
    public function info($message, array $context = array())
    {
        $this->log(LogLevel::INFO, $message);
    }

    /**
     * {@inheritdoc}
     */
    public function notice($message, array $context = array())
    {
        $this->log(LogLevel::NOTICE, $message);
    }

    /**
     * {@inheritdoc}
     */
    public function warning($message, array $context = array())
    {
        $this->log(LogLevel::WARNING, $message);
    }

    /**
     * {@inheritdoc}
     */
    public function error($message, array $context = array())
    {
        $this->log(LogLevel::ERROR, $message);
    }

    /**
     * {@inheritdoc}
     */
    public function critical($message, array $context = array())
    {
        $this->log(LogLevel::CRITICAL, $message);
    }

    /**
     * {@inheritdoc}
     */
    public function emergency($message, array $context = array())
    {
        $this->log(LogLevel::EMERGENCY, $message);
    }

    /**
     * {@inheritdoc}
     */
    public function log($level, $message, array $context = array())
    {
        if (!$this->shouldBeLogged($level)) {
            return;
        }

        $record = $this->generateRecord(
            [
                'message' => $message,
                'level' => ucfirst(debug_backtrace()[1]['function']),
                'datetime' => date('Y-m-d H:i:s', time())
            ]
        );

        $formatter = $this->getFormatter();
        $record = $formatter->format($record);

        $handler = $this->getHandler();
        $handler->handle($record);
    }
}