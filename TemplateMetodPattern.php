<?php

/**
 * =====================================================================
 * Template Method Pattern
 * =====================================================================
 * - The template method pattern is a behavioral design pattern that
 *   defines the program skeleton of an algorithm in an operation,
 *   deferring some steps to subclasses.
 *   It lets one redefine certain steps of an algorithm without changing
 *   the algorithm's structure.
 */

/**
 * Class Sub
 */
abstract class Sub {

    public function make()
    {
        return $this
            ->layBread()
            ->addLettuce()
            ->addPrimaryToppings()
            ->addSauce();
    }

    /**
     * @return $this
     */
    protected function layBread() {
        var_dump('add bread');
        return $this;
    }

    /**
     * @return $this
     */
    protected function addLettuce() {
        var_dump('add lettuce');
        return $this;
    }

    /**
     * @return $this
     * Required method
     */
    protected abstract function addPrimaryToppings();

    /**
     * @return $this
     */
    protected function addSauce() {
        var_dump('add sauce');
        return $this;
    }
}

class VeggieSub extends Sub {

    /**
     * @return mixed
     */
    protected function addPrimaryToppings()
    {
        var_dump('add veggies');
        return $this;
    }
}

class TurkeySub extends Sub {

    /**
     * @return mixed
     */
    protected function addPrimaryToppings()
    {
        var_dump('add turkey');
        return $this;
    }
}


(new TurkeySub())->make();
echo PHP_EOL;
(new VeggieSub())->make();