<?php
declare(strict_types = 1);

namespace Smuggli\Loggy\Record;

/**
 * Abstract record
 *
 * @property string $message
 * @property string $datetime
 * @property string $level
 *
 * @package Smuggli\Loggy
 *
 * @author  Stephan Muggli <stephan.muggli@googlemail.com>
 */
abstract class AbstractRecord extends \ArrayObject
{
    public function __construct($input = null, $flags = \ArrayObject::ARRAY_AS_PROPS, $iterator_class = "ArrayIterator")
    {
        parent::__construct($input, $flags, $iterator_class);
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }
}
