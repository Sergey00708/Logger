<?php
namespace Sergey00708\SergeyLogger;

interface WriterInterface
{
    public function write($logDate, $level, \Stringable|string $message, array $context = []);
}