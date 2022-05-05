<?php

// 工厂模式
interface Logger
{
    public function log(string $message);
}

class StdoutLogger implements Logger
{
    public function log(string $message)
    {
        echo $message . PHP_EOL;
    }
}

class FileLogger implements Logger
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function log(string $message)
    {
        file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
    }
}

interface LogFactory
{
    public function createLogger(): Logger;
}

class StdoutLoggerFactory implements LogFactory
{
    public function createLogger(): Logger
    {
        return new StdoutLogger();
    }
}

class FileLoggerFactory implements LogFactory
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function createLogger(): Logger
    {
        return new FileLogger($this->filePath);
    }
}

$stdoutLoggerFactory = new StdoutLoggerFactory();
$stdoutLogger = $stdoutLoggerFactory->createLogger();
print_r($stdoutLoggerFactory);
$stdoutLogger->log("hello");

$fileLoggerFactory = new FileLoggerFactory("./fileLogger.txt");
$fileLogger = $fileLoggerFactory->createLogger();
print_r($fileLogger);
$fileLogger->log("hello");
/*输出
StdoutLoggerFactory Object
(
)
hello
FileLogger Object
(
    [filePath:FileLogger:private] => ./fileLogger.txt
)
 */