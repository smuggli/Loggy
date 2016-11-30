<?php
declare(strict_types = 1);

namespace Smuggli\Loggy;

use Smuggli\Loggy\{
    Formatter\FormatterInterface,
    Handler\HandlerInterface
};

/**
 * Class AbstractLogger
 *
 * @package Smuggli\Loggy
 *
 * @author  Stephan Muggli <stephan.muggli@googlemail.com>
 */
abstract class AbstractLogger implements \Psr\Log\LoggerInterface
{
    /**
     * @param string
     */
    protected $log;
    /**
     * @param integer
     */
    protected $logLevel;
    /**
     * @var HandlerInterface
     */
    protected $handler;
    /**
     * @var FormatterInterface
     */
    protected $formatter;

    /**
     * Abstract logger
     *
     * @param string             $log
     * @param integer            $logLevel
     * @param HandlerInterface   $handler
     * @param FormatterInterface $formatter
     */
    public function __construct(
        string $log = Log::ERRORLOG,
        int $logLevel = LogLevel::DEBUG,
        HandlerInterface $handler = null,
        FormatterInterface $formatter = null
    ) {
        $this->log = $log;
        $this->logLevel = $logLevel;
        $this->handler = $handler;
        $this->formatter = $formatter;
    }

    /**
     * @return FormatterInterface
     */
    protected function getFormatter(): FormatterInterface
    {
        if (null === $this->formatter) {
            $this->generateFormatter();
        }

        return $this->formatter;
    }

    /**
     * @return HandlerInterface
     */
    protected function getHandler(): HandlerInterface
    {
        if (null === $this->handler) {
            $this->generateHandler();
        }

        return $this->handler;
    }

    /**
     * @return mixed
     */
    protected function generateFormatter(): FormatterInterface
    {
        $name = sprintf('\Smuggli\Loggy\Formatter\%sFormatter', $this->log);

        return $this->formatter = new $name();
    }

    /**
     * @return mixed
     */
    protected function generateHandler(): HandlerInterface
    {
        $name = sprintf('\Smuggli\Loggy\Handler\%sHandler', $this->log);

        return $this->handler = new $name();
    }

    /**
     * @return mixed
     */
    protected function generateRecord($data)
    {
        $name = sprintf('\Smuggli\Loggy\Record\%sRecord', $this->log);

        return new $name($data);
    }

    /**
     * Check if the current message should be logged
     *
     * @param integer $logLevel
     *
     * @return bool
     */
    protected function shouldBeLogged(int $logLevel): bool
    {
        return ($logLevel >= $this->logLevel);
    }
}