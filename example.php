<?php

require "vendor/autoload.php";

use \Smuggli\Loggy;

$logger = new Loggy\Logger();

$logger->alert('test alert');
$logger->critical('test critical');
$logger->debug('test debug');
$logger->emergency('test emergency');
$logger->error('test error');
$logger->info('test info');
$logger->notice('test notice');
$logger->warning('test warning');

$logger->warning(new class {
    function __toString()
    {
        return 'toString';
    }
});

$stdoutLogger = new Loggy\Logger(Loggy\Log::STDOUT);

$stdoutLogger->alert('test alert');
$stdoutLogger->critical('test critical');
$stdoutLogger->debug('test debug');
$stdoutLogger->emergency('test emergency');
$stdoutLogger->error('test error');
$stdoutLogger->info('test info');
$stdoutLogger->notice('test notice');
$stdoutLogger->warning('test warning');

$stdoutLogger->warning(new class {
    function __toString()
    {
        return 'toString';
    }
});