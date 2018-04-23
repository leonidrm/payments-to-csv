<?php
namespace PaymentDay;


abstract class PaymentDay
{
    /**
     * @var integer
     */
    private $paymentDay;

    /**
     * @var array
     */
    private $paymentDates;

    public function getPaymentDay()
    {
        return $this->paymentDay;
    }

    public function getAdjustedPaymentDay(Calendar $calendar)
    {
        $dayOfWeek = $calendar->getDayOfWeek();

        if(in_array($dayOfWeek, ['Saturday','Sunday']))
        {
            $adjustedDay = $dayOfWeek == 'Saturday' ? 1 : 2;

            $calendar->setDayOfMonth( $calendar->getDayOfMonth() - $adjustedDay);
        }

        return $calendar->getDate();
    }

    public function getPaymentDates()
    {
        return $this->paymentDates;
    }

    public function nextYearPaymentDates()
    {
        $nrOfMonths = date('j') > 15 && $this->getPaymentDay() < 13 ? 13 : 12;

        for($month = 1; $month <= $nrOfMonths; $month++)
        {
            $calendar = new Calendar($this);

            $calendar->setMonth($calendar->getMonth() + $month);

            $this->paymentDates[] = $this->getAdjustedPaymentDay($calendar);

//          $calendarDates = $this->getAdjustedPaymentDay($calendar);
//
//          $this->paymentDates[$calendarDates['month']] = $calendarDates['day'];
        }
    }

    public function setPaymentDay(int $day)
    {
        $this->paymentDay = $day;
    }
}