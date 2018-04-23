<?php
namespace PaymentDay;


class Calendar
{
    public $dayOfMonth;

    public $month;

    public function __construct(PaymentDay $payment)
    {
        $this->setMonth(date('n'));

        $this->dayOfMonth   = $payment->getPaymentDay();
    }

    public function setDayOfMonth(int $dayOfMonth)
    {
        $this->dayOfMonth = $dayOfMonth;
    }

    public function setMonth(int $month)
    {
        $this->month = $month;
    }

    public function getDayOfMonth()
    {
        return $this->dayOfMonth;
    }

    public function getFormattedMonth()
    {
        return date('F', mktime(0,0,0,$this->getMonth(), $this->getDayOfMonth() ));
    }

    public function getDayOfWeek()
    {
        return date('l', mktime(0,0,0,$this->getMonth(), $this->getDayOfMonth() ));
    }

    public function getDate()
    {
        return mktime(0,0,0,$this->getMonth(), $this->getDayOfMonth() );
    }

    public function getMonth()
    {
        return $this->month;
    }
}