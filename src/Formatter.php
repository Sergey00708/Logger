<?php
namespace Sergey00708\SergeyLogger;


class Formatter implements FormatterInterface
{

    public $format;

    public function __construct($format = '{date} {level} {message} {context}')
    {
        $this->format = $format;
    }

    public function format($logDate, $logLevel, \Stringable|string $message, array $context = []): array
    {
        $logging = [];

        $logging ['date'] = $this->formatLogDate($logDate);

        $logging['level'] = $this->formatLogLevel($logLevel);

        $logging ['message'] = $this->formatLogMessage($message);

        $logging ['context'] = $this->formatLogContext($context);

        return $logging;
    }

    public function formatLogDate($date, $dateFormat = 'Y-m-d H:i:s'): string
    {
        return date($dateFormat);
    }

    public function formatLogLevel ($Level): string
    {
        return strtoupper($Level);
    }

    public function formatLogMessage($Message): string
    {
        return trim($Message);
    }

    public function formatLogContext($Context): ?string
    {
            return json_encode($Context);
    }
}
