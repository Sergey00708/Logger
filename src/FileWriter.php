<?php
namespace Sergey00708\SergeyLogger;


class FileWriter implements WriterInterface
{
    private $fileName;
    private FormatterInterface $Formatter;

    public function __construct(FormatterInterface $Formatter, $fileName = 'MyLog.txt')
    {
        $this->Formatter = $Formatter;
        $this->fileName = $fileName;
    }

    public function write($logDate, $level, \Stringable|string $message, array $context = []): void
    {

        $logging = $this->Formatter->format($logDate, $level, $message, $context);
        $logFormat = implode(' ', $logging). PHP_EOL;
        file_put_contents($this->fileName, $logFormat, FILE_APPEND | LOCK_EX);
    }

}