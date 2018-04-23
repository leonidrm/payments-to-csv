<?php
namespace PaymentDay;


class Bonus extends PaymentDay
{
    public function __construct()
    {
        $this->setPaymentDay(15);

        $this->nextYearPaymentDates();
    }
}