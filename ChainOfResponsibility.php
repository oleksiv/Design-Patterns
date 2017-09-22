<?php

abstract class HomeChecker {

    /**
     * @var $successor HomeChecker
     */
    protected $successor;

    /**
     * @param HomeStatus $homeStatus
     * @return mixed
     */
    public abstract function check(HomeStatus $homeStatus);

    /**
     * @param HomeChecker $successor
     */
    public function succeedWith(HomeChecker $successor)
    {
        $this->successor = $successor;
    }

    /**
     * @param HomeStatus $homeStatus
     */
    public function next(HomeStatus $homeStatus)
    {
        if($this->successor) {
            $this->successor->check($homeStatus);
        }
    }
}

/**
 * Class Locks
 */
class Locks extends HomeChecker
{
    public function check(HomeStatus $homeStatus)
    {
        if (!$homeStatus->locked) {
            throw new Exception('The doors are not locked.');
        }

        $this->next($homeStatus);
    }
}

/**
 * Class Lights
 */
class Lights extends HomeChecker
{

    /**
     * @param HomeStatus $homeStatus
     * @throws Exception
     */
    public function check(HomeStatus $homeStatus)
    {
        if (!$homeStatus->lightsOff) {
            throw new Exception('The lights are still on.');
        }

        $this->next($homeStatus);
    }
}

/**
 * Class Alarm
 */
class Alarm extends HomeChecker
{

    /**
     * @param HomeStatus $homeStatus
     * @throws Exception
     */
    public function check(HomeStatus $homeStatus)
    {
        if (!$homeStatus->alarmOn) {
            throw new Exception('The alarm is not enabled.');
        }

        $this->next($homeStatus);
    }
}

class HomeStatus
{
    public $locked = true;
    public $lightsOff = true;
    public $alarmOn = true;
}

$locks = new Locks();
$lights = new Lights();
$alarm = new Alarm();

$locks->succeedWith($lights);
$lights->succeedWith($alarm);

$locks->check(new HomeStatus());