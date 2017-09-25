<?php

/**
 * =====================================================================
 * Specification Pattern
 * =====================================================================
 * Business rules can be recombined by chaining the business rules together using boolean logic.
 * The pattern is frequently used in the context of domain-driven design.
 */

/**
 * Class Customer
 */
class Customer {

    /**
     * @var
     */
    protected $type;

    /**
     * Customer constructor.
     * @param $type
     */
    public function __construct($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function type()
    {
        return $this->type;
    }
}

/**
 * Class CustomerIsGold
 */
class CustomerIsGold {

    /**
     * @param Customer $customer
     * @return bool
     */
    public function isSatisfiedBy(Customer $customer)
    {
        return $customer->type() == 'gold';
    }
}

$spec = new CustomerIsGold();

$goldCustomer = new Customer('gold');

var_dump($spec->isSatisfiedBy($goldCustomer));