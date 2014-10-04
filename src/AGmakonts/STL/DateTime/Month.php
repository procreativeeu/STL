<?php
/**
 * Created by PhpStorm.
 * User: adamgrabek
 * Date: 04/10/14
 * Time: 21:09
 */

namespace AGmakonts\STL\DateTime;


use AGmakonts\STL\DateTime\Exception\InvalidMonthException;
use AGmakonts\STL\Number\Integer;
use AGmakonts\STL\SimpleTypeInterface;
use AGmakonts\STL\String\String;

class Month implements SimpleTypeInterface
{
    const MIN_MONTH = 0;
    const MAX_MONTH = 12;

    const JANUARY   = 1;
    const FEBRUARY  = 2;
    const MARCH     = 3;
    const APRIL     = 4;
    const MAY       = 5;
    const JUNE      = 6;
    const JULY      = 7;
    const AUGUST    = 8;
    const SEPTEMBER = 9;
    const OCTOBER   = 10;
    const NOVEMBER  = 11;
    const DECEMBER  = 12;

    /**
     * @var \AGmakonts\STL\Number\Integer
     */
    private $_month;

    /**
     * @var \AGmakonts\STL\String\String
     */
    private $_name;


    /**
     * @param \AGmakonts\STL\Number\Integer $month
     *
     */
    public function __construct(Integer $month = NULL)
    {
        $date = new \DateTime();

        if(NUll === $month) {
            $month = new Integer($date->format("m"));
        } else {
            $date->setDate($date->format("Y"), $month->value(), 1);
        }

        if (TRUE === $month->assertIsGreaterThan(new Integer(self::MAX_MONTH)) &&
            TRUE === $month->assertIsSmallerThan(new Integer(self::MIN_MONTH))) {
            throw new InvalidMonthException($month);
        }

        $this->_month = $month;

        $this->_name = new String($date->format("F"));

    }

    /**
     * @return mixed
     */
    public function value()
    {
        return $this->month()->value();
    }

    /**
     * @return \AGmakonts\STL\String\String
     */
    public function name()
    {
        return $this->_name;
    }

    /**
     * @return \AGmakonts\STL\Number\Integer
     */
    public function month()
    {
        return $this->_month;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name()->value();
    }


} 