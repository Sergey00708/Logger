<?php
namespace Sergey00708\SergeyLogger;

interface FormatterInterface
{
    public function format($logDate, $logLevel, \Stringable|string $message, array $context = []);
}