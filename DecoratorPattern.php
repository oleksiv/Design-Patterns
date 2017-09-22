<?php

/**
 * =====================================================================
 * Decorator Pattern
 * =====================================================================
 * - The same instance should be passed in the decorator classes.
 * - They have to implement the same interface.
 * - We use this pattern in we need to adjust only few methods, not all the methods.
 */

/**
 * Interface Inspection
 */
interface Inspection
{
    public function getPrice();
}

class BasicInspection implements Inspection
{

    public function getPrice()
    {
        return 25;
    }
}

class BasicInspectionAndOilChange implements Inspection
{

    public $inspection;

    /**
     * BasicInspectionAndOilChange constructor.
     * @param Inspection $inspection
     */
    public function __construct(Inspection $inspection)
    {
        $this->inspection = $inspection;
    }


    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->inspection->getPrice() + 1;
    }

}


class BasicInspectionAndOilChangeAndSomethingElse implements Inspection
{

    public $inspection;

    /**
     * BasicInspectionAndOilChange constructor.
     * @param Inspection $inspection
     */
    public function __construct(Inspection $inspection)
    {
        $this->inspection = $inspection;
    }


    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->inspection->getPrice() + 5;
    }

}

echo (new BasicInspectionAndOilChangeAndSomethingElse(new BasicInspectionAndOilChange(new BasicInspection())))->getPrice() . PHP_EOL;
