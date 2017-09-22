<?php

/**
 * =====================================================================
 * Strategy Pattern
 * =====================================================================
 * - Define  a family of algorithms
 * - Encapsulate and make them interchangeable
 */


interface Logger {
    public function log($data);
}

class LogToFile implements Logger {

    /**
     * @param $data
     * @return mixed
     */
    public function log($data)
    {
        var_dump('Log data to the file');
    }
}

class LogToDatabase implements Logger {

    /**
     * @param $data
     * @return mixed
     */
    public function log($data)
    {
        var_dump('Log data to the database');
    }
}

class LogToMemory implements Logger {

    /**
     * @param $data
     * @return mixed
     */
    public function log($data)
    {
        var_dump('Log data to the memory');
    }
}

class App {

    protected $logger;

    public function log($data, Logger $logger)
    {
        $logger->log($data);
    }
}

$app = new App();
$app->log('hello world', new LogToMemory());
$app->log('hello world', new LogToDatabase());
$app->log('hello world', new LogToFile());