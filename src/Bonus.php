<?php
namespace PaymentDay;

/**
 * Class Bonus
 * @package PaymentDay
 */
class Bonus extends PaymentDay
{
    /**
     * Bonus constructor.
     */
    public function __construct()
    {
        $this->setPaymentDay(15);

        $this->nextYearPaymentDates();
    }
}