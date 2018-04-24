<?php
namespace PaymentDay;

/**
 * Class Salary
 * @package PaymentDay
 */
class Salary extends PaymentDay
{
    /**
     * Salary constructor.
     */
    public function __construct()
    {
        $this->setPaymentDay(0);

        $this->nextYearPaymentDates();
    }
}