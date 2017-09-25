<?php

/**
 * =====================================================================
 * Specification Pattern
 * =====================================================================
 * The observer pattern is a software design pattern in which an object,
 * called the subject, maintains a list of its dependents, called observers,
 * and notifies them automatically of any state changes, usually by calling
 * one of their methods.
 */

/**
 * Interface Subject
 */
interface Subject {
    public function attach(Observer $observer);
    public function detach($index);
    public function notify();
}

/**
 * Interface Observer
 */
interface Observer {
    public function handle();
}

/**
 * Class Login
 */
class Login implements Subject {

    /**
     * @var Observer[]
     */
    protected $observers = [];


    /**
     * @param Observer $observer
     * @return mixed
     */
    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    /**
     * @param $index
     */
    public function detach($index)
    {
        unset($this->observers[$index]);
    }

    /**
     * @return mixed
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->handle();
        }
    }

    public function fire()
    {
        $this->notify();
    }
}

class LogHandler implements Observer {

    /**
     * @return mixed
     */
    public function handle()
    {
        var_dump('log something important');
    }
}

class EmailHandler implements Observer {

    /**
     * @return mixed
     */
    public function handle()
    {
        var_dump('email is fired off');
    }
}

$login = new Login;
$login->attach(new LogHandler);
$login->attach(new EmailHandler);
$login->fire();