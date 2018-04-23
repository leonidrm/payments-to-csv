<?php
namespace PaymentDay;

class Salary extends PaymentDay
{
    public function __construct()
    {
        $this->setPaymentDay(0);
        $this->nextYearPaymentDates();
    }
}