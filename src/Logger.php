<?php
namespace Sergey00708\SergeyLogger;

use DateTime;
use Psr\Log\AbstractLogger;

require __DIR__ . '/../vendor/autoload.php';

class Logger extends AbstractLogger
{
    private array $writers;

    public function __construct(WriterInterface $writer)
    {
        $this->writers = [];
        $this->writers[] = $writer;
    }


    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $date = new DateTime();
        foreach ($this->writers as $writer) {
            $writer->write($date, $level, $message, $context);
        }
    }

    public function setWriter(WriterInterface $writer): void
    {
        $this->writers[] = $writer;
    }

}
