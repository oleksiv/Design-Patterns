<?php

/**
 * =====================================================================
 * Adapter Pattern
 * =====================================================================
 * - An adapter allows you to translate one interface for use with another
 */

/**
 * Interface BookInterface
 */
interface BookInterface
{
    /**
     * @return mixed
     */
    public function open();

    /**
     * @return mixed
     */
    public function turnPage();
}

/**
 * Class Book
 */
class Book implements BookInterface
{

    public function open()
    {
        var_dump('opening the  paper book');
    }

    public function turnPage()
    {
        var_dump('turning the page of the paper book');
    }
}

/**
 * Interface eReaderInterface
 */
interface eReaderInterface
{
    public function turnOn();

    public function pressNextButton();
}

/**
 * Class Kindle
 * This class is not owned by you. Interfaces don't match.
 */
class Kindle implements eReaderInterface
{
    public function turnOn()
    {
        var_dump('turn the Kindle on');
    }

    public function pressNextButton()
    {
        var_dump('press the next button on the Kindle');
    }
}


/**
 * Class KindleAdapter
 */
class KindleAdapter implements BookInterface {

    /**
     * @var Kindle
     */
    public $kindle;

    /**
     * KindleAdapter constructor.
     * @param Kindle $kindle
     */
    public function __construct(Kindle $kindle)
    {
        $this->kindle = $kindle;
    }


    public function open()
    {
        $this->kindle->turnOn();
    }


    public function turnPage()
    {
        $this->kindle->pressNextButton();
    }

}

/**
 * Class Person
 */
class Person {

    /**
     * @param BookInterface $book
     */
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}


(new Person())->read(new KindleAdapter(new Kindle()));



